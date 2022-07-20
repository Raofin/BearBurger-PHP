<?php

    require_once 'DBConnection.php';
    session_start();

    // user register
    function register()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phone'];
        $gender = $_POST['gender'];

        $query = "INSERT INTO Users (Username, Email, Password, PhoneNumber, Gender, Spent) 
                  VALUES ('$username', '$email', '$password', '$phoneNumber', '$gender', 0);";

        if (isUsernameUnique($username) && isEmailUnique($email)) {
            executeQuery($query);
            return "Success";
        } else
            return "Your <b>username</b> or <b>email address</b> has already been used in an existing account.";
    }

    // update user details
    function update()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phone'];
        $oldEmail = $_SESSION['email'];

        $usernameQuery = $username === $_SESSION['username'] ? '' : " Username='$username', ";
        $emailQuery = $email === $_SESSION['email'] ? '' : " Email='$email', ";
        $query = "UPDATE Users
                  SET $usernameQuery $emailQuery Password='$password', PhoneNumber='$phoneNumber'
                  WHERE Email='$oldEmail'";

        $isUsernameOk = true;
        $isEmailOk = true;

        if ($usernameQuery !== '') $isUsernameOk = isUsernameUnique($username);
        if ($emailQuery !== '') $isEmailOk = isEmailUnique($username);
        if ($isUsernameOk && $isEmailOk) {
            executeQuery($query);
            login();
            return "Success";
        } else
            return "Your <b>username</b> or <b>email address</b> has already been used in an existing account.";
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

    // login using cookie
    function cookieLogin()
    {
        $rememberedUser = $_COOKIE["RememberedUser"];
        $query = "SELECT * FROM Users
                  WHERE Username = '$rememberedUser' OR Email = '$rememberedUser'";

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
                $_SESSION['spent'] = $row['Spent'];
                $_SESSION['joined'] = $row['RegDate'];
            }
            $_SESSION['loggedIn'] = true;
        }
        return $mysqliResult->num_rows > 0;
    }

    function isUsernameUnique($username)
    {
        $checkUsernameQuery = "SELECT * FROM Users WHERE Username = '$username'";
        return executeQuery($checkUsernameQuery)->num_rows === 0;
    }

    function isEmailUnique($email)
    {
        $checkEmailQuery = "SELECT * FROM Users WHERE Email = '$email'";
        return executeQuery($checkEmailQuery)->num_rows === 0;
    }