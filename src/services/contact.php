<?php

require_once __DIR__ . '/../config/db.php';

// TEMPORAL USE OF ENV TO CONFIGURE TELEPHONE BUSINESS
$env = parse_ini_file(__DIR__ . '/../../.env');

$phone = $env['WHATSAPP'];

class contact
{
	public static function whatsapp(){
		global $phone;

		$telefono = $phone;
		$url = "https://wa.me/$telefono";
		return [
            "url" => $url
        ];
	}
}