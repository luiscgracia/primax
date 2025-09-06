<!DOCTYPE html>
<html lang=es>
<head>
<title>INGRESAR USUARIO PRIMAX</title>
<link rel="SHORTCUT ICON" href="../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<style>
body				{background:url(../common/imagenes/primax.svg) no-repeat center center; background-size:auto 150%; text-align:center}
input				{color:rgba(0,0,0,1); background-color:rgba(0,0,0,0.1); border:0px; border-radius:10px; font-family:Arlrdbd; text-align:right; outline:none}
input:focus	{background-color:rgba(255,112,0,0.33); outline:none}
input[type=text]:hover			{overflow:visible; background-color:rgba(255,112,0,1); color:rgba(0,0,0,1)}
input[type=password]:hover	{overflow:visible; background-color:rgba(255,112,0,1); color:rgba(0,0,0,1)}
</style>
<script type="text/javascript">
function minuscula(e) {e.value = e.value.toLowerCase();}
</script>
</head>
<body>
<?
include ('../common/datos.php');
date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d / H:i");
$terminal = $_POST["terminal"];
?>
<table style="width:100vw; height:100vh" border=0">
	<tr><td width=10%></td><td width=80%></td><td width=10%></td></tr>
	<tr style="background-color:none; height:6%"><td colspan=3></td></tr>
  <tr style="background-color:rgba(0,240,0,0); height:88%; vertical-align:middle">
		<td style="vertical-align:middle">
			<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:2cm; height:auto; pointer-events:auto" src="../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<?=$correo_pedidos;?>">
			</a>
		</td>
		<td style="width:100%; text-align:center; vertical-align:middle">
			<span style="font-size:50px">INGRESAR USUARIO</span><br>
			<span style="font-size:36px; font-family:Arlrdlt">TERMINAL <?=strtoupper($terminal);?></span><br>
		  <form action="verificar_usuario.php" method="post" style="text-align:center; background-color:rgba(255,0,0,0.0)">
				<div style="position:reletive; width:100%; top:50px; left:0%; margin-left:0%; background-color:rgba(0,0,255,0)">
					<table style=width:100% border=0>
						<tr height=40px>
							<td width=50%></td>
						</tr>
						<tr height=40px>
							<td><input style="width:40%; margin-left:30%; text-align:center; height:35px; font-size:30px" name=usuario	maxlength=12 value=primax	type=text			onkeyup=minuscula(this) pattern=[a-zA-Z0-9*#]{5,12} autocomplete=off required autofocus></td>
						</tr>
						<tr height=40px>
							<td><input style="width:40%; margin-left:30%; text-align:center; height:35px; font-size:30px" name=clave		maxlength=12 value=primax type=password onkeyup=minuscula(this) pattern=[a-zA-Z0-9*#]{5,12} autocomplete=off required></td>
						</tr>
						<tr height=40px>
							<td><input style=display:none name=terminal value=<?=$terminal; ?>></td>
						</tr>
						<tr height=40px><td colspan=2></td></tr>
						<tr style=background-color:none>
							<td>
								<input style="width:20%; margin-left:40%; text-align:center; height:50px; font-size:24px; color:white; background-color:black; border:0px; cursor:pointer; padding:15px 0px" type=submit value=INGRESAR autofocus>
							</td>
						</tr>
					</table>
				</div>
		  </form>
		</td>
		<td style=text-align:right>
			<a href="https://wa.me/<?=$celular_soporte;?>?text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX.">
			<img src="../common/imagenes/whatsapp.png" style="pointer-events:auto; width:2cm; height:auto">
			</a>
		</td>
  </tr>
	<tr style="background-color:none; height:6%"><td colspan=3></td></tr>
</table>
</body>
</html>
