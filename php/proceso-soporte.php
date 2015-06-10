<?php
// Datos provenientes del iniciador
$nombre = $_POST['nombre'];
$empleado = $_POST['empleado'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha'];
$clase = $_POST['clase'];
$descripcion = $_POST['descripcion'];
 
// Defnicion del asunto y armado el mensaje
$mensaje = "<b>Nombre</b>: " . $nombre . "<br>";
$mensaje .= "<b>Fecha</b>: " . $fecha . "<br>";
$mensaje .= "<b>Tipo de Solicitud</b>: " . $clase . "<br><br>";
$mensaje .= "<b>Mensaje</b>: <br><br>" . $descripcion;

// Correo de destino
$destino = "master@factoryfoods.info"; 
// Asunto del mensaje
$asunto  = "Soporte Factory Foods Web - Empleado No. ".$empleado;

// Cabezera de identificación para herramientas SPAM
$headers = "From: $nombre <$correo>\r\n";  
$headers .= "MIME-Version: 1.0" . "\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
// Conformación del mensaje para el metodo mail

    mail($destino,$asunto,$mensaje,$headers); //ENVIAR!

?>