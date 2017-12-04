<?php require_once('AccesoBD.php'); 


class  Usuario
{
	private $db;

	function __construct()
	{
		$this->db = new AccesoBD();
	}

	public function Login($usuario, $password)
	{
		try{
			$query = "SELECT * FROM cliente 
				WHERE usuario = '$usuario' AND password = '$password'";	
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

	public function RegistrarUsuario($usuario,$password,$email)
	{
		$verificar = "SELECT * FROM cliente 
						WHERE usuario = '$usuario' AND password = '$password' AND email = '$email'";				
		$query = "INSERT INTO cliente(usuario, password, email) 
					VALUES('$usuario', '$password', '$email')";		
		try{
			$verificar = $this->db->Consultar($verificar);
			if (count($verificar2)>0) {
				return 0;
			}else{
				return $this->db->Insertar($query);
			}
		}catch(Exception $e){
			$mensaje = "Fecha: ". date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"../log/tienda.log");			
			throw $e;
		}	
	}
 }

 ?>