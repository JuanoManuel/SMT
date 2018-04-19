<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SMT</title>
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> <!--letra del encabezado-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Iconos de google-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="panel">
		<form action="login.php" method="POST" class="text-center" onsubmit="return funcion()">
				<div class="text-center mt-3">
					<img src="img/marktac-sello.gif" alt="" height="200px" width="200px">
				</div>
				<h3 class="text-center">Bienvenido PHP</h3>
				<h5 class="text-center">Inicia sesión en el sistema</h5>
				<div class="form-group">
					<div class="input-group mt-3">
						<div class="input-group-addon"><i class="material-icons">account_circle</i></div>
						<input type="text" name="Usuario" class="form-control" id="usuario"  placeholder="Usuario">
					</div>
					<p class="text-danger text-left" id="erroru"></p>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon"><i class="material-icons">lock</i></div>
						<input type="password" name="Contra" class="form-control" id="contra"  placeholder="Contraseña">
					</div>
					<p class="text-danger text-left" id="errorc"></p>
				</div>
				<div id="msgError">
					<?php 
					if(isset($_SESSION["login-status"])){
						if ($_SESSION["login-status"]=="error-conexion") {
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
									<strong>¡Aviso!</strong> Error en el servicio, intentelo más tarde.
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									</button>
								</div>";
						}
						if ($_SESSION["login-status"]=="error-autentication") {
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
									<strong>¡Aviso!</strong> Usuario y contraseña no válido.
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
									</button>
								</div>";
						}
						unset($_SESSION["login-status"]);
					}

					 ?>
				</div>
				<div class="form-group">
					<button class="btn colorMT">Entrar</button>
				</div>
				<div class="form-group my-0">
					<a href="#" class="btn btn-link colorMTL" role="button">Recuperar Contraseña</a>
				</div>
			</form>
	</div>
	<div id="particles-js"></div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validacion.js"></script>
	<script src="js/particles.js"></script>
	<script src="js/app.js"></script>
</body>
</html>