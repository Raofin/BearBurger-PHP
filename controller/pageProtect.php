<?php

function verifyCookie()
{
    require_once '../model/user.php';
    if (isset($_COOKIE["RememberedUser"]) && !isset($_SESSION['loggedIn'])) {
        cookieLogin();
    }
}

function verifyLoggedIn()
{
    if (isset($_SESSION['loggedIn'])) {
        header("location: home.php?cat=Burger");
        die();
    }
}

function verifyNotLoggedIn()
{
    if (!isset($_SESSION['loggedIn'])) {
        header("location: login.php");
        die();
    }
}
