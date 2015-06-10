<?php

session_start();

include ('php/conexion.php');

if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
	echo '<script type="text/javascript">
				window.location = "inicio.php";
		</script>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Inicio de Sesión</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/iniciador-login.js"></script>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="login_ss.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>

	<h1>In Factory Foods</h1>

	<form id="formulario" method="post" class="form">
		<br>
		<p>Nombre de usuario:</p>
		<input id="user" class="textbox" type="text" placeholder="Introduzca su nombre de usuario." name="nickname">
		<p>Contraseña:</p>
		<input id="pass" class="textbox" type="password" placeholder="Introduzca la contraseña de su cuenta." name="constraseña">
		<br><br><br>
		<button id="login_submit" name="login" type="submit" tabindex="3">Iniciar sesión</button>
		<br><br>
		<a href="nuevo.html">Crear un Nuevo Usuario</a>
		<br><br>
		<a href="legal.html">Aviso de Privacidad</a>
	</form>

	<h2></h2>

</body>

</html>