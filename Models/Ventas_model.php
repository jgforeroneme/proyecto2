<?php
class Ventas_model extends Conexion{
    function __construct() {
        parent::__construct();
    }
    function rowsCount(){
        return $this->db->countRows('factura');
    }
}
?>

