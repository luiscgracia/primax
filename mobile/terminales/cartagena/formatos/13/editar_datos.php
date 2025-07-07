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
<!-- 2 --> <div class=fijar style='top:15px; left:15px'>
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
					<span style='width:415px; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
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
					<span style=font-size:19.45px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr></table>
		<table border=0>
			<tr>
				<td class=A><br>FECHA<br>									 <input name=fechaA 			type=date value='$row[fechaA]' min='$row[fechaA]' max='$row[fechaA]' required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='$row[horainicialA]' required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA 	type=time value='$row[horafinalA]' required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit 	class=consecutivo value='$row[certhabilit]' maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=30px><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:75% class=A><br>UBICACIÓN<textarea name=ubicacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[ubicacion]</textarea></td>
				<td style='vertical-align:bottom; width:25%' class=A>ALTURA<br>APROXIMADA<input name=altura value=$row[altura] type=text style='width:90%; text-align:center' maxlength=5 inputmode=numeric pattern=^(([0-9]{1,2})?(.\d\d))?$ required></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td colspan=2 class=A>TIPO DE TRABAJO<br><textarea name=tipo_trabajo maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[tipo_trabajo]</textarea></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td colspan=2 class=A>DESCRIPCIÓN DEL TRABAJO<br><textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion]</textarea></td>
			</tr>
			<tr height=30px><td></td></tr>
		</table>
		<table>
			<tr><td class=A>PERSONAS AUTORIZADAS PARA EL TRABAJO - Cantidad:&nbsp;<input name=cantidad value=$row[cantidad] id=cantidad	type=text	style='width:8%; text-align:center'	maxlength=1 inputmode=numeric	placeholder=# pattern=^(?:[1-4]{1})$ required></td></tr>
			<tr height=30px><td></td></tr>
		</table>
		<div id=nombre style="; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo ">
		<table>
			<tr><td style=width:60%></td><td style=width:20%></td><td style=width:20%></td></tr>
			<tr>
					<td class=A2>NOMBRE</td><td class=A2>CÉDULA</td><td>FIRMA</td>
			</tr>
			<tr>
				<td><input name=nombre1	id=nombre1	value='$row[nombre1]' type=text	style='width:98.75%; "; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedula1	id=cedula1	value='$row[cedula1]' type=text	style='width:96.50%; "; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
<!--		<td><input name=firma1	id=firma1		value='' type=text	style='width:100%; display:none' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td> -->
			</tr>
			<tr>
				<td><input name=nombre2	id=nombre2	value='$row[nombre2]' type=text	style='width:98.75%; "; if ($row['cantidad'] >= 2) {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula2	id=cedula2	value='$row[cedula2]' type=text	style='width:96.50%; "; if ($row['cantidad'] >= 2) {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
<!--		<td><input name=firma2	id=firma2		value='' type=text	style='width:100%; display:none' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td> -->
			</tr>
			<tr>
				<td><input name=nombre3	id=nombre3	value='$row[nombre3]' type=text	style='width:98.75%; "; if ($row['cantidad'] >= 3) {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula3	id=cedula3	value='$row[cedula3]' type=text	style='width:96.50%; "; if ($row['cantidad'] >= 3) {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
<!--		<td><input name=firma3	id=firma3		value='' type=text	style='width:100%; display:none' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td> -->
			</tr>
			<tr>
				<td><input name=nombre4	id=nombre4	value='$row[nombre4]' type=text	style='width:98.75%; "; if ($row['cantidad'] >= 4) {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula4	id=cedula4	value='$row[cedula4]' type=text	style='width:96.50%; "; if ($row['cantidad'] >= 4) {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
<!--		<td><input name=firma4	id=firma4		value='' type=text	style='width:100%; display:none' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td> -->
			</tr>
		</table>
		</div>
		<script>
		var
			 c = document.getElementById('cantidad');
			 n = document.getElementById('nombre');
			n1 = document.getElementById('nombre1');
			n2 = document.getElementById('nombre2');
			n3 = document.getElementById('nombre3');
			n4 = document.getElementById('nombre4');
			c1 = document.getElementById('cedula1');
			c2 = document.getElementById('cedula2');
			c3 = document.getElementById('cedula3');
			c4 = document.getElementById('cedula4');
			f1 = document.getElementById('firma1');
			f2 = document.getElementById('firma2');
			f3 = document.getElementById('firma3');
			f4 = document.getElementById('firma4');
		document.getElementById('cantidad').addEventListener('blur', function(e) {
			if (c.value <= 1) {c.value = 1;
				n.disabled = false;		n.style.display = 'block';
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = true; n2.style.display = 'none';
			 n3.disabled = true; n3.style.display = 'none';
			 n4.disabled = true; n4.style.display = 'none';
			 f1.disabled = true; f1.style.display = 'none'; f1.required = true;
			 f2.disabled = true; f2.style.display = 'none';
			 f3.disabled = true; f3.style.display = 'none';
			 f4.disabled = true; f4.style.display = 'none';
			 c1.disabled = false; c1.style.display = 'block'; c1.required = true;
			 c2.disabled = true; c2.style.display = 'none';
			 c3.disabled = true; c3.style.display = 'none';
			 c4.disabled = true; c4.style.display = 'none';};
			if (c.value == 2) {
				n.disabled = false;		n.style.display = 'block';
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = true; n3.style.display = 'none';
			 n4.disabled = true; n4.style.display = 'none';
			 f1.disabled = true; f1.style.display = 'none'; f1.required = true;
			 f2.disabled = true; f2.style.display = 'none'; f2.required = true;
			 f3.disabled = true; f3.style.display = 'none';
			 f4.disabled = true; f4.style.display = 'none';
			 c1.disabled = false; c1.style.display = 'block'; c1.required = true;
			 c2.disabled = false; c2.style.display = 'block'; c2.required = true;
			 c3.disabled = true; c3.style.display = 'none';
			 c4.disabled = true; c4.style.display = 'none';};
			if (c.value == 3) {
				n.disabled = false;		n.style.display = 'block';
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = true; n4.style.display = 'none';
			 f1.disabled = true; f1.style.display = 'none'; f1.required = true;
			 f2.disabled = true; f2.style.display = 'none'; f2.required = true;
			 f3.disabled = true; f3.style.display = 'none'; f3.required = true;
			 f4.disabled = true; f4.style.display = 'none';
			 c1.disabled = false; c1.style.display = 'block'; c1.required = true;
			 c2.disabled = false; c2.style.display = 'block'; c2.required = true;
			 c3.disabled = false; c3.style.display = 'block'; c3.required = true;
			 c4.disabled = true; c4.style.display = 'none';};
			if (c.value >= 4) {c.value = 4;
				n.disabled = false;		n.style.display = 'block';
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = false; n4.style.display = 'block'; n4.required = true;
			 f1.disabled = true; f1.style.display = 'none'; f1.required = true;
			 f2.disabled = true; f2.style.display = 'none'; f2.required = true;
			 f3.disabled = true; f3.style.display = 'none'; f3.required = true;
			 f4.disabled = true; f4.style.display = 'none'; f4.required = true;
			 c1.disabled = false; c1.style.display = 'block'; c1.required = true;
			 c2.disabled = false; c2.style.display = 'block'; c2.required = true;
			 c3.disabled = false; c3.style.display = 'block'; c3.required = true;
			 c4.disabled = false; c4.style.display = 'block'; c4.required = true;};});
		</script>

		<hr>
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td class=Bct><b>&nbsp;B. </b></td><td class=B><b>LISTA DE VERIFICACIÓN - PUNTOS DE ACCIÓN</b/td></tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=7%></td><td width=83%></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Br>#&nbsp;</td><td></td></tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><b><u>GENERAL - ANTES DE INICIAR EL TRABAJO</u></b></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B1 id=B1 value=SI "; if ($row['B1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B1 id=b1 value=NO "; if ($row['B1'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Es Obligatorio hacer el trabajo en Alturas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI "; if ($row['B2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B2 id=b2 value=NO "; if ($row['B2'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Todos los trabajadores tienen vigente su Seguridad Social y exámen médico vigente?<br>
				<span>(SOLO SE AUTORIZA EL TRABAJO CON RESPUESTA SI)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI "; if ($row['B3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B3 id=b3 value=NO "; if ($row['B3'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos efectuar el trabajo con seguridad?<br>
				<span>(Viento máx. 17m/s[38mph], Trabajos Vecinos, Condiciones Atmosféricas, Luz)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI "; if ($row['B4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B4 id=b4 value=NO "; if ($row['B4'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Están las líneas y sistemas eléctricos de media/alta tensión a más de 6mt[18ft] de distancia del andamio o a más de 3mt[10ft] de las personas<br>
				<span>(medido desde el punto más distante que puedan alcanzar)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI "; if ($row['B5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B5 id=b5 value=NO "; if ($row['B5'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Se ha identificado y demarcado adecuadamente el Área Bajo Control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI "; if ($row['B6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B6 id=b6 value=NO "; if ($row['B6'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>El personal está entrenado y certificado vigente para Trabajo en Alturas incluyendo procedimiento de emergencia y rescate en alturas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI "; if ($row['B7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B7 id=b7 value=NO "; if ($row['B7'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Superficie estable, firme y nivelada?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI "; if ($row['B8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B8 id=b8 value=NO "; if ($row['B8'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Escalera, partes del andamio, elevador, etc. Inspeccionados y Aprobados antes de ingresar a la Instalación?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><b><u>EQUIPO DE PROTECCION DE CAIDAS</u></b></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI "; if ($row['B9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B9 id=b9 value=NO "; if ($row['B9'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Están disponibles y en buen estado los Elementos de Protección Personal?<br>
				<span>(casco con barbuquejo, guantes, gafas, etc.)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B10 id=B10 value=SI "; if ($row['B10'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B10 id=b10 value=NO "; if ($row['B10'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>10.</td><td class=B>Cumple Normas ANSI Z-359.1?<br>
				<span>(certificación estampada/adherida al Equipo)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B11 id=B11 value=SI "; if ($row['B11'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B11 id=b11 value=NO "; if ($row['B11'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>11.</td><td class=B>Doble línea de vida con amortiguador de choque?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B12 id=B12 value=SI "; if ($row['B12'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B12 id=b12 value=NO "; if ($row['B12'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>12.</td><td class=B>Inspeccionado antes de cada uso (Cintas, Costuras, Herrajes, Ganchos)?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B13 id=B13 value=SI "; if ($row['B13'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B13 id=b13 value=NO "; if ($row['B13'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>13.</td><td class=B>El Anclaje resiste 2.300 kg[5.000 lb] por persona?<br>
				<span>(Anclaje certificado ó endosado por Dpto.de Ingeniería de acuerdo a cálculos teóricos)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B14 id=B14 value=SI "; if ($row['B14'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B14 id=b14 value=NO "; if ($row['B14'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>14.</td><td class=B>Anclaje por encima del hombro? y ¿fué calculada la altura de caída?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ANDAMIOS – ANTES DE SUBIR A TRABAJAR</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B15 id=B15 value=SI "; if ($row['B15'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B15 id=b15 value=NO "; if ($row['B15'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>15.</td><td class=B>El andamio está aterrizado eléctricamente cuando se trabaja con energía eléctrica en el andamio o cerca de líneas eléctricas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B16 id=B16 value=SI "; if ($row['B16'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B16 id=b16 value=NO "; if ($row['B16'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>16.</td><td class=B>Las Bases son de 25 cm x 25 cm con rigidizadores para áreas no pavimentadas? ¿El andamio se muestra nivelado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B17 id=B17 value=SI "; if ($row['B17'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B17 id=b17 value=NO "; if ($row['B17'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>17.</td><td class=B>En andamios rodantes, frenos en perfecto estado?<br>
				<span>(base 1.5 mt x 1.5 mt, altura máx 4 secciones y superficie plana (pendiente máx. 1%))</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B18 id=B18 value=SI "; if ($row['B18'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B18 id=b18 value=NO "; if ($row['B18'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>18.</td><td class=B>Escalera segura, sin obstáculos (si es vertical, sobresale 1 mt [3’])?	¿Posee baranda de cierre?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B19 id=B19 value=SI "; if ($row['B19'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B19 id=b19 value=NO "; if ($row['B19'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>19.</td><td class=B>Tiene baranda (altura 1.0 m, travesaño intermedio, zócalo) en la superficie de trabajo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B20a id=B20a value=SI "; if ($row['B20a'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B20a id=b20a value=NO "; if ($row['B20a'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>20A.</td>
				<td class=B>
					Estructura metálica resistente, antideslizante, asegurada al andamio o tablones adecuados 
					<span>(tablones de madera sólo en trabajos en frío, espesor 5cm[2”], ancho 30cm[12”] sobresalen 15-30 cms a cada lado),</span> 
					en buen estado, amarrados uno a uno al andamio?.  El andamio cuenta con las diagonales completas y no hay deformación en sus piezas?
				</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B20b id=B20b value=SI "; if ($row['B20b'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B20b id=b20b value=NO "; if ($row['B20b'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>20B.</td><td class=B>Espacio entre tablones y/o aberturas de máximo 1.2cm [½]. Si el acceso a la plataforma es por escotilla, debe ser de tipo basculante.</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B21 id=B21 value=SI "; if ($row['B21'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B21 id=b21 value=NO "; if ($row['B21'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>21.</td><td class=B>Si la altura excede 3 veces la dimensión mínima de base, anclado/arriostrado?<br>
				<span>(anclar cada 3 secciones de altura)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B22 id=B22 value=SI "; if ($row['B22'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B22 id=b22 value=NO "; if ($row['B22'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>22.</td><td class=B>El andamio ha sido inspeccionado por la autoridad emisora y Coordinador de trabajo en Altura y queda aprobado para su uso?<br>
				<span>(cada dos años debe ser verificado por certificador independiente)</span></td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ANDAMIOS COLGANTES – ANTES DE SUBIR A TRABAJAR</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B23 id=B23 value=SI "; if ($row['B23'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B23 id=b23 value=NO "; if ($row['B23'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>23.</td><td class=B>Máximo 2 personas sobre el andamio?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B24 id=B24 value=SI "; if ($row['B24'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B24 id=b24 value=NO "; if ($row['B24'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>24.</td><td class=B>Sostenido por dos cables de acero, independientes?<br>
				<span>(si falla una, el andamio queda colgado por la otra)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B25 id=B25 value=SI "; if ($row['B25'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B25 id=b25 value=NO "; if ($row['B25'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>25.</td><td class=B>Los cables son de acero, de 6mm de diámetro o más?<br>
				<span>(soportan al menos 6 veces la carga, incluyendo el peso del andamio)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B26 id=B26 value=SI "; if ($row['B26'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B26 id=b26 value=NO "; if ($row['B26'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>26.</td><td class=B>La estructura y el andamio soportan 4 veces la carga?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B27 id=B27 value=SI "; if ($row['B27'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B27 id=b27 value=NO "; if ($row['B27'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>27.</td><td class=B>Líneas de vida independientes?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ESCALERAS DE MANO</u></b></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B28 id=B28 value=SI "; if ($row['B28'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B28 id=b28 value=NO "; if ($row['B28'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>28.</td><td class=B>Sólo actividades livianas?<br>
				<span>(objetos/herramientas de menos de 5kg[10lb], no hacer fuerza, no escapes de productos)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B29 id=B29 value=SI "; if ($row['B29'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B29 id=b29 value=NO "; if ($row['B29'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>29.</td><td class=B>Base Antideslizante? ¿Parales y travesaños en buen estado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B30 id=B30 value=SI "; if ($row['B30'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B30 id=b30 value=NO "; if ($row['B30'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>30.</td><td class=B>Inclinación ¼ (70°) ?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B31 id=B31 value=SI "; if ($row['B31'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B31 id=b31 value=NO "; if ($row['B31'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>31.</td><td class=B>Sobresale 1 mt [3’] sobre el punto del trabajo o estructura a la que se va a subir?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B32 id=B32 value=SI "; if ($row['B32'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B32 id=b32 value=NO "; if ($row['B32'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>32.</td><td class=B>Asegurada/Anclada en la parte superior, dos personas hasta que quede asegurada?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B33 id=B33 value=SI "; if ($row['B33'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B33 id=b33 value=NO "; if ($row['B33'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>33.</td><td class=B>No conductiva, fibra de vidrio,	si hay riesgos eléctricos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B34 id=B34 value=SI "; if ($row['B34'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B34 id=b34 value=NO "; if ($row['B34'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>34.</td><td class=B>Escalera sencilla máx. 4mt[13’]? ¿Escalera Extensión máx. 7.5mt[22.5’]? ¿Escalera Tijera máx. 4mt[13’]?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B35 id=B35 value=SI "; if ($row['B35'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B35 id=b35 value=NO "; if ($row['B35'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>35.</td><td class=B>Escalera de Extensión, las secciones traslapan mínimo 1mt[3ft]?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B36 id=B36 value=SI "; if ($row['B36'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B36 id=b36 value=NO "; if ($row['B36'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>36.</td><td class=B>Escalera de Extensión con pasadores de seguridad entre secciones?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B37 id=B37 value=SI "; if ($row['B37'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B37 id=b37 value=NO "; if ($row['B37'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>37.</td><td class=B>La escalera ha sido inspeccionada por la autoridad emisora y queda aprobada para su uso?<br>
				<span>(anexar Check List de inspección de escaleras portátiles)</span></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr class=C>
				<td colspan=4 class=B>Observaciones y/o Precauciones Adicionales<textarea name=observaciones maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[observaciones]</textarea></td>
			<tr>
		<table>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width= 5vw></td><td width=95vw></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo que los requerimientos de cada tipo de acción indicados en la sección B se han completado, que hay seguridad para efectuar el Trabajo en Altura descrito en este Permiso y que se tomarán las precauciones necesarias para efectuar el trabajo con seguridad.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=40><td width=40vw></td><td width=20vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorC		value='$row[ejecutorC]'		type=texto maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaejecC	value='$row[cedulaejecC]'	type=text  maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaejecC	value='$row[fechaejecC]'	type=date  style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horaejecC		value='$row[horaejecC]'		type=time	 required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=coordinadorC	value='$row[coordinadorC]'	type=texto	maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulacoordC	value='$row[cedulacoordC]'	type=text		maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechacoordC		value='$row[fechacoordC]'		type=date		style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horacoordC		value='$row[horacoordC]'		type=time		required></td>
			</tr>
			<tr><td>COORDINADOR<br>TRABAJO EN ALTURAS</td><td>CÉDULA<br><br></td><td></td><td>HORA<br><br></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5vw></td><td width=95vw></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;D. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>El lugar, los equipos y herramientas se han verificado de acuerdo con los requerimientos de la sección B, y estoy satisfecho con sus condiciones de seguridad.	Por lo tanto se autoriza la iniciación de los trabajos.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=40><td width=40vw></td><td width=20vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=emisorD				value='$row[emisorD]'				type=texto maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaemisorD	value='$row[cedulaemisorD]'	type=text	 maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaemisorD	value='$row[fechaemisorD]'	type=date  style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horaemisorD		value='$row[horaemisorD]'		type=time  required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;E. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que el trabajo amparado por este permiso:</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:5%></td>
				<td style=width:4%><input type=radio name=cancelacion id=A value=A "; if ($row['cancelacion'] == 'A') {echo 'checked';} echo " required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B "; if ($row['cancelacion'] == 'B') {echo 'checked';} echo " ></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C "; if ($row['cancelacion'] == 'C') {echo 'checked';} echo " ></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
			</tr>
		</table>
		<table border=0>
			<tr height=40><td width=40vw></td><td width=20vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorE		value='$row[ejecutorE]'		type=texto maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaejecE	value='$row[cedulaejecE]'	type=text  maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaejecE	value='$row[fechaejecE]'	type=date  style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horaejecE		value='$row[horaejecE]'		type=time	 required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=coordinadorE	value='$row[coordinadorE]'	type=texto	maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulacoordE	value='$row[cedulacoordE]'	type=text		maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechacoordE		value='$row[fechacoordE]'		type=date		style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horacoordE		value='$row[horacoordE]'		type=time		required></td>
			</tr>
			<tr><td>COORDINADOR<br>TRABAJO EN ALTURAS</td><td>CÉDULA<br><br></td><td></td><td>HORA<br><br></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorE				value='$row[emisorE]'				type=texto maxlength=30 style=width:98%; pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaemisorE	value='$row[cedulaemisorE]'	type=text	 maxlength=10 style='width:96%; text-align:center' inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaemisorE	value='$row[fechaemisorE]'	type=date  style=width:96%; class=mostrarfecha readonly required></td>
				<td><input name=horaemisorE		value='$row[horaemisorE]'		type=time  required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
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
