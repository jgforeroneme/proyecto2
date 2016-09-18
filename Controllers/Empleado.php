<?php
class Empleado extends Controllers{
    function __construct() {
        parent::__construct();
    }
        public function abmEmpleado(){
            error_reporting(E_ALL ^ E_NOTICE);
            $userName=  Session::getSession("User");
            if($userName !=""){
                 $this->view->render($this,'empleado',"");
            }else{
                header("Location:".URL."Principal/principal");
               
            }
        }
    public function existe() {
        if(isset($_POST["doc"])){
            $response=  $this->model->empleadoExiste('*',"documento = '".$_POST["doc"]."'");
            $response=$response[0];
            if($response != NULL){
                 echo 1;
                
            }
            return $response;
        }
    }
    

       function editarEmpleado($usuId) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","documento = '".$usuId."'");
            $this->view->render($this,"editar",$response);
           echo 1;
        }else{
            header("Location:".URL);
        }
    }
  
    
function empleadoReg(){
     $this->view->render($this,"ingresar","");
}
    function editar($usuId) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","id = '".$usuId."'");
            $this->view->render($this,"editar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function editarDatos(){
        if(isset($_POST["doc"]) && isset($_POST["user"]) && isset($_POST["password"])
                && isset($_POST["perfil"])){ 
            $usuId=$_POST["id"];
            $array["usuDocumento"]=$_POST["doc"];
            $array["usuNombre"]=$_POST["user"];
            $array["usuClave"]=$_POST["password"];
            $array["usuPerfil"]=$_POST["perfil"];
            $this->model->editModel($array,"id='".$usuId."'");
            echo 1;
        }  
    }
        function eliminar($usuId) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","id = '".$usuId."'");
            $this->view->render($this,"eliminar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function eliminarDatos(){
        if(isset($_POST["id"])){ 
            $condicion="id = '".$_POST["id"]."'";
            $this->model->eliminarModel($condicion);
            echo 1;
        }  
    }
}
?>

