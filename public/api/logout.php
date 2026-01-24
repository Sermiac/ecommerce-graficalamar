<?php
require __DIR__ . '/../../src/services/user_service.php';

session_start();
user_service::logout();

header('Content-Type: application/json');
echo json_encode(['success' => true]);
exit;
