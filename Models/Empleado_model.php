<?php
class Empleado_model extends Conexion{
    function __construct() {
        parent::__construct();
    }
    
    function userLogin($campos,$condicion) {
        return $this->db->select($campos,'usuario',$condicion);
    }
    function userSigin($array) {
        return $this->db->insert('usuario',$array);
    }
    function getDataModel($columnas,$tabla) {
        return $this->db->selectAll($columnas,$tabla);
    }
    function getDataModelId($columnas,$tabla) {
        return $this->db->select($columnas,'usuario',$tabla);
    }
    function editModel($array,$condicion) {
         return $this->db->update('usuario',$array,$condicion);
    }
    function eliminarModel($condicion) {
         return $this->db->delete('usuario',$condicion);
    }
}
?>



