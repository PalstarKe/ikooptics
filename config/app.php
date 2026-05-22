<?php
return [
    'name' => 'IKO OPTIC LTD',
    'url' => $_ENV['APP_URL'] ?? 'http://localhost:8000',
    'debug' => $_ENV['APP_DEBUG'] ?? true,
    'timezone' => 'Africa/Nairobi',
    'session_lifetime' => 7200,
    'upload_max_size' => 5 * 1024 * 1024,
    'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf'],
    'mail' => [
        'host' => $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com',
        'port' => $_ENV['MAIL_PORT'] ?? 587,
        'username' => $_ENV['MAIL_USER'] ?? '',
        'password' => $_ENV['MAIL_PASS'] ?? '',
        'from_name' => 'IKO OPTIC LTD',
    ],
];
