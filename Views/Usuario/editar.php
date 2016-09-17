<?php foreach ($array as $key => $value) {?>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Editar Usuario</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control" placeholder="Documento" value="<?php echo $value["usuDocumento"]?>"  readonly="readonly">
                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" value="<?php echo $value["usuNombre"]?>">
                    <input type="text" name="password" id="password" class="form-control" placeholder="Contraseña" value="<?php echo $value["usuClave"]?>">
                    <input type="text" name="perfil" id="perfil" class="form-control" placeholder="Perfil" value="<?php echo $value["usuPerfil"]?>">
                    <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $value["id"]?>">
		    <button type="submit" id="btnSigin" class="btn btn-signin" >Actualizar</button>
		</form>
	</div>
</div>
<?php } ?>
<script>
    $(document).ready(function() {
        document.title = 'Editar Usuario | SalesCapture';
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
                  var id= $('form[name=Registrar] input[name=id]' )[0].value;
             if(documento !="" && user!="" && pwd!="" && perfil !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Usuario/editarDatos",
                         data:$("#Registrar").serialize(),
                        success: function(response){
                            alert(response);
                            if(response==1){
                                alert("usuario actualizado con exito");
                                document.location="<?php echo URL; ?>Usuario/listarUsuarios";
                            }else{

                                alert("Error: no se pudo actualizar al usuario");
                            }
                        }
                    });
                    return false;
             }
    	});
    });
</script>


