<?php
    require 'header.php';
    verifyNotLoggedIn();
?>
    <div class="food-container">
        <form method="POST" id="comment-form">
            <div>
                <h1>Cheese Burger - Review</h1>
                <p>Prepared with beef patty, cheese, burger sauce, pickles & onion</p>
                <p id="food-id" hidden><?php echo $_REQUEST['id'] ?></p>
            </div>

            <div class="review-box" id="all-comments">
                <!--<div class="reviews" id="all-comments">
                    <a class="reply">Reply</a>
                    <p><span class="reviewer-name">Raofin</span> <i>on July 15, 2022</i></p>
                    <p id="posted-comment">I have to say, I enjoyed every single bite of the meal.</p>
                </div>
                <div class="reviews" id="comments" style="margin-left: 50px">
                    <p><span class="reviewer-name">Raofin</span> <i>on July 15, 2022</i></p>
                    <p id="posted-comment">I have to say, I enjoyed every single bite of the meal.</p>
                </div>-->
               
            </div>
            <div>
                <div id="replying-to"></div>
                <textarea class="review-input" id="comment" name="comment"
                          placeholder="Enter your review here..." rows="3"></textarea>
                <input class="button" id="submit" name="submit" type="submit" value="POST">
            </div>
        </form>
    </div>
     <script>
         $(document).ready(function () {
             load_comment();
 
             function load_comment() {
                 $.ajax({
                     url: '/model/comment.php?type=load&foodId=' + $('#food-id').text(),
                     method: "GET",
                     success: data => $('#all-comments').html(data)
                 })
             }
 
             $('#comment-form').on('submit', function (event) {
                 event.preventDefault();
                 let form_data = $(this).serialize();
 
                 $.ajax({
                     url: '/model/comment.php?type=post',
                     method: "POST",
                     data: form_data,
                     dataType: "JSON",
                     success: data => {
                         if (data['promptMessage'] !== '') {
                             $('#comment-form')[0].reset();
                             $('#comment_message').html(data['promptMessage']);
                             $('#comment-id').val('0');
                             load_comment();
                         }
                     }
                 })
             });
 
 
             $(document).on('click', '.reply', function () {
                 var comment_id = $(this).attr("id");
                 $('#comment_id').val(comment_id);
                 $('#comment_name').focus();
             });
         });
     </script>

<?php require 'footer.php' ?>