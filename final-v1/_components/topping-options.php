<div class="toppings-section">
  <h4>Toppings: <span>Optional</span></h4>
  <div class="toppings-groups">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="toppings-option">
      <label
        for='toppings-<?php echo $row['id']; ?>'><?php echo $row['toppingName']; ?></label>
      <div>
        <input
          id='toppings-<?php echo $row['id']; ?>'
          name='toppingID[]' type='checkbox'
          value='<?php echo $row['id']; ?>'>
      </div>
    </div>
    <?php } // End while loop ?>
    <hr>
  </div>
</div>