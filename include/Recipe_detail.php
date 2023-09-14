<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tech Eats</title>
    <link rel="shortcut icon" type="x-icon" href="../icons/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Recipe-detail.css">
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

    <!-- hero section -->
    <?php

    require_once('database.php');
    echo '<main class="page">';
    echo '<div class="recipe-page">';
    echo '<section class="recipe-hero">';
    // Check if the recipe ID parameter is set in the URL
    if (isset($_GET['recipe_id'])) {
        $recipeId = $_GET['recipe_id'];

        try {
            $query = "SELECT * FROM receipe_information WHERE recipe_id = :recipe_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':recipe_id', $recipeId, PDO::PARAM_INT);
            $stmt->execute();

            if ($row = $stmt->fetch()) {
                // Display the detailed information of the recipe
                echo '<img src="' . $row['Image'] . '" alt="' . $row['ReceipeName'] . '" class="img recipe-hero-img">';
                echo '<article class="recipe-info">';
                echo    '<h2>' . $row['ReceipeName'] . '</h2>';
                echo       '<p>' . $row['Description'] . '</p>';
                echo ' </article> ';
                echo '</section>';

                //  content
                echo ' <section class="recipe-content">';
                echo '<article>';
                echo '<h4>instructions</h4>';
                echo '<p>' . $row['Steps'] . '</p>';
                echo '</article>';
                echo '</section>';
                echo '</div>';
                echo '</main>';
            } else {
                echo 'Recipe not found.';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo 'Recipe ID not provided.';
    }
    ?>
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
</body>

</html>