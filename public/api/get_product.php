<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../src/services/products.php';

try {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID de producto no proporcionado']);
        exit;
    }

    $product = products::getById($id);

    if (!$product) {
        http_response_code(404);
        echo json_encode(['error' => 'Producto no encontrado']);
        exit;
    }

    echo json_encode($product);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener el producto']);
}
