<?php
    require 'Header.php';
    verifyNotLoggedIn();
    fetchFoodDetails($_REQUEST['id']);
?>
    <div class="comment-container">
        <form method="POST" id="comment-form">
            <div>
                <h1 id="title"><?php echo $_SESSION['foodTitle'] ?></h1>
                <p id="description"><?php echo $_SESSION['foodDescription'] ?></p>
                <p id="food-id" hidden><?php echo $_REQUEST['id'] ?></p>
            </div>

            <div class="comment-box">
                <h2><label for="comment">Comments</label></h2>
                <div id="all-comments" hidden></div>
                <div>
                    <div id="replying-to"></div>
                    <textarea autofocus class="review-input" id="comment" name="comment"
                              placeholder="Enter your comment here..." rows="3"></textarea>
                    <div id="comment-prompt-message"></div>
                    <input class="button" id="submit" name="submit" type="submit" value="POST">
                </div>
            </div>
        </form>
    </div>

    <script src="../../public/js/Comments.js"></script>

<?php include 'Footer.php' ?>