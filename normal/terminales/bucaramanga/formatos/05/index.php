<?
include ("../../conectar_db.php");
include ("../../../../../common/datos.php");
$formulario = "formulario".basename(dirname(__FILE__));
$titulo = $$formulario;
?>
<html>
<head>
<title><? echo $$formulario; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<style>
	body		{color:rgba(0,0,0,1); background-color:rgba(255,255,255,1); background:url(../../../../../common/imagenes/primax.svg) no-repeat center center; background-size:auto 180%;
					 text-align:center}
	input		{color:rgba(0,0,0,1); background-color:rgba(0,255,255,0); border:0px solid rgba(0,128,0,0); font-family:Arlrdbd; font-size:50px; text-align:center}
	select	{font-size:30px; font-family:Arlrdbd; background-color:rgba(205,205,205,1); width:45%; height:50px; text-align:left; border-radius:10px}
	option	{font-size:30px}
	span		{color:black; display:block}
</style>
<script LANGUAGE="JavaScript">
	function abrir_formato() {formato = document.formato_especifico.opcion.options[document.formato_especifico.opcion.selectedIndex].value; window.open(formato,'_self','');}
</script>
</head>
<? $tiempo_cierre_pestana_formato = 2; ?>				<!-- tiempo en minutos -->
<body onLoad="setTimeout('window.close()',<? echo $tiempo_cierre_pestana_formato * 60 * 1000; ?>)">
<?
date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d / H:i");
?>
<script type="text/javascript">document.write('<table height="' + window.innerHeight*0.98 + '" style="width:100%; background-color:rgba(255,115,0,0); margin-left:auto; margin-right:auto" border="0" cellpadding="0" cellspacing="0">')</script>
	<tr style="background-color:rgba(240,0,0,0.0); height:15%"><td></td></tr>
	<tr style="background-color:rgba(255,115,0,0.0); height:30%">
		<td style="text-align:center">
			<span style="font-size:48px">TERMINAL <? echo strtoupper($terminal); ?></span>
			<div style="margin-left:27%; margin-top:0%; width:46%; text-align:center; background-color:rgba(0,255,0,0.0)">
				<span style="font-size:36px"><? echo $$formulario; ?></span>
			</div>
			<span style="font-size:15px">Si no hay elección, en <? echo $tiempo_cierre_pestana_formato; ?> minuto(s) se cierra la pestaña</span>
		</td>
	</tr>
	<tr style="background-color:rgba(255,45,0,0.0); height:15%">
		<td>
			<div style="margin-left:46.5%; margin-top:0%; width:95px; text-align:center; background-color:rgba(0,255,0,0.0)">
				<img onClick="window.open('listadoxrefxfecha.php', '_blank')" style="cursor:pointer; width:auto; height:50px" src="../../../../../common/imagenes/listado.png">
				<br><span style="font-size:12px; color:black">LISTADO x REFERENCIA</span>
			</div>
		</td>
	</tr>
	<tr style="background-color:rgba(255,115,0,0.0); height:15%">
		<td style="text-align:center; background-color:rgba(0,240,240,0.0)">
			<form name="formato_especifico">
				<select name="opcion" onChange="abrir_formato()" required>
					<option value="" selected>SELECCIONE UNA OPCIÓN</option>
					<option value="formato.php">DILIGENCIAR</option>
					<option value="consultar.html">CONSULTAR (imprimir en PDF)</option>
<!--					<option value="editar.html">EDITAR</option> -->
<!--					<option value="borrar.html">BORRAR</option> -->
					<option value="anular.html">ANULAR</option>
				</select>
			</form>
		</td>
	</tr>
	<tr style="background-color:rgba(0,0,240,0.0); height:25%"><td></td></tr>
</table>
<div class="zoom" style="position:absolute; left:3%; top:25%; background-color:rgba(255,0,0,0.0)">
	<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
	<img style="width:125%; height:auto; pointer-events:auto" src="../../../../../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>">
	</a>
</div>
<!--
<div style="position:relative; left:46.5%; top:-46%; width:95px; text-align:center; background-color:rgba(0,255,0,0.0)">
	<img style="width:auto; height:50px" src="../../../../../common/imagenes/listado.png"><br><span style="font-size:12px; color:black">LISTADO x REFERENCIA</span>
</div>
<div style="position:relative; left:46.5%; top:-58%; width:95px; text-align:center; background-color:rgba(255,0,255,0.0)">
	<input type="button" onClick="window.open('listadoxrefxfecha.php', '_blank');" value="" style="width:100%; height:50px; cursor:pointer"
	title="Consecutivos por fecha">
</div>
-->
<div style="position:absolute; left:94%; top:15%">
	<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX <? echo strtoupper($terminal); ?>, voy a trabajar el formato <? echo $$formulario; ?>." target="_blank">
	<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="50px" height="auto" title="Comunicarse por Whatsapp"></a>
</div>
</body>
</html>
