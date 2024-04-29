<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gss_sports";
$dsn = "mysql:host=$host;dbname=$dbname;";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<center>" . "Connected successfully!" . "</center>";
}

catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>