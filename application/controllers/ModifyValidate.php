<?php

    require '../models/User.php';
    require_once 'StringValidate.php';

    $username = removeWhitespaces($_POST['username']);
    $email = removeWhitespaces($_POST['email']);
    $password = removeWhitespaces($_POST['password']);
    $phone = removeWhitespaces($_POST['phone']);

    if (
        checkLength($username)
        && filter_var($email, FILTER_VALIDATE_EMAIL)
        && checkLength($password, 5)
        && validatePhone($phone)
    ) echo update();
    else echo 'Please fill out all the fields properly';