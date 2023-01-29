<?php 
include_once 'app.php';
?>

<?php
// get users data from database
$query = "SELECT * FROM recipes WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $recipe = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Recipe does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}

?>

<?php 
$title = "Details";
$header = $recipe['title'];
$headerText = "View the ingredients and recipe steps below!";
$headerImg = "details";
include_once '_components/header.php';
?>

    </header>

    <div class="hero-img" style="background-image: url(<?php echo site_url(); ?><?php echo $recipe['imagePath']?>);"></div>

    <div class="details-container">
        <div class="overview">
            <div class="overview-line1">
                <h2 class="ingredients-headers">OVERVIEW</h2>
                <div><?php echo $recipe['cookTime']?> mins | cals. <?php echo $recipe['cal']?></div>
            </div>
            <div class="overview-para"><?php echo $recipe['overview']?></div>
        </div>

        <div class="ingredients">
            <h2 class="ingredients-headers">INGREDIENTS</h2>
            <div class="ingredient-bullet"><?php echo $recipe['ingredients']?></div>
        </div>

        <div class="recipe">
            <h2 class="ingredients-headers">RECIPE</h2>
            <div class="steps"><?php echo $recipe['steps']?></div>
        </div>
    </div>

<?php 
include_once '_components/footer.php'; 
?>