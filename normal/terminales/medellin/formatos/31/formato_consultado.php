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
	document.title = '<?=strtoupper($terminal); ?> - <?=$$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 999) {echo "000";} else {if ($consecutivo <= 9999) {echo "00";} else {if ($consecutivo <= 99999) {echo "0";}}}}} echo $consecutivo;?>';
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
		<a href="https://web.whatsapp.com/send?phone=<?=$celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy consultando el formato <?=$formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>

	<div style="position:absolute; left:0px; top:   0px"><img src="<?=$tiro; ?>"		style="width:816px; height:auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<?=$retiro; ?>" style="width:816px; height:auto"></div>

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

	<div style="position:absolute; left: 18.20cm; top:0.70cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?=$estado;?></span></div>
	<div style="position:absolute; left: 18.20cm; top:0.90cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?=strtoupper($terminal);?></span></div>
	<div style="position:absolute; left: 18.20cm; top:1.42cm; color:rgba(0,0,0,1)"><span style="font-size:7px"><?=$usuario;?></span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 2.35cm; top: 2.00cm"><?=$fechaA;?></div>
	<div style="position:absolute; left: 8.30cm; top: 2.00cm" class="date"><?if ($horaA != "") {echo date ("h:i A", strtotime($horaA));}?></div>
	<div style="position:absolute; left:19.45cm; top: 2.00cm"><?=$certhabilit;?></div>
	<div style="position:absolute; left: 5.00cm; top: 2.50cm"><?=$empresaA;?></div>
	<div style="position:absolute; left:10.20cm; top: 2.50cm"><?=$nombreA;?></div>
	<? $firmaAi = "<img src='../../../../../common/firmas/".basename(dirname(__DIR__,2))."/firma1.png' style='width:auto; height:8mm'>"; ?>
	<div style="position:absolute; left:16.15cm; top: 2.00cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmaA=='on') {echo $firmaAi;}?></div>
<!--	<? $firmaAt = "Firmado por LCGP"; ?>
	<div style="position:absolute; left:16.15cm; top: 2.40cm; text-align:left; background-color:rgba(0,0,0,0.0); padding:0.1cm 0 0 0"><?if ($firmaA=='on') {echo $firmaAt;}?></div>-->

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 6.10cm; top: 3.42cm; font-size:9.70px"><?=substr($descripcion,0,90-0);?></div>
	<div style="position:absolute; left: 6.10cm; top: 3.82cm; font-size:9.70px"><?=$equipos;?></div>
	<div style="position:absolute; left: 6.00cm; top: 6.20cm"><?=$guia_transporte;?></div>
	<div style="position:absolute; left: 8.40cm; top: 6.80cm"><?=$volumen_bruto;?></div>
	<div style="position:absolute; left: 8.40cm; top: 7.40cm"><?=$temp_despacho;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.00cm"><?=$gravedad_API_X1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.60cm"><?=$gravedad_API1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.20cm"><?=$gravedad_espec1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.80cm"><?=$factor_correccion;?></div>
	<div style="position:absolute; left: 8.40cm; top:10.40cm"><?=$vol_neto_despacho;?></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 6.10cm; top: 4.72cm"><?=$ejecutorC;?></div>
	<div style="position:absolute; left:16.75cm; top: 4.22cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmaejecC=='on') {echo $firmaAi;}?></div>
	<div style="position:absolute; left: 6.10cm; top: 5.13cm"><?=$inspectorC;?></div>
	<div style="position:absolute; left:16.75cm; top: 4.63cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmainspC=='on') {echo $firmaAi;}?></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.55cm; top: 6.42cm" class="date"><?if ($hora1D != "") {echo date ("h:i A", strtotime($hora1D));}?></div>
	<div style="position:absolute; left:11.35cm; top: 6.42cm"><?=$fecha1D;?></div>
	<div style="position:absolute; left:14.80cm; top: 6.42cm" class="date"><?if ($hora2D != "") {echo date ("h:i A", strtotime($hora2D));}?></div>
	<div style="position:absolute; left:17.60cm; top: 6.42cm"><?=$fecha2D;?></div>
	<div style="position:absolute; left: 2.70cm; top: 6.94cm"><?=$emisorD;?></div>
	<div style="position:absolute; left:16.75cm; top: 6.44cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmaemisorD=='on') {echo $firmaAi;}?></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left:15.45cm; top: 7.90cm; font-size:9.10px"><?=substr($otrosE,0,35-0);?></div>
	<div style="position:absolute; left: 1.57cm; top: 8.10cm" class="checkbox"><?if ($EPP_CE=='on') {echo "&#10006;";}?></div>
	<div style="position:absolute; left: 1.57cm; top: 8.50cm" class="checkbox"><?if ($EPP_AE=='on') {echo "&#10006;";}?></div>

<!-- *****************************************			 sección F			 ***************************************** -->
<!-- ******************** AISLAMIENTO ELÉCTRICO ******************** -->
	<div style="position:absolute; left: 5.35cm; top: 9.85cm" class="radio"><?if ($FAE1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.65cm; top: 9.85cm" class="radio"><?if ($FAE1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 3.90cm; top:10.55cm; font-size:8.9px"><?=$equiposAE;?></div>
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
	<div style="position:absolute; left:13.75cm; top:10.55cm; font-size:8.9px; color:black"><?=$equiposAM;?></div>
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
	<div style="position:absolute; left: 1.15cm; top:25.88cm; font-size:9.20px"><?=$GA1;?></div>
	<div style="position:absolute; left: 4.60cm; top:25.88cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB1 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:25.88cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB1 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:25.88cm; font-size:9.20px"><?=$GC1;?></div>
	<div style="position:absolute; left: 9.31cm; top:25.88cm; font-size:10px"><?=$GD1;?></div>
	<div style="position:absolute; left:10.86cm; top:25.88cm; font-size:10px" class="date"><?if ($GE1 != "") {echo date ("h:i A", strtotime($GE1));}?></div>
	<div style="position:absolute; left:12.24cm; top:25.88cm; font-size:9.20px"><?=$GF1;?></div>
	<div style="position:absolute; left:15.27cm; top:25.88cm; font-size:10px"><?=$GG1;?></div>
	<div style="position:absolute; left:16.82cm; top:25.88cm; font-size:10px" class="date"><?if ($GH1 != "") {echo date ("h:i A", strtotime($GH1));}?></div>
	<div style="position:absolute; left:18.25cm; top:25.88cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI1 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:25.88cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI1 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left: 1.15cm; top:26.29cm; font-size:9.20px"><?=$GA2;?></div>
	<div style="position:absolute; left: 4.60cm; top:26.29cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB2 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:26.29cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB2 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:26.29cm; font-size:9.20px"><?=$GC2;?></div>
	<div style="position:absolute; left: 9.31cm; top:26.29cm; font-size:10px"><?=$GD2;?></div>
	<div style="position:absolute; left:10.86cm; top:26.29cm; font-size:10px" class="date"><?if ($GE2 != "") {echo date ("h:i A", strtotime($GE2));}?></div>
	<div style="position:absolute; left:12.24cm; top:26.29cm; font-size:9.20px"><?=$GF2;?></div>
	<div style="position:absolute; left:15.27cm; top:26.29cm; font-size:10px"><?=$GG2;?></div>
	<div style="position:absolute; left:16.82cm; top:26.28cm; font-size:10px" class="date"><?if ($GH2 != "") {echo date ("h:i A", strtotime($GH2));}?></div>
	<div style="position:absolute; left:18.25cm; top:26.29cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI2 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:26.29cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI2 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left: 1.15cm; top:26.71cm; font-size:9.20px"><?=$GA3;?></div>
	<div style="position:absolute; left: 4.60cm; top:26.71cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB3 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left: 4.60cm; top:26.71cm; font-size:10px; width:1.60cm; text-align:center"><?if ($GB3 == 'NO') {echo 'NO';}?></div>
	<div style="position:absolute; left: 6.30cm; top:26.71cm; font-size:9.20px"><?=$GC3;?></div>
	<div style="position:absolute; left: 9.31cm; top:26.71cm; font-size:10px"><?=$GD3;?></div>
	<div style="position:absolute; left:10.86cm; top:26.71cm; font-size:10px" class="date"><?if ($GE3 != "") {echo date ("h:i A", strtotime($GE3));}?></div>
	<div style="position:absolute; left:12.24cm; top:26.71cm; font-size:9.20px"><?=$GF3;?></div>
	<div style="position:absolute; left:15.27cm; top:26.71cm; font-size:10px"><?=$GG3;?></div>
	<div style="position:absolute; left:16.82cm; top:26.71cm; font-size:10px" class="date"><?if ($GH3 != "") {echo date ("h:i A", strtotime($GH3));}?></div>
	<div style="position:absolute; left:18.25cm; top:26.71cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI3 == 'SI') {echo 'SI';}?></div>
	<div style="position:absolute; left:18.25cm; top:26.71cm; font-size:10px; width:2.20cm; text-align:center"><?if ($GI3 == 'NO') {echo 'NO';}?></div>

	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?=$fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?=date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<?=$correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<?=$correo_pedidos; ?>"></a>
	</div>

<!-- *****************************************			 empieza el RETIRO			 ***************************************** -->
<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left:10.80cm; top:29.53cm; font-size:9.90px"><?=$H1;?></div>
	<div style="position:absolute; left:10.80cm; top:29.93cm; font-size:9.90px"><?=$H2;?></div>
	<div style="position:absolute; left:10.80cm; top:30.33cm; font-size:9.90px"><?=$H3;?></div>
	<div style="position:absolute; left:10.80cm; top:30.73cm; font-size:9.90px"><?=$H4;?></div>
	<div style="position:absolute; left:10.80cm; top:31.13cm; font-size:9.80px"><?=$H5;?></div>
	<div style="position:absolute; left: 3.84cm; top:31.53cm; font-size:9.70px"><?=$H6;?></div>

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
	<div style="position:absolute; left:19.35cm; top:35.83cm"><?=$cuadro;?></div>
	<div style="position:absolute; left: 3.65cm; top:36.30cm"><?=substr($descripcionI,0,60-6);?></div>
	<div style="position:absolute; left:14.77cm; top:36.30cm"><?=$autorizadoI;?></div>
	<div style="position:absolute; top:0.00cm; left:0.00cm; width:100%; font-size:9px">
		<? for ($i = 1; $i <=24; $i++) {$fila = 37.23; $delta = 0.3;
				$IA = "IA".$i; $fIA = "style='position:absolute; left: 1.10cm; top:".$fila+($delta*($i-1))."cm; width:0.75cm'";
				$IB = "IB".$i; $fIB = "style='position:absolute; left: 2.28cm; top:".$fila+($delta*($i-1)-0.08)."cm' class=checkboxI";
				$IC = "IC".$i; $fIC = "style='position:absolute; left: 3.37cm; top:".$fila+($delta*($i-1)+0.01)."cm'";
				$ID = "ID".$i; $fID = "style='position:absolute; left: 4.38cm; top:".$fila+($delta*($i-1)-0.08)."cm' class=checkboxIV";
				$IE = "IE".$i; $fIE = "style='position:absolute; left: 5.80cm; top:".$fila+($delta*($i-1)-0.08)."cm' class=checkboxIV";
				$IF = "IF".$i; $fIF = "style='position:absolute; left: 7.10cm; top:".$fila+($delta*($i-1)-0.08)."cm' class=checkboxIA";
				$IG = "IG".$i; $fIG = "style='position:absolute; left: 7.78cm; top:".$fila+($delta*($i-1))."cm; width:2.05cm'";
				$IH = "IH".$i; $fIH = "style='position:absolute; left: 9.91cm; top:".$fila+($delta*($i-1))."cm'";
				$II = "II".$i; $fII = "style='position:absolute; left:12.25cm; top:".$fila+($delta*($i-1))."cm'";
				$IJ = "IJ".$i; $fIJ = "style='position:absolute; left:13.30cm; top:".$fila+($delta*($i-1))."cm'";
				$IK = "IK".$i; $fIK = "style='position:absolute; left:15.55cm; top:".$fila+($delta*($i-1))."cm'";
				$IL = "IL".$i; $fIL = "style='position:absolute; left:16.95cm; top:".$fila+($delta*($i-1))."cm'";
				$IM = "IM".$i; $fIM = "style='position:absolute; left:19.20cm; top:".$fila+($delta*($i-1))."cm'";
			?>
			<div <?=$fIA?>><?=$$IA?></div>
			<div <?=$fIB?>><?if ($$IB=="on") {echo "&#10007;";}?></div>
			<div <?=$fIC?>><?=$$IC;?></div>
			<div <?=$fID?>><?if ($$ID=='on') {echo "&#10007;";}?></div>
			<div <?=$fIE?>><?if ($$IE=='on') {echo "&#10007;";}?></div>
			<div <?=$fIF?>><?if ($$IF=='on') {echo "&#10007;";}?></div>
			<div <?=$fIG?>><?=$$IG?></div>
			<div <?=$fIH?>><?=$$IH?></div>
			<div <?=$fII?>><?=$$II?></div>
			<div <?=$fIJ?>><?=$$IJ?></div>
			<div <?=$fIK?>><?=$$IK?></div>
			<div <?=$fIL?>><?=$$IL?></div>
			<div <?=$fIM?>><?=$$IM?></div>
		<? } ?>
	</div>

<!-- *****************************************			 sección J			 ***************************************** -->

<!-- *****************************************			 sección K			 ***************************************** -->
	<div style="position:absolute; left: 6.55cm; top:52.30cm" class="radio"><?if ($certificadoK == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.40cm; top:52.30cm" class="radio"><?if ($certificadoK == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.25cm; top:52.30cm" class="radio"><?if ($certificadoK == 'C') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.10cm; top:53.33cm"><?=$ejecutorK;?></div>
	<div style="position:absolute; left:16.75cm; top:52.83cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmaejecK=='on') {echo $firmaAi;}?></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.33cm" class="date"><?if ($horaejecK != "") {echo date ("h:i A", strtotime($horaejecK));}?></div> -->
	<div style="position:absolute; left: 6.10cm; top:53.73cm"><?=$inspectorK;?></div>
	<div style="position:absolute; left:16.75cm; top:53.23cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmainspK=='on') {echo $firmaAi;}?></div>
<!--	<div style="position:absolute; left:18.90cm; top:53.73cm" class="date"><?if ($horainspK != "") {echo date ("h:i A", strtotime($horainspK));}?></div> -->
	<div style="position:absolute; left: 3.45cm; top:54.63cm"><?=$emisorK;?></div>
	<div style="position:absolute; left:14.10cm; top:54.13cm; width: 43mm; height: 4mm; text-align:left; background-color:rgba(0,0,0,0.0)"><?if ($firmaemisorK=='on') {echo $firmaAi;}?></div>
	<div style="position:absolute; left:18.87cm; top:54.63cm" class="date"><?if ($horaemisorK != "") {echo date ("h:i A", strtotime($horaemisorK));}?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:550mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?=$fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:550mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?=date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:514mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106mm; top:374mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
		<a href="mailto:<?=$correo_pedidos; ?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
		<img src="../../../../../common/imagenes/piedepagina.svg" style="pointer-events:auto" title="Enviar pedido por correo electrónico a&#x00A;<?=$correo_pedidos; ?>"></a>
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
