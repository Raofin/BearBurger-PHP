<?php

    require '../models/User.php';
    require_once 'StringValidate.php';

    $username = removeWhitespaces($_POST['username']);
    $email = removeWhitespaces($_POST['email']);
    $password = removeWhitespaces($_POST['password']);
    $cPassword = removeWhitespaces($_POST['cPassword']);
    $phone = removeWhitespaces($_POST['phone']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

    if (
        checkLength($username, 3) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        checkLength($password, 5) &&
        $password === $cPassword &&
        validatePhone($phone) &&
        !empty($gender)
    ) echo register();
    else echo 'Please fill out all the fields properly';

    function validatePhone($phone)
    {
        $regex = "/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[456789]\d{9}|(\d[ -]?){10}\d$/";
        return preg_match($regex, $phone);
    }
