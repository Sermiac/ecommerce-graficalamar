<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../src/services/products.php';

try {
    $category = $_GET['category'] ?? null;

    echo json_encode(products::get($category));
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener productos']);
}
