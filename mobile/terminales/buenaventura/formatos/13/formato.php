<!DOCTYPE html>
<html lang=es>
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
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** -->
<div class=noimprimir>
	<div class=fijar style="top:15px; left:15px">
		<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte;?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';}?>
		le escribo de PRIMAX <?=strtoupper($terminal);?>, estoy diligenciando el formato <?=$$formulario;?>.' target=_blank>
		<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
	</div>
	<? $color_formato = 'rgba(0,0,0,0)' ?>
	<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
		<div style="position:absolute; left:50%; margin-left:-50%; top:0%; width:100%; overflow:hidden; border:0px solid <?=$color_formato;?>">
			<table border=0 style="color:black; background-color:<?=$color_formato;?>">
				<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
				<tr height=100>
					<td colspan=2>
						<input style=display:none name=estado type=texto value=<?=$estado_formulario1;?> readonly>
						<span style="font-size:36px; width:420px; display:inline-block"><b><?=$$formulario; ?></b></span>
					</td>
					<td>
						<input name=consecutivo class=consecutivo style="color:red; background-color:<?=$color_formato;?>; border:0" type=texto
							value='<? if ($consec <= 9) {echo '&#8470; 00000';}
													else {if ($consec <= 99) {echo '&#8470; 0000';}
														else {if ($consec <= 999) {echo '&#8470; 000';}
															else {if ($consec <= 9999) {echo '&#8470; 00';}
																else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec;?>' readonly>
					</td>
				</tr>
				<tr>
					<td colspan=3 class=alertacabecera>
						CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.<br>
						ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ<br>
						<b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b>
						
					</td>
				</tr>
			</table>
			<hr>
<!-- *****************************************			 sección A			 ***************************************** -->
			<table border=0>
				<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
				<tr><td class=letraseccion><b>A.&nbsp;</b></td><td class=tituloseccion><b>SOLICITUD</b></td></tr>
			</table>
			<table border=0>
				<tr>
					<td><br>FECHA<br>									 <input name=fechaA				type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' required></td>
					<td>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>HORA<br>FINAL<br>							 <input name=horafinalA		type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit	type=texto class=consecutivo placeholder="######" maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				</tr>
		 		<tr height=30px><td></td></tr>
			</table>
			<table border=0>
				<tr>
					<td style=width:75%><br>UBICACIÓN<textarea name=ubicacion maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
					<td style=width:25%>ALTURA<br>APROX.<input name=altura type=text style=width:90% maxlength=5 inputmode=numeric title="##.##" pattern=^(([0-9]{1,2})?(.\d\d))?$ required></td>
				</tr>
				<tr height=30px><td></td></tr>
				<tr><td colspan=2 class=A>TIPO DE TRABAJO<br><textarea name=tipo_trabajo maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
				<tr height=30px><td></td></tr>
				<tr><td colspan=2 class=A>DESCRIPCIÓN DEL TRABAJO<br><textarea name=descripcion maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
				<tr height=30px><td></td></tr>
			</table>
			<table>
				<tr><td class=A>PERSONAS AUTORIZADAS PARA EL TRABAJO - Cantidad:&nbsp;<input name=cantidad	id=cantidad	type=text	style=width:8%	maxlength=1 inputmode=numeric	title="Entre 1 y 4 personas." pattern=^(?:[1-4]{1})$ required></td></tr>
				<tr height=30px><td></td></tr>
			</table>
			<div id=nombre style="display:none; overflow:hidden">
				<table border=1>
					<tr><td style="width:60%"></td><td style="width:20%"></td><td style="width:20%"></td></tr>
					<tr><td class=A2>NOMBRE</td><td class=A2>CÉDULA</td><td>FIRMA</td></tr>
					<tr>
						<td><input name=nombre1	id=nombre1	type=text	style="width:98%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
						<td><input name=cedula1	id=cedula1	type=text	style="width:97%; display:none" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
						<td><input name=firma1	id=firma1		type=text	style="width:90%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					</tr>
					<tr>
						<td><input name=nombre2	id=nombre2	type=text	style="width:98%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
						<td><input name=cedula2	id=cedula2	type=text	style="width:97%; display:none" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
						<td><input name=firma2	id=firma2		type=text	style="width:90%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
					</tr>
					<tr>
						<td><input name=nombre3	id=nombre3	type=text	style="width:98%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
						<td><input name=cedula3	id=cedula3	type=text	style="width:97%; display:none" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
						<td><input name=firma3	id=firma3		type=text	style="width:90%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
					</tr>
					<tr>
						<td><input name=nombre4	id=nombre4	type=text	style="width:98%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
						<td><input name=cedula4	id=cedula4	type=text	style="width:97%; display:none" maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$></td>
						<td><input name=firma4	id=firma4		type=text	style="width:90%; display:none" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
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
			<table border=1>
				<tr><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=9%></td><td class=sinbordes width=81%></td></tr>
				<tr><td class=letraseccion><b>B.&nbsp;</b></td><td colspan=3 class=tituloseccion><b>LISTA DE VERIFICACIÓN - PUNTOS DE ACCIÓN</b></td></tr>
				<tr><td class=Bc><b>SI</b></td><td class=Bc><b>NO</b></td><td class=Bc></td><td class=B style=border:0px><b><u>GENERAL - Antes de iniciar el trabajo</u></b></td></tr>
				<?
				$ap = '50px';
				$preguntas1 = [
					 1 => "Es Obligatorio hacer el trabajo en Alturas?",
					 2 => "Todos los trabajadores tienen vigente su Seguridad Social y exámen médico vigente?<br><span>(SOLO SE AUTORIZA EL TRABAJO CON RESPUESTA <b>SI</b>)</span>",
					 3 => "Permiten los factores externos efectuar el trabajo con seguridad?<br><span>(Viento máx. 17m/s[38mph], Trabajos Vecinos, Condiciones Atmosféricas, Luz)</span>",
					 4 => "Están las líneas y sistemas eléctricos de media/alta tensión a más de 6mt[18ft] de distancia del andamio o a más de 3mt [10ft] de las personas?<br><span>(medido desde el punto más distante que puedan alcanzar)</span>",
					 5 => "Se ha identificado y demarcado adecuadamente el Área Bajo Control?",
					 6 => "El personal está entrenado y certificado vigente para Trabajo en Alturas incluyendo procedimiento de emergencia y rescate en alturas?",
					 7 => "Superficie estable, firme y nivelada?",
					 8 => "Escalera, partes del andamio, elevador, etc. Inspeccionados y Aprobados antes de ingresar a la Instalación?"
				];
				foreach ($preguntas1 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td colspan=4 class=Bc><b><u>EQUIPO DE PROTECCION DE CAIDAS</u></b></td></tr>
				<?
				$ap = '50px';
				$preguntas2 = [
					  9 => "Están disponibles y en buen estado los Elementos de Protección Personal?<br><span>(casco con barbuquejo, guantes, gafas, etc.)</span>",
					 10 => "Cumple Normas ANSI Z-359.1?<br><span>(certificación estampada/adherida al Equipo)</span>",
					 11 => "Doble línea de vida con amortiguador de choque?",
					 12 => "Inspeccionado antes de cada uso? (Cintas, Costuras, Herrajes, Ganchos)",
					 13 => "El Anclaje resiste 2,300 kg [5,000 lb] por persona?<br><span>(Anclaje certificado ó endosado por Dpto.de Ingeniería de acuerdo a cálculos teóricos)</span>",
					 14 => "Anclaje por encima del hombro? y ¿fué calculada la altura de caída?"
				];
				foreach ($preguntas2 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td colspan=4 class=Bc><u><b>ANDAMIOS – Antes de subir a trabajar</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td></tr>
				<?
				$ap = '50px';
				$preguntas3 = [
					 15 => "El andamio está aterrizado eléctricamente cuando se trabaja con energía eléctrica en el andamio o cerca de líneas eléctricas?",
					 16 => "Las bases son de 25 cm x 25 cm con rigidizadores para áreas no pavimentadas? ¿El andamio se muestra nivelado?",
					 17 => "En andamios rodantes, frenos en perfecto estado?<br><span>(base 1.5 mt x 1.5 mt, altura máx 4 secciones y superficie plana (pendiente máx. 1%))</span>",
					 18 => "Escalera segura, sin obstáculos (si es vertical, sobresale 1 mt [3’])?	¿Posee baranda de cierre?",
					 19 => "Tiene baranda (altura 1.0 m, travesaño intermedio, zócalo) en la superficie de trabajo?"
				];
				foreach ($preguntas3 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr class=C>
					<td class=radio><input type=radio id=B20a name=B20a value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=radio><input type=radio id=b20a name=B20a value=NO onclick=gestionarClickRadio(this)></td>
					<td class=Bnumero>20A.&nbsp;</td>
					<td class=Bpregunta>
						Estructura metálica resistente, antideslizante, asegurada al andamio o tablones adecuados<br>
						<span>(tablones de madera sólo en trabajos en frío, espesor 5cm[2”], ancho 30cm[12”] sobresalen 15-30 cms a cada lado),</span><br>
						en buen estado, amarrados uno a uno al andamio?.  El andamio cuenta con las diagonales completas y no hay deformación en sus piezas?
					</td>
				</tr>
				<tr class=C>
					<td class=radio><input type=radio id=B20b name=B20b value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=radio><input type=radio id=b20b name=B20b value=NO onclick=gestionarClickRadio(this)></td>
					<td class=Bnumero>20B.&nbsp;</td><td class=Bpregunta>Espacio entre tablones y/o aberturas de máximo 1.2cm [½"]. Si el acceso a la plataforma es por escotilla, debe ser de tipo basculante.</td>
				</tr>
				<?
				$ap = '50px';
				$preguntas4 = [
					 21 => "Si la altura excede 3 veces la dimensión mínima de base, anclado/arriostrado?<br><span>(anclar cada 3 secciones de altura)</span>",
					 22 => "El andamio ha sido inspeccionado por la autoridad emisora y Coordinador de trabajo en Altura y queda aprobado para su uso?<br><span>(cada dos años debe ser verificado por certificador independiente)</span>"
				];
				foreach ($preguntas4 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td colspan=4 class=Bc><u><b>ANDAMIOS COLGANTES – Antes de subir a trabajar</u></b><br><span>(Armar el Andamio requiere protección de caídas)</span></td></tr>
				<?
				$ap = '50px';
				$preguntas5 = [
					 23 => "Máximo 2 personas sobre el andamio?",
					 24 => "Sostenido por dos cables de acero, independientes?<br><span>(si falla una, el andamio queda colgado por la otra)</span>",
					 25 => "Los cables son de acero de 6mm de diámetro o más?<br><span>(soportan al menos 6 veces la carga, incluyendo el peso del andamio)</span>",
					 26 => "La estructura y el andamio soportan 4 veces la carga?",
					 27 => "Líneas de vida independientes?"
				];
				foreach ($preguntas5 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td colspan=4 class=Bc><u><b>ESCALERAS DE MANO</u></b></td></tr>
				<?
				$ap = '50px';
				$preguntas6 = [
					 28 => "Sólo actividades livianas?<br><span>(objetos/herramientas de menos de 5kg[10lb], no hacer fuerza, no escapes de productos)</span>",
					 29 => "Base Antideslizante? ¿Parales y travesaños en buen estado?",
					 30 => "Inclinación ¼ (70°) ?",
					 31 => "Sobresale 1 mt[3’] sobre el punto del trabajo o estructura a la que se va a subir?",
					 32 => "Asegurada/Anclada en la parte superior, dos personas hasta que quede asegurada?",
					 33 => "No conductiva, fibra de vidrio,	si hay riesgos eléctricos?",
					 34 => "Escalera sencilla máx. 4mt[13’]? ¿Escalera Extensión máx. 7.5mt[22.5’]? ¿Escalera Tijera máx. 4mt[13’]?",
					 35 => "Escalera de Extensión, las secciones traslapan mínimo 1mt[3ft]?",
					 36 => "Escalera de Extensión con pasadores de seguridad entre secciones?",
					 37 => "La escalera ha sido inspeccionada por la autoridad emisora y queda aprobada para su uso?<br><span>(anexar Check List de inspección de escaleras portátiles)</span>"
				];
				foreach ($preguntas6 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr height=30px><td colspan=4></td></tr>
				<tr class=C><td colspan=4 class=B>Observaciones y/o Precauciones Adicionales<textarea name=observaciones maxlength=68 style=width:98% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td><tr>
			<table>
			<hr>

<!-- *****************************************			 sección C			 ***************************************** -->
			<table border=0>
				<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
				<tr><td class=letraseccion><b>C.&nbsp;</b></td><td class=tituloseccion><b>ACEPTACIÓN</b></td></tr>
				<tr><td class=letraseccion>&#9679;</td><td class=tituloseccion>Confirmo que los requerimientos de cada tipo de acción indicados en la sección B se han completado, que hay seguridad para efectuar el Trabajo en Altura descrito en este Permiso y que se tomarán las precauciones necesarias para efectuar el trabajo con seguridad.</td></tr>
				<tr height=30><td></td><td></td></tr>
			</table>
			<table border=0>
				<tr><td width=40%></td><td width=20%></td><td width=21%></td><td width=19%></td></tr>
				<tr>
					<td><input name=ejecutorC			type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulaejecC		type=text		maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechaejecC		type=date		class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horaejecC			type=time		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
				<tr height=30><td></td></tr>
				<tr>
					<td><input name=coordinadorC	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulacoordC	type=text		maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechacoordC		type=date		class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horacoordC		type=time		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>COORDINADOR<br>TRABAJO EN ALTURAS</td><td>CÉDULA<br><br></td><td></td><td>HORA<br><br></td></tr>
			</table>
			<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
			<table border=0>
				<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
				<tr><td class=letraseccion><b>D.&nbsp;</b></td><td class=tituloseccion><b>AUTORIZACIÓN</b></td></tr>
				<tr><td class=letraseccion>&#9679;</td><td class=tituloseccion>El lugar, los equipos y herramientas se han verificado de acuerdo con los requerimientos de la sección B, y estoy satisfecho con sus condiciones de seguridad.	Por lo tanto se autoriza la iniciación de los trabajos.</td></tr>
				<tr height=30><td></td><td></td></tr>
			</table>
			<table border=0>
				<tr><td width=40%></td><td width=20%></td><td width=21%></td><td width=19%></td></tr>
				<tr>
					<td><input name=emisorD				type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulaemisorD	type=text		maxlength=10 inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechaemisorD	type=date		class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horaemisorD		type=time		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			</table>
			<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
			<table border=0>
				<tr><td width= 5.00%></td><td width=61.50%></td><td width=18.00%></td><td width=15.50%></td></tr>
				<tr><td class=letraseccion><b>E.&nbsp;</b></td><td colspan=3 class=tituloseccion><b>CANCELACIÓN</b></td></tr>
				<tr><td class=letraseccion>&#9679;</td><td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td></tr>
				<tr><td class=letraseccion>&#9679;</td><td class=B colspan=3>Certifico que el trabajo amparado por este permiso:</td></tr>
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
				<tr height=40><td width=40%></td><td width=20%></td><td width=21%></td><td width=19%></td></tr>
				<tr>
					<td><input name=ejecutorE			type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulaejecE		type=text	 maxlength=10 style=width:100% inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechaejecE		type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horaejecE			type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
				<tr height=30><td></td></tr>
				<tr>
					<td><input name=coordinadorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulacoordE	type=text  maxlength=10 style=width:100% inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechacoordE		type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horacoordE		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>COORDINADOR<br>TRABAJO EN ALTURAS</td><td>CÉDULA<br><br></td><td></td><td>HORA<br><br></td></tr>
				<tr height=30><td></td></tr>
				<tr>
					<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input name=cedulaemisorE	type=text	 maxlength=10 style=width:100% inputmode=numeric pattern=^(?:[0-9]{6,10})$ required></td>
					<td><input name=fechaemisorE	type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
					<td><input name=horaemisorE		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				</tr>
				<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			</table>
			<hr>
				<table>
					<tr height=10><td></td></tr>
					<tr style="background-color:rgba(0,240,0,0); height:15%">
						<td>
							<select name=usuario id=usuario style=width:67% required>
								<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
								<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i]?>"><?=$usuario[$i]?></option>
								<? endfor; ?>
							</select>
						</td>
					</tr>
					<tr height=10><td></td></tr>
				</table>
			<hr>
		
		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
			<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
			<input style=display:none type=text name=fecha value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
			<!--<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br>-->
			<table border=0>
				<tr height=100px>
					<td><input type=image src=../../../../../common/imagenes/grabar.png alt=Submit style="width:100px; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
					<td><a href=javascript:closed()><img src=../../../../../common/imagenes/regresar.png style="pointer-events:auto; width:100px; height:auto"></a></td>
				</tr>
				<tr><td colspan=2><hr></td></tr>
				<tr>
					<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
					<td>
						<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
						<img src=../../../../../common/imagenes/piedepagina_horizontal.svg style="pointer-events:auto; width:100%; height:auto">
						</a>
					</td>
				</tr>
			</table>
			<hr>
	 	</div>

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
