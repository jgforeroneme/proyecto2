<?php

class Controllers{
    function __construct() {
        //invocamos funcion statica para iniciar sesiones
        Session::start();
        //instanciamos la clase y creamos un objeto view
        $this->view=new Views();
        //llamamos la funcion
        $this->loadClassmodels();
    }
    //
    function loadClassmodels(){
        /*/obtenemos el nombre de la clase a invocar en
        // el controlador que herede de Controllers*/
        $model = get_class($this).'_model';
        
        //asignamos la direccion del modelo
        $path ='Models/'.$model.'.php';
        
        //verificamos si existe el archivo
        if(file_exists($path)){
            require $path;
            //instanciamos la clase que venga por la variable $model
            $this->model = new $model();
        }
    }
}

?>

