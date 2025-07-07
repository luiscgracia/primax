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
<!-- 2 --> <div class=fijar style='top:30px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw'>
		<table style='color:black; background-color:white' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:661px; display:inline-block; font-size:36px'><b>"; echo $$formulario; echo "</b></span>
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
					<span style=font-size:20.00px>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.</span><br>
					<span style=font-size:19.35px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 - TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr><td>DESCRIPCIÓN DEL TRABAJO<br><textarea name=descripcion maxlength=70 style=width:98% onkeyup=mayuscula(this) pattern=.{1,} required autofocus>$row[descripcion]</textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr><td>UBICACIÓN Y DESCRIPCIÓN DE LA EXCAVACIÓN<br><textarea name=ubicacion1 maxlength=200 style=width:98% onkeyup=mayuscula(this) pattern=.{1,} required>$row[ubicacion1] $row[ubicacion2] $row[ubicacion3]</textarea></td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=84% class=Br>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</td>
				<td style='width:16%; text-align:left'><input style='width:40%; text-align:center' name=cantidad id=cantidad value='$row[cantidad]' maxlength=1 type=texto inputmode=numeric pattern=[1-4]{1} required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=1%></td><td width=48.50%></td><td width=1%></td><td width=48.50%></td><td width=1%></td><tr>
			<tr><td></td>
				<td><input name=nombre1 id=nombre1 value='$row[nombre1]' style="; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo " maxlength=30 type=texto placeholder=Nombre&nbsp;1er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre2 id=nombre2 value='$row[nombre2]' style="; if ($row['cantidad'] >= 2) {echo 'display:block';} else {echo 'display:none';} echo " maxlength=30 type=texto placeholder=Nombre&nbsp;2o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
	 		<tr height=10><td></td></tr>
			<tr><td></td>
				<td><input name=nombre3 id=nombre3 value='$row[nombre3]' style="; if ($row['cantidad'] >= 3) {echo 'display:block';} else {echo 'display:none';} echo " maxlength=30 type=texto placeholder=Nombre&nbsp;3er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre4 id=nombre4 value='$row[nombre4]' style="; if ($row['cantidad'] >= 4) {echo 'display:block';} else {echo 'display:none';} echo " maxlength=30 type=texto placeholder=Nombre&nbsp;4o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
	 		<tr height=30><td></td></tr>
		</table>
		<script>
			var
				c = document.getElementById('cantidad');
				n1 = document.getElementById('nombre1');
				n2 = document.getElementById('nombre2');
				n3 = document.getElementById('nombre3');
				n4 = document.getElementById('nombre4');
			document.getElementById('cantidad').addEventListener('blur', function(e) {
				if (c.value <= 1) {c.value = 1;
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = true; n2.style.display = 'none';
				 n3.disabled = true; n3.style.display = 'none';
				 n4.disabled = true; n4.style.display = 'none';}
				if (c.value == 2) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = true; n3.style.display = 'none';
				 n4.disabled = true; n4.style.display = 'none';}
				if (c.value == 3) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = true; n4.style.display = 'none';}
				if (c.value >= 4) {c.value = 4;
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = false; n4.style.display = 'block'; n4.required = true;}})
		</script>
		<table border=0>
			<tr><td width=33%></td><td width=34%></td><td width=33%></td></tr>
			<tr>
				<td class=A><br>PROFUNDIDAD<br><input name=profundidad value='$row[profundidad]' maxlength=4 style='width:60%; text-align:center' inputmode=numeric pattern=^([0-9]{1,1}(\.[0-9]{1,2})?)$ required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit value='$row[certhabilit]' class=consecutivo maxlength=6 style=width:60% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				<td class=A><br>FECHA<br><input name=fechaA	type=date value='$row[fechaA]' min='$row[fechaA]' max='$row[fechaA]' required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
<!-- 4 --> 	<div style='position:absolute; width:52.50%; left:0.50%; background-color:white'>
		<table border=1>
			<tr height=75px><td class=A3></td></tr>
			<tr height=75px><td class=A># CERTIFICADOS HABILITACIÓN ó<br>PERMISOS TRABAJO RELACIONADOS</td></tr>
			<tr height=75px><td class=A>Revisión diaria antes de iniciar labores<br>Firma Supervisor/Inspector</td></tr>
		</table>
<!-- /4 --> 	</div>
<!-- 5 --> 	<div style='position:absolute; width:46.25%; left:53%; background-color:white; overflow:scroll'>
		<table border=1 bordercolor=#ff7000>
			<tr height=75px>
				<td style=width:195px class=A2>DÍA<br>2</td>
				<td style=width:195px class=A2>DÍA<br>3</td>
				<td style=width:195px class=A2>DÍA<br>4</td>
				<td style=width:195px class=A2>DÍA<br>5</td>
				<td style=width:195px class=A2>DÍA<br>6</td>
				<td style=width:195px class=A2>DÍA<br>7</td>
				<td style=width:195px class=A2>DÍA<br>8</td>
			</tr>
			<tr height=75px>
				<td><input name=B2 value='$row[B2]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				<td><input name=B3 value='$row[B3]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=B4 value='$row[B4]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=B5 value='$row[B5]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=B6 value='$row[B6]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=B7 value='$row[B7]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=B8 value='$row[B8]' class=consecutivo maxlength=6 style=width:75% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
			</tr>
			<tr height=75px>
				<td><input name=B9  value='$row[B9]'  style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=B10 value='$row[B10]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=B11 value='$row[B11]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=B12 value='$row[B12]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=B13 value='$row[B13]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=B14 value='$row[B14]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=B15 value='$row[B15]' style='text-align:center; width:92%' type=texto maxlength=6 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
<!-- /5 --> 	</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
<!-- 10 --> 		<div style='position:relative; width:100vw; top:240px'> <!-- este div mueve hacia abajo desde la sección C -->
		<table border=0>
			<tr><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;B. LISTA DE VERIFICACIÓN DE EXCAVACIONES</b></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td class=B></td></tr>
			<tr class=C>
				<td><input type=radio name=C1 id=C1 value=SI "; if ($row['C1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C1 id=c1 value=NO "; if ($row['C1'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C1 id=K1 value=NA "; if ($row['C1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Se han consultado los planos del área?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C2 id=C2 value=SI "; if ($row['C2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C2 id=c2 value=NO "; if ($row['C2'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C2 id=K2 value=NA "; if ($row['C2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Se han certificado todas las tuberías/cables/ductos del área de la excavación?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C3 id=C3 value=SI "; if ($row['C3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C3 id=c3 value=NO "; if ($row['C3'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C3 id=K3 value=NA "; if ($row['C3'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Se ha probado el área con un detector de cables/metales?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C4 id=C4 value=SI "; if ($row['C4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C4 id=c4 value=NO "; if ($row['C4'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C4 id=K4 value=NA "; if ($row['C4'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Se contará con ingreso y salida seguros al área de la excavación?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C5 id=C5 value=SI "; if ($row['C5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C5 id=c5 value=NO "; if ($row['C5'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C5 id=K5 value=NA "; if ($row['C5'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Se dispone de barreras/cercos/iluminación? y si la excavación debe quedar abierta, estará debidamente identificada y cercada?</td>
			</tr>
			<tr height=110px style=background-color:lightgreen>
				<td colspan=5 class=B style=text-align:center>Si la respuesta a alguna de las preguntas 1 a 5 es <b>NO</b>,<br>se rechaza esta autorización.</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C6 id=C6 value=SI "; if ($row['C6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C6 id=c6 value=NO "; if ($row['C6'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C6 id=K6 value=NA "; if ($row['C6'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>La excavación estará a menos de 3 metros de tuberías o cables?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C7 id=C7 value=SI "; if ($row['C7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C7 id=c7 value=NO "; if ($row['C7'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C7 id=K7 value=NA "; if ($row['C7'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Se requiere desacople de equipos?<br># Permiso:&nbsp;<input name=C7a value='$row[C7a]' class=consecutivo maxlength=6 style=width:20% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C8 id=C8 value=SI "; if ($row['C8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C8 id=c8 value=NO "; if ($row['C8'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C8 id=K8 value=NA "; if ($row['C8'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Se requiere aislamiento eléctrico?<br># Certificado:&nbsp;<input name=C8a	value='$row[C8a]' class=consecutivo maxlength=6 style=width:20% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C9 id=C9 value=SI "; if ($row['C9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C9 id=c9 value=NO "; if ($row['C9'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C9 id=K9 value=NA "; if ($row['C9'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Es posible que se acumulen combustibles o vapores entre la excavación?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C10 id=C10 value=SI "; if ($row['C10'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C10 id=c10 value=NO "; if ($row['C10'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C10 id=K10 value=NA "; if ($row['C10'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>10.</td><td class=B>Se requiere apuntalamiento?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C11 id=C11 value=SI "; if ($row['C11'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C11 id=c11 value=NO "; if ($row['C11'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C11 id=K11 value=NA "; if ($row['C11'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>11.</td><td class=B>Afectará la excavación algún camino de acceso?<br>Indique:&nbsp;<input name=C11a value='$row[C11a]' maxlength=30 style=width:80% type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=150px style=background-color:lightgreen>
				<td colspan=5 class=B style=text-align:center>Si la respuesta a alguna de las preguntas 6 a 11 es <b>SI</b>,<br>se deberá detallar en la sección C las correspondientes precauciones de seguridad.</td>
			</tr>
 		<tr height=20><td></td></tr>
		</table>
		<table border=0>
			<tr><td>REQUISITOS ADICIONALES DE SEGURIDAD<br><textarea name=requisitos1 maxlength=350 style=width:98% onkeyup=mayuscula(this) pattern=.{1,}>$row[requisitos1] $row[requisitos2] $row[requisitos3] $row[requisitos4]</textarea></td></tr>
		</table>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<hr>
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;D. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>He leído este permiso.&nbsp;&nbsp;Entiendo su naturaleza y alcance y confirmo que se tomarán las precauciones necesarias para efectuar el trabajo con seguridad.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=49.999%></td><td width=49.999%></td><td width=0.001%></td><td width=0.001%></td></tr>
			<tr>
				<td><input name=ejecutorD				value='$row[ejecutorD]'				style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreejecutorD	value='$row[nombreejecutorD]' style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecD			value='$row[fechaejecD]'			style=display:none type=date	class=mostrarfecha readonly></td>
				<td><input name=horaejecD				value='$row[horaejecD]'				style=display:none type=time	min='$row[horaejecD]'></td>
			</tr>
			<tr><td>EJECUTOR</td><td>NOMBRE</td><td></td><td></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorD  value='$row[inspectorD]'	style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreinspD value='$row[nombreinspD]'	style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspD	value='$row[fechainspD]'  style=display:none type=date	class=mostrarfecha readonly></td>
				<td><input name=horainspD		value='$row[horainspD]'	  style=display:none type=time	min='$row[horainspD]'></td>
			</tr>
			<tr><td>INSPECTOR</td><td>NOMBRE</td><td></td><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=27.65vw></td><td width=33.85vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;E. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=4>He verificado el lugar de trabajo y estoy satisfecho con las condiciones de seguridad.  Por lo tanto, <b>AUTORIZO</b> efectuar la excavación.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=49.999%></td><td width=49.999%></td><td width=0.001%></td><td width=0.001%></td></tr>
				<td><input name=emisorE				value='$row[emisorE]'				style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorE	value='$row[nombreemisorE]'	style=width:98%		 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	value='$row[fechaemisorE]'	style=display:none type=date	class=mostrarfecha readonly></td>
				<td><input name=horaemisorE		value='$row[horaemisorE]'		style=display:none type=time	min='$row[horaemisorE]'></td>
			</tr>
			<tr><td>EMISOR</td><td>NOMBRE</td><td></td><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;F. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, la autorización NO puede ser revalidada.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que la excavación amparada por esta autorización ha sido rellenada y el área ha quedado en condiciones de seguridad.</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td width=60vw></td><td width=21vw></td><td width=19vw></td>
			</tr>
			<tr><td colspan=3>NOTAS&nbsp;<textarea name=notas_cancelacion maxlength=85 style=width:98% onkeyup=mayuscula(this) pattern=.{1,} required>$row[notas_cancelacion]</textarea></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=ejecutorF		style=width:98.50% type=texto value='$row[ejecutorF]' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecF	style=width:96% type=date  value='$row[fechaejecF]' required></td>
				<td><input name=horaejecF		style=width:96% type=time  value='$row[horaejecF]' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorF	style=width:98.50% type=texto value='$row[inspectorF]' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	style=width:96% type=date  value='$row[fechainspF]' required></td>
				<td><input name=horainspF		style=width:96% type=time  value='$row[horainspF]' required></td>
			</tr>
			<tr><td>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTA AUTORIZACIÓN ES AHORA RETIRADA Y CANCELADA</td></tr>
			<tr>
				<td><input name=emisorF				style=width:98.50% type=texto value='$row[emisorF]' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorF	style=width:96% type=date  value='$row[fechaemisorF]' required></td>
				<td><input name=horaemisorF		style=width:96% type=time  value='$row[horaemisorF]' required></td>
			</tr>
			<tr><td>EMISOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<table>
			<tr><td><hr></td></tr>
			<tr height=10><td></td></tr>
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
