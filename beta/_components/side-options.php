<div class="sides-section">
  <h4>Sides:</h4>
  <div class="sides-groups">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="sides-option">
      <label
        for='sides-<?php echo $row['id']; ?>'><?php echo $row['sideName']; ?></label>
      <div>
        <input
          id='sides-<?php echo $row['id']; ?>'
          name='sideID' type='checkbox'
          value='<?php echo $row['id']; ?>'>
      </div>
    </div>
    <?php } // End while loop ?>
    <hr>
  </div>
</div>