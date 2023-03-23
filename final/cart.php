<?php
include_once 'app.php';
$page_title = 'Cart';
include_once '_components/header.php';
include_once '_components/headers/cart-header.php';

$site_url = site_url();


// ($user['isGuest']==0) ? "success": redirect_to('/auth/login.php') ;

$orderTotal = 0;
$order = get_order_by_user_id($user['id']);

if ($order->num_rows > 0) {
    echo "
    <h1 class='page-title desktop top-margin'>CART</h1>
    <section class='cart'>
    <div class='wait-time-cart'>
        <img src='{$site_url}/dist/images/preeti-img/icons/time-icon.png' alt='' class='time-icon'>
        <h4 class='wait-time-cart-text'>Wait time: <span class='red-text'>15 minutes</span></h4>
    </div>
    <ul class='cart-item-list'>
    ";

    while($row = $order->fetch_assoc()) {
        include '_components/cart-item.php';
    } // End while loop
    echo '</ul>';
    echo "
    <hr class='cart-linebreak'>
    <h3 class='cart-total'>TOTAL: $$orderTotalPrice</h3>
    ";
    echo '</section>';

    echo "
    <section class='add-ons'>
    <div class='order-details'>
        <h3 class='order-confirmation-details-text'>In the mood<br>for more?</h3>
        <a href='{$site_url}/index.php' class='general-button'>
            <button class='order-details-button'>VIEW MENU</button>
        </a>
        <img src='dist/images/preeti-img/background-elements/clouds.png' alt='' class='clouds'>
        <img src='dist/images/preeti-img/background-elements/drinks.png' alt='' class='three-drinks'>
    </div> 
    </section>
    ";
    
    // echo "$" . $orderTotalPrice;

    echo "<a class='add-button tablet' href='";
    if ($user['isGuest']) {
        echo "{$site_url}/login.php";
    }
    else {
        echo "{$site_url}/checkout.php";
    }

    echo "'>
        <button class='add-to-cart-tablet'>
            CONTINUE TO PAYMENT
        </button>
    </a>
    ";


    echo "<a class='add-button mobile' href='";
    if ($user['isGuest']) {
        echo "{$site_url}/login.php";
    }
    else {
        echo "{$site_url}/checkout.php";
    }

    echo "'>
        <button class='add-to-cart'>
            CONTINUE TO PAYMENT
        </button>
    </a>
    ";
} 
else {

echo "
<section class='empty-cart-content'>
    <div class='empty-cart'>
        <img src='dist/images/logo.png' alt='' class='logo'>
        <h2 style='text-align: center; margin-bottom: 0rem;'>YOUR CART IS EMPTY</h2>
        <h3 class='cart-is-empty'>Fill it up with a breakfast sandwich or two!</h3>
    </div>
    <div class='empty-button-container'>
<a href='{$site_url}/index.php'>
    <button class='empty-button'>
    START ORDER
    </button>
</a>
</div>
</section>
";
}

?>

<?php 
include_once '_includes/mobile-footer.php'; 
// include_once '_includes/js-footer.php'; 
?>
