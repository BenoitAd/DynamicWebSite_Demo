<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Démarre la session si elle n'est pas déjà active
}

// Check if the cart exists, otherwise create an empty cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle removing items from the cart
if (isset($_GET['remove'])) {
    $productId = filter_input(INPUT_GET, 'remove', FILTER_VALIDATE_INT);
    if ($productId && isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Remove the product from the cart
    }
}

// Handle updating the quantity of items
if (isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $productId => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity; // Update quantity
        } else {
            unset($_SESSION['cart'][$productId]); // Remove product if quantity is 0
        }
    }
}

// Handle emptying the entire cart
if (isset($_POST['empty_cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        unset($_SESSION['cart'][$productId]);
    }
}

// Calculate the total price of the cart
$totalPrice = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'] * $product['quantity'];
}

// If the cart is empty, display a message
if (empty($_SESSION['cart'])) {
    $cartEmptyMessage = "Your cart is empty.";
} else {
    $cartEmptyMessage = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Header -->
<?php include '../../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Your Shopping Cart</h1>

    <?php if ($cartEmptyMessage): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $cartEmptyMessage; ?>
        </div>
    <?php else: ?>
        <!-- Cart Form to update quantities or remove items -->
        <form action="cart.php" method="POST"> <!-- Form tag added here -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo $productId; ?>]" value="<?php echo $product['quantity']; ?>" min="1" class="form-control" style="width: 80px;">
                            </td>
                            <td>$<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                            <td>
                                <a href="cart.php?remove=<?php echo $productId; ?>" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart totals and buttons -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <button type="submit" name="update" class="btn btn-primary">Update Cart</button>
                    <button type="submit" name="empty_cart" class="btn btn-secondary">Empty Cart</button>
                </div>
                <div class="col-md-6 text-right">
                    <h4>Total: $<?php echo number_format($totalPrice, 2); ?></h4>
                    <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                </div>
            </div>
        </form>
    <?php endif; ?>

</div>

<!-- Footer -->
<?php include '../../includes/footer.php'; ?>

</body>
</html>
