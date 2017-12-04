<?php require_once("AccesoBD.php");

class Producto
{
	private $db;

	function __construct()
	{
		try{
			$this->db = new AccesoBD();
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}	
	}

	public function buscarID($id)
	{
		try{
			$query = "SELECT * FROM producto WHERE id = '$id'";
			$resultado = array();
			foreach ($this->db->Consultar($query) as $value) {
				$resultado = $value;
			}
			return $resultado;
			//return $this->db->Consultar($query);
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	public function listarPorCategoria($id_categoria, $id_sexo){
		try{
			$query = "SELECT * FROM producto 
						WHERE id_categoria = '$id_categoria' AND id_sexo = '$id_sexo'";			
			return $this->db->Consultar($query);		
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}
	}

	public function listarPorSexo($id_sexo)
	{
		try{
			$query = "SELECT * FROM producto WHERE id_sexo = '$id_sexo' LIMIT 9";
			return $this->db->Consultar($query);			
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"log/tienda.log");	#cambie de: "../"" a " "		
			throw $e;
		}
	}

	public function registrarProducto($nombre,$descripcion,$image,$precio,$id_categoria,$id_sexo)
	{
		try{
			$query = "INSERT INTO producto (nombre,descripcion,image,precio,id_categoria,id_sexo) 
								VALUES('$nombre','$descripcion','$image','$precio','$id_categoria','$id_sexo')";
			$id = $this->db->Insertar($query);
			return $id;
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$query."\n\n";
			error_log($mensaje,3,"../log/tienda.log");	#cambie de: "../"" a " "		
			throw $e;
		}					
	}

	public function buscarSexo($id)
	{
		$query = "SELECT sexo.id FROM sexo, producto 
					WHERE producto.id = '$id' AND sexo.id = producto.id_sexo";
		return $this->db->Consultar($query);			
	}
}

 ?>