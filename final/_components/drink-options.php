<div class="drinks-section">
  <h4>Drinks:</h4>
  <div class="drinks-groups">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="drinks-option">
      <label
        for='drinks-<?php echo $row['id']; ?>'><?php echo $row['drinkName']; ?></label>
      <div>
        <input
          id='drinks-<?php echo $row['id']; ?>'
          name='drinkID[]' type='checkbox'
          value='<?php echo $row['id']; ?>'>
      </div>
    </div>
    <?php } // End while loop ?>
    <hr>
  </div>
</div>