<?php
require 'header.php';
verifyLoggedIn();
?>

<div class="center">
    <form id="register-form" action="" method="POST" class="register-form-body">
        <h2 class="form-title">Create an Account</h2>
        <div>
            <div>
                <label class="form-label">Username</label>
                <input class="form-textbox" id="input-username" name="username" type="text" placeholder="Enter your username here">
            </div>
            <div>
                <label class="form-label">Email</label>
                <input class="form-textbox " id="input-email" name="email" type="text" placeholder="Enter your email here">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input class="form-textbox" id="input-password" name="password" type="password" placeholder="Enter your password here">
            </div>
            <div>
                <label class="form-label">Confirm Password</label>
                <input class="form-textbox" id="input-cPassword" name="cPassword" type="password" placeholder="Rewrite the password here">
            </div>
            <div>
                <label class="form-label">Phone Number</label>
                <input class="form-textbox" id="input-phone" name="phone" type="text" placeholder="Enter your phone number here">
            </div>
            <div class="radio">
                <label>Gender</label>
                <div class="radio-button" id="radio-button-box">
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male" class="radio-label">Male</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female" class="radio-label">Female</label>
                </div>
            </div>
        </div>
        <p class="error-message"></p>

        <div class="bottom">
            <div class="center">
                <input id="form-submit" type="submit" class="button" value="Register">
            </div>
            <div class="center-text">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>

    </form>
</div>

<?php require 'footer.php' ?>