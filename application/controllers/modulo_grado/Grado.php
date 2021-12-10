<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Grado extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'url',
            'form'
        ));
        $this->load->library('form_validation');
        $this->load->model('grd_grado_model');
    }

    public function index()
    {   
        $data['grados'] = $this->grd_grado_model->getGrados();
        $this->cargar_vista('modulo_grado/lista_grado', $data);
    }

    public function nuevo_grado()
    {
        $this->cargar_vista('modulo_grado/nuevo_grado');
    }

    public function guardar_grado()
    {
        $nombre = $this->input->post('grd_nombre');
        if(isset($nombre) && $nombre != ''){
            $estado = $this->grd_grado_model->setGrado($nombre);
            $respuesta = array('estado' => $estado,'data'=> $nombre);
        }else {
            $respuesta = array('estado' => false , 'data' => $nombre,'errores' => 'introduzca un valor valido');
        }
        echo json_encode($respuesta);
    }

    public function cargar_vista($nombreVista, $data = null)
    {
        $this->load->view('layouts/master_page_head');
        $this->load->view($nombreVista, $data);
        $this->load->view('layouts/master_page_footer');
    }

    public function editar_grado()
    {
        $id = $this->uri->segment(4);
        $datos['grado'] = $this->grd_grado_model->getGrado($id);
        $this->cargar_vista('modulo_grado/editar_grado', $datos);
    }

    public function actualizar_grado()
    {
        $this->form_validation->set_rules('txtId', 'Id', 'required', array(
            'required' => '%s perdido'
        ));

        $this->form_validation->set_rules('txtNombre', 'nombre', 'required', array(
            'required' => 'ingrese el %s para actualizar'
        ));

        if($this->form_validation->run() === false){
            $errores = $this->form_validation->error_array();
            $respuesta = array(
                'estado' => false,
                'errores' => $errores
            );
            echo json_encode($errores);
        }else {
            $id = $this->input->post('txtId');
            $nombre = $this->input->post('txtNombre');
            $datos = array(
                'grd_nombre' => $nombre
            );

            $resultado = $this->grd_grado_model->actualizar_grado($datos, $id);

            $respuesta = array(
                'status' => $resultado == null ? false : true
            );
            echo json_encode($respuesta);
        }
    }

    public function eliminar_grado_vista(){
        $this->cargar_vista('modulo_grado/eliminar_grado');
    }
    
    public function eliminar_grado(){
        $estado = false;
        $id = $this->input->post('grd_id');
        if($id != null){
            $estado = $this->grd_grado_model->eliminar_grado($id);
        }
        
        $respuesta = array(
            'estado' => $estado,
            'id' => $id
        );

        echo json_encode($respuesta);
    }
}