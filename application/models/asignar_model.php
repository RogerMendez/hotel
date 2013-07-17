
<?php
/*
*/

class Asignar_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}
	function seleccionar_hab_asignadas()
	{
		$this->db->where('estado_asig','ACTIVO');
		$query = $this->db->get('asignacion_hab'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 
	} 

	function select_hab_activa($id_hab)
	{
		$this->db->where('id_asig',$id_hab);
		$this->db->where('estado_asig','ACTIVO');
		$query = $this->db->get('asignacion_hab'); 
		
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

	function selecc_habitacion($id)
	{
		$query = $this->db->query("select *from habitacion h , tipo_habi t where  h.id_hab = $id and h.id_tipo = t.id_tipo");
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}

	}

	function selecc_acumulador($id_hab)
	{

		$query = $this->db->query("select *from acumulador a , clientes c where a.id_hab = $id_hab and a.id_cli = c.id_cli");
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 
	}
	function selecc_acumulador_dos($id_hab)
	{

		$query = $this->db->query("select *from acumulador a , habitacion h where a.id_hab = $id_hab and a.id_hab = h.id_hab");
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 
	}
	function asignar_cliente($id_cli,$id_hab)
	{
		$data = array(
			'id_hab' => $id_hab,
			'id_cli' => $id_cli,
			
		 );
		return  $this->db->insert('acumulador',$data); 
	}
	function quitar_cliente($id_cli,$id_hab)
	{
		$this->db->delete('acumulador',array('id_cli' => $id_cli)); 
	
	}
	function verificar_cliente($id_cli)
	{
		$this->db->where('id_cli',$id_cli);
		
		//$this->db->where('estado','ACTIVO');
		$query = $this->db->get('acumulador');
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}


	function numero_max()
	{
		
		$this->db->select_max('num_asig');
		$query = $this->db->get('asignacion_hab');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	function guardar_aignacion($id_hab,$id_cli,$desde,$hasta,$dias,$costo_total,$estado,$numero)
	{
		$data = array(
			'id_hab' => $id_hab,
			'id_cli' => $id_cli,
			'fecha_ent' => $desde,
			'fecha_sal' => $hasta,
			'num_dias' => $dias,
			'costo_total' => $costo_total,
			'estado_asig_hab' => $estado,
			'num_asig' => $numero,

			
		 );
		return  $this->db->insert('asignacion_hab',$data);
	}
	function actualizar_estado($id_hab,$est)
	{
		$data = array(
			'estado_asig' => $est,
	
		 );
		$this->db->where('id_hab',$id_hab);
		return  $this->db->update('habitacion',$data);
	}
    function crear_reserva($id_hab,$id_cli, $desde, $hasta)
    {
        $data = array(
            'id_hab' => $id_hab,
            'id_cli' => $id_cli,
            'fecha_in' =>$desde,
            'fecha_fin'=>$hasta,
            'estado_res'=>'ACTIVO',

        );
        return $this->db->insert('reservacion', $data);

    }

	function actualizar_es_cliente($id_asig,$est)
	{
		$data = array(
			'estado_asig_hab' => $est,
	
		 );
		$this->db->where('id_asig',$id_asig);
		return  $this->db->update('asignacion_hab',$data);
	}
	

	function selec_hab_ocu()
	{
		$query = $this->db->query("select *from habitacion h , tipo_habi t where h.id_tipo = t.id_tipo and h.estado_asig = 'OCUPADO'");
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
	function cliente_cuarto($id_hab)
	{
		$query = $this->db->query("select * from asignacion_hab a , clientes c where (a.id_hab = $id_hab and a.id_cli = c.id_cli and a.estado_asig_hab = 'ACTIVO')");
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

    function selec_servio($id_hab,$num)
    {
        $query = $this->db->query("select *from servicios s , ser_hab h where h.id_hab = $id_hab and h.num_asig_ser = $num and s.id_ser = h.id_ser");
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
	function ver_hab_ocup($id_hab)
	{
		$this->db->where('id_hab',$id_hab);
		$this->db->where('estado_asig_hab','ACTIVO');
		$query = $this->db->get('asignacion_hab'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 

	}
	function cam_est_cli($id_cli,$es_cli)
	{
		$data = array(
			'estado_cli' => $es_cli,
	
		 );
		$this->db->where('id_cli',$id_cli);
		return  $this->db->update('clientes',$data);

	}
	function edit_estadia($num,$hasta,$dias)
	{
		$data = array(
			'num_dias' => $dias,
			'fecha_sal' => $hasta,
	
		 );

		$this->db->where('num_asig',$num);
		$this->db->where('estado_asig_hab','ACTIVO');
		return  $this->db->update('asignacion_hab',$data);

	}


}	
