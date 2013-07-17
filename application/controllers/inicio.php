<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->_is_logued_in();
		$this->load->model('tipo_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	function _is_logued_in()
		{
			$is_logued_in = $this->session->userdata('is_logued_in');
			if($is_logued_in != TRUE)
			{
				//echo $is_logued_in;
				redirect('usuarios');
			}	
			
		}
	function index()
	{
			$data['title'] = "Pagina de inicio";
			$this->load->view('inicio/cabecera', $data);
			$this->load->view('inicio/menu');	
			$this->load->view('inicio/cuerpo', $data);
			$this->load->view('inicio/pie');
			
		
	}
	
}

/* End of file tipo.php */
/* Location: ./application/controllers/tipo.php */