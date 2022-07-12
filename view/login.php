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

    <script src="js/loginValidate.js"></script>

<?php require 'footer.php' ?>