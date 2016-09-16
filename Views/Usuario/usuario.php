
<div class="container">
    <h2 class="tittleUsu">Usuarios del sistema</h2>
    <table class="table ">
        <tr>
            <th>Documento</th>
            <th>Nombre de usuario</th>
            <th>Contraseña</th>
            <th>Perfil</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($array as $key => $value) {?>
        <tr>
            <td>
                <?php echo $value["usuDocumento"]?>
            </td>
            <td>
                <?php echo $value["usuNombre"]?>
            </td>
            <td>
                <?php echo $value["usuClave"]?>
            </td>
            <td>
                <?php echo $value["usuPerfil"]?>
            </td>
            <td>
                <a href="<?php echo URL.'Usuario/editar/'.$value["id"]?>">Editar</a>
                <a href="<?php echo URL.'Usuario/eliminar/'.$value["id"]?>">Eliminar</a>
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