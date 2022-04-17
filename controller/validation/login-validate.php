<?php

require '../../model/user.php';

if (isset($_POST['submit'])) {
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    $usernameOrEmailError = false;
    $passwordError = false;

    if (empty($usernameOrEmail))
        $usernameOrEmailError = true;
    if (empty($password))
        $passwordError = true;
    if (!$usernameOrEmailError && !$passwordError) {
        if (login()) {
            echo 'Login Successful';
        } else echo 'Login failed. Please try again.';
    } else
        echo 'Please fill out all the fields properly.';
}
?>

<script>
    $("#input-usernameOrEmail, #input-password").removeClass("form-input-error");

    var usernameOrEmailError = "<?php echo $usernameOrEmailError; ?>";
    var passwordError = "<?php echo $passwordError; ?>";

    if (usernameOrEmailError == true)
        $("#input-usernameOrEmail").addClass("form-input-error");
    if (passwordError == true)
        $("#input-password").addClass("form-input-error");
</script>