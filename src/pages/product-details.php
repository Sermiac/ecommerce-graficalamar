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
	<header class="header">
	  <a href="/">
    	<picture>
      		<source class="logo" srcset="assets/img/GrafiCalamar_logoMobile.png" media="(max-width:768px)">
      		<img class="logo" src="assets/img/GrafiCalamar_logo.png" alt="Logo">
		</picture>
	  </a>

	  <nav class="nav">
	  	<ul class="nav-category">
	      <li class="dropdown">
	        <a href="#">Categorías</a>
	        <ul class="dropdown-menu">
	          <li><a href="/?category=camisetas" class="category-button">Camisetas</a></li>
	          <li><a href="/?category=mugs" class="category-button">Mugs</a></li>
	          <li><a href="/?category=caramañolas" class="category-button">Termos</a></li>
	          <li><a href="/?category=agendas" class="category-button">Agendas</a></li>
	        </ul>
	      </li>
	  	</ul>

	    <ul class="nav-list">
	      <li><a href="/cart">Carrito</a></li>

	      <?php if (isset($_SESSION['user_id'])): ?>
	        <li><a href="/profile">Perfil</a></li>
	        <li><button id="logoutBtn">Cerrar sesión</button></li>
	      <?php else: ?>
	        <li><a href="/login">Iniciar sesión</a></li>
	        <li><a href="/register">Registrarse</a></li>
	      <?php endif; ?>
	    </ul>
	  </nav>
	</header>



	<main class="product-container">
		<section class="product-details fadeInUp-animation">
			<div class="product-images">
				<img src="/assets/img/camiseta.jpg" alt="Camiseta Blanca" class="main-image">
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



	<footer class="footer pulse-animation">
		<a href="/" target="_blank" id="whatsapp">
			<img src="/assets/img/whatsapp.jpeg" alt="whtspp">
		</a>
	</footer>


	<script type="module" src="/assets/js/product-details.js"></script>
</body>
</html>