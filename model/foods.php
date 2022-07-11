<?php

require_once 'dbConnection.php';

if (isset($_REQUEST['cat']))
    fetchFoods($_REQUEST['cat']);

function fetchFoods($catagory)
{
    $mysqli = connect();
    $query = "SELECT * FROM bearburger.foods
              WHERE catagory = '$catagory'";

    $data = $mysqli->query($query);
    $mysqli->close();

    $newLine = 1;
    if ($data->num_rows > 0)
        while ($row = $data->fetch_assoc()) {
            echo '         
            <td>   
                <div class="food-box">
                    <h3>' . $row['title'] . '</h3>
                    <p>' . $row['description'] . '</p>
                    <h4>Price: ' . $row['price'] . 'tk</h4>
                    <center>
                        <div class="">
                        <a href="payment.php?id=' . $row['id'] . '"><button type="button" class="button">Buy</button></a><a href="foodReview.php"><button type="button" class="button">Review</button></a>
                        </div>                    
                    </center>
                </div>
            </td>';

            if ($newLine !== 1) {
                echo '</tr>';
                $newLine = 1;
            } else $newLine = 0;
        }
}

function fetchFoodDetails($id)
{
    $mysqli = connect();
    $query = "SELECT * FROM bearburger.foods
              WHERE id = '$id'";

    $data = $mysqli->query($query);
    $mysqli->close();

    $row = $data->fetch_assoc();
    $_SESSION['foodTitle'] = $row['title'];
    $_SESSION['foodDescription'] = $row['description'];
    $_SESSION['foodPrice'] = $row['price'];
}
