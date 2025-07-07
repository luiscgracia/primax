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
$formato = basename(dirname(__FILE__));
$forma = "formulario".$formato;

error_reporting(E_ALL ^ E_NOTICE);
if (isset($_REQUEST['modificar'])) {
         
// listado  de variables del formato

$consecutivo = $_REQUEST['consecutivo'];
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

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo'
, estado = '$estado'
, usuario = '$usuario'
, fecha = '$fecha'
, descripcion = '$descripcion'
, cantidad = '$cantidad'
, nombre1 = '$nombre1'
, nombre2 = '$nombre2'
, nombre3 = '$nombre3'
, nombre4 = '$nombre4'
, fechaA = '$fechaA'
, horainicialA = '$horainicialA'
, horafinalA = '$horafinalA'
, certhabilit = '$certhabilit'
, B1 = '$B1'
, B2 = '$B2'
, B3 = '$B3'
, B4 = '$B4'
, B5 = '$B5'
, B6 = '$B6'
, B7 = '$B7'
, indiqueB7a = '$indiqueB7a'
, indiqueB7b = '$indiqueB7b'
, B8 = '$B8'
, B9 = '$B9'
, B10 = '$B10'
, B11 = '$B11'
, especifiqueB11a = '$especifiqueB11a'
, especifiqueB11b = '$especifiqueB11b'
, B12a = '$B12a'
, B12b = '$B12b'
, B12c = '$B12c'
, B12d = '$B12d'
, B12e = '$B12e'
, B12f = '$B12f'
, B12g = '$B12g'
, B12h = '$B12h'
, B12i = '$B12i'
, guante = '$guante'
, B12j = '$B12j'
, calzado = '$calzado'
, B12k = '$B12k'
, delantal = '$delantal'
, B12l = '$B12l'
, ropa = '$ropa'
, B12m = '$B12m'
, otro1 = '$otro1'
, B12n = '$B12n'
, otro2 = '$otro2'
, B12o = '$B12o'
, otro3 = '$otro3'
, B13equipo = '$B13equipo'
, B13dueno = '$B13dueno'
, B13fecha = '$B13fecha'
, B13bumptest = '$B13bumptest'
, B13hora1 = '$B13hora1'
, B13resul1 = '$B13resul1'
, B13hora2 = '$B13hora2'
, B13resul2 = '$B13resul2'
, B13hora3 = '$B13hora3'
, B13resul3 = '$B13resul3'
, B13hora4 = '$B13hora4'
, B13resul4 = '$B13resul4'
, B13hora5 = '$B13hora5'
, B13resul5 = '$B13resul5'
, B13hora6 = '$B13hora6'
, B13resul6 = '$B13resul6'
, B13hora7 = '$B13hora7'
, B13resul7 = '$B13resul7'
, B13hora8 = '$B13hora8'
, B13resul8 = '$B13resul8'
, ejecutorC = '$ejecutorC'
, fechaejecC = '$fechaejecC'
, horaejecC = '$horaejecC'
, inspectorC = '$inspectorC'
, fechainspC = '$fechainspC'
, horainspC = '$horainspC'
, emisorD = '$emisorD'
, nombreemisorD = '$nombreemisorD'
, fechaemisorD = '$fechaemisorD'
, horaemisorD = '$horaemisorD'
, cancelacion = '$cancelacion'
, ejecutorE = '$ejecutorE'
, fechaejecE = '$fechaejecE'
, horaejecE = '$horaejecE'
, inspectorE = '$inspectorE'
, fechainspE = '$fechainspE'
, horainspE = '$horainspE'
, emisorE = '$emisorE'
, fechaemisorE = '$fechaemisorE'
, horaemisorE = '$horaemisorE'

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
