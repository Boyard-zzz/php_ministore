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
require_once 'data/product.php';
require_once 'includes/header.php';

foreach ($products as $product) {
    echo '<p>' . $product['name'] . '</p>';
    echo '<p>' . $product['price'] . '</p>';


    echo '<form method="POST">';
    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
    echo '<button type="submit">Add to Cart</button>';
    echo '</form>';
    
    echo '</div>';








}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id = (int) $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if(isset($_SESSION['cart'][$id])){
         $_SESSION['cart'][$id]++;
    } else{
        $_SESSION['cart'][$id] = 1;
    }

    header('Location: index.php');
    exit;
    // Add product to cart logic here
}

require_once 'includes/footer.php';
?>
