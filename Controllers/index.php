<?php
    class Index extends Controllers{
        public  $response;
        function __construct() {
            parent::__construct();
        }
        
        public function index(){
            error_reporting(E_ALL ^ E_NOTICE);
            $userName=  Session::getSession("User");
            if($userName !=""){
                header("Location:".URL."Principal/principal");
            }else{
                $this->view->render($this,'index',"");
            }
            
              
        }
        public function sigin() {
           
            $this->view->render($this,'sigin',"");
        }
        
            public function index2($valor){
                $dato=NULL;
                $i=0;
            //obtenesmos los datos del modelo
            $this->response = $this->model->datosPersonales();
            // pasamos el modelo a la vista
            $datos=  $this->response;
            foreach ($datos as  $value) {
                if($datos[$i]==$datos[$valor]){
                   $dato=$datos[$i]; 
                }
                $i++;
            }
            require VIEWS."index.php";
        }
    }
?>

