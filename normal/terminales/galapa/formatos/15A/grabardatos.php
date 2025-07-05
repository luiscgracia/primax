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
$tanque = $_REQUEST['tanque'];
$producto = $_REQUEST['producto'];
$fechaA = $_REQUEST['fechaA'];
$horaentrega = $_REQUEST['horaentrega'];
$capacidad = $_REQUEST['capacidad'];
$nivel_llenado = $_REQUEST['nivel_llenado'];
$medicion_inicialA = $_REQUEST['medicion_inicialA'];
$medicion_inicialB = $_REQUEST['medicion_inicialB'];
$medicion_inicialC = $_REQUEST['medicion_inicialC'];
$medicion_inicialD = $_REQUEST['medicion_inicialD'];
$medicion_inicialE = $_REQUEST['medicion_inicialE'];
$medicion_finalA = $_REQUEST['medicion_finalA'];
$medicion_finalB = $_REQUEST['medicion_finalB'];
$medicion_finalC = $_REQUEST['medicion_finalC'];
$medicion_finalD = $_REQUEST['medicion_finalD'];
$medicion_finalE = $_REQUEST['medicion_finalE'];
$contador1_inicial = $_REQUEST['contador1_inicial'];
$contador2_inicial = $_REQUEST['contador2_inicial'];
$contador3_inicial = $_REQUEST['contador3_inicial'];
$contador4_inicial = $_REQUEST['contador4_inicial'];
$contador5_inicial = $_REQUEST['contador5_inicial'];
$contador1_final = $_REQUEST['contador1_final'];
$contador2_final = $_REQUEST['contador2_final'];
$contador3_final = $_REQUEST['contador3_final'];
$contador4_final = $_REQUEST['contador4_final'];
$contador5_final = $_REQUEST['contador5_final'];
$volumen_recibir = $_REQUEST['volumen_recibir'];
$volumen_final = $_REQUEST['volumen_final'];
$medida_final = $_REQUEST['medida_final'];
$rata_bombeo = $_REQUEST['rata_bombeo'];
$hora_inicial = $_REQUEST['hora_inicial'];
$hora_final = $_REQUEST['hora_final'];
$cupo_maximo = $_REQUEST['cupo_maximo'];
$representante_planta = $_REQUEST['representante_planta'];
$representante_poliducto = $_REQUEST['representante_poliducto'];
$nivel1_mt = $_REQUEST['nivel1_mt'];
$nivel1_cm = $_REQUEST['nivel1_cm'];
$nivel1_mm = $_REQUEST['nivel1_mm'];
$agua1_mt = $_REQUEST['agua1_mt'];
$agua1_cm = $_REQUEST['agua1_cm'];
$agua1_mm = $_REQUEST['agua1_mm'];
$temperatura1 = $_REQUEST['temperatura1'];
$alarma_alto = $_REQUEST['alarma_alto'];
$alarma_alto_alto = $_REQUEST['alarma_alto_alto'];
$tanque_drenaje1 = $_REQUEST['tanque_drenaje1'];
$A1 = $_REQUEST['A1'];
$A2 = $_REQUEST['A2'];
$A3 = $_REQUEST['A3'];
$A31 = $_REQUEST['A31'];
$A32 = $_REQUEST['A32'];
$A4 = $_REQUEST['A4'];
$A5 = $_REQUEST['A5'];
$B1 = $_REQUEST['B1'];
$B2 = $_REQUEST['B2'];
$B3 = $_REQUEST['B3'];
$B31 = $_REQUEST['B31'];
$B32 = $_REQUEST['B32'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$C1 = $_REQUEST['C1'];
$C2 = $_REQUEST['C2'];
$C3 = $_REQUEST['C3'];
$C31 = $_REQUEST['C31'];
$C32 = $_REQUEST['C32'];
$C4 = $_REQUEST['C4'];
$C5 = $_REQUEST['C5'];
$D1 = $_REQUEST['D1'];
$D2 = $_REQUEST['D2'];
$D3 = $_REQUEST['D3'];
$D31 = $_REQUEST['D31'];
$D32 = $_REQUEST['D32'];
$D4 = $_REQUEST['D4'];
$D5 = $_REQUEST['D5'];
$E1 = $_REQUEST['E1'];
$E2 = $_REQUEST['E2'];
$E3 = $_REQUEST['E3'];
$E31 = $_REQUEST['E31'];
$E32 = $_REQUEST['E32'];
$E4 = $_REQUEST['E4'];
$E5 = $_REQUEST['E5'];
$F1 = $_REQUEST['F1'];
$F2 = $_REQUEST['F2'];
$F3 = $_REQUEST['F3'];
$F31 = $_REQUEST['F31'];
$F32 = $_REQUEST['F32'];
$F4 = $_REQUEST['F4'];
$F5 = $_REQUEST['F5'];
$G1 = $_REQUEST['G1'];
$G2 = $_REQUEST['G2'];
$G3 = $_REQUEST['G3'];
$G31 = $_REQUEST['G31'];
$G32 = $_REQUEST['G32'];
$G4 = $_REQUEST['G4'];
$G5 = $_REQUEST['G5'];
$H1 = $_REQUEST['H1'];
$H2 = $_REQUEST['H2'];
$H3 = $_REQUEST['H3'];
$H31 = $_REQUEST['H31'];
$H32 = $_REQUEST['H32'];
$H4 = $_REQUEST['H4'];
$H5 = $_REQUEST['H5'];
$I1 = $_REQUEST['I1'];
$I2 = $_REQUEST['I2'];
$I3 = $_REQUEST['I3'];
$I31 = $_REQUEST['I31'];
$I32 = $_REQUEST['I32'];
$I4 = $_REQUEST['I4'];
$I5 = $_REQUEST['I5'];
$J1 = $_REQUEST['J1'];
$J2 = $_REQUEST['J2'];
$J3 = $_REQUEST['J3'];
$J31 = $_REQUEST['J31'];
$J32 = $_REQUEST['J32'];
$J4 = $_REQUEST['J4'];
$J5 = $_REQUEST['J5'];
$K1 = $_REQUEST['K1'];
$K2 = $_REQUEST['K2'];
$K3 = $_REQUEST['K3'];
$K31 = $_REQUEST['K31'];
$K32 = $_REQUEST['K32'];
$K4 = $_REQUEST['K4'];
$K5 = $_REQUEST['K5'];
$L1 = $_REQUEST['L1'];
$L2 = $_REQUEST['L2'];
$L3 = $_REQUEST['L3'];
$L31 = $_REQUEST['L31'];
$L32 = $_REQUEST['L32'];
$L4 = $_REQUEST['L4'];
$L5 = $_REQUEST['L5'];
$M1 = $_REQUEST['M1'];
$M2 = $_REQUEST['M2'];
$M3 = $_REQUEST['M3'];
$M31 = $_REQUEST['M31'];
$M32 = $_REQUEST['M32'];
$M4 = $_REQUEST['M4'];
$M5 = $_REQUEST['M5'];
$N1 = $_REQUEST['N1'];
$N2 = $_REQUEST['N2'];
$N3 = $_REQUEST['N3'];
$N31 = $_REQUEST['N31'];
$N32 = $_REQUEST['N32'];
$N4 = $_REQUEST['N4'];
$N5 = $_REQUEST['N5'];
$O1 = $_REQUEST['O1'];
$O2 = $_REQUEST['O2'];
$O3 = $_REQUEST['O3'];
$O31 = $_REQUEST['O31'];
$O32 = $_REQUEST['O32'];
$O4 = $_REQUEST['O4'];
$O5 = $_REQUEST['O5'];
$P1 = $_REQUEST['P1'];
$P2 = $_REQUEST['P2'];
$P3 = $_REQUEST['P3'];
$P31 = $_REQUEST['P31'];
$P32 = $_REQUEST['P32'];
$P4 = $_REQUEST['P4'];
$P5 = $_REQUEST['P5'];
$Q1 = $_REQUEST['Q1'];
$Q2 = $_REQUEST['Q2'];
$Q3 = $_REQUEST['Q3'];
$Q31 = $_REQUEST['Q31'];
$Q32 = $_REQUEST['Q32'];
$Q4 = $_REQUEST['Q4'];
$Q5 = $_REQUEST['Q5'];
$R1 = $_REQUEST['R1'];
$R2 = $_REQUEST['R2'];
$R3 = $_REQUEST['R3'];
$R31 = $_REQUEST['R31'];
$R32 = $_REQUEST['R32'];
$R4 = $_REQUEST['R4'];
$R5 = $_REQUEST['R5'];
$S1 = $_REQUEST['S1'];
$S2 = $_REQUEST['S2'];
$S3 = $_REQUEST['S3'];
$S31 = $_REQUEST['S31'];
$S32 = $_REQUEST['S32'];
$S4 = $_REQUEST['S4'];
$S5 = $_REQUEST['S5'];
$T1 = $_REQUEST['T1'];
$T2 = $_REQUEST['T2'];
$T3 = $_REQUEST['T3'];
$T4 = $_REQUEST['T4'];
$T5 = $_REQUEST['T5'];
$U1 = $_REQUEST['U1'];
$U2 = $_REQUEST['U2'];
$U3 = $_REQUEST['U3'];
$U4 = $_REQUEST['U4'];
$U5 = $_REQUEST['U5'];
$V1 = $_REQUEST['V1'];
$V2 = $_REQUEST['V2'];
$V3 = $_REQUEST['V3'];
$V4 = $_REQUEST['V4'];
$V5 = $_REQUEST['V5'];
$tiempo_reposo = $_REQUEST['tiempo_reposo'];
$api_observado = $_REQUEST['api_observado'];
$temperatura = $_REQUEST['temperatura'];
$marcacion = $_REQUEST['marcacion'];
$nivel2_mt = $_REQUEST['nivel2_mt'];
$nivel2_cm = $_REQUEST['nivel2_cm'];
$nivel2_mm = $_REQUEST['nivel2_mm'];
$agua2_mt = $_REQUEST['agua2_mt'];
$agua2_cm = $_REQUEST['agua2_cm'];
$agua2_mm = $_REQUEST['agua2_mm'];
$temperatura2 = $_REQUEST['temperatura2'];
$tanque_drenaje2 = $_REQUEST['tanque_drenaje2'];
$observaciones = $_REQUEST['observaciones'];
$inicial1 = $_REQUEST['inicial1'];
$final1 = $_REQUEST['final1'];
$inicial2 = $_REQUEST['inicial2'];
$final2 = $_REQUEST['final2'];
$inicial3 = $_REQUEST['inicial3'];
$final3 = $_REQUEST['final3'];
$inicial4 = $_REQUEST['inicial4'];
$final4 = $_REQUEST['final4'];
$inicial5 = $_REQUEST['inicial5'];
$final5 = $_REQUEST['final5'];
$inicial6 = $_REQUEST['inicial6'];
$final6 = $_REQUEST['final6'];
$inicial7 = $_REQUEST['inicial7'];
$final7 = $_REQUEST['final7'];
$inicial8 = $_REQUEST['inicial8'];
$final8 = $_REQUEST['final8'];
$inicial9 = $_REQUEST['inicial9'];
$final9 = $_REQUEST['final9'];
$final10 = $_REQUEST['final10'];
$inicial11 = $_REQUEST['inicial11'];
$inicial12 = $_REQUEST['inicial12'];
$inicial13 = $_REQUEST['inicial13'];
$final14 = $_REQUEST['final14'];
$final15 = $_REQUEST['final15'];
$final16 = $_REQUEST['final16'];
$final17 = $_REQUEST['final17'];
$diferencia = $_REQUEST['diferencia'];
$final18 = $_REQUEST['final18'];
$volmayor1 = $_REQUEST['volmayor1'];
$mayorista2 = $_REQUEST['mayorista2'];
$volmayor2 = $_REQUEST['volmayor2'];
$mayorista3 = $_REQUEST['mayorista3'];
$volmayor3 = $_REQUEST['volmayor3'];
$mayorista4 = $_REQUEST['mayorista4'];
$volmayor4 = $_REQUEST['volmayor4'];
$mayorista5 = $_REQUEST['mayorista5'];
$volmayor5 = $_REQUEST['volmayor5'];
$mayorista6 = $_REQUEST['mayorista6'];
$volmayor6 = $_REQUEST['volmayor6'];
$mayorista7 = $_REQUEST['mayorista7'];
$volmayor7 = $_REQUEST['volmayor7'];
$observaciones_retiro = $_REQUEST['observaciones_retiro'];
$finalizadopor = $_REQUEST['finalizadopor'];
$fecha_revision = $_REQUEST['fecha_revision'];
$revisadopor = $_REQUEST['revisadopor'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`, 
`estado`, 
`usuario`, 
`fecha`, 
`tanque`, 
`producto`, 
`fechaA`, 
`horaentrega`, 
`capacidad`, 
`nivel_llenado`, 
`medicion_inicialA`, 
`medicion_inicialB`, 
`medicion_inicialC`, 
`medicion_inicialD`, 
`medicion_inicialE`, 
`medicion_finalA`, 
`medicion_finalB`, 
`medicion_finalC`, 
`medicion_finalD`, 
`medicion_finalE`, 
`contador1_inicial`, 
`contador2_inicial`, 
`contador3_inicial`, 
`contador4_inicial`, 
`contador5_inicial`, 
`contador1_final`, 
`contador2_final`, 
`contador3_final`, 
`contador4_final`, 
`contador5_final`, 
`volumen_recibir`, 
`volumen_final`, 
`medida_final`, 
`rata_bombeo`, 
`hora_inicial`, 
`hora_final`, 
`cupo_maximo`, 
`representante_planta`, 
`representante_poliducto`, 
`nivel1_mt`, 
`nivel1_cm`, 
`nivel1_mm`, 
`agua1_mt`, 
`agua1_cm`, 
`agua1_mm`, 
`temperatura1`, 
`alarma_alto`, 
`alarma_alto_alto`, 
`tanque_drenaje1`, 
`A1`, 
`A2`, 
`A3`, 
`A31`, 
`A32`, 
`A4`, 
`A5`, 
`B1`, 
`B2`, 
`B3`, 
`B31`, 
`B32`, 
`B4`, 
`B5`, 
`C1`, 
`C2`, 
`C3`, 
`C31`, 
`C32`, 
`C4`, 
`C5`, 
`D1`, 
`D2`, 
`D3`, 
`D31`, 
`D32`, 
`D4`, 
`D5`, 
`E1`, 
`E2`, 
`E3`, 
`E31`, 
`E32`, 
`E4`, 
`E5`, 
`F1`, 
`F2`, 
`F3`, 
`F31`, 
`F32`, 
`F4`, 
`F5`, 
`G1`, 
`G2`, 
`G3`, 
`G31`, 
`G32`, 
`G4`, 
`G5`, 
`H1`, 
`H2`, 
`H3`, 
`H31`, 
`H32`, 
`H4`, 
`H5`, 
`I1`, 
`I2`, 
`I3`, 
`I31`, 
`I32`, 
`I4`, 
`I5`, 
`J1`, 
`J2`, 
`J3`, 
`J31`, 
`J32`, 
`J4`, 
`J5`, 
`K1`, 
`K2`, 
`K3`, 
`K31`, 
`K32`, 
`K4`, 
`K5`, 
`L1`, 
`L2`, 
`L3`, 
`L31`, 
`L32`, 
`L4`, 
`L5`, 
`M1`, 
`M2`, 
`M3`, 
`M31`, 
`M32`, 
`M4`, 
`M5`, 
`N1`, 
`N2`, 
`N3`, 
`N31`, 
`N32`, 
`N4`, 
`N5`, 
`O1`, 
`O2`, 
`O3`, 
`O31`, 
`O32`, 
`O4`, 
`O5`, 
`P1`, 
`P2`, 
`P3`, 
`P31`, 
`P32`, 
`P4`, 
`P5`, 
`Q1`, 
`Q2`, 
`Q3`, 
`Q31`, 
`Q32`, 
`Q4`, 
`Q5`, 
`R1`, 
`R2`, 
`R3`, 
`R31`, 
`R32`, 
`R4`, 
`R5`, 
`S1`, 
`S2`, 
`S3`, 
`S31`, 
`S32`, 
`S4`, 
`S5`, 
`T1`, 
`T2`, 
`T3`, 
`T4`, 
`T5`, 
`U1`, 
`U2`, 
`U3`, 
`U4`, 
`U5`, 
`V1`, 
`V2`, 
`V3`, 
`V4`, 
`V5`, 
`tiempo_reposo`, 
`api_observado`, 
`temperatura`, 
`marcacion`, 
`nivel2_mt`, 
`nivel2_cm`, 
`nivel2_mm`, 
`agua2_mt`, 
`agua2_cm`, 
`agua2_mm`, 
`temperatura2`, 
`tanque_drenaje2`, 
`observaciones`, 
`inicial1`, 
`final1`, 
`inicial2`, 
`final2`, 
`inicial3`, 
`final3`, 
`inicial4`, 
`final4`, 
`inicial5`, 
`final5`, 
`inicial6`, 
`final6`, 
`inicial7`, 
`final7`, 
`inicial8`, 
`final8`, 
`inicial9`, 
`final9`, 
`final10`, 
`inicial11`, 
`inicial12`, 
`inicial13`, 
`final14`, 
`final15`, 
`final16`, 
`final17`, 
`diferencia`, 
`final18`, 
`volmayor1`, 
`mayorista2`, 
`volmayor2`, 
`mayorista3`, 
`volmayor3`, 
`mayorista4`, 
`volmayor4`, 
`mayorista5`, 
`volmayor5`, 
`mayorista6`, 
`volmayor6`, 
`mayorista7`, 
`volmayor7`, 
`observaciones_retiro`, 
`finalizadopor`, 
`fecha_revision`, 
`revisadopor`
) 

VALUES (
'$consecutivo', 
'$estado', 
'$usuario', 
'$fecha', 
'$tanque', 
'$producto', 
'$fechaA', 
'$horaentrega', 
'$capacidad', 
'$nivel_llenado', 
'$medicion_inicialA', 
'$medicion_inicialB', 
'$medicion_inicialC', 
'$medicion_inicialD', 
'$medicion_inicialE', 
'$medicion_finalA', 
'$medicion_finalB', 
'$medicion_finalC', 
'$medicion_finalD', 
'$medicion_finalE', 
'$contador1_inicial', 
'$contador2_inicial', 
'$contador3_inicial', 
'$contador4_inicial', 
'$contador5_inicial', 
'$contador1_final', 
'$contador2_final', 
'$contador3_final', 
'$contador4_final', 
'$contador5_final', 
'$volumen_recibir', 
'$volumen_final', 
'$medida_final', 
'$rata_bombeo', 
'$hora_inicial', 
'$hora_final', 
'$cupo_maximo', 
'$representante_planta', 
'$representante_poliducto', 
'$nivel1_mt', 
'$nivel1_cm', 
'$nivel1_mm', 
'$agua1_mt', 
'$agua1_cm', 
'$agua1_mm', 
'$temperatura1', 
'$alarma_alto', 
'$alarma_alto_alto', 
'$tanque_drenaje1', 
'$A1', 
'$A2', 
'$A3', 
'$A31', 
'$A32', 
'$A4', 
'$A5', 
'$B1', 
'$B2', 
'$B3', 
'$B31', 
'$B32', 
'$B4', 
'$B5', 
'$C1', 
'$C2', 
'$C3', 
'$C31', 
'$C32', 
'$C4', 
'$C5', 
'$D1', 
'$D2', 
'$D3', 
'$D31', 
'$D32', 
'$D4', 
'$D5', 
'$E1', 
'$E2', 
'$E3', 
'$E31', 
'$E32', 
'$E4', 
'$E5', 
'$F1', 
'$F2', 
'$F3', 
'$F31', 
'$F32', 
'$F4', 
'$F5', 
'$G1', 
'$G2', 
'$G3', 
'$G31', 
'$G32', 
'$G4', 
'$G5', 
'$H1', 
'$H2', 
'$H3', 
'$H31', 
'$H32', 
'$H4', 
'$H5', 
'$I1', 
'$I2', 
'$I3', 
'$I31', 
'$I32', 
'$I4', 
'$I5', 
'$J1', 
'$J2', 
'$J3', 
'$J31', 
'$J32', 
'$J4', 
'$J5', 
'$K1', 
'$K2', 
'$K3', 
'$K31', 
'$K32', 
'$K4', 
'$K5', 
'$L1', 
'$L2', 
'$L3', 
'$L31', 
'$L32', 
'$L4', 
'$L5', 
'$M1', 
'$M2', 
'$M3', 
'$M31', 
'$M32', 
'$M4', 
'$M5', 
'$N1', 
'$N2', 
'$N3', 
'$N31', 
'$N32', 
'$N4', 
'$N5', 
'$O1', 
'$O2', 
'$O3', 
'$O31', 
'$O32', 
'$O4', 
'$O5', 
'$P1', 
'$P2', 
'$P3', 
'$P31', 
'$P32', 
'$P4', 
'$P5', 
'$Q1', 
'$Q2', 
'$Q3', 
'$Q31', 
'$Q32', 
'$Q4', 
'$Q5', 
'$R1', 
'$R2', 
'$R3', 
'$R31', 
'$R32', 
'$R4', 
'$R5', 
'$S1', 
'$S2', 
'$S3', 
'$S31', 
'$S32', 
'$S4', 
'$S5', 
'$T1', 
'$T2', 
'$T3', 
'$T4', 
'$T5', 
'$U1', 
'$U2', 
'$U3', 
'$U4', 
'$U5', 
'$V1', 
'$V2', 
'$V3', 
'$V4', 
'$V5', 
'$tiempo_reposo', 
'$api_observado', 
'$temperatura', 
'$marcacion', 
'$nivel2_mt', 
'$nivel2_cm', 
'$nivel2_mm', 
'$agua2_mt', 
'$agua2_cm', 
'$agua2_mm', 
'$temperatura2', 
'$tanque_drenaje2', 
'$observaciones', 
'$inicial1', 
'$final1', 
'$inicial2', 
'$final2', 
'$inicial3', 
'$final3', 
'$inicial4', 
'$final4', 
'$inicial5', 
'$final5', 
'$inicial6', 
'$final6', 
'$inicial7', 
'$final7', 
'$inicial8', 
'$final8', 
'$inicial9', 
'$final9', 
'$final10', 
'$inicial11', 
'$inicial12', 
'$inicial13', 
'$final14', 
'$final15', 
'$final16', 
'$final17', 
'$diferencia', 
'$final18', 
'$volmayor1', 
'$mayorista2', 
'$volmayor2', 
'$mayorista3', 
'$volmayor3', 
'$mayorista4', 
'$volmayor4', 
'$mayorista5', 
'$volmayor5', 
'$mayorista6', 
'$volmayor6', 
'$mayorista7', 
'$volmayor7', 
'$observaciones_retiro', 
'$finalizadopor', 
'$fecha_revision', 
'$revisadopor'
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
