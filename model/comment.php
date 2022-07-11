<?php
    session_start();
    require_once 'dbConnection.php';

    if (isset($_REQUEST['type']))
        if ($_REQUEST['type'] === 'post') postComment();
        else if ($_REQUEST['type'] === 'load') loadComments();

    function postComment()
    {
        $username = $_SESSION['username'];
        $promptMessage = '';

        if (empty($_POST['comment']))
            $promptMessage .= '<p class="error-message">Please fill out the comment field.</p>';
        else {
            $comment = $_POST['comment'];
            $commentId = $_POST['comment-id'];

            $mysqli = connect();
            $query = "INSERT INTO bearburger.tbl_comment
                      (parent_comment_id, comment, comment_sender_name) 
                      VALUES ('$commentId', '$comment', '$username')";
            $mysqli->query($query);
            $mysqli->close();

            $promptMessage = '<p class="success-message">Comment posted.</p>';
        }

        $data = array('promptMessage' => $promptMessage);
        echo json_encode($data);
    }

    function loadComments()
    {
        $comments = '';
        $mysqli = connect();
        $query = "SELECT * FROM bearburger.tbl_comment 
                  WHERE parent_comment_id = '0' 
                  ORDER BY comment_id DESC";
        $data = $mysqli->query($query);

        while ($row = $data->fetch_assoc()) {
            $comments .= '
                <div class="reviews">
                    <h3>comment' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></h3>
                    <p>' . $row["comment"] . '</p>
                </div>';
            $comments .= loadReplies($mysqli, $row["comment_id"]);
        }

        $mysqli->close();
        echo $comments;
    }

    function loadReplies($mysqli, $commentId, $marginLeft = 0)
    {
        $replies = "";
        $query = "SELECT * FROM bearburger.tbl_comment 
                  WHERE parent_comment_id = '$commentId'";
        $data = $mysqli->query($query);

        $marginLeft = $commentId == 0 ? 0 : $marginLeft + 48;

        while ($row = $data->fetch_assoc()) {
            $replies .= '
                    <div class="reviews" style="margin-left: $marginleft px">
                        <h3>reply' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></h3>
                        <p>' . $row["comment"] . '</p>
                    </div>';
            $replies .= loadReplies($mysqli, $row['comment_id'], $marginLeft);
        }

        return $replies;
    }