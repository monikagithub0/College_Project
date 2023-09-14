<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tech Eats</title>
    <link rel="shortcut icon" type="x-icon" href="../icons/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/add.css">
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
    <div class="Main">
        <form method="post" action="check.php" enctype="multipart/form-data">
            <div id="ReceipeName" class="upload">
                <input type="text" name="ReceipeName" placeholder="Enter your Receipe Name">
            </div>
            <div id="ReceipeImage" class="upload">
                <input type="file" name="Image">
            </div>
            <div id="ReceipeDescription" class="upload">
                <textarea name="Description" cols="40" rows="10" placeholder="Enter little description about about receipe"></textarea>
            </div>
            <div id="ReceipeSteps" class="upload">
                <textarea name="Steps" cols="40" rows="10" placeholder="Enter steps to make"></textarea>
            </div>
            <div id="Receipecategory" class="upload">
                <input type="radio" id="Appetizer" name="ReceipeCategory" value="Appetizer">
                <label for="Appetizer">Appetizer</label><br>

                <input type="radio" id="Beverage" name="ReceipeCategory" value="Beverage">
                <label for="Beverage">Beverage</label><br>

                <input type="radio" id="Salad" name="ReceipeCategory" value="Salad">
                <label for="Salad">Salad</label><br>

                <input type="radio" id="Dinner" name="ReceipeCategory" value="Dinner">
                <label for="Dinner">Dinner</label><br>

                <input type="radio" id="Dessert" name="ReceipeCategory" value="Dessert">
                <label for="Dessert">Dessert</label><br>

                <input type="radio" id="Bakery" name="ReceipeCategory" value="Bakery">
                <label for="Bakery">Bakery</label>
            </div>
            <div id="sumbit" class="upload">
                <button type="submit" id="submit-btn" name="submit_btn">Submit</button>
                <button class="go-back">Go Receipe</button>
            </div>
        </form>
    </div>
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