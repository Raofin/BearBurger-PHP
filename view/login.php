<?php require 'header.php' ?>

<header>
    <a class="logo" href="/"><img src="img/logo.svg" alt="logo"></a>
    <nav>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Search Foods</a></li>
            <li><a href="#">View Profile</a></li>
            <li><a href="#">Sign out</a></li>
        </ul>
    </nav>
</header>
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
        </div>
        <p class="error-message"></p>

        <div class="bottom">
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