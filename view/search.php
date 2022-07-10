<?php
require 'header.php';
require '../Controller/searchFoods.php';
verifyNotLoggedIn();
?>

<center>
    <div class="food-container">
        <h1 style="text-align: center;">Order Your Favourite Foods!</h1>

        <form action="" method="post" novalidate>
            <input type="text" name="search" placeholder="Type anything to search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" class="search-inputbox"><br><br>
            <input type="submit" value="Search" class="button">
        </form>

        <br><br>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') search(); ?>
        <br><br>
    </div>
</center>

<?php include 'footer.php'; ?>