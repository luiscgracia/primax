<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<script>
 function cerrarVentana(){window.close();}
</script>
<?php
include('../../conectar_db.php');
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_REQUEST['modificar'])) {
         
// listado  de variables del formato

$consecutivo = $_REQUEST['consecutivo'];
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

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo',
estado = '$estado',
usuario = '$usuario',
fecha = '$fecha',
batch_ecopetrol = '$batch_ecopetrol', 
carta_liberacion = '$carta_liberacion', 
fechaA = '$fechaA', 
despacho = '$despacho', 
compania = '$compania', 
placasCTK = '$placasCTK', 
guia_transporte = '$guia_transporte', 
volumen_bruto = '$volumen_bruto', 
temp_despacho = '$temp_despacho', 
gravedad_API_X1 = '$gravedad_API_X1', 
gravedad_API1 = '$gravedad_API1', 
gravedad_espec1 = '$gravedad_espec1', 
factor_correccion = '$factor_correccion', 
vol_neto_despacho = '$vol_neto_despacho', 
TK_despachador = '$TK_despachador', 
gravedad_API2 = '$gravedad_API2', 
gravedad_espec2 = '$gravedad_espec2', 
aparienciaCTK = '$aparienciaCTK', 
diferenciaAPI1 = '$diferenciaAPI1', 
gravedad_espec_CTK_TK1 = '$gravedad_espec_CTK_TK1', 
aerop_recibidor = '$aerop_recibidor', 
aparienciaTK = '$aparienciaTK', 
gravedad_API_X2 = '$gravedad_API_X2', 
gravedad_API3 = '$gravedad_API3', 
gravedad_espec3 = '$gravedad_espec3', 
diferenciaAPI2 = '$diferenciaAPI2', 
gravedad_espec_CTK_TK2 = '$gravedad_espec_CTK_TK2', 
tiquete = '$tiquete', 
lectura_inicial = '$lectura_inicial', 
lectura_final = '$lectura_final', 
vol_bruto = '$vol_bruto', 
temp_recibo = '$temp_recibo', 
gravedad_API4 = '$gravedad_API4', 
factor_correccion_volumen1 = '$factor_correccion_volumen1', 
vol_neto_recibido = '$vol_neto_recibido', 
variacion_despacho_recibido = '$variacion_despacho_recibido', 
TK_recibo_aerop = '$TK_recibo_aerop', 
medida_inicial = '$medida_inicial', 
medida_final = '$medida_final', 
vol_bruto_tabla_aforo = '$vol_bruto_tabla_aforo', 
gravedad_APIC = '$gravedad_APIC', 
gravedad_API5 = '$gravedad_API5', 
temp_TK = '$temp_TK', 
factor_correccion_volumen2 = '$factor_correccion_volumen2', 
vol_neto = '$vol_neto', 
nombre_rep_term_desp = '$nombre_rep_term_desp', 
nombre_conductor = '$nombre_conductor', 
nombre_rep_aeropuerto = '$nombre_rep_aeropuerto'

WHERE consecutivo='$consecutivo'";

$val=mysqli_query($conexion,$query);
if (!$conexion) {die('<strong>No se conectó con el servidor por: </strong>' . mysqli_error($conexion));}
if (!$val)   {echo "No se ha podido modificar, el error es: " . mysqli_error($conexion);}
 else {echo "<div style='position:absolute; left:50%; margin-left:-35%; top:0; width:70%; text-align:center; overflow:hidden; border:0px solid rgba(255,112,0,1)'>";
 echo '<span style="font-family:Arlrdbd; font-size:48px; color:rgba(128,64,0,1)"><b>';
 echo "<br><br><b>DATOS MODIFICADOS CORRECTAMENTE</b><br><br>";
 echo "TERMINAL ".strtoupper($terminal)."<br><br>";
 echo $$forma."<br>";
 echo '</b></span>';
 echo '<span style="font-family:SCHLBKB; font-size:72px; color:red">&#8470; ';
 if ($consec <= 9) {echo "00000";}
  else {if ($consec <= 99) {echo "0000";}
   else {if ($consec <= 999) {echo "000";}
    else {if ($consec <= 9999) {echo "00";}
     else {if ($consec <= 99999) {echo "0";}}}}}
 echo $consecutivo; echo "<br><br>";
 echo '</span>';
 echo "<script languaje='javascript' type='text/javascript'>setTimeout(cerrarVentana,4000);</script>";
 echo "</div>";}
}
?>
