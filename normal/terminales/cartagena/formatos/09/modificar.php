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
$descripcion = $_REQUEST['descripcion'];
$ubicacion1 = $_REQUEST['ubicacion1'];
$ubicacion2 = $_REQUEST['ubicacion2'];
$ubicacion3 = $_REQUEST['ubicacion3'];
$profundidad = $_REQUEST['profundidad'];
$cantidad = $_REQUEST['cantidad'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$nombre3 = $_REQUEST['nombre3'];
$nombre4 = $_REQUEST['nombre4'];
$certhabilit = $_REQUEST['certhabilit'];
$fechaA = $_REQUEST['fechaA'];
$B2 = $_REQUEST['B2'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$B6 = $_REQUEST['B6'];
$B7 = $_REQUEST['B7'];
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B10 = $_REQUEST['B10'];
$B11 = $_REQUEST['B11'];
$B12 = $_REQUEST['B12'];
$B13 = $_REQUEST['B13'];
$B14 = $_REQUEST['B14'];
$B15 = $_REQUEST['B15'];
$C1 = $_REQUEST['C1'];
$C2 = $_REQUEST['C2'];
$C3 = $_REQUEST['C3'];
$C4 = $_REQUEST['C4'];
$C5 = $_REQUEST['C5'];
$C6 = $_REQUEST['C6'];
$C7 = $_REQUEST['C7'];
$C7a = $_REQUEST['C7a'];
$C8 = $_REQUEST['C8'];
$C8a = $_REQUEST['C8a'];
$C9 = $_REQUEST['C9'];
$C10 = $_REQUEST['C10'];
$C11 = $_REQUEST['C11'];
$C11a = $_REQUEST['C11a'];
$requisitos1 = $_REQUEST['requisitos1'];
$requisitos2 = $_REQUEST['requisitos2'];
$requisitos3 = $_REQUEST['requisitos3'];
$requisitos4 = $_REQUEST['requisitos4'];
$ejecutorD = $_REQUEST['ejecutorD'];
$nombreejecutorD = $_REQUEST['nombreejecutorD'];
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
$notas_cancelacion = $_REQUEST['notas_cancelacion'];
$ejecutorF = $_REQUEST['ejecutorF'];
$fechaejecF = $_REQUEST['fechaejecF'];
$horaejecF = $_REQUEST['horaejecF'];
$inspectorF = $_REQUEST['inspectorF'];
$fechainspF = $_REQUEST['fechainspF'];
$horainspF = $_REQUEST['horainspF'];
$emisorF = $_REQUEST['emisorF'];
$fechaemisorF = $_REQUEST['fechaemisorF'];
$horaemisorF = $_REQUEST['horaemisorF'];

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo', 
estado = '$estado', 
usuario = '$usuario', 
fecha = '$fecha', 
descripcion = '$descripcion', 
ubicacion1 = '$ubicacion1', 
ubicacion2 = '$ubicacion2', 
ubicacion3 = '$ubicacion3', 
profundidad = '$profundidad', 
cantidad = '$cantidad', 
nombre1 = '$nombre1', 
nombre2 = '$nombre2', 
nombre3 = '$nombre3', 
nombre4 = '$nombre4', 
certhabilit = '$certhabilit', 
fechaA = '$fechaA', 
B2 = '$B2', 
B3 = '$B3', 
B4 = '$B4', 
B5 = '$B5', 
B6 = '$B6', 
B7 = '$B7', 
B8 = '$B8', 
B9 = '$B9', 
B10 = '$B10', 
B11 = '$B11', 
B12 = '$B12', 
B13 = '$B13', 
B14 = '$B14', 
B15 = '$B15', 
C1 = '$C1', 
C2 = '$C2', 
C3 = '$C3', 
C4 = '$C4', 
C5 = '$C5', 
C6 = '$C6', 
C7 = '$C7', 
C7a = '$C7a', 
C8 = '$C8', 
C8a = '$C8a', 
C9 = '$C9', 
C10 = '$C10', 
C11 = '$C11', 
C11a = '$C11a', 
requisitos1 = '$requisitos1', 
requisitos2 = '$requisitos2', 
requisitos3 = '$requisitos3', 
requisitos4 = '$requisitos4', 
ejecutorD = '$ejecutorD', 
nombreejecutorD = '$nombreejecutorD', 
fechaejecD = '$fechaejecD', 
horaejecD = '$horaejecD', 
inspectorD = '$inspectorD', 
nombreinspD = '$nombreinspD', 
fechainspD = '$fechainspD', 
horainspD = '$horainspD', 
emisorE = '$emisorE', 
nombreemisorE = '$nombreemisorE', 
fechaemisorE = '$fechaemisorE', 
horaemisorE = '$horaemisorE', 
notas_cancelacion = '$notas_cancelacion', 
ejecutorF = '$ejecutorF', 
fechaejecF = '$fechaejecF', 
horaejecF = '$horaejecF', 
inspectorF = '$inspectorF', 
fechainspF = '$fechainspF', 
horainspF = '$horainspF', 
emisorF = '$emisorF', 
fechaemisorF = '$fechaemisorF', 
horaemisorF = '$horaemisorF'

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
 echo "<script languaje='javascript' type='text/javascript'>setTimeout(cerrarVentana,5000);</script>";
 echo "</div>";}
}
?>
