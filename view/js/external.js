$(document).ready(function () {
    $("#login-form").submit(function (event) {
        event.preventDefault();
        var email = $("#input-email").val();
        var password = $("#input-password").val();
        var submit = $("#form-submit").val();
        $(".error-message").load("../controller/validation/login-validate.php", {
            email: email,
            password: password,
            submit: submit
        });
    });
});