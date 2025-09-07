<html>
<head>
<title>LISTADO x FECHA</title>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<style type="text/css">
	body{font-family:Arlrdbd; font-size:10px; margin-top: 0px}
	.encabezado	{position:fixed; width:100%; top:0px; left:0px; z-index:10; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
							 background-color:rgba(255,0,0,0); color:rgba(0,0,0,1); text-align:center;}
	.contenido	{position:relative; width:100%; top:165px; left:0px; z-index:9; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
							 background-color:rgba(255,255,255,1); color:rgba(0,0,0,1); text-align:center;}
	table				{table-layout:fixed; text-align:center;}
	td,th				{font-size:Arlrdbd; overflow:hidden; text-overflow:ellipsis; white-space:pre-wrap; width:100%; text-align:center;}
	td:hover		{overflow:visible; font-size:100%; font-weight:bold}
	tr:hover		{overflow:auto; font-weight:bold}
	.titulo			{border-top:solid white 0px; border-right:solid white 1px; border-bottom:solid white 0px; border-left:solid white 1px;
							 background-color:rgba(255,112,0,1); color:rgba(40,40,40,1); font-size:30px; font-family:Arlrdbd; text-align:center}
	.titulo_sin	{border-top:solid white 1px; border-right:solid white 1px; border-bottom:solid white 1px; border-left:solid white 1px;
							 background-color:rgba(255,112,0,1); color:rgba(40,40,40,1); font-size:20px; font-family:Arlrdbd; text-align:center}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
</script>
</head>
<body>
<?php
include("../../conectar_db.php");
include ("../../../../../common/datos.php");

$formulario = "formulario".basename(dirname(__FILE__));
$formatos = "SELECT * FROM formulario".basename(dirname(__FILE__))." ORDER BY consecutivo";
$resultado = $conexion->query($formatos);
echo "
<div class='encabezado'>
	<table style='width: 50%; margin-left:auto; margin-right:auto' border='0' cellpadding='0' cellspacing='0'>
		<tr height='0px'>
			<td class='titulo' style='width:20.0%; background-color:rgba(0,0,0,1)''></td>
			<td class='titulo' style='width:30.0%; background-color:rgba(0,0,0,1)''></td>
			<td class='titulo' style='width:50.0%; background-color:rgba(0,0,0,1)''></td>
		</tr>
		<tr height='45px'>
			<td colspan='3' style='vertical-align:bottom; font-size:24px; color:rgba(255,255,255,1); background-color:rgba(255,112,0,1)'>TERMINAL "; echo strtoupper($terminal); echo "</td>
		</tr>
		<tr height='65px'>
			<td colspan='3' style='vertical-align:top;    font-size:20px; color:rgba(0,0,0,1); background-color:rgba(255,112,0,1)'>"; echo $$formulario; echo "</td>
		</tr>
		<tr height='55px'>
			<td class='titulo_sin' style='color:white; background-color:rgba(0,0,0,1)'># CONS.</td>
			<td class='titulo_sin' style='color:white; background-color:rgba(0,0,0,1)'>ESTADO</td>
			<td class='titulo_sin' style='color:white; background-color:rgba(0,0,0,1)'>FECHA DILIGENCIAMIENTO</td>
		</tr>
	</table>
</div>";
if ($resultado->num_rows > 0)
{while ($formato = $resultado->fetch_array()) {
if ($formato['consecutivo'] <= 9) {$cons = '00000'.$formato['consecutivo'];}
	else {if ($formato['consecutivo'] <= 99) {$cons = '0000'.$formato['consecutivo'];}
		else {if ($formato['consecutivo'] <= 999) {$cons = '000'.$formato['consecutivo'];}
			else {if ($formato['consecutivo'] <= 9999) {$cons = '00'.$formato['consecutivo'];}
				else {if ($formato['consecutivo'] <= 99999) {$cons = '0'.$formato['consecutivo'];}
					else {$cons = $formato['consecutivo'];}}}}};
echo "
<div class='contenido'>
	<table style='width: 50%; margin-left:auto; margin-right:auto' border='1' cellpadding='0' cellspacing='0'>
	<tr height='70px'>"."
		<td style='width:20.0%; font-size:30px; font-family:SCHLBKB; color:red; text-align:center'>".$cons."</td>
		<td style='width:30.0%; font-size:30px; color:black; text-align:center'>".$formato['estado']."</td>
		<td style='width:50.0%; font-size:30px; color:black; text-align:center'>".$formato['fecha']."</td>
	</tr>";}
echo "
	</table>
	<br>
	<a href='javascript:closed();'><img src='../../../../../common/imagenes/regresar.png' width='60px' height='auto' title='Cerrar esta pestaña'></a> 
	";}
echo "
</div>
";
?>
</body>
</html>
