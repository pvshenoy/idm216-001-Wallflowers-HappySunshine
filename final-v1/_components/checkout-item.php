<?php 

include '_components/prices.php';
$id = $row['catID'];

?>
<li class="checkout-item">
    <div class="checkout-content">
        <div class="checkout-item-text-content">
            <div class="checkout-item-name-and-price">
                <h3 class="checkout-item-name"><?php echo $row['cat']; ?></h3>
                <p class="cart-item-description">
            
                <?php 
            
                if ($id == 1) {
                if (!$row['toppingNames']) {
                    echo $row['breadName'] . ", " . $row['proteinName'] . " (+$" . number_format("{$row['proteinPrice']}", 2) . ')';
                    }
                    else {
                    echo $row['breadName'] . ", " . $row['proteinName'] . " (+$" . number_format("{$row['proteinPrice']}", 2) . ')' . ", " . $row['toppingNames'];
                    }
                }
                elseif ($id == 10) {
                echo $row['sideNames'];
                }
                elseif ($id == 11) {
                $drinkPrices = explode(',', $row['drinkPrices']);
                $drinkNames = explode(',', $row['drinkNames']);
                $drinkString = '';
                foreach ($drinkPrices as $index => $drinkPrice) {
                    $drinkString .= $drinkNames[$index] . ' ($' . $drinkPrice . '), ';
                }
                // Remove the trailing comma and space from the string
                $drinkString = rtrim($drinkString, ', ');
                echo $drinkString . '<br>';

                // echo $row['drinkNames'] . " (+$" . number_format("{$row['drinkPrices']}", 2) . ')';
                }
                else {
                    if (!$row['toppingNames']) {
                    echo $row['proteinName'];
                    }
                    else {
                    echo $row['proteinName'] . ", " . $row['toppingNames'];
                    }
                }
                ?>
                
                </p>
                <h3 class="checkout-item-price">
                
                <?php 
                    if ($id ==1 ) {
                        $price = ($row['price']) + $row['proteinPrice'];
                        $finalPrice = number_format("{$price}", 2);
                        echo "$" . $finalPrice;
                    }
                    elseif ($id == 10) {
                        $sideNamesArray = explode(', ', $row['sideNames']);
                        $sideNamesCount = count($sideNamesArray);
                        $price = ($row['price']) * $sideNamesCount;
                        $finalPrice = number_format("{$price}", 2);
                        echo "$" . $finalPrice;
                    }
                    elseif ($id == 11) {
                        $totalDrinkPrice = 0;
                        $drinkPrices = explode(',', $row['drinkPrices']);
                        foreach ($drinkPrices as $drinkPrice) {
                            $totalDrinkPrice += (float) $drinkPrice;
                        }
                        $finalPrice = number_format("{$totalDrinkPrice}", 2);
                        echo "$" . $finalPrice;
                    }
                    else {
                        $price = ($row['price']);
                        $finalPrice = number_format("{$price}", 2);
                        echo "$" . $finalPrice;
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