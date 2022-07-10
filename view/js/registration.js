$(document).ready(function () {
    $('#register-form').submit(function (event) {
        event.preventDefault();
        var username = $('#input-username').val();
        var email = $('#input-email').val();
        var password = $('#input-password').val();
        var cPassword = $('#input-cPassword').val();
        var phone = $('#input-phone').val();
        var gender = $("input[name='gender']:checked").val();
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