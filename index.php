<?php
require 'config.php';
 //comprobamos si estamos pasando datos por url si no es asi le asignamos Index/index.php
//controlador/metodo
$url=  isset($_GET["url"]) ? $_GET["url"] : "Index/index";

//convertimos la cadena a un vector y eliminamos la barra diagonal
$url=  explode("/", $url);

//var_dump( $url);

if(isset($url[0])){
    $controller=$url[0];
}
if(isset($url[1])){
    if ($url[0] != '') {
        $method = $url[1];
    }
}
if(isset($url[2])){
    if ($url[1] != '') {
        $params = $url[2];
    }
}

/*echo $controller;
echo $method;*/
//verificamos si tenemos una clase cargada
spl_autoload_register(function($class){
    //verificamos si existe el archivo dentro de la capeta libreria
    if(file_exists(LBS.$class.".php")){
        require LBS.$class.".php";
    }
});
//new Controllers();
//obtener el controlador que venga por url
$controllersPath = 'Controllers/'.$controller.'.php';
//verificamos si existe el archivo dentro de la carpeta Controllers
if(file_exists($controllersPath)){
    require $controllersPath;
   //instanciamos la clase que venga por la variable $controller
    $controller = new $controller();
    //evaluamos la variable metodo
    if(isset($method)){
        //evaluamos si el metodo que viene por la variable $mthod existe
        if(method_exists($controller, $method)){
            if(isset($params)){
                //ejecutamos el metodo que revisa el parametro
                $controller->{$method}($params);
            }else{
                  $controller->{$method}();
            }
          
        }else{
            echo "error no existe el metodo";
        }
    }
}else{
    echo 'Error: controlador no existe';
}

?>