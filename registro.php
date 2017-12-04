<?php 

/*$usuario = $_POST['usuario-registro'];
$password = $_POST['password-registro'];*/
 ?>

 <html>
<head>
<meta charset="utf-8">
	<title>Proyecto I</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main6.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</head>
 <body>
 	<main class="containe content-registro">
 		<figure>
 			<a href="index.php">
 				<img src="images/logo.png" class="img-responsive">
 			</a>
 		</figure>

 		<form action="controllers/registroUsuario.php" method="POST">
 			<h4>Formulario de registro</h4>

		 	<div class="form-group">
		 		<input type="text" name="nombre"" placeholder="Ingrese su nombre" autofocus="true" required>
			</div><br>
			<div class="form-group">
			 	<input type="email" name="email" placeholder="Ingrese su email" required>
			</div><br>
			<div class="form-group">
			 	<input type="password" name="password" placeholder="Ingese su contraseña" required>
			</div><br>
			<div class="form-group">
			 	<input type="password" name="password2" placeholder="Confirme su contraseña" required>
			</div><br>
			<div class="form-group btn-registrar">
			 	<input type="submit" value="Enviar">
			</div>

 		</form>
 	</main>

 </body>
 <?php if(isset($_REQUEST['register'])) { ?>
 <script type="text/javascript">
 	window.alert('las contraseñas no coinciden >:v');
 </script>
 <?php } ?>
 </html>