<?php 

include '_components/prices.php';
$id = $row['catID'];

?>
<li class="cart-item">
    <div class="cart-content">
        <div class="cart-image">
            <img src="<?php echo site_url(); ?><?php echo $row['img']?>" alt="" class="cart-item-image">
        </div>
        <div class="cart-item-text-content">
            <div class="cart-item-name-and-price">
                <h3 class="cart-item-name"><?php echo $row['cat']; ?></h3>
                <h3 class="cart-item-price">
                
                <?php 
                    if ($id == 10) {
                        $sideNamesArray = explode(', ', $row['sideNames']);
                        $sideNamesCount = count($sideNamesArray);
                        $price = ($row['price']) * $sideNamesCount;
                        echo "$" . $price;
                    }
                    elseif ($id == 11) {
                        $drinkNamesArray = explode(', ', $row['drinkNames']);
                        $drinkNamesCount = count($drinkNamesArray);
                        $price = ($row['price']) * $drinkNamesCount;
                        echo "$" . $price;
                    }
                    else {
                        echo "$" . $row['price'];
                    }
                ?>

                </h3>
            </div>
            <!-- for toppingName, it is going to have to loop through the array -->
            <p class="cart-item-description">
            
            <?php 
             if ($id == 10) {
                echo $row['sideNames'];
             }
             elseif ($id == 11) {
                echo $row['drinkNames'];
             }
             else {
                echo $row['proteinName'] . ", " . $row['toppingNames']; 
             }
            ?>
            
            </p>
            <div class="cart-item-actions">
                <div class="item-quantity">
                    <p class="quantity"><?php echo $quantity; ?></p>
                </div>
            </div>
        </div>
    </div>
</li>