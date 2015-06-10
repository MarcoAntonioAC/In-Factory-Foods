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
	<title>Factory Food - Nomina</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/iniciador-nomina.js" type="text/javascript" ></script>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="nomina_ss.css">
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
	<h1>Nomina</h1>
	<div class="aviso" id="parametros">
		<p>Ingrese por lo menos uno de los siguientes parametros para generar una consulta desde el sistema central de Factory Foods.</p>
		<form action="solicitud-nomina.php" class="form">
			<p>Nomina:</p>
			<input id="ciden" class="textbox1" type="text" placeholder="Introdusca ID de la nomina" name="nomina">
			<p>Empleado:</p>
			<input id="cempl" class="textbox1" type="text" placeholder="Introdusca ID del empleado" name="empleado">
			<br>
			<p><button type="button" id="submitConsultar">Solicitar</button></p>
			<center><a href="legal.html">Aviso de Privacidad</a></center>
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
			<p id="tiden">ID de la nomina:</p>
			<input id="iden" class="textbox1" type="text" placeholder="ID de la nomina existente" name="nomina">
			<p>ID del empleado:</p>
			<input id="empl" class="textbox1" type="text" placeholder="ID del empleado relacionado" name="empleado">
			<p>Sueldo:</p>
			<input id="suel" class="textbox3" type="number" min="0" step="100" name="sueldo">
			<p>Forma de Pago:</p>
			<select id="frma" class="textbox" name="forma">
				<option>Efectivo</option>
				<option>Cheque</option>
				<option>Deposito</option>
				<option>Transferencia</option>
				<option>Especie</option>
			</select>
			<p>Numero de Cuenta / CLABE:</p>
			<input id="cuen" class="textbox1" type="text" placeholder="Cuenta o CLABE" value="N/A" name="empleado">
			<br><br>
			<button type="button" id="submitGuardar">Guardar Registro</button>
			<div id="confirm"></div>
			<div id="avisoPriv"><a href="legal.html">Aviso de Privacidad</a></div>
		</form></div>';
	}else{

		echo '<div class="aviso"><div id="notificacion">Actualmente no cuenta con permisos de administrador. Si se trata de un error <a href="soporte.html#soporte">reportelo</a> al area de soporte encargada del sistema al interior de la empresa.</div></div>';

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