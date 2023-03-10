<?php
include_once 'app.php';
$site_url = site_url();
?>

<?php
$query = "SELECT * FROM menu WHERE id = 11";
$result = mysqli_query($db_connection, $query);
?>

<h3 class="add-on-title">ADD ON SOMETHING EXTRA</h3>
    <div class="add-on-scroll">
    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="item-add-on">
            <img src="<?php echo site_url(); ?><?php echo $row['img'];?>" alt="" class="add-on-image">
                <div class="add-on-text">
                    <h4 class="add-on-title">Hashbrowns (2)</h4>
                    <h4 class="add-on-price"><?php echo $row['price']; ?></h4>
                </div>
        </div>
    <?php } // End while loop ?>

    <?php
    $query = "SELECT * FROM menu WHERE id = 10";
    $result = mysqli_query($db_connection, $query);
    ?>

    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="item-add-on">
            <img src="<?php echo site_url(); ?><?php echo $row['img'];?>" alt="" class="add-on-image">
                <div class="add-on-text">
                    <h4 class="add-on-title">Hashbrowns (2)</h4>
                    <h4 class="add-on-price"><?php echo $row['price']; ?></h4>
                </div>
        </div>
    <?php } // End while loop ?>

    <?php
    $query = "SELECT * FROM menu WHERE id = 11";
    $result = mysqli_query($db_connection, $query);
    ?>

    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="item-add-on">
            <img src="<?php echo site_url(); ?><?php echo $row['img'];?>" alt="" class="add-on-image">
                <div class="add-on-text">
                    <h4 class="add-on-title">Hashbrowns (2)</h4>
                    <h4 class="add-on-price"><?php echo $row['price']; ?></h4>
                </div>
        </div>
    <?php } // End while loop ?>
  </div>

  


<!-- <section class="add-ons">
    <h3 class="add-on-title">ADD ON SOMETHING EXTRA</h3>
    <div class="add-on-scroll">
        <div class="item-add-on">
            <a href=><button class="circle-button">+</button></a>
            <img src="dist/images/preeti-img/item-images/sides.png" alt="" class="add-on-image">
            <div class="add-on-text">
                <h4 class="add-on-title">Hashbrowns (2)</h4>
                <h4 class="add-on-price">$1.50</h4>
            </div>
        </div>
        <div class="item-add-on">
            <a href="cart-cheesesteaks-thai-tea.html" class="add-to-cart-link"><button class="circle-button">+</button></a>
            <img src="dist/images/preeti-img/item-images/thai-tea.png" alt="" class="add-on-image">
            <div class="add-on-text">
                <h4 class="add-on-title">Thai Iced Tea</h4>
                <h4 class="add-on-price">$3.00</h4>
            </div>
        </div>
        <div class="item-add-on">
            <a href="cart-cheesesteaks-thai-tea.html" class="add-to-cart-link"><button class="circle-button">+</button></a>
            <img src="dist/images/preeti-img/item-images/bacon.png" alt="" class="add-on-image">
            <div class="add-on-text">
                <h4 class="add-on-title">Bacon (3)</h4>
                <h4 class="add-on-price">$1.50</h4>
            </div>
        </div>
    </div>
</section> -->