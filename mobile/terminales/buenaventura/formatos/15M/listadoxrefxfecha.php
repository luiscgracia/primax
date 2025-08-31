<html>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<link rel="stylesheet" href="../../../../../common/css/fuentes.css">
<style type="text/css">
	body{font-family:Arlrdbd; font-size:10px; margin-top: 0px}
	.encabezado	{position:fixed; width:100%; top:0px; left:0px; z-index:10; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
							 background-color:rgba(255,115,0,0); color:rgba(0,0,0,1); text-align:center;}
	.contenido	{position:relative; width:100%; top:160px; left:0px; z-index:9; margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px;
							 background-color:rgba(255,255,255,1); color:rgba(0,0,0,1); text-align:center;}
	table				{table-layout:fixed; text-align:center;}
	td,th				{font-size:Arlrdbd; overflow:hidden; text-overflow:ellipsis; white-space:pre-wrap; width:100%; text-align:center;}
	.titulo			{border-top:0px solid white; border-right:1px solid white; border-bottom:1px solid white; border-left:1px solid white;
							 background-color:rgba(255,115,0,1.0); color:rgba(40,40,40,1); font-size:30px; font-family:Arlrdbd; text-align:center}
	.titulo_sin	{border-top:1px solid white; border-right:1px solid white; border-bottom:0px solid white; border-left:1px solid white;
							 background-color:rgba(0,0,0,1); color:white; font-size:27px; font-family:Arlrdbd; text-align:center; vertical-align:middle}
</style>
<script>
function closed() {window.open('','_parent',''); window.close();}
</script>
</head>
<body>
<?
include("../../conectar_db.php");
include ("../../../../../common/datos.php");

$formulario = "formulario".basename(dirname(__FILE__));
$formatos = "SELECT * FROM formulario".basename(dirname(__FILE__))." ORDER BY consecutivo";
$resultado = $conexion->query($formatos);
echo "
<div class='encabezado'>
	<table style='width:98.50%; margin-left:auto; margin-right:auto' border='0' cellpadding='0' cellspacing='0'>
		<tr><td style=width:20%></td><td style=width:25%></td><td style=width:55%></td></tr>
		<tr height=100px><td colspan=3 class=titulo>TERMINAL "; echo strtoupper($terminal); echo "<br>"; echo $$formulario; echo "</td></tr>
		<tr height=55px><td class=titulo_sin># CONS.</td><td class=titulo_sin>ESTADO</td><td class=titulo_sin>FECHA DILIGENCIAMIENTO</td></tr>
	</table>
</div>";
if ($resultado->num_rows > 0)
	{while ($formato = $resultado->fetch_array()) {
	if ($formato['consecutivo'] <= 9) {$cons = '00000'.$formato['consecutivo'];}
		else {if ($formato['consecutivo'] <= 99) {$cons = '0000'.$formato['consecutivo'];}
			else {if ($formato['consecutivo'] <= 999) {$cons = '000'.$formato['consecutivo'];}
				else {if ($formato['consecutivo'] <= 9999) {$cons = '00'.$formato['consecutivo'];}
					else {if ($formato['consecutivo'] <= 99999) {$cons = '0'.$formato['consecutivo'];}
						else {if ($formato['consecutivo'] <= 999999) {$cons = $formato['consecutivo'];}
							else {$cons = 'NA';}}}}}};
	echo "<div class=contenido>
		<table style='width:100%; margin-left:auto; margin-right:auto' border=1 cellpadding=0 cellspacing=0>
		<tr height=70px>
			<td style='width:20%; font-size:32px; color:red; font-family:SCHLBKB'>".$cons."</td>
			<td style='width:25%; font-size:32px; color:black'>".$formato['estado']."</td>
			<td style='width:55%; font-size:32px; color:black'>".$formato['fecha']."</td>
		</tr>";
		}		// cierre del while
		echo "
		</table>
		<br>
		<a href='javascript:closed();'><img src='../../../../../common/imagenes/regresar.png' width='80px' height='auto' title='Cerrar esta pestaña'></a>";
		}		// cierre del if
	echo "</div>";
?>
</body>
</html>
