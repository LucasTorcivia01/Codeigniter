<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
			
			$this->load->model("Usuariosmodelo");

			$usuarios=$this->Usuariosmodelo->getUsuarios();

			$data["nombre"] = "Lucas";
			$data["dia"]= "dia";
			$data["usuarios"] =$usuarios;

			$this->load->view("Usuarios",$data);
	}

	public function getUsuarioId($id)
	{
			
			$this->load->model("Usuariosmodelo");

			$usuarios=$this->Usuariosmodelo->getUsuarioId($id);

			$data["nombre"] = "Lucas";
			$data["dia"]= "dia";
			$data["usuarios"] =$usuarios;

			$this->load->view("Usuarios",$data);
	}
}