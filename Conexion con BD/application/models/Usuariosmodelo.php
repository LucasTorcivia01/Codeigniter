<?php

Class Usuariosmodelo extends CI_Model{


		function getUsuarios(){

			return $this->db->get("usuarios");
		}

}


?>