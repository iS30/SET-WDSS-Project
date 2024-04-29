<?php
global $conn;
    require ('config.php');

    if (isset($_POST['addProduct'])) {
        $NAME = $_POST['name'];
        $PRICE = $_POST['price'];
        $BIO = $_POST['bio'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/".$image_name;

        try {
            $insertQuery = "INSERT INTO products (product_Name, product_Price, product_Description, product_Image) values ('$NAME', '$PRICE', '$BIO', '$image_up')";
            $conn->exec($insertQuery);

            if (move_uploaded_file($image_location, 'images/'.$image_name)){
                echo "<script>alert('Product added Successfully!')</script>";
            }
            else {
                echo "<script>alert('Not added!')</script>";
            }
        }

        catch (PDOException $e) {
            echo $insertQuery . $e->getMessage();
        }
        header('Location: ./index.php');
    }

    elseif (isset($_POST['signUp'])) {
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $insertCust = "INSERT INTO customer (firstName, lastName, customer_Address, phoneNumber, email)
        VALUES ('$firstName', '$lastName', '$address', '$phone', '$email')";
            $insertUser = "INSERT INTO users (username, userPassword) VALUES ('$firstName', '$password')";
            $conn->exec($insertCust);
            $conn->exec($insertUser);

            echo "<script>alert('Sign Up Successful!')</script>";
        } catch (PDOException $e) {
            echo $insertCust. $insertUser. $e->getMessage();
        }
    }
?>