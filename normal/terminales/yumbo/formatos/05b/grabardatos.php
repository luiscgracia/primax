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
$pTEC = $_REQUEST['pTEC'];
$tipo_trabajo = $_REQUEST['tipo_trabajo'];
$dia1_fecha = $_REQUEST['dia1_fecha'];
$dia1_equipo = $_REQUEST['dia1_equipo'];
$dia1_marca = $_REQUEST['dia1_marca'];
$dia1_fecha_calib = $_REQUEST['dia1_fecha_calib'];
$dia1_propietario = $_REQUEST['dia1_propietario'];
$dia1_bumptest_por = $_REQUEST['dia1_bumptest_por'];
$dia1_LEL = $_REQUEST['dia1_LEL'];
$dia1_O = $_REQUEST['dia1_O'];
$dia1_H2S = $_REQUEST['dia1_H2S'];
$dia1_CO = $_REQUEST['dia1_CO'];
$dia1_pasa_bumptest = $_REQUEST['dia1_pasa_bumptest'];
$dia1_H1_1 = $_REQUEST['dia1_H1_1'];
$dia1_R1_1 = $_REQUEST['dia1_R1_1'];
$dia1_H2_1 = $_REQUEST['dia1_H2_1'];
$dia1_R2_1 = $_REQUEST['dia1_R2_1'];
$dia1_H3_1 = $_REQUEST['dia1_H3_1'];
$dia1_R3_1 = $_REQUEST['dia1_R3_1'];
$dia1_H4_1 = $_REQUEST['dia1_H4_1'];
$dia1_R4_1 = $_REQUEST['dia1_R4_1'];
$dia1_H5_1 = $_REQUEST['dia1_H5_1'];
$dia1_R5_1 = $_REQUEST['dia1_R5_1'];
$dia1_H6_1 = $_REQUEST['dia1_H6_1'];
$dia1_R6_1 = $_REQUEST['dia1_R6_1'];
$dia1_H7_1 = $_REQUEST['dia1_H7_1'];
$dia1_R7_1 = $_REQUEST['dia1_R7_1'];
$dia1_H8_1 = $_REQUEST['dia1_H8_1'];
$dia1_R8_1 = $_REQUEST['dia1_R8_1'];
$dia1_H9_1 = $_REQUEST['dia1_H9_1'];
$dia1_R9_1 = $_REQUEST['dia1_R9_1'];
$dia1_H10_1 = $_REQUEST['dia1_H10_1'];
$dia1_R10_1 = $_REQUEST['dia1_R10_1'];
$dia1_H1_2 = $_REQUEST['dia1_H1_2'];
$dia1_R1_2 = $_REQUEST['dia1_R1_2'];
$dia1_H2_2 = $_REQUEST['dia1_H2_2'];
$dia1_R2_2 = $_REQUEST['dia1_R2_2'];
$dia1_H3_2 = $_REQUEST['dia1_H3_2'];
$dia1_R3_2 = $_REQUEST['dia1_R3_2'];
$dia1_H4_2 = $_REQUEST['dia1_H4_2'];
$dia1_R4_2 = $_REQUEST['dia1_R4_2'];
$dia1_H5_2 = $_REQUEST['dia1_H5_2'];
$dia1_R5_2 = $_REQUEST['dia1_R5_2'];
$dia1_H6_2 = $_REQUEST['dia1_H6_2'];
$dia1_R6_2 = $_REQUEST['dia1_R6_2'];
$dia1_H7_2 = $_REQUEST['dia1_H7_2'];
$dia1_R7_2 = $_REQUEST['dia1_R7_2'];
$dia1_H8_2 = $_REQUEST['dia1_H8_2'];
$dia1_R8_2 = $_REQUEST['dia1_R8_2'];
$dia1_H9_2 = $_REQUEST['dia1_H9_2'];
$dia1_R9_2 = $_REQUEST['dia1_R9_2'];
$dia1_H10_2 = $_REQUEST['dia1_H10_2'];
$dia1_R10_2 = $_REQUEST['dia1_R10_2'];
$dia1_H1_3 = $_REQUEST['dia1_H1_3'];
$dia1_R1_3 = $_REQUEST['dia1_R1_3'];
$dia1_H2_3 = $_REQUEST['dia1_H2_3'];
$dia1_R2_3 = $_REQUEST['dia1_R2_3'];
$dia1_H3_3 = $_REQUEST['dia1_H3_3'];
$dia1_R3_3 = $_REQUEST['dia1_R3_3'];
$dia1_H4_3 = $_REQUEST['dia1_H4_3'];
$dia1_R4_3 = $_REQUEST['dia1_R4_3'];
$dia1_H5_3 = $_REQUEST['dia1_H5_3'];
$dia1_R5_3 = $_REQUEST['dia1_R5_3'];
$dia1_H6_3 = $_REQUEST['dia1_H6_3'];
$dia1_R6_3 = $_REQUEST['dia1_R6_3'];
$dia1_H7_3 = $_REQUEST['dia1_H7_3'];
$dia1_R7_3 = $_REQUEST['dia1_R7_3'];
$dia1_H8_3 = $_REQUEST['dia1_H8_3'];
$dia1_R8_3 = $_REQUEST['dia1_R8_3'];
$dia1_H9_3 = $_REQUEST['dia1_H9_3'];
$dia1_R9_3 = $_REQUEST['dia1_R9_3'];
$dia1_H10_3 = $_REQUEST['dia1_H10_3'];
$dia1_R10_3 = $_REQUEST['dia1_R10_3'];
$dia1_H1_4 = $_REQUEST['dia1_H1_4'];
$dia1_R1_4 = $_REQUEST['dia1_R1_4'];
$dia1_H2_4 = $_REQUEST['dia1_H2_4'];
$dia1_R2_4 = $_REQUEST['dia1_R2_4'];
$dia1_H3_4 = $_REQUEST['dia1_H3_4'];
$dia1_R3_4 = $_REQUEST['dia1_R3_4'];
$dia1_H4_4 = $_REQUEST['dia1_H4_4'];
$dia1_R4_4 = $_REQUEST['dia1_R4_4'];
$dia1_H5_4 = $_REQUEST['dia1_H5_4'];
$dia1_R5_4 = $_REQUEST['dia1_R5_4'];
$dia1_H6_4 = $_REQUEST['dia1_H6_4'];
$dia1_R6_4 = $_REQUEST['dia1_R6_4'];
$dia1_H7_4 = $_REQUEST['dia1_H7_4'];
$dia1_R7_4 = $_REQUEST['dia1_R7_4'];
$dia1_H8_4 = $_REQUEST['dia1_H8_4'];
$dia1_R8_4 = $_REQUEST['dia1_R8_4'];
$dia1_H9_4 = $_REQUEST['dia1_H9_4'];
$dia1_R9_4 = $_REQUEST['dia1_R9_4'];
$dia1_H10_4 = $_REQUEST['dia1_H10_4'];
$dia1_R10_4 = $_REQUEST['dia1_R10_4'];
$dia1_nombre1 = $_REQUEST['dia1_nombre1'];
$dia1_HE1_1 = $_REQUEST['dia1_HE1_1'];
$dia1_HS1_1 = $_REQUEST['dia1_HS1_1'];
$dia1_HE2_1 = $_REQUEST['dia1_HE2_1'];
$dia1_HS2_1 = $_REQUEST['dia1_HS2_1'];
$dia1_HE3_1 = $_REQUEST['dia1_HE3_1'];
$dia1_HS3_1 = $_REQUEST['dia1_HS3_1'];
$dia1_HE4_1 = $_REQUEST['dia1_HE4_1'];
$dia1_HS4_1 = $_REQUEST['dia1_HS4_1'];
$dia1_HE5_1 = $_REQUEST['dia1_HE5_1'];
$dia1_HS5_1 = $_REQUEST['dia1_HS5_1'];
$dia1_nombre2 = $_REQUEST['dia1_nombre2'];
$dia1_HE1_2 = $_REQUEST['dia1_HE1_2'];
$dia1_HS1_2 = $_REQUEST['dia1_HS1_2'];
$dia1_HE2_2 = $_REQUEST['dia1_HE2_2'];
$dia1_HS2_2 = $_REQUEST['dia1_HS2_2'];
$dia1_HE3_2 = $_REQUEST['dia1_HE3_2'];
$dia1_HS3_2 = $_REQUEST['dia1_HS3_2'];
$dia1_HE4_2 = $_REQUEST['dia1_HE4_2'];
$dia1_HS4_2 = $_REQUEST['dia1_HS4_2'];
$dia1_HE5_2 = $_REQUEST['dia1_HE5_2'];
$dia1_HS5_2 = $_REQUEST['dia1_HS5_2'];
$dia1_nombre3 = $_REQUEST['dia1_nombre3'];
$dia1_HE1_3 = $_REQUEST['dia1_HE1_3'];
$dia1_HS1_3 = $_REQUEST['dia1_HS1_3'];
$dia1_HE2_3 = $_REQUEST['dia1_HE2_3'];
$dia1_HS2_3 = $_REQUEST['dia1_HS2_3'];
$dia1_HE3_3 = $_REQUEST['dia1_HE3_3'];
$dia1_HS3_3 = $_REQUEST['dia1_HS3_3'];
$dia1_HE4_3 = $_REQUEST['dia1_HE4_3'];
$dia1_HS4_3 = $_REQUEST['dia1_HS4_3'];
$dia1_HE5_3 = $_REQUEST['dia1_HE5_3'];
$dia1_HS5_3 = $_REQUEST['dia1_HS5_3'];
$dia1_nombre4 = $_REQUEST['dia1_nombre4'];
$dia1_HE1_4 = $_REQUEST['dia1_HE1_4'];
$dia1_HS1_4 = $_REQUEST['dia1_HS1_4'];
$dia1_HE2_4 = $_REQUEST['dia1_HE2_4'];
$dia1_HS2_4 = $_REQUEST['dia1_HS2_4'];
$dia1_HE3_4 = $_REQUEST['dia1_HE3_4'];
$dia1_HS3_4 = $_REQUEST['dia1_HS3_4'];
$dia1_HE4_4 = $_REQUEST['dia1_HE4_4'];
$dia1_HS4_4 = $_REQUEST['dia1_HS4_4'];
$dia1_HE5_4 = $_REQUEST['dia1_HE5_4'];
$dia1_HS5_4 = $_REQUEST['dia1_HS5_4'];
$dia1_nombre5 = $_REQUEST['dia1_nombre5'];
$dia1_HE1_5 = $_REQUEST['dia1_HE1_5'];
$dia1_HS1_5 = $_REQUEST['dia1_HS1_5'];
$dia1_HE2_5 = $_REQUEST['dia1_HE2_5'];
$dia1_HS2_5 = $_REQUEST['dia1_HS2_5'];
$dia1_HE3_5 = $_REQUEST['dia1_HE3_5'];
$dia1_HS3_5 = $_REQUEST['dia1_HS3_5'];
$dia1_HE4_5 = $_REQUEST['dia1_HE4_5'];
$dia1_HS4_5 = $_REQUEST['dia1_HS4_5'];
$dia1_HE5_5 = $_REQUEST['dia1_HE5_5'];
$dia1_HS5_5 = $_REQUEST['dia1_HS5_5'];
$dia2_fecha = $_REQUEST['dia2_fecha'];
$dia2_equipo = $_REQUEST['dia2_equipo'];
$dia2_marca = $_REQUEST['dia2_marca'];
$dia2_fecha_calib = $_REQUEST['dia2_fecha_calib'];
$dia2_propietario = $_REQUEST['dia2_propietario'];
$dia2_bumptest_por = $_REQUEST['dia2_bumptest_por'];
$dia2_LEL = $_REQUEST['dia2_LEL'];
$dia2_O = $_REQUEST['dia2_O'];
$dia2_H2S = $_REQUEST['dia2_H2S'];
$dia2_CO = $_REQUEST['dia2_CO'];
$dia2_pasa_bumptest = $_REQUEST['dia2_pasa_bumptest'];
$dia2_H1_1 = $_REQUEST['dia2_H1_1'];
$dia2_R1_1 = $_REQUEST['dia2_R1_1'];
$dia2_H2_1 = $_REQUEST['dia2_H2_1'];
$dia2_R2_1 = $_REQUEST['dia2_R2_1'];
$dia2_H3_1 = $_REQUEST['dia2_H3_1'];
$dia2_R3_1 = $_REQUEST['dia2_R3_1'];
$dia2_H4_1 = $_REQUEST['dia2_H4_1'];
$dia2_R4_1 = $_REQUEST['dia2_R4_1'];
$dia2_H5_1 = $_REQUEST['dia2_H5_1'];
$dia2_R5_1 = $_REQUEST['dia2_R5_1'];
$dia2_H6_1 = $_REQUEST['dia2_H6_1'];
$dia2_R6_1 = $_REQUEST['dia2_R6_1'];
$dia2_H7_1 = $_REQUEST['dia2_H7_1'];
$dia2_R7_1 = $_REQUEST['dia2_R7_1'];
$dia2_H8_1 = $_REQUEST['dia2_H8_1'];
$dia2_R8_1 = $_REQUEST['dia2_R8_1'];
$dia2_H9_1 = $_REQUEST['dia2_H9_1'];
$dia2_R9_1 = $_REQUEST['dia2_R9_1'];
$dia2_H10_1 = $_REQUEST['dia2_H10_1'];
$dia2_R10_1 = $_REQUEST['dia2_R10_1'];
$dia2_H1_2 = $_REQUEST['dia2_H1_2'];
$dia2_R1_2 = $_REQUEST['dia2_R1_2'];
$dia2_H2_2 = $_REQUEST['dia2_H2_2'];
$dia2_R2_2 = $_REQUEST['dia2_R2_2'];
$dia2_H3_2 = $_REQUEST['dia2_H3_2'];
$dia2_R3_2 = $_REQUEST['dia2_R3_2'];
$dia2_H4_2 = $_REQUEST['dia2_H4_2'];
$dia2_R4_2 = $_REQUEST['dia2_R4_2'];
$dia2_H5_2 = $_REQUEST['dia2_H5_2'];
$dia2_R5_2 = $_REQUEST['dia2_R5_2'];
$dia2_H6_2 = $_REQUEST['dia2_H6_2'];
$dia2_R6_2 = $_REQUEST['dia2_R6_2'];
$dia2_H7_2 = $_REQUEST['dia2_H7_2'];
$dia2_R7_2 = $_REQUEST['dia2_R7_2'];
$dia2_H8_2 = $_REQUEST['dia2_H8_2'];
$dia2_R8_2 = $_REQUEST['dia2_R8_2'];
$dia2_H9_2 = $_REQUEST['dia2_H9_2'];
$dia2_R9_2 = $_REQUEST['dia2_R9_2'];
$dia2_H10_2 = $_REQUEST['dia2_H10_2'];
$dia2_R10_2 = $_REQUEST['dia2_R10_2'];
$dia2_H1_3 = $_REQUEST['dia2_H1_3'];
$dia2_R1_3 = $_REQUEST['dia2_R1_3'];
$dia2_H2_3 = $_REQUEST['dia2_H2_3'];
$dia2_R2_3 = $_REQUEST['dia2_R2_3'];
$dia2_H3_3 = $_REQUEST['dia2_H3_3'];
$dia2_R3_3 = $_REQUEST['dia2_R3_3'];
$dia2_H4_3 = $_REQUEST['dia2_H4_3'];
$dia2_R4_3 = $_REQUEST['dia2_R4_3'];
$dia2_H5_3 = $_REQUEST['dia2_H5_3'];
$dia2_R5_3 = $_REQUEST['dia2_R5_3'];
$dia2_H6_3 = $_REQUEST['dia2_H6_3'];
$dia2_R6_3 = $_REQUEST['dia2_R6_3'];
$dia2_H7_3 = $_REQUEST['dia2_H7_3'];
$dia2_R7_3 = $_REQUEST['dia2_R7_3'];
$dia2_H8_3 = $_REQUEST['dia2_H8_3'];
$dia2_R8_3 = $_REQUEST['dia2_R8_3'];
$dia2_H9_3 = $_REQUEST['dia2_H9_3'];
$dia2_R9_3 = $_REQUEST['dia2_R9_3'];
$dia2_H10_3 = $_REQUEST['dia2_H10_3'];
$dia2_R10_3 = $_REQUEST['dia2_R10_3'];
$dia2_H1_4 = $_REQUEST['dia2_H1_4'];
$dia2_R1_4 = $_REQUEST['dia2_R1_4'];
$dia2_H2_4 = $_REQUEST['dia2_H2_4'];
$dia2_R2_4 = $_REQUEST['dia2_R2_4'];
$dia2_H3_4 = $_REQUEST['dia2_H3_4'];
$dia2_R3_4 = $_REQUEST['dia2_R3_4'];
$dia2_H4_4 = $_REQUEST['dia2_H4_4'];
$dia2_R4_4 = $_REQUEST['dia2_R4_4'];
$dia2_H5_4 = $_REQUEST['dia2_H5_4'];
$dia2_R5_4 = $_REQUEST['dia2_R5_4'];
$dia2_H6_4 = $_REQUEST['dia2_H6_4'];
$dia2_R6_4 = $_REQUEST['dia2_R6_4'];
$dia2_H7_4 = $_REQUEST['dia2_H7_4'];
$dia2_R7_4 = $_REQUEST['dia2_R7_4'];
$dia2_H8_4 = $_REQUEST['dia2_H8_4'];
$dia2_R8_4 = $_REQUEST['dia2_R8_4'];
$dia2_H9_4 = $_REQUEST['dia2_H9_4'];
$dia2_R9_4 = $_REQUEST['dia2_R9_4'];
$dia2_H10_4 = $_REQUEST['dia2_H10_4'];
$dia2_R10_4 = $_REQUEST['dia2_R10_4'];
$dia2_nombre1 = $_REQUEST['dia2_nombre1'];
$dia2_HE1_1 = $_REQUEST['dia2_HE1_1'];
$dia2_HS1_1 = $_REQUEST['dia2_HS1_1'];
$dia2_HE2_1 = $_REQUEST['dia2_HE2_1'];
$dia2_HS2_1 = $_REQUEST['dia2_HS2_1'];
$dia2_HE3_1 = $_REQUEST['dia2_HE3_1'];
$dia2_HS3_1 = $_REQUEST['dia2_HS3_1'];
$dia2_HE4_1 = $_REQUEST['dia2_HE4_1'];
$dia2_HS4_1 = $_REQUEST['dia2_HS4_1'];
$dia2_HE5_1 = $_REQUEST['dia2_HE5_1'];
$dia2_HS5_1 = $_REQUEST['dia2_HS5_1'];
$dia2_nombre2 = $_REQUEST['dia2_nombre2'];
$dia2_HE1_2 = $_REQUEST['dia2_HE1_2'];
$dia2_HS1_2 = $_REQUEST['dia2_HS1_2'];
$dia2_HE2_2 = $_REQUEST['dia2_HE2_2'];
$dia2_HS2_2 = $_REQUEST['dia2_HS2_2'];
$dia2_HE3_2 = $_REQUEST['dia2_HE3_2'];
$dia2_HS3_2 = $_REQUEST['dia2_HS3_2'];
$dia2_HE4_2 = $_REQUEST['dia2_HE4_2'];
$dia2_HS4_2 = $_REQUEST['dia2_HS4_2'];
$dia2_HE5_2 = $_REQUEST['dia2_HE5_2'];
$dia2_HS5_2 = $_REQUEST['dia2_HS5_2'];
$dia2_nombre3 = $_REQUEST['dia2_nombre3'];
$dia2_HE1_3 = $_REQUEST['dia2_HE1_3'];
$dia2_HS1_3 = $_REQUEST['dia2_HS1_3'];
$dia2_HE2_3 = $_REQUEST['dia2_HE2_3'];
$dia2_HS2_3 = $_REQUEST['dia2_HS2_3'];
$dia2_HE3_3 = $_REQUEST['dia2_HE3_3'];
$dia2_HS3_3 = $_REQUEST['dia2_HS3_3'];
$dia2_HE4_3 = $_REQUEST['dia2_HE4_3'];
$dia2_HS4_3 = $_REQUEST['dia2_HS4_3'];
$dia2_HE5_3 = $_REQUEST['dia2_HE5_3'];
$dia2_HS5_3 = $_REQUEST['dia2_HS5_3'];
$dia2_nombre4 = $_REQUEST['dia2_nombre4'];
$dia2_HE1_4 = $_REQUEST['dia2_HE1_4'];
$dia2_HS1_4 = $_REQUEST['dia2_HS1_4'];
$dia2_HE2_4 = $_REQUEST['dia2_HE2_4'];
$dia2_HS2_4 = $_REQUEST['dia2_HS2_4'];
$dia2_HE3_4 = $_REQUEST['dia2_HE3_4'];
$dia2_HS3_4 = $_REQUEST['dia2_HS3_4'];
$dia2_HE4_4 = $_REQUEST['dia2_HE4_4'];
$dia2_HS4_4 = $_REQUEST['dia2_HS4_4'];
$dia2_HE5_4 = $_REQUEST['dia2_HE5_4'];
$dia2_HS5_4 = $_REQUEST['dia2_HS5_4'];
$dia2_nombre5 = $_REQUEST['dia2_nombre5'];
$dia2_HE1_5 = $_REQUEST['dia2_HE1_5'];
$dia2_HS1_5 = $_REQUEST['dia2_HS1_5'];
$dia2_HE2_5 = $_REQUEST['dia2_HE2_5'];
$dia2_HS2_5 = $_REQUEST['dia2_HS2_5'];
$dia2_HE3_5 = $_REQUEST['dia2_HE3_5'];
$dia2_HS3_5 = $_REQUEST['dia2_HS3_5'];
$dia2_HE4_5 = $_REQUEST['dia2_HE4_5'];
$dia2_HS4_5 = $_REQUEST['dia2_HS4_5'];
$dia2_HE5_5 = $_REQUEST['dia2_HE5_5'];
$dia2_HS5_5 = $_REQUEST['dia2_HS5_5'];
$dia3_fecha = $_REQUEST['dia3_fecha'];
$dia3_equipo = $_REQUEST['dia3_equipo'];
$dia3_marca = $_REQUEST['dia3_marca'];
$dia3_fecha_calib = $_REQUEST['dia3_fecha_calib'];
$dia3_propietario = $_REQUEST['dia3_propietario'];
$dia3_bumptest_por = $_REQUEST['dia3_bumptest_por'];
$dia3_LEL = $_REQUEST['dia3_LEL'];
$dia3_O = $_REQUEST['dia3_O'];
$dia3_H2S = $_REQUEST['dia3_H2S'];
$dia3_CO = $_REQUEST['dia3_CO'];
$dia3_pasa_bumptest = $_REQUEST['dia3_pasa_bumptest'];
$dia3_H1_1 = $_REQUEST['dia3_H1_1'];
$dia3_R1_1 = $_REQUEST['dia3_R1_1'];
$dia3_H2_1 = $_REQUEST['dia3_H2_1'];
$dia3_R2_1 = $_REQUEST['dia3_R2_1'];
$dia3_H3_1 = $_REQUEST['dia3_H3_1'];
$dia3_R3_1 = $_REQUEST['dia3_R3_1'];
$dia3_H4_1 = $_REQUEST['dia3_H4_1'];
$dia3_R4_1 = $_REQUEST['dia3_R4_1'];
$dia3_H5_1 = $_REQUEST['dia3_H5_1'];
$dia3_R5_1 = $_REQUEST['dia3_R5_1'];
$dia3_H6_1 = $_REQUEST['dia3_H6_1'];
$dia3_R6_1 = $_REQUEST['dia3_R6_1'];
$dia3_H7_1 = $_REQUEST['dia3_H7_1'];
$dia3_R7_1 = $_REQUEST['dia3_R7_1'];
$dia3_H8_1 = $_REQUEST['dia3_H8_1'];
$dia3_R8_1 = $_REQUEST['dia3_R8_1'];
$dia3_H9_1 = $_REQUEST['dia3_H9_1'];
$dia3_R9_1 = $_REQUEST['dia3_R9_1'];
$dia3_H10_1 = $_REQUEST['dia3_H10_1'];
$dia3_R10_1 = $_REQUEST['dia3_R10_1'];
$dia3_H1_2 = $_REQUEST['dia3_H1_2'];
$dia3_R1_2 = $_REQUEST['dia3_R1_2'];
$dia3_H2_2 = $_REQUEST['dia3_H2_2'];
$dia3_R2_2 = $_REQUEST['dia3_R2_2'];
$dia3_H3_2 = $_REQUEST['dia3_H3_2'];
$dia3_R3_2 = $_REQUEST['dia3_R3_2'];
$dia3_H4_2 = $_REQUEST['dia3_H4_2'];
$dia3_R4_2 = $_REQUEST['dia3_R4_2'];
$dia3_H5_2 = $_REQUEST['dia3_H5_2'];
$dia3_R5_2 = $_REQUEST['dia3_R5_2'];
$dia3_H6_2 = $_REQUEST['dia3_H6_2'];
$dia3_R6_2 = $_REQUEST['dia3_R6_2'];
$dia3_H7_2 = $_REQUEST['dia3_H7_2'];
$dia3_R7_2 = $_REQUEST['dia3_R7_2'];
$dia3_H8_2 = $_REQUEST['dia3_H8_2'];
$dia3_R8_2 = $_REQUEST['dia3_R8_2'];
$dia3_H9_2 = $_REQUEST['dia3_H9_2'];
$dia3_R9_2 = $_REQUEST['dia3_R9_2'];
$dia3_H10_2 = $_REQUEST['dia3_H10_2'];
$dia3_R10_2 = $_REQUEST['dia3_R10_2'];
$dia3_H1_3 = $_REQUEST['dia3_H1_3'];
$dia3_R1_3 = $_REQUEST['dia3_R1_3'];
$dia3_H2_3 = $_REQUEST['dia3_H2_3'];
$dia3_R2_3 = $_REQUEST['dia3_R2_3'];
$dia3_H3_3 = $_REQUEST['dia3_H3_3'];
$dia3_R3_3 = $_REQUEST['dia3_R3_3'];
$dia3_H4_3 = $_REQUEST['dia3_H4_3'];
$dia3_R4_3 = $_REQUEST['dia3_R4_3'];
$dia3_H5_3 = $_REQUEST['dia3_H5_3'];
$dia3_R5_3 = $_REQUEST['dia3_R5_3'];
$dia3_H6_3 = $_REQUEST['dia3_H6_3'];
$dia3_R6_3 = $_REQUEST['dia3_R6_3'];
$dia3_H7_3 = $_REQUEST['dia3_H7_3'];
$dia3_R7_3 = $_REQUEST['dia3_R7_3'];
$dia3_H8_3 = $_REQUEST['dia3_H8_3'];
$dia3_R8_3 = $_REQUEST['dia3_R8_3'];
$dia3_H9_3 = $_REQUEST['dia3_H9_3'];
$dia3_R9_3 = $_REQUEST['dia3_R9_3'];
$dia3_H10_3 = $_REQUEST['dia3_H10_3'];
$dia3_R10_3 = $_REQUEST['dia3_R10_3'];
$dia3_H1_4 = $_REQUEST['dia3_H1_4'];
$dia3_R1_4 = $_REQUEST['dia3_R1_4'];
$dia3_H2_4 = $_REQUEST['dia3_H2_4'];
$dia3_R2_4 = $_REQUEST['dia3_R2_4'];
$dia3_H3_4 = $_REQUEST['dia3_H3_4'];
$dia3_R3_4 = $_REQUEST['dia3_R3_4'];
$dia3_H4_4 = $_REQUEST['dia3_H4_4'];
$dia3_R4_4 = $_REQUEST['dia3_R4_4'];
$dia3_H5_4 = $_REQUEST['dia3_H5_4'];
$dia3_R5_4 = $_REQUEST['dia3_R5_4'];
$dia3_H6_4 = $_REQUEST['dia3_H6_4'];
$dia3_R6_4 = $_REQUEST['dia3_R6_4'];
$dia3_H7_4 = $_REQUEST['dia3_H7_4'];
$dia3_R7_4 = $_REQUEST['dia3_R7_4'];
$dia3_H8_4 = $_REQUEST['dia3_H8_4'];
$dia3_R8_4 = $_REQUEST['dia3_R8_4'];
$dia3_H9_4 = $_REQUEST['dia3_H9_4'];
$dia3_R9_4 = $_REQUEST['dia3_R9_4'];
$dia3_H10_4 = $_REQUEST['dia3_H10_4'];
$dia3_R10_4 = $_REQUEST['dia3_R10_4'];
$dia3_nombre1 = $_REQUEST['dia3_nombre1'];
$dia3_HE1_1 = $_REQUEST['dia3_HE1_1'];
$dia3_HS1_1 = $_REQUEST['dia3_HS1_1'];
$dia3_HE2_1 = $_REQUEST['dia3_HE2_1'];
$dia3_HS2_1 = $_REQUEST['dia3_HS2_1'];
$dia3_HE3_1 = $_REQUEST['dia3_HE3_1'];
$dia3_HS3_1 = $_REQUEST['dia3_HS3_1'];
$dia3_HE4_1 = $_REQUEST['dia3_HE4_1'];
$dia3_HS4_1 = $_REQUEST['dia3_HS4_1'];
$dia3_HE5_1 = $_REQUEST['dia3_HE5_1'];
$dia3_HS5_1 = $_REQUEST['dia3_HS5_1'];
$dia3_nombre2 = $_REQUEST['dia3_nombre2'];
$dia3_HE1_2 = $_REQUEST['dia3_HE1_2'];
$dia3_HS1_2 = $_REQUEST['dia3_HS1_2'];
$dia3_HE2_2 = $_REQUEST['dia3_HE2_2'];
$dia3_HS2_2 = $_REQUEST['dia3_HS2_2'];
$dia3_HE3_2 = $_REQUEST['dia3_HE3_2'];
$dia3_HS3_2 = $_REQUEST['dia3_HS3_2'];
$dia3_HE4_2 = $_REQUEST['dia3_HE4_2'];
$dia3_HS4_2 = $_REQUEST['dia3_HS4_2'];
$dia3_HE5_2 = $_REQUEST['dia3_HE5_2'];
$dia3_HS5_2 = $_REQUEST['dia3_HS5_2'];
$dia3_nombre3 = $_REQUEST['dia3_nombre3'];
$dia3_HE1_3 = $_REQUEST['dia3_HE1_3'];
$dia3_HS1_3 = $_REQUEST['dia3_HS1_3'];
$dia3_HE2_3 = $_REQUEST['dia3_HE2_3'];
$dia3_HS2_3 = $_REQUEST['dia3_HS2_3'];
$dia3_HE3_3 = $_REQUEST['dia3_HE3_3'];
$dia3_HS3_3 = $_REQUEST['dia3_HS3_3'];
$dia3_HE4_3 = $_REQUEST['dia3_HE4_3'];
$dia3_HS4_3 = $_REQUEST['dia3_HS4_3'];
$dia3_HE5_3 = $_REQUEST['dia3_HE5_3'];
$dia3_HS5_3 = $_REQUEST['dia3_HS5_3'];
$dia3_nombre4 = $_REQUEST['dia3_nombre4'];
$dia3_HE1_4 = $_REQUEST['dia3_HE1_4'];
$dia3_HS1_4 = $_REQUEST['dia3_HS1_4'];
$dia3_HE2_4 = $_REQUEST['dia3_HE2_4'];
$dia3_HS2_4 = $_REQUEST['dia3_HS2_4'];
$dia3_HE3_4 = $_REQUEST['dia3_HE3_4'];
$dia3_HS3_4 = $_REQUEST['dia3_HS3_4'];
$dia3_HE4_4 = $_REQUEST['dia3_HE4_4'];
$dia3_HS4_4 = $_REQUEST['dia3_HS4_4'];
$dia3_HE5_4 = $_REQUEST['dia3_HE5_4'];
$dia3_HS5_4 = $_REQUEST['dia3_HS5_4'];
$dia3_nombre5 = $_REQUEST['dia3_nombre5'];
$dia3_HE1_5 = $_REQUEST['dia3_HE1_5'];
$dia3_HS1_5 = $_REQUEST['dia3_HS1_5'];
$dia3_HE2_5 = $_REQUEST['dia3_HE2_5'];
$dia3_HS2_5 = $_REQUEST['dia3_HS2_5'];
$dia3_HE3_5 = $_REQUEST['dia3_HE3_5'];
$dia3_HS3_5 = $_REQUEST['dia3_HS3_5'];
$dia3_HE4_5 = $_REQUEST['dia3_HE4_5'];
$dia3_HS4_5 = $_REQUEST['dia3_HS4_5'];
$dia3_HE5_5 = $_REQUEST['dia3_HE5_5'];
$dia3_HS5_5 = $_REQUEST['dia3_HS5_5'];
$dia4_fecha = $_REQUEST['dia4_fecha'];
$dia4_equipo = $_REQUEST['dia4_equipo'];
$dia4_marca = $_REQUEST['dia4_marca'];
$dia4_fecha_calib = $_REQUEST['dia4_fecha_calib'];
$dia4_propietario = $_REQUEST['dia4_propietario'];
$dia4_bumptest_por = $_REQUEST['dia4_bumptest_por'];
$dia4_LEL = $_REQUEST['dia4_LEL'];
$dia4_O = $_REQUEST['dia4_O'];
$dia4_H2S = $_REQUEST['dia4_H2S'];
$dia4_CO = $_REQUEST['dia4_CO'];
$dia4_pasa_bumptest = $_REQUEST['dia4_pasa_bumptest'];
$dia4_H1_1 = $_REQUEST['dia4_H1_1'];
$dia4_R1_1 = $_REQUEST['dia4_R1_1'];
$dia4_H2_1 = $_REQUEST['dia4_H2_1'];
$dia4_R2_1 = $_REQUEST['dia4_R2_1'];
$dia4_H3_1 = $_REQUEST['dia4_H3_1'];
$dia4_R3_1 = $_REQUEST['dia4_R3_1'];
$dia4_H4_1 = $_REQUEST['dia4_H4_1'];
$dia4_R4_1 = $_REQUEST['dia4_R4_1'];
$dia4_H5_1 = $_REQUEST['dia4_H5_1'];
$dia4_R5_1 = $_REQUEST['dia4_R5_1'];
$dia4_H6_1 = $_REQUEST['dia4_H6_1'];
$dia4_R6_1 = $_REQUEST['dia4_R6_1'];
$dia4_H7_1 = $_REQUEST['dia4_H7_1'];
$dia4_R7_1 = $_REQUEST['dia4_R7_1'];
$dia4_H8_1 = $_REQUEST['dia4_H8_1'];
$dia4_R8_1 = $_REQUEST['dia4_R8_1'];
$dia4_H9_1 = $_REQUEST['dia4_H9_1'];
$dia4_R9_1 = $_REQUEST['dia4_R9_1'];
$dia4_H10_1 = $_REQUEST['dia4_H10_1'];
$dia4_R10_1 = $_REQUEST['dia4_R10_1'];
$dia4_H1_2 = $_REQUEST['dia4_H1_2'];
$dia4_R1_2 = $_REQUEST['dia4_R1_2'];
$dia4_H2_2 = $_REQUEST['dia4_H2_2'];
$dia4_R2_2 = $_REQUEST['dia4_R2_2'];
$dia4_H3_2 = $_REQUEST['dia4_H3_2'];
$dia4_R3_2 = $_REQUEST['dia4_R3_2'];
$dia4_H4_2 = $_REQUEST['dia4_H4_2'];
$dia4_R4_2 = $_REQUEST['dia4_R4_2'];
$dia4_H5_2 = $_REQUEST['dia4_H5_2'];
$dia4_R5_2 = $_REQUEST['dia4_R5_2'];
$dia4_H6_2 = $_REQUEST['dia4_H6_2'];
$dia4_R6_2 = $_REQUEST['dia4_R6_2'];
$dia4_H7_2 = $_REQUEST['dia4_H7_2'];
$dia4_R7_2 = $_REQUEST['dia4_R7_2'];
$dia4_H8_2 = $_REQUEST['dia4_H8_2'];
$dia4_R8_2 = $_REQUEST['dia4_R8_2'];
$dia4_H9_2 = $_REQUEST['dia4_H9_2'];
$dia4_R9_2 = $_REQUEST['dia4_R9_2'];
$dia4_H10_2 = $_REQUEST['dia4_H10_2'];
$dia4_R10_2 = $_REQUEST['dia4_R10_2'];
$dia4_H1_3 = $_REQUEST['dia4_H1_3'];
$dia4_R1_3 = $_REQUEST['dia4_R1_3'];
$dia4_H2_3 = $_REQUEST['dia4_H2_3'];
$dia4_R2_3 = $_REQUEST['dia4_R2_3'];
$dia4_H3_3 = $_REQUEST['dia4_H3_3'];
$dia4_R3_3 = $_REQUEST['dia4_R3_3'];
$dia4_H4_3 = $_REQUEST['dia4_H4_3'];
$dia4_R4_3 = $_REQUEST['dia4_R4_3'];
$dia4_H5_3 = $_REQUEST['dia4_H5_3'];
$dia4_R5_3 = $_REQUEST['dia4_R5_3'];
$dia4_H6_3 = $_REQUEST['dia4_H6_3'];
$dia4_R6_3 = $_REQUEST['dia4_R6_3'];
$dia4_H7_3 = $_REQUEST['dia4_H7_3'];
$dia4_R7_3 = $_REQUEST['dia4_R7_3'];
$dia4_H8_3 = $_REQUEST['dia4_H8_3'];
$dia4_R8_3 = $_REQUEST['dia4_R8_3'];
$dia4_H9_3 = $_REQUEST['dia4_H9_3'];
$dia4_R9_3 = $_REQUEST['dia4_R9_3'];
$dia4_H10_3 = $_REQUEST['dia4_H10_3'];
$dia4_R10_3 = $_REQUEST['dia4_R10_3'];
$dia4_H1_4 = $_REQUEST['dia4_H1_4'];
$dia4_R1_4 = $_REQUEST['dia4_R1_4'];
$dia4_H2_4 = $_REQUEST['dia4_H2_4'];
$dia4_R2_4 = $_REQUEST['dia4_R2_4'];
$dia4_H3_4 = $_REQUEST['dia4_H3_4'];
$dia4_R3_4 = $_REQUEST['dia4_R3_4'];
$dia4_H4_4 = $_REQUEST['dia4_H4_4'];
$dia4_R4_4 = $_REQUEST['dia4_R4_4'];
$dia4_H5_4 = $_REQUEST['dia4_H5_4'];
$dia4_R5_4 = $_REQUEST['dia4_R5_4'];
$dia4_H6_4 = $_REQUEST['dia4_H6_4'];
$dia4_R6_4 = $_REQUEST['dia4_R6_4'];
$dia4_H7_4 = $_REQUEST['dia4_H7_4'];
$dia4_R7_4 = $_REQUEST['dia4_R7_4'];
$dia4_H8_4 = $_REQUEST['dia4_H8_4'];
$dia4_R8_4 = $_REQUEST['dia4_R8_4'];
$dia4_H9_4 = $_REQUEST['dia4_H9_4'];
$dia4_R9_4 = $_REQUEST['dia4_R9_4'];
$dia4_H10_4 = $_REQUEST['dia4_H10_4'];
$dia4_R10_4 = $_REQUEST['dia4_R10_4'];
$dia4_nombre1 = $_REQUEST['dia4_nombre1'];
$dia4_HE1_1 = $_REQUEST['dia4_HE1_1'];
$dia4_HS1_1 = $_REQUEST['dia4_HS1_1'];
$dia4_HE2_1 = $_REQUEST['dia4_HE2_1'];
$dia4_HS2_1 = $_REQUEST['dia4_HS2_1'];
$dia4_HE3_1 = $_REQUEST['dia4_HE3_1'];
$dia4_HS3_1 = $_REQUEST['dia4_HS3_1'];
$dia4_HE4_1 = $_REQUEST['dia4_HE4_1'];
$dia4_HS4_1 = $_REQUEST['dia4_HS4_1'];
$dia4_HE5_1 = $_REQUEST['dia4_HE5_1'];
$dia4_HS5_1 = $_REQUEST['dia4_HS5_1'];
$dia4_nombre2 = $_REQUEST['dia4_nombre2'];
$dia4_HE1_2 = $_REQUEST['dia4_HE1_2'];
$dia4_HS1_2 = $_REQUEST['dia4_HS1_2'];
$dia4_HE2_2 = $_REQUEST['dia4_HE2_2'];
$dia4_HS2_2 = $_REQUEST['dia4_HS2_2'];
$dia4_HE3_2 = $_REQUEST['dia4_HE3_2'];
$dia4_HS3_2 = $_REQUEST['dia4_HS3_2'];
$dia4_HE4_2 = $_REQUEST['dia4_HE4_2'];
$dia4_HS4_2 = $_REQUEST['dia4_HS4_2'];
$dia4_HE5_2 = $_REQUEST['dia4_HE5_2'];
$dia4_HS5_2 = $_REQUEST['dia4_HS5_2'];
$dia4_nombre3 = $_REQUEST['dia4_nombre3'];
$dia4_HE1_3 = $_REQUEST['dia4_HE1_3'];
$dia4_HS1_3 = $_REQUEST['dia4_HS1_3'];
$dia4_HE2_3 = $_REQUEST['dia4_HE2_3'];
$dia4_HS2_3 = $_REQUEST['dia4_HS2_3'];
$dia4_HE3_3 = $_REQUEST['dia4_HE3_3'];
$dia4_HS3_3 = $_REQUEST['dia4_HS3_3'];
$dia4_HE4_3 = $_REQUEST['dia4_HE4_3'];
$dia4_HS4_3 = $_REQUEST['dia4_HS4_3'];
$dia4_HE5_3 = $_REQUEST['dia4_HE5_3'];
$dia4_HS5_3 = $_REQUEST['dia4_HS5_3'];
$dia4_nombre4 = $_REQUEST['dia4_nombre4'];
$dia4_HE1_4 = $_REQUEST['dia4_HE1_4'];
$dia4_HS1_4 = $_REQUEST['dia4_HS1_4'];
$dia4_HE2_4 = $_REQUEST['dia4_HE2_4'];
$dia4_HS2_4 = $_REQUEST['dia4_HS2_4'];
$dia4_HE3_4 = $_REQUEST['dia4_HE3_4'];
$dia4_HS3_4 = $_REQUEST['dia4_HS3_4'];
$dia4_HE4_4 = $_REQUEST['dia4_HE4_4'];
$dia4_HS4_4 = $_REQUEST['dia4_HS4_4'];
$dia4_HE5_4 = $_REQUEST['dia4_HE5_4'];
$dia4_HS5_4 = $_REQUEST['dia4_HS5_4'];
$dia4_nombre5 = $_REQUEST['dia4_nombre5'];
$dia4_HE1_5 = $_REQUEST['dia4_HE1_5'];
$dia4_HS1_5 = $_REQUEST['dia4_HS1_5'];
$dia4_HE2_5 = $_REQUEST['dia4_HE2_5'];
$dia4_HS2_5 = $_REQUEST['dia4_HS2_5'];
$dia4_HE3_5 = $_REQUEST['dia4_HE3_5'];
$dia4_HS3_5 = $_REQUEST['dia4_HS3_5'];
$dia4_HE4_5 = $_REQUEST['dia4_HE4_5'];
$dia4_HS4_5 = $_REQUEST['dia4_HS4_5'];
$dia4_HE5_5 = $_REQUEST['dia4_HE5_5'];
$dia4_HS5_5 = $_REQUEST['dia4_HS5_5'];
$dia5_fecha = $_REQUEST['dia5_fecha'];
$dia5_equipo = $_REQUEST['dia5_equipo'];
$dia5_marca = $_REQUEST['dia5_marca'];
$dia5_fecha_calib = $_REQUEST['dia5_fecha_calib'];
$dia5_propietario = $_REQUEST['dia5_propietario'];
$dia5_bumptest_por = $_REQUEST['dia5_bumptest_por'];
$dia5_LEL = $_REQUEST['dia5_LEL'];
$dia5_O = $_REQUEST['dia5_O'];
$dia5_H2S = $_REQUEST['dia5_H2S'];
$dia5_CO = $_REQUEST['dia5_CO'];
$dia5_pasa_bumptest = $_REQUEST['dia5_pasa_bumptest'];
$dia5_H1_1 = $_REQUEST['dia5_H1_1'];
$dia5_R1_1 = $_REQUEST['dia5_R1_1'];
$dia5_H2_1 = $_REQUEST['dia5_H2_1'];
$dia5_R2_1 = $_REQUEST['dia5_R2_1'];
$dia5_H3_1 = $_REQUEST['dia5_H3_1'];
$dia5_R3_1 = $_REQUEST['dia5_R3_1'];
$dia5_H4_1 = $_REQUEST['dia5_H4_1'];
$dia5_R4_1 = $_REQUEST['dia5_R4_1'];
$dia5_H5_1 = $_REQUEST['dia5_H5_1'];
$dia5_R5_1 = $_REQUEST['dia5_R5_1'];
$dia5_H6_1 = $_REQUEST['dia5_H6_1'];
$dia5_R6_1 = $_REQUEST['dia5_R6_1'];
$dia5_H7_1 = $_REQUEST['dia5_H7_1'];
$dia5_R7_1 = $_REQUEST['dia5_R7_1'];
$dia5_H8_1 = $_REQUEST['dia5_H8_1'];
$dia5_R8_1 = $_REQUEST['dia5_R8_1'];
$dia5_H9_1 = $_REQUEST['dia5_H9_1'];
$dia5_R9_1 = $_REQUEST['dia5_R9_1'];
$dia5_H10_1 = $_REQUEST['dia5_H10_1'];
$dia5_R10_1 = $_REQUEST['dia5_R10_1'];
$dia5_H1_2 = $_REQUEST['dia5_H1_2'];
$dia5_R1_2 = $_REQUEST['dia5_R1_2'];
$dia5_H2_2 = $_REQUEST['dia5_H2_2'];
$dia5_R2_2 = $_REQUEST['dia5_R2_2'];
$dia5_H3_2 = $_REQUEST['dia5_H3_2'];
$dia5_R3_2 = $_REQUEST['dia5_R3_2'];
$dia5_H4_2 = $_REQUEST['dia5_H4_2'];
$dia5_R4_2 = $_REQUEST['dia5_R4_2'];
$dia5_H5_2 = $_REQUEST['dia5_H5_2'];
$dia5_R5_2 = $_REQUEST['dia5_R5_2'];
$dia5_H6_2 = $_REQUEST['dia5_H6_2'];
$dia5_R6_2 = $_REQUEST['dia5_R6_2'];
$dia5_H7_2 = $_REQUEST['dia5_H7_2'];
$dia5_R7_2 = $_REQUEST['dia5_R7_2'];
$dia5_H8_2 = $_REQUEST['dia5_H8_2'];
$dia5_R8_2 = $_REQUEST['dia5_R8_2'];
$dia5_H9_2 = $_REQUEST['dia5_H9_2'];
$dia5_R9_2 = $_REQUEST['dia5_R9_2'];
$dia5_H10_2 = $_REQUEST['dia5_H10_2'];
$dia5_R10_2 = $_REQUEST['dia5_R10_2'];
$dia5_H1_3 = $_REQUEST['dia5_H1_3'];
$dia5_R1_3 = $_REQUEST['dia5_R1_3'];
$dia5_H2_3 = $_REQUEST['dia5_H2_3'];
$dia5_R2_3 = $_REQUEST['dia5_R2_3'];
$dia5_H3_3 = $_REQUEST['dia5_H3_3'];
$dia5_R3_3 = $_REQUEST['dia5_R3_3'];
$dia5_H4_3 = $_REQUEST['dia5_H4_3'];
$dia5_R4_3 = $_REQUEST['dia5_R4_3'];
$dia5_H5_3 = $_REQUEST['dia5_H5_3'];
$dia5_R5_3 = $_REQUEST['dia5_R5_3'];
$dia5_H6_3 = $_REQUEST['dia5_H6_3'];
$dia5_R6_3 = $_REQUEST['dia5_R6_3'];
$dia5_H7_3 = $_REQUEST['dia5_H7_3'];
$dia5_R7_3 = $_REQUEST['dia5_R7_3'];
$dia5_H8_3 = $_REQUEST['dia5_H8_3'];
$dia5_R8_3 = $_REQUEST['dia5_R8_3'];
$dia5_H9_3 = $_REQUEST['dia5_H9_3'];
$dia5_R9_3 = $_REQUEST['dia5_R9_3'];
$dia5_H10_3 = $_REQUEST['dia5_H10_3'];
$dia5_R10_3 = $_REQUEST['dia5_R10_3'];
$dia5_H1_4 = $_REQUEST['dia5_H1_4'];
$dia5_R1_4 = $_REQUEST['dia5_R1_4'];
$dia5_H2_4 = $_REQUEST['dia5_H2_4'];
$dia5_R2_4 = $_REQUEST['dia5_R2_4'];
$dia5_H3_4 = $_REQUEST['dia5_H3_4'];
$dia5_R3_4 = $_REQUEST['dia5_R3_4'];
$dia5_H4_4 = $_REQUEST['dia5_H4_4'];
$dia5_R4_4 = $_REQUEST['dia5_R4_4'];
$dia5_H5_4 = $_REQUEST['dia5_H5_4'];
$dia5_R5_4 = $_REQUEST['dia5_R5_4'];
$dia5_H6_4 = $_REQUEST['dia5_H6_4'];
$dia5_R6_4 = $_REQUEST['dia5_R6_4'];
$dia5_H7_4 = $_REQUEST['dia5_H7_4'];
$dia5_R7_4 = $_REQUEST['dia5_R7_4'];
$dia5_H8_4 = $_REQUEST['dia5_H8_4'];
$dia5_R8_4 = $_REQUEST['dia5_R8_4'];
$dia5_H9_4 = $_REQUEST['dia5_H9_4'];
$dia5_R9_4 = $_REQUEST['dia5_R9_4'];
$dia5_H10_4 = $_REQUEST['dia5_H10_4'];
$dia5_R10_4 = $_REQUEST['dia5_R10_4'];
$dia5_nombre1 = $_REQUEST['dia5_nombre1'];
$dia5_HE1_1 = $_REQUEST['dia5_HE1_1'];
$dia5_HS1_1 = $_REQUEST['dia5_HS1_1'];
$dia5_HE2_1 = $_REQUEST['dia5_HE2_1'];
$dia5_HS2_1 = $_REQUEST['dia5_HS2_1'];
$dia5_HE3_1 = $_REQUEST['dia5_HE3_1'];
$dia5_HS3_1 = $_REQUEST['dia5_HS3_1'];
$dia5_HE4_1 = $_REQUEST['dia5_HE4_1'];
$dia5_HS4_1 = $_REQUEST['dia5_HS4_1'];
$dia5_HE5_1 = $_REQUEST['dia5_HE5_1'];
$dia5_HS5_1 = $_REQUEST['dia5_HS5_1'];
$dia5_nombre2 = $_REQUEST['dia5_nombre2'];
$dia5_HE1_2 = $_REQUEST['dia5_HE1_2'];
$dia5_HS1_2 = $_REQUEST['dia5_HS1_2'];
$dia5_HE2_2 = $_REQUEST['dia5_HE2_2'];
$dia5_HS2_2 = $_REQUEST['dia5_HS2_2'];
$dia5_HE3_2 = $_REQUEST['dia5_HE3_2'];
$dia5_HS3_2 = $_REQUEST['dia5_HS3_2'];
$dia5_HE4_2 = $_REQUEST['dia5_HE4_2'];
$dia5_HS4_2 = $_REQUEST['dia5_HS4_2'];
$dia5_HE5_2 = $_REQUEST['dia5_HE5_2'];
$dia5_HS5_2 = $_REQUEST['dia5_HS5_2'];
$dia5_nombre3 = $_REQUEST['dia5_nombre3'];
$dia5_HE1_3 = $_REQUEST['dia5_HE1_3'];
$dia5_HS1_3 = $_REQUEST['dia5_HS1_3'];
$dia5_HE2_3 = $_REQUEST['dia5_HE2_3'];
$dia5_HS2_3 = $_REQUEST['dia5_HS2_3'];
$dia5_HE3_3 = $_REQUEST['dia5_HE3_3'];
$dia5_HS3_3 = $_REQUEST['dia5_HS3_3'];
$dia5_HE4_3 = $_REQUEST['dia5_HE4_3'];
$dia5_HS4_3 = $_REQUEST['dia5_HS4_3'];
$dia5_HE5_3 = $_REQUEST['dia5_HE5_3'];
$dia5_HS5_3 = $_REQUEST['dia5_HS5_3'];
$dia5_nombre4 = $_REQUEST['dia5_nombre4'];
$dia5_HE1_4 = $_REQUEST['dia5_HE1_4'];
$dia5_HS1_4 = $_REQUEST['dia5_HS1_4'];
$dia5_HE2_4 = $_REQUEST['dia5_HE2_4'];
$dia5_HS2_4 = $_REQUEST['dia5_HS2_4'];
$dia5_HE3_4 = $_REQUEST['dia5_HE3_4'];
$dia5_HS3_4 = $_REQUEST['dia5_HS3_4'];
$dia5_HE4_4 = $_REQUEST['dia5_HE4_4'];
$dia5_HS4_4 = $_REQUEST['dia5_HS4_4'];
$dia5_HE5_4 = $_REQUEST['dia5_HE5_4'];
$dia5_HS5_4 = $_REQUEST['dia5_HS5_4'];
$dia5_nombre5 = $_REQUEST['dia5_nombre5'];
$dia5_HE1_5 = $_REQUEST['dia5_HE1_5'];
$dia5_HS1_5 = $_REQUEST['dia5_HS1_5'];
$dia5_HE2_5 = $_REQUEST['dia5_HE2_5'];
$dia5_HS2_5 = $_REQUEST['dia5_HS2_5'];
$dia5_HE3_5 = $_REQUEST['dia5_HE3_5'];
$dia5_HS3_5 = $_REQUEST['dia5_HS3_5'];
$dia5_HE4_5 = $_REQUEST['dia5_HE4_5'];
$dia5_HS4_5 = $_REQUEST['dia5_HS4_5'];
$dia5_HE5_5 = $_REQUEST['dia5_HE5_5'];
$dia5_HS5_5 = $_REQUEST['dia5_HS5_5'];
$dia6_fecha = $_REQUEST['dia6_fecha'];
$dia6_equipo = $_REQUEST['dia6_equipo'];
$dia6_marca = $_REQUEST['dia6_marca'];
$dia6_fecha_calib = $_REQUEST['dia6_fecha_calib'];
$dia6_propietario = $_REQUEST['dia6_propietario'];
$dia6_bumptest_por = $_REQUEST['dia6_bumptest_por'];
$dia6_LEL = $_REQUEST['dia6_LEL'];
$dia6_O = $_REQUEST['dia6_O'];
$dia6_H2S = $_REQUEST['dia6_H2S'];
$dia6_CO = $_REQUEST['dia6_CO'];
$dia6_pasa_bumptest = $_REQUEST['dia6_pasa_bumptest'];
$dia6_H1_1 = $_REQUEST['dia6_H1_1'];
$dia6_R1_1 = $_REQUEST['dia6_R1_1'];
$dia6_H2_1 = $_REQUEST['dia6_H2_1'];
$dia6_R2_1 = $_REQUEST['dia6_R2_1'];
$dia6_H3_1 = $_REQUEST['dia6_H3_1'];
$dia6_R3_1 = $_REQUEST['dia6_R3_1'];
$dia6_H4_1 = $_REQUEST['dia6_H4_1'];
$dia6_R4_1 = $_REQUEST['dia6_R4_1'];
$dia6_H5_1 = $_REQUEST['dia6_H5_1'];
$dia6_R5_1 = $_REQUEST['dia6_R5_1'];
$dia6_H6_1 = $_REQUEST['dia6_H6_1'];
$dia6_R6_1 = $_REQUEST['dia6_R6_1'];
$dia6_H7_1 = $_REQUEST['dia6_H7_1'];
$dia6_R7_1 = $_REQUEST['dia6_R7_1'];
$dia6_H8_1 = $_REQUEST['dia6_H8_1'];
$dia6_R8_1 = $_REQUEST['dia6_R8_1'];
$dia6_H9_1 = $_REQUEST['dia6_H9_1'];
$dia6_R9_1 = $_REQUEST['dia6_R9_1'];
$dia6_H10_1 = $_REQUEST['dia6_H10_1'];
$dia6_R10_1 = $_REQUEST['dia6_R10_1'];
$dia6_H1_2 = $_REQUEST['dia6_H1_2'];
$dia6_R1_2 = $_REQUEST['dia6_R1_2'];
$dia6_H2_2 = $_REQUEST['dia6_H2_2'];
$dia6_R2_2 = $_REQUEST['dia6_R2_2'];
$dia6_H3_2 = $_REQUEST['dia6_H3_2'];
$dia6_R3_2 = $_REQUEST['dia6_R3_2'];
$dia6_H4_2 = $_REQUEST['dia6_H4_2'];
$dia6_R4_2 = $_REQUEST['dia6_R4_2'];
$dia6_H5_2 = $_REQUEST['dia6_H5_2'];
$dia6_R5_2 = $_REQUEST['dia6_R5_2'];
$dia6_H6_2 = $_REQUEST['dia6_H6_2'];
$dia6_R6_2 = $_REQUEST['dia6_R6_2'];
$dia6_H7_2 = $_REQUEST['dia6_H7_2'];
$dia6_R7_2 = $_REQUEST['dia6_R7_2'];
$dia6_H8_2 = $_REQUEST['dia6_H8_2'];
$dia6_R8_2 = $_REQUEST['dia6_R8_2'];
$dia6_H9_2 = $_REQUEST['dia6_H9_2'];
$dia6_R9_2 = $_REQUEST['dia6_R9_2'];
$dia6_H10_2 = $_REQUEST['dia6_H10_2'];
$dia6_R10_2 = $_REQUEST['dia6_R10_2'];
$dia6_H1_3 = $_REQUEST['dia6_H1_3'];
$dia6_R1_3 = $_REQUEST['dia6_R1_3'];
$dia6_H2_3 = $_REQUEST['dia6_H2_3'];
$dia6_R2_3 = $_REQUEST['dia6_R2_3'];
$dia6_H3_3 = $_REQUEST['dia6_H3_3'];
$dia6_R3_3 = $_REQUEST['dia6_R3_3'];
$dia6_H4_3 = $_REQUEST['dia6_H4_3'];
$dia6_R4_3 = $_REQUEST['dia6_R4_3'];
$dia6_H5_3 = $_REQUEST['dia6_H5_3'];
$dia6_R5_3 = $_REQUEST['dia6_R5_3'];
$dia6_H6_3 = $_REQUEST['dia6_H6_3'];
$dia6_R6_3 = $_REQUEST['dia6_R6_3'];
$dia6_H7_3 = $_REQUEST['dia6_H7_3'];
$dia6_R7_3 = $_REQUEST['dia6_R7_3'];
$dia6_H8_3 = $_REQUEST['dia6_H8_3'];
$dia6_R8_3 = $_REQUEST['dia6_R8_3'];
$dia6_H9_3 = $_REQUEST['dia6_H9_3'];
$dia6_R9_3 = $_REQUEST['dia6_R9_3'];
$dia6_H10_3 = $_REQUEST['dia6_H10_3'];
$dia6_R10_3 = $_REQUEST['dia6_R10_3'];
$dia6_H1_4 = $_REQUEST['dia6_H1_4'];
$dia6_R1_4 = $_REQUEST['dia6_R1_4'];
$dia6_H2_4 = $_REQUEST['dia6_H2_4'];
$dia6_R2_4 = $_REQUEST['dia6_R2_4'];
$dia6_H3_4 = $_REQUEST['dia6_H3_4'];
$dia6_R3_4 = $_REQUEST['dia6_R3_4'];
$dia6_H4_4 = $_REQUEST['dia6_H4_4'];
$dia6_R4_4 = $_REQUEST['dia6_R4_4'];
$dia6_H5_4 = $_REQUEST['dia6_H5_4'];
$dia6_R5_4 = $_REQUEST['dia6_R5_4'];
$dia6_H6_4 = $_REQUEST['dia6_H6_4'];
$dia6_R6_4 = $_REQUEST['dia6_R6_4'];
$dia6_H7_4 = $_REQUEST['dia6_H7_4'];
$dia6_R7_4 = $_REQUEST['dia6_R7_4'];
$dia6_H8_4 = $_REQUEST['dia6_H8_4'];
$dia6_R8_4 = $_REQUEST['dia6_R8_4'];
$dia6_H9_4 = $_REQUEST['dia6_H9_4'];
$dia6_R9_4 = $_REQUEST['dia6_R9_4'];
$dia6_H10_4 = $_REQUEST['dia6_H10_4'];
$dia6_R10_4 = $_REQUEST['dia6_R10_4'];
$dia6_nombre1 = $_REQUEST['dia6_nombre1'];
$dia6_HE1_1 = $_REQUEST['dia6_HE1_1'];
$dia6_HS1_1 = $_REQUEST['dia6_HS1_1'];
$dia6_HE2_1 = $_REQUEST['dia6_HE2_1'];
$dia6_HS2_1 = $_REQUEST['dia6_HS2_1'];
$dia6_HE3_1 = $_REQUEST['dia6_HE3_1'];
$dia6_HS3_1 = $_REQUEST['dia6_HS3_1'];
$dia6_HE4_1 = $_REQUEST['dia6_HE4_1'];
$dia6_HS4_1 = $_REQUEST['dia6_HS4_1'];
$dia6_HE5_1 = $_REQUEST['dia6_HE5_1'];
$dia6_HS5_1 = $_REQUEST['dia6_HS5_1'];
$dia6_nombre2 = $_REQUEST['dia6_nombre2'];
$dia6_HE1_2 = $_REQUEST['dia6_HE1_2'];
$dia6_HS1_2 = $_REQUEST['dia6_HS1_2'];
$dia6_HE2_2 = $_REQUEST['dia6_HE2_2'];
$dia6_HS2_2 = $_REQUEST['dia6_HS2_2'];
$dia6_HE3_2 = $_REQUEST['dia6_HE3_2'];
$dia6_HS3_2 = $_REQUEST['dia6_HS3_2'];
$dia6_HE4_2 = $_REQUEST['dia6_HE4_2'];
$dia6_HS4_2 = $_REQUEST['dia6_HS4_2'];
$dia6_HE5_2 = $_REQUEST['dia6_HE5_2'];
$dia6_HS5_2 = $_REQUEST['dia6_HS5_2'];
$dia6_nombre3 = $_REQUEST['dia6_nombre3'];
$dia6_HE1_3 = $_REQUEST['dia6_HE1_3'];
$dia6_HS1_3 = $_REQUEST['dia6_HS1_3'];
$dia6_HE2_3 = $_REQUEST['dia6_HE2_3'];
$dia6_HS2_3 = $_REQUEST['dia6_HS2_3'];
$dia6_HE3_3 = $_REQUEST['dia6_HE3_3'];
$dia6_HS3_3 = $_REQUEST['dia6_HS3_3'];
$dia6_HE4_3 = $_REQUEST['dia6_HE4_3'];
$dia6_HS4_3 = $_REQUEST['dia6_HS4_3'];
$dia6_HE5_3 = $_REQUEST['dia6_HE5_3'];
$dia6_HS5_3 = $_REQUEST['dia6_HS5_3'];
$dia6_nombre4 = $_REQUEST['dia6_nombre4'];
$dia6_HE1_4 = $_REQUEST['dia6_HE1_4'];
$dia6_HS1_4 = $_REQUEST['dia6_HS1_4'];
$dia6_HE2_4 = $_REQUEST['dia6_HE2_4'];
$dia6_HS2_4 = $_REQUEST['dia6_HS2_4'];
$dia6_HE3_4 = $_REQUEST['dia6_HE3_4'];
$dia6_HS3_4 = $_REQUEST['dia6_HS3_4'];
$dia6_HE4_4 = $_REQUEST['dia6_HE4_4'];
$dia6_HS4_4 = $_REQUEST['dia6_HS4_4'];
$dia6_HE5_4 = $_REQUEST['dia6_HE5_4'];
$dia6_HS5_4 = $_REQUEST['dia6_HS5_4'];
$dia6_nombre5 = $_REQUEST['dia6_nombre5'];
$dia6_HE1_5 = $_REQUEST['dia6_HE1_5'];
$dia6_HS1_5 = $_REQUEST['dia6_HS1_5'];
$dia6_HE2_5 = $_REQUEST['dia6_HE2_5'];
$dia6_HS2_5 = $_REQUEST['dia6_HS2_5'];
$dia6_HE3_5 = $_REQUEST['dia6_HE3_5'];
$dia6_HS3_5 = $_REQUEST['dia6_HS3_5'];
$dia6_HE4_5 = $_REQUEST['dia6_HE4_5'];
$dia6_HS4_5 = $_REQUEST['dia6_HS4_5'];
$dia6_HE5_5 = $_REQUEST['dia6_HE5_5'];
$dia6_HS5_5 = $_REQUEST['dia6_HS5_5'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`, 
`estado`, 
`usuario`, 
`fecha`, 
`pTEC`, 
`tipo_trabajo`, 
`dia1_fecha`, 
`dia1_equipo`, 
`dia1_marca`, 
`dia1_fecha_calib`, 
`dia1_propietario`, 
`dia1_bumptest_por`, 
`dia1_LEL`, 
`dia1_O`, 
`dia1_H2S`, 
`dia1_CO`, 
`dia1_pasa_bumptest`, 
`dia1_H1_1`, 
`dia1_R1_1`, 
`dia1_H2_1`, 
`dia1_R2_1`, 
`dia1_H3_1`, 
`dia1_R3_1`, 
`dia1_H4_1`, 
`dia1_R4_1`, 
`dia1_H5_1`, 
`dia1_R5_1`, 
`dia1_H6_1`, 
`dia1_R6_1`, 
`dia1_H7_1`, 
`dia1_R7_1`, 
`dia1_H8_1`, 
`dia1_R8_1`, 
`dia1_H9_1`, 
`dia1_R9_1`, 
`dia1_H10_1`, 
`dia1_R10_1`, 
`dia1_H1_2`, 
`dia1_R1_2`, 
`dia1_H2_2`, 
`dia1_R2_2`, 
`dia1_H3_2`, 
`dia1_R3_2`, 
`dia1_H4_2`, 
`dia1_R4_2`, 
`dia1_H5_2`, 
`dia1_R5_2`, 
`dia1_H6_2`, 
`dia1_R6_2`, 
`dia1_H7_2`, 
`dia1_R7_2`, 
`dia1_H8_2`, 
`dia1_R8_2`, 
`dia1_H9_2`, 
`dia1_R9_2`, 
`dia1_H10_2`, 
`dia1_R10_2`, 
`dia1_H1_3`, 
`dia1_R1_3`, 
`dia1_H2_3`, 
`dia1_R2_3`, 
`dia1_H3_3`, 
`dia1_R3_3`, 
`dia1_H4_3`, 
`dia1_R4_3`, 
`dia1_H5_3`, 
`dia1_R5_3`, 
`dia1_H6_3`, 
`dia1_R6_3`, 
`dia1_H7_3`, 
`dia1_R7_3`, 
`dia1_H8_3`, 
`dia1_R8_3`, 
`dia1_H9_3`, 
`dia1_R9_3`, 
`dia1_H10_3`, 
`dia1_R10_3`, 
`dia1_H1_4`, 
`dia1_R1_4`, 
`dia1_H2_4`, 
`dia1_R2_4`, 
`dia1_H3_4`, 
`dia1_R3_4`, 
`dia1_H4_4`, 
`dia1_R4_4`, 
`dia1_H5_4`, 
`dia1_R5_4`, 
`dia1_H6_4`, 
`dia1_R6_4`, 
`dia1_H7_4`, 
`dia1_R7_4`, 
`dia1_H8_4`, 
`dia1_R8_4`, 
`dia1_H9_4`, 
`dia1_R9_4`, 
`dia1_H10_4`, 
`dia1_R10_4`, 
`dia1_nombre1`, 
`dia1_HE1_1`, 
`dia1_HS1_1`, 
`dia1_HE2_1`, 
`dia1_HS2_1`, 
`dia1_HE3_1`, 
`dia1_HS3_1`, 
`dia1_HE4_1`, 
`dia1_HS4_1`, 
`dia1_HE5_1`, 
`dia1_HS5_1`, 
`dia1_nombre2`, 
`dia1_HE1_2`, 
`dia1_HS1_2`, 
`dia1_HE2_2`, 
`dia1_HS2_2`, 
`dia1_HE3_2`, 
`dia1_HS3_2`, 
`dia1_HE4_2`, 
`dia1_HS4_2`, 
`dia1_HE5_2`, 
`dia1_HS5_2`, 
`dia1_nombre3`, 
`dia1_HE1_3`, 
`dia1_HS1_3`, 
`dia1_HE2_3`, 
`dia1_HS2_3`, 
`dia1_HE3_3`, 
`dia1_HS3_3`, 
`dia1_HE4_3`, 
`dia1_HS4_3`, 
`dia1_HE5_3`, 
`dia1_HS5_3`, 
`dia1_nombre4`, 
`dia1_HE1_4`, 
`dia1_HS1_4`, 
`dia1_HE2_4`, 
`dia1_HS2_4`, 
`dia1_HE3_4`, 
`dia1_HS3_4`, 
`dia1_HE4_4`, 
`dia1_HS4_4`, 
`dia1_HE5_4`, 
`dia1_HS5_4`, 
`dia1_nombre5`, 
`dia1_HE1_5`, 
`dia1_HS1_5`, 
`dia1_HE2_5`, 
`dia1_HS2_5`, 
`dia1_HE3_5`, 
`dia1_HS3_5`, 
`dia1_HE4_5`, 
`dia1_HS4_5`, 
`dia1_HE5_5`, 
`dia1_HS5_5`, 
`dia2_fecha`, 
`dia2_equipo`, 
`dia2_marca`, 
`dia2_fecha_calib`, 
`dia2_propietario`, 
`dia2_bumptest_por`, 
`dia2_LEL`, 
`dia2_O`, 
`dia2_H2S`, 
`dia2_CO`, 
`dia2_pasa_bumptest`, 
`dia2_H1_1`, 
`dia2_R1_1`, 
`dia2_H2_1`, 
`dia2_R2_1`, 
`dia2_H3_1`, 
`dia2_R3_1`, 
`dia2_H4_1`, 
`dia2_R4_1`, 
`dia2_H5_1`, 
`dia2_R5_1`, 
`dia2_H6_1`, 
`dia2_R6_1`, 
`dia2_H7_1`, 
`dia2_R7_1`, 
`dia2_H8_1`, 
`dia2_R8_1`, 
`dia2_H9_1`, 
`dia2_R9_1`, 
`dia2_H10_1`, 
`dia2_R10_1`, 
`dia2_H1_2`, 
`dia2_R1_2`, 
`dia2_H2_2`, 
`dia2_R2_2`, 
`dia2_H3_2`, 
`dia2_R3_2`, 
`dia2_H4_2`, 
`dia2_R4_2`, 
`dia2_H5_2`, 
`dia2_R5_2`, 
`dia2_H6_2`, 
`dia2_R6_2`, 
`dia2_H7_2`, 
`dia2_R7_2`, 
`dia2_H8_2`, 
`dia2_R8_2`, 
`dia2_H9_2`, 
`dia2_R9_2`, 
`dia2_H10_2`, 
`dia2_R10_2`, 
`dia2_H1_3`, 
`dia2_R1_3`, 
`dia2_H2_3`, 
`dia2_R2_3`, 
`dia2_H3_3`, 
`dia2_R3_3`, 
`dia2_H4_3`, 
`dia2_R4_3`, 
`dia2_H5_3`, 
`dia2_R5_3`, 
`dia2_H6_3`, 
`dia2_R6_3`, 
`dia2_H7_3`, 
`dia2_R7_3`, 
`dia2_H8_3`, 
`dia2_R8_3`, 
`dia2_H9_3`, 
`dia2_R9_3`, 
`dia2_H10_3`, 
`dia2_R10_3`, 
`dia2_H1_4`, 
`dia2_R1_4`, 
`dia2_H2_4`, 
`dia2_R2_4`, 
`dia2_H3_4`, 
`dia2_R3_4`, 
`dia2_H4_4`, 
`dia2_R4_4`, 
`dia2_H5_4`, 
`dia2_R5_4`, 
`dia2_H6_4`, 
`dia2_R6_4`, 
`dia2_H7_4`, 
`dia2_R7_4`, 
`dia2_H8_4`, 
`dia2_R8_4`, 
`dia2_H9_4`, 
`dia2_R9_4`, 
`dia2_H10_4`, 
`dia2_R10_4`, 
`dia2_nombre1`, 
`dia2_HE1_1`, 
`dia2_HS1_1`, 
`dia2_HE2_1`, 
`dia2_HS2_1`, 
`dia2_HE3_1`, 
`dia2_HS3_1`, 
`dia2_HE4_1`, 
`dia2_HS4_1`, 
`dia2_HE5_1`, 
`dia2_HS5_1`, 
`dia2_nombre2`, 
`dia2_HE1_2`, 
`dia2_HS1_2`, 
`dia2_HE2_2`, 
`dia2_HS2_2`, 
`dia2_HE3_2`, 
`dia2_HS3_2`, 
`dia2_HE4_2`, 
`dia2_HS4_2`, 
`dia2_HE5_2`, 
`dia2_HS5_2`, 
`dia2_nombre3`, 
`dia2_HE1_3`, 
`dia2_HS1_3`, 
`dia2_HE2_3`, 
`dia2_HS2_3`, 
`dia2_HE3_3`, 
`dia2_HS3_3`, 
`dia2_HE4_3`, 
`dia2_HS4_3`, 
`dia2_HE5_3`, 
`dia2_HS5_3`, 
`dia2_nombre4`, 
`dia2_HE1_4`, 
`dia2_HS1_4`, 
`dia2_HE2_4`, 
`dia2_HS2_4`, 
`dia2_HE3_4`, 
`dia2_HS3_4`, 
`dia2_HE4_4`, 
`dia2_HS4_4`, 
`dia2_HE5_4`, 
`dia2_HS5_4`, 
`dia2_nombre5`, 
`dia2_HE1_5`, 
`dia2_HS1_5`, 
`dia2_HE2_5`, 
`dia2_HS2_5`, 
`dia2_HE3_5`, 
`dia2_HS3_5`, 
`dia2_HE4_5`, 
`dia2_HS4_5`, 
`dia2_HE5_5`, 
`dia2_HS5_5`, 
`dia3_fecha`, 
`dia3_equipo`, 
`dia3_marca`, 
`dia3_fecha_calib`, 
`dia3_propietario`, 
`dia3_bumptest_por`, 
`dia3_LEL`, 
`dia3_O`, 
`dia3_H2S`, 
`dia3_CO`, 
`dia3_pasa_bumptest`, 
`dia3_H1_1`, 
`dia3_R1_1`, 
`dia3_H2_1`, 
`dia3_R2_1`, 
`dia3_H3_1`, 
`dia3_R3_1`, 
`dia3_H4_1`, 
`dia3_R4_1`, 
`dia3_H5_1`, 
`dia3_R5_1`, 
`dia3_H6_1`, 
`dia3_R6_1`, 
`dia3_H7_1`, 
`dia3_R7_1`, 
`dia3_H8_1`, 
`dia3_R8_1`, 
`dia3_H9_1`, 
`dia3_R9_1`, 
`dia3_H10_1`, 
`dia3_R10_1`, 
`dia3_H1_2`, 
`dia3_R1_2`, 
`dia3_H2_2`, 
`dia3_R2_2`, 
`dia3_H3_2`, 
`dia3_R3_2`, 
`dia3_H4_2`, 
`dia3_R4_2`, 
`dia3_H5_2`, 
`dia3_R5_2`, 
`dia3_H6_2`, 
`dia3_R6_2`, 
`dia3_H7_2`, 
`dia3_R7_2`, 
`dia3_H8_2`, 
`dia3_R8_2`, 
`dia3_H9_2`, 
`dia3_R9_2`, 
`dia3_H10_2`, 
`dia3_R10_2`, 
`dia3_H1_3`, 
`dia3_R1_3`, 
`dia3_H2_3`, 
`dia3_R2_3`, 
`dia3_H3_3`, 
`dia3_R3_3`, 
`dia3_H4_3`, 
`dia3_R4_3`, 
`dia3_H5_3`, 
`dia3_R5_3`, 
`dia3_H6_3`, 
`dia3_R6_3`, 
`dia3_H7_3`, 
`dia3_R7_3`, 
`dia3_H8_3`, 
`dia3_R8_3`, 
`dia3_H9_3`, 
`dia3_R9_3`, 
`dia3_H10_3`, 
`dia3_R10_3`, 
`dia3_H1_4`, 
`dia3_R1_4`, 
`dia3_H2_4`, 
`dia3_R2_4`, 
`dia3_H3_4`, 
`dia3_R3_4`, 
`dia3_H4_4`, 
`dia3_R4_4`, 
`dia3_H5_4`, 
`dia3_R5_4`, 
`dia3_H6_4`, 
`dia3_R6_4`, 
`dia3_H7_4`, 
`dia3_R7_4`, 
`dia3_H8_4`, 
`dia3_R8_4`, 
`dia3_H9_4`, 
`dia3_R9_4`, 
`dia3_H10_4`, 
`dia3_R10_4`, 
`dia3_nombre1`, 
`dia3_HE1_1`, 
`dia3_HS1_1`, 
`dia3_HE2_1`, 
`dia3_HS2_1`, 
`dia3_HE3_1`, 
`dia3_HS3_1`, 
`dia3_HE4_1`, 
`dia3_HS4_1`, 
`dia3_HE5_1`, 
`dia3_HS5_1`, 
`dia3_nombre2`, 
`dia3_HE1_2`, 
`dia3_HS1_2`, 
`dia3_HE2_2`, 
`dia3_HS2_2`, 
`dia3_HE3_2`, 
`dia3_HS3_2`, 
`dia3_HE4_2`, 
`dia3_HS4_2`, 
`dia3_HE5_2`, 
`dia3_HS5_2`, 
`dia3_nombre3`, 
`dia3_HE1_3`, 
`dia3_HS1_3`, 
`dia3_HE2_3`, 
`dia3_HS2_3`, 
`dia3_HE3_3`, 
`dia3_HS3_3`, 
`dia3_HE4_3`, 
`dia3_HS4_3`, 
`dia3_HE5_3`, 
`dia3_HS5_3`, 
`dia3_nombre4`, 
`dia3_HE1_4`, 
`dia3_HS1_4`, 
`dia3_HE2_4`, 
`dia3_HS2_4`, 
`dia3_HE3_4`, 
`dia3_HS3_4`, 
`dia3_HE4_4`, 
`dia3_HS4_4`, 
`dia3_HE5_4`, 
`dia3_HS5_4`, 
`dia3_nombre5`, 
`dia3_HE1_5`, 
`dia3_HS1_5`, 
`dia3_HE2_5`, 
`dia3_HS2_5`, 
`dia3_HE3_5`, 
`dia3_HS3_5`, 
`dia3_HE4_5`, 
`dia3_HS4_5`, 
`dia3_HE5_5`, 
`dia3_HS5_5`, 
`dia4_fecha`, 
`dia4_equipo`, 
`dia4_marca`, 
`dia4_fecha_calib`, 
`dia4_propietario`, 
`dia4_bumptest_por`, 
`dia4_LEL`, 
`dia4_O`, 
`dia4_H2S`, 
`dia4_CO`, 
`dia4_pasa_bumptest`, 
`dia4_H1_1`, 
`dia4_R1_1`, 
`dia4_H2_1`, 
`dia4_R2_1`, 
`dia4_H3_1`, 
`dia4_R3_1`, 
`dia4_H4_1`, 
`dia4_R4_1`, 
`dia4_H5_1`, 
`dia4_R5_1`, 
`dia4_H6_1`, 
`dia4_R6_1`, 
`dia4_H7_1`, 
`dia4_R7_1`, 
`dia4_H8_1`, 
`dia4_R8_1`, 
`dia4_H9_1`, 
`dia4_R9_1`, 
`dia4_H10_1`, 
`dia4_R10_1`, 
`dia4_H1_2`, 
`dia4_R1_2`, 
`dia4_H2_2`, 
`dia4_R2_2`, 
`dia4_H3_2`, 
`dia4_R3_2`, 
`dia4_H4_2`, 
`dia4_R4_2`, 
`dia4_H5_2`, 
`dia4_R5_2`, 
`dia4_H6_2`, 
`dia4_R6_2`, 
`dia4_H7_2`, 
`dia4_R7_2`, 
`dia4_H8_2`, 
`dia4_R8_2`, 
`dia4_H9_2`, 
`dia4_R9_2`, 
`dia4_H10_2`, 
`dia4_R10_2`, 
`dia4_H1_3`, 
`dia4_R1_3`, 
`dia4_H2_3`, 
`dia4_R2_3`, 
`dia4_H3_3`, 
`dia4_R3_3`, 
`dia4_H4_3`, 
`dia4_R4_3`, 
`dia4_H5_3`, 
`dia4_R5_3`, 
`dia4_H6_3`, 
`dia4_R6_3`, 
`dia4_H7_3`, 
`dia4_R7_3`, 
`dia4_H8_3`, 
`dia4_R8_3`, 
`dia4_H9_3`, 
`dia4_R9_3`, 
`dia4_H10_3`, 
`dia4_R10_3`, 
`dia4_H1_4`, 
`dia4_R1_4`, 
`dia4_H2_4`, 
`dia4_R2_4`, 
`dia4_H3_4`, 
`dia4_R3_4`, 
`dia4_H4_4`, 
`dia4_R4_4`, 
`dia4_H5_4`, 
`dia4_R5_4`, 
`dia4_H6_4`, 
`dia4_R6_4`, 
`dia4_H7_4`, 
`dia4_R7_4`, 
`dia4_H8_4`, 
`dia4_R8_4`, 
`dia4_H9_4`, 
`dia4_R9_4`, 
`dia4_H10_4`, 
`dia4_R10_4`, 
`dia4_nombre1`, 
`dia4_HE1_1`, 
`dia4_HS1_1`, 
`dia4_HE2_1`, 
`dia4_HS2_1`, 
`dia4_HE3_1`, 
`dia4_HS3_1`, 
`dia4_HE4_1`, 
`dia4_HS4_1`, 
`dia4_HE5_1`, 
`dia4_HS5_1`, 
`dia4_nombre2`, 
`dia4_HE1_2`, 
`dia4_HS1_2`, 
`dia4_HE2_2`, 
`dia4_HS2_2`, 
`dia4_HE3_2`, 
`dia4_HS3_2`, 
`dia4_HE4_2`, 
`dia4_HS4_2`, 
`dia4_HE5_2`, 
`dia4_HS5_2`, 
`dia4_nombre3`, 
`dia4_HE1_3`, 
`dia4_HS1_3`, 
`dia4_HE2_3`, 
`dia4_HS2_3`, 
`dia4_HE3_3`, 
`dia4_HS3_3`, 
`dia4_HE4_3`, 
`dia4_HS4_3`, 
`dia4_HE5_3`, 
`dia4_HS5_3`, 
`dia4_nombre4`, 
`dia4_HE1_4`, 
`dia4_HS1_4`, 
`dia4_HE2_4`, 
`dia4_HS2_4`, 
`dia4_HE3_4`, 
`dia4_HS3_4`, 
`dia4_HE4_4`, 
`dia4_HS4_4`, 
`dia4_HE5_4`, 
`dia4_HS5_4`, 
`dia4_nombre5`, 
`dia4_HE1_5`, 
`dia4_HS1_5`, 
`dia4_HE2_5`, 
`dia4_HS2_5`, 
`dia4_HE3_5`, 
`dia4_HS3_5`, 
`dia4_HE4_5`, 
`dia4_HS4_5`, 
`dia4_HE5_5`, 
`dia4_HS5_5`, 
`dia5_fecha`, 
`dia5_equipo`, 
`dia5_marca`, 
`dia5_fecha_calib`, 
`dia5_propietario`, 
`dia5_bumptest_por`, 
`dia5_LEL`, 
`dia5_O`, 
`dia5_H2S`, 
`dia5_CO`, 
`dia5_pasa_bumptest`, 
`dia5_H1_1`, 
`dia5_R1_1`, 
`dia5_H2_1`, 
`dia5_R2_1`, 
`dia5_H3_1`, 
`dia5_R3_1`, 
`dia5_H4_1`, 
`dia5_R4_1`, 
`dia5_H5_1`, 
`dia5_R5_1`, 
`dia5_H6_1`, 
`dia5_R6_1`, 
`dia5_H7_1`, 
`dia5_R7_1`, 
`dia5_H8_1`, 
`dia5_R8_1`, 
`dia5_H9_1`, 
`dia5_R9_1`, 
`dia5_H10_1`, 
`dia5_R10_1`, 
`dia5_H1_2`, 
`dia5_R1_2`, 
`dia5_H2_2`, 
`dia5_R2_2`, 
`dia5_H3_2`, 
`dia5_R3_2`, 
`dia5_H4_2`, 
`dia5_R4_2`, 
`dia5_H5_2`, 
`dia5_R5_2`, 
`dia5_H6_2`, 
`dia5_R6_2`, 
`dia5_H7_2`, 
`dia5_R7_2`, 
`dia5_H8_2`, 
`dia5_R8_2`, 
`dia5_H9_2`, 
`dia5_R9_2`, 
`dia5_H10_2`, 
`dia5_R10_2`, 
`dia5_H1_3`, 
`dia5_R1_3`, 
`dia5_H2_3`, 
`dia5_R2_3`, 
`dia5_H3_3`, 
`dia5_R3_3`, 
`dia5_H4_3`, 
`dia5_R4_3`, 
`dia5_H5_3`, 
`dia5_R5_3`, 
`dia5_H6_3`, 
`dia5_R6_3`, 
`dia5_H7_3`, 
`dia5_R7_3`, 
`dia5_H8_3`, 
`dia5_R8_3`, 
`dia5_H9_3`, 
`dia5_R9_3`, 
`dia5_H10_3`, 
`dia5_R10_3`, 
`dia5_H1_4`, 
`dia5_R1_4`, 
`dia5_H2_4`, 
`dia5_R2_4`, 
`dia5_H3_4`, 
`dia5_R3_4`, 
`dia5_H4_4`, 
`dia5_R4_4`, 
`dia5_H5_4`, 
`dia5_R5_4`, 
`dia5_H6_4`, 
`dia5_R6_4`, 
`dia5_H7_4`, 
`dia5_R7_4`, 
`dia5_H8_4`, 
`dia5_R8_4`, 
`dia5_H9_4`, 
`dia5_R9_4`, 
`dia5_H10_4`, 
`dia5_R10_4`, 
`dia5_nombre1`, 
`dia5_HE1_1`, 
`dia5_HS1_1`, 
`dia5_HE2_1`, 
`dia5_HS2_1`, 
`dia5_HE3_1`, 
`dia5_HS3_1`, 
`dia5_HE4_1`, 
`dia5_HS4_1`, 
`dia5_HE5_1`, 
`dia5_HS5_1`, 
`dia5_nombre2`, 
`dia5_HE1_2`, 
`dia5_HS1_2`, 
`dia5_HE2_2`, 
`dia5_HS2_2`, 
`dia5_HE3_2`, 
`dia5_HS3_2`, 
`dia5_HE4_2`, 
`dia5_HS4_2`, 
`dia5_HE5_2`, 
`dia5_HS5_2`, 
`dia5_nombre3`, 
`dia5_HE1_3`, 
`dia5_HS1_3`, 
`dia5_HE2_3`, 
`dia5_HS2_3`, 
`dia5_HE3_3`, 
`dia5_HS3_3`, 
`dia5_HE4_3`, 
`dia5_HS4_3`, 
`dia5_HE5_3`, 
`dia5_HS5_3`, 
`dia5_nombre4`, 
`dia5_HE1_4`, 
`dia5_HS1_4`, 
`dia5_HE2_4`, 
`dia5_HS2_4`, 
`dia5_HE3_4`, 
`dia5_HS3_4`, 
`dia5_HE4_4`, 
`dia5_HS4_4`, 
`dia5_HE5_4`, 
`dia5_HS5_4`, 
`dia5_nombre5`, 
`dia5_HE1_5`, 
`dia5_HS1_5`, 
`dia5_HE2_5`, 
`dia5_HS2_5`, 
`dia5_HE3_5`, 
`dia5_HS3_5`, 
`dia5_HE4_5`, 
`dia5_HS4_5`, 
`dia5_HE5_5`, 
`dia5_HS5_5`, 
`dia6_fecha`, 
`dia6_equipo`, 
`dia6_marca`, 
`dia6_fecha_calib`, 
`dia6_propietario`, 
`dia6_bumptest_por`, 
`dia6_LEL`, 
`dia6_O`, 
`dia6_H2S`, 
`dia6_CO`, 
`dia6_pasa_bumptest`, 
`dia6_H1_1`, 
`dia6_R1_1`, 
`dia6_H2_1`, 
`dia6_R2_1`, 
`dia6_H3_1`, 
`dia6_R3_1`, 
`dia6_H4_1`, 
`dia6_R4_1`, 
`dia6_H5_1`, 
`dia6_R5_1`, 
`dia6_H6_1`, 
`dia6_R6_1`, 
`dia6_H7_1`, 
`dia6_R7_1`, 
`dia6_H8_1`, 
`dia6_R8_1`, 
`dia6_H9_1`, 
`dia6_R9_1`, 
`dia6_H10_1`, 
`dia6_R10_1`, 
`dia6_H1_2`, 
`dia6_R1_2`, 
`dia6_H2_2`, 
`dia6_R2_2`, 
`dia6_H3_2`, 
`dia6_R3_2`, 
`dia6_H4_2`, 
`dia6_R4_2`, 
`dia6_H5_2`, 
`dia6_R5_2`, 
`dia6_H6_2`, 
`dia6_R6_2`, 
`dia6_H7_2`, 
`dia6_R7_2`, 
`dia6_H8_2`, 
`dia6_R8_2`, 
`dia6_H9_2`, 
`dia6_R9_2`, 
`dia6_H10_2`, 
`dia6_R10_2`, 
`dia6_H1_3`, 
`dia6_R1_3`, 
`dia6_H2_3`, 
`dia6_R2_3`, 
`dia6_H3_3`, 
`dia6_R3_3`, 
`dia6_H4_3`, 
`dia6_R4_3`, 
`dia6_H5_3`, 
`dia6_R5_3`, 
`dia6_H6_3`, 
`dia6_R6_3`, 
`dia6_H7_3`, 
`dia6_R7_3`, 
`dia6_H8_3`, 
`dia6_R8_3`, 
`dia6_H9_3`, 
`dia6_R9_3`, 
`dia6_H10_3`, 
`dia6_R10_3`, 
`dia6_H1_4`, 
`dia6_R1_4`, 
`dia6_H2_4`, 
`dia6_R2_4`, 
`dia6_H3_4`, 
`dia6_R3_4`, 
`dia6_H4_4`, 
`dia6_R4_4`, 
`dia6_H5_4`, 
`dia6_R5_4`, 
`dia6_H6_4`, 
`dia6_R6_4`, 
`dia6_H7_4`, 
`dia6_R7_4`, 
`dia6_H8_4`, 
`dia6_R8_4`, 
`dia6_H9_4`, 
`dia6_R9_4`, 
`dia6_H10_4`, 
`dia6_R10_4`, 
`dia6_nombre1`, 
`dia6_HE1_1`, 
`dia6_HS1_1`, 
`dia6_HE2_1`, 
`dia6_HS2_1`, 
`dia6_HE3_1`, 
`dia6_HS3_1`, 
`dia6_HE4_1`, 
`dia6_HS4_1`, 
`dia6_HE5_1`, 
`dia6_HS5_1`, 
`dia6_nombre2`, 
`dia6_HE1_2`, 
`dia6_HS1_2`, 
`dia6_HE2_2`, 
`dia6_HS2_2`, 
`dia6_HE3_2`, 
`dia6_HS3_2`, 
`dia6_HE4_2`, 
`dia6_HS4_2`, 
`dia6_HE5_2`, 
`dia6_HS5_2`, 
`dia6_nombre3`, 
`dia6_HE1_3`, 
`dia6_HS1_3`, 
`dia6_HE2_3`, 
`dia6_HS2_3`, 
`dia6_HE3_3`, 
`dia6_HS3_3`, 
`dia6_HE4_3`, 
`dia6_HS4_3`, 
`dia6_HE5_3`, 
`dia6_HS5_3`, 
`dia6_nombre4`, 
`dia6_HE1_4`, 
`dia6_HS1_4`, 
`dia6_HE2_4`, 
`dia6_HS2_4`, 
`dia6_HE3_4`, 
`dia6_HS3_4`, 
`dia6_HE4_4`, 
`dia6_HS4_4`, 
`dia6_HE5_4`, 
`dia6_HS5_4`, 
`dia6_nombre5`, 
`dia6_HE1_5`, 
`dia6_HS1_5`, 
`dia6_HE2_5`, 
`dia6_HS2_5`, 
`dia6_HE3_5`, 
`dia6_HS3_5`, 
`dia6_HE4_5`, 
`dia6_HS4_5`, 
`dia6_HE5_5`, 
`dia6_HS5_5`
)

VALUES (
'$consecutivo', 
'$estado', 
'$usuario', 
'$fecha', 
'$pTEC', 
'$tipo_trabajo', 
'$dia1_fecha', 
'$dia1_equipo', 
'$dia1_marca', 
'$dia1_fecha_calib', 
'$dia1_propietario', 
'$dia1_bumptest_por', 
'$dia1_LEL', 
'$dia1_O', 
'$dia1_H2S', 
'$dia1_CO', 
'$dia1_pasa_bumptest', 
'$dia1_H1_1', 
'$dia1_R1_1', 
'$dia1_H2_1', 
'$dia1_R2_1', 
'$dia1_H3_1', 
'$dia1_R3_1', 
'$dia1_H4_1', 
'$dia1_R4_1', 
'$dia1_H5_1', 
'$dia1_R5_1', 
'$dia1_H6_1', 
'$dia1_R6_1', 
'$dia1_H7_1', 
'$dia1_R7_1', 
'$dia1_H8_1', 
'$dia1_R8_1', 
'$dia1_H9_1', 
'$dia1_R9_1', 
'$dia1_H10_1', 
'$dia1_R10_1', 
'$dia1_H1_2', 
'$dia1_R1_2', 
'$dia1_H2_2', 
'$dia1_R2_2', 
'$dia1_H3_2', 
'$dia1_R3_2', 
'$dia1_H4_2', 
'$dia1_R4_2', 
'$dia1_H5_2', 
'$dia1_R5_2', 
'$dia1_H6_2', 
'$dia1_R6_2', 
'$dia1_H7_2', 
'$dia1_R7_2', 
'$dia1_H8_2', 
'$dia1_R8_2', 
'$dia1_H9_2', 
'$dia1_R9_2', 
'$dia1_H10_2', 
'$dia1_R10_2', 
'$dia1_H1_3', 
'$dia1_R1_3', 
'$dia1_H2_3', 
'$dia1_R2_3', 
'$dia1_H3_3', 
'$dia1_R3_3', 
'$dia1_H4_3', 
'$dia1_R4_3', 
'$dia1_H5_3', 
'$dia1_R5_3', 
'$dia1_H6_3', 
'$dia1_R6_3', 
'$dia1_H7_3', 
'$dia1_R7_3', 
'$dia1_H8_3', 
'$dia1_R8_3', 
'$dia1_H9_3', 
'$dia1_R9_3', 
'$dia1_H10_3', 
'$dia1_R10_3', 
'$dia1_H1_4', 
'$dia1_R1_4', 
'$dia1_H2_4', 
'$dia1_R2_4', 
'$dia1_H3_4', 
'$dia1_R3_4', 
'$dia1_H4_4', 
'$dia1_R4_4', 
'$dia1_H5_4', 
'$dia1_R5_4', 
'$dia1_H6_4', 
'$dia1_R6_4', 
'$dia1_H7_4', 
'$dia1_R7_4', 
'$dia1_H8_4', 
'$dia1_R8_4', 
'$dia1_H9_4', 
'$dia1_R9_4', 
'$dia1_H10_4', 
'$dia1_R10_4', 
'$dia1_nombre1', 
'$dia1_HE1_1', 
'$dia1_HS1_1', 
'$dia1_HE2_1', 
'$dia1_HS2_1', 
'$dia1_HE3_1', 
'$dia1_HS3_1', 
'$dia1_HE4_1', 
'$dia1_HS4_1', 
'$dia1_HE5_1', 
'$dia1_HS5_1', 
'$dia1_nombre2', 
'$dia1_HE1_2', 
'$dia1_HS1_2', 
'$dia1_HE2_2', 
'$dia1_HS2_2', 
'$dia1_HE3_2', 
'$dia1_HS3_2', 
'$dia1_HE4_2', 
'$dia1_HS4_2', 
'$dia1_HE5_2', 
'$dia1_HS5_2', 
'$dia1_nombre3', 
'$dia1_HE1_3', 
'$dia1_HS1_3', 
'$dia1_HE2_3', 
'$dia1_HS2_3', 
'$dia1_HE3_3', 
'$dia1_HS3_3', 
'$dia1_HE4_3', 
'$dia1_HS4_3', 
'$dia1_HE5_3', 
'$dia1_HS5_3', 
'$dia1_nombre4', 
'$dia1_HE1_4', 
'$dia1_HS1_4', 
'$dia1_HE2_4', 
'$dia1_HS2_4', 
'$dia1_HE3_4', 
'$dia1_HS3_4', 
'$dia1_HE4_4', 
'$dia1_HS4_4', 
'$dia1_HE5_4', 
'$dia1_HS5_4', 
'$dia1_nombre5', 
'$dia1_HE1_5', 
'$dia1_HS1_5', 
'$dia1_HE2_5', 
'$dia1_HS2_5', 
'$dia1_HE3_5', 
'$dia1_HS3_5', 
'$dia1_HE4_5', 
'$dia1_HS4_5', 
'$dia1_HE5_5', 
'$dia1_HS5_5', 
'$dia2_fecha', 
'$dia2_equipo', 
'$dia2_marca', 
'$dia2_fecha_calib', 
'$dia2_propietario', 
'$dia2_bumptest_por', 
'$dia2_LEL', 
'$dia2_O', 
'$dia2_H2S', 
'$dia2_CO', 
'$dia2_pasa_bumptest', 
'$dia2_H1_1', 
'$dia2_R1_1', 
'$dia2_H2_1', 
'$dia2_R2_1', 
'$dia2_H3_1', 
'$dia2_R3_1', 
'$dia2_H4_1', 
'$dia2_R4_1', 
'$dia2_H5_1', 
'$dia2_R5_1', 
'$dia2_H6_1', 
'$dia2_R6_1', 
'$dia2_H7_1', 
'$dia2_R7_1', 
'$dia2_H8_1', 
'$dia2_R8_1', 
'$dia2_H9_1', 
'$dia2_R9_1', 
'$dia2_H10_1', 
'$dia2_R10_1', 
'$dia2_H1_2', 
'$dia2_R1_2', 
'$dia2_H2_2', 
'$dia2_R2_2', 
'$dia2_H3_2', 
'$dia2_R3_2', 
'$dia2_H4_2', 
'$dia2_R4_2', 
'$dia2_H5_2', 
'$dia2_R5_2', 
'$dia2_H6_2', 
'$dia2_R6_2', 
'$dia2_H7_2', 
'$dia2_R7_2', 
'$dia2_H8_2', 
'$dia2_R8_2', 
'$dia2_H9_2', 
'$dia2_R9_2', 
'$dia2_H10_2', 
'$dia2_R10_2', 
'$dia2_H1_3', 
'$dia2_R1_3', 
'$dia2_H2_3', 
'$dia2_R2_3', 
'$dia2_H3_3', 
'$dia2_R3_3', 
'$dia2_H4_3', 
'$dia2_R4_3', 
'$dia2_H5_3', 
'$dia2_R5_3', 
'$dia2_H6_3', 
'$dia2_R6_3', 
'$dia2_H7_3', 
'$dia2_R7_3', 
'$dia2_H8_3', 
'$dia2_R8_3', 
'$dia2_H9_3', 
'$dia2_R9_3', 
'$dia2_H10_3', 
'$dia2_R10_3', 
'$dia2_H1_4', 
'$dia2_R1_4', 
'$dia2_H2_4', 
'$dia2_R2_4', 
'$dia2_H3_4', 
'$dia2_R3_4', 
'$dia2_H4_4', 
'$dia2_R4_4', 
'$dia2_H5_4', 
'$dia2_R5_4', 
'$dia2_H6_4', 
'$dia2_R6_4', 
'$dia2_H7_4', 
'$dia2_R7_4', 
'$dia2_H8_4', 
'$dia2_R8_4', 
'$dia2_H9_4', 
'$dia2_R9_4', 
'$dia2_H10_4', 
'$dia2_R10_4', 
'$dia2_nombre1', 
'$dia2_HE1_1', 
'$dia2_HS1_1', 
'$dia2_HE2_1', 
'$dia2_HS2_1', 
'$dia2_HE3_1', 
'$dia2_HS3_1', 
'$dia2_HE4_1', 
'$dia2_HS4_1', 
'$dia2_HE5_1', 
'$dia2_HS5_1', 
'$dia2_nombre2', 
'$dia2_HE1_2', 
'$dia2_HS1_2', 
'$dia2_HE2_2', 
'$dia2_HS2_2', 
'$dia2_HE3_2', 
'$dia2_HS3_2', 
'$dia2_HE4_2', 
'$dia2_HS4_2', 
'$dia2_HE5_2', 
'$dia2_HS5_2', 
'$dia2_nombre3', 
'$dia2_HE1_3', 
'$dia2_HS1_3', 
'$dia2_HE2_3', 
'$dia2_HS2_3', 
'$dia2_HE3_3', 
'$dia2_HS3_3', 
'$dia2_HE4_3', 
'$dia2_HS4_3', 
'$dia2_HE5_3', 
'$dia2_HS5_3', 
'$dia2_nombre4', 
'$dia2_HE1_4', 
'$dia2_HS1_4', 
'$dia2_HE2_4', 
'$dia2_HS2_4', 
'$dia2_HE3_4', 
'$dia2_HS3_4', 
'$dia2_HE4_4', 
'$dia2_HS4_4', 
'$dia2_HE5_4', 
'$dia2_HS5_4', 
'$dia2_nombre5', 
'$dia2_HE1_5', 
'$dia2_HS1_5', 
'$dia2_HE2_5', 
'$dia2_HS2_5', 
'$dia2_HE3_5', 
'$dia2_HS3_5', 
'$dia2_HE4_5', 
'$dia2_HS4_5', 
'$dia2_HE5_5', 
'$dia2_HS5_5', 
'$dia3_fecha', 
'$dia3_equipo', 
'$dia3_marca', 
'$dia3_fecha_calib', 
'$dia3_propietario', 
'$dia3_bumptest_por', 
'$dia3_LEL', 
'$dia3_O', 
'$dia3_H2S', 
'$dia3_CO', 
'$dia3_pasa_bumptest', 
'$dia3_H1_1', 
'$dia3_R1_1', 
'$dia3_H2_1', 
'$dia3_R2_1', 
'$dia3_H3_1', 
'$dia3_R3_1', 
'$dia3_H4_1', 
'$dia3_R4_1', 
'$dia3_H5_1', 
'$dia3_R5_1', 
'$dia3_H6_1', 
'$dia3_R6_1', 
'$dia3_H7_1', 
'$dia3_R7_1', 
'$dia3_H8_1', 
'$dia3_R8_1', 
'$dia3_H9_1', 
'$dia3_R9_1', 
'$dia3_H10_1', 
'$dia3_R10_1', 
'$dia3_H1_2', 
'$dia3_R1_2', 
'$dia3_H2_2', 
'$dia3_R2_2', 
'$dia3_H3_2', 
'$dia3_R3_2', 
'$dia3_H4_2', 
'$dia3_R4_2', 
'$dia3_H5_2', 
'$dia3_R5_2', 
'$dia3_H6_2', 
'$dia3_R6_2', 
'$dia3_H7_2', 
'$dia3_R7_2', 
'$dia3_H8_2', 
'$dia3_R8_2', 
'$dia3_H9_2', 
'$dia3_R9_2', 
'$dia3_H10_2', 
'$dia3_R10_2', 
'$dia3_H1_3', 
'$dia3_R1_3', 
'$dia3_H2_3', 
'$dia3_R2_3', 
'$dia3_H3_3', 
'$dia3_R3_3', 
'$dia3_H4_3', 
'$dia3_R4_3', 
'$dia3_H5_3', 
'$dia3_R5_3', 
'$dia3_H6_3', 
'$dia3_R6_3', 
'$dia3_H7_3', 
'$dia3_R7_3', 
'$dia3_H8_3', 
'$dia3_R8_3', 
'$dia3_H9_3', 
'$dia3_R9_3', 
'$dia3_H10_3', 
'$dia3_R10_3', 
'$dia3_H1_4', 
'$dia3_R1_4', 
'$dia3_H2_4', 
'$dia3_R2_4', 
'$dia3_H3_4', 
'$dia3_R3_4', 
'$dia3_H4_4', 
'$dia3_R4_4', 
'$dia3_H5_4', 
'$dia3_R5_4', 
'$dia3_H6_4', 
'$dia3_R6_4', 
'$dia3_H7_4', 
'$dia3_R7_4', 
'$dia3_H8_4', 
'$dia3_R8_4', 
'$dia3_H9_4', 
'$dia3_R9_4', 
'$dia3_H10_4', 
'$dia3_R10_4', 
'$dia3_nombre1', 
'$dia3_HE1_1', 
'$dia3_HS1_1', 
'$dia3_HE2_1', 
'$dia3_HS2_1', 
'$dia3_HE3_1', 
'$dia3_HS3_1', 
'$dia3_HE4_1', 
'$dia3_HS4_1', 
'$dia3_HE5_1', 
'$dia3_HS5_1', 
'$dia3_nombre2', 
'$dia3_HE1_2', 
'$dia3_HS1_2', 
'$dia3_HE2_2', 
'$dia3_HS2_2', 
'$dia3_HE3_2', 
'$dia3_HS3_2', 
'$dia3_HE4_2', 
'$dia3_HS4_2', 
'$dia3_HE5_2', 
'$dia3_HS5_2', 
'$dia3_nombre3', 
'$dia3_HE1_3', 
'$dia3_HS1_3', 
'$dia3_HE2_3', 
'$dia3_HS2_3', 
'$dia3_HE3_3', 
'$dia3_HS3_3', 
'$dia3_HE4_3', 
'$dia3_HS4_3', 
'$dia3_HE5_3', 
'$dia3_HS5_3', 
'$dia3_nombre4', 
'$dia3_HE1_4', 
'$dia3_HS1_4', 
'$dia3_HE2_4', 
'$dia3_HS2_4', 
'$dia3_HE3_4', 
'$dia3_HS3_4', 
'$dia3_HE4_4', 
'$dia3_HS4_4', 
'$dia3_HE5_4', 
'$dia3_HS5_4', 
'$dia3_nombre5', 
'$dia3_HE1_5', 
'$dia3_HS1_5', 
'$dia3_HE2_5', 
'$dia3_HS2_5', 
'$dia3_HE3_5', 
'$dia3_HS3_5', 
'$dia3_HE4_5', 
'$dia3_HS4_5', 
'$dia3_HE5_5', 
'$dia3_HS5_5', 
'$dia4_fecha', 
'$dia4_equipo', 
'$dia4_marca', 
'$dia4_fecha_calib', 
'$dia4_propietario', 
'$dia4_bumptest_por', 
'$dia4_LEL', 
'$dia4_O', 
'$dia4_H2S', 
'$dia4_CO', 
'$dia4_pasa_bumptest', 
'$dia4_H1_1', 
'$dia4_R1_1', 
'$dia4_H2_1', 
'$dia4_R2_1', 
'$dia4_H3_1', 
'$dia4_R3_1', 
'$dia4_H4_1', 
'$dia4_R4_1', 
'$dia4_H5_1', 
'$dia4_R5_1', 
'$dia4_H6_1', 
'$dia4_R6_1', 
'$dia4_H7_1', 
'$dia4_R7_1', 
'$dia4_H8_1', 
'$dia4_R8_1', 
'$dia4_H9_1', 
'$dia4_R9_1', 
'$dia4_H10_1', 
'$dia4_R10_1', 
'$dia4_H1_2', 
'$dia4_R1_2', 
'$dia4_H2_2', 
'$dia4_R2_2', 
'$dia4_H3_2', 
'$dia4_R3_2', 
'$dia4_H4_2', 
'$dia4_R4_2', 
'$dia4_H5_2', 
'$dia4_R5_2', 
'$dia4_H6_2', 
'$dia4_R6_2', 
'$dia4_H7_2', 
'$dia4_R7_2', 
'$dia4_H8_2', 
'$dia4_R8_2', 
'$dia4_H9_2', 
'$dia4_R9_2', 
'$dia4_H10_2', 
'$dia4_R10_2', 
'$dia4_H1_3', 
'$dia4_R1_3', 
'$dia4_H2_3', 
'$dia4_R2_3', 
'$dia4_H3_3', 
'$dia4_R3_3', 
'$dia4_H4_3', 
'$dia4_R4_3', 
'$dia4_H5_3', 
'$dia4_R5_3', 
'$dia4_H6_3', 
'$dia4_R6_3', 
'$dia4_H7_3', 
'$dia4_R7_3', 
'$dia4_H8_3', 
'$dia4_R8_3', 
'$dia4_H9_3', 
'$dia4_R9_3', 
'$dia4_H10_3', 
'$dia4_R10_3', 
'$dia4_H1_4', 
'$dia4_R1_4', 
'$dia4_H2_4', 
'$dia4_R2_4', 
'$dia4_H3_4', 
'$dia4_R3_4', 
'$dia4_H4_4', 
'$dia4_R4_4', 
'$dia4_H5_4', 
'$dia4_R5_4', 
'$dia4_H6_4', 
'$dia4_R6_4', 
'$dia4_H7_4', 
'$dia4_R7_4', 
'$dia4_H8_4', 
'$dia4_R8_4', 
'$dia4_H9_4', 
'$dia4_R9_4', 
'$dia4_H10_4', 
'$dia4_R10_4', 
'$dia4_nombre1', 
'$dia4_HE1_1', 
'$dia4_HS1_1', 
'$dia4_HE2_1', 
'$dia4_HS2_1', 
'$dia4_HE3_1', 
'$dia4_HS3_1', 
'$dia4_HE4_1', 
'$dia4_HS4_1', 
'$dia4_HE5_1', 
'$dia4_HS5_1', 
'$dia4_nombre2', 
'$dia4_HE1_2', 
'$dia4_HS1_2', 
'$dia4_HE2_2', 
'$dia4_HS2_2', 
'$dia4_HE3_2', 
'$dia4_HS3_2', 
'$dia4_HE4_2', 
'$dia4_HS4_2', 
'$dia4_HE5_2', 
'$dia4_HS5_2', 
'$dia4_nombre3', 
'$dia4_HE1_3', 
'$dia4_HS1_3', 
'$dia4_HE2_3', 
'$dia4_HS2_3', 
'$dia4_HE3_3', 
'$dia4_HS3_3', 
'$dia4_HE4_3', 
'$dia4_HS4_3', 
'$dia4_HE5_3', 
'$dia4_HS5_3', 
'$dia4_nombre4', 
'$dia4_HE1_4', 
'$dia4_HS1_4', 
'$dia4_HE2_4', 
'$dia4_HS2_4', 
'$dia4_HE3_4', 
'$dia4_HS3_4', 
'$dia4_HE4_4', 
'$dia4_HS4_4', 
'$dia4_HE5_4', 
'$dia4_HS5_4', 
'$dia4_nombre5', 
'$dia4_HE1_5', 
'$dia4_HS1_5', 
'$dia4_HE2_5', 
'$dia4_HS2_5', 
'$dia4_HE3_5', 
'$dia4_HS3_5', 
'$dia4_HE4_5', 
'$dia4_HS4_5', 
'$dia4_HE5_5', 
'$dia4_HS5_5', 
'$dia5_fecha', 
'$dia5_equipo', 
'$dia5_marca', 
'$dia5_fecha_calib', 
'$dia5_propietario', 
'$dia5_bumptest_por', 
'$dia5_LEL', 
'$dia5_O', 
'$dia5_H2S', 
'$dia5_CO', 
'$dia5_pasa_bumptest', 
'$dia5_H1_1', 
'$dia5_R1_1', 
'$dia5_H2_1', 
'$dia5_R2_1', 
'$dia5_H3_1', 
'$dia5_R3_1', 
'$dia5_H4_1', 
'$dia5_R4_1', 
'$dia5_H5_1', 
'$dia5_R5_1', 
'$dia5_H6_1', 
'$dia5_R6_1', 
'$dia5_H7_1', 
'$dia5_R7_1', 
'$dia5_H8_1', 
'$dia5_R8_1', 
'$dia5_H9_1', 
'$dia5_R9_1', 
'$dia5_H10_1', 
'$dia5_R10_1', 
'$dia5_H1_2', 
'$dia5_R1_2', 
'$dia5_H2_2', 
'$dia5_R2_2', 
'$dia5_H3_2', 
'$dia5_R3_2', 
'$dia5_H4_2', 
'$dia5_R4_2', 
'$dia5_H5_2', 
'$dia5_R5_2', 
'$dia5_H6_2', 
'$dia5_R6_2', 
'$dia5_H7_2', 
'$dia5_R7_2', 
'$dia5_H8_2', 
'$dia5_R8_2', 
'$dia5_H9_2', 
'$dia5_R9_2', 
'$dia5_H10_2', 
'$dia5_R10_2', 
'$dia5_H1_3', 
'$dia5_R1_3', 
'$dia5_H2_3', 
'$dia5_R2_3', 
'$dia5_H3_3', 
'$dia5_R3_3', 
'$dia5_H4_3', 
'$dia5_R4_3', 
'$dia5_H5_3', 
'$dia5_R5_3', 
'$dia5_H6_3', 
'$dia5_R6_3', 
'$dia5_H7_3', 
'$dia5_R7_3', 
'$dia5_H8_3', 
'$dia5_R8_3', 
'$dia5_H9_3', 
'$dia5_R9_3', 
'$dia5_H10_3', 
'$dia5_R10_3', 
'$dia5_H1_4', 
'$dia5_R1_4', 
'$dia5_H2_4', 
'$dia5_R2_4', 
'$dia5_H3_4', 
'$dia5_R3_4', 
'$dia5_H4_4', 
'$dia5_R4_4', 
'$dia5_H5_4', 
'$dia5_R5_4', 
'$dia5_H6_4', 
'$dia5_R6_4', 
'$dia5_H7_4', 
'$dia5_R7_4', 
'$dia5_H8_4', 
'$dia5_R8_4', 
'$dia5_H9_4', 
'$dia5_R9_4', 
'$dia5_H10_4', 
'$dia5_R10_4', 
'$dia5_nombre1', 
'$dia5_HE1_1', 
'$dia5_HS1_1', 
'$dia5_HE2_1', 
'$dia5_HS2_1', 
'$dia5_HE3_1', 
'$dia5_HS3_1', 
'$dia5_HE4_1', 
'$dia5_HS4_1', 
'$dia5_HE5_1', 
'$dia5_HS5_1', 
'$dia5_nombre2', 
'$dia5_HE1_2', 
'$dia5_HS1_2', 
'$dia5_HE2_2', 
'$dia5_HS2_2', 
'$dia5_HE3_2', 
'$dia5_HS3_2', 
'$dia5_HE4_2', 
'$dia5_HS4_2', 
'$dia5_HE5_2', 
'$dia5_HS5_2', 
'$dia5_nombre3', 
'$dia5_HE1_3', 
'$dia5_HS1_3', 
'$dia5_HE2_3', 
'$dia5_HS2_3', 
'$dia5_HE3_3', 
'$dia5_HS3_3', 
'$dia5_HE4_3', 
'$dia5_HS4_3', 
'$dia5_HE5_3', 
'$dia5_HS5_3', 
'$dia5_nombre4', 
'$dia5_HE1_4', 
'$dia5_HS1_4', 
'$dia5_HE2_4', 
'$dia5_HS2_4', 
'$dia5_HE3_4', 
'$dia5_HS3_4', 
'$dia5_HE4_4', 
'$dia5_HS4_4', 
'$dia5_HE5_4', 
'$dia5_HS5_4', 
'$dia5_nombre5', 
'$dia5_HE1_5', 
'$dia5_HS1_5', 
'$dia5_HE2_5', 
'$dia5_HS2_5', 
'$dia5_HE3_5', 
'$dia5_HS3_5', 
'$dia5_HE4_5', 
'$dia5_HS4_5', 
'$dia5_HE5_5', 
'$dia5_HS5_5', 
'$dia6_fecha', 
'$dia6_equipo', 
'$dia6_marca', 
'$dia6_fecha_calib', 
'$dia6_propietario', 
'$dia6_bumptest_por', 
'$dia6_LEL', 
'$dia6_O', 
'$dia6_H2S', 
'$dia6_CO', 
'$dia6_pasa_bumptest', 
'$dia6_H1_1', 
'$dia6_R1_1', 
'$dia6_H2_1', 
'$dia6_R2_1', 
'$dia6_H3_1', 
'$dia6_R3_1', 
'$dia6_H4_1', 
'$dia6_R4_1', 
'$dia6_H5_1', 
'$dia6_R5_1', 
'$dia6_H6_1', 
'$dia6_R6_1', 
'$dia6_H7_1', 
'$dia6_R7_1', 
'$dia6_H8_1', 
'$dia6_R8_1', 
'$dia6_H9_1', 
'$dia6_R9_1', 
'$dia6_H10_1', 
'$dia6_R10_1', 
'$dia6_H1_2', 
'$dia6_R1_2', 
'$dia6_H2_2', 
'$dia6_R2_2', 
'$dia6_H3_2', 
'$dia6_R3_2', 
'$dia6_H4_2', 
'$dia6_R4_2', 
'$dia6_H5_2', 
'$dia6_R5_2', 
'$dia6_H6_2', 
'$dia6_R6_2', 
'$dia6_H7_2', 
'$dia6_R7_2', 
'$dia6_H8_2', 
'$dia6_R8_2', 
'$dia6_H9_2', 
'$dia6_R9_2', 
'$dia6_H10_2', 
'$dia6_R10_2', 
'$dia6_H1_3', 
'$dia6_R1_3', 
'$dia6_H2_3', 
'$dia6_R2_3', 
'$dia6_H3_3', 
'$dia6_R3_3', 
'$dia6_H4_3', 
'$dia6_R4_3', 
'$dia6_H5_3', 
'$dia6_R5_3', 
'$dia6_H6_3', 
'$dia6_R6_3', 
'$dia6_H7_3', 
'$dia6_R7_3', 
'$dia6_H8_3', 
'$dia6_R8_3', 
'$dia6_H9_3', 
'$dia6_R9_3', 
'$dia6_H10_3', 
'$dia6_R10_3', 
'$dia6_H1_4', 
'$dia6_R1_4', 
'$dia6_H2_4', 
'$dia6_R2_4', 
'$dia6_H3_4', 
'$dia6_R3_4', 
'$dia6_H4_4', 
'$dia6_R4_4', 
'$dia6_H5_4', 
'$dia6_R5_4', 
'$dia6_H6_4', 
'$dia6_R6_4', 
'$dia6_H7_4', 
'$dia6_R7_4', 
'$dia6_H8_4', 
'$dia6_R8_4', 
'$dia6_H9_4', 
'$dia6_R9_4', 
'$dia6_H10_4', 
'$dia6_R10_4', 
'$dia6_nombre1', 
'$dia6_HE1_1', 
'$dia6_HS1_1', 
'$dia6_HE2_1', 
'$dia6_HS2_1', 
'$dia6_HE3_1', 
'$dia6_HS3_1', 
'$dia6_HE4_1', 
'$dia6_HS4_1', 
'$dia6_HE5_1', 
'$dia6_HS5_1', 
'$dia6_nombre2', 
'$dia6_HE1_2', 
'$dia6_HS1_2', 
'$dia6_HE2_2', 
'$dia6_HS2_2', 
'$dia6_HE3_2', 
'$dia6_HS3_2', 
'$dia6_HE4_2', 
'$dia6_HS4_2', 
'$dia6_HE5_2', 
'$dia6_HS5_2', 
'$dia6_nombre3', 
'$dia6_HE1_3', 
'$dia6_HS1_3', 
'$dia6_HE2_3', 
'$dia6_HS2_3', 
'$dia6_HE3_3', 
'$dia6_HS3_3', 
'$dia6_HE4_3', 
'$dia6_HS4_3', 
'$dia6_HE5_3', 
'$dia6_HS5_3', 
'$dia6_nombre4', 
'$dia6_HE1_4', 
'$dia6_HS1_4', 
'$dia6_HE2_4', 
'$dia6_HS2_4', 
'$dia6_HE3_4', 
'$dia6_HS3_4', 
'$dia6_HE4_4', 
'$dia6_HS4_4', 
'$dia6_HE5_4', 
'$dia6_HS5_4', 
'$dia6_nombre5', 
'$dia6_HE1_5', 
'$dia6_HS1_5', 
'$dia6_HE2_5', 
'$dia6_HS2_5', 
'$dia6_HE3_5', 
'$dia6_HS3_5', 
'$dia6_HE4_5', 
'$dia6_HS4_5', 
'$dia6_HE5_5', 
'$dia6_HS5_5'
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
