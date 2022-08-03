<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Validacion de Formulario</title>

	<style type="text/css">
		.rojo{
			color: red;
		}
	</style>
</head>
<body>
	<?php //print validation_errors(); ?>
<form method="post" action="<?php print site_url("Usuarios/verificar");?>">
		<label for="nombre">Nombre: </label><br>
		<input type="text" name="nombre"
		value="<?php print set_value("nombre");?>">
		<?php print form_error("nombre"); ?><br><br>
		<label for="clave">Clave: </label><br>
		<input type="password" name="clave" 
		value="<?php print set_value("clave");?>">
		<?php print form_error("clave"); ?><br><br>
		<label for="clave2">Repita la Clave: </label><br>
		<input type="password" name="clave2"
		value="<?php print set_value("clave2");?>">
		<?php print form_error("clave2"); ?><br><br>
		<label for="correo">Correo: </label><br>
		<input type="text" name="correo"
		value="<?php print set_value("correo");?>">
		<?php print form_error("correo"); ?><br><br>
		<label for="comentario">Comentario:</label><br>
		<textarea name="comentario" >
			<?php print set_value("comentario");?>
		</textarea>
		<?php print form_error("comentario"); ?>
		<br><br>
		<label for="numeros">Numero: </label><br>
		<select name="numeros">
			<option name="void" value="void">-Seleccione un Numero-</option>
			<option name="uno" value="uno"<?php print set_select('numeros','uno');?>>Uno</option>
			<option name="dos" value="dos"<?php print set_select('numeros','dos');?>>Dos</option>
			<option name="tres" value="tres"<?php print set_select('numeros','tres');?>>Tres</option>
		</select>
		<?php print form_error("numeros"); ?>
		<br><br>
		<label for="genero">Genero:</label>
		<input type="radio" name="genero" id="h" value="hombre" <?php print set_radio('genero','hombre');?>> Hombre
		<input type="radio" name="genero" id="m" value="mujer" <?php print set_radio('genero','mujer');?>> Mujer
		<input type="radio" name="genero" id="o" value="otro" <?php print set_radio('genero','otro');?>> Otro
		<?php print form_error("genero"); ?>
		<br><br>
		<label for="transporte">Transporte:</label><br>
		<input type="checkbox" name="transporte[]" value="bici" <?php print set_checkbox('transporte[]','bici');?>> Bicicleta
		<input type="checkbox" name="transporte[]" value="auto" <?php print set_checkbox('transporte[]','auto');?>> Automovil
		<input type="checkbox" name="transporte[]" value="moto" <?php print set_checkbox('transporte[]','moto');?>> Motocicleta
		<?php print form_error("transporte[]"); ?>
		<br><br>
		<a href="<?php print site_url("usuarios/index");?>">Regresar</a>
		<input type="submit" value="Enviar">

</form>
</body>
</html>