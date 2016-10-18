<script>
    $(document).ready(function () {
        document.title = 'Ventas | SalesCapture';
     
} );
    $("li").removeClass("hide");
    $('li[name=login]').addClass("hide");
    $('li[name=sigin]').addClass("hide");
    
</script>

<?php
date_default_timezone_set("America/Bogota");
$time = time();

?>


<div class="container">
    <div class="card" id="facCabecera">
        <h2 class="titleFac">Venta de productos</h2>
        <form class="form-signin" id="Registrar" name="Registrar" method="POST">
            <table>
                <tr>
                    <td><label class="lblNumFactura">N° FACTURA:</label></td>
                    <td><input type="text" name="fac" id="fac" class="form-control" value="<?php echo $entero   ?>"></td>
                    <td><label class="lblFecha">FECHA:</label></td>
                    <td><input type="text" name="fec" id="fec" class="form-control" value="<?php echo date("d-m-Y (H:i:s)", $time); ?>"></td>
                    <td><label class="lblCliente">Cliente:</label></td>
                    <td><input type="text" name="doc" id="doc" class="form-control" placeholder="Ingrese documento del cliente" ></td>
                    <td><label class="lblVendedor">Vendedor:</label></td>
                    <td><input type="text" name="user" id="user" class="form-control"  value="<?php echo $entero  ?>" ></td>
                </tr>
            </table>                   
        </form>
    </div>

    <div class="card" id="facDetalle">
        <form class="form-signin" id="Productos" name="Registrar" method="POST"> 
           <div class="col-xs-7">
                        <input id="producto_id" type="hidden" value="0" />
                        <input autocomplete="off" id="producto" class="form-control" type="text" placeholder="Nombre del producto" style="float: left; width: 50%" />
                        <input type="text" id="cantidad" name="cantidad" placeholder="cantidad" style="float: left; width: 10%; height: 35px;">
                        <input type="text" id="valUni" name="valUni" placeholder="valor unidad" style="float: left; width: 10%; height: 35px;">
                        <input type="button" id="agregar" name="agregar" value="Agregar" style="clear: both">
                       
            </div>
    
            <table border="1" align="center" id="tblDatos" style="clear: both" class="dataTable">
                <thead>
    <tr>
        <th>Codigo</th>
        <th>Articulo</th>
        <th>valor unidad</th>
        <th>cantidad</th>
        <th>subtotal</th>
    </tr>
   </thead>
      
     <tr>
        <td><input type="text" name="codigodet" id="codigodet" class="campo"></td>
        <td><input type="text" name="productodet_'.$i.'" id="productodet_'.$i.'"></td>
        <td><input type="text" name="valordet_'.$i.'" id="valordet_'.$i.'"></td>
        <td><input type="text" name="cantdet_'.$i.'" id="cantdet_'.$i.'"></td>
        <td><input type="text" name="subtotaldet_'.$i.'" id="subtotaldet_'.$i.'"></td>
    </tr>
  
    
</table>
            <div id="paginador"></div>   
            <button class="btn btn-primary btn-block btn-lg" type="submit">Facturar</button>

        </form>
    </div>
</div>
<script>
    $(function () {
        $("#doc").keypress(function (e) {
            if (e.which == 13) {
                var documento = $('form[name=Registrar] input[name=doc]')[0].value;
                if (documento != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL; ?>Cliente/existe",
                        data: $("#Registrar").serialize(),
                        success: function (response) {

                            if (response == 1) {
                                
                                $("#bsProducto").focus();                      

                            } else {
                                document.location = "<?php echo URL; ?>Cliente/clienteReg";
                               
                            }
                        }
                    });
                    return false;


                }
            }
        });
    });
  
  
      $("#producto").autocomplete({
      
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url:"<?php echo URL; ?>Ventas/productoBuscar" ,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                           codigo: item.codigo,
                           value: item.prodDescripcion,
                           descripcion: item.prodNombre,
                           valor:item.prodValorVenta
                            
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#codigo").val(ui.item.codigo);
            $("#descripcion").val(ui.item.value);
            $("#valUni").val(ui.item.valor);
            $("#cantidad").focus();
        }
       
    });
    
    $("#agregar").click(function(){
   
 
         
    });
  </script>
