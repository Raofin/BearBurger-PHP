<?php

    require_once 'DBConnection.php';

    session_start();
    $userId = $_SESSION['id'];
    $amount = $_REQUEST['price'];

    $query1 = "UPDATE Users
               SET Spent = Spent + $amount
               WHERE UserID = $userId";
    $query2 = "SELECT * 
               FROM Users 
               WHERE UserID = $userId";

    executeQuery($query1);
    $_SESSION['spent'] = executeQuery($query2)->fetch_assoc()['UserID'];