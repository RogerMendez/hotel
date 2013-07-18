<?php

class Usuarios extends CI_Controller
{
    	function __construct()
        {
    		parent::__construct();

    			//$this->_is_logued_in();
            $this->load->model('usuarios_model');
            $this->load->model('personal_model');
            //$this->load->model('asistencia_model');
            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('date');
        
    	
    	}
        
        function index()
        {
            $menu = "vacio";
            $dato['error']= "";
             $dato['title'] = "LOGUIN USUARIO";

             $this->load->view("inicio/cabecera",$dato);
              $this->load->view("inicio/$menu",$dato);
              $this->load->view("usuarios/loguen",$dato);
               $this->load->view("inicio/pie",$dato);
        }

        function prueba()
        {
            echo "holaaa";
        }
        function logued()
        {
            $username = $this->input->post('username');
            $password = md5($this->input->post('pass'));

            $login = $this->usuarios_model->loguear($username, $password);
            if($login)
            {
                $tipo = $login[0]->tipo_user;
                
                if ($tipo == "ADMINISTRADOR")
                {
                    $menu = "menu";
                }
                if ($tipo == "ENCARGADO")
                {
                    $menu = "menu";
                }
                $data = array(
                    'is_logued_in'  => TRUE,                   
                    'tipo_user' => $login[0]->tipo_user,
                    'id_per' =>  8,//$login[0]->id_per,  
                    'estado' => $login[0]->estado_user,
                    'user' => $login[0]->username,  
                    'menu' => $menu,                
                    
                );
                $estado = $login[0]->estado_user;
                $id = $login[0]->id_per;
                $persona = $this->personal_model->selec_personal_modi($id);

                $estado_per = $persona[0]->estado_per; 
                
                if( $estado_per != 'DESACTIVADO')
                {

                    if($estado == "HABILITADO" )
                    {
                        $this->session->set_userdata($data); 
                        redirect("inicio"); 
                    }
                    else
                    {
                        $dato['title']= "Ingreso de usuarios";  
                        $dato['error'] ="El usuario ha sido desabilitado del sistema consulte con el administrador del sistema";    
                        $this->load->view("inicio/cabecera",$dato);
                        $this->load->view("inicio/vacio");
                        $this->load->view("usuarios/loguen",$dato);
                        $this->load->view("inicio/pie");    
                    }
                }
                else
                {
                        $dato['title']= "Ingreso de usuarios";  
                        $dato['error'] ="El usuario ha sido dado de baja del sistema consulte con el administrador del sistema";    
                        $this->load->view("inicio/cabecera",$dato);
                        $this->load->view("inicio/vacio");
                        $this->load->view("usuarios/loguen",$dato);
                        $this->load->view("inicio/pie");    
                }  
                
            }       
            else 
            {
                 
                $dato['error'] ="El nombre de usuario o contraseña son incorrectos";    
                    


                 $menu = "vacio";
         
             $dato['title'] = "LOGUIN USUARIO";

             $this->load->view("inicio/cabecera",$dato);
              $this->load->view("inicio/$menu",$dato);
              $this->load->view("usuarios/loguen",$dato);
               $this->load->view("inicio/pie",$dato);
            }
        }

        function selec_personal()
        {
            


                $menu = $this->session->userdata('menu');
                $id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
                $dato['tipo_user'] = $this->session->userdata('tipo_user');
                
                $dato['title']= "LISTA DE PERSONAL"; 

                //$dato['consulta'] = $this->horario_model->selec_horario();    
            
                if($dato['filas'] =$this->personal_model->seleccionar_lis_user())
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
                $this->load->view("usuarios/lis_personal",$dato);
               $this->load->view("inicio/pie",$dato);
        }
        function nuevo_user()
        {
            $menu = $this->session->userdata('menu');
            $id = $this->session->userdata('id_per');
            $dato ['persona'] =$this->personal_model->selec_personal_modi($id);    
            $dato['tipo_user'] = $this->session->userdata('tipo_user');   

            $dato['filas'] =$this->personal_model->selec_personal_modi($id);
            $dato['title']= "Registro de usuarios del sistema";

            $this->load->view("inicio/cabecera",$dato);
            $this->load->view("inicio/$menu",$dato);
            $this->load->view("usuarios/new_user",$dato);
            $this->load->view("inicio/pie"); 
        } 


        function registrar_usuario($id)
        {

        //echo $id;
            $this->form_validation->set_rules('username','USERNAME' , 'required|trim|min_length[4]|callback__verificar_usuario');
            $this->form_validation->set_rules('pass', 'clave ', 'required|trim|min_length[4]|md5');
            
            
            $this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya ha sido registrado ...!!!!!');
        
            $this->form_validation->set_message('required', 'Debe introducir el campo %s ...!!!!!');
            $this->form_validation->set_message('min_length', 'el %s tiene q tener 4 caracteres ...!!!!!');
            //$this->form_validation->set_message('_verificar_usuario', 'el nombre de usuario ya esta registrado');
            
            if (($this->form_validation->run()) == FALSE)
            {
                $this->nuevo_user($id);
            }
            else
            {
                $username = $this->input->post('username');
                $clave = $this->input->post('pass');           
                $tipo = $this->input->post('tipo_user');        

                $estado = 'HABILITADO';
                $insert = $this->usuarios_model->insert_user($tipo,$id,$estado,$username,$clave);

                $update = $this->usuarios_model->edit_st($id);
                $this->lis_user();    
            }
        }
        function _verificar_usuario ($user) 
        {
            return $this->usuarios_model->user_check($user);
        }
        function lis_user()
        {

                $menu = $this->session->userdata('menu');
                $id = $this->session->userdata('id_per');
                $dato ['persona'] =$this->usuarios_model->seleccionar_usuarios();    
                $dato['tipo_user'] = $this->session->userdata('tipo_user');
                
                $dato['title']= "LISTA DE USUARIOS"; 


            
                if($dato['filas'] =$this->usuarios_model->seleccionar_usuarios()) 
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
                $this->load->view("usuarios/lis_usuario",$dato);
                $this->load->view("inicio/pie",$dato);
        }
        function modificar_user($id_per)
        {


        }
       
    function salir() 
    {
        $this->session->sess_destroy();
        redirect('welcome');
 
    }        


} 
?>   