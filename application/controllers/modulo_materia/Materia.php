<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Materia extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'url',
            'form'
        ));

        $this->load->library('form_validation');
        $this->load->model('mat_materia_model');
    }

    function index(){
        $data['materia'] = $this->mat_materia_model->getMaterias();
        $this->cargarVista('modulo_materia/listar_materia', $data);
    }

    function nueva_materia(){
        $this->cargarVista('modulo_materia/nueva_materia');
    }

    function guardar_materia(){
        $datos = array(
            'mat_nombre' => $this->input->post('txtNombre')
        );
        $this->mat_materia_model->setMateria($datos);
        redirect(base_url('modulo_materia/materia'));
    }

    function cargarVista($nombreVista, $data = null){
        $this->load->view('layouts/master_page_head');
        $this->load->view($nombreVista, $data);
        $this->load->view('layouts/master_page_footer');
    }
}