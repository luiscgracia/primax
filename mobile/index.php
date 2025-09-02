<html lang="es">
<head>
<title>PERMISOS DE TRABAJO - PRIMAX COLOMBIA</title>
<link rel="SHORTCUT ICON" href="../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style>
	body				{background:url(../common/imagenes/primax.svg) repeat center center; background-size:auto 150%}
	input				{color:rgba(0,0,0,1); background-color:rgba(0,0,0,0); font-family:Arlrdbd; font-size:50px; text-align:center; border:none; height:60px}
	input:hover	{background-color:rgba(255,112,0,0)}
	select			{font-size:30px; background-color:rgba(205,205,205,1); width:340px; height:50px; text-align:center; padding:12px 0px}
	option			{font-size:30px; background-color:rgba(255,112,0,0.5)}
	.enviar			{border:0px solid rgba(255,112,0,1); border-radius:10px; width:340px; height:50px; font-size:30px; color:rgba(255,255,255,1); background-color:rgba(0,0,0,1); padding:12px 0px}
</style>
</head>
<body>
<?php
	include ('../common/datos.php');
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
?>
<script>setTimeout(function(){location.href="index.php"}, 5*60*1000);</script>
<table style="background-color:none" width=100% height=100% border=0>
	<tr><td width=10%></td><td width=80%></td><td width=10%></td></tr>
	<tr style="background-color:none; height:6%">
		<td></td>
		<td style="font-size:36px; text-align:center">
			<!--APP para CELULAR ó TABLET<br>-->
			<!--<script>document.write("<b>" + window.innerWidth + "px");</script>-->
			<!--<script>document.write("<b>" + window.innerWidth + "&nbsp;x&nbsp;" + window.innerHeight);</script>-->
		</td>
		<td style="text-align:right">
			<a href="../normal/index.php" style=pointer-events:auto target=_self>
			<img src="../common/imagenes/logo_normal.svg" style="pointer-events:auto; width:2cm; height:auto"></a>
		</td>
	</tr>
  <tr style="background-color:rgba(0,240,0,0); height:88%; vertical-align:middle">
		<td style="vertical-align:middle">
			<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:2cm; height:auto; pointer-events:auto" src="../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>">
			</a>
		</td>
		<td style="text-align:center">
			<input name=empresa value="PRIMAX COLOMBIA"			onClick="location.reload('index.php');" style="width:100%; cursor:pointer">
			<input name=permisos_trabajo value="PERMISOS DE TRABAJO"	onClick="location.reload('index.php');" style="width:100%; cursor:pointer">
			<span style="font-size:30px">APP para CELULAR ó TABLET - <script>document.write("<b>" + window.innerWidth + "px");</script><br><br><br><br></span>
			<form action="ingresar_usuario.php" method="post" target="_blank">
				<select name="terminal" id="terminal" type="text" required>
					<option value="" disabled selected>TERMINAL</option>
					<option value="bucaramanga">	BUCARAMANGA	 </option>
					<option value="buenaventura"> BUENAVENTURA </option>
					<option value="cartagena">		CARTAGENA		 </option>
					<option value="cartago">			CARTAGO			 </option>
					<option value="galapa">				GALAPA			 </option>
					<option value="gualanday">		GUALANDAY		 </option>
					<option value="la_dorada">		LA DORADA		 </option>
					<option value="mancilla">			MANCILLA		 </option>
					<option value="medellin">			MEDELLÍN		 </option>
					<option value="puente_aranda">PUENTE ARANDA</option>
					<option value="yumbo">				YUMBO				 </option>
				</select>
				<div style="position:relative; width:50%; margin-left:50%; left:-170px; top:50px; background-color:rgba(0,0,255,0)">
					<input name=continuar class="enviar" type="submit" value="CONTINUAR" style="background-color:rgba(0,0,0,1); cursor:pointer" autofocus>
				</div>
			</form>
		</td>
		<td style="text-align:right; vertical-align:middle; background-color:none">
			<a href="https://wa.me/<? echo $celular_soporte; ?>?text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX.">
			<img src="../common/imagenes/whatsapp.png" style="pointer-events:auto; width:2cm; height:auto">
			</a>
		</td>
  </tr>
	<tr style="background-color:none; height:6%"><td colspan=3></td></tr>
</table>
</body>
</html>
