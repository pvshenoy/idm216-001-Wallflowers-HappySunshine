<?php

/**
 * get all users from the database
 * @return object - mysqli_result
 */
function get_menu()
{
    global $db_connection;
    $query = 'SELECT * FROM menu';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_order_by_user_id($userID) {
    global $db_connection;
    $query = "SELECT orders.id, orders.quantity, users.username, users.amount, menu.id AS catID, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, GROUP_CONCAT(toppings.toppingName SEPARATOR ', ') AS toppingNames, GROUP_CONCAT(sides.sideName SEPARATOR ', ') AS sideNames, GROUP_CONCAT(drinks.drinkName SEPARATOR ', ') AS drinkNames, GROUP_CONCAT(drinks.drinkPrice SEPARATOR ', ') AS drinkPrices, bread.breadName \n"

    . "FROM orders \n"

    . "INNER JOIN users ON orders.userID = users.id \n"

    . "INNER JOIN menu ON orders.catID = menu.id \n"

    . "LEFT JOIN protein ON orders.proteinID = protein.id \n"

    . "LEFT JOIN toppings ON FIND_IN_SET(toppings.id, orders.toppingID) > 0 \n"

    . "LEFT JOIN sides ON FIND_IN_SET(sides.id, orders.sideID) > 0 \n"

    . "LEFT JOIN drinks ON FIND_IN_SET(drinks.id, orders.drinkID) > 0 \n"

    . "LEFT JOIN bread ON orders.breadID = bread.id \n"

    . "WHERE users.id = '{$userID}' AND status = 'active'"

    . "GROUP BY orders.id, orders.quantity, users.username, users.amount, menu.id, menu.cat, menu.price, menu.descrip, menu.img, protein.proteinName, protein.proteinPrice, bread.breadName";
    
    // . "ORDER BY id DESC LIMIT 1";
 
    $result = mysqli_query($db_connection, $query);

    return $result;

}