<title>GSS Sports | Add Products</title>

<?php
    require 'layout/header.php';
    require 'insert.php';
?>

<?php
    require 'lib/functions.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $name = '';
        }

        if (isset($_POST['price'])) {
            $price = $_POST['price'];
        } else {
            $price = '';
        }

        if (isset($_POST['bio'])) {
            $bio = $_POST['bio'];
        } else {
            $bio = '';
        }

        $pets = get_pets();
        $newPet = array(
            'name' => $name,
            'price' => $price,
            'bio' => $bio
        );

        $pets[] = $newPet;

        save_pets($pets);

        header('Location: /index.php');
        //die();
    }
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form">
        <h1>Add Products !</h1>

        <form action="/addProduct.php" method="post">
            <div>
                <label for="prod-name">Product Name</label>
                <input type="text" name="name" required="Please enter a Product Name"/>
            </div>

            <div>
                <label for="prod-price">Price</label>
                <input type="text" name="price" required="Please enter a Product Price"/>
            </div>

            <div>
                <label for="prod-bio">Bio</label>
                <textarea name="bio" style="height: 30px" required></textarea>
            </div>

            <button class="submit" name="addProduct" type="submit">Add ✓</button>
            <button class="cancel" type="button" onclick="window.location='index.php'">Cancel ✕</button>
        </form>
    </div>
</center>

<?php  require 'layout/footer.php'?>