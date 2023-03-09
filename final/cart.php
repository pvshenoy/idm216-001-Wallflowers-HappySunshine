<?php
include_once 'app.php';

$orderTotal = 0;

$query = "SELECT orders.id, orders.quantity, users.username, menu.id AS catID, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, GROUP_CONCAT(toppings.toppingName SEPARATOR ', ') AS toppingNames, GROUP_CONCAT(sides.sideName SEPARATOR ', ') AS sideNames, GROUP_CONCAT(drinks.drinkName SEPARATOR ', ') AS drinkNames, bread.breadName \n"

    . "FROM orders \n"

    . "INNER JOIN users ON orders.userID = users.id \n"

    . "INNER JOIN menu ON orders.catID = menu.id \n"

    . "LEFT JOIN protein ON orders.proteinID = protein.id \n"

    . "LEFT JOIN toppings ON FIND_IN_SET(toppings.id, orders.toppingID) > 0 \n"

    . "LEFT JOIN sides ON FIND_IN_SET(sides.id, orders.sideID) > 0 \n"

    . "LEFT JOIN drinks ON FIND_IN_SET(drinks.id, orders.drinkID) > 0 \n"

    . "LEFT JOIN bread ON orders.breadID = bread.id \n"

    . "WHERE users.id = '{$currentUser['id']}'"

    . "GROUP BY orders.id, orders.quantity, users.username, menu.id, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, bread.breadName";
 
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    echo '<ul class="cart-item-list">';
    while($row = $result->fetch_assoc()) {
        include '_components/cart-item.php';
    } // End while loop
    echo '</ul>';
} 
echo "$" . $orderTotal;

?>