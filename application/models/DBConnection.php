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