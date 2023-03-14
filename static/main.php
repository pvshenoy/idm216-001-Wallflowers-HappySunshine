<?php
include_once __DIR__ . '/app.php';
$page_title = "Menu";
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_includes/menu-functions.php';
$menus = get_menu();
?>

<h1>Happy Sunshine Menu</h1>

<?php include __DIR__ . '/_components/category-menu.php';?>

<?php include_once __DIR__ . '/_components/footer.php';?>