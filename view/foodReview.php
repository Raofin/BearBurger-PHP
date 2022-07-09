<?php
require 'header.php';
verifyNotLoggedIn();
?>
<center>
    <div class="review-container">
        <h1 style="text-align: center;">Cheese Burger - Review</h1>

        <table>
            <form method="POST" id="comment_form">
                <tr>
                    <div class="review-box">
                        <div id="display_comment"></div>

                        <textarea name="comment_content" id="comment_content" rows="3" class="review-input" placeholder="Enter your review here..."></textarea>

                        <span id="comment_message"></span>
                        <br />
                        <center>
                            <input type="submit" name="submit" id="submit" class="button" value="POST">
                        </center>
                    </div>
                    <td>

                    </td>
                </tr>
            </form>

        </table>

        <div>

        </div>

        <div>

        </div>
    </div>
</center>
<script>
    $(document).ready(function() {

        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    if (data.error != '') {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment();
                    }
                }
            })
        });

        load_comment();

        function load_comment() {
            $.ajax({
                url: "fetch_comment.php",
                method: "POST",
                success: function(data) {
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function() {
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_name').focus();
        });

    });
</script>

<?php require 'footer.php' ?>