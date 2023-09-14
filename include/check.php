<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ReceipeName = $_POST["ReceipeName"];
    $Description = $_POST["Description"];
    $Steps = $_POST["Steps"];
    $ReceipeCategory = $_POST["ReceipeCategory"];

    // for image
    $Image = $_FILES['Image'];
    $Imagefilename = $_FILES['Image']['name'];
    $ImagefileError = $_FILES['Image']['error'];
    $Imagefiletemp = $_FILES['Image']['tmp_name'];

    $filename_separate = explode('.', $Imagefilename);
    $file_extension = strtolower(end($filename_separate));
    $extension = array('jpeg', 'png', 'jpg',);

    if (in_array($file_extension, $extension)) {
        $upload_image = '../images/' . $Imagefilename;
        move_uploaded_file($Imagefiletemp, $upload_image);
    }
    try {
        // connecting with database
        require_once "database.php";

        // Insert data into database
        $query = "INSERT INTO receipe_information (ReceipeName, Description, Steps, ReceipeCategory,Image) VALUES (:ReceipeName, :Description, :Steps, :ReceipeCategory, :Image);";

        // Bind database information, including a placeholder value for 'Image' if no image is provided
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":ReceipeName", $ReceipeName);
        $stmt->bindParam(":Description", $Description);
        $stmt->bindParam(":Steps", $Steps);
        $stmt->bindParam(":ReceipeCategory", $ReceipeCategory);

        // Determine the value to use for 'Image' based on whether an image was uploaded
        if (empty($Imagefilename)) {
            $placeholderValue = "default_image";
            $stmt->bindParam(":Image", $placeholderValue);
        } else {
            // Use the correct image path
            $stmt->bindParam(":Image", $upload_image);
        }
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: add.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: add.php");
}
