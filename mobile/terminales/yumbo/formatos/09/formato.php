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
	<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 --> </div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 --> 	<div style="position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw">
		<table border=0 style="color:black; background-color:white">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<?=$estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:661px; display:inline-block; background-color:none"><b><?=$$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:white; border:0" type=texto
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
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr><td>DESCRIPCIÓN DEL TRABAJO<br><textarea name=descripcion maxlength=70 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr><td>UBICACIÓN Y DESCRIPCIÓN DE LA EXCAVACIÓN<br><textarea name=ubicacion1 maxlength=200 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
			<tr><td><textarea name=ubicacion2 style=display:none></textarea></td></tr>
			<tr><td><textarea name=ubicacion3 style=display:none></textarea></td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=84% class=Br>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</td>
				<td style="width:16%; text-align:left"><input style="width:40%; text-align:center" name=cantidad id=cantidad maxlength=1 type=texto inputmode=numeric pattern=[1-4]{1} required></td>
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
				<td class=A><br>PROFUNDIDAD<br>						 <input name=profundidad maxlength=4 style="width:60%; text-align:center" inputmode=numeric title="#.##"pattern=^([0-9]{1,1}(\.[0-9]{1,2})?)$ required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit class=consecutivo maxlength=6 style=width:60% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				<td class=A><br>FECHA<br>									 <input name=fechaA			 type=date value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
 	<div style="position:absolute; width:52.50%; left:0.50%; background-color:white">
		<table border=1>
			<tr height=80px><td></td></tr>
			<tr height=80px><td style=font-size:26px># CERTIFICADOS HABILITACIÓN ó<br>PERMISOS TRABAJO RELACIONADOS</td></tr>
			<tr height=80px><td>Revisión diaria antes de iniciar labores<br>Firma Supervisor/Inspector</td></tr>
		</table>
 	</div>
 	<div style="position:absolute; width:46.25%; left:53%; background-color:white; overflow:scroll">
		<table border=1 bordercolor=#ff7000>
			<tr height=80px><? for ($c = 2; $c <= 8; $c++): ?><td style=width:195px class=A2>DÍA<br><?=$c?></td><? endfor; ?></tr>
			<tr height=80px><? for ($c = 2; $c <= 8; $c++): ?><td><input name=B<?=$c?>	 style=width:75% maxlength=6 pattern=^(?:[0-9]{4,6})$ class=consecutivo inputmode=numeric <?= $c == 2 ? 'required' : '' ?>></td><? endfor; ?></tr>
			<tr height=80px><? for ($c = 2; $c <= 8; $c++): ?><td><input name=B<?=$c+7?> style=width:92% maxlength=6 pattern=.{1,} type=texto onkeyup=mayuscula(this) <?= $c == 2 ? 'required' : '' ?>></td><? endfor; ?></tr>
		</table>
 	</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
<!-- 10 --> 		<div style="position:relative; width:100vw; top:250px"> <!-- este div mueve hacia abajo desde la sección C -->
			<table border=1>
				<tr><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=7%></td><td class=sinbordes width=78%></td></tr>
				<tr><td class=letraseccion><b>B.&nbsp;</b></td><td colspan=4 class=tituloseccion><b>LISTA DE VERIFICACIÓN DE EXCAVACIONES</b></td></tr>
				<tr><td class=Bc><b>SI</b></td><td class=Bc><b>NO</b></td><td class=Bc><b>NA</b></td><td class=Br></td><td style=border:0px></td></tr>
				<?
				$ap = '50px';
				$preguntas1 = [
					 1 => "Se han consultado los planos del área?",
					 2 => "Se han certificado todas las tuberías/cables/ductos del área de la excavación?",
					 3 => "Se ha probado el área con un detector de cables/metales?",
					 4 => "Se contará con ingreso y salida seguros al área de la excavación?",
					 5 => "Se dispone de barreras/cercos/iluminación? y si la excavación debe quedar abierta, estará debidamente identificada y cercada?"
				];
				foreach ($preguntas1 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='gestionarClickRadio(this)' required></td>
						<td><input type='radio' id='C{$num}' name='c{$num}' value='NO' onclick='gestionarClickRadio(this)'></td>
						<td><input type='radio' id='C{$num}' name='k{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>

			<tr height=110px style=background-color:lightgreen>
				<td colspan=5 class=B style=text-align:center>Si la respuesta a alguna de las preguntas 1 a 5 es <b>NO</b>,<br>se rechaza esta autorización.</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C6 id=C6 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C6 id=c6 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C6 id=k6 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>6.&nbsp;</td><td class=Bpregunta>La excavación estará a menos de 3 metros de tuberías o cables?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C7 id=C7 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C7 id=c7 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C7 id=k7 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>7.&nbsp;</td><td class=Bpregunta>Se requiere desacople de equipos?<br># Permiso:&nbsp;<input name=C7a class=consecutivo maxlength=6 style=width:20% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C8 id=C8 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C8 id=c8 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C8 id=k8 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>8.&nbsp;</td><td class=Bpregunta>Se requiere aislamiento eléctrico?<br># Certificado:&nbsp;<input name=C8a	class=consecutivo maxlength=6 style=width:20% inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C9 id=C9 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C9 id=c9 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C9 id=k9 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>9.&nbsp;</td><td class=Bpregunta>Es posible que se acumulen combustibles o vapores entre la excavación?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C10 id=C10 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C10 id=c10 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C10 id=k10 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>10.&nbsp;</td><td class=Bpregunta>Se requiere apuntalamiento?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=C11 id=C11 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=C11 id=c11 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=C11 id=k11 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=Bnumero>11.&nbsp;</td><td class=Bpregunta>Afectará la excavación algún camino de acceso?<br>Indique:&nbsp;<input name=C11a maxlength=30 style=width:80% type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=150px style=background-color:lightgreen>
				<td colspan=5 class=B style=text-align:center>Si la respuesta a alguna de las preguntas 6 a 11 es <b>SI</b>,<br>se deberá detallar en la sección C las correspondientes precauciones de seguridad.</td>
			</tr>
 		<tr height=20><td></td></tr>
		</table>
		<table border=0>
			<tr><td>REQUISITOS ADICIONALES DE SEGURIDAD<br><textarea name=requisitos1 maxlength=330 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
			<tr><td><textarea name=requisitos2 style=display:none></textarea></td></tr>
			<tr><td><textarea name=requisitos3 style=display:none></textarea></td></tr>
			<tr><td><textarea name=requisitos4 style=display:none></textarea></td></tr>
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
			<tr><td width=50%></td><td width=50%></td><td width=0%></td><td width=0%></td></tr>
			<tr>
				<td><input name=ejecutorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreejecutorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecD			type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>	style=display:none class=mostrarfecha readonly></td>
				<td><input name=horaejecD				type=time	 value='<?=$hora;?>' min=<?=$horamin;?>	style=display:none></td>
			</tr>
			<tr><td>EJECUTOR</td><td>NOMBRE</td><td></td><td></td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorD  type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreinspD type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspD	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>	style=display:none class=mostrarfecha readonly></td>
				<td><input name=horainspD		type=time	 value='<?=$hora;?>' min=<?=$horamin;?>	style=display:none></td>
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
			<tr><td width=50%></td><td width=50%></td><td width=0%></td><td width=0%></td></tr>
			<tr>
				<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>	style=display:none class=mostrarfecha readonly></td>
				<td><input name=horaemisorE		type=time	 value='<?=$hora;?>' min=<?=$horamin;?>	style=display:none></td>
			</tr>
			<tr>
				<td>EMISOR</td><td>NOMBRE</td><td></td><td></td>
			</tr>
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
			<tr><td colspan=3>NOTAS&nbsp;<input name=notas_cancelacion maxlength=85 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=ejecutorF		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecF	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horaejecF		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorF	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horainspF		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTA AUTORIZACIÓN ES AHORA RETIRADA Y CANCELADA</td></tr>
			<tr>
				<td><input name=emisorF				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorF	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horaemisorF		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>EMISOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>
		<table>
			<tr height=10><td></td></tr>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td>
					<form method=post>
						<select name=usuario id=usuario type=texto required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?>@primax.com.co</option>
							<? endfor; ?>
						</select>
					</form>
				</td>
			</tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>
		
		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style=display:none type=text name=fecha value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=100>
				<td><input type=image src=../../../../../common/imagenes/grabar.png alt=Submit style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
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
