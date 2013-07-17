<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo extends CI_Controller {
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
		$data['title'] = 'Tipos Habitacion';
		$dato['tipos'] = $this->tipo_model->seleccionar();
		if($dato['tipos'])
		{
			$this->load->view('inicio/cabecera', $data);
			$this->load->view('inicio/menu');	
			$this->load->view('tipo/index', $dato);
			$this->load->view('inicio/pie');
		}
		else
		{
			$this->new_tipo();
		}
	}
	function new_tipo()
	{



        $menu = $this->session->userdata('menu');
        $id = $this->session->userdata('id_per');
        #$dato ['persona'] =$this->personal_model->selec_personal_modi($id);
        $dato['tipo_user'] = $this->session->userdata('tipo_user');





		$data['title']='Nuevo Tipo';
		$this->load->view('inicio/cabecera', $data);
		$this->load->view('inicio/menu');	
		$this->load->view('tipo/new_tipo');
		$this->load->view('inicio/pie');
	}
	function save()
	{
		$this->form_validation->set_rules('name', 'Nombre Tipo', 'trim|strtoupper|required');
		$this->form_validation->set_rules('des', 'Descripcion Tipo', 'strtoupper|trim');

		$this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');

		if($this->form_validation->run() == FALSE)
		{
			$this->new_tipo();
		}
		else{
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			$insert = $this->tipo_model->insertar_tipo($name, $desc);
			if($insert){
				redirect('tipo', 'refresh');
			}
			else{
				$this->new_tipo();
			}
		}
	}

}

/* End of file tipo.php */
/* Location: ./application/controllers/tipo.php */