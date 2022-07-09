<?php
require 'header.php';
verifyNotLoggedIn();
?>

<div class="center">
    <form class="form-user-profile payment" method="post">
        <h1>Food Details</h1>
        <h3 style="padding-bottom: 10px;">Cheese Burger</h3>
        <p style="padding-bottom: 10px;">Prepared with beef patty, cheese, burger sauce, pickles & onion.</p>
        <h3>Price: <span class="white-back-text">£6.13</span> </h3>
        <br>
        <div class="currency-text">
            <h3 class="">Pay using<a href="payment.php">Taka</a><a href="paymentDollar.php">Dollar</a><a href="paymentPound.php">Pound</a></h3>
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
                    <td><input type="password" id="cvv" name="cvv" value="" placeholder="Enter your code cvv"></td>
                </tr>
            </table>
        </center>
        <br>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') pay() ?>
        <input type="submit" value="Pay" class="button" style="margin: 0;">
    </form>
</div>

<?php require 'footer.php' ?>