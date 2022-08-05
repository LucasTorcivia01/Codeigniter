<h1>Detalle Alumno</h1>
	<form action="" method="">
		<div class="form-group text-left">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" value="<?php print $alumnos[0]->nombre; ?>"disabled > 
		</div>
		<div class="form-group text-left">
			<label for="apellidos">Apellidos:</label>
			<input type="text" name="apellidos" class="form-control" value="<?php print $alumnos[0]->apellidos; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="nacimiento">Fecha de Nacimiento:</label>
			<input type="text" name="nacimiento" class="form-control" value="<?php print $alumnos[0]->nacimiento; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="sexo">Genero:</label>
			<input type="text" name="sexo" class="form-control" value="<?php print $alumnos[0]->sexo; ?>"disabled>
		</div>
		<div class="form-group text-left">
			<label for="promedio">Promedio:</label>
			<input type="text" name="promedio" class="form-control" value="<?php print $alumnos[0]->promedio; ?>"disabled>
		</div>
		<br>
		<a href="<?php print site_url('inicio/alumnos');?>" class="btn btn-success">Regresar</a>
	</form>
	