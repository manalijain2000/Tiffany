<?php
include("../db_connection.php");
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    // File handling
    $targetDirectory = "../uploads/"; // specify your target directory
    $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);

    // Check if the file is an actual image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
        // Insert data into the database
        $sql = "INSERT INTO products (product_name, product_description, product_image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $productName, $productDescription, $targetFile);

        if ($stmt->execute()) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the database connection
    $conn->close();
}
?>
