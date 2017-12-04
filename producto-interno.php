<?php session_start();
require_once('controllers/controllersProducto.php');
$id_producto = $_GET['id'];
$producto_ver = $producto->buscarID($id_producto);
 ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Producto Interno</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main6.css">
		<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
	</head>
	<body>
		<?php include 'nav.php'; ?>

		<section class="mgt-40 row">
			<h1 class="txt-title text-center">HOMBRES</h1>
			<aside class="menu-aside col-sm-3">
				<ul>
					<li class="li-header">CATEGORÍAS DE PRODUCTOS</li>
					<li>
						<!--<a href="#" id="it-pol">-->
							<form action="productos-hombre.php" method="GET">
								<input type="hidden" value="1" name="id_categoria">
								<input type="submit" value="CASACAS">
							</form>
						<!--</a>-->
					</li>
					<li>
						<!--<a href="#" id="it-pol">-->
							<form action="productos-hombre.php" method="GET">
								<input type="submit" value="POLOS">
								<input type="hidden" value="3" name="id_categoria">
							</form>
						<!--</a>-->
					</li>
					<li>
						<!--<a href="#" id="it-pol">-->
							<form action="productos-hombre.php" method="GET">
								<input type="submit" value="CAMISAS">
								<input type="hidden" value="4" name="id_categoria">
							</form>
						<!--</a>-->
					</li>
					<li class="last-border">
						<!--<a href="#" id="it-pol">-->
							<form action="productos-hombre.php" method="GET">
								<input type="submit" value="PANTALONES">
								<input type="hidden" value="2" name="id_categoria">
							</form>
						<!--</a>-->
					</li>
				</ul>
			</aside>

			<div class="producto-interno col-sm-8">
				<div class="content-interno">
					<figure>
						<img src="<?php echo $producto_ver['image']; ?>">
					</figure>
					<div class="interno-desc">
						<p class="precio"><b>£ <?php echo $producto_ver['precio']; ?>.</b></p>
						<span><b><?php echo $producto_ver['nombre']; ?></b></span>
						<p class="mgt-25"><?php echo $producto_ver['descripcion']; ?>. </p>
						<input type="hidden" value="<?php echo $producto_ver['id'] ?>" class="id-anadir">
						<div class="form-group">
							<label>Cantidad:</label><br>
							<input type="number" min="0" max="10" maxlength="1" class="cantidad-producto" placeholder="0">
						</div>
						<div class="btn-interno">
							<button id="anadir-carrito">
								<h5> Añadir a carrito</h5>
							</button>											
						</div>
					</div>
				</div>
			</div>		
	</section>
	<?php include 'footer.php'; ?>		
</body>
<?php include 'callResourcesJS.php'; ?>
<script type="text/javascript">

	$('#anadir-carrito').click(function(){
		var id_producto  = $('.id-anadir').val();
		var cantidad_producto = $('.cantidad-producto').val();
		$.ajax({
			url: 'controllers/agregarCarrito.php',
		    type: 'POST',
		    data: {'id_producto' : id_producto, 'cantidad_producto': cantidad_producto},
		    success: function(res){
		    	var array = res.split('/');
		    	var mensaje = array[0];
		    	var id_producto = array[1];
		    	if(mensaje == 'A') {
		    		window.alert("se añadio producto");
		    		window.location.href = 'producto-interno.php?id='+id_producto;
		    	}else if(mensaje == 'B'){
		    		window.alert("se actualizo cantidad de producto");
		    		window.location.href = 'producto-interno.php?id='+id_producto;
		    	}else if(mensaje == 'C'){
		    		window.alert("ingrese una cantidad valida para el producto >:v");
		    	}else if(mensaje== 'D'){
		    		window.alert('surgio un error por el codigo de nuestro programador, disculpes las molestias');
		    		window.location.href = 'error.php';
		    	}else{
		    		window.alert("no se que chucha pasa con mi codigo"+res);
		    	}
		    }
		});
	}); 

	/* A: se añadio uno nuevo, B: se actualizo cantidad, C: error de ingreso de cantidad, D: error de mi :( xDDD */
</script>
</html>