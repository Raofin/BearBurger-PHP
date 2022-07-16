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
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = 0";

        $mysqliResult = executeQuery($query);
        while ($row = $mysqliResult->fetch_assoc()) {
            $comments .= commentHtml($row);
            $comments .= loadReplies($foodId, $row["CommentID"]);
        }

        echo $comments;
    }

    function loadReplies($foodId, $ParentId, $marginLeft = 0)
    {
        $replies = "";
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = '$ParentId'";
        $mysqliResult = executeQuery($query);

        $marginLeft = $ParentId == 0 ? 0 : $marginLeft + 48;
        while ($row = $mysqliResult->fetch_assoc()) {
            $replies .= commentHtml($row, $ParentId, $marginLeft);
            $replies .= loadReplies($foodId, $row['CommentID'], $marginLeft);
        }

        return $replies;
    }

    function commentHtml($row, $ParentId = 0, $marginLeft = 0)
    {
        $date = date('F j, Y', strtotime($row["PostDate"]));
        $style = $ParentId !== 0 ? "style=\"margin-left: " . $marginLeft . "px\"" : "";

        return '
            <div class="reviews" id="comments" ' . $style . '">
                <div id="comment-id-' . $row["CommentID"] . '">
                    <a class="reply" onclick="return reply(' . $row["CommentID"] . ')">Reply</a>
                    <p><span class="reviewer-name" id="reviewer-name">' . $row["PostedBy"] . '</span> <i>on ' . $date . '</i></p>
                    <p id="posted-comment">' . $row["Comment"] . '</p>
                </div>    
            </div>';
    }