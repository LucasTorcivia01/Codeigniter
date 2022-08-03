<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
	<title>Vista de Usuarios</title>

	<style type="text/css">
	</style>
</head>
<body>

<nav class= "navbar navbar-expand-sm bg-dark navbar-dark">	
	
		<?php print $this->milibreria->regresarHome(); ?>
	</a>
</nav>
<div class="cointaner-fluid"> 
	<div class="row content">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	<h1>Alumnos</h1>

	<ul>
		<div>
		<?php 

				$plantilla =  array("table_open"=>"<table class='table'>");
				$this->table->set_template($plantilla);
				$this->table->set_heading(array("ID","Nombre","Apellidos","Nacimiento","Promedio","Sexo","Escuela","Salon","Curso"));
				echo $this->table->generate($usuarios);
				/*
				
				print "<table class='table'>";
				print "<tr><th>id</th><th>Nombre</th><th>Apellidos</th><th>Nacimiento</th><th>Promedio</th></tr>";

				foreach ($usuarios as $usuario) {
					print "<tr>";
					print "<td>".$usuario->id."</td>";
					print "<td>".$usuario->nombre."</td>";
					print "<td>".$usuario->apellidos."</td>";
					print "<td>".$usuario->nacimiento."</td>";
					print "<td>".$usuario->promedio."</td>";
					print "</tr>";

				}
					print "</table>";
					*/
					print $this->pagination->create_links();
		 ?>
		 	</table>
		 </div>
			</ul>


			<a href="<?php print site_url('usuarios/');?>"class="btn btn-info">Regresar</a>
			
</div>
			<div class="col-sm-2"></div>
</div>		
</body>
</html>