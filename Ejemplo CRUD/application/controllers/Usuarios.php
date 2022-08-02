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

	public function modificarUsuario(){
		//$data['id'] =$this->input->post("id");
		$data['nombre'] =$this->input->post("nombre");
		$data['correo'] =$this->input->post("correo");
		$data['clave'] =$this->input->post("clave");
		$data['id'] =$this->input->post('id');
		//var_dump($data);
		$this->load->model("Usuariosmodelo");
		$this->Usuariosmodelo->modificaUsuario($data);
		redirect("usuarios/index");
		//var_dump($data);
	}

	public function borrarUsuario(){
		$data['id'] =$this->input->post('id');
		//var_dump($data);
		$this->load->model("Usuariosmodelo");
		$this->Usuariosmodelo->borraUsuario($data);
		redirect("usuarios/index");
		//var_dump($data);
	}

	public function Modificar($id){
		$this->load->model("Usuariosmodelo");
		$usuario = $this->Usuariosmodelo->getUsuarioId($id);
		$data["usuario"]=$usuario->result();
		//var_dump($data);
		$this->load->view("UsuariosModificar",$data);
	}
	public function Borrar($id){
		$this->load->model("Usuariosmodelo");
		$usuario = $this->Usuariosmodelo->getUsuarioId($id);
		$data["usuario"]=$usuario->result();
		//var_dump($data);
		$this->load->view("UsuariosBorrar",$data);
	}
}