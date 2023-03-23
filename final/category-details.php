<?php 
include_once 'app.php';
include_once '_components/headers/item-details-header.php';
$site_url = site_url();
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
// Content based on ID of category chosen
$catID = $_GET['id'];
include_once '_components/header.php';
?>




<div class="top-nav-inner-page details-desktop-nav">
    <a href="<?php echo site_url()?>/index.php" class="back-button">
        <svg class="back-icon" viewbox="0 0 14.5 26.5">
            <defs><style>.cls-1{fill:none;stroke:#361e10;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.5px;}</style></defs>
            <path class="cls-1" d="m13.25,1.25L1.25,13.25l12,12"/>
        </svg>
    </a>
</div>
<div class="item-container row center">
        <div class="item-image-mobile">
            <img src="<?php echo site_url(); ?><?php echo $menu['img'];?>" alt="Cheesesteak" class="item-image">
            <div class="top-nav-inner-page">
                <a href="<?php echo "{$site_url}/index.php" ?>" class="back-button">
                    <div class="filled-container">
                       <svg class="icon-filled item-details-back-icon" viewbox="0 0 14.5 26.5">
                        <defs><style>.cls-1{fill:none;stroke:#361e10;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.5px;}</style></defs>
                        <path class="cls-1" d="m13.25,1.25L1.25,13.25l12,12"/>
                    </svg>
                    </div>
                </a>
                <a href="<?php echo "{$site_url}/cart.php" ?>" class="cart-button">
                    <div class="filled-container">
                        <svg class="icon-filled item-details-cart-icon shopping-bag" viewbox="0 0 34.96 39.96"><defs>
                            <style>.stroke{stroke-linecap:round;}.stroke,.fill{fill:none;stroke:#361e10;stroke-width:3.02px;}</style></defs>
                            <path class="fill" d="m2.68,16.71c.12-1.37.19-2.05.64-2.47.45-.41,1.14-.41,2.52-.41h23.29c1.38,0,2.06,0,2.52.41.45.41.52,1.1.64,2.47l.72,7.91c.59,6.47.88,9.7-1,11.77-1.89,2.07-5.13,2.07-11.63,2.07h-5.78c-6.5,0-9.74,0-11.63-2.07-1.89-2.07-1.59-5.3-1-11.77l.72-7.91Z"/>
                            <path class="fill" d="m9.58,10.04v-.63c0-4.36,3.53-7.9,7.9-7.9h0c4.36,0,7.9,3.54,7.9,7.9v.63"/>
                            <path class="stroke" d="m9.58,21.4v-2.84"/>
                            <path class="stroke" d="m25.37,21.4v-2.84"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
        <div class="item-image-desktop">
            <img src="<?php echo site_url(); ?><?php echo $menu['img'];?>" alt="Cheesesteak" class="item-image">
            <h2 class="item-name"><?php echo $menu['cat']?><span class="blue-text"> <?php
                                                                                if($catID !== '11') {
                                                                                    echo "<span> $</span>{$dollarPrice}";
                                                                                }
                                                                                ?></span></h2>



            <p class="item-description"><?php echo $menu['descrip']?></p>
        </div>
        <section class="item">
            <div class="basic-item-details">
                <h2 class="item-name"><?php echo $menu['cat']?><span class="blue-text"><?php
                                                                                if($catID !== '11') {
                                                                                    echo "<span> $</span>{$dollarPrice}";
                                                                                }
                                                                                ?></span></h2>
                <p class="item-description"><?php echo $menu['descrip']?></p>
            </div>

<form class="customizations" action='<?php echo "{$site_url}/_includes/process-orders.php" ?>' method='POST'>
    <?php

    //BREAKFAST SANDWICHES
    if ($catID == 1) {
        $query = "SELECT * FROM bread";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/bread-options.php';
        }

        $query = "SELECT * FROM protein WHERE proteinPrice > 0";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-price.php';
        }

        $query = "SELECT * FROM toppings WHERE id < 5 OR id > 17";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //FRENCH TOAST
    elseif ($catID == 2) {
        $query = "SELECT * FROM protein WHERE id < 3 OR id = 22 OR id = 7 OR id = 10 OR id = 11";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options.php';
        }
    }

    //CHEESESTEAKS
    elseif ($catID == 3) {
        $query = "SELECT * FROM protein WHERE (id = 8) OR (id BETWEEN 12 AND 13)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-required.php';
        } 

        $query = "SELECT * FROM toppings WHERE (id BETWEEN 2 AND 6) OR (id BETWEEN 12 AND 13) OR (id BETWEEN 15 AND 17)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //LUNCH SANDWHICHES
    elseif ($catID == 4) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id = 14) OR (id = 19)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-required.php';
        }

        $query = "SELECT * FROM toppings WHERE (id = 5) OR (id = 7) OR (id = 9) OR (id = 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //CLUB SANDWHICHES
    elseif ($catID == 5) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id BETWEEN 14 AND 15) OR (id = 19)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-required.php';
        }

        $query = "SELECT * FROM toppings WHERE (id = 5) OR (id BETWEEN 7 AND 9)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //HOT DOG & SAUSAGE
    elseif ($catID == 6) {
        $query = "SELECT * FROM protein WHERE (id = 7) OR (id = 10) OR (id BETWEEN 20 AND 21)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-required.php';
        }
    }

    //HOAGIES
    elseif ($catID == 7) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id = 16) OR (id BETWEEN 23 AND 24)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options-required.php';
        }

        $query = "SELECT * FROM toppings WHERE (id BETWEEN 3 AND 4) OR (id = 5) OR (id = 7) OR (id BETWEEN 9 AND 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //BURGERS
    elseif ($catID == 8) {
        $query = "SELECT * FROM toppings WHERE (id BETWEEN 3 AND 4) OR (id = 5) OR (id = 7) OR (id BETWEEN 9 AND 11) OR (id = 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/topping-options.php';
        }
    }

    //GRILLED CHEESE
    elseif ($catID == 9) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 1 AND 2) OR (id BETWEEN 4 AND 5) OR (id BETWEEN 17 AND 18)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/protein-options.php';
        }
    }

    //SIDES
    elseif ($catID == 10) {
        $query = "SELECT * FROM sides";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/side-options.php';
        }
    }

    //DRINKS
    elseif ($catID == 11) {
        $query = "SELECT * FROM drinks";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            include_once '_components/drink-options.php';
        }
    }
    ?>
    <input type='hidden' name='userID' value='<?php echo "{$user['id']}"; ?>'/>
    <input type='hidden' name='catID' value='<?php echo "{$catID}"; ?>'/>

    <div class="add-button tablet">
        <button class="add-to-cart-tablet" type='submit'>
            ADD TO CART
        </button>
</div>

<div class="add-button mobile">
        <button class="add-to-cart" type='submit'>
            ADD TO CART
        </button>
</div>


    <!-- <button type='submit'>Submit</button> -->
</form>
</section>
</div>

<?php 
include_once '_includes/mobile-footer.php'; 
?>