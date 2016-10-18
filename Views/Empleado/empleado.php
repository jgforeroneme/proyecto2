
<div class="container">
    <h2 class="tittleEmp">Empleados del sistema</h2>
    <div class="nuevoEmpleado">
         <a href="<?php echo URL.'Empleado/ingresar' ?>"  id="btnRegEmp" class="btn btn-signin">Nuevo empleado</a>
       
      </div>
    <table class="table ">
        <tr class="cabeceraTabla">
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
             <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($array as $key => $value) {?>
        <tr class="cuerpoTabla">
            <td>
                <?php echo $value["documento"]?>
            </td>
            <td>
                <?php echo $value["empNombre"]?>
            </td>
            <td>
                <?php echo $value["empApellido"]?>
            </td>
            <td>
                <?php echo $value["empDireccion"]?>
            </td>
             <td>
                <?php echo $value["empTelefono"]?>
            </td>
            <td>
                <?php echo $value["empCelular"]?>
            </td>
            <td>
                <?php echo $value["empCorreo"]?>
            </td>
            <td>
                <a href="<?php echo URL.'Empleado/editar/'.$value["documento"]?>">Editar</a>
                <a href="<?php echo URL.'Empleado/eliminar/'.$value["documento"]?>">Eliminar</a>
            </td>
        </tr>
        <?php }?> 
    </table>
</div>

<script>
    $(document).ready(function() {
        document.title = 'Principal | SalesCapture';
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");


</script>