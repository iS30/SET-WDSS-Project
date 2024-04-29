<?php
require 'layout/header.php';
require 'config.php'; // Include your database configuration file here

// Fetch products from the database
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="layout/style.css">

<div class="container">
    <h2>View Products</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_ID']; ?></td>
                <td><?php echo $product['product_Name']; ?></td>
                <td><?php echo $product['product_Description']; ?></td>
                <td><?php echo $product['product_Price']; ?></td>
                <td><img src="<?php echo $product['product_Image']; ?>" alt="<?php echo $product['product_Name']; ?>" style="width: 100px;"></td>
                <td>
                    <a href="editProduct.php?id=<?php echo $product['product_ID']; ?>" class="btn btn-primary">Edit</a>
                    <form method="post" action="deleteProduct.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_ID']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require 'layout/footer.php'; ?>
