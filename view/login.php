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
                    <input class="form-textbox" id="input-usernameOrEmail" name="usernameOrEmail" type="text"
                           placeholder="Enter your username or email here" autofocus>
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input class="form-textbox" id="input-password" name="password" type="password"
                           placeholder="Enter your password here" autocomplete="on">
                </div>
            </div>

            <div class="bottom">
                <p class="error-message center-text"></p>

                <div class="center">
                    <input id="form-submit" type="submit" class="button" value="Login">
                </div>
                <div class="center-text">
                    New here? <a href="register.php">Create an Account</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/login.js"></script>

<?php require 'footer.php' ?>