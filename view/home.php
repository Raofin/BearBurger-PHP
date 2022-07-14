<?php
    require 'header.php';
    require '../controller/loadFoods.php';
    verifyNotLoggedIn();
?>

    <div class="food-container">
        <h1 style="text-align: center">Order Your Favourite Foods!</h1>

        <form method="post">
            <h2 class="category-title">
                Category:
                <label onclick="fetch('Burger')" id="Burger">Burger</label>
                <label onclick="fetch('Pizza')" id="Pizza">Pizza</label>
                <label onclick="fetch('Drinks')" id="Drinks">Drinks</label>
                <label onclick="fetch('Coffee')" id="Coffee">Coffee</label>
                <label onclick="fetch('Desert')" id="Desert">Desert</label>
                <label onclick="fetch('Sides')" id="Sides">Sides</label>
            </h2>
        </form>
        <table id="foods-table"></table>
    </div>

    <script src="js/home.js"></script>

<?php require 'footer.php' ?>