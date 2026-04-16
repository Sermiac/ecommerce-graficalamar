<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../../../src/services/user_service.php';


try {

	if (!isset($_SESSION['user_id'])) {
	    throw new Exception('No hay sesión');
	}
	
    $profile = user_service::getProfile($_SESSION['user_id']);

    echo json_encode([
        'success' => true,
        'profile' => $profile
    ]);
    exit;
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}