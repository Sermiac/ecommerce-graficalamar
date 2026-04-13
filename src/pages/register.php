<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GrafiCalamar</title>
	<meta name="description" content="Productos Sublimados GrafiCalamar">

	<link rel="stylesheet" href="/assets/css/index.css">
	<link rel="stylesheet" href="/assets/css/components/forms.css">
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
		<h1 class="title fadeInUp-animation">Registrarse</h1>
		<form id="registerForm" class="form fadeInUp-animation">
			<input class="form-info" type="text" name="name" placeholder="Nombre completo" required>
			<input class="form-info" type="text" name="email" placeholder="Correo" required>
			<input class="form-info" type="password" name="password" id="password" placeholder="Contraseña" required>
			<input class="form-info" type="password" name="confirm_password" id="confirm_password" placeholder="Confirme la Contraseña" required>
			<input class="form-info" type="text" name="phone" placeholder="Telefono" required>
			<textarea class="form-info" name="address" placeholder="Dirección de residencia"></textarea>
			<input class="form-btn" type="submit" name="submit" value="Registrarse">

			<p id="error" class="error"></p>
		</form>
	</main>

	<footer class="footer">
		<p>copyright GrafiCalamar</p>
	</footer>

	<script src="/assets/js/register.js"></script>
</body>
</html>