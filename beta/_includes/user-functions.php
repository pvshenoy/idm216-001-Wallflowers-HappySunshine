<?php

// get all users from the database

function get_users()
{
    global $db_connection;
    $query = 'SELECT * FROM users';
    $result = mysqli_query($db_connection, $query);
    return $result;
}


/**
 * Insert a user into the database
 * @param string $first_name
 * @param string $last_name
 * @param string $email
 * @param string $phone
 * @return object - mysqli result
 */

function add_user ($username, $password)
{
    global $db_connection;

    $query = 'INSERT INTO users';
    $query .= ' (username, pass)';
    $query .= " VALUES ('{$username}', '{$password}')";
    $result = mysqli_query($db_connection, $query);
    return $result;
}


/**
 * Get user by id
 * @param integer $id
 * @return Array or false
 */
function get_user_by_id($id)
{
    global $db_connection;
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return false;
    }
}

/**
 * Edit existing user
 * @param  string $first_name - first name of the user
 * @param  string $last_name - last name of the user
 * @param  string $email - email of the user
 * @param  string $phone - phone number of the user
 * @param string $id_value - user ID
 * @return object - mysqli_result
 */


function get_user_by_username($username, $password)
{
    global $db_connection;
    $query = "SELECT id FROM users WHERE pass = '$password' AND username = '$username'";
    $result = mysqli_query($db_connection, $query);

    if ($result->num_rows > 0) {
        redirect_to('/main.php');
    } 
    else {
        $query = "INSERT INTO users (username, pass) VALUES ('$username', '$password')";
        $result2 = mysqli_query($db_connection, $query);

        if ($result2) {
            redirect_to('/main.php');
        } 
        else {
            $error_message = 'User was not created';
            redirect_to('/admin/recipes?error=' . $error_message);
        }
    }
}

?>