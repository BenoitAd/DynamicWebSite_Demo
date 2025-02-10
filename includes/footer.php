<!-- App footer -->
<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> My E-commerce Store. All rights reserved.</p>
        <ul>
            <li><a href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pages/terms.php'; ?>">Terms of Use</a></li>
            <li><a href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pages/privacy.php'; ?>">Privacy Policy</a></li>
            <li><a href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pages/sales.php'; ?>">Sales Terms</a></li>
        </ul>
    </div>
</footer>
