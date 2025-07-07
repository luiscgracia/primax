<html>
<title>LISTADO USUARIOS POR TERMINAL</title>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<link rel="SHORTCUT ICON" href="../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" href="../../../common/css/fuentes.css">
<style type="text/css">
  body				{font-family:Arlrdbd; font-size:10px; margin-top: 0px}
  .encabezado	{position:fixed; width:100%; top:0px; left:0px; z-index:10; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
		  				 background-color:rgba(255,115,0,0); color:rgba(0,0,0,1); text-align:center;}
  .contenido	{position:relative; width:100%; top:205px; left:0px; z-index:9; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
  						 background-color:rgba(255,255,255,1); color:rgba(0,0,0,1); text-align:center;}
  table				{table-layout:fixed; text-align:center;}
  td,th				{font-size:Arlrdbd; overflow:hidden; text-overflow:ellipsis; white-space:pre-wrap; width:100%; text-align:center;}
  td:hover		{overflow:visible; font-size:100%; font-weight:bold}
  tr:hover		{overflow:auto; font-weight:bold}
  .titulo			{border-top:solid white 0px; border-right:solid white 1px; border-bottom:solid white 0px; border-left:solid white 1px;
  						 background-color:rgba(255,115,0,1); color:rgba(40,40,40,1); font-size:36px; font-family:Arlrdbd; text-align:center}
  .titulo_sin	{border-top:solid white 0px; border-right:solid white 0px; border-bottom:solid white 0px; border-left:solid white 0px;
  						 background-color:rgba(255,115,0,1); color:rgba(40,40,40,1); font-size:40px; font-family:Arlrdbd; text-align:center}
</style>
<script>
function closed() {window.open('','_parent',''); window.close();}
</script>
</head>
<body>
<?php
include ("conectar_db_usuarios.php");

$usuarios = "SELECT * FROM usuarios WHERE terminal='$terminal'";
$resultado = $conexion_usuario->query($usuarios) or die($conexion_usuario->error);
echo "
<div class='encabezado'>
  <table style='width:700px; margin-left:auto; margin-right:auto' border='0' cellpadding='0' cellspacing='0'>
  	<tr height='0px'><td></td></tr>
	  <tr height='120px'>
	    <td class='titulo_sin' style='color:rgba(255,112,0,1); background-color:rgba(0,0,0,1)'>TERMINAL "; echo strtoupper($terminal); echo "</td>
	  </tr>
	  <tr height='80px'>
	    <td class='titulo_sin'>USUARIOS</td>
	  </tr>
  </table>
</div>";
if ($resultado->num_rows > 0)
{while ($user = $resultado->fetch_array()) {
echo "
<div class='contenido'>
  <table style='width:700px; margin-left:auto; margin-right:auto' border='1' cellpadding='0' cellspacing='0'>
  	<tr height='80px'>"."
	    <td style='font-size:40px; color:black; text-align:right'>&nbsp;".$user['usuario']."@primax.com.co&nbsp;"."</td>"."
	  </tr>";}
echo "
  </table>
  <br>
  <a href='javascript:closed();'><img src='../../../common/imagenes/regresar.png' width='100px' height='auto' title='Cerrar esta pestaña'></a> 
  ";}
echo "
</div>
";
?>
</body>
</html>
