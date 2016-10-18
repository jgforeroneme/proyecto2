

/*validando los campos usuario y contraseña*/
$().ready(function(){
	$("#Session").validate({
		rules:{
			user: {
				required:true
			},
			password: {
				required:true,
				minlength:6
			}
		},
		messages :{
			user: {
				required: "<center><td colspan='2'><font color='red'>por favor, escriba su nombre de usuario</font></td></center>"
			},
			password: {
				required: "<center><td colspan='2'><font color='red'>por favor, escriba su contraseña</font></td></center>"
			}
		}
	});

	$("#frm_buscar_emp").validate({
		rules:{
			buscar_emp: {
				required:true
			}
		},
		messages :{
			buscar_emp: {
				required: "<center><td colspan='2'><font color='red'>por favor, digite documento del empleado</font></td></center>"
		    }
	    }
	});

	$("#Registrar").validate({
		rules:{
			doc: {
				required:true
			},
			user: {
				required:true,
				
			},
			password: {
				required:true
			},
			perfil: {
				required:true,
		        }			
		},
		messages :{
			doc: {
				required: "<center><td colspan='2'><font color='red'>por favor, digite documento del empleado</font></td></center>"
			},
			user: {
				required: "<center><td colspan='2'><font color='red'>por favor, digite nombre de usuario</font></td></center>"
			},
			
			password: {
				required: "<center><td colspan='2'><font color='red'>por favor, digite contraseña de usuario</font></td></center>"
				
			},
			perfil: {
				required:"<center><td colspan='2'><font color='red'>por favor, digite perfil</font></td></center>"
			}
		}
	});
  $("#doc").focus();
});
function existeEmpleado(){
     $('button[name=registrar]').hide();
      $(".modal").fadeIn();
                                  $(".cerrar").click(function(){
                                      $(".modal").fadeOut(300);
                                   });
}
function emptyEmpleado(){
      $('label[name=titulo]').text("Registrar Empleado");
      $('button[name=editar]').hide();
      $('button[name=eliminar]').hide();
      $(".modal").fadeIn();
        $(".cerrar").click(function(){
                                      $(".modal").fadeOut(300);
                                   });
}

function emptyCliente(){
      $('label[name=titulo]').text("Registrar Cliente");
      $('button[name=editar]').hide();
      $('button[name=eliminar]').hide();
      $(".modal").fadeIn();
        $(".cerrar").click(function(){
                                      $(".modal").fadeOut(300);
                                   });
}

function emptyEmpleado(){
      $('label[name=titulo]').text("Registrar Empleado");
      $('button[name=editar]').hide();
      $('button[name=eliminar]').hide();
      $(".modal").fadeIn();
        $(".cerrar").click(function(){
                                      $(".modal").fadeOut(300);
                                   });
}


function buscarProducto(){
 
      $(".modal").fadeIn();
      $(".cerrar").click(function(){
        $(".modal").fadeOut(300);
     });
       $('#prod').DataTable({
        
            "lengthMenu": [ 10],
           sPaginationType:"simple",
           "destroy": true
        });
      
}
  
function calcular(){
     var unidad = 0;
     var porcentaje=0;
     var precio =0;
 if($("#valCompra") == '' && $("#porVenta")== ''){
      $("#valVenta").val(precio);
 }else{
     unidad=$("#valCompra").val();
     porcentaje=$("#porVenta").val();
     porcentaje=1-(porcentaje/100);
     precio=unidad/porcentaje;
          $("#valVenta").val(precio);
      }  
}

            function fn_agregar(){
              //  alert();
                var uni= $("#valUni").val();
                var cant=$("#cantidad").val();
                var desc=$("#desc").val();
                var iva=$("#iva").val();
                var subtotal=uni*cant;
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#codigo").val() + "</td>";
                cadena = cadena + "<td>" + $("#descripcion").val() + "</td>";
                cadena = cadena + "<td>" + $("#valUni").val() + "</td>";
                cadena = cadena + "<td>" + $("#cantidad").val() + "</td>";
                cadena = cadena + "<td>" + subtotal + "</td>";
                cadena = cadena + "<td><a class='elimina'><img src='delete.png' /></a></td>";
                $("#tblFacDetalle tbody").append(cadena);
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
                fn_neto();
              fn_limpiar();
             
                fn_dar_eliminar();
				fn_cantidad();
                //alert("Usuario agregado");
            };
 function fn_limpiar(){
     $("#producto").val("");
     $("#codigo").val(" ");
     $("#descripcion").val(" ");
     $("#valUni").val(" ");
     $("#cantidad").val(" ");
     $("#producto").focus();       
};

 function fn_neto(){
      var total=0;
 
//selector >>  $("#GridView1 tr").find('td:eq(1)')
//De esta manera utilizando eq seleccionamos la segunda fila, ya que la primera es 0
$("#tblFacDetalle tr").find('td:eq(4)').each(function () {
 
 //obtenemos el valor de la celda
  valor = $(this).html();
 
 //sumamos, recordar parsear, si no se concatenara.
 total += parseInt(valor)
})
 
//mostramos el total

$("#neto").val(total);

fn_total();
};
  
function fn_total(){
    var neto=$("#neto").val();
    $("#desc").val(0);
    $("#iva").val(0);
    if($("#desc").val()==0 && $("#iva").val()==0){
        $("#total").val(neto);
    }else{
        var desc=$("#desc").val();
        var iva=$("#iva").val();
        
        /*calcular total con descuento e iva*/
        var total=neto-neto*(desc/100);
        var total=neto-neto*(iva/100);
    }
}  