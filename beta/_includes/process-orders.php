<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability

//how do i get the category id? i know its in the url that they choose
$protein_value = sanitize_value($_POST['protein']);
$toppings_value = sanitize_value($_POST['toppings']);


global $db_connection;
$query = "SELECT id FROM protein WHERE proteinName = '$protein_value'";
$result = mysqli_query($db_connection, $query);

if ($result->num_rows > 0) {
    $query = "INSERT INTO orders (protID) VALUES ('$result')";
    $result2 = mysqli_query($db_connection, $query);
} 
else {
    $error_message = 'protein was not added';
    redirect_to('/admin/recipes?error=' . $error_message);
}

?>