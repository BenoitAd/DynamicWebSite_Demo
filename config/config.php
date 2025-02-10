<?php
    return [
        'DB_HOST' => getenv('DB_HOST') ?: 'db', // Use "db" to match the service name
        'DB_NAME' => getenv('DB_NAME') ?: 'ecommerce_demo',
        'DB_USER' => getenv('DB_USER') ?: 'user',
        'DB_PASS' => getenv('DB_PASS') ?: 'password',
    ];

