<?php
    session_start();
    require_once 'dbConnection.php';

    if (isset($_REQUEST['type']))
        if ($_REQUEST['type'] === 'post') postComment();
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
        echo "Comment posted";
    }

    function loadComments()
    {
        $foodId = $_REQUEST['foodId'];
        $comments = "";
        $query = "SELECT * FROM Comments 
                  WHERE FoodID = '$foodId' AND ParentID = 0
                  ORDER BY FoodID DESC";

        $mysqliResult = executeQuery($query);
        while ($row = $mysqliResult->fetch_assoc()) {
            $comments .= commentHtml($row, 0);
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

        while ($row = $mysqliResult->fetch_assoc()) {
            $replies .= commentHtml($row, $ParentId);
            $replies .= loadReplies($foodId, $row['CommentID'], $marginLeft);
        }

        return $replies;
    }

    function commentHtml($row, $ParentId)
    {
        $date = date('F j, Y', strtotime($row["PostDate"]));
        $style = $ParentId !== 0 ? "style=\"margin-left: " . $ParentId * 50 . "px\"" : "";

        return '
            <div class="reviews" id="comments" ' . $style . '">
                <a class="reply">Reply</a>
                <p><span class="reviewer-name">' . $row["PostedBy"] . '</span> <i>on ' . $date . '</i></p>
                <p id="posted-comment">' . $row["Comment"] . '</p>
            </div>';
    }