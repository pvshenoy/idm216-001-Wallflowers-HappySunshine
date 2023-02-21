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