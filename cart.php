<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
</body>
</html>








<?php
session_start();
require_once 'data/product.php';
$totalprice = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = (int) $_POST['remove_id'];
    unset($_SESSION['cart'][$remove_id]);
    header('Location: cart.php');
    exit;
}

require_once 'includes/header.php';

if (empty($_SESSION['cart'])) {
    echo '<p>Your cart is empty.</p>';
} else {
    echo '<h2>Your Cart</h2>';

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        foreach ($products as $product) {
            if ($product['id'] === $product_id) {
                echo '<p>' . $product['name'] . ' - Quantity: ' . $quantity . '</p>';
                echo '<p>Price: ' . $product['price'] . '</p>';
                echo '<form method="POST">';
                echo '<input type="hidden" name="remove_id" value="' . $product['id'] . '">';
                echo '<button type="submit">Remove from Cart</button>';
                echo '</form>';
                $totalprice += $product['price'] * $quantity;
            }
        }
    }
    echo '<h3>Total: €' . number_format($totalprice, 2) . '</h3>';
}

require_once 'includes/footer.php';
?>
