<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel='stylesheet' type='text/css' href='../../../../../common/css/fuentes.css'>
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<meta http-equiv='content-type' content='text/html;charset=utf-8'>
<title>Anular informacion</title>
<style>
	body {font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1)}
	input	{display:none; background-color:rgba(0,0,0,0); border:0px}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
</script>
</head>
<?php
	$formato = basename(dirname(__FILE__));
	$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
	$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
	date_default_timezone_set('America/Bogota');
	$fechahoy = date("Y-m-d / g:i A");
	$fechamin = date("Y-m-d", strtotime("-1 days", strtotime(date("Y-m-d"))));
	$fechamax = date("Y-m-d", strtotime("-0 days", strtotime(date("Y-m-d"))));
	include ('../../../../../common/datos.php');
?>
<body>
<div class="zoom">
<div class="noimprimir">
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:2112px; background-color: rgba(255,255,255,0.95); overflow:hidden; border:0px solid rgba(0,0,0,0.25)">
	<div style="position:absolute; left:0px; top:	  0px"><img src="<? echo $tiro; ?>" width=816px height=auto></div>
	<div style="position:absolute; left:0px; top:	  0px"><img src="../../../../../common/formatos_SVG/anulado.svg" width=816px height=auto></div>
	<div style="position:absolute; left:0px; top:	  0px"><img src="../../../../../common/formatos_SVG/anulado_consecutivo.svg" width=816px height=auto></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" width=816px height=auto></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="../../../../../common/formatos_SVG/anulado.svg" width=816px height=auto></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.50cm; top:0.925cm">
		<input style="display:inline; width:16mm; font-family:SCHLBKB; font-size:16px; color:red; background-color:rgba(0,0,0,0); border:0" id="consecutivo" name="consecutivo" type="text"
		value="<? if ($row[0] <= 9) {echo '000';} else {if ($row[0] <= 99) {echo '00';} else {if ($row[0] <= 999) {echo '0';}}} echo $row[0]; ?>" readonly>
	</div>
	<div style="position:absolute; left:17.50cm; top:0.4cm">
		<input style="display:inline; width:25mm; font-family:SCHLBKB; font-size:16px; color:red; background-color:rgba(0,0,0,0); border:0" id="estado" name="estado" type="text"
		value="ANULADO" readonly>
	</div>
	<div style="position:absolute; left:17.50cm; top:0cm"><? echo strtoupper($terminal); ?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:270.6mm; width:816px">
		<div style="position:absolute; left:20mm">
			<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha primer diligenciamiento: <? echo $row['fecha']; ?></span>
			<input style="display:none; border:0" type="text" id="fecha" name="fecha" value="$row['fecha']">
		</div>
	</div>
	<div style="position:absolute; left:50%; margin-left:-408px; top:270.6mm; width:816px">
		<div style="position:absolute; left:169.0mm">
			<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha edición: <? echo $fechahoy; ?></span>
		</div>
	</div>
	<div style="position:absolute; right:50%; margin-right:93.0mm; top:150mm; width:11mm; height:68mm; background-color:rgba(255,255,255,1); border-radius:3px; display:flex; justify-content:center; align-items:center">
		<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>"></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-408px; top:271mm; width:102.5mm; text-align:right; background-color:rgba(0,0,255,0)">
		<img style="width:auto; height:25px; pointer-events:auto" src="../../../../../common/imagenes/editar.png">
	</div>
	<div style="position:absolute; left:50%; margin-left:-47px; top:271mm; width:102.5mm">
		<input style="display:block; height:25px; width:25px; background-color:rgba(0,0,0,0); cursor:pointer" type="submit" name="anulado" value=""
		 title="Anular la información en la base de datos">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:271mm; width:102.5mm; text-align:left; background-color:rgba(255,0,0,0)">
	<a href="javascript:closed();"><img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="auto" height="25" title="Cerrar este formato sin modificarlo."></a>
	</div>
</div>
</div> <!-- cierre <div class="noimprimir"> -->
</div> <!-- cierre <div class="zoom"> -->
<script type="text/javascript"'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
