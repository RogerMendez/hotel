<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->_is_logued_in();
		$this->load->model('habitacion_model');
		$this->load->model('cliente_model');
		$this->load->model('asignar_model');
		$this->load->model('reserva_model');
		
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
	function index($bandera)
	{
		$dato['title']= "Lista de habitaciones para reservar";
		
			$dato ['aux'] = $bandera;
				
			$dato['error'] ="";	 
			if($bandera == 0)
			{	
					$dato ['wwe'] = "";
					if($dato['filas'] = $this->reserva_model->seleccionar_habi())
					{
						$dato ['selec'] = 1;
						
					}
					else 
					{
						$dato['error'] ="NO EXISTEN HABITACIONES SELECCIONADOS";	
						$dato ['selec'] = 0;
					}
					
					
			}
			else
			{
					
					$buscar = $this->input->post('buscar');
					$dato ['wwe'] = $buscar;

					
					if($dato['filas'] = $this->habitacion_model->seleccionar_buscar($buscar)) 
					{
						$dato ['selec'] = 1;
						 
					}
					else {
						$dato ['selec'] = 0;
						$dato['error'] ="NO EXISTEN HABITACIONES SELECCIONADOS";		
					}	
					 
					
			}
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('reservas/lis_hab', $dato);
			$this->load->view('inicio/pie');
		
	}
	function reservar_habi($id_cli,$id_hab)
	{
		$dato ['id_hab'] = $id_hab;
        $dato ['id_cli'] = $id_cli;

	    /*$fecha_cambiada = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		$fecha = date("d/m/Y", $fecha_cambiada);*/

		$dato['fecha'] = date("Y") ."-". date("m") ."-". date("d");

        $dato['title']= "Fechas para reservar";
        $this->load->view('inicio/cabecera', $dato);
        $this->load->view('inicio/menu');
        $this->load->view('reservas/fec_reser', $dato);
        $this->load->view('inicio/pie');

	}

    function guardar_reservacion($id_hab,$id_cli)
    {
        $desde =  $this->input->post('desde');
        $hasta =  $this->input->post('hasta');




        $est = 'RESERVADO';
        $actualizar = $this->asignar_model->actualizar_estado($id_hab,$est);

        if($this->reserva_model->verfi($id_hab))
        {
            $guardar = $this->asignar_model->crear_reserva($id_hab,$id_cli, $desde, $hasta);
            $chau = $this->reserva_model->elim_reserva();
        }
        $this->lista_reservaciones();


    }
    function lista_reservaciones()
    {

        $dato['title']= "Lista de reservaciones";

      if($dato['filas'] = $this->reserva_model->seleccionar_habitaciones_reservadas())
      {
          $dato ['selec'] = 1;

      }
      else
      {
          $dato ['selec'] = 0;
          $dato['error'] ="NO EXISTEN RESERVACIONES PENDIENTES";
      }

        $this->load->view('inicio/cabecera', $dato);
        $this->load->view('inicio/menu');
        $this->load->view('reservas/lista_reservaciones', $dato);
        $this->load->view('inicio/pie');
    }






    function asignar_clientes($id_res,$id_hab)
    {
        $est = 'OCUPADO';

        $actualizar = $this->asignar_model->actualizar_estado($id_hab,$est);

        $actualizar = $this->reserva_model->cambiar_reserva($id_res,'POSITIVO');

        redirect("asignacion/lista_asignaciones/$id_hab");

    }




    function lista_cliente_asig($bandera,$id_hab)
		{
			$dato['title']= "Lista de clientes para asignar";
			$dato['id_hab'] = $id_hab; 
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
			$this->load->view('reservas/lista_clientes', $dato);
			$this->load->view('inicio/pie');

		}
		function new_cli($id_hab)
		{
			$dato['title']= "Nuevo de cliente para asignar";
			$dato['error']= "";
			$dato['id_hab'] = $id_hab;
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('reservas/new_clien', $dato);
			$this->load->view('inicio/pie');
		}
		function guardar_cli($id_hab)
		{
			$dato['id_hab'] = $id_hab;
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
				$this->new_cli();
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
					
					$this->lista_cliente_asig(0,$id_hab);	
				}
				else
				{
					$dato['title']= "Nuevo de cliente para asignar";
					$dato['error']= "EL NUMERO DE DOCUMENTO Y DOCUMENTO YA SE REGISTRARON";
					$this->load->view('inicio/cabecera', $dato);
					$this->load->view('inicio/menu');	
					$this->load->view('reservas/new_clien', $dato);
					$this->load->view('inicio/pie');
				}	

				
			}	
		}


}

