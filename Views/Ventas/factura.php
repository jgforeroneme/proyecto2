<script>
    $(document).ready(function () {
        document.title = 'Ventas | SalesCapture';


    });
    $("li").removeClass("hide");
    $('li[name=login]').addClass("hide");
    $('li[name=sigin]').addClass("hide");

</script>


<?php
date_default_timezone_set("America/Bogota");
$time = time();
?>


<div class="container" id="facContenedor">
    <div class="card" id="facCabecera">
        <h2 class="titleFac">Venta de productos</h2>
        <form class="form-signin" id="Registrar" name="Registrar" method="POST">
            <table>
                <tr>
                    <td><label class="lblNumFactura">N° FACTURA:</label></td>
                    <td><input type="text" name="fac" id="fac" class="form-control" value="<?php echo $response + 1 ?>"></td>
                    <td><label class="lblFecha">FECHA:</label></td>
                    <td><input type="text" name="fec" id="fec" class="form-control" value="<?php echo date("d-m-Y (H:i:s)", $time); ?>"></td>
                    <td><label class="lblCliente">Cliente:</label></td>
                    <td><input type="text" name="doc" id="doc" class="form-control" placeholder="Ingrese documento del cliente" ></td>
                    <td><label class="lblVendedor">Vendedor:</label></td>
                    <td><input type="text" name="user" id="user" class="form-control"  ></td>
                </tr>
            </table>                   
        </form>
    </div>
</div>

<div class="card" id="facDetalle">
    <form action="javascript: fn_agregar();" class="form-signin" id="Productos" name="Registrar" method="POST"> 
        <div class="col-xs-7" id="datosDetalle">
            <input id="producto_id" type="hidden" value="0" />
            <input autocomplete="off" id="producto" class="form-control" type="text" placeholder="Nombre del producto" />
            <label>Codigo:</label>   <input type="text" name="codigo" id="codigo">
            <label>Articulo:</label>   <input type="text" name="descripcion" id="descripcion">
            <label>Valor unidad:</label>   <input type="text" name="valUni" id="valUni" >
            <label style="clear: both">Cantidad</label>   <input type="text" name="cantidad" id="cantidad">
            <input type="submit" id="add" name="add" value="Agregar" class="btn btn btn-signin" style="width: 120px">
        </div>
        <table class="dataTable " id="tblFacDetalle">
            <thead>
                <tr class="cabeceraTabla">
                    <th class="columna">codigo</th>
                    <th class="columna">Descripción</th>
                    <th class="columna">Valor unidad</th>
                    <th class="columna">cantidad</th>
                    <th class="columna">Subtotal</th>
                    <th class="columna">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cuerpoTabla">
                </tr>
            </tbody>   
           </table>
        

    </form>
    <table style="margin-left: 1150px">
                <tr>
                    <td style="float:left"><label >Neto:</label> </td><td>  <input type="text" name="neto" id="neto"></td>
                </tr>   
                <tr>
                    <td style="float:left"><label >% Descto:</label> </td><td>  <input type="text" name="desc" id="desc"></td>
                </tr>   
                <tr>   
                    <td style="float: left"><label>% I.V.A:</label></td><td>   <input type="text" name="iva" id="iva" ></td>
                </tr>   
                <tr>    
                    <td style="float: left"><label>Total:</label></td><td>   <input type="text" name="total" id="total" ></td>
                </tr>   
                <tr>   
                    <td colspan="2"><input name="facturar" type="button" id="facturar" value="Facturar" class="btn btn-signin" style="width: 120px"/></td>
                </tr>
           
        </table>
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
                url: "<?php echo URL; ?>Ventas/productoBuscar",
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
                            valor: item.prodValorVenta

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


    $("#desc").keypress(function (e) {
    if (e.which == 13) {
        
        var desc = $("#desc").val();
        var total = $("#total").val();
        desc = total * (desc / 100);
        total = total - desc;
        alert(total);
        $("#total").val(total);
        $("#iva").focus();
    }
    });


    $("#iva").keypress(function (e) {
         if (e.which == 13) {
        var iva =parseFloat( $("#iva").val());
        var total =parseFloat( $("#total").val());
        iva =total * (iva / 100);
       
        total = (total + iva);
         alert(total);
        $("#total").val(total);
        $("#facturar").focus();
    }
    });


</script>