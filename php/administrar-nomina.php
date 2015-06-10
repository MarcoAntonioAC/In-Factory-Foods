<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$nomina = $_POST['nomina'];
	$empleado = $_POST['empleado'];
	$sueldo = $_POST['sueldo'];
	$forma = $_POST['forma'];
	$cuenta = $_POST['cuenta'];

	if ($nomina == ''){
		$sql = "INSERT INTO `nomina`(ID_EMPLEADO,SUELDO,FORMA,CUENTA) 
		    	VALUES ('".$empleado."','".$sueldo."','".$forma."','".$cuenta."')";
		$conexion->query($sql);
	}elseif ($nomina != '') {
		unset($sql);
		$sql = "UPDATE `nomina` 
				SET `ID_EMPLEADO`='".$empleado."',`SUELDO`='".$sueldo."',`FORMA`='".$forma."',`CUENTA`='".$cuenta."' WHERE `ID_NOMINA` = '".$nomina."'";
		$conexion->query($sql);
	}
?>