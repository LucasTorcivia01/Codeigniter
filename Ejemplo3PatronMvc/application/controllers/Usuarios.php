<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		
	}

	public function saludo($nombre,$dia){
		$data["nombre"] = $nombre;
		$data["dia"]= $dia;

		$this->load->view("Usuarios",$data);
	}
}