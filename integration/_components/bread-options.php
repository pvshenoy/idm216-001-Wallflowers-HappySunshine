<h4 class="ingredient-title">Bread: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">Choose 1</span></h4>
  <div class="protein">
    <?php while($row = $result->fetch_assoc()) { ?>
      <label
      class="radio-container" for='bread-<?php echo $row['id']; ?>'><?php echo $row['breadName']; ?>
    
      <input
          id='bread-<?php echo $row['id']; ?>'
          name='breadID' type='radio'
          value='<?php echo $row['id']; ?>' required>

      <span class="radio-button"></span>
    </label>
        
    <hr class="item-linebreak">
    <?php } // End while loop ?>
  </div>