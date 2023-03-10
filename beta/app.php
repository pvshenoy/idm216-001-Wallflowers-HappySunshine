<?php
/**
 * This file is used store all the business
 * logic for the application.
 */

// An array of values that will determine if you're working locally or on a production server.
// @link https://stackoverflow.com/questions/2053245/how-can-i-detect-if-the-user-is-on-localhost-in-php
$whitelist_host = ['127.0.0.1', '::1'];
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist_host)) {
    // You are in the Local environment. Pull in the correct .env file.
    if (file_exists(__DIR__ . '/.env.local.php')) {
        include_once __DIR__ . '/.env.local.php';
    } else {
        die('Please make sure you have a .env.local.php file');
    }
} else {
    // You are in the Production environment. Pull in the correct .env file.
    if (file_exists(__DIR__ . '/.env.production.php')) {
        // holds global variables for the entire application
        include_once __DIR__ . '/.env.production.php';
    } else {
        // if the file does not exist, throw an error
        die('Please make sure you have a .env.production.php file');
    }
}

// Include the database connection. Order matters and should always be first
include_once __DIR__ . '/_includes/database.php';
include_once __DIR__ . '/_includes/helper-functions.php';
include_once __DIR__ . '/_includes/user-functions.php';

//make sure everything works here then split out into users functions and call here

// check if there is a user in session (logged in)
// if no user, create guest user up unitl check in page 

//create function to insert dummy user data into database 
//maybe make is guest user column to easily delete and differentiate real from guest

//login page check if guest user
//then after login, upadte orders with new user id order
//then delete previous guest user

$currentUser = ["id" => 3];
