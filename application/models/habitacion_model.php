<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion_model extends CI_Model {

	function seleccionar()
	{
		$query = $this->db->query("select *from habitacion h , tipo_habi t where h.id_tipo = t.id_tipo");
		if($query->num_rows() > 0)
		{
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
	function seleccionar_buscar($buscar)
	{
		$query = $this->db->query("select *from habitacion h , tipo_habi t where  h.estado_asig = '$buscar' and h.id_tipo = t.id_tipo ");
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}
	}
	function insertar_habitacion($num,$piso, $costo, $tipo,$camas)
	{
		$data = array(
			'num_habi' => $num,
			'piso' => $piso,
			'costo' =>$costo,
			'id_tipo'=>$tipo,
			'num_camas'=>$camas,
			'estado_asig' => 'LIBRE',
		 );
		return $this->db->insert('habitacion', $data);
	}
	function seleccionar_habitaciones_vacias()
	{
		$this->db->where('estado_asig','LIBRE');
		$query = $this->db->get('habitacion');
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
	function seleccionar_habitaciones_reservadas()
	{
		
		$this->db->where('estado_asig','RESERVADA');
		$query = $this->db->get('habitacion');
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
	function seleccionar_habitaciones_ocupadas()
	{
		$this->db->where('estado_asig','OCUPADA');
		$query = $this->db->get('habitacion');
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

    function  modificar_habitacion($id_hab,$num,$piso, $costo, $tipo,$numero)
    {
        $data = array(
            'num_habi' => $num,
            'piso' => $piso,
            'costo' =>$costo,
            'id_tipo'=>$tipo,
            'num_camas'=>$numero,

        );
        $this->db->where('id_hab',$id_hab);
        return  $this->db->update('habitacion',$data);
    }


}

/* End of file habitacion_model.php */
/* Location: ./application/models/habitacion_model.php */