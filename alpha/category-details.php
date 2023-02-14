<?php 
include_once 'app.php';
?>

<?php
// get users data from database
$query = "SELECT * FROM menu WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $menu = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Recipe does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}

?>

<?php 
$page_title = $menu['cat'];
$dollarPrice = number_format("{$menu['price']}", 2);
include_once '_components/header.php';
?>

    </header>

    <div class="hero-img" style="background-image: url(<?php echo site_url(); ?><?php echo $menu['img']?>);"></div>


    <div class="details-container">
        <div class="back-button">
                <a href='main.php'><p class='back-button-arrow'><</p></a>
        </div>

        <div class="overview">
            <div class="overview-line1">
                <h2 class="ingredients-headers"><?php echo $menu['cat']?></h2>
                <div>$<?php echo $dollarPrice?></div>
            </div>
            <div class="overview-para"><?php echo $menu['descrip']?></div>
        </div>

        <div class="ingredients">
            <h2 class="ingredients-headers">Image</h2>
            <div class="ingredient-bullet"><?php echo $menu['img']?></div>
        </div>

        <div class="ingredients">
            <h2 class="ingredients-headers">ID</h2>
            <div class="ingredient-bullet"><?php echo $menu['id']?></div>
        </div>
    </div>

<?php 
include_once '_components/footer.php'; 
?>