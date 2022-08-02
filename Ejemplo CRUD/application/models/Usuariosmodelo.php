<?php

Class Usuariosmodelo extends CI_Model{


		function getUsuarios(){

			return $this->db->get("usuarios");
		}
		function getUsuarioId($id){
			$data["id"] = $id;
			return $this->db->get_where("usuarios",$data);
		}
		function cargaUsuario($data){
			$this->db->insert("usuarios",$data);
		}
		function modificaUsuario($data){
			$this->db->where("id",$data['id']);
			$this->db->update("usuarios",$data);
			//var_dump($data);
		}
		function borraUsuario($data){
			$this->db->where("id",$data['id']);
			$this->db->delete("usuarios");
			//var_dump($data);
		}
}


?>