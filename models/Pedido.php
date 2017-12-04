<?php require_once('AccesoBD.php');

class Pedido
{
	private $db;
		
	function __construct()
	{
		try{
			$this->db = new AccesoBD();
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Errpor: ".$e->getMessage()."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	public function grabarCompraDetalle($precio, $cantidad, $id_producto, $id_compra)
	{
		try{
			$query = "INSERT INTO compra_detalle(precio, cantidad, id_producto, id_compra) 
							VALUES('$precio','$cantidad','$id_producto','$id_compra')";
			return $this->db->Insertar($query);
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Errpor: ".$e->getMessage()."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	public function grabarCompra($fecha, $id_cliente)
	{
		try{
			$query = "INSERT INTO compra(fecha, id_cliente) VALUES('$fecha', '$id_cliente')";
			return $this->db->Insertar($query);
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Errpor: ".$e->getMessage()."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}	
	}
}

 ?>