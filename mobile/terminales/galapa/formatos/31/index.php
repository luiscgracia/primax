<?
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
	include ("../../conectar_db.php");
	include ("../../../../../common/datos.php");
	$formulario = "formulario".basename(dirname(__FILE__));
	$titulo = $$formulario;
?>
<html>
<head>
<title>TITULO</title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<style>
	body		{color:rgba(0,0,0,1); background:url(../../../../../common/imagenes/primax.svg) no-repeat center center;
					 background-size:auto 180%; font-family:Arlrdbd; text-align:center}
	input		{color:rgba(0,0,0,1); font-family:Arlrdbd; font-size:50px; text-align:center}
	select	{font-size:30px; font-family:Arlrdbd; background-color:rgba(205,205,205,1); width:45%; height:50px; text-align:left; border-radius:10px}
	option	{font-size:30px}
</style>
<script>
	function abrir_formato() {formato = document.formatos.permiso.options[document.formatos.permiso.selectedIndex].value; window.open(formato,'_self','');}
</script>
</head>
<? $tiempo_cierre_pestana = 2; ?>		<!-- tiempo en minutos -->
<body onLoad="setTimeout('window.close()',<? echo $tiempo_cierre_pestana * 60 * 1000; ?>)">
<table style="background-color:none; height:100%; width:100%; margin-left:auto; margin-right:auto">
	<tr><td width=10%></td><td width=80%></td><td width=10%></td></tr>
	<tr style="background-color:none; height:100%">
		<td style="background-color:none; vertical-align:middle">
			<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:2cm; height:auto; pointer-events:auto" src="../../../../../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>">
			</a>
		</td>	
		<td style="text-align:center; width:50vw">
			<span style="display:block; font-size:48px">TERMINAL <? echo strtoupper($terminal); ?></span>
			<span style="display:block; font-size:36px"><? echo $$formulario; ?></span>
			<br><br><br>
			<img onClick="window.open('listadoxrefxfecha.php', '_blank')" style="width:auto; height:100px; pointer-events:auto" src="../../../../../common/imagenes/listado.png"><br><span style="font-size:20px">LISTADO</span>
			<br><br><br>
			<form name="formatos">
				<select name="permiso" onChange="abrir_formato()" style="width:60%" required>
					<option value="" selected>SELECCIONE UNA OPCIÓN</option>
					<option value="formato.php">	 DILIGENCIAR</option>
					<option value="consultar.html">CONSULTAR (imprimir en PDF)</option>
					<option value="editar.html">	 EDITAR</option>
		<!--	<option value="borrar.html">	 BORRAR</option> -->
					<option value="anular.html">	 ANULAR</option>
				</select>
			</form>
			<span style="font-size:29px">Si no hay elección, en <? echo $tiempo_cierre_pestana; ?> minutos se cierra la pestaña</span>
		</td>
		<td style="background-color:none; text-align:right; vertical-align:middle">
			<a href="https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
			&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX <?echo strtoupper($terminal);?>.">
			<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto; width:2cm; height:auto"></a>
		</td>	
	</tr>
</table>
</body>
</html>
