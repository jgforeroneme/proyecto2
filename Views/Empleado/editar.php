
<script>
    $(document).ready(function() {
        document.title = 'ABM Empleados | SalesCapture';
        existeEmpleado();
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
</script>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">ABM Empleados</h2>
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
                <?php  if (is_array($array) || is_object($array)){ foreach ($array as  $value){ ?>    
                <label class="tittleEmpModal" name="titulo">Editar/Eliminar Empleado</label> 
                
                <tr> <td><label class="lblEmpModal">Documento:</label></td>  <td> <input name="documento" id="documento" type="text"  value=" <?php echo $value["documento"]?>"> </td></tr>  
                <tr><td><label class="lblEmpModal">Nombres:</label></td><td><input  name="nombres" id="nombres" type="text" value="<?php echo $value["empNombre"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Apellidos:</label> </td><td><input name="apellidos" id="apellidos" type="text" value="<?php echo $value["empApellido"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Dirección:</label></td><td><input name="direccion" id="direccion" type="text" value="<?php echo $value["empDireccion"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Telefono:</label></td><td><input name="telefono" id="telefono" type="text" value="<?php echo $value["empTelefono"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Celular:</label></td><td><input name="celular" id="celular" type="text" value="<?php echo $value["empCelular"]?>"</td></tr>
                <tr><td><label class="lblEmpModal">Email</label></td><td><input name="correo" id="correo" type="email" value="<?php echo $value["empCorreo"]?>"</td></tr>
              <?php }}?>  
            </table>
            <div id="botonera"> 
            <button id="btn_reg_emp" class="btn btn-primary" name="registrar">Registrar</button>
            <button class="btn btn-primary " id="btn_edi_emp" name="editar">Editar</button>
            <button class="btn btn-primary " id="btn_eli_emp" name="eliminar">Eliminar</button>
            <button class="btn btn-primary hidden " id="btn_edi_emp" name="guardar">Guardar cambios</button>
            </div>
          </form>	
	</div>
        <span class="cerrar">x</span>
    </div>
</div>
<script>
 $(function(){
    	$("#btnBuscar").click(function(){
            var documento = $('form[name=Registrar] input[name=doc]' )[0].value;
               if(documento !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Empleado/existe",
                         data:$("#Registrar").serialize(),
                        success: function(response){

                            if(response==1){
                             document.location="<?php echo URL; ?>Empleado/editarEmpleado/"+documento;
                                 
                                  
                            }else{
                                document.location="<?php echo URL; ?>Empleado/empleadoReg";
                                emptyEmpleado();
                            }
                        }
                    });
                    return false;
             }
    	});
    });
</script>-->

