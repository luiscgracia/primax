<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
	select.I	{font-size:36px; font-family:Arlrdbd; width:74; height:30; text-align:center; overflow:hidden; background-color:rgba(255,0,0,1); color:rgba(255,255,255,1); border:0px; border-radius:30px}

	input[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(255,0,0,0); outline:1px solid rgba(255,112,0,1)}	
	input[type="checkbox"]								{width:10mm; height:10mm; background-color:rgba(0,0,255,1); outline:0mm solid rgba(0,0,255,0)}
	input[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
	input[type="checkbox"]:checked:before	{background:rgba(255,112,0,0)}

	input.rojo[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(255,0,0,1); outline:1px solid rgba(255,0,0,1)}	
	input.rojo[type="checkbox"]									{width:10mm; height:10mm}
	input.rojo[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
	input.rojo[type="checkbox"]:checked:before	{background:rgba(255,112,0,0)}

	input.verde[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(0,128,0,1); outline:1px solid rgba(0,128,0,1)}	
	input.verde[type="checkbox"]								{width:10mm; height:10mm}
	input.verde[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
	input.verde[type="checkbox"]:checked:before	{background:rgba(255,112,0,0)}

	input.azul[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(0,0,255,1); outline:1px solid rgba(0,0,255,1)}	
	input.azul[type="checkbox"]									{width:10mm; height:10mm}
	input.azul[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
	input.azul[type="checkbox"]:checked:before	{background:rgba(255,112,0,0)}

	input::-webkit-calendar-picker-indicator {opacity:1; background-color:rgba(0,0,0,0); color:rgba(0,255,0,1)}
	select.estado				{width:98%; height:40px; font-family:Arial; text-align:center; font-size:20px; color:white; border:0; background:red}
	select.dispositivo	{width:98%; height:10mm; font-family:Arial; text-align:left;	 font-size:32px; color:rgba(0,0,191,1); background-color:rgba(0,255,0,0.1); border:2px solid rgba(255,112,0,1); border-radius:0}
	select {-moz-appearance:none; -webkit-appearance:none; -ms-appearance:none; -o-appearance:none; appearance:none; text-indent:0.01px; text-overflow:''}

</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
	function u() {document.getElementById("usuario").value = document.getElementById("usuario1").value;}
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
<!-- 2 --> <div class=fijar style="top:30px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 -->	</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100vw; height:12050px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=VIGENTE readonly>
					<span style="font-size:36px; width:80%; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
				</td>
				<td style=background-color:rgba(255,255,0,0) rowspan=2>
					<input name=consecutivo class=consecutivo style="color:red; background-color:rgba(255,255,255,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr><td colspan=2><span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014</b></span></td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table>
			<tr><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td></tr>
			<tr><td colspan=7 class=B>&nbsp;&nbsp;<b>A. SOLICITUD</b></td></tr>
			<tr>
				<td></td>
				<td><br>FECHA<br><input name=fechaA type=date min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> autofocus required></td>
				<td></td>
				<td><br>HORA<br><input name=horaA type=time value=<?echo date("H:i");?> required></td>
				<td></td>
				<td>CERTIFICADO<br>HABILITACIÓN<input name=certhabilit class=consecutivo style=width:75% maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2>AISLAMIENTO SOLICITADO POR</td></tr>
			<tr>
				<td>EMPRESA<input name=empresaA maxlength=30 type=texto placeholder=EMPRESA	pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC"></td>
				<td>NOMBRE<input name=nombreA maxlength=30 type=texto placeholder=NOMBRE	pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC"></td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr height= 45px><td class=B>&nbsp;&nbsp;<b>B. DESCRIPCIÓN DEL TRABAJO</b></td></tr>
			<tr height=130px><td>DESCRIPCIÓN DEL TRABAJO				<textarea name=descripcion style="width:99%" maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC</textarea></td></tr>
			<tr height=130px><td>EQUIPOS A SER AISLADOS/ABIERTOS<textarea name=equipos style="width:99%" maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC</textarea></td></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=54.4%></td><td width=21.6%></td><td width=19%></td></tr>
			<tr><td colspan=4 class=B>&nbsp;&nbsp;<b>C. ACEPTACIÓN</b></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=2><input name=ejecutorC		type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--				<td><input name=fechaejecC	type=date	min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required></td>-->
<!--				<td><input name=horaejecC	type=time		min=<?echo date("H:i");?> value=<?echo date("H:i");?> required></td>-->
			</tr>
<!--			<tr><td colspan=2>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>-->
			<tr><td colspan=4 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;PERSONA AUTORIZADA PARA REALIZAR EL AISLAMIENTO/APERTURA DEL EQUIPO.</span></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td colspan=2><input name=inspectorC	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--				<td><input name=fechainspC	type=date	min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required></td>-->
<!--				<td><input name=horainspC		type=time	min=<?echo date("H:i");?> value=<?echo date("H:i");?> required></td>-->
			</tr>
<!--			<tr><td colspan=2>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>-->
			<tr><td colspan=4 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;INSPECTOR</span></td></tr>
			<tr height=15><td></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td colspan=3 class=B>Acepto la responsabilidad de realizar el AISLAMIENTO / APERTURA del equipo mencionado en la sección B.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td colspan=3 class=B>Confirmo ademas, que estoy calificado para realizar el AISLAMIENTO / APERTURA del equipo propuesto.</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=19%></td><td width=19%></td><td width=15.5%></td><td width=19.5%></td><td width=22%></td></tr>
			<tr><td colspan=6 class=B>&nbsp;&nbsp;<b>D. AUTORIZACIÓN PARA AISLAMIENTO/APERTURA DEL EQUIPO</b></td></tr>
			<tr>
				<td></td>
				<td colspan=2 rowspan=2 class=B>Se da permiso para aislar y abrir el equipo descrito en la sección B,</td>
				<td class=Br>entre las&nbsp;</td>
				<td><input name=hora1D	type=time	min=<?echo date("H:i");?> value=<?echo date("H:i");?> required></td>
				<td><input name=fecha1D	type=date	min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required></td>
			</tr>
			<tr>
				<td></td>
				<td class=Br>y las&nbsp;</td>
				<td><input name=hora2D	type=time	min=<?echo date("H:i");?> value=<?echo date("H:i");?> required></td>
				<td><input name=fecha2D	type=date	min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=5%></td><td width=20%></td><td width=20%></td><td width=14.4%></td><td width=21.6%></td><td width=19%></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=4><input name=emisorD	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--				<td><input name=fechaemisorD			type=date		min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required></td>-->
<!--				<td><input name=horaemisorD				type=time		min=<?echo date("H:i");?> value=<?echo date("H:i");?> required></td>-->
			</tr>
			<tr><td colspan=4>EMISOR</td><!--<td>FECHA</td><td>HORA</td>--></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=6.0%></td><td width=94.0%></td></tr>
			<tr><td colspan=2 class=B>&nbsp;&nbsp;<b>E. &nbsp;EQUIPO DE PROTECCIÓN PERSONAL REQUERIDO</b></td></tr>
			<tr class=C>
				<td><input name=EPP_B type=checkbox checked disabled></td>
				<td class=B>
					<b>EPP Básico:</b> Casco, gafas de seguridad, guantes de carnaza, ropa de algodón manga larga y protección auditiva (si aplica).
					<input name=otrosE maxlength=35 type=texto pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUISC">
				</td>
			</tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_CE type=checkbox checked></td><td class=B><b>EPP ESPECIAL PARA CIRCUITOS ELÉCTRICOS MAYORES A 400V:</b> Botas y guantes dieléctricos para 1000V y traje de protección Arc Flash completo.</td></tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_AE type=checkbox checked></td><td class=B><b>EPP ESPECIAL PARA APERTURA DE EQUIPOS:</b> Guantes de nitrilo, careta de protección facial y protección respiratoria para vapores orgánicos.</td></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr><td colspan=2 class=B>&nbsp;&nbsp;<b>F. DETALLES DEL AISLAMIENTO</b></td></tr>
			<tr><td></td><td class=B>Los Puntos de Aislamientos, Puntos de Verificación de Energía y Puntos de Apertura deben ser detallados en la sección (I) Cuadro de Aislamiento y Apertura de Equipo.</td></tr>
			<tr height=5><td></td></tr>
		</table>
		<table style=background-color:rgba(255,244,114,1)>	<!-- amarillo -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr height=10><td></td></tr>
			<tr>
				<td><input name=FAE1 id=FAE1 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAE1 id=fae1 value=NO type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO ELÉCTRICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAE maxlength=45 style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRA"></tr>
			<tr><td><input name=voltajeF id=menor400  value=-400	type=radio onclick=gestionarClickRadio(this) checked required></td><td colspan=5 class=B>Menor 400V</td></tr>
			<tr><td><input name=voltajeF id=menor1000 value=-1000	type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 400V - Menor 1000V</td></tr>
			<tr><td><input name=voltajeF id=mayor1000 value=1000	type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 1000V (Únicamente empresa de energía)</td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(255,250,194,1)>	<!-- amarillo suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=AE1 id=AE1 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE1 id=ae1 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Utilizar los EPPs básicos. Usar el traje de protección contra Arc Flash completo cuando se trabaje con circuitos entre 400V y 1000V.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE2 id=AE2 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE2 id=ae2 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Desenergizar el equipo<br>(interruptores, selectores, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE3 id=AE3 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE3 id=ae3 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Bloquear con candado los interruptores de los equipos a aislar. Si no es posible colocar candados, debe desconectar los cables.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE4 id=AE4 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE4 id=ae4 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Realizar prueba de intento de encendido (oprimir botón de encendido).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE5 id=AE5 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE5 id=ae5 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar energía 0 con voltímtero (0 voltios). Verificar que el voltaje nominal sea 0V entre todas las fases, y entre fases y tierra.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE6 id=AE6 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AE6 id=ae6 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Probar el correcto funcionamiento del voltímetro, verificádolo ANTES y DESPUÉS de su uso en una fuente conocida.</td>
			</tr>
		</table>
		<table style="color:white; background-color:rgba(157,152,202,1)">	<!-- púrpura -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr height=10><td></td></tr>
			<tr>
				<td><input name=FAM1 id=FAM1 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAM1 id=fam1 value=NO type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO MECÁNICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAM maxlength=45 style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRA"></tr>
				<td><input name=apequipos id=apequipos value=SI type=radio onclick=gestionarClickRadio(this) checked required></td><td colspan=2 class=B>SI</td>
				<td><input name=apequipos id=APequipos value=NO type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;REQUIERE APERTURA DE EQUIPOS?</td>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(219,217,236,1)>	<!-- púrpura suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=AM1 id=AM1 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM1 id=am1 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Utilizar los EPPs básicos. En caso de apertura de equipos, utilizar la careta de protección facial y protección respiratoria (si aplica).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM2 id=AM2 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM2 id=am2 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de aislamientos sean efectivos, y lo más cercanos posible al trabajo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM3 id=AM3 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM3 id=am3 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de verificación de energía 0 y/o drenaje son convenientes (punto más bajo).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM4 id=AM4 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM4 id=am4 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>En tuberías aisladas que tienen producto, preveer la expansión del líquido por temperatura (verificar si hay otra forma de alivio térmico o si debe sacar producto de la tubería para que haya espacio para la expansión térmica).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM5 id=AM5 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM5 id=am5 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Usar solo dispositivos de aislamiento permitidos (no se permiten válvulas de control de flujo, válvulas cheques, válvulas de alivio térmico, válvulas que operen automáticamente o remotamente, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM6 id=AM6 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=AM6 id=am6 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Usar dispositivos de Bloqueo y Etiquetado apropiados, que estén en buen estado (candados rojos de llave única, etiquetas en buen estado, cadenas o guayas metálicas, etc)</td>
			</tr>
		</table>
		<table style=background-color:rgba(210,193,186,1)>	<!-- café suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=F1 id=F1 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F1 id=f1 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Informar a todas las personas que pueden ser afectadas por el aislamiento del equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F2 id=F2 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F2 id=f2 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de aislamiento y los puntos de verificación de energía 0 sean efectivos (verificar que no haya más formas de energizar el equipo).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F3 id=F3 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F3 id=f3 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Colocar las etiquetas de los puntos de aislamiento (rojas) y los puntos de verificación de energía 0 (verdes) con su respectiva información actualizada.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F4 id=F4 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F4 id=f4 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>En los bloqueos y etiquetados de grupo, usar dispositivos multicandado, y cada líder de los grupos de trabajo involucrados coloca su propio candado y mantiene control de su llave.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F5 id=F5 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F5 id=f5 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, notificar a las personas afectadas que el equipo será reenergizado.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F6 id=F6 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F6 id=f6 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, revisar que sea seguro re-energizar el equipo. Si es un trabajo que requirió Bloqueo y Etiquetado de grupo, hacer esta revisión conjuntamente con los líderes de los otros grupos de trabajo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F7 id=F7 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F7 id=f7 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, retirar los bloqueos y las etiquetas.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F8 id=F8 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F8 id=f8 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Notificar el emisor del permiso de trabajo y solicitar autorización para la reenergizacióndel equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F9 id=F9 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F9 id=f9 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Actualizar información del Bloqueo y Etiquetado en la bitácora del registro histórico y en el cuadro de aislamiento de energía,</td>
			</tr>
		</table>
		<table style=background-color:rgba(196,216,226,1)>	<!-- azul suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=F10 id=F10 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F10 id=f10 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar que el plan de aislamiento sea efectivo (competencia de la persona autorizada, conveniencia de los puntos de aislamientos y puntos de verificación, EPP requerido, interfases con las personas afectadas, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F11 id=F11 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F11 id=f11 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar que las etiquetas de aislamiento (rojas) y las de puntos de verificación de energía (verdes) estén colocadas y con la información correcta.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F12 id=F12 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F12 id=f12 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar la efectiva desenergización y bloqueo del<br>equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F13 id=F13 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F13 id=f13 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, verificar que las personas afectadas sean informadas de la reenergización del equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F14 id=F14 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
				<td colspan=2><input name=F14 id=f14 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, inspeccionar y probar el equipo antes de renergizarlo.</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección G			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>G.</b></td><td class=B><b>RECONEXIÓN TEMPORAL PARA PRUEBAS</b><br>(SOLO PARA PRUEBAS)</td></tr>
		</table>
<!-- 4 -->		<div style="position:relative; width:29%; left:0.50%; background-color:white">
			<table border=1>
				<tr height=130px><td class=A3>RECONEXIÓN SOLICITADA POR</td></tr>
				<tr height=100px><td><textarea name=GA1 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td></tr>
				<tr height=100px><td><textarea name=GA2 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td></tr>
				<tr height=100px><td><textarea name=GA3 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td></tr>
			</table>
<!-- /4 -->		</div>
<!-- 5 -->		<div style="position:relative; width:69.75%; left:29.50%; top:-434px; background-color:white; overflow:scroll">
			<table border=1 bordercolor=#ff7000>
				<tr>
					<td style=width:200px></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:200px></td>
				</tr>
				<tr height=65px>
					<td class=A2 rowspan=2 style="font-size:22px">SUSPENDIÓ LOS TRABAJOS RELACIONADOS?</td>
					<td class=A2 colspan=2>RECONEXIÓN</td>
					<td class=A2 colspan=2>RE-AISLAMIENTO</td>
					<td class=A2 rowspan=2 style="font-size:22px">INFORMÓ A LAS PERSONAS QUE PUEDEN VERSE AFECTADAS?</td>
				</tr>
				<tr height=65px>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB1 id=GB1 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB1 id=gb1 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC1 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GD1	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GE1	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td><textarea name=GF1 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GG1	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GH1	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI1 id=GI1 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI1 id=gi1 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB2 id=GB2 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB2 id=gb2 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC2 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GD2	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GE2	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td><textarea name=GF2 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GG2	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GH2	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI2 id=GI2 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI2 id=gi2 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB3 id=GB3 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB3 id=gb3 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC3 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GD3	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GE3	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td><textarea name=GF3 maxlength=20 style="width:99%" onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA P</textarea></td>
					<td>
						<input name=GG3	type=date  min=<?echo $fechamin;?> max=<?echo $fechamax;?> value=<?echo $fechaactual;?> required>
						<input name=GH3	type=time	 min=<?echo date("H:i");?> value=<?echo date("H:i");?> required>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI3 id=GI3 value=SI type=radio onclick=gestionarClickRadio(this) checked required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI3 id=gi3 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
			</table>
<!-- /5 -->		</div>

		<!-- *****************************************			 RETIRO			 ***************************************** -->
		<!-- *****************************************			 RETIRO			 ***************************************** -->
<!-- 6 -->		<div style="position:relative; top:-434px; background-color:white">
			<hr>
		<!-- *****************************************			 sección H			 ***************************************** -->
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=5.0%></td><td width=95.0%></td></tr>
				<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>H.</b></td><td class=B><b>DETALLES DE LA APERTURA DEL EQUIPO</b></td></tr>
			<tr height=15><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=1%></td><td width=38%></td><td width=61%></td></tr>
				<tr>
					<td></td>
					<td class=B><b>EQUIPO A SER ABIERTO</b></td>
					<td><input name=H1 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr>
					<td></td>
					<td class=B>PRODUCTO CONTENIDO (Revisar y anexar MSDS)</td>
					<td><input name=H2 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=48%></td><td width=52%></td></tr>
				<tr>
					<td class=Bc>CANTIDAD DE PRODUCTO<br>ESPERADO EN EL DRENAJE</td>
					<td class=Bc>CAPACIDAD DE LOS RECIPIENTES<br>PARA RECOGER EL PRODUCTO</td>
				</tr>
				<tr>
					<td><input name=H3 type=text style="width:40%; text-align:center; background-color:white" maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value=88.88 required> GLS</td>
					<td><input name=H4 type=text style="width:40%; text-align:center; background-color:white" maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value=88.88 required> GLS</td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=1%></td><td width=99%></td></tr>
				<tr height=137>
					<td></td>
					<td class=B>MEDIDAS PARA REMOVER EL PRODUCTO RECOGIDO DEL ÁREA DE TRABAJO, PARA MINIMIZAR LA EXPOSICIÓN.<textarea name=H5 style="width:99%; background-color:white" maxlength=60 type=text onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABC</textarea></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr height=137>
					<td></td>
					<td class=B>PRECAUCIONES ADICIONALES<textarea name=H6 style="width:99%; background-color:white" maxlength=105 type=text onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRA</textarea></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
				<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
				<tr class=C>
					<td colspan=1><input name=H7 id=H7 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H7 id=h7 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Señalizar y controlar el área de trabajo. Permiten los factores externos efectuar el trabajo con seguridad? (Dirección viento, trabajos, etc).</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H8 id=H8 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H8 id=h8 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Suspender todos los trabajos en caliente (fuentes de ignición) cercanos al área de trabajo?.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H9 id=H9 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H9 id=h9 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Tener listo y disponible los equipos de emergencia (extintores, SCI, botiquín de primeros auxilios, kit de derrames, duchas y lavaojos, etc).</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H10 id=H10 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H10 id=h10 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de aislamiento (mecánicos y eléctricos) son efectivos, estén bloqueados y señalizados con etiquetas rojas.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H11 id=H11 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H11 id=h11 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de verificación de energía 0 son efectivos, estén abiertos y señalizados con etiquetas verdes.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H12 id=H12 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H12 id=h12 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de apertura de equipo sean convenientes y señalizados con etiquetas moradas.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H13 id=H13 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H13 id=h13 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Utilizar los EPPs requeridos. Utilizar la protección respiratoria requerida y la careta de protección facial durante la primera apertura del equipo.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H14 id=H14 value=SI type=radio onclick=gestionarClickRadio(this) checked required></td>
					<td colspan=2><input name=H14 id=h14 value=NA type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Proceder con la apertura del equipo, una vez se verifique la energía 0 (en el punto más bajo del sistema).</td>
				</tr>
				<tr height=15><td></td></tr>
			</table>
		<!-- *****************************************			 sección I			 ***************************************** -->
			<table>
				<tr height=15><td width=5.0%></td><td width=95.0%></td></tr>
				<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>I.</b></td><td class=B><b>CUADRO DE AISLAMIENTO Y APERTURA DE EQUIPOS</b></td></tr>
				<tr><td></td><td class=B>Este documento es requerido para hacer seguimiento a la ubicación de los Puntos de Aislamiento de Energía/Apertura de Equipo incluyendo los Dispositivos de Aislamiento de Energía (DAE), Puntos de Verificación de Energía (PVE) y Puntos de Apertura de Equipos de Proceso (AEP).&nbsp;&nbsp;CUADRO # <input name=cuadro maxlength=6 style="width:120px; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td></tr>
				<tr height=15><td></td></tr>
			</table>
			<table>
				<tr height=100><td>DESCRIPCIÓN DE LA TAREA<textarea name=descripcionI style="width:99%" maxlength=55 type=text onkeyup=mayuscula(this) pattern=.{1,} required>LUIS CARLOS GRACIA PUENTES ABCLUIS CARLOS GRACIA PUENTE</textarea></td></tr>
				<tr height=100><td>PERSONA AUTORIZADA<input name=autorizadoI maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC"></td></tr>
			</table>
<!-- 7 -->		<div style="position:relative; width:9%; left:0.50%; background-color:white">
			<table border=1>
				<tr height=130px><td class=A2 style=background-color:white>PASO #</td></tr>
				<tr height=70px><td><input name=IA1  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=1  required></td></tr>
				<tr height=70px><td><input name=IA2  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=2  required></td></tr>
				<tr height=70px><td><input name=IA3  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=3  required></td></tr>
				<tr height=70px><td><input name=IA4  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=4  required></td></tr>
				<tr height=70px><td><input name=IA5  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=5  required></td></tr>
				<tr height=70px><td><input name=IA6  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=6  required></td></tr>
				<tr height=70px><td><input name=IA7  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=7  required></td></tr>
				<tr height=70px><td><input name=IA8  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=8  required></td></tr>
				<tr height=70px><td><input name=IA9  style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=9  required></td></tr>
				<tr height=70px><td><input name=IA10 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=10 required></td></tr>
				<tr height=70px><td><input name=IA11 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=11 required></td></tr>
				<tr height=70px><td><input name=IA12 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=12 required></td></tr>
				<tr height=70px><td><input name=IA13 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=13 required></td></tr>
				<tr height=70px><td><input name=IA14 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=14 required></td></tr>
				<tr height=70px><td><input name=IA15 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=15 required></td></tr>
				<tr height=70px><td><input name=IA16 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=16 required></td></tr>
				<tr height=70px><td><input name=IA17 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=17 required></td></tr>
				<tr height=70px><td><input name=IA18 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=18 required></td></tr>
				<tr height=70px><td><input name=IA19 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=19 required></td></tr>
				<tr height=70px><td><input name=IA20 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=20 required></td></tr>
				<tr height=70px><td><input name=IA21 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=21 required></td></tr>
				<tr height=70px><td><input name=IA22 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=22 required></td></tr>
				<tr height=70px><td><input name=IA23 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=23 required></td></tr>
				<tr height=70px><td><input name=IA24 style="width:60%; text-align:center; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=24 required></td></tr>
				<tr height=70px><td>NOTAS</td></tr>
			</table>
<!-- /7 -->		</div>
<!-- 8 -->		<div style="position:relative; width:89.75%; left:9.50%; top:-1884px; background-color:white; overflow:scroll">
			<table border=1 bordercolor=#ff7000>
				<tr>
					<td style=width:80px></td><td style=width:120px></td><td style=width:80px></td><td style=width:100px></td><td style=width:80px></td>
					<td style=width:280px></td>
					<td style=width:280px></td>
					<td style=width:140px></td>
					<td style=width:280px></td><td style=width:205px></td>
					<td style=width:280px></td><td style=width:205px></td>
				</tr>
				<tr height=65px>
					<td class=A2 colspan=5 rowspan=1 style=background-color:white>TIPO</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>DISPOSITIVO (**)</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>UBICACIÓN</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>#<br>ETIQUETA / CANDADO</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>INSTALACIÓN</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>RETIRO</td>
				</tr>
				<tr height=65px>
					<td class=A2 style="background-color:#ff0000;	color:white; border:2px solid white; font-size:20px">DAE</td>
					<td class=A2 style="background-color:#ff0000;	color:white; border:2px solid white; font-size:20px">ESTADO (*)</td>
					<td class=A2 style="background-color:#008000;	color:white; border:2px solid white; font-size:20px">PVE</td>
					<td class=A2 style="background-color:#008000;	color:white; border:2px solid white; font-size:20px">PUNTO DE PASO</td>
					<td class=A2 style="background-color:#0000ff;	color:white; border:2px solid white; font-size:20px">AEP</td>
					<td class=A2 style="background-color:white">INSTALADO POR</td><td class=A2 style="background-color:white">FECHA</td>
					<td class=A2 style="background-color:white">RETIRADO POR</td><td class=A2 style="background-color:white">FECHA</td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB1 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC1 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID1 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE1 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF1 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG1 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH1 type=texto maxlength=15 pattern=.{1,} value="GERMAN SARMIENT" onkeyup=mayuscula(this) required></td>
					<td><input name=II1 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ1 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK1	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL1 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM1	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB2 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC2 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID2 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE2 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF2 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG2 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH2 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II2 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ2 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK2	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL2 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM2	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB3 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC3 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID3 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE3 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF3 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG3 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH3 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II3 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ3 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK3	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL3 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM3	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB4 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC4 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID4 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE4 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF4 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG4 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH4 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II4 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ4 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK4	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL4 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM4	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB5 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC5 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID5 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE5 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF5 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG5 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH5 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II5 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ5 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK5	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL5 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM5	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB6 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC6 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID6 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE6 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF6 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG6 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH6 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II6 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ6 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK6	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL6 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM6	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB7 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC7 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID7 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE7 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF7 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG7 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH7 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II7 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ7 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK7	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL7 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM7	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB8 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC8 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID8 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE8 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF8 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG8 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH8 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II8 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ8 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK8	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL8 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM8	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB9 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC9 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID9 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE9 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF9 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG9 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH9 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II9 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ9 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK9	type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL9 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM9	type=date	 max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB10 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC10 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID10 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE10 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF10 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG10 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH10 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II10 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ10 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK10 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL10 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM10 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB11 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC11 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID11 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE11 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF11 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG11 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH11 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II11 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ11 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK11 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL11 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM11 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB12 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC12 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID12 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE12 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF12 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG12 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH12 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II12 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ12 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK12 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL12 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM12 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB13 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC13 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID13 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE13 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF13 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG13 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH13 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II13 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ13 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK13 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL13 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM13 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB14 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC14 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID14 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE14 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF14 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG14 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH14 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II14 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ14 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK14 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL14 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM14 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB15 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC15 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID15 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE15 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF15 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG15 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH15 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II15 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ15 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK15 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL15 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM15 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB16 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC16 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID16 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE16 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF16 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG16 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH16 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II16 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ16 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK16 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL16 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM16 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB17 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC17 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID17 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE17 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF17 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG17 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH17 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II17 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ17 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK17 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL17 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM17 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB18 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC18 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID18 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE18 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF18 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG18 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH18 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II18 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ18 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK18 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL18 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM18 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB19 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC19 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID19 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE19 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF19 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG19 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH19 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II19 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ19 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK19 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL19 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM19 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB20 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC20 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID20 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE20 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF20 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG20 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH20 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II20 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ20 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK20 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL20 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM20 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB21 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC21 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID21 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE21 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF21 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG21 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH21 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II21 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ21 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK21 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL21 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM21 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB22 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC22 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID22 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE22 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF22 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG22 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH22 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II22 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ22 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK22 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL22 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM22 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB23 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC23 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID23 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE23 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF23 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG23 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH23 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II23 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ23 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK23 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL23 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM23 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB24 class=rojo type=checkbox checked></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC24 class=estado required>
							<option value="" disabled selected></option>
							<option value=A selected>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID24 class=verde type=checkbox checked></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE24 class=verde type=checkbox checked></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF24 class=azul  type=checkbox checked></td>
					<td>
						<select name=IG24 class=dispositivo required>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO" selected>	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH24 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=II24 maxlength=6 style="width:86%; text-align:center" pattern=^(?:[0-9]{4,6})$ inputmode=numeric value=888888 required></td>
					<td><input name=IJ24 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IK24 type=date  max=<?echo $fechamax;?> value='2025-01-01' required></td>
					<td><input name=IL24 type=texto maxlength=15 pattern=.{1,} value="LUIS CARLOS GRA" onkeyup=mayuscula(this) required></td>
					<td><input name=IM24 type=date	max=<?echo $fechamax;?> value='2025-01-01' required></td>
				</tr>
				<tr>
					<td colspan=12 style="height:70px; text-align:left; font-size:28px">
						*Estado de DAE: A=Abierto, C=Cerrado, E=Aislado eléctricamente, D=Desconectado (Brida ciega / Ciego de paleta), O=Otro (especificar)<br>
						**Dispositivo: Eléctrico, Válvula, Brida ciega / Ciego de paleta, Otro (especificar)
					</td>
				</tr>
			</table>
<!-- /8 -->		</div>
<!-- 9 -->		<div style="position:absolute; top:3960px">
		<!-- *****************************************			 sección J			 ***************************************** -->
		<table>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr height=30px><td colspan=2><hr></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>J.</b></td><td class=B><b>REPRESENTACIÓN VISUAL DEL<br>PLAN DE AISLAMIENTO DE ENERGÍA Y APERTURA DE EQUIPO</b></td></tr>
			<tr height=10><td></td></tr>
			<!--<tr><td colspan=2><textarea name=D style="width:96%; height:500px; background-color:white; border:5px solid rgba(225,112,0,1); border-radius:25px" readonly></textarea></td></tr>-->
			<tr><td colspan=2><img style="width:96% ; height:auto; opacity:0.1" src="../../../../../common/imagenes/logos_seguridad_industrial.svg"></td></tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección K			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;K. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que el Aislamiento de Energía y la Apertura del Equipo amparado por este permiso:</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:5%></td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoA value=A onclick=gestionarClickRadio(this) checked required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoB value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoC value=C onclick=gestionarClickRadio(this)></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no ha<br> &nbsp;terminado y el área ha<br> &nbsp;quedado en condiciones<br> &nbsp;de seguridad.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorK		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--				<td><input name=fechaejecK	type=date  class=mostrarfecha value=<?echo $fechaactual;?> readonly required></td>-->
<!--				<td><input name=horaejecK		type=time  min=<?echo date('H:i');?> value=<?echo date('H:i');?> required></td>-->
			</tr>
			<tr><td>EJECUTOR</td><td></td><td></td></tr>
			<tr><td colspan=3 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;PERSONA AUTORIZADA QUE REALIZÓ EL AISLAMIENTO/APERTURA DEL EQUIPO.</span></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorK	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--				<td><input name=fechainspK	type=date  class=mostrarfecha value=<?echo $fechaactual;?> readonly required></td>-->
<!--				<td><input name=horainspK		type=time  min=<?echo date('H:i');?> value=<?echo date('H:i');?> required></td>-->
			</tr>
			<tr><td>INSPECTOR</td><td></td><td></td></tr>
				<tr height=30><td></td></tr>
				<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
				<tr>
					<td><input name=emisorK				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value="LUIS CARLOS GRACIA PUENTES ABC" required></td>
<!--					<td><input name=fechaemisorK	type=date  class=mostrarfecha value=<?echo $fechaactual;?> readonly required></td>-->
					<td></td>
					<td><input name=horaemisorK		type=time  min=<?echo date('H:i');?> value=<?echo date('H:i');?> required></td>
				</tr>
				<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
			</table>

		<!-- *****************************************			 sección xxx			 ***************************************** -->
			<table>
				<tr><td><hr></td></tr>
				<tr height=25><td></td></tr>
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
				<tr><td><input name="usuario" id="usuario" type=text style="height:1px; width:1%; background-color:rgba(0,0,0,0); border:0px" required></td></tr>
				<tr height=25><td></td></tr>
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
			<tr><td colspan=2><hr></td></tr>
		</table>
<!-- /9 --> 	</div>
<!-- /6 --> 	</div>
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
<!-- /1 --> 	</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
