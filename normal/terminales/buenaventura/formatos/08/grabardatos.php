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
$equipo_desacople = $_REQUEST['equipo_desacople'];
$producto = $_REQUEST['producto'];
$temperatura = $_REQUEST['temperatura'];
$presion = $_REQUEST['presion'];
$descripcion1 = $_REQUEST['descripcion1'];
$descripcion2 = $_REQUEST['descripcion2'];
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$otros_detalles = $_REQUEST['otros_detalles'];
$B1 = $_REQUEST['B1'];
$B2 = $_REQUEST['B2'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$B6 = $_REQUEST['B6'];
$B7 = $_REQUEST['B7'];
$B7a = $_REQUEST['B7a'];
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B9a = $_REQUEST['B9a'];
$B10a = $_REQUEST['B10a'];
$B10b = $_REQUEST['B10b'];
$B10c = $_REQUEST['B10c'];
$B10d = $_REQUEST['B10d'];
$B10e = $_REQUEST['B10e'];
$B10f = $_REQUEST['B10f'];
$B10g = $_REQUEST['B10g'];
$B10h = $_REQUEST['B10h'];
$B10g1 = $_REQUEST['B10g1'];
$B10h1 = $_REQUEST['B10h1'];
$B10i = $_REQUEST['B10i'];
$B10j = $_REQUEST['B10j'];
$B10k = $_REQUEST['B10k'];
$B10l = $_REQUEST['B10l'];
$B10k1 = $_REQUEST['B10k1'];
$B10l1 = $_REQUEST['B10l1'];
$razones1 = $_REQUEST['razones1'];
$razones2 = $_REQUEST['razones2'];
$prec_adic1 = $_REQUEST['prec_adic1'];
$prec_adic2 = $_REQUEST['prec_adic2'];
$C1 = $_REQUEST['C1'];
$C2 = $_REQUEST['C2'];
$C3 = $_REQUEST['C3'];
$C4 = $_REQUEST['C4'];
$C5 = $_REQUEST['C5'];
$valvula1 = $_REQUEST['valvula1'];
$valvula2 = $_REQUEST['valvula2'];
$valvula3 = $_REQUEST['valvula3'];
$valvula4 = $_REQUEST['valvula4'];
$valvula5 = $_REQUEST['valvula5'];
$valvula6 = $_REQUEST['valvula6'];
$valvula7 = $_REQUEST['valvula7'];
$valvula8 = $_REQUEST['valvula8'];
$valvula9 = $_REQUEST['valvula9'];
$valvula10 = $_REQUEST['valvula10'];
$valvula11 = $_REQUEST['valvula11'];
$candado1 = $_REQUEST['candado1'];
$candado2 = $_REQUEST['candado2'];
$candado3 = $_REQUEST['candado3'];
$candado4 = $_REQUEST['candado4'];
$candado5 = $_REQUEST['candado5'];
$candado6 = $_REQUEST['candado6'];
$candado7 = $_REQUEST['candado7'];
$candado8 = $_REQUEST['candado8'];
$candado9 = $_REQUEST['candado9'];
$candado10 = $_REQUEST['candado10'];
$candado11 = $_REQUEST['candado11'];
$etiqueta1 = $_REQUEST['etiqueta1'];
$etiqueta2 = $_REQUEST['etiqueta2'];
$etiqueta3 = $_REQUEST['etiqueta3'];
$etiqueta4 = $_REQUEST['etiqueta4'];
$etiqueta5 = $_REQUEST['etiqueta5'];
$etiqueta6 = $_REQUEST['etiqueta6'];
$etiqueta7 = $_REQUEST['etiqueta7'];
$etiqueta8 = $_REQUEST['etiqueta8'];
$etiqueta9 = $_REQUEST['etiqueta9'];
$etiqueta10 = $_REQUEST['etiqueta10'];
$etiqueta11 = $_REQUEST['etiqueta11'];
$C6 = $_REQUEST['C6'];
$ubicacionA1 = $_REQUEST['ubicacionA1'];
$ubicacionA2 = $_REQUEST['ubicacionA2'];
$ubicacionA3 = $_REQUEST['ubicacionA3'];
$ubicacionA4 = $_REQUEST['ubicacionA4'];
$ubicacionA5 = $_REQUEST['ubicacionA5'];
$ubicacionB1 = $_REQUEST['ubicacionB1'];
$ubicacionB2 = $_REQUEST['ubicacionB2'];
$ubicacionB3 = $_REQUEST['ubicacionB3'];
$ubicacionB4 = $_REQUEST['ubicacionB4'];
$ubicacionB5 = $_REQUEST['ubicacionB5'];
$ejecutorD = $_REQUEST['ejecutorD'];
$nombreejecD = $_REQUEST['nombreejecD'];
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
$cancelacion = $_REQUEST['cancelacion'];
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
`fechaA`, 
`horainicialA`, 
`horafinalA`, 
`certhabilit`, 
`equipo_desacople`, 
`producto`, 
`temperatura`, 
`presion`, 
`descripcion1`, 
`descripcion2`, 
`cantidad`, 
`nombre1`, 
`nombre2`, 
`nombre3`, 
`nombre4`, 
`otros_detalles`, 
`B1`, 
`B2`, 
`B3`, 
`B4`, 
`B5`, 
`B6`, 
`B7`, 
`B7a`, 
`B8`, 
`B9`, 
`B9a`, 
`B10a`, 
`B10b`, 
`B10c`, 
`B10d`, 
`B10e`, 
`B10f`, 
`B10g`, 
`B10h`, 
`B10g1`, 
`B10h1`, 
`B10i`, 
`B10j`, 
`B10k`, 
`B10l`, 
`B10k1`, 
`B10l1`, 
`razones1`, 
`razones2`, 
`prec_adic1`, 
`prec_adic2`, 
`C1`, 
`C2`, 
`C3`, 
`C4`, 
`C5`, 
`valvula1`, 
`valvula2`, 
`valvula3`, 
`valvula4`, 
`valvula5`, 
`valvula6`, 
`valvula7`, 
`valvula8`, 
`valvula9`, 
`valvula10`, 
`valvula11`, 
`candado1`, 
`candado2`, 
`candado3`, 
`candado4`, 
`candado5`, 
`candado6`, 
`candado7`, 
`candado8`, 
`candado9`, 
`candado10`, 
`candado11`, 
`etiqueta1`, 
`etiqueta2`, 
`etiqueta3`, 
`etiqueta4`, 
`etiqueta5`, 
`etiqueta6`, 
`etiqueta7`, 
`etiqueta8`, 
`etiqueta9`, 
`etiqueta10`, 
`etiqueta11`, 
`C6`, 
`ubicacionA1`, 
`ubicacionA2`, 
`ubicacionA3`, 
`ubicacionA4`, 
`ubicacionA5`, 
`ubicacionB1`, 
`ubicacionB2`, 
`ubicacionB3`, 
`ubicacionB4`, 
`ubicacionB5`, 
`ejecutorD`, 
`nombreejecD`, 
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
`cancelacion`, 
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
'$fechaA', 
'$horainicialA', 
'$horafinalA', 
'$certhabilit', 
'$equipo_desacople', 
'$producto', 
'$temperatura', 
'$presion', 
'$descripcion1', 
'$descripcion2', 
'$cantidad', 
'$nombre1', 
'$nombre2', 
'$nombre3', 
'$nombre4', 
'$otros_detalles', 
'$B1', 
'$B2', 
'$B3', 
'$B4', 
'$B5', 
'$B6', 
'$B7', 
'$B7a', 
'$B8', 
'$B9', 
'$B9a', 
'$B10a', 
'$B10b', 
'$B10c', 
'$B10d', 
'$B10e', 
'$B10f', 
'$B10g', 
'$B10h', 
'$B10g1', 
'$B10h1', 
'$B10i', 
'$B10j', 
'$B10k', 
'$B10l', 
'$B10k1', 
'$B10l1', 
'$razones1', 
'$razones2', 
'$prec_adic1', 
'$prec_adic2', 
'$C1', 
'$C2', 
'$C3', 
'$C4', 
'$C5', 
'$valvula1', 
'$valvula2', 
'$valvula3', 
'$valvula4', 
'$valvula5', 
'$valvula6', 
'$valvula7', 
'$valvula8', 
'$valvula9', 
'$valvula10', 
'$valvula11', 
'$candado1', 
'$candado2', 
'$candado3', 
'$candado4', 
'$candado5', 
'$candado6', 
'$candado7', 
'$candado8', 
'$candado9', 
'$candado10', 
'$candado11', 
'$etiqueta1', 
'$etiqueta2', 
'$etiqueta3', 
'$etiqueta4', 
'$etiqueta5', 
'$etiqueta6', 
'$etiqueta7', 
'$etiqueta8', 
'$etiqueta9', 
'$etiqueta10', 
'$etiqueta11', 
'$C6', 
'$ubicacionA1', 
'$ubicacionA2', 
'$ubicacionA3', 
'$ubicacionA4', 
'$ubicacionA5', 
'$ubicacionB1', 
'$ubicacionB2', 
'$ubicacionB3', 
'$ubicacionB4', 
'$ubicacionB5', 
'$ejecutorD', 
'$nombreejecD', 
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
'$cancelacion', 
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
