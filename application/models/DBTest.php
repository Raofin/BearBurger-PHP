<?php

    require_once 'DBConnection.php';

    try {
        $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD);
        $mysqliResult = $mysqli->multi_query(file_get_contents("../../database/BearBurger-PHP.sql"));
        $mysqli->close();

        session_start();
        $_SESSION['dbTested'] = true;

        header("Location: ../views/Home.php");
        die();
    } catch (Exception $ex) {
        header("Location: ../views/DatabaseError.php");
        die();
    }