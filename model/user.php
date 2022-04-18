<?php
require 'dbConnection.php';

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
        if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['pass'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['joined'] = $row['reg_date'];
                }
                $_SESSION['loggedIn'] = true;
        }
        return $result->num_rows > 0;
}

function cookieLogin()
{
        $RememberedUser = $_COOKIE["RememberedUser"];
        $connection = connect();

        $sql = "SELECT * FROM bearburger.users
                WHERE username = '$RememberedUser' OR email = '$RememberedUser'";
        $result = $connection->query($sql);
        $connection->close();
        if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['pass'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['joined'] = $row['reg_date'];
                }
                $_SESSION['loggedIn'] = true;
        }
        return $result->num_rows > 0;
}
