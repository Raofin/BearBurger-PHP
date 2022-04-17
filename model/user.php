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

function register()
{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

        try {
                $connection = connect();
                $sql = "INSERT INTO bearburger.users (username, email, pass, phone, gender) 
                        VALUES ('$username', '$email', '$password', '$phone', '$gender');";
                $connection->query($sql);
                $connection->close();
                return true;
        } catch (Exception) {
                return false;
        }
}


        // output data of each row
        // while ($row = $result->fetch_assoc()) {
        //     echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        // }
