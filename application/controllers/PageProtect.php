<?php

    function verifyCookie()
    {
        require_once '../models/User.php';
        if (isset($_COOKIE["RememberedUser"]) && !isset($_SESSION['loggedIn']))
            cookieLogin();
    }

    function verifyLoggedIn()
    {
        if (isset($_SESSION['loggedIn'])) {
            header("location: Home.php");
            die();
        }
    }

    function verifyNotLoggedIn()
    {
        if (!isset($_SESSION['loggedIn'])) {
            header("location: Login.php");
            die();
        }
    }
