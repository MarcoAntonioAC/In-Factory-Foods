<?php

session_start();

include ('php/conexion.php');

if(!isset($_SESSION['username'])){
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Panel Principal</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="inicio_ss.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>

	<div class="superior">
		<div class="principal">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" id="logo_kft"></a>
			</div>
			<div class="redes"></div>
			<div class="menu">
				<ul id="listado">
					<li><a href="index.html#empresa" target="_blank">EMPRESA</a></li>
					<li><a href="soporte.html" target="_blank">AYUDA</a></li>
					<li><a href="inicio.php"><div class="icon user"></div><div class="username"><?php echo ucfirst($_SESSION['username']); ?></div></a></li>
					<li><a href="php/logout.php"><div class="icon logout"></div><div class="close">CERRAR DE SESI&Oacute;N</div></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="central">
	<div class="blank"></div>
	<h1>Panel Principal</h1>
	<div class="aviso">
		<center><p class="icon info"></p> Aquí podrá solicitar a Kraft Foods información administrativa recabada por las oficinas centrales al instante, el contenido es mostrado de acuerdo a los permisos que se poseen.</center>
	</div>
	</div>

	<div class="controles">
		<a href="actividades.php"><div class="acceso">
			<p class="icon boton actividades"></p>
			<h2>Actividades</h2>
		</div></a>
		<a href="empleados.php"><div class="acceso">
			<p class="icon boton empleados"></p>
			<h2>Empleados</h2>
		</div></a>
		<a href="nomina.php"><div class="acceso">
			<p class="icon boton nomina"></p>
			<h2>Nomina</h2>
		</div></a>
		<a href="record.php"><div class="acceso final">
			<p class="icon boton record"></p>
			<h2>Record de Asistencia</h2>
		</div></a>
	</div>

	<div class="secundario">
		<div class="baja instrucciones">
			<h2>Instrucciones del Sistema: </h2>
			<ol>
				<li>Seleccione alguno de los botones para acceder a la sección.</li>
				<li>Utilice la opcion de consulta para solicitar información.</li>
				<li>El administrador de departamento cuenta con la opción para modificar y crear.</li>
				<li>Para finalizar seleccione la opcion Consultar o Guardar.</li>
				<li>Para cerrar su sesión utilice el boton en la parte de arriba.</li>
			</ol>
		</div>
		<div class="baja herramientas">
			<h2>Herramientas:</h2>
			<ul>
				<li><a href="php/logout.php"><p class="icon cerrar"></p>Cerrar Sesión</a></li>
				<li><a href="soporte.html#soporte"><p class="icon reportar"></p>Reportar un Problema</a></li>
				<li><a href="soporte.html"><p class="icon ayuda"></p>Visitar FAQ´s</a></li>
			</ul>
		</div>
	</div>

	<footer>
		<br>
		<div>
		<ul>
			<li class="footer_li"><a href="legal.html">Aviso de Privacidad</a></li>
			<li class="footer_li"><a href="sitemap.html">Mapa del Sitio</a></li>
			<li class="footer_li"><a href="soporte.html">Soporte</a></li>
			<li class="footer_li"><a href="login.php">Acceder</a></li>
			<li class="footer_li"><a href="nuevo.html">Crear Cuenta</a></li>
		</ul>
		</div>
		<br><br>
		&copy; 2015 Kraft Food ViNa Co.
	</footer>

</body>

</html>