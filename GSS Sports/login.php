<title>GSS Sports | Login</title>
<?php
    require 'layout/header.php';
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form" style="height: 300px">
        <h1>Login</h1>

        <form action="" method="post" style="margin-top: 20px">
            <div>
                <label for="prod-name">Username</label>
                <input type="text" name="name" required/>
            </div>

            <div>
                <label for="prod-price">Password</label>
                <input type="password" name="price" required/>
            </div>

            <button class="loginButton" name="" type="submit">Login</button>
                <br>
            <a class="signup" href="/signUp.php">Don't have an Account? Sign Up</a>
        </form>
    </div>
</center>

<?php  require 'layout/footer.php'?>