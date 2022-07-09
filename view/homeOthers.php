<?php
require 'header.php';
require '../controller/loadFoods.php';
verifyNotLoggedIn();
?>

<center>

    <div class="food-container">
        <h1 style="text-align: center;">Order Your Favourite Foods!</h1>

        <h2 class="catagory-title">Catagory: <a href="home.php">Burger</a><a href="homeChicken.php">Chicken</a><a href="homeOthers.php">Others</a></h2>
        <table>

            <?php loadFoods('foodsOthers.json'); ?>

        </table>

        <div>

        </div>

        <div>

        </div>
    </div>
</center>

<?php require 'footer.php' ?>