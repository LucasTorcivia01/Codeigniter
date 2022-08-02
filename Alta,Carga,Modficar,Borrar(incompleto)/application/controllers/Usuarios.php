<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
			
			//$this->load->helper("url");

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

	public function AltaUsuario(){
		$this->load->view("UsuariosAlta");
	}

	public function Alta(){
		$data['nombre'] =$this->input->post("nombre");
		$data['correo'] =$this->input->post("correo");
		$data['clave'] =$this->input->post("clave");

		$this->load->model("Usuariosmodelo");
		$this->Usuariosmodelo->cargaUsuario($data);
		redirect("usuarios/index");
		//var_dump($data);
	}

	public function Modificar($id){
		print "Modificar".$id;
	}
	public function Borrar($id){
		print "Borrar".$id;
	}
}