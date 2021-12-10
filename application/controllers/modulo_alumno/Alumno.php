<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Alumno extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'url'
        ));
        $this->load->model('alm_alumno_model');
    }

    public function index(){
        $data['alumno'] = $this->alm_alumno_model->getAlumnos();
        $this->cargarVista('modulo_alumno/listar_alumno', $data);
    }


    function cargarVista($nombreVista, $data = null){
        $this->load->view('layouts/master_page_head');
        $this->load->view($nombreVista, $data);
        $this->load->view('layouts/master_page_footer');
    }

    function nuevo_alumno(){
        $this->cargarVista('modulo_alumno/nuevo_alumno');
    }
}