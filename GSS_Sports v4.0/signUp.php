<title>GSS Sports | Sign Up</title>
<?php
require 'layout/header.php';
require 'insert.php';
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form" style="height: 520px">
        <h1>Sign Up</h1>

        <form action="./signUp.php" method="post" style="margin-top: 20px">
            <div>
                <label for="first-name">First Name</label>
                <input type="text" name="first-name" required/>
            </div>

            <div>
                <label for="last-name">Last Name</label>
                <input type="text" name="last-name" required/>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" name="address" required/>
            </div>

            <div>
                <label for="phone">Phone Number</label>
                <input type="number" name="phone" required/>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" required/>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" required/>
            </div>

            <button class="loginButton" name="signUp" type="submit">Sign Up</button>
            <br>
            <a class="signup" href="./login.php">Already have an Account? Login</a>
        </form>
    </div>
</center>

<?php  require 'layout/footer.php'?>