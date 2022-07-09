<?php

function readJson($json)
{
    return json_decode(file_get_contents(__DIR__ . '/../model/' . $json), true);
}

function loadFoods($foodCatagory)
{
    $foods = readJson($foodCatagory);
    $flag = 1;

    foreach ($foods as $item) {
        if ($flag == 1) echo '<tr>';

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
            </td>';

        if ($flag !== 1) {
            echo '</tr>';
            $flag = 1;
        } else {
            $flag = 2;
        }
    }
}
