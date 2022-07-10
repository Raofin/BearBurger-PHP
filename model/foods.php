<?php

function fetchFoods($catagory)
{
    $connection = connect();
    $query = "SELECT * FROM bearburger.foods
              WHERE catagory = '$catagory'";

    $result = $connection->query($query);
    $connection->close();

    $newLine = true;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc()) {
            if ($newLine == true) echo '<tr>';
            echo '         
            <td>   
                <div class="food-box">
                    <h3>' . $row['title'] . '</h3>
                    <p>' . $row['description'] . '</p>
                    <h4>Price: ' . $row['price'] . 'tk</h4>
                    <center>
                        <div class="">
                        <a href="payment.php"><button type="button" class="button">Buy</button></a><a href="foodReview.php"><button type="button" class="button">Review</button></a>
                        </div>                    
                    </center>
                </div>
            </td>';

            if ($newLine !== true) {
                echo '</tr>';
                $newLine = true;
            } else $newLine = false;
        }

    return $result->num_rows > 0;
}
