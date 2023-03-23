<?php
include_once 'app.php';
$page_title = 'Checkout';
include_once '_components/header.php';
include_once '_components/headers/payment-header.php';
$site_url = site_url();


($user['isGuest']==0) ? "success": redirect_to('/auth/login.php') ;

$orderTotal = 0;
$order = get_order_by_user_id($user['id']);
?>

<?php if ($order->num_rows > 0) { ?>
    <div class="top-nav-inner-page desktop">
        <a href="<?php echo site_url()?>/cart.php" class="back-button">
            <svg class="back-icon" viewbox="0 0 14.5 26.5">
                <defs><style>.cls-1{fill:none;stroke:#361e10;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.5px;}</style></defs>
                <path class="cls-1" d="m13.25,1.25L1.25,13.25l12,12"/>
            </svg>
        </a>
    </div>
    <h1 class='page-title desktop'>CHECKOUT</h1>
    <section class="payment-details">
        <div class="row-one">
            <div class="order-summary">
                <h3 class="order-summary-title">ORDER SUMMARY</h3>
                <div class="order-summary-item">
                    <div class="order-summary-item-title small-font low-opacity">
                        <h4 class="order-summary-item-and-qty small-font"><span class="order-summary-item-qty">#</span>ITEM</h4>
                        <p class="order-summary-price small-font">PRICE</p>
                    </div>
                </div>
    <?php while($row = $order->fetch_assoc()) { ?>
        <?php include '_components/checkout-item.php'; ?>
    <?php } // End while loop ?>
    <hr class="cart-linebreak">
            </div>
            <h3 class="total-price">TOTAL: $<?php echo $orderTotalPrice; ?></h3>
        </div>
        <div class="row-two">
            <div class="secondary-details">
                <h3 class="pickup-location-title">PICKUP LOCATION</h3>
                <div class="location-box">
                    <img src="dist/images/preeti-img/background-elements/location.png" alt="" class="location-img">
                    <div class="location-text">
                        <h4 class="location-truck">HAPPY SUNSHINE</h4>
                        <p class="truck-address">
                            33rd & Arch St.
                            <br>Philadelphia, PA 19104
                        </p>
                    </div>
                </div>
                <h3 class="payment-method">PAYMENT METHOD</h3>
                <div class="venmo-payment">
                <div class="venmo-payment-icon-text">
                    <img src="dist/images/preeti-img/icons/venmo-icon.png" alt="venmo" class="venmo-icon">
                    <p class="venmo-account">Venmo Account</p>
                </div>
                <img src="dist/images/preeti-img/icons/right-icon.png" alt="" class="right-icon">
                </div>
                <div class="reward-box">
                    <div class="reward-cup">


                    <?php

                    $query= "SELECT amount FROM users WHERE user = {$user['id']}";
                    $result = mysqli_query($db_connection, $query);
                    $count = $user['amount'] + 1;

                    // LOGIC FOR REWARDS
                            
                    if ($count < 10) {
                        $ordersLeft = 10 - $count;
                        if ($ordersLeft == 1) {
                            echo "
                                <h2 class='reward-cup-text white-text single-day'><span>$ordersLeft</span></h2>
                                <img src='dist/images/preeti-img/background-elements/drink-reward.png' alt='' class='drink-rewards'>
                            </div>
                            <h3 class='rewards-alert'>Order until a free Thai Iced Tea!</h3>
                            ";
                        }
                        else {
                            echo "
                                <h2 class='reward-cup-text white-text single-day'><span>$ordersLeft</span></h2>
                                <img src='dist/images/preeti-img/background-elements/drink-reward.png' alt='' class='drink-rewards'>
                            </div>
                            <h3 class='rewards-alert'>Orders until a free Thai Iced Tea!</h3>
                            ";
                            }
                    }
                    elseif ($count % 10 == 0) {
                        echo "
                            <h2 class='reward-cup-text white-text single-day'><span>0</span></h2>
                            <img src='dist/images/preeti-img/background-elements/drink-reward.png' alt='' class='drink-rewards'>
                        </div>
                        <h3 class='rewards-alert'>You get a free Thai Iced Tea!</h3>
                        ";
                    }
                    else {
                        $remainder = $count % 10;
                        $ordersLeft = 10 - $remainder;
                        if ($ordersLeft == 1) {
                            echo "
                                <h2 class='reward-cup-text white-text single-day'><span>$ordersLeft</span></h2>
                                <img src='dist/images/preeti-img/background-elements/drink-reward.png' alt='' class='drink-rewards'>
                            </div>
                            <h3 class='rewards-alert'>Order until a free Thai Iced Tea!</h3>
                            ";
                        }
                        else {
                            echo "
                                <h2 class='reward-cup-text white-text single-day'><span>$ordersLeft</span></h2>
                                <img src='dist/images/preeti-img/background-elements/drink-reward.png' alt='' class='drink-rewards'>
                            </div>
                            <h3 class='rewards-alert'>Orders until a free Thai Iced Tea!</h3>
                            ";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
<?php } // End if ?>

<a href="<?php echo "{$site_url}/confirmation.php" ?>" class="add-button mobile">
    <button class="add-to-cart">
        PLACE ORDER
    </button>
</a>

<a href="<?php echo "{$site_url}/confirmation.php" ?>" class="add-button tablet">
    <button class="add-to-cart-tablet">
        PLACE ORDER
    </button>
</a>

<?php 
include_once '_includes/mobile-footer.php'; 
?>