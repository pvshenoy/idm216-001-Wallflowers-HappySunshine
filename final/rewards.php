<?php
include_once __DIR__ . '/app.php';
$page_title = "Rewards";
include_once __DIR__ . '/_components/header.php';
$site_url = site_url();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
?>
<h1>REWARDS</h1>
<?php 
if (!$user['isGuest']) {
    global $db_connection;

    $query= "SELECT * FROM orders WHERE userID = {$user['id']} AND status = 'archived' AND catID != 'NULL'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // LOGIC FOR REWARDS
        $count = mysqli_num_rows($result);
        if ($count < 10) {
            $ordersLeft = 10 - $count;
            if ($ordersLeft == 1) {
                echo $ordersLeft . ' order until you get a free thai tea';
            }
            else {
                echo $ordersLeft . ' orders until you get a free thai tea';
            }
        }
        elseif ($count % 10 == 0) {
            echo 'you get a free thai tea!';
        }
        else {
            $remainder = $count % 10;
            $ordersLeft = 10 - $remainder;
            if ($ordersLeft == 1) {
                echo $ordersLeft . ' order until you get a free thai tea';
            }
            else {
                echo $ordersLeft . ' orders until you get a free thai tea';
            }
        }
    } else {
        echo "<p>Start ordering to begin earning rewards!</p>";
        echo "<a href='{$site_url}/main.php'>menu</a>";
    }
}
else {
    echo "login to view your rewards
    </br>
    <a href='{$site_url}/login.php'>login</a>
    ";

}
?>



<?php include_once __DIR__ . '/_components/footer.php';?>