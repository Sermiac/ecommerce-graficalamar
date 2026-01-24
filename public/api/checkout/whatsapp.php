<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

require_once __DIR__ . '/../../../src/services/checkout.php';

session_start();

try {
    $wtsapp = checkout::whatsapp();

    echo json_encode([
        "success" => true,
        "url" => $wtsapp['url'],
        "total" => $wtsapp['total']
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}