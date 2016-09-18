<script>
    $(document).ready(function() {
        document.title = 'ABM Empleados | SalesCapture';
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
                                 existeEmpleado();
                                  
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
</script>

