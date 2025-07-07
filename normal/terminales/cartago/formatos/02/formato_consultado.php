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
	div.result22	{width:7mm; font-size:7.50px; background-color:rgba(255,0,0,0.0)}
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
	<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<div style="position:absolute; left:50%; margin-left:-408px; top:	 0px; width:816px; height:2112px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left: 0%; top:   0px"><img src="<? echo $tiro; ?>"></div>
	<div style="position:absolute; left:50%; top:1056px; margin-left:-408px"><img src="<? echo $retiro; ?>"></div>
	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.20cm; top:1.52cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.15cm; top:1.35cm; color:rgba(255,255,255,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo $estado;?></span></div>
<!--	<div style="position:absolute; left:18.15cm; top:2.10cm; color:rgba(255,255,255,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo strtoupper($terminal);?></span></div>-->
	<div style="position:absolute; left:17.70cm; top:2.10cm; color:rgba(255,255,255,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo $usuario;?>@primax.com.co</span></div>


	<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 5.95cm; top:3.05cm"><?echo substr($descripcion,0,72);?></div>
	<div style="position:absolute; left:11.25cm; top:3.50cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.35cm; top:3.50cm"><?echo $nombre1;?></div>
	<div style="position:absolute; left: 1.90cm; top:3.95cm"><?echo $nombre2;?></div>
	<div style="position:absolute; left: 8.10cm; top:3.95cm"><?echo $nombre3;?></div>
	<div style="position:absolute; left:14.35cm; top:3.95cm"><?echo $nombre4;?></div>
	<div style="position:absolute; left: 3.00cm; top:4.40cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 7.35cm; top:4.40cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:11.40cm; top:4.40cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.60cm; top:4.40cm"><?echo $certhabilit;?></div>

	<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 9.60cm; top: 5.60cm" class=radio><?if ($B1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 5.60cm" class=radio><?if ($B1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 5.60cm" class=radio><?if ($B1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 6.05cm" class=radio><?if ($B2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 6.05cm" class=radio><?if ($B2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 6.05cm" class=radio><?if ($B2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 6.50cm" class=radio><?if ($B3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 6.50cm" class=radio><?if ($B3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 6.50cm" class=radio><?if ($B3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 7.25cm" class=radio><?if ($B4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 7.25cm" class=radio><?if ($B4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 7.25cm" class=radio><?if ($B4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 7.70cm" class=radio><?if ($B5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 7.70cm" class=radio><?if ($B5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 7.70cm" class=radio><?if ($B5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 8.15cm" class=radio><?if ($B6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 8.15cm" class=radio><?if ($B6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 8.15cm" class=radio><?if ($B6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 8.60cm" class=radio><?if ($B7 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 8.60cm" class=radio><?if ($B7 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 8.60cm" class=radio><?if ($B7 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 9.05cm" class=radio><?if ($B8 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 9.05cm" class=radio><?if ($B8 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 9.05cm" class=radio><?if ($B8 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 9.50cm" class=radio><?if ($B9 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 9.50cm" class=radio><?if ($B9 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 9.50cm" class=radio><?if ($B9 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top: 9.95cm" class=radio><?if ($B10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top: 9.95cm" class=radio><?if ($B10 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top: 9.95cm" class=radio><?if ($B10 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.60cm; top:10.70cm" class=radio><?if ($B11 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.10cm; top:10.70cm" class=radio><?if ($B11 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.60cm; top:10.70cm" class=radio><?if ($B11 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:18.80cm; top: 5.60cm" class=radio><?if ($B13 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 5.60cm" class=radio><?if ($B13 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 5.60cm" class=radio><?if ($B13 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 6.35cm" class=radio><?if ($B14 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 6.35cm" class=radio><?if ($B14 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 6.35cm" class=radio><?if ($B14 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 6.80cm" class=radio><?if ($B15 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 6.80cm" class=radio><?if ($B15 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 6.80cm" class=radio><?if ($B15 == 'NA') {echo '&#10006;';}?></div>
<!--	<div style="position:absolute; left:16.20cm; top: 6.90cm"><?echo substr($B15a,0,15);?></div> -->
	<div style="position:absolute; left:11.70cm; top: 7.20cm"><?echo substr($B15b,0,36);?></div>
	<div style="position:absolute; left:18.80cm; top: 7.55cm" class=radio><?if ($B16 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 7.55cm" class=radio><?if ($B16 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 7.55cm" class=radio><?if ($B16 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 8.00cm" class=radio><?if ($B17 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 8.00cm" class=radio><?if ($B17 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 8.00cm" class=radio><?if ($B17 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 8.45cm" class=radio><?if ($B18 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 8.45cm" class=radio><?if ($B18 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 8.45cm" class=radio><?if ($B18 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:11.70cm; top: 8.85cm"><?echo substr($B18a,0,36);?></div>
	<div style="position:absolute; left:18.80cm; top: 9.20cm" class=radio><?if ($B19 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 9.20cm" class=radio><?if ($B19 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 9.20cm" class=radio><?if ($B19 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 9.95cm" class=radio><?if ($B20 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 9.95cm" class=radio><?if ($B20 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 9.95cm" class=radio><?if ($B20 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top:10.40cm" class=radio><?if ($B21 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top:10.40cm" class=radio><?if ($B21 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top:10.40cm" class=radio><?if ($B21 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 3.85cm; top:11.35cm" class=checkbox><?if ($B12a=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 3.85cm; top:11.65cm" class=checkbox><?if ($B12b=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 7.25cm; top:11.35cm" class=checkbox><?if ($B12c=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 7.25cm; top:11.65cm" class=checkbox><?if ($B12d=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:10.05cm; top:11.35cm" class=checkbox><?if ($B12e=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:10.05cm; top:11.65cm" class=checkbox><?if ($B12f=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:12.30cm; top:11.45cm"><?echo substr($B12g,0,10);?></div>
	<div style="position:absolute; left:12.30cm; top:11.80cm"><?echo substr($B12h,0,10);?></div>
	<div style="position:absolute; left:16.45cm; top:11.35cm" class=checkbox><?if ($B12i=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:16.45cm; top:11.65cm" class=checkbox><?if ($B12j=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:18.30cm; top:11.50cm"><?echo substr($B12k,0,10);?></div>
	<div style="position:absolute; left:18.30cm; top:11.80cm"><?echo substr($B12l,0,10);?></div>

	<!-- *****************************************			 sección B pregunta 22			 ***************************************** -->
	<div style="position:absolute; left: 5.35cm; top:12.25cm"><span><?echo substr($B22a,0,15);?></span></div>
	<div style="position:absolute; left: 5.35cm; top:12.65cm"><span><?echo substr($B22b,0,15);?></span></div>
	<div style="position:absolute; left: 9.40cm; top:12.25cm"><span><?echo substr($B22c,0,15);?></span></div>
	<div style="position:absolute; left: 9.40cm; top:12.65cm"><span><?echo substr($B22d,0,15);?></span></div>
	<div style="position:absolute; left:15.30cm; top:12.25cm"><?echo $B22e;?></div>
	<div style="position:absolute; left:15.30cm; top:12.65cm"><?echo $B22f;?></div>
	<div style="position:absolute; left:19.80cm; top:12.07cm" class=checkbox><?if ($B22g=='on') {echo "&#10004;";}?></div>
	<div style="position:absolute; left:19.80cm; top:12.47cm" class=checkbox><?if ($B22h=='on') {echo "&#10004;";}?></div>

	<div style="font-size:7.5px">
	<div style="position:absolute; left: 5.85cm; top:13.33cm"><?if ($B22A1 !="") {echo date ("h:i A", strtotime($B22A1));}?></div>
	<div style="position:absolute; left: 6.80cm; top:13.33cm" class=result22><?if ($B22B1 !="") {echo $B22B1;}?></div>
	<div style="position:absolute; left: 7.65cm; top:13.33cm"><?if ($B22C1 !="") {echo date ("h:i A", strtotime($B22C1));}?></div>
	<div style="position:absolute; left: 8.60cm; top:13.33cm" class=result22><?if ($B22D1 !="") {echo $B22D1;}?></div>
	<div style="position:absolute; left: 9.45cm; top:13.33cm"><?if ($B22E1 !="") {echo date ("h:i A", strtotime($B22E1));}?></div>
	<div style="position:absolute; left:10.40cm; top:13.33cm" class=result22><?if ($B22F1 !="") {echo $B22F1;}?></div>
	<div style="position:absolute; left:11.25cm; top:13.33cm"><?if ($B22G1 !="") {echo date ("h:i A", strtotime($B22G1));}?></div>
	<div style="position:absolute; left:12.20cm; top:13.33cm" class=result22><?if ($B22H1 !="") {echo $B22H1;}?></div>
	<div style="position:absolute; left:13.05cm; top:13.33cm"><?if ($B22I1 !="") {echo date ("h:i A", strtotime($B22I1));}?></div>
	<div style="position:absolute; left:14.00cm; top:13.33cm" class=result22><?if ($B22J1 !="") {echo $B22J1;}?></div>
	<div style="position:absolute; left:14.85cm; top:13.33cm"><?if ($B22K1 !="") {echo date ("h:i A", strtotime($B22K1));}?></div>
	<div style="position:absolute; left:15.80cm; top:13.33cm" class=result22><?if ($B22L1 !="") {echo $B22L1;}?></div>
	<div style="position:absolute; left:16.65cm; top:13.33cm"><?if ($B22M1 !="") {echo date ("h:i A", strtotime($B22M1));}?></div>
	<div style="position:absolute; left:17.60cm; top:13.33cm" class=result22><?if ($B22N1 !="") {echo $B22N1;}?></div>
	<div style="position:absolute; left:18.45cm; top:13.33cm"><?if ($B22O1 !="") {echo date ("h:i A", strtotime($B22O1));}?></div>
	<div style="position:absolute; left:19.40cm; top:13.33cm" class=result22><?if ($B22P1 !="") {echo $B22P1;}?></div>
	
	<div style="position:absolute; left: 5.85cm; top:13.63cm"><?if ($B22A2 !="") {echo date ("h:i A", strtotime($B22A2));}?></div>
	<div style="position:absolute; left: 6.80cm; top:13.63cm" class=result22><?if ($B22B2 !="") {echo $B22B2;}?></div>
	<div style="position:absolute; left: 7.65cm; top:13.63cm"><?if ($B22C2 !="") {echo date ("h:i A", strtotime($B22C2));}?></div>
	<div style="position:absolute; left: 8.60cm; top:13.63cm" class=result22><?if ($B22D2 !="") {echo $B22D2;}?></div>
	<div style="position:absolute; left: 9.45cm; top:13.63cm"><?if ($B22E2 !="") {echo date ("h:i A", strtotime($B22E2));}?></div>
	<div style="position:absolute; left:10.40cm; top:13.63cm" class=result22><?if ($B22F2 !="") {echo $B22F2;}?></div>
	<div style="position:absolute; left:11.25cm; top:13.63cm"><?if ($B22G2 !="") {echo date ("h:i A", strtotime($B22G2));}?></div>
	<div style="position:absolute; left:12.20cm; top:13.63cm" class=result22><?if ($B22H2 !="") {echo $B22H2;}?></div>
	<div style="position:absolute; left:13.05cm; top:13.63cm"><?if ($B22I2 !="") {echo date ("h:i A", strtotime($B22I2));}?></div>
	<div style="position:absolute; left:14.00cm; top:13.63cm" class=result22><?if ($B22J2 !="") {echo $B22J2;}?></div>
	<div style="position:absolute; left:14.85cm; top:13.63cm"><?if ($B22K2 !="") {echo date ("h:i A", strtotime($B22K2));}?></div>
	<div style="position:absolute; left:15.80cm; top:13.63cm" class=result22><?if ($B22L2 !="") {echo $B22L2;}?></div>
	<div style="position:absolute; left:16.65cm; top:13.63cm"><?if ($B22M2 !="") {echo date ("h:i A", strtotime($B22M2));}?></div>
	<div style="position:absolute; left:17.60cm; top:13.63cm" class=result22><?if ($B22N2 !="") {echo $B22N2;}?></div>
	<div style="position:absolute; left:18.45cm; top:13.63cm"><?if ($B22O2 !="") {echo date ("h:i A", strtotime($B22O2));}?></div>
	<div style="position:absolute; left:19.40cm; top:13.63cm" class=result22><?if ($B22P2 !="") {echo $B22P2;}?></div>

	<div style="position:absolute; left: 5.85cm; top:13.93cm"><?if ($B22A3 !="") {echo date ("h:i A", strtotime($B22A3));}?></div>
	<div style="position:absolute; left: 6.80cm; top:13.93cm" class=result22><?if ($B22B3 !="") {echo $B22B3;}?></div>
	<div style="position:absolute; left: 7.65cm; top:13.93cm"><?if ($B22C3 !="") {echo date ("h:i A", strtotime($B22C3));}?></div>
	<div style="position:absolute; left: 8.60cm; top:13.93cm" class=result22><?if ($B22D3 !="") {echo $B22D3;}?></div>
	<div style="position:absolute; left: 9.45cm; top:13.93cm"><?if ($B22E3 !="") {echo date ("h:i A", strtotime($B22E3));}?></div>
	<div style="position:absolute; left:10.40cm; top:13.93cm" class=result22><?if ($B22F3 !="") {echo $B22F3;}?></div>
	<div style="position:absolute; left:11.25cm; top:13.93cm"><?if ($B22G3 !="") {echo date ("h:i A", strtotime($B22G3));}?></div>
	<div style="position:absolute; left:12.20cm; top:13.93cm" class=result22><?if ($B22H3 !="") {echo $B22H3;}?></div>
	<div style="position:absolute; left:13.05cm; top:13.93cm"><?if ($B22I3 !="") {echo date ("h:i A", strtotime($B22I3));}?></div>
	<div style="position:absolute; left:14.00cm; top:13.93cm" class=result22><?if ($B22J3 !="") {echo $B22J3;}?></div>
	<div style="position:absolute; left:14.85cm; top:13.93cm"><?if ($B22K3 !="") {echo date ("h:i A", strtotime($B22K3));}?></div>
	<div style="position:absolute; left:15.80cm; top:13.93cm" class=result22><?if ($B22L3 !="") {echo $B22L3;}?></div>
	<div style="position:absolute; left:16.65cm; top:13.93cm"><?if ($B22M3 !="") {echo date ("h:i A", strtotime($B22M3));}?></div>
	<div style="position:absolute; left:17.60cm; top:13.93cm" class=result22><?if ($B22N3 !="") {echo $B22N3;}?></div>
	<div style="position:absolute; left:18.45cm; top:13.93cm"><?if ($B22O3 !="") {echo date ("h:i A", strtotime($B22O3));}?></div>
	<div style="position:absolute; left:19.40cm; top:13.93cm" class=result22><?if ($B22P3 !="") {echo $B22P3;}?></div>
	
	<div style="position:absolute; left: 5.85cm; top:14.23cm"><?if ($B22A4 !="") {echo date ("h:i A", strtotime($B22A4));}?></div>
	<div style="position:absolute; left: 6.80cm; top:14.23cm" class=result22><?if ($B22B4 !="") {echo $B22B4;}?></div>
	<div style="position:absolute; left: 7.65cm; top:14.23cm"><?if ($B22C4 !="") {echo date ("h:i A", strtotime($B22C4));}?></div>
	<div style="position:absolute; left: 8.60cm; top:14.23cm" class=result22><?if ($B22D4 !="") {echo $B22D4;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.23cm"><?if ($B22E4 !="") {echo date ("h:i A", strtotime($B22E4));}?></div>
	<div style="position:absolute; left:10.40cm; top:14.23cm" class=result22><?if ($B22F4 !="") {echo $B22F4;}?></div>
	<div style="position:absolute; left:11.25cm; top:14.23cm"><?if ($B22G4 !="") {echo date ("h:i A", strtotime($B22G4));}?></div>
	<div style="position:absolute; left:12.20cm; top:14.23cm" class=result22><?if ($B22H4 !="") {echo $B22H4;}?></div>
	<div style="position:absolute; left:13.05cm; top:14.23cm"><?if ($B22I4 !="") {echo date ("h:i A", strtotime($B22I4));}?></div>
	<div style="position:absolute; left:14.00cm; top:14.23cm" class=result22><?if ($B22J4 !="") {echo $B22J4;}?></div>
	<div style="position:absolute; left:14.85cm; top:14.23cm"><?if ($B22K4 !="") {echo date ("h:i A", strtotime($B22K4));}?></div>
	<div style="position:absolute; left:15.80cm; top:14.23cm" class=result22><?if ($B22L4 !="") {echo $B22L4;}?></div>
	<div style="position:absolute; left:16.65cm; top:14.23cm"><?if ($B22M4 !="") {echo date ("h:i A", strtotime($B22M4));}?></div>
	<div style="position:absolute; left:17.60cm; top:14.23cm" class=result22><?if ($B22N4 !="") {echo $B22N4;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.23cm"><?if ($B22O4 !="") {echo date ("h:i A", strtotime($B22O4));}?></div>
	<div style="position:absolute; left:19.40cm; top:14.23cm" class=result22><?if ($B22P4 !="") {echo $B22P4;}?></div>

	<div style="position:absolute; left: 5.85cm; top:14.53cm"><?if ($B22A5 !="") {echo date ("h:i A", strtotime($B22A5));}?></div>
	<div style="position:absolute; left: 6.80cm; top:14.53cm" class=result22><?if ($B22B5 !="") {echo $B22B5;}?></div>
	<div style="position:absolute; left: 7.65cm; top:14.53cm"><?if ($B22C5 !="") {echo date ("h:i A", strtotime($B22C5));}?></div>
	<div style="position:absolute; left: 8.60cm; top:14.53cm" class=result22><?if ($B22D5 !="") {echo $B22D5;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.53cm"><?if ($B22E5 !="") {echo date ("h:i A", strtotime($B22E5));}?></div>
	<div style="position:absolute; left:10.40cm; top:14.53cm" class=result22><?if ($B22F5 !="") {echo $B22F5;}?></div>
	<div style="position:absolute; left:11.25cm; top:14.53cm"><?if ($B22G5 !="") {echo date ("h:i A", strtotime($B22G5));}?></div>
	<div style="position:absolute; left:12.20cm; top:14.53cm" class=result22><?if ($B22H5 !="") {echo $B22H5;}?></div>
	<div style="position:absolute; left:13.05cm; top:14.53cm"><?if ($B22I5 !="") {echo date ("h:i A", strtotime($B22I5));}?></div>
	<div style="position:absolute; left:14.00cm; top:14.53cm" class=result22><?if ($B22J5 !="") {echo $B22J5;}?></div>
	<div style="position:absolute; left:14.85cm; top:14.53cm"><?if ($B22K5 !="") {echo date ("h:i A", strtotime($B22K5));}?></div>
	<div style="position:absolute; left:15.80cm; top:14.53cm" class=result22><?if ($B22L5 !="") {echo $B22L5;}?></div>
	<div style="position:absolute; left:16.65cm; top:14.53cm"><?if ($B22M5 !="") {echo date ("h:i A", strtotime($B22M5));}?></div>
	<div style="position:absolute; left:17.60cm; top:14.53cm" class=result22><?if ($B22N5 !="") {echo $B22N5;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.53cm"><?if ($B22O5 !="") {echo date ("h:i A", strtotime($B22O5));}?></div>
	<div style="position:absolute; left:19.40cm; top:14.53cm" class=result22><?if ($B22P5 !="") {echo $B22P5;}?></div>

	<div style="position:absolute; left: 5.85cm; top:14.83cm"><?if ($B22A6 !="") {echo date ("h:i A", strtotime($B22A6));}?></div>
	<div style="position:absolute; left: 6.80cm; top:14.83cm" class=result22><?if ($B22B6 !="") {echo $B22B6;}?></div>
	<div style="position:absolute; left: 7.65cm; top:14.83cm"><?if ($B22C6 !="") {echo date ("h:i A", strtotime($B22C6));}?></div>
	<div style="position:absolute; left: 8.60cm; top:14.83cm" class=result22><?if ($B22D6 !="") {echo $B22D6;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.83cm"><?if ($B22E6 !="") {echo date ("h:i A", strtotime($B22E6));}?></div>
	<div style="position:absolute; left:10.40cm; top:14.83cm" class=result22><?if ($B22F6 !="") {echo $B22F6;}?></div>
	<div style="position:absolute; left:11.25cm; top:14.83cm"><?if ($B22G6 !="") {echo date ("h:i A", strtotime($B22G6));}?></div>
	<div style="position:absolute; left:12.20cm; top:14.83cm" class=result22><?if ($B22H6 !="") {echo $B22H6;}?></div>
	<div style="position:absolute; left:13.05cm; top:14.83cm"><?if ($B22I6 !="") {echo date ("h:i A", strtotime($B22I6));}?></div>
	<div style="position:absolute; left:14.00cm; top:14.83cm" class=result22><?if ($B22J6 !="") {echo $B22J6;}?></div>
	<div style="position:absolute; left:14.85cm; top:14.83cm"><?if ($B22K6 !="") {echo date ("h:i A", strtotime($B22K6));}?></div>
	<div style="position:absolute; left:15.80cm; top:14.83cm" class=result22><?if ($B22L6 !="") {echo $B22L6;}?></div>
	<div style="position:absolute; left:16.65cm; top:14.83cm"><?if ($B22M6 !="") {echo date ("h:i A", strtotime($B22M6));}?></div>
	<div style="position:absolute; left:17.60cm; top:14.83cm" class=result22><?if ($B22N6 !="") {echo $B22N6;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.83cm"><?if ($B22O6 !="") {echo date ("h:i A", strtotime($B22O6));}?></div>
	<div style="position:absolute; left:19.40cm; top:14.83cm" class=result22><?if ($B22P6 !="") {echo $B22P6;}?></div>

	<div style="position:absolute; left: 5.85cm; top:15.13cm"><?if ($B22A7 !="") {echo date ("h:i A", strtotime($B22A7));}?></div>
	<div style="position:absolute; left: 6.80cm; top:15.13cm" class=result22><?if ($B22B7 !="") {echo $B22B7;}?></div>
	<div style="position:absolute; left: 7.65cm; top:15.13cm"><?if ($B22C7 !="") {echo date ("h:i A", strtotime($B22C7));}?></div>
	<div style="position:absolute; left: 8.60cm; top:15.13cm" class=result22><?if ($B22D7 !="") {echo $B22D7;}?></div>
	<div style="position:absolute; left: 9.45cm; top:15.13cm"><?if ($B22E7 !="") {echo date ("h:i A", strtotime($B22E7));}?></div>
	<div style="position:absolute; left:10.40cm; top:15.13cm" class=result22><?if ($B22F7 !="") {echo $B22F7;}?></div>
	<div style="position:absolute; left:11.25cm; top:15.13cm"><?if ($B22G7 !="") {echo date ("h:i A", strtotime($B22G7));}?></div>
	<div style="position:absolute; left:12.20cm; top:15.13cm" class=result22><?if ($B22H7 !="") {echo $B22H7;}?></div>
	<div style="position:absolute; left:13.05cm; top:15.13cm"><?if ($B22I7 !="") {echo date ("h:i A", strtotime($B22I7));}?></div>
	<div style="position:absolute; left:14.00cm; top:15.13cm" class=result22><?if ($B22J7 !="") {echo $B22J7;}?></div>
	<div style="position:absolute; left:14.85cm; top:15.13cm"><?if ($B22K7 !="") {echo date ("h:i A", strtotime($B22K7));}?></div>
	<div style="position:absolute; left:15.80cm; top:15.13cm" class=result22><?if ($B22L7 !="") {echo $B22L7;}?></div>
	<div style="position:absolute; left:16.65cm; top:15.13cm"><?if ($B22M7 !="") {echo date ("h:i A", strtotime($B22M7));}?></div>
	<div style="position:absolute; left:17.60cm; top:15.13cm" class=result22><?if ($B22N7 !="") {echo $B22N7;}?></div>
	<div style="position:absolute; left:18.45cm; top:15.13cm"><?if ($B22O7 !="") {echo date ("h:i A", strtotime($B22O7));}?></div>
	<div style="position:absolute; left:19.40cm; top:15.13cm" class=result22><?if ($B22P7 !="") {echo $B22P7;}?></div>
	</div>

	<!-- *****************************************			 sección B pregunta 23			 ***************************************** -->
	<div style="position:absolute; left: 2.10cm; top:16.95cm; font-size:8px"><?echo substr($B231,0,30);?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 6.25cm; top:16.95cm"><?if ($B23A1 !="") {echo date ("h:i A", strtotime($B23A1));}?></div>
	<div style="position:absolute; left: 7.25cm; top:16.95cm"><?if ($B23B1 !="") {echo date ("h:i A", strtotime($B23B1));}?></div>
	<div style="position:absolute; left: 8.25cm; top:16.95cm"><?if ($B23C1 !="") {echo date ("h:i A", strtotime($B23C1));}?></div>
	<div style="position:absolute; left: 9.25cm; top:16.95cm"><?if ($B23D1 !="") {echo date ("h:i A", strtotime($B23D1));}?></div>
	<div style="position:absolute; left:10.25cm; top:16.95cm"><?if ($B23E1 !="") {echo date ("h:i A", strtotime($B23E1));}?></div>
	<div style="position:absolute; left:11.25cm; top:16.95cm"><?if ($B23F1 !="") {echo date ("h:i A", strtotime($B23F1));}?></div>
	<div style="position:absolute; left:12.25cm; top:16.95cm"><?if ($B23G1 !="") {echo date ("h:i A", strtotime($B23G1));}?></div>
	<div style="position:absolute; left:13.25cm; top:16.95cm"><?if ($B23H1 !="") {echo date ("h:i A", strtotime($B23H1));}?></div>
	<div style="position:absolute; left:14.25cm; top:16.95cm"><?if ($B23I1 !="") {echo date ("h:i A", strtotime($B23I1));}?></div>
	<div style="position:absolute; left:15.25cm; top:16.95cm"><?if ($B23J1 !="") {echo date ("h:i A", strtotime($B23J1));}?></div>
	<div style="position:absolute; left:16.25cm; top:16.95cm"><?if ($B23K1 !="") {echo date ("h:i A", strtotime($B23K1));}?></div>
	<div style="position:absolute; left:17.25cm; top:16.95cm"><?if ($B23L1 !="") {echo date ("h:i A", strtotime($B23L1));}?></div>
	<div style="position:absolute; left:18.25cm; top:16.95cm"><?if ($B23M1 !="") {echo date ("h:i A", strtotime($B23M1));}?></div>
	<div style="position:absolute; left:19.25cm; top:16.95cm"><?if ($B23N1 !="") {echo date ("h:i A", strtotime($B23N1));}?></div>
	</div>
	
	<div style="position:absolute; left: 2.10cm; top:17.45cm; font-size:8px"><?echo substr($B232,0,30);?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 6.25cm; top:17.45cm"><?if ($B23A2 !="") {echo date ("h:i A", strtotime($B23A2));}?></div>
	<div style="position:absolute; left: 7.25cm; top:17.45cm"><?if ($B23B2 !="") {echo date ("h:i A", strtotime($B23B2));}?></div>
	<div style="position:absolute; left: 8.25cm; top:17.45cm"><?if ($B23C2 !="") {echo date ("h:i A", strtotime($B23C2));}?></div>
	<div style="position:absolute; left: 9.25cm; top:17.45cm"><?if ($B23D2 !="") {echo date ("h:i A", strtotime($B23D2));}?></div>
	<div style="position:absolute; left:10.25cm; top:17.45cm"><?if ($B23E2 !="") {echo date ("h:i A", strtotime($B23E2));}?></div>
	<div style="position:absolute; left:11.25cm; top:17.45cm"><?if ($B23F2 !="") {echo date ("h:i A", strtotime($B23F2));}?></div>
	<div style="position:absolute; left:12.25cm; top:17.45cm"><?if ($B23G2 !="") {echo date ("h:i A", strtotime($B23G2));}?></div>
	<div style="position:absolute; left:13.25cm; top:17.45cm"><?if ($B23H2 !="") {echo date ("h:i A", strtotime($B23H2));}?></div>
	<div style="position:absolute; left:14.25cm; top:17.45cm"><?if ($B23I2 !="") {echo date ("h:i A", strtotime($B23I2));}?></div>
	<div style="position:absolute; left:15.25cm; top:17.45cm"><?if ($B23J2 !="") {echo date ("h:i A", strtotime($B23J2));}?></div>
	<div style="position:absolute; left:16.25cm; top:17.45cm"><?if ($B23K2 !="") {echo date ("h:i A", strtotime($B23K2));}?></div>
	<div style="position:absolute; left:17.25cm; top:17.45cm"><?if ($B23L2 !="") {echo date ("h:i A", strtotime($B23L2));}?></div>
	<div style="position:absolute; left:18.25cm; top:17.45cm"><?if ($B23M2 !="") {echo date ("h:i A", strtotime($B23M2));}?></div>
	<div style="position:absolute; left:19.25cm; top:17.45cm"><?if ($B23N2 !="") {echo date ("h:i A", strtotime($B23N2));}?></div>
	</div>
	
	<div style="position:absolute; left: 2.10cm; top:17.95cm; font-size:8px"><?echo substr($B233,0,30);?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 6.25cm; top:17.95cm"><?if ($B23A3 !="") {echo date ("h:i A", strtotime($B23A3));}?></div>
	<div style="position:absolute; left: 7.25cm; top:17.95cm"><?if ($B23B3 !="") {echo date ("h:i A", strtotime($B23B3));}?></div>
	<div style="position:absolute; left: 8.25cm; top:17.95cm"><?if ($B23C3 !="") {echo date ("h:i A", strtotime($B23C3));}?></div>
	<div style="position:absolute; left: 9.25cm; top:17.95cm"><?if ($B23D3 !="") {echo date ("h:i A", strtotime($B23D3));}?></div>
	<div style="position:absolute; left:10.25cm; top:17.95cm"><?if ($B23E3 !="") {echo date ("h:i A", strtotime($B23E3));}?></div>
	<div style="position:absolute; left:11.25cm; top:17.95cm"><?if ($B23F3 !="") {echo date ("h:i A", strtotime($B23F3));}?></div>
	<div style="position:absolute; left:12.25cm; top:17.95cm"><?if ($B23G3 !="") {echo date ("h:i A", strtotime($B23G3));}?></div>
	<div style="position:absolute; left:13.25cm; top:17.95cm"><?if ($B23H3 !="") {echo date ("h:i A", strtotime($B23H3));}?></div>
	<div style="position:absolute; left:14.25cm; top:17.95cm"><?if ($B23I3 !="") {echo date ("h:i A", strtotime($B23I3));}?></div>
	<div style="position:absolute; left:15.25cm; top:17.95cm"><?if ($B23J3 !="") {echo date ("h:i A", strtotime($B23J3));}?></div>
	<div style="position:absolute; left:16.25cm; top:17.95cm"><?if ($B23K3 !="") {echo date ("h:i A", strtotime($B23K3));}?></div>
	<div style="position:absolute; left:17.25cm; top:17.95cm"><?if ($B23L3 !="") {echo date ("h:i A", strtotime($B23L3));}?></div>
	<div style="position:absolute; left:18.25cm; top:17.95cm"><?if ($B23M3 !="") {echo date ("h:i A", strtotime($B23M3));}?></div>
	<div style="position:absolute; left:19.25cm; top:17.95cm"><?if ($B23N3 !="") {echo date ("h:i A", strtotime($B23N3));}?></div>
	</div>
	
	<div style="position:absolute; left: 2.10cm; top:18.45cm; font-size:8px"><?echo substr($B234,0,30);?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 6.25cm; top:18.45cm"><?if ($B23A4 !="") {echo date ("h:i A", strtotime($B23A4));}?></div>
	<div style="position:absolute; left: 7.25cm; top:18.45cm"><?if ($B23B4 !="") {echo date ("h:i A", strtotime($B23B4));}?></div>
	<div style="position:absolute; left: 8.25cm; top:18.45cm"><?if ($B23C4 !="") {echo date ("h:i A", strtotime($B23C4));}?></div>
	<div style="position:absolute; left: 9.25cm; top:18.45cm"><?if ($B23D4 !="") {echo date ("h:i A", strtotime($B23D4));}?></div>
	<div style="position:absolute; left:10.25cm; top:18.45cm"><?if ($B23E4 !="") {echo date ("h:i A", strtotime($B23E4));}?></div>
	<div style="position:absolute; left:11.25cm; top:18.45cm"><?if ($B23F4 !="") {echo date ("h:i A", strtotime($B23F4));}?></div>
	<div style="position:absolute; left:12.25cm; top:18.45cm"><?if ($B23G4 !="") {echo date ("h:i A", strtotime($B23G4));}?></div>
	<div style="position:absolute; left:13.25cm; top:18.45cm"><?if ($B23H4 !="") {echo date ("h:i A", strtotime($B23H4));}?></div>
	<div style="position:absolute; left:14.25cm; top:18.45cm"><?if ($B23I4 !="") {echo date ("h:i A", strtotime($B23I4));}?></div>
	<div style="position:absolute; left:15.25cm; top:18.45cm"><?if ($B23J4 !="") {echo date ("h:i A", strtotime($B23J4));}?></div>
	<div style="position:absolute; left:16.25cm; top:18.45cm"><?if ($B23K4 !="") {echo date ("h:i A", strtotime($B23K4));}?></div>
	<div style="position:absolute; left:17.25cm; top:18.45cm"><?if ($B23L4 !="") {echo date ("h:i A", strtotime($B23L4));}?></div>
	<div style="position:absolute; left:18.25cm; top:18.45cm"><?if ($B23M4 !="") {echo date ("h:i A", strtotime($B23M4));}?></div>
	<div style="position:absolute; left:19.25cm; top:18.45cm"><?if ($B23N4 !="") {echo date ("h:i A", strtotime($B23N4));}?></div>
	</div>
	
	<div style="position:absolute; left: 2.10cm; top:18.95cm; font-size:8px"><?echo substr($B235,0,30);?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 6.25cm; top:18.95cm"><?if ($B23A5 !="") {echo date ("h:i A", strtotime($B23A5));}?></div>
	<div style="position:absolute; left: 7.25cm; top:18.95cm"><?if ($B23B5 !="") {echo date ("h:i A", strtotime($B23B5));}?></div>
	<div style="position:absolute; left: 8.25cm; top:18.95cm"><?if ($B23C5 !="") {echo date ("h:i A", strtotime($B23C5));}?></div>
	<div style="position:absolute; left: 9.25cm; top:18.95cm"><?if ($B23D5 !="") {echo date ("h:i A", strtotime($B23D5));}?></div>
	<div style="position:absolute; left:10.25cm; top:18.95cm"><?if ($B23E5 !="") {echo date ("h:i A", strtotime($B23E5));}?></div>
	<div style="position:absolute; left:11.25cm; top:18.95cm"><?if ($B23F5 !="") {echo date ("h:i A", strtotime($B23F5));}?></div>
	<div style="position:absolute; left:12.25cm; top:18.95cm"><?if ($B23G5 !="") {echo date ("h:i A", strtotime($B23G5));}?></div>
	<div style="position:absolute; left:13.25cm; top:18.95cm"><?if ($B23H5 !="") {echo date ("h:i A", strtotime($B23H5));}?></div>
	<div style="position:absolute; left:14.25cm; top:18.95cm"><?if ($B23I5 !="") {echo date ("h:i A", strtotime($B23I5));}?></div>
	<div style="position:absolute; left:15.25cm; top:18.95cm"><?if ($B23J5 !="") {echo date ("h:i A", strtotime($B23J5));}?></div>
	<div style="position:absolute; left:16.25cm; top:18.95cm"><?if ($B23K5 !="") {echo date ("h:i A", strtotime($B23K5));}?></div>
	<div style="position:absolute; left:17.25cm; top:18.95cm"><?if ($B23L5 !="") {echo date ("h:i A", strtotime($B23L5));}?></div>
	<div style="position:absolute; left:18.25cm; top:18.95cm"><?if ($B23M5 !="") {echo date ("h:i A", strtotime($B23M5));}?></div>
	<div style="position:absolute; left:19.25cm; top:18.95cm"><?if ($B23N5 !="") {echo date ("h:i A", strtotime($B23N5));}?></div>
	</div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:20.75cm"><?echo $ejecutorC;?></div>
	<!-- <div style="position:absolute; left:13.0cm; top:20.75cm"><?echo $fechaejecC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:20.75cm"><?echo date ("g:i A", strtotime($horaejecC));?></div>

	<div style="position:absolute; left: 3.70cm; top:21.25cm"><?echo $inspectorC;?></div>
	<!-- <div style="position:absolute; left:13.0cm; top:21.25cm"><?echo $fechainspC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:21.25cm"><?echo date ("g:i A", strtotime($horainspC));?></div>
	
	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.65cm; top:23.10cm"><?echo substr($emisorD,0,30-4);?></div>
	<div style="position:absolute; left:10.35cm; top:23.10cm"><?echo substr($nombreemisorD,0,30-4);?></div>
	<!-- <div style="position:absolute; left:17.7cm; top:23.10cm"><?echo $fechaemisorD;?></div> -->
	<!-- <div style="position:absolute; left:18.7cm; top:23.10cm"><?echo date ("g:i A", strtotime($horaemisorD));?></div> -->

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left:10.60cm; top:23.95cm" class=radio><?if ($cancelacion == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.47cm; top:23.95cm" class=radio><?if ($cancelacion == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.82cm; top:23.95cm" class=radio><?if ($cancelacion == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:3.7cm; top:24.95cm"><?echo $ejecutorE;?></div>
	<!--	<div style="position:absolute; left:13.0cm; top:24.95cm"><?echo $fechaejecE;?></div> -->
	<div style="position:absolute; left:18.7cm; top:24.95cm"><?echo date ("g:i A", strtotime($horaejecE));?></div>

	<div style="position:absolute; left:3.7cm; top:25.45cm"><?echo $inspectorE;?></div>
	<!--	<div style="position:absolute; left:13.0cm; top:25.45cm"><?echo $fechainspE;?></div> -->
	<div style="position:absolute; left:18.7cm; top:25.45cm"><?echo date ("g:i A", strtotime($horainspE));?></div>

	<div style="position:absolute; left:3.7cm; top:26.25cm"><?echo $emisorE;?></div>
	<!-- <div style="position:absolute; left:17.7cm; top:26.25cm"><?echo $fechaemisorE;?></div> -->
	<div style="position:absolute; left:18.7cm; top:26.25cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:154.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-101.0mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
