$(document).ready(() => loadComments());

let foodId = $('#food-id').text();
let ajaxUrl = '/model/comment.php?type=post&foodId=' + foodId;
let isReply = false;

function reply(commentId) {
    if (isReply) {
        $('#replying-to').removeClass('replying-to').text('');
        changeAjaxUrl();
        return;
    }

    let comment = $('#comment-id-' + commentId + ' #posted-comment').text();
    let commentHtml = '"' + comment + '" — <i><b>' + $('#comment-id-' + commentId + ' #reviewer-name').text() + '</b></i>';
    $('#replying-to').html(commentHtml).addClass('replying-to');

    $('#comment').focus();
    changeAjaxUrl(commentId);
}

function changeAjaxUrl(commentId = 0) {
    if (isReply) {
        ajaxUrl = '/model/comment.php?type=post&foodId=' + foodId;
        $('#submit').prop('value', 'Post');
        isReply = false;
    } else {
        ajaxUrl = '/model/comment.php?type=reply&commentId=' + commentId + '&foodId=' + foodId;
        $('#submit').prop('value', 'Reply');
        isReply = true;
    }
}


$('#comment-form').validate({
    submitHandler: form => {
        $.ajax({
            url: ajaxUrl,
            method: "POST",
            data: $('#comment-form').serialize(),
            cache: false,
            processData: false,
            success: data => {
                if (data === 'Success') {
                    if (isReply) {
                        $('#replying-to').removeClass('replying-to').text('');
                        changeAjaxUrl();
                    }
                    $('#comment-prompt-message')
                        .text('Your comment has been posted.')
                        .addClass('success-message');
                    $('#comment-form').trigger("reset");

                    loadComments();
                }
            }
        })
    },
    rules: {
        comment: {
            required: true,
            minlength: 1
        }
    },
    messages: {
        comment: {
            required: "Please enter a comment",
            minlength: "Your comment must consist of at least 1 characters",
        }
    },
    errorClass: "form-input-error error-message"
})

function loadComments() {
    $.ajax({
        url: '/model/comment.php?type=load&foodId=' + foodId,
        method: "GET",
        success: data => {
            if (data !== '')
                $('#all-comments').html(data).show();
        }
    })
}