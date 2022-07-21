<?php
    require 'Header.php';
    verifyNotLoggedIn();
    fetchFoodDetails($_REQUEST['id']);
?>

    <div class="form-container" id="payment-form">
        <form method="POST">
            <div>
                <h1 class="payment-form-title">
                    <?php echo isset($_SESSION['foodTitle']) ? $_SESSION['foodTitle'] : 'Food Title (No food selected)'; ?>
                </h1>
                <p class="payment-description">
                    <?php echo isset($_SESSION['foodDescription']) ? $_SESSION['foodDescription'] : 'Food Description (No food selected)'; ?>
                </p>
                <p class="payment-price">
                    <b>Price: </b><span id="price" class="white-back-text">
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
                        <td><label for="name">Name</label></td>
                        <td><input id="name" name="name" placeholder="Enter your name" type="text"
                                   value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="card-number">Card Number</label></td>
                        <td><input autofocus id="card-number" name="cardNumber" placeholder="0000 0000 0000 0000" type="text"></td>
                    </tr>
                    <tr>
                        <td><label for="exp-date">Exp Date</label></td>
                        <td><input id="exp-date" maxlength="5" name="expDate" placeholder="MM/YY" type="text" ></td>
                    </tr>
                    <tr>
                        <td><label for="cvv">Code CVV</label></td>
                        <td><input id="cvv" maxlength="3" name="cvv" placeholder="***" type="password"></td>
                    </tr>
                </table>
            </div>

            <div>
                <div class="center-text">
                    <p id="message"></p>
                </div>
                <div class="center">
                    <input class="button" id="pay" type="submit" value="Pay">
                </div>
            </div>
        </form>
    </div>

    <script src="../../public/js/Payment.js"></script>

<?php include 'Footer.php' ?>