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
	<div style="position:absolute; left: 3.55cm; top: 2.25cm"><input name="fechaA"									type="date" style="width: 2.2cm" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required autofocus></div>
	<div style="position:absolute; left: 8.35cm; top: 2.25cm"><input name="horainicialA"						type="time" style="width: 1.6cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:11.95cm; top: 2.25cm"><input name="horafinalA"							type="time" style="width: 1.6cm" value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:18.65cm; top: 2.25cm"><input name="certhabilit"							type="text" style="width: 1.0cm; text-align:center" maxlength="6" placeholder="####" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>
	<div style="position:absolute; left: 3.75cm; top: 2.65cm"><input name="ubicacion"								type="text" style="width: 9.40cm" maxlength=" 60" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:17.15cm; top: 2.65cm"><input name="altura"									type="text" style="width: 1.60cm; text-align:center" maxlength="5" placeholder="#,##" pattern="^(([0-2]{1,2})?(,\d\d))?$" title="Ingresar mínimo 1 digito y dos decimales" required></div>
	<div style="position:absolute; left: 4.70cm; top: 3.05cm"><input name="tipo_trabajo"						type="text" style="width:15.30cm" maxlength="100" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 6.10cm; top: 3.45cm"><input name="descripcion"							type="text" style="width:13.90cm" maxlength=" 90" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>

	<div style="position:absolute; left:10.15cm; top: 3.85cm"><input name="cantidad"	id="cantidad"	type="text"	style="width:0.60cm; text-align:center"	maxlength="1"	placeholder="#" pattern="^(?:[1-4]{1})$" title="Debe ingresar cantidad&#x00A;mínimo 1, máximo 4." required></div>
	<div style="position:absolute; left: 2.05cm; top: 4.45cm"><input name="nombre1"		id="nombre1"	type="text"	style="width:8.80cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:11.55cm; top: 4.45cm"><input name="cedula1"		id="cedula1"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left: 2.05cm; top: 4.75cm"><input name="nombre2"		id="nombre2"	type="text"	style="width:8.80cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.55cm; top: 4.75cm"><input name="cedula2"		id="cedula2"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos."></div>
	<div style="position:absolute; left: 2.05cm; top: 5.05cm"><input name="nombre3"		id="nombre3"	type="text"	style="width:8.80cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.55cm; top: 5.05cm"><input name="cedula3"		id="cedula3"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos."></div>
	<div style="position:absolute; left: 2.05cm; top: 5.35cm"><input name="nombre4"		id="nombre4"	type="text"	style="width:8.80cm; display:none" maxlength="30" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:11.55cm; top: 5.35cm"><input name="cedula4"		id="cedula4"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos."></div>

	<script>
		var
			c = document.getElementById("cantidad");
			n1 = document.getElementById("nombre1");
			n2 = document.getElementById("nombre2");
			n3 = document.getElementById("nombre3");
			n4 = document.getElementById("nombre4");
			c1 = document.getElementById("cedula1");
			c2 = document.getElementById("cedula2");
			c3 = document.getElementById("cedula3");
			c4 = document.getElementById("cedula4");
		document.getElementById("cantidad").addEventListener("blur", function(e) {
			if (c.value == 0) {c.value = 1;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = true; c2.style.display = "none";
			 c3.disabled = true; c3.style.display = "none";
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value == 1) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = true; c2.style.display = "none";
			 c3.disabled = true; c3.style.display = "none";
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value == 2) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = true; c3.style.display = "none";
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value == 3) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = true; n4.style.display = "none";
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = false; c3.style.display = "block"; c3.required = true;
			 c4.disabled = true; c4.style.display = "none";};
			if (c.value >= 4) {c.value = 4;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 c1.disabled = false; c1.style.display = "block"; c1.required = true;
			 c2.disabled = false; c2.style.display = "block"; c2.required = true;
			 c3.disabled = false; c3.style.display = "block"; c3.required = true;
			 c4.disabled = false; c4.style.display = "block"; c4.required = true;};});
	</script>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:relative; width:100vw; left:0px; top:-6px; background-color:rgba(0,0,255,0)">
		<div style="position:absolute; left:18.55cm; top: 6.65cm"><input name= "B1" id= "B1" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 6.65cm"><input name= "B1" id= "b1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 6.95cm"><input name= "B2" id= "B2" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 6.95cm"><input name= "B2" id= "b2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 7.25cm"><input name= "B3" id= "B3" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 7.25cm"><input name= "B3" id= "b3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 7.70cm"><input name= "B4" id= "B4" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 7.70cm"><input name= "B4" id= "b4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 8.15cm"><input name= "B5" id= "B5" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 8.15cm"><input name= "B5" id= "b5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 8.45cm"><input name= "B6" id= "B6" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 8.45cm"><input name= "B6" id= "b6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 8.75cm"><input name= "B7" id= "B7" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 8.75cm"><input name= "B7" id= "b7" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 9.05cm"><input name= "B8" id= "B8" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 9.05cm"><input name= "B8" id= "b8" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 9.65cm"><input name= "B9" id= "B9" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 9.65cm"><input name= "B9" id= "b9" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top: 9.95cm"><input name="B10" id="B10" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top: 9.95cm"><input name="B10" id="b10" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:10.25cm"><input name="B11" id="B11" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:10.25cm"><input name="B11" id="b11" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:10.55cm"><input name="B12" id="B12" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:10.55cm"><input name="B12" id="b12" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:10.85cm"><input name="B13" id="B13" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:10.85cm"><input name="B13" id="b13" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:11.15cm"><input name="B14" id="B14" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:11.15cm"><input name="B14" id="b14" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:11.75cm"><input name="B15" id="B15" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:11.75cm"><input name="B15" id="b15" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:12.05cm"><input name="B16" id="B16" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:12.05cm"><input name="B16" id="b16" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:12.35cm"><input name="B17" id="B17" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:12.35cm"><input name="B17" id="b17" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:12.65cm"><input name="B18" id="B18" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:12.65cm"><input name="B18" id="b18" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:12.95cm"><input name="B19" id="B19" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:12.95cm"><input name="B19" id="b19" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:13.55cm"><input name="B20a" id="B20a" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:13.55cm"><input name="B20a" id="b20a" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:14.15cm"><input name="B20b" id="B20b" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:14.15cm"><input name="B20b" id="b20b" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:14.45cm"><input name="B21" id="B21" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:14.45cm"><input name="B21" id="b21" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:14.90cm"><input name="B22" id="B22" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:14.90cm"><input name="B22" id="b22" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:15.65cm"><input name="B23" id="B23" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:15.65cm"><input name="B23" id="b23" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:15.95cm"><input name="B24" id="B24" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:15.95cm"><input name="B24" id="b24" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:16.25cm"><input name="B25" id="B25" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:16.25cm"><input name="B25" id="b25" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:16.55cm"><input name="B26" id="B26" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:16.55cm"><input name="B26" id="b26" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:16.85cm"><input name="B27" id="B27" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:16.85cm"><input name="B27" id="b27" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:17.45cm"><input name="B28" id="B28" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:17.45cm"><input name="B28" id="b28" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:17.75cm"><input name="B29" id="B29" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:17.75cm"><input name="B29" id="b29" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:18.05cm"><input name="B30" id="B30" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:18.05cm"><input name="B30" id="b30" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:18.35cm"><input name="B31" id="B31" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:18.35cm"><input name="B31" id="b31" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:18.65cm"><input name="B32" id="B32" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:18.65cm"><input name="B32" id="b32" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:18.95cm"><input name="B33" id="B33" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:18.95cm"><input name="B33" id="b33" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:19.25cm"><input name="B34" id="B34" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:19.25cm"><input name="B34" id="b34" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:19.55cm"><input name="B35" id="B35" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:19.55cm"><input name="B35" id="b35" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:19.85cm"><input name="B36" id="B36" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:19.85cm"><input name="B36" id="b36" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:18.55cm; top:20.15cm"><input name="B37" id="B37" type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:19.35cm; top:20.15cm"><input name="B37" id="b37" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	</div>
	<div style="position:absolute; left: 7.50cm; top:20.40cm"><input name="observaciones"	type="text" style="width:12.50cm" maxlength="80" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$"></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.55cm; top:21.80cm"><input name="ejecutorC"			type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:21.80cm"><input name="cedulaejecC"		type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:21.80cm"><input name="fechaejecC"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>"title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:21.80cm"><input name="horaejecC"			type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.55cm; top:22.30cm"><input name="coordinadorC"	type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:22.30cm"><input name="cedulacoordC"	type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:22.30cm"><input name="fechacoordC"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>"title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:22.30cm"><input name="horacoordC"		type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.55cm; top:23.70cm"><input name="emisorD"				type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:23.70cm"><input name="cedulaemisorD"	type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:23.70cm"><input name="fechaemisorD"	type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:23.70cm"><input name="horaemisorD"		type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:relative; width:100vw; left:0px; top:-0.15cm">
		<div style="position:absolute; left: 8.80cm; top:24.62cm"><input name="cancelacion" id="A" type="radio" value="A" onclick="gestionarClickRadio(this)" required></div>
		<div style="position:absolute; left:12.30cm; top:24.62cm"><input name="cancelacion" id="B" type="radio" value="B" onclick="gestionarClickRadio(this)"></div>
		<div style="position:absolute; left:15.30cm; top:24.62cm"><input name="cancelacion" id="C" type="radio" value="C" onclick="gestionarClickRadio(this)"></div>
	</div>

	<div style="position:absolute; left: 3.55cm; top:25.15cm"><input name="ejecutorE"			type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:25.15cm"><input name="cedulaejecE"		type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:25.15cm"><input name="fechaejecE"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>"title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:25.15cm"><input name="horaejecE"			type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.55cm; top:25.65cm"><input name="coordinadorE"	type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:25.65cm"><input name="cedulacoordE"	type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:25.65cm"><input name="fechacoordE"		type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>"title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:25.65cm"><input name="horacoordE"		type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 3.55cm; top:26.35cm"><input name="emisorE"				type="text" style="width: 5.50cm" maxlength="30" onkeyup="mayuscula(this);" pattern="^(?:[a-z A-Z	[0-9] .ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" required></div>
	<div style="position:absolute; left:10.80cm; top:26.35cm"><input name="cedulaemisorE"	type="text"	style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{6,10})$" title="Debe ingresar número entre 6 y 10 digitos." required></div>
	<div style="position:absolute; left:14.15cm; top:26.35cm"><input name="fechaemisorE"	type="date" style="width: 2.20cm; display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top:26.35cm"><input name="horaemisorE"		type="time" style="width: 1.60cm" value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:26.40cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:27.10cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:26.90cm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:26.90cm; width:107.5mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-98.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.60cm; top:26.50cm">
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
</div>			<!-- cierre div formato-->
</form>
</div>			<!-- cierre div no imprimir-->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</div>			<!-- cierre div zoom-->
</body>
</html>
