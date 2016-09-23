
<script>
    $(document).ready(function() {
        document.title = 'clientes | SalesCapture';
        emptyCliente();
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
</script>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Buscar Cliente</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control" placeholder="Ingrese documento del empleado" >
		    <button type="submit" id="btnBuscar" class="btn btn-signin" data-toggle="modal" data-target="#myModal">Buscar</button>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal" data-backdrop="static">
    <div class="ventana">
        <div class="modal-content">
	   <form  name="formulario" id="formulario" method="POST">
               <table border="0" width="100%" class="tblEmpModal">
                  
                <label class="tittleEmpModal" name="titulo">Editar/Eliminar Empleado</label> 
                
                <tr> <td><label class="lblEmpModal">Documento:</label></td>  <td> <input name="documento" id="documento" type="text"  value=" <?php echo $value["documento"]?>"> </td></tr>  
                <tr><td><label class="lblEmpModal">Nombres:</label></td><td><input  name="nombres" id="nombres" type="text" value="<?php echo $value["empNombre"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Apellidos:</label> </td><td><input name="apellidos" id="apellidos" type="text" value="<?php echo $value["empApellido"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Dirección:</label></td><td><input name="direccion" id="direccion" type="text" value="<?php echo $value["empDireccion"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Telefono:</label></td><td><input name="telefono" id="telefono" type="text" value="<?php echo $value["empTelefono"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Celular:</label></td><td><input name="celular" id="celular" type="text" value="<?php echo $value["empCelular"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Email</label></td><td><input name="correo" id="correo" type="email" value="<?php echo $value["empCorreo"]?>"</td></tr>
               
            </table>
            <div id="botonera"> 
            <button id="btn_reg_cli" class="btn btn-primary" name="registrar">Registrar</button>
            <button class="btn btn-primary " id="btn_edi_cli" name="editar">Editar</button>
            <button class="btn btn-primary " id="btn_eli_cli" name="eliminar">Eliminar</button>
            <button class="btn btn-primary hidden " id="btn_edi_cli" name="guardar">Guardar cambios</button>
            </div>
          </form>	
	</div>
        <span class="cerrar">x</span>
    </div>
</div>
<script>
    $(function(){
    	$("#btn_reg_cli").click(function(){
            alert();
           	 var documento = $('form[name=formulario] input[name=documento]' )[0].value;
        	 var nombre= $('form[name=formulario] input[name=nombres]' )[0].value;
                 var apellido= $('form[name=formulario] input[name=apellidos]' )[0].value;
                 var direccion = $('form[name=formulario] input[name=direccion]' )[0].value;
                 var telefono= $('form[name=formulario] input[name=telefono]' )[0].value;
                 var celular= $('form[name=formulario] input[name=celular]' )[0].value;
                 var correo = $('form[name=formulario] input[name=correo]' )[0].value;
                 
             if(documento !=" " && nombre !=" " && apellido !=" " && direccion !=" " && telefono !=" " && celular !=" " && correo !=" "){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Cliente/clienteSigin",
                         data:$("#formulario").serialize(),
                        success: function(response){
                            alert(response);
                            if(response == 1){
                                alert("Cliente registrado con exito");
                                document.location="<?php echo URL; ?>Ventas/facturar";
                            }else{

                                alert("Error: no se pudo registrar al usuario");
                                document.location="<?php echo URL; ?>Ventas/devolucion";
                            }
                        }
                    });
                    return false;
             }else{
                alert("error");
             }
    	});
    });
</script>