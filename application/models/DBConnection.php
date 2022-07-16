<?php
    require_once '../../config/Config.php';

    function connect()
    {
        return new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    }

    function executeQuery($query)
    {
        $mysqli = connect();
        $mysqliResult = $mysqli->query($query);
        $mysqli->close();
        return $mysqliResult;
    }

    function connectionTest()
    {
        try {
            connect()->close(); // open the connection to test and then close
        } catch (Exception $ex) {
            echo "<script>location.href = '../views/DatabaseError.php';</script>";
        }
    }

