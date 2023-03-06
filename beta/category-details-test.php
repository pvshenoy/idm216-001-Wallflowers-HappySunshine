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

<div>
    <?php
    // Content based on ID of category chosen
    $site_url = site_url();
    $id = $_GET['id'];
    if ($id == 1) {
        $query = "SELECT * FROM bread";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Bread</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 

        $query = "SELECT * FROM protein WHERE price > 0";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . " " . "$" . $row["price"] . ".00" . "<br>";
            }
        }

        $query = "SELECT * FROM toppings WHERE id < 5 OR id > 17";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Toppings</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }
    elseif ($id == 2) {
        $query = "SELECT * FROM protein WHERE id < 3 OR id = 22 OR id = 7 OR id = 10 OR id = 11";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 3) {
        $site_url = site_url();
        $query = "SELECT * FROM protein WHERE (id = 8) OR (id BETWEEN 12 AND 13)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "
            <form action='<?php echo {$site_url}/_includes/process-orders.php?>' method='POST'>
            <h4>Protein: <span>Choose 1</span></h4>
            <div>
            ";
            while($row = $result->fetch_assoc()) {
                echo "
                <div>
                    <label for='protein'>{$row['proteinName']}</label>
                    <div>
                        <input id='protein' name='protein' type='radio'>
                    </div>
                 </div>
                <hr>";
            }
        echo "
        </div>
        </form
        ";
        } 

        $query = "SELECT * FROM toppings WHERE (id BETWEEN 2 AND 6) OR (id BETWEEN 12 AND 13) OR (id BETWEEN 15 AND 17)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "
            <form action='<?php echo {$site_url}/_includes/process-orders.php?>' method='POST'>
            <h4>Toppings: <span>(Optional)</span></h4>
            <div>
            ";
            while($row = $result->fetch_assoc()) {
                echo "
                <div>
                    <label for='toppings'>{$row['toppingName']}</label>
                    <div>
                        <input id='toppings' name='toppings' type='checkbox'>
                    </div>
                 </div>
                ";
            }
        echo "
        </div>
        </form>
        <button type='submit'>Submit</button>
        ";
        } 
    }
    
    // <form action="" class="customizations">
    //         <h4 class="ingredient-title">Protein: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">Choose 1</span></h4>
    //         <div class="protein">
    //             <label class="radio-container">CHICKEN
    //                 <input type="radio" name="protein">
    //                 <span class="radio-button"></span>
    //               </label>
    //               <hr class="cart-linebreak">
    //               <label class="radio-container">STEAK
    //                 <input type="radio" name="protein">
    //                 <span class="radio-button"></span>
    //               </label>
    //               <hr class="cart-linebreak">
            
    //         <div class="toppings">
    //             <h4 class="ingredient-title">Toppings: <span style="font-weight: 300; color: var(--accent-color-tangerine-dark);">(Optional)</span></h4>
    //             <label class="container">MUSHROOM
    //             <input type="checkbox">
    //             <span class="checkmark"></span>
    //             </label>
    //             <hr class="cart-linebreak">
    //             <label class="container">PEPPERONI
    //             <input type="checkbox">
    //             <span class="checkmark"></span>
    //             </label>
    //             <hr class="cart-linebreak">
    //             <label class="container">BLUE CHEESE
    //             <input type="checkbox">
    //             <span class="checkmark"></span>
    //             </label>
    //             <hr class="cart-linebreak">
    //             <label class="container">PROVOLONE CHEESE
    //             <input type="checkbox">
    //             <span class="checkmark"></span>
    //             </label>
    //             <hr class="cart-linebreak">
    //         </div>
    //     </form>

    elseif ($id == 4) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id = 14) OR (id = 19)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 

        $query = "SELECT * FROM toppings WHERE (id = 5) OR (id = 7) OR (id = 9) OR (id = 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Toppings</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 5) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id BETWEEN 14 AND 15) OR (id = 19)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 

        $query = "SELECT * FROM toppings WHERE (id = 5) OR (id BETWEEN 7 AND 9)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Toppings</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 6) {
        $query = "SELECT * FROM protein WHERE (id = 7) OR (id = 10) OR (id BETWEEN 20 AND 21)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 7) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 3 AND 4) OR (id = 16) OR (id BETWEEN 23 AND 24)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 

        $query = "SELECT * FROM toppings WHERE (id BETWEEN 3 AND 4) OR (id = 5) OR (id = 7) OR (id BETWEEN 9 AND 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Toppings</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 8) {
        $query = "SELECT * FROM toppings WHERE (id BETWEEN 3 AND 4) OR (id = 5) OR (id = 7) OR (id BETWEEN 9 AND 11) OR (id = 14)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Toppings</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 9) {
        $query = "SELECT * FROM protein WHERE (id BETWEEN 1 AND 2) OR (id BETWEEN 4 AND 5) OR (id BETWEEN 17 AND 18)";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Protein</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 10) {
        $query = "SELECT * FROM sides";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Side Orders</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }

    elseif ($id == 11) {
        $query = "SELECT * FROM drinks";
        $result = mysqli_query($db_connection, $query);
        if ($result->num_rows > 0) {
            echo "<h2 class='ingredients-headers'>Drinks</h2>";
            while($row = $result->fetch_assoc()) {
                echo $row["name"] . "<br>";
            }
        } 
    }
    ?>
</div>

<?php 
include_once '_components/footer.php'; 
?>