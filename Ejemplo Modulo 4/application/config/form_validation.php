<?php

	$config = array(
			array("field" => "nombre","label" => "Nombre","rules" => "required|alpha|max_lenght[30]|min_lenght[3]"),
			array("field" => "clave","label" => "Clave","rules" => "required|matches[clave2]"),
			array("field" => "clave2","label" => "Clave Verifica","rules" => "required"),
			array("field" => "correo","label" => "Correo","rules" => "required|valid_email"),
			array("field" => "comentario","label" => "Comentario","rules" => "required"),
			array("field" => "numeros","label" => "Numeros","rules" => "required"),
			array("field" => "genero","label" => "Genero","rules" => "required"),
			array("field" => "transporte[]","label" => "Transporte","rules" => "required")
		);

?>