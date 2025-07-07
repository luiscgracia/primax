<!DOCTYPE html>
<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<title>Diligenciar Consecutivo</title>
<style>
	#dias::-webkit-calendar-picker-indicator {display:none}
	#dias {width:6.5mm; height:2mm; font-size:8px; text-align:center}
	input {height:2.0mm; font-size:8px}
	input[type="radio"]:before						{content:''; display:block; width:100%; height:100%; border-radius:50%; outline:0mm solid rgba(0,255,0,0); background:rgba(255,112,0,0.33)}
	input[type="radio"]										{width:3.0mm; height:3.0mm; outline:0mm solid rgba(0,0,255,1)}
	input[type="radio"]:hover							{width:3.0mm; height:3.0mm}
	input[type="radio"]:hover:before			{background:rgba(255,112,0,1)}
	input[type="radio"]:checked:before		{background:rgba(255,112,0,1)}
	input[type="checkbox"]:before					{content:''; display:block; width:100%; height:100%; border-radius:0%; outline:1px solid rgba(255,112,0,1); background:rgba(255,112,0,0.33)}
	input[type="checkbox"]								{width:2.5mm; height:2.5mm; outline:0mm solid rgba(0,0,255,1)}
	input[type="checkbox"]:hover					{width:2.5mm; height:2.5mm}
	input[type="checkbox"]:hover:before		{background:rgba(255,112,0,1)}
	input[type="checkbox"]:checked:before	{background:rgba(255,112,0,1)}
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
	function launchFullScreen(element) {
	if(element.requestFullScreen) {element.requestFullScreen()}
		else if(element.mozRequestFullScreen) {element.mozRequestFullScreen()}
			else if(element.webkitRequestFullScreen) {element.webkitRequestFullScreen()}}
	function cancelFullScreen() {
	if(document.cancelFullScreen) {document.cancelFullScreen()}
		else if(document.mozCancelFullScreen) {document.mozCancelFullScreen()}
			else if(document.webkitCancelFullScreen) {document.webkitCancelFullScreen()}}
</script>
<body>
<?
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
	$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
	$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
	$cons = "SELECT MAX(consecutivo) as consecutivo FROM formulario".$formato." LIMIT 1";
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
	include ("consecutivos".$formato.".php");
	include ("../../conectar_db.php");
	include ("../../../../../common/conectar_db_usuarios.php");
	include ("../../../../usuarios.php");
	include ("../../../../../common/datos.php");
?>
<div class="zoom">
<div class="noimprimir">
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->	
<form id="formato" name="formato" method="post" action="grabardatos.php" enctype="application_x-www-form-urlencoded" autocomplete="off">
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:2112px; overflow:hidden; border:0px solid rgba(0,0,0,0.25)">
	<div style="position:absolute; left:43%; top:1mm; z-index:9">
		<button onclick="launchFullScreen(document.documentElement)">
			<img src="../../../../../common/imagenes/pantalla_completa1.png" style="pointer-events:auto" width="25px" height="auto"; title="Pantalla completa">
		</button>
		<button onclick="cancelFullScreen()">
			<img src="../../../../../common/imagenes/esc-key.png" style="pointer-events:auto" width="20px" height="auto"; title="Salir de pantalla completa">
		</button>
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0px; top:	  0px"><img src="<? echo $tiro; ?>"   width="816px" height="auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" width="816px" height="auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<?php
	//se conecta a la base de datos y se verifica el consecutivo inicial (o el siguiente libre)
	$consult = $conexion->query($cons);
	$consulta = $consult->fetch_array(MYSQLI_ASSOC);
	$consec = (empty($consulta['consecutivo']) ? $primerconsecutivo : $consulta['consecutivo']+=1);
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d / H:i");
	$fechaactual = date("Y-m-d");
	$horaactual = date("g:i A");
	$fechamin = date ("Y-m-d", strtotime("-0 days", strtotime(date ("Y-m-d"))));
	$fechamax = date ("Y-m-d", strtotime("+0 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,60000); document.body.innerHTML = '$aviso_pedido';</script>";}
	?>

	<!-- div para subir/bajar formato el formato -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:0.00mm; width:816px; height:2112px; overflow:hidden">

	<!-- se inicia el código para diligenciar el formato -->
	<div style="position:absolute; left:18.15cm; top:0.90cm">
		<input class="consecutivo" style="width:22mm; text-align:left; background-color:rgba(0,0,255,0)" id="consecutivo" name="consecutivo" type="text"
		value="<?
		if ($consec <= 9) {echo "&#8470; 00000";}
			else {if ($consec <= 99) {echo "&#8470; 0000";}
				else {if ($consec <= 999) {echo "&#8470; 000";}
					else {if ($consec <= 9999) {echo "&#8470; 00";}
						else {if ($consec <= 99999) {echo "&#8470; 0";} else {echo "&#8470; ";}}}}}
		echo $consec;
		?>"
		title="A partir del # <? if ($primerconsecutivo <= 9) {echo "000";} else {if ($primerconsecutivo <= 99) {echo "00";} else {if ($primerconsecutivo <= 999) {echo "0";}}}
		echo $primerconsecutivo; ?> hasta el # <? if ($ultimo_consec <= 9) {echo "000";} else {if ($ultimo_consec <= 99) {echo "00";} else {if ($ultimo_consec <= 999) {echo "0";}}}
		echo $ultimo_consec; ?>" readonly>
	</div>

	<div style="position:absolute; left:18.15cm; top: 0.75cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; color:rgba(0,0,0,0.33); background-color:rgba(0,0,0,0); border:0" readonly></div>
	<div style="position:absolute; left:18.20cm; top: 0.85cm"><span style="font-size:7px; color:rgba(0,0,0,0.33); font-family:Arlrdlt"><? echo strtoupper($terminal); ?></span></div>

	<div style="position:absolute; left:14.10cm; top: 1.40cm"><input name="pTEC" id="pTEC" type="text" style="width:1.20cm; text-align:center" maxlength="6" placeholder="####" pattern="^(?:[0-9]{4,6})$" title="Ingresar No. Permiso Trabajo en Espacio Confinado" required autofocus></div>
	<div style="position:absolute; left:11.35cm; top: 1.67cm"><input name="tipo_trabajo" id="tipo_trabajoC" type="radio" value="C" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.55cm; top: 1.67cm"><input name="tipo_trabajo" id="tipo_trabajoF" type="radio" value="F" onclick="gestionarClickRadio(this)"></div>

<!-- *****************************************         DÏA 1         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top: 2.57cm"><input name="dia1_fecha"																  type="date"	style="width:2.20cm" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left: 3.75cm; top: 2.92cm"><input name="dia1_equipo"																  type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 8.95cm; top: 2.92cm"><input name="dia1_marca"																  type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:14.20cm; top: 2.92cm"><input name="dia1_fecha_calib"													  type="date"	style="width:2.20cm" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:17.50cm; top: 2.92cm"><input name="dia1_propietario"													  type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 5.25cm; top: 3.20cm"><input name="dia1_bumptest_por"													  type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:11.10cm; top: 3.20cm"><input name="dia1_LEL"					 id="dia1_LEL"					  type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="##,##" required></div>
	<div style="position:absolute; left:12.40cm; top: 3.20cm"><input name="dia1_O"						 id="dia1_O"						  type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="###" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:14.00cm; top: 3.20cm"><input name="dia1_H2S"					 id="dia1_H2S"					  type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="###" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:15.40cm; top: 3.20cm"><input name="dia1_CO"						 id="dia1_CO"						  type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="###" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:19.05cm; top: 3.10cm"><input name="dia1_pasa_bumptest" id="dia1_pasa_bumptestS" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.90cm; top: 3.10cm"><input name="dia1_pasa_bumptest" id="dia1_pasa_bumptestN" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top: 3.80cm"><input name="dia1_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 3.72cm"><input name="dia1_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 4.03cm"><input name="dia1_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 3.95cm"><input name="dia1_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 4.27cm"><input name="dia1_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 4.19cm"><input name="dia1_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 4.50cm"><input name="dia1_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 4.42cm"><input name="dia1_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top: 3.80cm"><input name="dia1_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 3.72cm"><input name="dia1_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 4.03cm"><input name="dia1_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 3.95cm"><input name="dia1_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 4.27cm"><input name="dia1_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 4.19cm"><input name="dia1_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 4.50cm"><input name="dia1_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 4.42cm"><input name="dia1_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top: 3.80cm"><input name="dia1_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 3.72cm"><input name="dia1_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 4.03cm"><input name="dia1_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 3.95cm"><input name="dia1_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 4.27cm"><input name="dia1_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 4.19cm"><input name="dia1_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 4.50cm"><input name="dia1_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 4.42cm"><input name="dia1_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top: 3.80cm"><input name="dia1_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 3.72cm"><input name="dia1_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 4.03cm"><input name="dia1_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 3.95cm"><input name="dia1_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 4.27cm"><input name="dia1_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 4.19cm"><input name="dia1_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 4.50cm"><input name="dia1_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 4.42cm"><input name="dia1_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top: 3.80cm"><input name="dia1_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 3.72cm"><input name="dia1_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 4.03cm"><input name="dia1_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 3.95cm"><input name="dia1_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 4.27cm"><input name="dia1_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 4.19cm"><input name="dia1_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 4.50cm"><input name="dia1_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 4.42cm"><input name="dia1_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top: 3.80cm"><input name="dia1_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 3.72cm"><input name="dia1_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 4.03cm"><input name="dia1_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 3.95cm"><input name="dia1_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 4.27cm"><input name="dia1_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 4.19cm"><input name="dia1_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 4.50cm"><input name="dia1_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 4.42cm"><input name="dia1_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top: 3.80cm"><input name="dia1_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 3.72cm"><input name="dia1_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 4.03cm"><input name="dia1_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 3.95cm"><input name="dia1_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 4.27cm"><input name="dia1_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 4.19cm"><input name="dia1_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 4.50cm"><input name="dia1_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 4.42cm"><input name="dia1_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top: 3.80cm"><input name="dia1_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 3.72cm"><input name="dia1_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 4.03cm"><input name="dia1_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 3.95cm"><input name="dia1_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 4.27cm"><input name="dia1_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 4.19cm"><input name="dia1_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 4.50cm"><input name="dia1_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 4.42cm"><input name="dia1_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top: 3.80cm"><input name="dia1_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 3.72cm"><input name="dia1_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 4.03cm"><input name="dia1_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 3.95cm"><input name="dia1_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 4.27cm"><input name="dia1_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 4.19cm"><input name="dia1_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 4.50cm"><input name="dia1_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 4.42cm"><input name="dia1_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top: 3.80cm"><input name="dia1_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 3.72cm"><input name="dia1_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 4.03cm"><input name="dia1_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 3.95cm"><input name="dia1_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 4.27cm"><input name="dia1_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 4.19cm"><input name="dia1_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 4.50cm"><input name="dia1_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 4.42cm"><input name="dia1_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top: 5.34cm"><input name="dia1_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 6.00cm; top: 5.37cm"><input name="dia1_HE1_1" id="dias" type="time" required></div>
	<div style="position:absolute; left: 7.50cm; top: 5.37cm"><input name="dia1_HS1_1" id="dias" type="time" required></div>
	<div style="position:absolute; left: 9.00cm; top: 5.37cm"><input name="dia1_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 5.37cm"><input name="dia1_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 5.37cm"><input name="dia1_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 5.37cm"><input name="dia1_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 5.37cm"><input name="dia1_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 5.37cm"><input name="dia1_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 5.37cm"><input name="dia1_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 5.37cm"><input name="dia1_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top: 5.58cm"><input name="dia1_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 5.61cm"><input name="dia1_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 5.61cm"><input name="dia1_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 5.61cm"><input name="dia1_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 5.61cm"><input name="dia1_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 5.61cm"><input name="dia1_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 5.61cm"><input name="dia1_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 5.61cm"><input name="dia1_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 5.61cm"><input name="dia1_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 5.61cm"><input name="dia1_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 5.61cm"><input name="dia1_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top: 5.82cm"><input name="dia1_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 5.85cm"><input name="dia1_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 5.85cm"><input name="dia1_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 5.85cm"><input name="dia1_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 5.85cm"><input name="dia1_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 5.85cm"><input name="dia1_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 5.85cm"><input name="dia1_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 5.85cm"><input name="dia1_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 5.85cm"><input name="dia1_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 5.85cm"><input name="dia1_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 5.85cm"><input name="dia1_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top: 6.06cm"><input name="dia1_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 6.09cm"><input name="dia1_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 6.09cm"><input name="dia1_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 6.09cm"><input name="dia1_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 6.09cm"><input name="dia1_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 6.09cm"><input name="dia1_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 6.09cm"><input name="dia1_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 6.09cm"><input name="dia1_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 6.09cm"><input name="dia1_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 6.09cm"><input name="dia1_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 6.09cm"><input name="dia1_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top: 6.30cm"><input name="dia1_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 6.33cm"><input name="dia1_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 6.33cm"><input name="dia1_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 6.33cm"><input name="dia1_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 6.33cm"><input name="dia1_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 6.33cm"><input name="dia1_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 6.33cm"><input name="dia1_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 6.33cm"><input name="dia1_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 6.33cm"><input name="dia1_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 6.33cm"><input name="dia1_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 6.33cm"><input name="dia1_HS5_5" id="dias" type="time"></div>

<!-- *****************************************         DÏA 2         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top: 6.75cm"><input name="dia2_fecha"				 id="dia2_fecha"				 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left: 3.75cm; top: 7.09cm"><input name="dia2_equipo"																 type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.95cm; top: 7.09cm"><input name="dia2_marca"																 type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top: 7.09cm"><input name="dia2_fecha_calib"													 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left:17.50cm; top: 7.09cm"><input name="dia2_propietario"													 type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.25cm; top: 7.38cm"><input name="dia2_bumptest_por"													 type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.10cm; top: 7.38cm"><input name="dia2_LEL"					 id="dia2_LEL"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="###,##"></div>
	<div style="position:absolute; left:12.40cm; top: 7.38cm"><input name="dia2_O"						 id="dia2_O"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:14.00cm; top: 7.38cm"><input name="dia2_H2S"					 id="dia2_H2S"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:15.40cm; top: 7.38cm"><input name="dia2_CO"						 id="dia2_CO"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:19.05cm; top: 7.28cm"><input name="dia2_pasa_bumptest" id="dia2_pasa_bumptest" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.90cm; top: 7.28cm"><input name="dia2_pasa_bumptest" id="dia2_pasa_bumptest" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top: 7.98cm"><input name="dia2_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 7.90cm"><input name="dia2_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 8.21cm"><input name="dia2_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 8.13cm"><input name="dia2_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 8.45cm"><input name="dia2_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 8.37cm"><input name="dia2_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top: 8.68cm"><input name="dia2_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top: 8.60cm"><input name="dia2_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top: 7.98cm"><input name="dia2_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 7.90cm"><input name="dia2_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 8.21cm"><input name="dia2_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 8.13cm"><input name="dia2_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 8.45cm"><input name="dia2_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 8.37cm"><input name="dia2_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top: 8.68cm"><input name="dia2_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top: 8.60cm"><input name="dia2_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top: 7.98cm"><input name="dia2_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 7.90cm"><input name="dia2_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 8.21cm"><input name="dia2_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 8.13cm"><input name="dia2_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 8.45cm"><input name="dia2_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 8.37cm"><input name="dia2_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top: 8.68cm"><input name="dia2_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top: 8.60cm"><input name="dia2_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top: 7.98cm"><input name="dia2_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 7.90cm"><input name="dia2_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 8.21cm"><input name="dia2_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 8.13cm"><input name="dia2_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 8.45cm"><input name="dia2_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 8.37cm"><input name="dia2_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top: 8.68cm"><input name="dia2_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top: 8.60cm"><input name="dia2_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top: 7.98cm"><input name="dia2_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 7.90cm"><input name="dia2_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 8.21cm"><input name="dia2_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 8.13cm"><input name="dia2_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 8.45cm"><input name="dia2_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 8.37cm"><input name="dia2_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top: 8.68cm"><input name="dia2_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top: 8.60cm"><input name="dia2_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top: 7.98cm"><input name="dia2_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 7.90cm"><input name="dia2_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 8.21cm"><input name="dia2_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 8.13cm"><input name="dia2_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 8.45cm"><input name="dia2_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 8.37cm"><input name="dia2_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top: 8.68cm"><input name="dia2_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top: 8.60cm"><input name="dia2_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top: 7.98cm"><input name="dia2_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 7.90cm"><input name="dia2_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 8.21cm"><input name="dia2_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 8.13cm"><input name="dia2_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 8.45cm"><input name="dia2_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 8.37cm"><input name="dia2_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top: 8.68cm"><input name="dia2_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top: 8.60cm"><input name="dia2_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top: 7.98cm"><input name="dia2_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 7.90cm"><input name="dia2_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 8.21cm"><input name="dia2_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 8.13cm"><input name="dia2_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 8.45cm"><input name="dia2_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 8.37cm"><input name="dia2_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top: 8.68cm"><input name="dia2_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top: 8.60cm"><input name="dia2_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top: 7.98cm"><input name="dia2_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 7.90cm"><input name="dia2_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 8.21cm"><input name="dia2_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 8.13cm"><input name="dia2_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 8.45cm"><input name="dia2_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 8.37cm"><input name="dia2_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top: 8.68cm"><input name="dia2_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top: 8.60cm"><input name="dia2_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top: 7.98cm"><input name="dia2_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 7.90cm"><input name="dia2_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 8.21cm"><input name="dia2_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 8.13cm"><input name="dia2_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 8.45cm"><input name="dia2_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 8.37cm"><input name="dia2_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top: 8.68cm"><input name="dia2_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top: 8.60cm"><input name="dia2_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top: 9.54cm"><input name="dia2_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 9.57cm"><input name="dia2_HE1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 9.57cm"><input name="dia2_HS1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 9.57cm"><input name="dia2_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 9.57cm"><input name="dia2_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 9.57cm"><input name="dia2_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 9.57cm"><input name="dia2_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 9.57cm"><input name="dia2_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 9.57cm"><input name="dia2_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 9.57cm"><input name="dia2_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 9.57cm"><input name="dia2_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top: 9.78cm"><input name="dia2_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top: 9.81cm"><input name="dia2_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top: 9.81cm"><input name="dia2_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top: 9.81cm"><input name="dia2_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top: 9.81cm"><input name="dia2_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top: 9.81cm"><input name="dia2_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top: 9.81cm"><input name="dia2_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top: 9.81cm"><input name="dia2_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top: 9.81cm"><input name="dia2_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top: 9.81cm"><input name="dia2_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top: 9.81cm"><input name="dia2_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:10.02cm"><input name="dia2_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:10.05cm"><input name="dia2_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:10.05cm"><input name="dia2_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:10.05cm"><input name="dia2_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:10.05cm"><input name="dia2_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:10.05cm"><input name="dia2_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:10.05cm"><input name="dia2_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:10.05cm"><input name="dia2_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:10.05cm"><input name="dia2_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:10.05cm"><input name="dia2_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:10.05cm"><input name="dia2_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:10.26cm"><input name="dia2_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:10.29cm"><input name="dia2_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:10.29cm"><input name="dia2_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:10.29cm"><input name="dia2_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:10.29cm"><input name="dia2_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:10.29cm"><input name="dia2_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:10.29cm"><input name="dia2_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:10.29cm"><input name="dia2_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:10.29cm"><input name="dia2_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:10.29cm"><input name="dia2_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:10.29cm"><input name="dia2_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:10.51cm"><input name="dia2_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:10.54cm"><input name="dia2_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:10.54cm"><input name="dia2_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:10.54cm"><input name="dia2_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:10.54cm"><input name="dia2_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:10.54cm"><input name="dia2_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:10.54cm"><input name="dia2_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:10.54cm"><input name="dia2_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:10.54cm"><input name="dia2_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:10.54cm"><input name="dia2_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:10.54cm"><input name="dia2_HS5_5" id="dias" type="time"></div>

<!-- *****************************************         DÏA 3         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:10.92cm"><input name="dia3_fecha"																 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left: 3.75cm; top:11.30cm"><input name="dia3_equipo"																 type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.95cm; top:11.30cm"><input name="dia3_marca"																 type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:11.30cm"><input name="dia3_fecha_calib"													 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left:17.50cm; top:11.30cm"><input name="dia3_propietario"													 type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.25cm; top:11.55cm"><input name="dia3_bumptest_por"													 type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.10cm; top:11.55cm"><input name="dia3_LEL"					 id="dia3_LEL"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="###,##"></div>
	<div style="position:absolute; left:12.40cm; top:11.55cm"><input name="dia3_O"						 id="dia3_O"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:14.00cm; top:11.55cm"><input name="dia3_H2S"					 id="dia3_H2S"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:15.40cm; top:11.55cm"><input name="dia3_CO"						 id="dia3_CO"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:19.05cm; top:11.45cm"><input name="dia3_pasa_bumptest" id="dia3_pasa_bumptest" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.90cm; top:11.45cm"><input name="dia3_pasa_bumptest" id="dia3_pasa_bumptest" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top:12.16cm"><input name="dia3_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:12.08cm"><input name="dia3_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:12.39cm"><input name="dia3_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:12.31cm"><input name="dia3_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:12.63cm"><input name="dia3_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:12.55cm"><input name="dia3_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:12.86cm"><input name="dia3_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:12.78cm"><input name="dia3_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top:12.16cm"><input name="dia3_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:12.08cm"><input name="dia3_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:12.39cm"><input name="dia3_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:12.31cm"><input name="dia3_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:12.63cm"><input name="dia3_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:12.55cm"><input name="dia3_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:12.86cm"><input name="dia3_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:12.78cm"><input name="dia3_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top:12.16cm"><input name="dia3_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:12.08cm"><input name="dia3_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:12.39cm"><input name="dia3_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:12.31cm"><input name="dia3_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:12.63cm"><input name="dia3_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:12.55cm"><input name="dia3_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:12.86cm"><input name="dia3_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:12.78cm"><input name="dia3_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top:12.16cm"><input name="dia3_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:12.08cm"><input name="dia3_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:12.39cm"><input name="dia3_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:12.31cm"><input name="dia3_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:12.63cm"><input name="dia3_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:12.55cm"><input name="dia3_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:12.86cm"><input name="dia3_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:12.78cm"><input name="dia3_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top:12.16cm"><input name="dia3_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:12.08cm"><input name="dia3_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:12.39cm"><input name="dia3_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:12.31cm"><input name="dia3_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:12.63cm"><input name="dia3_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:12.55cm"><input name="dia3_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:12.86cm"><input name="dia3_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:12.78cm"><input name="dia3_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top:12.16cm"><input name="dia3_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:12.08cm"><input name="dia3_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:12.39cm"><input name="dia3_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:12.31cm"><input name="dia3_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:12.63cm"><input name="dia3_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:12.55cm"><input name="dia3_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:12.86cm"><input name="dia3_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:12.78cm"><input name="dia3_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top:12.16cm"><input name="dia3_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:12.08cm"><input name="dia3_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:12.39cm"><input name="dia3_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:12.31cm"><input name="dia3_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:12.63cm"><input name="dia3_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:12.55cm"><input name="dia3_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:12.86cm"><input name="dia3_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:12.78cm"><input name="dia3_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top:12.16cm"><input name="dia3_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:12.08cm"><input name="dia3_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:12.39cm"><input name="dia3_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:12.31cm"><input name="dia3_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:12.63cm"><input name="dia3_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:12.55cm"><input name="dia3_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:12.86cm"><input name="dia3_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:12.78cm"><input name="dia3_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top:12.16cm"><input name="dia3_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:12.08cm"><input name="dia3_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:12.39cm"><input name="dia3_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:12.31cm"><input name="dia3_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:12.63cm"><input name="dia3_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:12.55cm"><input name="dia3_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:12.86cm"><input name="dia3_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:12.78cm"><input name="dia3_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top:12.16cm"><input name="dia3_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:12.08cm"><input name="dia3_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:12.39cm"><input name="dia3_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:12.31cm"><input name="dia3_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:12.63cm"><input name="dia3_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:12.55cm"><input name="dia3_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:12.86cm"><input name="dia3_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:12.78cm"><input name="dia3_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top:13.71cm"><input name="dia3_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:13.74cm"><input name="dia3_HE1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:13.74cm"><input name="dia3_HS1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:13.74cm"><input name="dia3_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:13.74cm"><input name="dia3_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:13.74cm"><input name="dia3_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:13.74cm"><input name="dia3_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:13.74cm"><input name="dia3_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:13.74cm"><input name="dia3_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:13.74cm"><input name="dia3_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:13.74cm"><input name="dia3_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:13.95cm"><input name="dia3_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:13.98cm"><input name="dia3_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:13.98cm"><input name="dia3_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:13.98cm"><input name="dia3_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:13.98cm"><input name="dia3_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:13.98cm"><input name="dia3_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:13.98cm"><input name="dia3_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:13.98cm"><input name="dia3_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:13.98cm"><input name="dia3_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:13.98cm"><input name="dia3_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:13.98cm"><input name="dia3_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:14.19cm"><input name="dia3_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:14.22cm"><input name="dia3_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:14.22cm"><input name="dia3_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:14.22cm"><input name="dia3_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:14.22cm"><input name="dia3_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:14.22cm"><input name="dia3_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:14.22cm"><input name="dia3_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:14.22cm"><input name="dia3_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:14.22cm"><input name="dia3_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:14.22cm"><input name="dia3_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:14.22cm"><input name="dia3_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:14.43cm"><input name="dia3_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:14.46cm"><input name="dia3_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:14.46cm"><input name="dia3_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:14.46cm"><input name="dia3_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:14.46cm"><input name="dia3_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:14.46cm"><input name="dia3_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:14.46cm"><input name="dia3_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:14.46cm"><input name="dia3_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:14.46cm"><input name="dia3_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:14.46cm"><input name="dia3_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:14.46cm"><input name="dia3_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:14.67cm"><input name="dia3_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:14.70cm"><input name="dia3_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:14.70cm"><input name="dia3_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:14.70cm"><input name="dia3_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:14.70cm"><input name="dia3_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:14.70cm"><input name="dia3_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:14.70cm"><input name="dia3_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:14.70cm"><input name="dia3_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:14.70cm"><input name="dia3_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:14.70cm"><input name="dia3_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:14.70cm"><input name="dia3_HS5_5" id="dias" type="time"></div>

<!-- *****************************************     12.45    DÏA 4         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:15.10cm"><input name="dia4_fecha"																 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left: 3.75cm; top:15.48cm"><input name="dia4_equipo"																 type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.95cm; top:15.48cm"><input name="dia4_marca"																 type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:15.48cm"><input name="dia4_fecha_calib"													 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left:17.50cm; top:15.48cm"><input name="dia4_propietario"													 type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.25cm; top:15.75cm"><input name="dia4_bumptest_por"													 type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.10cm; top:15.75cm"><input name="dia4_LEL"					 id="dia4_LEL"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="###,##"></div>
	<div style="position:absolute; left:12.40cm; top:15.75cm"><input name="dia4_O"						 id="dia4_O"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:14.00cm; top:15.75cm"><input name="dia4_H2S"					 id="dia4_H2S"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:15.40cm; top:15.75cm"><input name="dia4_CO"						 id="dia4_CO"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:19.05cm; top:15.62cm"><input name="dia4_pasa_bumptest" id="dia4_pasa_bumptest" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.90cm; top:15.62cm"><input name="dia4_pasa_bumptest" id="dia4_pasa_bumptest" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top:16.34cm"><input name="dia4_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:16.26cm"><input name="dia4_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:16.57cm"><input name="dia4_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:16.49cm"><input name="dia4_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:16.81cm"><input name="dia4_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:16.73cm"><input name="dia4_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:17.04cm"><input name="dia4_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:16.96cm"><input name="dia4_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top:16.34cm"><input name="dia4_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:16.26cm"><input name="dia4_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:16.57cm"><input name="dia4_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:16.49cm"><input name="dia4_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:16.81cm"><input name="dia4_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:16.73cm"><input name="dia4_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:17.04cm"><input name="dia4_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:16.96cm"><input name="dia4_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top:16.34cm"><input name="dia4_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:16.26cm"><input name="dia4_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:16.57cm"><input name="dia4_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:16.49cm"><input name="dia4_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:16.81cm"><input name="dia4_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:16.73cm"><input name="dia4_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:17.04cm"><input name="dia4_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:16.96cm"><input name="dia4_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top:16.34cm"><input name="dia4_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:16.26cm"><input name="dia4_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:16.57cm"><input name="dia4_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:16.49cm"><input name="dia4_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:16.81cm"><input name="dia4_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:16.73cm"><input name="dia4_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:17.04cm"><input name="dia4_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:16.96cm"><input name="dia4_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top:16.34cm"><input name="dia4_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:16.26cm"><input name="dia4_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:16.57cm"><input name="dia4_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:16.49cm"><input name="dia4_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:16.81cm"><input name="dia4_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:16.73cm"><input name="dia4_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:17.04cm"><input name="dia4_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:16.96cm"><input name="dia4_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top:16.34cm"><input name="dia4_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:16.26cm"><input name="dia4_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:16.57cm"><input name="dia4_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:16.49cm"><input name="dia4_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:16.81cm"><input name="dia4_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:16.73cm"><input name="dia4_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:17.04cm"><input name="dia4_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:16.96cm"><input name="dia4_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top:16.34cm"><input name="dia4_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:16.26cm"><input name="dia4_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:16.57cm"><input name="dia4_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:16.49cm"><input name="dia4_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:16.81cm"><input name="dia4_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:16.73cm"><input name="dia4_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:17.04cm"><input name="dia4_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:16.96cm"><input name="dia4_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top:16.34cm"><input name="dia4_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:16.26cm"><input name="dia4_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:16.57cm"><input name="dia4_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:16.49cm"><input name="dia4_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:16.81cm"><input name="dia4_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:16.73cm"><input name="dia4_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:17.04cm"><input name="dia4_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:16.96cm"><input name="dia4_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top:16.34cm"><input name="dia4_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:16.26cm"><input name="dia4_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:16.57cm"><input name="dia4_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:16.49cm"><input name="dia4_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:16.81cm"><input name="dia4_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:16.73cm"><input name="dia4_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:17.04cm"><input name="dia4_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:16.96cm"><input name="dia4_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top:16.34cm"><input name="dia4_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:16.26cm"><input name="dia4_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:16.57cm"><input name="dia4_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:16.49cm"><input name="dia4_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:16.81cm"><input name="dia4_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:16.73cm"><input name="dia4_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:17.04cm"><input name="dia4_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:16.96cm"><input name="dia4_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top:17.91cm"><input name="dia4_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:17.94cm"><input name="dia4_HE1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:17.94cm"><input name="dia4_HS1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:17.94cm"><input name="dia4_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:17.94cm"><input name="dia4_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:17.94cm"><input name="dia4_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:17.94cm"><input name="dia4_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:17.94cm"><input name="dia4_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:17.94cm"><input name="dia4_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:17.94cm"><input name="dia4_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:17.94cm"><input name="dia4_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:18.15cm"><input name="dia4_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:18.18cm"><input name="dia4_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:18.18cm"><input name="dia4_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:18.18cm"><input name="dia4_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:18.18cm"><input name="dia4_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:18.18cm"><input name="dia4_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:18.18cm"><input name="dia4_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:18.18cm"><input name="dia4_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:18.18cm"><input name="dia4_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:18.18cm"><input name="dia4_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:18.18cm"><input name="dia4_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:18.39cm"><input name="dia4_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:18.42cm"><input name="dia4_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:18.42cm"><input name="dia4_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:18.42cm"><input name="dia4_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:18.42cm"><input name="dia4_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:18.42cm"><input name="dia4_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:18.42cm"><input name="dia4_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:18.42cm"><input name="dia4_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:18.42cm"><input name="dia4_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:18.42cm"><input name="dia4_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:18.42cm"><input name="dia4_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:18.63cm"><input name="dia4_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:18.66cm"><input name="dia4_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:18.66cm"><input name="dia4_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:18.66cm"><input name="dia4_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:18.66cm"><input name="dia4_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:18.66cm"><input name="dia4_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:18.66cm"><input name="dia4_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:18.66cm"><input name="dia4_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:18.66cm"><input name="dia4_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:18.66cm"><input name="dia4_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:18.66cm"><input name="dia4_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:18.87cm"><input name="dia4_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:18.90cm"><input name="dia4_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:18.90cm"><input name="dia4_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:18.90cm"><input name="dia4_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:18.90cm"><input name="dia4_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:18.90cm"><input name="dia4_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:18.90cm"><input name="dia4_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:18.90cm"><input name="dia4_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:18.90cm"><input name="dia4_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:18.90cm"><input name="dia4_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:18.90cm"><input name="dia4_HS5_5" id="dias" type="time"></div>

<!-- *****************************************         DÏA 5         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:19.30cm"><input name="dia5_fecha"																 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left: 3.75cm; top:19.65cm"><input name="dia5_equipo"																 type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.95cm; top:19.65cm"><input name="dia5_marca"																 type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:19.65cm"><input name="dia5_fecha_calib"													 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left:17.50cm; top:19.65cm"><input name="dia5_propietario"													 type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.25cm; top:19.90cm"><input name="dia5_bumptest_por"													 type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.10cm; top:19.90cm"><input name="dia5_LEL"					 id="dia5_LEL"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="###,##"></div>
	<div style="position:absolute; left:12.40cm; top:19.90cm"><input name="dia5_O"						 id="dia5_O"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:14.00cm; top:19.90cm"><input name="dia5_H2S"					 id="dia5_H2S"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:15.40cm; top:19.90cm"><input name="dia5_CO"						 id="dia5_CO"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:19.05cm; top:19.80cm"><input name="dia5_pasa_bumptest" id="dia5_pasa_bumptest" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.90cm; top:19.80cm"><input name="dia5_pasa_bumptest" id="dia5_pasa_bumptest" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top:20.52cm"><input name="dia5_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:20.44cm"><input name="dia5_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:20.75cm"><input name="dia5_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:20.67cm"><input name="dia5_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:20.99cm"><input name="dia5_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:20.91cm"><input name="dia5_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:21.22cm"><input name="dia5_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:21.14cm"><input name="dia5_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top:20.52cm"><input name="dia5_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:20.44cm"><input name="dia5_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:20.75cm"><input name="dia5_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:20.67cm"><input name="dia5_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:20.99cm"><input name="dia5_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:20.91cm"><input name="dia5_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:21.22cm"><input name="dia5_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:21.14cm"><input name="dia5_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top:20.52cm"><input name="dia5_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:20.44cm"><input name="dia5_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:20.75cm"><input name="dia5_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:20.67cm"><input name="dia5_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:20.99cm"><input name="dia5_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:20.91cm"><input name="dia5_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:21.22cm"><input name="dia5_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:21.14cm"><input name="dia5_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top:20.52cm"><input name="dia5_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:20.44cm"><input name="dia5_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:20.75cm"><input name="dia5_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:20.67cm"><input name="dia5_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:20.99cm"><input name="dia5_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:20.91cm"><input name="dia5_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:21.22cm"><input name="dia5_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:21.14cm"><input name="dia5_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top:20.52cm"><input name="dia5_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:20.44cm"><input name="dia5_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:20.75cm"><input name="dia5_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:20.67cm"><input name="dia5_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:20.99cm"><input name="dia5_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:20.91cm"><input name="dia5_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:21.22cm"><input name="dia5_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:21.14cm"><input name="dia5_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top:20.52cm"><input name="dia5_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:20.44cm"><input name="dia5_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:20.75cm"><input name="dia5_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:20.67cm"><input name="dia5_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:20.99cm"><input name="dia5_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:20.91cm"><input name="dia5_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:21.22cm"><input name="dia5_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:21.14cm"><input name="dia5_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top:20.52cm"><input name="dia5_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:20.44cm"><input name="dia5_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:20.75cm"><input name="dia5_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:20.67cm"><input name="dia5_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:20.99cm"><input name="dia5_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:20.91cm"><input name="dia5_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:21.22cm"><input name="dia5_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:21.14cm"><input name="dia5_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top:20.52cm"><input name="dia5_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:20.44cm"><input name="dia5_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:20.75cm"><input name="dia5_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:20.67cm"><input name="dia5_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:20.99cm"><input name="dia5_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:20.91cm"><input name="dia5_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:21.22cm"><input name="dia5_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:21.14cm"><input name="dia5_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top:20.52cm"><input name="dia5_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:20.44cm"><input name="dia5_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:20.75cm"><input name="dia5_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:20.67cm"><input name="dia5_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:20.99cm"><input name="dia5_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:20.91cm"><input name="dia5_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:21.22cm"><input name="dia5_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:21.14cm"><input name="dia5_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top:20.52cm"><input name="dia5_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:20.44cm"><input name="dia5_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:20.75cm"><input name="dia5_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:20.67cm"><input name="dia5_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:20.99cm"><input name="dia5_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:20.91cm"><input name="dia5_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:21.22cm"><input name="dia5_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:21.14cm"><input name="dia5_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top:22.09cm"><input name="dia5_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:22.12cm"><input name="dia5_HE1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:22.12cm"><input name="dia5_HS1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:22.12cm"><input name="dia5_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:22.12cm"><input name="dia5_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:22.12cm"><input name="dia5_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:22.12cm"><input name="dia5_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:22.12cm"><input name="dia5_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:22.12cm"><input name="dia5_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:22.12cm"><input name="dia5_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:22.12cm"><input name="dia5_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:22.33cm"><input name="dia5_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:22.36cm"><input name="dia5_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:22.36cm"><input name="dia5_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:22.36cm"><input name="dia5_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:22.36cm"><input name="dia5_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:22.36cm"><input name="dia5_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:22.36cm"><input name="dia5_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:22.36cm"><input name="dia5_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:22.38cm"><input name="dia5_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:22.36cm"><input name="dia5_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:22.36cm"><input name="dia5_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:22.57cm"><input name="dia5_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:22.60cm"><input name="dia5_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:22.60cm"><input name="dia5_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:22.60cm"><input name="dia5_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:22.60cm"><input name="dia5_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:22.60cm"><input name="dia5_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:22.60cm"><input name="dia5_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:22.60cm"><input name="dia5_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:22.60cm"><input name="dia5_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:22.60cm"><input name="dia5_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:22.60cm"><input name="dia5_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:22.81cm"><input name="dia5_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:22.84cm"><input name="dia5_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:22.84cm"><input name="dia5_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:22.84cm"><input name="dia5_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:22.84cm"><input name="dia5_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:22.84cm"><input name="dia5_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:22.84cm"><input name="dia5_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:22.84cm"><input name="dia5_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:22.84cm"><input name="dia5_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:22.84cm"><input name="dia5_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:22.84cm"><input name="dia5_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:23.05cm"><input name="dia5_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:23.08cm"><input name="dia5_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:23.08cm"><input name="dia5_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:23.08cm"><input name="dia5_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:23.08cm"><input name="dia5_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:23.08cm"><input name="dia5_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:23.08cm"><input name="dia5_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:23.08cm"><input name="dia5_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:23.08cm"><input name="dia5_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:23.08cm"><input name="dia5_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:23.08cm"><input name="dia5_HS5_5" id="dias" type="time"></div>

<!-- *****************************************         DÏA 6         ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:23.47cm"><input name="dia6_fecha"																 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left: 3.75cm; top:23.85cm"><input name="dia6_equipo"																 type="text"	style="width:4.30cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.95cm; top:23.85cm"><input name="dia6_marca"																 type="text"	style="width:3.20cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:23.85cm"><input name="dia6_fecha_calib"													 type="date"	style="width:2.20cm" value=""></div>
	<div style="position:absolute; left:17.50cm; top:23.85cm"><input name="dia6_propietario"													 type="text"	style="width:2.90cm" maxlength="25" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.25cm; top:24.10cm"><input name="dia6_bumptest_por"													 type="text"	style="width:5.00cm" maxlength="40" pattern="^(?:[\w .áéíóúüñ/-]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.10cm; top:24.10cm"><input name="dia6_LEL"					 id="dia6_LEL"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="5" placeholder="##,##" pattern="^(([0-9])?([0-9])?(,\d)?(\d)?)$" title="###,##"></div>
	<div style="position:absolute; left:12.40cm; top:24.10cm"><input name="dia6_O"						 id="dia6_O"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:14.00cm; top:24.10cm"><input name="dia6_H2S"					 id="dia6_H2S"					 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:15.40cm; top:24.10cm"><input name="dia6_CO"						 id="dia6_CO"						 type="text"	style="width:0.70cm; text-align:center"	maxlength="3" placeholder="####" pattern="^(?:[0-9]{1,3})$"></div>
	<div style="position:absolute; left:19.05cm; top:24.00cm"><input name="dia6_pasa_bumptest" id="dia6_pasa_bumptest" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.90cm; top:24.00cm"><input name="dia6_pasa_bumptest" id="dia6_pasa_bumptest" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 5.60cm; top:24.70cm"><input name="dia6_H1_1"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:24.62cm"><input name="dia6_R1_1"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:24.93cm"><input name="dia6_H1_2"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:24.85cm"><input name="dia6_R1_2"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:25.17cm"><input name="dia6_H1_3"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:25.09cm"><input name="dia6_R1_3"  type="checkbox"></div>
	<div style="position:absolute; left: 5.60cm; top:25.40cm"><input name="dia6_H1_4"  id="dias" type="time" required></div>
	<div style="position:absolute; left: 6.35cm; top:25.32cm"><input name="dia6_R1_4"  type="checkbox"></div>

	<div style="position:absolute; left: 7.10cm; top:24.70cm"><input name="dia6_H2_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:24.62cm"><input name="dia6_R2_1"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:24.93cm"><input name="dia6_H2_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:24.85cm"><input name="dia6_R2_2"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:25.17cm"><input name="dia6_H2_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:25.09cm"><input name="dia6_R2_3"  type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:25.40cm"><input name="dia6_H2_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 7.85cm; top:25.32cm"><input name="dia6_R2_4"  type="checkbox"></div>

	<div style="position:absolute; left: 8.60cm; top:24.70cm"><input name="dia6_H3_1"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:24.62cm"><input name="dia6_R3_1"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:24.93cm"><input name="dia6_H3_2"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:24.85cm"><input name="dia6_R3_2"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:25.17cm"><input name="dia6_H3_3"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:25.09cm"><input name="dia6_R3_3"  type="checkbox"></div>
	<div style="position:absolute; left: 8.60cm; top:25.40cm"><input name="dia6_H3_4"  id="dias" type="time"></div>
	<div style="position:absolute; left: 9.35cm; top:25.32cm"><input name="dia6_R3_4"  type="checkbox"></div>

	<div style="position:absolute; left:10.10cm; top:24.70cm"><input name="dia6_H4_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:24.62cm"><input name="dia6_R4_1"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:24.93cm"><input name="dia6_H4_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:24.85cm"><input name="dia6_R4_2"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:25.17cm"><input name="dia6_H4_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:25.09cm"><input name="dia6_R4_3"  type="checkbox"></div>
	<div style="position:absolute; left:10.10cm; top:25.40cm"><input name="dia6_H4_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:10.85cm; top:25.32cm"><input name="dia6_R4_4"  type="checkbox"></div>

	<div style="position:absolute; left:11.60cm; top:24.70cm"><input name="dia6_H5_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:24.62cm"><input name="dia6_R5_1"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:24.93cm"><input name="dia6_H5_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:24.85cm"><input name="dia6_R5_2"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:25.17cm"><input name="dia6_H5_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:25.09cm"><input name="dia6_R5_3"  type="checkbox"></div>
	<div style="position:absolute; left:11.60cm; top:25.40cm"><input name="dia6_H5_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:12.35cm; top:25.32cm"><input name="dia6_R5_4"  type="checkbox"></div>

	<div style="position:absolute; left:13.10cm; top:24.70cm"><input name="dia6_H6_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:24.62cm"><input name="dia6_R6_1"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:24.93cm"><input name="dia6_H6_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:24.85cm"><input name="dia6_R6_2"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:25.17cm"><input name="dia6_H6_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:25.09cm"><input name="dia6_R6_3"  type="checkbox"></div>
	<div style="position:absolute; left:13.10cm; top:25.40cm"><input name="dia6_H6_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:13.85cm; top:25.32cm"><input name="dia6_R6_4"  type="checkbox"></div>

	<div style="position:absolute; left:14.60cm; top:24.70cm"><input name="dia6_H7_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:24.62cm"><input name="dia6_R7_1"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:24.93cm"><input name="dia6_H7_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:24.85cm"><input name="dia6_R7_2"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:25.17cm"><input name="dia6_H7_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:25.09cm"><input name="dia6_R7_3"  type="checkbox"></div>
	<div style="position:absolute; left:14.60cm; top:25.40cm"><input name="dia6_H7_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:15.35cm; top:25.32cm"><input name="dia6_R7_4"  type="checkbox"></div>

	<div style="position:absolute; left:16.10cm; top:24.70cm"><input name="dia6_H8_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:24.62cm"><input name="dia6_R8_1"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:24.93cm"><input name="dia6_H8_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:24.85cm"><input name="dia6_R8_2"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:25.17cm"><input name="dia6_H8_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:25.09cm"><input name="dia6_R8_3"  type="checkbox"></div>
	<div style="position:absolute; left:16.10cm; top:25.40cm"><input name="dia6_H8_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:16.85cm; top:25.32cm"><input name="dia6_R8_4"  type="checkbox"></div>

	<div style="position:absolute; left:17.60cm; top:24.70cm"><input name="dia6_H9_1"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:24.62cm"><input name="dia6_R9_1"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:24.93cm"><input name="dia6_H9_2"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:24.85cm"><input name="dia6_R9_2"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:25.17cm"><input name="dia6_H9_3"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:25.09cm"><input name="dia6_R9_3"  type="checkbox"></div>
	<div style="position:absolute; left:17.60cm; top:25.40cm"><input name="dia6_H9_4"  id="dias" type="time"></div>
	<div style="position:absolute; left:18.35cm; top:25.32cm"><input name="dia6_R9_4"  type="checkbox"></div>

	<div style="position:absolute; left:19.10cm; top:24.70cm"><input name="dia6_H10_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:24.62cm"><input name="dia6_R10_1" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:24.93cm"><input name="dia6_H10_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:24.85cm"><input name="dia6_R10_2" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:25.17cm"><input name="dia6_H10_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:25.09cm"><input name="dia6_R10_3" type="checkbox"></div>
	<div style="position:absolute; left:19.10cm; top:25.40cm"><input name="dia6_H10_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.85cm; top:25.32cm"><input name="dia6_R10_4" type="checkbox"></div>

	<div style="position:absolute; left: 1.70cm; top:26.27cm"><input name="dia6_nombre1" id="nombre1" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:26.30cm"><input name="dia6_HE1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:26.30cm"><input name="dia6_HS1_1" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:26.30cm"><input name="dia6_HE2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:26.30cm"><input name="dia6_HS2_1" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:26.30cm"><input name="dia6_HE3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:26.30cm"><input name="dia6_HS3_1" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:26.30cm"><input name="dia6_HE4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:26.30cm"><input name="dia6_HS4_1" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:26.30cm"><input name="dia6_HE5_1" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:26.30cm"><input name="dia6_HS5_1" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:26.51cm"><input name="dia6_nombre2" id="nombre2" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:26.54cm"><input name="dia6_HE1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:26.54cm"><input name="dia6_HS1_2" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:26.54cm"><input name="dia6_HE2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:26.54cm"><input name="dia6_HS2_2" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:26.54cm"><input name="dia6_HE3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:26.54cm"><input name="dia6_HS3_2" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:26.54cm"><input name="dia6_HE4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:26.54cm"><input name="dia6_HS4_2" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:26.54cm"><input name="dia6_HE5_2" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:26.54cm"><input name="dia6_HS5_2" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:26.75cm"><input name="dia6_nombre3" id="nombre3" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:26.78cm"><input name="dia6_HE1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:26.78cm"><input name="dia6_HS1_3" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:26.78cm"><input name="dia6_HE2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:26.78cm"><input name="dia6_HS2_3" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:26.78cm"><input name="dia6_HE3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:26.78cm"><input name="dia6_HS3_3" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:26.78cm"><input name="dia6_HE4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:26.78cm"><input name="dia6_HS4_3" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:26.78cm"><input name="dia6_HE5_3" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:26.78cm"><input name="dia6_HS5_3" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:26.99cm"><input name="dia6_nombre4" id="nombre4" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:27.02cm"><input name="dia6_HE1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:27.02cm"><input name="dia6_HS1_4" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:27.02cm"><input name="dia6_HE2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:27.02cm"><input name="dia6_HS2_4" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:27.02cm"><input name="dia6_HE3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:27.02cm"><input name="dia6_HS3_4" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:27.02cm"><input name="dia6_HE4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:27.02cm"><input name="dia6_HS4_4" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:27.02cm"><input name="dia6_HE5_4" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:27.02cm"><input name="dia6_HS5_4" id="dias" type="time"></div>

	<div style="position:absolute; left: 1.70cm; top:27.23cm"><input name="dia6_nombre5" id="nombre5" type="text" style="width:3.70cm" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.00cm; top:27.26cm"><input name="dia6_HE1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 7.50cm; top:27.26cm"><input name="dia6_HS1_5" id="dias" type="time"></div>
	<div style="position:absolute; left: 9.00cm; top:27.26cm"><input name="dia6_HE2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:10.50cm; top:27.26cm"><input name="dia6_HS2_5" id="dias" type="time"></div>
	<div style="position:absolute; left:12.00cm; top:27.26cm"><input name="dia6_HE3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:13.50cm; top:27.26cm"><input name="dia6_HS3_5" id="dias" type="time"></div>
	<div style="position:absolute; left:15.00cm; top:27.26cm"><input name="dia6_HE4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:16.50cm; top:27.26cm"><input name="dia6_HS4_5" id="dias" type="time"></div>
	<div style="position:absolute; left:18.00cm; top:27.26cm"><input name="dia6_HE5_5" id="dias" type="time"></div>
	<div style="position:absolute; left:19.50cm; top:27.26cm"><input name="dia6_HS5_5" id="dias" type="time"></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:27.60cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:27.80cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:28.00cm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="auto" height="20" style="border:0px; height:20px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left: 5mm; top:27.90cm; width:107.5mm; text-align:left;  background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();"><img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="auto" height="20" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-102.0mm; top:15.50cm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.60cm; top:26.60cm">
		<table>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td style="text-align:center">
					<form method="post">
						<select name="usuario" id="usuario" type="text" required>
							<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
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
		</table>
	</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->
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
</div>			<!-- cierre subir/bajar formato-->
</div>			<!-- cierre del div de 1 hoja en PDF -->
</form>
</div>			<!-- cierre del div de imprimir -->
</div>			<!-- cierre del div de zoom -->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
