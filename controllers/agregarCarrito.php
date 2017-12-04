<?php session_start();
require_once '../models/Producto.php';

$producto1 = new Producto();
$id = $_POST['id_producto'];
$cantidad_producto = $_POST['cantidad_producto'];
$producto = $producto1->buscarID($id);

/*con isset verifico si mi variable de sesion existe*/
if (isset($_SESSION['carrito'])) {
	/*luego verifico que la cantidad que de producto que estoy recibiendo sea mayor que 0*/
	if ($cantidad_producto > 0) {
		/*luego guardo mi variable en un array temporal ('$array_temp')*/
		$array_carrito_temp = $_SESSION['carrito'];
		$aumentar_cantidad = false;
		$numero = 0;
		/*recorro mi variable temporal para ver que el id que he recibo exista en mi carrito para actualizar 
		su cantidad o en otro caso agregarlo ya que no existe*/
		for($i=0;$i<count($_SESSION['carrito']);$i++) {
			/*verifica si ya existe el producto con el id recibido en mi variable $array_temp que mi variable
			de session 'carrito'*/
			if ($_SESSION['carrito'][$i]['id'] == $id) {
				$aumentar_cantidad = true;
				$numero = $i;
			}
		}

		/*si en contro el id quiere decir que se tiene que actualizar la cantidad de ese producto*/
		if ($aumentar_cantidad) {
			/*actulizamos la cantidad del producto y la sumamos a la cantidad que ya teniamos*/
			$array_carrito_temp[$numero]['cantidad'] = $array_carrito_temp[$numero]['cantidad']+ $cantidad_producto;
			$_SESSION['carrito'] = $array_carrito_temp;
			echo "B/". $id;
			/*si no entro en la setencia if entonces eso quiere decir que no encontro el id, entonces es un nuevo
			producto y tenemos que agregarlo a nuestra variable de sessin 'carrito'*/
		}else{
			$agregar_nuevo = array('id'=>$producto['id'], 'descripcion'=>$producto['descripcion'], 'precio'=>$producto['precio'], 'nombre'=>$producto['nombre'], 'image'=>$producto['image'], 'cantidad'=>$cantidad_producto);
			 /*creamos un nuevo producto y lo agregamos a la variable de session 'carrito' con array_push() y este metodo
			 lo inserta al final de nuestra variable de session 'carrito'*/
			array_push($_SESSION['carrito'], $agregar_nuevo);
		 	echo "A/" . $id;
		}
	}else{
		/*cuando la cantidad que le ha enviado el cliente es menor que cero*/
		echo "C/".'fuck';
	}
/*se entra aqui cuando la variable de session 'carrito' no existe*/	
}else{
	/*verificamos si la cantidad enviada por el cliente sea mayor que cero para agregar el producto*/
	if ($cantidad_producto > 0) {
		/*creamos la variable de session carrito*/
		$_SESSION['carrito'] = array();
		/*guardamos los datos del producto que vamos a insertar*/
		$agregar_primera_vez = array('id'=>$producto['id'], 'descripcion'=>$producto['descripcion'],
		'precio'=>$producto['precio'], 'nombre'=>$producto['nombre'], 'image'=>$producto['image'], 'cantidad'=>$cantidad_producto);
		/*con array_push() agregamos el producto a la variable de session 'carrito'*/
		array_push($_SESSION['carrito'], $agregar_primera_vez);
		echo "A/" . $id;
	}else{
		echo "C/".'fuck';
	}
}
 ?>