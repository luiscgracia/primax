<html>
<head>
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<style>
  body,html {color:rgba(40,40,40,1); background-color:rgba(255,255,255,1); text-align:center}
</style>
<script language="JavaScript">
  function cerrar_x_tiempo() {setTimeout("window.close()",5000);}
</script>
</head>
<body onLoad="cerrar_x_tiempo()" style="font-size:36px; font-family:Arlrdbd">
<?php
//se conecta a la base de datos y se verifica el consecutivo inicial (o el siguiente libre)
$formato = basename(dirname(__FILE__));
include ("../../../../../common/datos.php");
$forma = "formulario".$formato;
include ("consecutivos".$formato.".php");
include ("../../conectar_db.php");
$cons = "SELECT MAX(consecutivo) as consecutivo FROM formulario".$formato." LIMIT 1";
$consult = $conexion->query($cons);
$consulta = $consult->fetch_array(MYSQLI_ASSOC);
$consec = (empty($consulta['consecutivo']) ? $primerconsecutivo : $consulta['consecutivo']+=1);
error_reporting(E_ALL ^ E_NOTICE);

$consecutivo = $consec;
$estado = $_REQUEST['estado'];
$usuario = $_REQUEST['usuario'];
$fecha = $_REQUEST['fecha'];
$fechaA = $_REQUEST['fechaA'];
$horainicialA = $_REQUEST['horainicialA'];
$horafinalA = $_REQUEST['horafinalA'];
$certhabilit = $_REQUEST['certhabilit'];
$ubicacion = $_REQUEST['ubicacion'];
$altura = $_REQUEST['altura'];
$tipo_trabajo = $_REQUEST['tipo_trabajo'];
$descripcion = $_REQUEST['descripcion'];
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$cedula1 = $_REQUEST['cedula1'];
$cedula2 = $_REQUEST['cedula2'];
$cedula3 = $_REQUEST['cedula3'];
$cedula4 = $_REQUEST['cedula4'];
$firma1 = $_REQUEST['firma1'];
$firma2 = $_REQUEST['firma2'];
$firma3 = $_REQUEST['firma3'];
$firma4 = $_REQUEST['firma4'];
$B1 = $_REQUEST['B1'];
$B2 = $_REQUEST['B2'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$B6 = $_REQUEST['B6'];
$B7 = $_REQUEST['B7'];
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B10 = $_REQUEST['B10'];
$B11 = $_REQUEST['B11'];
$B12 = $_REQUEST['B12'];
$B13 = $_REQUEST['B13'];
$B14 = $_REQUEST['B14'];
$B15 = $_REQUEST['B15'];
$B16 = $_REQUEST['B16'];
$B17 = $_REQUEST['B17'];
$B18 = $_REQUEST['B18'];
$B19 = $_REQUEST['B19'];
$B20a = $_REQUEST['B20a'];
$B20b = $_REQUEST['B20b'];
$B21 = $_REQUEST['B21'];
$B22 = $_REQUEST['B22'];
$B23 = $_REQUEST['B23'];
$B24 = $_REQUEST['B24'];
$B25 = $_REQUEST['B25'];
$B26 = $_REQUEST['B26'];
$B27 = $_REQUEST['B27'];
$B28 = $_REQUEST['B28'];
$B29 = $_REQUEST['B29'];
$B30 = $_REQUEST['B30'];
$B31 = $_REQUEST['B31'];
$B32 = $_REQUEST['B32'];
$B33 = $_REQUEST['B33'];
$B34 = $_REQUEST['B34'];
$B35 = $_REQUEST['B35'];
$B36 = $_REQUEST['B36'];
$B37 = $_REQUEST['B37'];
$observaciones = $_REQUEST['observaciones'];
$ejecutorC = $_REQUEST['ejecutorC'];
$cedulaejecC = $_REQUEST['cedulaejecC'];
$fechaejecC = $_REQUEST['fechaejecC'];
$horaejecC = $_REQUEST['horaejecC'];
$coordinadorC = $_REQUEST['coordinadorC'];
$cedulacoordC = $_REQUEST['cedulacoordC'];
$fechacoordC = $_REQUEST['fechacoordC'];
$horacoordC = $_REQUEST['horacoordC'];
$emisorD = $_REQUEST['emisorD'];
$cedulaemisorD = $_REQUEST['cedulaemisorD'];
$fechaemisorD = $_REQUEST['fechaemisorD'];
$horaemisorD = $_REQUEST['horaemisorD'];
$cancelacion = $_REQUEST['cancelacion'];
$ejecutorE = $_REQUEST['ejecutorE'];
$cedulaejecE = $_REQUEST['cedulaejecE'];
$fechaejecE = $_REQUEST['fechaejecE'];
$horaejecE = $_REQUEST['horaejecE'];
$coordinadorE = $_REQUEST['coordinadorE'];
$cedulacoordE = $_REQUEST['cedulacoordE'];
$fechacoordE = $_REQUEST['fechacoordE'];
$horacoordE = $_REQUEST['horacoordE'];
$emisorE = $_REQUEST['emisorE'];
$cedulaemisorE = $_REQUEST['cedulaemisorE'];
$fechaemisorE = $_REQUEST['fechaemisorE'];
$horaemisorE = $_REQUEST['horaemisorE'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`, 
`estado`, 
`usuario`, 
`fecha`, 
`fechaA`, 
`horainicialA`, 
`horafinalA`, 
`certhabilit`, 
`ubicacion`, 
`altura`, 
`tipo_trabajo`, 
`descripcion`, 
`cantidad`, 
`nombre1`, 
`nombre2`, 
`nombre3`, 
`nombre4`, 
`cedula1`, 
`cedula2`, 
`cedula3`, 
`cedula4`, 
`firma1`, 
`firma2`, 
`firma3`, 
`firma4`, 
`B1`, 
`B2`, 
`B3`, 
`B4`, 
`B5`, 
`B6`, 
`B7`, 
`B8`, 
`B9`, 
`B10`, 
`B11`, 
`B12`, 
`B13`, 
`B14`, 
`B15`, 
`B16`, 
`B17`, 
`B18`, 
`B19`, 
`B20a`, 
`B20b`, 
`B21`, 
`B22`, 
`B23`, 
`B24`, 
`B25`, 
`B26`, 
`B27`, 
`B28`, 
`B29`, 
`B30`, 
`B31`, 
`B32`, 
`B33`, 
`B34`, 
`B35`, 
`B36`, 
`B37`, 
`observaciones`, 
`ejecutorC`, 
`cedulaejecC`, 
`fechaejecC`, 
`horaejecC`, 
`coordinadorC`, 
`cedulacoordC`, 
`fechacoordC`, 
`horacoordC`, 
`emisorD`, 
`cedulaemisorD`, 
`fechaemisorD`, 
`horaemisorD`, 
`cancelacion`, 
`ejecutorE`, 
`cedulaejecE`, 
`fechaejecE`, 
`horaejecE`, 
`coordinadorE`, 
`cedulacoordE`, 
`fechacoordE`, 
`horacoordE`, 
`emisorE`, 
`cedulaemisorE`, 
`fechaemisorE`, 
`horaemisorE`
) 

VALUES (
'$consecutivo', 
'$estado', 
'$usuario', 
'$fecha', 
'$fechaA', 
'$horainicialA', 
'$horafinalA', 
'$certhabilit', 
'$ubicacion', 
'$altura', 
'$tipo_trabajo', 
'$descripcion', 
'$cantidad', 
'$nombre1', 
'$nombre2', 
'$nombre3', 
'$nombre4', 
'$cedula1', 
'$cedula2', 
'$cedula3', 
'$cedula4', 
'$firma1', 
'$firma2', 
'$firma3', 
'$firma4', 
'$B1', 
'$B2', 
'$B3', 
'$B4', 
'$B5', 
'$B6', 
'$B7', 
'$B8', 
'$B9', 
'$B10', 
'$B11', 
'$B12', 
'$B13', 
'$B14', 
'$B15', 
'$B16', 
'$B17', 
'$B18', 
'$B19', 
'$B20a', 
'$B20b', 
'$B21', 
'$B22', 
'$B23', 
'$B24', 
'$B25', 
'$B26', 
'$B27', 
'$B28', 
'$B29', 
'$B30', 
'$B31', 
'$B32', 
'$B33', 
'$B34', 
'$B35', 
'$B36', 
'$B37', 
'$observaciones', 
'$ejecutorC', 
'$cedulaejecC', 
'$fechaejecC', 
'$horaejecC', 
'$coordinadorC', 
'$cedulacoordC', 
'$fechacoordC', 
'$horacoordC', 
'$emisorD', 
'$cedulaemisorD', 
'$fechaemisorD', 
'$horaemisorD', 
'$cancelacion', 
'$ejecutorE', 
'$cedulaejecE', 
'$fechaejecE', 
'$horaejecE', 
'$coordinadorE', 
'$cedulacoordE', 
'$fechacoordE', 
'$horacoordE', 
'$emisorE', 
'$cedulaemisorE', 
'$fechaemisorE', 
'$horaemisorE'
)";

$conexion->query($datos) or die ('<br><br><b>ESE CONSECUTIVO YA ESTÁ ASIGNADO</b>');

echo '<br><br><b>DATOS INGRESADOS SATISFACTORIAMENTE</b><br><br><br><br><br><br>';
echo '<span style="font-family:Arial; font-size:48px; color:rgba(128,64,0,1)"><b>';
echo "TERMINAL ".strtoupper($terminal)."<br><br>";
echo $$forma."<br>";
echo '</b></span>';
echo '<span style="font-family:SCHLBKB; font-size:72px; color:red"># ';
if ($consec <= 9) {echo "00000";} else {if ($consec <= 99) {echo "0000";} else {if ($consec <= 999) {echo "000";} else {if ($consec <= 9999) {echo "00";} else {if ($consec <= 99999) {echo "0";}}}}} echo $consec;
echo '</span>';

// se cierra la conexion a la base de datos
$conexion->close();
?>
</body>
</html>
