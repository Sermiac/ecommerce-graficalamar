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


	<div class="banner-container" id="banner-container">
	  <div id="banner1">
	    <?php include __DIR__ . '/components/horizontal-banner.php'; ?>
	  </div>
	  <div id="banner2" style="display:none">
	    <?php include __DIR__ . '/components/horizontal-banner2.php'; ?>
	  </div>
	</div>


	<main>
		<h1 class="title fadeInUp-animation">Catálogo</h1>

		<div class="categories fadeInUp-animation">
			<a href="/?category=camisetas" class="category-button">Camisetas</a>
			<a href="/?category=mugs" class="category-button">Mugs</a>
			<a href="/?category=caramañolas" class="category-button">Termos</a>
			<a href="/?category=agendas" class="category-button">Agendas</a>
		</div>

		<section id="products" class="cards">
		</section>

	</main>

	
	<?php include __DIR__ . '/components/whatsapp.php'; ?>

	<?php include __DIR__ . '/components/footer.php'; ?>

	<script type="module" src="/assets/js/index.js"></script>
	
</body>
</html>