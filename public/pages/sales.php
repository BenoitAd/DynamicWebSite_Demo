<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if needed
}
$pageTitle = "Sales Policy";
include '../../includes/header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales conditions</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Sales Policy</h1>
    <p class="text-muted text-center">Last updated: <?php echo date("F j, Y"); ?></p>

    <p>Welcome to our Sales Policy page. We believe in transparency and customer satisfaction. Below, you’ll find our terms regarding purchases, refunds, and warranties.</p>

    <h3>1. Order Processing</h3>
    <p>All orders are processed within 24-48 hours. You will receive an email confirmation once your order has been shipped.</p>

    <h3>2. Returns & Refunds</h3>
    <p>Returns are accepted within 30 days of purchase. Items must be in original condition. Refunds are processed within 7 business days.</p>

    <h3>3. Warranty</h3>
    <p>All products come with a 1-year manufacturer’s warranty. If you encounter any issues, contact our support team.</p>
</div>

<?php include '../../includes/footer.php'; ?>
</body>