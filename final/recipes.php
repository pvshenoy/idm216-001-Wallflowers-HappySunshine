<?php
include_once __DIR__ . '/app.php';
$title = "Recipes";
$header = "Recipes";
$headerText = "Browse through all of our delicious and health concious recipes!";
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_includes/recipe-functions.php';
$recipes = get_recipe();
?>

        <div class="search">
          <form class="search-form" action="<?php echo site_url(); ?>/admin/search" method="GET">
            <input class="search-field" type="text" name="search" id="search" placeholder="Search">
            <button class="search-button" type="submit"><img class="search-img" src="<?php echo site_url(); ?>/dist/images/submit.png" alt=""></button>
          </form>
      </div>

    </header>

        <?php
        // If error query param exist, show error message
          if (isset($_GET['error'])) {
              echo '<p>' . $_GET['error'] . '</p>';
          }

        ?>

        <div>
        <?php include __DIR__ . '/_components/block-recipes.php'; ?>
        </div>



<?php include_once __DIR__ . '/_components/footer.php';