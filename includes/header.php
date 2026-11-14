<?php
// Start the session only if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calculate total items in the cart for the navbar badge
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $quantity) {
        $cartCount += $quantity;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mini Store</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header class="navbar">
    <div class="container">
        <a href="index.php" class="logo">MiniStore</a>
        <nav>
            <a href="index.php">Products</a>
            <a href="cart.php" class="cart-link">
                Cart (<?= $cartCount ?>)
            </a>
        </nav>
    </div>
</header>

<main class="container">
