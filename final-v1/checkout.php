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


$query= "SELECT amount FROM users WHERE user = {$user['id']}";
$result = mysqli_query($db_connection, $query);
$count = $user['amount'] + 1;

// LOGIC FOR REWARDS
        
if ($count < 10) {
    $ordersLeft = 10 - $count;
    if ($ordersLeft == 1) {
        echo $ordersLeft . ' order until you get a free thai tea </br>';
    }
    else {
        echo $ordersLeft . ' orders until you get a free thai tea </br>';
    }
}
elseif ($count % 10 == 0) {
    echo 'you get a free thai tea! </br>';
}
else {
    $remainder = $count % 10;
    $ordersLeft = 10 - $remainder;
    if ($ordersLeft == 1) {
        echo $ordersLeft . ' order until you get a free thai tea </br>';
    }
    else {
        echo $ordersLeft . ' orders until you get a free thai tea </br>';
    }
}


echo "$" . $orderTotalPrice;


?>

<a href="<?php echo "{$site_url}/confirmation.php" ?>">pay</a>