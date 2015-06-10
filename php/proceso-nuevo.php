<?php

include ("conexion.php");

	$con=mysql_connect($host,$user,$pswd)or die("Problema al conectar con el servidor");

	mysql_select_db($dabs,$con)or die ("Problema al solicitar base de datos");

	mysql_query("INSERT INTO usuarios (USERNAME,NOMBRES,APELLIDOS,PW,NO_TRABAJADOR,NACIMIENTO) VALUES ('$_POST[nickname]','$_POST[nombres]','$_POST[apellidos]','$_POST[contrasena]','$_POST[trabajador]','$_POST[nacimiento]')",$con);

?>