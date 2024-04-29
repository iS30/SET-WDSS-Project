<?php
require 'layout/header.php';
require 'config.php'; // Include your database configuration file here

// Fetch products from the database
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="layout/style.css">

<div class="products">
    <?php foreach($products as $product): ?>
        <div class="card" style="width: 15rem; margin: 10px;">
            <img src="<?php echo $product['product_Image']; ?>" class="card-img-top" alt="<?php echo $product['product_Name']; ?>" style="width: 100%; height: auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['product_Name']; ?></h5>
                <p class="card-text"><?php echo $product['product_Description']; ?></p>
                <p class="card-text"><?php echo "Price: €" . $product['product_Price']; ?></p>
                <!-- Form to add product to cart -->
                <form action="cartFunction.php" method="post">
                    <input type="hidden" name="product_ID" value="<?php echo $product['product_ID']; ?>">
                    <input type="hidden" name="action" value="add">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require 'layout/footer.php'; ?>
