<?php
include_once __DIR__ . '/app.php';
$page_title = "Profile";
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_components/headers/profile-header.php';
$site_url = site_url();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
?>
<?php 
if (!$user['isGuest']) {
    global $db_connection;

    $query= "SELECT * FROM orders WHERE userID = {$user['id']} AND status = 'archived' AND catID != 'NULL'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $count = $user['amount'];
        echo "
        <main class='content'>
        <section class='profile'>
            <img src='{$site_url}/dist/images/preeti-img/background-elements/profile-picture.png' alt='' class='profile-picture'>
            <h2 class='profile-name red-text'>{$user['username']}</h2>
            <p class='profile-details'><span class='blue-text'>{$count}</span> orders - Customer since 2023</p>
        </section>
        ";
        echo '<h3 class="order-history">ORDER HISTORY</h3>
        <div class="past-orders">';
        $currentTime = 0;
        while($row = $result->fetch_assoc()) {
            if ($row['orderTime'] != $currentTime){

                echo "
                    <div class='old-order'>
                    <div class='old-order-tag salmon'></div>
                    <div class='old-order-text-content'>
                        <h3 class='old-order-title'>ORDER #$count</h3>
                        <p class='old-order-date'>{$row['orderDate']}</p>
                        <p class='blue-text old-order-rewards'>REWARDS LOGGED!</p>
                    </div>
                    <img src='{$site_url}/dist/images/preeti-img/background-elements/sun.png' alt='' class='sun-img'>
                </div>
                    ";
                $currentTime = $row['orderTime'];
                $count -= 1;
            }
        } // End while loop
        echo '</div>';
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

    echo "</div>
    </div>
    </main>";
    } else {
        $count = $user['amount'];
        echo "
        <main class='content'>
        <section class='profile'>
            <img src='{$site_url}/dist/images/preeti-img/background-elements/profile-picture.png' alt='' class='profile-picture'>
            <h2 class='profile-name red-text'>{$user['username']}</h2>
            <p class='profile-details'><span class='blue-text'>{$count}</span> orders - Customer since 2023</p>
        </section>
        ";
    }
}
else {
    echo "
    <section class='empty-cart-content'>
        <div class='empty-cart'>
            <img src='dist/images/logo.png' alt='' class='logo'>
            <h2 style='text-align: center; margin-bottom: 0rem; margin-top: 1rem;'>Looks like you're not logged in . . .</h2>
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



<?php include_once __DIR__ . '/_includes/profile-footer.php';?>
