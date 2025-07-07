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
	#timeB20 {width:0.9cm; font-size:8px; text-align:center}
	#timeB23 {width:1.0cm; font-size:8px; text-align:center}
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
//	$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
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
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:1056px; overflow:hidden; border:0px solid rgba(0,0,0,0.25)">
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
	<div style="position:absolute; left:0px; top:	  0px"><img src="<? echo $tiro; ?>" width="816px" height="auto"></div>
<!--	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" width="816px" height="auto"></div> -->

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
	$fechamin = date ("Y-m-d", strtotime("-1 days", strtotime(date ("Y-m-d"))));
	$fechamax = date ("Y-m-d", strtotime("+0 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,60000); document.body.innerHTML = '$aviso_pedido';</script>";}
	?>

	<!-- div para subir/bajar formato el formato -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:2.00mm; width:816px; height:1056px; overflow:hidden">
	
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

	<div style="position:absolute; left: 18.15cm; top: 0.70cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,0.33); border:0" readonly></div>
	<div style="position:absolute; left: 18.20cm; top: 0.85cm"><span  style="color:rgba(0,0,0,0.33); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

<!-- ************************ 7.45 *****************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 3.20cm; top: 2.30cm"><input name="fechaA"				type="date" style="width: 2.20cm" min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." autofocus required></div>
	<div style="position:absolute; left: 8.30cm; top: 2.30cm"><input name="horainicialA"	type="time" class="hora" style="width: 1.70cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:11.90cm; top: 2.30cm"><input name="horafinalA"		type="time" class="hora" style="width: 1.70cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:18.40cm; top: 2.30cm"><input name="certhabilit"		type="text" style="width: 1.20cm"	maxlength="6" placeholder="####" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>

	<div style="position:absolute; left: 6.35cm; top: 2.85cm"><input name="equipo_desacople"	type="text"	style="width:13.60cm" maxlength="75" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 5.50cm; top: 3.45cm"><input name="producto"					type="text"	style="width: 7.30cm" maxlength="40" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:15.40cm; top: 3.45cm"><input name="temperatura"				type="text"	style="width: 1.40cm" maxlength="5" pattern="^(([0-9]){1,2}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.60cm; top: 3.45cm"><input name="presion"						type="text"	style="width: 1.40cm" maxlength="5" pattern="^(([0-9]){1,2}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:10.10cm; top: 4.05cm"><input name="descripcion1"			type="text"	style="width: 9.90cm" maxlength="55" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 2.10cm; top: 4.65cm"><input name="descripcion2"			type="text"	style="width:17.90cm" maxlength="99" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
		
	<div style="position:absolute; left:10.15cm; top: 5.25cm"><input name="cantidad"	id="cantidad"	type="text"	style="width:0.60cm; text-align:center"	maxlength="1"		placeholder="#" pattern="^(?:[1-4]{1})$" title="Debe ingresar cantidad&#x00A;mínimo 1, máximo 4." required></div>
	<div style="position:absolute; left:14.30cm; top: 5.25cm"><input name="nombre1"		id="nombre1"	type="text"	style="width:5.70cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 2.10cm; top: 5.85cm"><input name="nombre2"		id="nombre2"	type="text"	style="width:5.70cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.20cm; top: 5.85cm"><input name="nombre3"		id="nombre3"	type="text"	style="width:5.70cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.30cm; top: 5.85cm"><input name="nombre4"		id="nombre4"	type="text"	style="width:5.70cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<script>
		var
			c = document.getElementById("cantidad");
			n1 = document.getElementById("nombre1");
			n2 = document.getElementById("nombre2");
			n3 = document.getElementById("nombre3");
			n4 = document.getElementById("nombre4");
		document.getElementById("cantidad").addEventListener("blur", function(e) {
			if (c.value == 0) {c.value = 1;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";};
			if (c.value == 1) {n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";};
			if (c.value == 2) {n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";};
			if (c.value == 3) {n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = true; n4.style.display = "none";};
			if (c.value == 4) {n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 5) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 6) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 7) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 8) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "bloc"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 9) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;}});
	</script>
	<div style="position:absolute; left:10.60cm; top: 6.45cm"><input name="otros_detalles"	type="text" style="width: 1.20cm"	maxlength="6" placeholder="####" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>
	
<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left:17.80cm; top: 7.52cm"><input name="B1"	id="B1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 7.52cm"><input name="B1"	id="b1"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 7.52cm"><input name="B1"	id="v1"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 7.92cm"><input name="B2"	id="B2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 7.92cm"><input name="B2"	id="b2"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 7.92cm"><input name="B2"	id="v2"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 8.32cm"><input name="B3"	id="B3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 8.32cm"><input name="B3"	id="b3"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 8.32cm"><input name="B3"	id="v3"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 8.72cm"><input name="B4"	id="B4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 8.72cm"><input name="B4"	id="b4"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 8.72cm"><input name="B4"	id="v4"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 9.12cm"><input name="B5"	id="B5"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 9.12cm"><input name="B5"	id="b5"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 9.12cm"><input name="B5"	id="v5"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 9.52cm"><input name="B6"	id="B6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 9.52cm"><input name="B6"	id="b6"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 9.52cm"><input name="B6"	id="v6"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top: 9.92cm"><input name="B7"	id="B7"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top: 9.92cm"><input name="B7"	id="b7"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top: 9.92cm"><input name="B7"	id="v7"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left: 9.10cm; top: 9.98cm"><input name="B7a"						type="text"	 style="width: 8.40cm" maxlength="45" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
		<div style="position:absolute; left:17.80cm; top:10.32cm"><input name="B8"	id="B8"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:10.32cm"><input name="B8"	id="b8"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:10.32cm"><input name="B8"	id="v8"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top:10.89cm"><input name="B9"	id="B9"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:10.89cm"><input name="B9"	id="b9"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:10.89cm"><input name="B9"	id="v9"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left: 2.90cm; top:11.15cm"><input name="B9a"						type="text"	 style="width:14.60cm" maxlength="80" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	</div>

	<div style="position:absolute; left: 1.90cm; top:11.77cm"><input name="B10a"	type="checkbox"></div>
	<div style="position:absolute; left: 1.90cm; top:12.17cm"><input name="B10b"	type="checkbox"></div>
	<div style="position:absolute; left: 3.80cm; top:11.77cm"><input name="B10c"	type="checkbox"></div>
	<div style="position:absolute; left: 3.80cm; top:12.17cm"><input name="B10d"	type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:11.77cm"><input name="B10e"	type="checkbox"></div>
	<div style="position:absolute; left: 7.10cm; top:12.17cm"><input name="B10f"	type="checkbox"></div>
	<div style="position:absolute; left: 9.90cm; top:11.77cm"><input name="B10g"	type="checkbox"></div>
	<div style="position:absolute; left:12.05cm; top:11.82cm"><input name="B10g1"	type="text"			style="width:1.60cm" maxlength="9" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 9.90cm; top:12.17cm"><input name="B10h"	type="checkbox"></div>
	<div style="position:absolute; left:12.05cm; top:12.22cm"><input name="B10h1"	type="text"			style="width:1.60cm" maxlength="9" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:13.70cm; top:11.77cm"><input name="B10i"	type="checkbox"></div>
	<div style="position:absolute; left:13.70cm; top:12.17cm"><input name="B10j"	type="checkbox"></div>
	<div style="position:absolute; left:16.50cm; top:11.77cm"><input name="B10k"	type="checkbox"></div>
	<div style="position:absolute; left:18.30cm; top:11.82cm"><input name="B10k1"	type="text"			style="width:1.60cm" maxlength="9" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.50cm; top:12.17cm"><input name="B10l"	type="checkbox"></div>	
	<div style="position:absolute; left:18.30cm; top:12.22cm"><input name="B10l1"	type="text"			style="width:1.60cm" maxlength="9" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.20cm; top:12.75cm"><input name="razones1"		type="text"	 style="width: 4.80cm" maxlength="25" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 2.10cm; top:13.25cm"><input name="razones2"		type="text"	 style="width:17.90cm" maxlength="98" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 5.80cm; top:13.75cm"><input name="prec_adic1"	type="text"	 style="width:14.20cm" maxlength="78" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 2.10cm; top:14.25cm"><input name="prec_adic2"	type="text"	 style="width:17.90cm" maxlength="98" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left:17.80cm; top:15.42cm"><input name="C1"	id="C1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:15.42cm"><input name="C1"	id="c1"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:15.42cm"><input name="C1"	id="z1"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top:15.82cm"><input name="C2"	id="C2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:15.82cm"><input name="C2"	id="c2"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:15.82cm"><input name="C2"	id="z2"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top:16.22cm"><input name="C3"	id="C3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:16.22cm"><input name="C3"	id="c3"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:16.22cm"><input name="C3"	id="z3"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top:16.62cm"><input name="C4"	id="C4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:16.62cm"><input name="C4"	id="c4"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:16.62cm"><input name="C4"	id="z4"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:17.80cm; top:17.02cm"><input name="C5"	id="C5"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:17.02cm"><input name="C5"	id="c5"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:17.02cm"><input name="C5"	id="z5"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left: 3.70cm; top:17.32cm"><input name="valvula1"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.20cm; top:17.32cm"><input name="valvula2"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.70cm; top:17.32cm"><input name="valvula3"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.20cm; top:17.32cm"><input name="valvula4"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 9.70cm; top:17.32cm"><input name="valvula5"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.20cm; top:17.32cm"><input name="valvula6"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:12.70cm; top:17.32cm"><input name="valvula7"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:17.32cm"><input name="valvula8"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.70cm; top:17.32cm"><input name="valvula9"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:17.20cm; top:17.32cm"><input name="valvula10"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:17.32cm"><input name="valvula11"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 3.70cm; top:17.72cm"><input name="candado1"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.20cm; top:17.72cm"><input name="candado2"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.70cm; top:17.72cm"><input name="candado3"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.20cm; top:17.72cm"><input name="candado4"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 9.70cm; top:17.72cm"><input name="candado5"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.20cm; top:17.72cm"><input name="candado6"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:12.70cm; top:17.72cm"><input name="candado7"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:17.72cm"><input name="candado8"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.70cm; top:17.72cm"><input name="candado9"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:17.20cm; top:17.72cm"><input name="candado10"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:17.72cm"><input name="candado11"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 3.70cm; top:18.12cm"><input name="etiqueta1"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 5.20cm; top:18.12cm"><input name="etiqueta2"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 6.70cm; top:18.12cm"><input name="etiqueta3"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.20cm; top:18.12cm"><input name="etiqueta4"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 9.70cm; top:18.12cm"><input name="etiqueta5"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.20cm; top:18.12cm"><input name="etiqueta6"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:12.70cm; top:18.12cm"><input name="etiqueta7"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.20cm; top:18.12cm"><input name="etiqueta8"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.70cm; top:18.12cm"><input name="etiqueta9"		type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:17.20cm; top:18.12cm"><input name="etiqueta10"	type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:18.12cm"><input name="etiqueta11"	type="text"	 style="width: 1.25cm" maxlength="7" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left:17.80cm; top:18.62cm"><input name="C6"	id="C6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:18.60cm; top:18.62cm"><input name="C6"	id="c6"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:19.40cm; top:18.62cm"><input name="C6"	id="z6"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left: 3.70cm; top:18.92cm"><input name="ubicacionA1"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.00cm; top:18.92cm"><input name="ubicacionA2"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:10.30cm; top:18.92cm"><input name="ubicacionA3"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:13.60cm; top:18.92cm"><input name="ubicacionA4"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.90cm; top:18.92cm"><input name="ubicacionA5"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 3.70cm; top:19.32cm"><input name="ubicacionB1"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.00cm; top:19.32cm"><input name="ubicacionB2"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:10.30cm; top:19.32cm"><input name="ubicacionB3"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:13.60cm; top:19.32cm"><input name="ubicacionB4"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.90cm; top:19.32cm"><input name="ubicacionB5"		type="text"	 style="width: 3.00cm" maxlength="15" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
				
<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.60cm; top:20.75cm"><input name="ejecutorD"			type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.50cm; top:20.75cm"><input name="nombreejecD"		type="text" style="width: 5.00cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:13.00cm; top:20.75cm"><input name="fechaejecD"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:20.75cm"><input name="horaejecD"			type="time" class="hora" style="width: 1.70cm; display:none" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.60cm; top:21.25cm"><input name="inspectorD"		type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.50cm; top:21.25cm"><input name="nombreinspD"		type="text" style="width: 5.00cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:13.00cm; top:21.25cm"><input name="fechainspD"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:21.25cm"><input name="horainspD"			type="time" class="hora" style="width: 1.70cm; display:none" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 3.60cm; top:22.65cm"><input name="emisorE"				type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.50cm; top:22.65cm"><input name="nombreemisorE"	type="text" style="width: 5.00cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:17.70cm; top:22.65cm"><input name="fechaemisorE"	type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:22.65cm"><input name="horaemisorE"		type="time" class="hora" style="width: 1.70cm; display:none" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left:0cm; top:-0.15cm">
		<div style="position:absolute; left: 8.78cm; top:23.60cm"><input name="cancelacion"	id="A"	type="radio" value="A" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:12.26cm; top:23.60cm"><input name="cancelacion"	id="B"	type="radio" value="B" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:15.26cm; top:23.60cm"><input name="cancelacion"	id="C"	type="radio" value="C" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left: 3.60cm; top:24.15cm"><input name="ejecutorF"			type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:13.00cm; top:24.15cm"><input name="fechaejecF"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:24.15cm"><input name="horaejecF"			type="time" class="hora" style="width: 1.70cm" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.60cm; top:24.65cm"><input name="inspectorF"		type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:13.00cm; top:24.65cm"><input name="fechainspF"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:24.65cm"><input name="horainspF"			type="time" class="hora" style="width: 1.70cm" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.60cm; top:25.35cm"><input name="emisorF"				type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:17.70cm; top:25.35cm"><input name="fechaemisorF"	type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.65cm; top:25.35cm"><input name="horaemisorF"		type="time" class="hora" style="width: 1.70cm" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:26.20cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:27.00cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:26.30cm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:26.30cm; width:107.5mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-102.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.60cm; top:26.20cm">
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
</div>			<!-- cierre div 1 hoja PDF formato-->
</form>
</div>			<!-- cierre div no imprimir-->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</div>			<!-- cierre div zoom-->
</body>
</html>
