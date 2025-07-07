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
$descripcion = $_REQUEST['descripcion'];
$permisodetrabajo = $_REQUEST['permisodetrabajo'];
$B1 = $_REQUEST['B1'];
$B2indique = $_REQUEST['B2indique'];
$B2a = $_REQUEST['B2a'];
$B2b = $_REQUEST['B2b'];
$B2c = $_REQUEST['B2c'];
$B2d = $_REQUEST['B2d'];
$B2e = $_REQUEST['B2e'];
$B2f = $_REQUEST['B2f'];
$B2g = $_REQUEST['B2g'];
$B2h = $_REQUEST['B2h'];
$B2i = $_REQUEST['B2i'];
$B2j = $_REQUEST['B2j'];
$B2k = $_REQUEST['B2k'];
$B2l = $_REQUEST['B2l'];
$B2m = $_REQUEST['B2m'];
$B2n = $_REQUEST['B2n'];
$B2o = $_REQUEST['B2o'];
$B2p = $_REQUEST['B2p'];
$B3 = $_REQUEST['B3'];
$B4 = $_REQUEST['B4'];
$B5 = $_REQUEST['B5'];
$Cresponsable1 = $_REQUEST['Cresponsable1'];
$Carea1 = $_REQUEST['Carea1'];
$Cdepartamento1 = $_REQUEST['Cdepartamento1'];
$Cfirma1 = $_REQUEST['Cfirma1'];
$Cresponsable2 = $_REQUEST['Cresponsable2'];
$Carea2 = $_REQUEST['Carea2'];
$Cdepartamento2 = $_REQUEST['Cdepartamento2'];
$Cfirma2 = $_REQUEST['Cfirma2'];
$Cresponsable3 = $_REQUEST['Cresponsable3'];
$Carea3 = $_REQUEST['Carea3'];
$Cdepartamento3 = $_REQUEST['Cdepartamento3'];
$Cfirma3 = $_REQUEST['Cfirma3'];
$Cresponsable4 = $_REQUEST['Cresponsable4'];
$Carea4 = $_REQUEST['Carea4'];
$Cdepartamento4 = $_REQUEST['Cdepartamento4'];
$Cfirma4 = $_REQUEST['Cfirma4'];
$ejecutorC = $_REQUEST['ejecutorC'];
$nombreejecutorC = $_REQUEST['nombreejecutorC'];
$fechaejecC = $_REQUEST['fechaejecC'];
$horaejecC = $_REQUEST['horaejecC'];
$cancelacion = $_REQUEST['cancelacion'];
$comentariosDa = $_REQUEST['comentariosDa'];
$comentariosDb = $_REQUEST['comentariosDb'];
$ejecutorD = $_REQUEST['ejecutorD'];
$fechaejecD = $_REQUEST['fechaejecD'];
$horaejecD = $_REQUEST['horaejecD'];
$inspectorD = $_REQUEST['inspectorD'];
$fechainspD = $_REQUEST['fechainspD'];
$horainspD = $_REQUEST['horainspD'];
$emisorD = $_REQUEST['emisorD'];
$fechaemisorD = $_REQUEST['fechaemisorD'];
$horaemisorD = $_REQUEST['horaemisorD'];

$query="UPDATE formulario".basename(dirname(__FILE__))." SET
consecutivo = '$consecutivo',
estado = '$estado',
usuario = '$usuario',
fecha = '$fecha',
fechaA = '$fechaA',
horainicialA = '$horainicialA',
horafinalA = '$horafinalA',
certhabilit = '$certhabilit',
descripcion = '$descripcion',
permisodetrabajo = '$permisodetrabajo',
B1 = '$B1',
B2indique = '$B2indique',
B2a = '$B2a',
B2b = '$B2b',
B2c = '$B2c',
B2d = '$B2d',
B2e = '$B2e',
B2f = '$B2f',
B2g = '$B2g',
B2h = '$B2h',
B2i = '$B2i',
B2j = '$B2j',
B2k = '$B2k',
B2l = '$B2l',
B2m = '$B2m',
B2n = '$B2n',
B2o = '$B2o',
B2p = '$B2p',
B3 = '$B3',
B4 = '$B4',
B5 = '$B5', 
Cresponsable1 = '$Cresponsable1',
Carea1 = '$Carea1',
Cdepartamento1 = '$Cdepartamento1',
Cfirma1 = '$Cfirma1',
Cresponsable2 = '$Cresponsable2',
Carea2 = '$Carea2',
Cdepartamento2 = '$Cdepartamento2',
Cfirma2 = '$Cfirma2',
Cresponsable3 = '$Cresponsable3',
Carea3 = '$Carea3',
Cdepartamento3 = '$Cdepartamento3',
Cfirma3 = '$Cfirma3',
Cresponsable4 = '$Cresponsable4',
Carea4 = '$Carea4',
Cdepartamento4 = '$Cdepartamento4',
Cfirma4 = '$Cfirma4',
ejecutorC = '$ejecutorC',
nombreejecutorC = '$nombreejecutorC', 
fechaejecC = '$fechaejecC',
horaejecC = '$horaejecC',
cancelacion = '$cancelacion',
comentariosDa = '$comentariosDa',
comentariosDb = '$comentariosDb',
ejecutorD = '$ejecutorD',
fechaejecD = '$fechaejecD',
horaejecD = '$horaejecD',
inspectorD = '$inspectorD',
fechainspD = '$fechainspD',
horainspD = '$horainspD',
emisorD = '$emisorD',
fechaemisorD = '$fechaemisorD',
horaemisorD = '$horaemisorD'

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
