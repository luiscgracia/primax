<?
include ('../../../../../common/datos.php');
$formato = basename(dirname(__FILE__));
$formulario = "formulario".$formato."_title";
?>
<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<style>
	body		{font-family:Arlrdlt; font-size:12px; text-align:center; color:rgba(0,0,191,1)}
	button	{background-color:rgba(0,255,0,0.0); border:0px; border-radius:0px; cursor:pointer; height:25px}
	div.fecha			{font-size:10px; width:2cm}
	div.radio			{font-size:11px}
	div.checkbox	{font-size:15px}
	div.checkbox1	{font-size:10px}
	textarea 			{resize:none; font-family:Arlrdlt; font-size: 9.90px; line-height:190%; ; padding: 8px 5px 0px 5px; text-align:justify;
									color:rgba(0,0,191,1); background-color:rgba(255,0,0,0); border:0px}
	input {text-align:center}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
	document.title = '<? echo strtoupper($terminal); ?> - <? echo $$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 999) {echo "000";} else {if ($consecutivo <= 9999) {echo "00";} else {if ($consecutivo <= 99999) {echo "0";}}}}} echo $consecutivo;?>';
</script>
</head>
<body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/AlphaGit/ng-pattern-restrict/master/src/ng-pattern-restrict.min.js"></script>
<script type="text/javascript">var app = angular.module('textarea', ['ngPatternRestrict']); app.controller('controller', function ($scope) {})</script>
<?php
$tiro_peq = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro_peq.svg";
$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
setlocale(LC_TIME,'es_CO.UTF-8','esp');
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d / H:i");
$consec = $_POST['consec'];
$consulta = "SELECT * FROM formulario".$formato." WHERE consecutivo=$consec";
$resultado = $conexion->query($consulta) or die("Error en la conexión a la base de datos");
while ($row = $resultado->fetch_assoc()){extract($row);}
?>
<div class="zoom">
<!-- ***************************			 INICIO DEL FORMULARIO			 *************************** (368px = 97.25 mm alto)(816px = 215,9 mm ancho)(1056px = 279,4 mm alto) -->	
<div style="position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:3168px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0px; top:   0px"><img src="<? echo $tiro_peq; ?>"	style="width:816px; height:auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $tiro; ?>"			style="width:816px; height:auto"></div>
	<div style="position:absolute; left:0px; top:2112px"><img src="<? echo $retiro; ?>"		style="width:816px; height:auto"></div>

<!-- ------- TIRO PEQ ------- TIRO PEQ ------- TIRO PEQ ------- TIRO PEQ ------- TIRO PEQ ------- TIRO PEQ ------- TIRO PEQ ------- -->
	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.20cm; top:1.17cm; width:3cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.60cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.00cm; top:0.50cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.00cm; top:0.68cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?></span></div>

	<!-- *****************************************			 entrega tanque			 ***************************************** -->
	<div style="position:absolute; left:10.00cm; top:2.25cm"><?echo strtoupper($terminal);?></div>
	<div style="position:absolute; left: 2.50cm; top:3.15cm"><?echo $tanque;?></div>
	<div style="position:absolute; left: 0.50cm; top:4.00cm; width:5.00cm; font-size:10px"><?echo $producto;?></div>
	<div style="position:absolute; left: 5.70cm; top:3.85cm"><?echo date("d",strtotime($fechaA));?></div>
	<div style="position:absolute; left: 7.20cm; top:3.85cm"><?echo date("m",strtotime($fechaA));?></div>
	<div style="position:absolute; left: 8.55cm; top:3.85cm"><?echo date("Y",strtotime($fechaA));?></div>
	<div style="position:absolute; left:10.40cm; top:3.85cm; width:1.50cm"><?echo date("g:i A",strtotime($horaentrega));?></div>
	<div style="position:absolute; left:16.90cm; top:3.15cm; width:2.00cm; text-align:right"><?echo number_format($capacidad,2,',','.');?></div>
	<div style="position:absolute; left:16.90cm; top:3.85cm; width:2.00cm; text-align:right"><?echo number_format($nivel_llenado,2,',','.');?></div>

	<!-- *****************************************			 medicion automatica			 ***************************************** -->
	<div style="position:absolute; left: 2.00cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialA,2,',','.');?></div>
	<div style="position:absolute; left: 3.95cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialB,2,',','.');?></div>
	<div style="position:absolute; left: 5.60cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialC,2,',','.');?></div>
	<div style="position:absolute; left: 7.35cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialD,2,',','.');?></div>
	<div style="position:absolute; left: 8.60cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialE,2,',','.');?></div>
	<div style="position:absolute; left: 2.00cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalA,2,',','.');?></div>
	<div style="position:absolute; left: 3.95cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalB,2,',','.');?></div>
	<div style="position:absolute; left: 5.60cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalC,2,',','.');?></div>
	<div style="position:absolute; left: 7.35cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalD,2,',','.');?></div>
	<div style="position:absolute; left: 8.60cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalE,2,',','.');?></div>

	<!-- *****************************************			 contadores			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador1_inicial,2,',','.');?></div>
	<div style="position:absolute; left:12.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador2_inicial,2,',','.');?></div>
	<div style="position:absolute; left:14.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador3_inicial,2,',','.');?></div>
	<div style="position:absolute; left:16.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador4_inicial,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador5_inicial,2,',','.');?></div>
	<div style="position:absolute; left:10.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador1_final,2,',','.');?></div>
	<div style="position:absolute; left:12.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador2_final,2,',','.');?></div>
	<div style="position:absolute; left:14.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador3_final,2,',','.');?></div>
	<div style="position:absolute; left:16.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador4_final,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador5_final,2,',','.');?></div>

	<!-- *****************************************			 programa de bombeo			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top:7.50cm; width:2.00cm; text-align:right"><?echo number_format($volumen_recibir,2,',','.');?></div>
	<div style="position:absolute; left: 4.00cm; top:8.35cm; width:2.00cm; text-align:right"><?echo number_format($volumen_final,2,',','.');?></div>
	<div style="position:absolute; left: 4.00cm; top:9.15cm; width:2.00cm; text-align:right"><?echo number_format($medida_final,2,',','.');?></div>
	<div style="position:absolute; left:10.00cm; top:7.50cm; width:2.00cm; text-align:right"><?echo number_format($rata_bombeo,2,',','.');?></div>
	<div style="position:absolute; left:10.50cm; top:8.35cm; width:1.50cm"><?echo date ("g:i A", strtotime($hora_inicial));?></div>
	<div style="position:absolute; left:10.50cm; top:9.15cm; width:1.50cm"><?echo date ("g:i A", strtotime($hora_final));?></div>
	<div style="position:absolute; left:17.10cm; top:7.50cm; width:2.00cm; text-align:right"><?echo number_format($cupo_maximo,2,',','.');?></div>
	<div style="position:absolute; left:15.90cm; top:8.40cm; width:5.00cm; font-size:9px"><?echo substr($representante_planta,0,30);?></div>
	<div style="position:absolute; left:15.90cm; top:9.20cm; width:5.00cm; font-size:9px"><?echo substr($representante_poliducto,0,30);?></div>

	<div style="position:absolute; left:0cm; top:9.51cm"><hr style="width:21.58cm; border-top:1px dashed rgba(255,112,0,1)"></div>

<!-- ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- -->
	<!-- *****************************************			 encabezado formato			 ***************************************** -->
<div style="position:absolute; left:0%; top:27.94cm">
	<div style="position:absolute; left:18.20cm; top:1.17cm; width:3cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">&#8470;
		<?
		if ($consecutivo <= 9) {echo "00000";}
			else {if ($consecutivo <= 99) {echo "0000";}
				else {if ($consecutivo <= 999) {echo "000";}
					else {if ($consecutivo <= 9999) {echo "00";}
						else {if ($consecutivo <= 99999) {echo "0";}}}}}
		echo $consecutivo;
		?>
		</span>
	</div>

	<div style="position:relative; left: 9.00cm; top:0.60cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.00cm; top:0.50cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.00cm; top:0.68cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

	<!-- *****************************************			 entrega tanque			 ***************************************** -->
	<div style="position:absolute; left:10.00cm; top:2.25cm"><?echo strtoupper($terminal);?></div>
	<div style="position:absolute; left: 2.50cm; top:3.15cm"><?echo $tanque;?></div>
	<div style="position:absolute; left: 0.50cm; top:4.00cm; width:5.00cm; font-size:10px"><?echo $producto;?></div>

	<div style="position:absolute; left: 5.70cm; top:3.85cm"><?echo date("d",strtotime($fechaA));?></div>
	<div style="position:absolute; left: 7.20cm; top:3.85cm"><?echo date("m",strtotime($fechaA));?></div>
	<div style="position:absolute; left: 8.55cm; top:3.85cm"><?echo date("Y",strtotime($fechaA));?></div>
	<div style="position:absolute; left:10.40cm; top:3.85cm; width:1.50cm"><?echo date("g:i A",strtotime($horaentrega));?></div>
	<div style="position:absolute; left:16.50cm; top:3.15cm; width:2.00cm; text-align:right"><?echo number_format($capacidad,2,',','.');?></div>
	<div style="position:absolute; left:16.50cm; top:3.85cm; width:2.00cm; text-align:right"><?echo number_format($nivel_llenado,2,',','.');?></div>

	<!-- *****************************************			 medicion automatica			 ***************************************** -->
	<div style="position:absolute; left: 2.00cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialA,2,',','.');?></div>
	<div style="position:absolute; left: 3.95cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialB,2,',','.');?></div>
	<div style="position:absolute; left: 5.60cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialC,2,',','.');?></div>
	<div style="position:absolute; left: 7.35cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialD,2,',','.');?></div>
	<div style="position:absolute; left: 8.60cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_inicialE,2,',','.');?></div>
	<div style="position:absolute; left: 2.00cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalA,2,',','.');?></div>
	<div style="position:absolute; left: 3.95cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalB,2,',','.');?></div>
	<div style="position:absolute; left: 5.60cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalC,2,',','.');?></div>
	<div style="position:absolute; left: 7.35cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalD,2,',','.');?></div>
	<div style="position:absolute; left: 8.60cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($medicion_finalE,2,',','.');?></div>

	<!-- *****************************************			 contadores			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador1_inicial,2,',','.');?></div>
	<div style="position:absolute; left:12.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador2_inicial,2,',','.');?></div>
	<div style="position:absolute; left:14.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador3_inicial,2,',','.');?></div>
	<div style="position:absolute; left:16.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador4_inicial,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:5.80cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador5_inicial,2,',','.');?></div>
	<div style="position:absolute; left:10.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador1_final,2,',','.');?></div>
	<div style="position:absolute; left:12.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador2_final,2,',','.');?></div>
	<div style="position:absolute; left:14.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador3_final,2,',','.');?></div>
	<div style="position:absolute; left:16.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador4_final,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:6.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($contador5_final,2,',','.');?></div>

	<!-- *****************************************			 programa de bombeo			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top:7.55cm; width:2.00cm; text-align:right"><?echo number_format($volumen_recibir,2,',','.');?></div>
	<div style="position:absolute; left: 4.00cm; top:8.35cm; width:2.00cm; text-align:right"><?echo number_format($volumen_final,2,',','.');?></div>
	<div style="position:absolute; left: 4.00cm; top:9.15cm; width:2.00cm; text-align:right"><?echo number_format($medida_final,2,',','.');?></div>
	<div style="position:absolute; left:10.00cm; top:7.55cm; width:2.00cm; text-align:right"><?echo number_format($rata_bombeo,2,',','.');?></div>
	<div style="position:absolute; left:10.50cm; top:8.35cm; width:1.50cm"><?echo date ("g:i A", strtotime($hora_inicial));?></div>
	<div style="position:absolute; left:10.50cm; top:9.15cm; width:1.50cm"><?echo date ("g:i A", strtotime($hora_final));?></div>
	<div style="position:absolute; left:17.10cm; top:7.55cm; width:2.00cm; text-align:right"><?echo number_format($cupo_maximo,2,',','.');?></div>
	<div style="position:absolute; left:15.90cm; top:8.40cm; width:5.00cm; font-size:9px"><?echo substr($representante_planta,0,30);?></div>
	<div style="position:absolute; left:15.90cm; top:9.20cm; width:5.00cm; font-size:9px"><?echo substr($representante_poliducto,0,30);?></div>

	<div style="position:absolute; left:0cm; top:9.51cm"><hr style="width:21.58cm; border-top:1px dashed rgba(255,112,0,1)"></div>

<!-- ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- TIRO ------- -->
	<!-- *****************************************			 medicion inicial			 ***************************************** -->
	<div style="position:absolute; left: 2.60cm; top:10.85cm"><?echo $nivel1_mt;?></div>
	<div style="position:absolute; left: 4.30cm; top:10.85cm"><?echo $nivel1_cm;?></div>
	<div style="position:absolute; left: 6.00cm; top:10.85cm"><?echo $nivel1_mm;?></div>
	<div style="position:absolute; left: 2.60cm; top:11.35cm"><?echo $agua1_mt;?></div>
	<div style="position:absolute; left: 4.30cm; top:11.35cm"><?echo $agua1_cm;?></div>
	<div style="position:absolute; left: 6.00cm; top:11.35cm"><?echo $agua1_mm;?></div>
	<div style="position:absolute; left: 8.80cm; top:11.10cm"><?echo $temperatura1;?></div>

	<div style="position:absolute; left:18.60cm; top:10.05cm"><?if ($alarma_alto == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.45cm; top:10.05cm"><?if ($alarma_alto == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.60cm; top:10.40cm"><?if ($alarma_alto_alto == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.45cm; top:10.40cm"><?if ($alarma_alto_alto == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.15cm; top:11.30cm"><?if ($tanque_drenaje1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.60cm; top:11.30cm"><?if ($tanque_drenaje1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.15cm; top:11.30cm"><?if ($tanque_drenaje1 == 'NA') {echo '&#10006;';}?></div>

	<!-- *****************************************			 control horario de bombeo			 ***************************************** -->
	<div class="fecha" style="position:absolute; left: 0.73cm; top:13.85cm"><?echo $A1;?></div>
	<div style="position:absolute; left: 3.25cm; top:13.85cm"><?echo $A2;?></div>
	<div style="position:absolute; left: 4.85cm; top:13.85cm"><?echo $A3;?></div>
	<div style="position:absolute; left: 5.80cm; top:13.85cm"><?echo $A31;?></div>
	<div style="position:absolute; left: 6.50cm; top:13.85cm"><?echo $A32;?></div>
	<div style="position:absolute; left: 6.80cm; top:13.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($A4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:13.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($A5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:14.35cm"><?echo $B1;?></div>
	<div style="position:absolute; left: 3.25cm; top:14.35cm"><?echo $B2;?></div>
	<div style="position:absolute; left: 4.85cm; top:14.35cm"><?echo $B3;?></div>
	<div style="position:absolute; left: 5.80cm; top:14.35cm"><?echo $B31;?></div>
	<div style="position:absolute; left: 6.50cm; top:14.35cm"><?echo $B32;?></div>
	<div style="position:absolute; left: 6.80cm; top:14.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($B4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:14.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($B5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:14.85cm"><?echo $C1;?></div>
	<div style="position:absolute; left: 3.25cm; top:14.85cm"><?echo $C2;?></div>
	<div style="position:absolute; left: 4.85cm; top:14.85cm"><?echo $C3;?></div>
	<div style="position:absolute; left: 5.80cm; top:14.85cm"><?echo $C31;?></div>
	<div style="position:absolute; left: 6.50cm; top:14.85cm"><?echo $C32;?></div>
	<div style="position:absolute; left: 6.80cm; top:14.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($C4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:14.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($C5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:15.35cm"><?echo $D1;?></div>
	<div style="position:absolute; left: 3.25cm; top:15.35cm"><?echo $D2;?></div>
	<div style="position:absolute; left: 4.85cm; top:15.35cm"><?echo $D3;?></div>
	<div style="position:absolute; left: 5.80cm; top:15.35cm"><?echo $D31;?></div>
	<div style="position:absolute; left: 6.50cm; top:15.35cm"><?echo $D32;?></div>
	<div style="position:absolute; left: 6.80cm; top:15.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($D4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:15.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($D5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:15.85cm"><?echo $E1;?></div>
	<div style="position:absolute; left: 3.25cm; top:15.85cm"><?echo $E2;?></div>
	<div style="position:absolute; left: 4.85cm; top:15.85cm"><?echo $E3;?></div>
	<div style="position:absolute; left: 5.80cm; top:15.85cm"><?echo $E31;?></div>
	<div style="position:absolute; left: 6.50cm; top:15.85cm"><?echo $E32;?></div>
	<div style="position:absolute; left: 6.80cm; top:15.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($E4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:15.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($E5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:16.35cm"><?echo $F1;?></div>
	<div style="position:absolute; left: 3.25cm; top:16.35cm"><?echo $F2;?></div>
	<div style="position:absolute; left: 4.85cm; top:16.35cm"><?echo $F3;?></div>
	<div style="position:absolute; left: 5.80cm; top:16.35cm"><?echo $F31;?></div>
	<div style="position:absolute; left: 6.50cm; top:16.35cm"><?echo $F32;?></div>
	<div style="position:absolute; left: 6.80cm; top:16.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($F4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:16.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($F5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:16.85cm"><?echo $G1;?></div>
	<div style="position:absolute; left: 3.25cm; top:16.85cm"><?echo $G2;?></div>
	<div style="position:absolute; left: 4.85cm; top:16.85cm"><?echo $G3;?></div>
	<div style="position:absolute; left: 5.80cm; top:16.85cm"><?echo $G31;?></div>
	<div style="position:absolute; left: 6.50cm; top:16.85cm"><?echo $G32;?></div>
	<div style="position:absolute; left: 6.80cm; top:16.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($G4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:16.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($G5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:17.35cm"><?echo $H1;?></div>
	<div style="position:absolute; left: 3.25cm; top:17.35cm"><?echo $H2;?></div>
	<div style="position:absolute; left: 4.85cm; top:17.35cm"><?echo $H3;?></div>
	<div style="position:absolute; left: 5.80cm; top:17.35cm"><?echo $H31;?></div>
	<div style="position:absolute; left: 6.50cm; top:17.35cm"><?echo $H32;?></div>
	<div style="position:absolute; left: 6.80cm; top:17.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($H4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:17.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($H5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:17.85cm"><?echo $I1;?></div>
	<div style="position:absolute; left: 3.25cm; top:17.85cm"><?echo $I2;?></div>
	<div style="position:absolute; left: 4.85cm; top:17.85cm"><?echo $I3;?></div>
	<div style="position:absolute; left: 5.80cm; top:17.85cm"><?echo $I31;?></div>
	<div style="position:absolute; left: 6.50cm; top:17.85cm"><?echo $I32;?></div>
	<div style="position:absolute; left: 6.80cm; top:17.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($I4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:17.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($I5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:18.35cm"><?echo $J1;?></div>
	<div style="position:absolute; left: 3.25cm; top:18.35cm"><?echo $J2;?></div>
	<div style="position:absolute; left: 4.85cm; top:18.35cm"><?echo $J3;?></div>
	<div style="position:absolute; left: 5.80cm; top:18.35cm"><?echo $J31;?></div>
	<div style="position:absolute; left: 6.50cm; top:18.35cm"><?echo $J32;?></div>
	<div style="position:absolute; left: 6.80cm; top:18.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($J4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:18.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($J5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:18.85cm"><?echo $K1;?></div>
	<div style="position:absolute; left: 3.25cm; top:18.85cm"><?echo $K2;?></div>
	<div style="position:absolute; left: 4.85cm; top:18.85cm"><?echo $K3;?></div>
	<div style="position:absolute; left: 5.80cm; top:18.85cm"><?echo $K31;?></div>
	<div style="position:absolute; left: 6.50cm; top:18.85cm"><?echo $K32;?></div>
	<div style="position:absolute; left: 6.80cm; top:18.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($K4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:18.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($K5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left: 0.73cm; top:19.35cm"><?echo $L1;?></div>
	<div style="position:absolute; left: 3.25cm; top:19.35cm"><?echo $L2;?></div>
	<div style="position:absolute; left: 4.85cm; top:19.35cm"><?echo $L3;?></div>
	<div style="position:absolute; left: 5.80cm; top:19.35cm"><?echo $L31;?></div>
	<div style="position:absolute; left: 6.50cm; top:19.35cm"><?echo $L32;?></div>
	<div style="position:absolute; left: 6.80cm; top:19.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($L4,2,',','.');?></div>
	<div style="position:absolute; left: 8.70cm; top:19.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($L5,2,',','.');?></div>


	<div class="fecha" style="position:absolute; left:10.93cm; top:13.85cm"><?echo $M1;?></div>
	<div style="position:absolute; left:13.45cm; top:13.85cm"><?echo $M2;?></div>
	<div style="position:absolute; left:15.00cm; top:13.85cm"><?echo $M3;?></div>
	<div style="position:absolute; left:15.90cm; top:13.85cm"><?echo $M31;?></div>
	<div style="position:absolute; left:16.55cm; top:13.85cm"><?echo $M32;?></div>
	<div style="position:absolute; left:16.80cm; top:13.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($M4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:13.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($M5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:14.35cm"><?echo $N1;?></div>
	<div style="position:absolute; left:13.45cm; top:14.35cm"><?echo $N2;?></div>
	<div style="position:absolute; left:15.00cm; top:14.35cm"><?echo $N3;?></div>
	<div style="position:absolute; left:15.90cm; top:14.35cm"><?echo $N31;?></div>
	<div style="position:absolute; left:16.55cm; top:14.35cm"><?echo $N32;?></div>
	<div style="position:absolute; left:16.80cm; top:14.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($N4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:14.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($N5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:14.85cm"><?echo $O1;?></div>
	<div style="position:absolute; left:13.45cm; top:14.85cm"><?echo $O2;?></div>
	<div style="position:absolute; left:15.00cm; top:14.85cm"><?echo $O3;?></div>
	<div style="position:absolute; left:15.90cm; top:14.85cm"><?echo $O31;?></div>
	<div style="position:absolute; left:16.55cm; top:14.85cm"><?echo $O32;?></div>
	<div style="position:absolute; left:16.80cm; top:14.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($O4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:14.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($O5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:15.35cm"><?echo $P1;?></div>
	<div style="position:absolute; left:13.45cm; top:15.35cm"><?echo $P2;?></div>
	<div style="position:absolute; left:15.00cm; top:15.35cm"><?echo $P3;?></div>
	<div style="position:absolute; left:15.90cm; top:15.35cm"><?echo $P31;?></div>
	<div style="position:absolute; left:16.55cm; top:15.35cm"><?echo $P32;?></div>
	<div style="position:absolute; left:16.80cm; top:15.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($P4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:15.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($P5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:15.85cm"><?echo $Q1;?></div>
	<div style="position:absolute; left:13.45cm; top:15.85cm"><?echo $Q2;?></div>
	<div style="position:absolute; left:15.00cm; top:15.85cm"><?echo $Q3;?></div>
	<div style="position:absolute; left:15.90cm; top:15.85cm"><?echo $Q31;?></div>
	<div style="position:absolute; left:16.55cm; top:15.85cm"><?echo $Q32;?></div>
	<div style="position:absolute; left:16.80cm; top:15.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($Q4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:15.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($Q5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:16.35cm"><?echo $R1;?></div>
	<div style="position:absolute; left:13.45cm; top:16.35cm"><?echo $R2;?></div>
	<div style="position:absolute; left:15.00cm; top:16.35cm"><?echo $R3;?></div>
	<div style="position:absolute; left:15.90cm; top:16.35cm"><?echo $R31;?></div>
	<div style="position:absolute; left:16.55cm; top:16.35cm"><?echo $R32;?></div>
	<div style="position:absolute; left:16.80cm; top:16.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($R4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:16.40cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($R5,2,',','.');?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:16.85cm"><?echo $S1;?></div>
	<div style="position:absolute; left:13.45cm; top:16.85cm"><?echo $S2;?></div>
	<div style="position:absolute; left:15.00cm; top:16.85cm"><?echo $S3;?></div>
	<div style="position:absolute; left:15.90cm; top:16.85cm"><?echo $S31;?></div>
	<div style="position:absolute; left:16.55cm; top:16.85cm"><?echo $S32;?></div>
	<div style="position:absolute; left:16.80cm; top:16.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($S4,2,',','.');?></div>
	<div style="position:absolute; left:18.70cm; top:16.90cm; width:2.00cm; text-align:right; font-size:10px"><?echo number_format($S5,2,',','.');?></div>

	<!-- *****************************************			 control durante bombeo lineas no dedicadas			 ***************************************** -->
	<div class="fecha" style="position:absolute; left:10.93cm; top:18.35cm"><?echo $T1;?></div>
	<div style="position:absolute; left:13.45cm; top:18.35cm"><?echo $T2;?></div>
	<div style="position:absolute; left:15.40cm; top:18.35cm"><?echo $T3;?></div>
	<div style="position:absolute; left:17.70cm; top:18.40cm"><?echo $T4;?></div>
	<div style="position:absolute; left:18.95cm; top:18.40cm; font-size:10px"><?echo substr($T5,0,10);?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:18.85cm"><?echo $U1;?></div>
	<div style="position:absolute; left:13.45cm; top:18.85cm"><?echo $U2;?></div>
	<div style="position:absolute; left:15.40cm; top:18.85cm"><?echo $U3;?></div>
	<div style="position:absolute; left:17.70cm; top:18.90cm"><?echo $U4;?></div>
	<div style="position:absolute; left:18.95cm; top:18.90cm; font-size:10px"><?echo substr($U5,0,10);?></div>

	<div class="fecha" style="position:absolute; left:10.93cm; top:19.35cm"><?echo $V1;?></div>
	<div style="position:absolute; left:13.45cm; top:19.35cm"><?echo $V2;?></div>
	<div style="position:absolute; left:15.40cm; top:19.35cm"><?echo $V3;?></div>
	<div style="position:absolute; left:17.70cm; top:19.40cm"><?echo $V4;?></div>
	<div style="position:absolute; left:18.95cm; top:19.40cm; font-size:10px"><?echo substr($V5,0,10);?></div>

	<!-- *****************************************			 medicion final			 ***************************************** -->
	<div style="position:absolute; left: 9.15cm; top:20.50cm"><?if ($tiempo_reposo == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.32cm; top:20.50cm"><?if ($tiempo_reposo == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.90cm; top:20.35cm; width:2.90cm"><?echo $api_observado;?></div>
	<div style="position:absolute; left:17.90cm; top:20.85cm; width:2.90cm"><?echo $temperatura;?></div>
	<div style="position:absolute; left:17.90cm; top:21.35cm; width:2.90cm"><?echo $marcacion;?></div>

	<div style="position:absolute; left: 3.40cm; top:22.35cm"><?echo $nivel2_mt;?></div>
	<div style="position:absolute; left: 5.25cm; top:22.35cm"><?echo $nivel2_cm;?></div>
	<div style="position:absolute; left: 7.10cm; top:22.35cm"><?echo $nivel2_mm;?></div>
	<div style="position:absolute; left: 3.40cm; top:22.85cm"><?echo $agua2_mt;?></div>
	<div style="position:absolute; left: 5.25cm; top:22.85cm"><?echo $agua2_cm;?></div>
	<div style="position:absolute; left: 7.10cm; top:22.85cm"><?echo $agua2_mm;?></div>
	<div style="position:absolute; left: 8.85cm; top:22.60cm"><?echo $temperatura2;?></div>
	<div style="position:absolute; left:17.15cm; top:22.75cm"><?if ($tanque_drenaje2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.60cm; top:22.75cm"><?if ($tanque_drenaje2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.15cm; top:22.75cm"><?if ($tanque_drenaje2 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:0.80cm; top:24.37cm"><textarea style="width:19.75cm; height:2.00cm"><?echo $observaciones;?></textarea></div>

<!-- ------- RETIRO ------- RETIRO ------- RETIRO ------- RETIRO ------- RETIRO ------- RETIRO ------- RETIRO ------- RETIRO ------- -->
	<div style="position:absolute; left:18.00cm; top:29.05cm; width:3cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">&#8470;
			<?
			if ($consecutivo <= 9) {echo "00000";}
				else {if ($consecutivo <= 99) {echo "0000";}
					else {if ($consecutivo <= 999) {echo "000";}
						else {if ($consecutivo <= 9999) {echo "00";}
							else {if ($consecutivo <= 99999) {echo "0";}}}}}
			echo $consecutivo;
			?>
		</span>
	</div>

	<div style="position:relative; left: 9.00cm; top:28.10cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.00cm; top:28.30cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.00cm; top:28.48cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

	<div style="position:absolute; left:10.00cm; top:30.15cm"><?echo strtoupper($terminal);?></div>
	<div style="position:absolute; left: 2.70cm; top:31.05cm"><?echo $tanque;?></div>
	<div style="position:absolute; left:14.50cm; top:31.05cm; width:5cm; font-size:13px"><?echo $producto;?></div>

	<div style="position:absolute; left:13.80cm; top:32.55cm; width:2.00cm; text-align:right"><?echo number_format($inicial1,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:32.55cm; width:2.00cm; text-align:right"><?echo number_format($final1,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:33.34cm; width:2.00cm; text-align:right"><?echo number_format($inicial2,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:33.34cm; width:2.00cm; text-align:right"><?echo number_format($final2,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:34.13cm; width:2.00cm; text-align:right"><?echo number_format($inicial3,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:34.13cm; width:2.00cm; text-align:right"><?echo number_format($final3,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:34.92cm; width:2.00cm; text-align:right"><?echo number_format($inicial4,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:34.92cm; width:2.00cm; text-align:right"><?echo number_format($final4,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:35.71cm; width:2.00cm; text-align:right"><?echo number_format($inicial5,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:35.71cm; width:2.00cm; text-align:right"><?echo number_format($final5,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:36.50cm; width:2.00cm; text-align:right"><?echo number_format($inicial6,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:36.50cm; width:2.00cm; text-align:right"><?echo number_format($final6,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:37.22cm; width:2.00cm; text-align:right"><?echo number_format($inicial7,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:37.22cm; width:2.00cm; text-align:right"><?echo number_format($final7,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:38.01cm; width:2.00cm; text-align:right"><?echo number_format($inicial8,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:38.01cm; width:2.00cm; text-align:right"><?echo number_format($final8,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:38.80cm; width:2.00cm; text-align:right"><?echo number_format($inicial9,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:38.80cm; width:2.00cm; text-align:right"><?echo number_format($final9,2,',','.');?></div>
	<div style="position:absolute; left:17.80cm; top:39.59cm; width:2.00cm; text-align:right"><?echo number_format($final10,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:40.38cm; width:2.00cm; text-align:right"><?echo number_format($inicial11,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:41.17cm; width:2.00cm; text-align:right"><?echo number_format($inicial12,2,',','.');?></div>
	<div style="position:absolute; left:13.80cm; top:41.96cm; width:2.00cm; text-align:right"><?echo number_format($inicial13,2,',','.');?></div>
	<div style="position:absolute; left:16.80cm; top:42.75cm; width:3.00cm; text-align:right"><?echo number_format($final14,2,',','.');?></div>
	<div style="position:absolute; left:16.80cm; top:43.54cm; width:3.00cm; text-align:right"><?echo number_format($final15,2,',','.');?></div>
	<div style="position:absolute; left:16.80cm; top:44.33cm; width:3.00cm; text-align:right"><?echo number_format($final16,2,',','.');?></div>
	<div style="position:absolute; left:16.80cm; top:45.12cm; width:3.00cm; text-align:right"><?echo number_format($final17,2,',','.');?></div>
	<div style="position:absolute; left: 6.65cm; top:45.10cm"><?if ($diferencia == 'F') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.25cm; top:45.10cm"><?if ($diferencia == 'S') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.60cm; top:45.91cm; width:4.00cm; text-align:center"><?echo number_format($final18,2,',','.');?>%</div>

	<div style="position:absolute; left: 7.00cm; top:48.75cm; width:2.00cm; text-align:right"><?echo number_format($volmayor1,2,',','.');?></div>
	<div style="position:absolute; left: 1.05cm; top:49.20cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista2,0,30);?></div>
	<div style="position:absolute; left: 7.00cm; top:49.20cm; width:2.00cm; text-align:right"><?echo number_format($volmayor2,2,',','.');?></div>
	<div style="position:absolute; left: 1.05cm; top:49.65cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista3,0,30);?></div>
	<div style="position:absolute; left: 7.00cm; top:49.65cm; width:2.00cm; text-align:right"><?echo number_format($volmayor3,2,',','.');?></div>
	<div style="position:absolute; left: 1.05cm; top:50.10cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista4,0,30);?></div>
	<div style="position:absolute; left: 7.00cm; top:50.10cm; width:2.00cm; text-align:right"><?echo number_format($volmayor4,2,',','.');?></div>
	<div style="position:absolute; left:11.45cm; top:48.75cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista5,0,30);?></div>
	<div style="position:absolute; left:17.40cm; top:48.75cm; width:2.00cm; text-align:right"><?echo number_format($volmayor5,2,',','.');?></div>
	<div style="position:absolute; left:11.45cm; top:49.20cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista6,0,30);?></div>
	<div style="position:absolute; left:17.40cm; top:49.20cm; width:2.00cm; text-align:right"><?echo number_format($volmayor6,2,',','.');?></div>
	<div style="position:absolute; left:11.45cm; top:49.65cm; width:5.90cm; text-align:left; font-size:10px"><?echo substr($mayorista7,0,30);?></div>
	<div style="position:absolute; left:17.40cm; top:49.65cm; width:2.00cm; text-align:right"><?echo number_format($volmayor7,2,',','.');?></div>
	<? $total = $volmayor1 + $volmayor2 + $volmayor3 + $volmayor4 + $volmayor5 + $volmayor6 + $volmayor7; ?>
	<div style="position:absolute; left:16.40cm; top:50.10cm; width:3.00cm; text-align:right"><?echo number_format($total,2,',','.');?></div>
	
	<div style="position:absolute; left:1.02cm; top:51.02cm"><textarea style="width:19.28cm; height:2.51cm"><?echo $observaciones_retiro;?></textarea></div>

	<div style="position:absolute; left: 1.20cm; top:54.75cm; width:7.50cm"><?echo $finalizadopor;?></div>
	<div style="position:absolute; left: 9.65cm; top:54.75cm"><?echo date("d",strtotime($fecha_revision));?></div>
	<div style="position:absolute; left:10.65cm; top:54.75cm"><?echo date("m",strtotime($fecha_revision));?></div>
	<div style="position:absolute; left:11.50cm; top:54.75cm"><?echo date("Y",strtotime($fecha_revision));?></div>
	<div style="position:absolute; left:12.50cm; top:54.75cm; width:7.50cm"><?echo $revisadopor;?></div>

<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:271mm; width:5cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:271mm; width:5cm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:209mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-105.5mm; top:125mm; width:5mm; text-align:right; background-color:rgba(255,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>"></a>
	</div>
	<div style="position:absolute; left:50%; margin-left:-105.5mm; top:405mm; width:5mm; text-align:right; background-color:rgba(255,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>"></a>
	</div>
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</div>
</div>

<div class="noimprimir">
	<div style="position:absolute; left:47%; top:0mm; width:10mm; text-align:center; background-color:rgba(255,0,0,0.0)">
		<button style="background-color:rgba(0,0,0,0)" onclick="window.print();"><img src="../../../../../common/imagenes/impresora.png" style="pointer-events:auto" height="25px"
		title="Imprimir este consecutivo"></button>
	</div>
	<div style="position:absolute; left:53%; top:0mm; width:10mm; text-align:center; background-color:rgba(0,0,255,0.0)">
		<a href="javascript:closed();">
		<img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto" width="auto" height="25" title="Cerrar esta pestaña"></a>
	</div>
</div>
</body>
</html>
