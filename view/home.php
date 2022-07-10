<?php
require 'header.php';
require '../controller/loadFoods.php';
verifyNotLoggedIn();
?>

<center>
    <div class="food-container">
        <h1 style="text-align: center">Order Your Favourite Foods!</h1>

        <form method="post">
            <h2 class="catagory-title">
                Catagory:
                <a id="cat-burger" href="home.php?cat=Burger">Burger</a>
                <a id="cat-pizza" href="home.php?cat=Pizza">Pizza</a>
                <a id="cat-drinks" href="home.php?cat=Drinks">Drinks</a>
                <a id="cat-coffee" href="home.php?cat=Coffee">Coffee</a>
                <a id="cat-desert" href="home.php?cat=Desert">Desert</a>
                <a id="cat-sides" href="home.php?cat=Sides">Sides</a>
            </h2>
        </form>
        <table id="foods-table">
            <?php fetchFoods($_REQUEST["cat"]) ?>
        </table>
    </div>
</center>

<?php require 'footer.php' ?>