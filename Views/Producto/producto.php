<div class="container">
    <h2 class="tittleEmp">Productos en inventario</h2>
    <div class="nuevoEmpleado">
         <a href="<?php echo URL.'Producto/ingresar' ?>"  id="btnRegProd" class="btn btn-signin">Nuevo Producto</a>
       
      </div>
    <div class="card" id="ventanaProducto">
    <table class="dataTable " id="productos">
        <thead>
        <tr class="cabeceraTabla">
            <th>codigo</th>
            <th>Producto</th>
            <th>Descripcion</th>
            <th>Marca</th>
             <th>Fecha Vence</th>
            <th>valor compra</th>
            <th>Valor venta</th>
            <th>Proveedor</th>
             <th>Fecha ingreso</th>
            <th>Stock</th>
            <th>Categoria</th>
            <th>% Venta</th>
            <th>Tipo venta</th>
           <th>Opciones</th>
        </tr>
        </thead>
        <?php 
                
        foreach ($array as $key => $value) {
           
        ?>
        <tr class="cuerpoTabla">
            <td>
                <?php echo $value["codigo"]?>
            </td>
            <td>
                <?php echo $value["prodNombre"]?>
            </td>
            <td>
                <?php echo $value["prodDescripcion"]?>
            </td>
            <td>
                <?php echo $value["prodMarca"]?>
            </td>
             <td>
                <?php echo $value["prodVencimiento"]?>
            </td>
            <td>
                <?php echo $value["prodValorCompra"]?>
            </td>
            <td>
                <?php echo $value["prodValorVenta"]?>
            </td>
            <td>
                <?php echo $value["prodProveedor"]?>
            </td>
            <td>
                <?php echo $value["prodFechaIngreso"]?>
            </td>
            <td>
                <?php echo $value["prodStock"]?>
            </td>
             <td>
                <?php echo $value["categoria"]?>
            </td>
            <td>
                <?php echo $value["porcentajeVenta"]?>
            </td>
            <td>
                <?php echo $value["tipoVenta"]?>
            </td>
            <td>
                <a href="<?php echo URL.'Producto/editar/'.$value["codigo"]?>">Editar</a>
                <a href="<?php echo URL.'Producto/eliminar/'.$value["codigo"]?>">Eliminar</a>
            </td>
        </tr>
        <?php }?> 
    </table>
        </div>
</div>

<script>
    $(document).ready(function() {
        document.title = 'Productos | SalesCapture';
        $('#productos').DataTable({
            "lengthMenu": [ 9]
        }); 
        
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");


</script>

