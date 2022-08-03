<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Subir Archivo Exitosa</title>

	<style type="text/css">
	</style>
</head>
<body>
<h2>El Archivo se Subio sin Problemas</h2>
<ul>
<?php
	foreach($upload_data as $item => $valor){
		
		if($item =="file_name"){
			print "<img src= '".base_url()."imagenes/".$valor."' width ='200'>";
		}
		print "<li>[".$item."]=>".$valor."</li>";
}
?></ul>
<?php print anchor("Usuarios/subirimagen","Subir otro Archivo"); ?>
</body>
</html>