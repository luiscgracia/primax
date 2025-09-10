<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
select.I	{font-size:36px; font-family:Arlrdbd; width:74; height:30; text-align:center; overflow:hidden; background-color:rgba(255,0,0,1); color:rgba(255,255,255,1); border:0px; border-radius:30px}

input[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(255,0,0,0); outline:1px solid rgba(255,112,0,1)}
input[type="checkbox"]								{width:10mm; height:10mm; background-color:rgba(0,0,255,1); outline:0mm solid rgba(0,0,255,0)}
input[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
input[type="checkbox"]:checked:before	{background:rgba(255,112,0,0)}

input.rojo[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(255,0,0,0.1); outline:1px solid rgba(255,0,0,1)}	
input.rojo[type="checkbox"]									{width:10mm; height:10mm}
input.rojo[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
input.rojo[type="checkbox"]:checked:before	{background:rgba(0,255,255,0)}

input.verde[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(0,128,0,0); outline:1px solid rgba(0,128,0,1)}	
input.verde[type="checkbox"]								{width:10mm; height:10mm}
input.verde[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
input.verde[type="checkbox"]:checked:before	{background:rgba(255,0,255,0)}

input.azul[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius: 0%; background:rgba(0,0,255,0); outline:1px solid rgba(0,0,255,1)}	
input.azul[type="checkbox"]									{width:10mm; height:10mm}
input.azul[type="checkbox"]:hover:before		{background:rgba(0,255,0,0)}
input.azul[type="checkbox"]:checked:before	{background:rgba(255,0,255,0)}

input::-webkit-calendar-picker-indicator {opacity:1; background-color:rgba(0,0,0,0); color:rgba(0,255,0,1)}
select.estado				{width:98%; height:40px; font-family:Arial; text-align:center; font-size:20px; color:rgba(0,0,191,1); border:0; background:rgba(255,255,255,1)}
select.dispositivo	{width:98%; height:10mm; font-family:Arial; text-align:left;	 font-size:32px; color:rgba(0,0,191,1); background-color:rgba(0,255,0,0.1); border:2px solid rgba(255,112,0,1); border-radius:0}
select							{-moz-appearance:none; -webkit-appearance:none; -ms-appearance:none; -o-appearance:none; appearance:none; text-indent:0.01px; text-overflow:''}
</style>
</head>
<script type="text/javascript">
function mayuscula(e) {e.value = e.value.toUpperCase();}
function closed() {window.open('','_parent',''); window.close();}
function cerrarVentana() {window.close();}
function u() {document.getElementById("usuario").value = document.getElementById("usuario1").value;}
</script>
<body style="font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
include ("../../../../../common/datos.php");
include ("../../../../../common/checkbox_num_text.php");
include ("../../conectar_db.php");
include ("../../../../../common/conectar_db_usuarios.php");
include ("../../../../../normal/usuarios.php");
include ("../../../../../normal/terminales/".$terminal."/formatos/".basename(dirname(__FILE__))."/consecutivos".basename(dirname(__FILE__)).".php");
$nombre = '';
$fechacero = '';
$hora = '';
$chk = '';
//$nombre = "";
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
	<div class=fijar style="top:30px; left:15px">
		<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
		<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
	</div>
	<? $color_formato = 'rgba(0,0,0,0.0)' ?>
	<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
		<div style="position:absolute; left:50%; margin-left:-50%; top:0%; width:100%; overflow:hidden; height:12200px; border:12px solid <?=$color_formato;?>">
			<table border=0 style="color:black; background-color:<?=$color_formato;?>">
				<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
				<tr height=100>
					<td colspan=2>
						<input style=display:none name=estado type=texto value=<?=$estado_formulario1; ?> readonly>
						<span style="font-size:36px; width:80%; display:inline-block"><b><?=$$formulario; ?></b></span>
					</td>
					<td rowspan=2>
						<input name=consecutivo class=consecutivo style="color:red; background-color:<?=$color_formato;?>; border:0" type=texto
							value='<? if ($consec <= 9) {echo '&#8470; 00000';}
													else {if ($consec <= 99) {echo '&#8470; 0000';}
														else {if ($consec <= 999) {echo '&#8470; 000';}
															else {if ($consec <= 9999) {echo '&#8470; 00';}
																else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec;?>' readonly>
					</td>
				</tr>
				<tr><td colspan=2><span style=font-size:24px><b>FORMATO WEB - Rev. Mayo 2014</b></span></td>
				</tr>
			</table>
			<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table>
			<tr><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td></tr>
			<tr><td colspan=7 class=B>&nbsp;&nbsp;<b>A. SOLICITUD</b></td></tr>
			<tr>
				<td></td>
				<td><br>FECHA<br><input name=fechaA type=date value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> autofocus required></td>
				<td></td>
				<td><br>HORA<br><input name=horaA type=time value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				<td></td>
				<td>CERTIFICADO<br>HABILITACIÓN<input name=certhabilit value='' class=consecutivo style=width:75% maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=46.5%></td><td width=46.5%></td><td width=7%></td></tr>
			<tr><td colspan=3>AISLAMIENTO SOLICITADO POR</td></tr>
			<tr>
				<td><input name=empresaA	maxlength=30	value='<?=$nombre?>' type=texto pattern=.{1,} onkeyup=mayuscula(this) required>EMPRESA</td>
				<td><input name=nombreA		maxlength=30	value='<?=$nombre?>' type=texto pattern=.{1,} onkeyup=mayuscula(this) required>NOMBRE</td>
				<td>
					<input name=firmaA type=checkbox id=firma1 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required>
					<label for=firma1 class=label-checkbox></label>
				</td>
			</tr>
		</table>
		<hr>
<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr height= 45px><td class=B>&nbsp;&nbsp;<b>B. DESCRIPCIÓN DEL TRABAJO</b></td></tr>
			<tr height=130px><td>DESCRIPCIÓN DEL TRABAJO				<textarea name=descripcion	style=width:99% maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td></tr>
			<tr height=130px><td>EQUIPOS A SER AISLADOS/ABIERTOS<textarea name=equipos			style=width:99% maxlength=90 type=text onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td></tr>
		</table>
		<hr>
<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=47.4%></td><td width=7%></td><td width=21.6%></td><td width=12%></td><td width=7%></td></tr>
			<tr><td colspan=6 class=B>&nbsp;&nbsp;<b>C. ACEPTACIÓN</b></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=2><input name=ejecutorC		type=texto		maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) required>EJECUTOR</td>
				<td colspan=1><input name=firmaejecC 	type=checkbox	id=firma2 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma2 class=label-checkbox></label></td>
				<td colspan=1><input name=fechaejecC	type=date			class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td colspan=2><input name=horaejecC		type=time			class=mostrarhora		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td colspan=6><span style=font-size:24px>&nbsp;&nbsp;PERSONA AUTORIZADA PARA REALIZAR EL AISLAMIENTO/APERTURA DEL EQUIPO</span></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=2><input name=inspectorC	type=texto		maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) required>INSPECTOR</td>
				<td colspan=1 rowspan=2><input name=firmainspC	type=checkbox id=firma3 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma3 class=label-checkbox></label></td>
				<td colspan=1><input name=fechainspC	type=date			class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td colspan=2><input name=horainspC		type=time			class=mostrarhora		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr height=15><td></td></tr>
			<tr><td class=Bct>&#9679;</td><td colspan=5 class=B>Acepto la responsabilidad de realizar el AISLAMIENTO / APERTURA del equipo mencionado en la sección B.</td></tr>
			<tr><td class=Bct>&#9679;</td><td colspan=5 class=B>Confirmo ademas, que estoy calificado para realizar el AISLAMIENTO / APERTURA del equipo propuesto.</td></tr>
		</table>
		<hr>
		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=19.50%></td><td width=19.50%></td><td width=15.40%></td><td width=19%></td><td width=21.60%></td></tr>
			<tr><td colspan=6 class=B>&nbsp;&nbsp;<b>D. AUTORIZACIÓN PARA AISLAMIENTO/APERTURA DEL EQUIPO</b></td></tr>
			<tr>
				<td></td>
				<td colspan=2 rowspan=2 class=B>Se da permiso para aislar y abrir el equipo descrito en la sección B,</td>
				<td class=Br>entre las&nbsp;</td>
				<td><input name=hora1D	type=time	value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				<td><input name=fecha1D	type=date	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
			</tr>
			<tr>
				<td></td>
				<td class=Br>y las&nbsp;</td>
				<td><input name=hora2D	type=time	value='<?=$hora;?>' min=<?=$horamin;?> required></td>
				<td><input name=fecha2D	type=date	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=52.40%></td><td width=7%></td><td width=21.60%></td><td width=19%></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorD				type=texto		maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) required>EMISOR</td>
				<td><input name=firmaemisorD	type=checkbox id=firma4 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma4 class=label-checkbox></label></td>
				<td><input name=fechaemisorD	type=date			class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horaemisorD		type=time			class=mostrarhora		value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=6.0%></td><td width=94.0%></td></tr>
			<tr><td colspan=2 class=B>&nbsp;&nbsp;<b>E. &nbsp;EQUIPO DE PROTECCIÓN PERSONAL REQUERIDO</b></td></tr>
			<tr class=C>
				<td><input name=EPP_B type=checkbox checked disabled></td>
				<td class=B>
					<b>EPP Básico:</b> Casco, gafas de seguridad, guantes de carnaza, ropa de algodón manga larga y protección auditiva (si aplica).
					<input name=otrosE maxlength=35 value='<?=$nombre?>' type=texto pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
			</tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_CE type=checkbox></td><td class=B><b>EPP ESPECIAL PARA CIRCUITOS ELÉCTRICOS MAYORES A 400V:</b> Botas y guantes dieléctricos para 1000V y traje de protección Arc Flash completo.</td></tr>
			<tr height=10><td></td></tr>
			<tr class=C><td><input name=EPP_AE type=checkbox></td><td class=B><b>EPP ESPECIAL PARA APERTURA DE EQUIPOS:</b> Guantes de nitrilo, careta de protección facial y protección respiratoria para vapores orgánicos.</td></tr>
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
				<td><input name=FAE1 id=FAE1 value=SI type=radio onclick=gestionarClickRadio(this) <?=$chk?> required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAE1 id=fae1 value=NO type=radio onclick=gestionarClickRadio(this)				 ></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO ELÉCTRICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAE maxlength=45 value='<?=$nombre?>' style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value='' required></tr>
			<tr><td><input name=voltajeF id=menor400  value=-400	type=radio onclick=gestionarClickRadio(this) <?=$chk?> required></td><td colspan=5 class=B>Menor 400V</td></tr>
			<tr><td><input name=voltajeF id=menor1000 value=-1000	type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 400V - Menor 1000V</td></tr>
			<tr><td><input name=voltajeF id=mayor1000 value=1000	type=radio onclick=gestionarClickRadio(this)></td><td colspan=5 class=B>Mayor 1000V (Únicamente empresa de energía)</td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(255,250,194,1) border=1>	<!-- amarillo suave -->
			<tr><td width=7%></td><td width=7%></td><td width=86%></td></tr>
			<tr><td>SI</td><td>NA</td><td>DESCRIPCIÓN</td></tr>
			<?
			$ap = '50px';
			$preguntas1= [
				 1 => "Utilizar los EPPs básicos. Usar el traje de protección contra Arc Flash completo cuando se trabaje con circuitos entre 400V y 1000V.",
				 2 => "Desenergizar el equipo<br>(interruptores, selectores, etc).",
				 3 => "Bloquear con candado los interruptores de los equipos a aislar. Si no es posible colocar candados, debe desconectar los cables.",
				 4 => "Realizar prueba de intento de encendido (oprimir botón de encendido).",
				 5 => "Verificar energía 0 con voltímtero (0 voltios). Verificar que el voltaje nominal sea 0V entre todas las fases, y entre fases y tierra.",
				 6 => "Probar el correcto funcionamiento del voltímetro, verificádolo ANTES y DESPUÉS de su uso en una fuente conocida."
			];
			foreach ($preguntas1 as $num => $pregunta) {
				echo "<tr height=$ap>
					<td><input type='radio' id='AE{$num}' name='AE{$num}' value='SI' onclick='gestionarClickRadio(this)' $chk required></td>
					<td><input type='radio' id='ae{$num}' name='AE{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
					<td class=Bpregunta style=border-left:0px>{$pregunta}</td>
				</tr>";
			}
			?>
		</table>
		<table style="color:white; background-color:rgba(157,152,202,1)">	<!-- púrpura -->
			<tr><td width=5.0%></td><td width=5.0%></td><td width=2.5%></td><td width=5.0%></td><td width=7.5%></td><td width=75.0%></td></tr>
			<tr height=10><td></td></tr>
			<tr>
				<td><input name=FAM1 id=FAM1 value=SI type=radio onclick=gestionarClickRadio(this) <?=$chk?> required></td><td colspan=2 class=B>SI</td>
				<td><input name=FAM1 id=fam1 value=NO type=radio onclick=gestionarClickRadio(this)></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;AISLAMIENTO MECÁNICO</td>
			</tr>
			<tr height=100><td colspan=6 class=B>EQUIPOS A SER AISLADOS<input name=equiposAM maxlength=45 value='<?=$nombre?>' style=background-color:white type=texto pattern=.{1,} onkeyup=mayuscula(this) value='' required></tr>
				<td><input name=apequipos id=apequipos value=SI type=radio onclick=gestionarClickRadio(this) <?=$chk?> required></td><td colspan=2 class=B>SI</td>
				<td><input name=apequipos id=APequipos value=NO type=radio onclick=gestionarClickRadio(this)></td><td class=B>NO</td>
				<td class=B>&nbsp;&nbsp;REQUIERE APERTURA DE EQUIPOS?</td>
			<tr height=30><td></td></tr>
		</table>
		<table style=background-color:rgba(219,217,236,1) border=1>	<!-- púrpura suave -->
			<tr><td width=7%></td><td width=7%></td><td width=86%></td></tr>
			<tr><td>SI</td><td>NA</td><td>DESCRIPCIÓN</td></tr>
			<?
			$ap = '50px';
			$preguntas2 = [
				 1 => "Utilizar los EPPs básicos. En caso de apertura de equipos, utilizar la careta de protección facial y protección respiratoria (si aplica).",
				 2 => "Cerciorarse que los puntos de aislamientos sean efectivos, y lo más cercanos posible al trabajo.",
				 3 => "Cerciorarse que los puntos de verificación de energía 0 y/o drenaje son convenientes (punto más bajo).",
				 4 => "En tuberías aisladas que tienen producto, preveer la expansión del líquido por temperatura (verificar si hay otra forma de alivio térmico o si debe sacar producto de la tubería para que haya espacio para la expansión térmica).",
				 5 => "Usar solo dispositivos de aislamiento permitidos (no se permiten válvulas de control de flujo, válvulas cheques, válvulas de alivio térmico, válvulas que operen automáticamente o remotamente, etc).",
				 6 => "Usar dispositivos de Bloqueo y Etiquetado apropiados, que estén en buen estado (candados rojos de llave única, etiquetas en buen estado, cadenas o guayas metálicas, etc)"
			];
			foreach ($preguntas2 as $num => $pregunta) {
				echo "<tr height=$ap>
					<td><input type='radio' id='AM{$num}' name='AM{$num}' value='SI' onclick='gestionarClickRadio(this)' $chk required></td>
					<td><input type='radio' id='am{$num}' name='AM{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
					<td class=Bpregunta style=border-left:0px>{$pregunta}</td>
				</tr>";
			}
			?>
		</table>
		<table style=background-color:rgba(210,193,186,1) border=1>	<!-- café suave -->
			<tr><td width=7%></td><td width=7%></td><td width=86%></td></tr>
			<tr><td>SI</td><td>NA</td><td>DESCRIPCIÓN</td></tr>
			<?
			$ap = '50px';
			$preguntas3 = [
				 1 => "Informar a todas las personas que pueden ser afectadas por el aislamiento del equipo.",
				 2 => "Cerciorarse que los puntos de aislamiento y los puntos de verificación de energía 0 sean efectivos (verificar que no haya más formas de energizar el equipo).",
				 3 => "Colocar las etiquetas de los puntos de aislamiento (rojas) y los puntos de verificación de energía 0 (verdes) con su respectiva información actualizada.",
				 4 => "En los bloqueos y etiquetados de grupo, usar dispositivos multicandado, y cada líder de los grupos de trabajo involucrados coloca su propio candado y mantiene control de su llave.",
				 5 => "Una vez termine el trabajo, notificar a las personas afectadas que el equipo será reenergizado.",
				 6 => "Una vez termine el trabajo, revisar que sea seguro re-energizar el equipo. Si es un trabajo que requirió Bloqueo y Etiquetado de grupo, hacer esta revisión conjuntamente con los líderes de los otros grupos de trabajo.",
				 7 => "Una vez termine el trabajo, retirar los bloqueos y las etiquetas.",
				 8 => "Notificar el emisor del permiso de trabajo y solicitar autorización para la reenergizacióndel equipo.",
				 9 => "Actualizar información del Bloqueo y Etiquetado en la bitácora del registro histórico y en el cuadro de aislamiento de energía,"
			];
			foreach ($preguntas3 as $num => $pregunta) {
				echo "<tr height=$ap>
					<td><input type='radio' id='F{$num}' name='F{$num}' value='SI' onclick='gestionarClickRadio(this)' $chk required></td>
					<td><input type='radio' id='f{$num}' name='F{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
					<td class=Bpregunta style=border-left:0px>{$pregunta}</td>
				</tr>";
			}
			?>
		</table>
		<table style=background-color:rgba(196,216,226,1) border=1>	<!-- azul suave -->
			<tr><td width=7%></td><td width=7%></td><td width=86%></td></tr>
			<tr><td>SI</td><td>NA</td><td>DESCRIPCIÓN</td></tr>
			<?
			$ap = '50px';
			$preguntas4 = [
				10 => "Verificar que el plan de aislamiento sea efectivo (competencia de la persona autorizada, conveniencia de los puntos de aislamientos y puntos de verificación, EPP requerido, interfases con las personas afectadas, etc).",
				11 => "Verificar que las etiquetas de aislamiento (rojas) y las de puntos de verificación de energía (verdes) estén colocadas y con la información correcta.",
				12 => "Verificar la efectiva desenergización y bloqueo del<br>equipo.",
				13 => "Una vez termine el trabajo, verificar que las personas afectadas sean informadas de la reenergización del equipo.",
				14 => "Una vez termine el trabajo, inspeccionar y probar el equipo antes de renergizarlo."
			];
			foreach ($preguntas4 as $num => $pregunta) {
				echo "<tr height=$ap>
					<td><input type='radio' id='F{$num}' name='F{$num}' value='SI' onclick='gestionarClickRadio(this)' $chk required></td>
					<td><input type='radio' id='f{$num}' name='F{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
					<td class=Bpregunta style=border-left:0px>{$pregunta}</td>
				</tr>";
			}
			?>
		</table>
		<hr>
		<!-- *****************************************			 sección G			 ***************************************** -->
		<table border=0>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>G.</b></td><td class=B><b>RECONEXIÓN TEMPORAL PARA PRUEBAS</b><br>(SOLO PARA PRUEBAS)</td></tr>
		</table>
		<div style="position:relative; width:28.75%; left:0.50%; top:20px; background-color:white">
			<table border=1>
				<tr><td></td></tr>
				<tr height=160px><td class=A3>RECONEXIÓN SOLICITADA POR</td></tr>
				<tr height=100px><td><textarea name=GA1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td></tr>
				<tr height=100px><td><textarea name=GA2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td></tr>
				<tr height=100px><td><textarea name=GA3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td></tr>
			</table>
		</div>
<!-- 5 -->		<div style="position:relative; width:69.75%; left:29.50%; top:-446px; background-color:white; overflow:scroll">
			<table border=1 bordercolor=#ff7000>
				<tr>
					<td style=width:200px></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:275px></td><td style=width:205px></td></td>
					<td style=width:200px></td>
				</tr>
				<tr height=80px>
					<td class=A2 rowspan=2 style="font-size:22px">SUSPENDIÓ LOS TRABAJOS RELACIONADOS?</td>
					<td class=A2 colspan=2>RECONEXIÓN</td>
					<td class=A2 colspan=2>RE-AISLAMIENTO</td>
					<td class=A2 rowspan=2 style="font-size:22px">INFORMÓ A LAS PERSONAS QUE PUEDEN VERSE AFECTADAS?</td>
				</tr>
				<tr height=80px>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
					<td class=A2>AUTORIZADO POR</td><td class=A2>FECHA / HORA</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB1 id=GB1 value=SI type=radio onclick=gestionarClickRadio(this) <?=$chk?> required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB1 id=gb1 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td>
					<td>
						<input name=GD1	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required>
						<input name=GE1	type=time	 value='<?=$hora;?>' min=<?=$horamin;?> required>
					</td>

					<td><textarea name=GF1 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td>
					<td>
						<input name=GG1	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required>
						<input name=GH1	type=time	 value='<?=$hora;?>' min=<?=$horamin;?> required>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI1 id=GI1 value=SI type=radio onclick=gestionarClickRadio(this) <?=$chk?> required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI1 id=gi1 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB2 id=GB2 value=SI type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB2 id=gb2 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td>
					<td>
						<input name=GD2	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>>
						<input name=GE2	type=time	 value='<?=$hora;?>' min=<?=$horamin;?>>
					</td>

					<td><textarea name=GF2 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td>
					<td>
						<input name=GG2	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>>
						<input name=GH2	type=time	 value='<?=$hora;?>' min=<?=$horamin;?>>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI2 id=GI2 value=SI type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI2 id=gi2 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
				<tr height=100px>
					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GB3 id=GB3 value=SI type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GB3 id=gb3 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
					<td><textarea name=GC3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td>
					<td>
						<input name=GD3	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>>
						<input name=GE3	type=time	 value='<?=$hora;?>' min=<?=$horamin;?>>
					</td>

					<td><textarea name=GF3 maxlength=20 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td>
					<td>
						<input name=GG3	type=date  value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>>
						<input name=GH3	type=time	 value='<?=$hora;?>' min=<?=$horamin;?>>
					</td>

					<td style=font-size:34px>
						SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>
						<input name=GI3 id=GI3 value=SI type=radio onclick=gestionarClickRadio(this)>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name=GI3 id=gi3 value=NO type=radio onclick=gestionarClickRadio(this)>
					</td>
				</tr>
			</table>
<!-- /5 -->		</div>


<!-- *****************************************			 RETIRO			 ***************************************** -->
<!-- *****************************************			 sección H			 ***************************************** -->
<!-- 6 -->		<div style="position:relative; top:-434px; background-color:white">
			<hr>
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
					<td><input name=H1 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value='<?=$nombre?>' required></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr>
					<td></td>
					<td class=B>PRODUCTO CONTENIDO (Revisar y anexar MSDS)</td>
					<td><input name=H2 type=texto maxlength=30 style=background-color:white pattern=.{1,} onkeyup=mayuscula(this) value='<?=$nombre?>' required></td>
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
					<td><input name=H3 type=text style="width:40%; background-color:white" maxlength=5 value='' placeholder=##### pattern=^(([0-9]){1,5}?)$ inputmode=numeric required> GLS</td>
					<td><input name=H4 type=text style="width:40%; background-color:white" maxlength=5 value='' placeholder=##### pattern=^(([0-9]){1,5}?)$ inputmode=numeric required> GLS</td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1)>	<!-- azul2 suave -->
				<tr><td width=1%></td><td width=99%></td></tr>
				<tr height=137px>
					<td></td>
					<td class=B>MEDIDAS PARA REMOVER EL PRODUCTO RECOGIDO DEL ÁREA DE TRABAJO, PARA MINIMIZAR LA EXPOSICIÓN.<textarea name=H5 style="width:99%; background-color:white" maxlength=60 type=text onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td>
				</tr>
				<tr height=30><td></td></tr>
				<tr height=137px>
					<td></td>
					<td class=B>PRECAUCIONES ADICIONALES<textarea name=H6 style="width:99%; background-color:white" maxlength=105 type=text onkeyup=mayuscula(this) pattern=.{1,}><?=$nombre?></textarea></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table style=background-color:rgba(219,217,236,1) border=1>	<!-- azul2 suave -->
				<tr><td width=7%></td><td width=7%></td><td width=86%></td></tr>
				<tr><td>SI</td><td>NA</td><td>DESCRIPCIÓN</td></tr>
				<?
				$ap = '50px';
				$preguntas5 = [
					 7 => "Señalizar y controlar el área de trabajo. Permiten los factores externos efectuar el trabajo con seguridad? (Dirección viento, trabajos, etc).",
					 8 => "Suspender todos los trabajos en caliente (fuentes de ignición) cercanos al área de trabajo?.",
					 9 => "Tener listo y disponible los equipos de emergencia (extintores, SCI, botiquín de primeros auxilios, kit de derrames, duchas y lavaojos, etc).",
					10 => "Cerciorarse que todos los puntos de aislamiento (mecánicos y eléctricos) son efectivos, estén bloqueados y señalizados con etiquetas rojas.",
					11 => "Cerciorarse que todos los puntos de verificación de energía 0 son efectivos, estén abiertos y señalizados con etiquetas verdes.",
					12 => "Cerciorarse que todos los puntos de apertura de equipo sean convenientes y señalizados con etiquetas moradas.",
					13 => "Utilizar los EPPs requeridos. Utilizar la protección respiratoria requerida y la careta de protección facial durante la primera apertura del equipo.",
					14 => "Proceder con la apertura del equipo, una vez se verifique la energía 0 (en el punto más bajo del sistema)."
				];
				foreach ($preguntas5 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='H{$num}' name='H{$num}' value='SI' onclick='gestionarClickRadio(this)' $chk required></td>
						<td><input type='radio' id='h{$num}' name='H{$num}' value='NA' onclick='gestionarClickRadio(this)'></td>
						<td class=Bpregunta style=border-left:0px>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr height=15><td></td></tr>
			</table>
		<!-- *****************************************			 sección I			 ***************************************** -->
			<table>
				<tr height=15><td width=5.0%></td><td width=95.0%></td></tr>
				<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>I.</b></td><td class=B><b>CUADRO DE AISLAMIENTO Y APERTURA DE EQUIPOS</b></td></tr>
				<tr>
					<td></td>
					<td class=B>
						Este documento es requerido para hacer seguimiento a la ubicación de los Puntos de Aislamiento de Energía/Apertura de Equipo incluyendo los Dispositivos de Aislamiento de Energía (DAE), Puntos de Verificación de Energía (PVE) y Puntos de Apertura de Equipos de Proceso (AEP).&nbsp;&nbsp;CUADRO # 
						<input name=cuadro value='123456' maxlength=6 style=width:120px placeholder=###### pattern=^(?:[0-9]{4,6})$ inputmode=numeric required>
					</td>
				</tr>
				<tr height=15><td></td></tr>
			</table>
			<table>
				<tr height=100><td>DESCRIPCIÓN DE LA TAREA<textarea name=descripcionI style=width:99% maxlength=55 type=text onkeyup=mayuscula(this) pattern=.{1,} required><?=$nombre?></textarea></td></tr>
				<tr height=100><td>PERSONA AUTORIZADA<input name=autorizadoI maxlength=30 value='<?=$nombre?>' type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
			</table>
		<div style="position:relative; width:8.75%; left:0.50%; top:20px; background-color:white">
			<table border=1>
				<tr><td></td></tr>
				<tr height=160px><td class=A2 style="background-color:white; font-size:27px">PASO #</td></tr>
				<? for ($i = 1; $i <= 24; $i++) { ?>
				<tr height=70px><td><input name=IA<?=$i?> style="font-size:40px; background-color:white; border:0" maxlength=2 pattern=^(?:[0-9]{1,2})$ inputmode=numeric value='<?=$i?>' required></td></tr>
				<? } ?>
				<tr height=70px><td>NOTA</td></tr>
			</table>
		</div>
		<div style="position:relative; width:89.75%; left:9.50%; top:-1895px; background-color:white; overflow:scroll">
			<table border=1 bordercolor=#ff7000>
				<tr>
					<td style=width:80px></td><td style=width:120px></td><td style=width:80px></td><td style=width:110px></td><td style=width:80px></td>
					<td style=width:230px></td>
					<td style=width:280px></td>
					<td style=width:140px></td>
					<td style=width:280px></td><td style=width:205px></td>
					<td style=width:280px></td><td style=width:205px></td>
				</tr>
				<tr height=80px>
					<td class=A2 colspan=5 rowspan=1 style=background-color:white>TIPO</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>DISPOSITIVO<br>(**)</td>
					<td class=A2 colspan=1 rowspan=2 style=background-color:white>UBICACIÓN</td>
					<td class=A2 colspan=1 rowspan=2 style="background-color:white; font-size:24px">#<br>ETIQUETA / CANDADO</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>INSTALACIÓN</td>
					<td class=A2 colspan=2 rowspan=1 style=background-color:lightgray>RETIRO</td>
				</tr>
				<tr height=80px>
					<td class=A2 style="background-color:#ff0000;	color:white; border:2px solid white; font-size:22px">DAE</td>
					<td class=A2 style="background-color:#ff0000;	color:white; border:2px solid white; font-size:22px">ESTADO<br>(*)</td>
					<td class=A2 style="background-color:#008000;	color:white; border:2px solid white; font-size:22px">PVE</td>
					<td class=A2 style="background-color:#008000;	color:white; border:2px solid white; font-size:22px">PUNTO DE PASO</td>
					<td class=A2 style="background-color:#0000ff;	color:white; border:2px solid white; font-size:22px">AEP</td>
					<td class=A2 style="background-color:white">INSTALADO POR</td><td class=A2 style="background-color:white">FECHA</td>
					<td class=A2 style="background-color:white">RETIRADO POR</td><td class=A2 style="background-color:white">FECHA</td>
				</tr>
				<? for ($i = 1; $i <= 24; $i++) { ?>
				<tr height=70px>
					<td style="background-color:#ff0000; border:2px solid white"><input name=IB<?=$i?> <?=$chk?> class=rojo type=checkbox <?= $i <= 1 ? 'required' : '' ?>></td>
					<td style="background-color:#ff0000; border:2px solid white">
						<select name=IC<?=$i?> class=estado <?= $i <= 1 ? 'required' : '' ?>>
							<option value="" disabled selected></option>
							<option value=A>ABIERTO</option>
							<option value=C>CERRADO</option>
							<option value=E>AISLADO</option>
							<option value=D>DESCONECTADO</option>
							<option value=O>OTRO</option>
						</select>
					</td>
					<td style="background-color:#008000; border:2px solid white"><input name=ID<?=$i?> <?=$chk?> class=verde type=checkbox <?= $i <= 1 ? 'required' : '' ?>></td>
					<td style="background-color:#008000; border:2px solid white"><input name=IE<?=$i?> <?=$chk?> class=verde type=checkbox <?= $i <= 1 ? 'required' : '' ?>></td>
					<td style="background-color:#0000ff; border:2px solid white"><input name=IF<?=$i?> <?=$chk?> class=azul  type=checkbox <?= $i <= 1 ? 'required' : '' ?>></td>
					<td>
						<select name=IG<?=$i?> class=dispositivo <?= $i <= 1 ? 'required' : '' ?>>
							<option value="" disabled selected></option>
							<option value="ELÉCTRICO">	ELÉCTRICO		</option>
							<option value="VÁLVULA">		VÁLVULA			</option>
							<option value="BRIDA CIEGA">BRIDA CIEGA	</option>
							<option value="OTRO">				OTRO				</option>
						</select>
					</td>
					<td><input name=IH<?=$i?> type=texto maxlength=15	pattern=.{1,}							value='' onkeyup=mayuscula(this) <?= $i <= 1 ? 'required' : '' ?>></td>
					<td><input name=II<?=$i?> type=text  maxlength=6	pattern=^(?:[0-9]{4,6})$	value='' placeholder=###### inputmode=numeric style=width:86% <?= $i <= 1 ? 'required' : '' ?>></td>
					<td><input name=IJ<?=$i?> type=texto maxlength=15	pattern=.{1,}							value='' onkeyup=mayuscula(this) <?= $i <= 1 ? 'required' : '' ?>></td>
					<td><input name=IK<?=$i?>	type=date  																				value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> <?= $i <= 1 ? 'required' : '' ?>></td>
					<td><input name=IL<?=$i?> type=texto maxlength=15	pattern=.{1,}							value='' onkeyup=mayuscula(this) <?= $i <= 1 ? 'required' : '' ?>></td>
					<td><input name=IM<?=$i?>	type=date	 																				value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> <?= $i <= 1 ? 'required' : '' ?>></td>
				</tr>
				<? } ?>
				<tr>
					<td colspan=12 style="height:70px; text-align:left; font-size:28px">
						*Estado de DAE: A=Abierto, C=Cerrado, E=Aislado eléctricamente, D=Desconectado (Brida ciega / Ciego de paleta), O=Otro (especificar)<br>
						**Dispositivo: Eléctrico, Válvula, Brida ciega / Ciego de paleta, Otro (especificar)
					</td>
				</tr>
			</table>
		</div>
<!-- *****************************************			 sección J			 ***************************************** -->
<!-- 9 -->		<div style="position:absolute; top:4090px">
		<table>
			<tr><td width=5.0%></td><td width=95.0%></td></tr>
			<tr height=30px><td colspan=2><hr></td></tr>
			<tr><td class=B style=vertical-align:top>&nbsp;&nbsp;<b>J.</b></td><td class=B><b>REPRESENTACIÓN VISUAL DEL<br>PLAN DE AISLAMIENTO DE ENERGÍA Y APERTURA DE EQUIPO</b></td></tr>
			<tr height=10><td></td></tr>
			<tr><td colspan=2><img style="width:96% ; height:auto; opacity:0.1" src="../../../../../common/imagenes/logos_seguridad_industrial.svg"></td></tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>
<!-- *****************************************			 sección K			 ***************************************** -->
		<table border=0>
			<tr><td width= 5%></td><td width=61.50%></td><td width=18%></td><td width=15.50%></td></tr>
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
				<td style=width:4%><input type=radio name=certificadoK id=certificadoA value=A onclick=gestionarClickRadio(this) <?=$chk?> required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoB value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=certificadoK id=certificadoC value=C onclick=gestionarClickRadio(this)></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no ha<br> &nbsp;terminado y el área ha<br> &nbsp;quedado en condiciones<br> &nbsp;de seguridad.</td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=52.40%></td><td width=7%></td><td width=21.60%></td><td width=19%></td></tr>
			<tr>
				<td><input name=ejecutorK			type=texto maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) value='' required>EJECUTOR</td>
				<td><input name=firmaejecK		type=checkbox id=firma5 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma5 class=label-checkbox></label></td>
				<td><input name=fechaejecK		type=date  class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> readonly required></td>
				<td><input name=horaejecK			type=time  class=mostrarhora	value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td colspan=4 style=text-align:left><span style=font-size:20px>&nbsp;&nbsp;PERSONA AUTORIZADA QUE REALIZÓ EL AISLAMIENTO/APERTURA DEL EQUIPO.</span></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorK		type=texto maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) value='' required>INSPECTOR</td>
				<td><input name=firmainspK		type=checkbox id=firma6 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma6 class=label-checkbox></label></td>
				<td><input name=fechainspK		type=date  class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> readonly required></td>
				<td><input name=horainspK			type=time  class=mostrarhora	value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr height=60><td colspan=4><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorK				type=texto maxlength=30 value='<?=$nombre?>' pattern=.{1,} onkeyup=mayuscula(this) value='' required>EMISOR</td>
				<td><input name=firmaemisorK	type=checkbox id=firma7 class=checkbox-oculto style="width:1px; height:1px; opacity:0" required><label for=firma7 class=label-checkbox></label></td>
				<td><input name=fechaemisorK	type=date  class=mostrarfecha	value='<?=$fechacero;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> readonly required></td>
				<td><input name=horaemisorK		type=time  										value='<?=$hora;?>' min=<?=$horamin;?> required>HORA</td>
			</tr>
		</table>

<!-- *****************************************			 sección xxx			 ***************************************** -->
		<hr>
		<table>
			<tr height=10><td></td></tr>
			<tr style=background-color:rgba(0,240,0,0)>
				<td>
					<select name="usuario1" id="usuario1" style=width:67% type=text onfocusout="u()" required>
						<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
						<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++) { ?>
						<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?></option>
						<? } ?>
					</select>
				</td>
			</tr>
			<tr><td><input name=usuario id=usuario type=text style="height:1px; width:1%; background-color:rgba(0,0,0,0); border:0px" required></td></tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style=display:none type=text name=fecha value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
		<!--<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br>-->
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
			<tr><td colspan=2><hr></td></tr>
		</table>
<!-- /9 --> 	</div>
<!-- /6 --> 	</div>
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
<!-- /1 --> 	</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
