<?php 

class Tipo_m extends CI_Model{

    private $tabla = "tipo";

    public function __construct(){
        parent::__construct();
    }

    public function obtenerDatos($id = 0){
        if($id>0){
            $this->db->where("id", $id);
            $this->db->select("nombre");
            $this->db->from($this->tabla);
            $this->db->order_by("id", "asc");
            $query = $this->db->get();
        }
        else{
            $this->db->select("id, nombre");
            $this->db->from($this->tabla);
            $query = $this->db->get();
        }
        
        return $query->result();
    }

    public function guardar($dato){
        $this->db->insert($this->tabla, $dato);
    }

    public function modificar($id, $dato){
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $dato);
    }

    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tabla);
    }
}




?>