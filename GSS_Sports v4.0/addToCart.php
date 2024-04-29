<?php
global $sql, $conn;
require 'cartFunction.php';
require 'layout/header.php';

/**
 * List all users with a link to edit
 */
try {
    require_once 'config.php';
    $sql = "SELECT * FROM products where product_id = :product_id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll();

    echo '<p>' . $product_id;
}
catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>