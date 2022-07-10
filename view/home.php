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
                Catagory: <a id="cat-burger" href="">Burger</a>
                <a type="submit" id="cat-pizza" name="cat-pizza" href="">Pizza</a>
                <a id="cat-drinks" href="">Drinks</a>
                <a id="cat-coffee" href="">Coffee</a>
                <a id="cat-desert" href="">Desert</a>
                <a id="cat-sides" href="">Sides</a>
            </h2>
        </form>
        <table id="foods-table">
            <?php fetchFoods('Burger') ?>
        </table>
    </div>
</center>

<script>
    document.getElementById('cat-drinks').addEventListener('click', function() {
            event.preventDefault();
            document.getElementById('foods-table').innerHTML = "";
        },
        false);
</script>

<?php require 'footer.php' ?>