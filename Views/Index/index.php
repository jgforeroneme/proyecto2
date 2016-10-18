
<div class="container">
	<div class="card card card-container">
		<h2 class="titlelogin">Acceso al sistema</h2>
        
                <img src="<?php echo URL.VIEWS.DFT;?>img/login.png" class="profile-img-card">
      
		<form class="form-signin" id="Session" name="Session" method="POST">
                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required autofocus>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
			<button type="submit" id="btnLogin" class="btn btn-signin" >Iniciar sesion</button>
		</form>
	</div>
</div>
<script>
    $(function(){
    	$("#btnLogin").click(function(){
           	 var user = $('form[name=Session] input[name=user]' )[0].value;
        	 var password= $('form[name=Session] input[name=password]' )[0].value;
             if(user=="" || password==""){

             }else{
                    $.ajax({
                        type:"POST",
                        url:"<?php echo URL; ?>Usuario/userLogin",
                        data:{user: user, password: password},
                        success: function(response){
                           
                            if(response==1){
                                document.location="<?php echo URL; ?>Principal/principal";
                            }else{

                                alert("Usuario o contraseña incorrectos");
                            }
                        }
                    });
                    return false;
             }

    	});
    });
</script>
