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
</head>
<body>
	<?php include __DIR__ . '/components/header.php'; ?>
	
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

	<?php include __DIR__ . '/components/footer.php'; ?>



	<script src="/assets/js/register.js"></script>
</body>
</html>