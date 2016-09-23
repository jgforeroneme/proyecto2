<?php
class Ventas extends Controllers{
    function __construct() {
        parent::__construct();
    }
    
    function facturar(){
        $userName=  Session::getSession("User");
        if($userName!=""){
            $response=$this->model->rowsCount();
           $this->view->render($this,'factura',""); 
        }else{
            header("Location:".URL); 
        }
        
    }
}
?>