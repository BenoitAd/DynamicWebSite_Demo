<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if needed
}
$pdo = include '../../includes/db_connection.php';

// Get the product ID from the URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die('Invalid product.');
}

if (isset($pdo)) {
    // Fetch the current product from the database
    $query = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $query->execute([$id]);
    $product = $query->fetch();

    // Fetch random products, excluding the current product
    $randomQuery = $pdo->query('SELECT * FROM products WHERE id != ' . $id . ' ORDER BY RAND() LIMIT 4');
    $randomProducts = $randomQuery->fetchAll();
}

// Handle the "Add to Cart" action
if (isset($_GET['add'])) {
    $productId = filter_input(INPUT_GET, 'add', FILTER_VALIDATE_INT);
    if ($productId) {

        // Check if the product is already in the cart in the session
        if (!isset($_SESSION['cart'][$productId])) {
            // Add the product to the session cart
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1 // Default quantity is 1
            ];

        } else {
            // If the product is already in the cart, increase the quantity in the session
            $_SESSION['cart'][$productId]['quantity']++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Header -->
<?php include '../../includes/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 img-product">
            <img src="../images/<?php echo htmlspecialchars($product['image_url']); ?>.png" class="img-fluid rounded shadow img" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h1 class="display-4"><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="lead"><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p class="h4 text-success">Price: $<?php echo number_format($product['price'], 2); ?></p>
            <a href="product.php?id=<?php echo $product['id']; ?>&add=<?php echo $product['id']; ?>" class="btn btn-primary btn-lg mt-3"> <i class="fas fa-shopping-cart"></i> Add to Cart  </a>
        </div>
    </div>

    <!-- Section for Random Products -->
    <div class="mt-5">
        <h2>You Might Also Like</h2>
        <div class="row">
            <?php foreach ($randomProducts as $randomProduct): ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="../images/<?php echo htmlspecialchars($randomProduct['image_url']); ?>.png" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <div class="card-title-prize">
                                <h5 class="card-title"><?php echo $randomProduct['name']; ?></h5>
                                <p class="text-success card-price">$<?php echo number_format($randomProduct['price'], 2); ?></p>
                            </div>
                            <p class="card-text"><?php echo htmlspecialchars($randomProduct['description']); ?></p>
                            <a href="product.php?id=<?php echo $randomProduct['id']; ?>" class="btn btn-secondary">View Product</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../../includes/footer.php'; ?>

</body>
</html>
