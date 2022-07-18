<?php
    require '../controllers/PageProtect.php';
    require '../models/Foods.php';
    verifyCookie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" type="text/css" rel="stylesheet">
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/jquery.validate.js"></script>
    <title>Bear Burger</title>
</head>

<body>

<header>
    <a class="logo" href="Welcome.php"><img src="../../public/img/nav-logo.svg" alt="logo"></a>
    <nav>
        <ul class="nav-links">
            <li><a href='Home.php'>Home</a></li>
            <li><a href='Search.php'>Search Foods</a></li>

            <?php
                if (!isset($_SESSION['username'])) echo "
                <li><a href='Login.php'>Log In</a></li>
                <li><a href='Register.php'>Register</a></li>";
                else echo "
                <li><a href='Profile.php'>View Profile</a></li>
                <li><a href='../controllers/Logout.php'>Log Out</a></li>
                <li class='username'><a href='Profile.php'>{$_SESSION['username']}</a></li>";
            ?>
            <li><a class="project-details" href='ProjectDetails.php'>Project Details</a></li>
        </ul>
    </nav>
</header>