<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
	td.Aright	{font-size:24px; text-align:right}
	td.Aleft	{font-size:24px; text-align:left}
	td.LAleft	{font-size:24px; text-align:left}
	td.Anota	{font-size:28px; text-align:justify}
	td.A1			{font-size:22px}
	td.A0			{font-size:30px; font-weight:bold}
	select.product {background-color:rgba(0,255,0,0.1); color:rgba(0,0,191,1); border:2px solid rgba(255,112,0,1); border-radius:3px;
									font-family:Arial; ; font-size:34px; height:10mm}
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
<body style="font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	include ("../../conectar_db.php");
	include ("../../../../../common/conectar_db_usuarios.php");
	include ("../../../../../normal/usuarios.php");
	include ("../../../../../normal/terminales/".$terminal."/formatos/".basename(dirname(__FILE__))."/consecutivos".basename(dirname(__FILE__)).".php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
	$cons = "SELECT MAX(consecutivo) as consecutivo FROM formulario".$formato." LIMIT 1";

	//se conecta a la base de datos y se verifica el consecutivo inicial (o el siguiente libre)
	$consult = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario'.basename(dirname(__FILE__)).' LIMIT 1');
	$consulta = $consult->fetch_array(MYSQLI_ASSOC);
	$consec = (empty($consulta['consecutivo']) ? $primerconsecutivo : $consulta['consecutivo']+=1);
	$conexion->close();

	// se valida que no se sobrepase el número de libretas compradas
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<div class=aviso><br><br><b>".$$formulario.$aviso.$contacto."</b><br><br><br><br><br><br><br><br><br><br></div>";
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,20000); document.body.innerHTML = '$aviso_pedido';</script>";}
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<!-- 1 --> <div class=noimprimir>
<!-- 2 --> <div class=fijar style="top:90px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 -->	</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100vw">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<? echo $estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:100%; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:rgba(255,255,255,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014</b></span><br>
					<span>Version: 3 - Fecha: Julio 2020</span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr>
				<td style=font-size:30px>
					TERMINAL: <span style="font-size:30px; text-decoration:underline; color:rgba(0,0,191,1)"><?echo strtoupper($terminal);?></span><br>
					<span style="font-size:24px; color:rgba(0,0,0,1)">ENTREGA TANQUE</span>
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
				<td class=A><input name=tanque id=tanque type=text style="width:96%; text-align:center" onkeyup="mayuscula(this); t()" maxlength=7 pattern=.{1,} autofocus required></td>
				<td class=A>
					<form method=post>
						<select style=width:100% name=producto id=producto type=text onfocusout=p() class=product required>
							<option value="" disabled selected></option>
							<option value="GASOLINA EXTRA OXIGENADA">GASOLINA EXTRA OXIGENADA</option>
							<option value="PRODUCTO 2 XX PRODUCTO 2">PRODUCTO 2</option>
							<option value="PRODUCTO 3 XX PRODUCTO 3">PRODUCTO 3</option>
							<option value="PRODUCTO 4 XX PRODUCTO 4">PRODUCTO 4</option>
							<option value="PRODUCTO 5 XX PRODUCTO 5">PRODUCTO 5</option>
						</select>
					</form>
				</td>
				<td class=A><input name=fechaA			type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td class=A><input name=horaentrega	type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
	 		<tr height=10px><td></td></tr>
		</table>
		<table>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr>
				<td class=A1><br>CAPACIDAD MÁXIMA OPERACIONAL<input name=capacidad type=text style="width:50%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A1><br>NIVEL MÁXIMO DE LLENADO<input name=nivel_llenado	 type=text style="width:50%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
	 		<tr height=10px><td></td></tr>
		</table>
		<hr>
		<table border=0>
			<tr>
				<td class=A0 border=0>MEDICIÓN AUTOMÁTICA</td>
			</tr>
		</table>
		<table border=1>
			<tr>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.6%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.6%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
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
				<td class=A><input name=medicion_inicialA type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialB type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialC type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialD type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_inicialE type=text style="width:98%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A1>FINAL</td>
				<td class=A><input name=medicion_finalA type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalB type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalC type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalD type=text style="width:98%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=medicion_finalE type=text style="width:98%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=10><td></td></tr>
		</table>
		<table border=1>
			<tr height=0>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.6%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
				<td style="width:16.6%; border:0"></td>
				<td style="width:16.7%; border:0"></td>
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
				<td class=A><input name=contador1_inicial type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador2_inicial type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador3_inicial type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador4_inicial type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador5_inicial type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A1>FINAL</td>
				<td class=A><input name=contador1_final type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador2_final type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador3_final type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador4_final type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=contador5_final type=text style="width:98%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 PROGRAMA DE BOMBEO			 ***************************************** -->
		<table border=0>
			<tr><td class=A0>PROGRAMA DE BOMBEO</td></tr>
		</table>
		<table border=0>
			<tr>
				<td style="width:46%; border:0"></td>
				<td style="width:20%; border:0"></td>
				<td style="width:20%; border:0"></td>
				<td style="width:14%; border:0"></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>VOLUMEN A RECIBIR&nbsp;</td>
				<td style=text-align:left		class=A><input name=volumen_recibir type=text style="width:92.70%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>VOLUMEN FINAL ESTIMADO&nbsp;</td>
				<td style=text-align:left		class=A><input name=volumen_final type=text style="width:92.70%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>MEDIDA FINAL ESTIMADA&nbsp;</td>
				<td style=text-align:left		class=A><input name=medida_final type=text style="width:92.70%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>METROS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>RATA DE BOMBEO&nbsp;</td>
				<td style=text-align:left		class=A><input name=rata_bombeo type=text style="width:92.70%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS/HORA</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>HORA INICIACIÓN&nbsp;</td>
				<td style=text-align:left		class=A><input name=hora_inicial  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td style=text-align:left		class=A></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>HORA FINAL ESTIMADA&nbsp;</td>
				<td style=text-align:left		class=A><input name=hora_final  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td style=text-align:left		class=A></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>CUPO MÁXIMO DE RECIBO&nbsp;</td>
				<td style=text-align:left		class=A><input name=cupo_maximo type=text style="width:92.70%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td style=text-align:left		class=A>BLS BRUTOS</td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>REPRESENTANTE DE TERMINAL&nbsp;</td>
				<td colspan=3 style=text-align:left class=A><input name=representante_planta		type=text style="width:98%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td style=text-align:right	class=A>REPRESENTANTE DE POLIDUCTO&nbsp;</td>
				<td colspan=3 style=text-align:left class=A><input name=representante_poliducto	type=text style="width:98%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>
		<br>
		<hr style="width:100%; border-top:7px dashed rgba(255,112,0,1)">
		<br>
<!-- hasta aquí va la tirilla media carta -->

		<table border=0>
			<tr><td class=A0>MEDICIÓN INICIAL</td></tr>
		</table>
		<table border=1>
			<tr>
				<td style="width:20%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:21.5%; border:0"></td>
			</tr>
			<tr>
				<td colspan=4 class=A>NIVEL PRODUCTO</td>
				<td rowspan=2 class=A>TEMPERATURA °F</td>
			</tr>
			<tr>
				<td class=A>MEDIDA</td>
				<td class=A>m</td>
				<td class=A>cm</td>
				<td class=A>mm</td>
			</tr>
			<tr>
				<td class=A>NIVEL</td>
				<td class=A><input name=nivel1_mt	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel1_cm	type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel1_mm	type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td rowspan=2 class=A><input name=temperatura1	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>AGUA</td>
				<td class=A><input name=agua1_mt	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=agua1_cm	type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=agua1_mm	type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
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
				<td class=Aright>SI&nbsp;</td><td><input name=alarma_alto				type=radio value=SI required></td>
				<td class=Aright>NO&nbsp;</td><td><input name=alarma_alto				type=radio value=NO></td>
				<td></td><td></td>
				<td class=Aleft>&nbsp;&nbsp;AL PROBAR LA ALARMA NIVEL ALTO, FUNCIONÓ?</td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td><td><input name=alarma_alto_alto	type=radio value=SI required></td>
				<td class=Aright>NO&nbsp;</td><td><input name=alarma_alto_alto	type=radio value=NO></td>
				<td></td><td></td>
				<td class=Aleft>&nbsp;&nbsp;AL PROBAR LA ALARMA NIVEL ALTO-ALTO, FUNCIONÓ?</td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td><td><input name=tanque_drenaje1		type=radio value=SI required></td>
				<td class=Aright>NO&nbsp;</td><td><input name=tanque_drenaje1		type=radio value=NO></td>
				<td class=Aright>NA&nbsp;</td><td><input name=tanque_drenaje1		type=radio value=NA></td>
				<td class=Aleft>&nbsp;&nbsp;EL TANQUE DE DRENAJE QUEDÓ VACÍO?</td>
			</tr>
			<tr height=5px><td></td>
		</table>
		<hr>

		<!-- *****************************************			 CONTROL HORARIO DE BOMBEO			 ***************************************** -->
		<table border=0>
			<tr><td class=A0>CONTROL HORARIO DE BOMBEO</td></tr>
		</table>
		<table border=1>
			<tr>
				<td style="width:25.5%; border:0"></td>
				<td style="width:14.0%; border:0"></td>
				<td style="width: 9.0%; border:0"></td>
				<td style="width: 6.0%; border:0"></td>
				<td style="width: 5.5%; border:0"></td>
				<td style="width:20.0%; border:0"></td>
				<td style="width:20.0%; border:0"></td>
			</tr>
			<tr height=50px>
				<td class=A1>FECHA (DÍA)</td>
				<td class=A1>HORA (24HRS)<br>HORA : MIN</td>
				<td colspan=3>
					<table>
						<tr><td style="width:43.90%"></td><td style="width:29.30%"></td><td style="width:26.80%"></td></tr>
						<tr><td class=A1 colspan=3; border=0>NIVEL PRODUCTO</td></tr>
						<tr><td class=A1 border=0>m</td><td class=A1 border=0>cm</td><td class=A1 border=0>mm</td></tr>
					</table>
				</td>
				<td class=A1>VOL. TANQUE<br>Bls. BRUTOS</td>
				<td class=A1>CUPO<br>Bls. BRUTOS</td>
			</tr>
			<tr height=50px>
				<td class=A><input name=A1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90% required></td>
				<td class=A><input name=A2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90% required></td>
				<td class=A><input name=A3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=A31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=A32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A><input name=A4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=A5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=B1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90% required></td>
				<td class=A><input name=B2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90% required></td>
				<td class=A><input name=B3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=B31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=B32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td class=A><input name=B4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=B5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=C1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=C2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=C3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=C31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=C32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=C4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=C5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=D1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=D2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=D3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=D31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=D32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=D4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=D5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=E1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=E2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=E3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=E31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=E32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=E4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=E5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=F1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=F2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=F3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=F31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=F32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=F4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=F5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=G1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=G2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=G3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=G31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=G32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=G4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=G5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=H1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=H2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=H3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=H31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=H32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=H4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=H5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=I1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=I2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=I3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=I31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=I32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=I4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=I5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=J1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=J2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=J3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=J31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=J32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=J4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=J5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=K1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=K2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=K3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=K31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=K32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=K4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=K5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=L1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=L2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=L3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=L31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=L32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=L4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=L5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=M1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=M2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=M3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=M31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=M32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=M4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=M5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=N1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=N2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=N3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=N31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=N32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=N4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=N5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=O1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=O2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=O3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=O31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=O32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=O4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=O5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=P1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=P2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=P3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=P31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=P32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=P4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=P5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=Q1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=Q2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=Q3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=Q31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=Q32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=Q4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=Q5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=R1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=R2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=R3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=R31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=R32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=R4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=R5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=S1  type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=S2  type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=S3  type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric></td>
				<td class=A><input name=S31 type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric></td>
				<td class=A><input name=S32 type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric></td>
				<td class=A><input name=S4  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=S5  type=text style="width:90%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric></td>
			</tr>
		</table>
		<hr>
		<table border=1>
			<tr>
				<td style="width:25.0%; border:0"></td>
				<td style="width:14.0%; border:0"></td>
				<td style="width:21.0%; border:0"></td>
				<td style="width:20.0%; border:0"></td>
				<td style="width:20.0%; border:0"></td>
			</tr>
			<tr>
				<td colspan=5 class=A0>CONTROL DURANTE BOMBEO LÍNEAS NO DEDICADAS</td>
			</tr>
			<tr height=50px>
				<td class=A1>FECHA (DÍA)</td>
				<td class=A1>HORA (24HRS)<br>HORA : MIN</td>
				<td class=A1>TEMPERATURA (°F)</td>
				<td class=A1>GRAVEDAD API</td>
				<td class=A1>APARIENCIA</td>
			</tr>
			<tr height=50px>
				<td class=A><input name=T1 type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=T2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=T3 type=text style="width:90%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=T4 type=text style="width:90%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=T5 type=text style="width:90%; text-align:center" maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=U1 type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=U2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=U3 type=text style="width:90%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=U4 type=text style="width:90%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=U5 type=text style="width:90%; text-align:center" maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=50px>
				<td class=A><input name=V1 type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> style=width:90%></td>
				<td class=A><input name=V2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> style=width:90%></td>
				<td class=A><input name=V3 type=text style="width:90%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=V4 type=text style="width:90%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric></td>
				<td class=A><input name=V5 type=text style="width:90%; text-align:center" maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr>
				<td colspan=6 class=A0>MEDICIÓN FINAL</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:6%></td><td style=width:4%></td>
				<td style=width:2%></td><td style=width:78%></td>
			</tr>
			<tr>
				<td class=Aright>SI&nbsp;</td>
				<td class=A><input name=tiempo_reposo	type=radio value=SI required></td>
				<td class=Aright><!--NO&nbsp;--></td>
				<td class=A><!--<input name=tiempo_reposo	type=radio value=NO--></td>
				<td></td>
				<td class=Aleft>DESPUÉS DE LA FINALIZACIÓN DEL BOMBEO, SE HA ESPERADO EL TIEMPO DE REPOSO ESTABLECIDO EN EL PROCEDIMIENTO PARA MEDIR EL TANQUE?</td>
			</tr>
			<tr height=5px><td></td>
		</table>
		<table border=1>
			<tr>
				<td style="width:20%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:19.5%; border:0"></td>
				<td style="width:21.5%; border:0"></td>
			</tr>
			<tr>
				<td colspan=4 class=A>NIVEL PRODUCTO</td>
				<td rowspan=2 class=A>TEMPERATURA °F</td>
			</tr>
			<tr>
				<td class=A>MEDIDA</td>
				<td class=A>m</td><td class=A>cm</td><td class=A>mm</td>
			</tr>
			<tr>
				<td class=A>NIVEL</td>
				<td class=A><input name=nivel2_mt	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=nivel2_cm	type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=nivel2_mm	type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
				<td rowspan=2 class=A><input name=temperatura2	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>AGUA</td>
				<td class=A><input name=agua2_mt	type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=A><input name=agua2_cm	type=text style="width:90%; text-align:center" maxlength=2 pattern=^(?:[0-9]{0,2})$ inputmode=numeric required></td>
				<td class=A><input name=agua2_mm	type=text style="width:90%; text-align:center" maxlength=1 pattern=^(?:[0-9]{0,1})$ inputmode=numeric required></td>
			</tr>
		</table>
		<table border=1>
			<tr>
				<td style="width:25%; border:0"></td>
				<td style="width:50%; border:0"></td>
				<td style="width:30%; border:0"></td>
			</tr>
			<tr>
				<td rowspan=3 class=A>PRUEBAS ABREVIADAS DE CALIDAD</td>
				<td class=A>API OBSERVADO</td>
				<td class=A><input name=api_observado	type=text style="width:90%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>TEMPERATURA OBSERVADA (°F)</td>
				<td class=A><input name=temperatura		type=text style="width:90%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A>MARCACIÓN</td>
				<td class=A><input name=marcacion			type=text style="width:90%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
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
				<td class=Aright>SI&nbsp;</td><td class=A><input name=tanque_drenaje2 type=radio value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=Aright>NO&nbsp;</td><td class=A><input name=tanque_drenaje2 type=radio value=NO onclick=gestionarClickRadio(this)></td>
				<td class=Aright>NA&nbsp;</td><td class=A><input name=tanque_drenaje2 type=radio value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Aleft>&nbsp;&nbsp;EL TANQUE DE DRENAJE QUEDÓ VACÍO?</td>
			</tr>
			<tr height=5px><td></td>
		</table>
		<hr>

		<!-- *****************************************			 observaciones			 ***************************************** -->
		<table>
			<tr><td class=Aleft>OBSERVACIONES</td></tr>
			<tr><td><textarea name=observaciones type=text style=width:99% maxlength=500 onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
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
				<td colspan=4 class=A0>LIQUIDACIÓN FINAL DE VOLUMEN RECIBIDO<br>MEDICIÓN AUTOMÁTICA</td>
			</tr>
			<tr>
				<td class=Aright>TANQUE:</td>
				<td class=A><input name=tanque1	id=tanque1	type=text	style="text-align:left; width:100%; background-color:rgba(0,0,0,0); border:0"	readonly></td>
				<td class=Aright>PRODUCTO:</td>
				<td class=A><input name=producto1	id=producto1	type=text	style="text-align:left; width:100%; background-color:rgba(0,0,0,0); border:0"	readonly></td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:29%></td>
				<td style=width:12%></td>
				<td style=width:6.5%></td>
				<td style=width:14%></td>
				<td style=width:6.5%></td>
				<td style=width:16%></td>
				<td style=width:16%></td>
			</tr>
			<tr>
				<td colspan=5 class=A></td>
				<td class=A>INICIAL</td>
				<td class=A>FINAL</td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;1. MEDIDA NIVEL PRODUCTO</td>
				<td class=A><input name=inicial1 id=inicial1 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final1 id=final1 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;2. VOLUMEN PRODUCTO (BRUTO)</td>
				<td class=A><input name=inicial2 id=inicial2 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final2 id=final2 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;3. MEDIDA NIVEL DE AGUA</td>
				<td class=A><input name=inicial3 id=inicial3 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final3 id=final3 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;4. VOLUMEN AGUA</td>
				<td class=A><input name=inicial4 id=inicial4 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final4 id=final4 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;5. VOLUMEN PRODUCTO SIN AGUA (2-4)</td>
				<td class=A><input name=inicial5 id=inicial5 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
				<td class=A><input name=final5 id=final5 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;6. TEMPERATURA MEDIDA</td>
				<td class=A><input name=inicial6 id=inicial6 	type=text style="width:100%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final6 id=final6 	type=text style="width:100%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;7. GRAVEDAD API 60°F</td>
				<td class=A><input name=inicial7 id=inicial7 	type=text style="width:100%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final7 id=final7 	type=text style="width:100%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;8. FACTOR DE CORRECCIÓN A 60°F <span style="font-size:20px">(COEFICIENTE TABLA 6B)</span></td>
				<td class=A><input name=inicial8 id=inicial8 	type=text style="width:100%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A><input name=final8 id=final8 	type=text style="width:100%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>&nbsp;&nbsp;9.VOLUMEN PRODUCTO 60°F(5x8) (NETO)</td>
				<td class=A><input name=inicial9 id=inicial9 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
				<td class=A><input name=final9 id=final9 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>10. VOLUMEN NETO RECIBIDO EN TANQUE</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final10 id=final10 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>11. VOLUMEN ENTREGADO POR CONTADORES (VENTAS)</td>
				<td class=A><input name=inicial11 id=inicial11 	type=text style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>12. TEMPERATURA PROM. ENTREGA DE CONTADORES (°F)</td>
				<td class=A><input name=inicial12 id=inicial12 	type=text style="width:100%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
<!--		<td colspan=5 class=LAleft>13. FACTOR DE CORRECCIÓN A 60°F <span style="font-size:20px">(COEFICIENTE TABLA 6B)</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTADORES</td> -->
				<td colspan=5 class=LAleft><span style="font-size:23.35px">13. FACTOR CORRECCIÓN 60°F&nbsp;<span style="font-size:20px">(COEF. TABLA 6B)</span>&nbsp;CONTADORES</span></td>
				<td class=A><input name=inicial13 id=inicial13 	type=text style="width:100%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft><span style="font-size:23.45px">14. VOLUMEN NETO ENTREGADO POR CONTADORES (11x13)</span></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final14 id=final14 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>15. VOLUMEN NETO RECIBIDO (10+14)</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final15 id=final15 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>16. VOLUMEN TIQUETE DEL POLIDUCTO*</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final16 id=final16 	type=text onfocusout=liquidar() style="width:100%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=Aleft>17. DIFERENCIA (15-16):</td>
				<td class=Aright>FALTANTE</td>
				<td class=A style=text-align:left><input name=diferencia	type=radio value=F onclick=gestionarClickRadio(this) required></td>
				<td class=Aright>SOBRANTE</td>
				<td class=A style=text-align:left><input name=diferencia	type=radio value=S onclick=gestionarClickRadio(this)></td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A><input name=final17 id=final17 	type=text style="width:100%; background-color:rgba(0,0,0,0); text-align:center" readonly></td>
			</tr>
			<tr>
				<td colspan=5 class=Aleft>18. PORCENTAJE DE VARIACION (17/16 x 100)</td>
				<td class=A style=background-color:rgba(192,192,192,1)></td>
				<td class=A style=text-align:left>
					<input name=final18	id=final18 type=text style="width:80%; text-align:right; background-color:rgba(0,0,0,0); border:0" readonly><span style="font-size:28px; color:rgba(0,0,191,1); background-color:rgba(0,0,0,0)">%</span>
				</td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr><td colspan=7 class=Anota>NOTA: Si el porcentaje (%) de variación es mayor o igual al ±0,25%, mida nuevamente el tanque y con estos datos realice una nueva liquidación. Si el porcentaje de variación es mayor a ±0,5% una vez haya realizado el paso anterior verifique que el resultado de la liquidación es correcto e informe al supervisor.</td></tr>
		</table>
		<hr>
		<table border=1>
			<tr>
				<td class=A width=75%>MAYORISTA</td>
				<td class=A width=25%>VOLUMEN</td>
			</tr>
			<tr>
				<td class=A style="width:100%; text-align:left"><b>&nbsp;PRIMAX COLOMBIA S.A</b></td>
				<td><input name=volmayor1	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric required></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista2	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor2	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista3	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor3	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista4	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor4	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista5	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor5	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista6	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor6	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><input name=mayorista7	type=text	style="width:100%; text-align:left" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=volmayor7	type=text	style="width:100%; text-align:center"	maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$	class=ecopetrol	onkeyup=sumar_ecopetrol() inputmode=numeric></td>
			</tr>
			<tr>
				<td class=A><b>TOTAL</b></td>
				<td><span id=total_ecopetrol style="width:100%; text-align:center; font-family:Arlrdlt; font-size:34px; color:rgba(0,0,191,1); background-color:rgba(255,112,0,0.33)"></span></td>
			</tr>
		</table>
		<hr>
		<table>
			<tr><td class=Aleft>OBSERVACIONES</td></tr>
			<tr><td><textarea name=observaciones_retiro type=text style=width:99% maxlength=625 onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
		</table>
		<hr>
		<table>
			<tr height=30px><td width=39%><td width=22%><td width=39%></tr>
			<tr><td class=A>FINALIZADO POR</td><td class=A>FECHA</td><td class=A>REVISADO POR</td></tr>
			<tr>
				<td class=A><input name=finalizadopor  type=text style="width:100%; text-align:center"	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=A><input name=fecha_revision type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td class=A><input name=revisadopor		 type=text style="width:100%; text-align:center"	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table>
			<tr height=30px><td></td></tr>
			<tr style=background-color:rgba(0,240,0,0)>
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
			<tr><td><input name="usuario" id="usuario" type=text style="font-size:1px; height:1px; width:100%; color:rgba(255,0,0,0); background-color:rgba(0,0,0,0); border:0px" required></td></tr>
		</table>
		<hr>
		
		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?echo $fechaactual;?> / <?echo $horaactual;?></span>
		<input style=display:none type=text name=fecha value="<?echo $fechaactual;?> / <?echo $horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?echo number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=200>
				<td><input type=image src=../../../../../common/imagenes/grabar.png alt=Submit style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
				<td><a href=javascript:closed()><img src=../../../../../common/imagenes/regresar.png style="pointer-events:auto; width:100px; height:auto"></a></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href="mailto:<?echo $correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
					<img src=../../../../../common/imagenes/piedepagina_horizontal.svg style="pointer-events:auto; width:100%; height:auto">
					</a>
				</td>
			</tr>
		</table>
		<hr>
<!-- /10 --> 		</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->

<? if ($consec > "$ultimo_consec") {echo "system('cls');<script>setTimeout(cerrarVentana,10*60*1000); document.body.innerHTML = '$aviso_pedido';</script>";} ?>

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
</form>
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
