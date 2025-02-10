<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if needed
}
$pageTitle = "Privacy Policy";
include '../../includes/header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy policies</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Privacy Policy</h1>
    <p class="text-muted text-center">Last updated: <?php echo date("F j, Y"); ?></p>

    <h3>1. Data Collection</h3>
    <p>We collect personal data such as name, email, and payment details when you use our services.</p>

    <h3>2. Use of Data</h3>
    <p>Your data is used to process orders, provide customer support, and improve our services.</p>

    <h3>3. Data Protection</h3>
    <p>We take security seriously and use encryption and secure servers to protect your data.</p>

    <h3>4. Cookies</h3>
    <p>We use cookies to enhance user experience. You can disable them in your browser settings.</p>
</div>

<?php
include '../../includes/footer.php';
?>

</body>