<?php
session_start();

if(isset($_POST['product_ID'])) {
    $product_ID = $_POST['product_ID'];

    // Initialize cart session variable if it doesn't exist
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add product ID to the cart
    $_SESSION['cart'][] = $product_ID;

    // Redirect back to the previous page (index page)
    header("Location: index.php");
    exit();
} else {
    // Handle the case where product ID is not set
    echo "Error: Product ID not set";
}
?>
