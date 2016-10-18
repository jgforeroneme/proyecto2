<script>
    $(document).ready(function() {
        document.title = 'Principal | SalesCapture';
         emptyEmpleado();
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
</script>
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

<!-- Modal -->
<div class="modal" data-backdrop="static">
    <div class="ventana">
        <div class="modal-content">
	   <form  name="formulario" id="formulario" method="POST">
               <table border="0" width="100%" class="tblEmpModal">
                  
                <label class="tittleEmpModal" name="titulo">Editar/Eliminar Empleado</label> 
                
                <tr> <td><label class="lblEmpModal">Documento:</label></td>  <td> <input name="documento" id="documento" type="text" > </td></tr>  
                <tr><td><label class="lblEmpModal">Nombres:</label></td><td><input  name="nombres" id="nombres" type="text" </td></tr>
                <tr><td><label class="lblEmpModal">Apellidos:</label> </td><td><input name="apellidos" id="apellidos" type="text" </td></tr>
                <tr><td><label class="lblEmpModal">Dirección:</label></td><td><input name="direccion" id="direccion" type="text" </td></tr>
                <tr><td><label class="lblEmpModal">Telefono:</label></td><td><input name="telefono" id="telefono" type="text" </td></tr>
                <tr><td><label class="lblEmpModal">Celular:</label></td><td><input name="celular" id="celular" type="text" </td></tr>
                <tr><td><label class="lblEmpModal">Email</label></td><td><input name="correo" id="correo" type="email" </td></tr>
               
            </table>
            <div id="botonera"> 
            <button id="btn_reg_emp" class="btn btn-primary" name="registrar">Registrar</button>
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
    	$("#btn_reg_emp").click(function(){
           
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
                        url:"<?php echo URL; ?>Empleado/empleadoSigin",
                         data:$("#formulario").serialize(),
                        success: function(response){
                            
                            if(response == 1){
                                alert("Empleado registrado con exito");
                                document.location="<?php echo URL; ?>Empleado/listarEmpleados";
                            }else{

                                alert("Error: no se pudo registrar al empleado");
                                document.location="<?php echo URL; ?>Empleado/listarEmpleados";
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