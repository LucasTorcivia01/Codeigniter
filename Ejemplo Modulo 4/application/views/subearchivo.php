<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Subir Archivo</title>

	<style type="text/css">
	</style>
</head>
<body>

<?php
	
	print form_open_multipart("Usuarios/subearchivo");


?>
<input type="file" name="archivo">
<br><br>
<input type="submit" value="Subir Archivo">

</body>
</html>