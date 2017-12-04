<?php require_once("ConexionBD.php"); 


class AccesoBD
{
	private $conexion;
	
	function __construct()
	{
		try{
			$this->conexion = mysqli_connect(SERVER, USER,
							PASSWORD, DATABASE);
			if(mysqli_connect_errno()){
				throw new Exception("No se pudo conectar al Servidor: " .mysqli_connect_error($cn) );
			}
		} catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	function __destruct()
	{
		mysqli_close($this->conexion);
	}

	public function Consultar($query)
	{
		try{
			$i = 0;
			$rs = mysqli_query($this->conexion,$query);
			if(mysqli_errno($this->conexion)){ 
				throw new Exception("Error en la consulta: ". mysqli_error($this->conexion));
			}	
			$lista = array();
			while ($campo = mysqli_fetch_array($rs)){
				$lista[$i] = $campo;
				$i ++;
			}
			return $lista;
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"log/tienda.log");			
			throw $e;
		}	
	}

	public function Insertar($query)
	{
		try{
			mysqli_query($this->conexion, $query);
			$id = mysqli_insert_id($this->conexion);
			/*La función mysqli_insert_id() devuelve el ID generado por una consulta en una tabla con una columna que tenga el atributo AUTO_INCREMENT. Si la última consulta no fue una sentencia INSERT o UPDATE o si la tabla modificada no tiene una columna con el atributo AUTO_INCREMENT, está función devolverá cero.*/
			if(mysqli_errno($this->conexion)){ 
				throw new Exception("Error en la consulta: ". mysqli_error($this->conexion));
			}	
			return $id;
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:m:s")."\n".
								"Error: ".$e->getMessage()."\n".	
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	public function Eliminar($query)
	{
		try{
			/*Retorna FALSE en caso de error. Si una consulta del tipo SELECT, SHOW, DESCRIBE o EXPLAIN es exitosa, mysqli_query() retornará un objeto mysqli_result. Para otras consultas exitosas de mysqli_query() retornará TRUE.*/
			return $eliminar = mysqli_query($this->conexion, $query);
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;	
		}
	}
}

?>