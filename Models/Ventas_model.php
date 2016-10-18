<?php

class Ventas_model extends Conexion {

    function __construct() {
        parent::__construct();
    }

    function rowsCount($tabla) {
        return $this->db->countRows($tabla);
    }

    public function Buscar($criterio) {
        try {
            $response = array();

            $stm = $this->db->prepare($criterio);
            while ($row = $stm->fetch_assoc()) {
                $response[] = $row;
            }

            return $response;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
function getDataModel($columnas,$tabla) {
        return $this->db->selectLimit($columnas,$tabla);
    }
}
?>

