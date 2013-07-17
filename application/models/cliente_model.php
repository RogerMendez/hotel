<?php
/*
*/

class Cliente_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}
	function seleccionar()
	{
		
		$query = $this->db->get('clientes'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 
	} 

	function selec_client_asig()
	{
		$this->db->order_by("id_cli", "desc");
		$this->db->where('estado_cli','NO');
		$query = $this->db->get('clientes'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 

	}	
	function buscar_cliente_regilla($buscar)
	{
		//$query = $this->db->query("select *from totales t, producto p  where t.id_pro = p.id_pro");
		$this->db->order_by("ap_cli", "asc");
		$this->db->or_like('nro_doc_cli',$buscar, 'after');
		$this->db->or_like('procedencia_cli',$buscar, 'after');
		$this->db->or_like('nom_cli',$buscar, 'after'); 
		$this->db->or_like('ap_cli',$buscar, 'after'); 
		

		

		
		//$this->db->order_by("generico", "asc");
		$this->db->from('clientes');  
		//$this->db->where('fecha',$fecha);
		//$this->db->join('totales', 'totales.id_pro = producto.id_pro');

		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;  
		}

	} 
	function numero_check($numero,$doc)
	{
		$this->db->where('nro_doc_cli',$numero);
		$this->db->where('tipo_docu',$doc);
		//$this->db->where('estado','ACTIVO');
		$query = $this->db->get('clientes');
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	function insert_cliente($numero,$apellidos,$nombres,$telefono,$procedencia,$fecha,$estado,$documento)
	{
		$data = array(
			'nro_doc_cli' => $numero,
			'ap_cli' => $apellidos,
			'nom_cli' => $nombres,
			
			'celular_cli' => $telefono,
			'procedencia_cli' => $procedencia,
			'tipo_docu	' => $documento,
			'fecha_nac_cli' => $fecha,
			'estado_cli' => $estado
			
		 );
		return  $this->db->insert('clientes',$data); 
	}
    function selec_cli_id($id)
    {
        $this->db->where('id_cli',$id);
        $query = $this->db->get('clientes');
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $fila)
            {
                $dato[] = $fila;
            }
            return $dato;
        }
    }
    function edit_cliente($id_cli,$numero,$apellidos,$nombres,$telefono,$procedencia,$fecha,$documento)
    {
        $data = array(
            'nro_doc_cli' => $numero,
            'ap_cli' => $apellidos,
            'nom_cli' => $nombres,

            'celular_cli' => $telefono,
            'procedencia_cli' => $procedencia,
            'tipo_docu	' => $documento,
            'fecha_nac_cli' => $fecha,


        );
        $this->db->where('id_cli',$id_cli);
        return  $this->db->update('clientes',$data);

    }
}	
