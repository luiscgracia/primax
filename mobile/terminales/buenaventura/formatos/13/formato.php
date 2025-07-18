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
<script type="text/javascript">
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
<!-- 2 --> <div class=fijar style="top:15px; left:15px">
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
					<span style="font-size:36px; width:420px; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
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
					<span style=font-size:20.00px>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO</span><br>
					<span style=font-size:19.45px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr></table>
		<table border=0>
			<tr>
				<td style=width:25% class=A><br>FECHA<input name=fechaA type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required autofocus></td>
				<td style=width:25% class=A>HORA<br>INICIAL<input name=horainicialA type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td style=width:25% class=A>HORA<br>FINAL<input name=horafinalA type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td style=width:25% class=A>CERTIFICADO<br>HABILITACIÓN<input name=certhabilit class=consecutivo style=width:80% maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=30px><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:75% class=A><br>UBICACIÓN<textarea name=ubicacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
				<td style="vertical-align:bottom; width:25%" class=A>ALTURA<br>APROXIMADA<input name=altura type=text style="width:100%; text-align:center" maxlength=5 inputmode=numeric title="##.##" pattern=^(([0-9]{1,2})?(.\d\d))?$ required></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td colspan=2 class=A>TIPO DE TRABAJO<br><textarea name=tipo_trabajo maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td colspan=2 class=A>DESCRIPCIÓN DEL TRABAJO<br><textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
			</tr>
			<tr height=30px><td></td></tr>
		</table>
		<table>
			<tr><td class=A>PERSONAS AUTORIZADAS PARA EL TRABAJO - Cantidad:&nbsp;<input name=cantidad	id=cantidad	type=text	style="width:8%; text-align:center"	maxlength=1 inputmode=numeric	title="Entre 1 y 4 personas." pattern=^(?:[1-4]{1})$ required></td></tr>
			<tr height=30px><td></td></tr>
		</table>
		<div id=nombre style="display:none">
		<table>
			<tr><td style=width:60%></td><td style=width:20%></td><td style=width:20%></td></tr>
			<tr>
					<td class=A2>NOMBRE</td><td class=A2>CÉDULA</td><td>FIRMA</td>
			</tr>
			<tr>
				<td><input name=nombre1	id=nombre1	type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedula1	id=cedula1	type=text	style="width:100%; display:none; text-align:center" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=firma1	id=firma1		type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td><input name=nombre2	id=nombre2	type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula2	id=cedula2	type=text	style="width:100%; display:none; text-align:center" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
				<td><input name=firma2	id=firma2		type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td><input name=nombre3	id=nombre3	type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula3	id=cedula3	type=text	style="width:100%; display:none; text-align:center" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
				<td><input name=firma3	id=firma3		type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td><input name=nombre4	id=nombre4	type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td><input name=cedula4	id=cedula4	type=text	style="width:100%; display:none; text-align:center" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
				<td><input name=firma4	id=firma4		type=text	style="width:100%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		</div>
		<script>
		var
			 c = document.getElementById("cantidad");
			 n = document.getElementById("nombre");
			n1 = document.getElementById("nombre1");
			n2 = document.getElementById("nombre2");
			n3 = document.getElementById("nombre3");
			n4 = document.getElementById("nombre4");
			c1 = document.getElementById("cedula1");
			c2 = document.getElementById("cedula2");
			c3 = document.getElementById("cedula3");
			c4 = document.getElementById("cedula4");
			f1 = document.getElementById("firma1");
			f2 = document.getElementById("firma2");
			f3 = document.getElementById("firma3");
			f4 = document.getElementById("firma4");
		document.getElementById("cantidad").addEventListener("blur", function(e) {
			if (c.value <= 1) {c.value = 1;
				n.disabled = false;		n.style.display = "block";
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 f1.disabled = true; f1.style.display = "none"; f1.required = true;
			 f2.disabled = true; f2.style.display = "none";
			 f3.disabled = true; f3.style.display = "none";
			 f4.disabled = true; f4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = true; c2.style.display = "none";
			 c3.disabled = true; c3.style.display = "none";
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value == 2) {
				n.disabled = false;		n.style.display = "block";
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 f1.disabled = true; f1.style.display = "none"; f1.required = true;
			 f2.disabled = true; f2.style.display = "none"; f2.required = true;
			 f3.disabled = true; f3.style.display = "none";
			 f4.disabled = true; f4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = true; c3.style.display = "none";
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value == 3) {
				n.disabled = false;		n.style.display = "block";
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = true; n4.style.display = "none";
			 f1.disabled = true; f1.style.display = "none"; f1.required = true;
			 f2.disabled = true; f2.style.display = "none"; f2.required = true;
			 f3.disabled = true; f3.style.display = "none"; f3.required = true;
			 f4.disabled = true; f4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = false; c3.style.display = "block"; c3.required = true;
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value >= 4) {c.value = 4;
				n.disabled = false;		n.style.display = "block";
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 f1.disabled = true; f1.style.display = "none"; f1.required = true;
			 f2.disabled = true; f2.style.display = "none"; f2.required = true;
			 f3.disabled = true; f3.style.display = "none"; f3.required = true;
			 f4.disabled = true; f4.style.display = "none"; f4.required = true;
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = false; c3.style.display = "block"; c3.required = true;
			 c4.disabled = false; c4.style.display = "block"; c4.required = true;};});
		</script>

		<hr>
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td class=Bct><b>&nbsp;B. </b></td><td class=B><b>LISTA DE VERIFICACIÓN - PUNTOS DE ACCIÓN</b></td></tr>
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
				<td class=radio><input type=radio id=B1 name=B1 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b1 name=B1 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>1.</td><td class=B>Es Obligatorio hacer el trabajo en Alturas?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B2 name=B2 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b2 name=B2 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>2.</td><td class=B>Todos los trabajadores tienen vigente su Seguridad Social y exámen médico vigente?<br>
				<span>(SOLO SE AUTORIZA EL TRABAJO CON RESPUESTA SI)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B3 name=B3 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b3 name=B3 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos efectuar el trabajo con seguridad?<br>
				<span>(Viento máx. 17m/s[38mph], Trabajos Vecinos, Condiciones Atmosféricas, Luz)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B4 name=B4 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b4 name=B4 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>4.</td><td class=B>Están las líneas y sistemas eléctricos de media/alta tensión a más de 6mt[18ft] de distancia del andamio o a más de 3mt [10ft] de las personas<br>
				<span>(medido desde el punto más distante que puedan alcanzar)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B5 name=B5 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b5 name=B5 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>5.</td><td class=B>Se ha identificado y demarcado adecuadamente el Área Bajo Control?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B6 name=B6 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b6 name=B6 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>6.</td><td class=B>El personal está entrenado y certificado vigente para Trabajo en Alturas incluyendo procedimiento de emergencia y rescate en alturas?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B7 name=B7 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b7 name=B7 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>7.</td><td class=B>Superficie estable, firme y nivelada?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B8 name=B8 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b8 name=B8 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>8.</td><td class=B>Escalera, partes del andamio, elevador, etc. Inspeccionados y Aprobados antes de ingresar a la Instalación?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><b><u>EQUIPO DE PROTECCION DE CAIDAS</u></b></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B9 name=B9 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b9 name=B9 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>9.</td><td class=B>Están disponibles y en buen estado los Elementos de Protección Personal?<br>
				<span>(casco con barbuquejo, guantes, gafas, etc.)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B10 name=B10 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b10 name=B10 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>10.</td><td class=B>Cumple Normas ANSI Z-359.1?<br>
				<span>(certificación estampada/adherida al Equipo)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B11 name=B11 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b11 name=B11 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>11.</td><td class=B>Doble línea de vida con amortiguador de choque?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B12 name=B12 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b12 name=B12 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>12.</td><td class=B>Inspeccionado antes de cada uso (Cintas, Costuras, Herrajes, Ganchos)?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B13 name=B13 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b13 name=B13 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>13.</td><td class=B>El Anclaje resiste 2,300 kg [5,000 lb] por persona?<br>
				<span>(Anclaje certificado ó endosado por Dpto.de Ingeniería de acuerdo a cálculos teóricos)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B14 name=B14 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b14 name=B14 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>14.</td><td class=B>Anclaje por encima del hombro? y ¿fué calculada la altura de caída?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ANDAMIOS – ANTES DE SUBIR A TRABAJAR</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B15 name=B15 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b15 name=B15 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>15.</td><td class=B>El andamio está aterrizado eléctricamente cuando se trabaja con energía eléctrica en el andamio o cerca de líneas eléctricas?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B16 name=B16 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b16 name=B16 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>16.</td><td class=B>Las Bases son de 25 cm x 25 cm con rigidizadores para áreas no pavimentadas? ¿El andamio se muestra nivelado?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B17 name=B17 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b17 name=B17 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>17.</td><td class=B>En andamios rodantes, frenos en perfecto estado?<br>
				<span>(base 1.5 mt x 1.5 mt, altura máx 4 secciones y superficie plana (pendiente máx. 1%))</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B18 name=B18 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b18 name=B18 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>18.</td><td class=B>Escalera segura, sin obstáculos (si es vertical, sobresale 1 mt [3’])?	¿Posee baranda de cierre?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B19 name=B19 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b19 name=B19 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>19.</td><td class=B>Tiene baranda (altura 1.0 m, travesaño intermedio, zócalo) en la superficie de trabajo?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B20a name=B20a value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b20a name=B20a value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>20A.</td>
				<td class=B>
					Estructura metálica resistente, antideslizante, asegurada al andamio o tablones adecuados 
					<span>(tablones de madera sólo en trabajos en frío, espesor 5cm[2”], ancho 30cm[12”] sobresalen 15-30 cms a cada lado),</span> 
					en buen estado, amarrados uno a uno al andamio?.  El andamio cuenta con las diagonales completas y no hay deformación en sus piezas?
				</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B20b name=B20b value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b20b name=B20b value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>20B.</td><td class=B>Espacio entre tablones y/o aberturas de máximo 1.2cm [½]. Si el acceso a la plataforma es por escotilla, debe ser de tipo basculante.</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B21 name=B21 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b21 name=B21 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>21.</td><td class=B>Si la altura excede 3 veces la dimensión mínima de base, anclado/arriostrado?<br>
				<span>(anclar cada 3 secciones de altura)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B22 name=B22 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b22 name=B22 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>22.</td><td class=B>El andamio ha sido inspeccionado por la autoridad emisora y Coordinador de trabajo en Altura y queda aprobado para su uso?<br>
				<span>(cada dos años debe ser verificado por certificador independiente)</span></td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ANDAMIOS COLGANTES – ANTES DE SUBIR A TRABAJAR</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B23 name=B23 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b23 name=B23 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>23.</td><td class=B>Máximo 2 personas sobre el andamio?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B24 name=B24 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b24 name=B24 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>24.</td><td class=B>Sostenido por dos cables de acero, independientes?<br>
				<span>(si falla una, el andamio queda colgado por la otra)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B25 name=B25 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b25 name=B25 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>25.</td><td class=B>Los cables son de acero, de 6mm de diámetro o más?<br>
				<span>(soportan al menos 6 veces la carga, incluyendo el peso del andamio)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B26 name=B26 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b26 name=B26 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>26.</td><td class=B>La estructura y el andamio soportan 4 veces la carga?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B27 name=B27 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b27 name=B27 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>27.</td><td class=B>Líneas de vida independientes?</td>
			</tr>
			<tr class=C>
				<td class=radio></td>
				<td class=radio></td>
				<td colspan=2 class=B><u><b>ESCALERAS DE MANO</u></b></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B28 name=B28 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b28 name=B28 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>28.</td><td class=B>Sólo actividades livianas?<br>
				<span>(objetos/herramientas de menos de 5kg[10lb], no hacer fuerza, no escapes de productos)</span></td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B29 name=B29 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b29 name=B29 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>29.</td><td class=B>Base Antideslizante? ¿Parales y travesaños en buen estado?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B30 name=B30 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b30 name=B30 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>30.</td><td class=B>Inclinación ¼ (70°) ?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B31 name=B31 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b31 name=B31 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>31.</td><td class=B>Sobresale 1 mt [3’] sobre el punto del trabajo o estructura a la que se va a subir?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B32 name=B32 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b32 name=B32 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>32.</td><td class=B>Asegurada/Anclada en la parte superior, dos personas hasta que quede asegurada?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B33 name=B33 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b33 name=B33 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>33.</td><td class=B>No conductiva, fibra de vidrio,	si hay riesgos eléctricos?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B34 name=B34 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b34 name=B34 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>34.</td><td class=B>Escalera sencilla máx. 4mt[13’]? ¿Escalera Extensión máx. 7.5mt[22.5’]? ¿Escalera Tijera máx. 4mt[13’]?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B35 name=B35 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b35 name=B35 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>35.</td><td class=B>Escalera de Extensión, las secciones traslapan mínimo 1mt[3ft]?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B36 name=B36 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b36 name=B36 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>36.</td><td class=B>Escalera de Extensión con pasadores de seguridad entre secciones?</td>
			</tr>
			<tr class=C>
				<td class=radio><input type=radio id=B37 name=B37 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio id=b37 name=B37 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>37.</td><td class=B>La escalera ha sido inspeccionada por la autoridad emisora y queda aprobada para su uso?<br>
				<span>(anexar Check List de inspección de escaleras portátiles)</span></td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr class=C>
				<td colspan=4 class=B>Observaciones y/o Precauciones Adicionales<textarea name=observaciones maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
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
				<td><input name=ejecutorC		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaejecC	type=text  maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaejecC	type=date  class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horaejecC		type=time	 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=coordinadorC	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulacoordC	type=text		maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechacoordC		type=date		class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horacoordC		type=time		value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
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
				<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaemisorD	type=text	 maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaemisorD	type=date  class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horaemisorD		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
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
				<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=gestionarClickRadio(this) required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=gestionarClickRadio(this)></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
			</tr>
		</table>
		<table border=0>
			<tr height=40><td width=40vw></td><td width=20vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorE		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaejecE	type=text	 maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaejecE	type=date  class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horaejecE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=coordinadorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulacoordE	type=text  maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechacoordE		type=date  class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horacoordE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>COORDINADOR<br>TRABAJO EN ALTURAS</td><td>CÉDULA<br><br></td><td></td><td>HORA<br><br></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=cedulaemisorE	type=text	 maxlength=10 style="width:100%; text-align:center" inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
				<td><input name=fechaemisorE	type=date  class=mostrarfecha value='<?echo $hoy;?>' readonly></td>
				<td><input name=horaemisorE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
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
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
