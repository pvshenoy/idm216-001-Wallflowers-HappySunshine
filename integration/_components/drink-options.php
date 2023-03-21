<h4 class="ingredient-title">Drinks: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">Optional</span></h4>
  <div class="toppings bottom-margin">
    <?php while($row = $result->fetch_assoc()) { ?>
      <label
      class="container" for='toppings-<?php echo $row['id']; ?>'><?php echo $row['drinkName']; ?>
    
      <input
          id='toppings-<?php echo $row['id']; ?>'
          name='drinkID[]' type='checkbox'
          value='<?php echo $row['id']; ?>'>

      <span class="checkmark"></span>
      <h3 class="price-addition"><?php echo ' $' . number_format("{$row['drinkPrice']}", 2); ?></h3>
    </label>
        
    <hr class="item-linebreak">
    <?php } // End while loop ?>
  </div>