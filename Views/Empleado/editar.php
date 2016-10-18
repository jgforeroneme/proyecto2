<?php foreach ($array as $key => $value) {?>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Editar Empleado</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control"  value="<?php echo $value["documento"]?>"  readonly="readonly">
                    <input type="text" name="nombre" id="nombre" class="form-control"  value="<?php echo $value["empNombre"]?>">
                    <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $value["empApellido"]?>">
                    <input type="text" name="direccion" id="direccion" class="form-control"  value="<?php echo $value["empDireccion"]?>">
                    <input type="text" name="telefono" id="telefonno" class="form-control"  value="<?php echo $value["empTelefono"]?>">
                    <input type="text" name="celular" id="celular" class="form-control"  value="<?php echo $value["empCelular"]?>">
                    <input type="text" name="correo" id="correo" class="form-control"  value="<?php echo $value["empCorreo"]?>">
                    <button type="submit" id="btnSigin" class="btn btn-signin" >Actualizar</button>
		</form>
	</div>
</div>
<?php } ?>
<script>
    $(document).ready(function() {
        document.title = 'Editar Empleado | SalesCapture';
    }); 
    $("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
    $(function(){
    	$("#btnSigin").click(function(){
           	 var documento = $('form[name=Registrar] input[name=doc]' )[0].value;
        	 var nombre= $('form[name=Registrar] input[name=nombre]' )[0].value;
                 var apellido= $('form[name=Registrar] input[name=apellido]' )[0].value;
                 var direccion = $('form[name=Registrar] input[name=direccion]' )[0].value;
                 var telefono= $('form[name=Registrar] input[name=telefono]' )[0].value;
                 var celular = $('form[name=Registrar] input[name=celular]' )[0].value;
                 var correo= $('form[name=Registrar] input[name=correo]' )[0].value;
             if(documento !="" && nombre !="" && apellido !="" && direccion !="" && telefono !="" && celular !="" && correo !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Empleado/editarDatos",
                         data:$("#Registrar").serialize(),
                        success: function(response){
                            if(response==1){
                                alert("Empleado actualizado con exito");
                                document.location="<?php echo URL; ?>Empleado/listarEmpleados";
                            }else{

                                alert("Error: no se pudo actualizar al empleado");
                                 document.location="<?php echo URL; ?>Empleado/listarEmpleados";
                            }
                        }
                    });
                    return false;
             }
    	});
    });
</script>



