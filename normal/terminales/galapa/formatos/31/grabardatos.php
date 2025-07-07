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
$horaA = $_REQUEST['horaA'];
$certhabilit = $_REQUEST['certhabilit'];
$empresaA = $_REQUEST['empresaA'];
$nombreA = $_REQUEST['nombreA'];
$descripcion = $_REQUEST['descripcion'];
$equipos = $_REQUEST['equipos'];
$ejecutorC = $_REQUEST['ejecutorC'];
$inspectorC = $_REQUEST['inspectorC'];
$hora1D = $_REQUEST['hora1D'];
$fecha1D = $_REQUEST['fecha1D'];
$hora2D = $_REQUEST['hora2D'];
$fecha2D = $_REQUEST['fecha2D'];
$emisorD = $_REQUEST['emisorD'];
$EPP_B = $_REQUEST['EPP_B'];
$otrosE = $_REQUEST['otrosE'];
$EPP_CE = $_REQUEST['EPP_CE'];
$EPP_AE = $_REQUEST['EPP_AE'];
$FAE1 = $_REQUEST['FAE1'];
$equiposAE = $_REQUEST['equiposAE'];
$voltajeF = $_REQUEST['voltajeF'];
$AE1 = $_REQUEST['AE1'];
$AE2 = $_REQUEST['AE2'];
$AE3 = $_REQUEST['AE3'];
$AE4 = $_REQUEST['AE4'];
$AE5 = $_REQUEST['AE5'];
$AE6 = $_REQUEST['AE6'];
$FAM1 = $_REQUEST['FAM1'];
$equiposAM = $_REQUEST['equiposAM'];
$apequipos = $_REQUEST['apequipos'];
$AM1 = $_REQUEST['AM1'];
$AM2 = $_REQUEST['AM2'];
$AM3 = $_REQUEST['AM3'];
$AM4 = $_REQUEST['AM4'];
$AM5 = $_REQUEST['AM5'];
$AM6 = $_REQUEST['AM6'];
$F1 = $_REQUEST['F1'];
$F2 = $_REQUEST['F2'];
$F3 = $_REQUEST['F3'];
$F4 = $_REQUEST['F4'];
$F5 = $_REQUEST['F5'];
$F6 = $_REQUEST['F6'];
$F7 = $_REQUEST['F7'];
$F8 = $_REQUEST['F8'];
$F9 = $_REQUEST['F9'];
$F10 = $_REQUEST['F10'];
$F11 = $_REQUEST['F11'];
$F12 = $_REQUEST['F12'];
$F13 = $_REQUEST['F13'];
$F14 = $_REQUEST['F14'];
$GA1 = $_REQUEST['GA1'];
$GB1 = $_REQUEST['GB1'];
$GC1 = $_REQUEST['GC1'];
$GD1 = $_REQUEST['GD1'];
$GE1 = $_REQUEST['GE1'];
$GF1 = $_REQUEST['GF1'];
$GG1 = $_REQUEST['GG1'];
$GH1 = $_REQUEST['GH1'];
$GI1 = $_REQUEST['GI1'];
$GA2 = $_REQUEST['GA2'];
$GB2 = $_REQUEST['GB2'];
$GC2 = $_REQUEST['GC2'];
$GD2 = $_REQUEST['GD2'];
$GE2 = $_REQUEST['GE2'];
$GF2 = $_REQUEST['GF2'];
$GG2 = $_REQUEST['GG2'];
$GH2 = $_REQUEST['GH2'];
$GI2 = $_REQUEST['GI2'];
$GA3 = $_REQUEST['GA3'];
$GB3 = $_REQUEST['GB3'];
$GC3 = $_REQUEST['GC3'];
$GD3 = $_REQUEST['GD3'];
$GE3 = $_REQUEST['GE3'];
$GF3 = $_REQUEST['GF3'];
$GG3 = $_REQUEST['GG3'];
$GH3 = $_REQUEST['GH3'];
$GI3 = $_REQUEST['GI3'];
$H1 = $_REQUEST['H1'];
$H2 = $_REQUEST['H2'];
$H3 = $_REQUEST['H3'];
$H4 = $_REQUEST['H4'];
$H5 = $_REQUEST['H5'];
$H6 = $_REQUEST['H6'];
$H7 = $_REQUEST['H7'];
$H8 = $_REQUEST['H8'];
$H9 = $_REQUEST['H9'];
$H10 = $_REQUEST['H10'];
$H11 = $_REQUEST['H11'];
$H12 = $_REQUEST['H12'];
$H13 = $_REQUEST['H13'];
$H14 = $_REQUEST['H14'];
$cuadro = $_REQUEST['cuadro'];
$descripcionI = $_REQUEST['descripcionI'];
$autorizadoI = $_REQUEST['autorizadoI'];
$IA1 = $_REQUEST['IA1'];
$IB1 = $_REQUEST['IB1'];
$IC1 = $_REQUEST['IC1'];
$ID1 = $_REQUEST['ID1'];
$IE1 = $_REQUEST['IE1'];
$IF1 = $_REQUEST['IF1'];
$IG1 = $_REQUEST['IG1'];
$IH1 = $_REQUEST['IH1'];
$II1 = $_REQUEST['II1'];
$IJ1 = $_REQUEST['IJ1'];
$IK1 = $_REQUEST['IK1'];
$IL1 = $_REQUEST['IL1'];
$IM1 = $_REQUEST['IM1'];
$IA2 = $_REQUEST['IA2'];
$IB2 = $_REQUEST['IB2'];
$IC2 = $_REQUEST['IC2'];
$ID2 = $_REQUEST['ID2'];
$IE2 = $_REQUEST['IE2'];
$IF2 = $_REQUEST['IF2'];
$IG2 = $_REQUEST['IG2'];
$IH2 = $_REQUEST['IH2'];
$II2 = $_REQUEST['II2'];
$IJ2 = $_REQUEST['IJ2'];
$IK2 = $_REQUEST['IK2'];
$IL2 = $_REQUEST['IL2'];
$IM2 = $_REQUEST['IM2'];
$IA3 = $_REQUEST['IA3'];
$IB3 = $_REQUEST['IB3'];
$IC3 = $_REQUEST['IC3'];
$ID3 = $_REQUEST['ID3'];
$IE3 = $_REQUEST['IE3'];
$IF3 = $_REQUEST['IF3'];
$IG3 = $_REQUEST['IG3'];
$IH3 = $_REQUEST['IH3'];
$II3 = $_REQUEST['II3'];
$IJ3 = $_REQUEST['IJ3'];
$IK3 = $_REQUEST['IK3'];
$IL3 = $_REQUEST['IL3'];
$IM3 = $_REQUEST['IM3'];
$IA4 = $_REQUEST['IA4'];
$IB4 = $_REQUEST['IB4'];
$IC4 = $_REQUEST['IC4'];
$ID4 = $_REQUEST['ID4'];
$IE4 = $_REQUEST['IE4'];
$IF4 = $_REQUEST['IF4'];
$IG4 = $_REQUEST['IG4'];
$IH4 = $_REQUEST['IH4'];
$II4 = $_REQUEST['II4'];
$IJ4 = $_REQUEST['IJ4'];
$IK4 = $_REQUEST['IK4'];
$IL4 = $_REQUEST['IL4'];
$IM4 = $_REQUEST['IM4'];
$IA5 = $_REQUEST['IA5'];
$IB5 = $_REQUEST['IB5'];
$IC5 = $_REQUEST['IC5'];
$ID5 = $_REQUEST['ID5'];
$IE5 = $_REQUEST['IE5'];
$IF5 = $_REQUEST['IF5'];
$IG5 = $_REQUEST['IG5'];
$IH5 = $_REQUEST['IH5'];
$II5 = $_REQUEST['II5'];
$IJ5 = $_REQUEST['IJ5'];
$IK5 = $_REQUEST['IK5'];
$IL5 = $_REQUEST['IL5'];
$IM5 = $_REQUEST['IM5'];
$IA6 = $_REQUEST['IA6'];
$IB6 = $_REQUEST['IB6'];
$IC6 = $_REQUEST['IC6'];
$ID6 = $_REQUEST['ID6'];
$IE6 = $_REQUEST['IE6'];
$IF6 = $_REQUEST['IF6'];
$IG6 = $_REQUEST['IG6'];
$IH6 = $_REQUEST['IH6'];
$II6 = $_REQUEST['II6'];
$IJ6 = $_REQUEST['IJ6'];
$IK6 = $_REQUEST['IK6'];
$IL6 = $_REQUEST['IL6'];
$IM6 = $_REQUEST['IM6'];
$IA7 = $_REQUEST['IA7'];
$IB7 = $_REQUEST['IB7'];
$IC7 = $_REQUEST['IC7'];
$ID7 = $_REQUEST['ID7'];
$IE7 = $_REQUEST['IE7'];
$IF7 = $_REQUEST['IF7'];
$IG7 = $_REQUEST['IG7'];
$IH7 = $_REQUEST['IH7'];
$II7 = $_REQUEST['II7'];
$IJ7 = $_REQUEST['IJ7'];
$IK7 = $_REQUEST['IK7'];
$IL7 = $_REQUEST['IL7'];
$IM7 = $_REQUEST['IM7'];
$IA8 = $_REQUEST['IA8'];
$IB8 = $_REQUEST['IB8'];
$IC8 = $_REQUEST['IC8'];
$ID8 = $_REQUEST['ID8'];
$IE8 = $_REQUEST['IE8'];
$IF8 = $_REQUEST['IF8'];
$IG8 = $_REQUEST['IG8'];
$IH8 = $_REQUEST['IH8'];
$II8 = $_REQUEST['II8'];
$IJ8 = $_REQUEST['IJ8'];
$IK8 = $_REQUEST['IK8'];
$IL8 = $_REQUEST['IL8'];
$IM8 = $_REQUEST['IM8'];
$IA9 = $_REQUEST['IA9'];
$IB9 = $_REQUEST['IB9'];
$IC9 = $_REQUEST['IC9'];
$ID9 = $_REQUEST['ID9'];
$IE9 = $_REQUEST['IE9'];
$IF9 = $_REQUEST['IF9'];
$IG9 = $_REQUEST['IG9'];
$IH9 = $_REQUEST['IH9'];
$II9 = $_REQUEST['II9'];
$IJ9 = $_REQUEST['IJ9'];
$IK9 = $_REQUEST['IK9'];
$IL9 = $_REQUEST['IL9'];
$IM9 = $_REQUEST['IM9'];
$IA10 = $_REQUEST['IA10'];
$IB10 = $_REQUEST['IB10'];
$IC10 = $_REQUEST['IC10'];
$ID10 = $_REQUEST['ID10'];
$IE10 = $_REQUEST['IE10'];
$IF10 = $_REQUEST['IF10'];
$IG10 = $_REQUEST['IG10'];
$IH10 = $_REQUEST['IH10'];
$II10 = $_REQUEST['II10'];
$IJ10 = $_REQUEST['IJ10'];
$IK10 = $_REQUEST['IK10'];
$IL10 = $_REQUEST['IL10'];
$IM10 = $_REQUEST['IM10'];
$IA11 = $_REQUEST['IA11'];
$IB11 = $_REQUEST['IB11'];
$IC11 = $_REQUEST['IC11'];
$ID11 = $_REQUEST['ID11'];
$IE11 = $_REQUEST['IE11'];
$IF11 = $_REQUEST['IF11'];
$IG11 = $_REQUEST['IG11'];
$IH11 = $_REQUEST['IH11'];
$II11 = $_REQUEST['II11'];
$IJ11 = $_REQUEST['IJ11'];
$IK11 = $_REQUEST['IK11'];
$IL11 = $_REQUEST['IL11'];
$IM11 = $_REQUEST['IM11'];
$IA12 = $_REQUEST['IA12'];
$IB12 = $_REQUEST['IB12'];
$IC12 = $_REQUEST['IC12'];
$ID12 = $_REQUEST['ID12'];
$IE12 = $_REQUEST['IE12'];
$IF12 = $_REQUEST['IF12'];
$IG12 = $_REQUEST['IG12'];
$IH12 = $_REQUEST['IH12'];
$II12 = $_REQUEST['II12'];
$IJ12 = $_REQUEST['IJ12'];
$IK12 = $_REQUEST['IK12'];
$IL12 = $_REQUEST['IL12'];
$IM12 = $_REQUEST['IM12'];
$IA13 = $_REQUEST['IA13'];
$IB13 = $_REQUEST['IB13'];
$IC13 = $_REQUEST['IC13'];
$ID13 = $_REQUEST['ID13'];
$IE13 = $_REQUEST['IE13'];
$IF13 = $_REQUEST['IF13'];
$IG13 = $_REQUEST['IG13'];
$IH13 = $_REQUEST['IH13'];
$II13 = $_REQUEST['II13'];
$IJ13 = $_REQUEST['IJ13'];
$IK13 = $_REQUEST['IK13'];
$IL13 = $_REQUEST['IL13'];
$IM13 = $_REQUEST['IM13'];
$IA14 = $_REQUEST['IA14'];
$IB14 = $_REQUEST['IB14'];
$IC14 = $_REQUEST['IC14'];
$ID14 = $_REQUEST['ID14'];
$IE14 = $_REQUEST['IE14'];
$IF14 = $_REQUEST['IF14'];
$IG14 = $_REQUEST['IG14'];
$IH14 = $_REQUEST['IH14'];
$II14 = $_REQUEST['II14'];
$IJ14 = $_REQUEST['IJ14'];
$IK14 = $_REQUEST['IK14'];
$IL14 = $_REQUEST['IL14'];
$IM14 = $_REQUEST['IM14'];
$IA15 = $_REQUEST['IA15'];
$IB15 = $_REQUEST['IB15'];
$IC15 = $_REQUEST['IC15'];
$ID15 = $_REQUEST['ID15'];
$IE15 = $_REQUEST['IE15'];
$IF15 = $_REQUEST['IF15'];
$IG15 = $_REQUEST['IG15'];
$IH15 = $_REQUEST['IH15'];
$II15 = $_REQUEST['II15'];
$IJ15 = $_REQUEST['IJ15'];
$IK15 = $_REQUEST['IK15'];
$IL15 = $_REQUEST['IL15'];
$IM15 = $_REQUEST['IM15'];
$IA16 = $_REQUEST['IA16'];
$IB16 = $_REQUEST['IB16'];
$IC16 = $_REQUEST['IC16'];
$ID16 = $_REQUEST['ID16'];
$IE16 = $_REQUEST['IE16'];
$IF16 = $_REQUEST['IF16'];
$IG16 = $_REQUEST['IG16'];
$IH16 = $_REQUEST['IH16'];
$II16 = $_REQUEST['II16'];
$IJ16 = $_REQUEST['IJ16'];
$IK16 = $_REQUEST['IK16'];
$IL16 = $_REQUEST['IL16'];
$IM16 = $_REQUEST['IM16'];
$IA17 = $_REQUEST['IA17'];
$IB17 = $_REQUEST['IB17'];
$IC17 = $_REQUEST['IC17'];
$ID17 = $_REQUEST['ID17'];
$IE17 = $_REQUEST['IE17'];
$IF17 = $_REQUEST['IF17'];
$IG17 = $_REQUEST['IG17'];
$IH17 = $_REQUEST['IH17'];
$II17 = $_REQUEST['II17'];
$IJ17 = $_REQUEST['IJ17'];
$IK17 = $_REQUEST['IK17'];
$IL17 = $_REQUEST['IL17'];
$IM17 = $_REQUEST['IM17'];
$IA18 = $_REQUEST['IA18'];
$IB18 = $_REQUEST['IB18'];
$IC18 = $_REQUEST['IC18'];
$ID18 = $_REQUEST['ID18'];
$IE18 = $_REQUEST['IE18'];
$IF18 = $_REQUEST['IF18'];
$IG18 = $_REQUEST['IG18'];
$IH18 = $_REQUEST['IH18'];
$II18 = $_REQUEST['II18'];
$IJ18 = $_REQUEST['IJ18'];
$IK18 = $_REQUEST['IK18'];
$IL18 = $_REQUEST['IL18'];
$IM18 = $_REQUEST['IM18'];
$IA19 = $_REQUEST['IA19'];
$IB19 = $_REQUEST['IB19'];
$IC19 = $_REQUEST['IC19'];
$ID19 = $_REQUEST['ID19'];
$IE19 = $_REQUEST['IE19'];
$IF19 = $_REQUEST['IF19'];
$IG19 = $_REQUEST['IG19'];
$IH19 = $_REQUEST['IH19'];
$II19 = $_REQUEST['II19'];
$IJ19 = $_REQUEST['IJ19'];
$IK19 = $_REQUEST['IK19'];
$IL19 = $_REQUEST['IL19'];
$IM19 = $_REQUEST['IM19'];
$IA20 = $_REQUEST['IA20'];
$IB20 = $_REQUEST['IB20'];
$IC20 = $_REQUEST['IC20'];
$ID20 = $_REQUEST['ID20'];
$IE20 = $_REQUEST['IE20'];
$IF20 = $_REQUEST['IF20'];
$IG20 = $_REQUEST['IG20'];
$IH20 = $_REQUEST['IH20'];
$II20 = $_REQUEST['II20'];
$IJ20 = $_REQUEST['IJ20'];
$IK20 = $_REQUEST['IK20'];
$IL20 = $_REQUEST['IL20'];
$IM20 = $_REQUEST['IM20'];
$IA21 = $_REQUEST['IA21'];
$IB21 = $_REQUEST['IB21'];
$IC21 = $_REQUEST['IC21'];
$ID21 = $_REQUEST['ID21'];
$IE21 = $_REQUEST['IE21'];
$IF21 = $_REQUEST['IF21'];
$IG21 = $_REQUEST['IG21'];
$IH21 = $_REQUEST['IH21'];
$II21 = $_REQUEST['II21'];
$IJ21 = $_REQUEST['IJ21'];
$IK21 = $_REQUEST['IK21'];
$IL21 = $_REQUEST['IL21'];
$IM21 = $_REQUEST['IM21'];
$IA22 = $_REQUEST['IA22'];
$IB22 = $_REQUEST['IB22'];
$IC22 = $_REQUEST['IC22'];
$ID22 = $_REQUEST['ID22'];
$IE22 = $_REQUEST['IE22'];
$IF22 = $_REQUEST['IF22'];
$IG22 = $_REQUEST['IG22'];
$IH22 = $_REQUEST['IH22'];
$II22 = $_REQUEST['II22'];
$IJ22 = $_REQUEST['IJ22'];
$IK22 = $_REQUEST['IK22'];
$IL22 = $_REQUEST['IL22'];
$IM22 = $_REQUEST['IM22'];
$IA23 = $_REQUEST['IA23'];
$IB23 = $_REQUEST['IB23'];
$IC23 = $_REQUEST['IC23'];
$ID23 = $_REQUEST['ID23'];
$IE23 = $_REQUEST['IE23'];
$IF23 = $_REQUEST['IF23'];
$IG23 = $_REQUEST['IG23'];
$IH23 = $_REQUEST['IH23'];
$II23 = $_REQUEST['II23'];
$IJ23 = $_REQUEST['IJ23'];
$IK23 = $_REQUEST['IK23'];
$IL23 = $_REQUEST['IL23'];
$IM23 = $_REQUEST['IM23'];
$IA24 = $_REQUEST['IA24'];
$IB24 = $_REQUEST['IB24'];
$IC24 = $_REQUEST['IC24'];
$ID24 = $_REQUEST['ID24'];
$IE24 = $_REQUEST['IE24'];
$IF24 = $_REQUEST['IF24'];
$IG24 = $_REQUEST['IG24'];
$IH24 = $_REQUEST['IH24'];
$II24 = $_REQUEST['II24'];
$IJ24 = $_REQUEST['IJ24'];
$IK24 = $_REQUEST['IK24'];
$IL24 = $_REQUEST['IL24'];
$IM24 = $_REQUEST['IM24'];
$certificadoK = $_REQUEST['certificadoK'];
$ejecutorK = $_REQUEST['ejecutorK'];
$horaejecK = $_REQUEST['horaejecK'];
$inspectorK = $_REQUEST['inspectorK'];
$horainspK = $_REQUEST['horainspK'];
$emisorK = $_REQUEST['emisorK'];
$horaemisorK = $_REQUEST['horaemisorK'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`,
`estado`,
`usuario`,
`fecha`,
`fechaA`,
`horaA`,
`certhabilit`,
`empresaA`,
`nombreA`,
`descripcion`,
`equipos`,
`ejecutorC`,
`inspectorC`,
`hora1D`,
`fecha1D`,
`hora2D`,
`fecha2D`,
`emisorD`,
`EPP_B`,
`otrosE`,
`EPP_CE`,
`EPP_AE`,
`FAE1`,
`equiposAE`,
`voltajeF`,
`AE1`,
`AE2`,
`AE3`,
`AE4`,
`AE5`,
`AE6`,
`FAM1`,
`equiposAM`,
`apequipos`,
`AM1`,
`AM2`,
`AM3`,
`AM4`,
`AM5`,
`AM6`,
`F1`,
`F2`,
`F3`,
`F4`,
`F5`,
`F6`,
`F7`,
`F8`,
`F9`,
`F10`,
`F11`,
`F12`,
`F13`,
`F14`,
`GA1`,
`GB1`,
`GC1`,
`GD1`,
`GE1`,
`GF1`,
`GG1`,
`GH1`,
`GI1`,
`GA2`,
`GB2`,
`GC2`,
`GD2`,
`GE2`,
`GF2`,
`GG2`,
`GH2`,
`GI2`,
`GA3`,
`GB3`,
`GC3`,
`GD3`,
`GE3`,
`GF3`,
`GG3`,
`GH3`,
`GI3`,
`H1`,
`H2`,
`H3`,
`H4`,
`H5`,
`H6`,
`H7`,
`H8`,
`H9`,
`H10`,
`H11`,
`H12`,
`H13`,
`H14`,
`cuadro`,
`descripcionI`,
`autorizadoI`,
`IA1`,
`IB1`,
`IC1`,
`ID1`,
`IE1`,
`IF1`,
`IG1`,
`IH1`,
`II1`,
`IJ1`,
`IK1`,
`IL1`,
`IM1`,
`IA2`,
`IB2`,
`IC2`,
`ID2`,
`IE2`,
`IF2`,
`IG2`,
`IH2`,
`II2`,
`IJ2`,
`IK2`,
`IL2`,
`IM2`,
`IA3`,
`IB3`,
`IC3`,
`ID3`,
`IE3`,
`IF3`,
`IG3`,
`IH3`,
`II3`,
`IJ3`,
`IK3`,
`IL3`,
`IM3`,
`IA4`,
`IB4`,
`IC4`,
`ID4`,
`IE4`,
`IF4`,
`IG4`,
`IH4`,
`II4`,
`IJ4`,
`IK4`,
`IL4`,
`IM4`,
`IA5`,
`IB5`,
`IC5`,
`ID5`,
`IE5`,
`IF5`,
`IG5`,
`IH5`,
`II5`,
`IJ5`,
`IK5`,
`IL5`,
`IM5`,
`IA6`,
`IB6`,
`IC6`,
`ID6`,
`IE6`,
`IF6`,
`IG6`,
`IH6`,
`II6`,
`IJ6`,
`IK6`,
`IL6`,
`IM6`,
`IA7`,
`IB7`,
`IC7`,
`ID7`,
`IE7`,
`IF7`,
`IG7`,
`IH7`,
`II7`,
`IJ7`,
`IK7`,
`IL7`,
`IM7`,
`IA8`,
`IB8`,
`IC8`,
`ID8`,
`IE8`,
`IF8`,
`IG8`,
`IH8`,
`II8`,
`IJ8`,
`IK8`,
`IL8`,
`IM8`,
`IA9`,
`IB9`,
`IC9`,
`ID9`,
`IE9`,
`IF9`,
`IG9`,
`IH9`,
`II9`,
`IJ9`,
`IK9`,
`IL9`,
`IM9`,
`IA10`,
`IB10`,
`IC10`,
`ID10`,
`IE10`,
`IF10`,
`IG10`,
`IH10`,
`II10`,
`IJ10`,
`IK10`,
`IL10`,
`IM10`,
`IA11`,
`IB11`,
`IC11`,
`ID11`,
`IE11`,
`IF11`,
`IG11`,
`IH11`,
`II11`,
`IJ11`,
`IK11`,
`IL11`,
`IM11`,
`IA12`,
`IB12`,
`IC12`,
`ID12`,
`IE12`,
`IF12`,
`IG12`,
`IH12`,
`II12`,
`IJ12`,
`IK12`,
`IL12`,
`IM12`,
`IA13`,
`IB13`,
`IC13`,
`ID13`,
`IE13`,
`IF13`,
`IG13`,
`IH13`,
`II13`,
`IJ13`,
`IK13`,
`IL13`,
`IM13`,
`IA14`,
`IB14`,
`IC14`,
`ID14`,
`IE14`,
`IF14`,
`IG14`,
`IH14`,
`II14`,
`IJ14`,
`IK14`,
`IL14`,
`IM14`,
`IA15`,
`IB15`,
`IC15`,
`ID15`,
`IE15`,
`IF15`,
`IG15`,
`IH15`,
`II15`,
`IJ15`,
`IK15`,
`IL15`,
`IM15`,
`IA16`,
`IB16`,
`IC16`,
`ID16`,
`IE16`,
`IF16`,
`IG16`,
`IH16`,
`II16`,
`IJ16`,
`IK16`,
`IL16`,
`IM16`,
`IA17`,
`IB17`,
`IC17`,
`ID17`,
`IE17`,
`IF17`,
`IG17`,
`IH17`,
`II17`,
`IJ17`,
`IK17`,
`IL17`,
`IM17`,
`IA18`,
`IB18`,
`IC18`,
`ID18`,
`IE18`,
`IF18`,
`IG18`,
`IH18`,
`II18`,
`IJ18`,
`IK18`,
`IL18`,
`IM18`,
`IA19`,
`IB19`,
`IC19`,
`ID19`,
`IE19`,
`IF19`,
`IG19`,
`IH19`,
`II19`,
`IJ19`,
`IK19`,
`IL19`,
`IM19`,
`IA20`,
`IB20`,
`IC20`,
`ID20`,
`IE20`,
`IF20`,
`IG20`,
`IH20`,
`II20`,
`IJ20`,
`IK20`,
`IL20`,
`IM20`,
`IA21`,
`IB21`,
`IC21`,
`ID21`,
`IE21`,
`IF21`,
`IG21`,
`IH21`,
`II21`,
`IJ21`,
`IK21`,
`IL21`,
`IM21`,
`IA22`,
`IB22`,
`IC22`,
`ID22`,
`IE22`,
`IF22`,
`IG22`,
`IH22`,
`II22`,
`IJ22`,
`IK22`,
`IL22`,
`IM22`,
`IA23`,
`IB23`,
`IC23`,
`ID23`,
`IE23`,
`IF23`,
`IG23`,
`IH23`,
`II23`,
`IJ23`,
`IK23`,
`IL23`,
`IM23`,
`IA24`,
`IB24`,
`IC24`,
`ID24`,
`IE24`,
`IF24`,
`IG24`,
`IH24`,
`II24`,
`IJ24`,
`IK24`,
`IL24`,
`IM24`,
`certificadoK`,
`ejecutorK`,
`horaejecK`,
`inspectorK`,
`horainspK`,
`emisorK`,
`horaemisorK`
)

VALUES (
'$consecutivo',
'$estado',
'$usuario',
'$fecha',
'$fechaA',
'$horaA',
'$certhabilit',
'$empresaA',
'$nombreA',
'$descripcion',
'$equipos',
'$ejecutorC',
'$inspectorC',
'$hora1D',
'$fecha1D',
'$hora2D',
'$fecha2D',
'$emisorD',
'$EPP_B',
'$otrosE',
'$EPP_CE',
'$EPP_AE',
'$FAE1',
'$equiposAE',
'$voltajeF',
'$AE1',
'$AE2',
'$AE3',
'$AE4',
'$AE5',
'$AE6',
'$FAM1',
'$equiposAM',
'$apequipos',
'$AM1',
'$AM2',
'$AM3',
'$AM4',
'$AM5',
'$AM6',
'$F1',
'$F2',
'$F3',
'$F4',
'$F5',
'$F6',
'$F7',
'$F8',
'$F9',
'$F10',
'$F11',
'$F12',
'$F13',
'$F14',
'$GA1',
'$GB1',
'$GC1',
'$GD1',
'$GE1',
'$GF1',
'$GG1',
'$GH1',
'$GI1',
'$GA2',
'$GB2',
'$GC2',
'$GD2',
'$GE2',
'$GF2',
'$GG2',
'$GH2',
'$GI2',
'$GA3',
'$GB3',
'$GC3',
'$GD3',
'$GE3',
'$GF3',
'$GG3',
'$GH3',
'$GI3',
'$H1',
'$H2',
'$H3',
'$H4',
'$H5',
'$H6',
'$H7',
'$H8',
'$H9',
'$H10',
'$H11',
'$H12',
'$H13',
'$H14',
'$cuadro',
'$descripcionI',
'$autorizadoI',
'$IA1',
'$IB1',
'$IC1',
'$ID1',
'$IE1',
'$IF1',
'$IG1',
'$IH1',
'$II1',
'$IJ1',
'$IK1',
'$IL1',
'$IM1',
'$IA2',
'$IB2',
'$IC2',
'$ID2',
'$IE2',
'$IF2',
'$IG2',
'$IH2',
'$II2',
'$IJ2',
'$IK2',
'$IL2',
'$IM2',
'$IA3',
'$IB3',
'$IC3',
'$ID3',
'$IE3',
'$IF3',
'$IG3',
'$IH3',
'$II3',
'$IJ3',
'$IK3',
'$IL3',
'$IM3',
'$IA4',
'$IB4',
'$IC4',
'$ID4',
'$IE4',
'$IF4',
'$IG4',
'$IH4',
'$II4',
'$IJ4',
'$IK4',
'$IL4',
'$IM4',
'$IA5',
'$IB5',
'$IC5',
'$ID5',
'$IE5',
'$IF5',
'$IG5',
'$IH5',
'$II5',
'$IJ5',
'$IK5',
'$IL5',
'$IM5',
'$IA6',
'$IB6',
'$IC6',
'$ID6',
'$IE6',
'$IF6',
'$IG6',
'$IH6',
'$II6',
'$IJ6',
'$IK6',
'$IL6',
'$IM6',
'$IA7',
'$IB7',
'$IC7',
'$ID7',
'$IE7',
'$IF7',
'$IG7',
'$IH7',
'$II7',
'$IJ7',
'$IK7',
'$IL7',
'$IM7',
'$IA8',
'$IB8',
'$IC8',
'$ID8',
'$IE8',
'$IF8',
'$IG8',
'$IH8',
'$II8',
'$IJ8',
'$IK8',
'$IL8',
'$IM8',
'$IA9',
'$IB9',
'$IC9',
'$ID9',
'$IE9',
'$IF9',
'$IG9',
'$IH9',
'$II9',
'$IJ9',
'$IK9',
'$IL9',
'$IM9',
'$IA10',
'$IB10',
'$IC10',
'$ID10',
'$IE10',
'$IF10',
'$IG10',
'$IH10',
'$II10',
'$IJ10',
'$IK10',
'$IL10',
'$IM10',
'$IA11',
'$IB11',
'$IC11',
'$ID11',
'$IE11',
'$IF11',
'$IG11',
'$IH11',
'$II11',
'$IJ11',
'$IK11',
'$IL11',
'$IM11',
'$IA12',
'$IB12',
'$IC12',
'$ID12',
'$IE12',
'$IF12',
'$IG12',
'$IH12',
'$II12',
'$IJ12',
'$IK12',
'$IL12',
'$IM12',
'$IA13',
'$IB13',
'$IC13',
'$ID13',
'$IE13',
'$IF13',
'$IG13',
'$IH13',
'$II13',
'$IJ13',
'$IK13',
'$IL13',
'$IM13',
'$IA14',
'$IB14',
'$IC14',
'$ID14',
'$IE14',
'$IF14',
'$IG14',
'$IH14',
'$II14',
'$IJ14',
'$IK14',
'$IL14',
'$IM14',
'$IA15',
'$IB15',
'$IC15',
'$ID15',
'$IE15',
'$IF15',
'$IG15',
'$IH15',
'$II15',
'$IJ15',
'$IK15',
'$IL15',
'$IM15',
'$IA16',
'$IB16',
'$IC16',
'$ID16',
'$IE16',
'$IF16',
'$IG16',
'$IH16',
'$II16',
'$IJ16',
'$IK16',
'$IL16',
'$IM16',
'$IA17',
'$IB17',
'$IC17',
'$ID17',
'$IE17',
'$IF17',
'$IG17',
'$IH17',
'$II17',
'$IJ17',
'$IK17',
'$IL17',
'$IM17',
'$IA18',
'$IB18',
'$IC18',
'$ID18',
'$IE18',
'$IF18',
'$IG18',
'$IH18',
'$II18',
'$IJ18',
'$IK18',
'$IL18',
'$IM18',
'$IA19',
'$IB19',
'$IC19',
'$ID19',
'$IE19',
'$IF19',
'$IG19',
'$IH19',
'$II19',
'$IJ19',
'$IK19',
'$IL19',
'$IM19',
'$IA20',
'$IB20',
'$IC20',
'$ID20',
'$IE20',
'$IF20',
'$IG20',
'$IH20',
'$II20',
'$IJ20',
'$IK20',
'$IL20',
'$IM20',
'$IA21',
'$IB21',
'$IC21',
'$ID21',
'$IE21',
'$IF21',
'$IG21',
'$IH21',
'$II21',
'$IJ21',
'$IK21',
'$IL21',
'$IM21',
'$IA22',
'$IB22',
'$IC22',
'$ID22',
'$IE22',
'$IF22',
'$IG22',
'$IH22',
'$II22',
'$IJ22',
'$IK22',
'$IL22',
'$IM22',
'$IA23',
'$IB23',
'$IC23',
'$ID23',
'$IE23',
'$IF23',
'$IG23',
'$IH23',
'$II23',
'$IJ23',
'$IK23',
'$IL23',
'$IM23',
'$IA24',
'$IB24',
'$IC24',
'$ID24',
'$IE24',
'$IF24',
'$IG24',
'$IH24',
'$II24',
'$IJ24',
'$IK24',
'$IL24',
'$IM24',
'$certificadoK',
'$ejecutorK',
'$horaejecK',
'$inspectorK',
'$horainspK',
'$emisorK',
'$horaemisorK'
)";

$conexion->query($datos) or die ('<br><br><b>ESE CONSECUTIVO YA ESTÁ ASIGNADO</b>');

echo '<br><br><b>DATOS INGRESADOS SATISFACTORIAMENTE</b><br><br><br><br><br><br>';
echo '<span style="font-family:Arial; font-size:48px; color:rgba(128,64,0,1)"><b>';
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
