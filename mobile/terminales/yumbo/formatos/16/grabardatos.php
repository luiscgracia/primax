<?
$formato = basename(dirname(__FILE__));
include ("../../conectar_db.php");
include ("../../../../../common/datos.php");
$forma = "formulario".$formato;
include ("../../../../../normal/terminales/$terminal/formatos/$formato/grabardatos.php");
?>
