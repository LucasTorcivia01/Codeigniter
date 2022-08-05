<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class inicio extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	public function index($error="")
	{
		$this->load->view("encabezado",array("titulo"=>"Login","error"=>$error));
		$this->load->view("login");
		$this->load->view("piepagina");
	}
	public function registro()
	{
		
		$this->load->view("encabezado",array("titulo"=>"Registro"));
		$this->load->view("registro");
		$this->load->view("piepagina");
	}
	public function alumnos($pag=0)
	{
		$this->load->model("inicioModelo");

		$num=5;
		$tot = $this->inicioModelo->numAlumnos();
		
		$alumnos= $this->inicioModelo->getAlumnos($pag,$num);
		$this->load->library("pagination");

		$config['base_url'] = site_url('Inicio/alumnos');
		$config['total_rows'] = $tot;
		$config['per_page'] = $num;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class'=> 'page-link'];

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

		$data['alumnos'] = $alumnos;
		
		$this->load->view("encabezado",array("titulo"=>"Alumnos"));
		$this->load->view("alumnos",$data);
		$this->load->view("piepagina");
	}
	public function verificarRegistro(){


		//$this->form_validation->set_error_delimiters("<span class='rojo'>","</span>");
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('usuario','Usuario','required|valid_email');
		$this->form_validation->set_rules('clave','Clave de acceso','required|matches[clave2]');
		$this->form_validation->set_rules('clave2','Clave de acceso','required');
		$this->form_validation->set_rules('nombre','Nombre','required');

		$this->form_validation->set_message('required','Este campo es obligatorio');
		$this->form_validation->set_message('matches','Las claves de acceso no coinciden');
		

		if($this->form_validation->run()){

			$data['usuario']=$this->input->post("usuario");
			$data['clave']=password_hash($this->input->post("clave"),1);
			$data['nombre']=$this->input->post("nombre");


			$this->load->model("inicioModelo");
			$this->inicioModelo->usuarioInsertar($data);
			redirect("inicio/index");

		}else{
			
			$this->registro();
		}
	}
	public function validaUsuario(){

		$this->form_validation->set_rules('usuario','Usuario','required');
		$this->form_validation->set_rules('clave','Clave de acceso','required');
		$this->form_validation->set_message('required','Este campo es obligatorio');


		if ($this->form_validation->run()) {
			$this->load->model("inicioModelo");
			$usuario = $this->input->post("usuario");
			$clave = $this->input->post("clave");
			$data = $this->inicioModelo->loginUsuario($usuario);
			$usuario = $data->result();

			if(count($usuario)==0){
				$this->index("Usuario o Clave de acceso incorrecto");
			}else if (password_verify($clave, $usuario[0]->clave)){
				$this->session->usuario = $usuario[0]->nombre;
				$this->alumnos();
			}

		} else {
			$this->index("Todos los Datos son Requeridos");
		}
	}

	public function alumnoDetalle($id=0){
		$this->load->model("inicioModelo");
		$alumnos=$this->inicioModelo->getAlumnoId($id);
		$data ["alumnos"] = $alumnos->result();

		$this->load->view("encabezado",array("titulo"=>"Detalle Alumno"));
		$this->load->view("alumnoDetalle",$data);
		$this->load->view("piepagina");
	}
	public function alumnoModificar($id){
		$this->load->model("inicioModelo");
		$alumno = $this->inicioModelo->getAlumnoId($id);
		$data["alumno"] = $alumno->result();

		$this->load->view("encabezado",array("titulo" =>"Modificar Alumno"));
		$this->load->view("alumnoModificar",$data);
		$this->load->view("piepagina");
	}
	public function alumnoBorrar($id){
		$this->load->model("inicioModelo");
		$alumno = $this->inicioModelo->getAlumnoId($id);
		$data["alumno"] = $alumno->result();

		$this->load->view("encabezado",array("titulo" =>"Borrar Alumno"));
		$this->load->view("alumnoBorrar",$data);
		$this->load->view("piepagina");
	}
	public function alumnoAlta(){

		$this->load->view("encabezado",array("titulo" =>"Alta Alumno"));
		$this->load->view("alumnoAlta");
		$this->load->view("piepagina");
	}
	public function alumnoAltaVerificar(){
		$config = array(
			array(
				"field"=>"nombre",
				"label"=>"Nombre",
				"rules"=>"required"
			),
			array(
				"field"=>"apellidos",
				"label"=>"Apellidos",
				"rules"=>"required"
			),
			array(
				"field"=>"nacimiento",
				"label"=>"Fecha de Nacimiento",
				"rules"=>"required"
			),
			array(
				"field"=>"sexo",
				"label"=>"Genero",
				"rules"=>"required"
			),
			array(
				"field"=>"promedio",
				"label"=>"Promedio",
				"rules"=>"required"
			),
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message("required","Este Campo es obligatorio");

		if($this->form_validation->run()){
			$data['nombre'] = $this->input->post("nombre");
			$data['apellidos'] = $this->input->post("apellidos");
			$data['nacimiento'] = $this->input->post("nacimiento");
			$data['sexo'] = $this->input->post("sexo");
			$data['promedio'] = $this->input->post("promedio");

			$this->load->model("inicioModelo");
			$this->inicioModelo->alumnoInsertar($data);
			redirect("inicio/alumnos");
		}else{
			$this->load->view("encabezado",array("Alta Alumno"));
			$this->load->view("alumnoAlta");
			$this->load->view("piepagina");
		}
	}
	public function alumnoActualizar(){
		$data['id'] = $this->input->post("id");
		$data['nombre'] = $this->input->post("nombre");
		$data['apellidos'] = $this->input->post("apellidos");
		$data['nacimiento'] = $this->input->post("nacimiento");
		$data['sexo'] = $this->input->post("sexo");
		$data['promedio'] = $this->input->post("promedio");

		$this->load->model("inicioModelo");
		$this->inicioModelo->alumnoActualizar($data);
		redirect("inicio/alumnos");
	}
	public function alumnoBorrarRegistro(){
		$data['id'] = $this->input->post("id");

		$this->load->model("inicioModelo");
		$this->inicioModelo->alumnoBorrar($data);
		redirect("inicio/alumnos");
	}
}
