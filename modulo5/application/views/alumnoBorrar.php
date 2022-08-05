<h1>Borrar Alumno</h1>
<div class="alert alert-danger" role="alert"><b>Atencion:</b> una vez borrado el registro no se podra recuperar la informacion</div>
	<form action="<?php print site_url("inicio/alumnoBorrarRegistro");?>" method="post">
		<div class="form-group text-left">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" value="<?php print $alumno[0]->nombre; ?>"disabled > 
		</div>
		<div class="form-group text-left">
			<label for="apellidos">Apellidos:</label>
			<input type="text" name="apellidos" class="form-control" value="<?php print $alumno[0]->apellidos; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="nacimiento">Fecha de Nacimiento:</label>
			<input type="text" name="nacimiento" class="form-control" value="<?php print $alumno[0]->nacimiento; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="sexo">Genero:</label>
			<input type="text" name="sexo" class="form-control" value="<?php print $alumno[0]->sexo; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="promedio">Promedio:</label>
			<input type="text" name="promedio" class="form-control" value="<?php print $alumno[0]->promedio; ?>"disabled>
		</div>
		<input type="hidden" name="id"
		value="<?php print $alumno[0]->id; ?>">
		<br>
		<input type="submit" class="btn btn-danger" value="Borrar">
		<a href="<?php print site_url('inicio/alumnos');?>" class="btn btn-success">Regresar</a>
	</form>
	