<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GrafiCalamar</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta name="description" content="Productos Sublimados GrafiCalamar">

	<link rel="stylesheet" href="/assets/css/index.css">
	<link rel="stylesheet" href="/assets/css/components/product_cards.css">
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
	

	<main>
		<h1 class="title fadeInUp-animation">Carrito</h1>

		<section id="no_session">
		</section>

		<section id="cart_items" class="cards">
		</section>

		<section id="cart_total" class="total-section fadeInUp-animation">
		</section>

		<?php if (!empty($_SESSION['cart']) || !empty($_SESSION['user_id'])): ?>
			<div class="buy-div">
				<button class="card-button buy-button fadeInUp-animation" id="buyBtn">Comprar</button>
			</div>
		<?php else: ?>
			<div></div>
		<?php endif; ?>

	</main>

	<footer class="footer pulse-animation">
		<a href="/" target="_blank" id="whatsapp">
			<img src="/assets/img/whatsapp.jpeg" alt="whtspp">
		</a>
	</footer>

	<?php include __DIR__ . '/components/footer.php'; ?>

	<script type="module" src="/assets/js/cart.js"></script>
	
</body>
</html>