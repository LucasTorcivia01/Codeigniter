<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Modificar Usuarios</title>

	<style type="text/css">
	</style>
</head>
<body>

<form method="post" action="<?php print site_url("usuarios/modificarUsuario");?>">
	
	<label>Nombre: <input type="text" name="nombre" id="nombre"
		value="<?php print $usuario[0]->nombre;?>" 
	 > </label>
	<label>Correo: <input type="email" name="correo" id="correo"
		value="<?php print $usuario[0]->correo;?>" 
	 > </label>
	<label>Clave: <input type="password" name="clave" id="clave" 
		value="<?php print $usuario[0]->clave;?>" 
		> </label>
	<input type="submit" name="Enviar">
	<input type="hidden" name="id" id="id"
	value="<?php print $usuario[0]->id;?>" >

</form>
</body>
</html>