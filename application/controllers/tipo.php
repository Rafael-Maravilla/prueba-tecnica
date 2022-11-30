<?php 

class Tipo extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Tipo_m');
        $this->load->library('form_validation');
    }

    public function index($error=""){
        if(!$error==""){
            $data["msgErrores"] = $error;
        }
        $data["tipos"] = $this->Tipo_m->obtenerDatos();
        $data["titulo"] = "Tipo";
        $this->load->view("layout/head", $data);
        $this->load->view("tipo/index_tipo", $data);
        $this->load->view("layout/footer");
    }

    public function obtenerRegistro(){
        if($this->input->post("id")){
            $id = $this->input->post("id");
            $dato = $this->Tipo_m->obtenerDatos($id);
            echo json_encode($dato);
        }
        else{
            $datos = $this->Tipo_m->obtenerDatos();
            echo json_encode($datos);
        }
        
    }

    public function guardar(){
        $validacion = array(
            array(
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'El campo %s es requerido.',
                    )
            ));
            $this->form_validation->set_rules($validacion);
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->index($this->form_validation->error_array());
        }
        else
        {
            $dato = array("nombre" => $this->input->post("tipo"));
            $this->Tipo_m->guardar($dato);
            header("Location: ".site_url("Tipo"));
        }

    }

    public function modificar(){
        $id = $this->input->post("idM");
        $dato = array("nombre" => $this->input->post("tipoM"));
        $this->Tipo_m->modificar($id, $dato);
        header("Location: ".site_url("Tipo"));
    }

    public function eliminar(){
        $id = $this->input->get("id");
        $this->Tipo_m->eliminar($id);
        header("Location: ".site_url("Tipo"));
    }
}




?>