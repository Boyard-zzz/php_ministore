<?php 
session_start();
require_once 'data/product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id = (int) $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }

    header('Location: index.php');
    exit;
}

require_once 'includes/header.php';

echo '<div class="product-grid">';

foreach ($products as $product) {
    echo '<div class="product-card">';
    echo '<h3>' . $product['name'] . '</h3>';
    echo '<p>€' . number_format($product['price'], 2) . '</p>';

    echo '<form method="POST">';
    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
    echo '<button type="submit">Add to Cart</button>';
    echo '</form>';
    echo '</div>';
}

echo '</div>';

require_once 'includes/footer.php';
?>
