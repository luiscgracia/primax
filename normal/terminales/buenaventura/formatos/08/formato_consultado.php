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
	div.radio			{font-size:13px}
	div.checkbox	{font-size:18px}

</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
	document.title = '<? echo strtoupper($terminal); ?> - <? echo $$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 999) {echo "000";} else {if ($consecutivo <= 9999) {echo "00";} else {if ($consecutivo <= 99999) {echo "0";}}}}} echo $consecutivo;?>';
</script>
</head>
<body>
<?php
$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
// $retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d / H:i");
$consec = $_POST['consec'];
$consulta = "SELECT * FROM formulario".$formato." WHERE consecutivo=$consec";
$resultado = $conexion->query($consulta) or die("Error en la conexión a la base de datos");
while ($row = $resultado->fetch_assoc()){extract($row);}
?>
<div class="zoom">
	<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->	
<!--
<div style="position:absolute; left:50%; margin-left:-408px; top:1056px; width:816px; height:1056px">
	<img src="<? echo $retiro; ?>" style="width:816px; height:auto">
</div>
-->
<div style="position:absolute; left:50%; margin-left:-408px; top:	 0px; width:816px; height:1056px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0mm; top:0px"><img src="<? echo $tiro; ?>" style="width:816px; height:auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.00cm; top:0.88cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.00cm; top:0.60cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.00cm; top:0.78cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?></span></div>

	<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 3.20cm; top:2.55cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 8.30cm; top:2.55cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:11.90cm; top:2.55cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.40cm; top:2.55cm"><?echo $certhabilit;?></div>

	<div style="position:absolute; left: 6.30cm; top:3.15cm"><?echo substr($equipo_desacople,0,68);?></div>
	<div style="position:absolute; left: 5.50cm; top:3.75cm"><?echo substr($producto,0,30);?></div>
	<div style="position:absolute; left:15.40cm; top:3.75cm"><?echo $temperatura;?></div>
	<div style="position:absolute; left:18.60cm; top:3.75cm"><?echo $presion;?></div>
	<div style="position:absolute; left: 2.10cm; top:4.95cm"><?echo substr($descripcion1,0,68);?></div>
<!--	<div style="position:absolute; left: 2.10cm; top:4.95cm"><?echo substr($descripcion2,0,68);?></div> -->

	<div style="position:absolute; left:10.15cm; top:5.55cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.30cm; top:5.55cm"><?echo $nombre1;?></div>
	<div style="position:absolute; left: 2.10cm; top:6.15cm"><?echo $nombre2;?></div>
	<div style="position:absolute; left: 8.20cm; top:6.15cm"><?echo $nombre3;?></div>
	<div style="position:absolute; left:14.35cm; top:6.15cm"><?echo $nombre4;?></div>

	<div style="position:absolute; left:10.60cm; top:6.75cm"><?echo $otros_detalles;?></div>

	<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:17.95cm; top: 7.62cm" class="radio"><?if ($B1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 7.62cm" class="radio"><?if ($B1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 7.62cm" class="radio"><?if ($B1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top: 8.02cm" class="radio"><?if ($B2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 8.02cm" class="radio"><?if ($B2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 8.02cm" class="radio"><?if ($B2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top: 8.42cm" class="radio"><?if ($B3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 8.42cm" class="radio"><?if ($B3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 8.42cm" class="radio"><?if ($B3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top: 8.82cm" class="radio"><?if ($B4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 8.82cm" class="radio"><?if ($B4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 8.82cm" class="radio"><?if ($B4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top: 9.22cm" class="radio"><?if ($B5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 9.22cm" class="radio"><?if ($B5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 9.22cm" class="radio"><?if ($B5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top: 9.62cm" class="radio"><?if ($B6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 9.62cm" class="radio"><?if ($B6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 9.62cm" class="radio"><?if ($B6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:10.02cm" class="radio"><?if ($B7 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:10.02cm" class="radio"><?if ($B7 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:10.02cm" class="radio"><?if ($B7 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.10cm; top:10.10cm"><?echo substr($B7a,0,40);?></div>
	<div style="position:absolute; left:17.95cm; top:10.42cm" class="radio"><?if ($B8 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:10.42cm" class="radio"><?if ($B8 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:10.42cm" class="radio"><?if ($B8 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:10.82cm" class="radio"><?if ($B9 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:10.82cm" class="radio"><?if ($B9 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:10.82cm" class="radio"><?if ($B9 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 2.90cm; top:11.30cm"><?echo substr($B9a,0,40);?></div>

	<div style="position:absolute; left: 1.97cm; top:11.92cm" class="checkbox"><?if ($B10a=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 1.97cm; top:12.32cm" class="checkbox"><?if ($B10b=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 3.87cm; top:11.92cm" class="checkbox"><?if ($B10c=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 3.87cm; top:12.32cm" class="checkbox"><?if ($B10d=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 7.17cm; top:11.92cm" class="checkbox"><?if ($B10e=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 7.17cm; top:12.32cm" class="checkbox"><?if ($B10f=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 9.97cm; top:11.92cm" class="checkbox"><?if ($B10g=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 9.97cm; top:12.32cm" class="checkbox"><?if ($B10h=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:12.05cm; top:12.12cm"><?echo $B10g1;?></div>
	<div style="position:absolute; left:12.05cm; top:12.52cm"><?echo $B10h1;?></div>
	<div style="position:absolute; left:13.77cm; top:11.92cm" class="checkbox"><?if ($B10i=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:13.77cm; top:12.32cm" class="checkbox"><?if ($B10j=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:16.57cm; top:11.92cm" class="checkbox"><?if ($B10k=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:16.57cm; top:12.32cm" class="checkbox"><?if ($B10l=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:18.30cm; top:12.12cm"><?echo $B10k1;?></div>
	<div style="position:absolute; left:18.30cm; top:12.52cm"><?echo $B10l1;?></div>
	<div style="position:absolute; left:15.20cm; top:13.05cm"><?echo $razones1;?></div>
	<div style="position:absolute; left: 2.10cm; top:13.55cm"><?echo substr($razones2,0,68);?></div>
	<div style="position:absolute; left: 2.10cm; top:14.55cm"><?echo substr($prec_adic1,0,68);?></div>
<!--	<div style="position:absolute; left: 2.10cm; top:14.55cm"><?echo substr($prec_adic2,0,90);?></div> -->

	<div style="position:absolute; left:17.95cm; top:15.52cm" class="radio"><?if ($C1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:15.52cm" class="radio"><?if ($C1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:15.52cm" class="radio"><?if ($C1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:15.92cm" class="radio"><?if ($C2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:15.92cm" class="radio"><?if ($C2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:15.92cm" class="radio"><?if ($C2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:16.32cm" class="radio"><?if ($C3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:16.32cm" class="radio"><?if ($C3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:16.32cm" class="radio"><?if ($C3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:16.72cm" class="radio"><?if ($C4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:16.72cm" class="radio"><?if ($C4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:16.72cm" class="radio"><?if ($C4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:17.12cm" class="radio"><?if ($C5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:17.12cm" class="radio"><?if ($C5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:17.12cm" class="radio"><?if ($C5 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 3.65cm; top:17.62cm; font-size:9px"><?echo $valvula1;?></div>
	<div style="position:absolute; left: 5.15cm; top:17.62cm; font-size:9px"><?echo $valvula2;?></div>
	<div style="position:absolute; left: 6.65cm; top:17.62cm; font-size:9px"><?echo $valvula3;?></div>
	<div style="position:absolute; left: 8.15cm; top:17.62cm; font-size:9px"><?echo $valvula4;?></div>
	<div style="position:absolute; left: 9.65cm; top:17.62cm; font-size:9px"><?echo $valvula5;?></div>
	<div style="position:absolute; left:11.15cm; top:17.62cm; font-size:9px"><?echo $valvula6;?></div>
	<div style="position:absolute; left:12.65cm; top:17.62cm; font-size:9px"><?echo $valvula7;?></div>
	<div style="position:absolute; left:14.15cm; top:17.62cm; font-size:9px"><?echo $valvula8;?></div>
	<div style="position:absolute; left:15.65cm; top:17.62cm; font-size:9px"><?echo $valvula9;?></div>
	<div style="position:absolute; left:17.15cm; top:17.62cm; font-size:9px"><?echo $valvula10;?></div>
	<div style="position:absolute; left:18.65cm; top:17.62cm; font-size:9px"><?echo $valvula11;?></div>

	<div style="position:absolute; left: 3.65cm; top:18.04cm; font-size:8.5px"><?echo $candado1;?></div>
	<div style="position:absolute; left: 5.15cm; top:18.04cm; font-size:8.5px"><?echo $candado2;?></div>
	<div style="position:absolute; left: 6.65cm; top:18.04cm; font-size:8.5px"><?echo $candado3;?></div>
	<div style="position:absolute; left: 8.15cm; top:18.04cm; font-size:8.5px"><?echo $candado4;?></div>
	<div style="position:absolute; left: 9.65cm; top:18.04cm; font-size:8.5px"><?echo $candado5;?></div>
	<div style="position:absolute; left:11.15cm; top:18.04cm; font-size:8.5px"><?echo $candado6;?></div>
	<div style="position:absolute; left:12.65cm; top:18.04cm; font-size:8.5px"><?echo $candado7;?></div>
	<div style="position:absolute; left:14.15cm; top:18.04cm; font-size:8.5px"><?echo $candado8;?></div>
	<div style="position:absolute; left:15.65cm; top:18.04cm; font-size:8.5px"><?echo $candado9;?></div>
	<div style="position:absolute; left:17.15cm; top:18.04cm; font-size:8.5px"><?echo $candado10;?></div>
	<div style="position:absolute; left:18.65cm; top:18.04cm; font-size:8.5px"><?echo $candado11;?></div>

	<div style="position:absolute; left: 3.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta1;?></div>
	<div style="position:absolute; left: 5.15cm; top:18.42cm; font-size:9px"><?echo $etiqueta2;?></div>
	<div style="position:absolute; left: 6.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta3;?></div>
	<div style="position:absolute; left: 8.15cm; top:18.42cm; font-size:9px"><?echo $etiqueta4;?></div>
	<div style="position:absolute; left: 9.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta5;?></div>
	<div style="position:absolute; left:11.15cm; top:18.42cm; font-size:9px"><?echo $etiqueta6;?></div>
	<div style="position:absolute; left:12.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta7;?></div>
	<div style="position:absolute; left:14.15cm; top:18.42cm; font-size:9px"><?echo $etiqueta8;?></div>
	<div style="position:absolute; left:15.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta9;?></div>
	<div style="position:absolute; left:17.15cm; top:18.42cm; font-size:9px"><?echo $etiqueta10;?></div>
	<div style="position:absolute; left:18.65cm; top:18.42cm; font-size:9px"><?echo $etiqueta11;?></div>

	<div style="position:absolute; left: 3.62cm; top:19.22cm; font-size:10px"><?echo $ubicacionA1;?></div>
	<div style="position:absolute; left: 6.92cm; top:19.22cm; font-size:10px"><?echo $ubicacionA2;?></div>
	<div style="position:absolute; left:10.22cm; top:19.22cm; font-size:10px"><?echo $ubicacionA3;?></div>
	<div style="position:absolute; left:13.52cm; top:19.22cm; font-size:10px"><?echo $ubicacionA4;?></div>
	<div style="position:absolute; left:16.82cm; top:19.22cm; font-size:10px"><?echo $ubicacionA5;?></div>
	<div style="position:absolute; left: 3.62cm; top:19.62cm; font-size:10px"><?echo $ubicacionB1;?></div>
	<div style="position:absolute; left: 6.92cm; top:19.62cm; font-size:10px"><?echo $ubicacionB2;?></div>
	<div style="position:absolute; left:10.22cm; top:19.62cm; font-size:10px"><?echo $ubicacionB3;?></div>
	<div style="position:absolute; left:13.52cm; top:19.62cm; font-size:10px"><?echo $ubicacionB4;?></div>
	<div style="position:absolute; left:16.82cm; top:19.62cm; font-size:10px"><?echo $ubicacionB5;?></div>

	<div style="position:absolute; left:17.95cm; top:18.72cm" class="radio"><?if ($C6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:18.72cm" class="radio"><?if ($C6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:18.72cm" class="radio"><?if ($C6 == 'NA') {echo '&#10006;';}?></div>
	
	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.45cm; top:21.05cm"><?echo $ejecutorD;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:21.05cm"><?echo $fechaejecD;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:21.05cm"><?echo date ("g:i A", strtotime($horaejecD));?></div> -->

	<div style="position:absolute; left: 3.45cm; top:21.55cm"><?echo $inspectorD;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:21.55cm"><?echo $fechainspD;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:21.55cm"><?echo date ("g:i A", strtotime($horainspD));?></div> -->
	
	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 3.45cm; top:22.95cm"><?echo $emisorE;?></div>
	<div style="position:absolute; left:10.50cm; top:22.95cm"><?echo substr($nombreemisorE,0,30-5);?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:22.95cm"><?echo $fechaemisorE;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:22.95cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div> -->

	<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 8.93cm; top:23.68cm" class="radio"><?if ($cancelacion == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:12.41cm; top:23.68cm" class="radio"><?if ($cancelacion == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.41cm; top:23.68cm" class="radio"><?if ($cancelacion == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 3.45cm; top:24.45cm"><?echo $ejecutorF;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:24.45cm"><?echo $fechaejecF;?></div> -->
	<div style="position:absolute; left:18.65cm; top:24.45cm"><?echo date ("g:i A", strtotime($horaejecF));?></div>

	<div style="position:absolute; left: 3.45cm; top:24.95cm"><?echo $inspectorF;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:24.95cm"><?echo $fechainspF;?></div> -->
	<div style="position:absolute; left:18.65cm; top:24.95cm"><?echo date ("g:i A", strtotime($horainspF));?></div>

	<div style="position:absolute; left: 3.45cm; top:25.65cm"><?echo $emisorF;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:25.65cm"><?echo $fechaemisorF;?></div> -->
	<div style="position:absolute; left:18.65cm; top:25.65cm"><?echo date ("g:i A", strtotime($horaemisorF));?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-98.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>"></a>
	</div>
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
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
