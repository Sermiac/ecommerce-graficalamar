<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

require_once __DIR__ . '/../../src/services/user_service.php';

try {
    session_start();
    $user = user_service::login($_POST);
    if (!$user) {
        echo json_encode([
            "success" => false,
            "message" => "Credenciales inválidas"
        ]);
        exit;
    }

    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION['role']    = $user['role'];

    echo json_encode([
        "success" => true,
        "name" => $user["name"]
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}