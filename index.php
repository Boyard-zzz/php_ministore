<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
















<?php 
session_start();
 require_once 'data/products.php';
 require_once 'includes/header.php';




if($_SERVER['REQUEST_METHOD'] === 'POST')

foreach($products as $product) {
  
 echo '<p>' . $product['name'] . '</p>'
 echo '<p>'  . $product['price'] . '</p>'

}

?>