<?php

require_once __DIR__ . '/../config/db.php';

// TEMPORAL USE OF ENV TO CONFIGURE TELEPHONE BUSINESS
$env = parse_ini_file(__DIR__ . '/../../.env');

$phone = $env['WHATSAPP'];

class checkout
{
	public static function buyWhatsapp()
	{

		global $conn;
        global $phone;

		$cart = [];
        $user_data = [];
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

            // Get cart data
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
            // Get user data
            $stmt = $conn->prepare("
                SELECT 
                    name,
                    address,
                    email,
                    phone
                FROM users
                WHERE id = ?
            ");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $result = $stmt->get_result();
            $user_data = $result->fetch_assoc();
    	}


        if (empty($cart)) {
            throw new Exception("El carrito está vacío");
        }

		// message
		$mensaje = "(DEMO)  Buen día, me gustaría ordenar:\n\n";
		$total = 0;

		foreach ($cart as $row) {
            $subtotal = $row['quantity'] * $row['price'];
            $total += $subtotal;

            $mensaje .= "- {$row['name']} x{$row['quantity']} ($" . number_format($subtotal, 0) . ")\n";
		}

		$mensaje .= "\nTotal: $" . number_format($total, 0);

        if (!empty($user_data)) {

            $mensaje .= "\n\nMi nombre es: {$user_data['name']}";
            $mensaje .= "\nMi dirección para el envío es: {$user_data['address']}";
            $mensaje .= "\nY mi número de contacto es: {$user_data['phone']}";
        }

		$telefono = $phone;

		$url = "https://wa.me/$telefono?text=" . urlencode($mensaje);

        return [
            "url" => $url,
            "total" => $total
        ];
	}
}