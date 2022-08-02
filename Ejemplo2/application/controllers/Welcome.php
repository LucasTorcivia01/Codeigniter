<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data["nombre"] = "Lucas";
		$this->load->view('welcome_message',$data);
	}

	public function saludo($nombre){
		$data["nombre"] = $nombre;
		$data["familia"] = ["Ruben","Elsa"];
		$this->load->view("saludo",$data);
	}
}