<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$username_value = sanitize_value($_POST['username']);
$phone_value = sanitize_value($_POST['phone']);
$password_value = sanitize_value($_POST['pass']);
$newUser = get_user_by_username($username_value, $phone_value, $password_value);
// var_dump($user);
// var_dump($newUser);
// die;
// Check there are no errors with our SQL statement
if ($newUser) {
    
    //update current user order, replace id with newuser id 
    $query = "UPDATE orders SET userID = {$newUser['id']} WHERE userID = {$user['id']} ORDER BY id";

    // var_dump($query);
    // var_dump($user);
    // var_dump($userOrder);
    // die;
    $result = mysqli_query($db_connection, $query);
    delete_user_by_id($user['id']);
    add_user_to_session($newUser);
   
    redirect_to('/checkout.php');   
} else {
    $error_message = 'User was not logged in: ' . mysqli_error($db_connection);
    redirect_to('/auth/login.php?error=' . $error_message);
}