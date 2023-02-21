<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$username_value = sanitize_value($_POST['username']);
$password_value = sanitize_value($_POST['pass']);

// Check to see if user already exists
get_user_by_username($username_value, $password_value);