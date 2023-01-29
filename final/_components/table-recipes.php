<?php
if (!isset($recipes)) {
    echo '$recipe variable is not defined. Please check the code.';
}
?>
<table>
  <thead>
    <tr class="table-row-header">
      <!-- <td class="table-header" scope="col">ID</td> -->
      <td class="table-header table-title">Title</td>
      <td class="table-header table-nums">Calories</td>
      <td class="table-header table-nums">Time</td>
      <td class="table-header table-nums"></td>
      <!-- <td class="table-header" scope="col"><span>Overview</span></td> -->
    </tr>
  </thead>
  <tbody>
    <?php
    // Cant combine functions with string so we have to assign the function to a variable here.
    $site_url = site_url();
    while ($recipe = mysqli_fetch_array($recipes)) {
        echo "
          <tr class='table-row'>
            <td><a class='admin-link' href='{$site_url}/details.php?id={$recipe['id']}'>{$recipe['title']}</a></td>
            <td class='table-nums'>{$recipe['cal']}</td>
            <td class='table-nums'>{$recipe['cookTime']}</td>
            <td class='table-buttons'>
              <a href='{$site_url}/admin/recipes/edit.php?id={$recipe['id']}'><img class='edit-img' src='../../dist/images/edit.png' alt=''></a>
              <a href='{$site_url}/admin/recipes/delete.php?id={$recipe['id']}'><img class='delete-img' src='../../dist/images/delete.png' alt=''></a>
            </td>
          </tr>";
    }
?>
  </tbody>
</table>