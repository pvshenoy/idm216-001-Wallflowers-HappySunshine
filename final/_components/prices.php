<?php 

$quantity = intval($row['quantity']);
$price = intval($row['price']);
$orderTotal += $price * $quantity;
$orderTotalPrice = number_format("{$orderTotal}", 2);
// $site_url = site_url();

?>