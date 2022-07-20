<?php

    require_once '../models/User.php';
    require_once 'StringValidate.php';

    $promptMessage = '';
    $data = array('success' => false);
    $usernameOrEmail = removeWhitespaces($_POST['usernameOrEmail']);
    $password = removeWhitespaces($_POST['password']);

    /* if both inputs are not empty, call the login(). then if it
       returns true, verify if the user checked remember me checkbox
       and set cookie. finally make $data['success'] = true */
    if (!empty($usernameOrEmail) && !empty($password)) {
        if (login()) {
            if (isset($_POST['remember']))
                setcookie("RememberedUser", $usernameOrEmail, time() + (86400 * 30), "/");
            $data['success'] = true;
        } else $promptMessage = "Invalid credentials! Please try again :(";
    } else $promptMessage = "Please fill out all the fields properly";

    $data['promptMessage'] = $promptMessage;

    /* make the $data array into a json string and echo that to
       make it easy use after the ajax call */
    echo json_encode($data);