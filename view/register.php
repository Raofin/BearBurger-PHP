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
                    <input class="form-textbox" id="username" name="username"
                           placeholder="Enter your username here" type="text" autofocus>
                </div>
                <div>
                    <label class="form-label">Email</label>
                    <input class="form-textbox" id="email" name="email"
                           placeholder="Enter your email here" type="text">
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input autocomplete="off" class="form-textbox" id="password" name="password"
                           placeholder="Enter your password here" type="password">
                </div>
                <div>
                    <label class="form-label">Confirm Password</label>
                    <input autocomplete="off" class="form-textbox" id="cPassword" name="cPassword"
                           placeholder="Rewrite the password here" type="password">
                </div>
                <div>
                    <label class="form-label">Phone Number</label>
                    <input class="form-textbox" id="phone" name="phone"
                           placeholder="Enter your phone number here" type="text">
                </div>
                <div class="radio">
                    <label>Gender</label>
                    <div class="radio-button" id="radio-button-box">
                        <input id="male" name="gender" type="radio" value="Male">
                        <label class="radio-label" for="male">Male</label>
                        <input id="female" name="gender" type="radio" value="Female">
                        <label class="radio-label" for="female">Female</label>
                    </div>
                </div>
            </div>
            <p class="error-message" id="prompt-message"></p>

            <div class="bottom">
                <div class="center">
                    <input class="button" id="submit" name="submit" type="submit" value="Register">
                </div>
                <div class="center-text">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </div>

        </form>
    </div>

    <script src="js/register.js"></script>

<?php require 'footer.php' ?>