<?php

require_once __DIR__ . '/../config/db.php';

class user_service
{
    public static function register($data)
    {

        $required = ['name','email','password','confirm_password','phone','address'];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new Exception("Falta el campo $field");
            }
        }

        if ($data['password'] !== $data['confirm_password']) {
            throw new Exception('Las contraseñas no coinciden');
        }

        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        global $conn;


        try {
            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)"
            );
            $stmt->bind_param('sssss',
                $data["name"],
                $data["email"],
                $hash,
                $data["phone"],
                $data["address"]
            );

            $stmt->execute();


        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                throw new Exception('El email ya está registrado');
            }
            throw $e;
        }
    }

    public static function login($data)
    {
        global $conn;

        try {
            $stmt = $conn->prepare(
                "SELECT id, name, password, role FROM users WHERE email = ? LIMIT 1"
            );
            $stmt->bind_param("s", $data["email"]);
            $stmt->execute();

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // User does not exist
            if (!$user) {
                return null;
            }

            // Verify passwd
            if (!password_verify($data["password"], $user["password"])) {
                return null;
            }

            $userId = $user['id'];
            # Merge carts if local cart exists
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                $stmtCart = $conn->prepare(
                    "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)
                     ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)"
                );

                foreach ($cart as $productId => $qty) {
                    $stmtCart->bind_param('iii', $userId, $productId, $qty);
                    $stmtCart->execute();
                }

                // Limpiar carrito de sesión
                unset($_SESSION['cart']);
            }

            // Sucess
            return [
                "id" => $user["id"],
                "name" => $user["name"],
                "role" => $user["role"]
            ];

        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public static function logout() {
        session_start(); 
        unset($_SESSION['user_id']);
        session_destroy(); 
        
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}
