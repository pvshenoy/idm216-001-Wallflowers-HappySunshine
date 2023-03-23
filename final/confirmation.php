<?php
include_once 'app.php';
$page_title = 'Confirmation';
include_once '_components/header.php';
include_once '_components/headers/order-confirmation-header.php';
$site_url = site_url();


($user['isGuest']==0) ? "success": redirect_to('/auth/login.php') ;

$orderTotal = 0;
$order = get_order_by_user_id($user['id']);

?>

<?php if ($order->num_rows > 0) { ?>
    <div class="top-nav-inner-page x-icon-order-confirmed">
    <a href="<?php echo site_url()?>/index.php" class="back-button">
        <img src="dist/images/preeti-img/icons/x-icon.png" alt="" class="back-icon new-x">
    </a>
</div>
<h1 class="page-title desktop">YOUR ORDER HAS BEEN CONFIRMED!</h1>
    <section class="order-confirmation">
    <div class="row-one">
        <div class="microinteraction-container">
            <div class="progress-container">
                <div class="progress" id="progress"></div>
              
                <div class="circle active"><img src="https://nytrea.com/idm216-codepen-content/full-egg.png" class="item-img"></div>
                <div class="circle">
        <img src="https://nytrea.com/idm216-codepen-content/cracked-egg.png" class="item-img"></div>
              
                <div class="circle"><img src="https://nytrea.com/idm216-codepen-content/logo.png" class="item-img"></div>
            </div>
          
        </div>
        <h3 class="date">FEBRUARY 21, 2023</h3>
        <h3 class="wait-time">Wait time: <span style="color:var(--accent-color-tangerine-dark);">15 minutes</span></h3>
        <img src="dist/images/preeti-img/background-elements/qr-code.png" alt="barcode" class="barcode">
        <h3 class="order-number"> ORDER #1234</h3>
        <h3 class="barcode-details">SHOW THIS QR CODE AT THE TRUCK 
            TO PICK UP YOUR ORDER
        </h3>
        <h3 class="barcode-details-desktop">CLICK HERE TO TEXT QR CODE TO YOUR PHONE</h3>
    </div>
    <div class="row-two">
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
            <h3 class="total-price">TOTAL: $<?php echo $orderTotalPrice; ?></h3>
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
            </section>
<?php } // End if ?>

<!-- <?php
$current_date = date('m-d-y');
$current_time = date('H:i:s');
$time_integer = intval(str_replace(':', '', $current_time));

global $db_connection;
   
$query= "UPDATE orders SET status = 'archived', total = {$orderTotalPrice}, orderDate = '{$current_date}', orderTime = '{$time_integer}' WHERE userID = {$user['id']} AND status = 'active'";
$result = mysqli_query($db_connection, $query);

$query = "SELECT amount FROM users WHERE id = {$user['id']}";
$result = mysqli_query($db_connection, $query);

$amount = $user['amount'];
$amount += 1;

$query= "UPDATE users SET amount = {$amount} WHERE id = {$user['id']}";
$result = mysqli_query($db_connection, $query);
?> -->

<?php 
include_once '_includes/mobile-footer.php'; 
?>