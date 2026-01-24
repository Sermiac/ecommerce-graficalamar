<?php

require_once __DIR__ . '/../config/db.php';

class products {
    public static function get($category = null) {
        global $conn;

        $sql = "
            SELECT id, name, description, price, image
            FROM products
        ";

        if ($category !== null) {
            $sql .= " WHERE category = ?";
        }

        $stmt = $conn->prepare($sql);

        if ($category !== null) {
            $stmt->bind_param("s", $category);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}