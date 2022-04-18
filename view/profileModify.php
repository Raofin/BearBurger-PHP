<?php
require 'header.php';
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
                    <td><input type="text" id="username" name="username" value="<?php echo $_SESSION['username'] ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" id="email" name="email" value="<?php echo $_SESSION['email'] ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="password" name="password" value="<?php echo $_SESSION['password'] ?>"></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone'] ?>"></td>
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
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') update() ?>
        <input type="submit" value="Update" class="button" style="margin: 0;">
    </form>
</div>

<?php require 'footer.php' ?>