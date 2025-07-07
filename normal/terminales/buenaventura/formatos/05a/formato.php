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
	#timeB13 {width:1.0cm; font-size:8px; text-align:center}
	input	{font-family:Arial; vertical-align:middle; height:2.5mm}
	input[type="radio"] {-ms-transform:scale(0.85); -webkit-transform:scale(0.85); transform:scale(0.85)} 
	textarea	{resize:none; font-family:Arlrdlt; font-size:10px; line-height:80%; ; padding: 5px 1px; text-align:justify; background-color:rgba(255,112,0,0.33)}
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
	function d1() {document.getElementById("fechaB11").value = document.getElementById("fechaB1").value;}
	function d2() {document.getElementById("fechaB21").value = document.getElementById("fechaB2").value;}
	function d3() {document.getElementById("fechaB31").value = document.getElementById("fechaB3").value;}
	function d4() {document.getElementById("fechaB41").value = document.getElementById("fechaB4").value;}
	function d5() {document.getElementById("fechaB51").value = document.getElementById("fechaB5").value;}
	function d6() {document.getElementById("fechaB61").value = document.getElementById("fechaB6").value;}
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
	$fechamin = date ("Y-m-d", strtotime("-30 days", strtotime(date ("Y-m-d"))));
	$fechamax = date ("Y-m-d", strtotime("+30 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,60000); document.body.innerHTML = '$aviso_pedido';</script>";}
	?>

	<!-- div para subir/bajar formato el formato -->
	<div style="position:absolute; left:50%; margin-left:-408px; top:0.00mm; width:816px; height:2112px; overflow:hidden">

	<!-- se inicia el código para diligenciar el formato -->
	<div style="position:absolute; left:18.65cm; top:1.42cm">
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

	<div style="position:absolute; left:18.65cm; top: 0.95cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; color:rgba(255,255,255,1); background-color:rgba(0,0,0,0); border:0" readonly></div>
	<div style="position:absolute; left:18.70cm; top: 0.71cm"><span style="font-size:7px; color:rgba(255,255,255,1); font-family:Arlrdlt"><? echo strtoupper($terminal); ?></span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left:14.90cm; top: 2.32cm"><input name="tipo_trabajo"	id="tipo_trabajo1" type="radio" value="C" onclick="gestionarClickRadio(this)" required autofocus></div>
	<div style="position:absolute; left:20.55cm; top: 2.32cm"><input name="tipo_trabajo"	id="tipo_trabajo2" type="radio" value="F" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 5.00cm; top: 2.60cm"><input name="descripcion"							type="text" style="width:15.50cm"	maxlength="68" placeholder="Descripción" pattern=".{1,}" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 6.40cm; top: 2.90cm"><input name="ubicacion"								type="text" style="width:14.10cm"	maxlength="68" placeholder="Ubicación" pattern=".{1,}" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 5.00cm; top: 3.20cm"><input name="certificado_gas_free"		type="text" style="width: 1.00cm"	maxlength=" 6" placeholder="######" pattern="^(?:[0-9]{4,6})$" required></div>
	<div style="position:absolute; left:13.45cm; top: 3.20cm"><input name="certificado_libre_plomo"	type="text" style="width: 1.00cm"	maxlength=" 6" placeholder="######" pattern="^(?:[0-9]{4,6})$" required></div>
	<div style="position:absolute; left:19.00cm; top: 3.20cm"><input name="procedimiento"						type="text" style="width: 1.00cm"	maxlength=" 6" placeholder="######" pattern="^(?:[0-9]{4,6})$" required></div>
	<div style="position:absolute; left: 6.50cm; top: 3.50cm"><input name="fecha_apertura"					type="date"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left: 8.80cm; top: 3.50cm"><input name="hora_apertura"						type="time"	value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:16.10cm; top: 3.50cm"><input name="fecha_cierre"						type="date"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.40cm; top: 3.50cm"><input name="hora_cierre"							type="time"	value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 7.20cm; top: 3.80cm"><input name="cantidad" id="cantidad"	type="text"	style="width:0.60cm; text-align:center"	maxlength="1"		placeholder="#" pattern="^(?:[1-5]{1})$" title="Debe ingresar cantidad&#x00A;mínimo 1, máximo 5." required></div>
	<div style="position:absolute; left: 1.05cm; top: 4.50cm"><input name="nombre1"		id="nombre1"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.50cm; top: 4.50cm"><input name="cedula1"		id="cedula1"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{8,10})$"></div>
	<div style="position:absolute; left:10.00cm; top: 4.50cm"><input name="cargo1"		id="cargo1"		type="text"	style="width:5.80cm; display:none" maxlength="20" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 1.05cm; top: 4.77cm"><input name="nombre2"		id="nombre2"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.50cm; top: 4.77cm"><input name="cedula2"		id="cedula2"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{8,10})$"></div>
	<div style="position:absolute; left:10.00cm; top: 4.77cm"><input name="cargo2"		id="cargo2"		type="text"	style="width:5.80cm; display:none" maxlength="20" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 1.05cm; top: 5.05cm"><input name="nombre3"		id="nombre3"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.50cm; top: 5.05cm"><input name="cedula3"		id="cedula3"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{8,10})$"></div>
	<div style="position:absolute; left:10.00cm; top: 5.05cm"><input name="cargo3"		id="cargo3"		type="text"	style="width:5.80cm; display:none" maxlength="20" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 1.05cm; top: 5.33cm"><input name="nombre4"		id="nombre4"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.50cm; top: 5.33cm"><input name="cedula4"		id="cedula4"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{8,10})$"></div>
	<div style="position:absolute; left:10.00cm; top: 5.33cm"><input name="cargo4"		id="cargo4"		type="text"	style="width:5.80cm; display:none" maxlength="20" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

	<div style="position:absolute; left: 1.05cm; top: 5.61cm"><input name="nombre5"		id="nombre5"	type="text"	style="width:5.80cm; display:none" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 7.50cm; top: 5.61cm"><input name="cedula5"		id="cedula5"	type="text"	style="width:1.80cm; display:none" maxlength="10" pattern="^(?:[0-9]{8,10})$"></div>
	<div style="position:absolute; left:10.00cm; top: 5.61cm"><input name="cargo5"		id="cargo5"		type="text"	style="width:5.80cm; display:none" maxlength="20" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<script>
		var
				c = document.getElementById("cantidad");
			 n1 = document.getElementById("nombre1");  n2 = document.getElementById("nombre2");  n3 = document.getElementById("nombre3");  n4 = document.getElementById("nombre4");  n5 = document.getElementById("nombre5");
			cc1 = document.getElementById("cedula1"); cc2 = document.getElementById("cedula2"); cc3 = document.getElementById("cedula3"); cc4 = document.getElementById("cedula4"); cc5 = document.getElementById("cedula5");
			cg1 = document.getElementById("cargo1");  cg2 = document.getElementById("cargo2");  cg3 = document.getElementById("cargo3");  cg4 = document.getElementById("cargo4");  cg5 = document.getElementById("cargo5");
		document.getElementById("cantidad").addEventListener("blur", function(e) {
			if (c.value == 0) {
			 c.value = 1;
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = true;   n2.style.display = "none";
 			 cc2.disabled = true;  cc2.style.display = "none";
 			 cg2.disabled = true;  cg2.style.display = "none";
			  n3.disabled = true;   n3.style.display = "none";
 			 cc3.disabled = true;  cc3.style.display = "none";
 			 cg3.disabled = true;  cg3.style.display = "none";
 			  n4.disabled = true;   n4.style.display = "none";
 			 cc4.disabled = true;  cc4.style.display = "none";
 			 cg4.disabled = true;  cg4.style.display = "none";
			  n5.disabled = true;   n5.style.display = "none";
 			 cc5.disabled = true;  cc5.style.display = "none";
 			 cg5.disabled = true;  cg5.style.display = "none";};
			if (c.value == 1) {
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = true;   n2.style.display = "none";
 			 cc2.disabled = true;  cc2.style.display = "none";
 			 cg2.disabled = true;  cg2.style.display = "none";
			  n3.disabled = true;   n3.style.display = "none";
 			 cc3.disabled = true;  cc3.style.display = "none";
 			 cg3.disabled = true;  cg3.style.display = "none";
 			  n4.disabled = true;   n4.style.display = "none";
 			 cc4.disabled = true;  cc4.style.display = "none";
 			 cg4.disabled = true;  cg4.style.display = "none";
			  n5.disabled = true;   n5.style.display = "none";
 			 cc5.disabled = true;  cc5.style.display = "none";
 			 cg5.disabled = true;  cg5.style.display = "none";
 			 };
			if (c.value == 2) {
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = true;   n3.style.display = "none";
 			 cc3.disabled = true;  cc3.style.display = "none";
 			 cg3.disabled = true;  cg3.style.display = "none";
 			  n4.disabled = true;   n4.style.display = "none";
 			 cc4.disabled = true;  cc4.style.display = "none";
 			 cg4.disabled = true;  cg4.style.display = "none";
			  n5.disabled = true;   n5.style.display = "none";
 			 cc5.disabled = true;  cc5.style.display = "none";
 			 cg5.disabled = true;  cg5.style.display = "none";
			 };
			if (c.value == 3) {
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
 			  n4.disabled = true;   n4.style.display = "none";
 			 cc4.disabled = true;  cc4.style.display = "none";
 			 cg4.disabled = true;  cg4.style.display = "none";
			  n5.disabled = true;   n5.style.display = "none";
 			 cc5.disabled = true;  cc5.style.display = "none";
 			 cg5.disabled = true;  cg5.style.display = "none";
			 };
			if (c.value == 4) {
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = true;   n5.style.display = "none";
 			 cc5.disabled = true;  cc5.style.display = "none";
 			 cg5.disabled = true;  cg5.style.display = "none";
			 };
			if (c.value == 5) {
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = false;  n5.style.display = "block";  n5.required = true;
 			 cc5.disabled = false; cc5.style.display = "block"; cc5.required = true;
 			 cg5.disabled = false; cg5.style.display = "block"; cg5.required = true;
			 };
			if (c.value == 6) {
			 c.value = 5;
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = false;  n5.style.display = "block";  n5.required = true;
 			 cc5.disabled = false; cc5.style.display = "block"; cc5.required = true;
 			 cg5.disabled = false; cg5.style.display = "block"; cg5.required = true;
			 };
			if (c.value == 7) {
			 c.value = 5;
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = false;  n5.style.display = "block";  n5.required = true;
 			 cc5.disabled = false; cc5.style.display = "block"; cc5.required = true;
 			 cg5.disabled = false; cg5.style.display = "block"; cg5.required = true;
			 };
			if (c.value == 8) {
			 c.value = 5;
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = false;  n5.style.display = "block";  n5.required = true;
 			 cc5.disabled = false; cc5.style.display = "block"; cc5.required = true;
 			 cg5.disabled = false; cg5.style.display = "block"; cg5.required = true;
			 };
			if (c.value == 9) {
			 c.value = 5;
			  n1.disabled = false;  n1.style.display = "block";  n1.required = true;
 			 cc1.disabled = false; cc1.style.display = "block"; cc1.required = true;
 			 cg1.disabled = false; cg1.style.display = "block"; cg1.required = true;
			  n2.disabled = false;  n2.style.display = "block";  n2.required = true;
 			 cc2.disabled = false; cc2.style.display = "block"; cc2.required = true;
 			 cg2.disabled = false; cg2.style.display = "block"; cg2.required = true;
			  n3.disabled = false;  n3.style.display = "block";  n3.required = true;
 			 cc3.disabled = false; cc3.style.display = "block"; cc3.required = true;
 			 cg3.disabled = false; cg3.style.display = "block"; cg3.required = true;
			  n4.disabled = false;  n4.style.display = "block";  n4.required = true;
 			 cc4.disabled = false; cc4.style.display = "block"; cc4.required = true;
 			 cg4.disabled = false; cg4.style.display = "block"; cg4.required = true;
			  n5.disabled = false;  n5.style.display = "block";  n5.required = true;
 			 cc5.disabled = false; cc5.style.display = "block"; cc5.required = true;
 			 cg5.disabled = false; cg5.style.display = "block"; cg5.required = true;
			 }});
	</script>

<!-- *****************************************			 sección B			 ***************************************** -->

	<div style="position:absolute; left: 7.50cm; top: 7.05cm"><input name="fechaB1"								id="fechaB1"							type="date" onfocusout="d1()" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left: 8.05cm; top: 7.43cm"><input name="num_cert_habil1"				id="num_cert_habil1"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left: 8.40cm; top: 7.75cm"><input name="num_pers_ejecutan1"		id="num_pers_ejecutan1"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left: 8.40cm; top: 8.05cm"><input name="num_pers_autoreporte1"	id="num_pers_autoreporte1"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left: 7.85cm; top: 8.32cm"><input name="hora_inicio1"					id="hora_inicio1"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left: 7.85cm; top: 8.62cm"><input name="hora_final1"						id="hora_final1"					type="time" 									value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 9.68cm; top: 7.05cm"><input name="fechaB2"								id="fechaB2"							type="date" onfocusout="d2()" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:10.23cm; top: 7.43cm"><input name="num_cert_habil2"				id="num_cert_habil2"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left:10.58cm; top: 7.75cm"><input name="num_pers_ejecutan2"		id="num_pers_ejecutan2"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:10.58cm; top: 8.05cm"><input name="num_pers_autoreporte2"	id="num_pers_autoreporte2"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:10.03cm; top: 8.32cm"><input name="hora_inicio2"					id="hora_inicio2"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:10.03cm; top: 8.62cm"><input name="hora_final2"						id="hora_final2"					type="time" 									value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left:11.86cm; top: 7.05cm"><input name="fechaB3"								id="fechaB3"							type="date" onfocusout="d3()"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:12.41cm; top: 7.43cm"><input name="num_cert_habil3"				id="num_cert_habil3"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left:12.76cm; top: 7.75cm"><input name="num_pers_ejecutan3"		id="num_pers_ejecutan3"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:12.76cm; top: 8.05cm"><input name="num_pers_autoreporte3"	id="num_pers_autoreporte3"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:12.21cm; top: 8.32cm"><input name="hora_inicio3"					id="hora_inicio3"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:12.21cm; top: 8.62cm"><input name="hora_final3"						id="hora_final3"					type="time" 									value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left:14.04cm; top: 7.05cm"><input name="fechaB4"								id="fechaB4"							type="date" onfocusout="d4()"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:14.59cm; top: 7.43cm"><input name="num_cert_habil4"				id="num_cert_habil4"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left:14.94cm; top: 7.75cm"><input name="num_pers_ejecutan4"		id="num_pers_ejecutan4"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:14.94cm; top: 8.05cm"><input name="num_pers_autoreporte4"	id="num_pers_autoreporte4"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:14.39cm; top: 8.32cm"><input name="hora_inicio4"					id="hora_inicio4"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:14.39cm; top: 8.62cm"><input name="hora_final4"						id="hora_final4"					type="time" 									value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left:16.22cm; top: 7.05cm"><input name="fechaB5"								id="fechaB5"							type="date" onfocusout="d5()"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:16.77cm; top: 7.43cm"><input name="num_cert_habil5"				id="num_cert_habil5"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left:17.12cm; top: 7.75cm"><input name="num_pers_ejecutan5"		id="num_pers_ejecutan5"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:17.12cm; top: 8.05cm"><input name="num_pers_autoreporte5"	id="num_pers_autoreporte5"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:16.57cm; top: 8.32cm"><input name="hora_inicio5"					id="hora_inicio5"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:16.57cm; top: 8.62cm"><input name="hora_final5"						id="hora_final5"					type="time" 									value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left:18.40cm; top: 7.05cm"><input name="fechaB6"								id="fechaB6"							type="date" onfocusout="d6()"	min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.95cm; top: 7.43cm"><input name="num_cert_habil6"				id="num_cert_habil6"			type="text" 									style="width: 1.00cm; display:block; text-align:center"	maxlength="6" pattern="^(?:[0-9]{4,6})$"></div>
	<div style="position:absolute; left:19.30cm; top: 7.75cm"><input name="num_pers_ejecutan6"		id="num_pers_ejecutan6"		type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:19.30cm; top: 8.05cm"><input name="num_pers_autoreporte6"	id="num_pers_autoreporte6"type="text" 									style="width: 0.30cm; display:block; text-align:center"	maxlength="1" pattern="^(?:[0-5]{1})$"></div>
	<div style="position:absolute; left:18.75cm; top: 8.32cm"><input name="hora_inicio6"					id="hora_inicio6"					type="time" 									value="<?echo date("H:i");?>" required></div>
	<div style="position:absolute; left:18.75cm; top: 8.62cm"><input name="hora_final6"						id="hora_final6"					type="time" 									value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left:13.40cm; top:10.26cm"><input name="tipo_esp_conf"	id="tipo_esp_conf"	type="radio" value="1" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:14.05cm; top:10.26cm"><input name="tipo_esp_conf"	id="tipo_esp_conf1"	type="radio" value="2" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.64cm; top:10.26cm"><input name="grado_peligro"	id="grado_peligro"	type="radio" value="A" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.29cm; top:10.26cm"><input name="grado_peligro"	id="grado_peligro1"	type="radio" value="B" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.94cm; top:10.26cm"><input name="grado_peligro"	id="grado_peligro2"	type="radio" value="C" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:13.79cm; top:10.70cm"><input id="fechaB11" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:13.58cm; top:11.20cm"><input name="C1_1"	id="C1_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:11.20cm"><input name="C1_1"	id="C1a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:11.20cm"><input name="C1_1"	id="C1b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:11.55cm"><input name="C2_1"	id="C2_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:11.55cm"><input name="C2_1"	id="C2a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:11.55cm"><input name="C2_1"	id="C2b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:11.77cm"><input name="C3_1"	id="C3_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:11.77cm"><input name="C3_1"	id="C3a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:11.77cm"><input name="C3_1"	id="C3b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:11.99cm"><input name="C4_1"	id="C4_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:11.99cm"><input name="C4_1"	id="C4a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:11.99cm"><input name="C4_1"	id="C4b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:12.21cm"><input name="C5_1"	id="C5_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:12.21cm"><input name="C5_1"	id="C5a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:12.21cm"><input name="C5_1"	id="C5b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:12.43cm"><input name="C6_1"	id="C6_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:12.43cm"><input name="C6_1"	id="C6a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:12.43cm"><input name="C6_1"	id="C6b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:12.65cm"><input name="C7_1"	id="C7_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:12.65cm"><input name="C7_1"	id="C7a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:12.65cm"><input name="C7_1"	id="C7b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:13.00cm"><input name="C8_1"	id="C8_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:13.00cm"><input name="C8_1"	id="C8a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:13.00cm"><input name="C8_1"	id="C8b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:13.33cm"><input name="C9_1"	id="C9_1"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:13.33cm"><input name="C9_1"	id="C9a_1"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:13.33cm"><input name="C9_1"	id="C9b_1"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:13.55cm"><input name="C10_1"	id="C10_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:13.55cm"><input name="C10_1"	id="C10a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:13.55cm"><input name="C10_1"	id="C10b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:13.77cm"><input name="C11_1"	id="C11_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:13.77cm"><input name="C11_1"	id="C11a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:13.77cm"><input name="C11_1"	id="C11b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:13.99cm"><input name="C12_1"	id="C12_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:13.99cm"><input name="C12_1"	id="C12a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:13.99cm"><input name="C12_1"	id="C12b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:14.35cm"><input name="C13_1"	id="C13_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:14.35cm"><input name="C13_1"	id="C13a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:14.35cm"><input name="C13_1"	id="C13b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:14.67cm"><input name="C14_1"	id="C14_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:14.67cm"><input name="C14_1"	id="C14a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:14.67cm"><input name="C14_1"	id="C14b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:14.89cm"><input name="C15_1"	id="C15_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:14.89cm"><input name="C15_1"	id="C15a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:14.89cm"><input name="C15_1"	id="C15b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:15.11cm"><input name="C16_1"	id="C16_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:15.11cm"><input name="C16_1"	id="C16a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:15.11cm"><input name="C16_1"	id="C16b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:15.33cm"><input name="C17_1"	id="C17_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:15.33cm"><input name="C17_1"	id="C17a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:15.33cm"><input name="C17_1"	id="C17b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:15.55cm"><input name="C18_1"	id="C18_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:15.55cm"><input name="C18_1"	id="C18a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:15.55cm"><input name="C18_1"	id="C18b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:15.77cm"><input name="C19_1"	id="C19_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:15.77cm"><input name="C19_1"	id="C19a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:15.77cm"><input name="C19_1"	id="C19b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:15.99cm"><input name="C20_1"	id="C20_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:15.99cm"><input name="C20_1"	id="C20a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:15.99cm"><input name="C20_1"	id="C20b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:16.21cm"><input name="C21_1"	id="C21_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:16.21cm"><input name="C21_1"	id="C21a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:16.21cm"><input name="C21_1"	id="C21b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:16.43cm"><input name="C22_1"	id="C22_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:16.43cm"><input name="C22_1"	id="C22a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:16.43cm"><input name="C22_1"	id="C22b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:16.65cm"><input name="C23_1"	id="C23_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:16.65cm"><input name="C23_1"	id="C23a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:16.65cm"><input name="C23_1"	id="C23b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:17.09cm"><input name="C24_1"	id="C24_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:17.09cm"><input name="C24_1"	id="C24a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:17.09cm"><input name="C24_1"	id="C24b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:17.31cm"><input name="C25_1"	id="C25_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:17.31cm"><input name="C25_1"	id="C25a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:17.31cm"><input name="C25_1"	id="C25b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:17.53cm"><input name="C26_1"	id="C26_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:17.53cm"><input name="C26_1"	id="C26a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:17.53cm"><input name="C26_1"	id="C26b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:17.75cm"><input name="C27_1"	id="C27_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:17.75cm"><input name="C27_1"	id="C27a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:17.75cm"><input name="C27_1"	id="C27b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:17.97cm"><input name="C28_1"	id="C28_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:17.97cm"><input name="C28_1"	id="C28a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:17.97cm"><input name="C28_1"	id="C28b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:18.19cm"><input name="C29_1"	id="C29_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:18.19cm"><input name="C29_1"	id="C29a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:18.19cm"><input name="C29_1"	id="C29b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:18.41cm"><input name="C30_1"	id="C30_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:18.41cm"><input name="C30_1"	id="C30a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:18.41cm"><input name="C30_1"	id="C30b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:18.63cm"><input name="C31_1"	id="C31_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:18.63cm"><input name="C31_1"	id="C31a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:18.63cm"><input name="C31_1"	id="C31b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:18.85cm"><input name="C32_1"	id="C32_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:18.85cm"><input name="C32_1"	id="C32a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:18.85cm"><input name="C32_1"	id="C32b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:19.07cm"><input name="C33_1"	id="C33_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:19.07cm"><input name="C33_1"	id="C33a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:19.07cm"><input name="C33_1"	id="C33b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:13.58cm; top:19.29cm"><input name="C34_1"	id="C34_1"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:13.95cm; top:19.29cm"><input name="C34_1"	id="C34a_1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.35cm; top:19.29cm"><input name="C34_1"	id="C34b_1" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:14.97cm; top:10.70cm"><input id="fechaB21" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:14.76cm; top:11.20cm"><input name="C1_2"	id="C1_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:11.20cm"><input name="C1_2"	id="C1a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:11.20cm"><input name="C1_2"	id="C1b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:11.55cm"><input name="C2_2"	id="C2_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:11.55cm"><input name="C2_2"	id="C2a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:11.55cm"><input name="C2_2"	id="C2b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:11.77cm"><input name="C3_2"	id="C3_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:11.77cm"><input name="C3_2"	id="C3a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:11.77cm"><input name="C3_2"	id="C3b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:11.99cm"><input name="C4_2"	id="C4_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:11.99cm"><input name="C4_2"	id="C4a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:11.99cm"><input name="C4_2"	id="C4b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:12.21cm"><input name="C5_2"	id="C5_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:12.21cm"><input name="C5_2"	id="C5a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:12.21cm"><input name="C5_2"	id="C5b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:12.43cm"><input name="C6_2"	id="C6_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:12.43cm"><input name="C6_2"	id="C6a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:12.43cm"><input name="C6_2"	id="C6b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:12.65cm"><input name="C7_2"	id="C7_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:12.65cm"><input name="C7_2"	id="C7a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:12.65cm"><input name="C7_2"	id="C7b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:13.00cm"><input name="C8_2"	id="C8_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:13.00cm"><input name="C8_2"	id="C8a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:13.00cm"><input name="C8_2"	id="C8b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:13.33cm"><input name="C9_2"	id="C9_2"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:13.33cm"><input name="C9_2"	id="C9a_2"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:13.33cm"><input name="C9_2"	id="C9b_2"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:13.55cm"><input name="C10_2"	id="C10_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:13.55cm"><input name="C10_2"	id="C10a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:13.55cm"><input name="C10_2"	id="C10b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:13.77cm"><input name="C11_2"	id="C11_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:13.77cm"><input name="C11_2"	id="C11a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:13.77cm"><input name="C11_2"	id="C11b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:13.99cm"><input name="C12_2"	id="C12_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:13.99cm"><input name="C12_2"	id="C12a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:13.99cm"><input name="C12_2"	id="C12b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:14.35cm"><input name="C13_2"	id="C13_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:14.35cm"><input name="C13_2"	id="C13a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:14.35cm"><input name="C13_2"	id="C13b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:14.67cm"><input name="C14_2"	id="C14_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:14.67cm"><input name="C14_2"	id="C14a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:14.67cm"><input name="C14_2"	id="C14b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:14.89cm"><input name="C15_2"	id="C15_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:14.89cm"><input name="C15_2"	id="C15a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:14.89cm"><input name="C15_2"	id="C15b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:15.11cm"><input name="C16_2"	id="C16_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:15.11cm"><input name="C16_2"	id="C16a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:15.11cm"><input name="C16_2"	id="C16b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:15.33cm"><input name="C17_2"	id="C17_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:15.33cm"><input name="C17_2"	id="C17a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:15.33cm"><input name="C17_2"	id="C17b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:15.55cm"><input name="C18_2"	id="C18_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:15.55cm"><input name="C18_2"	id="C18a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:15.55cm"><input name="C18_2"	id="C18b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:15.77cm"><input name="C19_2"	id="C19_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:15.77cm"><input name="C19_2"	id="C19a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:15.77cm"><input name="C19_2"	id="C19b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:15.99cm"><input name="C20_2"	id="C20_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:15.99cm"><input name="C20_2"	id="C20a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:15.99cm"><input name="C20_2"	id="C20b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:16.21cm"><input name="C21_2"	id="C21_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:16.21cm"><input name="C21_2"	id="C21_2a" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:16.21cm"><input name="C21_2"	id="C21b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:16.43cm"><input name="C22_2"	id="C22_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:16.43cm"><input name="C22_2"	id="C22a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:16.43cm"><input name="C22_2"	id="C22b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:16.65cm"><input name="C23_2"	id="C23_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:16.65cm"><input name="C23_2"	id="C23a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:16.65cm"><input name="C23_2"	id="C23b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:17.09cm"><input name="C24_2"	id="C24_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:17.09cm"><input name="C24_2"	id="C24a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:17.09cm"><input name="C24_2"	id="C24b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:17.31cm"><input name="C25_2"	id="C25_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:17.31cm"><input name="C25_2"	id="C25a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:17.31cm"><input name="C25_2"	id="C25b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:17.53cm"><input name="C26_2"	id="C26_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:17.53cm"><input name="C26_2"	id="C26a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:17.53cm"><input name="C26_2"	id="C26b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:17.75cm"><input name="C27_2"	id="C27_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:17.75cm"><input name="C27_2"	id="C27a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:17.75cm"><input name="C27_2"	id="C27b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:17.97cm"><input name="C28_2"	id="C28_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:17.97cm"><input name="C28_2"	id="C28a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:17.97cm"><input name="C28_2"	id="C28b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:18.19cm"><input name="C29_2"	id="C29_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:18.19cm"><input name="C29_2"	id="C29a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:18.19cm"><input name="C29_2"	id="C29b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:18.41cm"><input name="C30_2"	id="C30_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:18.41cm"><input name="C30_2"	id="C30a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:18.41cm"><input name="C30_2"	id="C30b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:18.63cm"><input name="C31_2"	id="C31_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:18.63cm"><input name="C31_2"	id="C31a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:18.63cm"><input name="C31_2"	id="C31b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:18.85cm"><input name="C32_2"	id="C32_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:18.85cm"><input name="C32_2"	id="C32a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:18.85cm"><input name="C32_2"	id="C32b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:19.07cm"><input name="C33_2"	id="C33_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:19.07cm"><input name="C33_2"	id="C33a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:19.07cm"><input name="C33_2"	id="C33b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:14.76cm; top:19.29cm"><input name="C34_2"	id="C34_2"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:15.13cm; top:19.29cm"><input name="C34_2"	id="C34a_2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.53cm; top:19.29cm"><input name="C34_2"	id="C34b_2" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:16.15cm; top:10.70cm"><input id="fechaB31" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:15.94cm; top:11.20cm"><input name="C1_3"	id="C1_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:11.20cm"><input name="C1_3"	id="C1a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:11.20cm"><input name="C1_3"	id="C1b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:11.55cm"><input name="C2_3"	id="C2_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:11.55cm"><input name="C2_3"	id="C2a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:11.55cm"><input name="C2_3"	id="C2b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:11.77cm"><input name="C3_3"	id="C3_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:11.77cm"><input name="C3_3"	id="C3a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:11.77cm"><input name="C3_3"	id="C3b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:11.99cm"><input name="C4_3"	id="C4_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:11.99cm"><input name="C4_3"	id="C4a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:11.99cm"><input name="C4_3"	id="C4b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:12.21cm"><input name="C5_3"	id="C5_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:12.21cm"><input name="C5_3"	id="C5a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:12.21cm"><input name="C5_3"	id="C5b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:12.43cm"><input name="C6_3"	id="C6_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:12.43cm"><input name="C6_3"	id="C6a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:12.43cm"><input name="C6_3"	id="C6b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:12.65cm"><input name="C7_3"	id="C7_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:12.65cm"><input name="C7_3"	id="C7a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:12.65cm"><input name="C7_3"	id="C7b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:13.00cm"><input name="C8_3"	id="C8_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:13.00cm"><input name="C8_3"	id="C8a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:13.00cm"><input name="C8_3"	id="C8b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:13.33cm"><input name="C9_3"	id="C9_3"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:13.33cm"><input name="C9_3"	id="C9a_3"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:13.33cm"><input name="C9_3"	id="C9b_3"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:13.55cm"><input name="C10_3"	id="C10_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:13.55cm"><input name="C10_3"	id="C10a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:13.55cm"><input name="C10_3"	id="C10b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:13.77cm"><input name="C11_3"	id="C11_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:13.77cm"><input name="C11_3"	id="C11a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:13.77cm"><input name="C11_3"	id="C11b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:13.99cm"><input name="C12_3"	id="C12_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:13.99cm"><input name="C12_3"	id="C12a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:13.99cm"><input name="C12_3"	id="C12b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:14.35cm"><input name="C13_3"	id="C13_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:14.35cm"><input name="C13_3"	id="C13a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:14.35cm"><input name="C13_3"	id="C13b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:14.67cm"><input name="C14_3"	id="C14_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:14.67cm"><input name="C14_3"	id="C14a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:14.67cm"><input name="C14_3"	id="C14b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:14.89cm"><input name="C15_3"	id="C15_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:14.89cm"><input name="C15_3"	id="C15a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:14.89cm"><input name="C15_3"	id="C15b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:15.11cm"><input name="C16_3"	id="C16_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:15.11cm"><input name="C16_3"	id="C16a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:15.11cm"><input name="C16_3"	id="C16b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:15.33cm"><input name="C17_3"	id="C17_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:15.33cm"><input name="C17_3"	id="C17a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:15.33cm"><input name="C17_3"	id="C17b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:15.55cm"><input name="C18_3"	id="C18_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:15.55cm"><input name="C18_3"	id="C18a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:15.55cm"><input name="C18_3"	id="C18b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:15.77cm"><input name="C19_3"	id="C19_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:15.77cm"><input name="C19_3"	id="C19a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:15.77cm"><input name="C19_3"	id="C19b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:15.99cm"><input name="C20_3"	id="C20_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:15.99cm"><input name="C20_3"	id="C20a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:15.99cm"><input name="C20_3"	id="C20b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:16.21cm"><input name="C21_3"	id="C21_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:16.21cm"><input name="C21_3"	id="C21a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:16.21cm"><input name="C21_3"	id="C21b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:16.43cm"><input name="C22_3"	id="C22_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:16.43cm"><input name="C22_3"	id="C22a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:16.43cm"><input name="C22_3"	id="C22b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:16.65cm"><input name="C23_3"	id="C23_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:16.65cm"><input name="C23_3"	id="C23a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:16.65cm"><input name="C23_3"	id="C23b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:17.09cm"><input name="C24_3"	id="C24_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:17.09cm"><input name="C24_3"	id="C24a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:17.09cm"><input name="C24_3"	id="C24b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:17.31cm"><input name="C25_3"	id="C25_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:17.31cm"><input name="C25_3"	id="C25a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:17.31cm"><input name="C25_3"	id="C25b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:17.53cm"><input name="C26_3"	id="C26_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:17.53cm"><input name="C26_3"	id="C26a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:17.53cm"><input name="C26_3"	id="C26b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:17.75cm"><input name="C27_3"	id="C27_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:17.75cm"><input name="C27_3"	id="C27a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:17.75cm"><input name="C27_3"	id="C27b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:17.97cm"><input name="C28_3"	id="C28_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:17.97cm"><input name="C28_3"	id="C28a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:17.97cm"><input name="C28_3"	id="C28b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:18.19cm"><input name="C29_3"	id="C29_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:18.19cm"><input name="C29_3"	id="C29a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:18.19cm"><input name="C29_3"	id="C29b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:18.41cm"><input name="C30_3"	id="C30_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:18.41cm"><input name="C30_3"	id="C30a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:18.41cm"><input name="C30_3"	id="C30b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:18.63cm"><input name="C31_3"	id="C31_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:18.63cm"><input name="C31_3"	id="C31a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:18.63cm"><input name="C31_3"	id="C31b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:18.85cm"><input name="C32_3"	id="C32_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:18.85cm"><input name="C32_3"	id="C32a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:18.85cm"><input name="C32_3"	id="C32b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:19.07cm"><input name="C33_3"	id="C33_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:19.07cm"><input name="C33_3"	id="C33a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:19.07cm"><input name="C33_3"	id="C33b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.94cm; top:19.29cm"><input name="C34_3"	id="C34_3"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:16.31cm; top:19.29cm"><input name="C34_3"	id="C34a_3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:16.71cm; top:19.29cm"><input name="C34_3"	id="C34b_3" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:17.33cm; top:10.70cm"><input id="fechaB41" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:17.12cm; top:11.20cm"><input name="C1_4"	id="C1_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:11.20cm"><input name="C1_4"	id="C1a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:11.20cm"><input name="C1_4"	id="C1b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:11.55cm"><input name="C2_4"	id="C2_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:11.55cm"><input name="C2_4"	id="C2a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:11.55cm"><input name="C2_4"	id="C2b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:11.77cm"><input name="C3_4"	id="C3_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:11.77cm"><input name="C3_4"	id="C3a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:11.77cm"><input name="C3_4"	id="C3b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:11.99cm"><input name="C4_4"	id="C4_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:11.99cm"><input name="C4_4"	id="C4a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:11.99cm"><input name="C4_4"	id="C4b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:12.21cm"><input name="C5_4"	id="C5_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:12.21cm"><input name="C5_4"	id="C5a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:12.21cm"><input name="C5_4"	id="C5b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:12.43cm"><input name="C6_4"	id="C6_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:12.43cm"><input name="C6_4"	id="C6a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:12.43cm"><input name="C6_4"	id="C6b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:12.65cm"><input name="C7_4"	id="C7_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:12.65cm"><input name="C7_4"	id="C7a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:12.65cm"><input name="C7_4"	id="C7b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:13.00cm"><input name="C8_4"	id="C8_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:13.00cm"><input name="C8_4"	id="C8a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:13.00cm"><input name="C8_4"	id="C8b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:13.33cm"><input name="C9_4"	id="C9_4"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:13.33cm"><input name="C9_4"	id="C9a_4"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:13.33cm"><input name="C9_4"	id="C9b_4"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:13.55cm"><input name="C10_4"	id="C10_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:13.55cm"><input name="C10_4"	id="C10a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:13.55cm"><input name="C10_4"	id="C10b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:13.77cm"><input name="C11_4"	id="C11_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:13.77cm"><input name="C11_4"	id="C11a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:13.77cm"><input name="C11_4"	id="C11b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:13.99cm"><input name="C12_4"	id="C12_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:13.99cm"><input name="C12_4"	id="C12a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:13.99cm"><input name="C12_4"	id="C12b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:14.35cm"><input name="C13_4"	id="C13_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:14.35cm"><input name="C13_4"	id="C13a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:14.35cm"><input name="C13_4"	id="C13b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:14.67cm"><input name="C14_4"	id="C14_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:14.67cm"><input name="C14_4"	id="C14a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:14.67cm"><input name="C14_4"	id="C14b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:14.89cm"><input name="C15_4"	id="C15_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:14.89cm"><input name="C15_4"	id="C15a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:14.89cm"><input name="C15_4"	id="C15b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:15.11cm"><input name="C16_4"	id="C16_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:15.11cm"><input name="C16_4"	id="C16a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:15.11cm"><input name="C16_4"	id="C16b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:15.33cm"><input name="C17_4"	id="C17_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:15.33cm"><input name="C17_4"	id="C17a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:15.33cm"><input name="C17_4"	id="C17b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:15.55cm"><input name="C18_4"	id="C18_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:15.55cm"><input name="C18_4"	id="C18a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:15.55cm"><input name="C18_4"	id="C18b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:15.77cm"><input name="C19_4"	id="C19_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:15.77cm"><input name="C19_4"	id="C19a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:15.77cm"><input name="C19_4"	id="C19b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:15.99cm"><input name="C20_4"	id="C20_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:15.99cm"><input name="C20_4"	id="C20a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:15.99cm"><input name="C20_4"	id="C20b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:16.21cm"><input name="C21_4"	id="C21_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:16.21cm"><input name="C21_4"	id="C21a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:16.21cm"><input name="C21_4"	id="C21b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:16.43cm"><input name="C22_4"	id="C22_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:16.43cm"><input name="C22_4"	id="C22a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:16.43cm"><input name="C22_4"	id="C22b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:16.65cm"><input name="C23_4"	id="C23_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:16.65cm"><input name="C23_4"	id="C23a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:16.65cm"><input name="C23_4"	id="C23b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:17.09cm"><input name="C24_4"	id="C24_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:17.09cm"><input name="C24_4"	id="C24a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:17.09cm"><input name="C24_4"	id="C24b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:17.31cm"><input name="C25_4"	id="C25_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:17.31cm"><input name="C25_4"	id="C25a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:17.31cm"><input name="C25_4"	id="C25b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:17.53cm"><input name="C26_4"	id="C26_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:17.53cm"><input name="C26_4"	id="C26a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:17.53cm"><input name="C26_4"	id="C26b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:17.75cm"><input name="C27_4"	id="C27_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:17.75cm"><input name="C27_4"	id="C27a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:17.75cm"><input name="C27_4"	id="C27b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:17.97cm"><input name="C28_4"	id="C28_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:17.97cm"><input name="C28_4"	id="C28a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:17.97cm"><input name="C28_4"	id="C28b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:18.19cm"><input name="C29_4"	id="C29_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:18.19cm"><input name="C29_4"	id="C29a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:18.19cm"><input name="C29_4"	id="C29b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:18.41cm"><input name="C30_4"	id="C30_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:18.41cm"><input name="C30_4"	id="C30a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:18.41cm"><input name="C30_4"	id="C30b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:18.63cm"><input name="C31_4"	id="C31_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:18.63cm"><input name="C31_4"	id="C31a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:18.63cm"><input name="C31_4"	id="C31b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:18.85cm"><input name="C32_4"	id="C32_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:18.85cm"><input name="C32_4"	id="C32a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:18.85cm"><input name="C32_4"	id="C32b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:19.07cm"><input name="C33_4"	id="C33_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:19.07cm"><input name="C33_4"	id="C33a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:19.07cm"><input name="C33_4"	id="C33b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.12cm; top:19.29cm"><input name="C34_4"	id="C34_4"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:17.49cm; top:19.29cm"><input name="C34_4"	id="C34a_4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:17.89cm; top:19.29cm"><input name="C34_4"	id="C34b_4" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:18.51cm; top:10.70cm"><input id="fechaB51" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:18.30cm; top:11.20cm"><input name="C1_5"	id="C1_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:11.20cm"><input name="C1_5"	id="C1a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:11.20cm"><input name="C1_5"	id="C1b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:11.55cm"><input name="C2_5"	id="C2_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:11.55cm"><input name="C2_5"	id="C2a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:11.55cm"><input name="C2_5"	id="C2b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:11.77cm"><input name="C3_5"	id="C3_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:11.77cm"><input name="C3_5"	id="C3a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:11.77cm"><input name="C3_5"	id="C3b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:11.99cm"><input name="C4_5"	id="C4_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:11.99cm"><input name="C4_5"	id="C4a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:11.99cm"><input name="C4_5"	id="C4b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:12.21cm"><input name="C5_5"	id="C5_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:12.21cm"><input name="C5_5"	id="C5a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:12.21cm"><input name="C5_5"	id="C5b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:12.43cm"><input name="C6_5"	id="C6_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:12.43cm"><input name="C6_5"	id="C6a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:12.43cm"><input name="C6_5"	id="C6b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:12.65cm"><input name="C7_5"	id="C7_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:12.65cm"><input name="C7_5"	id="C7a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:12.65cm"><input name="C7_5"	id="C7b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:13.00cm"><input name="C8_5"	id="C8_5" 	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:13.00cm"><input name="C8_5"	id="C8a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:13.00cm"><input name="C8_5"	id="C8b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:13.33cm"><input name="C9_5"	id="C9_5"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:13.33cm"><input name="C9_5"	id="C9a_5"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:13.33cm"><input name="C9_5"	id="C9b_5"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:13.55cm"><input name="C10_5"	id="C10_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:13.55cm"><input name="C10_5"	id="C10a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:13.55cm"><input name="C10_5"	id="C10b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:13.77cm"><input name="C11_5"	id="C11_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:13.77cm"><input name="C11_5"	id="C11a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:13.77cm"><input name="C11_5"	id="C11b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:13.99cm"><input name="C12_5"	id="C12_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:13.99cm"><input name="C12_5"	id="C12a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:13.99cm"><input name="C12_5"	id="C12b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:14.35cm"><input name="C13_5"	id="C13_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:14.35cm"><input name="C13_5"	id="C13a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:14.35cm"><input name="C13_5"	id="C13b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:14.67cm"><input name="C14_5"	id="C14_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:14.67cm"><input name="C14_5"	id="C14a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:14.67cm"><input name="C14_5"	id="C14b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:14.89cm"><input name="C15_5"	id="C15_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:14.89cm"><input name="C15_5"	id="C15a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:14.89cm"><input name="C15_5"	id="C15b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:15.11cm"><input name="C16_5"	id="C16_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:15.11cm"><input name="C16_5"	id="C16a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:15.11cm"><input name="C16_5"	id="C16b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:15.33cm"><input name="C17_5"	id="C17_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:15.33cm"><input name="C17_5"	id="C17a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:15.33cm"><input name="C17_5"	id="C17b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:15.55cm"><input name="C18_5"	id="C18_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:15.55cm"><input name="C18_5"	id="C18a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:15.55cm"><input name="C18_5"	id="C18b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:15.77cm"><input name="C19_5"	id="C19_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:15.77cm"><input name="C19_5"	id="C19a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:15.77cm"><input name="C19_5"	id="C19b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:15.99cm"><input name="C20_5"	id="C20_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:15.99cm"><input name="C20_5"	id="C20a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:15.99cm"><input name="C20_5"	id="C20b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:16.21cm"><input name="C21_5"	id="C21_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:16.21cm"><input name="C21_5"	id="C21a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:16.21cm"><input name="C21_5"	id="C21b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:16.43cm"><input name="C22_5"	id="C22_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:16.43cm"><input name="C22_5"	id="C22a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:16.43cm"><input name="C22_5"	id="C22b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:16.65cm"><input name="C23_5"	id="C23_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:16.65cm"><input name="C23_5"	id="C23a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:16.65cm"><input name="C23_5"	id="C23b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:17.09cm"><input name="C24_5"	id="C24_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:17.09cm"><input name="C24_5"	id="C24a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:17.09cm"><input name="C24_5"	id="C24b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:17.31cm"><input name="C25_5"	id="C25_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:17.31cm"><input name="C25_5"	id="C25a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:17.31cm"><input name="C25_5"	id="C25b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:17.53cm"><input name="C26_5"	id="C26_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:17.53cm"><input name="C26_5"	id="C26a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:17.53cm"><input name="C26_5"	id="C26b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:17.75cm"><input name="C27_5"	id="C27_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:17.75cm"><input name="C27_5"	id="C27a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:17.75cm"><input name="C27_5"	id="C27b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:17.97cm"><input name="C28_5"	id="C28_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:17.97cm"><input name="C28_5"	id="C28a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:17.97cm"><input name="C28_5"	id="C28b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:18.19cm"><input name="C29_5"	id="C29_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:18.19cm"><input name="C29_5"	id="C29a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:18.19cm"><input name="C29_5"	id="C29b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:18.41cm"><input name="C30_5"	id="C30_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:18.41cm"><input name="C30_5"	id="C30a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:18.41cm"><input name="C30_5"	id="C30b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:18.63cm"><input name="C31_5"	id="C31_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:18.63cm"><input name="C31_5"	id="C31a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:18.63cm"><input name="C31_5"	id="C31b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:18.85cm"><input name="C32_5"	id="C32_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:18.85cm"><input name="C32_5"	id="C32a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:18.85cm"><input name="C32_5"	id="C32b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:19.07cm"><input name="C33_5"	id="C33_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:19.07cm"><input name="C33_5"	id="C33a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:19.07cm"><input name="C33_5"	id="C33b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.30cm; top:19.29cm"><input name="C34_5"	id="C34_5"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:18.67cm; top:19.29cm"><input name="C34_5"	id="C34a_5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.07cm; top:19.29cm"><input name="C34_5"	id="C34b_5" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left:19.69cm; top:10.70cm"><input id="fechaB61" style="width:1.00cm; font-size:7.5px; background-color:rgba(255,0,0,0); border:0"	readonly></div>
	<div style="position:absolute; left:19.48cm; top:11.20cm"><input name="C1_6"	id="C1_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:11.20cm"><input name="C1_6"	id="C1a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:11.20cm"><input name="C1_6"	id="C1b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:11.55cm"><input name="C2_6"	id="C2_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:11.55cm"><input name="C2_6"	id="C2a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:11.55cm"><input name="C2_6"	id="C2b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:11.77cm"><input name="C3_6"	id="C3_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:11.77cm"><input name="C3_6"	id="C3a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:11.77cm"><input name="C3_6"	id="C3b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:11.99cm"><input name="C4_6"	id="C4_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:11.99cm"><input name="C4_6"	id="C4a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:11.99cm"><input name="C4_6"	id="C4b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:12.21cm"><input name="C5_6"	id="C5_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:12.21cm"><input name="C5_6"	id="C5a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:12.21cm"><input name="C5_6"	id="C5b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:12.43cm"><input name="C6_6"	id="C6_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:12.43cm"><input name="C6_6"	id="C6a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:12.43cm"><input name="C6_6"	id="C6b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:12.65cm"><input name="C7_6"	id="C7_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:12.65cm"><input name="C7_6"	id="C7a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:12.65cm"><input name="C7_6"	id="C7b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:13.00cm"><input name="C8_6"	id="C8_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:13.00cm"><input name="C8_6"	id="C8a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:13.00cm"><input name="C8_6"	id="C8b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:13.33cm"><input name="C9_6"	id="C9_6"		type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:13.33cm"><input name="C9_6"	id="C9a_6"	type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:13.33cm"><input name="C9_6"	id="C9b_6"	type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:13.55cm"><input name="C10_6"	id="C10_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:13.55cm"><input name="C10_6"	id="C10a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:13.55cm"><input name="C10_6"	id="C10b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:13.77cm"><input name="C11_6"	id="C11_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:13.77cm"><input name="C11_6"	id="C11a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:13.77cm"><input name="C11_6"	id="C11b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:13.99cm"><input name="C12_6"	id="C12_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:13.99cm"><input name="C12_6"	id="C12a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:13.99cm"><input name="C12_6"	id="C12b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:14.35cm"><input name="C13_6"	id="C13_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:14.35cm"><input name="C13_6"	id="C13a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:14.35cm"><input name="C13_6"	id="C13b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:14.67cm"><input name="C14_6"	id="C14_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:14.67cm"><input name="C14_6"	id="C14a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:14.67cm"><input name="C14_6"	id="C14b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:14.89cm"><input name="C15_6"	id="C15_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:14.89cm"><input name="C15_6"	id="C15a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:14.89cm"><input name="C15_6"	id="C15b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:15.11cm"><input name="C16_6"	id="C16_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:15.11cm"><input name="C16_6"	id="C16a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:15.11cm"><input name="C16_6"	id="C16b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:15.33cm"><input name="C17_6"	id="C17_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:15.33cm"><input name="C17_6"	id="C17a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:15.33cm"><input name="C17_6"	id="C17b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:15.55cm"><input name="C18_6"	id="C18_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:15.55cm"><input name="C18_6"	id="C18a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:15.55cm"><input name="C18_6"	id="C18b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:15.77cm"><input name="C19_6"	id="C19_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:15.77cm"><input name="C19_6"	id="C19a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:15.77cm"><input name="C19_6"	id="C19b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:15.99cm"><input name="C20_6"	id="C20_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:15.99cm"><input name="C20_6"	id="C20a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:15.99cm"><input name="C20_6"	id="C20b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:16.21cm"><input name="C21_6"	id="C21_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:16.21cm"><input name="C21_6"	id="C21a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:16.21cm"><input name="C21_6"	id="C21b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:16.43cm"><input name="C22_6"	id="C22_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:16.43cm"><input name="C22_6"	id="C22a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:16.43cm"><input name="C22_6"	id="C22b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:16.65cm"><input name="C23_6"	id="C23_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:16.65cm"><input name="C23_6"	id="C23a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:16.65cm"><input name="C23_6"	id="C23b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:17.09cm"><input name="C24_6"	id="C24_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:17.09cm"><input name="C24_6"	id="C24a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:17.09cm"><input name="C24_6"	id="C24b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:17.31cm"><input name="C25_6"	id="C25_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:17.31cm"><input name="C25_6"	id="C25a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:17.31cm"><input name="C25_6"	id="C25b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:17.53cm"><input name="C26_6"	id="C26_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:17.53cm"><input name="C26_6"	id="C26a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:17.53cm"><input name="C26_6"	id="C26b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:17.75cm"><input name="C27_6"	id="C27_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:17.75cm"><input name="C27_6"	id="C27a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:17.75cm"><input name="C27_6"	id="C27b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:17.97cm"><input name="C28_6"	id="C28_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:17.97cm"><input name="C28_6"	id="C28a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:17.97cm"><input name="C28_6"	id="C28b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:18.19cm"><input name="C29_6"	id="C29_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:18.19cm"><input name="C29_6"	id="C29a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:18.19cm"><input name="C29_6"	id="C29b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:18.41cm"><input name="C30_6"	id="C30_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:18.41cm"><input name="C30_6"	id="C30a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:18.41cm"><input name="C30_6"	id="C30b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:18.63cm"><input name="C31_6"	id="C31_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:18.63cm"><input name="C31_6"	id="C31a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:18.63cm"><input name="C31_6"	id="C31b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:18.85cm"><input name="C32_6"	id="C32_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:18.85cm"><input name="C32_6"	id="C32a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:18.85cm"><input name="C32_6"	id="C32b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:19.07cm"><input name="C33_6"	id="C33_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:19.07cm"><input name="C33_6"	id="C33a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:19.07cm"><input name="C33_6"	id="C33b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.48cm; top:19.29cm"><input name="C34_6"	id="C34_6"	type="radio" value="SI" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:19.85cm; top:19.29cm"><input name="C34_6"	id="C34a_6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:20.25cm; top:19.29cm"><input name="C34_6"	id="C34b_6" type="radio" value="NA" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 0.90cm; top:20.12cm">
		<textarea name=observaciones type=text style="width:9.70cm; height:0.45cm" maxlength=68 onkeyup=mayuscula(this) pattern=.{1,} ng-pattern-restrict required></textarea>
	</div>
	<div style="position:absolute; left:10.90cm; top:20.12cm">
		<textarea name=herramientas  type=text style="width:9.70cm; height:0.45cm" maxlength=68 onkeyup=mayuscula(this) pattern=.{1,} ng-pattern-restrict required></textarea>
	</div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 2.90cm; top:21.85cm"><input name="ejecutorD"					type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:21.85cm"><input name="ejecutor_ccD"			type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:21.85cm"><input name="ejecutor_fechaD"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:21.85cm"><input name="ejecutor_horaD"		type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 2.90cm; top:22.20cm"><input name="supervisorD"				type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:22.20cm"><input name="supervisor_ccD"		type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:22.20cm"><input name="supervisor_fechaD"	type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:22.20cm"><input name="supervisor_horaD"	type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 2.90cm; top:22.55cm"><input name="vigiaD"						type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:22.55cm"><input name="vigia_ccD"					type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:22.55cm"><input name="vigia_fechaD"			type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:22.55cm"><input name="vigia_horaD"				type="time"		value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 2.90cm; top:24.15cm"><input name="emisorE"						type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:24.15cm"><input name="emisor_ccE"				type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:24.15cm"><input name="emisor_fechaE"			type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:24.15cm"><input name="emisor_horaE"			type="time"		value="<?echo date("H:i");?>" required></div>

<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 9.00cm; top:24.89cm"><input name="certificadoF"	id="A"	type="radio"	value="A" onclick="gestionarClickRadio(this)" required></div>
	<div style="position:absolute; left:12.40cm; top:24.89cm"><input name="certificadoF"	id="B"	type="radio"	value="B" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:15.80cm; top:24.89cm"><input name="certificadoF"	id="C"	type="radio"	value="C" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 2.90cm; top:25.50cm"><input name="ejecutorF"					type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:25.50cm"><input name="ejecutor_ccF"			type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:25.50cm"><input name="ejecutor_fechaF"		type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:25.50cm"><input name="ejecutor_horaF"		type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 2.90cm; top:25.85cm"><input name="supervisorF"				type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:25.85cm"><input name="supervisor_ccF"		type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:25.85cm"><input name="supervisor_fechaF"	type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:25.85cm"><input name="supervisor_horaF"	type="time"		value="<?echo date("H:i");?>" required></div>

	<div style="position:absolute; left: 2.90cm; top:26.55cm"><input name="emisorF"						type="text"		style="width: 5.90cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}" required></div>
	<div style="position:absolute; left:10.00cm; top:26.55cm"><input name="emisor_ccF"				type="text"		style="width: 1.80cm" maxlength="10" pattern="^(?:[0-9]{8,10})$" required></div>
	<div style="position:absolute; left:16.00cm; top:26.55cm"><input name="emisor_fechaF"			type="date"		style="display:none" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:19.00cm; top:26.55cm"><input name="emisor_horaF"			type="time"		value="<?echo date("H:i");?>" required></div>

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
	<div style="position:absolute; left:50%; margin-left:-106.0mm; top:70mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
