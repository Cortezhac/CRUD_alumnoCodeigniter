<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class grd_grado_model extends CI_Model {
    
    function __construct()
    {
        $this->load->database();
    }

    function getGrados()
    {
        $data = $this->db->get('grd_grado')->result();
        return $data;
    }

    function setGrado($nombre)
    {
        $datos = array(
            'grd_nombre' => $nombre
        );

        return $this->db->insert('grd_grado', $datos);
    }

    function getGrado($id)
    {
        return $this->db->get_where('grd_grado', array(
            'grd_id' => $id
        ))->row();
    }

    function actualizar_grado($datos, $id)
    {
        if($this->db->get_where('grd_grado', array('grd_id' => $id))->row() != null){
            $this->db->where('grd_id', $id);
            $resultado = $this->db->update('grd_grado', $datos);
            
            return $resultado;
        }
    }

    function eliminar_grado($id)
    {
        return $this->db->delete('grd_grado', array('grd_id' => $id));
    }
} 