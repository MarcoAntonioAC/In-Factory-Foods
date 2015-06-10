<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$asistencia = $_POST['asistencia'];
	$empleado = $_POST['empleado'];
	$nombre = $_POST['nombre'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$terminal = $_POST['terminal'];

	if ($actividad == ''){
		$sql = "INSERT INTO `record`(ID_EMPLEADO,NOMBRE,FECHA,HORA,TERMINAL) 
		    	VALUES ('".$empleado."','".$nombre."','".$fecha."','".$hora."','".$terminal."')";
		$conexion->query($sql);
	}elseif ($actividad != '') {
		unset($sql);
		$sql = "UPDATE `record` 
				SET `ID_EMPLEADO`='".$empleado."',`NOMBRE`='".$nombre."',`FECHA`='".$fecha."',`HORA`='".$hora."',`TERMINAL`='".$terminal."' WHERE `ID_ASISTENCIA` = '".$asistencia."'";
		$conexion->query($sql);
	}
?>