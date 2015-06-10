<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$idEmpleado = $_POST['idEmpleado'];
	$rfc = $_POST['rfc'];
	$nss = $_POST['nss'];

	$sql = "SELECT *
			FROM `empleados`
			WHERE `ID_EMPLEADO` = '".$idEmpleado."' OR `RFC` = '".$rfc."' OR `NSS` = '".$nss."'";

	$query = $conexion->query($sql);

	if($query){
		$results = mysqli_num_rows($query);
	}

	if($results >= 1){

		$consulta = mysqli_fetch_array($query);
		echo '
		<p class="salida" id="empleados_id"><b>ID del Empleado</b>: '.$consulta['ID_EMPLEADO'].'</p>
		<p class="salida" id="empleados_nombre"><b>Nombres</b>: '.$consulta['NOMBRES'].'</p>
		<p class="salida" id="empleados_paterno"><b>Apellido Paterno</b>: '.$consulta['PATERNO'].'<br></p>
		<p class="salida" id="empleados_materno"><b>Apellido Materno</b>: '.$consulta['MATERNO'].'<br></p>
		<p class="salida" id="empleados_puesto"><b>Puesto</b>: '.$consulta['PUESTO'].'</p>
		<p class="salida" id="empleados_departamento"><b>Departamento</b>: '.$consulta['DEPARTAMENTO'].'</p>
		<p class="salida" id="empleados_antiguedad"><b>Antiguedad</b>: '.$consulta['ANTIGUEDAD'].'</p>
		<p class="salida" id="empleados_rfc"><b>Registro Federal de Causantes</b>: '.$consulta['RFC'].'</p>
		<p class="salida" id="empleados_nss"><b>Numero de Seguro Social</b>: '.$consulta['NSS'].'</p>';

	} else if ($results <= 0){

		echo '<p class="salida">No se encontro resultado para el ID : '.$idEmpleado.'</p>';

	}
?>