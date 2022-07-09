<?php

function readJson($json)
{
    return json_decode(file_get_contents(__DIR__ . '/../model/' . $json), true);
}

function search()
{
    $foods = readJson('foods.json');
    $found = false;

    echo '<center>';
    foreach ($foods as $item) {
        if (strpos(strtolower($item['title']), strtolower($_POST['search'])) !== false) {
            $found = true;
            echo '         
            <td>   
                <div class="food-box">
                    <h3>' . $item['title'] . '</h3>
                    <p>' . $item['description'] . '</p>
                    <h4>Price: ' . $item['price'] . 'tk</h4>
                    <center>
                    <div class="">
                    <a href="payment.php"><button type="button" class="button">Buy</button></a><a href="foodReview.php"><button type="button" class="button">Review</button></a>
                    </div>
                    
                    </center>
                </div>
            </td>
            <br>';
        }
    }
    if (!$found)
        echo '<h3 style="color:tomato;">Sorry ' . $_SESSION['username'] . '! ' . $_POST['search'] . ' is not available.</h3>';

    echo '</center>';
}
