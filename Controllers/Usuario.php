<?php
class Usuario extends Controllers{
    function __construct() {
        parent::__construct();
    }
    
    public function userLogin() {
        if(isset($_POST["user"]) && isset($_POST["password"])){
            $response=  $this->model->userLogin('*',"usuNombre = '".$_POST["user"]."'");
            $response=$response[0];
            if($response["usuClave"]== $_POST["password"]){
                $this->createSession($response["usuNombre"]);
                echo 1;
            }
        }
    }
    public function userSigin() {
      if(isset($_POST["doc"]) && isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["perfil"])){  
          $response=  $this->model->userLogin('*',"usuNombre = '".$_POST["user"]."'");
          $response=$response[0];
          if($response==NULL){
              $array["usuDocumento"]=$_POST["doc"];
              $array["usuNombre"]=$_POST["user"];
              $array["usuClave"]=$_POST["password"];
              $array["usuPerfil"]=$_POST["perfil"];
              $this->model->userSigin($array);
              echo 1;
          }      
      }
    }
    function createSession($user){
        Session::setSession('User', $user);
    }
    function destroySession(){
        Session::destroy();
        header("location:".URL);
    }
    
    function listarUsuarios(){
        $userName=  Session::getSession("User");
        if($userName!=""){
           $response=  $this->model->getDataModel('*','usuario'); 
           $this->view->render($this,'usuario',$response); 
        }else{
            header("Location:".URL); 
        }
        
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
}
?>

