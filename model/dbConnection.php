<?php

function connect()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";

    $connection = new mysqli($serverName, $userName, $password);

    if ($connection->connect_error) {
        die("Connection Error: $connection->connect_error");
    }

    return $connection;
}
