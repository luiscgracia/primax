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
$indiqueB5a = $_REQUEST['indiqueB5a'];
$indiqueB5b = $_REQUEST['indiqueB5b'];
$B6 = $_REQUEST['B6'];
$indiqueB6a = $_REQUEST['indiqueB6a'];
$indiqueB6b = $_REQUEST['indiqueB6b'];
$B7 = $_REQUEST['B7'];
$B8 = $_REQUEST['B8'];
$B9 = $_REQUEST['B9'];
$B10 = $_REQUEST['B10'];
$especifiqueB10a = $_REQUEST['especifiqueB10a'];
$especifiqueB10b = $_REQUEST['especifiqueB10b'];
$B11a = $_REQUEST['B11a'];
$B11b = $_REQUEST['B11b'];
$B11c = $_REQUEST['B11c'];
$B11d = $_REQUEST['B11d'];
$B11e = $_REQUEST['B11e'];
$B11f = $_REQUEST['B11f'];
$B11g = $_REQUEST['B11g'];
$B11h = $_REQUEST['B11h'];
$B11i = $_REQUEST['B11i'];
$guante = $_REQUEST['guante'];
$B11j = $_REQUEST['B11j'];
$calzado = $_REQUEST['calzado'];
$B11k = $_REQUEST['B11k'];
$delantal = $_REQUEST['delantal'];
$B11l = $_REQUEST['B11l'];
$ropa = $_REQUEST['ropa'];
$B11m = $_REQUEST['B11m'];
$otro1 = $_REQUEST['otro1'];
$B11n = $_REQUEST['B11n'];
$otro2 = $_REQUEST['otro2'];
$B11o = $_REQUEST['B11o'];
$otro3 = $_REQUEST['otro3'];
$req_pr_gas = $_REQUEST['req_pr_gas'];
$B12equipo = $_REQUEST['B12equipo'];
$B12dueno = $_REQUEST['B12dueno'];
$B12fecha = $_REQUEST['B12fecha'];
$B12bumptest = $_REQUEST['B12bumptest'];
$B12hora1 = $_REQUEST['B12hora1'];
$B12resul1 = $_REQUEST['B12resul1'];
$B12hora2 = $_REQUEST['B12hora2'];
$B12resul2 = $_REQUEST['B12resul2'];
$B12hora3 = $_REQUEST['B12hora3'];
$B12resul3 = $_REQUEST['B12resul3'];
$B12hora4 = $_REQUEST['B12hora4'];
$B12resul4 = $_REQUEST['B12resul4'];
$B12hora5 = $_REQUEST['B12hora5'];
$B12resul5 = $_REQUEST['B12resul5'];
$B12hora6 = $_REQUEST['B12hora6'];
$B12resul6 = $_REQUEST['B12resul6'];
$B12hora7 = $_REQUEST['B12hora7'];
$B12resul7 = $_REQUEST['B12resul7'];
$B12hora8 = $_REQUEST['B12hora8'];
$B12resul8 = $_REQUEST['B12resul8'];
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

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo', 
estado = '$estado', 
usuario = '$usuario', 
fecha = '$fecha', 
descripcion = '$descripcion', 
cantidad = '$cantidad', 
nombre1 = '$nombre1', 
nombre2 = '$nombre2', 
nombre3 = '$nombre3', 
nombre4 = '$nombre4', 
fechaA = '$fechaA', 
horainicialA = '$horainicialA', 
horafinalA = '$horafinalA', 
certhabilit = '$certhabilit', 
B1 = '$B1', 
B2 = '$B2', 
B3 = '$B3', 
B4 = '$B4', 
B5 = '$B5', 
indiqueB5a = '$indiqueB5a', 
indiqueB5b = '$indiqueB5b', 
B6 = '$B6', 
indiqueB6a = '$indiqueB6a', 
indiqueB6b = '$indiqueB6b', 
B7 = '$B7', 
B8 = '$B8', 
B9 = '$B9', 
B10 = '$B10', 
especifiqueB10a = '$especifiqueB10a', 
especifiqueB10b = '$especifiqueB10b', 
B11a = '$B11a', 
B11b = '$B11b', 
B11c = '$B11c', 
B11d = '$B11d', 
B11e = '$B11e', 
B11f = '$B11f', 
B11g = '$B11g', 
B11h = '$B11h', 
B11i = '$B11i', 
guante = '$guante', 
B11j = '$B11j', 
calzado = '$calzado', 
B11k = '$B11k', 
delantal = '$delantal', 
B11l = '$B11l', 
ropa = '$ropa', 
B11m = '$B11m', 
otro1 = '$otro1', 
B11n = '$B11n', 
otro2 = '$otro2', 
B11o = '$B11o', 
otro3 = '$otro3', 
req_pr_gas = '$req_pr_gas', 
B12equipo = '$B12equipo', 
B12dueno = '$B12dueno', 
B12fecha = '$B12fecha', 
B12bumptest = '$B12bumptest', 
B12hora1 = '$B12hora1', 
B12resul1 = '$B12resul1', 
B12hora2 = '$B12hora2', 
B12resul2 = '$B12resul2', 
B12hora3 = '$B12hora3', 
B12resul3 = '$B12resul3', 
B12hora4 = '$B12hora4', 
B12resul4 = '$B12resul4', 
B12hora5 = '$B12hora5', 
B12resul5 = '$B12resul5', 
B12hora6 = '$B12hora6', 
B12resul6 = '$B12resul6', 
B12hora7 = '$B12hora7', 
B12resul7 = '$B12resul7', 
B12hora8 = '$B12hora8', 
B12resul8 = '$B12resul8', 
cancelacion = '$cancelacion', 
ejecutorC = '$ejecutorC', 
fechaejecC = '$fechaejecC', 
horaejecC = '$horaejecC', 
inspectorC = '$inspectorC', 
fechainspC = '$fechainspC', 
horainspC = '$horainspC', 
emisorD = '$emisorD', 
nombreemisorD = '$nombreemisorD', 
fechaemisorD = '$fechaemisorD', 
horaemisorD = '$horaemisorD', 
ejecutorE = '$ejecutorE', 
fechaejecE = '$fechaejecE', 
horaejecE = '$horaejecE', 
inspectorE = '$inspectorE', 
fechainspE = '$fechainspE', 
horainspE = '$horainspE', 
emisorE = '$emisorE', 
fechaemisorE = '$fechaemisorE', 
horaemisorE = '$horaemisorE'

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
 echo "<script languaje='javascript' type='text/javascript'>setTimeout(cerrarVentana,4000);</script>";
 echo "</div>";}
}
?>

