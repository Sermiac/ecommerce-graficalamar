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

    public static function getById($Id){
        global $conn;

        $stmt = $conn->prepare("
                    SELECT id, name, description, price, image, category
            FROM products
            WHERE id = ?
            ");

        $stmt->bind_param("s", $Id);

        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        $stmt->close();

        return $product;
    }
}