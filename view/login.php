<?php require 'header.php' ?>

<header>
    <a class="logo" href="/"><img src="img/logo.svg" alt="logo"></a>
    <nav>
        <ul class="nav__links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Search Foods</a></li>
            <li><a href="#">View Profile</a></li>
            <li><a href="#">Sign out</a></li>
        </ul>
    </nav>
</header>
<div class="center">
    <form id="login-form" action="validate.php" method="POST" class="form-body">
        <h2 class="title">Log in</h2>
        <div>
            <div>
                <label class="form-label">Email</label>
                <input class="form-textbox" id="input-email" name="email" type="text" placeholder="Enter your email here">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input class="form-textbox" id="input-password" name="password" type="text" placeholder="Enter password here">
            </div>
        </div>
        <p class="error-message"></p>
        <div class="center">
            <input id="form-submit" type="submit" class="button">
        </div>
        <div class="center-text">
            New here? <a href="">Create an Account</a>
        </div>
    </form>
</div>

<?php require 'footer.php' ?>