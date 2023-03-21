<?php
include_once __DIR__ . '/app.php';
$page_title = "Rewards";
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_components/headers/rewards-header.php';
$site_url = site_url();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
?>
<?php 
if (!$user['isGuest']) {
    global $db_connection;
    echo '
    <main class="content">
    <img src="dist/images/preeti-img/background-elements/qr-code.png" alt="" class="qr-code">
    <p class="qr-text">Scan the QR code at the truck to log your rewards!</p>
    ';

    $query= "SELECT * FROM orders WHERE userID = {$user['id']} AND status = 'archived' AND catID != 'NULL'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // LOGIC FOR REWARDS
        echo "
        <div class='reward-box'>
            <div class='reward-cup'>
        ";
                    $query= "SELECT amount FROM users WHERE user = {$user['id']}";
                    $result = mysqli_query($db_connection, $query);
                    $count = $user['amount'];

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

    echo '</div>
    </div>
    <p class="bottom-margin rewards-info">Every 10 orders from Happy Sunshine, receive a free Thai iced tea from our menu! </p>

    </main>';
    } else {
        echo "
        <section class='empty-cart-content'>
            <div class='empty-cart'>
                <img src='dist/images/logo.png' alt='' class='logo'>
                <h2 style='text-align: center; margin-bottom: 0rem;'>Looks like you have no orders yet . . .</h2>
                <h3 class='cart-is-empty'>Start an order to begin earning rewards!</h3>
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
}
else {
    echo "
    <section class='empty-cart-content'>
        <div class='empty-cart'>
            <img src='dist/images/logo.png' alt='' class='logo'>
            <h2 style='text-align: center; margin-bottom: 0rem;'>Looks like you're not logged in . . .</h2>
            <h3 class='cart-is-empty'>Login or create an account to order food and start tracking your orders!</h3>
        </div>
        <div class='empty-button-container'>
            <a href='{$site_url}/login.php'>
                <button class='empty-button'>
                LOGIN
                </button>
            </a>
        </div>
    </section>
    ";

}
?>



<?php include_once __DIR__ . '/_includes/rewards-footer.php';?>