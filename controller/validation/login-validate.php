<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailError = false;
    $passwordError = false;

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = true;
    if (empty($password))
        $passwordError = true;
    if (!$emailError && !$passwordError)
        echo '<span class="success">Login Successful</span>';
    else
        echo 'Please fill out all the fields properly.';
} else {
    echo "There was an error!";
}
?>

<script>
    $("#input-email, #input-password").removeClass("form-input-error");

    var emailError = "<?php echo $emailError; ?>";
    var passwordError = "<?php echo $passwordError; ?>";

    if (emailError == true)
        $("#input-email").addClass("form-input-error");
    if (passwordError == true)
        $("#input-password").addClass("form-input-error");
</script>