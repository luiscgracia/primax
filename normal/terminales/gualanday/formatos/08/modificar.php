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

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo', 
estado = '$estado', 
usuario = '$usuario', 
fecha = '$fecha', 
fechaA = '$fechaA', 
horainicialA = '$horainicialA', 
horafinalA = '$horafinalA', 
certhabilit = '$certhabilit', 
equipo_desacople = '$equipo_desacople', 
producto = '$producto', 
temperatura = '$temperatura', 
presion = '$presion', 
descripcion1 = '$descripcion1', 
descripcion2 = '$descripcion2', 
cantidad = '$cantidad', 
nombre1 = '$nombre1', 
nombre2 = '$nombre2', 
nombre3 = '$nombre3', 
nombre4 = '$nombre4', 
otros_detalles = '$otros_detalles', 
B1 = '$B1', 
B2 = '$B2', 
B3 = '$B3', 
B4 = '$B4', 
B5 = '$B5', 
B6 = '$B6', 
B7 = '$B7', 
B7a = '$B7a', 
B8 = '$B8', 
B9 = '$B9', 
B9a = '$B9a', 
B10a = '$B10a', 
B10b = '$B10b', 
B10c = '$B10c', 
B10d = '$B10d', 
B10e = '$B10e', 
B10f = '$B10f', 
B10g = '$B10g', 
B10h = '$B10h', 
B10g1 = '$B10g1', 
B10h1 = '$B10h1', 
B10i = '$B10i', 
B10j = '$B10j', 
B10k = '$B10k', 
B10l = '$B10l', 
B10k1 = '$B10k1', 
B10l1 = '$B10l1', 
razones1 = '$razones1', 
razones2 = '$razones2', 
prec_adic1 = '$prec_adic1', 
prec_adic2 = '$prec_adic2', 
C1 = '$C1', 
C2 = '$C2', 
C3 = '$C3', 
C4 = '$C4', 
C5 = '$C5', 
valvula1 = '$valvula1', 
valvula2 = '$valvula2', 
valvula3 = '$valvula3', 
valvula4 = '$valvula4', 
valvula5 = '$valvula5', 
valvula6 = '$valvula6', 
valvula7 = '$valvula7', 
valvula8 = '$valvula8', 
valvula9 = '$valvula9', 
valvula10 = '$valvula10', 
valvula11 = '$valvula11', 
candado1 = '$candado1', 
candado2 = '$candado2', 
candado3 = '$candado3', 
candado4 = '$candado4', 
candado5 = '$candado5', 
candado6 = '$candado6', 
candado7 = '$candado7', 
candado8 = '$candado8', 
candado9 = '$candado9', 
candado10 = '$candado10', 
candado11 = '$candado11', 
etiqueta1 = '$etiqueta1', 
etiqueta2 = '$etiqueta2', 
etiqueta3 = '$etiqueta3', 
etiqueta4 = '$etiqueta4', 
etiqueta5 = '$etiqueta5', 
etiqueta6 = '$etiqueta6', 
etiqueta7 = '$etiqueta7', 
etiqueta8 = '$etiqueta8', 
etiqueta9 = '$etiqueta9', 
etiqueta10 = '$etiqueta10', 
etiqueta11 = '$etiqueta11', 
C6 = '$C6', 
ubicacionA1 = '$ubicacionA1', 
ubicacionA2 = '$ubicacionA2', 
ubicacionA3 = '$ubicacionA3', 
ubicacionA4 = '$ubicacionA4', 
ubicacionA5 = '$ubicacionA5', 
ubicacionB1 = '$ubicacionB1', 
ubicacionB2 = '$ubicacionB2', 
ubicacionB3 = '$ubicacionB3', 
ubicacionB4 = '$ubicacionB4', 
ubicacionB5 = '$ubicacionB5', 
ejecutorD = '$ejecutorD', 
nombreejecD = '$nombreejecD', 
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
cancelacion = '$cancelacion', 
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
