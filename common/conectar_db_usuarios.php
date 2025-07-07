<?php
$dbhost = 'localhost';
$dbname = 'soluci15_primax_usuarios';
$dbuser = 'soluci15_luiscgraciap';
$dbpass = 'aFFe.,0698';

$conexion_usuario = new mysqli ($dbhost,$dbuser,$dbpass,$dbname);		// El @ que se ponde delante de la funcion 'mysqli_connect' es para que no muestre el error al momento de ejecutarse.
if (!$conexion_usuario) {die('<strong>No se pudo conectar a la base de datos en XAMPP por: </strong>' . $conexion_usuario->error);}
//  else {echo 'Se conectó a la base de datos en XAMPP.';} 		// esta línea no es necesaria, se pone solo por información y control.
?>
