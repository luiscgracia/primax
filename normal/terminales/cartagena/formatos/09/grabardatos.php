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
$descripcion = $_REQUEST['descripcion'];
$ubicacion1 = $_REQUEST['ubicacion1'];
$ubicacion2 = $_REQUEST['ubicacion2'];
$ubicacion3 = $_REQUEST['ubicacion3'];
$profundidad = $_REQUEST['profundidad'];
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$certhabilit = $_REQUEST['certhabilit'];
$fechaA = $_REQUEST['fechaA'];
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
$C1 = $_REQUEST['C1'];
$C2 = $_REQUEST['C2'];
$C3 = $_REQUEST['C3'];
$C4 = $_REQUEST['C4'];
$C5 = $_REQUEST['C5'];
$C6 = $_REQUEST['C6'];
$C7 = $_REQUEST['C7'];
$C7a = $_REQUEST['C7a'];
$C8 = $_REQUEST['C8'];
$C8a = $_REQUEST['C8a'];
$C9 = $_REQUEST['C9'];
$C10 = $_REQUEST['C10'];
$C11 = $_REQUEST['C11'];
$C11a = $_REQUEST['C11a'];
$requisitos1 = $_REQUEST['requisitos1'];
$requisitos2 = $_REQUEST['requisitos2'];
$requisitos3 = $_REQUEST['requisitos3'];
$requisitos4 = $_REQUEST['requisitos4'];
$ejecutorD = $_REQUEST['ejecutorD'];
$nombreejecutorD = $_REQUEST['nombreejecutorD'];
$fechaejecD = $_REQUEST['fechaejecD'];
$horaejecD = $_REQUEST['horaejecD'];
$inspectorD = $_REQUEST['inspectorD'];
$nombreinspD = $_REQUEST['nombreinspD'];
$fechainspD = $_REQUEST['fechainspD'];
$horainspD = $_REQUEST['horainspD'];
$emisorE = $_REQUEST['emisorE'];
$nombreemisorE = $_REQUEST['nombreemisorE'];
$fechaemisorE = $_REQUEST['fechaemisorE'];
$horaemisorE = $_REQUEST['horaemisorE'];
$notas_cancelacion = $_REQUEST['notas_cancelacion'];
$ejecutorF = $_REQUEST['ejecutorF'];
$fechaejecF = $_REQUEST['fechaejecF'];
$horaejecF = $_REQUEST['horaejecF'];
$inspectorF = $_REQUEST['inspectorF'];
$fechainspF = $_REQUEST['fechainspF'];
$horainspF = $_REQUEST['horainspF'];
$emisorF = $_REQUEST['emisorF'];
$fechaemisorF = $_REQUEST['fechaemisorF'];
$horaemisorF = $_REQUEST['horaemisorF'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`, 
`estado`, 
`usuario`, 
`fecha`, 
`descripcion`, 
`ubicacion1`, 
`ubicacion2`, 
`ubicacion3`, 
`profundidad`, 
`cantidad`, 
`nombre1`, 
`nombre2`, 
`nombre3`, 
`nombre4`, 
`certhabilit`, 
`fechaA`, 
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
`C1`, 
`C2`, 
`C3`, 
`C4`, 
`C5`, 
`C6`, 
`C7`, 
`C7a`, 
`C8`, 
`C8a`, 
`C9`, 
`C10`, 
`C11`, 
`C11a`, 
`requisitos1`, 
`requisitos2`, 
`requisitos3`, 
`requisitos4`, 
`ejecutorD`, 
`nombreejecutorD`, 
`fechaejecD`, 
`horaejecD`, 
`inspectorD`, 
`nombreinspD`, 
`fechainspD`, 
`horainspD`, 
`emisorE`, 
`nombreemisorE`, 
`fechaemisorE`, 
`horaemisorE`, 
`notas_cancelacion`, 
`ejecutorF`, 
`fechaejecF`, 
`horaejecF`, 
`inspectorF`, 
`fechainspF`, 
`horainspF`, 
`emisorF`, 
`fechaemisorF`, 
`horaemisorF`
)

VALUES (
'$consecutivo', 
'$estado', 
'$usuario', 
'$fecha', 
'$descripcion', 
'$ubicacion1', 
'$ubicacion2', 
'$ubicacion3', 
'$profundidad', 
'$cantidad', 
'$nombre1', 
'$nombre2', 
'$nombre3', 
'$nombre4', 
'$certhabilit', 
'$fechaA', 
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
'$C1', 
'$C2', 
'$C3', 
'$C4', 
'$C5', 
'$C6', 
'$C7', 
'$C7a', 
'$C8', 
'$C8a', 
'$C9', 
'$C10', 
'$C11', 
'$C11a', 
'$requisitos1', 
'$requisitos2', 
'$requisitos3', 
'$requisitos4', 
'$ejecutorD', 
'$nombreejecutorD', 
'$fechaejecD', 
'$horaejecD', 
'$inspectorD', 
'$nombreinspD', 
'$fechainspD', 
'$horainspD', 
'$emisorE', 
'$nombreemisorE', 
'$fechaemisorE', 
'$horaemisorE', 
'$notas_cancelacion', 
'$ejecutorF', 
'$fechaejecF', 
'$horaejecF', 
'$inspectorF', 
'$fechainspF', 
'$horainspF', 
'$emisorF', 
'$fechaemisorF', 
'$horaemisorF'
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
