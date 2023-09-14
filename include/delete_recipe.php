<?php
require_once('database.php');

if (isset($_GET['recipe_id'])) {
    $recipeId = $_GET['recipe_id'];

    try {
        // First, query the database to get the image file path
        $query = "SELECT Image FROM receipe_information WHERE recipe_id = :recipe_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':recipe_id', $recipeId, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            // Get the image file path
            $imagePath = $row['Image'];

            // Now, delete the recipe from the database
            $deleteQuery = "DELETE FROM receipe_information WHERE recipe_id = :recipe_id";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(':recipe_id', $recipeId, PDO::PARAM_INT);
            $deleteStmt->execute();

            // Check if the recipe was deleted
            if ($deleteStmt->rowCount() > 0) {
                // Delete the image file after deleting the recipe
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
                echo 'Recipe and associated image deleted successfully.';
            } else {
                echo 'Recipe not found or could not be deleted.';
            }
        } else {
            echo 'Recipe not found.';
        }

        // Redirect back to the recipe list page
        header('Location: Recipe_list.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo 'Recipe ID not provided.';
}
