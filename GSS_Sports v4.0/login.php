<title>GSS Sports | Login</title>
<?php
require 'layout/header.php';
require 'config.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $password === $row['userPassword']) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit(); // Ensure script execution stops after redirecting
        } else {
            // Invalid login credentials
            echo "<script>alert('Invalid username or password.')</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<link rel="stylesheet" href="layout/style.css">

<center>
    <div class="form" style="height: 300px">
        <h1>Login</h1>

        <form action="login.php" method="post" style="margin-top: 20px">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button class="loginButton" type="submit">Login</button>
            <br>
            <a class="signup" href="./signUp.php">Don't have an Account? Sign Up</a>
        </form>
    </div>
</center>

<?php require 'layout/footer.php'; ?>
