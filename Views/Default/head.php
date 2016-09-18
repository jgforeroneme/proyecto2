<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login | SalesCapture</title>
        <link href="<?php echo URL.VIEWS.DFT;?>/Css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL.VIEWS.DFT;?>/Css/estilos.css" rel="stylesheet" type="text/css"/>
        <link  href="<?php echo URL.VIEWS.DFT; ?>Css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo URL.VIEWS.DFT;?>Js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?php echo URL.VIEWS.DFT;?>Js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo URL.VIEWS.DFT;?>Js/jquery.validate.js"></script>  
        <script src="<?php echo URL.VIEWS.DFT;?>Js/funciones.js"></script>  
    </head>
    <body>
<?php 
Session::start();
$userName =  Session::getSession("User");
error_reporting(E_ALL ^ E_NOTICE);
?>
        <nav class="navbar navbar-default" role="navigation">
            <!-- El logotipo y el icono que despliega el menú se agrupan
                 para mostrarlos mejor en los dispositivos móviles -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="#"><img src="<?php echo URL.VIEWS.DFT;?>/img/logo.png"></a>
                
            </div>     

            <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                   otro elemento que se pueda ocultar al minimizar la barra -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown hide">
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Ventas<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" >
                                <li><a href="<?php echo URL; ?>Ventas/facturar">Nueva</a></li>
                                <li><a href="#">Devolución</a></li>
                                <li><a href="#">Reportes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown hide" >
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Productos<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ingresar Productos</a></li>
                                <li><a href="#">Listar Productos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown hide" >
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Clientes<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" >
                                <li><a href="#">Consultar Cliente</a></li>
                            </ul>
                        </li>
                         <li class="dropdown hide">
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Proveedores<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ingresar Proveedor</a></li>
                                <li><a href="#">Consultar Proveedor</a></li>
                            </ul>
                        </li>
                         <li class="dropdown hide">
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Usuarios<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URL; ?>Usuario/listarUsuarios">Consultar Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="dropdown hide">
                            <a href="#" class="dropdown-toggle " id="btn_menu" data-toggle="dropdown">Herramientas<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Pedidos</a></li>
                                <li><a href="<?php echo URL; ?>Empleado/abmEmpleado">ABM Empleados</a></li>
                                <li><a href="#">Mantener Base de Datos</a></li>
                            </ul>
                        </li>
                        <li name="login"><a href="Index/index" id="btn_menu" >Iniciar sesión</a></li>
                        <li name="sigin"><a href="Index/sigin" id="btn_menu" >Registrarse</a></li>
                        <li class="hide"><a href="<?php echo URL; ?>Usuario/destroySession" id="btn_menu" >Cerrar sesion </a></li>
                        <li class="hide" ><a id="btn_menu" class="active"><?php echo $userName; ?></a></li>
                    </ul>
            </div>
        </nav>
