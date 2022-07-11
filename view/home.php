<?php
    require 'header.php';
    require '../controller/loadFoods.php';
    verifyNotLoggedIn();
?>

    <center>
        <div class="food-container">
            <h1 style="text-align: center">Order Your Favourite Foods!</h1>

            <form method="post">
                <h2 class="category-title">
                    Category:
                    <a onclick="fetch('Burger')">Burger</a>
                    <a onclick="fetch('Pizza')">Pizza</a>
                    <a onclick="fetch('Drinks')">Drinks</a>
                    <a onclick="fetch('Coffee')">Coffee</a>
                    <a onclick="fetch('Desert')">Desert</a>
                    <a onclick="fetch('Sides')">Sides</a>
                </h2>
            </form>
            <table id="foods-table"></table>
        </div>
    </center>

    <script src="js/home.js"></script>

<?php require 'footer.php' ?>