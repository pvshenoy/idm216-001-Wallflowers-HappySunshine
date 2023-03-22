<?php
include __DIR__ . '/../app.php';
if (!$_POST) {
    die('Unauthorized');
}
$orderID = sanitize_value($_POST['orderID']);
// var_dump($cart_item_id);
// die;
global $db_connection;
    $query = "SELECT quantity FROM orders WHERE id = '{$orderID}'";
    $result = mysqli_query($db_connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];

        if ($quantity == 1) {
            redirect_to('/cart.php');
        }

        $newQuantity = $quantity - 1;
    }

    $query= "UPDATE orders SET quantity = {$newQuantity} WHERE id = {$orderID}";
    // var_dump($query);
    // die;
    $result = mysqli_query($db_connection, $query);
    redirect_to('/cart.php');
    echo("success");
?>