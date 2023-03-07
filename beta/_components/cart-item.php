<?php 

$price = intval($row['price']);
$quantity = intval($row['quantity']);
$orderTotal += $price * $quantity;
// $site_url = site_url();

?>
<li class="cart-item">
    <div class="cart-content">
        <div class="cart-image">
            <img src="<?php echo site_url(); ?><?php echo $row['img']?>" alt="" class="cart-item-image">
        </div>
        <div class="cart-item-text-content">
            <div class="cart-item-name-and-price">
                <h3 class="cart-item-name"><?php echo $row['cat']; ?></h3>
                <h3 class="cart-item-price"><?php echo $row['price']?></h3>
            </div>
            <p class="cart-item-description">chicken, mushroom, mayo</p>
            <div class="cart-item-actions">
                <div class="item-quantity">
                    <p class="quantity"><?php echo $quantity; ?></p>
                </div>
            </div>
        </div>
    </div>
</li>