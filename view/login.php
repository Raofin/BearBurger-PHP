<?php require 'header.php' ?>

<div class="center">
    <form id="login-form" action="validate.php" method="POST" class="login-form-body">
        <h2 class="form-title">Log In</h2>
        <div>
            <div>
                <label class="form-label">Username or Email</label>
                <input class="form-textbox" id="input-usernameOrEmail" name="usernameOrEmail" type="text" placeholder="Enter your username or email here">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input class="form-textbox" id="input-password" name="password" type="text" placeholder="Enter your password here">
            </div>
            <!-- <div class="checkbox">
                <input type="checkbox" id="remember" name="remember" value="Remember">
                <label for="remember">Remember</label>
            </div> -->
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

<?php require 'footer.php' ?>