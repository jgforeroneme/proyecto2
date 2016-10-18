<?php foreach ($array as $key => $value) {?>
<div class="container" >
	<div id="venProducto" class="card " >
		<h2 class="titlelogin">Editar Producto</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <label>  Codigo:</label> <input type="text" name="codigo" id="codigo" class="form-control"  value="<?php echo $value["codigo"]?>"  readonly="readonly">
                   <label>Nombre:</label><input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $value["prodNombre"]?>">
                   <label> Descripcion:</label> <input type="text" name="descripcion" id="descripcion" class="form-control"  value="<?php echo $value["prodDescripcion"]?>">
                   <label> Marca:</label><input type="text" name="marca" id="marca" class="form-control"  value="<?php echo $value["prodMarca"]?>">
                  <label>  Fecha Vencimiento:</label><input type="text" name="fVencimiento" id="fVencimiento" class="form-control"  value="<?php echo $value["prodVencimiento"]?>">
                   <label> Valor compra:</label><input type="text" name="valCompra" id="valCompra" class="form-control"  value="<?php echo $value["prodValorCompra"]?>">
                  <label>  Valor Venta:</label><input type="text" name="valVenta" id="valVenta" class="form-control"  value="<?php echo $value["prodValorVenta"]?>">
                  <label> Proveedor:</label> <input type="text" name="proveedor" id="proveedor" class="form-control"  value="<?php echo $value["prodProveedor"]?>">
                  <label> Fecha Ingreso:</label> <input type="text" name="fIngreso" id="fIngreso" class="form-control"  value="<?php echo $value["prodFechaIngreso"]?>">
                  <label> Stock:</label> <input type="text" name="stock" id="stock" class="form-control"  value="<?php echo $value["prodStock"]?>">
                 <label>   Categoria:</label><input type="text" name="categoria" id="categoria" class="form-control"  value="<?php echo $value["categoria"]?>">
                 <label>   porcentaje Venta:</label><input type="text" name="porVenta" id="porVenta" class="form-control" value="<?php echo $value["porcentajeVenta"]?>" readonly="readonly">
                 <label>   Tipo Venta:</label><input type="text" name="tipoVenta" id="tipoVenta" class="form-control"  value="<?php echo $value["tipoVenta"]?>">
		    <button type="submit" id="btnSigin" class="btn btn-signin" >Actualizar</button>
		</form>
	</div>
</div>
<?php } ?>
<script>
    $(document).ready(function() {
        document.title = 'Editar Producto | SalesCapture';
    }); 
    $("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
 $(function(){
    	$("#btnSigin").click(function(){
           	 var codigo = $('form[name=Registrar] input[name=codigo]' )[0].value;
        	 var nombre= $('form[name=Registrar] input[name=nombre]' )[0].value;
                 var descripcion= $('form[name=Registrar] input[name=descripcion]' )[0].value;
                 var marca = $('form[name=Registrar] input[name=marca]' )[0].value;
                 var vence= $('form[name=Registrar] input[name=fVencimiento]' )[0].value;
                 var valCompra = $('form[name=Registrar] input[name=valCompra]' )[0].value;
        	 var valVenta= $('form[name=Registrar] input[name=valVenta]' )[0].value;
                 var proveedor= $('form[name=Registrar] input[name=proveedor]' )[0].value;
                 var ingreso = $('form[name=Registrar] input[name=fIngreso]' )[0].value;
                 var stock= $('form[name=Registrar] input[name=stock]' )[0].value;
                 var categoria = $('form[name=Registrar] input[name=categoria]' )[0].value;
        	 var porVenta= $('form[name=Registrar] input[name=porVenta]' )[0].value;
                 var tipVenta= $('form[name=Registrar] input[name=tipoVenta]' )[0].value;
                
            if( codigo !="" && nombre !="" && descripcion !="" &&  marca !="" && vence !="" && valCompra !="" &&  
                    valVenta !="" && proveedor !="" && ingreso !="" &&  stock !="" && categoria !="" && 
                    porVenta !="" &&  tipVenta !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Producto/editarDatos",
                         data:$("#Registrar").serialize(),
                        success: function(response){
                            if(response==1){
                                alert("producto actualizado con exito");
                                document.location="<?php echo URL; ?>Producto/listarProductos";
                            }else{

                                alert("Error: no se pudo actualizar el producto");
                            }
                        }
                    });
                    return false;
             }
    	});
    });
</script>