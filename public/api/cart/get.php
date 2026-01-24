<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../../../src/services/cart.php';

if (!isset($_SESSION['user_id'])) {
    if (!isset($_SESSION['cart'])) {
        http_response_code(204);
        echo json_encode(['success' => false, 'error' => 'Carrito vacio', 'code' => 204]);
        exit;
    }
    try {
        $items = Cart::get(null, $_SESSION['cart']);

        echo json_encode([
            'success' => true,
            'items' => $items
        ]);
        exit;
    } catch (Throwable $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Error al obtener carrito']);
    }
}

try {
    $items = Cart::get((int) $_SESSION['user_id']);

    echo json_encode([
        'success' => true,
        'items' => $items
    ]);
    exit;
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Error al obtener carrito']);
}
