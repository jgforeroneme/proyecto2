<?php
class Empleado_model extends Conexion{
    function __construct() {
        parent::__construct();
    }
    
    function empleadoSigin($array) {
        return $this->db->insert('empleado',$array);
    }
    function getDataModel($columnas,$tabla) {
        return $this->db->selectAll($columnas,$tabla);
    }
    function getDataModelId($columnas,$tabla) {
        return $this->db->select($columnas,'empleado',$tabla);
    }
    function editModel($array,$condicion) {
         return $this->db->update('empleado',$array,$condicion);
    }
    function eliminarModel($condicion) {
         return $this->db->delete('empleado',$condicion);
    }
}
?>
