<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the cart exists and is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php'); // Redirect to cart if it's empty
    exit();
}

// Calculate the total cart price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'] * $product['quantity'];
}

// Handle order submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here, you could add logic to process payment or save the order
    // Simple example: Clear the cart after order submission
    $_SESSION['cart'] = [];
    $orderSuccess = true; // Indicate successful order placement
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Include header -->
<?php include '../../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Checkout</h1>

    <!-- Show success message if the order was placed -->
    <?php if (isset($orderSuccess) && $orderSuccess): ?>
        <div class="alert alert-success" role="alert">
            Your order has been successfully placed! Thank you for your purchase.
        </div>
    <?php endif; ?>

    <h3>Your Order Summary</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <!-- Loop through cart items and display them -->
        <?php foreach ($_SESSION['cart'] as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td>$<?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td>$<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total Price: $<?php echo number_format($totalPrice, 2); ?></h4>

    <!-- Shipping information form -->
    <h3>Shipping Information</h3>
    <form action="checkout.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Place Order</button>
    </form>
    <div class="mb-4"></div>

</div>

<!-- Include footer -->
<?php include '../../includes/footer.php'; ?>

</body>
</html>
