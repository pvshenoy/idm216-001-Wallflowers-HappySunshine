<?php
include_once 'app.php';
$site_url = site_url();


($user['isGuest']==0) ? "success": redirect_to('/auth/login.php') ;

$orderTotal = 0;
$order = get_order_by_user_id($user['id']);


if ($order->num_rows > 0) {
    echo '<ul class="cart-item-list">';
    while($row = $order->fetch_assoc()) {
        include '_components/checkout-item.php';
    } // End while loop
    echo '</ul>';
} 
echo "$" . $orderTotalPrice;

$current_date = date('m-d-y');

global $db_connection;
   
$query= "UPDATE orders SET status = 'archived', total = {$orderTotalPrice}, orderDate = '{$current_date}' WHERE userID = {$user['id']}";
$result = mysqli_query($db_connection, $query);

?>

<a href="<?php echo "{$site_url}/main.php" ?>">X</a>