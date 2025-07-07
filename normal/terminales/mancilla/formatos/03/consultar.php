<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<title>Consulta Consecutivo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<style type="text/css">
  body  {background:url(../../../../../common/imagenes/primax.svg) top center; background-size:125% auto;
							color:rgba(0,0,0,1); background-color:rgba(255,255,255,1); text-align:center;
         margin-top: 0px;
          transform: scale(1);
	 transform-origin: top center;
	   -moz-transform: scale(1);
    -moz-transform-origin: top center;}
  button {color:rgba(0,0,0,1); background-color:rgba(0,255,0,0.5); width:55%; border:0px; border-radius:10px; font-family:Arlrdbd; font-size:28px}
</style>
<script>
  function cerrarVentana(){window.close();}
</script>
</head>
<body>
<?php
include ("../../conectar_db.php");
$consec = $_POST['consec'];
$consulta = "SELECT * FROM formulario".basename(dirname(__FILE__))." WHERE consecutivo=$consec AND estado!='ANULADO'";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows<=0)
	{echo "<br><br><button><br>ESE CONSECUTIVO ESTÁ<br>ANULADO ó NO EXISTE<br>EN LA BASE DE DATOS<br><br></button><script>setTimeout(cerrarVentana,2000);</script>";}
	else {while ($row = $resultado->fetch_assoc()) {extract($row); include 'formato_consultado.php';}}
?>
</body>
</html>
