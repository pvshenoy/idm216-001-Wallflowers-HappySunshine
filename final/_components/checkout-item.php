<?php 

include '_components/prices.php';
$id = $row['catID'];

?>
<li class="checkout-item">
    <div class="checkout-content">
        <div class="checkout-item-text-content">
            <div class="checkout-item-name-and-price">
                <h3 class="checkout-item-name"><?php echo $row['cat']; ?></h3>
                <h3 class="checkout-item-price">
                
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
            <div class="checkout-item-actions">
                <div class="item-quantity">
                    <p class="quantity">
                        <?php 
                            if ($id == 10) {
                                $sideNamesArray = explode(', ', $row['sideNames']);
                                $sideNamesCount = count($sideNamesArray);
                                $sideQuantity = $quantity * $sideNamesCount;
                                echo $sideQuantity;
                            }
                            elseif ($id == 11) {
                                $drinkNamesArray = explode(', ', $row['drinkNames']);
                                $drinkNamesCount = count($drinkNamesArray);
                                $drinkQuantity = $quantity * $drinkNamesCount;
                                echo $drinkQuantity;
                            }
                            else {
                                echo $quantity;
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</li>