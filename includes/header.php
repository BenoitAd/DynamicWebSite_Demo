<?php
require_once './config/config.php';  // Inclure le fichier de configuration

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}
?>

<!-- App Header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Forcing the dynamic reload -->
    <title><?php echo isset($pageTitle) ? $pageTitle : "My E-Commerce"; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Adding Font Awesome for Cart Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Adding the app custom css -->
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/css/style.css'; ?> <?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo BASE_URL . '/'; ?>">
        <img src="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/images/logo.png'; ?>"
             width="30" height="30" class="d-inline-block align-top" alt="Logo">
        My Dynamic Store
    </a>

    <!-- Cart Link (Right Side of the Navbar) -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link mr-2" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/pages/cart.php'; ?>"
                <i class="fas fa-shopping-cart"></i>
                <?php
                // Display number of items in the cart if it exists
                $cartCount = 0;
                if (isset($_SESSION['cart'])) {
                    $cartCount = array_sum(array_column($_SESSION['cart'], 'quantity')); // Sum all item quantities
                }
                ?>
                <i class="fas fa-shopping-cart"></i>
                <span class="badge badge-light mr-1"><?php echo $cartCount; ?></span> My Cart
            </a>
        </li>
    </ul>
</nav>

