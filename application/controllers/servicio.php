<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->_is_logued_in();

        $this->load->model('servicio_model');
        $this->load->model('personal_model');
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
        $data['title'] = 'Tipos Servicios';
        $dato['filas'] = $this->servicio_model->seleccionar();
        if($dato['filas'])
        {
            $this->load->view('inicio/cabecera', $data);
            $this->load->view('inicio/menu');
            $this->load->view('servicios/index', $dato);
            $this->load->view('inicio/pie');
        }
        else
        {
            $this->new_servicio();
        }
    }
    function new_servicio()
    {
        $menu = $this->session->userdata('menu');
        $id = $this->session->userdata('id_per');
        $dato ['persona'] =$this->personal_model->selec_personal_modi($id);
        $dato['tipo_user'] = $this->session->userdata('tipo_user');

        $data['title']='Nuevo Servicio';
        $this->load->view('inicio/cabecera', $data);
        $this->load->view('inicio/menu');
        $this->load->view('servicios/new_servi');
        $this->load->view('inicio/pie');
    }
    function guardar()
    {
        $this->form_validation->set_rules('nombre', 'Nombre servicio', 'trim|strtoupper|required');
        $this->form_validation->set_rules('descripcion', 'Descripcion Servicio', 'strtoupper|trim');
        $this->form_validation->set_rules('numero', 'CANTIDAD', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('costo', 'PRECIO UNITARIO', 'required|decimal');

        $this->form_validation->set_message('is_natural_no_zero', 'El dato introducido en  %s debe ser entero y mayor a cero');
        $this->form_validation->set_message('decimal', 'El dato introducido en  %s debe de ser decimal ejemplo 5.9');

        $this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');

        if($this->form_validation->run() == FALSE)
        {
            $this->new_servicio();
        }
        else{
            $name = $this->input->post('nombre');
            $desc = $this->input->post('descripcion');
            $costo = $this->input->post('costo');
            $cantidad = $this->input->post('numero');
            $insert = $this->servicio_model->insertar_servicio($name, $desc,$costo,$cantidad);
            $this->index();

        }
    }
    function modif_servi($id_ser)
    {

        $dato ['filas'] = $this->servicio_model->seleccionar_id_ser($id_ser);

        $dato['title']='Modificar Servicio';
        $this->load->view('inicio/cabecera', $dato);
        $this->load->view('inicio/menu');
        $this->load->view('servicios/modi_servi', $dato);
        $this->load->view('inicio/pie');
    }
    function modificar($id_ser)
    {
        $this->form_validation->set_rules('nombre', 'Nombre servicio', 'trim|strtoupper|required');
        $this->form_validation->set_rules('descripcion', 'Descripcion Servicio', 'strtoupper|trim');

        $this->form_validation->set_rules('costo', 'PRECIO UNITARIO', 'required|decimal');

        $this->form_validation->set_message('is_natural_no_zero', 'El dato introducido en  %s debe ser entero y mayor a cero');
        $this->form_validation->set_message('decimal', 'El dato introducido en  %s debe de ser decimal ejemplo 5.9');

        $this->form_validation->set_message('required', 'El Campo %s es REQUERIDO');

        if($this->form_validation->run() == FALSE)
        {
            $this->modif_servi($id_ser);
        }
        else{
            $name = $this->input->post('nombre');
            $desc = $this->input->post('descripcion');
            $costo = $this->input->post('costo');

            $insert = $this->servicio_model->editar_servicio($id_ser,$name, $desc,$costo);
            $this->index();

        }
    }

}

/* End of file tipo.php */
/* Location: ./application/controllers/tipo.php */