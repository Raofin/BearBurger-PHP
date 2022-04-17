<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/external.js"></script>
    <title>Bear Burger</title>
</head>

<body>

    <header>
        <a class="logo" href="/"><img src="img/logo.svg" alt="logo"></a>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Search Foods</a></li>
                <li><a href="#">View Profile</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "
                    <li><a href='#'>Sign Out</a></li>
                    <li class='username'><a href=''>{$_SESSION['username']}</a></li>";
                } else echo "<li><a href='#'>Log In</a></li>";

                ?>

            </ul>
        </nav>
    </header>