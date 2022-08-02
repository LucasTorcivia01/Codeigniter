<?php

Class Usuariosmodelo extends CI_Model{


		function getUsuarios(){

			return $this->db->get("usuarios");
		}
		function getUsuarioId($id){
			$data["id"] = $id;
			return $this->db->get_where("usuarios",$data);
		}
}


?>