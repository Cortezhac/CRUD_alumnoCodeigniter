<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class alm_alumno_model extends CI_Model {
    
    function __construct()
    {
        $this->load->database();
    }

    public function getAlumnos($con_grd_nombre = true)
    {
        if($con_grd_nombre){
            return $this->db->query('SELECT *, (SELECT grd_nombre FROM grd_grado WHERE grd_grado.grd_id = alm_id_grd) as alm_nombre_grd FROM `alm_alumno`;')->result();
        }else{
            return $this->db->get('alm_alumno')->result();
        }
    }

    public function setAlumno($datos)
    {
        return $this->db->insert('alm_alumno', $datos);
    }

    public function getAlumno($id, $con_grd_nombre = true)
    {
        if($con_grd_nombre){
            return $this->db->query(
                "SELECT *, (SELECT grd_nombre FROM grd_grado WHERE grd_grado.grd_id = alm_id_grd) as alm_nombre_grd FROM `alm_alumno` WHERE alm_id=". $id
            )->row();
        }else {
            return $this->db->get_where('alm_alumno', array(
                'alm_id' => $id
            ))->row();
        }
    }

    public function actualizarAlumno($datos, $id)
    {
        if($this->db->get_where('alm_alumno', array('alm_id' => $id))->row() != null){
            $this->db->where('alm_id', $id);
            $resultado = $this->db->update('alm_alumno', $datos);

            return $resultado;
        }
    }

    public function eliminar_alumno($id)
    {
        return $this->db->delete('alm_alumno', array('alm_id' => $id));
    }
}