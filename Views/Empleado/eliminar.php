<?php foreach ($array as $key => $value) {?>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Eliminar Empleado</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control"  value="<?php echo $value["documento"]?>"  readonly="readonly">
                    <input type="text" name="nombre" id="nombre" class="form-control"  value="<?php echo $value["empNombre"]?>">
                    <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $value["empApellido"]?>">
                    <input type="text" name="direccion" id="direccion" class="form-control"  value="<?php echo $value["empDireccion"]?>">
                    <input type="text" name="telefono" id="telefonno" class="form-control"  value="<?php echo $value["empTelefono"]?>">
                    <input type="text" name="celular" id="celular" class="form-control"  value="<?php echo $value["empCelular"]?>">
                    <input type="text" name="correo" id="correo" class="form-control"  value="<?php echo $value["empCorreo"]?>">
                    <button type="submit" id="btnDel" class="btn btn-signin" >Eliminar</button>
		</form>
	</div>
</div>
<?php } ?>
<script>
    $(document).ready(function() {
        document.title = 'ELiminar Usuario | SalesCapture';
    }); 
    $("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
    $(function(){
    	$("#btnDel").click(function(){
            var id= $('form[name=Registrar] input[name=doc]' )[0].value;
                $.ajax({
                   type:"POST",
                    url:"<?php echo URL; ?>Empleado/eliminarDatos",
                    data:$("#Registrar").serialize(),
                    success: function(response){
                        
                        if(response==1){
                            alert("usuario eliminado con exito");
                            document.location="<?php echo URL; ?>Empleado/listarEmpleados";
                        }else{
                            alert("Error: no se pudo actualizar al usuario");
                        }
                    }
                });
                return false;
        });
    });
</script>





