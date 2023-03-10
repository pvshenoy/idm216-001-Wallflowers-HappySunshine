<?php 

$id = $row['catID'];
$quantity = intval($row['quantity']);

if ($id ==1 ) {
    $price = ($row['price']) + $row['proteinPrice'];
    $orderTotal += $price * $quantity;
}
elseif ($id == 10) {
    $sideNamesArray = explode(', ', $row['sideNames']);
    $sideNamesCount = count($sideNamesArray);
    $price = ($row['price']) * $sideNamesCount;
    $orderTotal += $price;
}
elseif ($id == 11) {
    $drinkNamesArray = explode(', ', $row['drinkNames']);
    $drinkNamesCount = count($drinkNamesArray);
    $price = ($row['price']) * $drinkNamesCount;
    $orderTotal += $price;
}
else {
    $price = floatval($row['price']);
    $orderTotal += $price * $quantity;
}

$orderTotalPrice = number_format("{$orderTotal}", 2);

?>