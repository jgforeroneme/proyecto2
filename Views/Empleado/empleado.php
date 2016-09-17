<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Registrar Usuario</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control" placeholder="Documento" >
                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" >
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" >
                    <input type="text" name="perfil" id="perfil" class="form-control" placeholder="Perfil" >
		    <button type="submit" id="btnSigin" class="btn btn-signin" >Registrar</button>
		</form>
	</div>
</div>
<script>
     $(document).ready(function() {
        document.title = 'ABM Empleados | SalesCapture';
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
    $(function(){
    	$("#btnSigin").click(function(){
           	 var documento = $('form[name=Registrar] input[name=doc]' )[0].value;
        	 var user= $('form[name=Registrar] input[name=user]' )[0].value;
                 var pwd= $('form[name=Registrar] input[name=password]' )[0].value;
                 var perfil = $('form[name=Registrar] input[name=perfil]' )[0].value;
             if(documento !="" && user!="" && pwd!="" && perfil !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Usuario/userSigin",
                         data:$("#Registrar").serialize(),
                        success: function(response){
                            alert(response);
                            if(response==1){
                                alert("usuario registrado con exito");
                                document.location="<?php echo URL; ?>";
                            }else{

                                alert("Error: no se pudo registrar al usuario");
                            }
                        }
                    });
                    return false;
             }
    	});
    });
</script>

