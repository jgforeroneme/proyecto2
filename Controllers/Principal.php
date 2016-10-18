<?php
class Principal extends Controllers{
    function __construct() {
        parent::__construct();
    }
    
    function principal(){
        $userName=  Session::getSession("User");
        if($userName!=""){
           $this->view->render($this,'principal',"",""); 
        }else{
            header("Location:".URL); 
        }
        
    }
}
?>

