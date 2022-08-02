<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Alta de Usuarios</title>

	<style type="text/css">
	</style>
</head>
<body>

<?php

$nombre = array('name' => 'nombre' , 'placeholder' => 'Nombre');
$correo = array('name' => 'correo' , 'placeholder' => 'Correo', 'type' => "email");
$clave = array('name' => 'clave' , 'placeholder' => 'Clave de acceso', 'type' => "password");
print form_open("/usuarios/Alta");
print form_label("Nombre:","nombre");
print form_input($nombre);
print form_label("Correo:","correo");
print form_input($correo);
print form_label("Clave de acceso:","clave");
print form_input($clave);
print form_submit("","Enviar");
print form_close();


?>



</body>
</html>