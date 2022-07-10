<?php require 'header.php' ?>

<div class="center ">
    <div class="about">
        <h1>Project Details</h1><br>

        <center>
            <h3>Developed By</h3>
            <p>Zaid Amin Rawfin</p>
            <br>
            <h3>Completed Features</h3>
        </center>
        <div style="text-aligh: left">
            <p>1. Login</p>
            <p>2. Registration</p>
            <p>3. User Profile</p>
            <p>4. Password Recovery</p>
            <p>5. Modify User Details</p>
            <p>6. All Pages are protected with session & cookie</p>
            <p>7. View Foods List</p>
            <p>8. Payment with credit card</p>
            <p>9. Pay with different Currency</p>
            <p>10. Search for Foods</p>
            <p>11. Different Food Catagories</p>
            <p>12. Review/Comments on foods (Using AJAX)</p>
        </div>
    </div>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("location: profileModify.php");
    die();
} ?>

<?php require 'footer.php' ?>