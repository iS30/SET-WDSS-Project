<?php
if (isset($_SESSION) != 'cart') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<style>
    body {
        font-family: sans-serif;
        background-color: whitesmoke;
    }

    .card {
        float: left;
    }

    nav {
        list-style-type: none;
        padding-left: 60px;
        padding-top: 15px;
        height: 60px;
        background-color: #3390bf;
    }

    li {
        display: inline;
        padding-left: 15px;
    }

    li a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    label {
        font-weight: bold;
        padding: 0px;
    }

    input {
        margin: 20px;
        padding-bottom: 10px;
    }

    button {
        margin: 10px;
    }

    li a:hover {
        color: aliceblue;
    }

    .active {
        margin-top: 10px;
        color: aliceblue;
    }
</style>

<nav>
    <li><a href="../index.php" class="active">Home</a></li>
    <li><a href="../Products.php" class="active">Products</a></li>
<!--    <li><a href="../viewProducts.php" class="active">View Products</a></li>-->
<!--    <li><a href="../addProduct.php" class="active">Add Products</a></li>-->
    <li><a href="../cart.php" class="active">Cart</a></li>

    <?php
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == 'admin') {
            echo '<li><a href="/addProduct.php">Add Products</a></li>';
            echo '<a href="../viewProducts.php" class="active">View Products</a></li>';
        }
    }
    ?>

    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo '<li style="float: right; padding-right: 60px"><a href="#">Hi ' . $username . '</a></li>';
        echo '<li style="float: right"><a href="/logout.php">Sign Out</a></li>';
    } else {
        echo '<li style="float: right; padding-right: 60px"><a href="../login.php">Login / Sign Up</a></li>';
    }
    ?>
</nav>
