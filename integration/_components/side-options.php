<h4 class="ingredient-title">Sides: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">Optional</span></h4>
  <div class="toppings bottom-margin">
    <?php while($row = $result->fetch_assoc()) { ?>
      <label
      class="container" for='toppings-<?php echo $row['id']; ?>'><?php echo $row['sideName']; ?>
    
      <input
          id='toppings-<?php echo $row['id']; ?>'
          name='sideID[]' type='checkbox'
          value='<?php echo $row['id']; ?>'>

      <span class="checkmark"></span>
    </label>
        
    <hr class="item-linebreak">
    <?php } // End while loop ?>
  </div>