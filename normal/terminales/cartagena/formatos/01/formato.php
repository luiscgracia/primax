<!-- naranja PRIMAX rgba(255,112,0,1) -->
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
//	$fecha = date("Y-m-d / H:i");
	include ("consecutivos".$formato.".php");
	include ("../../conectar_db.php");
	include ("../../../../../common/conectar_db_usuarios.php");
	include ("../../../../usuarios.php");
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
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
//	date_default_timezone_set('America/Bogota');
//	$fechaactual = date("Y-m-d");
//	$horaactual = date("g:i A");
//	$fechamin = date ("Y-m-d", strtotime("-1 days", strtotime(date ("Y-m-d"))));
//	$fechamax = date ("Y-m-d", strtotime("+0 days", strtotime(date ("Y-m-d"))));
	$conexion->close();
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<br><br><b>".$$formulario.$aviso.$contacto;
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,0.25*60*1000); document.body.innerHTML = '$aviso_pedido';</script>";}
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

	<div style="position:absolute; left: 18.15cm; top: 0.70cm"><input name="estado" type="text" value=<? echo $estado_formulario1; ?> style="font-size:7px; background-color:rgba(0,0,0,0); color:rgba(0,0,0,0.33); border:0" readonly></div>
	<div style="position:absolute; left: 18.20cm; top: 0.85cm"><span  style="color:rgba(0,0,0,0.33); font-family:Arlrdlt; font-size:7px"><? echo strtoupper($terminal); ?></span></div>

	<div style="position:absolute; left: 3.40cm; top: 2.25cm"><input name="instalacion" type="text" style="width:13.20cm" maxlength="68" pattern=".{1,}" onkeyup="mayuscula(this);" autofocus></div>
	<div style="position:absolute; left:19.05cm; top: 2.25cm"><input name="certificado" type="text" style="width: 1.00cm; text-align:center" maxlength="6"  pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 3.20cm; top: 3.05cm"><input name="ubicacion"		type="text" style="width:12.20cm" maxlength="63" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:19.05cm; top: 3.05cm"><input name="apt"					type="text" style="width: 1.00cm; text-align:center"	maxlength="6"  pattern="^(?:[0-9]{4,6})$"  title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 4.00cm; top: 3.35cm"><input name="equipo"			type="text" style="width: 1.80cm; text-align:center" maxlength="10" pattern="^(?:[0-9]{4,10})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 9.10cm; top: 3.35cm"><input name="fechaA"			type="date" min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>" title="Solo se aceptan fechas entre el <? echo $fechamin; ?> y <? echo $fechamax; ?>."></div>
	<div style="position:absolute; left:14.10cm; top: 3.35cm"><input name="horainicioA"	type="time" value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left:18.40cm; top: 3.35cm"><input name="horafinalA"	type="time" value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left: 5.50cm; top: 3.70cm"><input name="descripcion" type="text" style="width:13.20cm" maxlength="74" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:12.33cm; top: 4.61cm"><input name="cambio" id="cambioA" type="radio" value="CME" onclick="gestionarClickRadio(this)" title="Debe escoger una opción."></div>
	<div style="position:absolute; left:12.33cm; top: 4.93cm"><input name="cambio" id="cambioB" type="radio" value="CDE" onclick="gestionarClickRadio(this);"></div>
	<div style="position:absolute; left:16.90cm; top: 4.95cm">
		<input name="pedidocambio" id="pedidocambio" type="text" style="width:1.35cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números.">
		<script>
			var pedidocambio = document.getElementById('pedidocambio');
			document.getElementById('cambioA').addEventListener('click', function(e) {pedidocambio.disabled = true;  pedidocambio.style.display = "none";});
			document.getElementById('cambioB').addEventListener('click', function(e) {pedidocambio.disabled = false; pedidocambio.style.display = "block"; pedidocambio.required = true;});
		</script>
	</div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 9.62cm; top: 6.08cm"><input name= "C1" id= "C1" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 6.08cm"><input name= "C1" id= "c1" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 6.38cm"><input name= "C2" id= "C2" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 6.38cm"><input name= "C2" id= "c2" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 6.68cm"><input name= "C3" id= "C3" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 6.68cm"><input name= "C3" id= "c3" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 6.98cm"><input name= "C4" id= "C4" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 6.98cm"><input name= "C4" id= "c4" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 7.28cm"><input name= "C5" id= "C5" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 7.28cm"><input name= "C5" id= "c5" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 7.58cm"><input name= "C6" id= "C6" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 7.58cm"><input name= "C6" id= "c6" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 7.88cm"><input name= "C7" id= "C7" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 7.88cm"><input name= "C7" id= "c7" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 8.18cm"><input name= "C8" id= "C8" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 8.18cm"><input name= "C8" id= "c8" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 8.48cm"><input name= "C9" id= "C9" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 8.48cm"><input name= "C9" id= "c9" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 8.78cm"><input name="C10" id="C10" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 8.78cm"><input name="C10" id="c10" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 9.08cm"><input name="C11" id="C11" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 9.08cm"><input name="C11" id="c11" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 9.38cm"><input name="C12" id="C12" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 9.38cm"><input name="C12" id="c12" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 9.68cm"><input name="C13" id="C13" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 9.68cm"><input name="C13" id="c13" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top: 9.98cm"><input name="C14" id="C14" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top: 9.98cm"><input name="C14" id="c14" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top:10.28cm"><input name="C15" id="C15" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top:10.28cm"><input name="C15" id="c15" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top:10.58cm"><input name="C16" id="C16" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top:10.58cm"><input name="C16" id="c16" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
				<!-- **************************************			 sección EXCAVACION			 ************************************** -->
	<div style="position:absolute; left: 9.62cm; top:11.18cm"><input name="C17" id="C17" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top:11.18cm"><input name="C17" id="c17" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top:11.48cm"><input name="C18" id="C18" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top:11.48cm"><input name="C18" id="c18" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left: 9.62cm; top:11.78cm"><input name="C19" id="C19" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.22cm; top:11.78cm"><input name="C19" id="c19" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
				<!-- ********************************			 cambio de columna de preguntas			 ******************************** -->
				<!-- ********************************			 sección SUSTANCIAS PELIGROSAS			 ******************************** -->
	<div style="position:absolute; left:18.92cm; top: 6.38cm"><input name="C20" id="C20" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 6.38cm"><input name="C20" id="c20" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 6.68cm"><input name="C21" id="C21" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 6.68cm"><input name="C21" id="c21" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 6.98cm"><input name="C22" id="C22" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 6.98cm"><input name="C22" id="c22" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
				<!-- ********************************			 sección FUENTES DE IGNICIÓN				 ******************************** -->
	<div style="position:absolute; left:18.92cm; top: 7.58cm"><input name="C23" id="C23" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 7.58cm"><input name="C23" id="c23" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 7.88cm"><input name="C24" id="C24" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 7.88cm"><input name="C24" id="c24" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 8.18cm"><input name="C25" id="C25" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 8.18cm"><input name="C25" id="c25" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 8.48cm"><input name="C26" id="C26" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 8.48cm"><input name="C26" id="c26" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 8.78cm"><input name="C27" id="C27" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 8.78cm"><input name="C27" id="c27" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 9.08cm"><input name="C28" id="C28" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 9.08cm"><input name="C28" id="c28" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
				<!-- ********************************			  sección ENERGÍAS PELIGROSAS				 ******************************** -->
	<div style="position:absolute; left:18.92cm; top: 9.68cm"><input name="C29" id="C29" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 9.68cm"><input name="C29" id="c29" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top: 9.98cm"><input name="C30" id="C30" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top: 9.98cm"><input name="C30" id="c30" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:10.28cm"><input name="C31" id="C31" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:10.28cm"><input name="C31" id="c31" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:10.58cm"><input name="C32" id="C32" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:10.58cm"><input name="C32" id="c32" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:10.88cm"><input name="C33" id="C33" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:10.88cm"><input name="C33" id="c33" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:11.18cm"><input name="C34" id="C34" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:11.18cm"><input name="C34" id="c34" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:11.63cm"><input name="C35" id="C35" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:11.63cm"><input name="C35" id="c35" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:18.92cm; top:12.08cm"><input name="C36" id="C36" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:19.52cm; top:12.08cm"><input name="C36" id="c36" type="radio" value="NO" onclick="gestionarClickRadio(this)"></div>

	<div style="position:absolute; left: 7.65cm; top:12.50cm"><input name="otrasactividades" type="text" style="width:13.20cm" maxlength="63" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.60cm; top:13.82cm"><input name="D1"				id="D1"					type="checkbox" onChange="comprobarD1(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:13.88cm"><input name="numeroD1"	id="numeroD1"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 8.60cm; top:14.12cm"><input name="D2"				id="D2"					type="checkbox" onChange="comprobarD2(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:14.18cm"><input name="numeroD2"	id="numeroD2"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 8.60cm; top:14.42cm"><input name="D3"				id="D3"					type="checkbox" onChange="comprobarD3(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:14.48cm"><input name="numeroD3"	id="numeroD3"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 8.60cm; top:14.72cm"><input name="D4"				id="D4"					type="checkbox" onChange="comprobarD4(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:14.78cm"><input name="numeroD4"	id="numeroD4"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 8.60cm; top:15.02cm"><input name="D5"				id="D5"					type="checkbox" onChange="comprobarD5(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:15.08cm"><input name="numeroD5"	id="numeroD5"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left: 8.60cm; top:15.32cm"><input name="D6"				id="D6"					type="checkbox" onChange="comprobarD6(this)"></div>
	<div style="position:absolute; left: 9.35cm; top:15.38cm"><input name="numeroD6"	id="numeroD6"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
				<!-- ********************************			 cambio de columna de preguntas			 ******************************** -->
	<div style="position:absolute; left:17.60cm; top:13.82cm"><input name="D7"				id="D7"					type="checkbox" onChange="comprobarD7(this)"></div>
	<div style="position:absolute; left:18.35cm; top:13.88cm"><input name="numeroD7"	id="numeroD7"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left:17.60cm; top:14.12cm"><input name="D8"				id="D8"					type="checkbox" onChange="comprobarD8(this)"></div>
	<div style="position:absolute; left:18.35cm; top:14.18cm"><input name="numeroD8"	id="numeroD8"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left:17.60cm; top:14.42cm"><input name="D9"				id="D9"					type="checkbox" onChange="comprobarD9(this)"></div>
	<div style="position:absolute; left:18.35cm; top:14.48cm"><input name="numeroD9"	id="numeroD9"		type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left:17.60cm; top:14.72cm"><input name="D10"				id="D10"				type="checkbox" onChange="comprobarD10(this)"></div>
	<div style="position:absolute; left:18.35cm; top:14.78cm"><input name="numeroD10"	id="numeroD10"	type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left:17.60cm; top:15.02cm"><input name="D11"				id="D11"				type="checkbox" onChange="comprobarD11(this)"></div>
	<div style="position:absolute; left:18.35cm; top:15.08cm"><input name="numeroD11"	id="numeroD11"	type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	<div style="position:absolute; left:17.60cm; top:15.32cm"><input name="D12"				id="D12"				type="checkbox" onChange="comprobarD12(this)"></div>
	<div style="position:absolute; left:18.35cm; top:15.38cm"><input name="numeroD12"	id="numeroD12"	type="text"			style="width:0.90cm; text-align:center; display:none" maxlength="6" pattern="^(?:[0-9]{4,6})$" title="Debe ingresar mínimo 4 números."></div>
	
<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 1.95cm; top:16.35cm"><input name="precauciones" type="text" style="width:15.00cm" maxlength="90" pattern=".{1,}" onkeyup="mayuscula(this);"></div>

<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 3.55cm; top:17.84cm"><input name="empleado"		id="empleadop"	type="radio"	value="E"  onclick="gestionarClickRadio(this)" title="Debe escoger una opción."></div>
	<div style="position:absolute; left: 9.82cm; top:17.84cm"><input name="empleado"		id="empleadocp"	type="radio"	value="CP" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:12.30cm; top:17.90cm"><input name="companiacp"	id="companiacp"	type="text"		style="width:5.00cm; display:none" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}"></div>
	<script>
		var companiacp = document.getElementById('companiacp'); companiact = document.getElementById('companiact');
		document.getElementById('empleadop').addEventListener('click', function(e) {companiacp.disabled = true; companiacp.style.display = "none";});
		document.getElementById('empleadop').addEventListener('click', function(e) {companiact.disabled = true; companiact.style.display = "none";});
		document.getElementById('empleadocp').addEventListener('click', function(e) {companiacp.disabled = false; companiacp.style.display = "block"; companiacp.required = true;});
		document.getElementById('empleadocp').addEventListener('click', function(e) {companiact.disabled = true; companiact.style.display = "none";});
		/*
		document.getElementById('empleadoct').addEventListener('click', function(e) {companiacp.disabled = true; companiacp.style.display = "none";});
		document.getElementById('empleadoct').addEventListener('click', function(e) {companiact.disabled = false; companiact.style.display = "block"; companiact.required = true;});
		*/
	</script>

	<div style="position:absolute; left: 3.45cm; top:18.40cm"><input name="ejecutorF"		type="text"	style="width: 5.00cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}"></div>
	<div style="position:absolute; left:15.50cm; top:18.40cm"><input name="fechaejecF"	type="date"	min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>" title="Solo se aceptan fechas entre el <? echo $fechamin; ?> y <? echo $fechamax; ?>."></div>
	<div style="position:absolute; left:18.70cm; top:18.40cm"><input name="horaejecF"		type="time"	value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left: 3.45cm; top:18.80cm"><input name="inspectorF"	type="text"	style="width: 5.00cm" maxlength="30" onkeyup="mayuscula(this);" pattern=".{1,}"></div>
	<div style="position:absolute; left:15.50cm; top:18.80cm"><input name="fechainspF"	type="date"	min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>" title="Solo se aceptan fechas entre el <? echo $fechamin; ?> y <? echo $fechamax; ?>."></div>
	<div style="position:absolute; left:18.70cm; top:18.80cm"><input name="horainspF"		type="time"	value="<? echo date("H:i"); ?>"></div>

<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left:1.86cm; top:19.63cm"><input name="docum_adic" id="docum_adic_SI" type="radio" value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:1.86cm; top:19.97cm"><input name="docum_adic" id="docum_adic_NO" type="radio" value="NO" onclick="gestionarClickRadio(this);"></div>
	
	<div style="position:absolute; left:10.30cm; top:20.15cm"><input name="cantidad"	id="cantidad"	style="width: 0.30cm; display:none; text-align:center" maxlength="1" type="text" pattern="^(?:[1-7]{1})$" title="Mínimo 1 persona, máximo 7 personas."></div>
	<div style="position:absolute; left:14.10cm; top:20.15cm"><input name="nombre1"		id="nombre1"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 2.50cm; top:20.60cm"><input name="nombre2"		id="nombre2"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.30cm; top:20.60cm"><input name="nombre3"		id="nombre3"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.10cm; top:20.60cm"><input name="nombre4"		id="nombre4"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 2.50cm; top:21.05cm"><input name="nombre5"		id="nombre5"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left: 8.30cm; top:21.05cm"><input name="nombre6"		id="nombre6"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:14.10cm; top:21.05cm"><input name="nombre7"		id="nombre7"	style="width: 5.00cm; display:none" maxlength="30" type="text" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<script>
		var
			c = document.getElementById("cantidad");
			n1 = document.getElementById("nombre1");
			n2 = document.getElementById("nombre2");
			n3 = document.getElementById("nombre3");
			n4 = document.getElementById("nombre4");
			n5 = document.getElementById("nombre5");
			n6 = document.getElementById("nombre6");
			n7 = document.getElementById("nombre7");
		document.getElementById("docum_adic_SI").addEventListener("click", function(e) {
			c.style.display = "none"; c.disabled = true;
			n1.style.display = "none"; n1.disabled = true;
			n2.style.display = "none"; n2.disabled = true;
			n3.style.display = "none"; n3.disabled = true;
			n4.style.display = "none"; n4.disabled = true;
			n5.style.display = "none"; n5.disabled = true;
			n6.style.display = "none"; n6.disabled = true;
			n7.style.display = "none"; n7.disabled = true;});
		document.getElementById("docum_adic_NO").addEventListener("click", function(e) {c.disabled = false; c.style.display = "block"; c.required = true;});
		document.getElementById("cantidad").addEventListener("blur", function(e) {
			if (c.value <= 1) {c.value = 1;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = true; n2.style.display = "none";
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 n5.disabled = true; n5.style.display = "none";
			 n6.disabled = true; n6.style.display = "none";
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value == 2) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = true; n3.style.display = "none";
			 n4.disabled = true; n4.style.display = "none";
			 n5.disabled = true; n5.style.display = "none";
			 n6.disabled = true; n6.style.display = "none";
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value == 3) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = true; n4.style.display = "none";
			 n5.disabled = true; n5.style.display = "none";
			 n6.disabled = true; n6.style.display = "none";
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value == 4) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 n5.disabled = true; n5.style.display = "none";
			 n6.disabled = true; n6.style.display = "none";
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value == 5) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 n5.disabled = false; n5.style.display = "block"; n5.required = true;
			 n6.disabled = true; n6.style.display = "none";
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value == 6) {
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 n5.disabled = false; n5.style.display = "block"; n5.required = true;
			 n6.disabled = false; n6.style.display = "block"; n6.required = true;
			 n7.disabled = true; n7.style.display = "none";};
			if (c.value >= 7) {c.value = 7;
			 n1.disabled = false; n1.style.display = "block"; n1.required = true;
			 n2.disabled = false; n2.style.display = "block"; n2.required = true;
			 n3.disabled = false; n3.style.display = "block"; n3.required = true;
			 n4.disabled = false; n4.style.display = "block"; n4.required = true;
			 n5.disabled = false; n5.style.display = "block"; n5.required = true;
			 n6.disabled = false; n6.style.display = "block"; n6.required = true;
			 n7.disabled = false; n7.style.display = "block"; n7.required = true;}});
	</script>
	<div style="position:absolute; left: 3.45cm; top:21.50cm"><input name="aprobadorG"		type="text"	style="width: 5.00cm" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.50cm; top:21.50cm"><input name="fechaaprobG"		type="date"	min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>" title="Solo se aceptan fechas entre el <? echo $fechamin; ?> y <? echo $fechamax; ?>."></div>
	<div style="position:absolute; left:18.70cm; top:21.50cm"><input name="horaaprobG"		type="time"	value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left: 3.45cm; top:21.95cm"><input name="emisorG"				type="text"	style="width: 5.00cm" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:15.50cm; top:21.95cm"><input name="fechaemisorG"	type="date"	min="<? echo $fechamin; ?>" max="<? echo $fechamax; ?>" value="<? echo $fechaactual; ?>"	title="Solo se aceptan fechas entre el <? echo $fechamin; ?> y <? echo $fechamax; ?>."></div>
	<div style="position:absolute; left:18.70cm; top:21.95cm"><input name="horaemisorG"		type="time"	value="<? echo date("H:i"); ?>"></div>

<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left: 6.72cm; top:22.80cm"><input name="completado"	id="completadoSI" type="radio"value="SI" onclick="gestionarClickRadio(this)"></div>
	<div style="position:absolute; left:10.12cm; top:22.80cm"><input name="completado"	id="completadoNO" type="radio"value="NO" onclick="gestionarClickRadio(this);"></div>
	
	<div style="position:absolute; left: 3.45cm; top:23.27cm"><input name="ejecutorH"			type="text"	style="width: 5.00cm" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:23.27cm"><input name="horaejecH"			type="time"	value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left: 3.45cm; top:23.72cm"><input name="inspectorH"		type="text"	style="width: 5.00cm" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:23.72cm"><input name="horainspH"			type="time"	value="<? echo date("H:i"); ?>"></div>
	<div style="position:absolute; left: 3.45cm; top:24.62cm"><input name="emisorH"				type="text"	style="width: 5.00cm" maxlength="30" pattern=".{1,}" onkeyup="mayuscula(this);"></div>
	<div style="position:absolute; left:18.70cm; top:24.62cm"><input name="horaemisorH"		type="time"	value="<? echo date("H:i"); ?>"></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:266mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <? echo $fechaactual; ?> / <? echo $horaactual; ?></span>
		<input style="display:none; width:3.10cm" type="text" id="fecha" name="fecha" value="<? echo $fechaactual; ?> / <? echo $horaactual; ?>" readonly>
	</div>
<!--
	<div style="position:absolute; left:20mm; top:268mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Quedan <?echo number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span>
	</div>
-->
	<div style="position:absolute; left:50%; margin-left:-5mm; top:271mm; width:107.5mm; text-align:right; background-color:rgba(0,255,0,0.0)">
		<input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" title="Grabar información en la base de datos." width="25" height="auto"
		style="border:0px; height:25px; background-color:rgba(0,0,0,0)">
	</div>
	<div style="position:absolute; left:50%; margin-left:5mm; top:271mm; width:10mm; text-align:left; background-color:rgba(255,0,0,0.0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="25" height="auto" title="Cerrar esta pestaña sin modificar nada."></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-100.5mm; top:124mm; width:8mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos ?>"></a>
	</div>

	<div style="position:absolute; left:14.00cm; top:24.80cm">
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
</div>			<!-- cierre del div de las 2 hojas en PDF -->
</form>
</div>			<!-- cierre del div de imprimir -->
</div>			<!-- cierre del div de zoom -->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
