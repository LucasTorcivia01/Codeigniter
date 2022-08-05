<h1>Modificar Alumno</h1>
	<form action="<?php print site_url("inicio/alumnoActualizar");?>" method="post">
		<div class="form-group text-left">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" value="<?php print $alumno[0]->nombre; ?>" > 
		</div>
		<div class="form-group text-left">
			<label for="apellidos">Apellidos:</label>
			<input type="text" name="apellidos" class="form-control" value="<?php print $alumno[0]->apellidos; ?>">
		</div>
		<div class="form-group text-left">
			<label for="nacimiento">Fecha de Nacimiento:</label>
			<input type="text" name="nacimiento" class="form-control" value="<?php print $alumno[0]->nacimiento; ?>">
		</div>
		<div class="form-group text-left">
			<label for="sexo">Genero:</label>
			<input type="text" name="sexo" class="form-control" value="<?php print $alumno[0]->sexo; ?>">
		</div>
		<div class="form-group text-left">
			<label for="promedio">Promedio:</label>
			<input type="text" name="promedio" class="form-control" value="<?php print $alumno[0]->promedio; ?>">
		</div>
		<input type="hidden" name="id"
		value="<?php print $alumno[0]->id; ?>">
		<br>
		<input type="submit" class="btn btn-success" value="Guardar">
		<a href="<?php print site_url('inicio/alumnos');?>" class="btn btn-success">Regresar</a>
	</form>
	