<script>
    $(document).ready(function() {
        document.title = 'Ventas | SalesCapture';
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
</script>
<div class="container">
    <div class="card" id="facCabecera">
		<h2 class="titlelogin">Venta de productos</h2>
        	<form class="form-signin" id="Registrar" name="Registrar" method="POST">
                    <table>
                        <tr>
                            <td><label class="lblNumFactura">N° FACTURA:</label></td>
                            <td><input type="text" name="doc" id="doc" class="form-control"></td>
                            <td><label class="lblFecha">FECHA:</label></td>
                            <td><input type="text" name="doc" id="doc" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label class="lblCliente">Cliente:</label></td>
                            <td><input type="text" name="doc" id="doc" class="form-control" placeholder="Ingrese documento del cliente" ></td>
                            <td><label class="lblVendedor">Vendedor:</label></td>
                            <td><input type="text" name="doc" id="doc" class="form-control"  ></td>
                        </tr>
                    </table>                   
                    
		  
		</form>
	</div>

    <div class="card" id="facDetalle">
   <form class="form-signin" id="Registrar" name="Registrar" method="POST"> 
       <input type="text" name="bsProducto" id="bsProducto" class="form-control" placeholder="Ingrese codigo de producto" >
       <button type="submit" id="btnBuscar" class="btn btn-signin" >Agregar</button>
       <table class="table " id="tblFacDetalle">
        <tr class="cabeceraTabla">
            <th>codigo producto</th>
            <th>Descripción</th>
            <th>Valor unidad</th>
            <th>% descuento</th>
            <th>% iva</th>
            <th>Subtotal</th>
            <th>Opciones</th>
        </tr>
       
        <tr class="cuerpoTabla">
            <td>
                <?php echo $value["usuDocumento"]?>
            </td>
            <td>
                <?php echo $value["usuNombre"]?>
            </td>
            <td>
                <?php echo $value["usuClave"]?>
            </td>
            <td>
                <?php echo $value["usuPerfil"]?>
            </td>
            <td>
                <?php echo $value["usuPerfil"]?>
            </td>
            <td>
                <?php echo $value["usuPerfil"]?>
            </td>
            <td>
                <a href="<?php echo URL.'Usuario/editar/'.$value["id"]?>">Editar</a>
                <a href="<?php echo URL.'Usuario/eliminar/'.$value["id"]?>">Eliminar</a>
            </td>
        </tr>
       
    </table>
       </form>
</div>
</div>