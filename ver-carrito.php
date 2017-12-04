<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main6.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</head>
<body>

	<?php include 'nav.php'; ?>
	<section class="content-view-car container">
	<div class="continuar-compra">
		<h1 class="">
			<?php if (isset($_SESSION['usuario'])) {
				echo  $_SESSION['usuario'] . " puedes ";
			?>
			<a href="index.php">seguir comprando</a>
			<?php }else{ ?>
			<a href="index.php">seguir comprando</a>
			<?php } ?>
		</h1>	
	</div>
	<div id="view-cart" class="form-group">
		<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>0){ ?>
		<ul id="list-products-cart">
			<?php foreach ($_SESSION['carrito'] as $value){ ?>
			<li class="cart-products col-sm-6">
				<img src="<?php echo $value['image'] ?>" width="200px" heigth="200px">
				<div class="details-prod-cart">
					<p><strong><?php echo $value['nombre']; ?></strong></p>
					<p><?php echo $value['precio']; ?></p>
					<p><?php echo $value['cantidad']; ?></p>
					<button class="delete-product" alt="<?php echo $value['id'];?>">Eliminar</button>
					<input type="hidden" class="id-product-delete" value="<?php echo $value['id'];?>">
				</div>
			</li>
			<?php } ?>
		</ul>
		<hr class="col-sm-12">
		<h2 class="col-sm-12">
			<?php if(isset($_SESSION['usuario'])){?>
			<button id="buy-cart">Comprar</button>  
			<?php }else{ ?>
			<h3 class="col-sm-12">Inicia sesión o regístrate para hacer el pedido</h3>
			<?php } ?>
			<button id="clear-cart">Limpiar Canasta</button>
		</h2>
		<?php }else{ ?>
		<h1 class="message-carrito">No agregó nada al carrito de compras aún :(</h1>
		<?php } ?>
	</div>
	</section>
		<?php include 'footer.php'; ?>
</body>
<?php include 'callResourcesJS.php'; ?>
<script type="text/javascript">
	
	/* Eliminar todo el carrito: */
$('#clear-cart').click(function(){
		$.ajax({
			url: 'controllers/eliminarCarrito.php',
		    type: 'POST',
		    success: function(res){
		    	if (res == 'true') {
		    		window.alert("carrito de compras limpio :), a seguir comprando xDD");
		    		window.location.href = 'index.php';
		    	}else if(res == 'null'){
		    		window.alert("seas pendejo, tu carrito de compra esta vacio");
		    	}else{
		    		window.alert("hubo un problema con el codigo" +res);
		    		window.location.href = 'error.php';
		    	}	
		    }
		});
	});

/* Eliminar un producto del carrito: */

$('.delete-product').click(function(){
		var id_product_delete = $(this).attr('alt');
		$.ajax({
			url: 'controllers/eliminarProductoCarrito.php',
		    type: 'POST',
		    data: {'id_product_delete': id_product_delete},
		    success: function(res){
		    	if (res == "A") {
		    		window.alert("el producto fue eliminado del carrito");
		    		window.location.href = 'ver-carrito.php';
		    	}else if(res == "B"){
		    		window.alert('no se pudo eliminar, recarga la pagina');
		    	}else if(res == "C"){
		    		window.alert("error de codigo :(, despidan al programador");
		    		window.location.href = 'error.php';
		    	}else{
		    		window.alert("no se que chucha pasa"+res);
		    	}
		    	//window.alert(res);
		    	/*A: eliminado, B: no se encontro el producto revisar el php, C: error al enviar el codigo revisar el scipt*/
		    }
		});
	});

	/* Hacer el pedido de los productos actuales en el carrito */
	$('#buy-cart').click(function(){
		$.ajax({
			url: 'controllers/realizarPedido.php',
			type: 'POST',
			success: function(res){
				if(res == "true"){
					window.alert("se hizo el pedido :)");
				}else{
					window.alert("ocurrio un problema :( "+ res);
				}
			}
		});
	});
</script>
</html>