<?php

require_once __DIR__ . '/../config/db.php';

// TEMPORAL USE OF ENV TO CONFIGURE TELEPHONE BUSINESS
$env = parse_ini_file(__DIR__ . '/../../.env');

$phone = $env['WHATSAPP'];

class checkout
{
	public static function whatsapp()
	{

		global $conn;
        global $phone;

		$cart = [];
        if (!empty($_SESSION['cart'])) {
            $items = $_SESSION['cart'];

            foreach ($items as $productId => $qty) {
                $stmt = $conn->prepare("
                    SELECT * FROM products WHERE id = ?
                ");
                $stmt->bind_param("i", $productId);
                $stmt->execute();

                $result = $stmt->get_result()->fetch_assoc();
                if ($result) {
                    $result['quantity'] = $qty;
                    $result['subtotal'] = $result['price'] * $qty;

                    $cart[] = $result;
                }
            }
        }
    	else if (!empty($_SESSION['user_id'])) {

    		$userId = $_SESSION['user_id'];

	        $stmt = $conn->prepare("
	            SELECT 
	            	p.name, 
	                c.quantity, 
	                p.price
	            FROM cart_items c
	            JOIN products p ON p.id = c.product_id
	            WHERE c.user_id = ?
	        ");
	        $stmt->bind_param("i", $userId);
        	$stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $cart[] = $row;
            }
    	}


        if (empty($cart)) {
            throw new Exception("El carrito está vacío");
        }

		// message
		$mensaje = "Hola, quiero comprar:\n\n";
		$total = 0;

		foreach ($cart as $row) {
            $subtotal = $row['quantity'] * $row['price'];
            $total += $subtotal;

            $mensaje .= "- {$row['name']} x{$row['quantity']}\n";
		}

		$mensaje .= "\nTotal: $" . number_format($total, 0);

		$telefono = $phone;

		$url = "https://wa.me/$telefono?text=" . urlencode($mensaje);

        return [
            "url" => $url,
            "total" => $total
        ];
	}
}