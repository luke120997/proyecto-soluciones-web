<?php session_start();

/*guardo el id del producto enviado por POST en la variable $id_product*/
$id_product = $_POST['id_product_delete'];
$flag = 0;
$bool_delete = false;
if (!empty($id_product)){

	/*guardo mi variable de session en un arreglo temporal '$array_temp'*/
	$array_temp = $_SESSION['carrito'];
	for($i=0;$i<count($array_temp);$i++){
		if ($array_temp[$i]['id'] == $id_product){
			$flag = $i;
			$bool_delete = true;
		}
	}
	if ($bool_delete) {
		unset($_SESSION['carrito'][$flag]);
		$_SESSION['carrito'] = array_values($_SESSION['carrito']);
		echo "A";
	}else{
		echo "B";
	}
}else{
	echo "C";
}

/*A: eliminado, B: no se encontro producto, C: error al enviar el codigo para eliminar prod */

?>
