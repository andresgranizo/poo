<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body class="cover" style="background-image: url(./assets/img/back.jpg);">


	<form action="session.php" method="post" autocomplete="off" class="full-box logInForm">
	<p class="text-center text-muted"><i class=""></i></p>

		<div  id="contenedor" >
							<center> <img src="assets/img/1.png" ></center>

					</div>

      <!--<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>-->
		<div class="form-group label-floating">
		  <label class="control-label" >Usuario</label>


            <?php
            
        
            
                    //$cedula=
				   
					
			

							if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
							{
							echo "<h5><div style='color:red'><center>Usuario o contraseña invalido </center></div></h5>";
							}
							?>

		  <input  type="text "class="form-control" name="usuario"  required>
		  <p class="help-block">Escribe tú usuario</p>
		  
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input type="password"  class="form-control" name="clave"  required>
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>
	</form>

	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
