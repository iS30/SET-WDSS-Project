<?php
session_start();

require 'layout/header.php';
require 'config.php'; // Include your database configuration file here

$totalPrice = 0;

// Check if the cart session variable exists and is not empty
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    ?>

    <link rel="stylesheet" href="layout/style.css">

    <div class="cart">
        <h2>Your Cart</h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php
            // Loop through the cart items
            foreach($_SESSION['cart'] as $key => $product_ID) {
                $stmt = $conn->prepare("SELECT * FROM products WHERE product_ID = :product_ID");
                $stmt->bindParam(':product_ID', $product_ID);
                $stmt->execute();
                $item = $stmt->fetch(PDO::FETCH_ASSOC);

                // Check if item exists
                if ($item) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $item['product_Image']; ?>" alt="<?php echo $item['product_Name']; ?>" style="width: 100px;"></td>
                        <td><?php echo $item['product_Name']; ?></td>
                        <td><?php echo $item['product_Description']; ?></td>
                        <td><?php echo "€" . $item['product_Price']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="product_ID" value="<?php echo $item['product_ID']; ?>">
                                <input type="submit" name="delete" value="Delete" style="width: 60%; height: 50%">
                            </form>
                        </td>
                    </tr>

                    <?php
                    $totalPrice += $item['product_Price'];
                } else {
                    // Remove the item from the cart if it doesn't exist in the database
                    unset($_SESSION['cart'][$key]);
                }
            }
            ?>
        </table>
        <hr>
        <br>
        <h2>Total: <?php echo "€" . $totalPrice; ?> </h2>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $product_ID = $_POST['product_ID'];

        $index = array_search($product_ID, $_SESSION['cart']);
        if ($index !== false) {
            // Remove the product from the cart
            array_splice($_SESSION['cart'], $index, 1);
            header("Location: cart.php");
            exit();
        }
    }
} else {
    // Display a message if the cart is empty
    echo "<p>Your cart is empty.</p>";
}

require 'layout/footer.php';
?>