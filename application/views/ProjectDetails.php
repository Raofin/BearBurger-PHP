<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" type="text/css" rel="stylesheet">
    <title>Bear Burger</title>
</head>

<body>

<header>
    <a class="logo" href="Welcome.php"><img src="../../public/img/nav-logo.svg" alt="logo"></a>
    <nav>
        <ul class="nav-links">
            <?php
                session_start();
                if (isset($_SESSION['dbTested'])) {
                    echo "
                    <li><a href='Home.php'>Home</a></li>
                    <li><a href='Search.php'>Search Foods</a></li>";
                    if (!isset($_SESSION['username'])) echo "
                        <li><a href='Login.php'>Log In</a></li>
                        <li><a href='Register.php'>Register</a></li>";
                    else echo "
                        <li><a href='Profile.php'>View Profile</a></li>
                        <li><a href='../controllers/Logout.php'>Log Out</a></li>
                        <li class='username'><a href='Profile.php'>{$_SESSION['username']}</a></li>";
                    echo "<li><a href='ProjectDetails.php'>Project Details</a></li>";
                } ?>
        </ul>
    </nav>
</header>

<div class="center">
    <div class="form-container" id="project-details">
        <div class="project-details-img center">
            <img class="logo" src="../../public/img/nav-logo.svg" alt="logo">

        </div>
        <div class="project-link">
            <a href="https://github.com/Raofin/BearBurger-PHP">github.com/Raofin/BearBurger-PHP</a>
        </div>
        <div class="project-details">
            <p>
                BearBurger is a food management system (customer) made for academic purposes. It's a complete PHP CRUD
                application built following the MVC architectural pattern. The main objective of this project was to
                implement the skills I've gathered so far mostly in PHP, JavaScript, jQuery, AJAX, CSS, and MySQL.
                Everything including the CSS was developed from scratch.
                <br><br>
                Features:
            <li>User login & registration</li>
            <li>Profile view and modify</li>
            <li>Browse foods with different categories</li>
            <li>Search for foods</li>
            <li>Buy foods & pay with credit card</li>
            <li>Post comment & reply on each food</li>
            <li>Each page is protected with session/cookies</li>
            <br>
            The HTML and CSS wasn't very excellent as it was my first web project, but I'm pretty happy with the
            jQuery and PHP. Please let me know if you have any recommendations or thoughts on this project.
            </p>
        </div>
        <div class="raofin">
            <img src="../../public/img/me.jpg">
            <div>
                <p>Email: <a href="mailto:hello@raofin.net">hello@raofin.net</a></p>
                <p>Website: <a href="https://raofin.net">raofin.net</a></p>
                <p>Github: <a href="https://github.com/Raofin">github.com/Raofin</a></p>
            </div>
        </div>
    </div>
</div>

</body>

<footer class="footer">
    <p>Copyright © 2022 by <a href="https://raofin.net">Raofin</a>. All Rights Reserved.</p>
</footer>

</html>
