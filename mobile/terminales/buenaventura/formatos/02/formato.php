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
	<? $color_formato = 'rgba(204,0,0,1)' ?>
	<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
		<div style="position:absolute; left:50%; margin-left:-50%; top:0%; width:100%; overflow:hidden; height:6260px; border:1vw solid <?=$color_formato;?>">
			<table border=0 style="color:white; background-color:<?=$color_formato;?>">
				<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
				<tr height=100>
					<td colspan=2>
						<input style=display:none name=estado type=texto value=<?=$estado_formulario1;?> readonly>
						<span style="font-size:36px; width:660px; display:inline-block"><b><?=$$formulario;?></b></span>
					</td>
					<td>
						<input name=consecutivo class=consecutivo style="color:white; background-color:<?=$color_formato;?>; border:0px" type=texto
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
						COLOCAR LA COPIA DE ESTE PERMISO EN LA ENTRADA DEL ESPACIO CONFINADO<br>
						<b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b>
					</td>
				</tr>
			</table>

<!-- *****************************************			 sección A			 ***************************************** -->
			<table border=0>
				<tr><td width=5%></td><td width=70%></td><td width=20%></td><td width=5%></td></tr>
				<tr><td class=letraseccion>A.&nbsp;</td><td colspan=3 class=tituloseccion>SOLICITUD</td></tr>
				<tr><td colspan=4>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
				<tr height=30><td colspan=4></td></tr>
				<tr>
					<td></td>
					<td class=B style=text-align:right><span id=doc_ad_NO>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</span></td>
					<td style=text-align:left><input name=cantidad id=cantidad style=width:40% maxlength=1 placeholder="Máx. 4" inputmode=numeric pattern=^(?:[1-4]{1})$></td>
					<td></td>
				</tr>
			</table>
			<table border=0>
				<tr><td width=1%></td><td width=48.5%></td><td width=1%></td><td width=48.5%></td><td width=1%></td></tr>
				<? for ($i = 1; $i <= 4; $i += 2): ?>
				<tr>
					<td></td>
					<td><input name="nombre<?= $i?>"		id="nombre<?= $i?>"		maxlength=30 style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder="Nombre <?= $i == 1 ? '1er' : ($i == 3 ? '3er' : $i.'o')?>. autorizado" <?= $i <= $cantidad ? 'required' : '' ?>></td>
					<td></td>
					<? if ($i < 4): ?>
					<td><input name="nombre<?= $i+1?>"	id="nombre<?= $i+1?>"	maxlength=30 style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder="Nombre <?= $i+1?>o. autorizado" <?= ($i+1) <= $cantidad ? 'required' : '' ?>></td>
					<? else: ?>
					<td></td>
					<? endif; ?>
					<td></td>
				</tr>
				<? endfor; ?>
				<tr height=30><td colspan=6></td></tr>
			</table>
			<table border=0>
				<tr><td width=25%></td><td width=25%></td><td width=25%></td><td width=25%></td></tr>
				<tr>
					<td><br>FECHA<br>									 <input name=fechaA				type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' required></td>
					<td>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>HORA<br>FINAL<br>							 <input name=horafinalA		type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit	type=texto class=consecutivo placeholder="######" maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				</tr>
 				<tr class=sinbordes height=10><td class=sinbordes></td></tr>
			</table>
			<hr>

<!-- *****************************************			 sección B			 ***************************************** -->
			<table border=1>
				<tr><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=7%></td><td class=sinbordes width=78%></td></tr>
				<tr><td class=letraseccion>B.&nbsp;</td><td colspan=4 class=tituloseccion>LISTA DE VERIFICACIÓN DE REQUISITOS DE SEGURIDAD</td></tr>
				<tr><td class=Bc><b>SI</b></td><td class=Bc><b>NO</b></td><td class=Bc><b>NA</b></td><td class=Br></td><td class=B style="border:0px; text-align:center"><b>REQUISITO DE SEGURIDAD</b></td></tr>
				<?
				$ap = '50px';
				$preguntas1 = [
					 1 => "Está el equipo totalmente aislado?",
					 2 => "Se ha retirado todo el producto, lodo e incrustaciones?",
					 3 => "Permiten los factores externos hacer el trabajo con seguridad?<br><span>(Viento, Tormentas, Lluvia, Sol, etc.)?</span>",
					 4 => "Se ha verificado la atmósfera del espacio confinado?",
					 5 => "Se ha desgasificado el espacio confinado?",
					 6 => "Se tiene iluminación adecuada?",
					 7 => "Se requiere ventilación adicional?",
					 8 => "Se tiene ingreso y salida libres?",
					 9 => "Se requiere de un inspector de Seguridad?",
					10 => "Se tiene en cuenta la posibilidad de cambios en la atmósfera del espacio confinado?<br><span>(Ver requerimientos para soldadura en el respaldo de la hoja)</span>",
					11 => "Se tienen precauciones para el estrés térmico?",
					13 => "Están los desagües de áreas vecinas limpios y libres de sustancias combustibles?",
					14 => "Están los desagües cercanos cubiertos y sellados?",
					15 => "Hay algún requisito legal especial?"
				];
				foreach ($preguntas1 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
						<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td class=Bnumero colspan=3></td><td class=Bpregunta colspan=2><input name=B15b maxlength=36 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<?
				$preguntas2 = [
					16 => "Se ha demarcado al área bajo control?",
					17 => "Está disponible y listo el equipo de primeros auxilios?",
					18 => "Está disponible y listo el equipo contra incendios?"
				];
				foreach ($preguntas2 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
						<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td class=Bnumero colspan=3></td><td class=Bpregunta colspan=2><input name=B18a maxlength=36 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<?
				$preguntas3 = [
					19 => "Se han suspendido tareas vecinas que pueden afectar el trabajo?",
					20 => "Se tienen precauciones para exposición al plomo?",
					21 => "El plan de rescate documentado está disponible y actualizado?"
				];
				foreach ($preguntas3 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
						<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
 				<tr height=20><td colspan=5 style=border:0px></td></tr>
			</table>
			<table border=0>
				<tr>
					<td width= 2% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=27% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=27% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=27% style=border:0px></td>
					<td width= 2% style=border:0px></td>
				</tr>
				<tr><td colspan=8 class=B style=border:0px>&nbsp;&nbsp;12. ELEMENTOS DE PROTECCIÓN</td></tr>
				<tr>
					<td></td>
					<td><input name=B12a type=checkbox></td><td	class=B> &nbsp;CASCO</td>
					<td><input name=B12b type=checkbox></td><td	class=B> &nbsp;RESPIRADOR</td>
					<td><input name=B12c type=checkbox></td><td	class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
					<td></td>
				</tr>
				<tr><td height=30></td></tr>
				<tr>
					<td></td>
					<td><input name=B12d type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
					<td><input name=B12e type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
					<td><input name=B12f type=checkbox></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
					<td></td>
				</tr>
				<tr><td height=30></td></tr>
				<tr>
					<td></td>
					<td><input name=B12i type=checkbox></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
					<td><input name=B12j type=checkbox></td><td class=B> &nbsp;SALVAVIDAS</td>
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
					<td style=text-align:right class=B>ZAPATOS Tipo&nbsp;</td><td><input name=B12g maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
					<td style=text-align:right class=B>GUANTES Tipo&nbsp;</td><td><input name=B12h maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
				</tr>
				<tr height=10><td></td></tr>
				<tr>
					<td></td>
					<td style=text-align:right class=B>ROPA Tipo&nbsp;</td><td><input name=B12k maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
					<td style=text-align:right class=B>OTRO Tipo&nbsp;</td><td><input name=B12l maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<table border=0>
				<tr><td width=32.50%></td><td width=32.50%></td><td width=25%></td><td width=10%></td></tr>
				<tr><td colspan=4 class=B>&nbsp;&nbsp;22. PRUEBA DE GASES</td></tr>
				<tr>
					<td>		 <br>EQUIPO<br>			<input name=B22a type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td>		 <br>MARCA<br>			<input name=B22c type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td>FECHA<br>CALIBRACIÓN<br><input name=B22e type=date value='<?=$fechacero;?>' max='<?=$fechaactual;?>' required></td>
					<td> BUMP<br>TEST<br>				<input name=B22g type=checkbox></td>
				</tr>
				<tr height=10><td></td></tr>
				<tr>
					<td>			<br>EQUIPO<br>		<input name=B22b type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td>			<br>MARCA<br>			<input name=B22d type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td>FECHA<br>CALIBRACIÓN<br><input name=B22f type=date value='<?=$fechacero;?>' max='<?=$fechaactual;?>'></td>
					<td> BUMP<br>TEST<br>				<input name=B22h type=checkbox></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
			<div style="position:relative; width:36.50%; left:0.50%; background-color:white">
				<table border=1>
					<tr height=75px><td class=A3 style=width:55%>PRUEBA</td>																	<td style=width:45% class=A3>Perm</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;% LEL</td>												<td class=A1>0%</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Oxígeno</td>											<td class=A1>19.5%-23.5%</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Total<br>&nbsp;Hidrocarburos</td><td class=A1>100 ppm</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Etanol</td>											<td class=A1>1000 ppm</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Benceno</td>											<td class=A1>0.5 ppm</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Plomo<br>&nbsp;Orgánico</td>			<td class=A1>0.075 mg/m&#179;</td></tr>
					<tr height=75px><td class=A1 style=text-align:left>&nbsp;Monóxido de<br>&nbsp;Carbono</td><td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:relative; width:62.15%; left:37.10%; top:-601px; background-color:white; overflow:scroll">
				<?
				$filas = 7;
				$columnas = 8;
				$p = [["",5,'^([0-9]{1,2}(\.[0-9]{1,2})?)$','##.##'],
							["",4,'^([0-9]{1,2}(\.[0-9]{1,1})?)$','##.#'],
							["",3,'^(([0-9]){1,3}?)$','###'],
							["",4,'^(([0-9]){1,4}?)$','####'],
							["",3,'^([0]{1}(\.[0-9]{1,1})?)$','0.#'],
							["",5,'^([0]{1}(\.[0-9]{1,3})?)$','0.###'],
							["",2,'^(([0-9]){1,2}?)$','##']];
				$l = range('A','P');
				echo '<style>
					.tabla22		{border-collapse:collapse; width:100%}
					.tabla22 td	{border:2px solid #ff7000ff; text-align:center; vertical-align:middle}
					.hora				{width:190px; background:#ff7000bf; color:#000000ff; font-weight:bold}
					.result			{width:150px; background:#ff7000bf; color:#000000ff; font-weight:bold}
					.i22				{width:95%; height:35px; border:2px solid #ff7000ff; border-radius:5px; text-align:center}
					.i22:focus	{border-color:#ff0000ff; outline:none}
					.req22			{border:2px solid rgba(0,0,255,1); background:rgba(0,255,0,0.1)}
				</style>';
				echo '<table class=tabla22>
					<tr height=75px>';
						for ($i = 1; $i <= $columnas; $i++)
						echo "<td class='hora'>Hora<br>$i</td><td class='result'>Resultado<br>$i</td>";
					echo '</tr>';
					for($i = 0; $i < $filas; $i++) {
					echo '<tr height=75px>';
						for($j = 0; $j < $columnas; $j++) {
							$q22 = $j ? '':'required';
							$class22 = $j ? 'i22':'i22 req22';
							$hora22 = '';
							echo "<td><input name=B22{$l[$j*2]}".($i+1)." 	type=time class='$class22' value='$hora22' min='$horamin' $q22></td>";
							echo "<td><input name=B22{$l[$j*2+1]}".($i+1)." type=text class='$class22' value='{$p[$i][0]}' maxlength={$p[$i][1]} pattern='{$p[$i][2]}' placeholder='{$p[$i][3]}' inputmode=numeric $q22></td>";
						}
					echo '</tr>';
					}
				echo '</table>';
				?>
			</div>
			<div style="position:relative; width:100%; left:0px; top:-600px; background-color:rgba(0,0,255,0)">
				<table>
					<tr>
						<td style=text-align:left>
							<b>&nbsp;CONSULTE LA GUÍA DE MEDICIÓN DE GASES AL REVERSO.<br>
								 &nbsp;LA MEDICIÓN DEBE SER CONTÍNUA.<br>
								 &nbsp;SI EL %LEL SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b>
						</td>
					</tr>
				</table>
			</div>
			<div style="position:relative; width:100%; left:0px; top:-570px">
				<table border=0><tr><td class=B style=width:5%>&nbsp;23.</td><td class=B style="width:95%; font-size:29px">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr></table>
			</div>
			<div style="position:relative; width:59.25%; left:0.50%; top:-570px; background-color:white">
				<table border=1>
					<tr height=80px><td class=A3>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr height=60px><td class=A1><input name=B23<?=$i?>	maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) <?= $i == 1 ? 'required' : '' ?>></td></tr>
					<? endfor; ?>
				</table>
			</div>
			<div style="position:relative; width:39.40%; left:59.85%; top:-951px; background-color:white; overflow:scroll">
				<?php
				$filas = 5;
				$columnas = 7;
				$l = range('A','P');
				echo '<style>
					.tabla23		{border-collapse:collapse; width:100%; border:2px solid #ff7000ff}
					.tabla23 td	{border:2px solid #ff7000ff; text-align:center; vertical-align:middle}
					.horaE			{width:190px; background:#ff7000bf; color:#000000ff; font-weight:bold}
					.horaS			{width:190px; background:#ff7000bf; color:#000000ff; font-weight:bold}
					.i23				{width:95%; height:35px; border:2px solid #ff7000ff; border-radius:5px; text-align:center}
					.i23:focus	{border-color:#ff7000ff; outline:none}
					.req23			{border:2px solid rgba(0,0,255,1); background:#ff7000ff}
				</style>';
				echo '<table class=tabla23>
					<tr style=height:80px>';
						for ($i = 1; $i <= $columnas; $i++)
						echo "<td style='border:2px solid #000000ff' class=horaE>Hora Entrada<br>$i</td>
						<td style='border:2px solid #000000ff' class=horaS>Hora Salida<br>$i</td>";
					echo '</tr>';
					for ($i = 0; $i < $filas; $i++) {
					echo '<tr style=height:60px>';
						for ($j = 0; $j < $columnas; $j++) {
							$q23 = $i || $j ? '':'required';
							$class23 = $i || $j ? 'i23':'i23 req23';
							$hora23 = '';
							echo "<td><input name=B23{$l[$j*2]}".($i+1)." 	value='$hora23' min='$horamin' type=time class='$class23' $q23></td>";
							echo "<td><input name=B23{$l[$j*2+1]}".($i+1)." value='$hora23' min='$horamin' type=time class='$class23' $q23></td>";
						}
					echo '</tr>';
					}
				echo'</table>';
				?>
			</div>

<!-- *****************************************			 sección C			 ***************************************** -->
			<div style="position:relative; left:0px; width:100%; top:-950px"> <!-- este div mueve hacia abajo desde la sección C -->
				<hr>
				<table border=0>
					<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
					<tr><td class=letraseccion>C.&nbsp;</td><td class=tituloseccion>ACEPTACIÓN</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Confirmo que los requisitos indicados en la sección B se cumplen y que hay seguridad para ingresar al espacio confinado y para realizar el trabajo indicado en la sección A.</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.</td></tr>
					<tr height=30><td></td></tr>
				</table>
				<table border=0>
					<tr><td width=57.50%></td><td width=23%></td><td width=19.50%></td></tr>
					<tr>
						<td><input name=ejecutorC		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EJECUTOR</td>
						<td><input name=fechaejecC	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaejecC		type=time	 value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr>
						<td><input name=inspectorC	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>INSPECTOR</td>
						<td><input name=fechainspC	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horainspC		type=time	 value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
				</table>
				<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
				<table border=0>
					<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
					<tr><td class=letraseccion>D.&nbsp;</td><td class=tituloseccion>AUTORIZACIÓN</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Certifico que los aislamientos y desacoples se han efectuado apropiadamente y que el área es segura para el ingreso.<br>Por lo tanto, <b>AUTORIZO</b> el ingreso al espacio confinado y la realización del trabajo indicado en la sección A.</td></tr>
					<tr height=20><td></td><td></td></tr>
				</table>
				<table border=0>
					<tr><td width=50%></td><td width=50%></td><td width=0%></td><td width=0%></td></tr>
					<tr>
						<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EMISOR</td>
						<td><input name=nombreemisorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>NOMBRE</td>
						<td><input name=fechaemisorD	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaemisorD		type=time	 class=mostrarhora	value='<?=$hora;?>' min='<?=$horamin;?>'	readonly required></td>
					</tr>
				</table>
				<hr>

<!-- *****************************************			 sección E			 ***************************************** -->
				<table border=0>
					<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
					<tr><td class=letraseccion>E.&nbsp;</td><td class=tituloseccion>CANCELACIÓN</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Certifico que el trabajo que motivó el ingreso al espacio confinado:</td></tr>
				</table>
				<table border=0>
					<tr>
						<td style=width:5%></td>
						<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=handleRadioClick(this) required></td>
						<td style=width:23% class=B> &nbsp;Se ha<br> &nbsp;completado</td>
						<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=handleRadioClick(this)></td>
						<td style=width:19% class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
						<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=handleRadioClick(this)></td>
						<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
					</tr>
					<tr><td></td><td class=B colspan=6>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.</td></tr>
					<tr height=30><td></td></tr>
				</table>
				<table border=0>
					<tr><td width=57.50%></td><td width=23%></td><td width=19.50%></td></tr>
					<tr>
						<td><input name=ejecutorE		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EJECUTOR</td>
						<td><input name=fechaejecE	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaejecE		type=time	 value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr>
						<td><input name=inspectorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>INSPECTOR</td>
						<td><input name=fechainspE	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horainspE		type=time	 value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
					<tr>
						<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EMISOR</td>
						<td><input name=fechaemisorE	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaemisorE		type=time	 value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
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
					<tr height=100>
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
			</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
		</div>			<!-- cierre del div que inicia el FORM -->

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->

<script>
// Optimized JavaScript functions
const FormHandler = {
		// Radio button management with deselection capability
		currentOptions: {},
		
		handleRadioClick(option) {
				const groupName = option.name;
				const currentOption = this.currentOptions[groupName];
				
				if (currentOption === option) {
						option.checked = false;
						this.currentOptions[groupName] = null;
				} else {
						this.currentOptions[groupName] = option;
				}
				
				// Handle specific radio button logic
				this.handleSpecificRadioLogic(option);
		},
		
		handleSpecificRadioLogic(option) {
				const handlers = {
						'cambio': this.handleCambioRadio,
						'empleado': this.handleEmpleadoRadio,
						'docum_adic': this.handleDocumAdicRadio
				};
				
				const handler = handlers[option.name];
				if (handler) {
						handler.call(this, option);
				}
		},
		
		handleCambioRadio(option) {
				const pedidocambio = document.getElementById('pedidocambio');
				const pedido = document.getElementById('pedido');
				
				if (option.value === 'CME') {
						this.hideElement(pedidocambio);
						this.hideElement(pedido);
				} else if (option.value === 'CDE') {
						this.showElement(pedidocambio, true);
						this.showElement(pedido);
				}
		},
		
		handleEmpleadoRadio(option) {
				const companiacp = document.getElementById('companiacp');
				
				if (option.value === 'E') {
						this.hideElement(companiacp);
				} else if (option.value === 'CP') {
						this.showElement(companiacp, true);
				}
		},
		
		handleDocumAdicRadio(option) {
				const elements = {
						cantidad: document.getElementById('cantidad'),
						docAdNO: document.getElementById('doc_ad_NO'),
						nombres: Array.from({length: 4}, (_, i) => document.getElementById(`nombre${i+1}`))
				};
				
				if (option.value === 'SI') {
						Object.values(elements).flat().forEach(el => el && this.hideElement(el));
				} else if (option.value === 'NO') {
						this.showElement(elements.cantidad, true);
						this.showElement(elements.docAdNO);
				}
		},
		
		handleQuantityChange() {
				const cantidad = document.getElementById('cantidad');
				const value = parseInt(cantidad.value) || 1;
				cantidad.value = Math.min(Math.max(value, 1), 4);
				
				const docAdNO = document.getElementById('doc_ad_NO');
				this.showElement(docAdNO);
				
				for (let i = 1; i <= 4; i++) {
						const nombre = document.getElementById(`nombre${i}`);
						if (i <= cantidad.value) {
								this.showElement(nombre, true);
						} else {
								this.hideElement(nombre);
						}
				}
		},
		
		toggleDocumentNumber(num) {
				const checkbox = document.getElementById(`D${num}`);
				const numberInput = document.getElementById(`numeroD${num}`);
				
				if (checkbox.checked) {
						this.showElement(numberInput, true);
				} else {
						this.hideElement(numberInput);
				}
		},
		
		showElement(element, required = false) {
				if (element) {
						element.style.display = 'block';
						element.disabled = false;
						if (required) element.required = true;
				}
		},
		
		hideElement(element) {
				if (element) {
						element.style.display = 'none';
						element.disabled = true;
						element.required = false;
				}
		}
};

// Global functions for backward compatibility
function handleRadioClick(option) {
		FormHandler.handleRadioClick(option);
}

function toggleDocumentNumber(num) {
		FormHandler.toggleDocumentNumber(num);
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
		// Initialize radio button states
		document.querySelectorAll('input[type="radio"]').forEach(radio => {
				if (radio.checked) {
						FormHandler.currentOptions[radio.name] = radio;
				}
		});
		
		// Quantity change handler
		const cantidad = document.getElementById('cantidad');
		if (cantidad) {
				cantidad.addEventListener('blur', () => FormHandler.handleQuantityChange());
		}
		
		// Disable right-click context menu
		document.addEventListener('contextmenu', e => e.preventDefault());
});

// Check if consecutive limit exceeded
<? if ($consec > $ultimo_consec): ?>
setTimeout(() => window.close(), 10 * 60 * 1000);
document.body.innerHTML = '<?= $aviso_pedido ?>';
<? endif; ?>
</script>
<!-- *****************************************			 FIN DES-SELECCIONAR INPUT radio			 ***************************************** -->
	</form>
</div>		<!-- cierre del div "noimprimir" -->
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
