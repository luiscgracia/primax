<?php
$users = "SELECT * FROM usuarios WHERE terminal='$terminal'";
$result = $conexion_usuario->query($users);
$numero_usuarios = $result->num_rows;
if ($result->num_rows > 0) {while ($user = $result->fetch_array()) {$usuario[] = $user['usuario'];}}
$conexion_usuario->close();
?>
