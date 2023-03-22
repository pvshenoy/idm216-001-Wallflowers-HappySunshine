<?php
include_once __DIR__ . '/app.php';
$page_title = "Menu";
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_components/headers/main-header.php';
include_once __DIR__ . '/_includes/menu-functions.php';
$menus = get_menu();
$site_url = site_url();
?>

<?php 
if (!$user['isGuest']) {
    
    global $db_connection;

    $query= "SELECT * FROM orders WHERE userID = {$user['id']} AND status = 'archived' AND catID != 'NULL'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) > 0) {

        echo "
        <main class='content'>
        <div class='order-details'>
            <h3 class='order-confirmation-details-text'>Your order is in<br> the works!</h3>
            <a href='{$site_url}/confirmation-details.php' class='general-button'>
                <button class='order-details-button increase-width'>VIEW ORDER DETAILS</button>
            </a>
            <img src='{$site_url}/dist/images/preeti-img/background-elements/clouds.png' alt='' class='clouds'>
            <img src='{$site_url}/dist/images/preeti-img/background-elements/drinks.png' alt='' class='three-drinks'>
        </div> 
         <h2 class='hero-statement'>
             What are you hungry for, <span class='blue-text'>{$user['username']}</span>?
         </h2>
         <div class='menu-categories'>
        ";
    }
    else {
        echo "
        <main class='content'> 
         <h2 class='hero-statement'>
             What are you hungry for, <span class='blue-text'>{$user['username']}</span>?
         </h2>
         <div class='menu-categories'>
        ";
    }
}
else {
    echo "
    <main class='content'>
    <h2 class='hero-statement'>
        What are you hungry for?
    </h2>
    <div class='menu-categories'>
    ";
}
?>

<?php include __DIR__ . '/_components/category-menu.php';?>

<?php include_once __DIR__ . '/_includes/mobile-footer.php';?>