<?php

class Cliente_model extends Conexion{
    function __construct() {
        parent::__construct();
    }
    
    function clienteExiste($campos,$condicion) {
        return $this->db->select($campos,'cliente',$condicion);
    }
    function clienteSigin($array) {
        return $this->db->insert('cliente',$array);
    }
}
?>

