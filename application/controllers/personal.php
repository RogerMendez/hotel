 <?php

class Personal extends CI_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->_is_logued_in();
    		$this->load->model('personal_model');
    		/*$this->load->model('turnos_model');
    		$this->load->model('vehiculos_model');
    		$this->load->model('horario_model');*/
    		$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->helper('date'); 
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
		
		function nueva_personal()
		{
			$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
				$dato['tipo_user'] = $this->session->userdata('tipo_user');

			$dato['title']= "Registro de personal";	
			
			$this->load->view("inicio/cabecera",$dato);
			$this->load->view("inicio/$menu",$dato);
			$this->load->view("personal/new_personal",$dato);
			$this->load->view("inicio/pie");
		}
		function _control_ci($ci)
		{ 
			return $this->personal_model->ci_check($ci);
		}
		function registrar_personal()
		{
			$menu = $this->session->userdata('menu');
				$id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
				$dato['tipo_user'] = $this->session->userdata('tipo_user');

			$this->form_validation->set_rules('ci', 'CI', 'required|trim|min_length[6]|max_length[8]|numeric|strtoupper|callback__control_ci');
			$this->form_validation->set_rules('nombre', 'NOMBRE ', 'required|trim|min_length[3]|strtoupper|');
			$this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim|strtoupper|min_length[3]');
			$this->form_validation->set_rules('celular', 'NUMERO DE CELULAR', 'required|trim|numeric|max_length[8]|min_length[3]');
			$this->form_validation->set_rules('direccion', 'DIRECCION', 'required|trim|strtoupper|min_length[3]');		
			$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email|trim|min_length[3]');		

			
			$this->form_validation->set_message('_control_ci', 'el numero de C.I. ya ha sido registrado ...!!!!!');
			$this->form_validation->set_message('valid_email', 'El email es incorrecto ...!!!!!');
			$this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
			$this->form_validation->set_message('min_length', 'el %s tiene q tener mas caracteres ...!!!!!');
			$this->form_validation->set_message('max_length', 'el %s tiene q tener máximo 8 caracteres ...!!!!!');
			//$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
			$this->form_validation->set_message('alpha', 'El campo %s tiene que contener solo letras ...!!!!!');
			$this->form_validation->set_message('numeric', 'El campo %s tiene que contener solo numeros ...!!!!!');
			if (($this->form_validation->run()) == FALSE)
			{
				$this->nueva_personal();
			}
			else
			{
				$ci = $this->input->post('ci');
				$nombres = $this->input->post('nombre');
				$apellidos = $this->input->post('apellido');
			$celular = $this->input->post('celular');
				$direccion = $this->input->post('direccion');			
				$email = $this->input->post('email');
				$estado = 'ACTIVO'; 
									 
				
				$insert = $this->personal_model->insert_personas($ci,$apellidos,$nombres,$celular,$direccion,$email,$estado);
				$max = $this->personal_model->id_max();
				$id_nuv = $max[0]->id_per;	
				$num = 0;
				

				/*$fecha = date("Y") ."-". date("m") ."-". date("d");
					$fecha.= " ";
					$fecha.= date("H") .":". date("i") .":". date("s");	
					$id = $this->session->userdata('id_pol');

					
					$accion = "REALIZA EL REGISTRO DEL EFECTIVO POLICIAL: $grado $apellidos $nombre";
					$bitacora = $this->policia_model->registr_accion_bitacora($id,$fecha,$accion);	
*/
				//redirect("inicio");
				$this->lis_personal();
			}	
		}
		function lis_personal()
		{
			$menu = $this->session->userdata('menu');
                $id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
                $dato['tipo_user'] = $this->session->userdata('tipo_user');
                
                $dato['title']= "LISTA DE PERSONAL"; 

                //$dato['consulta'] = $this->horario_model->selec_horario();    
            
                if($dato['filas'] =$this->personal_model->seleccionar())
                {
                    $dato['selec'] = 1;
                     $dato['error'] = "";
                }
                else
                {
                    $dato['selec'] = 0;
                    $dato['error'] = "NO SE SELECCION NINGUN REGISTRO";
                } 
                
                

                $this->load->view("inicio/cabecera",$dato);
                $this->load->view("inicio/$menu",$dato);
                $this->load->view("personal/lis_personal",$dato);
                $this->load->view("inicio/pie",$dato);
		}


		function ver_personal($id_per)
		{
			$menu = $this->session->userdata('menu');
                $id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
                $dato['tipo_user'] = $this->session->userdata('tipo_user');

		
			$dato ['title'] = "Ver personal";

			$dato ['filas'] = $this->personal_model->selec_personal_modi($id_per);
			
			$this->load->view("inicio/cabecera",$dato);
            $this->load->view("inicio/$menu",$dato);
            $this->load->view("personal/ver_personal",$dato);
            $this->load->view("inicio/pie",$dato);
		}

		function modificar($id_per)
		{

            $dato ['title'] = "Modificar persona";


            $menu = $this->session->userdata('menu');
            $id = $this->session->userdata('id_per');
            $dato ['persona'] =$this->personal_model->selec_personal_modi($id);
            $dato['tipo_user'] = $this->session->userdata('tipo_user');

            $dato ['filas'] = $this->personal_model->selec_personal_modi($id_per);

            $this->load->view("inicio/cabecera",$dato);
            $this->load->view("inicio/$menu",$dato);
            $this->load->view("personal/modifi_personal",$dato);
            $this->load->view("inicio/pie",$dato);
		}
		function modificar_per($id_per)
		{
            $menu = $this->session->userdata('menu');
            $id = $this->session->userdata('id_per');
            $dato ['persona'] =$this->personal_model->selec_personal_modi($id);
            $dato['tipo_user'] = $this->session->userdata('tipo_user');

            $this->form_validation->set_rules('ci', 'CI', 'required|trim|min_length[6]|max_length[8]|numeric|strtoupper');
            $this->form_validation->set_rules('nombre', 'NOMBRE ', 'required|trim|min_length[3]|strtoupper|');
            $this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim|strtoupper|min_length[3]');
            $this->form_validation->set_rules('celular', 'NUMERO DE CELULAR', 'required|trim|numeric|max_length[8]|min_length[3]');
            $this->form_validation->set_rules('direccion', 'DIRECCION', 'required|trim|strtoupper|min_length[3]');
            $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email|trim|min_length[3]');


            $this->form_validation->set_message('_control_ci', 'el numero de C.I. ya ha sido registrado ...!!!!!');
            $this->form_validation->set_message('valid_email', 'El email es incorrecto ...!!!!!');
            $this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
            $this->form_validation->set_message('min_length', 'el %s tiene q tener mas caracteres ...!!!!!');
            $this->form_validation->set_message('max_length', 'el %s tiene q tener máximo 8 caracteres ...!!!!!');
            //$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
            $this->form_validation->set_message('alpha', 'El campo %s tiene que contener solo letras ...!!!!!');
            $this->form_validation->set_message('numeric', 'El campo %s tiene que contener solo numeros ...!!!!!');
            if (($this->form_validation->run()) == FALSE)
            {
                $this->modificar($id_per);
            }
            else
            {
                $ci = $this->input->post('ci');
                $nombres = $this->input->post('nombre');
                $apellidos = $this->input->post('apellido');
                $celular = $this->input->post('celular');
                $direccion = $this->input->post('direccion');
                $email = $this->input->post('email');



                $insert = $this->personal_model->modificar_personas($id_per,$ci,$apellidos,$nombres,$celular,$direccion,$email);




                $this->lis_personal();
            }
        }

		


}
?>