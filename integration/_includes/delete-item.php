<?php
include __DIR__ . '/../app.php';
if (!$_POST) {
    die('Unauthorized');
}
$orderID = sanitize_value($_POST['orderID']);
// var_dump($cart_item_id);
// die;
global $db_connection;
    $query = "DELETE FROM orders WHERE id = '{$orderID}'";
    // var_dump($query);
    // die;
    $result = mysqli_query($db_connection, $query);
    redirect_to('/cart.php');
    echo("success");
?>