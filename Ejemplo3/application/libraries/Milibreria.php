<?php

class Milibreria {
	
		function __construct()
		{
	
		}

		

	public function regresarHome()
	{
		$CI =& get_instance();
		$CI ->load->helper('url');
		$home = site_url();

	return "<a href= '{$home}' class='navbar-brand'>Mi Pagina</a>";
	}
}


?>