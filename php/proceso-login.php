<?php

session_start();

include ('conexion.php');

	$conexion = mysqli_connect($host,$user,$pswd,$dabs);

	if (mysqli_connect_errno())
  	{
 		echo "Error al Conectar MySQL: " . mysqli_connect_error();
  	}

	$username = htmlentities($_POST['nickname']);
	$password = htmlentities($_POST['contrasena']);

	$consulta = sprintf("SELECT * FROM  `usuarios` WHERE USERNAME =  '".$username."' COLLATE utf8_bin AND PW =  '".$password."' COLLATE utf8_bin");

	$query = mysqli_query($conexion, $consulta);

	if($query){

		$results = mysqli_num_rows($query);

	}

	if($results <= 0){

		echo 0;

	} else {

		echo 1;

		$sesion = mysqli_fetch_array($query);
		$_SESSION['tipo'] = $sesion['TIPO'];
		$_SESSION['username'] = $sesion['USERNAME'];

	}

?>
