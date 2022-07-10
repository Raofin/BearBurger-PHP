<?php
require 'header.php';
verifyNotLoggedIn();
?>

<div class="center">
    <form class="form-user-profile payment" name="a" method="post">
        <h1>Food Details</h1>
        <h3 style="padding-bottom: 10px;">Cheese Burger</h3>
        <p style="padding-bottom: 10px;">Prepared with beef patty, cheese, burger sauce, pickles & onion.</p>
        <h3>Price: <span id="price" class="white-back-text">690tk</span> </h3>
        <br>
        <div class="currency-text">
            <h3 class="">Pay using
                <a href="" id="taka">Taka</a>
                <a href="" id="dollar">Dollar</a>
                <a href="" id="pound">Pound</a>
            </h3>
        </div>
        <br>
        <h1>Payment</h1>
        <center>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="name" name="name" value="" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Card Number</td>
                    <td><input type="text" id="cardNumber" name="cardNumber" value="" placeholder="Credit card number"></td>
                </tr>
                <tr>
                    <td>Exp Date</td>
                    <td><input type="text" id="expDate" name="expDate" value="" placeholder="Enter expiration date"></td>
                </tr>
                <tr>
                    <td>Code CVV</td>
                    <td><input type="password" id="cvv" name="cvv" value="" placeholder="Enter your code cvv" autocomplete="on"></td>
                </tr>
            </table>
        </center>
        <div id="message" class="center-text"></div>
        <br>
        <!-- <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') pay() ?> -->
        <input type="submit" value="Pay" class="button" style="margin: 0;">
    </form>
</div>

<script src="js/payment.js"></script>

<?php require 'footer.php' ?>