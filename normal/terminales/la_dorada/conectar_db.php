<?php
$terminal = basename(dirname(__FILE__));
	$dbhost = 'localhost';
	$dbname = 'soluci15_primax_' . $terminal;
	$dbuser = 'soluci15_luiscgraciap';
	$dbpass = 'aFFe.,0698';

$conexion = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if (!$conexion) {die('<strong>No se pudo conectar a la base de datos en XAMPP por: </strong>' . $mysqli_error());}
//	else {echo 'Se conectó a la base de datos en XAMPP.';} 		// esta línea no es necesaria, se pone solo por información y control.
?>
