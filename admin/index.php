<?php session_start(); 
if ($_SESSION['usuario'] != 'admin') {
	header('location: ../index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMINISTRADOR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'librerias.php'; ?>
</head>
<body>
<div class="form-group">  
<?php include 'nav.php'; ?>
<div>
<div class="form-group">

</div> 

</body>
</html>