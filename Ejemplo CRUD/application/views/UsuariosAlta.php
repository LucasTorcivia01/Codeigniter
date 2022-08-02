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

<form method="post" action="<?php print site_url("usuarios/Alta");?>">
	
	<label>Nombre: <input type="text" name="nombre" id="nombre" > </label>
	<label>Correo: <input type="email" name="correo" id="correo" > </label>
	<label>Clave: <input type="password" name="clave" id="clave" > </label>
	<input type="submit" name="Enviar">

</form>

</body>
</html>