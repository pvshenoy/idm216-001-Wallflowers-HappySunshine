<?php 

include '_components/prices.php';

?>
<li class="cart-item">
    <div class="cart-content">
        <div class="cart-image">
            <img src="<?php echo site_url(); ?><?php echo $row['img']?>" alt="" class="cart-item-image">
        </div>
        <div class="cart-item-text-content">
            <div class="cart-item-name-and-price">
                <h3 class="cart-item-name"><?php echo $drinkName; ?></h3>
                <h3 class="cart-item-price"><?php echo "$" . $row['price'];?></h3>
            </div>
            <!-- for toppingName, it is going to have to loop through the array -->
            <p class="cart-item-description"><?php echo $row['proteinName'] . ", " . $row['toppingNames']; ?></p>
            <div class="cart-item-actions">
                <div class="item-quantity">
                    <p class="quantity"><?php echo $quantity; ?></p>
                </div>
            </div>
        </div>
    </div>
</li>