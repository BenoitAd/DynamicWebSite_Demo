<?php
$config = include __DIR__ . '/../config/config.php';

try {
    // Détection automatique du driver (MySQL ou PostgreSQL)
    $dsn = "{$config['DB_DRIVER']}:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']};charset=utf8";

    // Options PDO
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    // Supprime `charset=utf8` pour PostgreSQL car il ne l'utilise pas dans DSN
    if ($config['DB_DRIVER'] === 'pgsql') {
        $dsn = "{$config['DB_DRIVER']}:host={$config['DB_HOST']};port={$config['DB_PORT']};dbname={$config['DB_NAME']}";
    }

    // Création de l'instance PDO
    $pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], $options);

    return $pdo;
} catch (PDOException $e) {
    die("Connection to the database failed: " . $e->getMessage());
}
