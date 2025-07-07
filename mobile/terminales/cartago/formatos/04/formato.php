<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
</style>
</head>
<script>
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
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
<!-- /2 --> </div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 --> 	<div style="position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw">
		<table border=0 style="color:white; background-color:rgba(0,0,204,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<? echo $estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:570px; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:white; background-color:rgba(0,0,204,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style=font-size:20.00px>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.</span><br>
					<span style=font-size:19.35px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style=font-size:20.00px>COLOCAR LA COPIA DE ESTE PERMISO EN LA ENTRADA DEL ESPACIO CONFINADO</span><br>
					<span style=font-size:24.00px><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr><td class=A>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=84% class=Br>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</td>
				<td style="width:16%; text-align:left">
				<input style="width:40%; text-align:center" name=cantidad id=cantidad maxlength=1 type=texto inputmode=numeric pattern=[1-4]{1} required>
				</td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=1%></td><td width=48.50%></td><td width=1%></td><td width=48.50%></td><td width=1%></td><tr>
			<tr><td></td>
				<td><input name=nombre1 id=nombre1 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;1er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre2 id=nombre2 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;2o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr><td></td>
				<td><input name=nombre3 id=nombre3 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;3er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre4 id=nombre4 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;4o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
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
				<td class=A><br>FECHA<br>									 <input name=fechaA				type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='<?echo $hora;?>' required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA		type=time value='<?echo $hora;?>' required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit	class=consecutivo maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
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
				<td><input type=radio name=B1 id=B1 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B1 id=b1 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B1 id=v1 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>1.</td><td class=B>Está el equipo totalmente aislado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B2 id=b2 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B2 id=v2 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>2.</td><td class=B>Se ha retirado todo el producto, lodo e incrustaciones?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B3 id=b3 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B3 id=v3 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos hacer el trabajo con seguridad?<br><span>(Viento, Tormentas, Lluvia, Sol, etc.)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B4 id=b4 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B4 id=v4 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>4.</td><td class=B>Se ha verificado la atmósfera del espacio confinado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B5 id=b5 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B5 id=v5 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>5.</td><td class=B>Se ha desgasificado el espacio confinado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B6 id=b6 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B6 id=v6 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>6.</td><td class=B>Se tiene iluminación adecuada?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B7 id=b7 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B7 id=v7 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>7.</td><td class=B>Se requiere ventilación adicional?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B8 id=b8 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B8 id=v8 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>8.</td><td class=B>Se tiene ingreso y salida libres?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B9 id=b9 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B9 id=v9 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>9.</td><td class=B>Se requiere de un inspector de Seguridad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B10 id=B10 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B10 id=b10 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B10 id=v10 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>10.</td><td class=B>Se tienen precauciones para el estrés térmico?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B12 id=B12 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B12 id=b12 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B12 id=v12 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>12.</td><td class=B>Se tiene en cuenta la posibilidad de cambios en la atmósfera del espacio confinado?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B13 id=B13 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B13 id=b13 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B13 id=v13 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>13.</td><td class=B>Hay algún requisito legal especial?<input name=B13a maxlength=13 type=texto style=width:33% pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
<!--
			<tr class=C>
				<td colspan=4></td>
				<td class=B><input name=B13a maxlength=13 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
-->
			<tr class=C>
				<td><input type=radio name=B14 id=B14 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B14 id=b14 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B14 id=v14 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>14.</td><td class=B>Se ha demarcado al área bajo control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B15 id=B15 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B15 id=b15 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B15 id=v15 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>15.</td><td class=B>Está disponible y listo el equipo de primeros auxilios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B16 id=B16 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B16 id=b16 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B16 id=v16 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>16.</td><td class=B>Está disponible y listo el equipo contra incendios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B17 id=B17 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B17 id=b17 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B17 id=v17 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>17.</td><td class=B>Se han suspendido tareas vecinas que pueden afectar el trabajo?</td></tr>
			<tr class=C>
				<td><input type=radio name=B18 id=B18 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B18 id=b18 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B18 id=v18 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>18.</td><td class=B>Se tienen precauciones para exposición al plomo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B19 id=B19 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B19 id=b19 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B19 id=v19 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>19.</td><td class=B>El plan de rescate documentado está disponible y actualizado?</td>
			</tr>
 		<tr height=20><td></td></tr>
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
				<td><input name=B11a type=checkbox></td><td class=B> &nbsp;CASCO</td>
				<td><input name=B11b type=checkbox></td><td class=B> &nbsp;RESPIRADOR</td>
				<td><input name=B11c type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11d type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
				<td><input name=B11e type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
				<td><input name=B11f type=checkbox></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11i type=checkbox></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
				<td><input name=B11j type=checkbox></td><td class=B> &nbsp;SALVAVIDAS</td>
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
				<td style=text-align:right class=B>ZAPATOS Tipo&nbsp;</td><td><input name=B11g maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>GUANTES Tipo&nbsp;</td><td><input name=B11h maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>ROPA Tipo&nbsp;</td><td><input name=B11k maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>OTRO Tipo&nbsp;</td><td><input name=B11l maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=32.50%></td><td width=32.50%></td><td width=25%></td><td width=10%></td></tr>
			<tr><td colspan=3 class=B>&nbsp;&nbsp;20. PRUEBA DE GASES</td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B20a maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=A><br>MARCA<br>						<input name=B20c maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B20e type=date value='<?echo $hoy;?>' required></td>
				<td class=A>BUMP TEST<br>						<input name=B20g type=checkbox></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B20b maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>MARCA<br>						<input name=B20d maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B20f type=date value='<?echo $hoy;?>'></td>
				<td class=A>BUMP TEST<br>						<input name=B20h type=checkbox></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
<!-- 4 --> 		<div style="position:absolute; width:34.30%; left:0.50%; background-color:white">
		<table border=1>
			<tr height=70px><td class=A3 style=width:165px>PRUEBA</td>																<td style=width:150px class=A3>Perm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;% LEL</td>												<td class=A1>0%</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Oxígeno</td>											<td class=A1>19,5%-23,5%</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Total<br>&nbsp;Hidrocarburos</td><td class=A1>100 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Etanol</td>											<td class=A1>1.000 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Benceno</td>											<td class=A1>0,5 ppm</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Plomo<br>&nbsp;Orgánico</td>			<td class=A1>0,075 mg/m&#179;</td></tr>
			<tr height=70px><td class=A1 style=text-align:left>&nbsp;Monóxido de<br>&nbsp;Carbono</td><td class=A1>25 ppm</td></tr>
		</table>
<!-- /4 --> 	</div>
<!-- 5 --> 	<div style="position:absolute; width:64.45%; left:34.80%; background-color:white; overflow:scroll">
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
				<td class=A><input name=B20A1 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20E1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20G1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20I1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20K1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20M1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B20O1 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P1 type=texto value='' id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A2 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20E2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20G2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20I2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20K2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20M2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20O2 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P2 type=texto value='' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A3 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20E3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20G3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20I3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20K3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20M3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
				<td class=A><input name=B20O3 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P3 type=texto value='' id=numero maxlength=3 pattern=^(([0-9]){1,3}?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A4 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20E4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20G4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20I4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20K4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20M4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
				<td class=A><input name=B20O4 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P4 type=texto value='' id=numero maxlength=4 pattern=^(([0-9]){1,4}?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A5 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20E5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20G5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20I5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20K5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20M5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				<td class=A><input name=B20O5 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P5 type=texto value='' id=numero maxlength=3 pattern=^([0]{1}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A6 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20E6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20G6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20I6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20K6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20M6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
				<td class=A><input name=B20O6 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P6 type=texto value='' id=numero maxlength=5 pattern=^([0]{1}(\.[0-9]{1,3})?)$ inputmode=numeric></td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B20A7 type=time  value='<?echo $hora;?>' required></td>
				<td class=A><input name=B20B7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric required></td>
				<td class=A><input name=B20C7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20D7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20E7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20F7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20G7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20H7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20I7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20J7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20K7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20L7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20M7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20N7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
				<td class=A><input name=B20O7 type=time  value='<?echo $hora;?>'></td>
				<td class=A><input name=B20P7 type=texto value='' id=numero maxlength=2 pattern=^(([0-9]){1,2}?)$ inputmode=numeric></td>
			</tr>
		</table>
<!-- /5 --> 	</div>
	<!-- la tabla anterior tiene 8 filas de 70px c/u. -->
<!-- 6 --> 	<div style="position:relative; width:100vw; left:0px; top:565px; background-color:rgba(0,0,255,0)">
		<table>
			<tr><td class=A style=text-align:left><b>&nbsp;&nbsp;LA MEDICIÓN DEBE SER CONTÍNUA.<br>&nbsp;&nbsp;SI EL %LEL SE SUBE DE 4%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b></td></tr>
		</table>
<!-- /6 --> 	</div>
<!-- 7 --> 	<div style="position:relative; width:100vw; left:0px; top:580px">
		<table border=0>
			<tr>
				<td class=B style="width: 7%; vertical-align:top">&nbsp;&nbsp;23.</td>
				<td class=B style="width:93%; font-size:30px">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td>
			</tr>
		</table>
<!-- /7 --> 	</div>
<!-- 8 --> 	<div style="position:relative; width:59%; left:0.50%; top:580px; background-color:white">
		<table border=1>
			<tr height=110><td style=width:550 class=A3>PERSONAL<br>QUE INGRESA</td></tr>
			<tr height= 50><td class=A1><input name=B231 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
			<tr height= 50><td class=A1><input name=B232 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B233 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B234 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height= 50><td class=A1><input name=B235 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
		</table>
<!-- /8 --> 	</div>
<!-- 9 --> 	<div style="position:relative; width:39.75%; left:59.50%; top:218.50px; background-color:white; overflow:scroll">
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
				<td class=A><input name=B23A1 type=time value='<?echo $hora;?>' required></td>
				<td class=A><input name=B23B1 type=time value='<?echo $hora;?>' required></td>
				<td class=A><input name=B23C1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23D1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23E1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23F1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23G1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23H1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23I1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23J1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23K1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23L1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23M1 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23N1 type=time value='<?echo $hora;?>'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23B2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23C2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23D2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23E2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23F2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23G2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23H2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23I2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23J2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23K2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23L2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23M2 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23N2 type=time value='<?echo $hora;?>'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23B3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23C3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23D3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23E3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23F3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23G3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23H3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23I3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23J3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23K3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23L3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23M3 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23N3 type=time value='<?echo $hora;?>'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23B4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23C4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23D4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23E4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23F4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23G4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23H4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23I4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23J4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23K4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23L4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23M4 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23N4 type=time value='<?echo $hora;?>'></td>
			</tr>
			<tr height=50>
				<td class=A><input name=B23A5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23B5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23C5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23D5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23E5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23F5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23G5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23H5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23I5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23J5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23K5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23L5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23M5 type=time value='<?echo $hora;?>'></td>
				<td class=A><input name=B23N5 type=time value='<?echo $hora;?>'></td>
			</tr>
		</table>
<!-- /9 --> 	</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
	<!-- la tabla anterior tiene 6 filas, 1 de 100px + 5 de 50px c/u. -->
<!-- 10 --> 		<div style="position:relative; left:0; width:100vw; top:220"> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo que he leído y entiendo los requisitos indicados en la sección B, que se cumplen y que hay seguridad para ingresar al espacio confinado y realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.<br><br></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorC		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC	type=date  class=mostrarfecha value='<?echo $fecha_oculta;?>'> readonly></td>
				<td><input name=horaejecC		type=time	 min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorC type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspC type=date  class=mostrarfecha value='<?echo $fecha_oculta;?>' readonly></td>
				<td><input name=horainspC  type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=27.65vw></td><td width=33.85vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;D. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=4>Certifico que los aislamientos y desacoples se han efectuado apropiadamente y que el área es segura para el ingreso.<br>Por lo tanto, <b>AUTORIZO</b> el ingreso al espacio confinado y la realización del trabajo indicado en la sección A.<br><br></td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td width=0.001vw></td><td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td>
			</tr>
			<tr>
				<td><input name=fechaemisorD	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required style=display:none></td>
				<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=horaemisorD		type=time  class=mostrarhora  value='<?echo $hora;?>' readonly required style=display:none></td>
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
				<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=gestionarClickRadio(this) required></td>
				<td style=width:23% class=B> &nbsp;Se ha<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=gestionarClickRadio(this)></td>
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
				<td><input name=ejecutorE		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecE	type=date  class=mostrarfecha value='<?echo $fecha_oculta;?>' readonly></td>
				<td><input name=horaejecE		type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspE	type=date  class=mostrarfecha value='<?echo $fecha_oculta;?>' readonly></td>
				<td><input name=horainspE		type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	type=date  class=mostrarfecha value='<?echo $fecha_oculta;?>' readonly></td>
				<td><input name=horaemisorE		type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>
		<table>
			<tr height=30><td></td></tr>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td>
					<form method=post>
						<select name=usuario id=usuario type=texto required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
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
			<tr height=30><td></td></tr>
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
<!-- /1 --> </div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
