<?php
    require 'header.php';
    verifyNotLoggedIn();
?>

    <center>
        <div class="food-container">
            <h1 style="text-align: center">Order Your Favourite Foods!</h1>

            <form action="" method="post">
                <label for="search-box"></label>
                <input class="search-inputbox" id="search-box"
                       placeholder="Type anything to search"
                       spellcheck="false" type="text"><br><br>
            </form>
            <table id="foods-table"></table>
        </div>
    </center>

    <script src="js/search.js"></script>

<?php include 'footer.php'; ?>