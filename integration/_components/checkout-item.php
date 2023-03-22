<?php 
include '_components/prices.php';
$id = $row['catID'];

?>

<div class="order-summary-item">
    <div class="order-summary-item-title">
        <h4 class="order-summary-item-and-qty"><span class="order-summary-item-qty">
            
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
        
        </span><?php echo $row['cat']; ?></h4>
        <p class="order-summary-price">
        
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
        
        </p>
    </div>
    
    <div class="order-summary-item-details">
        <p class="order-summary-item-details-text">
            
        <?php 
    
        if ($id == 1) {
            if (!$row['toppingNames'] AND !$row['proteinName']) {
                echo $row['breadName'];
             }
            elseif (!$row['toppingNames']) {
                echo $row['breadName'] . ", " . $row['proteinName'] . " (+$" . number_format("{$row['proteinPrice']}", 2) . ')';
             }
            elseif (!$row['proteinName']) {
                echo $row['breadName'] . ", " . $row['toppingNames'];
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
            elseif (!$row['proteinName']) {
                echo $row['toppingNames'];
            }
            else {
                echo $row['proteinName'] . ", " . $row['toppingNames'];
            }
        }
        ?>

        </p>
    </div>
</div>