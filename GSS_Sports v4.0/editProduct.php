<?php
require 'layout/header.php';
require 'config.php'; // Include your database configuration file here

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product details from the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_ID = :product_id");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if product exists
    if ($product) {
        // Process form submission if POST request is received
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];

            // Check if a new image file is uploaded
            if ($_FILES['product_image']['name']) {
                // Upload the new image file
                $image_file = $_FILES['product_image']['name'];
                $image_temp = $_FILES['product_image']['tmp_name'];
                $upload_dir = "images/";
                $image_path = $upload_dir . $image_file;

                // Move the uploaded image to the images directory
                move_uploaded_file($image_temp, $image_path);

                // Update the product image path in the database
                $stmt = $conn->prepare("UPDATE products SET product_Image = :product_image WHERE product_ID = :product_id");
                $stmt->bindParam(':product_image', $image_path);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
            }

            // Update product details in the database
            $stmt = $conn->prepare("UPDATE products SET product_Name = :product_name, product_Description = :product_description, product_Price = :product_price WHERE product_ID = :product_id");
            $stmt->bindParam(':product_name', $product_name);
            $stmt->bindParam(':product_description', $product_description);
            $stmt->bindParam(':product_price', $product_price);
            $stmt->bindParam(':product_id', $product_id);

            // Execute the SQL statement
            if ($stmt->execute()) {
                // Redirect to the viewProducts.php page after successful update
                header("Location: viewProducts.php");
                exit();
            } else {
                echo "Error updating product details.";
            }
        }
        ?>

        <div class="container">
            <h2>Edit Product</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="product_description">Description:</label>
                    <textarea class="form-control" id="product_description" name="product_description"><?php echo $product['product_Description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="product_price">Price:</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_Price']; ?>">
                </div>
                <div class="form-group">
                    <label for="product_image">Image:</label>
                    <input type="file" class="form-control-file" id="product_image" name="product_image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <?php
    } else {
        // Product not found in the database
        echo "Product not found.";
    }
} else {
    // Product ID not provided in the URL
    echo "Product ID not provided.";
}

require 'layout/footer.php';
?>
