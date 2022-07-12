<?php

    require_once 'dbConnection.php';

    if (isset($_REQUEST['cat']))
        fetchFoods($_REQUEST['cat']);

    if (isset($_REQUEST['search']))
        searchFoods($_REQUEST['search']);

    function fetchFoods($category)
    {
        $mysqli = connect();
        $query = "SELECT * FROM Foods
                  WHERE Category = '$category'";

        $data = $mysqli->query($query);
        $mysqli->close();

        $newLine = 1;
        if ($data->num_rows > 0)
            while ($row = $data->fetch_assoc()) {
                echo '         
            <td>   
                <div class="food-box">
                    <h3>' . $row['Title'] . '</h3>
                    <p>' . $row['Description'] . '</p>
                    <h4>Price: ' . $row['Price'] . 'tk</h4>
                    <center>
                        <div class="">
                        <a href="payment.php?id=' . $row['FoodID'] . '"><button type="button" class="button">Buy</button></a><a href="foodReview.php"><button type="button" class="button">Review</button></a>
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


    function searchFoods($foodTitle)
    {
        $mysqli = connect();
        $query = "SELECT * FROM Foods 
                  WHERE Title LIKE '%$foodTitle%'";

        $data = $mysqli->query($query);
        $mysqli->close();

        $newLine = 1;
        if ($data->num_rows > 0)
            while ($row = $data->fetch_assoc()) {
                echo '         
            <td>   
                <div class="food-box">
                    <h3>' . $row['Title'] . '</h3>
                    <p>' . $row['Description'] . '</p>
                    <h4>Price: ' . $row['Price'] . 'tk</h4>
                    <center>
                        <div>
                        <a href="payment.php?id=' . $row['FoodID'] . '"><button type="button" class="button">Buy</button></a>
                        <a href="foodReview.php"><button type="button" class="button">Review</button></a>
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
        $query = "SELECT * FROM Foods
                  WHERE FoodID = '$id'";

        $data = $mysqli->query($query);
        $mysqli->close();

        $row = $data->fetch_assoc();
        $_SESSION['foodTitle'] = $row['Title'];
        $_SESSION['foodDescription'] = $row['Description'];
        $_SESSION['foodPrice'] = $row['Price'];
    }
