<?php


$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');


session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $isHttps,
    'httponly' => true,
    'samesite' => 'Strict'
]);

ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');

session_start();

# Expiration due to inactivity
$inactiveTimeout = 1800;
if (isset($_SESSION['user_id'])) {

    if (isset($_SESSION['last_activity']) && 
        time() - $_SESSION['last_activity'] > $inactiveTimeout) {

        session_unset();
        session_destroy();

        header('Location: /login?expired=1');
        exit;
    }

    $_SESSION['last_activity'] = time();
}

# Expiration after 24h
$absoluteTimeout = 86400;
if (!isset($_SESSION['created_at'])) {
    $_SESSION['created_at'] = time();
} elseif (time() - $_SESSION['created_at'] > $absoluteTimeout) {
    session_unset();
    session_destroy();

    header('Location: /login?expired=1');
    exit;
}


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