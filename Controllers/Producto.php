<?php
class Producto extends Controllers{
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
             $response=  $this->model->getDataModel('*','producto'); 
            $this->view->render($this,"ingresar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    public function productoSigin() {
      if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"])
                && isset($_POST["marca"]) && isset($_POST["fVencimiento"]) && isset($_POST["valCompra"])
                && isset($_POST["valVenta"]) && isset($_POST["proveedor"])
                && isset($_POST["fIngreso"]) && isset($_POST["stock"]) && isset($_POST["categoria"])
                && isset($_POST["porVenta"]) && isset($_POST["tipoVenta"])){ 
            $array["codigo"]=$_POST["codigo"];
            $array["prodNombre"]=$_POST["nombre"];
            $array["prodDescripcion"]=$_POST["descripcion"];
            $array["prodMarca"]=$_POST["marca"];
            $array["prodVencimiento"]=$_POST["fVencimiento"];
            $array["prodValorCompra"]=$_POST["valCompra"];
            $array["prodValorVenta"]=$_POST["valVenta"];
            $array["prodProveedor"]=$_POST["proveedor"];
            $array["prodFechaIngreso"]=$_POST["fIngreso"];
            $array["prodStock"]=$_POST["stock"];
            $array["categoria"]=$_POST["categoria"];
            $array["porcentajeVenta"]=$_POST["porVenta"];
            $array["tipoVenta"]=$_POST["tipoVenta"];
            $this->model->productoSigin($array);
            echo 1;
         
              
      }else{
         echo 2;
      }
    }
  public function existe() {
        if(isset($_POST["codigo"])){
            $response=  $this->model->productoExiste('*',"codigo = '".$_POST["codigo"]."'");
            $response=$response[0];
            if($response != NULL){
                 echo 1;
                
            }
           
        }
    } 
    function listarProductos(){
        $userName=  Session::getSession("User");
        if($userName!=""){
           $response=  $this->model->getDataModelLimit('*','producto'); 
           $this->view->render($this,'producto',$response); 
        }else{
            header("Location:".URL); 
        }
        
    }
    function editar($codigo) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","codigo = '".$codigo."'");
            $this->view->render($this,"editar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function editarDatos(){
        if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"])
                && isset($_POST["marca"]) && isset($_POST["fVencimiento"]) && isset($_POST["valCompra"])
                && isset($_POST["valVenta"]) && isset($_POST["proveedor"])
                && isset($_POST["fIngreso"]) && isset($_POST["stock"]) && isset($_POST["categoria"])
                && isset($_POST["porVenta"]) && isset($_POST["tipoVenta"])){ 
           $codigo=$_POST["codigo"];
            $array["prodNombre"]=$_POST["nombre"];
            $array["prodDescripcion"]=$_POST["descripcion"];
            $array["prodMarca"]=$_POST["marca"];
            $array["prodVencimiento"]=$_POST["fVencimiento"];
            $array["prodValorCompra"]=$_POST["valCompra"];
            $array["prodValorVenta"]=$_POST["valVenta"];
             $array["prodProveedor"]=$_POST["proveedor"];
            $array["prodFechaIngreso"]=$_POST["fIngreso"];
            $array["prodStock"]=$_POST["stock"];
            $array["categoria"]=$_POST["categoria"];
            $array["porcentajeVenta"]=$_POST["porVenta"];
            $array["tipoVenta"]=$_POST["tipoVenta"];
            $this->model->editModel($array,"codigo='".$codigo."'");
            echo 1;
        }  
    }
        function eliminar($codigo) {
        $userName= Session::getSession("User");
        if($userName != ""){
            $response=  $this->model->getDataModelId("*","codigo = '".$codigo."'");
            $this->view->render($this,"eliminar",$response);
        }else{
            header("Location:".URL);
        }
    }
    
    function eliminarDatos(){
        if(isset($_POST["codigo"])){ 
            $condicion="codigo = '".$_POST["codigo"]."'";
            $this->model->eliminarModel($condicion);
            echo 1;
        }  
    }
}
?>


