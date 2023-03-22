<div class="protein-section">
  <h4>Protein: <span>Choose 1</span></h4>
  <div class="protein-groups">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="protein-option">
      <label
        for='protein-<?php echo $row['id']; ?>'><?php echo $row['proteinName']; ?></label>
      <div>
        <input
          id='protein-<?php echo $row['id']; ?>'
          name='proteinID' type='radio'
          value='<?php echo $row['id']; ?>' required>
      </div>
    </div>
    <?php } // End while loop ?>
    <hr>
  </div>
</div>