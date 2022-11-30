<?php 

class Maquina extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Maquina_m');
        $this->load->library('form_validation');
    }

    public function index($error=""){
        if(!$error==""){
            $data["msgErrores"] = $error;
        }
        $data["maquinas"] = $this->Maquina_m->obtenerDatos();
        $data["titulo"] = "Maquina";
        $this->load->view("layout/head", $data);
        $this->load->view("maquina/index_maquina", $data);
        $this->load->view("layout/footer");
    }

    public function obtenerRegistro(){
        $id = $this->input->post("id");
        $datos = $this->Maquina_m->obtenerDatos($id);
        echo json_encode($datos);
    }

    public function guardar(){
        $validacion = array(
            array(
                    'field' => 'codigo',
                    'label' => 'Código',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'El campo %s es requerido.',
                    ),
            ),
            array(
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'El campo %s es requerido.',
                    ),
            ),
            array(
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'El campo %s es requerido.',
                    ),
            ),
            array(
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'El campo %s es requerido.',
                ),
            )
        );

        $this->form_validation->set_rules($validacion);
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->index($this->form_validation->error_array());
        }
        else
        {
            $datos = array(
                "codigo" => $this->input->post("codigo"),
                "nombre" => $this->input->post("nombre"),
                "tipo_id" => $this->input->post("tipo"),
                "descripcion" => $this->input->post("descripcion")
            );
            $this->Maquina_m->guardar($datos);
            header("Location: ".site_url("Maquina"));
        }

    }

    public function modificar(){
        $id = $this->input->post("idM");
        $datos = array(
            "codigo" => $this->input->post("codigoM"),
            "nombre" => $this->input->post("nombreM"),
            "tipo_id" => $this->input->post("tipoM"),
            "descripcion" => $this->input->post("descripcionM")
        );
        $this->Maquina_m->modificar($id, $datos);
        header("Location: ".site_url("Maquina"));
    }

    public function eliminar(){
        $id = $this->input->get("id");
        $this->Maquina_m->eliminar($id);
        header("Location: ".site_url("Maquina"));
    }

    public function vista(){
        $data["maquinas"] = $this->Maquina_m->obtenerDatos();
        $data["titulo"] = "Vista máquinas";
        $this->load->view("layout/head", $data);
        $this->load->view("maquina/vista_maquinas", $data);
        $this->load->view("layout/footer");
    }

    public function filtrar_maquinas(){
        $criterio = $this->input->post('criterio');
        $datos = $this->Maquina_m->filtrar_maquinas($criterio);

        echo json_encode($datos);
    }
}




?>