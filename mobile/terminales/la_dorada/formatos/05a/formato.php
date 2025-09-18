<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
td.C			{font-size:30px; text-align:left;		font-weight:bold}
td.Cn			{font-size:28px; text-align:right;	vertical-align:top; border-right:0px; width:100%}
td.Cp			{font-size:28px; text-align:left;		vertical-align:top; border-left: 0px; width:100%; padding:0 7 0 7}
tr.C			{height: 85px; vertical-align:middle}
tr.Cn			{height:180px; vertical-align:middle}
tr.Cn0		{height:111px; vertical-align:top}
tr.Cn1		{height: 48px; vertical-align:top}
tr.Cn2		{height: 72px; vertical-align:top}
tr.Cn3		{height:108px; vertical-align:top}
tr.Cn4		{height:144px; vertical-align:top}
tr.Cn5		{height:180px; vertical-align:top}
.B1	{background-color:rgba(0,0,0,0.1)}
.B2	{background-color:rgba(0,0,0,0.0)}
</style>
</head>
<script type="text/javascript">
function mayuscula(e) {e.value = e.value.toUpperCase();}
function closed() {window.open('','_parent',''); window.close();}
function cerrarVentana() {window.close();}
function f1a() {document.getElementById("fechaB1a").value = document.getElementById("fechaB1").value;}
function f2a() {document.getElementById("fechaB2a").value = document.getElementById("fechaB2").value;}
function f3a() {document.getElementById("fechaB3a").value = document.getElementById("fechaB3").value;}
function f4a() {document.getElementById("fechaB4a").value = document.getElementById("fechaB4").value;}
function f5a() {document.getElementById("fechaB5a").value = document.getElementById("fechaB5").value;}
function f6a() {document.getElementById("fechaB6a").value = document.getElementById("fechaB6").value;}
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
<div class=fijar style="top:15px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:8000px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=<?=$estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:100%; display:inline-block; background-color:none"><b><?=$$formulario; ?></b></span>
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
					<span style="font-size:20px">CONSULTE EL MANUAL DE PERMISOS DE TRABAJO PARA DESARROLLAR ESTE FORMATO</span><br>
					<span style="font-size:20px">ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA, SE SUSPENDEN ACTIVIDADES Y SE DIRIGEN AL PUNTO DE ENCUENTRO.&nbsp;&nbsp;HASTA QUE EL EMISOR DETERMINE EL REINICIO O CANCELACIÓN DE LAS ACTIVIDADES</span><br>
					<span style="font-size:24px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=3%></td><td width=45%></td><td width=4%></td><td width=45%></td><td width=3%></td></tr>
			<tr><td class=B colspan=4><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td class=B style="text-align:right; border:0px solid black">TRABAJO EN CALIENTE&nbsp;<input name=tipo_trabajo id=tipoC type=radio value=C onclick=gestionarClickRadio(this) required></td>
				<td></td>
				<td class=B style="text-align:left;  border:0px solid black"><input name=tipo_trabajo id=tipoF type=radio value=F onclick=gestionarClickRadio(this)>&nbsp;TRABAJO EN FRÍO</td>
				<td></td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr height=30><td></td></tr>
			<tr><td>&nbsp;&nbsp;DESCRIPCIÓN</td></tr>
			<tr><td><textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr><td>&nbsp;&nbsp;UBICACIÓN</td></tr>
			<tr><td><textarea name=ubicacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
		</table>
		<table border=0>
			<tr height=30><td width=36%></td><td width=1%></td><td width=32%></td><td width=1%></td><td width=30%></td></tr>
			<tr><td>CERTIFICADO<br>GAS FREE</td><td></td><td>CERTIF. LIBRE PLOMO<br>(Interior tanque)</td><td></td><td>PROCEDIMIENTO/<br>APT</td></tr>
			<tr>
				<td><input name=certificado_gas_free		class=consecutivo inputmode=numeric maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=certificado_libre_plomo	class=consecutivo inputmode=numeric maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=procedimiento						class=consecutivo inputmode=numeric maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=5%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=3%></td><td width=3%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=5%></td></tr>
			<tr><td></td><td colspan=3>APERTURA PERMISO</td><td></td><td></td><td colspan=3>CIERRE PERMISO</td><td></td></tr>
			<tr>
				<td></td>
				<td><input name=fecha_apertura type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' required></td><td></td>
				<td><input name=hora_apertura	 type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
				<td></td>
				<td></td>
				<td><input name=fecha_cierre	 type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' required></td><td></td>
				<td><input name=hora_cierre		 type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=79%></td><td width=1%></td><td width=20%></td></tr>
			<tr><td colspan=3 class=B>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;<input name=cantidad id=cantidad style=width:8% inputmode=numeric maxlength=1 placeholder="Máx. 5" pattern=^(?:[1-5]{1})$ required></td></tr>
			<tr height=10px><td></td></tr>
		</table>
		<div id=nombre style="position:absolute; display:inline; width:43.75%; top:930px; left:0.50%; background-color:white">
			<table border=1>
				<tr height=80px><td class=A3><b>NOMBRE Y APELLIDOS</b></td></tr>
				<? for ($i = 1; $i <= 5; $i++) { ?>
				<tr height=60px><td><input name=nombre<?=$i?> id=nombre<?=$i?> style=display:none placeholder="Persona&nbsp;autorizada&nbsp;<?=$i?>" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<? } ?>
			</table>
		</div>
		<div id=dkf style="position:absolute; display:inline; width:55.00%; top:930px; left:44.25%; background-color:white; overflow:scroll">
			<table border=1>
				<tr height=80px>
					<td style=width:190px class=A2><b>CÉDULA</b></td>
					<td style=width:350px	class=A2><b>CARGO (ROL)</b></td>
					<td style=width:400px	class=A2><b>FIRMA</b></td>
				</tr>
				<? for ($i = 1; $i <= 5; $i++) { ?>
				<tr height=60px>
					<td><input name=cedula<?=$i?> id=cedula<?=$i?> style=display:none maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
					<td><input name=cargo<?=$i?>	id=cargo<?=$i?>  style=display:none maxlength=20 pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
					<td style="background-color:rgba(0,0,0,0.2); border:1px solid rgba(255,112,0,1)"></td>
				</tr>
				<? } ?>
			</table>
		</div>

<!-- *****************************************			 sección B			 ***************************************** -->
		<div style="position:absolute; width:100%; top:1320px"><hr><table border=0><tr><td class=B><b>&nbsp;B. DOCUMENTACIÓN ADICIONAL Y APROBACIONES DIARIAS</b></td></tr></table></div>
		<div style="position:absolute; width:55.75%; left:0.50%; top:1380px; background-color:white">
			<table border=1>
				<tr class=C><td class=A2>DOCUMENTACIÓN</td></tr>
				<tr class=C><td class=C style="padding:0 10"># CERTIFICADO HABILITACIÓN</td></tr>
				<tr class=C><td class=C style="padding:0 10"># PERSONAS EJECUTAN LA TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10"># PERSONAS CON AUTOREPORTE DE CONDICIONES DE SALUD</td></tr>
				<tr class=C><td class=C style="padding:0 10">HORA INICIO TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10">HORA FINALIZACIÓN TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA EJECUTOR</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA VIGIA EC.</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA SUPERVISOR EC.</td></tr>
				<tr class=C><td class=C style="padding:0 10">AUTORIZACIÓN EMISOR<br>(Antes del inicio de labores)</td></tr>
			</table>
		</div>
		<?	$config = ['clase' => ['B1','B2']]; ?>
		<div style="position:absolute; width:43.00%; left:56.25%; top:1380px; background-color:white; overflow:scroll">
			<table border=1>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td style=width:205px class="<?= $config['clase'][($i - 1) % 2] ?>">DÍA <?=$i?><input name=fechaB<?=$i?> id=fechaB<?=$i?> type=date onfocusout=f<?=$i?>a() min=<?=$fechamin;?> max=<?=$fechamax;?> <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=num_cert_habil<?=$i?>				<? if ($i == 1) {echo 'required';} else {echo '';} ?> inputmode=numeric style=width:60% maxlength=6 pattern=^(?:[0-9]{4,6})$></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=num_pers_ejecutan<?=$i?>			<? if ($i == 1) {echo 'required';} else {echo '';} ?> inputmode=numeric style=width:40% maxlength=1 pattern=^(?:[0-5]{1})$></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=num_pers_autoreporte<?=$i?>	<? if ($i == 1) {echo 'required';} else {echo '';} ?> inputmode=numeric style=width:40% maxlength=1 pattern=^(?:[0-5]{1})$></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=hora_inicio<?=$i?>						<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=time value='<?=$hora;?>' min='<?=$horamin;?>'></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=hora_final<?=$i?>						<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=time value='<?=$hora;?>' min='<?=$horamin;?>'></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=firma_ejecutor<?=$i?>				<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=checkbox></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=firma_vigia<?=$i?>						<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=checkbox></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=firma_supervisor<?=$i?>			<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=checkbox></td><? } ?></tr>
				<tr class=C><? for ($i = 1; $i <= 6; $i++) { ?><td class="<?= $config['clase'][($i - 1) % 2] ?>"><input name=autorizacion_emisor<?=$i?>		<? if ($i == 1) {echo 'required';} else {echo '';} ?> type=checkbox></td><? } ?></tr>
			</table>
		</div>

<!-- *****************************************			 sección C		 ***************************************** -->
<!-- 9 -->	<div style="position:absolute; left:0px; top:2230px"> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;C. LISTA DE VERIFICACIÓN DE REQUISITOS DE SEGURIDAD</b><br></td></tr>
		</table>
		<table border=0>
			<tr><td width=5%></td><td width=60%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td></tr>
			<tr>
				<td></td>
				<td class=B>Qué tipo de espacio confinado es?</td>
				<td style=text-align:right class=B>1</td><td><input name=tipo_esp_conf id=tec1 type=radio value=1 onclick=gestionarClickRadio(this) required></td>
				<td style=text-align:right class=B>2</td><td><input name=tipo_esp_conf id=tec2 type=radio value=2 onclick=gestionarClickRadio(this)></td>
				<td style=text-align:right class=B></td><td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td class=B>Qué grado de peligrosidad tiene?</td>
				<td style=text-align:right class=B>A</td><td><input name=grado_peligro	id=gpA	type=radio value=A onclick=gestionarClickRadio(this) required></td>
				<td style=text-align:right class=B>B</td><td><input name=grado_peligro	id=gpB	type=radio value=B onclick=gestionarClickRadio(this)></td>
				<td style=text-align:right class=B>C</td><td><input name=grado_peligro	id=gpC	type=radio value=C onclick=gestionarClickRadio(this)></td>
				<td></td>
			</tr>
			<tr height=5px><td></td></tr>
		</table>

<!-- 10 -->			<div style="position:absolute; width:22.60%; left:0.50%; top:150px; background-color:white; overflow:scroll">
		<?
		// Configuración simple
		$config = [
							'dias' => 6,
							'criterios' => 34,
							'opciones' => ['SI', 'NO', 'NA'],
							'clases' => ['A21', 'A22'],
							'alturas' => ['Cn3', 'Cn2', 'Cn3', 'Cn3', 'Cn2', 'Cn1', 'Cn2', 'Cn4', 'Cn1', 'Cn2',
														'Cn1', 'Cn2', 'Cn4', 'Cn1', 'Cn3', 'Cn1', 'Cn2', 'Cn1', 'Cn2', 'Cn2',
														'Cn3', 'Cn2', 'Cn3', 'Cn2', 'Cn2', 'Cn1', 'Cn1', 'Cn1', 'Cn1', 'Cn1',
														'Cn1', 'Cn1', 'Cn1', 'Cn1']];

		// Función simple para generar ID
		function getId($criterio, $dia, $index) {return $index == 0 ? "C{$criterio}_{$dia}" : "C{$criterio}" . chr(96 + $index) . "_{$dia}";}
		?>

		<style>
		.tabla-verificacion			{width:100%; border-collapse:collapse; font-family:Arial}
		.tabla-verificacion td	{border:1px solid #000; text-align:center; vertical-align:middle; padding:5px}
		.fecha-input						{width:100%; text-align:center; font-size:30px; background-color:transparent; border:0}
		.A21										{background-color:rgba(0,0,0,0.1)}
		.A22										{background-color:rgba(0,0,0,0.0)}
		.Cn1										{height:44px}
		.Cn2										{height:72px}
		.Cn3										{height:108px}
		.Cn4										{height:144px}
		@media (max-width: 768px) {.fecha-input {font-size: 20px} .tabla-verificacion {font-size: 12px}}
		</style>

		<table class="tabla-verificacion" border="1">
			<!-- Encabezado días -->
			<tr style="height: 80px;">
				<? for ($dia = 1; $dia <= $config['dias']; $dia++) { ?>
					<td colspan=3 class="<?= $config['clases'][($dia - 1) % 2] ?>" style="width:210px; font-weight:bold;">
						 DÍA <?= $dia ?><input id="fechaB<?= $dia ?>a" class="fecha-input" readonly>
					</td>
				<? } ?>
			</tr>

			<!-- Encabezado opciones -->
			<tr style="height: 45px; font-weight: bold;">
				<? for ($dia = 1; $dia <= $config['dias']; $dia++) { ?>
					<? foreach ($config['opciones'] as $opcion): ?>
						<td class="<?= $config['clases'][($dia - 1) % 2] ?>"><?= $opcion ?></td>
					<? endforeach; ?>
				<? } ?>
			</tr>

			<!-- Filas de criterios -->
			<? for ($criterio = 1; $criterio <= 23; $criterio++) { ?>
				<tr class="<?= $config['alturas'][$criterio - 1] ?>">
					<? for ($dia = 1; $dia <= $config['dias']; $dia++) { ?>
						<? foreach ($config['opciones'] as $index => $opcion) { ?>
							<td class="<?= $config['clases'][($dia - 1) % 2] ?>">
								<input 
										name="C<?= $criterio ?>_<?= $dia ?>" 
										id="<?= getId($criterio, $dia, $index) ?>" 
										type="radio" 
										value="<?= $opcion ?>" 
										onclick="gestionarClickRadio(this)"
										<?= ($criterio <= 23 && $dia <= 1) ? 'required' : '' ?>>
							</td>
						<? } ?>
					<? } ?>
				</tr>
			<? } ?>

			<!-- Separador EPPs -->
			<tr style="height: 70px;"><td colspan="<?= $config['dias'] * 3 ?>" style="background-color:rgba(0,0,0,0.20)"></td></tr>

			<!-- EPPs (criterios 24-34) -->
			<? for ($criterio = 24; $criterio <= $config['criterios']; $criterio++) { ?>
				<tr class="<?= $config['alturas'][$criterio - 1] ?>">
					<? for ($dia = 1; $dia <= $config['dias']; $dia++) { ?>
						<? foreach ($config['opciones'] as $index => $opcion) { ?>
							<td class="<?= $config['clases'][($dia - 1) % 2] ?>">
								<input 
										name="C<?= $criterio ?>_<?= $dia ?>" 
										id="<?= getId($criterio, $dia, $index) ?>" 
										type="radio" 
										value="<?= $opcion ?>" 
										onclick="gestionarClickRadio(this)"
										<?= ($criterio <= $config['criterios'] && $dia <= 1) ? 'required' : '' ?>>
							</td>
						<? } ?>
					<? } ?>
				</tr>
			<? } ?>
		</table>

		<script>
		// JavaScript mínimo - solo funcionalidad básica
		function gestionarClickRadio(radio) {console.log('Radio seleccionado:', radio.name, radio.value);}

		// Funciones básicas de utilidad
		const TablaSimple = {
			// Obtener valores seleccionados
			getValues() {
				const valores = {};
				document.querySelectorAll('input[type="radio"]:checked').forEach(radio => {valores[radio.name] = radio.value;});
				return valores;},

				// Resetear formulario
				reset() {if (confirm('¿Resetear formulario?')) {document.querySelectorAll('input[type="radio"]').forEach(radio => {radio.checked = false;});}},

				// Cargar datos
				load(data) {Object.entries(data).forEach(([name, value]) => {const radio = document.querySelector(`input[name="${name}"][value="${value}"]`);	if (radio) radio.checked = true;});},

				// Exportar como JSON
				export() {
					const data = {fecha: new Date().toISOString().split('T')[0], valores: this.getValues()};
					const blob = new Blob([JSON.stringify(data, null, 2)], {type: 'application/json'});
					const link = document.createElement('a');
					link.href = URL.createObjectURL(blob);
					link.download = `tabla_${data.fecha}.json`;
					link.click();}};

			// API global simple
			window.Tabla = TablaSimple;
			console.log('Tabla simple cargada. Uso: Tabla.getValues(), Tabla.reset(), Tabla.export()');
			</script>
<!-- /10 -->			</div>
		<div style="position:absolute; width:76.15%; left:23.10%; top:148px; background-color:white">
			<table border=1>
				<tr><td style="width:7%; border:none"></td><td style="width:93%; border:none"></td></tr>
				<tr rowspan=2 height=125px><td colspan=2 class=A2>DESCRIPCIÓN</td></tr>
				<tr class=Cn3><td class=Cn> 1</td><td class=Cp>El personal tiene vigente la seguridad social, concepto médico de aptitud, entrenamiento y certificación en espacio confinado según el rol?</td></tr>
				<tr class=Cn2><td class=Cn> 2</td><td class=Cp>Hay un procedimiento específico de la actividad a realizar?</td></tr>
				<tr class=Cn3><td class=Cn> 3</td><td class=Cp>El personal destinado para la atención de emergencias está entrenado y participó en el simulacro previo a la actividad?</td></tr>
				<tr class=Cn3><td class=Cn> 4</td><td class=Cp>Líneas de entrada y salida del espacio confinado se encuentran con aislamiento, bloqueadas y etiquetadas?</td></tr>
				<tr class=Cn2><td class=Cn> 5</td><td class=Cp>Permiten los factores externos hacer el trabajo con seguridad? (viento, tormentas, lluvia, sol, etc.)</td></tr>
				<tr class=Cn1><td class=Cn> 6</td><td class=Cp>El sitio de trabajo está desgasificado y limpio?</td></tr>
				<tr class=Cn2><td class=Cn> 7</td><td class=Cp>Se realiza medición de la atmósfera del espacio confinado?</td></tr>
				<tr class=Cn4><td class=Cn> 8</td><td class=Cp>Este permiso incluye desacople de equipos operativos, que puedan generar drenaje, vapores de producto u otra energía peligrosa? Ver requerimientos respaldo de esta hoja</td?</tr>
				<tr class=Cn1><td class=Cn> 9</td><td class=Cp>Se tiene iluminación adecuada?</td></tr>
				<tr class=Cn2><td class=Cn>10</td><td class=Cp>Se requiere ventilación y extracción forzada?, ¿Equipos disponibles?</td></tr>
				<tr class=Cn1><td class=Cn>11</td><td class=Cp>Se tiene ingreso y salida libres?</td></tr>
				<tr class=Cn2><td class=Cn>12</td><td class=Cp>Se han definido los tiempos de trabajo y relevos en el EC?</td></tr>
				<tr class=Cn4><td class=Cn>13</td><td class=Cp>Se tiene en cuenta la posibilidad de cambios en la atmósfera del Espacio Confinado? Ver requerimientos para soldadura en el respaldo de esta hoja</td></tr>
				<tr class=Cn1><td class=Cn>14</td><td class=Cp>Se tienen precauciones para el estrés térmico?</td></tr>
				<tr class=Cn3><td class=Cn>15</td><td class=Cp>Están los desagües y áreas cercanas limpias y libres de sustancias combustibles, inflamables, tóxicos?</td></tr>
				<tr class=Cn1><td class=Cn>16</td><td class=Cp>Se demarcó y señalizó el área bajo control?</td></tr>
				<tr class=Cn2><td class=Cn>17</td><td class=Cp>Está disponible y listo el Equipo de Primeros Auxilios?</td></tr>
				<tr class=Cn1><td class=Cn>18</td><td class=Cp>Está disponible y listo el Equipo Contra Incendio?</td></tr>
				<tr class=Cn2><td class=Cn>19</td><td class=Cp>Se han suspendido tareas vecinas que puedan afectar el trabajo?</td></tr>
				<tr class=Cn2><td class=Cn>20</td><td class=Cp>Se tienen precauciones para exposición al plomo?</td></tr>
				<tr class=Cn3><td class=Cn>21</td><td class=Cp>El procedimiento de rescate y plan de emergencias específico para la tarea está disponible y ha sido probado?</td></tr>
				<tr class=Cn2><td class=Cn>22</td><td class=Cp>Hay un medio de comunicación permanente con el exterior?</td></tr>
				<tr class=Cn3><td class=Cn>23</td><td class=Cp>Todo el personal que va a ingresar al espacio confinado realizó el autoreporte de condiciones de salud?</td></tr>
				<tr height=70><td colspan=2 style="background-color:rgba(0,0,0,0.20); color:rgba(0,0,0,1); font-size:27px"><b>Elementos de Protección</b><br>(Ver matriz de EPPs vigente)</td></tr>
				<tr class=Cn2><td class=Cn>24</td><td class=Cp>Respirador autónomo (Suministro aire grado D, SCBA, 5 min, etc)</td></tr>
				<tr class=Cn2><td class=Cn>25</td><td class=Cp>Protección respiratoria (con cartucho o filtro purificador de aire)</td></tr>
				<tr class=Cn1><td class=Cn>26</td><td class=Cp>Protección auditiva</td></tr>
				<tr class=Cn1><td class=Cn>27</td><td class=Cp>Protección facial</td></tr>
				<tr class=Cn1><td class=Cn>28</td><td class=Cp>Gafas de seguridad</td></tr>
				<tr class=Cn1><td class=Cn>29</td><td class=Cp>Zapatos de seguridad tipo:</td></tr>
				<tr class=Cn1><td class=Cn>30</td><td class=Cp>Guantes tipo:</td></tr>
				<tr class=Cn1><td class=Cn>31</td><td class=Cp>Arnés de seguridad, eslingas, línea de vida</td></tr>
				<tr class=Cn1><td class=Cn>32</td><td class=Cp>Equipo de salvamento</td></tr>
				<tr class=Cn1><td class=Cn>33</td><td class=Cp>Ropa tipo:</td></tr>
				<tr class=Cn1><td class=Cn>34</td><td class=Cp>Otro:</td></tr>
			</table>
		</div>
		</div>
<!-- 13 -->	<div style="position:absolute; width:100vw; top:5030px; left:0px">		<!-- este div sube el formato de aqui hacia abajo -->
			<table border=0>
				<tr><td width=1%></td><td width=98%></td><td width=1%></td></tr>
				<tr height=35><td></td><td class=C>Consulte la guía de medición de gases al reverso, la medición debe ser continua y se debe registrar mínimo cada hora en el anexo 1.</td><td></td></tr>
				<tr height=55><td></td><td style="text-align:left; vertical-align:bottom" class=B>OBSERVACIONES</td><td></td></tr>
				<tr><td></td><td class=A><textarea name=observaciones maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td><td></td></tr>
				<tr height=55><td></td><td style="text-align:left; vertical-align:bottom" class=B>HERRAMIENTAS y/o EQUIPOS A UTILIZAR EN LA ACTIVIDAD</td><td></td></tr>
				<tr><td></td><td class=A><textarea name=herramientas maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td><td></td></tr>
			</table>
			<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;D. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo que los requisitos indicados en la sección C se cumplen y que hay seguridad para ingresar al espacio confinado y para realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=ejecutorD					maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccD			inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaD		type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=ejecutor_horaD		type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=supervisorD				maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccD		inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaD	type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=supervisor_horaD	type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=vigiaD						maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=vigia_ccD					inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=vigia_fechaD			type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=vigia_horaD				type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>VIGIA</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;E. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Certifico que los aislamientos y desacoples se han efectuado apropiadamente y que el área es segura para el ingreso.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Por lo tanto, autorizo el ingreso al Espacio Confinado y la realización del trabajo indicado en la Sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Este permiso perderá validez cuando: El trabajo pierde la continuidad (días) o cuando ingresa una persona diferente a las autorizadas.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=emisorE						maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccE				inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaE			type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=emisor_horaE			type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;F. CANCELACIÓN</b></td></tr>
			<tr><td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td><td class=B>Cuando se diligencia esta sección el permiso NO puede ser revalidado.</td></tr>
			<tr><td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td><td class=B>Certifico que el trabajo que motivó el ingreso al espacio confinado:</td></tr>
		</table>
		<table border=0>
			<tr height=10px><td style=width:5%></td><td style=width:4%></td><td style=width:23%></td><td style=width:4%></td><td style=width:23%></td><td style=width:4%></td><td style=width:32%></td><td style=width:5%></td></tr>
			<tr>
				<td></td>
				<td><input name=certificadoF id=A type=radio value=A onclick=gestionarClickRadio(this) required></td><td class=B> &nbsp;Se ha<br> &nbsp;completado</td>
				<td><input name=certificadoF id=B type=radio value=B onclick=gestionarClickRadio(this)></td><td class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
				<td><input name=certificadoF id=C type=radio value=C onclick=gestionarClickRadio(this)></td><td class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
				<td></td>
			</tr>
			<tr height=10px><td></td></tr>
			<tr><td></td><td colspan=7 class=B>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.</td></tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=ejecutorF					maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccF			inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaF		type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=ejecutor_horaF		type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=supervisorF				maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccF		inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaF	type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=supervisor_horaF	type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
				<td></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=emisorF						maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccF				inputmode=numeric maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaF			type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' style=display:none></td>
				<td><input name=emisor_horaF			type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>
		<table>
			<tr height=10><td></td></tr>
				<tr style="background-color:rgba(0,240,0,0); height:15%">
					<td>
						<select name=usuario id=usuario style=width:67% required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++) { ?>
								<option value="<?=$usuario[$i]?>"><?=$usuario[$i]?></option>
							<? } ?>
						</select>
					</td>
				</tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->

		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style="display:none; width:3.10cm" id="fecha" name="fecha" value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
		<!--<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br>-->
		<table border=0px>
			<tr height=100>
				<td><input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
				<td><a href="javascript:closed()"><img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto; width:100px; height:auto"></a></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
					<img src="../../../../../common/imagenes/piedepagina_horizontal.svg" style="pointer-events:auto; width:100%; height:auto">
					</a>
				</td>
			</tr>
		</table>
		<hr>
<!-- /9 -->		</div>
<!-- /13 -->	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 -->		</div>

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

<!-- *****************************************			Control Tabla Personas Autorizadas		 ***************************************** -->
		<script>
			var
				 c = document.getElementById("cantidad");
				 n = document.getElementById("nombre");
			 dkf = document.getElementById("dkf");
				n1 = document.getElementById("nombre1");
				n2 = document.getElementById("nombre2");
				n3 = document.getElementById("nombre3");
				n4 = document.getElementById("nombre4");
				n5 = document.getElementById("nombre5");
				c1 = document.getElementById("cedula1");
				c2 = document.getElementById("cedula2");
				c3 = document.getElementById("cedula3");
				c4 = document.getElementById("cedula4");
				c5 = document.getElementById("cedula5");
				k1 = document.getElementById("cargo1");
				k2 = document.getElementById("cargo2");
				k3 = document.getElementById("cargo3");
				k4 = document.getElementById("cargo4");
				k5 = document.getElementById("cargo5");
			document.getElementById("cantidad").addEventListener("blur", function(e) {
				if (c.value <= 1) {c.value = 1;
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false;  n1.style.display = "block"; n1.required = true;
				 n2.disabled = true;   n2.style.display = "none";
				 n3.disabled = true;   n3.style.display = "none";
				 n4.disabled = true;   n4.style.display = "none";
				 n5.disabled = true;   n5.style.display = "none";
				 c1.disabled = false;  c1.style.display = "block"; c1.required = true;
				 c2.disabled = true;   c2.style.display = "none";
				 c3.disabled = true;   c3.style.display = "none";
				 c4.disabled = true;   c4.style.display = "none";
				 c5.disabled = true;   c5.style.display = "none";
				 k1.disabled = false;  k1.style.display = "block"; k1.required = true;
				 k2.disabled = true;   k2.style.display = "none";
				 k3.disabled = true;   k3.style.display = "none";
				 k4.disabled = true;   k4.style.display = "none";
				 k5.disabled = true;   k5.style.display = "none";};
				if (c.value == 2) {
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false;  n1.style.display = "block"; n1.required = true;
				 n2.disabled = false;  n2.style.display = "block"; n2.required = true;
				 n3.disabled = true;   n3.style.display = "none";
				 n4.disabled = true;   n4.style.display = "none";
				 n5.disabled = true;   n5.style.display = "none";
				 c1.disabled = false;  c1.style.display = "block"; c1.required = true;
				 c2.disabled = false;  c2.style.display = "block"; c2.required = true;
				 c3.disabled = true;   c3.style.display = "none";
				 c4.disabled = true;   c4.style.display = "none";
				 c5.disabled = true;   c5.style.display = "none";
				 k1.disabled = false;  k1.style.display = "block"; k1.required = true;
				 k2.disabled = false;  k2.style.display = "block"; k2.required = true;
				 k3.disabled = true;   k3.style.display = "none";
				 k4.disabled = true;   k4.style.display = "none";
				 k5.disabled = true;   k5.style.display = "none";};
				if (c.value == 3) {
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false;  n1.style.display = "block"; n1.required = true;
				 n2.disabled = false;  n2.style.display = "block"; n2.required = true;
				 n3.disabled = false;  n3.style.display = "block"; n3.required = true;
				 n4.disabled = true;   n4.style.display = "none";
				 n5.disabled = true;   n5.style.display = "none";
				 c1.disabled = false;  c1.style.display = "block"; c1.required = true;
				 c2.disabled = false;  c2.style.display = "block"; c2.required = true;
				 c3.disabled = false;  c3.style.display = "block"; c3.required = true;
				 c4.disabled = true;   c4.style.display = "none";
				 c5.disabled = true;   c5.style.display = "none";
				 k1.disabled = false;  k1.style.display = "block"; k1.required = true;
				 k2.disabled = false;  k2.style.display = "block"; k2.required = true;
				 k3.disabled = false;  k3.style.display = "block"; k3.required = true;
				 k4.disabled = true;   k4.style.display = "none";
				 k5.disabled = true;   k5.style.display = "none";};
				if (c.value == 4) {
					n.disabled = false;	  n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false;  n1.style.display = "block"; n1.required = true;
				 n2.disabled = false;  n2.style.display = "block"; n2.required = true;
				 n3.disabled = false;  n3.style.display = "block"; n3.required = true;
				 n4.disabled = false;  n4.style.display = "block"; n4.required = true;
				 n5.disabled = true;   n5.style.display = "none";
				 c1.disabled = false;  c1.style.display = "block"; c1.required = true;
				 c2.disabled = false;  c2.style.display = "block"; c2.required = true;
				 c3.disabled = false;  c3.style.display = "block"; c3.required = true;
				 c4.disabled = false;  c4.style.display = "block"; c4.required = true;
				 c5.disabled = true;   c5.style.display = "none";
				 k1.disabled = false;  k1.style.display = "block"; k1.required = true;
				 k2.disabled = false;  k2.style.display = "block"; k2.required = true;
				 k3.disabled = false;  k3.style.display = "block"; k3.required = true;
				 k4.disabled = false;  k4.style.display = "block"; k4.required = true;
				 k5.disabled = true;   k5.style.display = "none";};
				if (c.value >= 5) {c.value = 5;
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false;  n1.style.display = "block"; n1.required = true;
				 n2.disabled = false;  n2.style.display = "block"; n2.required = true;
				 n3.disabled = false;  n3.style.display = "block"; n3.required = true;
				 n4.disabled = false;  n4.style.display = "block"; n4.required = true;
				 n5.disabled = false;  n5.style.display = "block"; n5.required = true;
				 c1.disabled = false;  c1.style.display = "block"; c1.required = true;
				 c2.disabled = false;  c2.style.display = "block"; c2.required = true;
				 c3.disabled = false;  c3.style.display = "block"; c3.required = true;
				 c4.disabled = false;  c4.style.display = "block"; c4.required = true;
				 c5.disabled = false;  c5.style.display = "block"; c5.required = true;
				 k1.disabled = false;  k1.style.display = "block"; k1.required = true;
				 k2.disabled = false;  k2.style.display = "block"; k2.required = true;
				 k3.disabled = false;  k3.style.display = "block"; k3.required = true;
				 k4.disabled = false;  k4.style.display = "block"; k4.required = true;
				 k5.disabled = false;  k5.style.display = "block"; k5.required = true;};});
		</script>
<!-- *****************************************			FIN Control Tabla Personas Autorizadas		 ***************************************** -->
	</form>
<!-- /1 --></div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
