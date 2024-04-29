<?php
// Include your database configuration file here
require 'config.php';

// Check if product ID is provided via POST request
if(isset($_POST['product_id'])) {
    // Retrieve the product ID from the POST data
    $product_id = $_POST['product_id'];

    try {
        // Prepare a DELETE statement to remove the product from the database
        $stmt = $conn->prepare("DELETE FROM products WHERE product_ID = :product_id");

        // Bind the product ID parameter
        $stmt->bindParam(':product_id', $product_id);

        // Execute the DELETE statement
        $stmt->execute();

        // Redirect back to the viewProducts.php page after deletion
        header("Location: viewProducts.php");
        exit();
    } catch(PDOException $e) {
        // Handle any errors that occur during the deletion process
        echo "Error: " . $e->getMessage();
    }
} else {
    // If product ID is not provided via POST request, redirect to the viewProducts.php page
    header("Location: viewProducts.php");
    exit();
}
?>
