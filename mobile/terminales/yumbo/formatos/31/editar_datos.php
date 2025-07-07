<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
	function u() {document.getElementById("usuario").value = document.getElementById("usuario1").value;}
</script>
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
<!-- 2 --> <div class=fijar style='top:15px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw; height:12000px'>
		<table style='background-color:rgba(255,255,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:70%; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
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
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table>
			<tr><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td></tr>
			<tr><td colspan=7 class=B>&nbsp;&nbsp;<b>A. SOLICITUD</b></td></tr>
			<tr>
				<td></td>
				<td><br>FECHA<br><input name=fechaA type=date min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fechaA]' autofocus required></td>
				<td></td>
				<td><br>HORA<br><input name=horaA type=time value='$row[horaA]' required></td>
				<td></td>
				<td>CERTIFICADO<br>HABILITACIÓN<input name=certhabilit class=consecutivo style=width:75% maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[certhabilit]' required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2>AISLAMIENTO SOLICITADO POR</td></tr>
			<tr>
				<td>EMPRESA<input name=empresaA maxlength=30 type=texto placeholder=EMPRESA	pattern=.{1,} onkeyup=mayuscula(this) value='$row[empresaA]' required></td>
				<td>NOMBRE<input name=nombreA maxlength=30 type=texto placeholder=NOMBRE	pattern=.{1,} onkeyup=mayuscula(this) value='$row[nombreA]' required></td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr height= 45px><td class=B>&nbsp;&nbsp;<b>B. DESCRIPCIÓN DEL TRABAJO</b></td></tr>
			<tr height=130px><td>DESCRIPCIÓN DEL TRABAJO				<textarea name=descripcion style=width:99% maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion]</textarea></td></tr>
			<tr height=130px><td>EQUIPOS A SER AISLADOS/ABIERTOS<textarea name=equipos style=width:99% maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required>$row[equipos]</textarea></td></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=54.4%></td><td width=21.6%></td><td width=19%></td></tr>
			<tr><td colspan=4 class=B>&nbsp;&nbsp;<b>C. ACEPTACIÓN</b></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=2><input name=ejecutorC		type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[ejecutorC]' required></td>
<!--				<td><input name=fechaejecC	type=date	min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fechaejecC]' required></td>-->
<!--				<td><input name=horaejecC	type=time		min=<?echo date('H:i');?> value='$row[horaejecC]' required></td>-->
			</tr>
<!--			<tr><td colspan=2>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>-->
			<tr><td colspan=4 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;PERSONA AUTORIZADA PARA REALIZAR EL AISLAMIENTO/APERTURA DEL EQUIPO.</span></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td colspan=2><input name=inspectorC	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[inspectorC]' required></td>
<!--				<td><input name=fechainspC	type=date	min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fechainspC]' required></td>-->
<!--				<td><input name=horainspC		type=time	min=<?echo date('H:i');?> value='$row[horainspC]' required></td>-->
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
				<td><input name=hora1D	type=time	value='$row[hora1D]' required></td>
				<td><input name=fecha1D	type=date	min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fecha1D]' required></td>
			</tr>
			<tr>
				<td></td>
				<td class=Br>y las&nbsp;</td>
				<td><input name=hora2D	type=time	value='$row[hora2D]' required></td>
				<td><input name=fecha2D	type=date	min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fecha2D]' required></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=5%></td><td width=20%></td><td width=20%></td><td width=14.4%></td><td width=21.6%></td><td width=19%></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=4><input name=emisorD	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[emisorD]' required></td>
<!--				<td><input name=fechaemisorD			type=date		min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[fechaemisorD]' required></td>-->
<!--				<td><input name=horaemisorD				type=time		min=<?echo date('H:i');?> value='$row[horaemisorD]' required></td>-->
			</tr>
			<tr><td colspan=4>EMISOR</td><!--<td>FECHA</td><td>HORA</td>--></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=6.0%></td><td width=94.0%></td></tr>
			<tr><td colspan=2 class=B>&nbsp;&nbsp;<b>E. &nbsp;EQUIPO DE PROTECCIÓN PERSONAL REQUERIDO</b></td></tr>
			<tr class=C>
				<td><input name=EPP_B type=checkbox "; if ($row['EPP_B'] == 'on') {echo 'checked';} echo " disabled></td>
				<td class=B>
					<b>EPP Básico:</b> Casco, gafas de seguridad, guantes de carnaza, ropa de algodón manga larga y protección auditiva (si aplica).
					<input name=otrosE maxlength=35 type=texto pattern=.{1,} onkeyup=mayuscula(this) value='$row[otrosE]'>
				</td>
			</tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_CE type=checkbox "; if ($row['EPP_CE'] == 'on') {echo 'checked';} echo "></td><td class=B><b>EPP ESPECIAL PARA CIRCUITOS ELÉCTRICOS MAYORES A 400V:</b> Botas y guantes dieléctricos para 1000V y traje de protección Arc Flash completo.</td></tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_AE type=checkbox "; if ($row['EPP_AE'] == 'on') {echo 'checked';} echo "></td><td class=B><b>EPP ESPECIAL PARA APERTURA DE EQUIPOS:</b> Guantes de nitrilo, careta de protección facial y protección respiratoria para vapores orgánicos.</td></tr>
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
				<td><input name=FAE1 id=FAE1 value=SI "; if ($row['FAE1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAE1 id=fae1 value=NO "; if ($row['FAE1'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO ELÉCTRICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAE maxlength=45 style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value='$row[equiposAE]' required></tr>
			<tr><td><input name=voltajeF id=menor400  value=-400	"; if ($row['voltajeF'] == '-400')	{echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td><td colspan=5 class=B>Menor 400V</td></tr>
			<tr><td><input name=voltajeF id=menor1000 value=-1000	"; if ($row['voltajeF'] == '-1000')	{echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 400V - Menor 1000V</td></tr>
			<tr><td><input name=voltajeF id=mayor1000 value=1000	"; if ($row['voltajeF'] == '1000')	{echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 1000V (Únicamente empresa de energía)</td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(255,250,194,1)>	<!-- amarillo suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=AE1 id=AE1 value=SI "; if ($row['AE1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE1 id=ae1 value=NA "; if ($row['AE1'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Utilizar los EPPs básicos. Usar el traje de protección contra Arc Flash completo cuando se trabaje con circuitos entre 400V y 1000V.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE2 id=AE2 value=SI "; if ($row['AE2'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE2 id=ae2 value=NA "; if ($row['AE2'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Desenergizar el equipo<br>(interruptores, selectores, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE3 id=AE3 value=SI "; if ($row['AE3'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE3 id=ae3 value=NA "; if ($row['AE3'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Bloquear con candado los interruptores de los equipos a aislar. Si no es posible colocar candados, debe desconectar los cables.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE4 id=AE4 value=SI "; if ($row['AE4'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE4 id=ae4 value=NA "; if ($row['AE4'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Realizar prueba de intento de encendido (oprimir botón de encendido).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE5 id=AE5 value=SI "; if ($row['AE5'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE5 id=ae5 value=NA "; if ($row['AE5'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar energía 0 con voltímtero (0 voltios). Verificar que el voltaje nominal sea 0V entre todas las fases, y entre fases y tierra.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AE6 id=AE6 value=SI "; if ($row['AE6'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AE6 id=ae6 value=NA "; if ($row['AE6'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Probar el correcto funcionamiento del voltímetro, verificádolo ANTES y DESPUÉS de su uso en una fuente conocida.</td>
			</tr>
		</table>
		<table style='color:white; background-color:rgba(157,152,202,1)'>	<!-- púrpura -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr height=10><td></td></tr>
			<tr>
				<td><input name=FAM1 id=FAM1 value=SI "; if ($row['FAM1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAM1 id=fam1 value=NO "; if ($row['FAM1'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO MECÁNICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAM maxlength=45 style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value='$row[equiposAM]' required></tr>
				<td><input name=apequipos id=apequipos value=SI "; if ($row['apequipos'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td><td colspan=2 class=B>SI</td>
				<td><input name=apequipos id=APequipos value=NO "; if ($row['apequipos'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;REQUIERE APERTURA DE EQUIPOS?</td>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(219,217,236,1)>	<!-- púrpura suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=AM1 id=AM1 value=SI "; if ($row['AM1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM1 id=am1 value=NA "; if ($row['AM1'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Utilizar los EPPs básicos. En caso de apertura de equipos, utilizar la careta de protección facial y protección respiratoria (si aplica).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM2 id=AM2 value=SI "; if ($row['AM2'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM2 id=am2 value=NA "; if ($row['AM2'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de aislamientos sean efectivos, y lo más cercanos posible al trabajo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM3 id=AM3 value=SI "; if ($row['AM3'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM3 id=am3 value=NA "; if ($row['AM3'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de verificación de energía 0 y/o drenaje son convenientes (punto más bajo).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM4 id=AM4 value=SI "; if ($row['AM4'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM4 id=am4 value=NA "; if ($row['AM4'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>En tuberías aisladas que tienen producto, preveer la expansión del líquido por temperatura (verificar si hay otra forma de alivio térmico o si debe sacar producto de la tubería para que haya espacio para la expansión térmica).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM5 id=AM5 value=SI "; if ($row['AM5'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM5 id=am5 value=NA "; if ($row['AM5'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Usar solo dispositivos de aislamiento permitidos (no se permiten válvulas de control de flujo, válvulas cheques, válvulas de alivio térmico, válvulas que operen automáticamente o remotamente, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=AM6 id=AM6 value=SI "; if ($row['AM6'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=AM6 id=am6 value=NA "; if ($row['AM6'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Usar dispositivos de Bloqueo y Etiquetado apropiados, que estén en buen estado (candados rojos de llave única, etiquetas en buen estado, cadenas o guayas metálicas, etc)</td>
			</tr>
		</table>
		<table style=background-color:rgba(210,193,186,1)>	<!-- café suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=F1 id=F1 value=SI "; if ($row['F1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F1 id=f1 value=NA "; if ($row['F1'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Informar a todas las personas que pueden ser afectadas por el aislamiento del equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F2 id=F2 value=SI "; if ($row['F2'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F2 id=f2 value=NA "; if ($row['F2'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Cerciorarse que los puntos de aislamiento y los puntos de verificación de energía 0 sean efectivos (verificar que no haya más formas de energizar el equipo).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F3 id=F3 value=SI "; if ($row['F3'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F3 id=f3 value=NA "; if ($row['F3'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Colocar las etiquetas de los puntos de aislamiento (rojas) y los puntos de verificación de energía 0 (verdes) con su respectiva información actualizada.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F4 id=F4 value=SI "; if ($row['F4'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F4 id=f4 value=NA "; if ($row['F4'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>En los bloqueos y etiquetados de grupo, usar dispositivos multicandado, y cada líder de los grupos de trabajo involucrados coloca su propio candado y mantiene control de su llave.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F5 id=F5 value=SI "; if ($row['F5'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F5 id=f5 value=NA "; if ($row['F5'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, notificar a las personas afectadas que el equipo será reenergizado.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F6 id=F6 value=SI "; if ($row['F6'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F6 id=f6 value=NA "; if ($row['F6'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, revisar que sea seguro re-energizar el equipo. Si es un trabajo que requirió Bloqueo y Etiquetado de grupo, hacer esta revisión conjuntamente con los líderes de los otros grupos de trabajo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F7 id=F7 value=SI "; if ($row['F7'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F7 id=f7 value=NA "; if ($row['F7'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, retirar los bloqueos y las etiquetas.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F8 id=F8 value=SI "; if ($row['F8'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F8 id=f8 value=NA "; if ($row['F8'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Notificar el emisor del permiso de trabajo y solicitar autorización para la reenergizacióndel equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F9 id=F9 value=SI "; if ($row['F9'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F9 id=f9 value=NA "; if ($row['F9'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Actualizar información del Bloqueo y Etiquetado en la bitácora del registro histórico y en el cuadro de aislamiento de energía,</td>
			</tr>
		</table>
		<table style=background-color:rgba(196,216,226,1)>	<!-- azul suave -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
			<tr class=C>
				<td colspan=1><input name=F10 id=F10 value=SI "; if ($row['F10'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F10 id=f10 value=NA "; if ($row['F10'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar que el plan de aislamiento sea efectivo (competencia de la persona autorizada, conveniencia de los puntos de aislamientos y puntos de verificación, EPP requerido, interfases con las personas afectadas, etc).</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F11 id=F11 value=SI "; if ($row['F11'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F11 id=f11 value=NA "; if ($row['F11'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar que las etiquetas de aislamiento (rojas) y las de puntos de verificación de energía (verdes) estén colocadas y con la información correcta.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F12 id=F12 value=SI "; if ($row['F12'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F12 id=f12 value=NA "; if ($row['F12'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Verificar la efectiva desenergización y bloqueo del<br>equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F13 id=F13 value=SI "; if ($row['F13'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F13 id=f13 value=NA "; if ($row['F13'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, verificar que las personas afectadas sean informadas de la reenergización del equipo.</td>
			</tr>
			<tr class=C>
				<td colspan=1><input name=F14 id=F14 value=SI "; if ($row['F14'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
				<td colspan=2><input name=F14 id=f14 value=NA "; if ($row['F14'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
				<td colspan=3 class=B>Una vez termine el trabajo, inspeccionar y probar el equipo antes de renergizarlo.</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección G			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>G.</b></td><td class=B><b>RECONEXIÓN TEMPORAL PARA PRUEBAS</b><br>(SOLO PARA PRUEBAS)</td></tr>
		</table>
<!-- 4 -->		<div style='position:relative; width:29%; left:0.50%; background-color:white'>
			<table border=1>
				<tr height=130px><td class=A3>RECONEXIÓN SOLICITADA POR</td></tr>
				<tr height=100px><td><textarea name=GA1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[GA1]</textarea></td></tr>
				<tr height=100px><td><textarea name=GA2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GA2]</textarea></td></tr>
				<tr height=100px><td><textarea name=GA3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GA3]</textarea></td></tr>
			</table>
<!-- /4 -->		</div>
<!-- 5 -->		<div style='position:relative; width:69.75%; left:29.50%; top:-434px; background-color:white; overflow:scroll'>
			<table border=1 bordercolor=#ff7000>
				<tr>
					<td style=width:200px></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:200px></td>
				</tr>
				<tr height=65px>
					<td class=A2 rowspan=2 style=font-size:22px>SUSPENDIÓ LOS TRABAJOS RELACIONADOS?</td>
					<td class=A2 colspan=2>RECONEXIÓN</td>
					<td class=A2 colspan=2>RE-AISLAMIENTO</td>
					<td class=A2 rowspan=2 style=font-size:22px>INFORMÓ A LAS PERSONAS QUE PUEDEN VERSE AFECTADAS?</td>
				</tr>
				<tr height=65px>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB1 id=GB1 value=SI "; if ($row['GB1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB1 id=gb1 value=NO "; if ($row['GB1'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[GC1]</textarea></td>
					<td>
						<input name=GD1	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GD1]' required>
						<input name=GE1	type=time	 value='$row[GE1]' required>
					</td>

					<td><textarea name=GF1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[GF1]</textarea></td>
					<td>
						<input name=GG1	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GG1]' required>
						<input name=GH1	type=time	 value='$row[GH1]' required>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI1 id=GI1 value=SI "; if ($row['GI1'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI1 id=gi1 value=NO "; if ($row['GI1'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB2 id=GB2 value=SI "; if ($row['GB2'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB2 id=gb2 value=NO "; if ($row['GB2'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GC2]</textarea></td>
					<td>
						<input name=GD2	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GD2]'>
						<input name=GE2	type=time	 value='$row[GE2]'>
					</td>

					<td><textarea name=GF2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GF2]</textarea></td>
					<td>
						<input name=GG2	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GG2]'>
						<input name=GH2	type=time	 value='$row[GH2]'>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI2 id=GI2 value=SI "; if ($row['GI2'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI2 id=gi2 value=NO "; if ($row['GI2'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB3 id=GB3 value=SI "; if ($row['GB3'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB3 id=gb3 value=NO "; if ($row['GB3'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GC3]</textarea></td>
					<td>
						<input name=GD3	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GD3]'>
						<input name=GE3	type=time	 value='$row[GE3]'>
					</td>

					<td><textarea name=GF3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[GF3]</textarea></td>
					<td>
						<input name=GG3	type=date  min='<?echo $fechamin;?>' max='<?echo $fechamax;?>' value='$row[GG3]'>
						<input name=GH3	type=time	 value='$row[GH3]'>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI3 id=GI3 value=SI "; if ($row['GI3'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI3 id=gi3 value=NO "; if ($row['GI3'] == 'NO') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
			</table>
<!-- /5 -->		</div>

		<!-- *****************************************			 RETIRO			 ***************************************** -->
		<!-- *****************************************			 RETIRO			 ***************************************** -->
<!-- 6 -->		<div style='position:relative; top:-434px; background-color:white'>
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
					<td><input name=H1 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value='$row[H1]' required></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr>
					<td></td>
					<td class=B>PRODUCTO CONTENIDO (Revisar y anexar MSDS)</td>
					<td><input name=H2 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value='$row[H2]' required></td>
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
					<td><input name=H3 type=text style='width:40%; text-align:center; background-color:white' maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value='$row[H3]' required> GLS</td>
					<td><input name=H4 type=text style='width:40%; text-align:center; background-color:white' maxlength=5 pattern=^(([0-9]){1,2}?(.\d)?(\d)?)$ inputmode=numeric value='$row[H4]' required> GLS</td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=1%></td><td width=99%></td></tr>
				<tr height=137>
					<td></td>
					<td class=B>MEDIDAS PARA REMOVER EL PRODUCTO RECOGIDO DEL ÁREA DE TRABAJO, PARA MINIMIZAR LA EXPOSICIÓN.<textarea name=H5 style='width:99%; background-color:white' maxlength=60 type=text onkeyup=mayuscula(this) pattern=.{1,} required>$row[H5]</textarea></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr height=137>
					<td></td>
					<td class=B>PRECAUCIONES ADICIONALES<textarea name=H6 style='width:99%; background-color:white' maxlength=105 type=text onkeyup=mayuscula(this) pattern=.{1,}>$row[H6]</textarea></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
				<tr><td>SI</td><td colspan=2>NA</td><td colspan=3>DESCRIPCIÓN</td></tr>
				<tr class=C>
					<td colspan=1><input name=H7 id=H7 value=SI "; if ($row['H7'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H7 id=h7 value=NA "; if ($row['H7'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Señalizar y controlar el área de trabajo. Permiten los factores externos efectuar el trabajo con seguridad? (Dirección viento, trabajos, etc).</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H8 id=H8 value=SI "; if ($row['H8'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H8 id=h8 value=NA "; if ($row['H8'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Suspender todos los trabajos en caliente (fuentes de ignición) cercanos al área de trabajo?.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H9 id=H9 value=SI "; if ($row['H9'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H9 id=h9 value=NA "; if ($row['H9'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Tener listo y disponible los equipos de emergencia (extintores, SCI, botiquín de primeros auxilios, kit de derrames, duchas y lavaojos, etc).</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H10 id=H10 value=SI "; if ($row['H10'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H10 id=h10 value=NA "; if ($row['H10'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de aislamiento (mecánicos y eléctricos) son efectivos, estén bloqueados y señalizados con etiquetas rojas.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H11 id=H11 value=SI "; if ($row['H11'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H11 id=h11 value=NA "; if ($row['H11'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de verificación de energía 0 son efectivos, estén abiertos y señalizados con etiquetas verdes.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H12 id=H12 value=SI "; if ($row['H12'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H12 id=h12 value=NA "; if ($row['H12'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Cerciorarse que todos los puntos de apertura de equipo sean convenientes y señalizados con etiquetas moradas.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H13 id=H13 value=SI "; if ($row['H13'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H13 id=h13 value=NA "; if ($row['H13'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Utilizar los EPPs requeridos. Utilizar la protección respiratoria requerida y la careta de protección facial durante la primera apertura del equipo.</td>
				</tr>
				<tr class=C>
					<td colspan=1><input name=H14 id=H14 value=SI "; if ($row['H14'] == 'SI') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this) required></td>
					<td colspan=2><input name=H14 id=h14 value=NA "; if ($row['H14'] == 'NA') {echo 'checked';} echo " type=radio onclick=gestionarClickRadio(this)				 ></td>
					<td colspan=3 class=B>Proceder con la apertura del equipo, una vez se verifique la energía 0 (en el punto más bajo del sistema).</td>
				</tr>
				<tr height=15><td></td></tr>
			</table>
		<!-- *****************************************			 sección I			 ***************************************** -->
			<table>
				<tr height=15><td width=5.0%></td><td width=95.0%></td></tr>
				<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>I.</b></td><td class=B><b>CUADRO DE AISLAMIENTO Y APERTURA DE EQUIPOS</b></td></tr>
				<tr><td></td><td class=B>Este documento es requerido para hacer seguimiento a la ubicación de los Puntos de Aislamiento de Energía/Apertura de Equipo incluyendo los Dispositivos de Aislamiento de Energía (DAE), Puntos de Verificación de Energía (PVE) y Puntos de Apertura de Equipos de Proceso (AEP).&nbsp;&nbsp;CUADRO # <input name=cuadro maxlength=6 style='width:120px; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[cuadro]' required></td></tr>
				<tr height=15><td></td></tr>
			</table>
			<table>
				<tr height=100><td>DESCRIPCIÓN DE LA TAREA<textarea name=descripcionI style=width:99% maxlength=55 type=text onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcionI]</textarea></td></tr>
				<tr height=100><td>PERSONA AUTORIZADA<input name=autorizadoI maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) value='$row[autorizadoI]' required></td></tr>
			</table>
<!-- 7 -->		<div style='position:relative; width:9%; left:0.50%; background-color:white'>
			<table border=1>
				<tr height=130px><td class=A2 style=background-color:white>PASO #</td></tr>
				<tr height=70px><td><input name=IA1  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=1  required></td></tr>
				<tr height=70px><td><input name=IA2  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=2  required></td></tr>
				<tr height=70px><td><input name=IA3  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=3  required></td></tr>
				<tr height=70px><td><input name=IA4  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=4  required></td></tr>
				<tr height=70px><td><input name=IA5  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=5  required></td></tr>
				<tr height=70px><td><input name=IA6  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=6 ></td></tr>
				<tr height=70px><td><input name=IA7  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=7 ></td></tr>
				<tr height=70px><td><input name=IA8  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=8 ></td></tr>
				<tr height=70px><td><input name=IA9  style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=9 ></td></tr>
				<tr height=70px><td><input name=IA10 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=10></td></tr>
				<tr height=70px><td><input name=IA11 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=11></td></tr>
				<tr height=70px><td><input name=IA12 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=12></td></tr>
				<tr height=70px><td><input name=IA13 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=13></td></tr>
				<tr height=70px><td><input name=IA14 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=14></td></tr>
				<tr height=70px><td><input name=IA15 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=15></td></tr>
				<tr height=70px><td><input name=IA16 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=16></td></tr>
				<tr height=70px><td><input name=IA17 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=17></td></tr>
				<tr height=70px><td><input name=IA18 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=18></td></tr>
				<tr height=70px><td><input name=IA19 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=19></td></tr>
				<tr height=70px><td><input name=IA20 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=20></td></tr>
				<tr height=70px><td><input name=IA21 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=21></td></tr>
				<tr height=70px><td><input name=IA22 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=22></td></tr>
				<tr height=70px><td><input name=IA23 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=23></td></tr>
				<tr height=70px><td><input name=IA24 style='width:60%; text-align:center; background-color:white; border:0' maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value=24></td></tr>
				<tr height=80px><td style='font-size:24px'>NOTAS</td></tr>
			</table>
<!-- /7 -->		</div>
<!-- 8 -->		<div style='position:relative; width:89.75%; left:9.50%; top:-1894px; background-color:white; overflow:scroll'>
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
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>DISPOSITIVO**</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>UBICACIÓN</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>#<br>ETIQUETA / CANDADO</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>INSTALACIÓN</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>RETIRO</td>
				</tr>
				<tr height=65px>
					<td class=A2 style='background-color:#ff0000;	color:white; border:2px solid white; font-size:20px'>DAE</td>
					<td class=A2 style='background-color:#ff0000;	color:white; border:2px solid white; font-size:20px'>ESTADO (*)</td>
					<td class=A2 style='background-color:#008000;	color:white; border:2px solid white; font-size:20px'>PVE</td>
					<td class=A2 style='background-color:#008000;	color:white; border:2px solid white; font-size:20px'>PUNTO DE PASO</td>
					<td class=A2 style='background-color:#0000ff;	color:white; border:2px solid white; font-size:20px'>AEP</td>
					<td class=A2 style='background-color:white'>INSTALADO POR</td><td class=A2 style='background-color:white'>FECHA</td>
					<td class=A2 style='background-color:white'>RETIRADO POR</td><td class=A2 style='background-color:white'>FECHA</td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB1 class=rojo type=checkbox "; if ($row['IB1'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC1 class=estado required>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC1'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC1'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC1'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC1'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC1'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID1 class=verde type=checkbox "; if ($row['ID1'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE1 class=verde type=checkbox "; if ($row['IE1'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF1 class=azul  type=checkbox "; if ($row['IF1'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG1 class=dispositivo required>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG1'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG1'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG1'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG1'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH1 type=texto maxlength=15 pattern=.{1,} value='$row[IH1]' onkeyup=mayuscula(this) required></td>
					<td><input name=II1 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II1]' required></td>
					<td><input name=IJ1 type=texto maxlength=15 pattern=.{1,} value='$row[IJ1]' onkeyup=mayuscula(this) required></td>
					<td><input name=IK1	type=date  max='<?echo $fechamax;?>' value='$row[IK1]' required></td>
					<td><input name=IL1 type=texto maxlength=15 pattern=.{1,} value='$row[IL1]' onkeyup=mayuscula(this) required></td>
					<td><input name=IM1	type=date	 max='<?echo $fechamax;?>' value='$row[IM1]' required></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB2 class=rojo type=checkbox "; if ($row['IB2'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC2 class=estado required>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC2'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC2'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC2'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC2'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC2'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID2 class=verde type=checkbox "; if ($row['ID2'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE2 class=verde type=checkbox "; if ($row['IE2'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF2 class=azul  type=checkbox "; if ($row['IF2'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG2 class=dispositivo required>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG2'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG2'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG2'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG2'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH2 type=texto maxlength=15 pattern=.{1,} value='$row[IH2]' onkeyup=mayuscula(this) required></td>
					<td><input name=II2 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II2]' required></td>
					<td><input name=IJ2 type=texto maxlength=15 pattern=.{1,} value='$row[IJ2]' onkeyup=mayuscula(this) required></td>
					<td><input name=IK2	type=date  max='<?echo $fechamax;?>' value='$row[IK2]' required></td>
					<td><input name=IL2 type=texto maxlength=15 pattern=.{1,} value='$row[IL2]' onkeyup=mayuscula(this) required></td>
					<td><input name=IM2	type=date	 max='<?echo $fechamax;?>' value='$row[IM2]' required></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB3 class=rojo type=checkbox "; if ($row['IB3'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC3 class=estado required>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC3'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC3'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC3'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC3'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC3'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID3 class=verde type=checkbox "; if ($row['ID3'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE3 class=verde type=checkbox "; if ($row['ID3'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF3 class=azul  type=checkbox "; if ($row['ID3'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG3 class=dispositivo required>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG3'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG3'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG3'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG3'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH3 type=texto maxlength=15 pattern=.{1,} value='$row[IH3]' onkeyup=mayuscula(this) required></td>
					<td><input name=II3 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II3]' required></td>
					<td><input name=IJ3 type=texto maxlength=15 pattern=.{1,} value='$row[IJ3]' onkeyup=mayuscula(this) required></td>
					<td><input name=IK3	type=date  max='<?echo $fechamax;?>' value='$row[IK3]' required></td>
					<td><input name=IL3 type=texto maxlength=15 pattern=.{1,} value='$row[IL3]' onkeyup=mayuscula(this) required></td>
					<td><input name=IM3	type=date	 max='<?echo $fechamax;?>' value='$row[IM3]' required></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB4 class=rojo type=checkbox "; if ($row['IB4'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC4 class=estado required>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC4'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC4'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC4'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC4'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC4'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID4 class=verde type=checkbox "; if ($row['ID4'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE4 class=verde type=checkbox "; if ($row['IE4'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF4 class=azul  type=checkbox "; if ($row['IF4'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG4 class=dispositivo required>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG4'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG4'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG4'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG4'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH4 type=texto maxlength=15 pattern=.{1,} value='$row[IH4]' onkeyup=mayuscula(this) required></td>
					<td><input name=II4 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II4]' required></td>
					<td><input name=IJ4 type=texto maxlength=15 pattern=.{1,} value='$row[IJ4]' onkeyup=mayuscula(this) required></td>
					<td><input name=IK4	type=date  max='<?echo $fechamax;?>' value='$row[IK4]' required></td>
					<td><input name=IL4 type=texto maxlength=15 pattern=.{1,} value='$row[IL4]' onkeyup=mayuscula(this) required></td>
					<td><input name=IM4	type=date	 max='<?echo $fechamax;?>' value='$row[IM4]' required></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB5 class=rojo type=checkbox "; if ($row['IB5'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC5 class=estado required>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC5'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC5'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC5'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC5'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC5'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID5 class=verde type=checkbox "; if ($row['ID5'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE5 class=verde type=checkbox "; if ($row['IE5'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF5 class=azul  type=checkbox "; if ($row['IF5'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG5 class=dispositivo required>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG5'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG5'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG5'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG5'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH5 type=texto maxlength=15 pattern=.{1,} value='$row[IH5]' onkeyup=mayuscula(this) required></td>
					<td><input name=II5 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II5]' required></td>
					<td><input name=IJ5 type=texto maxlength=15 pattern=.{1,} value='$row[IJ5]' onkeyup=mayuscula(this) required></td>
					<td><input name=IK5	type=date  max='<?echo $fechamax;?>' value='$row[IK5]' required></td>
					<td><input name=IL5 type=texto maxlength=15 pattern=.{1,} value='$row[IL5]' onkeyup=mayuscula(this) required></td>
					<td><input name=IM5	type=date	 max='<?echo $fechamax;?>' value='$row[IM5]' required></td>
				</tr>

				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB6 class=rojo type=checkbox "; if ($row['IB6'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC6 class=estado>
							<option value='' disabled selected selected></option>
							<option value=A "; if ($row['IC6'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC6'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC6'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC6'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC6'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID6 class=verde type=checkbox "; if ($row['ID6'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE6 class=verde type=checkbox "; if ($row['IE6'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF6 class=azul  type=checkbox "; if ($row['IF6'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG6 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG6'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG6'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG6'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG6'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH6 type=texto maxlength=15 pattern=.{1,} value='$row[IH6]' onkeyup=mayuscula(this)></td>
					<td><input name=II6 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II6]'></td>
					<td><input name=IJ6 type=texto maxlength=15 pattern=.{1,} value='$row[IJ6]' onkeyup=mayuscula(this)></td>
					<td><input name=IK6	type=date  max='<?echo $fechamax;?>' value='$row[IK6]'></td>
					<td><input name=IL6 type=texto maxlength=15 pattern=.{1,} value='$row[IL6]' onkeyup=mayuscula(this)></td>
					<td><input name=IM6	type=date	 max='<?echo $fechamax;?>' value='$row[IM6]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB7 class=rojo type=checkbox "; if ($row['IB7'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC7 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC7'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC7'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC7'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC7'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC7'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID7 class=verde type=checkbox "; if ($row['ID7'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE7 class=verde type=checkbox "; if ($row['IE7'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF7 class=azul  type=checkbox "; if ($row['IF7'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG7 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG7'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG7'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG7'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG7'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH7 type=texto maxlength=15 pattern=.{1,} value='$row[IH7]' onkeyup=mayuscula(this)></td>
					<td><input name=II7 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II7]'></td>
					<td><input name=IJ7 type=texto maxlength=15 pattern=.{1,} value='$row[IJ7]' onkeyup=mayuscula(this)></td>
					<td><input name=IK7	type=date  max='<?echo $fechamax;?>' value='$row[IK7]'></td>
					<td><input name=IL7 type=texto maxlength=15 pattern=.{1,} value='$row[IL7]' onkeyup=mayuscula(this)></td>
					<td><input name=IM7	type=date	 max='<?echo $fechamax;?>' value='$row[IM7]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB8 class=rojo type=checkbox "; if ($row['IB8'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC8 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC8'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC8'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC8'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC8'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC8'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID8 class=verde type=checkbox "; if ($row['ID8'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE8 class=verde type=checkbox "; if ($row['IE8'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF8 class=azul  type=checkbox "; if ($row['IF8'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG8 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG8'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG8'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG8'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG8'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH8 type=texto maxlength=15 pattern=.{1,} value='$row[IH8]' onkeyup=mayuscula(this)></td>
					<td><input name=II8 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II8]'></td>
					<td><input name=IJ8 type=texto maxlength=15 pattern=.{1,} value='$row[IJ8]' onkeyup=mayuscula(this)></td>
					<td><input name=IK8	type=date  max='<?echo $fechamax;?>' value='$row[IK8]'></td>
					<td><input name=IL8 type=texto maxlength=15 pattern=.{1,} value='$row[IL8]' onkeyup=mayuscula(this)></td>
					<td><input name=IM8	type=date	 max='<?echo $fechamax;?>' value='$row[IM8]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB9 class=rojo type=checkbox "; if ($row['IB9'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC9 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC9'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC9'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC9'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC9'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC9'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID9 class=verde type=checkbox "; if ($row['ID9'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE9 class=verde type=checkbox "; if ($row['IE9'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF9 class=azul  type=checkbox "; if ($row['IF9'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG9 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG9'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG9'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG9'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG9'] == 'OTRO')					{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH9 type=texto maxlength=15 pattern=.{1,} value='$row[IH9]' onkeyup=mayuscula(this)></td>
					<td><input name=II9 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II9]'></td>
					<td><input name=IJ9 type=texto maxlength=15 pattern=.{1,} value='$row[IJ9]' onkeyup=mayuscula(this)></td>
					<td><input name=IK9	type=date  max='<?echo $fechamax;?>' value='$row[IK9]'></td>
					<td><input name=IL9 type=texto maxlength=15 pattern=.{1,} value='$row[IL9]' onkeyup=mayuscula(this)></td>
					<td><input name=IM9	type=date	 max='<?echo $fechamax;?>' value='$row[IM9]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB10 class=rojo type=checkbox "; if ($row['IB10'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC10 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC10'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC10'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC10'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC10'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC10'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID10 class=verde type=checkbox "; if ($row['ID10'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE10 class=verde type=checkbox "; if ($row['IE10'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF10 class=azul  type=checkbox "; if ($row['IF10'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG10 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG10'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG10'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG10'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG10'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH10 type=texto maxlength=15 pattern=.{1,} value='$row[IH10]' onkeyup=mayuscula(this)></td>
					<td><input name=II10 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II10]'></td>
					<td><input name=IJ10 type=texto maxlength=15 pattern=.{1,} value='$row[IJ10]' onkeyup=mayuscula(this)></td>
					<td><input name=IK10 type=date  max='<?echo $fechamax;?>' value='$row[IK10]'></td>
					<td><input name=IL10 type=texto maxlength=15 pattern=.{1,} value='$row[IL10]' onkeyup=mayuscula(this)></td>
					<td><input name=IM10 type=date	max='<?echo $fechamax;?>' value='$row[IM10]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB11 class=rojo type=checkbox "; if ($row['IB11'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC11 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC11'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC11'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC11'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC11'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC11'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID11 class=verde type=checkbox "; if ($row['ID11'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE11 class=verde type=checkbox "; if ($row['IE11'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF11 class=azul  type=checkbox "; if ($row['IF11'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG11 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG11'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG11'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG11'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG11'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH11 type=texto maxlength=15 pattern=.{1,} value='$row[IH11]' onkeyup=mayuscula(this)></td>
					<td><input name=II11 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II11]'></td>
					<td><input name=IJ11 type=texto maxlength=15 pattern=.{1,} value='$row[IJ11]' onkeyup=mayuscula(this)></td>
					<td><input name=IK11 type=date  max='<?echo $fechamax;?>' value='$row[IK11]'></td>
					<td><input name=IL11 type=texto maxlength=15 pattern=.{1,} value='$row[IL11]' onkeyup=mayuscula(this)></td>
					<td><input name=IM11 type=date	max='<?echo $fechamax;?>' value='$row[IM11]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB12 class=rojo type=checkbox "; if ($row['IB12'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC12 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC12'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC12'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC12'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC12'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC12'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID12 class=verde type=checkbox "; if ($row['ID12'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE12 class=verde type=checkbox "; if ($row['IE12'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF12 class=azul  type=checkbox "; if ($row['IF12'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG12 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG12'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG12'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG12'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG12'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH12 type=texto maxlength=15 pattern=.{1,} value='$row[IH12]' onkeyup=mayuscula(this)></td>
					<td><input name=II12 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II12]'></td>
					<td><input name=IJ12 type=texto maxlength=15 pattern=.{1,} value='$row[IJ12]' onkeyup=mayuscula(this)></td>
					<td><input name=IK12 type=date  max='<?echo $fechamax;?>' value='$row[IK12]'></td>
					<td><input name=IL12 type=texto maxlength=15 pattern=.{1,} value='$row[IL12]' onkeyup=mayuscula(this)></td>
					<td><input name=IM12 type=date	max='<?echo $fechamax;?>' value='$row[IM12]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB13 class=rojo type=checkbox "; if ($row['IB13'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC13 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC13'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC13'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC13'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC13'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC13'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID13 class=verde type=checkbox "; if ($row['ID13'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE13 class=verde type=checkbox "; if ($row['IE13'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF13 class=azul  type=checkbox "; if ($row['IF13'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG13 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG13'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG13'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG13'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG13'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH13 type=texto maxlength=15 pattern=.{1,} value='$row[IH13]' onkeyup=mayuscula(this)></td>
					<td><input name=II13 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II13]'></td>
					<td><input name=IJ13 type=texto maxlength=15 pattern=.{1,} value='$row[IJ13]' onkeyup=mayuscula(this)></td>
					<td><input name=IK13 type=date  max='<?echo $fechamax;?>' value='$row[IK13]'></td>
					<td><input name=IL13 type=texto maxlength=15 pattern=.{1,} value='$row[IL13]' onkeyup=mayuscula(this)></td>
					<td><input name=IM13 type=date	max='<?echo $fechamax;?>' value='$row[IM13]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB14 class=rojo type=checkbox "; if ($row['IB14'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC14 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC14'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC14'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC14'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC14'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC14'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID14 class=verde type=checkbox "; if ($row['ID14'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE14 class=verde type=checkbox "; if ($row['IE14'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF14 class=azul  type=checkbox "; if ($row['IF14'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG14 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG14'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG14'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG14'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG14'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH14 type=texto maxlength=15 pattern=.{1,} value='$row[IH14]' onkeyup=mayuscula(this)></td>
					<td><input name=II14 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II14]'></td>
					<td><input name=IJ14 type=texto maxlength=15 pattern=.{1,} value='$row[IJ14]' onkeyup=mayuscula(this)></td>
					<td><input name=IK14 type=date  max='<?echo $fechamax;?>' value='$row[IK14]'></td>
					<td><input name=IL14 type=texto maxlength=15 pattern=.{1,} value='$row[IL14]' onkeyup=mayuscula(this)></td>
					<td><input name=IM14 type=date	max='<?echo $fechamax;?>' value='$row[IM14]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB15 class=rojo type=checkbox "; if ($row['IB15'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC15 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC15'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC15'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC15'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC15'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC15'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID15 class=verde type=checkbox "; if ($row['ID15'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE15 class=verde type=checkbox "; if ($row['IE15'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF15 class=azul  type=checkbox "; if ($row['IF15'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG15 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG15'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG15'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG15'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG15'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH15 type=texto maxlength=15 pattern=.{1,} value='$row[IH15]' onkeyup=mayuscula(this)></td>
					<td><input name=II15 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II15]'></td>
					<td><input name=IJ15 type=texto maxlength=15 pattern=.{1,} value='$row[IJ15]' onkeyup=mayuscula(this)></td>
					<td><input name=IK15 type=date  max='<?echo $fechamax;?>' value='$row[IK15]'></td>
					<td><input name=IL15 type=texto maxlength=15 pattern=.{1,} value='$row[IL15]' onkeyup=mayuscula(this)></td>
					<td><input name=IM15 type=date	max='<?echo $fechamax;?>' value='$row[IM15]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB16 class=rojo type=checkbox "; if ($row['IB16'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC16 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC16'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC16'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC16'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC16'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC16'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID16 class=verde type=checkbox "; if ($row['ID16'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE16 class=verde type=checkbox "; if ($row['IE16'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF16 class=azul  type=checkbox "; if ($row['IF16'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG16 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG16'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG16'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG16'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG16'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH16 type=texto maxlength=15 pattern=.{1,} value='$row[IH16]' onkeyup=mayuscula(this)></td>
					<td><input name=II16 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II16]'></td>
					<td><input name=IJ16 type=texto maxlength=15 pattern=.{1,} value='$row[IJ16]' onkeyup=mayuscula(this)></td>
					<td><input name=IK16 type=date  max='<?echo $fechamax;?>' value='$row[IK16]'></td>
					<td><input name=IL16 type=texto maxlength=15 pattern=.{1,} value='$row[IL16]' onkeyup=mayuscula(this)></td>
					<td><input name=IM16 type=date	max='<?echo $fechamax;?>' value='$row[IM16]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB17 class=rojo type=checkbox "; if ($row['IB17'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC17 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC17'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC17'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC17'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC17'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC17'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID17 class=verde type=checkbox "; if ($row['ID17'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE17 class=verde type=checkbox "; if ($row['IE17'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF17 class=azul  type=checkbox "; if ($row['IF17'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG17 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG17'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG17'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG17'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG17'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH17 type=texto maxlength=15 pattern=.{1,} value='$row[IH17]' onkeyup=mayuscula(this)></td>
					<td><input name=II17 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II17]'></td>
					<td><input name=IJ17 type=texto maxlength=15 pattern=.{1,} value='$row[IJ17]' onkeyup=mayuscula(this)></td>
					<td><input name=IK17 type=date  max='<?echo $fechamax;?>' value='$row[IK17]'></td>
					<td><input name=IL17 type=texto maxlength=15 pattern=.{1,} value='$row[IL17]' onkeyup=mayuscula(this)></td>
					<td><input name=IM17 type=date	max='<?echo $fechamax;?>' value='$row[IM17]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB18 class=rojo type=checkbox "; if ($row['IB18'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC18 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC18'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC18'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC18'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC18'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC18'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID18 class=verde type=checkbox "; if ($row['ID18'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE18 class=verde type=checkbox "; if ($row['IE18'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF18 class=azul  type=checkbox "; if ($row['IF18'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG18 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG18'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG18'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG18'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG18'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH18 type=texto maxlength=15 pattern=.{1,} value='$row[IH18]' onkeyup=mayuscula(this)></td>
					<td><input name=II18 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II18]'></td>
					<td><input name=IJ18 type=texto maxlength=15 pattern=.{1,} value='$row[IJ18]' onkeyup=mayuscula(this)></td>
					<td><input name=IK18 type=date  max='<?echo $fechamax;?>' value='$row[IK18]'></td>
					<td><input name=IL18 type=texto maxlength=15 pattern=.{1,} value='$row[IL18]' onkeyup=mayuscula(this)></td>
					<td><input name=IM18 type=date	max='<?echo $fechamax;?>' value='$row[IM18]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB19 class=rojo type=checkbox "; if ($row['IB19'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC19 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC19'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC19'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC19'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC19'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC19'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID19 class=verde type=checkbox "; if ($row['ID19'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE19 class=verde type=checkbox "; if ($row['IE19'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF19 class=azul  type=checkbox "; if ($row['IF19'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG19 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG19'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG19'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG19'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG19'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH19 type=texto maxlength=15 pattern=.{1,} value='$row[IH19]' onkeyup=mayuscula(this)></td>
					<td><input name=II19 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II19]'></td>
					<td><input name=IJ19 type=texto maxlength=15 pattern=.{1,} value='$row[IJ19]' onkeyup=mayuscula(this)></td>
					<td><input name=IK19 type=date  max='<?echo $fechamax;?>' value='$row[IK19]'></td>
					<td><input name=IL19 type=texto maxlength=15 pattern=.{1,} value='$row[IL19]' onkeyup=mayuscula(this)></td>
					<td><input name=IM19 type=date	max='<?echo $fechamax;?>' value='$row[IM19]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB20 class=rojo type=checkbox "; if ($row['IB20'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC20 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC20'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC20'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC20'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC20'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC20'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID20 class=verde type=checkbox "; if ($row['ID20'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE20 class=verde type=checkbox "; if ($row['IE20'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF20 class=azul  type=checkbox "; if ($row['IF20'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG20 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG20'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG20'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG20'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG20'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH20 type=texto maxlength=15 pattern=.{1,} value='$row[IH20]' onkeyup=mayuscula(this)></td>
					<td><input name=II20 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II20]'></td>
					<td><input name=IJ20 type=texto maxlength=15 pattern=.{1,} value='$row[IJ20]' onkeyup=mayuscula(this)></td>
					<td><input name=IK20 type=date  max='<?echo $fechamax;?>' value='$row[IK20]'></td>
					<td><input name=IL20 type=texto maxlength=15 pattern=.{1,} value='$row[IL20]' onkeyup=mayuscula(this)></td>
					<td><input name=IM20 type=date	max='<?echo $fechamax;?>' value='$row[IM20]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB21 class=rojo type=checkbox "; if ($row['IB21'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC21 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC21'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC21'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC21'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC21'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC21'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID21 class=verde type=checkbox "; if ($row['ID21'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE21 class=verde type=checkbox "; if ($row['IE21'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF21 class=azul  type=checkbox "; if ($row['IF21'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG21 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG21'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG21'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG21'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG21'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH21 type=texto maxlength=15 pattern=.{1,} value='$row[IH21]' onkeyup=mayuscula(this)></td>
					<td><input name=II21 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II21]'></td>
					<td><input name=IJ21 type=texto maxlength=15 pattern=.{1,} value='$row[IJ21]' onkeyup=mayuscula(this)></td>
					<td><input name=IK21 type=date  max='<?echo $fechamax;?>' value='$row[IK21]'></td>
					<td><input name=IL21 type=texto maxlength=15 pattern=.{1,} value='$row[IL21]' onkeyup=mayuscula(this)></td>
					<td><input name=IM21 type=date	max='<?echo $fechamax;?>' value='$row[IM21]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB22 class=rojo type=checkbox "; if ($row['IB22'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC22 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC22'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC22'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC22'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC22'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC22'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID22 class=verde type=checkbox "; if ($row['ID22'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE22 class=verde type=checkbox "; if ($row['IE22'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF22 class=azul  type=checkbox "; if ($row['IF22'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG22 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG22'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG22'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG22'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG22'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH22 type=texto maxlength=15 pattern=.{1,} value='$row[IH22]' onkeyup=mayuscula(this)></td>
					<td><input name=II22 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II22]'></td>
					<td><input name=IJ22 type=texto maxlength=15 pattern=.{1,} value='$row[IJ22]' onkeyup=mayuscula(this)></td>
					<td><input name=IK22 type=date  max='<?echo $fechamax;?>' value='$row[IK22]'></td>
					<td><input name=IL22 type=texto maxlength=15 pattern=.{1,} value='$row[IL22]' onkeyup=mayuscula(this)></td>
					<td><input name=IM22 type=date	max='<?echo $fechamax;?>' value='$row[IM22]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB23 class=rojo type=checkbox "; if ($row['IB23'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC23 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC23'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC23'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC23'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC23'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC23'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID23 class=verde type=checkbox "; if ($row['ID23'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE23 class=verde type=checkbox "; if ($row['IE23'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF23 class=azul  type=checkbox "; if ($row['IF23'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG23 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG23'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG23'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG23'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG23'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH23 type=texto maxlength=15 pattern=.{1,} value='$row[IH23]' onkeyup=mayuscula(this)></td>
					<td><input name=II23 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II23]'></td>
					<td><input name=IJ23 type=texto maxlength=15 pattern=.{1,} value='$row[IJ23]' onkeyup=mayuscula(this)></td>
					<td><input name=IK23 type=date  max='<?echo $fechamax;?>' value='$row[IK23]'></td>
					<td><input name=IL23 type=texto maxlength=15 pattern=.{1,} value='$row[IL23]' onkeyup=mayuscula(this)></td>
					<td><input name=IM23 type=date	max='<?echo $fechamax;?>' value='$row[IM23]'></td>
				</tr>
				<tr height=70px>
					<td style='background-color:#ff0000; border:2px solid white'><input name=IB24 class=rojo type=checkbox "; if ($row['IB24'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#ff0000; border:2px solid white'>
						<select name=IC24 class=estado>
							<option value='' disabled selected></option>
							<option value=A "; if ($row['IC24'] == 'A') {echo 'selected';} echo ">ABIERTO</option>
							<option value=C "; if ($row['IC24'] == 'C') {echo 'selected';} echo ">CERRADO</option>
							<option value=E "; if ($row['IC24'] == 'E') {echo 'selected';} echo ">AISLADO</option>
							<option value=D "; if ($row['IC24'] == 'D') {echo 'selected';} echo ">DESCONECTADO</option>
							<option value=O "; if ($row['IC24'] == 'O') {echo 'selected';} echo ">OTRO</option>
						</select>
					</td>
					<td style='background-color:#008000; border:2px solid white'><input name=ID24 class=verde type=checkbox "; if ($row['ID24'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#008000; border:2px solid white'><input name=IE24 class=verde type=checkbox "; if ($row['IE24'] == 'on') {echo 'checked';} echo "></td>
					<td style='background-color:#0000ff; border:2px solid white'><input name=IF24 class=azul  type=checkbox "; if ($row['IF24'] == 'on') {echo 'checked';} echo "></td>
					<td>
						<select name=IG24 class=dispositivo>
							<option value='' disabled selected></option>
							<option value='ELÉCTRICO' 	"; if ($row['IG24'] == 'ELÉCTRICO')		{echo 'selected';} echo ">ELÉCTRICO		</option>
							<option value='VÁLVULA' 		"; if ($row['IG24'] == 'VÁLVULA')			{echo 'selected';} echo ">VÁLVULA			</option>
							<option value='BRIDA CIEGA'	"; if ($row['IG24'] == 'BRIDA CIEGA')	{echo 'selected';} echo ">BRIDA CIEGA	</option>
							<option value='OTRO'				"; if ($row['IG24'] == 'OTRO')				{echo 'selected';} echo ">OTRO				</option>
						</select>
					</td>
					<td><input name=IH24 type=texto maxlength=15 pattern=.{1,} value='$row[IH24]' onkeyup=mayuscula(this)></td>
					<td><input name=II24 maxlength=6 style='width:86%; text-align:center' pattern=^(?:[0-9]{4,6})$ inputmode=numeric value='$row[II24]'></td>
					<td><input name=IJ24 type=texto maxlength=15 pattern=.{1,} value='$row[IJ24]' onkeyup=mayuscula(this)></td>
					<td><input name=IK24 type=date  max='<?echo $fechamax;?>' value='$row[IK24]'></td>
					<td><input name=IL24 type=texto maxlength=15 pattern=.{1,} value='$row[IL24]' onkeyup=mayuscula(this)></td>
					<td><input name=IM24 type=date	max='<?echo $fechamax;?>' value='$row[IM24]'></td>
				</tr>
				<tr>
					<td colspan=12 style='height:80px; text-align:left; font-size:28px'>
						*Estado de DAE: A=Abierto, C=Cerrado, E=Aislado eléctricamente, D=Desconectado (Brida ciega / Ciego de paleta), O=Otro (especificar)<br>
						**Dispositivo: Eléctrico, Válvula, Brida ciega / Ciego de paleta, Otro (especificar)
					</td>
				</tr>
			</table>
<!-- /8 -->		</div>
<!-- 9 -->		<div style='position:absolute; top:4000px'>
		<!-- *****************************************			 sección J			 ***************************************** -->
		<table>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr height=30px><td colspan=2><hr></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>J.</b></td><td class=B><b>REPRESENTACIÓN VISUAL DEL<br>PLAN DE AISLAMIENTO DE ENERGÍA Y APERTURA DE EQUIPO</b></td></tr>
			<tr height=10><td></td></tr>
			<tr><td colspan=2><img style='width:96% ; height:auto; opacity:0.1' src='../../../../../common/imagenes/logos_seguridad_industrial.svg'></td></tr>
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
				<td style=width:4%><input type=radio name=certificadoK id=certificadoA "; if ($row['certificadoK'] == 'A') {echo 'checked';} echo " value=A onclick=gestionarClickRadio(this) required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoB "; if ($row['certificadoK'] == 'B') {echo 'checked';} echo " value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoC "; if ($row['certificadoK'] == 'C') {echo 'checked';} echo " value=C onclick=gestionarClickRadio(this)></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no ha<br> &nbsp;terminado y el área ha<br> &nbsp;quedado en condiciones<br> &nbsp;de seguridad.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorK		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[ejecutorK]' required></td>
<!--				<td><input name=fechaejecK	type=date  class=mostrarfecha value='$row[fechaejecK]' style=display:none></td>-->
<!--				<td><input name=horaejecK		type=time  value='$row[horaejecK]' required></td>-->
			</tr>
			<tr><td>EJECUTOR</td><td></td><td></td></tr>
			<tr><td colspan=3 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;PERSONA AUTORIZADA QUE REALIZÓ EL AISLAMIENTO/APERTURA DEL EQUIPO.</span></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorK	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[inspectorK]' required></td>
<!--				<td><input name=fechainspK	type=date  class=mostrarfecha value='$row[fechainspK]' style=display:none></td>-->
<!--				<td><input name=horainspK		type=time  value='$row[horainspK]' required></td>-->
			</tr>
			<tr><td>INSPECTOR</td><td></td><td></td></tr>
				<tr height=30><td></td></tr>
				<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
				<tr>
					<td><input name=emisorK				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) value='$row[emisorK]' required></td>
					<td><input name=fechaemisorK	type=date  class=mostrarfecha value='$row[fechaemisorK]'readonly></td>
					<td><input name=horaemisorK		type=time  value='$row[horaemisorK]' required></td>
				</tr>
				<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
			</table>

		<!-- *****************************************			 sección xxx			 ***************************************** -->
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
			<tr><td colspan=2><hr></td></tr>
		</table>
<!-- /9 --> 	</div>
<!-- /6 --> 	</div>
<!-- /3 --> 	</div>

</form>
"; ?>		<!-- cierre del php que se usa para editar el formato -->
<!-- /1 --> 	</div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
