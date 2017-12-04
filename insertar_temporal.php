<?php require_once 'models/Producto.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>archivo temporal</title>
</head>
<body>
<form action="insertar_temporal.php" method="get">	
	nombre: <input type="text" name="nombre"><br>
	descripcion: <input type="text" name="descripcion"><br>
	image: <input type="text" name="image"><br>
	precio:  <input type="number" name="precio"><br>
	id_categoria:  <input type="numbre" name="id_categoria"><br>
	id_sexo: <input type="number" name="id_sexo"><br>
	<input type="submit">
</body>
</html>

<?php 
if (isset($_REQUEST['nombre'])) {
	$obj = new Producto();
	echo $obj->registrarProducto($_REQUEST['nombre'],$_REQUEST['descripcion'],
				$_REQUEST['image'],$_REQUEST['precio'],$_REQUEST['id_categoria'],$_REQUEST['id_sexo']);
}

 ?>