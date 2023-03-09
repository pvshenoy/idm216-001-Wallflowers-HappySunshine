<div class="bread-section">
  <h4>Bread: <span>Choose 1</span></h4>
  <div class="bread-groups">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="bread-option">
      <label
        for='bread-<?php echo $row['id']; ?>'><?php echo $row['breadName']; ?></label>
      <div>
        <input
          id='bread-<?php echo $row['id']; ?>'
          name='breadID' type='radio'
          value='<?php echo $row['id']; ?>'>
      </div>
    </div>
    <?php } // End while loop ?>
    <hr>
  </div>
</div>