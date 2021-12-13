<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Alumno extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'url',
            'form'
        ));
        $this->load->library('form_validation');
        $this->load->model('alm_alumno_model');
        $this->load->model('grd_grado_model');
    }

    public function index()
    {
        $data['alumno'] = $this->alm_alumno_model->getAlumnos();
        $this->cargarVista('modulo_alumno/listar_alumno', $data);
    }


    function cargarVista($nombreVista, $data = null)
    {
        $this->load->view('layouts/master_page_head');
        $this->load->view($nombreVista, $data);
        $this->load->view('layouts/master_page_footer');
    }

    function nuevo_alumno()
    {
        $data['grados'] = $this->grd_grado_model->getGrados();
        $this->cargarVista('modulo_alumno/nuevo_alumno', $data);
    }

    function guardar_alumno()
    {
        $this->form_validation->set_rules('txtCodigo', 'Codigo', 'required', array(
            'required' => 'El %s es requerido'
        ));

        $this->form_validation->set_rules('txtNombre', 'Nombre', 'required', array(
            'required' => 'El %s es requerido'
        ));

        $this->form_validation->set_rules('txtEdad', 'Edad', 'required', array(
            'required' => 'El %s es requerido'
        ));

        $this->form_validation->set_rules('txtSexo', 'Sexo', 'required', array(
            'required' => 'El %s es requerido'
        ));

        $this->form_validation->set_rules('txtIdGrd', 'Grado', 'required', array(
            'required' => 'EL %s es requerido'
        ));

        $datos = array(
            'alm_codigo' => $this->input->post('txtCodigo'),
            'alm_nombre' => $this->input->post('txtNombre'),
            'alm_edad' => $this->input->post('txtEdad'),
            'alm_sexo' => $this->input->post('txtSexo'),
            'alm_id_grd' => $this->input->post('txtIdGrd'),
            'alm_observacion' => $this->input->post('txtObservacion')
        );

        if($this->form_validation->run() === false){
            $errores = $this->form_validation->error_array();
            $respuesta = array(
                'estado' => false,
                'errores' => $errores
            );

            echo json_encode($respuesta);
        } else {
            $estado = $this->alm_alumno_model->setAlumno($datos);
            $respuesta = array(
                'estado' => $estado
            );
            echo json_encode($respuesta);
        }
    }

    function editar_alumno()
    {   
        $id = $this->uri->segment(4);
        $data['alumno'] = $this->alm_alumno_model->getAlumno($id);
        $data['grados'] = $this->grd_grado_model->getGrados();
        $this->cargarVista('modulo_alumno/editar_alumno', $data);
    }

    function actualizar_alumno()
    {
        $id = $this->input->post('alm_id');
        $datos = array(
            'alm_nombre' => $this->input->post('txtNombre'),
            'alm_edad' => $this->input->post('txtEdad'),
            'alm_sexo' => $this->input->post('selectSexo'),
            'alm_id_grd' => $this->input->post('selectIdGrd'),
            'alm_observacion' => $this->input->post('txtObservacion')
        );

        $this->alm_alumno_model->actualizarAlumno($datos, $id);

        redirect(base_url('modulo_alumno/alumno'));
    }
}