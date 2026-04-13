<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GrafiCalamar</title>
	<meta name="description" content="Productos Sublimados GrafiCalamar">

	<link rel="stylesheet" href="/assets/css/index.css">
	<link rel="stylesheet" href="/assets/css/components/product_cards.css">
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
	          <li><a href="/?category=caramañolas" class="category-button">Caramañolas</a></li>
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
		

	<main>
		<h1 class="title fadeInUp-animation">Tienda</h1>

		<div class="categories fadeInUp-animation">
			<a href="/?category=camisetas" class="category-button">Camisetas</a>
			<a href="/?category=mugs" class="category-button">Mugs</a>
			<a href="/?category=caramañolas" class="category-button">Caramañolas</a>
			<a href="/?category=agendas" class="category-button">Agendas</a>
		</div>

		<section id="products" class="cards">
		</section>

	</main>

	<footer class="footer">
		<p>copyright GrafiCalamar</p>
	</footer>

	<script type="module" src="/assets/js/index.js"></script>
	
</body>
</html>