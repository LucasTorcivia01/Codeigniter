<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Saludos desde Codeigniter</title>

	<style type="text/css">
	</style>
</head>
<body>

<div id="container">
	<h1>'<?php print $nombre; ?>' te saludamos desde CodeIgniter!</h1>

	<ul>
		
		<?php 
				foreach ($familia as $value) {
					print "<li>".$value."</li>";			
				}
		 ?>

	</ul>

</body>
</html>