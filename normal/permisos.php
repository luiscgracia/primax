<!DOCTYPE html>
<html lang=es>
<head>
<title>PERMISOS DE TRABAJO</title>
<link rel="SHORTCUT ICON" href="../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../common/css/estilo_formatos.css">
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style>
body		{color:rgba(0,0,0,1); background:url(../common/imagenes/primax.svg) no-repeat center center; background-size:auto 150%; text-align:center}
input		{color:rgba(0,0,0,1); background-color:rgba(0,255,255,0); border:0px solid rgba(0,128,0,1); border-radius:10px; font-family:Arlrdbd; font-size:50px; text-align:center}
button	{background-color:rgba(255,112,0,0.0); width:100%}
select	{font-size:32px; height:50px; padding:7px 0 0 0}
option	{font-size:20px}
</style>
<script>
function abrir_formato() {formato = document.formulario.permiso.options[document.formulario.permiso.selectedIndex].value; window.open(formato,'_self','')}
</script>
</head>
<body>
<? include ("../common/datos.php"); ?>
<table style="width:100vw; height:91.20vh" border=0>
	<tr style=height:10%><td></td></tr>
	<tr style="height:80%; vertical-align:middle">
		<td style="vertical-align:middle">
			<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:2cm; height:auto; pointer-events:auto" src="../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<?=$correo_pedidos; ?>">
			</a>
		</td>
		<td style="text-align:center; background-color:none">
			<span style="display:block; font-size:40px">TERMINAL <?=strtoupper($terminal); ?></span>
			<div style="position:relative; left:50%; margin-left:-40mm; top: 10.0mm; width:25mm; text-align:center; background-color:rgba(0,0,255,0.0)">
				<img onClick="window.open('terminales/<?=$terminal;?>/listado.php', '_blank')" style="cursor:pointer; width:auto; height:50px" src="../common/imagenes/listado.png">
				<br><span style="font-size:12px; color:black">LISTADO x TERMINAL</span>
			</div>
			<div style="position:relative; left:50%; margin-left: 20mm; top:-10.5mm; width:25mm; text-align:center; background-color:rgba(0,255,0,0.0)">
				<img onClick="window.open('terminales/<?=$terminal;?>/listado_usuarios.php', '_blank')" style="cursor:pointer; width:auto; height:50px" src="../common/imagenes/usuarios.png">
				<br><span style="font-size:12px; color:black">USUARIOS x TERMINAL</span>
			</div>
			<div style="position:relative; margin-left:10%; top:-5mm; width:80%; text-align:center; background-color:rgba(255,0,0,0.0.5)">
				<form name="formulario" onChange="abrir_formato();">
					<select name=permiso id=permiso_escogido style=width:65% required>
						<option value="" disabled selected style=text-align:center>PERMISOS DE TRABAJO</option>
						<option value="terminales/<?=$terminal;?>/formatos/01/index.php"> 01 &nbsp;&nbsp; &nbsp;<?=$formulario01;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/02/index.php"> 02 &nbsp;&nbsp; &nbsp;<?=$formulario02;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/03/index.php"> 03 &nbsp;&nbsp; &nbsp;<?=$formulario03;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/04/index.php"> 04 &nbsp;&nbsp; &nbsp;<?=$formulario04;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/05/index.php"> 05 &nbsp;&nbsp; &nbsp;<?=$formulario05;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/05a/index.php">05a&nbsp; &nbsp;<?=$formulario05a;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/05b/index.php">05b&nbsp; &nbsp;<?=$formulario05b;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/08/index.php"> 08 &nbsp;&nbsp; &nbsp;<?=$formulario08;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/09/index.php"> 09 &nbsp;&nbsp; &nbsp;<?=$formulario09;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/13/index.php"> 13 &nbsp;&nbsp; &nbsp;<?=$formulario13;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/15A/index.php">15A&nbsp; &nbsp;<?=$formulario15A;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/15M/index.php">15M&nbsp; &nbsp;<?=$formulario15M;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/16/index.php"> 16 &nbsp;&nbsp; &nbsp;<?=$formulario16;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/30/index.php"> 30 &nbsp;&nbsp; &nbsp;<?=$formulario30;?></option>
						<option value="terminales/<?=$terminal;?>/formatos/31/index.php"> 31 &nbsp;&nbsp; &nbsp;<?=$formulario31;?></option>
					</select>
				</form>
			</div>
		</td>
		<td style="text-align:right; vertical-align:middle">
			<a href="https://wa.me/<?=$celular_soporte;?>?text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX.">
			<img src="../common/imagenes/whatsapp.png" style="pointer-events:auto; width:2cm; height:auto">
			</a>
		</td>
	</tr>
	<tr style=height:10%><td colspan=3 style=text-align:center><span style=font-size:24px>Si no hay elección, en <?=$tiempo_cierre_pestana_verificar; ?> minuto(s) se cierra la pestaña</span></td></tr>
</table>
</body>
</html>
