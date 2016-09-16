<?php
class QueryManager{
    private $link;
    function __construct($HOST,$USER,$PASS,$DB) {
        $this->link=new mysqli($HOST,$USER,$PASS,$DB); 
        if(mysqli_connect_errno()){
            printf("Connect failed: %s\n", mysqli_connect_errno());
            exit();
        }
    }
    function select($registros,$tabla,$condicion) {
        $query="select ".$registros." from ".$tabla." where ".$condicion.";";
        $result=  $this->link->query($query);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $response[]=$row;
            }
            return $response;
        }
    }
    
    function insert($tabla,$campos){
        $columnas=NULL;
        $datos=NULL;
        //obtenemos id de cada $campo
        foreach($campos as $key => $value){
            $columnas .=$key.','; //asignamos la posicion que viene en el array
            $datos .='"'.$value.'",';//asignamos el valor
        }
        $columnas=  substr($columnas,0,-1);
        $datos=  substr($datos,0,-1);
        $stmt="insert into ".$tabla."(".$columnas.") values (".$datos.")";
        $result=  $this->link->query($stmt) or die($this->link->error);
    }
    
    function selectAll($registros,$tabla) {
        $query="select ".$registros." from ".$tabla.";";
        $result=  $this->link->query($query);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $response[]=$row;
            }
            return $response;
        }
    }
}
?>

