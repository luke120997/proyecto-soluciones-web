<?php session_start(); 
require_once('../models/Usuario.php');

$objUsuario = new Usuario();
$usuario = $_POST['usuario-login'];
$password = $_POST['password-login'];
$current_url = $_POST['current_url'];
$array_url = explode('/', $current_url);
$location = $array_url[2];
$reg = $objUsuario->Login($usuario, $password);

/*if (empty($usuario) || empty($password)){
	header('location: ../index.php?validation=null');
}else{ */
	if(count($reg) > 0){
		$_SESSION['usuario'] = $reg[0]['usuario'];
		$_SESSION['password'] = $reg[0]['password'];
		$_SESSION['id_usuario'] = $reg[0]['id'];
		$_SESSION['validation'] = true;
		if ($_SESSION['usuario'] == 'admin') {
			header('location: ../admin/index.php');
		}else{
			header('location: ../' . $location);
		}
	}else{
		header('location: ../' . $location);
		$_SESSION['validation'] = false;
	}
//}	
 ?>