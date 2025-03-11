<?php
require_once './config/config.php';  // Inclure le fichier de configuration
?>
<!-- App footer -->
<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> My E-commerce Store. All rights reserved.</p>
        <ul>
            <li><a href="<?php echo BASE_URL . '/pages/terms.php'; ?>">Terms of Use</a></li>
            <li><a href="<?php echo BASE_URL . '/pages/privacy.php'; ?>">Privacy Policy</a></li>
            <li><a href="<?php echo BASE_URL . '/pages/sales.php'; ?>">Sales Terms</a></li>
        </ul>
    </div>
</footer>
