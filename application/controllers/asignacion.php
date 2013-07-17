<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->_is_logued_in();  
		$this->load->model('habitacion_model');
		$this->load->model('cliente_model');
		$this->load->model('asignar_model');
        $this->load->model('servicio_model');
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

		function lista_asignaciones($id_hab)
		{
			$dato['habitacion'] =$this->asignar_model->selecc_habitacion($id_hab);
			$dato['id_hab'] = $id_hab;
			$dato['error'] = "";

			if($dato['filas'] =$this->asignar_model->selecc_acumulador($id_hab))
                {
                    $dato['selec'] = 1;
                  
                }
                else
                {
                    $dato['selec'] = 0;
                    $dato['error'] = "NO SE SELECCION NINGUN REGISTRO";
                } 
                
			$dato['title']= "Lista de clientes";

			
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/acumulador', $dato);
			$this->load->view('inicio/pie');

		}
		function lista_habitaciones($bandera)
		{
			$dato['title']= "Lista de habitaciones";
		
			$dato ['aux'] = $bandera;
				
			$dato['error'] ="";	 
			if($bandera == 0)
			{	
					$dato ['wwe'] = "";
					if($dato['filas'] = $this->habitacion_model->seleccionar())
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
			$this->load->view('asignacion/view_habitaciones', $dato);
			$this->load->view('inicio/pie');

		}
		function registrar_asignacion_acu($id_cli,$id_hab)
		{
			if($this->asignar_model->verificar_cliente($id_cli))
			{
				$asignar = $this->asignar_model->asignar_cliente($id_cli,$id_hab);
			}
			$this->lista_asignaciones($id_hab);
		}

		function quitar_asig($id_cli,$id_hab)
		{

			$asignar = $this->asignar_model->quitar_cliente($id_cli,$id_hab);
			$this->lista_asignaciones($id_hab);
		}


		function realizar_asignacion($id_hab)
		{
			$num_max = $this->asignar_model->numero_max();
			$numero = $num_max[0]->num_asig;

			$numero = $numero + 1;
	
			$filas = $this->asignar_model->selecc_acumulador_dos($id_hab);

			$desde =  $this->input->post('desde');
			$hasta =  $this->input->post('hasta');
			
			$fecha=$hasta;
			$segundos=strtotime($fecha) - strtotime('now');
			$dias=intval($segundos/60/60/24);
			$dias = $dias +1 ;
			$est = 'OCUPADO';
			$actualizar = $this->asignar_model->actualizar_estado($id_hab,$est);

			foreach($filas as $x)
			{
					$id_cli = $x->id_cli;
					$costo =  $x->costo;
					$costo_total = $costo * $dias;
					$estado = 'ACTIVO';
					$insert = $this->asignar_model->guardar_aignacion($id_hab,$id_cli,$desde,$hasta,$dias,$costo_total,$estado,$numero);
					$es_cli = 'SI';
					$upde = $this->asignar_model->cam_est_cli($id_cli,$es_cli);
			}
			foreach($filas as $x)
			{
					$id_cli = $x->id_cli;
					$asignar = $this->asignar_model->quitar_cliente($id_cli,$id_hab);
			}


			$this->lista_habitaciones(0);
		}

		function asignar_dias($id_hab)
		{
			$dato['id_hab'] = $id_hab;
			$dato['habitacion'] =$this->asignar_model->selecc_habitacion($id_hab);

			$dato['title']= "Secleccionar tiempo de estadia";

			$dato['fecha'] = date("Y") ."-". date("m") ."-". date("d");

			
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/dias', $dato);
			$this->load->view('inicio/pie');




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
					if($dato['filas'] =$this->cliente_model->selec_client_asig())
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
			$this->load->view('asignacion/lista_clientes', $dato);
			$this->load->view('inicio/pie');

		}
		function new_cli($id_hab)
		{
			$dato['title']= "Nuevo de cliente para asignar";
			$dato['error']= "";
			$dato['id_hab'] = $id_hab;
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/new_clien', $dato);
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
					$this->load->view('asignacion/new_clien', $dato);
					$this->load->view('inicio/pie');
				}	

				
			}	
		}


		function lista_hab_asignaciones()
		{
			$dato['title']= "HABITACIONES OCUPADAS";
			
			if($dato ['filas'] = $this->asignar_model->selec_hab_ocu())
					{
						$dato ['selec'] = 1;
						 
					}
					else {
						$dato ['selec'] = 0;
						$dato['error'] ="NO EXISTEN HABITACIONES OCUPADAS";		
					}	
			
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/habi_ocupadas', $dato);
			$this->load->view('inicio/pie');
		}
		function ver_clientes($id_hab)
		{
			$dato['title']= "Personas hospedadas";
			$dato['habitacion'] =$this->asignar_model->selecc_habitacion($id_hab);
			$dato['id_hab'] = $id_hab;
			$dato['error'] = "";

			
			$dato ['filas'] = $this->asignar_model->cliente_cuarto($id_hab);
            $ser = $this->asignar_model->cliente_cuarto($id_hab);
            $num = $ser[0]->num_asig;

           if($dato ['servicio'] = $this->asignar_model->selec_servio($id_hab,$num))
           {
               $dato ['selec'] = 1;

           }
           else {
               $dato ['selec'] = 0;
               $dato['error'] ="NO SE SELECCIONO NINGUN  SERVICIO";
           }

            $this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/habi_cli', $dato);
			$this->load->view('inicio/pie');
		}

        function asignar_servicio($id_hab,$num)
        {
            $dato['title']= "Lista de servicio";
            $dato['id_hab'] = $id_hab;
            $dato['numero'] = $num;
              $dato['error'] = "";



            if($dato ['filas'] = $this->servicio_model->seleccionar())
            {
                $dato ['selec'] = 1;

            }
            else
            {
                $dato ['selec'] = 0;
                $dato['error'] ="NO TIENE SERVICIOS REGISTRADOS";
            }

            $this->load->view('inicio/cabecera', $dato);
            $this->load->view('inicio/menu');
            $this->load->view('asignacion/lista_servicio', $dato);
            $this->load->view('inicio/pie');
        }
        function cantidad($id_ser,$id_hab,$num)
        {
            $dato['title']= "Cantidad de servicio";
            $dato['id_hab'] = $id_hab;
            $dato['numero'] = $num;
            $dato['error'] = "";
            $dato ['filas'] = $this->servicio_model->seleccionar_id_ser($id_ser);

            $this->load->view('inicio/cabecera', $dato);
            $this->load->view('inicio/menu');
            $this->load->view('asignacion/cantidad_servicio', $dato);
            $this->load->view('inicio/pie');
        }
    function guardar_cantidad($id_ser,$id_hab,$num)
    {

        $this->form_validation->set_rules('numero', 'CANTIDAD', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero', 'El dato introducido en  %s debe ser entero y mayor a cero');
        $this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');
         if($this->form_validation->run() == FALSE)
        {
            $this->cantidad($id_ser,$id_hab,$num);
        }
        else{

            $servi = $this->servicio_model->seleccionar_id_ser($id_ser);
            $cantidad = $this->input->post('numero');
            $saldo = $servi[0]->saldo_ser;
            if($cantidad <= $saldo)
            {
                $entrada = $servi[0]->ent_ser;
                $salida = $servi[0]->sal_ser;
                $costo = $servi[0]->costo_ser;

                $sal = $salida + $cantidad;
                $saldo = $entrada - $sal;

                 $total = $costo * $cantidad;
                $insert = $this->servicio_model->servicio_hab($id_hab, $id_ser,$cantidad,$costo,$total,$num);
                $update = $this->servicio_model->actualizar_servicio($id_ser, $sal,$saldo);
                $this->ver_clientes($id_hab);
            }
            else
            {
                $dato['title']= "Cantidad de servicio";
                $dato['id_hab'] = $id_hab;
                $dato['numero'] = $num;
                $dato['error'] = "LA CANTIDAD ES INSUFICIENTE EN ALMACEN";
                $dato ['filas'] = $this->servicio_model->seleccionar_id_ser($id_ser);

                $this->load->view('inicio/cabecera', $dato);
                $this->load->view('inicio/menu');
                $this->load->view('asignacion/cantidad_servicio', $dato);
                $this->load->view('inicio/pie');
            }


        }
    }

		function salir_habitacion($id_asig,$id_hab,$id_cli)
		{

			$esta_asig = "CANCELADO";

			$es_cli = 'NO';
			$upde = $this->asignar_model->cam_est_cli($id_cli,$es_cli);

			$actua = $this->asignar_model->actualizar_es_cliente($id_asig,$esta_asig);
			if ($this->asignar_model->ver_hab_ocup($id_hab))
			{
				$this->ver_clientes($id_hab); 
			}
			else
			{
				$est = 'LIBRE';
				$actualizar = $this->asignar_model->actualizar_estado($id_hab,$est);
                $act = $this->servicio_model->actualizar_estado_servicio($id_hab);
                $this->lista_hab_asignaciones();

			}
			
		}
		function ampliar_estadia($id_hab)
		{
			$dato['id_hab'] = $id_hab;
			
			//$dato['habitacion'] =$this->asignar_model->selecc_habitacion($id_hab);

			$dato['title']= "Cambiar tiempo de estadia";

			  $ser = $this->asignar_model->cliente_cuarto($id_hab);
            $num = $ser[0]->num_asig;
            $dato['fec_ini']  = $ser[0]->fecha_ent;

           	$dato['fecha'] = date("Y") ."-". date("m") ."-". date("d");
			$this->load->view('inicio/cabecera', $dato);
			$this->load->view('inicio/menu');	
			$this->load->view('asignacion/ampliar_dias', $dato);
			$this->load->view('inicio/pie');


		}
		function cambiar_asignacion($id_hab)
		{

			$ser = $this->asignar_model->cliente_cuarto($id_hab);
            $num = $ser[0]->num_asig;
            $fecha_ini  = $ser[0]->fecha_ent;
			
			$hasta =  $this->input->post('hasta');
			
			$fecha=$hasta;
			$segundos=strtotime($fecha) - strtotime($fecha_ini);
			$dias=intval($segundos/60/60/24);
			$dias = $dias +1 ;

			$actualizar = $this->asignar_model->edit_estadia($num,$hasta,$dias);

			$this->ver_clientes($id_hab);

		}

}
