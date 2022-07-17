<?php

    require_once 'DBConnection.php';

    try {
        $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD);
        $mysqliResult = $mysqli->multi_query(file_get_contents("../../database/BearBurger.sql"));
        $mysqli->close();
        echo "<script>location.href = '../views/Login.php'</script>";
    } catch (Exception $ex) {
        echo "<script>location.href = '../views/DatabaseError.php'</script>";
    }