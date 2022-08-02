<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vista de Usuarios</title>

	<style type="text/css">
	</style>
</head>
<body>

<div id="container">
	<h1>'<?php print $nombre; ?>' te saludamos desde clase Usuarios</h1>

	<ul>
		
		<?php 
				if($dia=="dia"){
					print "<h2>Buenos Dias</h2>";
				}
		 ?>

	</ul>

</body>
</html>