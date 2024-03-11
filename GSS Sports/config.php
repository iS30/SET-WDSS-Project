<?php
$host = "localhost";
$user = "GSS_Admin";
$pass = "";
$dbname = "test";
$dsn = "mysql:host=$host;dbname=$dbname;";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<center>" . "Connected successfully!" . "</center>";
}

catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>