<?php
class Ventas extends Controllers{
    function __construct() {
        parent::__construct();
    }
    
    function facturar(){
          error_reporting(E_ALL ^ E_NOTICE);
        $userName=  Session::getSession("User");
        if($userName!=""){
        
        
         $row_cnt =$this->model->getDataModel("*","factura");
         $row_cnt2=$this->model->getDataModel("*","producto"); 
     
            $this->view->render($this,'factura',$row_cnt2,""); 
        }else{
            header("Location:".URL); 
        }
        
    }
    
    function productoBuscar(){
         print_r(json_encode(
            $this->model->Buscar($_REQUEST['criterio'])
        ));
         
    }
}
?>
