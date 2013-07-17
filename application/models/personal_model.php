<?php
/*
*/

class Personal_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function seleccionar()
	{
		$this->db->where('estado_per','ACTIVO');
		$query = $this->db->get('personal'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		} 
	} 
	function seleccionar_lis_user() 
	{
		$this->db->where('estado_per','ACTIVO');
		$this->db->where('est_user','NO');
		$query = $this->db->get('personal'); 
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato; 
		} 
	} 
	function id_max()
	{
		
		$this->db->select_max('id_per');
		$query = $this->db->get('personal');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}

	function ci_check($ci)
	{
		$this->db->where('ci_per',$ci);
		//$this->db->where('estado','ACTIVO');
		$query = $this->db->get('personal');
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	
	function insert_personas($ci,$apellidos,$nombres,$celular,$direccion,$email,$estado)
	{
		$data = array(
			'ci_per' => $ci,
			'apellidos_per' => $apellidos,
			'nombres_per' => $nombres,
			
			'celular_per' => $celular,
			'direccion_per' => $direccion,
			'email_per' => $email,
			'estado_per' => $estado,
			'est_user' => 'NO'
			
		 );
		return  $this->db->insert('personal',$data); 
	}

	
	function modificar_personas($id_per,$ci,$apellidos,$nombres,$celular,$direccion,$email)
	{
		$data = array(
			'ci_per' => $ci,
			'apellidos_per' => $apellidos,
			'nombres_per' => $nombres,
			
			'celular_per' => $celular,
			'direccion_per' => $direccion,
			'email_per' => $email,


			
		 );
		$this->db->where('id_per',$id_per);
		return  $this->db->update('personal',$data);
	}
	
	
	function selec_personal_modi($id)
	{
		
		 $query = $this->db->query("select *from  personal p where p.id_per = $id and  p.estado_per = 'ACTIVO'");	
		//$query = $this->db->get_where('efectivo_policial',array ('id_pol' =>$id)); 
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}
	} 
	//***********************************


	


	

	
}
?>