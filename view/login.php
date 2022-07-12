<?php
    require 'header.php';
    verifyLoggedIn();
?>

    <div class="center">
        <form id="login-form" action="/controller/validation/login-validate.php" method="POST" class="login-form-body">
            <h2 class="form-title">Log In</h2>
            <div>
                <div>
                    <label class="form-label">Username or Email</label>
                    <input autofocus class="form-textbox" id="usernameOrEmail" name="usernameOrEmail"
                           placeholder="Enter your username or email here" type="text">
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input autocomplete="on" class="form-textbox" id="password" name="password"
                           placeholder="Enter your password here" type="password">
                </div>
            </div>

            <div class="bottom">
                <p class="error-message center-text" id="prompt-message"></p>

                <div class="center">
                    <input id="form-submit" type="submit" class="button" value="Login">
                </div>
                <div class="center-text">
                    New here? <a href="register.php">Create an Account</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        $('#login-form').validate({
            submitHandler: form => {
                let formData = $('#login-form').serialize();

                $.ajax({
                    url: '/controller/loginValidate.php',
                    method: "POST",
                    data: formData,
                    cache: false,
                    processData: false,
                    success: data => {
                        let jsonData = JSON.parse(data);

                        if (jsonData['success'] === true)
                            $(location).prop('href', 'home.php');
                        $('#prompt-message').html(jsonData['promptMessage']);
                    }
                })
            },
            rules: {
                usernameOrEmail: {
                    required: true,
                    minlength: 4,
                    maxlength: 30,
                    normalizer: value => removeWhitespaces(value, '#usernameOrEmail')
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 15,
                    normalizer: value => removeWhitespaces(value, '#password')
                }
            },
            messages: {
                usernameOrEmail: {
                    required: "Please enter a username",
                    minlength: "Your username or email must consist of at least 4 characters",
                    maxlength: "Your username or email must be no more than 30 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    maxlength: "Your password must be no more than 15 characters long"
                }
            },
            errorClass: 'form-input-error'
        })

        function removeWhitespaces(value, id) {
            value = value.replace(/\s/g, ''); // remove whitespaces
            $(id).val(value);
            return $.trim(value);
        }

        jQuery.validator.addMethod('emailRegex', function (value, element) {
            return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
        }, 'Please enter a valid email address.');

    </script>

    <!--    <script src="js/login.js"></script>-->

<?php require 'footer.php' ?>