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
<!-- 2 --> <div class=fijar style='top:30px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw'>
		<table style='color:white; background-color:rgba(204,0,0,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:661px; display:inline-block; font-size:36px'><b>"; echo $$formulario; echo "</b></span>
				</td>
				<td style='font-family:SCHLBKB; font-size:35px; color:white'>
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
					<span style=font-size:20.00px>COLOCAR LA COPIA DE ESTE PERMISO EN LA ENTRADA DEL ESPACIO CONFINADO</span><br>
					<span style=font-size:24.00px><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr><td>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus>$row[descripcion]</textarea></td></tr>
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
			<tr><td width=25%></td><td width=25%></td><td width=25%></td><td width=25%></td></tr>
			<tr>
				<td class=A><br>FECHA<br>									 <input name=fechaA 			type=date value='$row[fechaA]' min='$row[fechaA]' max='$row[fechaA]' required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='$row[horainicialA]' required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA 	type=time value='$row[horafinalA]' required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit 	class=consecutivo value='$row[certhabilit]' maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;B. LISTA DE VERIFICACIÓN DE REQUISITOS DE SEGURIDAD</b></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td class=B>REQUISITO DE SEGURIDAD</td></tr>
			<tr class=C>
				<td><input type=radio name=B1 id=B1 value=SI "; if ($row['B1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B1 id=b1 value=NO "; if ($row['B1'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B1 id=v1 value=NA "; if ($row['B1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Está el equipo totalmente aislado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI "; if ($row['B2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B2 id=b2 value=NO "; if ($row['B2'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B2 id=v2 value=NA "; if ($row['B2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Se ha retirado todo el producto, lodo e incrustaciones?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI "; if ($row['B3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B3 id=b3 value=NO "; if ($row['B3'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B3 id=v3 value=NA "; if ($row['B3'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos hacer el trabajo con seguridad?<br><span>(Viento, Tormentas, Lluvia, Sol, etc.)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI "; if ($row['B4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B4 id=b4 value=NO "; if ($row['B4'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B4 id=v4 value=NA "; if ($row['B4'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Se ha verificado la atmósfera del espacio confinado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI "; if ($row['B5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B5 id=b5 value=NO "; if ($row['B5'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B5 id=v5 value=NA "; if ($row['B5'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Se ha desgasificado el espacio confinado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI "; if ($row['B6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B6 id=b6 value=NO "; if ($row['B6'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B6 id=v6 value=NA "; if ($row['B6'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>Se tiene iluminación adecuada?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI "; if ($row['B7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B7 id=b7 value=NO "; if ($row['B7'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B7 id=v7 value=NA "; if ($row['B7'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Se requiere ventilación adicional?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI "; if ($row['B8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B8 id=b8 value=NO "; if ($row['B8'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B8 id=v8 value=NA "; if ($row['B8'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Se tiene ingreso y salida libres?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI "; if ($row['B9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B9 id=b9 value=NO "; if ($row['B9'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B9 id=v9 value=NA "; if ($row['B9'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Se requiere de un inspector de Seguridad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B10 id=B10 value=SI "; if ($row['B10'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B10 id=b10 value=NO "; if ($row['B10'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B10 id=v10 value=NA "; if ($row['B10'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>10.</td><td class=B>Se tiene en cuenta la posibilidad de cambios en la atmósfera del espacio confinado?<br><span>(Ver requerimientos para soldadura en el respaldo de la hoja)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B11 id=B11 value=SI "; if ($row['B11'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B11 id=b11 value=NO "; if ($row['B11'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B11 id=v11 value=NA "; if ($row['B11'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>11.</td><td class=B>Se tienen precauciones para el estrés térmico?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B13 id=B13 value=SI "; if ($row['B13'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B13 id=b13 value=NO "; if ($row['B13'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B13 id=v13 value=NA "; if ($row['B13'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>13.</td><td class=B>Están los desagües de áreas vecinas limpios y libres de sustancias combustibles?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B14 id=B14 value=SI "; if ($row['B14'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B14 id=b14 value=NO "; if ($row['B14'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B14 id=v14 value=NA "; if ($row['B14'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>14.</td><td class=B>Están los desagües cercanos cubiertos y sellados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B15 id=B15 value=SI "; if ($row['B15'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B15 id=b15 value=NO "; if ($row['B15'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B15 id=v15 value=NA "; if ($row['B15'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>15.</td><td class=B>Hay algún requisito legal especial?</td>
			</tr>
			<tr class=C>
				<td colspan=4></td>
				<td class=B><input name=B15b value='$row[B15b]' maxlength=36 type=texto style=width:99% pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B16 id=B16 value=SI "; if ($row['B16'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B16 id=b16 value=NO "; if ($row['B16'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B16 id=v16 value=NA "; if ($row['B16'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>16.</td><td class=B>Se ha demarcado al área bajo control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B17 id=B17 value=SI "; if ($row['B17'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B17 id=b17 value=NO "; if ($row['B17'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B17 id=v17 value=NA "; if ($row['B17'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>17.</td><td class=B>Está disponible y listo el equipo de primeros auxilios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B18 id=B18 value=SI "; if ($row['B18'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B18 id=b18 value=NO "; if ($row['B18'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B18 id=v18 value=NA "; if ($row['B18'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>18.</td><td class=B>Está disponible y listo el equipo contra incendios?</td>
			</tr>
			<tr class=C>
				<td colspan=4></td>
				<td class=B><input name=B18a value='$row[B18a]' maxlength=36 type=texto style=width:99% pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B19 id=B19 value=SI "; if ($row['B19'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B19 id=b19 value=NO "; if ($row['B19'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B19 id=v19 value=NA "; if ($row['B19'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>19.</td><td class=B>Se han suspendido tareas vecinas que pueden afectar el trabajo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B20 id=B20 value=SI "; if ($row['B20'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B20 id=b20 value=NO "; if ($row['B20'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B20 id=v20 value=NA "; if ($row['B20'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>20.</td><td class=B>Se tienen precauciones para exposición al plomo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B21 id=B21 value=SI "; if ($row['B21'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B21 id=b21 value=NO "; if ($row['B21'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B21 id=v21 value=NA "; if ($row['B21'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>21.</td><td class=B>El plan de rescate documentado está disponible y actualizado?</td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width= 5%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 2%></td>
			</tr>
			<tr><td colspan=8 class=B>&nbsp;&nbsp;12. ELEMENTOS DE PROTECCIÓN</td></tr>
			<tr>
				<td></td>
				<td><input name=B12a type=checkbox "; if ($row['B12a'] == 'on') {echo 'checked';} echo "></td><td	class=B> &nbsp;CASCO</td>
				<td><input name=B12b type=checkbox "; if ($row['B12b'] == 'on') {echo 'checked';} echo "></td><td	class=B> &nbsp;RESPIRADOR</td>
				<td><input name=B12c type=checkbox "; if ($row['B12c'] == 'on') {echo 'checked';} echo "></td><td	class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B12d type=checkbox "; if ($row['B12d'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
				<td><input name=B12e type=checkbox "; if ($row['B12e'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
				<td><input name=B12f type=checkbox "; if ($row['B12f'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B12i type=checkbox "; if ($row['B12i'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
				<td><input name=B12j type=checkbox "; if ($row['B12j'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;SALVAVIDAS</td>
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
				<td style=text-align:right class=B>ZAPATOS Tipo&nbsp;</td><td><input name=B12g value='$row[B12g]' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>GUANTES Tipo&nbsp;</td><td><input name=B12h value='$row[B12h]' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>ROPA Tipo&nbsp;</td><td><input name=B12k value='$row[B12k]' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>OTRO Tipo&nbsp;</td><td><input name=B12l value='$row[B12l]' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=32.50%></td><td width=32.50%></td><td width=25%></td><td width=10%></td></tr>
			<tr><td colspan=4 class=B>&nbsp;&nbsp;22. PRUEBA DE GASES</td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B22a value='$row[B22a]' maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>MARCA<br>						<input name=B22c value='$row[B22c]' maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B22e value='$row[B22e]' type=date></td>
				<td class=A>BUMP TEST<br>						<input name=B22g type=checkbox "; if ($row['B22g'] == 'on') {echo 'checked';} echo "></td>
			</tr>
			<tr><td height=10></td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B22b value='$row[B22b]' maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>MARCA<br>						<input name=B22d value='$row[B22d]' maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B22f value='$row[B22f]' type=date></td>
				<td class=A>BUMP TEST<br>						<input name=B22h type=checkbox "; if ($row['B22h'] == 'on') {echo 'checked';} echo "></td>
			</tr>
		</table>
		<br>
<!-- 4 --> 	<div style='position:absolute; width:36.40%; left:0.50%; background-color:none'>
		<table border=1>
			<tr height=70px><td class=A3 width=195px>PRUEBA</td>																			<td class=A3 width=140px>Perm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;% LEL</td>												<td class=A1>0%</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Oxígeno</td>											<td class=A1>19,5%-23,5%</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Total<br>&nbsp;Hidrocarburos</td><td class=A1>100 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Etanol</td>											<td class=A1>1.000 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Benceno</td>											<td class=A1>0,5 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Plomo<br>&nbsp;Orgánico</td>			<td class=A1>0,075 mg/m&#179;</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Monóxido de<br>&nbsp;Carbono</td><td class=A1>25 ppm</td></tr>
		</table>
<!-- /4 --> 	</div>
<!-- 5 --> 	<div style='position:absolute; width:62.35%; left:36.90%; background-color:white; overflow:scroll'>
		<table border=1 bordercolor=#ff7000>
			<tr height=70px>
				<td style=width:188px class=A2>Hora<br>1</td><td style=width:132px class=A2>Resultado<br>1</td>
				<td style=width:188px class=A2>Hora<br>2</td><td style=width:132px class=A2>Resultado<br>2</td>
				<td style=width:188px class=A2>Hora<br>3</td><td style=width:132px class=A2>Resultado<br>3</td>
				<td style=width:188px class=A2>Hora<br>4</td><td style=width:132px class=A2>Resultado<br>4</td>
				<td style=width:188px class=A2>Hora<br>5</td><td style=width:132px class=A2>Resultado<br>5</td>
				<td style=width:188px class=A2>Hora<br>6</td><td style=width:132px class=A2>Resultado<br>6</td>
				<td style=width:188px class=A2>Hora<br>7</td><td style=width:132px class=A2>Resultado<br>7</td>
				<td style=width:188px class=A2>Hora<br>8</td><td style=width:132px class=A2>Resultado<br>8</td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A1 type=time  value='$row[B22A1]' required></td>
				<td class=A><input name=B22B1 type=texto value='$row[B22B1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C1 type=time  value='$row[B22C1]'></td>
				<td class=A><input name=B22D1 type=texto value='$row[B22D1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22E1 type=time  value='$row[B22E1]'></td>
				<td class=A><input name=B22F1 type=texto value='$row[B22F1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22G1 type=time  value='$row[B22G1]'></td>
				<td class=A><input name=B22H1 type=texto value='$row[B22H1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22I1 type=time  value='$row[B22I1]'></td>
				<td class=A><input name=B22J1 type=texto value='$row[B22J1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22K1 type=time  value='$row[B22K1]'></td>
				<td class=A><input name=B22L1 type=texto value='$row[B22L1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22M1 type=time  value='$row[B22M1]'></td>
				<td class=A><input name=B22N1 type=texto value='$row[B22N1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B22O1 type=time  value='$row[B22O1]'></td>
				<td class=A><input name=B22P1 type=texto value='$row[B22P1]' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A2 type=time  value='$row[B22A2]' required></td>
				<td class=A><input name=B22B2 type=texto value='$row[B22B2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C2 type=time  value='$row[B22C2]'></td>
				<td class=A><input name=B22D2 type=texto value='$row[B22D2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22E2 type=time  value='$row[B22E2]'></td>
				<td class=A><input name=B22F2 type=texto value='$row[B22F2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22G2 type=time  value='$row[B22G2]'></td>
				<td class=A><input name=B22H2 type=texto value='$row[B22H2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22I2 type=time  value='$row[B22I2]'></td>
				<td class=A><input name=B22J2 type=texto value='$row[B22J2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22K2 type=time  value='$row[B22K2]'></td>
				<td class=A><input name=B22L2 type=texto value='$row[B22L2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22M2 type=time  value='$row[B22M2]'></td>
				<td class=A><input name=B22N2 type=texto value='$row[B22N2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22O2 type=time  value='$row[B22O2]'></td>
				<td class=A><input name=B22P2 type=texto value='$row[B22P2]' id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A3 type=time  value='$row[B22A3]' required></td>
				<td class=A><input name=B22B3 type=texto value='$row[B22B3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C3 type=time  value='$row[B22C3]'></td>
				<td class=A><input name=B22D3 type=texto value='$row[B22D3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22E3 type=time  value='$row[B22E3]'></td>
				<td class=A><input name=B22F3 type=texto value='$row[B22F3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22G3 type=time  value='$row[B22G3]'></td>
				<td class=A><input name=B22H3 type=texto value='$row[B22H3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22I3 type=time  value='$row[B22I3]'></td>
				<td class=A><input name=B22J3 type=texto value='$row[B22J3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22K3 type=time  value='$row[B22K3]'></td>
				<td class=A><input name=B22L3 type=texto value='$row[B22L3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22M3 type=time  value='$row[B22M3]'></td>
				<td class=A><input name=B22N3 type=texto value='$row[B22N3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B22O3 type=time  value='$row[B22O3]'></td>
				<td class=A><input name=B22P3 type=texto value='$row[B22P3]' id=numero	maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A4 type=time  value='$row[B22A4]' required></td>
				<td class=A><input name=B22B4 type=texto value='$row[B22B4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C4 type=time  value='$row[B22C4]'></td>
				<td class=A><input name=B22D4 type=texto value='$row[B22D4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22E4 type=time  value='$row[B22E4]'></td>
				<td class=A><input name=B22F4 type=texto value='$row[B22F4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22G4 type=time  value='$row[B22G4]'></td>
				<td class=A><input name=B22H4 type=texto value='$row[B22H4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22I4 type=time  value='$row[B22I4]'></td>
				<td class=A><input name=B22J4 type=texto value='$row[B22J4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22K4 type=time  value='$row[B22K4]'></td>
				<td class=A><input name=B22L4 type=texto value='$row[B22L4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22M4 type=time  value='$row[B22M4]'></td>
				<td class=A><input name=B22N4 type=texto value='$row[B22N4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B22O4 type=time  value='$row[B22O4]'></td>
				<td class=A><input name=B22P4 type=texto value='$row[B22P4]' id=numero	maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A5 type=time  value='$row[B22A5]' required></td>
				<td class=A><input name=B22B5 type=texto value='$row[B22B5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C5 type=time  value='$row[B22C5]'></td>
				<td class=A><input name=B22D5 type=texto value='$row[B22D5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22E5 type=time  value='$row[B22E5]'></td>
				<td class=A><input name=B22F5 type=texto value='$row[B22F5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22G5 type=time  value='$row[B22G5]'></td>
				<td class=A><input name=B22H5 type=texto value='$row[B22H5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22I5 type=time  value='$row[B22I5]'></td>
				<td class=A><input name=B22J5 type=texto value='$row[B22J5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22K5 type=time  value='$row[B22K5]'></td>
				<td class=A><input name=B22L5 type=texto value='$row[B22L5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22M5 type=time  value='$row[B22M5]'></td>
				<td class=A><input name=B22N5 type=texto value='$row[B22N5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B22O5 type=time  value='$row[B22O5]'></td>
				<td class=A><input name=B22P5 type=texto value='$row[B22P5]' id=numero	maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A6 type=time  value='$row[B22A6]' required></td>
				<td class=A><input name=B22B6 type=texto value='$row[B22B6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C6 type=time  value='$row[B22C6]'></td>
				<td class=A><input name=B22D6 type=texto value='$row[B22D6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22E6 type=time  value='$row[B22E6]'></td>
				<td class=A><input name=B22F6 type=texto value='$row[B22F6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22G6 type=time  value='$row[B22G6]'></td>
				<td class=A><input name=B22H6 type=texto value='$row[B22H6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22I6 type=time  value='$row[B22I6]'></td>
				<td class=A><input name=B22J6 type=texto value='$row[B22J6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22K6 type=time  value='$row[B22K6]'></td>
				<td class=A><input name=B22L6 type=texto value='$row[B22L6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22M6 type=time  value='$row[B22M6]'></td>
				<td class=A><input name=B22N6 type=texto value='$row[B22N6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B22O6 type=time  value='$row[B22O6]'></td>
				<td class=A><input name=B22P6 type=texto value='$row[B22P6]' id=numero	maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B22A7 type=time  value='$row[B22A7]' required></td>
				<td class=A><input name=B22B7 type=texto value='$row[B22B7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric required></td>
				<td class=A><input name=B22C7 type=time  value='$row[B22C7]'></td>
				<td class=A><input name=B22D7 type=texto value='$row[B22D7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22E7 type=time  value='$row[B22E7]'></td>
				<td class=A><input name=B22F7 type=texto value='$row[B22F7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22G7 type=time  value='$row[B22G7]'></td>
				<td class=A><input name=B22H7 type=texto value='$row[B22H7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22I7 type=time  value='$row[B22I7]'></td>
				<td class=A><input name=B22J7 type=texto value='$row[B22J7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22K7 type=time  value='$row[B22K7]'></td>
				<td class=A><input name=B22L7 type=texto value='$row[B22L7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22M7 type=time  value='$row[B22M7]'></td>
				<td class=A><input name=B22N7 type=texto value='$row[B22N7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B22O7 type=time  value='$row[B22O7]'></td>
				<td class=A><input name=B22P7 type=texto value='$row[B22P7]' id=numero	maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
			</tr>
		</table>
<!-- /5 --> 	</div>
	<!-- la tabla anterior tiene 8 filas de 70px c/u. -->
<!-- 6 --> 	<div style='position:relative; width:100vw; left:0px; top:565px; background-color:rgba(0,0,255,0)'>
		<table>
			<tr><td class=A style=text-align:left>&nbsp;&nbsp;CONSULTE LA GUÍA DE MEDICIÓN DE GASES AL REVERSO.</td></tr>
			<tr><td class=A style=text-align:left><b>&nbsp;&nbsp;LA MEDICIÓN DEBE SER CONTÍNUA.<br>&nbsp;&nbsp;SI EL %LEL SE SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b></td></tr>
		</table>
<!-- /6 --> 	</div>
<!-- 7 --> 	<div style='position:relative; width:100vw; left:0px; top:580px'>
		<table border=0>
			<tr>
				<td class=B style='width: 7%; vertical-align:top'>&nbsp;&nbsp;23.</td>
				<td class=B style='width:93%; font-size:30px'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td>
			</tr>
		</table>
<!-- /7 --> 	</div>
<!-- 8 --> 	<div style='position:relative; width:58%; left:0.50%; top:580px; background-color:white'>
		<table border=1>
			<tr height=110><td style=width:540 class=A3>PERSONAL<br>QUE INGRESA</td></tr>
			<tr height= 50><td class=A1><input name=B231 value='$row[B231]' maxlength=30 type=texto style=width:98% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
			<tr height= 50><td class=A1><input name=B232 value='$row[B232]' maxlength=30 type=texto style=width:98% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B233 value='$row[B233]' maxlength=30 type=texto style=width:98% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B234 value='$row[B234]' maxlength=30 type=texto style=width:98% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B235 value='$row[B235]' maxlength=30 type=texto style=width:98% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
		</table>
<!-- /8 --> 	</div>
<!-- 9 --> 	<div style='position:relative; width:40.75%; left:58.50%; top:218.50px; background-color:white; overflow:scroll'>
		<table border=1 bordercolor=#ff7000>
			<tr height=110>
				<td style=width:188px class=A2>Hora<br>Entrada<br>1</td><td style=width:188px class=A2>Hora<br>Salida<br>1</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>2</td><td style=width:188px class=A2>Hora<br>Salida<br>2</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>3</td><td style=width:188px class=A2>Hora<br>Salida<br>3</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>4</td><td style=width:188px class=A2>Hora<br>Salida<br>4</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>5</td><td style=width:188px class=A2>Hora<br>Salida<br>5</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>6</td><td style=width:188px class=A2>Hora<br>Salida<br>6</td>
				<td style=width:188px class=A2>Hora<br>Entrada<br>7</td><td style=width:188px class=A2>Hora<br>Salida<br>7</td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A1 type=time value='$row[B23A1]' required></td>
				<td class=A><input name=B23B1 type=time value='$row[B23B1]' required></td>
				<td class=A><input name=B23C1 type=time value='$row[B23C1]'></td>
				<td class=A><input name=B23D1 type=time value='$row[B23D1]'></td>
				<td class=A><input name=B23E1 type=time value='$row[B23E1]'></td>
				<td class=A><input name=B23F1 type=time value='$row[B23F1]'></td>
				<td class=A><input name=B23G1 type=time value='$row[B23G1]'></td>
				<td class=A><input name=B23H1 type=time value='$row[B23H1]'></td>
				<td class=A><input name=B23I1 type=time value='$row[B23I1]'></td>
				<td class=A><input name=B23J1 type=time value='$row[B23J1]'></td>
				<td class=A><input name=B23K1 type=time value='$row[B23K1]'></td>
				<td class=A><input name=B23L1 type=time value='$row[B23L1]'></td>
				<td class=A><input name=B23M1 type=time value='$row[B23M1]'></td>
				<td class=A><input name=B23N1 type=time value='$row[B23N1]'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A2 type=time value='$row[B23A2]'></td>
				<td class=A><input name=B23B2 type=time value='$row[B23B2]'></td>
				<td class=A><input name=B23C2 type=time value='$row[B23C2]'></td>
				<td class=A><input name=B23D2 type=time value='$row[B23D2]'></td>
				<td class=A><input name=B23E2 type=time value='$row[B23E2]'></td>
				<td class=A><input name=B23F2 type=time value='$row[B23F2]'></td>
				<td class=A><input name=B23G2 type=time value='$row[B23G2]'></td>
				<td class=A><input name=B23H2 type=time value='$row[B23H2]'></td>
				<td class=A><input name=B23I2 type=time value='$row[B23I2]'></td>
				<td class=A><input name=B23J2 type=time value='$row[B23J2]'></td>
				<td class=A><input name=B23K2 type=time value='$row[B23K2]'></td>
				<td class=A><input name=B23L2 type=time value='$row[B23L2]'></td>
				<td class=A><input name=B23M2 type=time value='$row[B23M2]'></td>
				<td class=A><input name=B23N2 type=time value='$row[B23N2]'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A3 type=time value='$row[B23A3]'></td>
				<td class=A><input name=B23B3 type=time value='$row[B23B3]'></td>
				<td class=A><input name=B23C3 type=time value='$row[B23C3]'></td>
				<td class=A><input name=B23D3 type=time value='$row[B23D3]'></td>
				<td class=A><input name=B23E3 type=time value='$row[B23E3]'></td>
				<td class=A><input name=B23F3 type=time value='$row[B23F3]'></td>
				<td class=A><input name=B23G3 type=time value='$row[B23G3]'></td>
				<td class=A><input name=B23H3 type=time value='$row[B23H3]'></td>
				<td class=A><input name=B23I3 type=time value='$row[B23I3]'></td>
				<td class=A><input name=B23J3 type=time value='$row[B23J3]'></td>
				<td class=A><input name=B23K3 type=time value='$row[B23K3]'></td>
				<td class=A><input name=B23L3 type=time value='$row[B23L3]'></td>
				<td class=A><input name=B23M3 type=time value='$row[B23M3]'></td>
				<td class=A><input name=B23N3 type=time value='$row[B23N3]'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A4 type=time value='$row[B23A4]'></td>
				<td class=A><input name=B23B4 type=time value='$row[B23B4]'></td>
				<td class=A><input name=B23C4 type=time value='$row[B23C4]'></td>
				<td class=A><input name=B23D4 type=time value='$row[B23D4]'></td>
				<td class=A><input name=B23E4 type=time value='$row[B23E4]'></td>
				<td class=A><input name=B23F4 type=time value='$row[B23F4]'></td>
				<td class=A><input name=B23G4 type=time value='$row[B23G4]'></td>
				<td class=A><input name=B23H4 type=time value='$row[B23H4]'></td>
				<td class=A><input name=B23I4 type=time value='$row[B23I4]'></td>
				<td class=A><input name=B23J4 type=time value='$row[B23J4]'></td>
				<td class=A><input name=B23K4 type=time value='$row[B23K4]'></td>
				<td class=A><input name=B23L4 type=time value='$row[B23L4]'></td>
				<td class=A><input name=B23M4 type=time value='$row[B23M4]'></td>
				<td class=A><input name=B23N4 type=time value='$row[B23N4]'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A5 type=time value='$row[B23A5]'></td>
				<td class=A><input name=B23B5 type=time value='$row[B23B5]'></td>
				<td class=A><input name=B23C5 type=time value='$row[B23C5]'></td>
				<td class=A><input name=B23D5 type=time value='$row[B23D5]'></td>
				<td class=A><input name=B23E5 type=time value='$row[B23E5]'></td>
				<td class=A><input name=B23F5 type=time value='$row[B23F5]'></td>
				<td class=A><input name=B23G5 type=time value='$row[B23G5]'></td>
				<td class=A><input name=B23H5 type=time value='$row[B23H5]'></td>
				<td class=A><input name=B23I5 type=time value='$row[B23I5]'></td>
				<td class=A><input name=B23J5 type=time value='$row[B23J5]'></td>
				<td class=A><input name=B23K5 type=time value='$row[B23K5]'></td>
				<td class=A><input name=B23L5 type=time value='$row[B23L5]'></td>
				<td class=A><input name=B23M5 type=time value='$row[B23M5]'></td>
				<td class=A><input name=B23N5 type=time value='$row[B23N5]'></td>
			</tr>
		</table>
<!-- /9 --> 	</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
	<!-- la tabla anterior tiene 6 filas, 1 de 100px + 5 de 50px c/u. -->
<!-- 10 --> 		<div style='position:relative; left:0px; width:100vw; top:220px'> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo que los requisitos indicados en la sección B se cumplen y que hay seguridad para ingresar al espacio confinado y para realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60.5vw></td></td><td width=21vw></td><td width=18.5vw></td></tr>
			<tr>
				<td><input name=ejecutorC		value='$row[ejecutorC]'	 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC	value='$row[fechaejecC]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaejecC		value='$row[horaejecC]'  type=time  required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorC value='$row[inspectorC]' type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspC value='$row[fechainspC]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horainspC  value='$row[horainspC]'  type=time  required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5vw></td><td width=95vw></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;D. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Certifico que los aislamientos y desacoples se han efectuado apropiadamente y que el área es segura para el ingreso.<br>Por lo tanto, <b>AUTORIZO</b> el ingreso al espacio confinado y la realización del trabajo indicado en la sección A.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=0.001vw></td><td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td>
			</tr>
			<tr>
				<td><input name=fechaemisorD	value='$row[fechaemisorD]'	type=date  class=mostrarfecha readonly required style=display:none></td>
				<td><input name=emisorD				value='$row[emisorD]'				type=texto style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorD	value='$row[nombreemisorD]'	type=texto style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=horaemisorD		value='$row[horaemisorD]'		type=time  class=mostrarhora  readonly required style=display:none></td>
			</tr>
			<tr>
				<td></td><td>EMISOR</td><td>NOMBRE</td><td></td>
			</tr>
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
				<td class=B colspan=3>Certifico que el trabajo que motivó el ingreso al espacio confinado:</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:5%></td>
				<td style=width:4%><input type=radio name=cancelacion id=A value=A "; if ($row['cancelacion'] == 'A') {echo 'checked';} echo " required></td>
				<td style=width:23% class=B> &nbsp;Se ha<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B "; if ($row['cancelacion'] == 'B') {echo 'checked';} echo " ></td>
				<td style=width:19% class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C "; if ($row['cancelacion'] == 'C') {echo 'checked';} echo " ></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=6 class=B>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.<br><br></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorE		value='$row[ejecutorE]'  type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecE	value='$row[fechaejecE]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaejecE		value='$row[horaejecE]'  type=time  required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorE	value='$row[inspectorE]' type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspE	value='$row[fechainspE]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horainspE		value='$row[horainspE]'  type=time  required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorE				value='$row[emisorE]'			 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	value='$row[fechaemisorE]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaemisorE		value='$row[horaemisorE]'  type=time  required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
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
