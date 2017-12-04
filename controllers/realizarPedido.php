<?php session_start();
require_once('../models/Pedido.php'); 

$id_cliente = $_SESSION['id_usuario'];
$objPedido = new Pedido();
$date_current = date('Y-m-d');
$id_compra = $objPedido->grabarCompra($date_current, $id_cliente);
if ($id_compra > 0) {
	foreach ($_SESSION['carrito'] as $value) {
		$objPedido->grabarCompraDetalle($value['precio'], $value['cantidad'],
					$value['id'], $id_compra);
	}
	echo "true";
}else{
	echo "null";
}
?>