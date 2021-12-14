<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mat_materia_model extends CI_Model {
    function __construct()
    {
        $this->load->database();
    }

    function getMaterias(){
        return $this->db->get('mat_materia')->result();
    }

    function setMateria($data){
        return $this->db->insert('mat_materia', $data);
    }

    function getMateria($id){
        return $this->db->get_where('mat_materia', array(
            'mat_id' => $id
        ))->row();
    }

    function actualizar_materia($data, $id){
        if($this->db->get_where('mat_materia', array('mat_id' => $id))->row() != null){
            $this->db->where('mat_id', $id);
            $resultado = $this->db->update('mat_materia', $data);
            return $resultado;
        }
    }

    function aliminar_materia($id){
        return $this->db->delete('mat_materia', array('mat_id', $id));
    }
}