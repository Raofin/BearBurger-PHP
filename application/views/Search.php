<?php require 'Header.php' ?>

    <div class="food-container">
        <h1><label for="search-box">Order Your Favourite Foods!</label></h1>

        <form method="post">
            <input class="search-input-box" id="search-box"
                   placeholder="Type anything to search"
                   spellcheck="false" type="text"><br><br>
        </form>
        <table id="foods-table"></table>
    </div>

    <script src="../../public/js/Search.js"></script>

<?php include 'Footer.php' ?>