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
                        $_SESSION['id'] = $row['id'];
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
                        $_SESSION['id'] = $row['id'];
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

function update()
{
        foreach ($_POST as $item) {
                if ($item === '') {
                        echo '<h3 style="color:tomato;">Please fill out all the fields properly.</h3>';
                        return;
                }
        }

        try {
                $connection = connect();
                $sql = "UPDATE bearburger.users
                        SET username='{$_POST['username']}', email='{$_POST['email']}', pass='{$_POST['password']}', phone='{$_POST['phone']}'
                        WHERE email='{$_SESSION['email']}'";

                $connection->query($sql);
                $connection->close();

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['phone'] = $_POST['phone'];

                header("location: ../View/profile.php");
                die();
        } catch (Exception) {
        }
}
