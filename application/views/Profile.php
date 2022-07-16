<?php
    require 'Header.php';
    verifyNotLoggedIn();
?>

    <div class="center">
        <form class="form-user-profile" method="post">
            <h1>User Profile</h1>
            <center>
                <table>
                    <tr>
                        <td>User ID:</td>
                        <td><?php echo $_SESSION['id'] ?></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $_SESSION['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><?php echo $_SESSION['password'] ?></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><?php echo $_SESSION['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><?php echo $_SESSION['gender'] ?></td>
                    </tr>
                    <tr>
                        <td>Joined:</td>
                        <td><?php echo date('F j, Y', strtotime($_SESSION['joined'])) ?></td>
                    </tr>
                </table>
            </center>
            <br>
            <div class="center-text">
                <p id="message"></p>
            </div>
            <input type="submit" value="Modify Details" class="button" style="margin: 0;">
        </form>
    </div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header("location: ProfileModify.php");
        die();
    } ?>

<?php include 'Footer.php' ?>