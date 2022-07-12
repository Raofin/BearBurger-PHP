<?php

    function connect()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "BearBurger";

        $mysqli = new mysqli($hostname, $username, $password, $database);

        if ($mysqli->connect_error)
            die("Connection Error: $mysqli->connect_error");

        return $mysqli;
    }

    function executeQuery($query)
    {
        $connection = connect();
        $mysqliResult = $connection->query($query);
        $connection->close();
        return $mysqliResult;
    }
