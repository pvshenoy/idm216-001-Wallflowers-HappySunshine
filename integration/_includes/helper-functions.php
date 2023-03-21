<?php
/**
 * This file will hold all the functions for your project.
 */

function get_project_path()
{
    global $APP_CONFIG;
    if ($APP_CONFIG['environment'] === 'development') {
        return $_SERVER['DOCUMENT_ROOT'] . '/idm216/final';
    } else {
        return $_SERVER['DOCUMENT_ROOT'] . '/final';
    }
}

/**
 * Get the site URL defined in your .env file
 * @return string - The site URL | example: http://localhost:8888/final
 */
function site_url()
{
    global $APP_CONFIG;
    return $APP_CONFIG['site_url'];
}

/**
 * Redirect to any path
 * @param  string $path - The path to redirect to
 */

function redirect_to($path)
{
    $full_url = site_url() . $path;
    // Bluehost doesn't like when you use header() to redirect so we'll use JS instead
    // header('Location: ' . $full_url);
    echo "<script>window.location = '$full_url';</script>";
    exit;
}

/**
 * Get current project root directory path
 * @return string - The path to the project root directory
 */
function project_root()
{
    return dirname(__FILE__);
}

/**
 * return date and time in the correct
 * mysqi 'datetime' format
 *
 * @return string
 */
function getFormattedDateTime()
{
    return  date('Y-m-d H:i:s');
}

function sanitize_value($value)
{
    global $db_connection;
    return mysqli_real_escape_string($db_connection, $value);
}

/**
 * Check if user is logged in via session
 */
function is_user_logged_in()
{
    return isset($_SESSION['user']);
}

//ADDED FOR LOGIN - NEED TO SEE TABLE
function getCartItems($orderId){
    global $db_connection;
    $query ="SELECT * FROM cart_item INNER JOIN menu ON cart_item.menu_id = menu.id 
    WHERE cart_item.order_id = '{$orderId}'";
    $result = mysqli_query($db_connection, $query);
    return $result;
}