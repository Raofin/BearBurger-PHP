$(document).ready(function () {
    $('#review-form').submit(function (event) {
        event.preventDefault();
        var review = $('#review').val();
        var submit = $('#form-submit').val();
        $('.error-message').load('../controller/validation/register-validate.php', {
            username: username,
            email: email,
            password: password,
            cPassword: cPassword,
            phone: phone,
            gender: gender,
            submit: submit,
        });
    });
});