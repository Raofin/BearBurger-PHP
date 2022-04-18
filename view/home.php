<?php
require 'header.php';
verifyNotLoggedIn();
?>

<center>

    <div class="food-container">
        <h1 style="text-align: center;">Order Your Favourite Foods!</h1>
        <table>
            <tr>
                <td>
                    <div class="food-box">
                        <h3>Cheese Burger</h3>
                        <p>Prepared with beef patty, cheese, burger sauce, pickles & onion</p>
                        <h4>Price: 560tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
                <td>
                    <div class="food-box">
                        <h3>Bacon Cheese Burger</h3>
                        <p>Prepared with beef patty, 2 slices cheese, bacon & burger sauce</p>
                        <h4>Price: 480tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="food-box">
                        <h3>Double Cheese Burger</h3>
                        <p>Prepared with 2 beef patties, double cheese, burger sauce, pickles & onion</p>
                        <h4>Price: 950tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
                <td>
                    <div class="food-box">
                        <h3>Lil Smoke Burger</h3>
                        <p>Prepared with beef patty, cheese, bbq sauce, burger sauce, pickles & onion</p>
                        <h4>Price: 700tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="food-box">
                        <h3>Big Smoke</h3>
                        <p>Prepared with 2 beef patties, 2 slices cheese, bbq sauce & onion</p>
                        <h4>Price: 480tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
                <td>
                    <div class="food-box">
                        <h3>Juicy Burger</h3>
                        <p>Prepared with potato juice, beef patties, double cheese & burger sauce</p>
                        <h4>Price: 996tk</h4>
                        <center><a href="payment.php"><button type="button" class="button">Buy</button></a>
                        </center>
                    </div>
                </td>
            </tr>
        </table>

        <div>

        </div>

        <div>

        </div>
    </div>
</center>

<?php require 'footer.php' ?>