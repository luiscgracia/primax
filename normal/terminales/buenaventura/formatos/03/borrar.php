<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<title>Borrar un consecutivo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<style type="text/css">
  body	{color:rgba(0,0,0,1); background-color:rgba(255,255,255,1); background:url(../../../../../common/imagenes/primax1.svg) no-repeat center center; background-size:auto 100%;
				 opacity:1.0; text-align:center}
  button{color:rgba(0,0,0,1); background-color:rgba(0,255,0,0.5); width:55%; height:70px; border:0px; border-radius:10px; font-family:Arlrdbd; font-size:28px}
</style>
</head>
<body onLoad="setTimeout(window.close, 2000)">
<?php
include ("../../conectar_db.php");
$consec = $_POST['consec'];
$consulta="SELECT * FROM formulario".basename(dirname(__FILE__))." WHERE consecutivo=$consec";
$resultado=mysqli_query($conexion,$consulta) or die (mysql_error());
if (mysqli_num_rows($resultado)>0){
	$query = "DELETE FROM formulario".basename(dirname(__FILE__))." WHERE consecutivo=$consec";
	$result = mysqli_query($conexion,$query);
	echo "<br>";
	echo "<div style='text-align:center'><br><br><button>CONSECUTIVO BORRADO</button></div>";}
  else {
	echo "<br>";
	echo "<div style='text-align:center'><br><br><button>ESE CONSECUTIVO NO EXISTE EN LA BASE DE DATOS</button></div>";}
?>
</body>
</html>
