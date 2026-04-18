<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GrafiCalamar</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta name="description" content="Productos Sublimados GrafiCalamar">
	
	<link rel="stylesheet" href="/assets/css/index.css">
	<link rel="stylesheet" href="/assets/css/components/forms.css">
	<link rel="stylesheet" href="/assets/css/product-details.css">
</head>
<body>

		<div class="announcement" style="background: #fff6ed;">
			<p id="announcementText2" style="color: black;">Pregunta por nuestros paquetes de regalos. Pensados para cualquier ocasión.</p>
			<p style="color: red;">20% off primera compra!</p>
		</div>

		<div class="announcement">
			<p id="announcementText"></p>
		</div>

	<?php include __DIR__ . '/components/header.php'; ?>



	<main class="product-container">
		<section class="product-details fadeInUp-animation">
			<div class="product-images">
				<img src="" alt="" class="main-image">
				<img src="" alt="" class="main-image">
				<img src="" alt="" class="main-image">
				<img src="" alt="" class="main-image">
			</div>
			<div class="product-info">
				<h1 class="product-title">Cargando...</h1>
				<p class="product-price"></p>
				<p class="product-description"></p>

				<div class="quantity-selector">
					<label for="quantity">Cantidad:</label>
					<input type="number" id="quantity" name="quantity" value="1" min="1">
				</div>

				<button id="cartBtn" class="add-to-cart">Agregar al Carrito</button>
			</div>
		</section>
	</main>




	<?php include __DIR__ . '/components/whatsapp.php'; ?>
	<?php include __DIR__ . '/components/footer.php'; ?>


	<script type="module" src="/assets/js/product-details.js"></script>
</body>
</html>