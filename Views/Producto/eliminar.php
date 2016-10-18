<?php foreach ($array as $key => $value) {?>
<div class="container" >
	<div id="venProducto" class="card " >
		<h2 class="titlelogin">Editar Producto</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <label>  Codigo:</label> <input type="text" name="codigo" id="codigo" class="form-control"  value="<?php echo $value["codigo"]?>"  readonly="readonly">
                   <label>Nombre:</label><input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $value["prodNombre"]?>" readonly="readonly">
                   <label> Descripcion:</label> <input type="text" name="descripcion" id="descripcion" class="form-control"  value="<?php echo $value["prodDescripcion"]?>" readonly="readonly">
                   <label> Marca:</label><input type="text" name="marca" id="marca" class="form-control"  value="<?php echo $value["prodMarca"]?>" readonly="readonly">
                  <label>  Fecha Vencimiento:</label><input type="text" name="fVencimiento" id="fVencimiento" class="form-control"  value="<?php echo $value["prodVencimiento"]?>" readonly="readonly">
                   <label> Valor compra:</label><input type="text" name="valCompra" id="valCompra" class="form-control"  value="<?php echo $value["prodValorCompra"]?>" readonly="readonly">
                  <label>  Valor Venta:</label><input type="text" name="valVenta" id="valVenta" class="form-control"  value="<?php echo $value["prodValorVenta"]?>" readonly="readonly">
                  <label> Proveedor:</label> <input type="text" name="proveedor" id="proveedor" class="form-control"  value="<?php echo $value["prodProveedor"]?>" readonly="readonly">
                  <label> Fecha Ingreso:</label> <input type="text" name="fIngreso" id="fIngreso" class="form-control"  value="<?php echo $value["prodFechaIngreso"]?>" readonly="readonly">
                  <label> Stock:</label> <input type="text" name="stock" id="stock" class="form-control"  value="<?php echo $value["prodStock"]?>" readonly="readonly">
                 <label>   Categoria:</label><input type="text" name="categoria" id="categoria" class="form-control"  value="<?php echo $value["categoria"]?>" readonly="readonly">
                 <label>   porcentaje Venta:</label><input type="text" name="porVenta" id="porVenta" class="form-control" value="<?php echo $value["porcentajeVenta"]?>" readonly="readonly">
                 <label>   Tipo Venta:</label><input type="text" name="tipoVenta" id="tipoVenta" class="form-control"  value="<?php echo $value["tipoVenta"]?>" readonly="readonly">
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
            var id= $('form[name=Registrar] input[name=codigo]' )[0].value;
                $.ajax({
                   type:"POST",
                    url:"<?php echo URL; ?>Producto/eliminarDatos",
                    data:$("#Registrar").serialize(),
                    success: function(response){
                        if(response==1){
                            alert("producto eliminado con exito");
                            document.location="<?php echo URL; ?>Producto/listarProductos";
                        }else{
                            alert("Error: no se pudo eliminar el producto");
                        }
                    }
                });
                return false;
        });
    });
</script>