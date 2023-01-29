<?php
if (!isset($recipes)) {
    echo '$recipe variable is not defined. Please check the code.';
}
?>
<div class='recipe-container'>
    <div class='recipe-row'>
    <?php
    // Cant combine functions with string so we have to assign the function to a variable here.
    $site_url = site_url();
    while ($recipe = mysqli_fetch_array($recipes)) {
        echo "
              <div class='recipe'>
                  <a href='{$site_url}/details.php?id={$recipe['id']}'><img class='table-img' src='{$site_url}{$recipe['imagePath']}' alt=''></a>
                  <div class='top-line'>
                      <h3>{$recipe['title']}</h3>
                      <p>{$recipe['cal']} cals.</p>
                  </div>
                  <p>Cook Time . . . . . . . . . . . . . . . . . . . . . . {$recipe['cookTime']} mins</p>
              </div>
        ";
    }
?>
    </div>
</div>