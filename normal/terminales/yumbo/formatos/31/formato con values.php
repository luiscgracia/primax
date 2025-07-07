<!DOCTYPE html>
<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<title>Diligenciar Consecutivo</title>
<style>
	input[type="timeG"]::-webkit-calendar-picker-indicator {display:none}
	input[type="dateG"]::-webkit-calendar-picker-indicator {display:none}
	.product {background-color:rgba(255,112,0,0.33); color:rgba(0,0,0,1); border-radius:0px; cursor:pointer; font-family:Arial; font-size: 7px}
	select.estado				{width:0.95cm; height:0.25cm; font-family:Arial; color:rgba(0,0,191,1); font-size:7px; text-align:center; border-radius:0}
	select.dispositivo	{width:2.10cm; height:0.29cm; font-family:Arlrdlt; color:rgba(0,0,191,1); font-size:10px; text-align:center; border-radius:0}
	select {-moz-appearance:none; -webkit-appearance:none; -ms-appearance:none; -o-appearance:none; appearance:none; text-indent:0.01px; text-overflow:''}
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
	function launchFullScreen(element) {
		if(element.requestFullScreen) {element.requestFullScreen()}
			else if(element.mozRequestFullScreen) {element.mozRequestFullScreen()}
				else if(element.webkitRequestFullScreen) {element.webkitRequestFullScreen()}}
	function cancelFullScreen() {
		if(document.cancelFullScreen) {document.cancelFullScreen()}
			else if(document.mozCancelFullScreen) {document.mozCancelFullScreen()}
				else if(document.webkitCancelFullScreen) {document.webkitCancelFullScreen()}}
	function u()	{document.getElementById("usuario").value = document.getElementById("usuario1").value;}
</script>
<body style="font-size:10px; font-family:Arial">
<?
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
	$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
	$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
	$cons = "SELECT MAX(consecutivo) as consecutivo FROM formulario".$formato." LIMIT 1";
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
	include ("consecutivos".$formato.".php");
	include ("../../conectar_db.php");
	include ("../../../../../common/conectar_db_usuarios.php");
	include ("../../../../usuarios.php");
	include ("../../../../../common/datos.php");
?>
<div class="zoom">
<div class="noimprimir">
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->	
<form id="formato" name="formato" method="post" action="grabardatos.php" enctype="application_x-www-form-urlencoded" autocomplete="off">
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:2112px; overflow:hidden; border:0px solid rgba(0,0,0,0.25)">
	<div style="position:absolute; left:43%; top:1mm; z-index:9">
		<button onclick="launchFullScreen(document.documentElement)">
			<img src="../../../../../common/imagenes/pantalla_completa1.png" style="pointer-events:auto" width="25px" height="auto"; title="Pantalla completa">
		</button>
		<button onclick="cancelFullScreen()">
			<img src="../../../../../common/imagenes/esc-key.png" style="pointer-events:auto" width="20px" height="auto"; title="Salir de pantalla completa">
		</button>
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0px; top:	  0px"><img src="<? echo $tiro; ?>"		width="816px" height="auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" width="816px" height="auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<?php
	//se conecta a la base de datos y se verifica el consecutivo inicial (o el siguiente libre)
	$consult = $conexion->query($cons);
	$consulta = $consult->fetch_array(MYSQLI_ASSOC);
	$consec = (empty($consulta['consecutivo']) ? $primerconsecutivo : $consulta['consecutivo']+=1);
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
	$fechaactual = date("Y-m-d");
	$horaactual = date("g:i A");
	$fechamin = date ("Y-m-d", strtotime("-0 days", strtotime(date ("Y-m-d"))));
	$fechamax = date ("Y-m-d", strtotime("+0 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,60000); document.body.innerHTML = '$aviso_pedido';</script>";}
	?>

	<!-- div para subir/bajar formato el formato -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:0.00mm; width:816px; height:2112px; overflow:hidden">
	
	<!-- se inicia el código para diligenciar el formato -->
	<div style="position:absolute; left:18.15cm; top:1.00cm">
		<input class=consecutivo style="width:22mm; text-align:left; background-color:rgba(0,0,255,0)" id=consecutivo name=consecutivo type=text
		value="<?
		if ($consec <= 9) {echo "&#8470; 00000";}
			else {if ($consec <= 99) {echo "&#8470; 0000";}
				else {if ($consec <= 999) {echo "&#8470; 000";}
					else {if ($consec <= 9999) {echo "&#8470; 00";}
						else {if ($consec <= 99999) {echo "&#8470; 0";} else {echo "&#8470; ";}}}}}
		echo $consec;
		?>"
		title="A partir del # <? if ($primerconsecutivo <= 9) {echo "000";} else {if ($primerconsecutivo <= 99) {echo "00";} else {if ($primerconsecutivo <= 999) {echo "0";}}}
		echo $primerconsecutivo; ?> hasta el # <? if ($ultimo_consec <= 9) {echo "000";} else {if ($ultimo_consec <= 99) {echo "00";} else {if ($ultimo_consec <= 999) {echo "0";}}}
		echo $ultimo_consec; ?>" readonly>
	</div>

	<div style="position:absolute; left: 18.15cm; top: 0.80cm"><input name=estado type=text style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,1); border:0" value=VIGENTE readonly></div>
	<div style="position:absolute; left: 18.20cm; top: 1.30cm"><span  style="color:rgba(0,0,0,1); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 1.95cm; top: 1.92cm"><input name=fechaA			type=date style=width:2.2cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." autofocus required></div>
	<div style="position:absolute; left: 8.20cm; top: 1.92cm"><input name=horaA				type=time value=<? echo date("H:i"); ?> required></div>
	<div style="position:absolute; left:19.35cm; top: 1.92cm"><input name=certhabilit type=text style="width: 1.0cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888 required></div>
	<div style="position:absolute; left: 4.95cm; top: 2.42cm"><input name=empresaA		type=text	style=width:5.00cm maxlength=30 onkeyup=mayuscula(this) pattern=.{1,} value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left:10.15cm; top: 2.42cm"><input name=nombreA			type=text	style=width:5.00cm maxlength=30 onkeyup=mayuscula(this) pattern=.{1,} value="LUIS CARLOS GRACIA PUENTES ABC" required></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 6.05cm; top: 3.33cm"><input name=descripcion type=text style=width:14.40cm maxlength=90 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left: 6.05cm; top: 3.75cm"><input name=equipos 		type=text style=width:14.40cm maxlength=90 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC" required></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 6.05cm; top: 4.64cm"><input name=ejecutorC 	type=text style=width:5.00cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left: 6.05cm; top: 5.06cm"><input name=inspectorC	type=text style=width:5.00cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.40cm; top: 6.32cm"><input name=hora1D			type=time value=<? echo date("H:i"); ?> required></div>
	<div style="position:absolute; left:10.95cm; top: 6.32cm"><input name=fecha1D			type=date style=width:2.2cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:14.65cm; top: 6.32cm"><input name=hora2D			type=time value=<? echo date("H:i"); ?> required></div>
	<div style="position:absolute; left:17.20cm; top: 6.32cm"><input name=fecha2D			type=date style=width:2.2cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left: 2.70cm; top: 6.84cm"><input name=emisorD			type=text style=width:5.00cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 1.47cm; top: 7.75cm"><input name=EPP_B				type=checkbox checked disabled></div>
	<div style="position:absolute; left:15.45cm; top: 7.80cm"><input name=otrosE 			type=text style=width:5.00cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left: 1.47cm; top: 8.15cm"><input name=EPP_CE			type=checkbox checked required></div>
	<div style="position:absolute; left: 1.47cm; top: 8.55cm"><input name=EPP_AE			type=checkbox checked required></div>
	
<!-- *****************************************			 sección F			 ***************************************** -->
<!-- ******************** AISLAMIENTO ELÉCTRICO ******************** -->
	<div style="position:absolute; left: 5.25cm; top: 9.90cm"><input name=FAE1 id=FAE1	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left: 6.55cm; top: 9.90cm"><input name=FAE1 id=fae1	type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 3.85cm; top:10.45cm"><input name=equiposAE 		type=text style="width:6.50cm; background-color:white" maxlength=45 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRA" required></div>
	<div style="position:absolute; left: 2.58cm; top:10.90cm"><input name=voltajeF id=menor400	type=radio value=-400		onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left: 6.87cm; top:10.90cm"><input name=voltajeF id=menor1000 type=radio value=-1000	onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:10.08cm; top:10.90cm"><input name=voltajeF id=mayor1000	type=radio value=1000		onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:11.65cm"><input name=AE1 id=AE1		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:11.65cm"><input name=AE1 id=ae1		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:12.42cm"><input name=AE2 id=AE2		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:12.42cm"><input name=AE2 id=ae2		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:13.17cm"><input name=AE3 id=AE3		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:13.17cm"><input name=AE3 id=ae3		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:13.88cm"><input name=AE4 id=AE4		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:13.88cm"><input name=AE4 id=ae4		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:14.67cm"><input name=AE5 id=AE5		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:14.67cm"><input name=AE5 id=ae5		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 8.72cm; top:15.62cm"><input name=AE6 id=AE6		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.06cm; top:15.62cm"><input name=AE6 id=ae6		type=radio value=NA onclick=gestionarClickRadio(this)></div>

<!-- ******************** AISLAMIENTO MECÁNICO ********************* -->
	<div style="position:absolute; left:15.15cm; top: 9.90cm"><input name=FAM1 id=FAM1		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:16.45cm; top: 9.90cm"><input name=FAM1 id=fam1		type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:13.75cm; top:10.45cm"><input name=equiposAM 			type=text style="width:6.50cm; background-color:white" maxlength=45 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRA" required></div>
	<div style="position:absolute; left:15.15cm; top:10.90cm"><input name=apequipos id=APE	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:16.45cm; top:10.90cm"><input name=apequipos id=APE	type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:11.65cm"><input name=AM1 id=AM1			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:11.65cm"><input name=AM1 id=am1			type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:12.42cm"><input name=AM2 id=AM2			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:12.42cm"><input name=AM2 id=am2			type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:13.17cm"><input name=AM3 id=AM3			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:13.17cm"><input name=AM3 id=am3			type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:13.97cm"><input name=AM4 id=AM4			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:13.97cm"><input name=AM4 id=am4			type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:14.82cm"><input name=AM5 id=AM5			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:14.82cm"><input name=AM5 id=am5			type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:15.66cm"><input name=AM6 id=AM6			type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:15.66cm"><input name=AM6 id=am6			type=radio value=NA onclick=gestionarClickRadio(this)></div>

	<div style="position:absolute; left:18.62cm; top:16.45cm"><input name=F1 id=F1	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:16.45cm"><input name=F1 id=f1	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:16.95cm"><input name=F2 id=F2	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:16.95cm"><input name=F2 id=f2	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:17.45cm"><input name=F3 id=F3	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:17.45cm"><input name=F3 id=f3	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:17.95cm"><input name=F4 id=F4	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:17.95cm"><input name=F4 id=f4	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:18.45cm"><input name=F5 id=F5	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:18.45cm"><input name=F5 id=f5	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:19.07cm"><input name=F6 id=F6	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:19.07cm"><input name=F6 id=f6	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:19.70cm"><input name=F7 id=F7	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:19.70cm"><input name=F7 id=f7	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:20.20cm"><input name=F8 id=F8	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:20.20cm"><input name=F8 id=f8	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:20.70cm"><input name=F9 id=F9	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:20.70cm"><input name=F9 id=f9	type=radio value=NA onclick=gestionarClickRadio(this)></div>

	<div style="position:absolute; left:18.62cm; top:21.92cm"><input name=F10 id=F10	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:21.92cm"><input name=F10 id=f10	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:22.54cm"><input name=F11 id=F11	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:22.54cm"><input name=F11 id=f11	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:23.05cm"><input name=F12 id=F12	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:23.05cm"><input name=F12 id=f12	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:23.55cm"><input name=F13 id=F13	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:23.55cm"><input name=F13 id=f13	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:24.05cm"><input name=F14 id=F14	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:24.05cm"><input name=F14 id=f14	type=radio value=NA onclick=gestionarClickRadio(this)></div>

<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left: 1.05cm; top:25.80cm"><input name=GA1 		type=text style=width:3.40cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P" required></div>
	<div style="position:absolute; left: 4.60cm; top:25.85cm">SI</div><div style="position:absolute; left: 4.75cm; top:25.75cm"><input name=GB1 id=GB1	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left: 5.43cm; top:25.85cm">NO</div><div style="position:absolute; left: 5.75cm; top:25.75cm"><input name=GB1 id=gb1	type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 6.25cm; top:25.80cm"><input name=GC1 		type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P" required></div>
	<div style="position:absolute; left: 9.24cm; top:25.80cm"><input name=GD1			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:10.73cm; top:25.80cm"><input name=GE1			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?> required></div>
	<div style="position:absolute; left:12.18cm; top:25.80cm"><input name=GF1 		type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P" required></div>
	<div style="position:absolute; left:15.18cm; top:25.80cm"><input name=GG1			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:16.67cm; top:25.80cm"><input name=GH1			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?> required></div>
	<div style="position:absolute; left:18.42cm; top:25.85cm">SI</div><div style="position:absolute; left:18.57cm; top:25.75cm"><input name=GI1 id=GI1	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.50cm; top:25.85cm">NO</div><div style="position:absolute; left:19.82cm; top:25.75cm"><input name=GI1 id=gi1	type=radio value=NO onclick=gestionarClickRadio(this)></div>

	<div style="position:absolute; left: 1.05cm; top:26.19cm"><input name=GA2			type=text style=width:3.40cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left: 4.60cm; top:26.24cm">SI</div><div style="position:absolute; left: 4.75cm; top:26.14cm"><input name=GB2 id=GB2	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left: 5.43cm; top:26.24cm">NO</div><div style="position:absolute; left: 5.75cm; top:26.14cm"><input name=GB2 id=gb2	type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 6.25cm; top:26.19cm"><input name=GC2			type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left: 9.24cm; top:26.19cm"><input name=GD2			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:10.73cm; top:26.19cm"><input name=GE2			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?>></div>
	<div style="position:absolute; left:12.18cm; top:26.19cm"><input name=GF2			type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left:15.18cm; top:26.19cm"><input name=GG2			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.67cm; top:26.19cm"><input name=GH2			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?>></div>
	<div style="position:absolute; left:18.42cm; top:26.24cm">SI</div><div style="position:absolute; left:18.57cm; top:26.14cm"><input name=GI2 id=GI2	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.50cm; top:26.24cm">NO</div><div style="position:absolute; left:19.82cm; top:26.14cm"><input name=GI2 id=gi2	type=radio value=NO onclick=gestionarClickRadio(this)></div>

	<div style="position:absolute; left: 1.05cm; top:26.59cm"><input name=GA3			type=text style=width:3.40cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left: 4.60cm; top:26.64cm">SI</div><div style="position:absolute; left: 4.75cm; top:26.54cm"><input name=GB3 id=GB3	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left: 5.43cm; top:26.64cm">NO</div><div style="position:absolute; left: 5.75cm; top:26.54cm"><input name=GB3 id=gb3	type=radio value=NO onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 6.25cm; top:26.59cm"><input name=GC3			type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left: 9.24cm; top:26.59cm"><input name=GD3			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:10.73cm; top:26.59cm"><input name=GE3			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?>></div>
	<div style="position:absolute; left:12.18cm; top:26.59cm"><input name=GF3			type=text style=width:2.90cm maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA P"></div>
	<div style="position:absolute; left:15.18cm; top:26.59cm"><input name=GG3			type=date style=width:1.45cm min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.67cm; top:26.59cm"><input name=GH3			type=time style="width:1.45cm; font-size:10px" value=<? echo date("H:i"); ?>></div>
	<div style="position:absolute; left:18.42cm; top:26.64cm">SI</div><div style="position:absolute; left:18.57cm; top:26.54cm"><input name=GI3 id=GI3	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.50cm; top:26.64cm">NO</div><div style="position:absolute; left:19.82cm; top:26.54cm"><input name=GI3 id=gi3	type=radio value=NO onclick=gestionarClickRadio(this)></div>

<!-- *****************************************			 empieza el RETIRO			 ***************************************** -->
<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left:10.77cm; top:29.43cm"><input name=H1	type=text style=width:09.62cm maxlength= 60 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC"></div>
	<div style="position:absolute; left:10.77cm; top:29.83cm"><input name=H2	type=text style=width:09.62cm maxlength= 60 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC"></div>
	<div style="position:absolute; left:10.77cm; top:30.23cm"><input name=H3 type=text style="width:40%; text-align:center" maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value=88.88 required></div>
	<div style="position:absolute; left:10.77cm; top:30.63cm"><input name=H4 type=text style="width:40%; text-align:center" maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value=88.88 required></div>
	<div style="position:absolute; left:10.77cm; top:31.03cm"><input name=H5	type=text style=width:09.62cm maxlength= 60 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC"></div>
	<div style="position:absolute; left: 3.84cm; top:31.43cm"><input name=H6	type=text style=width:16.58cm maxlength=100 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLO"></div>
	<div style="position:absolute; left:18.62cm; top:31.90cm"><input name=H7	id=H7		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:31.90cm"><input name=H7	id=h7		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:32.30cm"><input name=H8	id=H8		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:32.30cm"><input name=H8	id=h8		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:32.70cm"><input name=H9	id=H9		type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:32.70cm"><input name=H9	id=h9		type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:33.10cm"><input name=H10 id=H10	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:33.10cm"><input name=H10 id=h10	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:33.50cm"><input name=H11 id=H11	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:33.50cm"><input name=H11 id=h11	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:33.90cm"><input name=H12 id=H12	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:33.90cm"><input name=H12 id=h12	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:34.30cm"><input name=H13 id=H13	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:34.30cm"><input name=H13 id=h13	type=radio value=NA onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:18.62cm; top:34.70cm"><input name=H14 id=H14	type=radio value=SI onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:19.96cm; top:34.70cm"><input name=H14 id=h14	type=radio value=NA onclick=gestionarClickRadio(this)></div>

<!-- *****************************************			 sección I			 ***************************************** -->
	<div style="position:absolute; left:19.35cm; top:35.73cm"><input name=cuadro type=text style="width: 1.0cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888 required></div>
	<div style="position:absolute; left: 3.65cm; top:36.20cm"><input name=descripcionI type=text style=width:8.70cm maxlength=60 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left:14.77cm; top:36.20cm"><input name=autorizadoI	 type=text style=width:5.00cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>

	<div style="position:absolute; left: 1.05cm; top:37.18cm"><input name=IA1 value=1 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:37.09cm"><input name=IB1 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:37.08cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
					<select name=IC1 type=text class=estado required>
						<option value="" disabled selected></option>
						<option value="A" selected>ABIERTO</option>
						<option value="C">CERRADO</option>
						<option value="E">AISLADO ELÉCTRICAMENTE</option>
						<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
						<option value="O">OTRO (espefificar)</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:37.09cm"><input name=ID1 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:37.09cm"><input name=IE1 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:37.09cm"><input name=IF1 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:37.13cm">
		<select name=IG1 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:37.18cm"><input name=IH1 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:37.18cm"><input name=II1 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:37.18cm"><input name=IJ1 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:37.18cm"><input name=IK1	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:37.18cm"><input name=IL1 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:37.18cm"><input name=IM1	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:37.48cm"><input name=IA2 value=2 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:37.39cm"><input name=IB2 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:37.38cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC2 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:37.39cm"><input name=ID2 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:37.39cm"><input name=IE2 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:37.39cm"><input name=IF2 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:37.43cm">
		<select name=IG2 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:37.48cm"><input name=IH2 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:37.48cm"><input name=II2 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:37.48cm"><input name=IJ2 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:37.48cm"><input name=IK2	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:37.48cm"><input name=IL2 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:37.48cm"><input name=IM2	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:37.78cm"><input name=IA3 value=3 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:37.69cm"><input name=IB3 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:37.68cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
					<select name=IC3 type=text class=estado required>
						<option value="" disabled selected></option>
						<option value="A" selected>ABIERTO</option>
						<option value="C">CERRADO</option>
						<option value="E">AISLADO ELÉCTRICAMENTE</option>
						<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
						<option value="O">OTRO (espefificar)</option>
					</select>
			</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:37.69cm"><input name=ID3 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:37.69cm"><input name=IE3 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:37.69cm"><input name=IF3 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:37.73cm">
		<select name=IG3 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:37.78cm"><input name=IH3 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:37.78cm"><input name=II3 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:37.78cm"><input name=IJ3 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:37.78cm"><input name=IK3	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:37.78cm"><input name=IL3 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:37.78cm"><input name=IM3	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:38.08cm"><input name=IA4 value=4 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:37.99cm"><input name=IB4 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:37.98cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC4 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:37.99cm"><input name=ID4 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:37.99cm"><input name=IE4 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:37.99cm"><input name=IF4 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:38.03cm">
		<select name=IG4 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:38.08cm"><input name=IH4 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:38.08cm"><input name=II4 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:38.08cm"><input name=IJ4 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:38.08cm"><input name=IK4	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:38.08cm"><input name=IL4 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:38.08cm"><input name=IM4	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:38.38cm"><input name=IA5 value=5 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:38.29cm"><input name=IB5 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:38.28cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC5 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:38.29cm"><input name=ID5 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:38.29cm"><input name=IE5 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:38.29cm"><input name=IF5 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:38.33cm">
		<select name=IG5 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:38.38cm"><input name=IH5 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:38.38cm"><input name=II5 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:38.38cm"><input name=IJ5 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:38.38cm"><input name=IK5	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:38.38cm"><input name=IL5 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:38.38cm"><input name=IM5	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:38.68cm"><input name=IA6 value=6 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:38.59cm"><input name=IB6 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:38.58cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC6 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:38.59cm"><input name=ID6 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:38.59cm"><input name=IE6 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:38.59cm"><input name=IF6 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:38.63cm">
		<select name=IG6 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:38.68cm"><input name=IH6 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:38.68cm"><input name=II6 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:38.68cm"><input name=IJ6 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:38.68cm"><input name=IK6	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:38.68cm"><input name=IL6 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:38.68cm"><input name=IM6	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:38.98cm"><input name=IA7 value=7 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:38.89cm"><input name=IB7 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:38.88cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC7 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:38.89cm"><input name=ID7 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:38.89cm"><input name=IE7 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:38.89cm"><input name=IF7 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:38.93cm">
		<select name=IG7 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:38.98cm"><input name=IH7 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:38.98cm"><input name=II7 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:38.98cm"><input name=IJ7 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:38.98cm"><input name=IK7	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:38.98cm"><input name=IL7 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:38.98cm"><input name=IM7	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:39.28cm"><input name=IA8 value=8 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:39.19cm"><input name=IB8 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:39.18cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC8 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:39.19cm"><input name=ID8 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:39.19cm"><input name=IE8 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:39.19cm"><input name=IF8 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:39.23cm">
		<select name=IG8 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:39.28cm"><input name=IH8 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:39.28cm"><input name=II8 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:39.28cm"><input name=IJ8 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:39.28cm"><input name=IK8	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:39.28cm"><input name=IL8 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:39.28cm"><input name=IM8	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:39.58cm"><input name=IA9 value=9 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=1 placeholder=# pattern=^(?:[1-9]{1,1})$></div>
	<div style="position:absolute; left: 2.18cm; top:39.49cm"><input name=IB9 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:39.48cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC9 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:39.49cm"><input name=ID9 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:39.49cm"><input name=IE9 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:39.49cm"><input name=IF9 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:39.53cm">
		<select name=IG9 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:39.58cm"><input name=IH9 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:39.58cm"><input name=II9 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:39.58cm"><input name=IJ9 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:39.58cm"><input name=IK9	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:39.58cm"><input name=IL9 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:39.58cm"><input name=IM9	type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:39.88cm"><input name=IA10 value=10 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:39.79cm"><input name=IB10 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:39.78cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC10 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:39.79cm"><input name=ID10 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:39.79cm"><input name=IE10 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:39.79cm"><input name=IF10 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:39.83cm">
		<select name=IG10 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:39.88cm"><input name=IH10 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:39.88cm"><input name=II10 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:39.88cm"><input name=IJ10 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:39.88cm"><input name=IK10 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:39.88cm"><input name=IL10 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:39.88cm"><input name=IM10 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:40.18cm"><input name=IA11 value=11 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:40.09cm"><input name=IB11 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:40.08cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC11 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:40.09cm"><input name=ID11 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:40.09cm"><input name=IE11 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:40.09cm"><input name=IF11 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:40.13cm">
		<select name=IG11 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:40.18cm"><input name=IH11 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:40.18cm"><input name=II11 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:40.18cm"><input name=IJ11 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:40.18cm"><input name=IK11 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:40.18cm"><input name=IL11 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:40.18cm"><input name=IM11 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:40.48cm"><input name=IA12 value=12 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:40.39cm"><input name=IB12 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:40.38cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC12 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:40.39cm"><input name=ID12 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:40.39cm"><input name=IE12 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:40.39cm"><input name=IF12 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:40.43cm">
		<select name=IG12 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:40.48cm"><input name=IH12 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:40.48cm"><input name=II12 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:40.48cm"><input name=IJ12 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:40.48cm"><input name=IK12 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:40.48cm"><input name=IL12 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:40.48cm"><input name=IM12 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:40.78cm"><input name=IA13 value=13 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:40.69cm"><input name=IB13 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:40.68cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC13 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:40.69cm"><input name=ID13 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:40.69cm"><input name=IE13 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:40.69cm"><input name=IF13 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:40.73cm">
		<select name=IG13 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:40.78cm"><input name=IH13 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:40.78cm"><input name=II13 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:40.78cm"><input name=IJ13 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:40.78cm"><input name=IK13 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:40.78cm"><input name=IL13 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:40.78cm"><input name=IM13 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:41.08cm"><input name=IA14 value=14 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:40.99cm"><input name=IB14 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:40.98cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC14 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:40.99cm"><input name=ID14 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:40.99cm"><input name=IE14 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:40.99cm"><input name=IF14 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:41.03cm">
		<select name=IG14 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:41.08cm"><input name=IH14 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:41.08cm"><input name=II14 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:41.08cm"><input name=IJ14 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:41.08cm"><input name=IK14 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:41.08cm"><input name=IL14 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:41.08cm"><input name=IM14 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:41.38cm"><input name=IA15 value=15 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:41.29cm"><input name=IB15 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:41.28cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC15 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:41.29cm"><input name=ID15 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:41.29cm"><input name=IE15 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:41.29cm"><input name=IF15 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:41.33cm">
		<select name=IG15 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:41.38cm"><input name=IH15 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:41.38cm"><input name=II15 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:41.38cm"><input name=IJ15 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:41.38cm"><input name=IK15 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:41.38cm"><input name=IL15 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:41.38cm"><input name=IM15 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:41.68cm"><input name=IA16 value=16 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:41.59cm"><input name=IB16 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:41.58cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC16 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:41.59cm"><input name=ID16 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:41.59cm"><input name=IE16 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:41.59cm"><input name=IF16 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:41.63cm">
		<select name=IG16 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:41.68cm"><input name=IH16 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:41.68cm"><input name=II16 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:41.68cm"><input name=IJ16 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:41.68cm"><input name=IK16 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:41.68cm"><input name=IL16 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:41.68cm"><input name=IM16 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:41.98cm"><input name=IA17 value=17 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:41.89cm"><input name=IB17 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:41.88cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC17 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:41.89cm"><input name=ID17 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:41.89cm"><input name=IE17 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:41.89cm"><input name=IF17 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:41.93cm">
		<select name=IG17 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:41.98cm"><input name=IH17 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:41.98cm"><input name=II17 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:41.98cm"><input name=IJ17 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:41.98cm"><input name=IK17 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:41.98cm"><input name=IL17 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:41.98cm"><input name=IM17 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:42.28cm"><input name=IA18 value=18 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:42.19cm"><input name=IB18 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:42.18cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC18 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:42.19cm"><input name=ID18 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:42.19cm"><input name=IE18 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:42.19cm"><input name=IF18 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:42.23cm">
		<select name=IG18 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:42.28cm"><input name=IH18 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:42.28cm"><input name=II18 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:42.28cm"><input name=IJ18 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:42.28cm"><input name=IK18 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:42.28cm"><input name=IL18 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:42.28cm"><input name=IM18 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:42.58cm"><input name=IA19 value=19 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:42.49cm"><input name=IB19 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:42.48cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC19 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:42.49cm"><input name=ID19 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:42.49cm"><input name=IE19 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:42.49cm"><input name=IF19 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:42.53cm">
		<select name=IG19 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:42.58cm"><input name=IH19 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:42.58cm"><input name=II19 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:42.58cm"><input name=IJ19 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:42.58cm"><input name=IK19 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:42.58cm"><input name=IL19 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:42.58cm"><input name=IM19 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:42.88cm"><input name=IA20 value=20 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:42.79cm"><input name=IB20 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:42.78cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC20 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:42.79cm"><input name=ID20 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:42.79cm"><input name=IE20 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:42.79cm"><input name=IF20 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:42.83cm">
		<select name=IG20 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:42.88cm"><input name=IH20 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:42.88cm"><input name=II20 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:42.88cm"><input name=IJ20 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:42.88cm"><input name=IK20 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:42.88cm"><input name=IL20 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:42.88cm"><input name=IM20 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:43.18cm"><input name=IA21 value=21 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:43.09cm"><input name=IB21 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:43.08cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC21 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:43.09cm"><input name=ID21 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:43.09cm"><input name=IE21 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:43.09cm"><input name=IF21 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:43.13cm">
		<select name=IG21 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:43.18cm"><input name=IH21 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:43.18cm"><input name=II21 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:43.18cm"><input name=IJ21 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:43.18cm"><input name=IK21 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:43.18cm"><input name=IL21 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:43.18cm"><input name=IM21 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:43.48cm"><input name=IA22 value=22 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:43.39cm"><input name=IB22 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:43.38cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC22 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:43.39cm"><input name=ID22 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:43.39cm"><input name=IE22 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:43.39cm"><input name=IF22 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:43.43cm">
		<select name=IG22 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:43.48cm"><input name=IH22 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:43.48cm"><input name=II22 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:43.48cm"><input name=IJ22 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:43.48cm"><input name=IK22 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:43.48cm"><input name=IL22 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:43.48cm"><input name=IM22 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:43.78cm"><input name=IA23 value=23 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:43.69cm"><input name=IB23 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:43.68cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC23 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:43.69cm"><input name=ID23 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:43.69cm"><input name=IE23 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:43.69cm"><input name=IF23 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:43.73cm">
		<select name=IG23 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:43.78cm"><input name=IH23 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:43.78cm"><input name=II23 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:43.78cm"><input name=IJ23 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:43.78cm"><input name=IK23 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:43.78cm"><input name=IL23 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:43.78cm"><input name=IM23 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

	<div style="position:absolute; left: 1.05cm; top:44.08cm"><input name=IA24 value=24 type=text style="width: 0.75cm; height:0.20cm; text-align:center" maxlength=2 placeholder=## pattern=^(?:[0-9]{1,2})$></div>
	<div style="position:absolute; left: 2.18cm; top:43.99cm"><input name=IB24 type=checkbox checked></div>
	<div style="position:absolute; left: 2.92cm; top:43.98cm">
		<table>
			<tr style="background-color:rgba(255,255,255,0); height:0.15cm">
				<td style=text-align:center>
						<select name=IC24 type=text class=estado required>
							<option value="" disabled selected></option>
							<option value="A" selected>ABIERTO</option>
							<option value="C">CERRADO</option>
							<option value="E">AISLADO ELÉCTRICAMENTE</option>
							<option value="D">DESCONECTADO (Brida Ciega / Ciego de Paleta)</option>
							<option value="O">OTRO (espefificar)</option>
						</select>
				</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 4.28cm; top:43.99cm"><input name=ID24 type=checkbox checked></div>
	<div style="position:absolute; left: 5.70cm; top:43.99cm"><input name=IE24 type=checkbox checked></div>
	<div style="position:absolute; left: 7.00cm; top:43.99cm"><input name=IF24 type=checkbox checked></div>
	<div style="position:absolute; left: 7.75cm; top:44.03cm">
		<select name=IG24 class=dispositivo required>
			<option value="" disabled selected></option>
			<option value="ELÉCTRICO" selected>ELÉCTRICO</option>
			<option value="VÁLVULA">		VÁLVULA			</option>
			<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
			<option value="OTRO">				OTRO				</option>
		</select>
	</div>
	<div style="position:absolute; left: 9.90cm; top:44.08cm"><input name=IH24 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:12.08cm; top:44.08cm"><input name=II24 type=text style="width:1.00cm; height:0.22cm; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ title="Debe ingresar mínimo 4 números." value=888888></div>
	<div style="position:absolute; left:13.26cm; top:44.08cm"><input name=IJ24 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:15.37cm; top:44.08cm"><input name=IK24 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>
	<div style="position:absolute; left:16.93cm; top:44.08cm"><input name=IL24 type=text style="width:2.00cm; height:0.22cm" maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRA"></div>
	<div style="position:absolute; left:18.97cm; top:44.08cm"><input name=IM24 type=date style="width:1.53cm; height:0.27cm" min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." ></div>

<!-- *****************************************			 sección J			 ***************************************** -->

<!-- *****************************************			 sección K			 ***************************************** -->
	<div style="position:absolute; left: 6.48cm; top:52.36cm"><input name=certificadoK	id=CRTK type=radio value=A onclick=gestionarClickRadio(this) checked required></div>
	<div style="position:absolute; left:10.35cm; top:52.36cm"><input name=certificadoK	id=crtK type=radio value=B onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left:14.19cm; top:52.36cm"><input name=certificadoK	id=krtK type=radio value=C onclick=gestionarClickRadio(this)></div>
	<div style="position:absolute; left: 6.10cm; top:53.23cm"><input name=ejecutorK			type=text	style=width:5cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.23cm"><input name=horaejecK			type=time	value=<? echo date("H:i"); ?> required></div> -->
	<div style="position:absolute; left: 6.10cm; top:53.63cm"><input name=inspectorK		type=text	style=width:5cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.63cm"><input name=horainspK			type=time	value=<? echo date("H:i"); ?> required></div> -->
	<div style="position:absolute; left: 3.45cm; top:54.53cm"><input name=emisorK				type=text	style=width:5cm maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></div>
	<div style="position:absolute; left:18.90cm; top:54.53cm"><input name=horaemisorK		type=time	value=<? echo date("H:i"); ?> required></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:27.00cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type=text id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:270mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:20mm; top:54.94cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-5mm; top:54.94cm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:54.94cm; width:107.5mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.50cm; top:54.99cm"><input name="usuario" id="usuario" type=text style="font-size:10px; width:222px; color:rgba(255,0,0,0); background-color:rgba(0,0,0,0); border:0px" ></div>
	<div style="position:absolute; left:14.40cm; top:54.94cm">
		<table>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td style="text-align:center">
					<form method="post">
						<select name="usuario1" id="usuario1" type=text onfocusout="u()" required>
							<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
							<option style="<? if ($numero_usuarios <= 0) {echo 'display:none';} ?>" value="<? echo $usuario[0]; ?>"><? echo $usuario[0]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 1) {echo 'display:none';} ?>" value="<? echo $usuario[1]; ?>"><? echo $usuario[1]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 2) {echo 'display:none';} ?>" value="<? echo $usuario[2]; ?>"><? echo $usuario[2]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 3) {echo 'display:none';} ?>" value="<? echo $usuario[3]; ?>"><? echo $usuario[3]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 4) {echo 'display:none';} ?>" value="<? echo $usuario[4]; ?>"><? echo $usuario[4]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 5) {echo 'display:none';} ?>" value="<? echo $usuario[5]; ?>"><? echo $usuario[5]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 6) {echo 'display:none';} ?>" value="<? echo $usuario[6]; ?>"><? echo $usuario[6]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 7) {echo 'display:none';} ?>" value="<? echo $usuario[7]; ?>"><? echo $usuario[7]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 8) {echo 'display:none';} ?>" value="<? echo $usuario[8]; ?>"><? echo $usuario[8]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 9) {echo 'display:none';} ?>" value="<? echo $usuario[9]; ?>"><? echo $usuario[9]."@primax.com.co"; ?></option>
						</select>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->
<script type="text/javascript">
	//Para distinguir la opción actualmente pulsada en cada grupo
	var pref_opcActual = "opcActual_";
	//Verifica si una variable definida dinámicamente existe o no
	function varExiste(sNombre) {return (eval("typeof(" + sNombre + ");") != "undefined");}
	//Asigna un valor a una variable creada dinámicamente a partir de su nombre
	function asignaVar(sNombre, valor) {eval(sNombre + " = " + valor + ";");}
	//generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos
	for (f= 0; f<document.forms.length; f++) {
		for (i = 0; i< document.forms[f].elements.length; i++) {
			var eltoAct = document.forms[f].elements[i];
			var exprCrearVariable = "";
			if (eltoAct.type == "radio") {
				//Si la variable no existe la definimos siempre,pero sólo la redefinimos en caso de que el elemento actual del grupo esté asignado
				if (!varExiste(pref_opcActual + eltoAct.name) ) exprCrearVariable = "var " + pref_opcActual + eltoAct.name + " = ";
					else exprCrearVariable = pref_opcActual + eltoAct.name + " = ";
				//El valor será nulo o una referencia al radio actual en función de su está seleccionado o no
				if(eltoAct.checked) exprCrearVariable += "document.getElementById('" + eltoAct.id + "')";
					else exprCrearVariable += "null";
				//Definimos la variable y asignamos el valor sólo si no existe o si el radio actual está marcado 
				if ( !varExiste(pref_opcActual + eltoAct.name) || eltoAct.checked) eval(exprCrearVariable);}}}

	function gestionarClickRadio(opcPulsada) {
		//El nombre de la variable que contiene el nombre del grupo actual
		var svarOpcAct = pref_opcActual + opcPulsada.name;
		var opcActual = null;
		opcActual = eval(svarOpcAct);	//recupero dinámicamente una referencia al último radio pulsado de este grupo
			if (opcActual == opcPulsada) {
		opcPulsada.checked = false; //deselecciono
		asignaVar(svarOpcAct, "null");}	//y quito referencia (es como si nunca se hubiera pulsado)
				else {asignaVar(svarOpcAct, "document.getElementById('" + opcPulsada.id + "')");}}	//Anoto la última opción pulsada de este grupo
</script>

<!-- script para css select option -->
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
	selElmnt = x[i].getElementsByTagName("select")[0];
	ll = selElmnt.length;
	/*for each element, create a new DIV that will act as the selected item:*/
	a = document.createElement("DIV");
	a.setAttribute("class", "select-selected");
	a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	x[i].appendChild(a);
	/*for each element, create a new DIV that will contain the option list:*/
	b = document.createElement("DIV");
	b.setAttribute("class", "select-items select-hide");
	for (j = 1; j < ll; j++) {
		/*for each option in the original select element,
		create a new DIV that will act as an option item:*/
		c = document.createElement("DIV");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.addEventListener("click", function(e) {
				/*when an item is clicked, update the original select box,
				and the selected item:*/
				var y, i, k, s, h, sl, yl;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				sl = s.length;
				h = this.parentNode.previousSibling;
				for (i = 0; i < sl; i++) {
					if (s.options[i].innerHTML == this.innerHTML) {
						s.selectedIndex = i;
						h.innerHTML = this.innerHTML;
						y = this.parentNode.getElementsByClassName("same-as-selected");
						yl = y.length;
						for (k = 0; k < yl; k++) {
							y[k].removeAttribute("class");
						}
						this.setAttribute("class", "same-as-selected");
						break;
					}
				}
				h.click();
		});
		b.appendChild(c);
	}
	x[i].appendChild(b);
	a.addEventListener("click", function(e) {
			/*when the select box is clicked, close any other select boxes,
			and open/close the current select box:*/
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
		});
}
function closeAllSelect(elmnt) {
	/*a function that will close all select boxes in the document,
	except the current select box:*/
	var x, y, i, xl, yl, arrNo = [];
	x = document.getElementsByClassName("select-items");
	y = document.getElementsByClassName("select-selected");
	xl = x.length;
	yl = y.length;
	for (i = 0; i < yl; i++) {
		if (elmnt == y[i]) {
			arrNo.push(i)
		} else {
			y[i].classList.remove("select-arrow-active");
		}
	}
	for (i = 0; i < xl; i++) {
		if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
		}
	}
}
/*if the user clicks anywhere outside the select box, then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<!-- *****************************************			 FIN DES-SELECCIONAR INPUT radio			 ***************************************** -->
</div>			<!-- cierre subir/bajar formato-->
</div>			<!-- cierre div 1 hoja PDF formato-->
</form>
</div>			<!-- cierre div no imprimir-->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</div>			<!-- cierre div zoom-->
</body>
</html>
