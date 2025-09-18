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
		<table style='color:white; background-color:rgba(100,170,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:570px; display:inline-block; font-size:36px'><b>"; echo $$formulario; echo "</b></span>
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
	 		<tr height=10><td></td></tr>
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
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value == 2) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = true; n3.style.display = 'none';
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value == 3) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value >= 4) {c.value = 4;
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = false; n4.style.display = 'block'; n4.required = true;};});
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
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;B. DOCUMENTACIÓN ADICIONAL</b></td></tr>
			<tr><td colspan=5 class=B><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Verificación previa del área de trabajo)</span></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td class=B>REQUISITO DE SEGURIDAD</td></tr>
			<tr class=C>
				<td><input type=radio name=B1 id=B1 value=SI "; if ($row['B1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B1 id=b1 value=NO "; if ($row['B1'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B1 id=v1 value=NA "; if ($row['B1'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Está el área limpía y libre de sustancias combustibles o tóxicas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI "; if ($row['B2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B2 id=b2 value=NO "; if ($row['B2'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B2 id=v2 value=NA "; if ($row['B2'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Están los desagües cercanos Cubiertos y Sellados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI "; if ($row['B3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B3 id=b3 value=NO "; if ($row['B3'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B3 id=v3 value=NA "; if ($row['B3'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos efectuar el trabajo con Seguridad?<br><span>(Dirección Viento, Condiciones Atmosféricas, Trabajos vecinos)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI "; if ($row['B4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B4 id=b4 value=NO "; if ($row['B4'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B4 id=v4 value=NA "; if ($row['B4'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Se ha identificado y demarcado adecuadamente el Área Bajo Control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI "; if ($row['B5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B5 id=b5 value=NO "; if ($row['B5'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B5 id=v5 value=NA "; if ($row['B5'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Se necesita documentación adicional? Indique:</td>
			</tr>
			<tr class=C>
				<td colspan=3></td>
				<td  colspan=2 class=B><textarea name=indiqueB5b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[indiqueB5b]</textarea></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI "; if ($row['B6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B6 id=b6 value=NO "; if ($row['B6'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B6 id=v6 value=NA "; if ($row['B6'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>Hay algún requisito legal especial? Indique:</td>
			</tr>
			<tr class=C>
				<td colspan=3></td>
				<td colspan=2 class=B><textarea name=indiqueB6b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[indiqueB6b]</textarea></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI "; if ($row['B7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B7 id=b7 value=NO "; if ($row['B7'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B7 id=v7 value=NA "; if ($row['B7'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Se han suspendido todas las áreas u operaciones que impedirían la realización de este trabajo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI "; if ($row['B8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B8 id=b8 value=NO "; if ($row['B8'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B8 id=v8 value=NA "; if ($row['B8'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Se requiere inspector de Seguridad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI "; if ($row['B9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B9 id=b9 value=NO "; if ($row['B9'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B9 id=v9 value=NA "; if ($row['B9'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Está disponible y listo el equipo de Primeros Auxilios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B10 id=B10 value=SI "; if ($row['B10'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B10 id=b10 value=NO "; if ($row['B10'] == 'NO') {echo 'checked';} echo "></td>
				<td><input type=radio name=B10 id=v10 value=NA "; if ($row['B10'] == 'NA') {echo 'checked';} echo "></td>
				<td class=numero>10.</td><td class=B>Está disponible y listo el Equipo Contra Incendios? Especifique:</td>
			</tr>
			<tr class=C>
				<td colspan=3></td>
				<td colspan=2 class=B><textarea name=especifiqueB10b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[especifiqueB10b]</textarea></td>
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
			<tr><td colspan=8 class=B>&nbsp;&nbsp;11. ELEMENTOS DE PROTECCIÓN</td></tr>
			<tr>
				<td></td>
				<td><input name=B11a type=checkbox "; if ($row['B11a'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;CASCO</td>
				<td><input name=B11b type=checkbox "; if ($row['B11b'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;RESPIRADOR</td>
				<td><input name=B11d type=checkbox "; if ($row['B11d'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11e type=checkbox "; if ($row['B11e'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
				<td><input name=B11g type=checkbox "; if ($row['B11g'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
				<td><input name=B11h type=checkbox "; if ($row['B11h'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11f type=checkbox "; if ($row['B11f'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
				<td><input name=B11c type=checkbox "; if ($row['B11c'] == 'on') {echo 'checked';} echo "></td><td class=B> &nbsp;SALVAVIDAS</td>
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
				<td style=text-align:right class=B>GUANTES <input name=B11i type=checkbox "; if ($row['B11i'] == 'on') {echo 'checked';} echo " onChange=comprobarB11i(this)></td>
				<td>
					<input name='guante' id='guante' value='"; if ($row['B11i'] == 'on') {echo $row['guante'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11i'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
				<td style=text-align:right class=B>CALZADO <input name=B11j type=checkbox "; if ($row['B11j'] == 'on') {echo 'checked';} echo " onChange=comprobarB11j(this)></td>
				<td>
					<input name='calzado' id='calzado' value='"; if ($row['B11j'] == 'on') {echo $row['calzado'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11j'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
			</tr>
	 		<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>DELANTAL <input name=B11k type=checkbox "; if ($row['B11k'] == 'on') {echo 'checked';} echo " onChange=comprobarB11k(this)></td>
				<td>
					<input name='delantal' id='delantal' value='"; if ($row['B11k'] == 'on') {echo $row['delantal'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11k'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
				<td style=text-align:right class=B>ROPA <input name=B11l type=checkbox "; if ($row['B11l'] == 'on') {echo 'checked';} echo " onChange=comprobarB11l(this)></td>
				<td>
					<input name='ropa' id='ropa' value='"; if ($row['B11l'] == 'on') {echo $row['ropa'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11l'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
			</tr>
	 		<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>Otro 1 <input name=B11m type=checkbox "; if ($row['B11m'] == 'on') {echo 'checked';} echo " onChange=comprobarB11m(this)></td>
				<td>
					<input name='otro1' id='otro1' value='"; if ($row['B11m'] == 'on') {echo $row['otro1'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11m'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
				<td style=text-align:right class=B>Otro 2 <input name=B11n type=checkbox "; if ($row['B11n'] == 'on') {echo 'checked';} echo " onChange=comprobarB11n(this)></td>
				<td>
					<input name='otro2' id='otro2' value='"; if ($row['B11n'] == 'on') {echo $row['otro2'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11n'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
			</tr>
	 		<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>Otro 3 <input name=B11o type=checkbox "; if ($row['B11o'] == 'on') {echo 'checked';} echo " onChange=comprobarB11o(this)></td>
				<td>
					<input name='otro3' id='otro3' value='"; if ($row['B11o'] == 'on') {echo $row['otro3'];} else {echo '';} echo "'
					style='width:100%; "; if ($row['B11o'] != 'on') {echo 'display:none';} echo "' maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=32.50vw></td><td width=32.50vw></td><td width=25vw></td><td width=10vw></td></tr>
			<tr><td colspan=3 style=text-align:left class=B>&nbsp;&nbsp;12. PRUEBA DE GASES</td></tr>
			<tr>
				<td colspan=3>
					<table border=0>
						<tr><td width=64vw></td><td width=9vw></td><td width=9vw></td><td width=9vw></td><td width=9vw></td></tr>
						<tr class=C>
							<td class=B style=text-align:right>Se requiere hacer prueba de gases?</td>
							<td class=B style=text-align:right>SI&nbsp;</td>
							<td style=text-align:left><input type=radio name=req_pr_gas id=RPG value=SI "; if ($row['req_pr_gas'] == 'SI') {echo 'checked';} echo " required></td>
							<td class=B style=text-align:right>NO&nbsp;</td>
							<td style=text-align:left><input type=radio name=req_pr_gas id=rpg value=NO "; if ($row['req_pr_gas'] == 'NO') {echo 'checked';} echo "></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B12equipo		value='$row[B12equipo]' type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>DUEÑO<br>						<input name=B12dueno		value='$row[B12dueno]'  type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B12fecha 		type=date  value='$row[B12fecha]' min='$row[B12fecha]' max='$row[B12fecha]'></td>
				<td class=A>BUMP<br>TEST<br>				<input name=B12bumptest type=checkbox "; if ($row['B12bumptest'] == 'on') {echo 'checked';} echo "></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
<!-- 4 --> 		<div style='position:absolute; width:21.70%; left:0.50%; background-color:white'>
		<table border=1>
			<tr height=70px><td class=A3 width=195px>PRUEBA</td></tr>
			<tr height=70px><td class=A1>%LEL</td></tr>
		</table>
<!-- /4 --> 	</div>
<!-- 5 --> 		<div style='position:absolute; width:77.05%; left:22.20%; background-color:white; overflow:scroll'>
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
				<td class=A><input name=B12hora1	type=time  value='$row[B12hora1]' required></td>
				<td class=A><input name=B12resul1 type=texto value='$row[B12resul1]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
				<td class=A><input name=B12hora2	type=time  value='$row[B12hora2]'</td>
				<td class=A><input name=B12resul2 type=texto value='$row[B12resul2]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora3	type=time  value='$row[B12hora3]'</td>
				<td class=A><input name=B12resul3 type=texto value='$row[B12resul3]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora4	type=time  value='$row[B12hora4]'</td>
				<td class=A><input name=B12resul4 type=texto value='$row[B12resul4]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora5	type=time  value='$row[B12hora5]'</td>
				<td class=A><input name=B12resul5 type=texto value='$row[B12resul5]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora6	type=time  value='$row[B12hora6]'</td>
				<td class=A><input name=B12resul6 type=texto value='$row[B12resul6]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora7	type=time  value='$row[B12hora7]'</td>
				<td class=A><input name=B12resul7 type=texto value='$row[B12resul7]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora8	type=time  value='$row[B12hora8]'</td>
				<td class=A><input name=B12resul8 type=texto value='$row[B12resul8]' id=numero value='' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
			</tr>
		</table>
<!-- /5 --> 		</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
	<!-- la tabla anterior tiene 6 filas, 1 de 100px + 5 de 50px c/u. -->
<!-- 7 --> 		<div style='position:relative; left:0px; width:100vw; top:170px'> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td width=5vw></td><td width=61vw></td><td width=18vw></td><td width=16vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo que los requisitos indicados en la sección B se cumplen y que hay seguridad para realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.<br><br></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorC		value='$row[ejecutorC]'	 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC	value='$row[fechaejecC]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaejecC		value='$row[horaejecC]'  type=time  required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
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
			<tr><td height=30></td></tr>
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
				<td class=B colspan=3>Certifico que el Trabajo mencionado en la Sección A:</td>
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
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorE	value='$row[inspectorE]' type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspE	value='$row[fechainspE]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horainspE		value='$row[horainspE]'  type=time  required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorE				value='$row[emisorE]'			 type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	value='$row[fechaemisorE]' type=date  class=mostrarfecha readonly required></td>
				<td><input name=horaemisorE		value='$row[horaemisorE]'  type=time  required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
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
<!-- /7 --> 	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>
</form>

"; ?>		<!-- cierre del php que se usa para editar el formato -->
<!-- /1 --> </div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
