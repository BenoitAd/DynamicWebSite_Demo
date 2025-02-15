<?php
$config = include __DIR__ . '/../config/config.php';

try {
    // Détection automatique du driver (MySQL ou PostgreSQL)
    if ($config['DB_DRIVER'] === 'pgsql') {
        // PostgreSQL n'a pas besoin de charset dans DSN
        $dsn = "{$config['DB_DRIVER']}:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']}";
    } else {
        // Pour MySQL, ajout du charset pour une meilleure gestion des caractères spéciaux
        $dsn = "{$config['DB_DRIVER']}:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']};charset=utf8mb4";
    }

    // Options PDO
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    // Création de l'instance PDO
    $pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], $options);

    return $pdo;
} catch (PDOException $e) {
    // Log the error and display a generic message
    error_log($e->getMessage(), 3, '/var/log/php-db-errors.log');  // You can adjust the path
    die("Connection to the database failed. Please try again later.");
}
