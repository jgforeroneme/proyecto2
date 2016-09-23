<?php


class Cliente extends Controllers{
    
    function __construct() {
        parent::__construct();
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
    
    public function clienteReg() {
         $this->view->render($this,"cliente","");
    }
    
      public function clienteSigin() {
      if(isset($_POST["documento"]) && isset($_POST["nombres"]) && isset($_POST["apellidos"])
              && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["celular"])
              && isset($_POST["correo"])){  
              $array["documento"]=$_POST["documento"];
              $array["cliNombre"]=$_POST["nombres"];
              $array["cliApellido"]=$_POST["apellidos"];
              $array["cliDireccion"]=$_POST["direccion"];
              $array["cliTelefono"]=$_POST["telefono"];
              $array["cliCelular"]=$_POST["celular"];
              $array["cliCorreo"]=$_POST["correo"];
              $this->model->clienteSigin($array);
             echo 1;
              
      }else{
         echo 2;
      }
    }
    
}

  

    
?>
