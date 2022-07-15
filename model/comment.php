<?php
    session_start();
    require_once 'dbConnection.php';
    $GLOBALS['marginLeft'] = 0;

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
                  WHERE FoodID = '$foodId' AND ParentID = 0
                  ";

        $mysqliResult = executeQuery($query);
        while ($row = $mysqliResult->fetch_assoc()) {
            $comments .= commentHtml($row);
            $comments .= loadReplies($foodId, $row["CommentID"]);
        }

        echo $comments;
    }

    function loadReplies($foodId, $ParentId)
    {
        $replies = "";
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = '$ParentId'";
        $mysqliResult = executeQuery($query);

        while ($row = $mysqliResult->fetch_assoc()) {
            $replies .= commentHtml($row, $ParentId);
            $replies .= loadReplies($foodId, $row['CommentID']);
        }
        $GLOBALS['marginLeft'] = 0;

        return $replies;
    }

    function commentHtml($row, $ParentId = 0)
    {
        $date = date('F j, Y', strtotime($row["PostDate"]));
        if ($ParentId !== 0) {
            $GLOBALS['marginLeft'] += 50;
            $style = "style=\"margin-left: " . ($GLOBALS['marginLeft']) . "px\"";
        } else $style = "";

        return '
            <div class="reviews" id="comments" ' . $style . '">
                <div id="comment-id-' . $row["CommentID"] . '">
                    <a class="reply" onclick="return reply(' . $row["CommentID"] . ')">Reply</a>
                    <p><span class="reviewer-name" id="reviewer-name">' . $row["PostedBy"] . '</span> <i>on ' . $date . '</i></p>
                    <p id="posted-comment">' . $row["Comment"] . '</p>
                </div>    
            </div>';
    }