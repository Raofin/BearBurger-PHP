<?php
session_start();
require '../controller/pageProtect.php';
verifyCookie();

?>

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
        <a class="logo" href="home.php"><img src="img/logo.svg" alt="logo"></a>

        <nav>
            <ul class="nav-links">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "
                    <li><a href=''>Home</a></li>
                    <li><a href=''>Search Foods</a></li>
                    <li><a href=''>View Profile</a></li>
                    <li><a href=''>About</a></li>
                    <li><a href='../controller/logout.php'>Log Out</a></li>
                    <li class='username'><a href=''>{$_SESSION['username']}</a></li>";
                } else {
                    echo "
                    <li><a href=''>About</a></li>
                    <li><a href='login.php'>Log In</a></li>
                    <li><a href='register.php'>Register</a></li>";
                }
                ?>

            </ul>
        </nav>
    </header>

</body>

<footer class="footer">
    <p>Copyright © 2022 by <a href="http://raofin.net">Raofin</a>. All Rights Reserved.</p>
</footer>

</html>