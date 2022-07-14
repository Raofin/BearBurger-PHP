<?php
    require 'header.php';
    verifyNotLoggedIn();
    fetchFoodDetails($_REQUEST['id']);
?>

    <div class="form-container" id="payment-form">
        <form class="" method="POST">
            <div>
                <h1 class="payment-form-title">
                    <?php echo isset($_SESSION['foodTitle']) ? $_SESSION['foodTitle'] : 'Food Title (No food selected)'; ?>
                </h1>
                <p class="payment-description">
                    <?php echo isset($_SESSION['foodDescription']) ? $_SESSION['foodDescription'] : 'Food Description (No food selected)'; ?>
                </p>
                <p class="payment-price">
                    Price: <span id="price" class="white-back-text">
                        <?php echo isset($_SESSION['foodDescription']) ? $_SESSION['foodPrice'] : '00'; ?>tk
                    </span>
                </p>
            </div>

            <div class="currency-text">
                <h3 class="">Pay with:
                    <a id="taka" class="white-back-text">Taka</a>
                    <a id="dollar">Dollar</a>
                    <a id="pound">Pound</a>
                </h3>
            </div>

            <div>
                <h2 class="payment-title">Payment</h2>
                <table class="payment-table">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input autofocus id="name" name="name" placeholder="Enter your name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Card Number</td>
                        <td>
                            <input id="cardNumber" name="cardNumber" placeholder="Credit card number" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Exp Date</td>
                        <td>
                            <input id="expDate" name="expDate" placeholder="Enter expiration date" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Code CVV</td>
                        <td>
                            <input autocomplete="off" id="cvv" name="cvv" placeholder="Enter your code cvv"
                                   type="password">
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <div class="center-text">
                    <p id="message"></p>
                </div>
                <div class="center">
                    <input type="submit" value="Pay" class="button">
                </div>
            </div>
        </form>
    </div>

    <script src="js/payment.js"></script>

<?php require 'footer.php' ?>