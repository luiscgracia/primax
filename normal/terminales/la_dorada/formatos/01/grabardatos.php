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
$forma = "formulario".$formato;
include ("../../../../../common/datos.php");
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
$instalacion = $_REQUEST['instalacion'];
$certificado = $_REQUEST['certificado'];
$ubicacion = $_REQUEST['ubicacion'];
$apt = $_REQUEST['apt'];
$equipo = $_REQUEST['equipo'];
$fechaA = $_REQUEST['fechaA'];
$horainicioA = $_REQUEST['horainicioA'];
$horafinalA = $_REQUEST['horafinalA'];
$descripcion = $_REQUEST['descripcion'];
$cambio = $_REQUEST['cambio'];
$pedidocambio = $_REQUEST['pedidocambio'];
$C1 = $_REQUEST['C1'];
$C2 = $_REQUEST['C2'];
$C3 = $_REQUEST['C3'];
$C4 = $_REQUEST['C4'];
$C5 = $_REQUEST['C5'];
$C6 = $_REQUEST['C6'];
$C7 = $_REQUEST['C7'];
$C8 = $_REQUEST['C8'];
$C9 = $_REQUEST['C9'];
$C10 = $_REQUEST['C10'];
$C11 = $_REQUEST['C11'];
$C12 = $_REQUEST['C12'];
$C13 = $_REQUEST['C13'];
$C14 = $_REQUEST['C14'];
$C15 = $_REQUEST['C15'];
$C16 = $_REQUEST['C16'];
$C17 = $_REQUEST['C17'];
$C18 = $_REQUEST['C18'];
$C19 = $_REQUEST['C19'];
$C20 = $_REQUEST['C20'];
$C21 = $_REQUEST['C21'];
$C22 = $_REQUEST['C22'];
$C23 = $_REQUEST['C23'];
$C24 = $_REQUEST['C24'];
$C25 = $_REQUEST['C25'];
$C26 = $_REQUEST['C26'];
$C27 = $_REQUEST['C27'];
$C28 = $_REQUEST['C28'];
$C29 = $_REQUEST['C29'];
$C30 = $_REQUEST['C30'];
$C31 = $_REQUEST['C31'];
$C32 = $_REQUEST['C32'];
$C33 = $_REQUEST['C33'];
$C34 = $_REQUEST['C34'];
$C35 = $_REQUEST['C35'];
$C36 = $_REQUEST['C36'];
$otrasactividades = $_REQUEST['otrasactividades'];
$D1 = $_REQUEST['D1'];
$numeroD1 = $_REQUEST['numeroD1'];
$D2 = $_REQUEST['D2'];
$numeroD2 = $_REQUEST['numeroD2'];
$D3 = $_REQUEST['D3'];
$numeroD3 = $_REQUEST['numeroD3'];
$D4 = $_REQUEST['D4'];
$numeroD4 = $_REQUEST['numeroD4'];
$D5 = $_REQUEST['D5'];
$numeroD5 = $_REQUEST['numeroD5'];
$D6 = $_REQUEST['D6'];
$numeroD6 = $_REQUEST['numeroD6'];
$D7 = $_REQUEST['D7'];
$numeroD7 = $_REQUEST['numeroD7'];
$D8 = $_REQUEST['D8'];
$numeroD8 = $_REQUEST['numeroD8'];
$D9 = $_REQUEST['D9'];
$numeroD9 = $_REQUEST['numeroD9'];
$D10 = $_REQUEST['D10'];
$numeroD10 = $_REQUEST['numeroD10'];
$D11 = $_REQUEST['D11'];
$numeroD11 = $_REQUEST['numeroD11'];
$D12 = $_REQUEST['D12'];
$numeroD12 = $_REQUEST['numeroD12'];
$D13 = $_REQUEST['D13'];
$numeroD13 = $_REQUEST['numeroD13'];
$D14 = $_REQUEST['D14'];
$numeroD14 = $_REQUEST['numeroD14'];
$D15 = $_REQUEST['D15'];
$numeroD15 = $_REQUEST['numeroD15'];
$D16 = $_REQUEST['D16'];
$numeroD16 = $_REQUEST['numeroD16'];
$precauciones = $_REQUEST['precauciones'];
$empleado = $_REQUEST['empleado'];
$companiacp = $_REQUEST['companiacp'];
$ejecutorF = $_REQUEST['ejecutorF'];
$fechaejecF = $_REQUEST['fechaejecF'];
$horaejecF = $_REQUEST['horaejecF'];
$inspectorF = $_REQUEST['inspectorF'];
$fechainspF = $_REQUEST['fechainspF'];
$horainspF = $_REQUEST['horainspF'];
$docum_adic = $_REQUEST['docum_adic'];
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$nombre5 = $_REQUEST['nombre5'];
$nombre6 = $_REQUEST['nombre6'];
$nombre7 = $_REQUEST['nombre7'];
$aprobadorG = $_REQUEST['aprobadorG'];
$fechaaprobG = $_REQUEST['fechaaprobG'];
$horaaprobG = $_REQUEST['horaaprobG'];
$emisorG = $_REQUEST['emisorG'];
$fechaemisorG = $_REQUEST['fechaemisorG'];
$horaemisorG = $_REQUEST['horaemisorG'];
$completado = $_REQUEST['completado'];
$ejecutorH = $_REQUEST['ejecutorH'];
$horaejecH = $_REQUEST['horaejecH'];
$inspectorH = $_REQUEST['inspectorH'];
$horainspH = $_REQUEST['horainspH'];
$emisorH = $_REQUEST['emisorH'];
$horaemisorH = $_REQUEST['horaemisorH'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`, 
`estado`, 
`usuario`, 
`fecha`, 
`instalacion`, 
`certificado`, 
`ubicacion`, 
`apt`, 
`equipo`, 
`fechaA`, 
`horainicioA`, 
`horafinalA`, 
`descripcion`, 
`cambio`, 
`pedidocambio`, 
`C1`, 
`C2`, 
`C3`, 
`C4`, 
`C5`, 
`C6`, 
`C7`, 
`C8`, 
`C9`, 
`C10`, 
`C11`, 
`C12`, 
`C13`, 
`C14`, 
`C15`, 
`C16`, 
`C17`, 
`C18`, 
`C19`, 
`C20`, 
`C21`, 
`C22`, 
`C23`, 
`C24`, 
`C25`, 
`C26`, 
`C27`, 
`C28`, 
`C29`, 
`C30`, 
`C31`, 
`C32`, 
`C33`, 
`C34`, 
`C35`, 
`C36`, 
`otrasactividades`, 
`D1`, 
`numeroD1`, 
`D2`, 
`numeroD2`, 
`D3`, 
`numeroD3`, 
`D4`, 
`numeroD4`, 
`D5`, 
`numeroD5`, 
`D6`, 
`numeroD6`, 
`D7`, 
`numeroD7`, 
`D8`, 
`numeroD8`, 
`D9`, 
`numeroD9`, 
`D10`, 
`numeroD10`, 
`D11`, 
`numeroD11`, 
`D12`, 
`numeroD12`, 
`D13`, 
`numeroD13`, 
`D14`, 
`numeroD14`, 
`D15`, 
`numeroD15`, 
`D16`, 
`numeroD16`, 
`precauciones`, 
`empleado`, 
`companiacp`, 
`ejecutorF`, 
`fechaejecF`, 
`horaejecF`, 
`inspectorF`, 
`fechainspF`, 
`horainspF`, 
`docum_adic`, 
`cantidad`, 
`nombre1`, 
`nombre2`, 
`nombre3`, 
`nombre4`, 
`nombre5`, 
`nombre6`, 
`nombre7`, 
`aprobadorG`, 
`fechaaprobG`, 
`horaaprobG`, 
`emisorG`, 
`fechaemisorG`, 
`horaemisorG`, 
`completado`, 
`ejecutorH`, 
`horaejecH`, 
`inspectorH`, 
`horainspH`, 
`emisorH`, 
`horaemisorH`
)

VALUES (
'$consecutivo', 
'$estado', 
'$usuario', 
'$fecha', 
'$instalacion', 
'$certificado', 
'$ubicacion', 
'$apt', 
'$equipo', 
'$fechaA', 
'$horainicioA', 
'$horafinalA', 
'$descripcion', 
'$cambio', 
'$pedidocambio', 
'$C1', 
'$C2', 
'$C3', 
'$C4', 
'$C5', 
'$C6', 
'$C7', 
'$C8', 
'$C9', 
'$C10', 
'$C11', 
'$C12', 
'$C13', 
'$C14', 
'$C15', 
'$C16', 
'$C17', 
'$C18', 
'$C19', 
'$C20', 
'$C21', 
'$C22', 
'$C23', 
'$C24', 
'$C25', 
'$C26', 
'$C27', 
'$C28', 
'$C29', 
'$C30', 
'$C31', 
'$C32', 
'$C33', 
'$C34', 
'$C35', 
'$C36', 
'$otrasactividades', 
'$D1', 
'$numeroD1', 
'$D2', 
'$numeroD2', 
'$D3', 
'$numeroD3', 
'$D4', 
'$numeroD4', 
'$D5', 
'$numeroD5', 
'$D6', 
'$numeroD6', 
'$D7', 
'$numeroD7', 
'$D8', 
'$numeroD8', 
'$D9', 
'$numeroD9', 
'$D10', 
'$numeroD10', 
'$D11', 
'$numeroD11', 
'$D12', 
'$numeroD12', 
'$D13', 
'$numeroD13', 
'$D14', 
'$numeroD14', 
'$D15', 
'$numeroD15', 
'$D16', 
'$numeroD16', 
'$precauciones', 
'$empleado', 
'$companiacp', 
'$ejecutorF', 
'$fechaejecF', 
'$horaejecF', 
'$inspectorF', 
'$fechainspF', 
'$horainspF', 
'$docum_adic', 
'$cantidad', 
'$nombre1', 
'$nombre2', 
'$nombre3', 
'$nombre4', 
'$nombre5', 
'$nombre6', 
'$nombre7', 
'$aprobadorG', 
'$fechaaprobG', 
'$horaaprobG', 
'$emisorG', 
'$fechaemisorG', 
'$horaemisorG', 
'$completado', 
'$ejecutorH', 
'$horaejecH', 
'$inspectorH', 
'$horainspH', 
'$emisorH', 
'$horaemisorH'
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
