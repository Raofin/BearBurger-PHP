<?php

    require '../../model/user.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];
        $phone = $_POST['phone'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

        $usernameError = false;
        $emailError = false;
        $passwordError = false;
        $cPasswordError = false;
        $phoneError = false;
        $genderError = false;

        if (empty($username)) $usernameError = true;
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $emailError = true;
        if (empty($password)) $passwordError = true;
        if (empty($cPassword) || $cPassword !== $password) $cPasswordError = true;
        if (empty($phone) || !is_numeric($phone)) $phoneError = true;
        if (empty($gender)) $genderError = true;

        if (!$usernameError && !$emailError && !$passwordError && !$cPasswordError && !$phoneError && !$genderError) register();
        else echo 'Please fill out all the fields properly';
    }
?>

<script>
    $("#input-username, #input-email, #input-password, #input-cPassword, #input-phone, #radio-button-box").removeClass("form-input-error");

    var usernameError = "<?php echo $usernameError; ?>";
    var emailError = "<?php echo $emailError; ?>";
    var passwordError = "<?php echo $passwordError; ?>";
    var cPasswordError = "<?php echo $cPasswordError; ?>";
    var phoneError = "<?php echo $phoneError; ?>";
    var genderError = "<?php echo $genderError; ?>";

    if (usernameError == true) $("#input-username").addClass("form-input-error");
    if (emailError == true) $("#input-email").addClass("form-input-error");
    if (passwordError == true) $("#input-password").addClass("form-input-error");
    if (cPasswordError == true) $("#input-cPassword").addClass("form-input-error");
    if (phoneError == true) $("#input-phone").addClass("form-input-error");
    if (genderError == true) $("#radio-button-box").addClass("form-input-error");
    if (!usernameError && !emailError && !passwordError && !cPasswordError && !phoneError && !genderError) {
        $("#input-username, #input-email, #input-password, #input-cPassword, #input-phone").val("");
        $('input[name=gender]').prop('checked', false);
    }
</script>