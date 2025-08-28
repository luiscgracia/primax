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
<div class=noimprimir>
<div class=fijar style="top:15px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
</div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style="position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw">
		<table border=0 style=background-color:rgba(255,255,255,1)>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=<?=$estado_formulario1; ?> readonly>
					<span style='font-size:36px'><b><?=$$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:white; border:0px"
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
					<span style=font-size:20.00px>ESTE PERMISO ES VÁLIDO POR UN TURNO O MÁXIMO 12 HORAS.</span><br>
					<span style=font-size:19.35px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 - TERMINAL <?=strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr><td width=80%></td><td width=20%></td></tr>
			<tr>
				<td style=vertical-align:bottom>INSTALACIÓN<textarea name=instalacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td>
				<td style=vertical-align:bottom>CERTIFICADO &#8470;<input name=certificado class=consecutivo maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
			<tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=17%></td><td width=25%></td><td width=16%></td><td width=25%></td><td width=17%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;A. TAREA A REALIZAR</b></td></tr>
			<tr><td colspan=5>UBICACIÓN<textarea name=ubicacion maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td>APT<br><input name=apt class=consecutivo maxlength=6 style=width:55% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				<td></td>
				<td>EQUIPO<br><input name=equipo class=consecutivo maxlength=10 style=width:89% inputmode=numeric pattern=^(?:[0-9]{4,10})$ required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table>
			<tr><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td></tr>
			<tr>
				<td></td>
				<td>FECHA<input name=fechaA type=date value='<?=$hoy;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td></td>
				<td>HORA INICIAL<input name=horainicioA type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
				<td></td>
				<td>HORA FINAL<input name=horafinalA type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=7>DESCRIPCIÓN<textarea name=descripcion type=texto maxlength=74 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=40%></td><td width= 4%></td><td width=10%><td width=46%></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;B. ADMINISTRACIÓN DE CAMBIOS</b></td></tr>
			<tr class=C>
				<td rowspan=2 class=B style='text-align:right; vertical-align:middle'>Este trabajo genera un &nbsp;</td>
				<td><input name=cambio id=cambioA type=radio value=CME onclick=handleRadioClick(this) required></td>
				<td colspan=2 class=B>&nbsp;Cambio de la misma especie<br>&nbsp;ó no hay cambio.</td>
			</tr>
			<tr class=C>
				<td><input name=cambio id=cambioB type=radio value=CDE onclick=handleRadioClick(this)></td>
				<td colspan=2 class=B>&nbsp;Cambio de diferente especie.</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=2><input style=display:none name=pedidocambio id=pedidocambio class=consecutivo maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric></td>
				<td class=B><span style='display:none; font-size:32px' id=pedido>&nbsp;&#8470;&nbsp;Pedido de Cambio</span></td>
			</tr>
		</table>
		<script>
		var pedidocambio = document.getElementById('pedidocambio');
			document.getElementById('cambioA').addEventListener('click', function(e) {pedidocambio.disabled=true; pedidocambio.style.display='none'; pedido.disabled=true; pedido.style.display='none';});
			document.getElementById('cambioB').addEventListener('click', function(e) {pedidocambio.disabled=false; pedidocambio.style.display='block'; pedidocambio.required=true; pedido.disabled=false; pedido.style.display='block'; pedido.required=true;});
		</script>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width= 5%></td><td width= 5%></td><td width= 8%></td><td width=82%></td></tr>
			<tr class=C><td class=B colspan=4><b>&nbsp;&nbsp;C. IDENTIFICACIÓN DEL RIESGO</b><br><span>&nbsp;&nbsp;(Consultar el manual de Permisos de Trabajo para mayor claridad)</span></td></tr>
			<tr class=C><td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>IDENTIFICACIÓN DEL RIESGO</b></td></tr>
			<tr class=C><td>SI</td><td>NO</td><td colspan=2></td></tr>

			<?
			$preguntasSiNo1 = [
				 1 => "Todas las personas tienen inducción SHE vigente?<span>(menor a 1 año)</span>",
				 2 => "Trabajo en áreas clasificadas<br><span>(Clase 1 Div.I ó Div.II)?</span>",
				 3 => "Trabajos en o adyacentes a un Llenadero?",
				 4 => "Entrada o Salida bloqueados?",
				 5 => "Ingreso a Espacios Confinados?",
				 6 => "Trabajo en Alturas<br><span>(Posible caída >2mt / 6ft [Colombia: 1.5mt / 5ft)?</span>",
				 7 => "Trabajos en Procesos de líneas de producto de Control o Instrumentos?",
				 8 => "Se desactivará algún Equipo Crítico?",
				 9 => "Se afectan otros Sistemas Operacionales no-Críticos?",
				10 => "Exposición al Movimiento de Vehículos?",
				11 => "Manejo de Cargas con Grúas?",
				12 => "Trabajo en Objetos Potencialmente Inestables?",
				13 => "Trabajo sobre el Agua?",
				14 => "Trabajo Subacuático?",
				15 => "Limpieza con Chorro de Agua a Presión?",
				16 => "Radiografías o Fuentes de Radiación similares?"
			];

			foreach ($preguntasSiNo1 as $num => $pregunta) {
				echo "<tr class='C'>
					<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='c{$num}' name='C{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$pregunta}</td>
				</tr>";
			}
			?>

			<tr class=C><td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>EXCAVACIÓN</b></td></tr>
			<?
			$preguntasSiNo2 = [
				17 => "Excavación Manual a más de 23 cms?",
				18 => "Excavación con Máquina, cualquier profundidad?",
				19 => "Inserción de Estacas en el terreno?"
			];

			foreach ($preguntasSiNo2 as $num => $pregunta) {
				echo "<tr class='C'>
					<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='c{$num}' name='C{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$pregunta}</td>
				</tr>";
			}
			?>

			<tr class=C><td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>SUSTANCIAS PELIGROSAS</b></td></tr>
			<?
			$preguntasSiNo3 = [
				20 => "Manejo/Exposición a Sustancias Peligrosas?",
				21 => "Exposición a Productos con Plomo?",
				22 => "Si respondió si a las anteriores, revisó las MSDS?"
			];

			foreach ($preguntasSiNo3 as $num => $pregunta) {
				echo "<tr class='C'>
					<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='c{$num}' name='C{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$pregunta}</td>
				</tr>";
			}
			?>

			<tr class=C><td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>FUENTES DE IGNICIÓN</b></td></tr>
			<tr class=C><td>SI</td><td>NO</td><td colspan=2></td></tr>
			<?
			$preguntasSiNo4 = [
				23 => "Fuentes de Ignición<br><span>(chispas, llamas, calor >200°C, etc.)?</span>",
				24 => "Trabajo con Equipo de Oxiacetileno?",
				25 => "Uso de Equipos con Motor de Combustión?",
				26 => "Uso de Equipos / Herramientas Eléctricos?",
				27 => "Uso de Maquinaria de Percusión?",
				28 => "SandBlasting / Granallado / WetBlasting?"
			];

			foreach ($preguntasSiNo4 as $num => $pregunta) {
				echo "<tr class='C'>
					<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='c{$num}' name='C{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$pregunta}</td>
				</tr>";
			}
			?>

			<tr class=C><td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>ENERGÍAS PELIGROSAS</b></td></tr>
			<?
			$preguntasSiNo5 = [
				29 => "Aislamiento Eléctrico de Equipos?",
				30 => "Trabajos en Sistemas Eléctricos Energizados?",
				31 => "Desacople Mecánico de Equipos?",
				32 => "Trabajos a Sistemas Presurizados o pruebas de Presión de Equipos?",
				33 => "Temperaturas Peligrosas?",
				34 => "La labor requiere consultar al SME?<br><span>(ver respaldo)</span>",
				35 => "Se revisaron los procedimientos de seguridad que apliquen?<br><span>(Ver listado en Manual de Permisos de Trabajo)</span>",
				36 => "El trabajo requiere de un plan específico de emergencia?"
			];

			foreach ($preguntasSiNo5 as $num => $pregunta) {
				echo "<tr class='C'>
					<td><input type='radio' id='C{$num}' name='C{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
					<td><input type='radio' id='c{$num}' name='C{$num}' value='NO' onclick='handleRadioClick(this)'></td>
					<td class='numero'>{$num}.</td>
					<td class='B'>{$pregunta}</td>
				</tr>";
			}
			?>

			<tr height=30><td></td></tr>
			<tr class=C>
				<td colspan=4>
					<span>OTRAS ACTIVIDADES NO MENCIONADAS ARRIBA:</span>
					<textarea name=otrasactividades type=texto maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea>
				</td>
			</tr>
		</table>
		<hr>

	<!-- *****************************************			 sección D			 ***************************************** -->
		<table border="0">
			<tr><td width="14%"></td><td width="5%"></td><td width="81%"></td></tr>
			<tr><td class="B" colspan="3"><b>&nbsp;&nbsp;D. DOCUMENTACION ADICIONAL</b><span>&nbsp;(Según lo encontrado en sección C)</span></td></tr>
			<tr class="D"><td class="B" colspan="2">&nbsp;&nbsp;Permiso</td><td class="B">DOCUMENTO</td></tr>
			<?
			$documents = [
				 1 => "Permiso Trabajo en Frío en Espacio NO Confinado",
				 2 => "Permiso Trabajo en Caliente en Espacio NO Confinado",
				 3 => "Permiso Trabajo en Frío en Espacio Confinado",
				 4 => "Permiso Trabajo en Caliente en Espacio Confinado",
				 5 => "Permiso de Aislamiento de Energía",
				 6 => "Autorización de Excavación",
				 7 => "Verificación de Equipos con Motor de Combustión",
				 8 => "Permiso para Trabajos Eléctricos",
				 9 => "Permiso de Trabajo con Radiaciones Ionizantes",
				10 => "Permiso de Trabajo en Alturas",
				11 => "Verificación de Equipo de Oxiacetileno",
				12 => "Verificación previa al levantamiento con grúa"
			];

			foreach ($documents as $num => $doc) {
				echo "<tr class='D'>
					<td><input style='display:none; width:100%' id='numeroD{$num}' name='numeroD{$num}' class='consecutivo' maxlength='6' inputmode='numeric' pattern='^(?:[0-9]{4,6})$'></td>
					<td><input name='D{$num}' type='checkbox' id='D{$num}' onChange='toggleDocumentNumber({$num})'></td>
					<td class='B'>{$doc}</td>
				</tr>";
			}
			?>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table>
			<tr><td class=B><b>&nbsp;&nbsp;E. PRECAUCIONES ADICIONALES</b></td></tr>
			<tr><td><textarea name=precauciones type=texto maxlength=90 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width= 2.00vw></td><td width=98vw></td></tr>
			<tr>
				<td class=B colspan=2><b>&nbsp;&nbsp;F. ACEPTACIÓN</b></td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo que la tarea definida en la sección A está especificada en la sección C de este certificado y que no se ejecutará ninguna otra tarea sin autorización previa.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&#9679;&nbsp;</td>
				<td class=B>He leído y comprendo a conciencia las restricciones impuestas por este certificado y documentos asociados, e instruiré adecuadamente a todo el personal bajo mi control.</td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=46%></td><td width=49%></td></tr>
			<tr class=C>
				<td><input name=empleado id=empleadop type=radio value=E onclick=handleRadioClick(this) required></td>
				<td colspan=2 class=B>EMPLEADO</td>
			</tr>
			<tr class=C>
				<td><input name=empleado id=empleadocp type=radio value=CP onclick=handleRadioClick(this)></td>
				<td class=B>CONTRATISTA PERMANENTE </td>
				<td><input name=companiacp id=companiacp style=display:none maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<script>
			var companiacp = document.getElementById('companiacp');
			document.getElementById('empleadop').addEventListener('click', function(e) {companiacp.disabled = true; companiacp.style.display ="none";});
			document.getElementById('empleadocp').addEventListener('click', function(e) {companiacp.disabled = false; companiacp.style.display ="block"; companiacp.required = true;});
		</script>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorF		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaejecF	type=date  value='<?=$hoy;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td width=19%><input name=horaejecF		type=time  value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorF	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	type=date  value='<?=$hoy;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horainspF		type=time  value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección G			 ***************************************** -->
		<table><tr><td class="B"><b>&nbsp;&nbsp;G. AUTORIZACIÓN</b><br><span class="seccion">&nbsp;&nbsp;Marque una de las casillas, según corresponda:</span></td></tr></table>
			<table border="0">
		    <tr class="C"><td width="5%"></td><td width="95%"></td></tr>
		    <tr class="C">
				  <td><input type="radio" id="docum_adic_SI" name="docum_adic" value="SI" onclick="handleRadioClick(this)" required></td>
				  <td class="B">Se requiere documentación adicional. Para cada tarea se deberá diligenciar y aprobar previamente la documentación indicada en la Sección D.</td>
		    </tr>
		    <tr height="30"><td></td></tr>
		    <tr class="C">
				  <td><input type="radio" id="docum_adic_NO" name="docum_adic" value="NO" onclick="handleRadioClick(this)"></td>
				  <td class="B">No se requiere documentación adicional. Por lo tanto, se autoriza la realización de este trabajo con este único certificado, formato de control de interfases y el ATS.</td>
		    </tr>
			</table>

			<table border="0">
		    <tr><td width="5%"></td><td width="77%"></td><td width="13%"></td><td width="5%"></td></tr>
		    <tr>
				  <td></td>
				  <td class="B"><span style="display:none; font-size:32px" id="doc_ad_NO">Cantidad de personas autorizadas para el trabajo:</span></td>
				  <td><input name="cantidad" id="cantidad" style="display:none; width:50%; text-align:center" maxlength="1" inputmode="numeric" pattern="^(?:[1-7]{1})$"></td>
				  <td></td>
		    </tr>
			</table>
			<table border=0>
		    <tr><td width=5%></td><td width=44%></td><td width=2%></td><td width=39%></td><td width=5%></td><td width=5%></td></tr>
		    <? for ($i = 1; $i <= 7; $i += 2): ?>
		    <tr>
				  <td></td>
				  <td><input name="nombre<?=$i ?>" id="nombre<?=$i ?>" maxlength=30 style=display:none pattern=.{1,} onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre <?=$i == 1 ? '1er' : ($i == 3 ? '3er' : $i.'o') ?>. autorizado"></td>
				  <td></td>
				  <? if ($i < 7): ?>
				  <td colspan=2><input name="nombre<?=$i+1 ?>" id="nombre<?=$i+1 ?>" maxlength=30 style=display:none pattern=.{1,} onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre <?=$i+1 ?>o. autorizado"></td>
				  <? else: ?>
				  <td colspan=2></td>
					<? endif; ?>
				  <td></td>
		    </tr>
		    <tr height=10><td></td></tr>
		    <? endfor; ?>
		    <tr height=30><td></td></tr>
			</table>
		<br>
		<table border=0>
			<tr>
				<td width=55%><input name=aprobadorG	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaaprobG	type=date		value='<?=$hoy;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td width=19%><input name=horaaprobG	type=time		value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>APROBADOR SME</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorG				type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorG	type=date		value='<?=$hoy;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
				<td><input name=horaemisorG		type=time		value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección H			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;H. CANCELACIÓN</b><br><span class=seccion>&nbsp;&nbsp;Certifico que el Trabajo indicado en A:</span></td></tr></table>
		<table border=0>
			<tr><td width= 5%></td><td width=95%></td></tr>
			<tr class=C>
				<td><input type=radio id=completadoSI name=completado value=SI onclick=handleRadioClick(this) required></td>
				<td class=B>Ha sido completado.</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=completadoNO name=completado value=NO onclick=handleRadioClick(this)></td>
				<td class=B>No se ha completado y el área ha quedado en condiciones seguras.</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%></td>
				<td width=19%><input type=time name=horaejecH value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horainspH value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr>
				<td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horaemisorH value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>
		<table>
			<tr height=30><td></td></tr>
				<tr style="background-color:rgba(0,240,0,0); height:15%">
					<td>
						<select name=usuario id=usuario required>
							<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?>@primax.com.co</option>
							<? endfor; ?>
						</select>
					</td>
				</tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style=display:none type=text name=fecha value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=200>
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
	</div>

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
						nombres: Array.from({length: 7}, (_, i) => document.getElementById(`nombre${i+1}`))
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
			  cantidad.value = Math.min(Math.max(value, 1), 7);
			  
			  const docAdNO = document.getElementById('doc_ad_NO');
			  this.showElement(docAdNO);
			  
			  for (let i = 1; i <= 7; i++) {
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
document.body.innerHTML = '<?=$aviso_pedido ?>';
<? endif; ?>
</script>

<!-- *****************************************			 FIN DES-SELECCIONAR INPUT radio			 ***************************************** -->
</form>
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
