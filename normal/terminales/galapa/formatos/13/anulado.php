<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<script>
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana(){window.close();}
</script>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include('../../conectar_db.php');
if (isset($_REQUEST['anulado'])) {
$consecutivo = $_REQUEST['consecutivo'];
$estado = $_REQUEST['estado'];
$query = "UPDATE formulario".basename(dirname(__FILE__))." SET estado = '$estado' where consecutivo='$consecutivo'";
$val=mysqli_query($conexion,$query);
if (!$conexion) {die('<strong>No se conectó con el servidor por: </strong>' . mysqli_error($conexion));}
if(!$val){echo "No se ha podido modificar, el error es: " . mysqli_error($conexion);}
  else {echo "<div style='text-align:center'>";
	echo "<br><br><b>Datos del formato MODIFICADOS correctamente</b>";
	echo "<script languaje='javascript' type='text/javascript'>setTimeout(cerrarVentana,2000);</script>";
	echo "</div>";}
}
?>
