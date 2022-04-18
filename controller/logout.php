<?php

if (isset($_COOKIE['RememberedUser'])) {
    unset($_COOKIE['RememberedUser']);
    setcookie('RememberedUser', null, -1, '/');
}

session_start();
session_unset();
session_destroy();

header("Location: ../view/login.php");
die();
