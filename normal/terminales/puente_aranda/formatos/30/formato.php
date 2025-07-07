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
	input[type="time"]::-webkit-calendar-picker-indicator {display:inline}
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/AlphaGit/ng-pattern-restrict/master/src/ng-pattern-restrict.min.js"></script>
<script type="text/javascript">
	var app = angular.module('textarea', ['ngPatternRestrict'])
	app.controller('controller', function ($scope) {});
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
	$fechamin = date ("Y-m-d", strtotime("-0 days", strtotime(date ("Y-m-d"))));
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
	<div style="position:absolute; left:18.15cm; top:0.60cm">
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

	<div style="position:absolute; left: 18.15cm; top: 0.40cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,0.33); border:0" readonly></div>
	<div style="position:absolute; left: 18.20cm; top: 0.55cm"><span  style="color:rgba(0,0,0,0.33); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 9.00cm; top: 2.75cm"><input name="batch_ecopetrol"		type="text" style="width: 1.5cm; text-align:center" maxlength="6" placeholder="######" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required autofocus></div>
	<div style="position:absolute; left: 9.00cm; top: 3.35cm"><input name="carta_liberacion"	type="text" style="width: 1.5cm; text-align:center" maxlength="6" placeholder="######" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>
	<div style="position:absolute; left:17.85cm; top: 2.75cm"><input name="fechaA"						type="date" style="width: 2.2cm" min="<?echo $fechamin;?>" max="<?echo $fechamax;?>" value="<?echo $fechaactual;?>" title="Solo se aceptan fechas entre el <?echo $fechamin;?> y <?echo $fechamax;?>." required></div>
	<div style="position:absolute; left:18.50cm; top: 3.35cm"><input name="despacho"					type="text" style="width: 1.5cm; text-align:center" maxlength="6" placeholder="######" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números." required></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top: 4.80cm"><input name="compania"					type="text" style="width: 6.80cm; text-align:center" maxlength="52" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 6.00cm; top: 5.40cm"><input name="placasCTK"					type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 6.00cm; top: 6.00cm"><input name="guia_transporte"		type="text" style="width: 2.40cm; text-align:center" maxlength="16" pattern="^(?:[0-9]{8,16})$" title="Debe ingresar mínimo 8 números." required></div>
	<div style="position:absolute; left: 8.40cm; top: 6.60cm"><input name="volumen_bruto"			type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="12345.99" title="Debe ingresar mínimo 4 números." required></div>
	<div style="position:absolute; left: 8.40cm; top: 7.20cm"><input name="temp_despacho"			type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top: 7.80cm"><input name="gravedad_API_X1"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top: 8.40cm"><input name="gravedad_API1"			type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top: 9.00cm"><input name="gravedad_espec1"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top: 9.60cm"><input name="factor_correccion"	type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top:10.20cm"><input name="vol_neto_despacho"	type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" title="Debe ingresar mínimo 4 números." required></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 8.40cm; top:11.65cm"><input name="TK_despachador"		type="text" style="width: 1.20cm; text-align:center" maxlength="3" pattern="^(?:[0-9]{3})$"	 title="Debe ingresar 3 números" required></div>
	<div style="position:absolute; left: 8.40cm; top:12.25cm"><input name="gravedad_API2"			type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top:12.85cm"><input name="gravedad_espec2"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.40cm; top:14.30cm"><input name="aparienciaCTK"			type="text" style="width: 1.20cm; text-align:center" maxlength=" 3" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left: 8.40cm; top:14.90cm"><input name="diferenciaAPI1"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>
	<div style="position:absolute; left: 8.40cm; top:16.10cm"><input name="gravedad_espec_CTK_TK1"	type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" title="Debe ingresar mínimo 1 número" required></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left:15.30cm; top: 4.80cm"><input name="aerop_recibidor"		type="text" style="width: 5.00cm" maxlength="52" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:18.70cm; top: 5.40cm"><input name="aparienciaTK"			type="text" style="width: 1.20cm; text-align:center" maxlength=" 3" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);" required></div>
	<div style="position:absolute; left:18.70cm; top: 6.00cm"><input name="gravedad_API_X2"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top: 6.60cm"><input name="gravedad_API3"			type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top: 7.20cm"><input name="gravedad_espec3"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top: 7.80cm"><input name="diferenciaAPI2"		type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top: 9.00cm"><input name="gravedad_espec_CTK_TK2"	type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>

<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top:11.65cm"><input name="tiquete"											type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:12.25cm"><input name="lectura_inicial"							type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:12.85cm"><input name="lectura_final"								type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:13.45cm"><input name="vol_bruto"										type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:14.05cm"><input name="temp_recibo"									type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:14.65cm"><input name="gravedad_API4"								type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:15.25cm"><input name="factor_correccion_volumen1"	type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:15.85cm"><input name="vol_neto_recibido"						type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:16.45cm"><input name="variacion_despacho_recibido"	type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top:17.90cm"><input name="TK_recibo_aerop"							type="text" style="width: 1.20cm; text-align:center" maxlength="3" pattern="^(?:[0-9]{1,3})$" required></div>
	<div style="position:absolute; left:18.70cm; top:18.50cm"><input name="medida_inicial"							type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:18.70cm; top:19.10cm"><input name="medida_final"								type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" title="123.99" required></div>
	<div style="position:absolute; left:18.70cm; top:19.70cm"><input name="vol_bruto_tabla_aforo"				type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:20.30cm"><input name="gravedad_APIC"								type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:20.90cm"><input name="gravedad_API5"								type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:21.50cm"><input name="temp_TK"											type="text" style="width: 1.20cm; text-align:center" maxlength="6" pattern="^(([0-9]){1,3}?(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:22.10cm"><input name="factor_correccion_volumen2"	type="text" style="width: 1.20cm; text-align:center" maxlength="4" pattern="^(([0-9])(.\d)(\d)?)$" required></div>
	<div style="position:absolute; left:18.70cm; top:22.70cm"><input name="vol_neto"										type="text" style="width: 1.20cm; text-align:center" maxlength="8" pattern="^(([0-9]){1,5}?(.\d)(\d)?)$" required></div>

<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top:20.67cm"><input name="nombre_rep_term_desp"	type="text" style="width: 6.50cm" maxlength="32" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 4.00cm; top:23.90cm"><input name="nombre_conductor"			type="text" style="width: 6.50cm" maxlength="32" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:13.60cm; top:23.90cm"><input name="nombre_rep_aeropuerto"	type="text" style="width: 6.50cm" maxlength="32" pattern="^(?:[a-z A-Z [0-9].ÁáÉéÍíÓóÚúÜüÑñ/-_]+)$" onkeyup="mayuscula(this);"></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:26.40cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:270mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <? echo number_format($consec_por_usar,0,',','.'); ?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:26.70cm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:26.70cm; width:107.5mm; text-align:left; background-color:rgba(255,0,0,0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-98.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.60cm; top:26.40cm">
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
