<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<style>
    body {
        margin: 0;
        font-family: sans-serif;
    }

    nav {
        padding: 0;
        margin: 0;
        position: fixed;
        top: 0;
        width: 100%;
        color: cadetblue;
        list-style-type: none;
        height: 50px;
        background-color: darkcyan;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        padding: 13px 20px 0 35px;
        color: black;
        font-weight: bold;
        text-decoration: none;
    }

    #gsearch {
        margin: 9px;
        border-radius: 5px;
        height: 25px;
    }

    .login {
        padding: 0px 40px 0 0;
        float: right;
    }

    .welcome {
        padding: 45px 0 0 30px;
    }

    li a:hover {
        color: aliceblue;
    }

    .active {
        color: aliceblue;
    }
</style>

<nav>
    <li><a href="" class="active">Home</a></li>
    <li><a href="">Products</a></li>
    <input type="search" id="gsearch" name="gsearch" placeholder="Search ...">
    <li class="login"><a href="">Login / Sign Up</a></li>
</nav>

<?php
$msg1 = ucwords("Hi there, welcome to our store.");
?>
<h1 class="welcome"><?php echo $msg1;?></h1>
</body>
</html>