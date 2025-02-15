<?php
$db_url = getenv('DATABASE_URL');

if ($db_url) {
    $db_parts = parse_url($db_url);
    return [
        'DB_HOST' => $db_parts['host'],
        'DB_NAME' => ltrim($db_parts['path'], '/'),
        'DB_USER' => $db_parts['user'],
        'DB_PASS' => $db_parts['pass'],
    ];
} else {
    return [
        'DB_HOST' => getenv('DB_HOST') ?: 'localhost',
        'DB_NAME' => getenv('DB_NAME') ?: 'ecommerce_demo',
        'DB_USER' => getenv('DB_USER') ?: 'user',
        'DB_PASS' => getenv('DB_PASS') ?: 'password',
    ];
}


