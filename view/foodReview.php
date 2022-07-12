<?php
    require 'header.php';
    verifyNotLoggedIn();
?>
    <center>
        <div class="review-container">
            <h1 style="text-align: center;">Cheese Burger - Review</h1>

            <table>
                <form method="POST" id="comment-form">
                    <tr>
                        <div class="review-box">
                            <div id="display_comment"></div>

                            <textarea class="review-input" id="comment" name="comment"
                                      placeholder="Enter your review here..."
                                      rows="3"></textarea>

                            <span id="comment_message"></span>
                            <br/>
                            <center>
                                <input id="comment-id" name="comment-id" type="hidden" value="0"/>
                                <input class="button" id="submit" name="submit" type="submit" value="POST">
                            </center>
                        </div>
                    </tr>
                </form>
            </table>
        </div>
    </center>
    <script>
        $(document).ready(function () {
            load_comment();

            $('#comment-form').on('submit', function (event) {
                event.preventDefault();
                let form_data = $(this).serialize();

                $.ajax({
                    url: '/model/comment.php?type=post',
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: data => {
                        console.log(data['promptMessage']);
                        if (data['promptMessage'] !== '') {
                            $('#comment-form')[0].reset();
                            $('#comment_message').html(data['promptMessage']);
                            $('#comment-id').val('0');
                            load_comment();
                        }
                    }
                })
            });

            function load_comment() {
                $.ajax({
                    url: '/model/comment.php?type=load',
                    method: "POST",
                    success: function (data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function () {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
            });
        });
    </script>

<?php require 'footer.php' ?>