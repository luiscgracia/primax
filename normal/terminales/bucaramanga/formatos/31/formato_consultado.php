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
	body						{font-family:Arlrdlt; font-size:10px; text-align:center; color:rgba(0,0,191,1)}
	button					{background-color:rgba(0,255,0,0.0); border:0px; border-radius:0px; cursor:pointer; height:25px}
	div.radio				{font-size:18px}
	div.checkbox		{font-size:18px}
	div.checkboxI		{font-size:13px; color:blue}
	div.checkboxIV	{font-size:13px; color:white}
	div.checkboxIA	{font-size:13px; color:white}
	textarea 				{resize:none; font-family:Arlrdlt; font-size:10px; line-height:164%; ; padding: 5px 5px; text-align:justify; background-color:rgba(255,255,255,1)}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
	document.title = '<? echo strtoupper($terminal); ?> - <? echo $$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 999) {echo "000";} else {if ($consecutivo <= 9999) {echo "00";} else {if ($consecutivo <= 99999) {echo "0";}}}}} echo $consecutivo;?>';
</script>
</head>
<body>
<?php
$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
$retiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_retiro.svg";
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d / H:i");
$consec = $_POST['consec'];
$consulta = "SELECT * FROM formulario".$formato." WHERE consecutivo=$consec";
$resultado = $conexion->query($consulta) or die("Error en la conexión a la base de datos");
while ($row = $resultado->fetch_assoc()){extract($row);}
?>
<div class="zoom">
	<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->	
<div style="position:absolute; left:50%; margin-left:-408px; top:	0px; width:816px; height:2112px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>

	<div style="position:absolute; left:0px; top:   0px"><img src="<? echo $tiro; ?>"		style="width:816px; height:auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" style="width:816px; height:auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.15cm; top:0.97cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 18.20cm; top:0.70cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left: 18.20cm; top:0.90cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?echo strtoupper($terminal);?></span></div>
	<div style="position:absolute; left: 18.20cm; top:1.42cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 2.35cm; top: 2.00cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 8.30cm; top: 2.00cm" class="date"><?if ($horaA != "") {echo date ("h:i A", strtotime($horaA));}?></div>
	<div style="position:absolute; left:19.45cm; top: 2.00cm"><?echo $certhabilit;?></div>
	<div style="position:absolute; left: 5.00cm; top: 2.50cm"><?echo $empresaA;?></div>
	<div style="position:absolute; left:10.20cm; top: 2.50cm"><?echo $nombreA;?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 6.10cm; top: 3.42cm; font-size:9.70px"><?echo substr($descripcion,0,90-0);?></div>
	<div style="position:absolute; left: 6.10cm; top: 3.82cm; font-size:9.70px"><?echo $equipos;?></div>
	<div style="position:absolute; left: 6.00cm; top: 6.20cm"><?echo $guia_transporte;?></div>
	<div style="position:absolute; left: 8.40cm; top: 6.80cm"><?echo $volumen_bruto;?></div>
	<div style="position:absolute; left: 8.40cm; top: 7.40cm"><?echo $temp_despacho;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.00cm"><?echo $gravedad_API_X1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.60cm"><?echo $gravedad_API1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.20cm"><?echo $gravedad_espec1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.80cm"><?echo $factor_correccion;?></div>
	<div style="position:absolute; left: 8.40cm; top:10.40cm"><?echo $vol_neto_despacho;?></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 6.10cm; top: 4.72cm"><?echo $ejecutorC;?></div>
	<div style="position:absolute; left: 6.10cm; top: 5.13cm"><?echo $inspectorC;?></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.55cm; top: 6.42cm" class="date"><?if ($hora1D != "") {echo date ("h:i A", strtotime($hora1D));}?></div>
	<div style="position:absolute; left:11.35cm; top: 6.42cm"><?echo $fecha1D;?></div>
	<div style="position:absolute; left:14.80cm; top: 6.42cm" class="date"><?if ($hora2D != "") {echo date ("h:i A", strtotime($hora2D));}?></div>
	<div style="position:absolute; left:17.60cm; top: 6.42cm"><?echo $fecha2D;?></div>
	<div style="position:absolute; left: 2.70cm; top: 6.94cm"><?echo $emisorD;?></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left:15.45cm; top: 7.90cm; font-size:9.10px"><?echo substr($otrosE,0,35-0);?></div>
	<div style="position:absolute; left: 1.57cm; top: 8.10cm" class="checkbox"><?if ($EPP_CE=='on') {echo "&#10006;";}?></div>
	<div style="position:absolute; left: 1.57cm; top: 8.50cm" class="checkbox"><?if ($EPP_AE=='on') {echo "&#10006;";}?></div>

<!-- *****************************************			 sección F			 ***************************************** -->
<!-- ******************** AISLAMIENTO ELÉCTRICO ******************** -->
	<div style="position:absolute; left: 5.35cm; top: 9.85cm" class="radio"><?if ($FAE1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.65cm; top: 9.85cm" class="radio"><?if ($FAE1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 3.90cm; top:10.55cm; font-size:8.9px"><?echo $equiposAE;?></div>
	<div style="position:absolute; left: 2.63cm; top:10.85cm" class="radio"><?if ($voltajeF =='-400')		{echo "&#10006;";}?></div>
	<div style="position:absolute; left: 6.92cm; top:10.85cm" class="radio"><?if ($voltajeF =='-1000')	{echo "&#10006;";};?></div>
	<div style="position:absolute; left:10.13cm; top:10.85cm" class="radio"><?if ($voltajeF =='1000')		{echo "&#10006;";};?></div>
	<div style="position:absolute; left: 8.79cm; top:11.62cm" class="radio"><?if ($AE1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:11.62cm" class="radio"><?if ($AE1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.79cm; top:12.39cm" class="radio"><?if ($AE2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:12.39cm" class="radio"><?if ($AE2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.79cm; top:13.14cm" class="radio"><?if ($AE3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:13.14cm" class="radio"><?if ($AE3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.79cm; top:13.85cm" class="radio"><?if ($AE4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:13.85cm" class="radio"><?if ($AE4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.79cm; top:14.64cm" class="radio"><?if ($AE5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:14.64cm" class="radio"><?if ($AE5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.79cm; top:15.58cm" class="radio"><?if ($AE6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.15cm; top:15.58cm" class="radio"><?if ($AE6 == 'NA') {echo '&#10006;';}?></div>

<!-- ******************** AISLAMIENTO MECÁNICO ********************* -->
	<div style="position:absolute; left:15.23cm; top: 9.85cm" class="radio"><?if ($FAM1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.53cm; top: 9.85cm" class="radio"><?if ($FAM1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:10.55cm; font-size:8.9px; color:black"><?echo $equiposAM;?></div>
	<div style="position:absolute; left:15.23cm; top:10.85cm" class="radio"><?if ($apequipos == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.53cm; top:10.85cm" class="radio"><?if ($apequipos == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:11.62cm" class="radio"><?if ($AM1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:11.62cm" class="radio"><?if ($AM1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:12.39cm" class="radio"><?if ($AM2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:12.39cm" class="radio"><?if ($AM2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:13.14cm" class="radio"><?if ($AM3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:13.14cm" class="radio"><?if ($AM3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:13.94cm" class="radio"><?if ($AM4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:13.94cm" class="radio"><?if ($AM4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:14.79cm" class="radio"><?if ($AM5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:14.79cm" class="radio"><?if ($AM5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:15.63cm" class="radio"><?if ($AM6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:15.63cm" class="radio"><?if ($AM6 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:18.70cm; top:16.40cm" class="radio"><?if ($F1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:16.40cm" class="radio"><?if ($F1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:16.90cm" class="radio"><?if ($F2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:16.90cm" class="radio"><?if ($F2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:17.40cm" class="radio"><?if ($F3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:17.40cm" class="radio"><?if ($F3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:17.90cm" class="radio"><?if ($F4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:17.90cm" class="radio"><?if ($F4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:18.40cm" class="radio"><?if ($F5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:18.40cm" class="radio"><?if ($F5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.02cm" class="radio"><?if ($F6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:19.02cm" class="radio"><?if ($F6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.65cm" class="radio"><?if ($F7 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:19.65cm" class="radio"><?if ($F7 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:20.15cm" class="radio"><?if ($F8 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:20.15cm" class="radio"><?if ($F8 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:20.65cm" class="radio"><?if ($F9 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:20.65cm" class="radio"><?if ($F9 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:18.70cm; top:21.87cm" class="radio"><?if ($F10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:21.87cm" class="radio"><?if ($F10 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:22.49cm" class="radio"><?if ($F11 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:22.49cm" class="radio"><?if ($F11 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:23.00cm" class="radio"><?if ($F12 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:23.00cm" class="radio"><?if ($F12 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:23.50cm" class="radio"><?if ($F13 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:23.50cm" class="radio"><?if ($F13 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:24.00cm" class="radio"><?if ($F14 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.05cm; top:24.00cm" class="radio"><?if ($F14 == 'NA') {echo '&#10006;';}?></div>

<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left: 1.15cm; top:25.88cm; font-size:9.20px"><?echo $GA1;?></div>
	<div style="position:absolute; left: 4.60cm; top:25.88cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB1 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:25.88cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB1 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:25.88cm; font-size:9.20px"><?echo $GC1;?></div>
	<div style="position:absolute; left: 9.31cm; top:25.88cm; font-size:10px"><?echo $GD1;?></div>
	<div style="position:absolute; left:10.86cm; top:25.88cm; font-size:10px" class="date"><?if ($GE1 != "") {echo date ("h:i A", strtotime($GE1));}?></div>
	<div style="position:absolute; left:12.24cm; top:25.88cm; font-size:9.20px"><?echo $GF1;?></div>
	<div style="position:absolute; left:15.27cm; top:25.88cm; font-size:10px"><?echo $GG1;?></div>
	<div style="position:absolute; left:16.82cm; top:25.88cm; font-size:10px" class="date"><?if ($GH1 != "") {echo date ("h:i A", strtotime($GH1));}?></div>
	<div style="position:absolute; left:18.25cm; top:25.88cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI1 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:25.88cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI1 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left: 1.15cm; top:26.29cm; font-size:9.20px"><?echo $GA2;?></div>
	<div style="position:absolute; left: 4.60cm; top:26.29cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB2 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:26.29cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB2 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:26.29cm; font-size:9.20px"><?echo $GC2;?></div>
	<div style="position:absolute; left: 9.31cm; top:26.29cm; font-size:10px"><?echo $GD2;?></div>
	<div style="position:absolute; left:10.86cm; top:26.29cm; font-size:10px" class="date"><?if ($GE2 != "") {echo date ("h:i A", strtotime($GE2));}?></div>
	<div style="position:absolute; left:12.24cm; top:26.29cm; font-size:9.20px"><?echo $GF2;?></div>
	<div style="position:absolute; left:15.27cm; top:26.29cm; font-size:10px"><?echo $GG2;?></div>
	<div style="position:absolute; left:16.82cm; top:26.28cm; font-size:10px" class="date"><?if ($GH2 != "") {echo date ("h:i A", strtotime($GH2));}?></div>
	<div style="position:absolute; left:18.25cm; top:26.29cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI2 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:26.29cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI2 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left: 1.15cm; top:26.71cm; font-size:9.20px"><?echo $GA3;?></div>
	<div style="position:absolute; left: 4.60cm; top:26.71cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB3 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:26.71cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB3 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:26.71cm; font-size:9.20px"><?echo $GC3;?></div>
	<div style="position:absolute; left: 9.31cm; top:26.71cm; font-size:10px"><?echo $GD3;?></div>
	<div style="position:absolute; left:10.86cm; top:26.71cm; font-size:10px" class="date"><?if ($GE3 != "") {echo date ("h:i A", strtotime($GE3));}?></div>
	<div style="position:absolute; left:12.24cm; top:26.71cm; font-size:9.20px"><?echo $GF3;?></div>
	<div style="position:absolute; left:15.27cm; top:26.71cm; font-size:10px"><?echo $GG3;?></div>
	<div style="position:absolute; left:16.82cm; top:26.71cm; font-size:10px" class="date"><?if ($GH3 != "") {echo date ("h:i A", strtotime($GH3));}?></div>
	<div style="position:absolute; left:18.25cm; top:26.71cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI3 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:26.71cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI3 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<? echo $correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<? echo $correo_pedidos; ?>"></a>
	</div>

<!-- *****************************************			 empieza el RETIRO			 ***************************************** -->
<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left:10.80cm; top:29.53cm; font-size:9.90px"><?echo $H1;?></div>
	<div style="position:absolute; left:10.80cm; top:29.93cm; font-size:9.90px"><?echo $H2;?></div>
	<div style="position:absolute; left:10.80cm; top:30.33cm; font-size:9.90px"><?echo $H3;?></div>
	<div style="position:absolute; left:10.80cm; top:30.73cm; font-size:9.90px"><?echo $H4;?></div>
	<div style="position:absolute; left:10.80cm; top:31.13cm; font-size:9.80px"><?echo $H5;?></div>
	<div style="position:absolute; left: 3.84cm; top:31.53cm; font-size:9.70px"><?echo $H6;?></div>

	<div style="position:absolute; left:18.69cm; top:31.85cm" class="radio"><?if ($H7	== 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:31.85cm" class="radio"><?if ($H7	== 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:32.25cm" class="radio"><?if ($H8	== 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:32.25cm" class="radio"><?if ($H8	== 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:32.65cm" class="radio"><?if ($H9	== 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:32.65cm" class="radio"><?if ($H9	== 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:33.05cm" class="radio"><?if ($H10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:33.05cm" class="radio"><?if ($H10 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:33.45cm" class="radio"><?if ($H11 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:33.45cm" class="radio"><?if ($H11 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:33.85cm" class="radio"><?if ($H12 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:33.85cm" class="radio"><?if ($H12 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:34.25cm" class="radio"><?if ($H13 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:34.25cm" class="radio"><?if ($H13 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.69cm; top:34.65cm" class="radio"><?if ($H14 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.03cm; top:34.65cm" class="radio"><?if ($H14 == 'NA') {echo '&#10006;';}?></div>

<!-- *****************************************			 sección I			 ***************************************** -->
	<div style="position:absolute; left:19.35cm; top:35.83cm"><?echo $cuadro;?></div>
	<div style="position:absolute; left: 3.65cm; top:36.30cm"><?echo substr($descripcionI,0,60-6);?></div>
	<div style="position:absolute; left:14.77cm; top:36.30cm"><?echo $autorizadoI;?></div>

<div style="position:absolute; top:0.05cm; left:0.05cm; width:100%; font-size:9px">
	<div style="position:absolute; left: 1.05cm; top:37.18cm; width:0.75cm; text-align:center"><?echo $IA1;?></div>
	<div style="position:absolute; left: 2.23cm; top:37.10cm" class="checkboxI"><?if ($IB1=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:37.19cm"><?echo $IC1;?></div>
	<div style="position:absolute; left: 4.33cm; top:37.10cm" class="checkboxIV"><?if ($ID1=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.75cm; top:37.10cm" class="checkboxIV"><?if ($IE1=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.05cm; top:37.10cm" class="checkboxIA"><?if ($IF1=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:37.18cm; width:2.05cm"><?echo $IG1;?></div>
	<div style="position:absolute; left: 9.86cm; top:37.18cm"><?echo $IH1;?></div>
	<div style="position:absolute; left:12.20cm; top:37.18cm"><?echo $II1;?></div>
	<div style="position:absolute; left:13.25cm; top:37.18cm"><?echo $IJ1;?></div>
	<div style="position:absolute; left:15.50cm; top:37.18cm"><?echo $IK1;?></div>
	<div style="position:absolute; left:16.90cm; top:37.18cm"><?echo $IL1;?></div>
	<div style="position:absolute; left:19.15cm; top:37.18cm"><?echo $IM1;?></div>

	<div style="position:absolute; left: 1.05cm; top:37.48cm; width:0.75cm; text-align:center"><?echo $IA2;?></div>
	<div style="position:absolute; left: 2.18cm; top:37.40cm" class="checkboxI"><?if ($IB2=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:37.49cm"><?echo $IC2;?></div>
	<div style="position:absolute; left: 4.28cm; top:37.40cm" class="checkboxIV"><?if ($ID2=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:37.40cm" class="checkboxIV"><?if ($IE2=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:37.40cm" class="checkboxIA"><?if ($IF2=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:37.48cm; width:2.05cm"><?echo $IG2;?></div>
	<div style="position:absolute; left: 9.86cm; top:37.48cm"><?echo $IH2;?></div>
	<div style="position:absolute; left:12.20cm; top:37.48cm"><?echo $II2;?></div>
	<div style="position:absolute; left:13.25cm; top:37.48cm"><?echo $IJ2;?></div>
	<div style="position:absolute; left:15.50cm; top:37.48cm"><?echo $IK2;?></div>
	<div style="position:absolute; left:16.90cm; top:37.48cm"><?echo $IL2;?></div>
	<div style="position:absolute; left:19.15cm; top:37.48cm"><?echo $IM2;?></div>

	<div style="position:absolute; left: 1.05cm; top:37.78cm; width:0.75cm; text-align:center"><?echo $IA3;?></div>
	<div style="position:absolute; left: 2.18cm; top:37.70cm" class="checkboxI"><?if ($IB3=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:37.79cm"><?echo $IC3;?></div>
	<div style="position:absolute; left: 4.28cm; top:37.70cm" class="checkboxIV"><?if ($ID3=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:37.70cm" class="checkboxIV"><?if ($IE3=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:37.70cm" class="checkboxIA"><?if ($IF3=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:37.78cm; width:2.05cm"><?echo $IG3;?></div>
	<div style="position:absolute; left: 9.86cm; top:37.78cm"><?echo $IH3;?></div>
	<div style="position:absolute; left:12.20cm; top:37.78cm"><?echo $II3;?></div>
	<div style="position:absolute; left:13.25cm; top:37.78cm"><?echo $IJ3;?></div>
	<div style="position:absolute; left:15.50cm; top:37.78cm"><?echo $IK3;?></div>
	<div style="position:absolute; left:16.90cm; top:37.78cm"><?echo $IL3;?></div>
	<div style="position:absolute; left:19.15cm; top:37.78cm"><?echo $IM3;?></div>

	<div style="position:absolute; left: 1.05cm; top:38.08cm; width:0.75cm; text-align:center"><?echo $IA4;?></div>
	<div style="position:absolute; left: 2.18cm; top:38.00cm" class="checkboxI"><?if ($IB4=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:38.09cm"><?echo $IC4;?></div>
	<div style="position:absolute; left: 4.28cm; top:38.00cm" class="checkboxIV"><?if ($ID4=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:38.00cm" class="checkboxIV"><?if ($IE4=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:38.00cm" class="checkboxIA"><?if ($IF4=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:38.08cm; width:2.05cm"><?echo $IG4;?></div>
	<div style="position:absolute; left: 9.86cm; top:38.08cm"><?echo $IH4;?></div>
	<div style="position:absolute; left:12.20cm; top:38.08cm"><?echo $II4;?></div>
	<div style="position:absolute; left:13.25cm; top:38.08cm"><?echo $IJ4;?></div>
	<div style="position:absolute; left:15.50cm; top:38.08cm"><?echo $IK4;?></div>
	<div style="position:absolute; left:16.90cm; top:38.08cm"><?echo $IL4;?></div>
	<div style="position:absolute; left:19.15cm; top:38.08cm"><?echo $IM4;?></div>

	<div style="position:absolute; left: 1.05cm; top:38.38cm; width:0.75cm; text-align:center"><?echo $IA5;?></div>
	<div style="position:absolute; left: 2.18cm; top:38.30cm" class="checkboxI"><?if ($IB5=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:38.39cm"><?echo $IC5;?></div>
	<div style="position:absolute; left: 4.28cm; top:38.30cm" class="checkboxIV"><?if ($ID5=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:38.30cm" class="checkboxIV"><?if ($IE5=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:38.30cm" class="checkboxIA"><?if ($IF5=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:38.38cm; width:2.05cm"><?echo $IG5;?></div>
	<div style="position:absolute; left: 9.86cm; top:38.38cm"><?echo $IH5;?></div>
	<div style="position:absolute; left:12.20cm; top:38.38cm"><?echo $II5;?></div>
	<div style="position:absolute; left:13.25cm; top:38.38cm"><?echo $IJ5;?></div>
	<div style="position:absolute; left:15.50cm; top:38.38cm"><?echo $IK5;?></div>
	<div style="position:absolute; left:16.90cm; top:38.38cm"><?echo $IL5;?></div>
	<div style="position:absolute; left:19.15cm; top:38.38cm"><?echo $IM5;?></div>

	<div style="position:absolute; left: 1.05cm; top:38.68cm; width:0.75cm; text-align:center"><?echo $IA6;?></div>
	<div style="position:absolute; left: 2.18cm; top:38.60cm" class="checkboxI"><?if ($IB6=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:38.69cm"><?echo $IC6;?></div>
	<div style="position:absolute; left: 4.28cm; top:38.60cm" class="checkboxIV"><?if ($ID6=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:38.60cm" class="checkboxIV"><?if ($IE6=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:38.60cm" class="checkboxIA"><?if ($IF6=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:38.68cm; width:2.05cm"><?echo $IG6;?></div>
	<div style="position:absolute; left: 9.86cm; top:38.68cm"><?echo $IH6;?></div>
	<div style="position:absolute; left:12.20cm; top:38.68cm"><?echo $II6;?></div>
	<div style="position:absolute; left:13.25cm; top:38.68cm"><?echo $IJ6;?></div>
	<div style="position:absolute; left:15.50cm; top:38.68cm"><?echo $IK6;?></div>
	<div style="position:absolute; left:16.90cm; top:38.68cm"><?echo $IL6;?></div>
	<div style="position:absolute; left:19.15cm; top:38.68cm"><?echo $IM6;?></div>

	<div style="position:absolute; left: 1.05cm; top:38.98cm; width:0.75cm; text-align:center"><?echo $IA7;?></div>
	<div style="position:absolute; left: 2.18cm; top:38.90cm" class="checkboxI"><?if ($IB7=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:38.99cm"><?echo $IC7;?></div>
	<div style="position:absolute; left: 4.28cm; top:38.90cm" class="checkboxIV"><?if ($ID7=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:38.90cm" class="checkboxIV"><?if ($IE7=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:38.90cm" class="checkboxIA"><?if ($IF7=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:38.98cm; width:2.05cm"><?echo $IG7;?></div>
	<div style="position:absolute; left: 9.86cm; top:38.98cm"><?echo $IH7;?></div>
	<div style="position:absolute; left:12.20cm; top:38.98cm"><?echo $II7;?></div>
	<div style="position:absolute; left:13.25cm; top:38.98cm"><?echo $IJ7;?></div>
	<div style="position:absolute; left:15.50cm; top:38.98cm"><?echo $IK7;?></div>
	<div style="position:absolute; left:16.90cm; top:38.98cm"><?echo $IL7;?></div>
	<div style="position:absolute; left:19.15cm; top:38.98cm"><?echo $IM7;?></div>

	<div style="position:absolute; left: 1.05cm; top:39.28cm; width:0.75cm; text-align:center"><?echo $IA8;?></div>
	<div style="position:absolute; left: 2.18cm; top:39.20cm" class="checkboxI"><?if ($IB8=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:39.29cm"><?echo $IC8;?></div>
	<div style="position:absolute; left: 4.28cm; top:39.20cm" class="checkboxIV"><?if ($ID8=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:39.20cm" class="checkboxIV"><?if ($IE8=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:39.20cm" class="checkboxIA"><?if ($IF8=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:39.28cm; width:2.05cm"><?echo $IG8;?></div>
	<div style="position:absolute; left: 9.86cm; top:39.28cm"><?echo $IH8;?></div>
	<div style="position:absolute; left:12.20cm; top:39.28cm"><?echo $II8;?></div>
	<div style="position:absolute; left:13.25cm; top:39.28cm"><?echo $IJ8;?></div>
	<div style="position:absolute; left:15.50cm; top:39.28cm"><?echo $IK8;?></div>
	<div style="position:absolute; left:16.90cm; top:39.28cm"><?echo $IL8;?></div>
	<div style="position:absolute; left:19.15cm; top:39.28cm"><?echo $IM8;?></div>

	<div style="position:absolute; left: 1.05cm; top:39.58cm; width:0.75cm; text-align:center"><?echo $IA9;?></div>
	<div style="position:absolute; left: 2.18cm; top:39.50cm" class="checkboxI"><?if ($IB9=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:39.59cm"><?echo $IC9;?></div>
	<div style="position:absolute; left: 4.28cm; top:39.50cm" class="checkboxIV"><?if ($ID9=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:39.50cm" class="checkboxIV"><?if ($IE9=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:39.50cm" class="checkboxIA"><?if ($IF9=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:39.58cm; width:2.05cm"><?echo $IG9;?></div>
	<div style="position:absolute; left: 9.86cm; top:39.58cm"><?echo $IH9;?></div>
	<div style="position:absolute; left:12.20cm; top:39.58cm"><?echo $II9;?></div>
	<div style="position:absolute; left:13.25cm; top:39.58cm"><?echo $IJ9;?></div>
	<div style="position:absolute; left:15.50cm; top:39.58cm"><?echo $IK9;?></div>
	<div style="position:absolute; left:16.90cm; top:39.58cm"><?echo $IL9;?></div>
	<div style="position:absolute; left:19.15cm; top:39.58cm"><?echo $IM9;?></div>

	<div style="position:absolute; left: 1.05cm; top:39.88cm; width:0.75cm; text-align:center"><?echo $IA10;?></div>
	<div style="position:absolute; left: 2.18cm; top:39.80cm" class="checkboxI"><?if ($IB10=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:39.89cm"><?echo $IC10;?></div>
	<div style="position:absolute; left: 4.28cm; top:39.80cm" class="checkboxIV"><?if ($ID10=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:39.80cm" class="checkboxIV"><?if ($IE10=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:39.80cm" class="checkboxIA"><?if ($IF10=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:39.88cm; width:2.05cm"><?echo $IG10;?></div>
	<div style="position:absolute; left: 9.86cm; top:39.88cm"><?echo $IH10;?></div>
	<div style="position:absolute; left:12.20cm; top:39.88cm"><?echo $II10;?></div>
	<div style="position:absolute; left:13.25cm; top:39.88cm"><?echo $IJ10;?></div>
	<div style="position:absolute; left:15.50cm; top:39.88cm"><?echo $IK10;?></div>
	<div style="position:absolute; left:16.90cm; top:39.88cm"><?echo $IL10;?></div>
	<div style="position:absolute; left:19.15cm; top:39.88cm"><?echo $IM10;?></div>

	<div style="position:absolute; left: 1.05cm; top:40.18cm; width:0.75cm; text-align:center"><?echo $IA11;?></div>
	<div style="position:absolute; left: 2.18cm; top:40.10cm" class="checkboxI"><?if ($IB11=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:40.19cm"><?echo $IC11;?></div>
	<div style="position:absolute; left: 4.28cm; top:40.10cm" class="checkboxIV"><?if ($ID11=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:40.10cm" class="checkboxIV"><?if ($IE11=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:40.10cm" class="checkboxIA"><?if ($IF11=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:40.18cm; width:2.05cm"><?echo $IG11;?></div>
	<div style="position:absolute; left: 9.86cm; top:40.18cm"><?echo $IH11;?></div>
	<div style="position:absolute; left:12.20cm; top:40.18cm"><?echo $II11;?></div>
	<div style="position:absolute; left:13.25cm; top:40.18cm"><?echo $IJ11;?></div>
	<div style="position:absolute; left:15.50cm; top:40.18cm"><?echo $IK11;?></div>
	<div style="position:absolute; left:16.90cm; top:40.18cm"><?echo $IL11;?></div>
	<div style="position:absolute; left:19.15cm; top:40.18cm"><?echo $IM11;?></div>

	<div style="position:absolute; left: 1.05cm; top:40.48cm; width:0.75cm; text-align:center"><?echo $IA12;?></div>
	<div style="position:absolute; left: 2.18cm; top:40.40cm" class="checkboxI"><?if ($IB12=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:40.49cm"><?echo $IC12;?></div>
	<div style="position:absolute; left: 4.28cm; top:40.40cm" class="checkboxIV"><?if ($ID12=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:40.40cm" class="checkboxIV"><?if ($IE12=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:40.40cm" class="checkboxIA"><?if ($IF12=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:40.48cm; width:2.05cm"><?echo $IG12;?></div>
	<div style="position:absolute; left: 9.86cm; top:40.48cm"><?echo $IH12;?></div>
	<div style="position:absolute; left:12.20cm; top:40.48cm"><?echo $II12;?></div>
	<div style="position:absolute; left:13.25cm; top:40.48cm"><?echo $IJ12;?></div>
	<div style="position:absolute; left:15.50cm; top:40.48cm"><?echo $IK12;?></div>
	<div style="position:absolute; left:16.90cm; top:40.48cm"><?echo $IL12;?></div>
	<div style="position:absolute; left:19.15cm; top:40.48cm"><?echo $IM12;?></div>

	<div style="position:absolute; left: 1.05cm; top:40.78cm; width:0.75cm; text-align:center"><?echo $IA13;?></div>
	<div style="position:absolute; left: 2.18cm; top:40.70cm" class="checkboxI"><?if ($IB13=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:40.79cm"><?echo $IC13;?></div>
	<div style="position:absolute; left: 4.28cm; top:40.70cm" class="checkboxIV"><?if ($ID13=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:40.70cm" class="checkboxIV"><?if ($IE13=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:40.70cm" class="checkboxIA"><?if ($IF13=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:40.78cm; width:2.05cm"><?echo $IG13;?></div>
	<div style="position:absolute; left: 9.86cm; top:40.78cm"><?echo $IH13;?></div>
	<div style="position:absolute; left:12.20cm; top:40.78cm"><?echo $II13;?></div>
	<div style="position:absolute; left:13.25cm; top:40.78cm"><?echo $IJ13;?></div>
	<div style="position:absolute; left:15.50cm; top:40.78cm"><?echo $IK13;?></div>
	<div style="position:absolute; left:16.90cm; top:40.78cm"><?echo $IL13;?></div>
	<div style="position:absolute; left:19.15cm; top:40.78cm"><?echo $IM13;?></div>

	<div style="position:absolute; left: 1.05cm; top:41.08cm; width:0.75cm; text-align:center"><?echo $IA14;?></div>
	<div style="position:absolute; left: 2.18cm; top:41.00cm" class="checkboxI"><?if ($IB14=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:41.09cm"><?echo $IC14;?></div>
	<div style="position:absolute; left: 4.28cm; top:41.00cm" class="checkboxIV"><?if ($ID14=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:41.00cm" class="checkboxIV"><?if ($IE14=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:41.00cm" class="checkboxIA"><?if ($IF14=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:41.08cm; width:2.05cm"><?echo $IG14;?></div>
	<div style="position:absolute; left: 9.86cm; top:41.08cm"><?echo $IH14;?></div>
	<div style="position:absolute; left:12.20cm; top:41.08cm"><?echo $II14;?></div>
	<div style="position:absolute; left:13.25cm; top:41.08cm"><?echo $IJ14;?></div>
	<div style="position:absolute; left:15.50cm; top:41.08cm"><?echo $IK14;?></div>
	<div style="position:absolute; left:16.90cm; top:41.08cm"><?echo $IL14;?></div>
	<div style="position:absolute; left:19.15cm; top:41.08cm"><?echo $IM14;?></div>

	<div style="position:absolute; left: 1.05cm; top:41.38cm; width:0.75cm; text-align:center"><?echo $IA15;?></div>
	<div style="position:absolute; left: 2.18cm; top:41.30cm" class="checkboxI"><?if ($IB15=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:41.39cm"><?echo $IC15;?></div>
	<div style="position:absolute; left: 4.28cm; top:41.30cm" class="checkboxIV"><?if ($ID15=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:41.30cm" class="checkboxIV"><?if ($IE15=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:41.30cm" class="checkboxIA"><?if ($IF15=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:41.38cm; width:2.05cm"><?echo $IG15;?></div>
	<div style="position:absolute; left: 9.86cm; top:41.38cm"><?echo $IH15;?></div>
	<div style="position:absolute; left:12.20cm; top:41.38cm"><?echo $II15;?></div>
	<div style="position:absolute; left:13.25cm; top:41.38cm"><?echo $IJ15;?></div>
	<div style="position:absolute; left:15.50cm; top:41.38cm"><?echo $IK15;?></div>
	<div style="position:absolute; left:16.90cm; top:41.38cm"><?echo $IL15;?></div>
	<div style="position:absolute; left:19.15cm; top:41.38cm"><?echo $IM15;?></div>

	<div style="position:absolute; left: 1.05cm; top:41.68cm; width:0.75cm; text-align:center"><?echo $IA16;?></div>
	<div style="position:absolute; left: 2.18cm; top:41.60cm" class="checkboxI"><?if ($IB16=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:41.69cm"><?echo $IC16;?></div>
	<div style="position:absolute; left: 4.28cm; top:41.60cm" class="checkboxIV"><?if ($ID16=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:41.60cm" class="checkboxIV"><?if ($IE16=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:41.60cm" class="checkboxIA"><?if ($IF16=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:41.68cm; width:2.05cm"><?echo $IG16;?></div>
	<div style="position:absolute; left: 9.86cm; top:41.68cm"><?echo $IH16;?></div>
	<div style="position:absolute; left:12.20cm; top:41.68cm"><?echo $II16;?></div>
	<div style="position:absolute; left:13.25cm; top:41.68cm"><?echo $IJ16;?></div>
	<div style="position:absolute; left:15.50cm; top:41.68cm"><?echo $IK16;?></div>
	<div style="position:absolute; left:16.90cm; top:41.68cm"><?echo $IL16;?></div>
	<div style="position:absolute; left:19.15cm; top:41.68cm"><?echo $IM16;?></div>

	<div style="position:absolute; left: 1.05cm; top:41.98cm; width:0.75cm; text-align:center"><?echo $IA17;?></div>
	<div style="position:absolute; left: 2.18cm; top:41.90cm" class="checkboxI"><?if ($IB17=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:41.99cm"><?echo $IC17;?></div>
	<div style="position:absolute; left: 4.28cm; top:41.90cm" class="checkboxIV"><?if ($ID17=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:41.90cm" class="checkboxIV"><?if ($IE17=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:41.90cm" class="checkboxIA"><?if ($IF17=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:41.98cm; width:2.05cm"><?echo $IG17;?></div>
	<div style="position:absolute; left: 9.86cm; top:41.98cm"><?echo $IH17;?></div>
	<div style="position:absolute; left:12.20cm; top:41.98cm"><?echo $II17;?></div>
	<div style="position:absolute; left:13.25cm; top:41.98cm"><?echo $IJ17;?></div>
	<div style="position:absolute; left:15.50cm; top:41.98cm"><?echo $IK17;?></div>
	<div style="position:absolute; left:16.90cm; top:41.98cm"><?echo $IL17;?></div>
	<div style="position:absolute; left:19.15cm; top:41.98cm"><?echo $IM17;?></div>

	<div style="position:absolute; left: 1.05cm; top:42.28cm; width:0.75cm; text-align:center"><?echo $IA18;?></div>
	<div style="position:absolute; left: 2.18cm; top:42.20cm" class="checkboxI"><?if ($IB18=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:42.29cm"><?echo $IC18;?></div>
	<div style="position:absolute; left: 4.28cm; top:42.20cm" class="checkboxIV"><?if ($ID18=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:42.20cm" class="checkboxIV"><?if ($IE18=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:42.20cm" class="checkboxIA"><?if ($IF18=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:42.28cm; width:2.05cm"><?echo $IG18;?></div>
	<div style="position:absolute; left: 9.86cm; top:42.28cm"><?echo $IH18;?></div>
	<div style="position:absolute; left:12.20cm; top:42.28cm"><?echo $II18;?></div>
	<div style="position:absolute; left:13.25cm; top:42.28cm"><?echo $IJ18;?></div>
	<div style="position:absolute; left:15.50cm; top:42.28cm"><?echo $IK18;?></div>
	<div style="position:absolute; left:16.90cm; top:42.28cm"><?echo $IL18;?></div>
	<div style="position:absolute; left:19.15cm; top:42.28cm"><?echo $IM18;?></div>

	<div style="position:absolute; left: 1.05cm; top:42.58cm; width:0.75cm; text-align:center"><?echo $IA19;?></div>
	<div style="position:absolute; left: 2.18cm; top:42.50cm" class="checkboxI"><?if ($IB19=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:42.59cm"><?echo $IC19;?></div>
	<div style="position:absolute; left: 4.28cm; top:42.50cm" class="checkboxIV"><?if ($ID19=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:42.50cm" class="checkboxIV"><?if ($IE19=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:42.50cm" class="checkboxIA"><?if ($IF19=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:42.58cm; width:2.05cm"><?echo $IG19;?></div>
	<div style="position:absolute; left: 9.86cm; top:42.58cm"><?echo $IH19;?></div>
	<div style="position:absolute; left:12.20cm; top:42.58cm"><?echo $II19;?></div>
	<div style="position:absolute; left:13.25cm; top:42.58cm"><?echo $IJ19;?></div>
	<div style="position:absolute; left:15.50cm; top:42.58cm"><?echo $IK19;?></div>
	<div style="position:absolute; left:16.90cm; top:42.58cm"><?echo $IL19;?></div>
	<div style="position:absolute; left:19.15cm; top:42.58cm"><?echo $IM19;?></div>

	<div style="position:absolute; left: 1.05cm; top:42.88cm; width:0.75cm; text-align:center"><?echo $IA20;?></div>
	<div style="position:absolute; left: 2.18cm; top:42.80cm" class="checkboxI"><?if ($IB20=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:42.89cm"><?echo $IC20;?></div>
	<div style="position:absolute; left: 4.28cm; top:42.80cm" class="checkboxIV"><?if ($ID20=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:42.80cm" class="checkboxIV"><?if ($IE20=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:42.80cm" class="checkboxIA"><?if ($IF20=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:42.88cm; width:2.05cm"><?echo $IG20;?></div>
	<div style="position:absolute; left: 9.86cm; top:42.88cm"><?echo $IH20;?></div>
	<div style="position:absolute; left:12.20cm; top:42.88cm"><?echo $II20;?></div>
	<div style="position:absolute; left:13.25cm; top:42.88cm"><?echo $IJ20;?></div>
	<div style="position:absolute; left:15.50cm; top:42.88cm"><?echo $IK20;?></div>
	<div style="position:absolute; left:16.90cm; top:42.88cm"><?echo $IL20;?></div>
	<div style="position:absolute; left:19.15cm; top:42.88cm"><?echo $IM20;?></div>

	<div style="position:absolute; left: 1.05cm; top:43.18cm; width:0.75cm; text-align:center"><?echo $IA21;?></div>
	<div style="position:absolute; left: 2.18cm; top:43.10cm" class="checkboxI"><?if ($IB21=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:43.19cm"><?echo $IC21;?></div>
	<div style="position:absolute; left: 4.28cm; top:43.10cm" class="checkboxIV"><?if ($ID21=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:43.10cm" class="checkboxIV"><?if ($IE21=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:43.10cm" class="checkboxIA"><?if ($IF21=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:43.18cm; width:2.05cm"><?echo $IG21;?></div>
	<div style="position:absolute; left: 9.86cm; top:43.18cm"><?echo $IH21;?></div>
	<div style="position:absolute; left:12.20cm; top:43.18cm"><?echo $II21;?></div>
	<div style="position:absolute; left:13.25cm; top:43.18cm"><?echo $IJ21;?></div>
	<div style="position:absolute; left:15.50cm; top:43.18cm"><?echo $IK21;?></div>
	<div style="position:absolute; left:16.90cm; top:43.18cm"><?echo $IL21;?></div>
	<div style="position:absolute; left:19.15cm; top:43.18cm"><?echo $IM21;?></div>

	<div style="position:absolute; left: 1.05cm; top:43.48cm; width:0.75cm; text-align:center"><?echo $IA22;?></div>
	<div style="position:absolute; left: 2.18cm; top:43.40cm" class="checkboxI"><?if ($IB22=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:43.49cm"><?echo $IC22;?></div>
	<div style="position:absolute; left: 4.28cm; top:43.40cm" class="checkboxIV"><?if ($ID22=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:43.40cm" class="checkboxIV"><?if ($IE22=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:43.40cm" class="checkboxIA"><?if ($IF22=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:43.48cm; width:2.05cm"><?echo $IG22;?></div>
	<div style="position:absolute; left: 9.86cm; top:43.48cm"><?echo $IH22;?></div>
	<div style="position:absolute; left:12.20cm; top:43.48cm"><?echo $II22;?></div>
	<div style="position:absolute; left:13.25cm; top:43.48cm"><?echo $IJ22;?></div>
	<div style="position:absolute; left:15.50cm; top:43.48cm"><?echo $IK22;?></div>
	<div style="position:absolute; left:16.90cm; top:43.48cm"><?echo $IL22;?></div>
	<div style="position:absolute; left:19.15cm; top:43.48cm"><?echo $IM22;?></div>

	<div style="position:absolute; left: 1.05cm; top:43.78cm; width:0.75cm; text-align:center"><?echo $IA23;?></div>
	<div style="position:absolute; left: 2.18cm; top:43.70cm" class="checkboxI"><?if ($IB23=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:43.79cm"><?echo $IC23;?></div>
	<div style="position:absolute; left: 4.28cm; top:43.70cm" class="checkboxIV"><?if ($ID23=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:43.70cm" class="checkboxIV"><?if ($IE23=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:43.70cm" class="checkboxIA"><?if ($IF23=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:43.78cm; width:2.05cm"><?echo $IG23;?></div>
	<div style="position:absolute; left: 9.86cm; top:43.78cm"><?echo $IH23;?></div>
	<div style="position:absolute; left:12.20cm; top:43.78cm"><?echo $II23;?></div>
	<div style="position:absolute; left:13.25cm; top:43.78cm"><?echo $IJ23;?></div>
	<div style="position:absolute; left:15.50cm; top:43.78cm"><?echo $IK23;?></div>
	<div style="position:absolute; left:16.90cm; top:43.78cm"><?echo $IL23;?></div>
	<div style="position:absolute; left:19.15cm; top:43.78cm"><?echo $IM23;?></div>

	<div style="position:absolute; left: 1.05cm; top:44.08cm; width:0.75cm; text-align:center"><?echo $IA24;?></div>
	<div style="position:absolute; left: 2.18cm; top:44.00cm" class="checkboxI"><?if ($IB24=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 3.32cm; top:44.09cm"><?echo $IC24;?></div>
	<div style="position:absolute; left: 4.28cm; top:44.00cm" class="checkboxIV"><?if ($ID24=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 5.70cm; top:44.00cm" class="checkboxIV"><?if ($IE24=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.00cm; top:44.00cm" class="checkboxIA"><?if ($IF24=='on') {echo "&#10007;";}?></div>
	<div style="position:absolute; left: 7.73cm; top:44.08cm; width:2.05cm"><?echo $IG24;?></div>
	<div style="position:absolute; left: 9.86cm; top:44.08cm"><?echo $IH24;?></div>
	<div style="position:absolute; left:12.20cm; top:44.08cm"><?echo $II24;?></div>
	<div style="position:absolute; left:13.25cm; top:44.08cm"><?echo $IJ24;?></div>
	<div style="position:absolute; left:15.50cm; top:44.08cm"><?echo $IK24;?></div>
	<div style="position:absolute; left:16.90cm; top:44.08cm"><?echo $IL24;?></div>
	<div style="position:absolute; left:19.15cm; top:44.08cm"><?echo $IM24;?></div>
</div>

	<div style="position:absolute; left: 6.55cm; top:52.30cm" class="radio"><?if ($certificadoK == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.40cm; top:52.30cm" class="radio"><?if ($certificadoK == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.25cm; top:52.30cm" class="radio"><?if ($certificadoK == 'C') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.10cm; top:53.33cm"><?echo $ejecutorK;?></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.33cm" class="date"><?if ($horaejecK != "") {echo date ("h:i A", strtotime($horaejecK));}?></div> -->
	<div style="position:absolute; left: 6.10cm; top:53.73cm"><?echo $inspectorK;?></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.73cm" class="date"><?if ($horainspK != "") {echo date ("h:i A", strtotime($horainspK));}?></div> -->
	<div style="position:absolute; left: 3.45cm; top:54.63cm"><?echo $emisorK;?></div>
	<div style="position:absolute; left:18.87cm; top:54.63cm" class="date"><?if ($horaemisorK != "") {echo date ("h:i A", strtotime($horaemisorK));}?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:550mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:550mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:514mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106mm; top:374mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
