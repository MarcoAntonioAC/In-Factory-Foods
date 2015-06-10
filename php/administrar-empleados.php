<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$empleado = $_POST['empleado'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$puesto = $_POST['puesto'];
	$departamento = $_POST['departamento'];
	$antiguedad = $_POST['antiguedad'];
	$rfc = $_POST['rfc'];
	$nss = $_POST['nss'];

	if ($empleado == ''){
		$sql = "INSERT INTO `empleados`(NOMBRES,PATERNO,MATERNO,PUESTO,DEPARTAMENTO,ANTIGUEDAD,RFC,NSS) 
		    	VALUES ('".$nombres."','".$paterno."','".$materno."','".$puesto."','".$departamento."','".$antiguedad."','".$rfc."','".$nss."')";
		$conexion->query($sql);
	}elseif ($empleado != '') {
		unset($sql);
		$sql = "UPDATE `empleados` 
				SET `NOMBRES`='".$nombres."',`PATERNO`='".$paterno."',`MATERNO`='".$materno."',`PUESTO`='".$puesto."',`DEPARTAMENTO`='".$departamento."',`ANTIGUEDAD`='".$antiguedad."',`RFC`='".$rfc."',`NSS`='".$nss."' 
				WHERE `ID_EMPLEADO` = '".$empleado."'";
		$conexion->query($sql);
	}
?>