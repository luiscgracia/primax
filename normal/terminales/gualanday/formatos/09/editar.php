<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<title>Editar / Modificar un consecutivo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<style type="text/css">
	body	{			background:url(../../../../../common/imagenes/primax_fondo_div.svg) top center;
				 background-size:125% auto;
				 					 color:rgba(0,0,0,1);
				background-color:rgba(255,255,255,1);
							text-align:center;
							margin-top: 0px;
							 transform: scale(1.0);
				transform-origin: top center;
					-moz-transform: scale(1.0);
	 -moz-transform-origin: top center;}
	button {color:rgba(0,0,0,1); background-color:rgba(0,255,0,0.5); width:37.5%; height:47px; border:0px; border-radius:10px; font-family:Arlrdbd; font-size:19px}
	@media only screen and (max-width:985px) {button	{font-size:48px; width:85%; height:350px; background-color:rgba(0,255,0,0.5)}}
</style>
<script type="text/javascript">
function closed() {window.open('','_parent',''); window.close();}
function cerrarVentana(){window.close();}
</script>
</head>
<body>
<?php
include ("../../conectar_db.php");
$consec = $_POST['consec'];
$consulta = "SELECT * FROM formulario".basename(dirname(__FILE__))." WHERE consecutivo=$consec AND estado!='ANULADO'";
$resultado = $conexion->query($consulta) or die("<br>Formato ANULADO<script>setTimeout(cerrarVentana,5000);</script>");
if($row=$resultado->fetch_array()){
	echo "<form action='modificar.php' method='post'>";
					include ('editar_datos.php');
	echo "</form>";}
	else {
	echo "<br><br><button><br>ESE CONSECUTIVO<br>NO EXISTE ó ESTÁ ANULADO<br>EN LA BASE DE DATOS</button><script>setTimeout(cerrarVentana,5000);</script>";}
?>
</body>
</html>
