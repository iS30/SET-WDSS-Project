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
    }

    nav {
        list-style-type: none;
        padding: 10px;
        background-color: darkcyan;
        margin-bottom: 15px;
    }

    li {
        display: inline;
        padding-left: 20px;
    }

    a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    label {
        font-weight: bold;
        padding: 0px;
    }

    input {
        margin: 10px;
    }

    button {
        margin: 10px;
    }

    .login {
        float: right;
    }

    li a:hover {
        color: aliceblue;
        background-color: darkcyan;
    }

    .active {
        color: aliceblue;
    }
</style>

<nav>
    <li><a href="/" class="active">Home</a></li>
    <li><a href="/addProduct.php">Add Products</a></li>
    <li class="login"><a href="/login.php">Login / Sign Up</a></li>
</nav>