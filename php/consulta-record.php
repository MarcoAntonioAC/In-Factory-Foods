<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$idAsistencia = $_POST['idAsistencia'];
	$idEmpleado = $_POST['idEmpleado'];

	$sql = "SELECT *
			FROM `record`
			WHERE `ID_ASISTENCIA` = '".$idAsistencia."' OR `ID_EMPLEADO` = '".$idEmpleado."' ORDER BY  `ID_ASISTENCIA` DESC LIMIT 0 , 1";

	$query = $conexion->query($sql);

	if($query){
		$results = mysqli_num_rows($query);
	}

	if($results >= 1){

		$consulta = mysqli_fetch_array($query);
		echo '
		<p class="salida" id="record_id"><b>ID de la Asitencia</b>: '.$consulta['ID_ASISTENCIA'].'</p>
		<p class="salida" id="record_empleado"><b>ID del Empleado</b>: '.$consulta['ID_EMPLEADO'].'</p>
		<p class="salida" id="record_nombre"><b>Nombre / Firma Registrado: </b>: '.$consulta['NOMBRE'].'</p>
		<p class="salida" id="record_fecha"><b>Fecha</b>: '.$consulta['FECHA'].'</p>
		<p class="salida" id="record_hora"><b>Hora</b>: '.$consulta['HORA'].'</p>
		<p class="salida" id="record_terminal"><b>Terminal Utilizada</b>: '.$consulta['TERMINAL'].'</p>';

	} else if ($results <= 0){

		echo '<p class="salida">No se encontro resultado para el ID : '.$idAsistencia.'</p>';

	}
?>