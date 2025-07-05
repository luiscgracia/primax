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
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$fechaA = $_REQUEST['fechaA'];
$horainicialA = $_REQUEST['horainicialA'];
$horafinalA = $_REQUEST['horafinalA'];
$certhabilit = $_REQUEST['certhabilit'];
$B1 = $_REQUEST['B1'];
$B2 = $_REQUEST['B2'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$B6 = $_REQUEST['B6'];
$B7 = $_REQUEST['B7'];
$indiqueB7a = $_REQUEST['indiqueB7a'];
$indiqueB7b = $_REQUEST['indiqueB7b'];
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B10 = $_REQUEST['B10'];
$B11 = $_REQUEST['B11'];
$especifiqueB11a = $_REQUEST['especifiqueB11a'];
$especifiqueB11b = $_REQUEST['especifiqueB11b'];
$B12a = $_REQUEST['B12a'];
$B12b = $_REQUEST['B12b'];
$B12c = $_REQUEST['B12c'];
$B12d = $_REQUEST['B12d'];
$B12e = $_REQUEST['B12e'];
$B12f = $_REQUEST['B12f'];
$B12g = $_REQUEST['B12g'];
$B12h = $_REQUEST['B12h'];
$B12i = $_REQUEST['B12i'];
$guante = $_REQUEST['guante'];
$B12j = $_REQUEST['B12j'];
$calzado = $_REQUEST['calzado'];
$B12k = $_REQUEST['B12k'];
$delantal = $_REQUEST['delantal'];
$B12l = $_REQUEST['B12l'];
$ropa = $_REQUEST['ropa'];
$B12m = $_REQUEST['B12m'];
$otro1 = $_REQUEST['otro1'];
$B12n = $_REQUEST['B12n'];
$otro2 = $_REQUEST['otro2'];
$B12o = $_REQUEST['B12o'];
$otro3 = $_REQUEST['otro3'];
$req_pr_gas = $_REQUEST['req_pr_gas'];
$B13equipo = $_REQUEST['B13equipo'];
$B13dueno = $_REQUEST['B13dueno'];
$B13fecha = $_REQUEST['B13fecha'];
$B13bumptest = $_REQUEST['B13bumptest'];
$B13hora1 = $_REQUEST['B13hora1'];
$B13resul1 = $_REQUEST['B13resul1'];
$B13hora2 = $_REQUEST['B13hora2'];
$B13resul2 = $_REQUEST['B13resul2'];
$B13hora3 = $_REQUEST['B13hora3'];
$B13resul3 = $_REQUEST['B13resul3'];
$B13hora4 = $_REQUEST['B13hora4'];
$B13resul4 = $_REQUEST['B13resul4'];
$B13hora5 = $_REQUEST['B13hora5'];
$B13resul5 = $_REQUEST['B13resul5'];
$B13hora6 = $_REQUEST['B13hora6'];
$B13resul6 = $_REQUEST['B13resul6'];
$B13hora7 = $_REQUEST['B13hora7'];
$B13resul7 = $_REQUEST['B13resul7'];
$B13hora8 = $_REQUEST['B13hora8'];
$B13resul8 = $_REQUEST['B13resul8'];
$ejecutorC = $_REQUEST['ejecutorC'];
$fechaejecC = $_REQUEST['fechaejecC'];
$horaejecC = $_REQUEST['horaejecC'];
$inspectorC = $_REQUEST['inspectorC'];
$fechainspC = $_REQUEST['fechainspC'];
$horainspC = $_REQUEST['horainspC'];
$emisorD = $_REQUEST['emisorD'];
$nombreemisorD = $_REQUEST['nombreemisorD'];
$fechaemisorD = $_REQUEST['fechaemisorD'];
$horaemisorD = $_REQUEST['horaemisorD'];
$cancelacion = $_REQUEST['cancelacion'];
$ejecutorE = $_REQUEST['ejecutorE'];
$fechaejecE = $_REQUEST['fechaejecE'];
$horaejecE = $_REQUEST['horaejecE'];
$inspectorE = $_REQUEST['inspectorE'];
$fechainspE = $_REQUEST['fechainspE'];
$horainspE = $_REQUEST['horainspE'];
$emisorE = $_REQUEST['emisorE'];
$fechaemisorE = $_REQUEST['fechaemisorE'];
$horaemisorE = $_REQUEST['horaemisorE'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`,
`estado`,
`usuario`,
`fecha`,
`descripcion`,
`cantidad`,
`nombre1`,
`nombre2`,
`nombre3`,
`nombre4`,
`fechaA`,
`horainicialA`,
`horafinalA`,
`certhabilit`,
`B1`,
`B2`,
`B3`,
`B4`,
`B5`,
`B6`,
`B7`,
`indiqueB7a`,
`indiqueB7b`,
`B8`,
`B9`,
`B10`,
`B11`,
`especifiqueB11a`,
`especifiqueB11b`,
`B12a`,
`B12b`,
`B12c`,
`B12d`,
`B12e`,
`B12f`,
`B12g`,
`B12h`,
`B12i`,
`guante`,
`B12j`,
`calzado`,
`B12k`,
`delantal`,
`B12l`,
`ropa`,
`B12m`,
`otro1`,
`B12n`,
`otro2`,
`B12o`,
`otro3`,
`req_pr_gas`,
`B13equipo`,
`B13dueno`,
`B13fecha`,
`B13bumptest`,
`B13hora1`,
`B13resul1`,
`B13hora2`,
`B13resul2`,
`B13hora3`,
`B13resul3`,
`B13hora4`,
`B13resul4`,
`B13hora5`,
`B13resul5`,
`B13hora6`,
`B13resul6`,
`B13hora7`,
`B13resul7`,
`B13hora8`,
`B13resul8`,
`ejecutorC`,
`fechaejecC`,
`horaejecC`,
`inspectorC`,
`fechainspC`,
`horainspC`,
`emisorD`,
`nombreemisorD`,
`fechaemisorD`,
`horaemisorD`,
`cancelacion`,
`ejecutorE`,
`fechaejecE`,
`horaejecE`,
`inspectorE`,
`fechainspE`,
`horainspE`,
`emisorE`,
`fechaemisorE`,
`horaemisorE`
)

VALUES (
'$consecutivo',
'$estado',
'$usuario',
'$fecha',
'$descripcion',
'$cantidad',
'$nombre1',
'$nombre2',
'$nombre3',
'$nombre4',
'$fechaA',
'$horainicialA',
'$horafinalA',
'$certhabilit',
'$B1',
'$B2',
'$B3',
'$B4',
'$B5',
'$B6',
'$B7',
'$indiqueB7a',
'$indiqueB7b',
'$B8',
'$B9',
'$B10',
'$B11',
'$especifiqueB11a',
'$especifiqueB11b',
'$B12a',
'$B12b',
'$B12c',
'$B12d',
'$B12e',
'$B12f',
'$B12g',
'$B12h',
'$B12i',
'$guante',
'$B12j',
'$calzado',
'$B12k',
'$delantal',
'$B12l',
'$ropa',
'$B12m',
'$otro1',
'$B12n',
'$otro2',
'$B12o',
'$otro3',
'$req_pr_gas',
'$B13equipo',
'$B13dueno',
'$B13fecha',
'$B13bumptest',
'$B13hora1',
'$B13resul1',
'$B13hora2',
'$B13resul2',
'$B13hora3',
'$B13resul3',
'$B13hora4',
'$B13resul4',
'$B13hora5',
'$B13resul5',
'$B13hora6',
'$B13resul6',
'$B13hora7',
'$B13resul7',
'$B13hora8',
'$B13resul8',
'$ejecutorC',
'$fechaejecC',
'$horaejecC',
'$inspectorC',
'$fechainspC',
'$horainspC',
'$emisorD',
'$nombreemisorD',
'$fechaemisorD',
'$horaemisorD',
'$cancelacion',
'$ejecutorE',
'$fechaejecE',
'$horaejecE',
'$inspectorE',
'$fechainspE',
'$horainspE',
'$emisorE',
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
