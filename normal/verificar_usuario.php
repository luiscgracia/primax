
<html lang=es>
<head>
<title>VERIFICAR USUARIO PRIMAX</title>
<link rel="SHORTCUT ICON" href="../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" href="../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<style>
body	{background:url(../common/imagenes/primax.svg) no-repeat center center; background-size:auto 100%}
</style>
<script>
function cerrarVentana_x_usuario(){window.close();}
</script>
</head>
<? $tiempo_cierre_pestana_verificar = 1; ?>		<!-- tiempo en minutos -->
<body onLoad="setTimeout('window.close()',<?=$tiempo_cierre_pestana_verificar * 60 * 1000;?>)">
<?
date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d / H:i");
include ("../common/conectar_db_usuarios.php");
include ('../common/datos.php');
$usuario  = $_POST['usuario'];
$clave    = $_POST['clave'];
$terminal = $_POST['terminal'];
$consulta_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave' AND terminal='$terminal'";
$resultado_usuario = $conexion_usuario->query($consulta_usuario) or die($conexion_usuario->error);

if ($resultado_usuario->num_rows<=0)
	{echo "	<table style='width:100%; height:100%; background-color:none'>
						<tr>
							<td style='text-align:center; vertical-align:middle; font-size:80px'>
								<b>VERIFIQUE USUARIO y/o CLAVE</b>
								<script>setTimeout(cerrarVentana_x_usuario,3000);</script>
							</td>
						</tr>
					</table>";}
	  else {while ($este_usuario = $resultado_usuario->fetch_assoc()) {extract($este_usuario); include ("permisos.php");}}
?>
</body>
</html>
