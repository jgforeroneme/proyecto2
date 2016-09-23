

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