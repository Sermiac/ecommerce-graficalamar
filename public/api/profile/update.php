<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../../../src/services/user_service.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    if (!isset($_SESSION['user_id'])) {
        throw new Exception('No hay sesión');
    }

    $data = $_POST;

    if (!$data) {
        throw new Exception('Datos inválidos');
    }

    user_service::updateProfile($data, $_SESSION['user_id']);

    echo json_encode(['success' => true]);

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}