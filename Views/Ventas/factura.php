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


<div class="container">
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

    <div class="card" id="facDetalle">
        <form class="form-signin" id="Productos" name="Registrar" method="POST"> 
            <input type="text" name="bsProducto" id="bsProducto" class="form-control" placeholder="Ingrese codigo de producto" >
            <button type="submit" id="btnBuscar" class="btn btn-signin" >Agregar</button>
            <table class="table " id="tblFacDetalle">
                <tr class="cabeceraTabla">
                    <th>codigo producto</th>
                    <th>Descripción</th>
                    <th>Valor unidad</th>
                     <th>cantidad</th>
                    <th>% descuento</th>
                    <th>% iva</th>
                    <th>Subtotal</th>
                    <th>Opciones</th>
                </tr>

                <tr class="cuerpoTabla">
                    <td>
                        <?php echo $value["usuDocumento"] ?>
                    </td>
                    <td>
                        <?php echo $value["usuNombre"] ?>
                    </td>
                    <td>
                        <?php echo $value["usuClave"] ?>
                    </td>
                    <td style="width: 45px;">
                        <input type="text" name="cantidad" id="cantidad">
                    </td>
                    <td style="width: 55px;">
                       <input type="text" name="desc" id="desc">
                    </td>
                    <td style="width: 55px;">
                        <input type="text" name="iva" id="iva">
                    </td>
                     <td>
                        <input type="text" name="subtotal" id="subtotal">
                    </td>
                    <td>
                        <a href="<?php echo URL . 'Factura/editar/' . $value["id"] ?>">Editar</a>
                        <a href="<?php echo URL . 'Factura/eliminar/' . $value["id"] ?>">Eliminar</a>
                    </td>
                </tr>

            </table>

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
  
 </script>