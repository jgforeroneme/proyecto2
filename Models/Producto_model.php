<?php
class Producto_model extends Conexion{
    function __construct() {
        parent::__construct();
    }
    
    function productoSigin($array) {
        return $this->db->insert('producto',$array);
    }
    function getDataModel($columnas,$tabla) {
        return $this->db->selectAll($columnas,$tabla);
    }
    function getDataModelLimit($columnas,$tabla) {
        return $this->db->selectLimit($columnas,$tabla);
    }
    function getDataModelId($columnas,$tabla) {
        return $this->db->select($columnas,'producto',$tabla);
    }
    function editModel($array,$condicion) {
         return $this->db->update('producto',$array,$condicion);
    }
    function eliminarModel($condicion) {
         return $this->db->delete('producto',$condicion);
    }
}
?>

