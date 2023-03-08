<?php
include_once 'app.php';

$orderTotal = 0;

$query = "SELECT orders.id, orders.quantity, users.username, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, GROUP_CONCAT(toppings.toppingName SEPARATOR ', ') AS toppingNames, sides.sideName, drinks.drinkName, bread.breadName \n"

    . "FROM orders \n"

    . "INNER JOIN users ON orders.userID = users.id \n"

    . "INNER JOIN menu ON orders.catID = menu.id \n"

    . "LEFT JOIN protein ON orders.proteinID = protein.id \n"

    . "LEFT JOIN toppings ON FIND_IN_SET(toppings.id, orders.toppingID) > 0 \n"

    . "LEFT JOIN sides ON orders.sideID = sides.id \n"

    . "LEFT JOIN drinks ON orders.drinkID = drinks.id \n"

    . "LEFT JOIN bread ON orders.breadID = bread.id \n"

    . "WHERE users.id = '{$currentUser['id']}'"

    . "GROUP BY orders.id, orders.quantity, users.username, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, sides.sideName, drinks.drinkName, bread.breadName";
 
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