<?php
require 'dbConnection.php';

function login()
{
        $usernameOrEmail = $_POST['usernameOrEmail'];
        $password = $_POST['password'];
        $connection = connect();

        $sql = "SELECT * FROM bearburger.users
                WHERE (username = '$usernameOrEmail' OR email = '$usernameOrEmail')
                AND pass LIKE binary '$password'";
        $result = $connection->query($sql);
        $connection->close();

        return $result->num_rows > 0;
}


        // output data of each row
        // while ($row = $result->fetch_assoc()) {
        //     echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        // }
