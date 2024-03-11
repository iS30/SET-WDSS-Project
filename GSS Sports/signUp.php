<title>GSS Sports | Sign Up</title>
<?php
require 'layout/header.php';
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form" style="height: 380px">
        <h1>Sign Up</h1>

        <form action="" method="post" style="margin-top: 20px">
            <div>
                <label for="prod-name">First Name</label>
                <input type="text" name="first-name" required/>
            </div>

            <div>
                <label for="prod-name">Last Name</label>
                <input type="text" name="last-name" required/>
            </div>

            <div>
                <label for="prod-name">Email</label>
                <input type="email" name="name" required/>
            </div>

            <div>
                <label for="prod-price">Password</label>
                <input type="password" name="price" required/>
            </div>

            <button class="loginButton" name="" type="submit">Sign Up</button>
            <br>
            <a class="signup" href="/login.php">Already have an Account? Login</a>
        </form>
    </div>
</center>

<?php  require 'layout/footer.php'?>