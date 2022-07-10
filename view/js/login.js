$(document).ready(function () {
    $('#login-form').submit(function (event) {
        event.preventDefault();
        var usernameOrEmail = $('#input-usernameOrEmail').val();
        var password = $('#input-password').val();
        var submit = $('#form-submit').val();
        $('.error-message').load('../controller/validation/login-validate.php', {
            usernameOrEmail: usernameOrEmail,
            password: password,
            submit: submit,
        });
    });
});