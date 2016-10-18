<?php
class Views{
    function __construct() {
        
    }
    
    //metodo que ejecutara las vistas
    function render($controller,$view,$entero,$array) {
       //obtenemos el nombre de la clase
        $controllers =  get_class($controller);
        require VIEWS.DFT.'head.php';
        require VIEWS.$controllers.'/'.$view.'.php';
        require VIEWS.DFT.'footer.php';
    }
}
?>

