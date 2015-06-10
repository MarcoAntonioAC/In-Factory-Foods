<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$idActividad = $_POST['idActividad'];

	$sql = "SELECT *
			FROM `actividades`
			WHERE `ID_ACTIVIDAD` = '".$idActividad."'";

	$query = $conexion->query($sql);

	if($query){
		$results = mysqli_num_rows($query);
	}

	if($results >= 1){

		$consulta = mysqli_fetch_array($query);
		echo '
		<p class="salida" id="actividad_id"><b>ID de la Actividad</b>: '.$consulta['ID_ACTIVIDAD'].'</p>
		<p class="salida" id="actividad_nombre"><b>Nombre</b>: '.$consulta['ACTIVIDAD'].'</p>
		<p class="salida" id="actividad_descripcion"><b>Descripcion</b>:<br>'.$consulta['DESCRIPCION'].'<br></p>
		<p class="salida" id="actividad_departamento"><b>Departamento</b>: '.$consulta['DEPARTAMENTO'].'</p>
		<p class="salida" id="actividad_fecha"><b>Fecha</b>: '.$consulta['FECHA'].'</p>
		<p class="salida" id="actividad_trabajadores"><b>ID del Encargado</b>: '.$consulta['ENCARGADO'].'</p>';

	} else if ($results <= 0){

		echo '<p class="salida">No se encontro resultado para el ID : '.$idActividad.'</p>';

	}
?>