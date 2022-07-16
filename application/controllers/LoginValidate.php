<?php

    require_once '../models/User.php';
    require_once 'StringValidate.php';

    $promptMessage = '';
    $data = array('success' => false);
    $usernameOrEmail = removeWhitespaces($_POST['usernameOrEmail']);
    $password = removeWhitespaces($_POST['password']);

    if (!empty($usernameOrEmail) && !empty($password)) {
        if (login()) {
            if (isset($_POST['remember']))
                setcookie("RememberedUser", $usernameOrEmail, time() + (86400 * 30), "/");
            $data['success'] = true;
        } else $promptMessage = "Invalid credentials! Please try again :(";
    } else $promptMessage = "Please fill out all the fields properly";

    $data['promptMessage'] = $promptMessage;
    echo json_encode($data);