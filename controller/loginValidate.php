<?php

    require_once '../model/user.php';
    require_once 'stringValidate.php';

    $promptMessage = '';
    $data = array('success' => false);
    $usernameOrEmail = removeWhitespaces($_POST['usernameOrEmail']);
    $password = removeWhitespaces($_POST['password']);

    if (!empty($usernameOrEmail) && !empty($password)) {
        if (login()) {
            setcookie("RememberedUser", $usernameOrEmail, time() + (86400 * 30), "/");
            $data['success'] = true;
        } else $promptMessage = "Login failed! Please try again";
    } else $promptMessage = "Please fill out all the fields properly";

    $data['promptMessage'] = $promptMessage;
    echo json_encode($data);