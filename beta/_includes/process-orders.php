<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}



// Store $_POST data to variables for readability

//required values
$userID_value = sanitize_value($_POST['userID']);
$catID_value = sanitize_value($_POST['catID']);

// optional values
$protein_value = isset($_POST['proteinID']) ? sanitize_value($_POST['proteinID']) : 0;
$topping_value = isset($_POST['toppingID']) ? sanitize_value(implode(",", $_POST['toppingID'])) : 0;
$side_value = isset($_POST['sideID']) ? sanitize_value($_POST['sideID']) : 0;
$drink_value = isset($_POST['drinkID']) ? sanitize_value($_POST['drinkID']) : 0;
$bread_value = isset($_POST['breadID']) ? sanitize_value($_POST['breadID']) : 0;


$query = "INSERT INTO orders (userID, catID, proteinID, toppingID, sideID, drinkID, breadID) VALUES ('{$userID_value}', '{$catID_value}', '{$protein_value}', '{$topping_value}', '{$side_value}', '{$drink_value}', '{$bread_value}')";
$result = mysqli_query($db_connection, $query);

if ($result) {
    //redirect to cart page
} 
else {
    $error_message = 'info was not added';
    // redirect_to('/admin/recipes?error=' . $error_message);
}

?>