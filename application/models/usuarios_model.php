<?php
/*
*/

class Usuarios_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function seleccionar_usuarios()
	{
		$query = $this->db->query("select *from usuario");

		//$query = $this->db->query("select *from asignacion_cargo a , efectivo_policial e where  a.id_pol = e.id_pol and  e.estado = 'ACTIVO'");

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$dato[] = $fila;
			}
			return $dato;
		}
	}
 
	function id_check($id)
	{
		$this->db->where('id_per',$id);
		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return false;
		} 
		else
		{
			return true;
		} 
	}
	
	function insert_user($tipo,$id,$estado,$user,$clave)
	{
		$data = array(
			'tipo_user' => $tipo,
			'id_per' => $id,
			'estado_user' => $estado,
			'username' => $user,
			'clave' => $clave
		 );
		return  $this->db->insert('usuario',$data);

		
	}
	function edit_st($id)
	{
		$data2 = array(
			'est_user' => 'SI'
			
		 );
		$this->db->where('id_per',$id);
		return  $this->db->update('personal',$data2);
	}
	
	function modificar_user($id,$tipo,$estado)
	{
		$data = array(
			'tipo_user' => $tipo,
			'estado_user' => $estado,
		 );
		$this->db->where('id_user',$id);
		return  $this->db->update('usuario',$data);
	}
	function deshabi_user($id,$estado)
	{
		$data = array(
			
			'estado_user' => $estado,
		 );
		$this->db->where('id_per',$id);
		return  $this->db->update('usuario',$data);
	}

	
	function user_check($user) 
	{
		$this->db->where('username',$user); 
		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	
	function loguear($username, $password)

	{

		$this->db->where('username', $username);
		$this->db->where('clave', $password);

		$query = $this->db->get('usuario');
		if($query->num_rows() > 0)
		{
			return $query->result();
		} 
	}
	
	function contro_user($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('clave', $password);

		$query = $this->db->get('usuario');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}

	}
	function cambiar_clave($id,$password)
	{
		$data = array(
			
			'clave' => $password,
		 );
		$this->db->where('id_pol',$id);
		return  $this->db->update('usuario',$data);

	}
	
}
?>