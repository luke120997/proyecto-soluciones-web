<?php 
session_start();
$luis = " ";
#var_dump($_SESSION['usuario']);
#var_dump($_SESSION['password']);

#echo $_SERVER['HTTP_HOST'];
#echo "<br>";
#echo $_SERVER['REQUEST_URI'];
/*$cadena = "me gusta el culo / de mabell :3";
$recuperar = explode('/', $cadena);
var_dump($recuperar); 
echo "<br>";
echo $recuperar[0];
echo "<br>";
echo $recuperar[1];
echo "<br>"; */
if (empty($luis)) {
	echo 'vacio';
}else{
	echo "tiene algo";
}
echo "<br>";
var_dump($_SESSION['carrito']);
echo "<br>";
var_dump($_SESSION['id_usuario']);
#var_dump(localtime());
echo "<br>";
var_dump(date('d-m-Y'));
#echo localtime()[1];
 ?>