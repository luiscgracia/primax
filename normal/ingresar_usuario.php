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
  input[type=text]:hover			{overflow:visible; font-size:100%; background-color:rgba(255,112,0,1); color:rgba(0,0,0,1)}
  input[type=password]:hover	{overflow:visible; font-size:100%; background-color:rgba(255,112,0,1); color:rgba(0,0,0,1)}
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
<table style="background-color:none" height=100% width=100% border=0>
	<tr><td width=10%></td><td width=80%></td><td width=10%></td></tr>
	<tr style="background-color:none; height:6%"><td colspan=3></td></tr>
  <tr style="background-color:rgba(0,240,0,0); height:88%; vertical-align:middle">
		<td style="vertical-align:middle">
			<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
			<img style="width:2cm; height:auto; pointer-events:auto" src="../common/imagenes/pedidos.svg" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>">
			</a>
		</td>
		<td style="width:100%; text-align:center; vertical-align:middle">
			<span style="font-size:50px">INGRESAR USUARIO</span><br>
			<span style="font-size:36px; font-family:Arlrdlt">TERMINAL <? echo strtoupper($terminal); ?></span><br>
		  <form action="verificar_usuario.php" method="post" style="text-align:center; background-color:rgba(255,0,0,0.0)">
				<div style="position:reletive; width:100%; top:50px; left:0%; margin-left:0%; background-color:rgba(0,0,255,0)">
					<table style=width:100% border=0>
						<tr height=30px>
							<td width=10%></td>
							<td width=10%></td>
							<td width=30%></td>
							<td width=30%></td>
							<td width=10%></td>
							<td width=10%></td>
						</tr>
						<tr>
							<td colspan=2></td>
							<td colspan=1 style="background-color:none; text-align:right"><input style="width:100%; text-align:right; height:35px; font-size:30px" name=usuario maxlength=12 value=primax onkeyup=minuscula(this) pattern=[a-zA-Z]{1,12} autocomplete=off required autofocus></td>
							<td colspan=1 style="background-color:none; font-family:Arlrdbd; font-size:30px">@primax.com.co</td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td colspan=2></td>
							<td colspan=1><input style="width:100%; height:35px; font-size:30px" name=clave maxlength=12 value=primax type=password onkeyup=minuscula(this) pattern=[a-zA-Z0-9*#]{5,12} autocomplete=off required></td>
							<td colspan=1></td>
							<td colspan=2></td>
						</tr>
						<tr>
							<td colspan=2></td>
							<td colspan=1><input style=display:none name=terminal value=<? echo $terminal; ?>></td>
							<td colspan=1></td>
							<td colspan=2></td>
						</tr>
						<tr height=120px><td></td></tr>
						<tr style=background-color:none>
							<td colspan=2></td>
							<td colspan=2 style="text-align:center">
								<input style="width:100%; height:50px; font-size:24px; color:white; background-color:black; border:0px; text-align:center; cursor:pointer; padding:15px 0px" type=submit value=VERIFICAR autofocus>
							</td>
							<td colspan=2></td>
						</tr>
					</table>
				</div>
		  </form>
		</td>
		<td style="text-align:right; vertical-align:middle">
			<a href="https://wa.me/<? echo $celular_soporte; ?>?text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>le escribo de PRIMAX.">
			<img src="../common/imagenes/whatsapp.png" style="pointer-events:auto; width:2cm; height:auto">
			</a>
		</td>
  </tr>
	<tr style="background-color:none; height:6%"><td colspan=3></td></tr>
</table>
</body>
</html>
