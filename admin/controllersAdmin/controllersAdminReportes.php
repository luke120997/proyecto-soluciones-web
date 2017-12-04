<?php  require_once('../models/Reportes.php');

$obj = new Reportes();		

function mes($mes)
{
	$name_month = '';
	if($mes == 1) {
		$name_month = 'ENERO';
	}else if($mes == 2){
		$name_month = 'FEBRERO';
	}else if($mes == 3){
		$name_month = 'MARZO';
	}else if($mes == 4){
		$name_month = 'ABRIL';
	}else if($mes == 5){
		$name_month = 'MAYO';
	}else if($mes == 6){
		$name_month = 'JUNIO';
	}else if($mes == 7){
		$name_month = 'JULIO';
	}else if($mes == 8){
		$name_month = 'AGOSTO';
	}else if($mes == 9){
		$name_month = 'SETIEMBRE';
	}else if($mes == 10){
		$name_month = 'OCTUBRE';
	}else if($mes == 11){
		$name_month = 'NOVIEMBRE';
	}else if($mes == 12){
		$name_month = 'DICIEMBRE';
	}else{
		$name_month = 'ERROR';
	}
	return $name_month;
}

?>


