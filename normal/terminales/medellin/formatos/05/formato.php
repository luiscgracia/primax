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
	#timeB12::-webkit-calendar-picker-indicator {display:none}
	#numeroB12	{width:0.60cm; font-size: 8px; text-align:center}
	#timeB12		{width:0.70cm; font-size: 8px; text-align:center}
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
	<div style="position:absolute; left:0px; top:	 0px"><img src="<? echo $tiro; ?>" width="816px" height="auto"></div>
	

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
	<div style="position:absolute; left:50%; margin-left:-408px; top:0.00mm; width:816px; height:1056px; overflow:hidden">

	<!-- se inicia el código para diligenciar el formato -->
	<div style="position:absolute; left:18.15cm; top:1.55cm">
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

	<div style="position:absolute; left:18.15cm; top: 1.27cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; color:rgba(255,255,255,1); background-color:rgba(0,0,0,0); border:0" readonly></div>
	<div style="position:absolute; left:18.20cm; top: 1.55cm"><span style="font-size:7px; color:rgba(255,255,255,1); font-family:Arlrdlt"><? echo strtoupper($terminal); ?></span></div>

<!-- ************************ 7.45 *****************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 6.00cm; top: 3.00cm"><input name="descripcion"	type="text" style="width:14.10cm"	maxlength="80" placeholder="Ingrese una breve descripción del trabajo a realizar" pattern=".{1,}" onkeyup="mayuscula(this);" required autofocus></div>

	<div style="position:absolute; left:11.05cm; top: 3.65cm"><input name="cantidad"	id="cantidad"	type="text"	style="width:0.60cm; text-align:center"	maxlength="1"		placeholder="#" pattern="^(?:[1-4]{1})$" title="Debe ingresar cantidad&#x00A;mínimo 1, máximo 4." required></div>
	<div style="position:absolute; left:14.35cm; top: 3.65cm"><input name="nombre1"		id="nombre1"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 1.90cm; top: 4.30cm"><input name="nombre2"		id="nombre2"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.10cm; top: 4.30cm"><input name="nombre3"		id="nombre3"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.35cm; top: 4.30cm"><input name="nombre4"		id="nombre4"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
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
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;};
			if (c.value == 9) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;}});
	</script>

	<div style="position:absolute; left: 3.00cm; top: 4.95cm"><input name="fechaA"				type="date"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left: 7.30cm; top: 4.95cm"><input name="horainicialA"	type="time"	value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:11.40cm; top: 4.95cm"><input name="horafinalA"		type="time"	value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:18.20cm; top: 4.95cm"><input name="certhabilit"		type="text"	style="width: 1.20cm; text-align:center"	maxlength="6" placeholder="####" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:18.68cm; top: 6.30cm"><input name="B1"	id="B1"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 6.30cm"><input name="B1"	id="b1"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 6.30cm"><input name="B1"	id="v1"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top: 6.75cm"><input name="B2"	id="B2"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 6.75cm"><input name="B2"	id="b2"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 6.75cm"><input name="B2"	id="v2"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top: 7.20cm"><input name="B3"	id="B3"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 7.20cm"><input name="B3"	id="b3"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 7.20cm"><input name="B3"	id="v3"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top: 7.95cm"><input name="B4"	id="B4"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 7.95cm"><input name="B4"	id="b4"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 7.95cm"><input name="B4"	id="v4"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top: 8.40cm"><input name="B5"	id="B5"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 8.40cm"><input name="B5"	id="b5"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 8.40cm"><input name="B5"	id="v5"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
<!--	<div style="position:absolute; left: 8.45cm; top: 8.40cm"><input name="indiqueB5a"			type="text" style="width:10.05cm" maxlength="65" pattern=".{1,}" onkeyup="mayuscula(this);"></div> -->
	<div style="position:absolute; left: 2.50cm; top: 8.75cm"><input name="indiqueB5b"			type="text" style="width:16.00cm" maxlength="80" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.68cm; top: 9.15cm"><input name="B6"	id="B6"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 9.15cm"><input name="B6"	id="b6"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 9.15cm"><input name="B6"	id="v6"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
<!--	<div style="position:absolute; left: 8.00cm; top: 9.15cm"><input name="indiqueB6a"			type="text" style="width:10.50cm" maxlength="69" pattern=".{1,}" onkeyup="mayuscula(this);"></div> -->
	<div style="position:absolute; left: 2.50cm; top: 9.50cm"><input name="indiqueB6b"			type="text" style="width:16.00cm" maxlength="80" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.68cm; top: 9.90cm"><input name="B7"	id="B7"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top: 9.90cm"><input name="B7"	id="b7"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top: 9.90cm"><input name="B7"	id="v7"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top:10.35cm"><input name="B8"	id="B8"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top:10.35cm"><input name="B8"	id="b8"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top:10.35cm"><input name="B8"	id="v8"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top:10.80cm"><input name="B9"	id="B9"			type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top:10.80cm"><input name="B9"	id="b9"			type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top:10.80cm"><input name="B9"	id="v9"			type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.68cm; top:11.25cm"><input name="B10"	id="B10"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.20cm; top:11.25cm"><input name="B10"	id="b10"		type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.70cm; top:11.25cm"><input name="B10"	id="v10"		type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
<!--	<div style="position:absolute; left:10.40cm; top:11.25cm"><input name="especifiqueB10a"	type="text" style="width: 8.10cm" maxlength="53" pattern=".{1,}" onkeyup="mayuscula(this);">	</div> -->
	<div style="position:absolute; left: 2.50cm; top:11.60cm"><input name="especifiqueB10b"	type="text" style="width:16.00cm" maxlength="80" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 1.80cm; top:12.45cm"><input name="B11a"			type="checkbox"></div>
	<div style="position:absolute; left: 1.80cm; top:12.90cm"><input name="B11b"			type="checkbox"></div>
	<div style="position:absolute; left: 1.80cm; top:13.35cm"><input name="B11c"			type="checkbox"></div>
	<div style="position:absolute; left: 4.28cm; top:12.45cm"><input name="B11d"			type="checkbox"></div>
	<div style="position:absolute; left: 4.28cm; top:12.90cm"><input name="B11e"			type="checkbox"></div>
	<div style="position:absolute; left: 4.28cm; top:13.35cm"><input name="B11f"			type="checkbox"></div>
	<div style="position:absolute; left: 8.23cm; top:12.45cm"><input name="B11g"			type="checkbox"></div>
	<div style="position:absolute; left: 8.23cm; top:12.90cm"><input name="B11h"			type="checkbox"></div>
	<div style="position:absolute; left: 8.23cm; top:13.35cm"><input name="B11i"			type="checkbox"></div>
	<div style="position:absolute; left:10.40cm; top:13.40cm"><input name="guante"		type="text" style="width:1.15cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.67cm; top:12.45cm"><input name="B11j"			type="checkbox"></div>
	<div style="position:absolute; left:13.82cm; top:12.50cm"><input name="calzado"		type="text" style="width:2.40cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.67cm; top:12.90cm"><input name="B11k"			type="checkbox"></div>
	<div style="position:absolute; left:13.82cm; top:12.95cm"><input name="delantal"	type="text" style="width:2.40cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.67cm; top:13.35cm"><input name="B11l"			type="checkbox"></div>
	<div style="position:absolute; left:13.82cm; top:13.40cm"><input name="ropa"			type="text" style="width:2.40cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.33cm; top:12.45cm"><input name="B11m"			type="checkbox"></div>
	<div style="position:absolute; left:17.40cm; top:12.50cm"><input name="otro1"			type="text" style="width:2.65cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.33cm; top:12.90cm"><input name="B11n"			type="checkbox"></div>
	<div style="position:absolute; left:17.40cm; top:12.95cm"><input name="otro2"			type="text" style="width:2.65cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:16.33cm; top:13.35cm"><input name="B11o"			type="checkbox"></div>
	<div style="position:absolute; left:17.40cm; top:13.40cm"><input name="otro3"			type="text" style="width:2.65cm" maxlength="10" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 9.37cm; top:13.77cm"><input name="req_pr_gas"	id="B12"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:10.37cm; top:13.77cm"><input name="req_pr_gas"	id="b12"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 6.75cm; top:14.22cm"><input name="B12equipo"			type="text" style="width:2.45cm" maxlength="15" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:10.30cm; top:14.22cm"><input name="B12dueno"			type="text" style="width:2.05cm" maxlength="15" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.25cm; top:14.22cm"><input name="B12fecha"			type="date" style="width:2.50cm" value="0000-00-00"></div>
	<div style="position:absolute; left:19.73cm; top:14.16cm"><input name="B12bumptest"		type="checkbox"></div>
	
	<div style="position:absolute; left: 4.35cm; top:14.90cm"><input name="B12hora1"	type="time" id="timeB12"></div>
	<div style="position:absolute; left: 5.35cm; top:14.90cm"><input name="B12resul1"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left: 6.35cm; top:14.90cm"><input name="B12hora2"	type="time" id="timeB12"></div>
	<div style="position:absolute; left: 7.35cm; top:14.90cm"><input name="B12resul2"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left: 8.35cm; top:14.90cm"><input name="B12hora3"	type="time" id="timeB12"></div>
	<div style="position:absolute; left: 9.35cm; top:14.90cm"><input name="B12resul3"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left:10.35cm; top:14.90cm"><input name="B12hora4"	type="time" id="timeB12"></div>
	<div style="position:absolute; left:11.35cm; top:14.90cm"><input name="B12resul4"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left:12.35cm; top:14.90cm"><input name="B12hora5"	type="time" id="timeB12"></div>
	<div style="position:absolute; left:13.35cm; top:14.90cm"><input name="B12resul5"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left:14.35cm; top:14.90cm"><input name="B12hora6"	type="time" id="timeB12"></div>
	<div style="position:absolute; left:15.35cm; top:14.90cm"><input name="B12resul6"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left:16.35cm; top:14.90cm"><input name="B12hora7"	type="time" id="timeB12"></div>
	<div style="position:absolute; left:17.35cm; top:14.90cm"><input name="B12resul7"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>
	<div style="position:absolute; left:18.35cm; top:14.90cm"><input name="B12hora8"	type="time" id="timeB12"></div>
	<div style="position:absolute; left:19.35cm; top:14.90cm"><input name="B12resul8"	type="text" id="numeroB12" maxlength="5" pattern="^([0-9]{1,2}(\.[0-9]{1,2})?)$" title="##.##"></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:17.15cm"><input name="ejecutorC"			type="text"		style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:13.00cm; top:17.15cm"><input name="fechaejecC"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:17.15cm"><input name="horaejecC"			type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.70cm; top:17.65cm"><input name="inspectorC"		type="text"		style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:13.00cm; top:17.65cm"><input name="fechainspC"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:17.65cm"><input name="horainspC"			type="time"		value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:18.85cm"><input name="emisorD"				type="text"		style="width: 4.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.35cm; top:18.85cm"><input name="nombreemisorD"	type="text"		style="width: 4.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:17.70cm; top:18.85cm"><input name="fechaemisorD"	type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:18.85cm"><input name="horaemisorD"		type="time"		style="display:none" min="<?echo date("H:i");?>" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 8.79cm; top:19.82cm"><input name="cancelacion"	id="A"	type="radio"	value="A" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:11.89cm; top:19.82cm"><input name="cancelacion"	id="B"	type="radio"	value="B" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.57cm; top:19.82cm"><input name="cancelacion"	id="C"	type="radio"	value="C" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 3.70cm; top:20.85cm"><input name="ejecutorE"			type="text"		style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:13.00cm; top:20.85cm"><input name="fechaejecE"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:20.85cm"><input name="horaejecE"			type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.70cm; top:21.35cm"><input name="inspectorE"		type="text"		style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:13.00cm; top:21.35cm"><input name="fechainspE"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:21.35cm"><input name="horainspE"			type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.70cm; top:22.15cm"><input name="emisorE"				type="text"		style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:17.70cm; top:22.15cm"><input name="fechaemisorE"	type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.70cm; top:22.15cm"><input name="horaemisorE"		type="time"		value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:265mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:268mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:271mm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:271mm; width:107.5mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-102.0mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
