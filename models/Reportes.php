<?php require_once('AccesoBD.php');

class Reportes
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

	public function ventasDia($fecha)
	{}

	public function ventasMes($mes)
	{
		$query = "SELECT SUM(compra_detalle.precio*compra_detalle.cantidad) AS total, 
							compra.fecha AS fecha
					FROM compra_detalle, compra, producto
					WHERE MONTH(compra.fecha) = '$mes' AND compra_detalle.id_compra = compra.id 
					AND compra_detalle.id_producto = producto.id
                    GROUP BY DAY(compra.fecha)";
		$resultado = array();										
		foreach ($this->db->Consultar($query) as $value){
			$resultado[] = $value;
		}
		return $resultado;										
	}

	public function ventasAnio($anio)
	{
		$query = "SELECT MONTH(compra.fecha) as mes, SUM(compra_detalle.precio*compra_detalle.cantidad) as total_mes
				FROM compra_detalle, compra, producto
				WHERE YEAR(compra.fecha) = '$anio' and compra_detalle.id_producto = producto.id and 
					compra_detalle.id_compra = compra.id
				GROUP BY MONTH(compra.fecha)";
		$resultado = array();		
		foreach ($this->db->Consultar($query) as $value){
			$resultado[] = $value;
		}
		return $resultado;		
	}
}	

/*$obj = new Reportes();
var_dump($obj->ventasMes('08'));
echo "<br>";
echo "........................................................................................";
echo "<br>";
foreach ($obj->ventasMes('08') as $value) {
		var_dump($value);
		echo "<br>";
		echo "------------------------------------------------";
		echo "<br>"; */	

?>	