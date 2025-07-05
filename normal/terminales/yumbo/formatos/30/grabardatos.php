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
$batch_ecopetrol = $_REQUEST['batch_ecopetrol'];
$carta_liberacion = $_REQUEST['carta_liberacion'];
$fechaA = $_REQUEST['fechaA'];
$despacho = $_REQUEST['despacho'];
$compania = $_REQUEST['compania'];
$placasCTK = $_REQUEST['placasCTK'];
$guia_transporte = $_REQUEST['guia_transporte'];
$volumen_bruto = $_REQUEST['volumen_bruto'];
$temp_despacho = $_REQUEST['temp_despacho'];
$gravedad_API_X1 = $_REQUEST['gravedad_API_X1'];
$gravedad_API1 = $_REQUEST['gravedad_API1'];
$gravedad_espec1 = $_REQUEST['gravedad_espec1'];
$factor_correccion = $_REQUEST['factor_correccion'];
$vol_neto_despacho = $_REQUEST['vol_neto_despacho'];
$TK_despachador = $_REQUEST['TK_despachador'];
$gravedad_API2 = $_REQUEST['gravedad_API2'];
$gravedad_espec2 = $_REQUEST['gravedad_espec2'];
$aparienciaCTK = $_REQUEST['aparienciaCTK'];
$diferenciaAPI1 = $_REQUEST['diferenciaAPI1'];
$gravedad_espec_CTK_TK1 = $_REQUEST['gravedad_espec_CTK_TK1'];
$aerop_recibidor = $_REQUEST['aerop_recibidor'];
$aparienciaTK = $_REQUEST['aparienciaTK'];
$gravedad_API_X2 = $_REQUEST['gravedad_API_X2'];
$gravedad_API3 = $_REQUEST['gravedad_API3'];
$gravedad_espec3 = $_REQUEST['gravedad_espec3'];
$diferenciaAPI2 = $_REQUEST['diferenciaAPI2'];
$gravedad_espec_CTK_TK2 = $_REQUEST['gravedad_espec_CTK_TK2'];
$tiquete = $_REQUEST['tiquete'];
$lectura_inicial = $_REQUEST['lectura_inicial'];
$lectura_final = $_REQUEST['lectura_final'];
$vol_bruto = $_REQUEST['vol_bruto'];
$temp_recibo = $_REQUEST['temp_recibo'];
$gravedad_API4 = $_REQUEST['gravedad_API4'];
$factor_correccion_volumen1 = $_REQUEST['factor_correccion_volumen1'];
$vol_neto_recibido = $_REQUEST['vol_neto_recibido'];
$variacion_despacho_recibido = $_REQUEST['variacion_despacho_recibido'];
$TK_recibo_aerop = $_REQUEST['TK_recibo_aerop'];
$medida_inicial = $_REQUEST['medida_inicial'];
$medida_final = $_REQUEST['medida_final'];
$vol_bruto_tabla_aforo = $_REQUEST['vol_bruto_tabla_aforo'];
$gravedad_APIC = $_REQUEST['gravedad_APIC'];
$gravedad_API5 = $_REQUEST['gravedad_API5'];
$temp_TK = $_REQUEST['temp_TK'];
$factor_correccion_volumen2 = $_REQUEST['factor_correccion_volumen2'];
$vol_neto = $_REQUEST['vol_neto'];
$nombre_rep_term_desp = $_REQUEST['nombre_rep_term_desp'];
$nombre_conductor = $_REQUEST['nombre_conductor'];
$nombre_rep_aeropuerto = $_REQUEST['nombre_rep_aeropuerto'];

$datos = "INSERT INTO formulario".$formato." (
`consecutivo`,
`estado`,
`usuario`,
`fecha`,
`batch_ecopetrol`, 
`carta_liberacion`, 
`fechaA`, 
`despacho`, 
`compania`, 
`placasCTK`, 
`guia_transporte`, 
`volumen_bruto`, 
`temp_despacho`, 
`gravedad_API_X1`, 
`gravedad_API1`, 
`gravedad_espec1`, 
`factor_correccion`, 
`vol_neto_despacho`, 
`TK_despachador`, 
`gravedad_API2`, 
`gravedad_espec2`, 
`aparienciaCTK`, 
`diferenciaAPI1`, 
`gravedad_espec_CTK_TK1`, 
`aerop_recibidor`, 
`aparienciaTK`, 
`gravedad_API_X2`, 
`gravedad_API3`, 
`gravedad_espec3`, 
`diferenciaAPI2`, 
`gravedad_espec_CTK_TK2`, 
`tiquete`, 
`lectura_inicial`, 
`lectura_final`, 
`vol_bruto`, 
`temp_recibo`, 
`gravedad_API4`, 
`factor_correccion_volumen1`, 
`vol_neto_recibido`, 
`variacion_despacho_recibido`, 
`TK_recibo_aerop`, 
`medida_inicial`, 
`medida_final`, 
`vol_bruto_tabla_aforo`, 
`gravedad_APIC`, 
`gravedad_API5`, 
`temp_TK`, 
`factor_correccion_volumen2`, 
`vol_neto`, 
`nombre_rep_term_desp`, 
`nombre_conductor`, 
`nombre_rep_aeropuerto`
)

VALUES (
'$consecutivo',
'$estado',
'$usuario',
'$fecha',
'$batch_ecopetrol', 
'$carta_liberacion', 
'$fechaA', 
'$despacho', 
'$compania', 
'$placasCTK', 
'$guia_transporte', 
'$volumen_bruto', 
'$temp_despacho', 
'$gravedad_API_X1', 
'$gravedad_API1', 
'$gravedad_espec1', 
'$factor_correccion', 
'$vol_neto_despacho', 
'$TK_despachador', 
'$gravedad_API2', 
'$gravedad_espec2', 
'$aparienciaCTK', 
'$diferenciaAPI1', 
'$gravedad_espec_CTK_TK1', 
'$aerop_recibidor', 
'$aparienciaTK', 
'$gravedad_API_X2', 
'$gravedad_API3', 
'$gravedad_espec3', 
'$diferenciaAPI2', 
'$gravedad_espec_CTK_TK2', 
'$tiquete', 
'$lectura_inicial', 
'$lectura_final', 
'$vol_bruto', 
'$temp_recibo', 
'$gravedad_API4', 
'$factor_correccion_volumen1', 
'$vol_neto_recibido', 
'$variacion_despacho_recibido', 
'$TK_recibo_aerop', 
'$medida_inicial', 
'$medida_final', 
'$vol_bruto_tabla_aforo', 
'$gravedad_APIC', 
'$gravedad_API5', 
'$temp_TK', 
'$factor_correccion_volumen2', 
'$vol_neto', 
'$nombre_rep_term_desp', 
'$nombre_conductor', 
'$nombre_rep_aeropuerto'
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
