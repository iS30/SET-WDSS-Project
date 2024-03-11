<?php
    $servername = "localhost";
    $username = "root";
    $password = "rootPass@5";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=gss_sports", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }

    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    ?>

   <?php
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    // Output data of each row
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<br>". " ID: ". $row["user_ID"]. " | Name: " . $row["adminUsername"] . " | Email: ". $row["email"]." | Password: ". $row["userPassword"];
    }
}
else {
    echo "0 results";
}

$conn = null; // Close the connection
?>