<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->_is_logued_in(); 
		$this->load->model('habitacion_model');
        $this->load->model('asignar_model');

		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('tipo_model');
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

	public function index()
	{
		$data['title'] = 'Habitacion';
		$dato['habitaciones'] = $this->habitacion_model->seleccionar();
		if($dato['habitaciones'])
		{
			$dato['tipos']=$this->tipo_model->seleccionar(); 
			$this->load->view('inicio/cabecera', $data);
			$this->load->view('inicio/menu');	
			$this->load->view('habitacion/index', $dato);
			$this->load->view('inicio/pie');	
		}
		else
		{
			$this->new_habitacion();
		}
	}
	function new_habitacion()
	{
		$data['title']='Nueva Habitacion';
		$dato['tipos'] = $this->tipo_model->seleccionar();
		$this->load->view('inicio/cabecera', $data);
		$this->load->view('inicio/menu');	
		$this->load->view('habitacion/new_habitacion', $dato);
		$this->load->view('inicio/pie');
	}
	function save()
	{
		$this->form_validation->set_rules('num', 'Numero Habitacion', 'trim|required');
		$this->form_validation->set_rules('piso', 'Piso Habitacion', 'trim|required');
		$this->form_validation->set_rules('costo', 'Costo Por Noche', 'trim|required|integer');
		$this->form_validation->set_rules('numero', 'Numero de personas', 'trim|required|integer');

		$this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');
		$this->form_validation->set_message('integer', 'El Campo %s Debe ser de tipo ENTERO');

		if($this->form_validation->run() == FALSE)
		{
			$this->new_habitacion();
		}
		else{
			$num = $this->input->post('num');
			$piso = $this->input->post('piso');
			$costo = $this->input->post('costo');
			$tipo = $this->input->post('tipo');
			$numero = $this->input->post('numero');
			$insert = $this->habitacion_model->insertar_habitacion($num,$piso, $costo, $tipo,$numero);
			if($insert){
				redirect('habitacion', 'refresh');
			}
			else{
				$this->new_habitacion();
			}
		}
	}
    function modif_habi($id_hab)
    {
        $data['title']='Modificar Habitacion';
        $dato['habitacion'] =$this->asignar_model->selecc_habitacion($id_hab);
        $dato['tipos'] = $this->tipo_model->seleccionar();
        $this->load->view('inicio/cabecera', $data);
        $this->load->view('inicio/menu');
        $this->load->view('habitacion/modificar_habitacion', $dato);
        $this->load->view('inicio/pie');
    }
    function modificar_hab($id_hab)
    {
        $this->form_validation->set_rules('num', 'Numero Habitacion', 'trim|required');
        $this->form_validation->set_rules('piso', 'Piso Habitacion', 'trim|required');
        $this->form_validation->set_rules('costo', 'Costo Por Noche', 'trim|required|integer');
        $this->form_validation->set_rules('numero', 'Numero de personas', 'trim|required|integer');

        $this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');
        $this->form_validation->set_message('integer', 'El Campo %s Debe ser de tipo ENTERO');

        if($this->form_validation->run() == FALSE)
        {
            $this->modif_habi($id_hab);
        }
        else{
            $num = $this->input->post('num');
            $piso = $this->input->post('piso');
            $costo = $this->input->post('costo');
            $tipo = $this->input->post('tipo');
            $numero = $this->input->post('numero');
            $insert = $this->habitacion_model->modificar_habitacion($id_hab,$num,$piso, $costo, $tipo,$numero);
            redirect('habitacion', 'refresh');

        }

    }

}
