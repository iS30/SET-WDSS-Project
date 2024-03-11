<title>GSS Sports | Home</title>
<?php
    require 'layout/header.php';
    //require 'lib/functions.php';

//$pdo = new PDO('mysql:dbname=test;host=localhost', 'root', null);
//$result = $pdo ->query('SELECT * FROM products');
//$pets = $result->fetchAll();
//var_dump($rows);

//$pets = get_pets();

//require 'config.php';
//require 'Products.php';
//$allItems[] = Product();
?>

<link rel="stylesheet" href="layout/style.css">
<div class="products">
    <?php require 'Products.php'?>
<!--    --><?php //foreach ($allItems as $item) { ?>
<!--    <h1>--><?php //echo $item['name']?><!--</h1>-->
<!--    <ul>-->
<!--        <li><p><b>Price: </b>  € --><?php //echo $item['price']?><!--</p></li>-->
<!--        <li><p><b>Bio:</b> --><?php //echo $item['bio']?><!--</p></li>-->
<!--    </ul>-->
<!--        <hr>-->
<!--    --><?php //}?>
</div>

<?php require 'layout/footer.php'?>