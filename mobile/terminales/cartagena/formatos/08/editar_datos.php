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
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** -->
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
					<span style='width:480px; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
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
	 		<tr style=height:30px><td></td></tr>
		</table>
		<table border=0>
			<tr><td style=width:1%></td><td style=width:56%></td><td style=width:1%></td><td style=width:20%></td><td style=width:1%></td><td style=width:20%></td><td style=width:1%></td></tr>
			<tr>
				<td></td>
				<td colspan=5 class=A>EQUIPO A SER DESACOPLADO<textarea name=equipo_desacople maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[equipo_desacople]</textarea></td>
				<td></td>
			</tr>
			<tr style=height:30px><td></td></tr>
			<tr>
				<td></td>
				<td class=A>PRODUCTO CONTENIDO<input name=producto value='$row[producto]' type=text style=width:100% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td class=A>TEMPERATURA<input name=temperatura value='$row[temperatura]' type=text style='width:100%; text-align:center' maxlength=7 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td class=A>PRESIÓN<input name=presion value='$row[presion]' type=text style='width:100%; text-align:center' maxlength=7 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
			</tr>
			<tr style=height:30px><td></td></tr>
			<tr>
				<td></td>
				<td colspan=5 lass=A>UBICACIÓN Y DESCRIPCIÓN DEL DESACOPLE REQUERIDO<textarea name=descripcion1 maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion1]</textarea></td>
				<td></td>
			</tr>
			<tr style=height:30px><td></td></tr>
		</table>
		<table border=0>
			<tr><td class=Bc>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;<input name=cantidad value=$row[cantidad] id=cantidad style='width:8%; text-align:center' maxlength=1 type=texto inputmode=numeric pattern=[1-4]{1} required></td></tr>
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
			<tr><td class=A>OTROS DETALLES, VER EL CERTIFICADO DE HABILITACIÓN # <input name=otros_detalles value=$row[otros_detalles] class=consecutivo style=width:14% maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
		<table>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td class=Bct><b>&nbsp;B. </b></td><td class=B><b>PRECAUCIONES TOMADAS</b>&nbsp;<span>(Verificación previa del área de trabajo)</span></td></tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td></td></tr>
			<tr class=C>
				<td><input type=radio name=B1 id=B1 value=SI "; if ($row['B1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B1 id=b1 value=NO "; if ($row['B1'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B1 id=v1 value=NA "; if ($row['B1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Se ha identificado y demarcado adecuadamente el Área Bajo Control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI "; if ($row['B2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B2 id=b2 value=NO "; if ($row['B2'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B2 id=v2 value=NA "; if ($row['B2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Permiten los factores externos efectuar el trabajo con Seguridad?&nbsp;<span>(Dirección Viento, Condiciones Atmosféricas, Trabajos, etc)</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI "; if ($row['B3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B3 id=b3 value=NO "; if ($row['B3'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B3 id=v3 value=NA "; if ($row['B3'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Se requiere Aislamiento Eléctricio del Equipo?</td></tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI "; if ($row['B4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B4 id=b4 value=NO "; if ($row['B4'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B4 id=v4 value=NA "; if ($row['B4'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Se han suspendido todas las tareas u operaciones que impedirían la realización de este trabajo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI "; if ($row['B5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B5 id=b5 value=NO "; if ($row['B5'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B5 id=v5 value=NA "; if ($row['B5'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Se han suspendido todos los permisos de trabajo en caliente y se retiraron los permisos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI "; if ($row['B6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B6 id=b6 value=NO "; if ($row['B6'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B6 id=v6 value=NA "; if ($row['B6'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>Se requiere de un inspector de Seguridad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI "; if ($row['B7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B7 id=b7 value=NO "; if ($row['B7'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B7 id=v7 value=NA "; if ($row['B7'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Hay algún requisito legal especial? Indique:</td>
			</tr>
			<tr class=C>
				<td colspan=4></td>
				<td colspan=1 class=B><input style=width:98% name=B7a value='$row[B7a]' maxlength=40 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI "; if ($row['B8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B8 id=b8 value=NO "; if ($row['B8'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B8 id=v8 value=NA "; if ($row['B8'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Está disponible y listo el equipo de Primeros Auxilios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI "; if ($row['B9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B9 id=b9 value=NO "; if ($row['B9'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B9 id=v9 value=NA "; if ($row['B9'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Está disponible y listo el Equipo Contra Incendios? Especifique:</td>
			</tr>
			<tr class=C>
				<td colspan=4></td>
				<td colspan=1 class=B><input style=width:98% name=B9a value='$row[B9a]' maxlength=40 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0>
			<tr height=10px>
				<td width= 5%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 2%></td>
			</tr>
			<tr><td colspan=8 class=B>&nbsp;&nbsp;10. ELEMENTOS DE PROTECCIÓN</td></tr>
			<tr>
				<td></td>
				<td><input name=B10a type=checkbox "; if ($row['B10a'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;CASCO</td>
				<td><input name=B10b type=checkbox "; if ($row['B10b'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;RESPIRADOR</td>
				<td><input name=B10c type=checkbox "; if ($row['B10c'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B10d type=checkbox "; if ($row['B10d'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
				<td><input name=B10e type=checkbox "; if ($row['B10e'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
				<td><input name=B10f type=checkbox "; if ($row['B10f'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B10i type=checkbox "; if ($row['B10i'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
				<td><input name=B10j type=checkbox "; if ($row['B10j'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;SALVAVIDAS</td>
				<td></td><td class=B></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width= 2%></td>
				<td width=25%></td><td width=22%></td>
				<td width= 2%></td>
				<td width=25%></td><td width=22%></td>
				<td width= 2%></td>
			</tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B><input name=B10g type=checkbox "; if ($row['B10g'] == 'on') {echo 'checked';} echo " onChange=comprobarB10g(this)>&nbsp;ZAPATOS&nbsp;</td><td><input name=B10g1 id=B10g1 value='"; if ($row['B10g'] == 'on') {echo $row['B10g1'];} else {echo '';} echo "' style='width:100%; "; if ($row['B10g'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B><input name=B10h type=checkbox "; if ($row['B10h'] == 'on') {echo 'checked';} echo " onChange=comprobarB10h(this)>&nbsp;GUANTES&nbsp;</td><td><input name=B10h1 id=B10h1 value='"; if ($row['B10h'] == 'on') {echo $row['B10h1'];} else {echo '';} echo "' style='width:100%; "; if ($row['B10h'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>

				<td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B><input name=B10k type=checkbox "; if ($row['B10k'] == 'on') {echo 'checked';} echo " onChange=comprobarB10k(this)>&nbsp;ROPA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name=B10k1 id=B10k1 value='"; if ($row['B10k'] == 'on') {echo $row['B10k1'];} else {echo '';} echo "' style='width:100%; "; if ($row['B10k'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B><input name=B10l type=checkbox "; if ($row['B10l'] == 'on') {echo 'checked';} echo " onChange=comprobarB10l(this)>&nbsp;OTRO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input name=B10l1 id=B10l1 value='"; if ($row['B10l'] == 'on') {echo $row['B10l1'];} else {echo '';} echo "' style='width:100%; "; if ($row['B10l'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td colspan=5 class=B>
					Si alguna pregunta es <b>NO</b> ó <b>NA</b> explique las razones y las precauciones que implementará:
					<textarea name=razones2 maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[razones2]</textarea>
				</td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td colspan=5 class=B>
					Precauciones Adicionales:
					<textarea name=prec_adic1 maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[prec_adic1]</textarea>
				</td>
				<td></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td class=Bct><b>&nbsp;C. </b></td><td class=B><b>CERTIFICACIÓN DE BLOQUEO Y ETIQUETADO</b><br>El equipo ha sido:</td></tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td></td></tr>
			<tr class=C>
				<td><input type=radio name=C1 id=C1 value=SI "; if ($row['C1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C1 id=c1 value=NO "; if ($row['C1'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C1 id=k1 value=NA "; if ($row['C1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Drenado</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C2 id=C2 value=SI "; if ($row['C2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C2 id=c2 value=NO "; if ($row['C2'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C2 id=k2 value=NA "; if ($row['C2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Despresurizado</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C3 id=C3 value=SI "; if ($row['C3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C3 id=c3 value=NO "; if ($row['C3'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C3 id=k3 value=NA "; if ($row['C3'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Desgasificado</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C4 id=C4 value=SI "; if ($row['C4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C4 id=c4 value=NO "; if ($row['C4'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C4 id=k4 value=NA "; if ($row['C4'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>En tuberías aisladas que tienen producto, se ha previsto la expansión del líquido por temperatura?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C5 id=C5 value=SI "; if ($row['C5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C5 id=c5 value=NO "; if ($row['C5'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C5 id=k5 value=NA "; if ($row['C5'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Las válvulas pertinentes están cerradas con candado y etiqueta?</td>
			</tr>
		</table>
		<div style='position:absolute; width:18.50%; top:3030px; left:0.50%'>
			<table border=1>
				<tr style=height:50px><td style=width:17.3% class=B>&nbsp;Válvula</td></tr>
				<tr style=height:50px><td class=B>&nbsp;Candado</td></tr>
				<tr style=height:50px><td class=B>&nbsp;Etiqueta</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:80.25%; top:3030px; left:19%; overflow:scroll'>
			<table border=1>
				<tr style=height:50px>
					<td style=width:205px class=A><input style=width:95% name=valvula1  value='$row[valvula1]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td style=width:205px class=A><input style=width:95% name=valvula2  value='$row[valvula2]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula3  value='$row[valvula3]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula4  value='$row[valvula4]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula5  value='$row[valvula5]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula6  value='$row[valvula6]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula7  value='$row[valvula7]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula8  value='$row[valvula8]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula9  value='$row[valvula9]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula10 value='$row[valvula10]' type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:205px class=A><input style=width:95% name=valvula11 value='$row[valvula11]' type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr style=height:50px>
					<td class=A><input style=width:95% name=candado1	 value='$row[candado1]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td class=A><input style=width:95% name=candado2	 value='$row[candado2]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado3	 value='$row[candado3]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado4	 value='$row[candado4]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado5	 value='$row[candado5]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado6	 value='$row[candado6]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado7	 value='$row[candado7]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado8	 value='$row[candado8]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado9	 value='$row[candado9]'		type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado10  value='$row[candado10]'	type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=candado11  value='$row[candado11]'	type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr style=height:50px>
					<td class=A><input style=width:95% name=etiqueta1  value='$row[etiqueta1]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td class=A><input style=width:95% name=etiqueta2  value='$row[etiqueta2]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta3  value='$row[etiqueta3]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta4  value='$row[etiqueta4]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta5  value='$row[etiqueta5]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta6  value='$row[etiqueta6]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta7  value='$row[etiqueta7]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta8  value='$row[etiqueta8]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta9  value='$row[etiqueta9]'  type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta10 value='$row[etiqueta10]' type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:95% name=etiqueta11 value='$row[etiqueta11]' type=text maxlength=10 pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; top:3185px'>
			<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
				<tr class=C>
				<td><input type=radio name=C6 id=C6 value=SI "; if ($row['C6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=C6 id=c6 value=NO "; if ($row['C6'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=C6 id=k6 value=NA "; if ($row['C6'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>Se han colocado bridas ciegas?<br>En caso positivo, describa donde están ubicadas.</td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:18.50%; top:3290px; left:0.50%'>
			<table border=1>
				<tr style=height:50px><td style=width:165px class=B>&nbsp;Ubicación</td></tr>
				<tr style=height:50px><td class=B>&nbsp;Ubicación</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:80.25%; top:3290px; left:19%; overflow:scroll'>
			<table border=1>
				<tr style=height:50px>
					<td style=width:388.90px class=A><input style=width:97% name=ubicacionA1 value='$row[ubicacionA1]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td style=width:388.90px class=A><input style=width:97% name=ubicacionA2 value='$row[ubicacionA2]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:388.90px class=A><input style=width:97% name=ubicacionA3 value='$row[ubicacionA3]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:388.90px class=A><input style=width:97% name=ubicacionA4 value='$row[ubicacionA4]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style=width:388.90px class=A><input style=width:97% name=ubicacionA5 value='$row[ubicacionA5]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr style=height:50px>
					<td class=A><input style=width:97% name=ubicacionB1 value='$row[ubicacionB1]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:97% name=ubicacionB2 value='$row[ubicacionB2]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:97% name=ubicacionB3 value='$row[ubicacionB3]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:97% name=ubicacionB4 value='$row[ubicacionB4]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td class=A><input style=width:97% name=ubicacionB5 value='$row[ubicacionB5]' type=text maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; top:3375px'>			<!-- div que 'sube' la última parte del formato -->
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5vw></td><td width=61.50vw></td><td width=18vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;D. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>He leído el permiso. Entiendo su naturaleza y alcance y confirmo que tomaré las precauciones necesarias para ejecutar el trabajo con seguridad.</td>
			</tr>
			<tr><td height=30px></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td><td width=0.001vw></td>
			</tr>
			<tr>
				<td><input name=ejecutorD		value='$row[ejecutorD]'		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreejecD	value='$row[nombreejecD]'	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecD	value='$row[fechaejecD]'	type=date  style=display:none class=mostrarfecha readonly></td>
				<td><input name=horaejecD		value='$row[horaejecD]'		type=time  style=display:none></td>
			</tr>
			<tr><td>EJECUTOR</td><td>NOMBRE</td><td></td><td></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorD	value='$row[inspectorD]'	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreinspD	value='$row[nombreinspD]'	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspD	value='$row[fechainspD]'	type=date  style=display:none class=mostrarfecha readonly></td>
				<td><input name=horainspD		value='$row[horainspD]'		type=time  style=display:none></td>
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
				<td class=B colspan=4>He verificado el cumplimiento de los requisitos impuestos en la sección B y la documentación de la sección C, por lo tanto autorizo llevar a cabo el desacople.</td>
			</tr>
			<tr><td height=30px></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td><td width=0.001vw></td>			</tr>
			<tr>
				<td><input name=emisorE				value='$row[emisorE]'				type=texto style=width:98%		maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorE	value='$row[nombreemisorE]'	type=texto style=width:98%		maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	value='$row[fechaemisorE]'	type=date  style=display:none	class=mostrarfecha readonly></td>
				<td><input name=horaemisorE		value='$row[horaemisorE]'		type=time  style=display:none	class=mostrarhora  readonly></td>
			</tr>
			<tr><td>EMISOR</td><td>NOMBRE</td><td></td><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width= 5%></td><td width=61.50%></td><td width=18%></td><td width=15.50%></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;F. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que el desacople amparado por este permiso</td>
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
			<tr>
				<td></td>
				<td colspan=6 class=B>y el área ha quedado en condiciones de seguridad.</td>
			</tr>
			<tr><td height=30px></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorF		value='$row[ejecutorF]'  type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecF	value='$row[fechaejecF]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaejecF		value='$row[horaejecF]'  type=time  required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorF	value='$row[inspectorF]' type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	value='$row[fechainspF]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horainspF		value='$row[horainspF]'  type=time  required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorF				value='$row[emisorF]'			 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorF	value='$row[fechaemisorF]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaemisorF		value='$row[horaemisorF]'  type=time  required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
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
