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
	textarea {line-height:190%; padding: 8 5 0 5}
	input[type="time"]::-webkit-calendar-picker-indicator {display:inline; background-color:rgba(0,0,0,0)}
	select.product {height:3mm; font-family:Arlrdlt; font-size:10px; color:rgba(0,0,191,1); background-color:rgba(255,112,0,0.33); border:0px solid rgba(0,128,0,1); border-radius:3px}
	option.product {color:rgba(0,0,191,1); background-color:rgba(255,112,0,0.33); border-radius:3px}
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
 	function sumar_ecopetrol() {var total = 0; $(".ecopetrol").each(function() {if (isNaN(parseFloat($(this).val()))) {total += 0} else {total += parseFloat($(this).val())}});
	  document.getElementById('total_ecopetrol').innerHTML = total}
</script>
<body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/AlphaGit/ng-pattern-restrict/master/src/ng-pattern-restrict.min.js"></script>
<script type="text/javascript">var app = angular.module('textarea', ['ngPatternRestrict']); app.controller('controller', function ($scope) {})</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
	function t() {document.getElementById("tanque1").value = document.getElementById("tanque").value;}
	function p() {document.getElementById("producto1").value = document.getElementById("producto").value.toUpperCase();}
	function u() {document.getElementById("usuario").value = document.getElementById("usuario1").value;}
  function liquidar() {
	var i2, f2, i4, f4, i8, f8, f10, i11, i13, f16, i5, f5, i9, f9, f14, f15, f17, f18;
		 i2 = document.getElementById("inicial2").value;
		 f2 = document.getElementById("final2").value;
		 i4 = document.getElementById("inicial4").value;
		 f4 = document.getElementById("final4").value;
		 i8 = document.getElementById("inicial8").value;
		 f8 = document.getElementById("final8").value;
		f10 = document.getElementById("final10").value;
		i11 = document.getElementById("inicial11").value;
		i13 = document.getElementById("inicial13").value;
		f16 = document.getElementById("final16").value;

		 i5 = i2 - i4;
		 f5 = f2 - f4;
		 i9 = i5 * i8;
		 f9 = f5 * f8;
		f14 = i11 * i13;
		f15 = -(-f10 - f14);
		f17 = f15 - f16;
		f18 = f17 / f16 * 100;

		document.getElementById("inicial5").value = i5.toFixed(2);
		document.getElementById("final5").value  =  f5.toFixed(2);
		document.getElementById("inicial9").value = i9.toFixed(2);
		document.getElementById("final9").value  =  f9.toFixed(2);
		document.getElementById("final14").value = f14.toFixed(2);
		document.getElementById("final15").value = f15.toFixed(2);
		document.getElementById("final17").value = f17.toFixed(2);
		document.getElementById("final18").value = f18.toFixed(2);
		}
</script>
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
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:2132px; overflow:hidden; border:0px solid rgba(0,0,0,0.25)">
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
	<div style="position:absolute; left:0px; top:	  0px"><img src="<? echo $tiro; ?>" 	width="816px" height="auto"></div>
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
	$fecha_bombeo = date("Y-m-d");
	$hora_bombeo = "00:00";
	$fechamin = date ("Y-m-d", strtotime("-1 days", strtotime(date ("Y-m-d"))));
	$fechamax = date ("Y-m-d", strtotime("+0 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,60000); document.body.innerHTML = '$aviso_pedido';</script>";}
	?>

	<!-- div para subir/bajar formato el formato -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:2.00mm; width:816px; height:2112px; overflow:hidden">

	<!-- se inicia el código para diligenciar el formato -->
	<div style="position:absolute; left:18.80cm; top:1.05cm">
		<input class="consecutivo" style="width:22mm; text-align:left; background-color:rgba(0,0,255,0)" id="consecutivo" name="consecutivo" type="text"
		value="<?
		if ($consec <= 9) {echo "&#8470;00000";}
			else {if ($consec <= 99) {echo "&#8470;0000";}
				else {if ($consec <= 999) {echo "&#8470;000";}
					else {if ($consec <= 9999) {echo "&#8470;00";}
						else {if ($consec <= 99999) {echo "&#8470;0";} else {echo "&#8470;";}}}}}
		echo $consec;
		?>"
		title="A partir del # <? if ($primerconsecutivo <= 9) {echo "000";} else {if ($primerconsecutivo <= 99) {echo "00";} else {if ($primerconsecutivo <= 999) {echo "0";}}}
		echo $primerconsecutivo; ?> hasta el # <? if ($ultimo_consec <= 9) {echo "000";} else {if ($ultimo_consec <= 99) {echo "00";} else {if ($ultimo_consec <= 999) {echo "0";}}}
		echo $ultimo_consec; ?>" readonly>
	</div>

	<div style="position:absolute; left: 18.85cm; top: 0.85cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,1); border:0" readonly></div>
	<div style="position:absolute; left: 18.90cm; top: 1.00cm"><span  style="color:rgba(0,0,0,1); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

	<!-- *****************************************			 entrega tanque			 ***************************************** -->
	<div style="position:absolute; left:10.00cm; top: 1.75cm"><span  style="font-family:Arlrdlt; font-size:10px; color:rgba(0,0,191,1)"><? echo strtoupper($terminal); ?></span></div>
	<div style="position:absolute; left: 2.40cm; top: 2.85cm"><input name="tanque"		id="tanque"		type="text" style="width:1.50cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$"	onkeyup="mayuscula(this); t()" required autofocus></div>
	<div style="position:absolute; left: 0.70cm; top: 3.15cm">
		<table>
			<tr style="background-color:rgba(0,240,0,0)">
				<td style="text-align:center">
				<form method="post">
					<select style="width:165px" name="producto" id="producto" type="text" onclick="p()" onkeyup="p()" class="product" required>
						<option value="" disabled="disabled" selected="true"></option>
						<option value="GASOLINA EXTRA OXIGENADA">GASOLINA EXTRA OXIGENADA</option>
						<option value="PRODUCTO 2 XX PRODUCTO 2">PRODUCTO 2</option>
						<option value="PRODUCTO 3 XX PRODUCTO 3">PRODUCTO 3</option>
						<option value="PRODUCTO 4 XX PRODUCTO 4">PRODUCTO 4</option>
						<option value="PRODUCTO 5 XX PRODUCTO 5">PRODUCTO 5</option>
					</select>
				</form>
			</td>
			</tr>
		</table>
	</div>
	<div style="position:absolute; left: 6.30cm; top: 3.55cm"><input name="fechaA"				type="date"	style="width: 2.00cm" value="<?echo $fechaactual;?>" required></div>
	<div style="position:absolute; left:10.50cm; top: 3.55cm"><input name="horaentrega"		type="time" style="width: 1.50cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:17.50cm; top: 2.85cm"><input name="capacidad"			type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:17.50cm; top: 3.55cm"><input name="nivel_llenado"	type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>

	<!-- *****************************************			 medicion automatica			 ***************************************** -->
	<div style="position:absolute; left: 2.60cm; top: 5.50cm"><input name="medicion_inicialA"	type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 4.35cm; top: 5.50cm"><input name="medicion_inicialB" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left: 6.10cm; top: 5.50cm"><input name="medicion_inicialC" type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 7.85cm; top: 5.50cm"><input name="medicion_inicialD" type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 9.60cm; top: 5.50cm"><input name="medicion_inicialE" type="text" style="width: 0.95cm" maxlength="4" pattern="^(([0-9])?(.\d)(\d)?)$" title="1.99" required></div>
	<div style="position:absolute; left: 2.60cm; top: 6.10cm"><input name="medicion_finalA" 	type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 4.35cm; top: 6.10cm"><input name="medicion_finalB" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left: 6.10cm; top: 6.10cm"><input name="medicion_finalC" 	type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 7.85cm; top: 6.10cm"><input name="medicion_finalD" 	type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 9.60cm; top: 6.10cm"><input name="medicion_finalE" 	type="text" style="width: 0.95cm" maxlength="4" pattern="^(([0-9])?(.\d)(\d)?)$" title="1.99" required></div>

	<!-- *****************************************			 contadores			 ***************************************** -->
	<div style="position:absolute; left:11.10cm; top: 5.50cm"><input name="contador1_inicial" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:13.10cm; top: 5.50cm"><input name="contador2_inicial" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:15.10cm; top: 5.50cm"><input name="contador3_inicial" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:17.10cm; top: 5.50cm"><input name="contador4_inicial" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:19.10cm; top: 5.50cm"><input name="contador5_inicial" type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:11.10cm; top: 6.10cm"><input name="contador1_final" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:13.10cm; top: 6.10cm"><input name="contador2_final" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:15.10cm; top: 6.10cm"><input name="contador3_final" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:17.10cm; top: 6.10cm"><input name="contador4_final" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:19.10cm; top: 6.10cm"><input name="contador5_final" 	type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>

	<!-- *****************************************			 programa de bombeo			 ***************************************** -->
	<div style="position:absolute; left: 4.20cm; top: 7.20cm"><input name="volumen_recibir"		type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left: 4.20cm; top: 8.00cm"><input name="volumen_final" 		type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left: 4.20cm; top: 8.80cm"><input name="medida_final" 			type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:10.10cm; top: 7.20cm"><input name="rata_bombeo" 			type="text" style="width: 1.50cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:10.10cm; top: 8.00cm"><input name="hora_inicial" 			type="time" style="width: 1.50cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:10.10cm; top: 8.80cm"><input name="hora_final" 				type="time" style="width: 1.50cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:17.10cm; top: 7.20cm"><input name="cupo_maximo" 			type="text" style="width: 1.50cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left:16.30cm; top: 8.00cm"><input name="representante_planta" 		type="text" style="width: 4.0cm; text-align:left" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$"	onkeyup="mayuscula(this)" required></div>
	<div style="position:absolute; left:16.30cm; top: 8.80cm"><input name="representante_poliducto" type="text" style="width: 4.0cm; text-align:left" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$"	onkeyup="mayuscula(this)" required></div>

	<div style="position:absolute; left: 0.00cm; top: 9.15cm"><hr style="width:21.58cm; border-top:1px dashed rgba(255,112,0,1)"></div>
	<!-- ********************************       hasta aquí va la tira en original       ******************************** -->

	<!-- *****************************************			 medicion manual inicial			 ***************************************** -->
	<div style="position:absolute; left: 2.00cm; top:10.90cm"><input name="nivel11_mt" 						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 3.70cm; top:10.90cm"><input name="nivel11_cm" 						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 5.40cm; top:10.90cm"><input name="nivel11_mm" 						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.00cm; top:11.40cm"><input name="nivel12_mt" 						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 3.70cm; top:11.40cm"><input name="nivel12_cm" 						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 5.40cm; top:11.40cm"><input name="nivel12_mm" 						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.00cm; top:11.90cm"><input name="nivel13_mt" 						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 3.70cm; top:11.90cm"><input name="nivel13_cm" 						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 5.40cm; top:11.90cm"><input name="nivel13_mm" 						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.00cm; top:12.40cm"><input name="agua1_mt"	 						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 3.70cm; top:12.40cm"><input name="agua1_cm"	 						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 5.40cm; top:12.40cm"><input name="agua1_mm"	 						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 9.10cm; top:10.90cm"><input name="temperatura1_baja"			type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 9.10cm; top:11.40cm"><input name="temperatura1_media"		type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 9.10cm; top:11.90cm"><input name="temperatura1_alta"			type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left: 9.10cm; top:12.40cm"><input name="temperatura1_promedio"	type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" required></div>

	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left:18.45cm; top:10.20cm"><input name=	"alarma_alto"					type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:20.25cm; top:10.20cm"><input name=	"alarma_alto"					type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.45cm; top:10.55cm"><input name=	"alarma_alto_alto"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:20.25cm; top:10.55cm"><input name=	"alarma_alto_alto"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left: 6.95cm; top:13.00cm"><input name=	"tanque_drenaje1"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left: 8.45cm; top:13.00cm"><input name=	"tanque_drenaje1"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left: 9.95cm; top:13.00cm"><input name=	"tanque_drenaje1"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left:10.90cm; top:12.90cm"><input name="referencia1_medida_mt" type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:11.90cm; top:12.90cm"><input name="referencia1_medida_cm" type="text" style="width:0.70cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:12.90cm; top:12.90cm"><input name="referencia1_medida_mm" type="text" style="width:0.70cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:13.90cm; top:12.90cm"><input name="referencia1_aforo_mt"  type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:14.90cm; top:12.90cm"><input name="referencia1_aforo_cm"  type="text" style="width:0.70cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:15.90cm; top:12.90cm"><input name="referencia1_aforo_mm"  type="text" style="width:0.70cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:18.40cm; top:12.90cm"><input name="dif_alt_referencia1"   type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{0,3})$" required></div>

	<!-- *****************************************			 control horario de bombeo			 ***************************************** -->
	<div style="position:absolute; left: 0.80cm; top:14.46cm"><input name="A1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:14.40cm"><input name="A2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:14.40cm"><input name="A3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:14.40cm"><input name="A31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:14.40cm"><input name="A32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:14.40cm"><input name="A4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>
	<div style="position:absolute; left: 9.00cm; top:14.40cm"><input name="A5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" required></div>

	<div style="position:absolute; left: 0.80cm; top:14.90cm"><input name="B1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:14.90cm"><input name="B2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:14.90cm"><input name="B3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:14.90cm"><input name="B31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:14.90cm"><input name="B32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:14.90cm"><input name="B4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:14.90cm"><input name="B5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:15.40cm"><input name="C1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:15.40cm"><input name="C2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:15.40cm"><input name="C3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:15.40cm"><input name="C31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:15.40cm"><input name="C32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:15.40cm"><input name="C4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:15.40cm"><input name="C5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:15.90cm"><input name="D1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:15.90cm"><input name="D2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:15.90cm"><input name="D3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:15.90cm"><input name="D31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:15.90cm"><input name="D32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:15.90cm"><input name="D4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:15.90cm"><input name="D5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:16.40cm"><input name="E1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:16.40cm"><input name="E2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:16.40cm"><input name="E3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:16.40cm"><input name="E31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:16.40cm"><input name="E32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:16.40cm"><input name="E4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:16.40cm"><input name="E5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:16.90cm"><input name="F1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:16.90cm"><input name="F2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:16.90cm"><input name="F3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:16.90cm"><input name="F31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:16.90cm"><input name="F32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:16.90cm"><input name="F4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:16.90cm"><input name="F5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:17.40cm"><input name="G1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:17.40cm"><input name="G2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:17.40cm"><input name="G3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:17.40cm"><input name="G31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:17.40cm"><input name="G32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:17.40cm"><input name="G4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:17.40cm"><input name="G5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:17.90cm"><input name="H1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:17.90cm"><input name="H2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:17.90cm"><input name="H3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:17.90cm"><input name="H31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:17.90cm"><input name="H32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:17.90cm"><input name="H4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:17.90cm"><input name="H5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:18.40cm"><input name="I1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:18.40cm"><input name="I2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:18.40cm"><input name="I3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:18.40cm"><input name="I31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:18.40cm"><input name="I32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:18.40cm"><input name="I4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:18.40cm"><input name="I5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:18.90cm"><input name="J1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:18.90cm"><input name="J2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:18.90cm"><input name="J3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:18.90cm"><input name="J31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:18.90cm"><input name="J32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:18.90cm"><input name="J4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:18.90cm"><input name="J5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:19.40cm"><input name="K1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:19.40cm"><input name="K2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:19.40cm"><input name="K3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:19.40cm"><input name="K31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:19.40cm"><input name="K32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:19.40cm"><input name="K4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:19.40cm"><input name="K5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left: 0.80cm; top:19.90cm"><input name="L1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left: 2.75cm; top:19.90cm"><input name="L2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left: 4.60cm; top:19.90cm"><input name="L3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 5.60cm; top:19.90cm"><input name="L31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.30cm; top:19.90cm"><input name="L32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 7.10cm; top:19.90cm"><input name="L4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left: 9.00cm; top:19.90cm"><input name="L5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:14.40cm"><input name="M1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:14.40cm"><input name="M2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:14.40cm"><input name="M3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:14.40cm"><input name="M31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:14.40cm"><input name="M32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:14.40cm"><input name="M4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:14.40cm"><input name="M5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:14.90cm"><input name="N1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:14.90cm"><input name="N2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:14.90cm"><input name="N3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:14.90cm"><input name="N31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:14.90cm"><input name="N32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:14.90cm"><input name="N4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:14.90cm"><input name="N5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:15.40cm"><input name="O1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:15.40cm"><input name="O2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:15.40cm"><input name="O3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:15.40cm"><input name="O31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:15.40cm"><input name="O32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:15.40cm"><input name="O4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:15.40cm"><input name="O5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:15.90cm"><input name="P1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:15.90cm"><input name="P2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:15.90cm"><input name="P3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:15.90cm"><input name="P31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:15.90cm"><input name="P32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:15.90cm"><input name="P4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:15.90cm"><input name="P5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:16.40cm"><input name="Q1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:16.40cm"><input name="Q2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:16.40cm"><input name="Q3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:16.40cm"><input name="Q31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:16.40cm"><input name="Q32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:16.40cm"><input name="Q4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:16.40cm"><input name="Q5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:16.90cm"><input name="R1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:16.90cm"><input name="R2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:16.90cm"><input name="R3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:16.90cm"><input name="R31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:16.90cm"><input name="R32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:16.90cm"><input name="R4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:16.90cm"><input name="R5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<div style="position:absolute; left:11.00cm; top:17.40cm"><input name="S1"  type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:17.40cm"><input name="S2"  type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:14.75cm; top:17.40cm"><input name="S3"  type="text" style="width:0.8cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.70cm; top:17.40cm"><input name="S31" type="text" style="width:0.5cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:16.35cm; top:17.40cm"><input name="S32" type="text" style="width:0.5cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:17.10cm; top:17.40cm"><input name="S4"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:17.40cm"><input name="S5"  type="text" style="width:1.6cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

	<!-- *****************************************			 control durante bombeo lineas no dedicadas			 ***************************************** -->
	<div style="position:absolute; left:11.00cm; top:18.90cm"><input name="T1"	type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:18.90cm"><input name="T2"	type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:15.00cm; top:18.90cm"><input name="T3"	type="text" style="width:1.6cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:17.10cm; top:18.90cm"><input name="T4"	type="text" style="width:1.6cm" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:18.90cm"><input name="T5"	type="text" style="width:1.6cm; text-align:left" maxlength="10" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)" required></div>

	<div style="position:absolute; left:11.00cm; top:19.40cm"><input name="U1"	type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:19.40cm"><input name="U2"	type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:15.00cm; top:19.40cm"><input name="U3"	type="text" style="width:1.6cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:17.10cm; top:19.40cm"><input name="U4"	type="text" style="width:1.6cm" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:19.40cm"><input name="U5"	type="text" style="width:1.6cm; text-align:left" maxlength="10" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)" required></div>

	<div style="position:absolute; left:11.00cm; top:19.90cm"><input name="V1"	type="date" style="width:1.8cm" value="<?echo $fecha_bombeo;?>" required></div>
	<div style="position:absolute; left:12.95cm; top:19.90cm"><input name="V2"	type="time" style="width:1.6cm" value="<?echo $hora_bombeo;?>"  required></div>
	<div style="position:absolute; left:15.00cm; top:19.90cm"><input name="V3"	type="text" style="width:1.6cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" required></div>
	<div style="position:absolute; left:17.10cm; top:19.90cm"><input name="V4"	type="text" style="width:1.6cm" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:19.00cm; top:19.90cm"><input name="V5"	type="text" style="width:1.6cm; text-align:left" maxlength="10" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)" required></div>

	<!-- *****************************************			 medicion final			 ***************************************** -->
	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left: 9.95cm; top:20.82cm"><input name="tiempo_reposo"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<!--	<div style="position:absolute; left:11.15cm; top:20.82cm"><input name="tiempo_reposo"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div> -->
		<div style="position:absolute; left: 6.97cm; top:21.27cm"><input name="tanque_drenaje2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left: 8.45cm; top:21.27cm"><input name="tanque_drenaje2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left: 9.95cm; top:21.27cm"><input name="tanque_drenaje2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left: 2.80cm; top:22.75cm"><input name="nivel21_mt"						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 4.70cm; top:22.75cm"><input name="nivel21_cm"						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.50cm; top:22.75cm"><input name="nivel21_mm"						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.80cm; top:23.25cm"><input name="nivel22_mt"						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 4.70cm; top:23.25cm"><input name="nivel22_cm"						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.50cm; top:23.25cm"><input name="nivel22_mm"						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.80cm; top:23.75cm"><input name="nivel23_mt"						type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 4.70cm; top:23.75cm"><input name="nivel23_cm"						type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.50cm; top:23.75cm"><input name="nivel23_mm"						type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left: 2.80cm; top:24.25cm"><input name="agua2_mt"							type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left: 4.70cm; top:24.25cm"><input name="agua2_cm"							type="text" style="width:1.40cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left: 6.50cm; top:24.25cm"><input name="agua2_mm"							type="text" style="width:1.40cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:10.20cm; top:22.75cm"><input name="temperatura2_baja"			type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:10.20cm; top:23.25cm"><input name="temperatura2_media"		type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:10.20cm; top:23.75cm"><input name="temperatura2_alta"			type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:10.20cm; top:24.25cm"><input name="temperatura2_promedio"	type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>

	<div style="position:absolute; left:12.00cm; top:22.75cm"><input name="referencia2_manual_mt" type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:13.00cm; top:22.75cm"><input name="referencia2_manual_cm" type="text" style="width:0.70cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:14.00cm; top:22.75cm"><input name="referencia2_manual_mm" type="text" style="width:0.70cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:15.00cm; top:22.75cm"><input name="referencia2_aforo_mt"  type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:16.00cm; top:22.75cm"><input name="referencia2_aforo_cm"  type="text" style="width:0.70cm" maxlength="2" pattern="^(?:[0-9]{0,2})$" required></div>
	<div style="position:absolute; left:17.00cm; top:22.75cm"><input name="referencia2_aforo_mm"  type="text" style="width:0.70cm" maxlength="1" pattern="^(?:[0-9]{0,1})$" required></div>
	<div style="position:absolute; left:19.00cm; top:22.75cm"><input name="dif_alt_referencia2"   type="text" style="width:0.70cm" maxlength="3" pattern="^(?:[0-9]{0,3})$" required></div>
	
	<div style="position:absolute; left:18.65cm; top:23.25cm"><input name="api_observado"					type="text" style="width:1.40cm" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.65cm; top:23.75cm"><input name="temperatura"						type="text" style="width:1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:18.65cm; top:24.25cm"><input name="marcacion"							type="text" style="width:1.40cm" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>

	<div style="position:absolute; left:0.85cm; top:24.83cm" ng-app="textarea" ng-controller="controller">
		<textarea name="observaciones" type="text" style="width:19.75cm; height:2.00cm" maxlength="500" onkeyup="mayuscula(this)" pattern="^[0-9A-Za-z .,:;ÁáÉéÍíÓóÚúÜüÑñ]+$" ng-pattern-restrict required></textarea>
	</div>

<!-- -----------------------------------------				RETIRO				----------------------------------------- -->
	<div style="position:absolute; left:18.60cm; top:29.14cm">
		<input class="consecutivo" style="width:22mm; text-align:left; background-color:rgba(0,0,255,0)" id="consecutivo" name="consecutivo" type="text"
		value="<?
		if ($consec <= 9) {echo "&#8470;00000";}
			else {if ($consec <= 99) {echo "&#8470;0000";}
				else {if ($consec <= 999) {echo "&#8470;000";}
					else {if ($consec <= 9999) {echo "&#8470;00";}
						else {if ($consec <= 99999) {echo "&#8470;0";} else {echo "&#8470;";}}}}}
		echo $consec;
		?>"
		title="A partir del # <? if ($primerconsecutivo <= 9) {echo "000";} else {if ($primerconsecutivo <= 99) {echo "00";} else {if ($primerconsecutivo <= 999) {echo "0";}}}
		echo $primerconsecutivo; ?> hasta el # <? if ($ultimo_consec <= 9) {echo "000";} else {if ($ultimo_consec <= 99) {echo "00";} else {if ($ultimo_consec <= 999) {echo "0";}}}
		echo $ultimo_consec; ?>" readonly>
	</div>

	<div style="position:absolute; left: 18.65cm; top:28.94cm"><input name="estado" type="text" style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,1); border:0" value="VIGENTE" readonly></div>
	<div style="position:absolute; left: 18.70cm; top:29.09cm"><span  style="color:rgba(0,0,0,1); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

	<div style="position:absolute; left:10.00cm; top:29.77cm"><span style="font-family:Arlrdlt; font-size:10px; color:rgba(0,0,191,1)"><? echo strtoupper($terminal); ?></span></div>
	<div style="position:absolute; left: 3.00cm; top:31.00cm"><input name="tanque1"		id="tanque1"		type="text"	style="width: 60px; background-color:rgba(0,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:14.50cm; top:31.00cm"><input name="producto1"	id="producto1"	type="text"	style="width:200px; background-color:rgba(0,0,0,0); border:0"	readonly></div>

	<div style="position:absolute; left:13.80cm; top:32.45cm"><input name="inicial1"  id="inicial1"		type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:32.45cm"><input name="final1"    id="final1"  		type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:33.24cm"><input name="inicial2"  id="inicial2"	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:33.24cm"><input name="final2"    id="final2"  	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:34.03cm"><input name="inicial3"  id="inicial3"	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:34.03cm"><input name="final3"    id="final3"  	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:34.82cm"><input name="inicial4"  id="inicial4"	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:34.82cm"><input name="final4"    id="final4"  	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:35.61cm"><input name="inicial5"  id="inicial5"	  type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" readonly></div>
	<div style="position:absolute; left:17.80cm; top:35.61cm"><input name="final5"    id="final5"  	  type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" readonly></div>
	<div style="position:absolute; left:13.80cm; top:36.40cm"><input name="inicial6"  id="inicial6"	  type="text" style="width: 1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:36.40cm"><input name="final6"    id="final6"  	  type="text" style="width: 1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:37.12cm"><input name="inicial7"  id="inicial7"	  type="text" style="width: 1.40cm" maxlength="4" pattern="^(([0-9])(.\d)?(\d)?)$" title="1.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:37.12cm"><input name="final7"    id="final7"  	  type="text" style="width: 1.40cm" maxlength="4" pattern="^(([0-9])(.\d)?(\d)?)$" title="1.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:37.91cm"><input name="inicial8"  id="inicial8"	  type="text" style="width: 1.40cm" maxlength="5" pattern="^(([0-9])(.\d)?(\d)?)$" title="1.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:37.91cm"><input name="final8"    id="final8"  	  type="text" style="width: 1.40cm" maxlength="5" pattern="^(([0-9])(.\d)?(\d)?)$" title="1.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:38.70cm"><input name="inicial9"  id="inicial9"	  type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" readonly></div>
	<div style="position:absolute; left:17.80cm; top:38.70cm"><input name="final9"    id="final9"  	  type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" readonly></div>
	<div style="position:absolute; left:17.80cm; top:39.49cm"><input name="final10"   id="final10" 	  type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:40.28cm"><input name="inicial11" id="inicial11"	type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:41.07cm"><input name="inicial12" id="inicial12"	type="text" style="width: 1.40cm" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)?(\d)?)$" title="123.99" value="" required></div>
	<div style="position:absolute; left:13.80cm; top:41.86cm"><input name="inicial13" id="inicial13"	type="text" style="width: 1.40cm" maxlength="5" pattern="^(([0-9])(.\d)?(\d)?)$" title="1.99" value="" required></div>
	<div style="position:absolute; left:17.80cm; top:42.65cm"><input name="final14"   id="final14" 	  type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" type="text" readonly></div>
	<div style="position:absolute; left:17.80cm; top:43.44cm"><input name="final15"   id="final15"  	type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" type="text" readonly></div>
	<div style="position:absolute; left:17.80cm; top:44.23cm"><input name="final16"   id="final16"  	type="text" style="width: 1.40cm" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" value="" onfocusout="liquidar()" required></div>
	<div style="position:absolute; left:17.80cm; top:45.02cm"><input name="final17"   id="final17"  	type="text" style="width: 1.40cm; background-color:rgba(0,0,0,0)" readonly></div>
	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left: 6.50cm; top:45.25cm"><input name="diferencia"								type="radio" value="F" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left: 9.10cm; top:45.25cm"><input name="diferencia"								type="radio" value="S" onclick="gestionarClickRadio(this)"></div>
	</div>
	<div style="position:absolute; left:18.10cm; top:45.81cm"><input name="final18"   id="final18"  	type="text" style="width: 0.95cm; background-color:rgba(0,0,0,0)" readonly><span style="font-family:Arlrdlt; font-size:10px; color:rgba(0,0,191,1); background-color:rgba(0,0,0,0)">%</span></div>

	<div style="position:absolute; left: 7.00cm; top:48.70cm"><input name="volmayor1"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left: 1.10cm; top:49.15cm"><input name="mayorista2"	type="text" style="width:4.70cm; text-align:left"	maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left: 7.00cm; top:49.15cm"><input name="volmayor2"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left: 1.10cm; top:49.60cm"><input name="mayorista3"	type="text" style="width:4.70cm; text-align:left" maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left: 7.00cm; top:49.60cm"><input name="volmayor3"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left: 1.10cm; top:50.05cm"><input name="mayorista4"	type="text" style="width:4.70cm; text-align:left" maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left: 7.00cm; top:50.05cm"><input name="volmayor4"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left:11.50cm; top:48.70cm"><input name="mayorista5"	type="text" style="width:4.70cm; text-align:left" maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left:17.40cm; top:48.70cm"><input name="volmayor5"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left:11.50cm; top:49.15cm"><input name="mayorista6"	type="text" style="width:4.70cm; text-align:left" maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left:17.40cm; top:49.15cm"><input name="volmayor6"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left:11.50cm; top:49.60cm"><input name="mayorista7"	type="text" style="width:4.70cm; text-align:left" maxlength="20"	pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)"></div>
	<div style="position:absolute; left:17.40cm; top:49.60cm"><input name="volmayor7"		type="text" style="width:1.70cm"									maxlength="8" pattern="^(([0-9]){1,5}?(.\d)?(\d)?)$" title="12345.99" class="ecopetrol" onkeyup="sumar_ecopetrol()"></div>
	<div style="position:absolute; left:17.75cm; top:50.05cm"><span id="total_ecopetrol" style="width:1.70cm; text-align:center; font-family:Arlrdlt; font-size:10px; color:rgba(0,0,191,1); background-color:rgba(255,112,0,0.33)"></span></div>
	<div style="position:absolute; left: 1.10cm; top:51.10cm" ng-app="textarea" ng-controller="controller"><textarea name="observaciones_retiro" type="text" style="width:19.28cm; height:2.51cm" maxlength="625" onkeyup="mayuscula(this)" pattern="^[0-9A-Za-z .,:;ÁáÉéÍíÓóÚúÜüÑñ]+$" ng-pattern-restrict required></textarea></div>

	<div style="position:absolute; left: 1.20cm; top:54.68cm"><input name="finalizadopor"	 type="text" style="width:7.80cm; text-align:left" maxlength="35" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)" required></div>
	<div style="position:absolute; left:10.00cm; top:54.68cm"><input name="fecha_revision" type="date" style="width:2.00cm"									 value="<?echo $fechaactual;?>" required></div>
	<div style="position:absolute; left:12.50cm; top:54.68cm"><input name="revisadopor"		 type="text" style="width:7.80cm; text-align:left" maxlength="35" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this)" required></div>

	<div style="position:absolute; left:14.50cm; top:54.82cm"><input name="usuario" id="usuario" type="text" style="font-size:10px; width:222px; color:rgba(255,0,0,0); background-color:rgba(0,0,0,0); border:0px" required></div>
	<div style="position:absolute; left:14.40cm; top:54.77cm">
		<table>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td style="text-align:center">
					<form method="post">
						<select name="usuario1" id="usuario1" type="text" onfocusout="u()" required>
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

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:0.80cm; top:26.90cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:16.80cm; top:27.30cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:55.15cm; width:10mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left: 5mm; top:55.15cm; width:10mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
			<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada.">
		</a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106.0mm; top:125mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106.0mm; top:405mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>
</div>			<!-- cierre del div de subir/bajar formato -->
</div>			<!-- cierre del div de la tira y las 2 páginas del PDF -->
</form>
</div>			<!-- cierre del div de imprimir -->
</div>			<!-- cierre del div de zoom -->

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

<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
