<!DOCTYPE html>
<html lang=es>
<head>
<title>PERMISOS DE TRABAJO - PRIMAX COLOMBIA</title>
<link rel="SHORTCUT ICON" href="../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<style>
body				{background:url(../common/imagenes/primax.svg) no-repeat center center; background-size:auto 150%}
input				{color:rgba(0,0,0,1); background-color:rgba(0,0,0,0); font-family:Arlrdbd; font-size:50px; text-align:center; border:none; height:60px}
input:hover	{background-color:rgba(255,112,0,0)}
select			{font-size:32px; height:50px; padding:7px 0 0 0}
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
<table style="width:100%; height:91.20vh" border=0>
	<tr><td width=10%></td><td width=80%></td><td width=10%></td></tr>
	<tr style="height:10%; vertical-align:middle">
		<td></td>
		<td></td>
		<td>
			<a href=../normal/index.php style=pointer-events:auto target=_self>
			<img src=../common/imagenes/logo_normal.svg style="pointer-events:auto; width:10vw; height:auto">
			</a>
		</td>
	</tr>
  <tr style="height:80%; vertical-align:middle">
		<td>
			<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:10vw; height:auto; pointer-events:auto" src="../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<?=$correo_pedidos;?>">
			</a>
		</td>
		<td>
			<input name=empresa						value="PRIMAX COLOMBIA"			onClick=location.reload('index.php') style="width:100%; cursor:pointer">
			<input name=permisos_trabajo	value="PERMISOS DE TRABAJO"	onClick=location.reload('index.php') style="width:100%; cursor:pointer">
			<span style="font-size:30px">APP para CELULAR ó TABLET<br><br><br><br></span>
			<!--<span style="font-size:30px">APP para CELULAR ó TABLET - <script>document.write("<b>" + window.innerWidth + " x " + window.innerHeight);</script><br><br><br><br></span>-->
			<form action=ingresar_usuario.php method=post target=_blank rel="noopener noreferrer">
				<select name=terminal id=terminal type=text style="width:40%; text-align:center" required>
					<option value="" disabled selected style=text-align:center>TERMINAL</option>
					<option value=bucaramanga>	BUCARAMANGA	 </option>
					<option value=buenaventura> BUENAVENTURA </option>
					<option value=cartagena>		CARTAGENA		 </option>
					<option value=cartago>			CARTAGO			 </option>
					<option value=galapa>				GALAPA			 </option>
					<option value=gualanday>		GUALANDAY		 </option>
					<option value=la_dorada>		LA DORADA		 </option>
					<option value=mancilla>			MANCILLA		 </option>
					<option value=medellin>			MEDELLÍN		 </option>
					<option value=puente_aranda>PUENTE ARANDA</option>
					<option value=yumbo>				YUMBO				 </option>
				</select>
				<div style="position:relative; width:30%; margin-left:50%; left:-15%; top:50px">
					<input name=continuar class=enviar type=submit value=CONTINUAR style="width:100%; background-color:rgba(0,0,0,1); cursor:pointer" autofocus>
				</div>
			</form>
		</td>
		<td style=text-align:center>
			<a href="https://wa.me/<?=$celular_soporte;?>?text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else if ($fecha <= date('Y-m-d / 18:00')) {echo 'Buenas tardes, ';} else {echo 'Buenas noches, ';} ?>le escribo de PRIMAX.">
			<img src="../common/imagenes/whatsapp.png" style="pointer-events:auto; width:10vw; height:auto">
			</a>
		</td>
  </tr>
	<tr style=height:10%>
		<td colspan=3></td>
	</tr>
</table>
</body>
</html>
