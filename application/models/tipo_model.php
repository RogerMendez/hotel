<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_model extends CI_Model {

	function seleccionar()
	{
		$query = $this->db->get('tipo_habi');
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila) {
				$data[] = $fila;
			}
			return $data;
		}
		else
		{
			return False;
		}
	}
	function insertar_tipo($name, $desc){
		$data = array(
			'nombre_tipo' =>$name ,
			'descrip_tipo'=>$desc,
		 );
		return $this->db->insert('tipo_habi', $data);
	}	
}

/* End of file tipo_model.php */
/* Location: ./application/models/tipo_model.php */