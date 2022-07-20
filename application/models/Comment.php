<?php
    session_start();
    require_once 'DBConnection.php';

    if (isset($_REQUEST['type']))
        if ($_REQUEST['type'] === 'post') postComment();
        else if ($_REQUEST['type'] === 'reply') postReply();
        else if ($_REQUEST['type'] === 'load') loadComments();

    function postComment()
    {
        $foodId = $_REQUEST['foodId'];
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];

        $query = "INSERT INTO Comments
                  (ParentId, FoodId, PostedBy, Comment) 
                  VALUES (0, '$foodId', '$username', '$comment')";

        executeQuery($query);
        echo "Success";
    }

    function postReply()
    {
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $commentId = $_REQUEST['commentId'];
        $foodId = $_REQUEST['foodId'];

        /* here parentId is the previous commentId, the new posted
           comment replying to */
        $query = "INSERT INTO Comments
                  (ParentId, FoodId, PostedBy, Comment) 
                  VALUES ('$commentId', '$foodId', '$username', '$comment')";

        executeQuery($query);
        echo "Success";
    }

    function loadComments()
    {
        $foodId = $_REQUEST['foodId'];
        $comments = "";

        /* here parentId = 0 is the comments posted by the other users
           and which are not replies of any other comments */
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = 0";

        $mysqliResult = executeQuery($query);
        while ($row = $mysqliResult->fetch_assoc()) {
            $comments .= commentHtml($row);
            /* in the loadReplies(), use commentId of the current comment
               as the parentId to get its replies */
            $comments .= loadReplies($foodId, $row['CommentID']);
        }

        echo $comments;
    }

    function loadReplies($foodId, $ParentId, $marginLeft = 0)
    {
        $replies = "";
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = '$ParentId'";
        $mysqliResult = executeQuery($query);

        /* $marginLeft is the margin to add before replies.
           if the comment a reply, add 50 to it. */
        $marginLeft = $ParentId == 0 ? 0 : $marginLeft + 50;
        while ($row = $mysqliResult->fetch_assoc()) {
            $replies .= commentHtml($row, $ParentId, $marginLeft);
            /* again, use the commentId of the current reply to get
               its replies. this is a recursive call. */
            $replies .= loadReplies($foodId, $row['CommentID'], $marginLeft);
        }

        return $replies;
    }

    function commentHtml($row, $ParentId = 0, $marginLeft = 0)
    {
        // date/time format style example: July 17, 2022
        $date = date('F j, Y', strtotime($row["PostDate"]));
        // build the $style if the comment is a reply
        $style = $ParentId !== 0 ? "style=\"margin-left: " . $marginLeft . "px\"" : "";

        return '
            <div class="comments-div" id="comments" ' . $style . '">
                <div id="comment-id-' . $row["CommentID"] . '">
                    <a class="reply" onclick="return reply(' . $row["CommentID"] . ')">Reply</a>
                    <p><span class="author-name" id="author-name">' . $row["PostedBy"] . '</span> <i>on ' . $date . '</i></p>
                    <p id="posted-comment">' . $row["Comment"] . '</p>
                </div>    
            </div>';
    }