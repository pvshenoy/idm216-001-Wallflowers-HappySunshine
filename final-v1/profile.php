<?php
include_once __DIR__ . '/app.php';
$page_title = "Profile";
include_once __DIR__ . '/_components/header.php';
$site_url = site_url();
$_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
?>
<h1>Profile</h1>
<?php 
if (!$user['isGuest']) {
    echo 'Hi, ' . $user['username'] . '!';
    global $db_connection;

    $query= "SELECT * FROM orders WHERE userID = {$user['id']} AND status = 'archived' AND catID != 'NULL'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $count = $user['amount'];
        echo '<p>' . $count . ' Orders</p>';
        echo '<ul>';
        $currentTime = 0;
        while($row = $result->fetch_assoc()) {
            if ($row['orderTime'] != $currentTime){
                echo '<li>' . 'ORDER #' . $count . '</br>' . $row['orderDate'] . '</br> REWARDS LOGGED' . '</li>';
                $currentTime = $row['orderTime'];
                $count -= 1;
            }
        } // End while loop
        echo '</ul>';
        
        

        $query= "SELECT amount FROM users WHERE user = {$user['id']}";
        $result = mysqli_query($db_connection, $query);
        $count = $user['amount'];

        // LOGIC FOR REWARDS
        
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
        echo "<p>you currently have no orders, head to the menu to begin!</p>";
        echo "<a href='{$site_url}/main.php'>menu</a>";
    }
}
else {
    echo "login to view your profile
    </br>
    <a href='{$site_url}/login.php'>login</a>
    ";

}
?>



<?php include_once __DIR__ . '/_components/footer.php';?>
