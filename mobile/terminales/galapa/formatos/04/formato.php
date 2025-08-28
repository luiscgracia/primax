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
			<tr><td>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=5%></td><td width=70%></td><td width=20%></td><td width=5%></td></tr>
			<tr>
				<td></td>
				<td class=B style=text-align:right><span id=doc_ad_NO>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</span></td>
				<td style=text-align:left><input name=cantidad id=cantidad style="width:60%; text-align:center" maxlength=1 placeholder="Máx. 4" inputmode=numeric pattern=^(?:[1-4]{1})$></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=8%></td><td width=38%></td><td width=8%></td><td width=38%></td><td width=8%></td></tr>
			<? for ($i = 1; $i <= 4; $i += 2): ?>
			<tr>
				<td></td>
				<td style=text-align:center><input name="nombre<?= $i ?>" id="nombre<?= $i ?>" maxlength=30 style=display:none pattern=.{1,} onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre <?= $i == 1 ? '1er' : ($i == 3 ? '3er' : $i.'o') ?>. autorizado"></td>
				<td></td>
				<? if ($i < 4): ?>
					<td style=text-align:center><input name="nombre<?= $i+1 ?>" id="nombre<?= $i+1 ?>" maxlength=30 style=display:none pattern=.{1,} onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre <?= $i+1 ?>o. autorizado"></td>
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
				<td class=A><br>FECHA<br>									 <input name=fechaA				type=date value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='<?echo $hora;?>' required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA		type=time value='<?echo $hora;?>' required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit	class=consecutivo placeholder="######" maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;B. LISTA DE VERIFICACIÓN DE REQUISITOS DE SEGURIDAD</b></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td class=B>REQUISITO DE SEGURIDAD</td></tr>

			<?
			$security1Questions = [
				 1 => "Está el equipo totalmente aislado?",
				 2 => "Se ha retirado todo el producto, lodo e incrustaciones?",
				 3 => "Permiten los factores externos hacer el trabajo con seguridad?<br><span>(Viento, Tormentas, Lluvia, Sol, etc.)?</span>",
				 4 => "Se ha verificado la atmósfera del espacio confinado?",
				 5 => "Se ha desgasificado el espacio confinado?",
				 6 => "Se tiene iluminación adecuada?",
				 7 => "Se requiere ventilación adicional?",
				 8 => "Se tiene ingreso y salida libres?",
				 9 => "Se requiere de un inspector de Seguridad?",
				10 => "Se tienen precauciones para el estrés térmico?",
				12 => "Se tiene en cuenta la posibilidad de cambios en la atmósfera del espacio confinado?",
				13 => "Hay algún requisito legal especial?"
			];

			foreach ($security1Questions as $num => $question) {
				echo "<tr class='C'>
					<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$question}</td>
				</tr>";
			}
			?>

			<tr class=C><td colspan=4></td><td class=B><input name=B13a maxlength=30 type=texto style=width:96% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>

			<?
			$security2Questions = [
				14 => "Se ha demarcado al área bajo control?",
				15 => "Está disponible y listo el equipo de primeros auxilios?",
				16 => "Está disponible y listo el equipo contra incendios?",
				17 => "Se han suspendido tareas vecinas que pueden afectar el trabajo?",
				18 => "Se tienen precauciones para exposición al plomo?",
				19 => "El plan de rescate documentado está disponible y actualizado?"
			];

			foreach ($security2Questions as $num => $question) {
				echo "<tr class='C'>
					<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$question}</td>
				</tr>";
			}
			?>

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
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B20e type=date value=<?echo $fechacero;?> max=<?echo $fechaactual;?> required></td>
				<td class=A>BUMP TEST<br>						<input name=B20g type=checkbox></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B20b maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>MARCA<br>						<input name=B20d maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B20f type=date value=<?echo $fechacero;?> max=<?echo $fechaactual;?>></td>
				<td class=A>BUMP TEST<br>						<input name=B20h type=checkbox></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>

		<div style="position:absolute; width:36.50%; left:0.50%; background-color:white">
			<table border=1>
				<tr height=70px><td class=A3 style=width:55%>PRUEBA</td>																	<td style=width:45% class=A3>Perm</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;% LEL</td>												<td class=A1>0%</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Oxígeno</td>											<td class=A1>19.5%-23.5%</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Total<br>&nbsp;Hidrocarburos</td><td class=A1>100 ppm</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Etanol</td>											<td class=A1>1000 ppm</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Benceno</td>											<td class=A1>0.5 ppm</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Plomo<br>&nbsp;Orgánico</td>			<td class=A1>0.075 mg/m&#179;</td></tr>
				<tr height=70px><td class=A1 style=text-align:left>&nbsp;Monóxido de<br>&nbsp;Carbono</td><td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:62.25%; left:37.00%; background-color:white; overflow:scroll">
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
				.tabla20		{border-collapse:collapse; width:100%; border:2px solid #ff7000}
				.tabla20 td	{border:1px solid #ff7000; height:70px; text-align:center; vertical-align:middle; padding:0px}
				.hora				{width:190px; background:#ff7000; color:#fff; font-weight:bold}
				.result			{width:150px; background:#ff7000; color:#fff; font-weight:bold}
				.i20				{width:95%; height:35px; border:2px solid rgba(255,112,0,1); border-radius:5px; padding:0px; text-align:center}
				.i20:focus	{border-color:#ff7000; outline:none}
				.req20			{border-color:rgba(0,0,255,0.5); background:rgba(0,255,0,0.1)}
			</style>';

			echo '<table class=tabla20>
				<tr>';
					for ($i = 1; $i <= $columnas; $i++)
						echo "<td style='border:1px solid #ffffff' class=hora>Hora<br>$i</td>
						<td style='border:1px solid #ffffff' class=result>Resultado<br>$i</td>";
				echo '</tr>';
				for($i = 0; $i < $filas; $i++) {
				echo '<tr>';
					for($j = 0; $j < $columnas; $j++) {
						$q20 = $j ? '':'required';
						$class20 = $j ? 'i20':'i20 req20';
						echo "<td><input name=B20{$l[$j*2]}".($i+1)." 	type=time class='$class20' $q20></td>";
						echo "<td><input name=B20{$l[$j*2+1]}".($i+1)." type=text class='$class20' value='{$p[$i][0]}' maxlength={$p[$i][1]} pattern='{$p[$i][2]}' placeholder='{$p[$i][3]}' inputmode=numeric $q20></td>";
					}
				echo '</tr>';
				}
			echo '</table>';
			?>
		</div>

		<div style="position:relative; width:100vw; left:0px; top:565px; background-color:rgba(0,0,255,0)">
			<table>
				<tr>
					<td class=A style=text-align:left>
						<b>&nbsp;LA MEDICIÓN DEBE SER CONTÍNUA.<br>
							 &nbsp;SI EL %LEL SE SUBE DE 4%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b>
					</td>
				</tr>
			</table>
		</div>

		<div style="position:relative; width:100vw; left:0px; top:580px">
			<table border=0>
				<tr>
					<td class=B style="width: 7%; vertical-align:top">&nbsp;&nbsp;23.</td><td class=B style="width:93%; font-size:30px">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td>
				</tr>
			</table>
	 	</div>

	 	<div style="position:relative; width:59%; left:0.50%; top:580px; background-color:white">
			<table border=1>
				<tr height= 75px><td style=width:550 class=A3>PERSONAL<br>QUE INGRESA</td></tr>
				<tr height= 50px><td class=A1><input name=B231 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr height= 50px><td class=A1><input name=B232 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr height= 50px><td class=A1><input name=B233 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr height= 50px><td class=A1><input name=B234 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr height= 50px><td class=A1><input name=B235 maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
	 	</div>
		<div style="position:relative; width:39.25%; left:60.00%; top:253.50px; background-color:white; overflow:scroll">
			<?php
			$filas = 5;
			$columnas = 7;
			$l = range('A','P');

			echo '<style>
				.tabla23		{border-collapse:collapse; width:100%; border:2px solid #ff7000}
				.tabla23 td	{border:1px solid #ff7000; text-align:center; vertical-align:middle; padding:0px}
				.horaE			{width:190px; background:#ff7000; color:#fff; font-weight:bold}
				.horaS			{width:190px; background:#ff7000; color:#fff; font-weight:bold}
				.i23				{width:95%; height:35px; border:2px solid rgba(255,112,0,1); border-radius:5px; padding:0px; text-align:center}
				.i23:focus	{border-color:#ff7000; outline:none}
				.req23			{border-color:rgba(0,0,255,0.5); background:rgba(0,255,0,0.1)}
			</style>';

			echo '<table class=tabla23>
				<tr style=height:75px>';
					for ($i = 1; $i <= $columnas; $i++)
						echo "<td style='border:1px solid #ffffff' class=horaE>Hora Entrada<br>$i</td>
						<td style='border:1px solid #ffffff' class=horaS>Hora Salida<br>$i</td>";
				echo '</tr>';
				for ($i = 0; $i < $filas; $i++) {
				echo '<tr style=height:50px>';
					for ($j = 0; $j < $columnas; $j++) {
						$q23 = $i || $j ? '':'required';
						$class23 = $i || $j ? 'i23':'i23 req23';
						echo "<td><input name=B23{$l[$j*2]}".($i+1)." 	type=time class='$class23' $q23></td>";
						echo "<td><input name=B23{$l[$j*2+1]}".($i+1)." type=time class='$class23' $q23></td>";
					}
				echo '</tr>';
				}
			echo'</table>';
			?>
		</div>

<!-- *****************************************			 sección C			 ***************************************** -->

<!-- 10 --> 		<div style="position:relative; left:0; width:100vw; top:255"> <!-- este div mueve hacia abajo desde la sección C -->
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
				<td><input name=fechaejecC	type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly></td>
				<td><input name=horaejecC		type=time	 min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorC  type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspC  type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly></td>
				<td><input name=horainspC   type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
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
				<td><input name=fechaemisorD	type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required style=display:none></td>
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
				<td><input name=fechaejecE	type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly></td>
				<td><input name=horaejecE		type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspE	type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly></td>
				<td><input name=horainspE		type=time  min=<?echo date('H:i');?> value='<?echo $hora;?>' required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	type=date  class=mostrarfecha value=<?echo $fechahoy;?> min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly></td>
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
						<select name=usuario id=usuario required>
							<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?= $usuario[$i] ?>"><?= $usuario[$i] ?>@primax.com.co</option>
							<? endfor; ?>
						</select>
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
<!-- /1 --> </div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
