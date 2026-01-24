<?php

require_once __DIR__ . '/../config/db.php';

class Cart
{
    public static function add(int $userId, int $productId): void
    {
        global $conn;

        if ($productId <= 0) {
            throw new Exception("Producto inválido");
        }

        $stmt = $conn->prepare("
            INSERT INTO cart_items (user_id, product_id, quantity)
            VALUES (?, ?, 1)
            ON DUPLICATE KEY UPDATE quantity = quantity + 1
        ");

        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
    }

        public static function remove(int $userId, int $productId): void
    {
        global $conn;

        if ($productId <= 0) {
            throw new Exception("Producto inválido");
        }

        $stmt = $conn->prepare("
            DELETE FROM cart_items
            WHERE ? = user_id and ? = product_id
        ");

        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
    }

    public static function get($userId = null, $items = null): array
    {
        global $conn;

        if (!$userId && !empty($items)) {
            $data = [];

            foreach ($items as $productId => $qty) {
                $stmt = $conn->prepare("
                    SELECT name, image, price FROM products WHERE id = ?
                ");
                $stmt->bind_param("i", $productId);
                $stmt->execute();

                $result = $stmt->get_result()->fetch_assoc();
                if ($result) {
                    $result['quantity'] = $qty;
                    $result['subtotal'] = $result['price'] * $qty;
                    $result['product_id'] = $productId;

                    $data[] = $result;
                }
            }

            return $data;
        }

        $stmt = $conn->prepare("
            SELECT 
                c.product_id,
                c.quantity, 
                p.name, 
                p.price,
                p.image,
                (c.quantity * p.price) AS subtotal
            FROM cart_items c
            JOIN products p ON p.id = c.product_id
            WHERE c.user_id = ?
        ");

        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
