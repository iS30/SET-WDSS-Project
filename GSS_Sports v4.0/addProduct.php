<title>GSS Sports | Add Products</title>

<?php
    require 'layout/header.php';
    require 'insert.php';
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form">
        <h1>Add Products !</h1>

        <form action="./addProduct.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="prod-name">Product Name</label>
                <input type="text" name="name" required="Please enter a Product Name"/>
            </div>

            <div>
                <label for="prod-price">Price</label>
                <input type="text" name="price" required="Please enter a Product Price"/>
            </div>

            <div>
                <label for="prod-bio">Description</label>
                <textarea name="bio" style="height: 30px" required></textarea>
            </div>

            <div class="upload">
                <label for="prod-image">Upload image</label>
                <input type="file" name="image">
            </div>

            <button class="submit" name="addProduct" type="submit">Add ✓</button>
            <button class="cancel" type="button" onclick="window.location='index.php'">Cancel ✕</button>
        </form>
    </div>
</center>

<?php  require 'layout/footer.php'?>