<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library("Milibreria");
		$this->load->library("form_validation");
	}

	public function index()
	{
			
			$this->load->helper("fecha");
			//$this->load->helper("url");

			$this->load->model("Usuariosmodelo");

			$usuarios=$this->Usuariosmodelo->getUsuarios();

			$data["nombre"] = "Lucas";
			$data["dia"]= hoy();
			$data["usuarios"] =$usuarios;

			$this->load->view("Usuarios",$data);
	}

	public function getUsuarioId($id)
	{
			
			$this->load->helper("fecha");
			$this->load->model("Usuariosmodelo");

			$usuarios=$this->Usuariosmodelo->getUsuarioId($id);

			$data["nombre"] = "Lucas";
			$data["dia"]= hoy();
			$data["usuarios"] =$usuarios;

			$this->load->view("Usuarios",$data);
	}

	public function Detalle($id)
	{
			$this->output->cache(1);

			$this->load->helper("fecha");
			$this->load->model("Usuariosmodelo");

			$usuarios=$this->Usuariosmodelo->getUsuarioId($id);
			$data["usuario"] = $usuarios->result();
			
			$this->load->view("UsuariosDetalle",$data);
	}

	public function AltaUsuario(){
		$this->load->helper("form");
		$this->load->view("UsuariosAlta");
	}

	public function limparCache(){
		$this->output->delete_cache();
			redirect("usuarios/index");
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
	public function mensajeError(){
		log_message("Error","Error de Seguridad");
		show_error("Ocurrio un Error",500,"Error");
	}

	public function verificar(){

		$reglas = array(
			array("field" => "nombre","label" => "Nombre","rules" => "required"),
			array("field" => "clave","label" => "Clave","rules" => "required"),
			array("field" => "clave2","label" => "Clave Verifica","rules" => "required"),
			array("field" => "correo","label" => "Correo","rules" => "required"),
			array("field" => "comentario","label" => "Comentario","rules" => "required"),
			array("field" => "numeros","label" => "Numeros","rules" => "required"),
			array("field" => "genero","label" => "Genero","rules" => "required"),
			array("field" => "transporte[]","label" => "Transporte","rules" => "required")
		);

	//	$this->form_validation->set_rules("nombre","Nombre","required");
	//	$this->form_validation->set_rules("clave","clave","required");
	//	$this->form_validation->set_rules("clave2","Clave Verifica","required");
	//	$this->form_validation->set_rules("correo","Correo","required");
	//	$this->form_validation->set_rules("comentario","Comentario","required");
	//	$this->form_validation->set_rules("numeros","Numeros","required");
	//	$this->form_validation->set_rules("genero","Genero","required");
	//	$this->form_validation->set_rules("transporte","Transporte","required");
		$this->form_validation->set_rules($reglas);
		if($this->form_validation->run()){
			$this->load->view("FormularioCorrecto");
		}else{
			$this->load->view("Formulario");
		}
	}

	public function formulario(){
		//var_dump($data);
		$this->load->view("Formulario");
	}

}