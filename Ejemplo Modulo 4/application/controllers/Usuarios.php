<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library("Milibreria");
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->library("table");
		$this->load->helper(array("form","url"));
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

		

	//	$this->form_validation->set_rules("nombre","Nombre","required");
	//	$this->form_validation->set_rules("clave","clave","required");
	//	$this->form_validation->set_rules("clave2","Clave Verifica","required");
	//	$this->form_validation->set_rules("correo","Correo","required");
	//	$this->form_validation->set_rules("comentario","Comentario","required");
	//	$this->form_validation->set_rules("numeros","Numeros","required");
	//	$this->form_validation->set_rules("genero","Genero","required");
	//	$this->form_validation->set_rules("transporte","Transporte","required");
		$this->form_validation->set_error_delimiters("<span class='rojo'>","</span>");
		$this->form_validation->set_message("required","*Este campo es obligatorio");
		//$this->form_validation->set_rules($reglas);
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
	public function pagina($pag=0)
	{
		$num=5;
		$tot=35;
		$this->load->model("Usuariosmodelo");

		$usuarios = $this->Usuariosmodelo->getAlumnos($pag,$num);
		$alumnos = $usuarios;//->result();
		$this->load->library('pagination');

		$config['base_url']= site_url("Usuarios/pagina");
		$config['total_rows']= $tot;
		$config['per_page']= $num;

		$config['full_tag_open'] = '<ul class= "pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class'=>'page-link'];

		$config['first_link'] = "Inicio";
		$config['last_link'] = "Fin";

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data["usuarios"] =$alumnos;

		$this->load->view("pagina",$data);
	}
	public function registro(){
		$this->load->view("registro");
	}
	public function registrarUsuario(){
		$this->session->usuario = $this->input->post("nombre");
		redirect("usuarios/index");
	}
	public function registroEliminar(){
		$this->session->sess_destroy();
		redirect("usuarios/registro");
	}
	public function subirimagen(){
		$error = array("error"=> "");
		$this->load->view("subearchivo",$error);
	}


	public function subearchivo(){
		$config["upload_path"] = "./imagenes";
		$config["allowed_types"] = "gif|jpg|png";

		$this->load->library("upload",$config);

		if ($this->upload->do_upload("archivo")) {
			$data = array("upload_data"=> $this->upload->data());
			$this->load->view("subirexitosa",$data);


		} else {
			$error = array("error" =>$this->upload->display_errors());
			$this->load->view("subirexitosa");
		}
		
	}
}
?>