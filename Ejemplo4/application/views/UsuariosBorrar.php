<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Borrar Usuarios</title>

	<style type="text/css">
	</style>
</head>
<body>

<form method="post" action="<?php print site_url("usuarios/borrarUsuario");?>">
	
	<label>Nombre: <input type="text" name="nombre" id="nombre"
		value="<?php print $usuario[0]->nombre;?>" disabled
	 > </label>
	<label>Correo: <input type="email" name="correo" id="correo"
		value="<?php print $usuario[0]->correo;?>" disabled
	 > </label>
	<label>Clave: <input type="password" name="clave" id="clave" 
		value="<?php print $usuario[0]->clave;?>" disabled
		> </label>
	<input type="submit" value="Borrar">
	<input type="hidden" name="id" id="id"
	value="<?php print $usuario[0]->id;?>" >

	<p>Advertencia una vez borrado el registro no se podra recuperar</p>
	<a href="<?php print site_url("usuarios/index");?>">Regresar</a>
</form>
</body>
</html>