<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva_model extends CI_Model {

	function seleccionar_habi()
	{
		$query = $this->db->query("select * from habitacion h , tipo_habi t where h.id_tipo = t.id_tipo");
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

        $query = $this->db->query("select *from habitacion h , tipo_habi t, reservacion r, clientes c where h.id_tipo = t.id_tipo and r.id_hab = h.id_hab and r.id_cli = c.id_cli");
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

    function cambiar_reserva($id_res,$estado)
    {
        $data = array(
            'estado_res' => $estado,

        );
        $this->db->where('id_res',$id_res);
        return  $this->db->update('reservacion',$data);
    }

    function verfi($id_hab)
    {
        $this->db->where('id_hab',$id_hab);
        $this->db->where('estado_res','ACTIVO');
        $query = $this->db->get('reservacion');
        if($query->num_rows() > 0){

            return FALSE;
        }
        else
        {
            return TRUE;
        }

    }
    function elim_reserva()
    {
        $this->db->delete('reservacion',array('id_cli' => '0'));
    }


}

/* End of file habitacion_model.php */
/* Location: ./application/models/habitacion_model.php */