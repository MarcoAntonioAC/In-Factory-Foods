<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$idNomina = $_POST['idNomina'];
	$idEmpleado = $_POST['idEmpleado'];

	$sql = "SELECT *
			FROM `nomina`
			WHERE `ID_NOMINA` = '".$idNomina."' OR `ID_EMPLEADO` = '".$idEmpleado."'";

	$query = $conexion->query($sql);

	if($query){
		$results = mysqli_num_rows($query);
	}

	if($results >= 1){

		$consulta = mysqli_fetch_array($query);
		echo '
		<p class="salida" id="nomina_id"><b>ID de la Nomina</b>: '.$consulta['ID_NOMINA'].'</p>
		<p class="salida" id="nomina_empleado"><b>ID del empleado</b>: '.$consulta['ID_EMPLEADO'].'</p>
		<p class="salida" id="nomina_sueldo"><b>Sueldo</b>: $ '.$consulta['SUELDO'].'<br></p>
		<p class="salida" id="nomina_forma"><b>Forma de Pago</b>: '.$consulta['FORMA'].'</p>
		<p class="salida" id="nomina_clabe"><b>Numero de Cuenta / CLABE</b>: '.$consulta['CUENTA'].'</p>';

	} else if ($results <= 0){

		echo '<p class="salida">No se encontro resultado para el ID : '.$idNomina.'</p>';

	}
?>