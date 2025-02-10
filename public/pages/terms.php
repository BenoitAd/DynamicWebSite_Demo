<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if needed
}
$pageTitle = "Terms & Conditions";
include '../../includes/header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terms & Conditions</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center">Terms & Conditions</h1>
    <p class="text-muted text-center">Last updated: <?php echo date("F j, Y"); ?></p>

    <h3>1. Introduction</h3>
    <p>By using our website, you agree to these terms and conditions. Please read them carefully.</p>

    <h3>2. Intellectual Property</h3>
    <p>All content on this site is our property and cannot be copied or reused without permission.</p>

    <h3>3. User Responsibilities</h3>
    <p>You are responsible for ensuring that your activities on our site comply with all laws and regulations.</p>

    <h3>4. Governing Law</h3>
    <p>These terms are governed by the laws of [your country]. Any disputes will be resolved in the appropriate courts.</p>
</div>

<?php include '../../includes/footer.php'; ?>
</body>