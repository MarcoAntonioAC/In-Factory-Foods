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
	<title>Factory Food - Record</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/iniciador-record.js" type="text/javascript" ></script>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="record_ss.css">
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
					<li><a href="index.html#empresa">EMPRESA</a></li>
					<li><a href="soporte.html" target="_blank">AYUDA</a></li>
					<li><a href="inicio.php"><div class="icon user"></div><div class="username"><?php echo ucfirst($_SESSION['username']); ?></div></a></li>
					<li><a href="php/logout.php"><div class="icon logout"></div><div class="close">CERRAR DE SESI&Oacute;N</div></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="central">
	<div class="blank"></div>
	<h1>Record de Asitencia</h1>
	<div class="aviso" id="parametros">
		<p>Ingrese por lo menos uno de los siguientes parametros para generar una consulta desde el sistema central de Factory Foods.</p>
		<form action="solicitud-actividades.php" class="form">
			<p>ID de la Asistencia:</p>
			<input id="asis" class="textbox" type="text" placeholder="ID de la asistencia" name="asistencia">
			<p>ID del Empleado:</p>
			<input id="cempl" class="textbox" type="text" placeholder="ID del empleado" name="asistencia">
			<br>
			<p><button type="button" id="submitConsultar">Consultar</button></p>
			<div id="avisoPriv"><a href="legal.html">Aviso de Privacidad</a></div>
		</form>
	</div>
	<h1>Consulta</h1>
	<div class="aviso">
		<div id="notifier">Ingrese en la parte superior los parametros para realizar la consulta.</div>
		<div id="resultado"></div>
	</div>
	<h1>Administrador</h1>

	<?php
	if ($_SESSION['tipo'] == 'ADMIN') {
		
		echo '<div class="aviso"><form id="formAdmin" class="form" method="post">
			<p><input type="checkbox" name="mod" value="modificar" id="modificar"> Modificar Registro Existente</p>
			<p id="tiden">ID de la Asistencia:</p>
			<input id="iden" class="textbox1" type="text" placeholder="ID de la asistencia" name="asistencia">
			<p>ID del empleado:</p>
			<input id="empl" class="textbox1" type="text" placeholder="ID del empleado" name="empleado">
			<p>Nombre:</p>
			<input id="nomb" class="textbox1" type="text" placeholder="Nombre del empleado" name="nombre">
			<p>Fecha:</p>
			<input id="fecha" type="date" readonly>
			<p>Hora:</p>
			<input id="hora" type="time" readonly>
			<p>Terminal:</p>
			<input id="term" class="textbox3" type="text" placeholder="Numero de la Terminal" name="terminal">
			<br>
			<p><button type="button" id="submitGuardar">Cargar Registro</button></p>
			<p id="confirm"></p>
			<div id="avisoPriv"><a href="legal.html">Aviso de Privacidad</a></div>
		</form></div>';
	}else{

		echo '<div class="aviso"><center class="notificacion">Actualmente no cuenta con permisos de administrador. Si se trata de un error <a href="soporte.html#soporte">reportelo</a> al area de soporte encargada del sistema al interior de la empresa.</center></div>';

	}
	?>

	<script type="text/javascript">
		$(document).ready(function Modificar (){
			$('#tiden').hide(); 
			$('#iden').hide();
			$('#modificar').click(function(){
            if($(this).prop("checked") == true){
                $('#tiden').show(); 
				$('#iden').show();
            }
            else if($(this).prop("checked") == false){
                $('#tiden').hide(); 
				$('#iden').hide();
            }
        	});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function Fecha (){
			var fecha = new Date();
			var fechaFormato = fecha.toISOString().substring(0, 10);;
			$('#fecha').val(fechaFormato);
			var hora = new Date();
			var horaFormato = hora.toTimeString();
				horaFormato = horaFormato.split(' ')[0];
			$('#hora').val(horaFormato);
		});
	</script>

	<a href="inicio.php"><div class="regresar"><p>Regresar al Panel Principal</p></div></a>
	
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