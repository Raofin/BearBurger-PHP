<?php

    require_once 'DBConnection.php';

    session_start();
    $userId = $_SESSION['id'];
    $amount = $_REQUEST['price'];

    $query = "UPDATE Users
              SET Spent = Spent + $amount
              WHERE UserID = $userId";

    executeQuery($query);