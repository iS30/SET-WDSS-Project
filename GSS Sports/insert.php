<?php
global $conn;
    require ('config.php');

    if (isset($_POST['addProduct'])) {
        $NAME = $_POST['name'];
        $PRICE = $_POST['price'];
        $BIO = $_POST['bio'];

        try {
            $insertQuery = "INSERT INTO products (name, price, bio) values ('$NAME', '$PRICE', '$BIO')";
            $conn->exec($insertQuery);
        }

        catch (PDOException $e) {
            echo $insertQuery . $e->getMessage();
        }

        header('Location: /index.php');

    }
?>