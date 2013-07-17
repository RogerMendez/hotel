<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->_is_logued_in();
        $this->load->model('cliente_model');
        $this->load->library('form_validation');
		$this->load->helper('form');
        
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

	function index($bandera)
	{
			
			/*$dato['title']= "Lista de clientes";
		
				$dato ['aux'] = $bandera;
				
				$dato['error'] ="";	 
				if($bandera == 0)
				{	
					$dato ['wwe'] = "";
					if($dato['filas'] =$this->cliente_model->seleccionar())
					{
						$dato ['selec'] = 1;
						
					}
					else {
						$dato['error'] ="NO EXISTEN CLIENTES SELECCIONADOS";	
						$dato ['selec'] = 0;
					}
					
					
				}
				else
				{
					$this->form_validation->set_rules('buscar', 'BUSCAR ', 'required|strtoupper');
					$buscar = strtoupper($this->input->post('buscar'));
					$dato ['wwe'] = $buscar;

					
					if($dato ['filas'] = $this->cliente_model->buscar_efectivos_regilla($buscar))
					{
						$dato ['selec'] = 1;
						 
					}
					else {
						$dato ['selec'] = 0;
						$dato['error'] ="NO EXISTEN CLIENTES SELECCIONADOS";		
					}	
					 
					
				}
				$this->load->view('inicio/cabecera', $data);
			$this->load->view('inicio/menu');	
			$this->load->view('habitacion/index', $dato);
			$this->load->view('inicio/pie');	*/

	}
	function lis_cliente($bandera)
	{
		$dato['title']= "Lista de clientes";
		
				$dato ['aux'] = $bandera;
				
				$dato['error'] ="";	 
				if($bandera == 0)
				{	
					$dato ['wwe'] = "";
					if($dato['filas'] =$this->cliente_model->seleccionar())
					{
						$dato ['selec'] = 1;
						
					}
					else {
						$dato['error'] ="NO EXISTEN CLIENTES SELECCIONADOS";	
						$dato ['selec'] = 0;
					}
					
					
				}
				else
				{
					$this->form_validation->set_rules('buscar', 'BUSCAR ', 'required|strtoupper');
					$buscar = strtoupper($this->input->post('buscar'));
					$dato ['wwe'] = $buscar;

					
					if($dato ['filas'] = $this->cliente_model->buscar_cliente_regilla($buscar)) 
					{
						$dato ['selec'] = 1;
						 
					}
					else {
						$dato ['selec'] = 0;
						$dato['error'] ="NO EXISTEN CLIENTES SELECCIONADOS";		
					}	
					 
					
				}
				$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('clientes/view_clientes', $dato);
			$this->load->view('inicio/pie');
	}
	function new_cliente()
	{
		$dato['title']= "Nuevo de cliente";
		$dato['error']= "";
		$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('clientes/new_clientes', $dato);
			$this->load->view('inicio/pie');
	}
	function _control_numero($ci)
		{ 
			return $this->cliente_model->numero_check($ci);
		}

	function registrar_cliente()
	{
		

			$this->form_validation->set_rules('numero', 'Numero de documento', 'required|trim|min_length[6]|max_length[15]|numeric|strtoupper');
			$this->form_validation->set_rules('nombre', 'NOMBRE ', 'required|trim|min_length[3]|strtoupper|');
			$this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim|strtoupper|min_length[3]');
			$this->form_validation->set_rules('telefono', 'NUMERO DE CELULAR', 'required|trim|numeric|max_length[8]|min_length[3]');
			$this->form_validation->set_rules('procedencia', 'DIRECCION', 'required|trim|strtoupper|min_length[3]');		
			

			
			
			$this->form_validation->set_message('valid_email', 'El email es incorrecto ...!!!!!');
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener mas caracteres ...!!!!!');
			$this->form_validation->set_message('max_length', 'el %s tiene q tener máximo 8 caracteres ...!!!!!');
			//$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
			$this->form_validation->set_message('alpha', 'El campo %s tiene que contener solo letras ...!!!!!');
			$this->form_validation->set_message('numeric', 'El campo %s tiene que contener solo numeros ...!!!!!');
			if (($this->form_validation->run()) == FALSE)
			{
				$this->new_cliente();
			}
			else
			{
				
				$nombres = $this->input->post('nombre');
				$apellidos = $this->input->post('apellido');
				$telefono = $this->input->post('telefono');
				$documento = $this->input->post('tipo');
				$numero = $this->input->post('numero');			
				$procedencia = $this->input->post('procedencia');
				$fecha = $this->input->post('desde');
				$estado = 'NO'; 
				
				if(($this->cliente_model->numero_check($numero,$documento)))
				{
					$insert = $this->cliente_model->insert_cliente($numero,$apellidos,$nombres,$telefono,$procedencia,$fecha,$estado,$documento);	
				}	

				
				


				$this->lis_cliente(0);
			}	
	}
    function modifi_cli($id_cli)
    {
        $dato ['title'] = "Modificar cliente";


        $menu = $this->session->userdata('menu');
        $id = $this->session->userdata('id_per');


        $dato ['filas'] = $this->cliente_model->selec_cli_id($id_cli);

        $this->load->view("inicio/cabecera",$dato);
        $this->load->view("inicio/$menu",$dato);
        $this->load->view("clientes/modifi_clientes",$dato);
        $this->load->view("inicio/pie",$dato);
    }
    function edit_cliente($id_cli)
    {
        $this->form_validation->set_rules('numero', 'Numero de documento', 'required|trim|min_length[6]|max_length[15]|numeric|strtoupper');
        $this->form_validation->set_rules('nombre', 'NOMBRE ', 'required|trim|min_length[3]|strtoupper|');
        $this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim|strtoupper|min_length[3]');
        $this->form_validation->set_rules('telefono', 'NUMERO DE CELULAR', 'required|trim|numeric|max_length[8]|min_length[3]');
        $this->form_validation->set_rules('procedencia', 'DIRECCION', 'required|trim|strtoupper|min_length[3]');




        $this->form_validation->set_message('valid_email', 'El email es incorrecto ...!!!!!');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
        $this->form_validation->set_message('min_length', 'el %s tiene q tener mas caracteres ...!!!!!');
        $this->form_validation->set_message('max_length', 'el %s tiene q tener máximo 8 caracteres ...!!!!!');
        //$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
        $this->form_validation->set_message('alpha', 'El campo %s tiene que contener solo letras ...!!!!!');
        $this->form_validation->set_message('numeric', 'El campo %s tiene que contener solo numeros ...!!!!!');
        if (($this->form_validation->run()) == FALSE)
        {
            $this->modifi_cli($id_cli);
        }
        else
        {

            $nombres = $this->input->post('nombre');
            $apellidos = $this->input->post('apellido');
            $telefono = $this->input->post('telefono');
            $documento = $this->input->post('tipo');
            $numero = $this->input->post('numero');
            $procedencia = $this->input->post('procedencia');
            $fecha = $this->input->post('desde');
            $update = $this->cliente_model->edit_cliente($id_cli,$numero,$apellidos,$nombres,$telefono,$procedencia,$fecha,$documento);
            $this->lis_cliente(0);
        }
    }

}