<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

// Autoloader
spl_autoload_register(function (string $class) {
    $map = ['App' => 'app'];
    foreach ($map as $prefix => $dir) {
        if (str_starts_with($class, $prefix)) {
            $relative = substr($class, strlen($prefix));
            $path = BASE_PATH . '/' . $dir . str_replace('\\', '/', $relative) . '.php';
            if (file_exists($path)) {
                require $path;
                return;
            }
        }
    }
});

// Load env
if (file_exists(BASE_PATH . '/.env')) {
    $lines = file(BASE_PATH . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

// Session
session_start();

// Timezone
date_default_timezone_set('Africa/Nairobi');

// Router
$router = new App\Core\Router();
require BASE_PATH . '/routes/web.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
