<h4 class="ingredient-title">Protein: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">Choose 1</span></h4>
  <div class="protein">
    <?php while($row = $result->fetch_assoc()) { ?>
      <label
      class="radio-container" for='protein-<?php echo $row['id']; ?>'><?php echo $row['proteinName']; ?>
    
      <input
          id='protein-<?php echo $row['id']; ?>'
          name='proteinID' type='radio'
          value='<?php echo $row['id']; ?>' required>

      <span class="radio-button"></span>
      <h3 class="price-addition"><?php echo ' $' . number_format("{$row['proteinPrice']}", 2); ?></h3>
    </label>
        
    <hr class="item-linebreak">
    <?php } // End while loop ?>
  </div>
