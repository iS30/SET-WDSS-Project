<?php
require 'config.php';

global $conn, $row;

class Product {
    public $prodName;
    public $prodPrice;
    public $prodBio;

    public function getProdName() {
        return $this->prodName;
    }
    public function setProdName($prodName) {
        $this->prodName = $prodName;
    }

    public function getProdPrice() {
        return $this->prodPrice;
    }
    public function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }

    public function getProdBio() {
        return $this->prodBio;
    }
    public function setProdBio($prodBio) {
        $this->prodBio = $prodBio;
    }
}

// Fetch data from the database
$query = "SELECT name, price, bio FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt-> fetchAll(PDO::FETCH_ASSOC);

$allProducts = array();



foreach ($row as $item) {
// Create a Product object and assign values
    $product = new Product();
    $product->setProdName($item['name']);
    $product->setProdPrice($item['price']);
    $product->setProdBio($item['bio']);

    $allProducts[] = $product;
}

// Now you can use the product details
foreach ($allProducts as $product) {
    echo "Name: " . $product->getProdName() . "<br>";
    echo "Price: €" . $product->getProdPrice() . "<br>";
    echo "Bio: " . $product->getProdBio() . "<br>";
    echo "<hr>";
}
?>