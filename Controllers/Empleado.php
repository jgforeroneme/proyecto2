<?php
class Empleado extends Controllers{
    function __construct() {
        parent::__construct();
    }
    
        
    function createSession($user){
        Session::setSession('User', $user);
    }
    function destroySession(){
        Session::destroy();
        header("location:".URL);
    }
    function ingresar() {
        $userName= Session::getSession("User");
        if($userName != ""){
             $response=  $this->model->getDataModel('*','empleado'); 
            $this->view->render($this,"ingresar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    public function empleadoSigin() {
      if(isset($_POST["documento"]) && isset($_POST["nombres"]) && isset($_POST["apellidos"])
              && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["celular"])
              && isset($_POST["correo"])){  
              $array["documento"]=$_POST["documento"];
              $array["empNombre"]=$_POST["nombres"];
              $array["empApellido"]=$_POST["apellidos"];
              $array["empDireccion"]=$_POST["direccion"];
              $array["empTelefono"]=$_POST["telefono"];
              $array["empCelular"]=$_POST["celular"];
              $array["empCorreo"]=$_POST["correo"];
              $this->model->empleadoSigin($array);
             echo 1;
              
      }else{
         echo 2;
      }
    }
  public function existe() {
        if(isset($_POST["doc"])){
            $response=  $this->model->ClienteExiste('*',"documento = '".$_POST["doc"]."'");
            $response=$response[0];
            if($response != NULL){
                 echo 1;
                
            }
           
        }
    } 
    function listarEmpleados(){
        $userName=  Session::getSession("User");
        if($userName!=""){
           $response=  $this->model->getDataModel('*','empleado'); 
           $this->view->render($this,'empleado',$response); 
        }else{
            header("Location:".URL); 
        }
        
    }
    function editar($usuId) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","documento = '".$usuId."'");
            $this->view->render($this,"editar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function editarDatos(){
        if(isset($_POST["doc"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])
                && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["celular"])
                && isset($_POST["correo"])){ 
            $usuId=$_POST["doc"];
            $array["empNombre"]=$_POST["nombre"];
            $array["empApellido"]=$_POST["apellido"];
            $array["empDireccion"]=$_POST["direccion"];
            $array["empTelefono"]=$_POST["telefono"];
            $array["empCelular"]=$_POST["celular"];
            $array["empCorreo"]=$_POST["correo"];
            $this->model->editModel($array,"documento='".$usuId."'");
            echo 1;
        }  
    }
        function eliminar($usuId) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","documento = '".$usuId."'");
            $this->view->render($this,"eliminar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function eliminarDatos(){
        if(isset($_POST["doc"])){ 
            $condicion="documento = '".$_POST["doc"]."'";
            $this->model->eliminarModel($condicion);
            echo 1;
        }  
    }
}
?>


