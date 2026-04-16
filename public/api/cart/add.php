<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método no permitido', 'code' => 405]);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $productId = (int) ($_POST['product_id'] ?? 0);
    $amount = (int) ($_POST['quantity'] ?? 1);

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $amount;
    } else {
        $_SESSION['cart'][$productId] = $amount;
    }
    echo json_encode(['success' => true]);
    exit;
}

require_once __DIR__ . '/../../../src/services/cart.php';

try {

    $userId = (int) $_SESSION['user_id'];
    $productId = (int) ($_POST['product_id'] ?? 0);

    Cart::add($userId, $productId);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
