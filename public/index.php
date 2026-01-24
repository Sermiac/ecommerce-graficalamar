<?php

// Security configs
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
    ini_set('session.cookie_secure', '1');
}
ini_set('session.use_strict_mode', '1');
ini_set('session.cookie_httponly', '1');

// Logs and errors
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '1');

session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/login':
        require __DIR__ . '/../src/pages/login.php';
        break;

    case '/register':
        require __DIR__ . '/../src/pages/register.php';
        break;

    case '/cart':
        require __DIR__ . '/../src/pages/cart.php';
        break;


    case '/':
    case '':
        require __DIR__ . '/../src/pages/home.php';
        break;

    default:
        http_response_code(404);
        echo 'Página no encontrada';
}