
<?php
if (!isset($menus)) {
    echo '$menu variable is not defined. Please check the code.';
}
?>
<div class='menu-container'>
    <div class='menu-row'>
    <?php
    // Cant combine functions with string so we have to assign the function to a variable here.
    $site_url = site_url();
    while ($menu = mysqli_fetch_array($menus)) {
        $dollarPrice = number_format("{$menu['price']}", 2);
        echo "
              <div>
                  <a href='{$site_url}/category-details.php?id={$menu['id']}'><img class='menu-img' src='{$site_url}{$menu['hero']}' alt=''></a>
              </div>
        ";
    }
?>
    </div>
</div>