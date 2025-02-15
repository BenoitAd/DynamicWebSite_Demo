<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it hasn't been started yet
}
$pageTitle = "My store Product Collection"; // title definition
$pdo = include __DIR__ . '/../includes/db_connection.php'; // database config

// get all the products from the database table
if (isset($pdo)) {
    $query = $pdo->query('SELECT * FROM products');
    // Récupère tous les produits dans un tableau
    $products = $query->fetchAll();
    // Mélange le tableau de produits
    shuffle($products);
}

include '../includes/header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Store Home Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="images/<?php echo $product['image_url']; ?>.png" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <div class="card-title-prize">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="text-success card-price">$<?php echo $product['price']; ?></p>
                        </div>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="pages/product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
