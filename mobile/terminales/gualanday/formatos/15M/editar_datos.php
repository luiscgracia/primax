<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
	td.Aright	{font-size:24px; text-align:right}
	td.Aleft	{font-size:24px; text-align:left}
	td.LAleft	{font-size:24px; text-align:left}
	td.Anota	{font-size:28px; text-align:justify}
	td.A1			{font-size:22px}
	td.A0			{font-size:30px; font-weight:bold}
	select.product {background-color:rgba(0,255,0,0.1); color:rgba(0,0,191,1); border:2px solid rgba(255,112,0,1); border-radius:3px;
									font-family:Arial; ; font-size:34px; height:11.50mm}
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
 	function sumar_ecopetrol() {var total = 0; $(".ecopetrol").each(function() {if (isNaN(parseFloat($(this).val()))) {total += 0} else {total += parseFloat($(this).val())}});
	  document.getElementById('total_ecopetrol').innerHTML = total}
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
		document.getElementById("final18").value = f18.toFixed(2);}
</script>
<body style="margin-top:0px; margin-left: 0vw; width:100vw; font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<div class="noimprimir">
<!-- inicio del php para editar el formato -->
<? echo "
<!-- 2 --> <div class=fijar style='top:90px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw'>
		<table style='background-color:rgba(255,255,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:100%; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
				</td>
				<td style='font-family:SCHLBKB; font-size:35px; color:red'>
					";	if ($row['consecutivo'] < 9) {echo '&#8470; 00000'; echo $row['consecutivo'];}
								else if ($row['consecutivo'] < 99) {echo '&#8470; 0000'; echo $row['consecutivo'];}
									else if ($row['consecutivo'] < 999) {echo '&#8470; 000'; echo $row['consecutivo'];}
										else if ($row['consecutivo'] < 9999) {echo '&#8470; 00'; echo $row['consecutivo'];}
											else if ($row['consecutivo'] < 99999) {echo '&#8470; 0'; echo $row['consecutivo'];}
												else {echo '&#8470; '; echo $row['consecutivo'];} echo "
					<input name='consecutivo' type='text' value='$row[consecutivo]' style='display:none' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
<!--			<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span><br> -->
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014</b></span><br>
					<span>Version: 3 - Fecha: Julio 2020</span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table>
			<tr>
				<td style=width:100%; font-size:30px>
					TERMINAL: <span style='font-size:30px; text-decoration:underline; color:rgba(0,0,191,1)'>"; echo strtoupper($terminal); echo "</span><br>
<!--			<span style='font-size:22px; color:rgba(0,0,0,1)'>ENTREGA TANQUE</span> -->
				</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:15.1% class=A1><br>TANQUE N°</td>
				<td style=width:44.3% class=A1><br>PRODUCTO</td>
				<td style=width:21.6% class=A1><br>DÍA&nbsp;&nbsp;&nbsp;MES&nbsp;&nbsp;&nbsp;AÑO</td>
				<td style=width:19.0% class=A1><br>HORA ENTREGA TANQUE (24 HRS)</td>
			</tr>
			<tr>
				<td class=A><input name=tanque value='$row[tanque]' id=tanque type=text style='width:94%; text-align:center' onkeyup=mayuscula(this) onfocusout='t(); p(); sumar_ecopetrol()' maxlength=7 pattern=.{1,} autofocus required></td>
				<td class=A>
					<form method=post>
						<select style=width:100% name=producto id=producto type=text onfocusout=p() class=product required>
							<option value='' disabled></option>
							<option value='GASOLINA EXTRA OXIGENADA' "; if ($row['producto'] == 'GASOLINA EXTRA OXIGENADA') {echo 'selected';} echo ">GASOLINA EXTRA OXIGENADA</option>
							<option value='PRODUCTO 2 XX PRODUCTO 2' "; if ($row['producto'] == 'PRODUCTO 2 XX PRODUCTO 2') {echo 'selected';} echo ">PRODUCTO 2</option>
							<option value='PRODUCTO 3 XX PRODUCTO 3' "; if ($row['producto'] == 'PRODUCTO 3 XX PRODUCTO 3') {echo 'selected';} echo ">PRODUCTO 3</option>
							<option value='PRODUCTO 4 XX PRODUCTO 4' "; if ($row['producto'] == 'PRODUCTO 4 XX PRODUCTO 4') {echo 'selected';} echo ">PRODUCTO 4</option>
							<option value='PRODUCTO 5 XX PRODUCTO 5' "; if ($row['producto'] == 'PRODUCTO 5 XX PRODUCTO 5') {echo 'selected';} echo ">PRODUCTO 5</option>
						</select>
					</form>
				</td>
				<td class=A><input name=fechaA			value='$row[fechaA]' type=date required></td>
				<td class=A><input name=horaentrega	value='$row[horaentrega]' type=time required></td>
			</tr>
	 		<tr height=10px><td></td></tr>
		</table>
		<table>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr>
				<td class=A1><br>CAPACIDAD MÁXIMA OPERACIONAL<input name=capacidad		 value='$row[capacidad]'		 type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A1><br>NIVEL MÁXIMO DE LLENADO		 <input name=nivel_llenado value='$row[nivel_llenado]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
	 		<tr height=10px><td></td></tr>
		</table>
		<hr>
		<table border=0>
			<tr>
				<td class=A0 border=0>MEDICIÓN MANUAL</td>
			</tr>
		</table>
		<table border=1>
			<tr>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
			</tr>
			<tr>
				<td class=A1></td>
				<td class=A1>NIVEL DE PRODUCTO (metros)</td>
				<td class=A1>VOLUMEN EN TABQUE (Barriles)</td>
				<td class=A1>NIVEL DE AGUA (metros)</td>
				<td class=A1>TEMPERATURA (°F)</td>
				<td class=A1>API 60°F</td>
			</tr>
			<tr>
				<td class=A1>INICIAL</td>
				<td class=A><input name=medicion_inicialA value='$row[medicion_inicialA]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialB value='$row[medicion_inicialB]' type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialC value='$row[medicion_inicialC]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialD value='$row[medicion_inicialD]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialE value='$row[medicion_inicialE]' type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A1>FINAL</td>
				<td class=A><input name=medicion_finalA value='$row[medicion_finalA]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalB value='$row[medicion_finalB]' type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalC value='$row[medicion_finalC]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalD value='$row[medicion_finalD]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalE value='$row[medicion_finalE]' type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<table><tr height=10><td></td></tr></table>
		<table border=1>
			<tr height=0>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
			</tr>
			<tr><td colspan=6 class=A0>CONTADORES</td></tr>
			<tr>
				<td class=A1></td>
				<td class=A1>CONT #</td>
				<td class=A1>CONT #</td>
				<td class=A1>CONT #</td>
				<td class=A1>CONT #</td>
				<td class=A1>CONT #</td>
			</tr>
			<tr>
				<td class=A1>INICIAL</td>
				<td class=A><input name=contador1_inicial value='$row[contador1_inicial]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador2_inicial value='$row[contador2_inicial]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador3_inicial value='$row[contador3_inicial]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador4_inicial value='$row[contador4_inicial]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador5_inicial value='$row[contador5_inicial]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A1>FINAL</td>
				<td class=A><input name=contador1_final value='$row[contador1_final]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador2_final value='$row[contador2_final]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador3_final value='$row[contador3_final]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador4_final value='$row[contador4_final]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador5_final value='$row[contador5_final]' type=text style='width:94%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 PROGRAMA DE BOMBEO			 ***************************************** -->
		<table border=0>
			<tr><td class=A0>PROGRAMA DE BOMBEO</td></tr>
		</table>
		<table border=0>
			<tr>
				<td style='width:46%; border:0'></td>
				<td style='width:20%; border:0'></td>
				<td style='width:20%; border:0'></td>
				<td style='width:14%; border:0'></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>VOLUMEN A RECIBIR&nbsp;</td>
				<td style=text-align:left		class=A><input name=volumen_recibir value='$row[volumen_recibir]' type=text style='width:92.70%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>VOLUMEN FINAL ESTIMADO&nbsp;</td>
				<td style=text-align:left		class=A><input name=volumen_final value='$row[volumen_final]' type=text style='width:92.70%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>MEDIDA FINAL ESTIMADA&nbsp;</td>
				<td style=text-align:left		class=A><input name=medida_final value='$row[medida_final]' type=text style='width:92.70%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>METROS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>RATA DE BOMBEO&nbsp;</td>
				<td style=text-align:left		class=A><input name=rata_bombeo value='$row[rata_bombeo]' type=text style='width:92.70%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS/HORA</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>HORA INICIACIÓN&nbsp;</td>
				<td style=text-align:left		class=A><input name=hora_inicial value='$row[hora_inicial]' type=time required></td>
				<td style=text-align:left		class=A></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>HORA FINAL ESTIMADA&nbsp;</td>
				<td style=text-align:left		class=A><input name=hora_final value='$row[hora_final]' type=time required></td>
				<td style=text-align:left		class=A></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>CUPO MÁXIMO DE RECIBO&nbsp;</td>
				<td style=text-align:left		class=A><input name=cupo_maximo value='$row[cupo_maximo]' type=text style='width:92.70%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>REPRESENTANTE DE TERMINAL&nbsp;</td>
				<td colspan=3 style=text-align:left class=A><input name=representante_planta value='$row[representante_planta]' type=text style='width:98%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>REPRESENTANTE DE POLIDUCTO&nbsp;</td>
				<td colspan=3 style=text-align:left class=A><input name=representante_poliducto	value='$row[representante_poliducto]' type=text style='width:98%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>
		<br>
		<hr style='width:100%; border-top:7px dashed rgba(255,112,0,1)'>
		<br>

<!-- hasta aquí va la tirilla media carta -->

		<table border=0>
			<tr><td class=A0>MEDICIÓN MANUAL INICIAL</td></tr>
		</table>
		<table border=1>
			<tr>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
			</tr>
			<tr>
				<td colspan=4 class=A>NIVEL PRODUCTO</td>
				<td colspan=2 rowspan=2 class=A>TEMPERATURA °F</td>
			</tr>
			<tr>
				<td class=A>MEDIDA</td>
				<td class=A>m</td>
				<td class=A>cm</td>
				<td class=A>mm</td>
			</tr>
			<tr>
				<td class=A>1</td>
				<td class=A><input name=nivel11_mt	value='$row[nivel11_mt]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel11_cm	value='$row[nivel11_cm]' type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel11_mm	value='$row[nivel11_mm]' type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Baja</td>
				<td class=A><input name=temperatura1_baja value='$row[temperatura1_baja]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>2</td>
				<td class=A><input name=nivel12_mt	value='$row[nivel12_mt]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel12_cm	value='$row[nivel12_cm]' type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel12_mm	value='$row[nivel12_mm]' type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Media</td>
				<td class=A><input name=temperatura1_media value='$row[temperatura1_media]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>3</td>
				<td class=A><input name=nivel13_mt	value='$row[nivel13_mt]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel13_cm	value='$row[nivel13_cm]' type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel13_mm	value='$row[nivel13_mm]' type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Alta</td>
				<td class=A><input name=temperatura1_alta value='$row[temperatura1_alta]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>AGUA</td>
				<td class=A><input name=agua1_mt	value='$row[agua1_mt]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=agua1_cm	value='$row[agua1_cm]' type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=agua1_mm	value='$row[agua1_mm]' type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Promedio</td>
				<td class=A><input name=temperatura1_promedio value='$row[temperatura1_promedio]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:70%></td>
			</tr>
			<tr height=10px><td></td>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=alarma_alto	type=radio value=SI "; if ($row['alarma_alto'] == 'SI') {echo 'checked';} echo " required></td>
				<td class=Aright>NO&nbsp;</td>
				<td class=A><input name=alarma_alto	type=radio value=NO "; if ($row['alarma_alto'] == 'NO') {echo 'checked';} echo "></td>
				<td class=Aright></td>
				<td class=Aright></td>
				<td class=Aleft>&nbsp;&nbsp;AL PROBAR LA ALARMA NIVEL ALTO, FUNCIONÓ?</td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=alarma_alto_alto	type=radio value=SI "; if ($row['alarma_alto_alto'] == 'SI') {echo 'checked';} echo " required></td>
				<td class=Aright>NO&nbsp;</td>
				<td class=A><input name=alarma_alto_alto	type=radio value=NO "; if ($row['alarma_alto_alto'] == 'NO') {echo 'checked';} echo "></td>
				<td class=Aright></td>
				<td class=Aright></td>
				<td class=Aleft>&nbsp;&nbsp;AL PROBAR LA ALARMA NIVEL ALTO-ALTO, FUNCIONÓ?</td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=tanque_drenaje1	type=radio value=SI "; if ($row['tanque_drenaje1'] == 'SI') {echo 'checked';} echo " required></td>
				<td class=Aright>NO&nbsp;</td>
				<td class=A><input name=tanque_drenaje1 type=radio value=NO "; if ($row['tanque_drenaje1'] == 'NO') {echo 'checked';} echo "></td>
				<td class=Aright>NA&nbsp;</td>
				<td class=A><input name=tanque_drenaje1 type=radio value=NA "; if ($row['tanque_drenaje1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=Aleft>&nbsp;&nbsp;EL TANQUE DE DRENAJE QUEDÓ VACÍO?</td>
			</tr>
			<tr height=5px><td></td>
		</table>
		<hr>
		<table border=1>
			<tr>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:16%; border:0'></td>
			</tr>
			<tr>
				<td colspan=7 class=A>ALTURA DE REFERENCIA (BM)</td>
			</tr>
			<tr>
				<td colspan=3 class=A>MEDIDA</td>
				<td colspan=3 class=A>TABLA DE AFORO</td>
				<td rowspan=2 class=A>DIFERENCIA ALTURA REFERENCIA</td>
			</tr>
			<tr>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
			</tr>
			<tr>
				<td class=A><input name=referencia1_medida_mt value='$row[referencia1_medida_mt]' type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td>
				<td class=A><input name=referencia1_medida_cm value='$row[referencia1_medida_cm]' type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ required></td>
				<td class=A><input name=referencia1_medida_mm value='$row[referencia1_medida_mm]' type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ required></td>
				<td class=A><input name=referencia1_aforo_mt  value='$row[referencia1_aforo_mt]'  type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td>
				<td class=A><input name=referencia1_aforo_cm  value='$row[referencia1_aforo_cm]'  type=text style='width:98%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ required></td>
				<td class=A><input name=referencia1_aforo_mm  value='$row[referencia1_aforo_mm]'  type=text style='width:98%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ required></td>
				<td class=A><input name=dif_alt_referencia1   value='$row[dif_alt_referencia1]' 	type=text style='width:98%; text-align:center' maxlength=3 pattern=^(?:[0-9]{0,3})$ required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 CONTROL HORARIO DE BOMBEO			 ***************************************** -->
		<table border=0>
			<tr><td class=A0>CONTROL HORARIO DE BOMBEO</td></tr>
		</table>
		<table border=1>
			<tr>
				<td style='width:21.6%; border:0'></td>
				<td style='width:19.0%; border:0'></td>
				<td style='width: 8.0%; border:0'></td>
				<td style='width: 6.4%; border:0'></td>
				<td style='width: 5.0%; border:0'></td>
				<td style='width:20.0%; border:0'></td>
				<td style='width:20.0%; border:0'></td>
			</tr>
			<tr style=height:50px>
				<td class=A1>FECHA (DÍA)</td>
				<td class=A1>HORA (24HRS)<br>HORA : MIN</td>
				<td colspan=3>
					<table>
						<tr><td style=width:43.90%></td><td style=width:29.30%></td><td style=width:26.80%></td></tr>
						<tr><td class=A1 colspan=3; border=0>NIVEL PRODUCTO</td></tr>
						<tr><td class=A1 border=0>m</td><td class=A1 border=0>cm</td><td class=A1 border=0>mm</td></tr>
					</table>
				</td>
				<td class=A1>VOL. TANQUE<br>Bls. BRUTOS</td>
				<td class=A1>CUPO<br>Bls. BRUTOS</td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=A1  value='$row[A1]'  type=date style=width:95% required></td>
				<td class=A><input name=A2  value='$row[A2]'  type=time style=width:95% required></td>
				<td class=A><input name=A3  value='$row[A3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=A31 value='$row[A31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=A32 value='$row[A32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A><input name=A4  value='$row[A4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=A5  value='$row[A5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=B1  value='$row[B1]'  type=date style=width:95% required></td>
				<td class=A><input name=B2  value='$row[B2]'  type=time style=width:95% required></td>
				<td class=A><input name=B3  value='$row[B3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=B31 value='$row[B31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=B32 value='$row[B32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A><input name=B4  value='$row[B4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=B5  value='$row[B5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=C1  value='$row[C1]'  type=date style=width:95%></td>
				<td class=A><input name=C2  value='$row[C2]'  type=time style=width:95%></td>
				<td class=A><input name=C3  value='$row[C3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=C31 value='$row[C31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=C32 value='$row[C32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=C4  value='$row[C4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=C5  value='$row[C5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=D1  value='$row[D1]'  type=date style=width:95%></td>
				<td class=A><input name=D2  value='$row[D2]'  type=time style=width:95%></td>
				<td class=A><input name=D3  value='$row[D3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=D31 value='$row[D31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=D32 value='$row[D32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=D4  value='$row[D4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=D5  value='$row[D5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=E1  value='$row[E1]'  type=date style=width:95%></td>
				<td class=A><input name=E2  value='$row[E2]'  type=time style=width:95%></td>
				<td class=A><input name=E3  value='$row[E3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=E31 value='$row[E31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=E32 value='$row[E32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=E4  value='$row[E4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=E5  value='$row[E5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=F1  value='$row[F1]'  type=date style=width:95%></td>
				<td class=A><input name=F2  value='$row[F2]'  type=time style=width:95%></td>
				<td class=A><input name=F3  value='$row[F3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=F31 value='$row[F31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=F32 value='$row[F32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=F4  value='$row[F4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=F5  value='$row[F5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=G1  value='$row[G1]'  type=date style=width:95%></td>
				<td class=A><input name=G2  value='$row[G2]'  type=time style=width:95%></td>
				<td class=A><input name=G3  value='$row[G3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=G31 value='$row[G31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=G32 value='$row[G32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=G4  value='$row[G4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=G5  value='$row[G5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=H1  value='$row[H1]'  type=date style=width:95%></td>
				<td class=A><input name=H2  value='$row[H2]'  type=time style=width:95%></td>
				<td class=A><input name=H3  value='$row[H3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=H31 value='$row[H31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=H32 value='$row[H32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=H4  value='$row[H4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=H5  value='$row[H5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=I1  value='$row[I1]'  type=date style=width:95%></td>
				<td class=A><input name=I2  value='$row[I2]'  type=time style=width:95%></td>
				<td class=A><input name=I3  value='$row[I3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=I31 value='$row[I31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=I32 value='$row[I32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=I4  value='$row[I4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=I5  value='$row[I5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=J1  value='$row[J1]'  type=date style=width:95%></td>
				<td class=A><input name=J2  value='$row[J2]'  type=time style=width:95%></td>
				<td class=A><input name=J3  value='$row[J3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=J31 value='$row[J31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=J32 value='$row[J32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=J4  value='$row[J4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=J5  value='$row[J5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=K1  value='$row[K1]'  type=date style=width:95%></td>
				<td class=A><input name=K2  value='$row[K2]'  type=time style=width:95%></td>
				<td class=A><input name=K3  value='$row[K3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=K31 value='$row[K31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=K32 value='$row[K32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=K4  value='$row[K4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=K5  value='$row[K5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=L1  value='$row[L1]'  type=date style=width:95%></td>
				<td class=A><input name=L2  value='$row[L2]'  type=time style=width:95%></td>
				<td class=A><input name=L3  value='$row[L3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=L31 value='$row[L31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=L32 value='$row[L32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=L4  value='$row[L4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=L5  value='$row[L5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=M1  value='$row[M1]'  type=date style=width:95%></td>
				<td class=A><input name=M2  value='$row[M2]'  type=time style=width:95%></td>
				<td class=A><input name=M3  value='$row[M3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=M31 value='$row[M31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=M32 value='$row[M32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=M4  value='$row[M4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=M5  value='$row[M5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=N1  value='$row[N1]'  type=date style=width:95%></td>
				<td class=A><input name=N2  value='$row[N2]'  type=time style=width:95%></td>
				<td class=A><input name=N3  value='$row[N3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=N31 value='$row[N31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=N32 value='$row[N32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=N4  value='$row[N4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=N5  value='$row[N5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=O1  value='$row[O1]'  type=date style=width:95%></td>
				<td class=A><input name=O2  value='$row[O2]'  type=time style=width:95%></td>
				<td class=A><input name=O3  value='$row[O3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=O31 value='$row[O31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=O32 value='$row[O32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=O4  value='$row[O4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=O5  value='$row[O5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=P1  value='$row[P1]'  type=date style=width:95%></td>
				<td class=A><input name=P2  value='$row[P2]'  type=time style=width:95%></td>
				<td class=A><input name=P3  value='$row[P3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=P31 value='$row[P31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=P32 value='$row[P32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=P4  value='$row[P4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=P5  value='$row[P5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=Q1  value='$row[Q1]'  type=date style=width:95%></td>
				<td class=A><input name=Q2  value='$row[Q2]'  type=time style=width:95%></td>
				<td class=A><input name=Q3  value='$row[Q3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=Q31 value='$row[Q31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=Q32 value='$row[Q32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=Q4  value='$row[Q4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=Q5  value='$row[Q5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=R1  value='$row[R1]'  type=date style=width:95%></td>
				<td class=A><input name=R2  value='$row[R2]'  type=time style=width:95%></td>
				<td class=A><input name=R3  value='$row[R3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=R31 value='$row[R31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=R32 value='$row[R32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=R4  value='$row[R4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=R5  value='$row[R5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=S1  value='$row[S1]'  type=date style=width:95%></td>
				<td class=A><input name=S2  value='$row[S2]'  type=time style=width:95%></td>
				<td class=A><input name=S3  value='$row[S3]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=S31 value='$row[S31]' type=text style='width:87%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=S32 value='$row[S32]' type=text style='width:81%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=S4  value='$row[S4]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=S5  value='$row[S5]'  type=text style='width:90%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
		</table>
		<hr>
		<table border=1>
			<tr>
				<td style='width:21.6%; border:0'></td>
				<td style='width:19.0%; border:0'></td>
				<td style='width:17.4%; border:0'></td>
				<td style='width:18.0%; border:0'></td>
				<td style='width:24.0%; border:0'></td>
			</tr>
			<tr>
				<td colspan=5 class=A0>CONTROL DURANTE BOMBEO LÍNEAS NO DEDICADAS</td>
			</tr>
			<tr style=height:50px>
				<td class=A1>FECHA (DÍA)</td>
				<td class=A1>HORA (24HRS)<br>HORA : MIN</td>
				<td class=A1>TEMPERATURA (°F)</td>
				<td class=A1>GRAVEDAD API</td>
				<td class=A1>APARIENCIA</td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=T1 value='$row[T1]' type=date style=width:95%></td>
				<td class=A><input name=T2 value='$row[T2]' type=time style=width:95%></td>
				<td class=A><input name=T3 value='$row[T3]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=T4 value='$row[T4]' type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=T5 value='$row[T5]' type=text style='width:94%; text-align:center' maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=U1 value='$row[U1]' type=date style=width:95%></td>
				<td class=A><input name=U2 value='$row[U2]' type=time style=width:95%></td>
				<td class=A><input name=U3 value='$row[U3]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=U4 value='$row[U4]' type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=U5 value='$row[U5]' type=text style='width:94%; text-align:center' maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr style=height:50px>
				<td class=A><input name=V1 value='$row[V1]' type=date style=width:95%></td>
				<td class=A><input name=V2 value='$row[V2]' type=time style=width:95%></td>
				<td class=A><input name=V3 value='$row[V3]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=V4 value='$row[V4]' type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=V5 value='$row[V5]' type=text style='width:94%; text-align:center' maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr>
				<td colspan=6 class=A0>MEDICIÓN MANUAL FINAL</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:6%></td>
				<td style=width:4%></td>
				<td style=width:6%></td>
				<td style=width:4%></td>
				<td style=width:2%></td>
				<td style=width:78%></td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=tiempo_reposo	type=radio value=SI "; if ($row['tiempo_reposo'] == 'SI') {echo 'checked';} echo " required></td>
				<td class=Aright><!--NO&nbsp;--></td>
				<td class=A><!--<input name=tiempo_reposo	type=radio value=NO "; if ($row['tiempo_reposo'] == 'NO') {echo 'checked';} echo "--></td>
				<td></td>
				<td class=Aleft>DESPUÉS DE LA FINALIZACIÓN DEL BOMBEO, SE HA ESPERADO EL TIEMPO DE REPOSO ESTABLECIDO EN EL PROCEDIMIENTO PARA MEDIR EL TANQUE?</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:70%></td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=tanque_drenaje2	type=radio value=SI "; if ($row['tanque_drenaje2'] == 'SI') {echo 'checked';} echo " required></td>
				<td class=Aright>NO&nbsp;</td>
				<td class=A><input name=tanque_drenaje2 type=radio value=NO "; if ($row['tanque_drenaje2'] == 'NO') {echo 'checked';} echo "></td>
				<td class=Aright>NA&nbsp;</td>
				<td class=A><input name=tanque_drenaje2 type=radio value=NA "; if ($row['tanque_drenaje2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=Aleft>&nbsp;&nbsp;EL TANQUE DE DRENAJE QUEDÓ VACÍO?</td>
			</tr>
			<tr height=10px><td></td>
		</table>
		<table border=1>
			<tr>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
				<td style='width:16.6%; border:0'></td>
				<td style='width:16.7%; border:0'></td>
			</tr>
			<tr>
				<td colspan=4 class=A>NIVEL PRODUCTO</td>
				<td colspan=2 rowspan=2 class=A>TEMPERATURA °F</td>
			</tr>
			<tr>
				<td class=A>MEDIDA</td>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
			</tr>
			<tr>
				<td class=A>1</td>
				<td class=A><input name=nivel21_mt	value='$row[nivel21_mt]' type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel21_cm	value='$row[nivel21_cm]' type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel21_mm	value='$row[nivel21_mm]' type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Baja</td>
				<td class=A><input name=temperatura2_baja	value='$row[temperatura2_baja]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>2</td>
				<td class=A><input name=nivel22_mt	value='$row[nivel22_mt]' type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel22_cm	value='$row[nivel22_cm]' type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel22_mm	value='$row[nivel22_mm]' type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Media</td>
				<td class=A><input name=temperatura2_media	value='$row[temperatura2_media]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>3</td>
				<td class=A><input name=nivel23_mt	value='$row[nivel23_mt]' type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel23_cm	value='$row[nivel23_cm]' type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel23_mm	value='$row[nivel23_mm]' type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Alta</td>
				<td class=A><input name=temperatura2_alta	value='$row[temperatura2_alta]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>AGUA</td>
				<td class=A><input name=agua2_mt value='$row[agua2_mt]' type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=agua2_cm value='$row[agua2_cm]' type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=agua2_mm value='$row[agua2_mm]' type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A>Promedio</td>
				<td class=A><input name=temperatura2_promedio	value='$row[temperatura2_promedio]' type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<table border=1>
			<tr>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:14%; border:0'></td>
				<td style='width:16%; border:0'></td>
			</tr>
			<tr><td colspan=7 class=A>ALTURA DE REFERENCIA (BM)</td></tr>
			<tr>
				<td colspan=3 class=A>MEDIDA</td>
				<td colspan=3 class=A>TABLA DE AFORO</td>
				<td rowspan=2 class=A>DIFERENCIA ALTURA REFERENCIA</td>
			</tr>
			<tr>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
			</tr>
			<tr>
				<td class=A><input name=referencia2_manual_mt value='$row[referencia2_manual_mt]' type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td>
				<td class=A><input name=referencia2_manual_cm value='$row[referencia2_manual_cm]' type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ required></td>
				<td class=A><input name=referencia2_manual_mm value='$row[referencia2_manual_mm]' type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ required></td>
				<td class=A><input name=referencia2_aforo_mt  value='$row[referencia2_aforo_mt]'  type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td>
				<td class=A><input name=referencia2_aforo_cm  value='$row[referencia2_aforo_cm]'  type=text style='width:90%; text-align:center' maxlength=2 pattern=^(?:[0-9]{0,2})$ required></td>
				<td class=A><input name=referencia2_aforo_mm  value='$row[referencia2_aforo_mm]'  type=text style='width:90%; text-align:center' maxlength=1 pattern=^(?:[0-9]{0,1})$ required></td>
				<td class=A><input name=dif_alt_referencia2   value='$row[dif_alt_referencia2]' 	type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{0,3})$ required></td>
			</tr>
		</table>
		<table border=1>
			<tr>
				<td style='width:25%; border:0'></td>
				<td style='width:50%; border:0'></td>
				<td style='width:30%; border:0'></td>
			</tr>
			<tr>
				<td rowspan=3 class=A>PRUEBAS ABREVIADAS DE CALIDAD</td>
				<td class=A>API OBSERVADO</td>
				<td class=A><input name=api_observado	value='$row[api_observado]'	type=text style='width:90%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>TEMPERATURA OBSERVADA (°F)</td>
				<td class=A><input name=temperatura		value='$row[temperatura]' 	type=text style='width:90%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>MARCACIÓN</td>
				<td class=A><input name=marcacion			value='$row[marcacion]' 		type=text style='width:90%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 observaciones			 ***************************************** -->
		<table>
			<tr><td class=Aleft>OBSERVACIONES</td></tr>
			<tr><td><textarea name=observaciones type=text style=width:99% maxlength=500 onkeyup=mayuscula(this) pattern=.{1,} required>$row[observaciones]</textarea></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 	RETIRO			 ***************************************** -->
		<table border=0>
			<tr>
				<td style=width:15%></td>
				<td style=width:18%></td>
				<td style=width:17%></td>
				<td style=width:50%></td>
			</tr>
			<tr>
				<td colspan=4 class=A0>LIQUIDACIÓN FINAL DE VOLUMEN RECIBIDO<br>MEDICIÓN MANUAL</td>
			</tr>
			<tr>
				<td class=Aright>TANQUE:</td>
				<td class=A><input name=tanque1	id=tanque1 type=text style='text-align:left; width:100%; background-color:white; border:0'	readonly></td>
				<td class=Aright>PRODUCTO:</td>
				<td class=A><input name=producto1	id=producto1 type=text style='text-align:left; width:100%; background-color:white; border:0'	readonly></td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:28%></td>
				<td style=width:12%></td>
				<td style=width:7%></td>
				<td style=width:14%></td>
				<td style=width:7%></td>
				<td style=width:16%></td>
				<td style=width:16%></td>
			</tr>
			<tr>
				<td colspan=5 class=A></td>
				<td class=A>INICIAL</td>
				<td class=A>FINAL</td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;1. MEDIDA NIVEL PRODUCTO</td>
				<td class=A><input name=inicial1 value='$row[inicial1]' id=inicial1 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final1 value='$row[final1]' id=final1 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;2. VOLUMEN PRODUCTO (BRUTO)</td>
				<td class=A><input name=inicial2 value='$row[inicial2]' id=inicial2 type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final2 value='$row[final2]' id=final2 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;3. MEDIDA NIVEL DE AGUA</td>
				<td class=A><input name=inicial3 value='$row[inicial3]' id=inicial3 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final3 value='$row[final3]' id=final3 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;4. VOLUMEN AGUA</td>
				<td class=A><input name=inicial4 value='$row[inicial4]' id=inicial4 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final4 value='$row[final4]' id=final4 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;5. VOLUMEN PRODUCTO SIN AGUA (2-4)</td>
				<td class=A><input name=inicial5 value='$row[inicial5]' id=inicial5 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
				<td class=A><input name=final5 value='$row[final5]' id=final5 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;6. TEMPERATURA MEDIDA</td>
				<td class=A><input name=inicial6 value='$row[inicial6]' id=inicial6 	type=text style='width:95%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final6 value='$row[final6]' id=final6 	type=text style='width:95%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;7. GRAVEDAD API 60°F</td>
				<td class=A><input name=inicial7 value='$row[inicial7]' id=inicial7 	type=text style='width:95%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final7 value='$row[final7]' id=final7 	type=text style='width:95%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;8. FACTOR DE CORRECCIÓN A 60°F <span style='font-size:20px'>(COEFICIENTE TABLA 6B)</span></td>
				<td class=A><input name=inicial8 value='$row[inicial8]' id=inicial8 	type=text style='width:95%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final8 value='$row[final8]' id=final8 	type=text style='width:95%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;&nbsp;9.VOLUMEN PRODUCTO 60°F(5x8) (NETO)</td>
				<td class=A><input name=inicial9 value='$row[inicial9]' id=inicial9 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
				<td class=A><input name=final9 value='$row[final9]' id=final9 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;10. VOLUMEN NETO RECIBIDO EN TANQUE</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final10 value='$row[final10]' id=final10 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;11. VOLUMEN ENTREGADO POR CONTADORES (VENTAS)</td>
				<td class=A><input name=inicial11 value='$row[inicial11]' id=inicial11 	type=text style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;12. TEMPERATURA PROM. ENTREGA DE CONTADORES (°F)</td>
				<td class=A><input name=inicial12 value='$row[inicial12]' id=inicial12 	type=text style='width:95%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
				<td colspan=5 class=LAleft>&nbsp;13. FACTOR DE CORRECCIÓN A 60°F <span style='font-size:20px'>(COEFICIENTE TABLA 6B)</span> CONTADORES</td>
				<td class=A><input name=inicial13 value='$row[inicial13]' id=inicial13 	type=text style='width:95%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft><span style='font-size:23.92px'>&nbsp;14. VOLUMEN NETO ENTREGADO POR CONTADORES (11x13)</span></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final14 value='$row[final14]' id=final14 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;15. VOLUMEN NETO RECIBIDO (10+14)</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final15 value='$row[final15]' id=final15 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;16. VOLUMEN TIQUETE DEL POLIDUCTO*</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final16 value='$row[final16]' id=final16 	type=text onfocusout=liquidar() style='width:95%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=Aleft>&nbsp;17. DIFERENCIA (15-16):</td>
				<td class=Aright>FALTANTE</td>
				<td class=A style=text-align:left><input name=diferencia type=radio value=F "; if ($row['diferencia'] == 'F') {echo 'checked';} echo " required></td>
				<td class=Aright>SOBRANTE</td>
				<td class=A style=text-align:left><input name=diferencia type=radio value=S "; if ($row['diferencia'] == 'S') {echo 'checked';} echo "></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final17 value='$row[final17]' id=final17 	type=text style='width:95%; background-color:rgba(0,0,0,0); border:0' readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;18. PORCENTAJE DE VARIACION (17/16 x 100)</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A>
					<input name=final18	value='$row[final18]' id=final18	type=text style='width:80%; text-align:right; background-color:rgba(0,0,0,0); border:0' readonly><span style='font-size:24px; color:rgba(0,0,191,1); background-color:rgba(0,0,0,0)'>%</span>
				</td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr><td colspan=7 class=Anota>NOTA: Si el porcentaje (%) de variación es mayor o igual al ±0,25%, mida nuevamente el tanque y con estos datos realice una nueva liquidación.  Si el porcentaje de variación es mayor a ±0,5% una vez haya realizado el paso anterior verifique que el resultado de la liquidación es correcto e informe al supervisor.</td></tr>
		</table>
		<hr>
		<table border=1>
			<tr>
				<td class=A width=75%>MAYORISTA</td>
				<td class=A width=25%>VOLUMEN</td>
			</tr>
			<tr>
				<td class=A style='width:100%; text-align:left'><b>&nbsp;PRIMAX COLOMBIA S.A</b></td>
				<td><input name=volmayor1	value='$row[volmayor1]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista2 value='$row[mayorista2]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor2	value='$row[volmayor2]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista3 value='$row[mayorista3]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor3	value='$row[volmayor3]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista4 value='$row[mayorista4]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor4	value='$row[volmayor4]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista5 value='$row[mayorista5]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor5	value='$row[volmayor5]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista6 value='$row[mayorista6]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor6	value='$row[volmayor6]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista7 value='$row[mayorista7]' type=text	style='width:98.5%; text-align:left' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor7	value='$row[volmayor7]' type=text	style='width:96%; text-align:center'	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><b>TOTAL</b></td>
				<td><span id=total_ecopetrol style='width:96%; text-align:center; font-family:Arial; font-size:32px; color:rgba(0,0,191,1); background-color:rgba(255,255,255,1)'></span></td>
			</tr>
		</table>
		<hr>
		<table>
			<tr><td class=Aleft>OBSERVACIONES</td></tr>
			<tr><td><textarea name=observaciones_retiro type=text style=width:99% maxlength=625 onkeyup=mayuscula(this) pattern=.{1,}>$row[observaciones_retiro]</textarea></td></tr>
		</table>
		<hr>
		<table>
			<tr><td width=39.20%></td><td width=21.60%></td><td width=39.20%></td></tr>
			<tr height=30px><td></td>
			<tr>
				<td class=A>FINALIZADO POR</td>
				<td class=A>FECHA</td>
				<td class=A>REVISADO POR</td>
			</tr>
			<tr>
				<td class=A><input name=finalizadopor		value='$row[finalizadopor]'		type=text style=width:96% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=A><input name=fecha_revision	value='$row[fecha_revision]'	type=date required></td>
				<td class=A><input name=revisadopor			value='$row[revisadopor]'			type=text style=width:96% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table>
			<tr><td><hr></td></tr>
			<tr><td style='font-size:36px; font-family:Arlrdbd; color:rgba(0,0,191,1)'>RESPONSABLE DEL FORMATO<br>$row[usuario]@primax.com.co</td></tr>
			<tr><td><input name=usuario value='$row[usuario]' style='display:none'></td></tr>
			<tr><td><hr></td></tr>
		</table>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style='font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)'>Fecha edición: "; echo $fechahoy; echo "</span>
		<input style='display:none; width:3.10cm' type=text id=fecha name=fecha value='$row[fecha]' readonly><br>
<!--		<span style='font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)'>Quedan "; echo number_format($consec_por_usar,0,',','.'); echo " consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=200>
				<td>
					<div style='position:relative; left:0%; margin-left:0; top:50px; background-color:rgba(0,0,255,0)'>
						<img style='width:auto; height:100px' src='../../../../../common/imagenes/editar.png'>
					</div>
					<div style='position:relative; left:0%; margin-left:25; top:-50px; background-color:rgba(0,255,0,0)'>
						<input style='font-weight:bold; font-size:14px; height:100px; width:auto; background-color:rgba(255,0,255,0);
						color:rgba(0,255,255,0); border:0px solid rgba(0,255,255,0); border-radius:0px; text-align:center; cursor:pointer'
						type='submit' name='modificar' value='&nbsp;&nbsp;MODIFICAR&nbsp;&nbsp;' title='Modificar un consecutivo'>
					</div>
				</td>
				<td>
					<a href='javascript:closed()'>
					<img src='../../../../../common/imagenes/regresar.png' style='pointer-events:auto; width:100px; height:auto'>
					</a>
				</td>
			</tr>
		</table>
		<table border=0>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style='font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)'>REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href='mailto:"; echo $correo_pedidos; echo "?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo'>
					<img src='../../../../../common/imagenes/piedepagina_horizontal.svg' style='pointer-events:auto; width:100%; height:auto'>
					</a>
				</td>
			</tr>
		</table>
		<hr>
<!-- /10 --> 		</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>
</form>

"; ?>		<!-- cierre del php que se usa para editar el formato -->
<!-- /1 --> </div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
