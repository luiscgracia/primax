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
$descripcion = $_REQUEST['descripcion'];
$permisodetrabajo = $_REQUEST['permisodetrabajo'];
$B1 = $_REQUEST['B1'];
$B2indique = $_REQUEST['B2indique'];
$B2a = $_REQUEST['B2a'];
$B2b = $_REQUEST['B2b'];
$B2c = $_REQUEST['B2c'];
$B2d = $_REQUEST['B2d'];
$B2e = $_REQUEST['B2e'];
$B2f = $_REQUEST['B2f'];
$B2g = $_REQUEST['B2g'];
$B2h = $_REQUEST['B2h'];
$B2i = $_REQUEST['B2i'];
$B2j = $_REQUEST['B2j'];
$B2k = $_REQUEST['B2k'];
$B2l = $_REQUEST['B2l'];
$B2m = $_REQUEST['B2m'];
$B2n = $_REQUEST['B2n'];
$B2o = $_REQUEST['B2o'];
$B2p = $_REQUEST['B2p'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$Cresponsable1 = $_REQUEST['Cresponsable1'];
$Carea1 = $_REQUEST['Carea1'];
$Cdepartamento1 = $_REQUEST['Cdepartamento1'];
$Cfirma1 = $_REQUEST['Cfirma1'];
$Cresponsable2 = $_REQUEST['Cresponsable2'];
$Carea2 = $_REQUEST['Carea2'];
$Cdepartamento2 = $_REQUEST['Cdepartamento2'];
$Cfirma2 = $_REQUEST['Cfirma2'];
$Cresponsable3 = $_REQUEST['Cresponsable3'];
$Carea3 = $_REQUEST['Carea3'];
$Cdepartamento3 = $_REQUEST['Cdepartamento3'];
$Cfirma3 = $_REQUEST['Cfirma3'];
$Cresponsable4 = $_REQUEST['Cresponsable4'];
$Carea4 = $_REQUEST['Carea4'];
$Cdepartamento4 = $_REQUEST['Cdepartamento4'];
$Cfirma4 = $_REQUEST['Cfirma4'];
$ejecutorC = $_REQUEST['ejecutorC'];
$nombreejecutorC = $_REQUEST['nombreejecutorC'];
$fechaejecC = $_REQUEST['fechaejecC'];
$horaejecC = $_REQUEST['horaejecC'];
$cancelacion = $_REQUEST['cancelacion'];
$comentariosDa = $_REQUEST['comentariosDa'];
$comentariosDb = $_REQUEST['comentariosDb'];
$ejecutorD = $_REQUEST['ejecutorD'];
$fechaejecD = $_REQUEST['fechaejecD'];
$horaejecD = $_REQUEST['horaejecD'];
$inspectorD = $_REQUEST['inspectorD'];
$fechainspD = $_REQUEST['fechainspD'];
$horainspD = $_REQUEST['horainspD'];
$emisorD = $_REQUEST['emisorD'];
$fechaemisorD = $_REQUEST['fechaemisorD'];
$horaemisorD = $_REQUEST['horaemisorD'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`,
`estado`,
`usuario`,
`fecha`,
`fechaA`,
`horainicialA`,
`horafinalA`,
`certhabilit`,
`descripcion`,
`permisodetrabajo`,
`B1`,
`B2indique`,
`B2a`,
`B2b`,
`B2c`,
`B2d`,
`B2e`,
`B2f`,
`B2g`,
`B2h`,
`B2i`,
`B2j`,
`B2k`,
`B2l`,
`B2m`,
`B2n`,
`B2o`,
`B2p`,
`B3`,
`B4`,
`B5`, 
`Cresponsable1`,
`Carea1`,
`Cdepartamento1`,
`Cfirma1`,
`Cresponsable2`,
`Carea2`,
`Cdepartamento2`,
`Cfirma2`,
`Cresponsable3`,
`Carea3`,
`Cdepartamento3`,
`Cfirma3`,
`Cresponsable4`,
`Carea4`,
`Cdepartamento4`,
`Cfirma4`,
`ejecutorC`,
`nombreejecutorC`, 
`fechaejecC`,
`horaejecC`,
`cancelacion`,
`comentariosDa`,
`comentariosDb`,
`ejecutorD`,
`fechaejecD`,
`horaejecD`,
`inspectorD`,
`fechainspD`,
`horainspD`,
`emisorD`,
`fechaemisorD`,
`horaemisorD`
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
'$descripcion',
'$permisodetrabajo',
'$B1',
'$B2indique',
'$B2a',
'$B2b',
'$B2c',
'$B2d',
'$B2e',
'$B2f',
'$B2g',
'$B2h',
'$B2i',
'$B2j',
'$B2k',
'$B2l',
'$B2m',
'$B2n',
'$B2o',
'$B2p',
'$B3',
'$B4',
'$B5', 
'$Cresponsable1',
'$Carea1',
'$Cdepartamento1',
'$Cfirma1',
'$Cresponsable2',
'$Carea2',
'$Cdepartamento2',
'$Cfirma2',
'$Cresponsable3',
'$Carea3',
'$Cdepartamento3',
'$Cfirma3',
'$Cresponsable4',
'$Carea4',
'$Cdepartamento4',
'$Cfirma4',
'$ejecutorC',
'$nombreejecutorC', 
'$fechaejecC',
'$horaejecC',
'$cancelacion',
'$comentariosDa',
'$comentariosDb',
'$ejecutorD',
'$fechaejecD',
'$horaejecD',
'$inspectorD',
'$fechainspD',
'$horainspD',
'$emisorD',
'$fechaemisorD',
'$horaemisorD'
)";

$conexion->query($datos) or die ('<br><br><b>ESE CONSECUTIVO YA ESTÁ ASIGNADO</b>');

echo '<br><br><b>DATOS INGRESADOS SATISFACTORIAMENTE</b><br><br><br><br><br><br>';
echo '<span style="font-family:Arial; font-size:80px; color:rgba(128,64,0,1)"><b>';
echo "TERMINAL ".strtoupper($terminal)."<br><br>";
echo $$forma."<br>";
echo '</b></span>';
echo '<span style="font-family:SCHLBKB; font-size:150px; color:red"># ';
if ($consec <= 9) {echo "00000";} else {if ($consec <= 99) {echo "0000";} else {if ($consec <= 999) {echo "000";} else {if ($consec <= 9999) {echo "00";} else {if ($consec <= 99999) {echo "0";}}}}} echo $consec;
echo '</span>';

// se cierra la conexion a la base de datos
$conexion->close();
?>
</body>
</html>
