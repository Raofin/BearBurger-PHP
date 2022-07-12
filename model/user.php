<?php

    require_once 'dbConnection.php';

    // user register
    function register()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phone'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

        $query = "INSERT INTO Users (Username, Email, Password, PhoneNumber, Gender, Spent) 
                  VALUES ('$username', '$email', '$password', '$phoneNumber', '$gender', 0);";

        executeQuery($query);
    }

    // login using username or email, and password
    function login()
    {
        $usernameOrEmail = isset($_POST['email']) ? $_POST['email'] : $_POST['usernameOrEmail'];
        $password = $_POST['password'];
        $query = "SELECT * FROM Users
                  WHERE (Username = '$usernameOrEmail' OR Email = '$usernameOrEmail')
                  AND Password LIKE BINARY '$password'";

        return sessionLogin($query);
    }

    // login using remembered user
    function cookieLogin()
    {
        $rememberedUser = $_COOKIE["RememberedUser"];
        $query = "SELECT * FROM Users
                  WHERE Username = '$rememberedUser' OR email = '$rememberedUser'";

        return sessionLogin($query);
    }

    // store user details in the session variables
    function sessionLogin($query)
    {
        $mysqliResult = executeQuery($query);

        if ($mysqliResult->num_rows > 0) {
            while ($row = $mysqliResult->fetch_assoc()) {
                $_SESSION['id'] = $row['UserID'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['phone'] = $row['PhoneNumber'];
                $_SESSION['gender'] = $row['Gender'];
                $_SESSION['joined'] = $row['RegDate'];
            }
            $_SESSION['loggedIn'] = true;
        }
        return $mysqliResult->num_rows > 0;
    }

    // update user details
    function update()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phone'];
        $oldEmail = $_SESSION['email'];

        $query = "UPDATE Users
                  SET Username='$username', Email='$email', Password='$password', PhoneNumber='$phoneNumber'
                  WHERE email='$oldEmail'";

        executeQuery($query);
        login();

        header("location: ../View/profile.php");
        die();
    }

    function pay()
    {
        foreach ($_POST as $item) {
            if ($item === '') {
                echo '<p style="color:tomato; margin-botton: 10px">Please fill out all the fields properly.<br></p>';
                return;
            }
        }
        echo '<p style="margin-bottom: 10px; color: rgb(5, 211, 5);"> Payment Successful<br></p>';
    }
