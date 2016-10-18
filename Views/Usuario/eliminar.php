<?php foreach ($array as $key => $value) {?>
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Eliminar Usuario</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="doc" id="doc" class="form-control" placeholder="Documento" value="<?php echo $value["usuDocumento"]?>"  readonly="readonly">
                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" value="<?php echo $value["usuNombre"]?>"  readonly="readonly">
                    <input type="text" name="password" id="password" class="form-control" placeholder="Contraseña" value="<?php echo $value["usuClave"]?>"  readonly="readonly">
                    <input type="text" name="perfil" id="perfil" class="form-control" placeholder="Perfil" value="<?php echo $value["usuPerfil"]?>"  readonly="readonly">
                    <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $value["id"]?>">
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
            var id= $('form[name=Registrar] input[name=id]' )[0].value;
                $.ajax({
                   type:"POST",
                    url:"<?php echo URL; ?>Usuario/eliminarDatos",
                    data:$("#Registrar").serialize(),
                    success: function(response){
                       
                        if(response==1){
                            alert("usuario eliminado con exito");
                            document.location="<?php echo URL; ?>Usuario/listarUsuarios";
                        }else{
                            alert("Error: no se pudo actualizar al usuario");
                        }
                    }
                });
                return false;
        });
    });
</script>