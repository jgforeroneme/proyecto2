<script>
    $(document).ready(function() {
        document.title = 'buscar producto | SalesCapture';
        buscarProducto();
    });    
$("li").removeClass("hide");
$('li[name=login]').addClass("hide");
$('li[name=sigin]').addClass("hide");
</script>
<!-- Modal -->
<div class="modal" data-backdrop="static" >
    <div class="ventana" id="ventanaProducto2">
        <div class="modal-content" >
	   <form  name="formulario" id="formulario" method="POST">
             <table class="dataTable " id="prod">
        <thead>
        <tr class="cabeceraTabla">
            <th>codigo</th>
             <th>Producto</th>
            <th>Descripcion</th>
            <th>Marca</th>
            <th>Fecha Vence</th>
            <th>Valor venta</th>
            <th>Stock</th>
            <th>Agregar</th>
        </tr>
        </thead>
        <?php 
                
      foreach ($array as $key => $value) {
           
        ?>
        <tr class="cuerpoTabla">
            <td>
                <input type="text" name="proCodigo" id="proCodigo" value="<?php echo $value["codigo"]?>">
            </td>
            <td>
                <?php echo $value["prodNombre"]?>
            </td>
            <td>
                <input type="text" name="proDescripcion" id="proDescripcion" value="<?php echo $value["prodDescripcion"]?>">
            </td>
            <td>
                <?php echo $value["prodMarca"]?>
            </td>
             <td>
                <?php echo $value["prodVencimiento"]?>
            </td>
           
            <td>
                <input type="text" name="proValUni" id="proValUni" value="<?php echo $value["prodValorVenta"]?>"> 
            </td>
           

            <td>
                <?php echo $value["prodStock"]?>
            </td>
            
            <td>
                <button type="button" id="agregarProd" class="btn btn-default">Agregar</button>
            </td>
        </tr>
        <?php }?> 
    </table>
          </form>	
	</div>
        <div>
        <span class="cerrar">x</span>
        </div>
    </div>
</div>
<script>
   
  
  $("#agregarProd").click(function(){
       var cod = $('form[name=formulario] input[name=proCodigo]' )[0].value;
    document.location = "<?php echo URL; ?>Ventas/agregarProd/"+cod;
       return false;          
  });
  
 
 </script>

