$(document).ready(function () {
    $("#login-form").submit(function (event) {
        event.preventDefault();
        var usernameOrEmail = $("#input-usernameOrEmail").val();
        var password = $("#input-password").val();
        var submit = $("#form-submit").val();
        $(".error-message").load("../controller/validation/login-validate.php", {
            usernameOrEmail: usernameOrEmail,
            password: password,
            submit: submit
        });
    });
});

$(document).ready(function () {
    $("#register-form").submit(function (event) {
        event.preventDefault();
        var username = $("#input-username").val();
        var email = $("#input-email").val();
        var password = $("#input-password").val();
        var cPassword = $("#input-cPassword").val();
        var phone = $("#input-phone").val();
        var gender = $("input[name='gender']:checked").val();
        var submit = $("#form-submit").val();
        $(".error-message").load("../controller/validation/register-validate.php", {
            username: username,
            email: email,
            password: password,
            cPassword: cPassword,
            phone: phone,
            gender: gender,
            submit: submit
        });
    });
});

$(document).ready(function () {
    $("#review-form").submit(function (event) {
        event.preventDefault();
        var review = $("#review").val();
        var submit = $("#form-submit").val();
        $(".error-message").load("../controller/validation/register-validate.php", {
            username: username,
            email: email,
            password: password,
            cPassword: cPassword,
            phone: phone,
            gender: gender,
            submit: submit
        });
    });
});