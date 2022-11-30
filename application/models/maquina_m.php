<?php 

class Maquina_m extends CI_Model{

    private $tabla = "maquina";
    private $tabla_relacionada = "tipo";

    public function __construct(){
        parent::__construct();
    }

    public function obtenerDatos($id = 0){
        if($id>0){
            $this->db->where("m.id", $id);
            $this->db->select("m.id, m.codigo, m.nombre, m.tipo_id, t.nombre as tipo, m.descripcion");
            $this->db->from($this->tabla." as m");
            $this->db->join($this->tabla_relacionada." as t", "m.tipo_id=t.id");
            $this->db->order_by('m.codigo', 'asc');
            $query = $this->db->get();
        }
        else{
            $this->db->select("m.id, m.codigo, m.nombre, m.tipo_id, t.nombre as tipo, m.descripcion");
            $this->db->from($this->tabla." as m");
            $this->db->join($this->tabla_relacionada." as t", "m.tipo_id=t.id");
            $this->db->order_by('m.codigo', 'asc');
            $query = $this->db->get();
        }
        
        return $query->result();
    }

    public function guardar($datos){
        $this->db->insert($this->tabla, $datos);
    }

    public function modificar($id, $datos){
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tabla);
    }

    public function filtrar_maquinas($filtro){
        if($filtro!="todos"){
            $this->db->where("m.tipo_id", $filtro);
        }
        $this->db->select("m.id, m.codigo, m.nombre, m.tipo_id, t.nombre as tipo, m.descripcion");
        $this->db->from($this->tabla." as m");
        $this->db->join($this->tabla_relacionada." as t", "m.tipo_id=t.id");
        $this->db->order_by('m.id', 'asc');
        $query = $this->db->get();

        return $query->result();
    }
}




?>