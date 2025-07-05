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
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B10 = $_REQUEST['B10'];
$B12 = $_REQUEST['B12'];
$B13 = $_REQUEST['B13'];
$B13a = $_REQUEST['B13a'];
$B14 = $_REQUEST['B14'];
$B15 = $_REQUEST['B15'];
$B16 = $_REQUEST['B16'];
$B17 = $_REQUEST['B17'];
$B18 = $_REQUEST['B18'];
$B19 = $_REQUEST['B19'];
$B11a = $_REQUEST['B11a'];
$B11b = $_REQUEST['B11b'];
$B11c = $_REQUEST['B11c'];
$B11d = $_REQUEST['B11d'];
$B11e = $_REQUEST['B11e'];
$B11f = $_REQUEST['B11f'];
$B11g = $_REQUEST['B11g'];
$B11h = $_REQUEST['B11h'];
$B11i = $_REQUEST['B11i'];
$B11j = $_REQUEST['B11j'];
$B11k = $_REQUEST['B11k'];
$B11l = $_REQUEST['B11l'];
$B20a = $_REQUEST['B20a'];
$B20b = $_REQUEST['B20b'];
$B20c = $_REQUEST['B20c'];
$B20d = $_REQUEST['B20d'];
$B20e = $_REQUEST['B20e'];
$B20f = $_REQUEST['B20f'];
$B20g = $_REQUEST['B20g'];
$B20h = $_REQUEST['B20h'];
$B20A1 = $_REQUEST['B20A1'];
$B20B1 = $_REQUEST['B20B1'];
$B20C1 = $_REQUEST['B20C1'];
$B20D1 = $_REQUEST['B20D1'];
$B20E1 = $_REQUEST['B20E1'];
$B20F1 = $_REQUEST['B20F1'];
$B20G1 = $_REQUEST['B20G1'];
$B20H1 = $_REQUEST['B20H1'];
$B20I1 = $_REQUEST['B20I1'];
$B20J1 = $_REQUEST['B20J1'];
$B20K1 = $_REQUEST['B20K1'];
$B20L1 = $_REQUEST['B20L1'];
$B20M1 = $_REQUEST['B20M1'];
$B20N1 = $_REQUEST['B20N1'];
$B20O1 = $_REQUEST['B20O1'];
$B20P1 = $_REQUEST['B20P1'];
$B20A2 = $_REQUEST['B20A2'];
$B20B2 = $_REQUEST['B20B2'];
$B20C2 = $_REQUEST['B20C2'];
$B20D2 = $_REQUEST['B20D2'];
$B20E2 = $_REQUEST['B20E2'];
$B20F2 = $_REQUEST['B20F2'];
$B20G2 = $_REQUEST['B20G2'];
$B20H2 = $_REQUEST['B20H2'];
$B20I2 = $_REQUEST['B20I2'];
$B20J2 = $_REQUEST['B20J2'];
$B20K2 = $_REQUEST['B20K2'];
$B20L2 = $_REQUEST['B20L2'];
$B20M2 = $_REQUEST['B20M2'];
$B20N2 = $_REQUEST['B20N2'];
$B20O2 = $_REQUEST['B20O2'];
$B20P2 = $_REQUEST['B20P2'];
$B20A3 = $_REQUEST['B20A3'];
$B20B3 = $_REQUEST['B20B3'];
$B20C3 = $_REQUEST['B20C3'];
$B20D3 = $_REQUEST['B20D3'];
$B20E3 = $_REQUEST['B20E3'];
$B20F3 = $_REQUEST['B20F3'];
$B20G3 = $_REQUEST['B20G3'];
$B20H3 = $_REQUEST['B20H3'];
$B20I3 = $_REQUEST['B20I3'];
$B20J3 = $_REQUEST['B20J3'];
$B20K3 = $_REQUEST['B20K3'];
$B20L3 = $_REQUEST['B20L3'];
$B20M3 = $_REQUEST['B20M3'];
$B20N3 = $_REQUEST['B20N3'];
$B20O3 = $_REQUEST['B20O3'];
$B20P3 = $_REQUEST['B20P3'];
$B20A4 = $_REQUEST['B20A4'];
$B20B4 = $_REQUEST['B20B4'];
$B20C4 = $_REQUEST['B20C4'];
$B20D4 = $_REQUEST['B20D4'];
$B20E4 = $_REQUEST['B20E4'];
$B20F4 = $_REQUEST['B20F4'];
$B20G4 = $_REQUEST['B20G4'];
$B20H4 = $_REQUEST['B20H4'];
$B20I4 = $_REQUEST['B20I4'];
$B20J4 = $_REQUEST['B20J4'];
$B20K4 = $_REQUEST['B20K4'];
$B20L4 = $_REQUEST['B20L4'];
$B20M4 = $_REQUEST['B20M4'];
$B20N4 = $_REQUEST['B20N4'];
$B20O4 = $_REQUEST['B20O4'];
$B20P4 = $_REQUEST['B20P4'];
$B20A5 = $_REQUEST['B20A5'];
$B20B5 = $_REQUEST['B20B5'];
$B20C5 = $_REQUEST['B20C5'];
$B20D5 = $_REQUEST['B20D5'];
$B20E5 = $_REQUEST['B20E5'];
$B20F5 = $_REQUEST['B20F5'];
$B20G5 = $_REQUEST['B20G5'];
$B20H5 = $_REQUEST['B20H5'];
$B20I5 = $_REQUEST['B20I5'];
$B20J5 = $_REQUEST['B20J5'];
$B20K5 = $_REQUEST['B20K5'];
$B20L5 = $_REQUEST['B20L5'];
$B20M5 = $_REQUEST['B20M5'];
$B20N5 = $_REQUEST['B20N5'];
$B20O5 = $_REQUEST['B20O5'];
$B20P5 = $_REQUEST['B20P5'];
$B20A6 = $_REQUEST['B20A6'];
$B20B6 = $_REQUEST['B20B6'];
$B20C6 = $_REQUEST['B20C6'];
$B20D6 = $_REQUEST['B20D6'];
$B20E6 = $_REQUEST['B20E6'];
$B20F6 = $_REQUEST['B20F6'];
$B20G6 = $_REQUEST['B20G6'];
$B20H6 = $_REQUEST['B20H6'];
$B20I6 = $_REQUEST['B20I6'];
$B20J6 = $_REQUEST['B20J6'];
$B20K6 = $_REQUEST['B20K6'];
$B20L6 = $_REQUEST['B20L6'];
$B20M6 = $_REQUEST['B20M6'];
$B20N6 = $_REQUEST['B20N6'];
$B20O6 = $_REQUEST['B20O6'];
$B20P6 = $_REQUEST['B20P6'];
$B20A7 = $_REQUEST['B20A7'];
$B20B7 = $_REQUEST['B20B7'];
$B20C7 = $_REQUEST['B20C7'];
$B20D7 = $_REQUEST['B20D7'];
$B20E7 = $_REQUEST['B20E7'];
$B20F7 = $_REQUEST['B20F7'];
$B20G7 = $_REQUEST['B20G7'];
$B20H7 = $_REQUEST['B20H7'];
$B20I7 = $_REQUEST['B20I7'];
$B20J7 = $_REQUEST['B20J7'];
$B20K7 = $_REQUEST['B20K7'];
$B20L7 = $_REQUEST['B20L7'];
$B20M7 = $_REQUEST['B20M7'];
$B20N7 = $_REQUEST['B20N7'];
$B20O7 = $_REQUEST['B20O7'];
$B20P7 = $_REQUEST['B20P7'];
$B231 = $_REQUEST['B231'];
$B23A1 = $_REQUEST['B23A1'];
$B23B1 = $_REQUEST['B23B1'];
$B23C1 = $_REQUEST['B23C1'];
$B23D1 = $_REQUEST['B23D1'];
$B23E1 = $_REQUEST['B23E1'];
$B23F1 = $_REQUEST['B23F1'];
$B23G1 = $_REQUEST['B23G1'];
$B23H1 = $_REQUEST['B23H1'];
$B23I1 = $_REQUEST['B23I1'];
$B23J1 = $_REQUEST['B23J1'];
$B23K1 = $_REQUEST['B23K1'];
$B23L1 = $_REQUEST['B23L1'];
$B23M1 = $_REQUEST['B23M1'];
$B23N1 = $_REQUEST['B23N1'];
$B232 = $_REQUEST['B232'];
$B23A2 = $_REQUEST['B23A2'];
$B23B2 = $_REQUEST['B23B2'];
$B23C2 = $_REQUEST['B23C2'];
$B23D2 = $_REQUEST['B23D2'];
$B23E2 = $_REQUEST['B23E2'];
$B23F2 = $_REQUEST['B23F2'];
$B23G2 = $_REQUEST['B23G2'];
$B23H2 = $_REQUEST['B23H2'];
$B23I2 = $_REQUEST['B23I2'];
$B23J2 = $_REQUEST['B23J2'];
$B23K2 = $_REQUEST['B23K2'];
$B23L2 = $_REQUEST['B23L2'];
$B23M2 = $_REQUEST['B23M2'];
$B23N2 = $_REQUEST['B23N2'];
$B233 = $_REQUEST['B233'];
$B23A3 = $_REQUEST['B23A3'];
$B23B3 = $_REQUEST['B23B3'];
$B23C3 = $_REQUEST['B23C3'];
$B23D3 = $_REQUEST['B23D3'];
$B23E3 = $_REQUEST['B23E3'];
$B23F3 = $_REQUEST['B23F3'];
$B23G3 = $_REQUEST['B23G3'];
$B23H3 = $_REQUEST['B23H3'];
$B23I3 = $_REQUEST['B23I3'];
$B23J3 = $_REQUEST['B23J3'];
$B23K3 = $_REQUEST['B23K3'];
$B23L3 = $_REQUEST['B23L3'];
$B23M3 = $_REQUEST['B23M3'];
$B23N3 = $_REQUEST['B23N3'];
$B234 = $_REQUEST['B234'];
$B23A4 = $_REQUEST['B23A4'];
$B23B4 = $_REQUEST['B23B4'];
$B23C4 = $_REQUEST['B23C4'];
$B23D4 = $_REQUEST['B23D4'];
$B23E4 = $_REQUEST['B23E4'];
$B23F4 = $_REQUEST['B23F4'];
$B23G4 = $_REQUEST['B23G4'];
$B23H4 = $_REQUEST['B23H4'];
$B23I4 = $_REQUEST['B23I4'];
$B23J4 = $_REQUEST['B23J4'];
$B23K4 = $_REQUEST['B23K4'];
$B23L4 = $_REQUEST['B23L4'];
$B23M4 = $_REQUEST['B23M4'];
$B23N4 = $_REQUEST['B23N4'];
$B235 = $_REQUEST['B235'];
$B23A5 = $_REQUEST['B23A5'];
$B23B5 = $_REQUEST['B23B5'];
$B23C5 = $_REQUEST['B23C5'];
$B23D5 = $_REQUEST['B23D5'];
$B23E5 = $_REQUEST['B23E5'];
$B23F5 = $_REQUEST['B23F5'];
$B23G5 = $_REQUEST['B23G5'];
$B23H5 = $_REQUEST['B23H5'];
$B23I5 = $_REQUEST['B23I5'];
$B23J5 = $_REQUEST['B23J5'];
$B23K5 = $_REQUEST['B23K5'];
$B23L5 = $_REQUEST['B23L5'];
$B23M5 = $_REQUEST['B23M5'];
$B23N5 = $_REQUEST['B23N5'];
$cancelacion = $_REQUEST['cancelacion'];
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
`B8`, 
`B9`, 
`B10`, 
`B12`, 
`B13`, 
`B13a`, 
`B14`, 
`B15`, 
`B16`, 
`B17`, 
`B18`, 
`B19`, 
`B11a`, 
`B11b`, 
`B11c`, 
`B11d`, 
`B11e`, 
`B11f`, 
`B11g`, 
`B11h`, 
`B11i`, 
`B11j`, 
`B11k`, 
`B11l`, 
`B20a`, 
`B20b`, 
`B20c`, 
`B20d`, 
`B20e`, 
`B20f`, 
`B20g`, 
`B20h`, 
`B20A1`, 
`B20B1`, 
`B20C1`, 
`B20D1`, 
`B20E1`, 
`B20F1`, 
`B20G1`, 
`B20H1`, 
`B20I1`, 
`B20J1`, 
`B20K1`, 
`B20L1`, 
`B20M1`, 
`B20N1`, 
`B20O1`, 
`B20P1`, 
`B20A2`, 
`B20B2`, 
`B20C2`, 
`B20D2`, 
`B20E2`, 
`B20F2`, 
`B20G2`, 
`B20H2`, 
`B20I2`, 
`B20J2`, 
`B20K2`, 
`B20L2`, 
`B20M2`, 
`B20N2`, 
`B20O2`, 
`B20P2`, 
`B20A3`, 
`B20B3`, 
`B20C3`, 
`B20D3`, 
`B20E3`, 
`B20F3`, 
`B20G3`, 
`B20H3`, 
`B20I3`, 
`B20J3`, 
`B20K3`, 
`B20L3`, 
`B20M3`, 
`B20N3`, 
`B20O3`, 
`B20P3`, 
`B20A4`, 
`B20B4`, 
`B20C4`, 
`B20D4`, 
`B20E4`, 
`B20F4`, 
`B20G4`, 
`B20H4`, 
`B20I4`, 
`B20J4`, 
`B20K4`, 
`B20L4`, 
`B20M4`, 
`B20N4`, 
`B20O4`, 
`B20P4`, 
`B20A5`, 
`B20B5`, 
`B20C5`, 
`B20D5`, 
`B20E5`, 
`B20F5`, 
`B20G5`, 
`B20H5`, 
`B20I5`, 
`B20J5`, 
`B20K5`, 
`B20L5`, 
`B20M5`, 
`B20N5`, 
`B20O5`, 
`B20P5`, 
`B20A6`, 
`B20B6`, 
`B20C6`, 
`B20D6`, 
`B20E6`, 
`B20F6`, 
`B20G6`, 
`B20H6`, 
`B20I6`, 
`B20J6`, 
`B20K6`, 
`B20L6`, 
`B20M6`, 
`B20N6`, 
`B20O6`, 
`B20P6`, 
`B20A7`, 
`B20B7`, 
`B20C7`, 
`B20D7`, 
`B20E7`, 
`B20F7`, 
`B20G7`, 
`B20H7`, 
`B20I7`, 
`B20J7`, 
`B20K7`, 
`B20L7`, 
`B20M7`, 
`B20N7`, 
`B20O7`, 
`B20P7`, 
`B231`, 
`B23A1`, 
`B23B1`, 
`B23C1`, 
`B23D1`, 
`B23E1`, 
`B23F1`, 
`B23G1`, 
`B23H1`, 
`B23I1`, 
`B23J1`, 
`B23K1`, 
`B23L1`, 
`B23M1`, 
`B23N1`, 
`B232`, 
`B23A2`, 
`B23B2`, 
`B23C2`, 
`B23D2`, 
`B23E2`, 
`B23F2`, 
`B23G2`, 
`B23H2`, 
`B23I2`, 
`B23J2`, 
`B23K2`, 
`B23L2`, 
`B23M2`, 
`B23N2`, 
`B233`, 
`B23A3`, 
`B23B3`, 
`B23C3`, 
`B23D3`, 
`B23E3`, 
`B23F3`, 
`B23G3`, 
`B23H3`, 
`B23I3`, 
`B23J3`, 
`B23K3`, 
`B23L3`, 
`B23M3`, 
`B23N3`, 
`B234`, 
`B23A4`, 
`B23B4`, 
`B23C4`, 
`B23D4`, 
`B23E4`, 
`B23F4`, 
`B23G4`, 
`B23H4`, 
`B23I4`, 
`B23J4`, 
`B23K4`, 
`B23L4`, 
`B23M4`, 
`B23N4`, 
`B235`, 
`B23A5`, 
`B23B5`, 
`B23C5`, 
`B23D5`, 
`B23E5`, 
`B23F5`, 
`B23G5`, 
`B23H5`, 
`B23I5`, 
`B23J5`, 
`B23K5`, 
`B23L5`, 
`B23M5`, 
`B23N5`, 
`cancelacion`, 
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
'$B8', 
'$B9', 
'$B10', 
'$B12', 
'$B13', 
'$B13a', 
'$B14', 
'$B15', 
'$B16', 
'$B17', 
'$B18', 
'$B19', 
'$B11a', 
'$B11b', 
'$B11c', 
'$B11d', 
'$B11e', 
'$B11f', 
'$B11g', 
'$B11h', 
'$B11i', 
'$B11j', 
'$B11k', 
'$B11l', 
'$B20a', 
'$B20b', 
'$B20c', 
'$B20d', 
'$B20e', 
'$B20f', 
'$B20g', 
'$B20h', 
'$B20A1', 
'$B20B1', 
'$B20C1', 
'$B20D1', 
'$B20E1', 
'$B20F1', 
'$B20G1', 
'$B20H1', 
'$B20I1', 
'$B20J1', 
'$B20K1', 
'$B20L1', 
'$B20M1', 
'$B20N1', 
'$B20O1', 
'$B20P1', 
'$B20A2', 
'$B20B2', 
'$B20C2', 
'$B20D2', 
'$B20E2', 
'$B20F2', 
'$B20G2', 
'$B20H2', 
'$B20I2', 
'$B20J2', 
'$B20K2', 
'$B20L2', 
'$B20M2', 
'$B20N2', 
'$B20O2', 
'$B20P2', 
'$B20A3', 
'$B20B3', 
'$B20C3', 
'$B20D3', 
'$B20E3', 
'$B20F3', 
'$B20G3', 
'$B20H3', 
'$B20I3', 
'$B20J3', 
'$B20K3', 
'$B20L3', 
'$B20M3', 
'$B20N3', 
'$B20O3', 
'$B20P3', 
'$B20A4', 
'$B20B4', 
'$B20C4', 
'$B20D4', 
'$B20E4', 
'$B20F4', 
'$B20G4', 
'$B20H4', 
'$B20I4', 
'$B20J4', 
'$B20K4', 
'$B20L4', 
'$B20M4', 
'$B20N4', 
'$B20O4', 
'$B20P4', 
'$B20A5', 
'$B20B5', 
'$B20C5', 
'$B20D5', 
'$B20E5', 
'$B20F5', 
'$B20G5', 
'$B20H5', 
'$B20I5', 
'$B20J5', 
'$B20K5', 
'$B20L5', 
'$B20M5', 
'$B20N5', 
'$B20O5', 
'$B20P5', 
'$B20A6', 
'$B20B6', 
'$B20C6', 
'$B20D6', 
'$B20E6', 
'$B20F6', 
'$B20G6', 
'$B20H6', 
'$B20I6', 
'$B20J6', 
'$B20K6', 
'$B20L6', 
'$B20M6', 
'$B20N6', 
'$B20O6', 
'$B20P6', 
'$B20A7', 
'$B20B7', 
'$B20C7', 
'$B20D7', 
'$B20E7', 
'$B20F7', 
'$B20G7', 
'$B20H7', 
'$B20I7', 
'$B20J7', 
'$B20K7', 
'$B20L7', 
'$B20M7', 
'$B20N7', 
'$B20O7', 
'$B20P7', 
'$B231', 
'$B23A1', 
'$B23B1', 
'$B23C1', 
'$B23D1', 
'$B23E1', 
'$B23F1', 
'$B23G1', 
'$B23H1', 
'$B23I1', 
'$B23J1', 
'$B23K1', 
'$B23L1', 
'$B23M1', 
'$B23N1', 
'$B232', 
'$B23A2', 
'$B23B2', 
'$B23C2', 
'$B23D2', 
'$B23E2', 
'$B23F2', 
'$B23G2', 
'$B23H2', 
'$B23I2', 
'$B23J2', 
'$B23K2', 
'$B23L2', 
'$B23M2', 
'$B23N2', 
'$B233', 
'$B23A3', 
'$B23B3', 
'$B23C3', 
'$B23D3', 
'$B23E3', 
'$B23F3', 
'$B23G3', 
'$B23H3', 
'$B23I3', 
'$B23J3', 
'$B23K3', 
'$B23L3', 
'$B23M3', 
'$B23N3', 
'$B234', 
'$B23A4', 
'$B23B4', 
'$B23C4', 
'$B23D4', 
'$B23E4', 
'$B23F4', 
'$B23G4', 
'$B23H4', 
'$B23I4', 
'$B23J4', 
'$B23K4', 
'$B23L4', 
'$B23M4', 
'$B23N4', 
'$B235', 
'$B23A5', 
'$B23B5', 
'$B23C5', 
'$B23D5', 
'$B23E5', 
'$B23F5', 
'$B23G5', 
'$B23H5', 
'$B23I5', 
'$B23J5', 
'$B23K5', 
'$B23L5', 
'$B23M5', 
'$B23N5', 
'$cancelacion', 
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
