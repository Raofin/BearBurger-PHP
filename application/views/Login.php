<?php
    require 'Header.php';
    verifyLoggedIn();
?>

    <div class="form-container">
        <form id="login-form" method="POST">
            <h2 class="form-title">Log In</h2>

            <fieldset>
                <div>
                    <label for="usernameOrEmail">Username or Email</label>
                    <input autofocus class="form-input-box" id="usernameOrEmail" name="usernameOrEmail"
                           placeholder="Enter your username or email here" type="text">
                </div>
                <div>
                    <label for="password">Password</label>
                    <div class="show-password">
                        <span id="password-view">Show</span>
                    </div>
                    <input id="password" name="password" autocomplete="on" class="form-input-box"
                           placeholder="Enter your password here" type="password">
                </div>
                <div class="remember-me">
                    <input id="remember" name="remember" type="checkbox"/>
                    <label for="remember">Remember Me</label>
                </div>
            </fieldset>

            <div class="bottom">
                <div class="center-text">
                    <p id="prompt-message"></p>
                </div>
                <div class="center">
                    <input id="form-submit" type="submit" class="button" value="Login">
                </div>
                <div class="center-text bottom-text">
                    New here? <a href="Register.php">Create an Account</a>
                </div>
            </div>
        </form>
    </div>

    <script src="../../public/js/Logic.js"></script>
    <script src="../../public/js/LoginValidate.js"></script>

<?php include 'Footer.php' ?>