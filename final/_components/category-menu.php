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
        echo "
              <div>
                  <a href='../category-details.php?id={$menu['id']}'><img class='menu-img' src='..{$menu['img']}' alt=''></a>
                  <div class='top-line'>
                      <h3>{$menu['cat']}</h3>
                      <p>{$menu['price']}</p>
                  </div>
                  <p>{$menu['descrip']}</p>
              </div>
        ";
    }
?>
    </div>
</div>