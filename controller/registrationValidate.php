<?php

    require '../model/user.php';

    $username = removeWhitespaces($_POST['username']);
    $email = removeWhitespaces($_POST['email']);
    $password = removeWhitespaces($_POST['password']);
    $cPassword = removeWhitespaces($_POST['cPassword']);
    $phone = removeWhitespaces($_POST['phone']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

    function checkLength($string, $minLength)
    {
        $length = strlen($string);
        return $length > $minLength && $length < 16;
    }

    function removeWhitespaces($string)
    {
        return preg_replace('/\s+/', '', $string);
    }

    if (
        checkLength($username, 3) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        checkLength($password, 5) &&
        $password === $cPassword &&
        checkLength($phone, 10) && is_numeric($phone) &&
        !empty($gender)
    ) {
        register();
        echo 'Registration Successful';
    } else echo 'Please fill out all the fields properly';
