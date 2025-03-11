<?php
$db_url = getenv('DATABASE_URL'); // Render fournit cette variable pour PostgreSQL
$use_postgres = !empty($db_url);  // Si DATABASE_URL existe, alors on est sur Render
const BASE_URL = '/dynamic_website_demo';

if ($use_postgres) {
    // PostgreSQL (Render)
    $db_parts = parse_url($db_url);
    return [
        'DB_DRIVER' => 'pgsql',
        'DB_HOST' => $db_parts['host'],
        'DB_NAME' => ltrim($db_parts['path'], '/'),  // Enlever le '/' du début de la base de données
        'DB_USER' => $db_parts['user'],
        'DB_PASS' => $db_parts['pass'],
        'DB_PORT' => isset($db_parts['port']) ? $db_parts['port'] : 5432,  // Port par défaut de PostgreSQL
    ];
} else {
    // MySQL (Local Docker)
    return [
        'DB_DRIVER' => 'mysql',
        'DB_HOST' => getenv('DB_HOST') ?: 'db', // "db" est le nom du service MySQL dans Docker
        'DB_NAME' => getenv('DB_NAME') ?: 'ecommerce_demo',
        'DB_USER' => getenv('DB_USER') ?: 'user',
        'DB_PASS' => getenv('DB_PASS') ?: 'password',
        'DB_PORT' => getenv('DB_PORT') ?: 3306, // Port par défaut de MySQL
    ];
}
