<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tech Eats</title>
    <link rel="shortcut icon" type="x-icon" href="../icons/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Recipe_list.css">
</head>

<body>
    <header>
        <nav>
            <ul class='nav-bar'>
                <li class='logo'><a href='../index.html'><img src='../icons/logo.png' /></a>
                    <span style="color: yellow;">Tech Eats</span>
                </li>
                <input type='checkbox' id='check' />
                <span class="menu">
                    <li><a href="Recipe_list.php">Recipe List</a></li>
                    <li><a href="add.php">Add Recipe</a></li>
                    <li><a href="../contact_us.html">Contact Us</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </header>

    <main id="Recepe_list_Main">
        <div class="Main-list-section">
            <h1 id="Recipe-list-h1">Recipe Option</h1>
            <div class="recipes-category">
                <button class="cta-button category-btn" onclick="filterObjects(this,'Appetizer')">Appetizer</button>
                <button class="cta-button category-btn" onclick="filterObjects(this,'Beverage')">Beverage</button>
                <button class="cta-button category-btn" onclick="filterObjects(this,'Salad')">Salad</button>
                <button class="cta-button category-btn" onclick="filterObjects(this,'Dinner')">Dinner</button>
                <button class="cta-button category-btn" onclick="filterObjects(this,'Dessert')">Dessert</button>
                <button class="cta-button category-btn" onclick="filterObjects(this,'Bakery')">Bakery</button>
            </div>
            <div class="container">
                <div class="box-container">
                    <?php
                    require_once('database.php');

                    try {
                        $query = "SELECT DISTINCT recipe_id,ReceipeName, Description ,Image, ReceipeCategory FROM receipe_information";
                        $stmt = $pdo->query($query);

                        while ($row = $stmt->fetch()) {
                            echo '<div class="box" data-categories="' . $row['ReceipeCategory'] . '">';
                            echo '<div class="image">';
                            echo '<img src="' . $row['Image'] . '" alt="' . $row['ReceipeName'] . '">';
                            echo '</div>';
                            echo '<div class="content">';
                            echo '<h3>' . $row['ReceipeName'] . '</h3>';
                            echo '<p> ' . $row['Description'] . '</p>';
                            echo '<a href="Recipe_detail.php?recipe_id=' . $row['recipe_id'] . '" class="btn">Read More</a>';
                            echo '&nbsp';
                            echo '<a href="#" onclick="confirmDelete(' . $row['recipe_id'] . ')" class="btn">Delete</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </div>
                <div id="load-more" onclick="showMoreItems()">Load More</div>
            </div>
        </div>
    </main>

    <!-- Footer section -->
    <footer class="footer-section">
        <div class="footer-content">
            <h3>Tech Eats</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum molestias dolorum similique
                quia enim ipsa officia laboriosam velit magni ullam et, vel adipisci dolore quam! Quae doloribus
                labore ex quas?</p>
            <ul class="socials">
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href=""><i class="fa-brands fa-youtube fa-2xl"></i></a></li>
            </ul>
        </div>
        <div id="footer-copyright">
            <p>&copy; 2023 RecipeBook. All rights reserved.</p>
        </div>
    </footer>
    <script src="../js/load-more.js"></script>
    <script src="../js/categories-filter.js"></script>
    <script>
        function confirmDelete(recipeId) {
            if (confirm('Are you sure you want to delete this recipe?')) {
                // If the user confirms, redirect to delete_recipe.php
                window.location.href = 'delete_recipe.php?recipe_id=' + recipeId;
            }
        }
    </script>
</body>

</html>