<?php

    require_once 'DBConnection.php';

    // response to GET requests
    if (isset($_REQUEST['cat'])) fetchFoods($_REQUEST['cat']);
    if (isset($_REQUEST['search'])) searchFoods($_REQUEST['search']);

    // fetch foods by category
    function fetchFoods($category)
    {
        $query = "SELECT * FROM Foods
                  WHERE Category = '$category'";
        echoFoods(executeQuery($query));
    }

    // fetch foods by title
    function searchFoods($foodTitle)
    {
        $query = "SELECT * FROM Foods 
                  WHERE Title LIKE '%$foodTitle%'";
        echoFoods(executeQuery($query));
    }

    // fetch food details and store in the session variables
    function fetchFoodDetails($id)
    {
        $query = "SELECT * FROM Foods
                  WHERE FoodID = '$id'";

        $row = executeQuery($query)->fetch_assoc();
        $_SESSION['foodTitle'] = $row['Title'];
        $_SESSION['foodDescription'] = $row['Description'];
        $_SESSION['foodPrice'] = $row['Price'];
    }

    // echo food-box html
    function echoFoods($mysqliResult)
    {
        if ($mysqliResult->num_rows > 0)
            while ($row = $mysqliResult->fetch_assoc()) echo '        
        <td>
            <div class="food-box">
                <h2>' . $row['Title'] . '</h2>
                <p>' . $row['Description'] . '</p>
                <p class="food-price">Price: ' . $row['Price'] . 'tk</p>
                <div>
                    <a href="Payment.php?id=' . $row['FoodID'] . '"><button type="button" class="button">Buy</button></a>
                    <a href="FoodReview.php?id=' . $row['FoodID'] . '"><button type="button" class="button">Review</button></a>
                </div>
            </div>
        </td>';
    }