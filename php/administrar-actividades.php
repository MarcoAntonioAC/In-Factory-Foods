<?php

session_start();

include ('conexion.php');

	$conexion = new mysqli($host, $user, $pswd, $dabs);

	if ($conexion->connect_error) {
    	die("Conexion fallida: " . $conexion->connect_error);
	} 

	$actividad = $_POST['actividad'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$departamento = $_POST['departamento'];
	$fecha = $_POST['fecha'];
	$encargado = $_POST['encargado'];

	if ($actividad == ''){
		$sql = "INSERT INTO `actividades`(ACTIVIDAD,DESCRIPCION,DEPARTAMENTO,FECHA,ENCARGADO) 
		    	VALUES ('".$nombre."','".$descripcion."','".$departamento."','".$fecha."','".$encargado."')";
		$conexion->query($sql);
	}elseif ($actividad != '') {
		unset($sql);
		$sql = "UPDATE `actividades` 
				SET `ACTIVIDAD`='".$nombre."',`DESCRIPCION`='".$descripcion."',`DEPARTAMENTO`='".$departamento."',`FECHA`='".$fecha."',`ENCARGADO`='".$encargado."' WHERE `ID_ACTIVIDAD` = '".$actividad."'";
		$conexion->query($sql);
	}
?>