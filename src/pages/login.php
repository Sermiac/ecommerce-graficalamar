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
			<img class="logo" src="assets/img/GrafiCalamar_logo2.png"></img>
		</a>
		<nav>
			<ul>
				<li><a href="/cart">Carrito</a></li>
				
	            <?php if (isset($_SESSION['user_id'])): ?>
	                <!-- User logued in -->
	                <li><a href="/profile">Perfil</a></li>
	                <li><button id="logoutBtn">Cerrar sesión</button></li>
	            <?php else: ?>
	                <!-- No user id -->
	                <li><a href="/login">Iniciar sesión</a></li>
	                <li><a href="/register">Registrarse</a></li>
	            <?php endif; ?>
			</ul>
		</nav>
	</header>

	<main>
		<h1 class="title">Loguearse</h1>
		<form id="loginForm" class="form">
			<input class="form-info" type="text" name="email" placeholder="Correo" required>
			<input class="form-info" type="password" name="password" id="password" placeholder="Contraseña" required>
			<input class="form-btn" type="submit" name="submit" value="Iniciar sesión">
			<a href="/register" class="no-register-button">No estoy Registrado</a>
		</form>
	</main>

		<footer class="footer">
			<p>copyright GrafiCalamar</p>
		</footer>

	<script src="/assets/js/login.js"></script>
</body>
</html>