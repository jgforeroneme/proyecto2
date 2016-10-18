<div class="container" >
    <div  class="card card card-container" id="nuevoProducto">
		<h2 class="titlelogin">Ingresar Producto</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo" >
                   <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Producto">
                   <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción">
                  <input type="text" name="marca" id="marca" class="form-control"  placeholder="Marca">
                  <input type="text" name="fVencimiento" id="fVencimiento" class="form-control"  placeholder="Fecha Vencimiento">
                   <input type="text" name="valCompra" id="valCompra" class="form-control"  placeholder="Valor Compra">
                   <input type="text" name="porVenta" id="porVenta" class="form-control" placeholder="% Venta">
                   <button id="btnCalcular" type="button">calcular</button>
                   <input type="text" name="valVenta" id="valVenta" class="form-control" placeholder="Valor Venta" readonly="readonly">
                  <input type="text" name="proveedor" id="proveedor" class="form-control"  placeholder="Proveedor">
                   <input type="text" name="fIngreso" id="fIngreso" class="form-control"  placeholder="fecha Ingreso">
                   <input type="text" name="stock" id="stock" class="form-control"  placeholder="Stock">
                <input type="text" name="categoria" id="categoria" class="form-control"  placeholder="categoria">
                    <input type="text" name="tipoVenta" id="tipoVenta" class="form-control"  placeholder="tipo Venta">
		    <button type="submit" id="btnSigin" class="btn btn-signin" >Agregar</button>
		</form>
	</div>
</div>
<script>
    $(document).ready(function() {
        document.title = 'Agregar Producto | SalesCapture';
        calcular();
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
                 var porVenta= $('form[name=Registrar] input[name=porVenta]' )[0].value;
                 var valVenta= $('form[name=Registrar] input[name=valVenta]' )[0].value;
                 var proveedor= $('form[name=Registrar] input[name=proveedor]' )[0].value;
                 var ingreso = $('form[name=Registrar] input[name=fIngreso]' )[0].value;
                 var stock= $('form[name=Registrar] input[name=stock]' )[0].value;
                 var categoria = $('form[name=Registrar] input[name=categoria]' )[0].value;
        	 
                 var tipVenta= $('form[name=Registrar] input[name=tipoVenta]' )[0].value;
               
            if( codigo !="" && nombre !="" && descripcion !="" &&  marca !="" && vence !="" && valCompra !="" &&  
                    valVenta !="" && proveedor !="" && ingreso !="" &&  stock !="" && categoria !="" && 
                    porVenta !="" &&  tipVenta !=""){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Producto/productoSigin",
                         data:$("#Registrar").serialize(),
                        success: function(response){
                            if(response==1){
                                alert("producto agregado con exito");
                                document.location="<?php echo URL; ?>Producto/listarProductos";
                            }else{

                                alert("Error: no se pudo agregar el producto");
                            }
                        }
                    });
                    return false;
             }
    	});
 

    });


          $("#btnCalcular").click(function(){
        
        calcular();
     
        });    
</script>
