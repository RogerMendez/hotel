<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio_model extends CI_Model {

    function seleccionar()
    {
        $query = $this->db->get('servicios');
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
    function insertar_servicio($name, $desc,$costo,$cantidad)
    {
        $data = array(
            'nombre_ser' =>$name ,
            'descripcion_ser'=>$desc,
            'costo_ser'=>$costo,
            'ent_ser'=>$cantidad,
            'sal_ser'=>'0',
            'saldo_ser'=>$cantidad
        );
        return $this->db->insert('servicios', $data);
    }
    function seleccionar_id_ser($id)
    {
        $this->db->where('id_ser',$id);
        $query = $this->db->get('servicios');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
        else{
            return true;
        }
    }

    function  servicio_hab($id_hab, $id_ser,$cantidad,$costo,$total,$num)
    {
        $data = array(
            'id_hab' =>$id_hab ,
            'id_ser'=>$id_ser,
            'costo_ser'=>$costo,
            'cant_ser'=>$cantidad,
            'costo_total'=>$total,
            'num_asig_ser'=>$num,
            'estado_ser'=>'ACTIVO',
        );
        return $this->db->insert('ser_hab', $data);
    }

    function actualizar_servicio($id_ser, $sal,$saldo)
    {
        $data = array(
            'sal_ser'=>$sal,
            'saldo_ser'=>$saldo,
        );
        $this->db->where('id_ser',$id_ser);
        return  $this->db->update('servicios',$data);

    }
     function actualizar_estado_servicio($id_hab)
     {
         $data = array(
             'estado_ser'=>'CANCELADO',
         );
         $this->db->where('id_hab',$id_hab);
         return  $this->db->update('ser_hab',$data);
     }
    function editar_servicio($id_ser,$name, $desc,$costo)
    {
        $data = array(
            'nombre_ser' =>$name ,
            'descripcion_ser'=>$desc,
            'costo_ser'=>$costo,

        );
        $this->db->where('id_ser',$id_ser);
        return  $this->db->update('servicios',$data);
    }
}

/* End of file tipo_model.php */
/* Location: ./application/models/tipo_model.php */