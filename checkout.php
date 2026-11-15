<?php
session_start();

// Redirect back to store if cart is empty
if (empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (empty($name) || empty($email)) {
        $error = 'Please fill in both your name and email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Save customer name for the success page and clear the cart
        $_SESSION['customer_name'] = $name;
        unset($_SESSION['cart']);

        header('Location: succes.php');
        exit;
    }
}

require_once 'includes/header.php';
?>

<h2>Checkout</h2>

<?php if ($error !== ''): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" class="product-card">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" required>

    <button type="submit">Place Order</button>
</form>

<?php require_once 'includes/footer.php'; ?>
