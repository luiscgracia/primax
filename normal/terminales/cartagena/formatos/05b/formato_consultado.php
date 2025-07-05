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
	body					{font-family:Arlrdlt; font-size:9px; text-align:center; color:rgba(0,0,191,1)}
	button				{background-color:rgba(0,255,0,0.0); border:0px; border-radius:0px; cursor:pointer; height:25px}
	div.radio			{font-size:13px}
	div.resultado	{font-size: 6px; width: 7mm; background-color:rgba(255,0,0,0.0)}
	div.date			{font-size: 6px; text-align:right}
	div.hora			{font-size: 8px; width:14mm; background-color:rgba(255,0,0,0.0)}
	
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
	<div style="position:absolute; left:0px; top:   0px"><img src="<? echo $tiro; ?>"   style="width:816px; height:auto"></div>
	<div style="position:absolute; left:0px; top:1056px"><img src="<? echo $retiro; ?>" style="width:816px; height:auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.40cm; top:0.87cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.40cm; top:0.77cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
<!--	<div style="position:absolute; left:18.40cm; top:1.36cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo strtoupper($terminal);?></span></div>-->
	<div style="position:absolute; left:18.40cm; top:1.32cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

	<div style="position:absolute; left:14.10cm; top: 1.45cm"><?echo $pTEC;?></div>
	<div style="position:absolute; left:11.45cm; top: 1.67cm" class="radio"><?if ($tipo_trabajo == 'C') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:17.65cm; top: 1.67cm" class="radio"><?if ($tipo_trabajo == 'F') {echo '&#10687;';}?></div>

<!-- *****************************************			 DÍA 1			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top: 2.67cm"><?echo $dia1_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top: 2.98cm"><?echo substr($dia1_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top: 2.98cm"><?echo substr($dia1_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top: 2.98cm"><?echo $dia1_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top: 2.98cm"><?echo substr($dia1_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top: 3.25cm"><?echo substr($dia1_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top: 3.25cm"><?echo $dia1_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top: 3.25cm"><?echo $dia1_O;?></div>
	<div style="position:absolute; left:14.00cm; top: 3.25cm"><?echo $dia1_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top: 3.25cm"><?echo $dia1_CO;?></div>
	<div style="position:absolute; left:19.15cm; top: 3.10cm" class="radio"><?if ($dia1_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top: 3.10cm" class="radio"><?if ($dia1_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H1_1));?></div>
	<div style="position:absolute; left: 6.35cm; top: 3.89cm" class=resultado><?echo $dia1_R1_1;?></div>
	<div style="position:absolute; left: 7.10cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H2_1));?></div>
	<div style="position:absolute; left: 7.83cm; top: 3.89cm" class=resultado><?echo $dia1_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H3_1));?></div>
	<div style="position:absolute; left: 9.33cm; top: 3.89cm" class=resultado><?echo $dia1_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H4_1));?></div>
	<div style="position:absolute; left:10.82cm; top: 3.89cm" class=resultado><?echo $dia1_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H5_1));?></div>
	<div style="position:absolute; left:12.33cm; top: 3.89cm" class=resultado><?echo $dia1_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H6_1));?></div>
	<div style="position:absolute; left:13.79cm; top: 3.89cm" class=resultado><?echo $dia1_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H7_1));?></div>
	<div style="position:absolute; left:15.29cm; top: 3.89cm" class=resultado><?echo $dia1_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H8_1));?></div>
	<div style="position:absolute; left:16.79cm; top: 3.89cm" class=resultado><?echo $dia1_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H9_1));?></div>
	<div style="position:absolute; left:18.27cm; top: 3.89cm" class=resultado><?echo $dia1_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top: 3.89cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H10_1));?></div>
	<div style="position:absolute; left:19.75cm; top: 3.89cm" class=resultado><?echo $dia1_R10_1;?></div>											

	<div style="position:absolute; left: 5.62cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H1_2));?></div>
	<div style="position:absolute; left: 6.35cm; top: 4.14cm" class=resultado><?echo $dia1_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H2_2));?></div>
	<div style="position:absolute; left: 7.83cm; top: 4.14cm" class=resultado><?echo $dia1_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H3_2));?></div>
	<div style="position:absolute; left: 9.33cm; top: 4.14cm" class=resultado><?echo $dia1_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H4_2));?></div>
	<div style="position:absolute; left:10.82cm; top: 4.14cm" class=resultado><?echo $dia1_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H5_2));?></div>
	<div style="position:absolute; left:12.33cm; top: 4.14cm" class=resultado><?echo $dia1_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H6_2));?></div>
	<div style="position:absolute; left:13.79cm; top: 4.14cm" class=resultado><?echo $dia1_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H7_2));?></div>
	<div style="position:absolute; left:15.29cm; top: 4.14cm" class=resultado><?echo $dia1_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H8_2));?></div>
	<div style="position:absolute; left:16.79cm; top: 4.14cm" class=resultado><?echo $dia1_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H9_2));?></div>
	<div style="position:absolute; left:18.27cm; top: 4.14cm" class=resultado><?echo $dia1_R9_2;?></div>
	<div style="position:absolute; left:19.01cm; top: 4.14cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H10_2));?></div>
	<div style="position:absolute; left:19.75cm; top: 4.14cm" class=resultado><?echo $dia1_R10_2;?></div>											

	<div style="position:absolute; left: 5.62cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H1_3));?></div>
	<div style="position:absolute; left: 6.35cm; top: 4.37cm" class=resultado><?echo $dia1_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H2_3));?></div>
	<div style="position:absolute; left: 7.83cm; top: 4.37cm" class=resultado><?echo $dia1_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H3_3));?></div>
	<div style="position:absolute; left: 9.33cm; top: 4.37cm" class=resultado><?echo $dia1_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H4_3));?></div>
	<div style="position:absolute; left:10.82cm; top: 4.37cm" class=resultado><?echo $dia1_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H5_3));?></div>
	<div style="position:absolute; left:12.33cm; top: 4.37cm" class=resultado><?echo $dia1_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H6_3));?></div>
	<div style="position:absolute; left:13.79cm; top: 4.37cm" class=resultado><?echo $dia1_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H7_3));?></div>
	<div style="position:absolute; left:15.29cm; top: 4.37cm" class=resultado><?echo $dia1_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H8_3));?></div>
	<div style="position:absolute; left:16.79cm; top: 4.37cm" class=resultado><?echo $dia1_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H9_3));?></div>
	<div style="position:absolute; left:18.27cm; top: 4.37cm" class=resultado><?echo $dia1_R9_3;?></div>
	<div style="position:absolute; left:19.01cm; top: 4.37cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H10_3));?></div>
	<div style="position:absolute; left:19.75cm; top: 4.37cm" class=resultado><?echo $dia1_R10_3;?></div>											

	<div style="position:absolute; left: 5.62cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H1_4));?></div>
	<div style="position:absolute; left: 6.35cm; top: 4.60cm" class=resultado><?echo $dia1_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H2_4));?></div>
	<div style="position:absolute; left: 7.83cm; top: 4.60cm" class=resultado><?echo $dia1_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H3_4));?></div>
	<div style="position:absolute; left: 9.33cm; top: 4.60cm" class=resultado><?echo $dia1_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H4_4));?></div>
	<div style="position:absolute; left:10.82cm; top: 4.60cm" class=resultado><?echo $dia1_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H5_4));?></div>
	<div style="position:absolute; left:12.33cm; top: 4.60cm" class=resultado><?echo $dia1_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H6_4));?></div>
	<div style="position:absolute; left:13.79cm; top: 4.60cm" class=resultado><?echo $dia1_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H7_4));?></div>
	<div style="position:absolute; left:15.29cm; top: 4.60cm" class=resultado><?echo $dia1_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H8_4));?></div>
	<div style="position:absolute; left:16.79cm; top: 4.60cm" class=resultado><?echo $dia1_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H9_4));?></div>
	<div style="position:absolute; left:18.27cm; top: 4.60cm" class=resultado><?echo $dia1_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top: 4.60cm" class=date>			<?echo date ("h:i A", strtotime($dia1_H10_4));?></div>
	<div style="position:absolute; left:19.75cm; top: 4.60cm" class=resultado><?echo $dia1_R10_4;?></div>											

	<div style="position:absolute; left: 1.75cm; top: 5.40cm; font-size:8px"><?echo substr($dia1_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE1_1));?></div>
	<div style="position:absolute; left: 7.12cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS1_1));?></div>
	<div style="position:absolute; left: 8.62cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE2_1));?></div>
	<div style="position:absolute; left:10.12cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS2_1));?></div>
	<div style="position:absolute; left:11.62cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE3_1));?></div>
	<div style="position:absolute; left:13.12cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS3_1));?></div>
	<div style="position:absolute; left:14.62cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE4_1));?></div>
	<div style="position:absolute; left:16.12cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS4_1));?></div>
	<div style="position:absolute; left:17.62cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE5_1));?></div>
	<div style="position:absolute; left:19.12cm; top: 5.40cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS5_1));?></div>
	
	<div style="position:absolute; left: 1.75cm; top: 5.64cm; font-size:8px"><?echo substr($dia1_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE1_2));?></div>
	<div style="position:absolute; left: 7.12cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS1_2));?></div>
	<div style="position:absolute; left: 8.62cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE2_2));?></div>
	<div style="position:absolute; left:10.12cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS2_2));?></div>
	<div style="position:absolute; left:11.62cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE3_2));?></div>
	<div style="position:absolute; left:13.12cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS3_2));?></div>
	<div style="position:absolute; left:14.62cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE4_2));?></div>
	<div style="position:absolute; left:16.12cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS4_2));?></div>
	<div style="position:absolute; left:17.62cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE5_2));?></div>
	<div style="position:absolute; left:19.12cm; top: 5.64cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS5_2));?></div>

	<div style="position:absolute; left: 1.75cm; top: 5.87cm; font-size:8px"><?echo substr($dia1_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE1_3));?></div>
	<div style="position:absolute; left: 7.12cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS1_3));?></div>
	<div style="position:absolute; left: 8.62cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE2_3));?></div>
	<div style="position:absolute; left:10.12cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS2_3));?></div>
	<div style="position:absolute; left:11.62cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE3_3));?></div>
	<div style="position:absolute; left:13.12cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS3_3));?></div>
	<div style="position:absolute; left:14.62cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE4_3));?></div>
	<div style="position:absolute; left:16.12cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS4_3));?></div>
	<div style="position:absolute; left:17.62cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE5_3));?></div>
	<div style="position:absolute; left:19.12cm; top: 5.87cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS5_3));?></div>

	<div style="position:absolute; left: 1.75cm; top: 6.10cm; font-size:8px"><?echo substr($dia1_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE1_4));?></div>
	<div style="position:absolute; left: 7.12cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS1_4));?></div>
	<div style="position:absolute; left: 8.62cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE2_4));?></div>
	<div style="position:absolute; left:10.12cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS2_4));?></div>
	<div style="position:absolute; left:11.62cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE3_4));?></div>
	<div style="position:absolute; left:13.12cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS3_4));?></div>
	<div style="position:absolute; left:14.62cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE4_4));?></div>
	<div style="position:absolute; left:16.12cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS4_4));?></div>
	<div style="position:absolute; left:17.62cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE5_4));?></div>
	<div style="position:absolute; left:19.12cm; top: 6.10cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS5_4));?></div>

	<div style="position:absolute; left: 1.75cm; top: 6.33cm; font-size:8px"><?echo substr($dia1_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE1_5));?></div>
	<div style="position:absolute; left: 7.12cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS1_5));?></div>
	<div style="position:absolute; left: 8.62cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE2_5));?></div>
	<div style="position:absolute; left:10.12cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS2_5));?></div>
	<div style="position:absolute; left:11.62cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE3_5));?></div>
	<div style="position:absolute; left:13.12cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS3_5));?></div>
	<div style="position:absolute; left:14.62cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE4_5));?></div>
	<div style="position:absolute; left:16.12cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS4_5));?></div>
	<div style="position:absolute; left:17.62cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HE5_5));?></div>
	<div style="position:absolute; left:19.12cm; top: 6.33cm" class=hora><?echo date ("h:i A", strtotime($dia1_HS5_5));?></div>

<!-- *****************************************			 DÍA 2			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top: 6.87cm"><?echo $dia2_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top: 7.15cm"><?echo substr($dia2_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top: 7.15cm"><?echo substr($dia2_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top: 7.15cm"><?echo $dia2_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top: 7.15cm"><?echo substr($dia2_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top: 7.45cm"><?echo substr($dia2_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top: 7.45cm"><?echo $dia2_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top: 7.45cm"><?echo $dia2_O;?></div>
	<div style="position:absolute; left:14.00cm; top: 7.45cm"><?echo $dia2_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top: 7.45cm"><?echo $dia2_CO;?></div>
	<div style="position:absolute; left:19.15cm; top: 7.28cm" class="radio"><?if ($dia2_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top: 7.28cm" class="radio"><?if ($dia2_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top: 8.07cm" class=date>				<?if  ($dia2_H1_1 != "")  {echo date ("h:i A", strtotime($dia2_H1_1));}?></div>
	<div style="position:absolute; left: 6.35cm; top: 8.07cm" class=resultado>	<?echo $dia2_R1_1?></div>
	<div style="position:absolute; left: 7.10cm; top: 8.07cm" class=date>				<?if  ($dia2_H2_1 != "")  {echo date ("h:i A", strtotime($dia2_H2_1));}?></div>
	<div style="position:absolute; left: 7.83cm; top: 8.07cm" class=resultado>	<?echo $dia2_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top: 8.07cm" class=date>				<?if  ($dia2_H3_1 != "")  {echo date ("h:i A", strtotime($dia2_H3_1));}?></div>
	<div style="position:absolute; left: 9.33cm; top: 8.07cm" class=resultado>	<?echo $dia2_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top: 8.07cm" class=date>				<?if  ($dia2_H4_1 != "")  {echo date ("h:i A", strtotime($dia2_H4_1));}?></div>
	<div style="position:absolute; left:10.82cm; top: 8.07cm" class=resultado>	<?echo $dia2_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top: 8.07cm" class=date>				<?if  ($dia2_H5_1 != "")  {echo date ("h:i A", strtotime($dia2_H5_1));}?></div>
	<div style="position:absolute; left:12.33cm; top: 8.07cm" class=resultado>	<?echo $dia2_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top: 8.07cm" class=date>				<?if  ($dia2_H6_1 != "")  {echo date ("h:i A", strtotime($dia2_H6_1));}?></div>
	<div style="position:absolute; left:13.79cm; top: 8.07cm" class=resultado>	<?echo $dia2_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top: 8.07cm" class=date>				<?if  ($dia2_H7_1 != "")  {echo date ("h:i A", strtotime($dia2_H7_1));}?></div>
	<div style="position:absolute; left:15.29cm; top: 8.07cm" class=resultado>	<?echo $dia2_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top: 8.07cm" class=date>				<?if  ($dia2_H8_1 != "")  {echo date ("h:i A", strtotime($dia2_H8_1));}?></div>
	<div style="position:absolute; left:16.79cm; top: 8.07cm" class=resultado>	<?echo $dia2_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top: 8.07cm" class=date>				<?if  ($dia2_H9_1 != "")  {echo date ("h:i A", strtotime($dia2_H9_1));}?></div>
	<div style="position:absolute; left:18.27cm; top: 8.07cm" class=resultado>	<?echo $dia2_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top: 8.07cm" class=date>				<?if  ($dia2_H10_1 != "") {echo date ("h:i A", strtotime($dia2_H10_1));}?></div>
	<div style="position:absolute; left:19.75cm; top: 8.07cm" class=resultado>	<?echo $dia2_R10_1;?></div>

	<div style="position:absolute; left: 5.62cm; top: 8.32cm" class=date>				<?if  ($dia2_H1_2 != "")  {echo date ("h:i A", strtotime($dia2_H1_2));}?></div>
	<div style="position:absolute; left: 6.35cm; top: 8.32cm" class=resultado>	<?echo $dia2_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top: 8.32cm" class=date>				<?if  ($dia2_H2_2 != "")  {echo date ("h:i A", strtotime($dia2_H2_2));}?></div>
	<div style="position:absolute; left: 7.83cm; top: 8.32cm" class=resultado>	<?echo $dia2_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top: 8.32cm" class=date>				<?if  ($dia2_H3_2 != "")  {echo date ("h:i A", strtotime($dia2_H3_2));}?></div>
	<div style="position:absolute; left: 9.33cm; top: 8.32cm" class=resultado>	<?echo $dia2_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top: 8.32cm" class=date>				<?if  ($dia2_H4_2 != "")  {echo date ("h:i A", strtotime($dia2_H4_2));}?></div>
	<div style="position:absolute; left:10.82cm; top: 8.32cm" class=resultado>	<?echo $dia2_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top: 8.32cm" class=date>				<?if  ($dia2_H5_2 != "")  {echo date ("h:i A", strtotime($dia2_H5_2));}?></div>
	<div style="position:absolute; left:12.33cm; top: 8.32cm" class=resultado>	<?echo $dia2_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top: 8.32cm" class=date>				<?if  ($dia2_H6_2 != "")  {echo date ("h:i A", strtotime($dia2_H6_2));}?></div>
	<div style="position:absolute; left:13.79cm; top: 8.32cm" class=resultado>	<?echo $dia2_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top: 8.32cm" class=date>				<?if  ($dia2_H7_2 != "")  {echo date ("h:i A", strtotime($dia2_H7_2));}?></div>
	<div style="position:absolute; left:15.29cm; top: 8.32cm" class=resultado>	<?echo $dia2_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top: 8.32cm" class=date>				<?if  ($dia2_H8_2 != "")  {echo date ("h:i A", strtotime($dia2_H8_2));}?></div>
	<div style="position:absolute; left:16.79cm; top: 8.32cm" class=resultado>	<?echo $dia2_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top: 8.32cm" class=date>				<?if  ($dia2_H9_2 != "")  {echo date ("h:i A", strtotime($dia2_H9_2));}?></div>
	<div style="position:absolute; left:18.27cm; top: 8.32cm" class=resultado>	<?echo $dia2_R9_2;?></div>
	<div style="position:absolute; left:19.01cm; top: 8.32cm" class=date>				<?if  ($dia2_H10_2 != "") {echo date ("h:i A", strtotime($dia2_H10_2));}?></div>
	<div style="position:absolute; left:19.75cm; top: 8.32cm" class=resultado>	<?echo $dia2_R10_2;?></div>

	<div style="position:absolute; left: 5.62cm; top: 8.55cm" class=date>				<?if  ($dia2_H1_3 != "")  {echo date ("h:i A", strtotime($dia2_H1_3));}?></div>
	<div style="position:absolute; left: 6.35cm; top: 8.55cm" class=resultado>	<?echo $dia2_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top: 8.55cm" class=date>				<?if  ($dia2_H2_3 != "")  {echo date ("h:i A", strtotime($dia2_H2_3));}?></div>
	<div style="position:absolute; left: 7.83cm; top: 8.55cm" class=resultado>	<?echo $dia2_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top: 8.55cm" class=date>				<?if  ($dia2_H3_3 != "")  {echo date ("h:i A", strtotime($dia2_H3_3));}?></div>
	<div style="position:absolute; left: 9.33cm; top: 8.55cm" class=resultado>	<?echo $dia2_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top: 8.55cm" class=date>				<?if  ($dia2_H4_3 != "")  {echo date ("h:i A", strtotime($dia2_H4_3));}?></div>
	<div style="position:absolute; left:10.82cm; top: 8.55cm" class=resultado>	<?echo $dia2_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top: 8.55cm" class=date>				<?if  ($dia2_H5_3 != "")  {echo date ("h:i A", strtotime($dia2_H5_3));}?></div>
	<div style="position:absolute; left:12.33cm; top: 8.55cm" class=resultado>	<?echo $dia2_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top: 8.55cm" class=date>				<?if  ($dia2_H6_3 != "")  {echo date ("h:i A", strtotime($dia2_H6_3));}?></div>
	<div style="position:absolute; left:13.79cm; top: 8.55cm" class=resultado>	<?echo $dia2_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top: 8.55cm" class=date>				<?if  ($dia2_H7_3 != "")  {echo date ("h:i A", strtotime($dia2_H7_3));}?></div>
	<div style="position:absolute; left:15.29cm; top: 8.55cm" class=resultado>	<?echo $dia2_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top: 8.55cm" class=date>				<?if  ($dia2_H8_3 != "")  {echo date ("h:i A", strtotime($dia2_H8_3));}?></div>
	<div style="position:absolute; left:16.79cm; top: 8.55cm" class=resultado>	<?echo $dia2_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top: 8.55cm" class=date>				<?if  ($dia2_H9_3 != "")  {echo date ("h:i A", strtotime($dia2_H9_3));}?></div>
	<div style="position:absolute; left:18.27cm; top: 8.55cm" class=resultado>	<?echo $dia2_R9_3?></div>
	<div style="position:absolute; left:19.01cm; top: 8.55cm" class=date>				<?if  ($dia2_H10_3 != "") {echo date ("h:i A", strtotime($dia2_H10_3));};?></div>
	<div style="position:absolute; left:19.75cm; top: 8.55cm" class=resultado>	<?echo $dia2_R10_3?></div>

	<div style="position:absolute; left: 5.62cm; top: 8.78cm" class=date>				<?if  ($dia2_H1_4 != "")  {echo date ("h:i A", strtotime($dia2_H1_4));}?></div>
	<div style="position:absolute; left: 6.35cm; top: 8.78cm" class=resultado>	<?echo $dia2_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top: 8.78cm" class=date>				<?if  ($dia2_H2_4 != "")  {echo date ("h:i A", strtotime($dia2_H2_4));}?></div>
	<div style="position:absolute; left: 7.83cm; top: 8.78cm" class=resultado>	<?echo $dia2_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top: 8.78cm" class=date>				<?if  ($dia2_H3_4 != "")  {echo date ("h:i A", strtotime($dia2_H3_4));}?></div>
	<div style="position:absolute; left: 9.33cm; top: 8.78cm" class=resultado>	<?echo $dia2_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top: 8.78cm" class=date>				<?if  ($dia2_H4_4 != "")  {echo date ("h:i A", strtotime($dia2_H4_4));}?></div>
	<div style="position:absolute; left:10.82cm; top: 8.78cm" class=resultado>	<?echo $dia2_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top: 8.78cm" class=date>				<?if  ($dia2_H5_4 != "")  {echo date ("h:i A", strtotime($dia2_H5_4));}?></div>
	<div style="position:absolute; left:12.33cm; top: 8.78cm" class=resultado>	<?echo $dia2_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top: 8.78cm" class=date>				<?if  ($dia2_H6_4 != "")  {echo date ("h:i A", strtotime($dia2_H6_4));}?></div>
	<div style="position:absolute; left:13.79cm; top: 8.78cm" class=resultado>	<?echo $dia2_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top: 8.78cm" class=date>				<?if  ($dia2_H7_4 != "")  {echo date ("h:i A", strtotime($dia2_H7_4));}?></div>
	<div style="position:absolute; left:15.29cm; top: 8.78cm" class=resultado>	<?echo $dia2_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top: 8.78cm" class=date>				<?if  ($dia2_H8_4 != "")  {echo date ("h:i A", strtotime($dia2_H8_4));}?></div>
	<div style="position:absolute; left:16.79cm; top: 8.78cm" class=resultado>	<?echo $dia2_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top: 8.78cm" class=date>				<?if  ($dia2_H9_4 != "")  {echo date ("h:i A", strtotime($dia2_H9_4));}?></div>
	<div style="position:absolute; left:18.27cm; top: 8.78cm" class=resultado>	<?echo $dia2_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top: 8.78cm" class=date>				<?if  ($dia2_H10_4 != "") {echo date ("h:i A", strtotime($dia2_H10_4));}?></div>
	<div style="position:absolute; left:19.75cm; top: 8.78cm" class=resultado>	<?echo $dia2_R10_4;?></div>

	<div style="position:absolute; left: 1.75cm; top: 9.58cm; font-size:8px"><?echo substr($dia2_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 9.58cm" class=hora><?if ($dia2_HE1_1 != "") {echo date ("h:i A", strtotime($dia2_HE1_1));}?></div>
	<div style="position:absolute; left: 7.12cm; top: 9.58cm" class=hora><?if ($dia2_HS1_1 != "") {echo date ("h:i A", strtotime($dia2_HS1_1));}?></div>
	<div style="position:absolute; left: 8.62cm; top: 9.58cm" class=hora><?if ($dia2_HE2_1 != "") {echo date ("h:i A", strtotime($dia2_HE2_1));}?></div>
	<div style="position:absolute; left:10.12cm; top: 9.58cm" class=hora><?if ($dia2_HS2_1 != "") {echo date ("h:i A", strtotime($dia2_HS2_1));}?></div>
	<div style="position:absolute; left:11.62cm; top: 9.58cm" class=hora><?if ($dia2_HE3_1 != "") {echo date ("h:i A", strtotime($dia2_HE3_1));}?></div>
	<div style="position:absolute; left:13.12cm; top: 9.58cm" class=hora><?if ($dia2_HS3_1 != "") {echo date ("h:i A", strtotime($dia2_HS3_1));}?></div>
	<div style="position:absolute; left:14.62cm; top: 9.58cm" class=hora><?if ($dia2_HE4_1 != "") {echo date ("h:i A", strtotime($dia2_HE4_1));}?></div>
	<div style="position:absolute; left:16.12cm; top: 9.58cm" class=hora><?if ($dia2_HS4_1 != "") {echo date ("h:i A", strtotime($dia2_HS4_1));}?></div>
	<div style="position:absolute; left:17.62cm; top: 9.58cm" class=hora><?if ($dia2_HE5_1 != "") {echo date ("h:i A", strtotime($dia2_HE5_1));}?></div>
	<div style="position:absolute; left:19.12cm; top: 9.58cm" class=hora><?if ($dia2_HS5_1 != "") {echo date ("h:i A", strtotime($dia2_HS5_1));}?></div>
	
	<div style="position:absolute; left: 1.75cm; top: 9.81cm; font-size:8px"><?echo substr($dia2_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top: 9.81cm" class=hora><?if ($dia2_HE1_2 != "") {echo date ("h:i A", strtotime($dia2_HE1_2));}?></div>
	<div style="position:absolute; left: 7.12cm; top: 9.81cm" class=hora><?if ($dia2_HS1_2 != "") {echo date ("h:i A", strtotime($dia2_HS1_2));}?></div>
	<div style="position:absolute; left: 8.62cm; top: 9.81cm" class=hora><?if ($dia2_HE2_2 != "") {echo date ("h:i A", strtotime($dia2_HE2_2));}?></div>
	<div style="position:absolute; left:10.12cm; top: 9.81cm" class=hora><?if ($dia2_HS2_2 != "") {echo date ("h:i A", strtotime($dia2_HS2_2));}?></div>
	<div style="position:absolute; left:11.62cm; top: 9.81cm" class=hora><?if ($dia2_HE3_2 != "") {echo date ("h:i A", strtotime($dia2_HE3_2));}?></div>
	<div style="position:absolute; left:13.12cm; top: 9.81cm" class=hora><?if ($dia2_HS3_2 != "") {echo date ("h:i A", strtotime($dia2_HS3_2));}?></div>
	<div style="position:absolute; left:14.62cm; top: 9.81cm" class=hora><?if ($dia2_HE4_2 != "") {echo date ("h:i A", strtotime($dia2_HE4_2));}?></div>
	<div style="position:absolute; left:16.12cm; top: 9.81cm" class=hora><?if ($dia2_HS4_2 != "") {echo date ("h:i A", strtotime($dia2_HS4_2));}?></div>
	<div style="position:absolute; left:17.62cm; top: 9.81cm" class=hora><?if ($dia2_HE5_2 != "") {echo date ("h:i A", strtotime($dia2_HE5_2));}?></div>
	<div style="position:absolute; left:19.12cm; top: 9.81cm" class=hora><?if ($dia2_HS5_2 != "") {echo date ("h:i A", strtotime($dia2_HS5_2));}?></div>

	<div style="position:absolute; left: 1.75cm; top:10.04cm; font-size:8px"><?echo substr($dia2_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:10.04cm" class=hora><?if ($dia2_HE1_3 != "") {echo date ("h:i A", strtotime($dia2_HE1_3));}?></div>
	<div style="position:absolute; left: 7.12cm; top:10.04cm" class=hora><?if ($dia2_HS1_3 != "") {echo date ("h:i A", strtotime($dia2_HS1_3));}?></div>
	<div style="position:absolute; left: 8.62cm; top:10.04cm" class=hora><?if ($dia2_HE2_3 != "") {echo date ("h:i A", strtotime($dia2_HE2_3));}?></div>
	<div style="position:absolute; left:10.12cm; top:10.04cm" class=hora><?if ($dia2_HS2_3 != "") {echo date ("h:i A", strtotime($dia2_HS2_3));}?></div>
	<div style="position:absolute; left:11.62cm; top:10.04cm" class=hora><?if ($dia2_HE3_3 != "") {echo date ("h:i A", strtotime($dia2_HE3_3));}?></div>
	<div style="position:absolute; left:13.12cm; top:10.04cm" class=hora><?if ($dia2_HS3_3 != "") {echo date ("h:i A", strtotime($dia2_HS3_3));}?></div>
	<div style="position:absolute; left:14.62cm; top:10.04cm" class=hora><?if ($dia2_HE4_3 != "") {echo date ("h:i A", strtotime($dia2_HE4_3));}?></div>
	<div style="position:absolute; left:16.12cm; top:10.04cm" class=hora><?if ($dia2_HS4_3 != "") {echo date ("h:i A", strtotime($dia2_HS4_3));}?></div>
	<div style="position:absolute; left:17.62cm; top:10.04cm" class=hora><?if ($dia2_HE5_3 != "") {echo date ("h:i A", strtotime($dia2_HE5_3));}?></div>
	<div style="position:absolute; left:19.12cm; top:10.04cm" class=hora><?if ($dia2_HS5_3 != "") {echo date ("h:i A", strtotime($dia2_HS5_3));}?></div>

	<div style="position:absolute; left: 1.75cm; top:10.27cm; font-size:8px"><?echo substr($dia2_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:10.27cm" class=hora><?if ($dia2_HE1_4 != "") {echo date ("h:i A", strtotime($dia2_HE1_4));}?></div>
	<div style="position:absolute; left: 7.12cm; top:10.27cm" class=hora><?if ($dia2_HS1_4 != "") {echo date ("h:i A", strtotime($dia2_HS1_4));}?></div>
	<div style="position:absolute; left: 8.62cm; top:10.27cm" class=hora><?if ($dia2_HE2_4 != "") {echo date ("h:i A", strtotime($dia2_HE2_4));}?></div>
	<div style="position:absolute; left:10.12cm; top:10.27cm" class=hora><?if ($dia2_HS2_4 != "") {echo date ("h:i A", strtotime($dia2_HS2_4));}?></div>
	<div style="position:absolute; left:11.62cm; top:10.27cm" class=hora><?if ($dia2_HE3_4 != "") {echo date ("h:i A", strtotime($dia2_HE3_4));}?></div>
	<div style="position:absolute; left:13.12cm; top:10.27cm" class=hora><?if ($dia2_HS3_4 != "") {echo date ("h:i A", strtotime($dia2_HS3_4));}?></div>
	<div style="position:absolute; left:14.62cm; top:10.27cm" class=hora><?if ($dia2_HE4_4 != "") {echo date ("h:i A", strtotime($dia2_HE4_4));}?></div>
	<div style="position:absolute; left:16.12cm; top:10.27cm" class=hora><?if ($dia2_HS4_4 != "") {echo date ("h:i A", strtotime($dia2_HS4_4));}?></div>
	<div style="position:absolute; left:17.62cm; top:10.27cm" class=hora><?if ($dia2_HE5_4 != "") {echo date ("h:i A", strtotime($dia2_HE5_4));}?></div>
	<div style="position:absolute; left:19.12cm; top:10.27cm" class=hora><?if ($dia2_HS5_4 != "") {echo date ("h:i A", strtotime($dia2_HS5_4));}?></div>

	<div style="position:absolute; left: 1.75cm; top:10.50cm; font-size:8px"><?echo substr($dia2_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:10.50cm" class=hora><?if ($dia2_HE1_5 != "") {echo date ("h:i A", strtotime($dia2_HE1_5));}?></div>
	<div style="position:absolute; left: 7.12cm; top:10.50cm" class=hora><?if ($dia2_HS1_5 != "") {echo date ("h:i A", strtotime($dia2_HS1_5));}?></div>
	<div style="position:absolute; left: 8.62cm; top:10.50cm" class=hora><?if ($dia2_HE2_5 != "") {echo date ("h:i A", strtotime($dia2_HE2_5));}?></div>
	<div style="position:absolute; left:10.12cm; top:10.50cm" class=hora><?if ($dia2_HS2_5 != "") {echo date ("h:i A", strtotime($dia2_HS2_5));}?></div>
	<div style="position:absolute; left:11.62cm; top:10.50cm" class=hora><?if ($dia2_HE3_5 != "") {echo date ("h:i A", strtotime($dia2_HE3_5));}?></div>
	<div style="position:absolute; left:13.12cm; top:10.50cm" class=hora><?if ($dia2_HS3_5 != "") {echo date ("h:i A", strtotime($dia2_HS3_5));}?></div>
	<div style="position:absolute; left:14.62cm; top:10.50cm" class=hora><?if ($dia2_HE4_5 != "") {echo date ("h:i A", strtotime($dia2_HE4_5));}?></div>
	<div style="position:absolute; left:16.12cm; top:10.50cm" class=hora><?if ($dia2_HS4_5 != "") {echo date ("h:i A", strtotime($dia2_HS4_5));}?></div>
	<div style="position:absolute; left:17.62cm; top:10.50cm" class=hora><?if ($dia2_HE5_5 != "") {echo date ("h:i A", strtotime($dia2_HE5_5));}?></div>
	<div style="position:absolute; left:19.12cm; top:10.50cm" class=hora><?if ($dia2_HS5_5 != "") {echo date ("h:i A", strtotime($dia2_HS5_5));}?></div>

<!-- *****************************************			 DÍA 3			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:11.07cm"><?echo $dia3_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top:11.34cm"><?echo substr($dia3_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top:11.34cm"><?echo substr($dia3_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top:11.34cm"><?echo $dia3_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top:11.34cm"><?echo substr($dia3_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top:11.63cm"><?echo substr($dia3_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top:11.63cm"><?echo $dia3_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top:11.63cm"><?echo $dia3_O;?></div>
	<div style="position:absolute; left:14.00cm; top:11.63cm"><?echo $dia3_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top:11.63cm"><?echo $dia3_CO;?></div>
	<div style="position:absolute; left:19.15cm; top:11.46cm" class="radio"><?if ($dia3_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top:11.46cm" class="radio"><?if ($dia3_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top:12.25cm" class=date>				<?if  ($dia3_H1_1 != "")  {echo date ("h:i A", strtotime($dia3_H1_1));}?></div>
	<div style="position:absolute; left: 6.35cm; top:12.25cm" class=resultado>	<?echo $dia3_R1_1;?></div>
	<div style="position:absolute; left: 7.10cm; top:12.25cm" class=date>				<?if  ($dia3_H2_1 != "")  {echo date ("h:i A", strtotime($dia3_H2_1));}?></div>
	<div style="position:absolute; left: 7.83cm; top:12.25cm" class=resultado>	<?echo $dia3_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top:12.25cm" class=date>				<?if  ($dia3_H3_1 != "")  {echo date ("h:i A", strtotime($dia3_H3_1));}?></div>
	<div style="position:absolute; left: 9.33cm; top:12.25cm" class=resultado>	<?echo $dia3_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top:12.25cm" class=date>				<?if  ($dia3_H4_1 != "")  {echo date ("h:i A", strtotime($dia3_H4_1));}?></div>
	<div style="position:absolute; left:10.82cm; top:12.25cm" class=resultado>	<?echo $dia3_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top:12.25cm" class=date>				<?if  ($dia3_H5_1 != "")  {echo date ("h:i A", strtotime($dia3_H5_1));}?></div>
	<div style="position:absolute; left:12.33cm; top:12.25cm" class=resultado>	<?echo $dia3_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top:12.25cm" class=date>				<?if  ($dia3_H6_1 != "")  {echo date ("h:i A", strtotime($dia3_H6_1));}?></div>
	<div style="position:absolute; left:13.79cm; top:12.25cm" class=resultado>	<?echo $dia3_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top:12.25cm" class=date>				<?if  ($dia3_H7_1 != "")  {echo date ("h:i A", strtotime($dia3_H7_1));}?></div>
	<div style="position:absolute; left:15.29cm; top:12.25cm" class=resultado>	<?echo $dia3_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top:12.25cm" class=date>				<?if  ($dia3_H8_1 != "")  {echo date ("h:i A", strtotime($dia3_H8_1));}?></div>
	<div style="position:absolute; left:16.79cm; top:12.25cm" class=resultado>	<?echo $dia3_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top:12.25cm" class=date>				<?if  ($dia3_H9_1 != "")  {echo date ("h:i A", strtotime($dia3_H9_1));}?></div>
	<div style="position:absolute; left:18.27cm; top:12.25cm" class=resultado>	<?echo $dia3_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top:12.25cm" class=date>				<?if  ($dia3_H10_1 != "") {echo date ("h:i A", strtotime($dia3_H10_1));}?></div>
	<div style="position:absolute; left:19.75cm; top:12.25cm" class=resultado>	<?echo $dia3_R10_1;?></div>

	<div style="position:absolute; left: 5.62cm; top:12.50cm" class=date>				<?if  ($dia3_H1_2 != "")  {echo date ("h:i A", strtotime($dia3_H1_2));}?></div>
	<div style="position:absolute; left: 6.35cm; top:12.50cm" class=resultado>	<?echo $dia3_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top:12.50cm" class=date>				<?if  ($dia3_H2_2 != "")  {echo date ("h:i A", strtotime($dia3_H2_2));}?></div>
	<div style="position:absolute; left: 7.83cm; top:12.50cm" class=resultado>	<?echo $dia3_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top:12.50cm" class=date>				<?if  ($dia3_H3_2 != "")  {echo date ("h:i A", strtotime($dia3_H3_2));}?></div>
	<div style="position:absolute; left: 9.33cm; top:12.50cm" class=resultado>	<?echo $dia3_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top:12.50cm" class=date>				<?if  ($dia3_H4_2 != "")  {echo date ("h:i A", strtotime($dia3_H4_2));}?></div>
	<div style="position:absolute; left:10.82cm; top:12.50cm" class=resultado>	<?echo $dia3_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top:12.50cm" class=date>				<?if  ($dia3_H5_2 != "")  {echo date ("h:i A", strtotime($dia3_H5_2));}?></div>
	<div style="position:absolute; left:12.33cm; top:12.50cm" class=resultado>	<?echo $dia3_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top:12.50cm" class=date>				<?if  ($dia3_H6_2 != "")  {echo date ("h:i A", strtotime($dia3_H6_2));}?></div>
	<div style="position:absolute; left:13.79cm; top:12.50cm" class=resultado>	<?echo $dia3_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top:12.50cm" class=date>				<?if  ($dia3_H7_2 != "")  {echo date ("h:i A", strtotime($dia3_H7_2));}?></div>
	<div style="position:absolute; left:15.29cm; top:12.50cm" class=resultado>	<?echo $dia3_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top:12.50cm" class=date>				<?if  ($dia3_H8_2 != "")  {echo date ("h:i A", strtotime($dia3_H8_2));}?></div>
	<div style="position:absolute; left:16.79cm; top:12.50cm" class=resultado>	<?echo $dia3_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top:12.50cm" class=date>				<?if  ($dia3_H9_2 != "")  {echo date ("h:i A", strtotime($dia3_H9_2));}?></div>
	<div style="position:absolute; left:18.27cm; top:12.50cm" class=resultado>	<?echo $dia3_R9_2;?></div>
	<div style="position:absolute; left:19.01cm; top:12.50cm" class=date>				<?if  ($dia3_H10_2 != "") {echo date ("h:i A", strtotime($dia3_H10_2));}?></div>
	<div style="position:absolute; left:19.75cm; top:12.50cm" class=resultado>	<?echo $dia3_R10_2;?></div>

	<div style="position:absolute; left: 5.62cm; top:12.73cm" class=date>				<?if  ($dia3_H1_3 != "")  {echo date ("h:i A", strtotime($dia3_H1_3));}?></div>
	<div style="position:absolute; left: 6.35cm; top:12.73cm" class=resultado>	<?echo $dia3_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top:12.73cm" class=date>				<?if  ($dia3_H2_3 != "")  {echo date ("h:i A", strtotime($dia3_H2_3));}?></div>
	<div style="position:absolute; left: 7.83cm; top:12.73cm" class=resultado>	<?echo $dia3_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top:12.73cm" class=date>				<?if  ($dia3_H3_3 != "")  {echo date ("h:i A", strtotime($dia3_H3_3));}?></div>
	<div style="position:absolute; left: 9.33cm; top:12.73cm" class=resultado>	<?echo $dia3_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top:12.73cm" class=date>				<?if  ($dia3_H4_3 != "")  {echo date ("h:i A", strtotime($dia3_H4_3));}?></div>
	<div style="position:absolute; left:10.82cm; top:12.73cm" class=resultado>	<?echo $dia3_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top:12.73cm" class=date>				<?if  ($dia3_H5_3 != "")  {echo date ("h:i A", strtotime($dia3_H5_3));}?></div>
	<div style="position:absolute; left:12.33cm; top:12.73cm" class=resultado>	<?echo $dia3_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top:12.73cm" class=date>				<?if  ($dia3_H6_3 != "")  {echo date ("h:i A", strtotime($dia3_H6_3));}?></div>
	<div style="position:absolute; left:13.79cm; top:12.73cm" class=resultado>	<?echo $dia3_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top:12.73cm" class=date>				<?if  ($dia3_H7_3 != "")  {echo date ("h:i A", strtotime($dia3_H7_3));}?></div>
	<div style="position:absolute; left:15.29cm; top:12.73cm" class=resultado>	<?echo $dia3_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top:12.73cm" class=date>				<?if  ($dia3_H8_3 != "")  {echo date ("h:i A", strtotime($dia3_H8_3));}?></div>
	<div style="position:absolute; left:16.79cm; top:12.73cm" class=resultado>	<?echo $dia3_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top:12.73cm" class=date>				<?if  ($dia3_H9_3 != "")  {echo date ("h:i A", strtotime($dia3_H9_3));}?></div>
	<div style="position:absolute; left:18.27cm; top:12.73cm" class=resultado>	<?echo $dia3_R9_3;?></div>
	<div style="position:absolute; left:19.01cm; top:12.73cm" class=date>				<?if  ($dia3_H10_3 != "") {echo date ("h:i A", strtotime($dia3_H10_3));}?></div>
	<div style="position:absolute; left:19.75cm; top:12.73cm" class=resultado>	<?echo $dia3_R10_3;?></div>

	<div style="position:absolute; left: 5.62cm; top:12.96cm" class=date>				<?if 	($dia3_H1_4 != "")  {echo date ("h:i A", strtotime($dia3_H1_4));}?></div>
	<div style="position:absolute; left: 6.35cm; top:12.96cm" class=resultado>	<?echo $dia3_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top:12.96cm" class=date>				<?if 	($dia3_H2_4 != "")  {echo date ("h:i A", strtotime($dia3_H2_4));}?></div>
	<div style="position:absolute; left: 7.83cm; top:12.96cm" class=resultado>	<?echo $dia3_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top:12.96cm" class=date>				<?if 	($dia3_H3_4 != "")  {echo date ("h:i A", strtotime($dia3_H3_4));}?></div>
	<div style="position:absolute; left: 9.33cm; top:12.96cm" class=resultado>	<?echo $dia3_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top:12.96cm" class=date>				<?if 	($dia3_H4_4 != "")  {echo date ("h:i A", strtotime($dia3_H4_4));}?></div>
	<div style="position:absolute; left:10.82cm; top:12.96cm" class=resultado>	<?echo $dia3_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top:12.96cm" class=date>				<?if 	($dia3_H5_4 != "")  {echo date ("h:i A", strtotime($dia3_H5_4));}?></div>
	<div style="position:absolute; left:12.33cm; top:12.96cm" class=resultado>	<?echo $dia3_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top:12.96cm" class=date>				<?if 	($dia3_H6_4 != "")  {echo date ("h:i A", strtotime($dia3_H6_4));}?></div>
	<div style="position:absolute; left:13.79cm; top:12.96cm" class=resultado>	<?echo $dia3_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top:12.96cm" class=date>				<?if 	($dia3_H7_4 != "")  {echo date ("h:i A", strtotime($dia3_H7_4));}?></div>
	<div style="position:absolute; left:15.29cm; top:12.96cm" class=resultado>	<?echo $dia3_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top:12.96cm" class=date>				<?if 	($dia3_H8_4 != "")  {echo date ("h:i A", strtotime($dia3_H8_4));}?></div>
	<div style="position:absolute; left:16.79cm; top:12.96cm" class=resultado>	<?echo $dia3_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top:12.96cm" class=date>				<?if 	($dia3_H9_4 != "")  {echo date ("h:i A", strtotime($dia3_H9_4));}?></div>
	<div style="position:absolute; left:18.27cm; top:12.96cm" class=resultado>	<?echo $dia3_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top:12.96cm" class=date>				<?if 	($dia3_H10_4 != "") {echo date ("h:i A", strtotime($dia3_H10_4));}?></div>
	<div style="position:absolute; left:19.75cm; top:12.96cm" class=resultado>	<?echo $dia3_R10_4;?></div>

	<div style="position:absolute; left: 1.75cm; top:13.75cm; font-size:8px"><?echo substr($dia3_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:13.75cm" class=hora><?if ($dia3_HE1_1 != "") {echo date ("h:i A", strtotime($dia3_HE1_1));}?></div>
	<div style="position:absolute; left: 7.12cm; top:13.75cm" class=hora><?if ($dia3_HS1_1 != "") {echo date ("h:i A", strtotime($dia3_HS1_1));}?></div>
	<div style="position:absolute; left: 8.62cm; top:13.75cm" class=hora><?if ($dia3_HE2_1 != "") {echo date ("h:i A", strtotime($dia3_HE2_1));}?></div>
	<div style="position:absolute; left:10.12cm; top:13.75cm" class=hora><?if ($dia3_HS2_1 != "") {echo date ("h:i A", strtotime($dia3_HS2_1));}?></div>
	<div style="position:absolute; left:11.62cm; top:13.75cm" class=hora><?if ($dia3_HE3_1 != "") {echo date ("h:i A", strtotime($dia3_HE3_1));}?></div>
	<div style="position:absolute; left:13.12cm; top:13.75cm" class=hora><?if ($dia3_HS3_1 != "") {echo date ("h:i A", strtotime($dia3_HS3_1));}?></div>
	<div style="position:absolute; left:14.62cm; top:13.75cm" class=hora><?if ($dia3_HE4_1 != "") {echo date ("h:i A", strtotime($dia3_HE4_1));}?></div>
	<div style="position:absolute; left:16.12cm; top:13.75cm" class=hora><?if ($dia3_HS4_1 != "") {echo date ("h:i A", strtotime($dia3_HS4_1));}?></div>
	<div style="position:absolute; left:17.62cm; top:13.75cm" class=hora><?if ($dia3_HE5_1 != "") {echo date ("h:i A", strtotime($dia3_HE5_1));}?></div>
	<div style="position:absolute; left:19.12cm; top:13.75cm" class=hora><?if ($dia3_HS5_1 != "") {echo date ("h:i A", strtotime($dia3_HS5_1));}?></div>
	
	<div style="position:absolute; left: 1.75cm; top:13.98cm; font-size:8px"><?echo substr($dia3_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:13.98cm" class=hora><?if ($dia3_HE1_2 != "") {echo date ("h:i A", strtotime($dia3_HE1_2));}?></div>
	<div style="position:absolute; left: 7.12cm; top:13.98cm" class=hora><?if ($dia3_HS1_2 != "") {echo date ("h:i A", strtotime($dia3_HS1_2));}?></div>
	<div style="position:absolute; left: 8.62cm; top:13.98cm" class=hora><?if ($dia3_HE2_2 != "") {echo date ("h:i A", strtotime($dia3_HE2_2));}?></div>
	<div style="position:absolute; left:10.12cm; top:13.98cm" class=hora><?if ($dia3_HS2_2 != "") {echo date ("h:i A", strtotime($dia3_HS2_2));}?></div>
	<div style="position:absolute; left:11.62cm; top:13.98cm" class=hora><?if ($dia3_HE3_2 != "") {echo date ("h:i A", strtotime($dia3_HE3_2));}?></div>
	<div style="position:absolute; left:13.12cm; top:13.98cm" class=hora><?if ($dia3_HS3_2 != "") {echo date ("h:i A", strtotime($dia3_HS3_2));}?></div>
	<div style="position:absolute; left:14.62cm; top:13.98cm" class=hora><?if ($dia3_HE4_2 != "") {echo date ("h:i A", strtotime($dia3_HE4_2));}?></div>
	<div style="position:absolute; left:16.12cm; top:13.98cm" class=hora><?if ($dia3_HS4_2 != "") {echo date ("h:i A", strtotime($dia3_HS4_2));}?></div>
	<div style="position:absolute; left:17.62cm; top:13.98cm" class=hora><?if ($dia3_HE5_2 != "") {echo date ("h:i A", strtotime($dia3_HE5_2));}?></div>
	<div style="position:absolute; left:19.12cm; top:13.98cm" class=hora><?if ($dia3_HS5_2 != "") {echo date ("h:i A", strtotime($dia3_HS5_2));}?></div>

	<div style="position:absolute; left: 1.75cm; top:14.21cm; font-size:8px"><?echo substr($dia3_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:14.21cm" class=hora><?if ($dia3_HE1_3 != "") {echo date ("h:i A", strtotime($dia3_HE1_3));}?></div>
	<div style="position:absolute; left: 7.12cm; top:14.21cm" class=hora><?if ($dia3_HS1_3 != "") {echo date ("h:i A", strtotime($dia3_HS1_3));}?></div>
	<div style="position:absolute; left: 8.62cm; top:14.21cm" class=hora><?if ($dia3_HE2_3 != "") {echo date ("h:i A", strtotime($dia3_HE2_3));}?></div>
	<div style="position:absolute; left:10.12cm; top:14.21cm" class=hora><?if ($dia3_HS2_3 != "") {echo date ("h:i A", strtotime($dia3_HS2_3));}?></div>
	<div style="position:absolute; left:11.62cm; top:14.21cm" class=hora><?if ($dia3_HE3_3 != "") {echo date ("h:i A", strtotime($dia3_HE3_3));}?></div>
	<div style="position:absolute; left:13.12cm; top:14.21cm" class=hora><?if ($dia3_HS3_3 != "") {echo date ("h:i A", strtotime($dia3_HS3_3));}?></div>
	<div style="position:absolute; left:14.62cm; top:14.21cm" class=hora><?if ($dia3_HE4_3 != "") {echo date ("h:i A", strtotime($dia3_HE4_3));}?></div>
	<div style="position:absolute; left:16.12cm; top:14.21cm" class=hora><?if ($dia3_HS4_3 != "") {echo date ("h:i A", strtotime($dia3_HS4_3));}?></div>
	<div style="position:absolute; left:17.62cm; top:14.21cm" class=hora><?if ($dia3_HE5_3 != "") {echo date ("h:i A", strtotime($dia3_HE5_3));}?></div>
	<div style="position:absolute; left:19.12cm; top:14.21cm" class=hora><?if ($dia3_HS5_3 != "") {echo date ("h:i A", strtotime($dia3_HS5_3));}?></div>

	<div style="position:absolute; left: 1.75cm; top:14.44cm; font-size:8px"><?echo substr($dia3_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:14.44cm" class=hora><?if ($dia3_HE1_4 != "") {echo date ("h:i A", strtotime($dia3_HE1_4));}?></div>
	<div style="position:absolute; left: 7.12cm; top:14.44cm" class=hora><?if ($dia3_HS1_4 != "") {echo date ("h:i A", strtotime($dia3_HS1_4));}?></div>
	<div style="position:absolute; left: 8.62cm; top:14.44cm" class=hora><?if ($dia3_HE2_4 != "") {echo date ("h:i A", strtotime($dia3_HE2_4));}?></div>
	<div style="position:absolute; left:10.12cm; top:14.44cm" class=hora><?if ($dia3_HS2_4 != "") {echo date ("h:i A", strtotime($dia3_HS2_4));}?></div>
	<div style="position:absolute; left:11.62cm; top:14.44cm" class=hora><?if ($dia3_HE3_4 != "") {echo date ("h:i A", strtotime($dia3_HE3_4));}?></div>
	<div style="position:absolute; left:13.12cm; top:14.44cm" class=hora><?if ($dia3_HS3_4 != "") {echo date ("h:i A", strtotime($dia3_HS3_4));}?></div>
	<div style="position:absolute; left:14.62cm; top:14.44cm" class=hora><?if ($dia3_HE4_4 != "") {echo date ("h:i A", strtotime($dia3_HE4_4));}?></div>
	<div style="position:absolute; left:16.12cm; top:14.44cm" class=hora><?if ($dia3_HS4_4 != "") {echo date ("h:i A", strtotime($dia3_HS4_4));}?></div>
	<div style="position:absolute; left:17.62cm; top:14.44cm" class=hora><?if ($dia3_HE5_4 != "") {echo date ("h:i A", strtotime($dia3_HE5_4));}?></div>
	<div style="position:absolute; left:19.12cm; top:14.44cm" class=hora><?if ($dia3_HS5_4 != "") {echo date ("h:i A", strtotime($dia3_HS5_4));}?></div>

	<div style="position:absolute; left: 1.75cm; top:14.67cm; font-size:8px"><?echo substr($dia3_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:14.67cm" class=hora><?if ($dia3_HE1_5 != "") {echo date ("h:i A", strtotime($dia3_HE1_5));}?></div>
	<div style="position:absolute; left: 7.12cm; top:14.67cm" class=hora><?if ($dia3_HS1_5 != "") {echo date ("h:i A", strtotime($dia3_HS1_5));}?></div>
	<div style="position:absolute; left: 8.62cm; top:14.67cm" class=hora><?if ($dia3_HE2_5 != "") {echo date ("h:i A", strtotime($dia3_HE2_5));}?></div>
	<div style="position:absolute; left:10.12cm; top:14.67cm" class=hora><?if ($dia3_HS2_5 != "") {echo date ("h:i A", strtotime($dia3_HS2_5));}?></div>
	<div style="position:absolute; left:11.62cm; top:14.67cm" class=hora><?if ($dia3_HE3_5 != "") {echo date ("h:i A", strtotime($dia3_HE3_5));}?></div>
	<div style="position:absolute; left:13.12cm; top:14.67cm" class=hora><?if ($dia3_HS3_5 != "") {echo date ("h:i A", strtotime($dia3_HS3_5));}?></div>
	<div style="position:absolute; left:14.62cm; top:14.67cm" class=hora><?if ($dia3_HE4_5 != "") {echo date ("h:i A", strtotime($dia3_HE4_5));}?></div>
	<div style="position:absolute; left:16.12cm; top:14.67cm" class=hora><?if ($dia3_HS4_5 != "") {echo date ("h:i A", strtotime($dia3_HS4_5));}?></div>
	<div style="position:absolute; left:17.62cm; top:14.67cm" class=hora><?if ($dia3_HE5_5 != "") {echo date ("h:i A", strtotime($dia3_HE5_5));}?></div>
	<div style="position:absolute; left:19.12cm; top:14.67cm" class=hora><?if ($dia3_HS5_5 != "") {echo date ("h:i A", strtotime($dia3_HS5_5));}?></div>

<!-- *****************************************			 DÍA 4		 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:15.23cm"><?echo $dia4_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top:15.53cm"><?echo substr($dia4_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top:15.53cm"><?echo substr($dia4_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top:15.53cm"><?echo $dia4_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top:15.53cm"><?echo substr($dia4_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top:15.80cm"><?echo substr($dia4_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top:15.80cm"><?echo $dia4_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top:15.80cm"><?echo $dia4_O;?></div>
	<div style="position:absolute; left:14.00cm; top:15.80cm"><?echo $dia4_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top:15.80cm"><?echo $dia4_CO;?></div>
	<div style="position:absolute; left:19.15cm; top:15.63cm" class="radio"><?if ($dia4_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top:15.63cm" class="radio"><?if ($dia4_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top:16.43cm" class=date>				<?if  ($dia4_H1_1 != "")  {echo date ("h:i A", strtotime($dia4_H1_1));}?></div>
	<div style="position:absolute; left: 6.35cm; top:16.43cm" class=resultado>	<?echo $dia4_R1_1;?></div>
	<div style="position:absolute; left: 7.10cm; top:16.43cm" class=date>				<?if  ($dia4_H2_1 != "")  {echo date ("h:i A", strtotime($dia4_H2_1));}?></div>
	<div style="position:absolute; left: 7.83cm; top:16.43cm" class=resultado>	<?echo $dia4_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top:16.43cm" class=date>				<?if  ($dia4_H3_1 != "")  {echo date ("h:i A", strtotime($dia4_H3_1));}?></div>
	<div style="position:absolute; left: 9.33cm; top:16.43cm" class=resultado>	<?echo $dia4_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top:16.43cm" class=date>				<?if  ($dia4_H4_1 != "")  {echo date ("h:i A", strtotime($dia4_H4_1));}?></div>
	<div style="position:absolute; left:10.82cm; top:16.43cm" class=resultado>	<?echo $dia4_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top:16.43cm" class=date>				<?if  ($dia4_H5_1 != "")  {echo date ("h:i A", strtotime($dia4_H5_1));}?></div>
	<div style="position:absolute; left:12.33cm; top:16.43cm" class=resultado>	<?echo $dia4_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top:16.43cm" class=date>				<?if  ($dia4_H6_1 != "")  {echo date ("h:i A", strtotime($dia4_H6_1));}?></div>
	<div style="position:absolute; left:13.79cm; top:16.43cm" class=resultado>	<?echo $dia4_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top:16.43cm" class=date>				<?if  ($dia4_H7_1 != "")  {echo date ("h:i A", strtotime($dia4_H7_1));}?></div>
	<div style="position:absolute; left:15.29cm; top:16.43cm" class=resultado>	<?echo $dia4_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top:16.43cm" class=date>				<?if  ($dia4_H8_1 != "")  {echo date ("h:i A", strtotime($dia4_H8_1));}?></div>
	<div style="position:absolute; left:16.79cm; top:16.43cm" class=resultado>	<?echo $dia4_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top:16.43cm" class=date>				<?if  ($dia4_H9_1 != "")  {echo date ("h:i A", strtotime($dia4_H9_1));}?></div>
	<div style="position:absolute; left:18.27cm; top:16.43cm" class=resultado>	<?echo $dia4_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top:16.43cm" class=date>				<?if  ($dia4_H10_1 != "") {echo date ("h:i A", strtotime($dia4_H10_1));}?></div>
	<div style="position:absolute; left:19.75cm; top:16.43cm" class=resultado>	<?echo $dia4_R10_1;?></div>

	<div style="position:absolute; left: 5.62cm; top:16.68cm" class=date>				<?if  ($dia4_H1_2 != "")  {echo date ("h:i A", strtotime($dia4_H1_2));}?></div>
	<div style="position:absolute; left: 6.35cm; top:16.68cm" class=resultado>	<?echo $dia4_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top:16.68cm" class=date>				<?if  ($dia4_H2_2 != "")  {echo date ("h:i A", strtotime($dia4_H2_2));}?></div>
	<div style="position:absolute; left: 7.83cm; top:16.68cm" class=resultado>	<?echo $dia4_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top:16.68cm" class=date>				<?if  ($dia4_H3_2 != "")  {echo date ("h:i A", strtotime($dia4_H3_2));}?></div>
	<div style="position:absolute; left: 9.33cm; top:16.68cm" class=resultado>	<?echo $dia4_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top:16.68cm" class=date>				<?if  ($dia4_H4_2 != "")  {echo date ("h:i A", strtotime($dia4_H4_2));}?></div>
	<div style="position:absolute; left:10.82cm; top:16.68cm" class=resultado>	<?echo $dia4_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top:16.68cm" class=date>				<?if  ($dia4_H5_2 != "")  {echo date ("h:i A", strtotime($dia4_H5_2));}?></div>
	<div style="position:absolute; left:12.33cm; top:16.68cm" class=resultado>	<?echo $dia4_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top:16.68cm" class=date>				<?if  ($dia4_H6_2 != "")  {echo date ("h:i A", strtotime($dia4_H6_2));}?></div>
	<div style="position:absolute; left:13.79cm; top:16.68cm" class=resultado>	<?echo $dia4_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top:16.68cm" class=date>				<?if  ($dia4_H7_2 != "")  {echo date ("h:i A", strtotime($dia4_H7_2));}?></div>
	<div style="position:absolute; left:15.29cm; top:16.68cm" class=resultado>	<?echo $dia4_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top:16.68cm" class=date>				<?if  ($dia4_H8_2 != "")  {echo date ("h:i A", strtotime($dia4_H8_2));}?></div>
	<div style="position:absolute; left:16.79cm; top:16.68cm" class=resultado>	<?echo $dia4_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top:16.68cm" class=date>				<?if  ($dia4_H9_2 != "")  {echo date ("h:i A", strtotime($dia4_H9_2));}?></div>
	<div style="position:absolute; left:18.27cm; top:16.68cm" class=resultado>	<?echo $dia4_R9_2;?></div>
	<div style="position:absolute; left:19.01cm; top:16.68cm" class=date>				<?if  ($dia4_H10_2 != "") {echo date ("h:i A", strtotime($dia4_H10_2));}?></div>
	<div style="position:absolute; left:19.75cm; top:16.68cm" class=resultado>	<?echo $dia4_R10_2;?></div>

	<div style="position:absolute; left: 5.62cm; top:16.91cm" class=date>				<?if  ($dia4_H1_3 != "")  {echo date ("h:i A", strtotime($dia4_H1_3));}?></div>
	<div style="position:absolute; left: 6.35cm; top:16.91cm" class=resultado>	<?echo $dia4_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top:16.91cm" class=date>				<?if  ($dia4_H2_3 != "")  {echo date ("h:i A", strtotime($dia4_H2_3));}?></div>
	<div style="position:absolute; left: 7.83cm; top:16.91cm" class=resultado>	<?echo $dia4_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top:16.91cm" class=date>				<?if  ($dia4_H3_3 != "")  {echo date ("h:i A", strtotime($dia4_H3_3));}?></div>
	<div style="position:absolute; left: 9.33cm; top:16.91cm" class=resultado>	<?echo $dia4_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top:16.91cm" class=date>				<?if  ($dia4_H4_3 != "")  {echo date ("h:i A", strtotime($dia4_H4_3));}?></div>
	<div style="position:absolute; left:10.82cm; top:16.91cm" class=resultado>	<?echo $dia4_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top:16.91cm" class=date>				<?if  ($dia4_H5_3 != "")  {echo date ("h:i A", strtotime($dia4_H5_3));}?></div>
	<div style="position:absolute; left:12.33cm; top:16.91cm" class=resultado>	<?echo $dia4_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top:16.91cm" class=date>				<?if  ($dia4_H6_3 != "")  {echo date ("h:i A", strtotime($dia4_H6_3));}?></div>
	<div style="position:absolute; left:13.79cm; top:16.91cm" class=resultado>	<?echo $dia4_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top:16.91cm" class=date>				<?if  ($dia4_H7_3 != "")  {echo date ("h:i A", strtotime($dia4_H7_3));}?></div>
	<div style="position:absolute; left:15.29cm; top:16.91cm" class=resultado>	<?echo $dia4_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top:16.91cm" class=date>				<?if  ($dia4_H8_3 != "")  {echo date ("h:i A", strtotime($dia4_H8_3));}?></div>
	<div style="position:absolute; left:16.79cm; top:16.91cm" class=resultado>	<?echo $dia4_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top:16.91cm" class=date>				<?if  ($dia4_H9_3 != "")  {echo date ("h:i A", strtotime($dia4_H9_3));}?></div>
	<div style="position:absolute; left:18.27cm; top:16.91cm" class=resultado>	<?echo $dia4_R9_3;?></div>
	<div style="position:absolute; left:19.01cm; top:16.91cm" class=date>				<?if  ($dia4_H10_3 != "") {echo date ("h:i A", strtotime($dia4_H10_3));}?></div>
	<div style="position:absolute; left:19.75cm; top:16.91cm" class=resultado>	<?echo $dia4_R10_3;?></div>

	<div style="position:absolute; left: 5.62cm; top:17.14cm" class=date>				<?if  ($dia4_H1_4 != "")  {echo date ("h:i A", strtotime($dia4_H1_4));}?></div>
	<div style="position:absolute; left: 6.35cm; top:17.14cm" class=resultado>	<?echo $dia4_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top:17.14cm" class=date>				<?if  ($dia4_H2_4 != "")  {echo date ("h:i A", strtotime($dia4_H2_4));}?></div>
	<div style="position:absolute; left: 7.83cm; top:17.14cm" class=resultado>	<?echo $dia4_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top:17.14cm" class=date>				<?if  ($dia4_H3_4 != "")  {echo date ("h:i A", strtotime($dia4_H3_4));}?></div>
	<div style="position:absolute; left: 9.33cm; top:17.14cm" class=resultado>	<?echo $dia4_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top:17.14cm" class=date>				<?if  ($dia4_H4_4 != "")  {echo date ("h:i A", strtotime($dia4_H4_4));}?></div>
	<div style="position:absolute; left:10.82cm; top:17.14cm" class=resultado>	<?echo $dia4_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top:17.14cm" class=date>				<?if  ($dia4_H5_4 != "")  {echo date ("h:i A", strtotime($dia4_H5_4));}?></div>
	<div style="position:absolute; left:12.33cm; top:17.14cm" class=resultado>	<?echo $dia4_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top:17.14cm" class=date>				<?if  ($dia4_H6_4 != "")  {echo date ("h:i A", strtotime($dia4_H6_4));}?></div>
	<div style="position:absolute; left:13.79cm; top:17.14cm" class=resultado>	<?echo $dia4_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top:17.14cm" class=date>				<?if  ($dia4_H7_4 != "")  {echo date ("h:i A", strtotime($dia4_H7_4));}?></div>
	<div style="position:absolute; left:15.29cm; top:17.14cm" class=resultado>	<?echo $dia4_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top:17.14cm" class=date>				<?if  ($dia4_H8_4 != "")  {echo date ("h:i A", strtotime($dia4_H8_4));}?></div>
	<div style="position:absolute; left:16.79cm; top:17.14cm" class=resultado>	<?echo $dia4_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top:17.14cm" class=date>				<?if  ($dia4_H9_4 != "")  {echo date ("h:i A", strtotime($dia4_H9_4));}?></div>
	<div style="position:absolute; left:18.27cm; top:17.14cm" class=resultado>	<?echo $dia4_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top:17.14cm" class=date>				<?if  ($dia4_H10_4 != "") {echo date ("h:i A", strtotime($dia4_H10_4));}?></div>
	<div style="position:absolute; left:19.75cm; top:17.14cm" class=resultado>	<?echo $dia4_R10_4;?></div>

	<div style="position:absolute; left: 1.75cm; top:17.95cm; font-size:8px"><?echo substr($dia4_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:17.95cm" class=hora><?if ($dia4_HE1_1 != "") {echo date ("h:i A", strtotime($dia4_HE1_1));}?></div>
	<div style="position:absolute; left: 7.12cm; top:17.95cm" class=hora><?if ($dia4_HS1_1 != "") {echo date ("h:i A", strtotime($dia4_HS1_1));}?></div>
	<div style="position:absolute; left: 8.62cm; top:17.95cm" class=hora><?if ($dia4_HE2_1 != "") {echo date ("h:i A", strtotime($dia4_HE2_1));}?></div>
	<div style="position:absolute; left:10.12cm; top:17.95cm" class=hora><?if ($dia4_HS2_1 != "") {echo date ("h:i A", strtotime($dia4_HS2_1));}?></div>
	<div style="position:absolute; left:11.62cm; top:17.95cm" class=hora><?if ($dia4_HE3_1 != "") {echo date ("h:i A", strtotime($dia4_HE3_1));}?></div>
	<div style="position:absolute; left:13.12cm; top:17.95cm" class=hora><?if ($dia4_HS3_1 != "") {echo date ("h:i A", strtotime($dia4_HS3_1));}?></div>
	<div style="position:absolute; left:14.62cm; top:17.95cm" class=hora><?if ($dia4_HE4_1 != "") {echo date ("h:i A", strtotime($dia4_HE4_1));}?></div>
	<div style="position:absolute; left:16.12cm; top:17.95cm" class=hora><?if ($dia4_HS4_1 != "") {echo date ("h:i A", strtotime($dia4_HS4_1));}?></div>
	<div style="position:absolute; left:17.62cm; top:17.95cm" class=hora><?if ($dia4_HE5_1 != "") {echo date ("h:i A", strtotime($dia4_HE5_1));}?></div>
	<div style="position:absolute; left:19.12cm; top:17.95cm" class=hora><?if ($dia4_HS5_1 != "") {echo date ("h:i A", strtotime($dia4_HS5_1));}?></div>
	
	<div style="position:absolute; left: 1.75cm; top:18.18cm; font-size:8px"><?echo substr($dia4_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:18.18cm" class=hora><?if ($dia4_HE1_2 != "") {echo date ("h:i A", strtotime($dia4_HE1_2));}?></div>
	<div style="position:absolute; left: 7.12cm; top:18.18cm" class=hora><?if ($dia4_HS1_2 != "") {echo date ("h:i A", strtotime($dia4_HS1_2));}?></div>
	<div style="position:absolute; left: 8.62cm; top:18.18cm" class=hora><?if ($dia4_HE2_2 != "") {echo date ("h:i A", strtotime($dia4_HE2_2));}?></div>
	<div style="position:absolute; left:10.12cm; top:18.18cm" class=hora><?if ($dia4_HS2_2 != "") {echo date ("h:i A", strtotime($dia4_HS2_2));}?></div>
	<div style="position:absolute; left:11.62cm; top:18.18cm" class=hora><?if ($dia4_HE3_2 != "") {echo date ("h:i A", strtotime($dia4_HE3_2));}?></div>
	<div style="position:absolute; left:13.12cm; top:18.18cm" class=hora><?if ($dia4_HS3_2 != "") {echo date ("h:i A", strtotime($dia4_HS3_2));}?></div>
	<div style="position:absolute; left:14.62cm; top:18.18cm" class=hora><?if ($dia4_HE4_2 != "") {echo date ("h:i A", strtotime($dia4_HE4_2));}?></div>
	<div style="position:absolute; left:16.12cm; top:18.18cm" class=hora><?if ($dia4_HS4_2 != "") {echo date ("h:i A", strtotime($dia4_HS4_2));}?></div>
	<div style="position:absolute; left:17.62cm; top:18.18cm" class=hora><?if ($dia4_HE5_2 != "") {echo date ("h:i A", strtotime($dia4_HE5_2));}?></div>
	<div style="position:absolute; left:19.12cm; top:18.18cm" class=hora><?if ($dia4_HS5_2 != "") {echo date ("h:i A", strtotime($dia4_HS5_2));}?></div>

	<div style="position:absolute; left: 1.75cm; top:18.41cm; font-size:8px"><?echo substr($dia4_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:18.41cm" class=hora><?if ($dia4_HE1_3 != "") {echo date ("h:i A", strtotime($dia4_HE1_3));}?></div>
	<div style="position:absolute; left: 7.12cm; top:18.41cm" class=hora><?if ($dia4_HS1_3 != "") {echo date ("h:i A", strtotime($dia4_HS1_3));}?></div>
	<div style="position:absolute; left: 8.62cm; top:18.41cm" class=hora><?if ($dia4_HE2_3 != "") {echo date ("h:i A", strtotime($dia4_HE2_3));}?></div>
	<div style="position:absolute; left:10.12cm; top:18.41cm" class=hora><?if ($dia4_HS2_3 != "") {echo date ("h:i A", strtotime($dia4_HS2_3));}?></div>
	<div style="position:absolute; left:11.62cm; top:18.41cm" class=hora><?if ($dia4_HE3_3 != "") {echo date ("h:i A", strtotime($dia4_HE3_3));}?></div>
	<div style="position:absolute; left:13.12cm; top:18.41cm" class=hora><?if ($dia4_HS3_3 != "") {echo date ("h:i A", strtotime($dia4_HS3_3));}?></div>
	<div style="position:absolute; left:14.62cm; top:18.41cm" class=hora><?if ($dia4_HE4_3 != "") {echo date ("h:i A", strtotime($dia4_HE4_3));}?></div>
	<div style="position:absolute; left:16.12cm; top:18.41cm" class=hora><?if ($dia4_HS4_3 != "") {echo date ("h:i A", strtotime($dia4_HS4_3));}?></div>
	<div style="position:absolute; left:17.62cm; top:18.41cm" class=hora><?if ($dia4_HE5_3 != "") {echo date ("h:i A", strtotime($dia4_HE5_3));}?></div>
	<div style="position:absolute; left:19.12cm; top:18.41cm" class=hora><?if ($dia4_HS5_3 != "") {echo date ("h:i A", strtotime($dia4_HS5_3));}?></div>

	<div style="position:absolute; left: 1.75cm; top:18.64cm; font-size:8px"><?echo substr($dia4_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:18.64cm" class=hora><?if ($dia4_HE1_4 != "") {echo date ("h:i A", strtotime($dia4_HE1_4));}?></div>
	<div style="position:absolute; left: 7.12cm; top:18.64cm" class=hora><?if ($dia4_HS1_4 != "") {echo date ("h:i A", strtotime($dia4_HS1_4));}?></div>
	<div style="position:absolute; left: 8.62cm; top:18.64cm" class=hora><?if ($dia4_HE2_4 != "") {echo date ("h:i A", strtotime($dia4_HE2_4));}?></div>
	<div style="position:absolute; left:10.12cm; top:18.64cm" class=hora><?if ($dia4_HS2_4 != "") {echo date ("h:i A", strtotime($dia4_HS2_4));}?></div>
	<div style="position:absolute; left:11.62cm; top:18.64cm" class=hora><?if ($dia4_HE3_4 != "") {echo date ("h:i A", strtotime($dia4_HE3_4));}?></div>
	<div style="position:absolute; left:13.12cm; top:18.64cm" class=hora><?if ($dia4_HS3_4 != "") {echo date ("h:i A", strtotime($dia4_HS3_4));}?></div>
	<div style="position:absolute; left:14.62cm; top:18.64cm" class=hora><?if ($dia4_HE4_4 != "") {echo date ("h:i A", strtotime($dia4_HE4_4));}?></div>
	<div style="position:absolute; left:16.12cm; top:18.64cm" class=hora><?if ($dia4_HS4_4 != "") {echo date ("h:i A", strtotime($dia4_HS4_4));}?></div>
	<div style="position:absolute; left:17.62cm; top:18.64cm" class=hora><?if ($dia4_HE5_4 != "") {echo date ("h:i A", strtotime($dia4_HE5_4));}?></div>
	<div style="position:absolute; left:19.12cm; top:18.64cm" class=hora><?if ($dia4_HS5_4 != "") {echo date ("h:i A", strtotime($dia4_HS5_4));}?></div>

	<div style="position:absolute; left: 1.75cm; top:18.87cm; font-size:8px"><?echo substr($dia4_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:18.87cm" class=hora><?if ($dia4_HE1_5 != "") {echo date ("h:i A", strtotime($dia4_HE1_5));}?></div>
	<div style="position:absolute; left: 7.12cm; top:18.87cm" class=hora><?if ($dia4_HS1_5 != "") {echo date ("h:i A", strtotime($dia4_HS1_5));}?></div>
	<div style="position:absolute; left: 8.62cm; top:18.87cm" class=hora><?if ($dia4_HE2_5 != "") {echo date ("h:i A", strtotime($dia4_HE2_5));}?></div>
	<div style="position:absolute; left:10.12cm; top:18.87cm" class=hora><?if ($dia4_HS2_5 != "") {echo date ("h:i A", strtotime($dia4_HS2_5));}?></div>
	<div style="position:absolute; left:11.62cm; top:18.87cm" class=hora><?if ($dia4_HE3_5 != "") {echo date ("h:i A", strtotime($dia4_HE3_5));}?></div>
	<div style="position:absolute; left:13.12cm; top:18.87cm" class=hora><?if ($dia4_HS3_5 != "") {echo date ("h:i A", strtotime($dia4_HS3_5));}?></div>
	<div style="position:absolute; left:14.62cm; top:18.87cm" class=hora><?if ($dia4_HE4_5 != "") {echo date ("h:i A", strtotime($dia4_HE4_5));}?></div>
	<div style="position:absolute; left:16.12cm; top:18.87cm" class=hora><?if ($dia4_HS4_5 != "") {echo date ("h:i A", strtotime($dia4_HS4_5));}?></div>
	<div style="position:absolute; left:17.62cm; top:18.87cm" class=hora><?if ($dia4_HE5_5 != "") {echo date ("h:i A", strtotime($dia4_HE5_5));}?></div>
	<div style="position:absolute; left:19.12cm; top:18.87cm" class=hora><?if ($dia4_HS5_5 != "") {echo date ("h:i A", strtotime($dia4_HS5_5));}?></div>

<!-- *****************************************			 DÍA 5			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:19.41cm"><?echo $dia5_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top:19.68cm"><?echo substr($dia5_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top:19.68cm"><?echo substr($dia5_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top:19.68cm"><?echo $dia5_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top:19.68cm"><?echo substr($dia5_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top:19.98cm"><?echo substr($dia5_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top:19.98cm"><?echo $dia5_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top:19.98cm"><?echo $dia5_O;?></div>
	<div style="position:absolute; left:14.00cm; top:19.98cm"><?echo $dia5_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top:19.98cm"><?echo $dia5_CO;?></div>
	<div style="position:absolute; left:19.15cm; top:19.82cm" class="radio"><?if ($dia5_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top:19.82cm" class="radio"><?if ($dia5_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top:20.62cm" class=date>				<?if  ($dia5_H1_1 != "")  {echo date ("h:i A", strtotime($dia5_H1_1));}?></div>
	<div style="position:absolute; left: 6.35cm; top:20.62cm" class=resultado>	<?echo $dia5_R1_1;?></div>
	<div style="position:absolute; left: 7.10cm; top:20.62cm" class=date>				<?if  ($dia5_H2_1 != "")  {echo date ("h:i A", strtotime($dia5_H2_1));}?></div>
	<div style="position:absolute; left: 7.83cm; top:20.62cm" class=resultado>	<?echo $dia5_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top:20.62cm" class=date>				<?if  ($dia5_H3_1 != "")  {echo date ("h:i A", strtotime($dia5_H3_1));}?></div>
	<div style="position:absolute; left: 9.33cm; top:20.62cm" class=resultado>	<?echo $dia5_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top:20.62cm" class=date>				<?if  ($dia5_H4_1 != "")  {echo date ("h:i A", strtotime($dia5_H4_1));}?></div>
	<div style="position:absolute; left:10.82cm; top:20.62cm" class=resultado>	<?echo $dia5_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top:20.62cm" class=date>				<?if  ($dia5_H5_1 != "")  {echo date ("h:i A", strtotime($dia5_H5_1));}?></div>
	<div style="position:absolute; left:12.33cm; top:20.62cm" class=resultado>	<?echo $dia5_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top:20.62cm" class=date>				<?if  ($dia5_H6_1 != "")  {echo date ("h:i A", strtotime($dia5_H6_1));}?></div>
	<div style="position:absolute; left:13.79cm; top:20.62cm" class=resultado>	<?echo $dia5_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top:20.62cm" class=date>				<?if  ($dia5_H7_1 != "")  {echo date ("h:i A", strtotime($dia5_H7_1));}?></div>
	<div style="position:absolute; left:15.29cm; top:20.62cm" class=resultado>	<?echo $dia5_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top:20.62cm" class=date>				<?if  ($dia5_H8_1 != "")  {echo date ("h:i A", strtotime($dia5_H8_1));}?></div>
	<div style="position:absolute; left:16.79cm; top:20.62cm" class=resultado>	<?echo $dia5_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top:20.62cm" class=date>				<?if  ($dia5_H9_1 != "")  {echo date ("h:i A", strtotime($dia5_H9_1));}?></div>
	<div style="position:absolute; left:18.27cm; top:20.62cm" class=resultado>	<?echo $dia5_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top:20.62cm" class=date>				<?if  ($dia5_H10_1 != "") {echo date ("h:i A", strtotime($dia5_H10_1));}?></div>
	<div style="position:absolute; left:19.75cm; top:20.62cm" class=resultado>	<?echo $dia5_R10_1;?></div>

	<div style="position:absolute; left: 5.62cm; top:20.85cm" class=date>				<?if  ($dia5_H1_2 != "")  {echo date ("h:i A", strtotime($dia5_H1_2));}?></div>
	<div style="position:absolute; left: 6.35cm; top:20.85cm" class=resultado>	<?echo $dia5_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top:20.85cm" class=date>				<?if  ($dia5_H2_2 != "")  {echo date ("h:i A", strtotime($dia5_H2_2));}?></div>
	<div style="position:absolute; left: 7.83cm; top:20.85cm" class=resultado>	<?echo $dia5_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top:20.85cm" class=date>				<?if  ($dia5_H3_2 != "")  {echo date ("h:i A", strtotime($dia5_H3_2));}?></div>
	<div style="position:absolute; left: 9.33cm; top:20.85cm" class=resultado>	<?echo $dia5_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top:20.85cm" class=date>				<?if  ($dia5_H4_2 != "")  {echo date ("h:i A", strtotime($dia5_H4_2));}?></div>
	<div style="position:absolute; left:10.82cm; top:20.85cm" class=resultado>	<?echo $dia5_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top:20.85cm" class=date>				<?if  ($dia5_H5_2 != "")  {echo date ("h:i A", strtotime($dia5_H5_2));}?></div>
	<div style="position:absolute; left:12.33cm; top:20.85cm" class=resultado>	<?echo $dia5_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top:20.85cm" class=date>				<?if  ($dia5_H6_2 != "")  {echo date ("h:i A", strtotime($dia5_H6_2));}?></div>
	<div style="position:absolute; left:13.79cm; top:20.85cm" class=resultado>	<?echo $dia5_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top:20.85cm" class=date>				<?if  ($dia5_H7_2 != "")  {echo date ("h:i A", strtotime($dia5_H7_2));}?></div>
	<div style="position:absolute; left:15.29cm; top:20.85cm" class=resultado>	<?echo $dia5_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top:20.85cm" class=date>				<?if  ($dia5_H8_2 != "")  {echo date ("h:i A", strtotime($dia5_H8_2));}?></div>
	<div style="position:absolute; left:16.79cm; top:20.85cm" class=resultado>	<?echo $dia5_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top:20.85cm" class=date>				<?if  ($dia5_H9_2 != "")  {echo date ("h:i A", strtotime($dia5_H9_2));}?></div>
	<div style="position:absolute; left:18.27cm; top:20.85cm" class=resultado>	<?echo $dia5_R9_2;?></div>
	<div style="position:absolute; left:19.01cm; top:20.85cm" class=date>				<?if  ($dia5_H10_2 != "") {echo date ("h:i A", strtotime($dia5_H10_2));}?></div>
	<div style="position:absolute; left:19.75cm; top:20.85cm" class=resultado>	<?echo $dia5_R10_2;?></div>

	<div style="position:absolute; left: 5.62cm; top:21.09cm" class=date>				<?if  ($dia5_H1_3 != "")  {echo date ("h:i A", strtotime($dia5_H1_3));}?></div>
	<div style="position:absolute; left: 6.35cm; top:21.09cm" class=resultado>	<?echo $dia5_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top:21.09cm" class=date>				<?if  ($dia5_H2_3 != "")  {echo date ("h:i A", strtotime($dia5_H2_3));}?></div>
	<div style="position:absolute; left: 7.83cm; top:21.09cm" class=resultado>	<?echo $dia5_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top:21.09cm" class=date>				<?if  ($dia5_H3_3 != "")  {echo date ("h:i A", strtotime($dia5_H3_3));}?></div>
	<div style="position:absolute; left: 9.33cm; top:21.09cm" class=resultado>	<?echo $dia5_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top:21.09cm" class=date>				<?if  ($dia5_H4_3 != "")  {echo date ("h:i A", strtotime($dia5_H4_3));}?></div>
	<div style="position:absolute; left:10.82cm; top:21.09cm" class=resultado>	<?echo $dia5_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top:21.09cm" class=date>				<?if  ($dia5_H5_3 != "")  {echo date ("h:i A", strtotime($dia5_H5_3));}?></div>
	<div style="position:absolute; left:12.33cm; top:21.09cm" class=resultado>	<?echo $dia5_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top:21.09cm" class=date>				<?if  ($dia5_H6_3 != "")  {echo date ("h:i A", strtotime($dia5_H6_3));}?></div>
	<div style="position:absolute; left:13.79cm; top:21.09cm" class=resultado>	<?echo $dia5_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top:21.09cm" class=date>				<?if  ($dia5_H7_3 != "")  {echo date ("h:i A", strtotime($dia5_H7_3));}?></div>
	<div style="position:absolute; left:15.29cm; top:21.09cm" class=resultado>	<?echo $dia5_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top:21.09cm" class=date>				<?if  ($dia5_H8_3 != "")  {echo date ("h:i A", strtotime($dia5_H8_3));}?></div>
	<div style="position:absolute; left:16.79cm; top:21.09cm" class=resultado>	<?echo $dia5_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top:21.09cm" class=date>				<?if  ($dia5_H9_3 != "")  {echo date ("h:i A", strtotime($dia5_H9_3));}?></div>
	<div style="position:absolute; left:18.27cm; top:21.09cm" class=resultado>	<?echo $dia5_R9_3;?></div>
	<div style="position:absolute; left:19.01cm; top:21.09cm" class=date>				<?if  ($dia5_H10_3 != "") {echo date ("h:i A", strtotime($dia5_H10_3));}?></div>
	<div style="position:absolute; left:19.75cm; top:21.09cm" class=resultado>	<?echo $dia5_R10_3;?></div>

	<div style="position:absolute; left: 5.62cm; top:21.30cm" class=date>				<?if  ($dia5_H1_4 != "")  {echo date ("h:i A", strtotime($dia5_H1_4));}?></div>
	<div style="position:absolute; left: 6.35cm; top:21.30cm" class=resultado>	<?echo $dia5_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top:21.30cm" class=date>				<?if  ($dia5_H2_4 != "")  {echo date ("h:i A", strtotime($dia5_H2_4));}?></div>
	<div style="position:absolute; left: 7.83cm; top:21.30cm" class=resultado>	<?echo $dia5_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top:21.30cm" class=date>				<?if  ($dia5_H3_4 != "")  {echo date ("h:i A", strtotime($dia5_H3_4));}?></div>
	<div style="position:absolute; left: 9.33cm; top:21.30cm" class=resultado>	<?echo $dia5_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top:21.30cm" class=date>				<?if  ($dia5_H4_4 != "")  {echo date ("h:i A", strtotime($dia5_H4_4));}?></div>
	<div style="position:absolute; left:10.82cm; top:21.30cm" class=resultado>	<?echo $dia5_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top:21.30cm" class=date>				<?if  ($dia5_H5_4 != "")  {echo date ("h:i A", strtotime($dia5_H5_4));}?></div>
	<div style="position:absolute; left:12.33cm; top:21.30cm" class=resultado>	<?echo $dia5_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top:21.30cm" class=date>				<?if  ($dia5_H6_4 != "")  {echo date ("h:i A", strtotime($dia5_H6_4));}?></div>
	<div style="position:absolute; left:13.79cm; top:21.30cm" class=resultado>	<?echo $dia5_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top:21.30cm" class=date>				<?if  ($dia5_H7_4 != "")  {echo date ("h:i A", strtotime($dia5_H7_4));}?></div>
	<div style="position:absolute; left:15.29cm; top:21.30cm" class=resultado>	<?echo $dia5_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top:21.30cm" class=date>				<?if  ($dia5_H8_4 != "")  {echo date ("h:i A", strtotime($dia5_H8_4));}?></div>
	<div style="position:absolute; left:16.79cm; top:21.30cm" class=resultado>	<?echo $dia5_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top:21.30cm" class=date>				<?if  ($dia5_H9_4 != "")  {echo date ("h:i A", strtotime($dia5_H9_4));}?></div>
	<div style="position:absolute; left:18.27cm; top:21.30cm" class=resultado>	<?echo $dia5_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top:21.30cm" class=date>				<?if  ($dia5_H10_4 != "") {echo date ("h:i A", strtotime($dia5_H10_4));}?></div>
	<div style="position:absolute; left:19.75cm; top:21.30cm" class=resultado>	<?echo $dia5_R10_4;?></div>

	<div style="position:absolute; left: 1.75cm; top:22.14cm; font-size:8px"><?echo substr($dia5_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:22.14cm" class=hora><?if ($dia5_HE1_1 != "") {echo date ("h:i A", strtotime($dia5_HE1_1));}?></div>
	<div style="position:absolute; left: 7.12cm; top:22.14cm" class=hora><?if ($dia5_HS1_1 != "") {echo date ("h:i A", strtotime($dia5_HS1_1));}?></div>
	<div style="position:absolute; left: 8.62cm; top:22.14cm" class=hora><?if ($dia5_HE2_1 != "") {echo date ("h:i A", strtotime($dia5_HE2_1));}?></div>
	<div style="position:absolute; left:10.12cm; top:22.14cm" class=hora><?if ($dia5_HS2_1 != "") {echo date ("h:i A", strtotime($dia5_HS2_1));}?></div>
	<div style="position:absolute; left:11.62cm; top:22.14cm" class=hora><?if ($dia5_HE3_1 != "") {echo date ("h:i A", strtotime($dia5_HE3_1));}?></div>
	<div style="position:absolute; left:13.12cm; top:22.14cm" class=hora><?if ($dia5_HS3_1 != "") {echo date ("h:i A", strtotime($dia5_HS3_1));}?></div>
	<div style="position:absolute; left:14.62cm; top:22.14cm" class=hora><?if ($dia5_HE4_1 != "") {echo date ("h:i A", strtotime($dia5_HE4_1));}?></div>
	<div style="position:absolute; left:16.12cm; top:22.14cm" class=hora><?if ($dia5_HS4_1 != "") {echo date ("h:i A", strtotime($dia5_HS4_1));}?></div>
	<div style="position:absolute; left:17.62cm; top:22.14cm" class=hora><?if ($dia5_HE5_1 != "") {echo date ("h:i A", strtotime($dia5_HE5_1));}?></div>
	<div style="position:absolute; left:19.12cm; top:22.14cm" class=hora><?if ($dia5_HS5_1 != "") {echo date ("h:i A", strtotime($dia5_HS5_1));}?></div>
	
	<div style="position:absolute; left: 1.75cm; top:22.37cm; font-size:8px"><?echo substr($dia5_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:22.37cm" class=hora><?if ($dia5_HE1_2 != "") {echo date ("h:i A", strtotime($dia5_HE1_2));}?></div>
	<div style="position:absolute; left: 7.12cm; top:22.37cm" class=hora><?if ($dia5_HS1_2 != "") {echo date ("h:i A", strtotime($dia5_HS1_2));}?></div>
	<div style="position:absolute; left: 8.62cm; top:22.37cm" class=hora><?if ($dia5_HE2_2 != "") {echo date ("h:i A", strtotime($dia5_HE2_2));}?></div>
	<div style="position:absolute; left:10.12cm; top:22.37cm" class=hora><?if ($dia5_HS2_2 != "") {echo date ("h:i A", strtotime($dia5_HS2_2));}?></div>
	<div style="position:absolute; left:11.62cm; top:22.37cm" class=hora><?if ($dia5_HE3_2 != "") {echo date ("h:i A", strtotime($dia5_HE3_2));}?></div>
	<div style="position:absolute; left:13.12cm; top:22.37cm" class=hora><?if ($dia5_HS3_2 != "") {echo date ("h:i A", strtotime($dia5_HS3_2));}?></div>
	<div style="position:absolute; left:14.62cm; top:22.37cm" class=hora><?if ($dia5_HE4_2 != "") {echo date ("h:i A", strtotime($dia5_HE4_2));}?></div>
	<div style="position:absolute; left:16.12cm; top:22.37cm" class=hora><?if ($dia5_HS4_2 != "") {echo date ("h:i A", strtotime($dia5_HS4_2));}?></div>
	<div style="position:absolute; left:17.62cm; top:22.37cm" class=hora><?if ($dia5_HE5_2 != "") {echo date ("h:i A", strtotime($dia5_HE5_2));}?></div>
	<div style="position:absolute; left:19.12cm; top:22.37cm" class=hora><?if ($dia5_HS5_2 != "") {echo date ("h:i A", strtotime($dia5_HS5_2));}?></div>

	<div style="position:absolute; left: 1.75cm; top:22.60cm; font-size:8px"><?echo substr($dia5_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:22.60cm" class=hora><?if ($dia5_HE1_3 != "") {echo date ("h:i A", strtotime($dia5_HE1_3));}?></div>
	<div style="position:absolute; left: 7.12cm; top:22.60cm" class=hora><?if ($dia5_HS1_3 != "") {echo date ("h:i A", strtotime($dia5_HS1_3));}?></div>
	<div style="position:absolute; left: 8.62cm; top:22.60cm" class=hora><?if ($dia5_HE2_3 != "") {echo date ("h:i A", strtotime($dia5_HE2_3));}?></div>
	<div style="position:absolute; left:10.12cm; top:22.60cm" class=hora><?if ($dia5_HS2_3 != "") {echo date ("h:i A", strtotime($dia5_HS2_3));}?></div>
	<div style="position:absolute; left:11.62cm; top:22.60cm" class=hora><?if ($dia5_HE3_3 != "") {echo date ("h:i A", strtotime($dia5_HE3_3));}?></div>
	<div style="position:absolute; left:13.12cm; top:22.60cm" class=hora><?if ($dia5_HS3_3 != "") {echo date ("h:i A", strtotime($dia5_HS3_3));}?></div>
	<div style="position:absolute; left:14.62cm; top:22.60cm" class=hora><?if ($dia5_HE4_3 != "") {echo date ("h:i A", strtotime($dia5_HE4_3));}?></div>
	<div style="position:absolute; left:16.12cm; top:22.60cm" class=hora><?if ($dia5_HS4_3 != "") {echo date ("h:i A", strtotime($dia5_HS4_3));}?></div>
	<div style="position:absolute; left:17.62cm; top:22.60cm" class=hora><?if ($dia5_HE5_3 != "") {echo date ("h:i A", strtotime($dia5_HE5_3));}?></div>
	<div style="position:absolute; left:19.12cm; top:22.60cm" class=hora><?if ($dia5_HS5_3 != "") {echo date ("h:i A", strtotime($dia5_HS5_3));}?></div>

	<div style="position:absolute; left: 1.75cm; top:22.83cm; font-size:8px"><?echo substr($dia5_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:22.83cm" class=hora><?if ($dia5_HE1_4 != "") {echo date ("h:i A", strtotime($dia5_HE1_4));}?></div>
	<div style="position:absolute; left: 7.12cm; top:22.83cm" class=hora><?if ($dia5_HS1_4 != "") {echo date ("h:i A", strtotime($dia5_HS1_4));}?></div>
	<div style="position:absolute; left: 8.62cm; top:22.83cm" class=hora><?if ($dia5_HE2_4 != "") {echo date ("h:i A", strtotime($dia5_HE2_4));}?></div>
	<div style="position:absolute; left:10.12cm; top:22.83cm" class=hora><?if ($dia5_HS2_4 != "") {echo date ("h:i A", strtotime($dia5_HS2_4));}?></div>
	<div style="position:absolute; left:11.62cm; top:22.83cm" class=hora><?if ($dia5_HE3_4 != "") {echo date ("h:i A", strtotime($dia5_HE3_4));}?></div>
	<div style="position:absolute; left:13.12cm; top:22.83cm" class=hora><?if ($dia5_HS3_4 != "") {echo date ("h:i A", strtotime($dia5_HS3_4));}?></div>
	<div style="position:absolute; left:14.62cm; top:22.83cm" class=hora><?if ($dia5_HE4_4 != "") {echo date ("h:i A", strtotime($dia5_HE4_4));}?></div>
	<div style="position:absolute; left:16.12cm; top:22.83cm" class=hora><?if ($dia5_HS4_4 != "") {echo date ("h:i A", strtotime($dia5_HS4_4));}?></div>
	<div style="position:absolute; left:17.62cm; top:22.83cm" class=hora><?if ($dia5_HE5_4 != "") {echo date ("h:i A", strtotime($dia5_HE5_4));}?></div>
	<div style="position:absolute; left:19.12cm; top:22.83cm" class=hora><?if ($dia5_HS5_4 != "") {echo date ("h:i A", strtotime($dia5_HS5_4));}?></div>

	<div style="position:absolute; left: 1.75cm; top:23.06cm; font-size:8px"><?echo substr($dia5_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:23.06cm" class=hora><?if ($dia5_HE1_5 != "") {echo date ("h:i A", strtotime($dia5_HE1_5));}?></div>
	<div style="position:absolute; left: 7.12cm; top:23.06cm" class=hora><?if ($dia5_HS1_5 != "") {echo date ("h:i A", strtotime($dia5_HS1_5));}?></div>
	<div style="position:absolute; left: 8.62cm; top:23.06cm" class=hora><?if ($dia5_HE2_5 != "") {echo date ("h:i A", strtotime($dia5_HE2_5));}?></div>
	<div style="position:absolute; left:10.12cm; top:23.06cm" class=hora><?if ($dia5_HS2_5 != "") {echo date ("h:i A", strtotime($dia5_HS2_5));}?></div>
	<div style="position:absolute; left:11.62cm; top:23.06cm" class=hora><?if ($dia5_HE3_5 != "") {echo date ("h:i A", strtotime($dia5_HE3_5));}?></div>
	<div style="position:absolute; left:13.12cm; top:23.06cm" class=hora><?if ($dia5_HS3_5 != "") {echo date ("h:i A", strtotime($dia5_HS3_5));}?></div>
	<div style="position:absolute; left:14.62cm; top:23.06cm" class=hora><?if ($dia5_HE4_5 != "") {echo date ("h:i A", strtotime($dia5_HE4_5));}?></div>
	<div style="position:absolute; left:16.12cm; top:23.06cm" class=hora><?if ($dia5_HS4_5 != "") {echo date ("h:i A", strtotime($dia5_HS4_5));}?></div>
	<div style="position:absolute; left:17.62cm; top:23.06cm" class=hora><?if ($dia5_HE5_5 != "") {echo date ("h:i A", strtotime($dia5_HE5_5));}?></div>
	<div style="position:absolute; left:19.12cm; top:23.06cm" class=hora><?if ($dia5_HS5_5 != "") {echo date ("h:i A", strtotime($dia5_HS5_5));}?></div>

<!-- *****************************************			 DÍA 6			 ***************************************** -->
	<div style="position:absolute; left:10.70cm; top:23.59cm"><?echo $dia6_fecha;?></div>
	<div style="position:absolute; left: 3.75cm; top:23.89cm"><?echo substr($dia6_equipo,0,30);?></div>
	<div style="position:absolute; left: 8.95cm; top:23.89cm"><?echo substr($dia6_marca,0,30-6);?></div>
	<div style="position:absolute; left:14.30cm; top:23.89cm"><?echo $dia6_fecha_calib;?></div>
	<div style="position:absolute; left:17.50cm; top:23.89cm"><?echo substr($dia6_propietario,0,30-8);?></div>
	<div style="position:absolute; left: 5.25cm; top:24.17cm"><?echo substr($dia6_bumptest_por,0,30);?></div>
	<div style="position:absolute; left:11.10cm; top:24.17cm"><?echo $dia6_LEL;?></div>
	<div style="position:absolute; left:12.40cm; top:24.17cm"><?echo $dia6_O;?></div>
	<div style="position:absolute; left:14.00cm; top:24.17cm"><?echo $dia6_H2S;?></div>
	<div style="position:absolute; left:15.40cm; top:24.17cm"><?echo $dia6_CO;?></div>
	<div style="position:absolute; left:19.15cm; top:24.01cm" class="radio"><?if ($dia6_pasa_bumptest == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:20.00cm; top:24.01cm" class="radio"><?if ($dia6_pasa_bumptest == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 5.62cm; top:24.80cm" class=date>				<?if  ($dia6_H1_1 != "")  {echo date ("h:i A", strtotime($dia6_H1_1));}?></div>
	<div style="position:absolute; left: 6.35cm; top:24.80cm" class=resultado>	<?echo $dia6_R1_1;?></div>
	<div style="position:absolute; left: 7.10cm; top:24.80cm" class=date>				<?if  ($dia6_H2_1 != "")  {echo date ("h:i A", strtotime($dia6_H2_1));}?></div>
	<div style="position:absolute; left: 7.83cm; top:24.80cm" class=resultado>	<?echo $dia6_R2_1;?></div>
	<div style="position:absolute; left: 8.60cm; top:24.80cm" class=date>				<?if  ($dia6_H3_1 != "")  {echo date ("h:i A", strtotime($dia6_H3_1));}?></div>
	<div style="position:absolute; left: 9.33cm; top:24.80cm" class=resultado>	<?echo $dia6_R3_1;?></div>
	<div style="position:absolute; left:10.08cm; top:24.80cm" class=date>				<?if  ($dia6_H4_1 != "")  {echo date ("h:i A", strtotime($dia6_H4_1));}?></div>
	<div style="position:absolute; left:10.82cm; top:24.80cm" class=resultado>	<?echo $dia6_R4_1;?></div>
	<div style="position:absolute; left:11.56cm; top:24.80cm" class=date>				<?if  ($dia6_H5_1 != "")  {echo date ("h:i A", strtotime($dia6_H5_1));}?></div>
	<div style="position:absolute; left:12.33cm; top:24.80cm" class=resultado>	<?echo $dia6_R5_1;?></div>
	<div style="position:absolute; left:13.03cm; top:24.80cm" class=date>				<?if  ($dia6_H6_1 != "")  {echo date ("h:i A", strtotime($dia6_H6_1));}?></div>
	<div style="position:absolute; left:13.79cm; top:24.80cm" class=resultado>	<?echo $dia6_R6_1;?></div>
	<div style="position:absolute; left:14.56cm; top:24.80cm" class=date>				<?if  ($dia6_H7_1 != "")  {echo date ("h:i A", strtotime($dia6_H7_1));}?></div>
	<div style="position:absolute; left:15.29cm; top:24.80cm" class=resultado>	<?echo $dia6_R7_1;?></div>
	<div style="position:absolute; left:16.04cm; top:24.80cm" class=date>				<?if  ($dia6_H8_1 != "")  {echo date ("h:i A", strtotime($dia6_H8_1));}?></div>
	<div style="position:absolute; left:16.79cm; top:24.80cm" class=resultado>	<?echo $dia6_R8_1;?></div>
	<div style="position:absolute; left:17.53cm; top:24.80cm" class=date>				<?if  ($dia6_H9_1 != "")  {echo date ("h:i A", strtotime($dia6_H9_1));}?></div>
	<div style="position:absolute; left:18.27cm; top:24.80cm" class=resultado>	<?echo $dia6_R9_1;?></div>
	<div style="position:absolute; left:19.01cm; top:24.80cm" class=date>				<?if  ($dia6_H10_1 != "") {echo date ("h:i A", strtotime($dia6_H10_1));}?></div>
	<div style="position:absolute; left:19.75cm; top:24.80cm" class=resultado>	<?echo $dia6_R10_1;?></div>

	<div style="position:absolute; left: 5.62cm; top:25.04cm" class=date>				<?if  ($dia6_H1_2 != "")  {echo date ("h:i A", strtotime($dia6_H1_2));}?></div>
	<div style="position:absolute; left: 6.35cm; top:25.04cm" class=resultado>	<?echo $dia6_R1_2;?></div>
	<div style="position:absolute; left: 7.10cm; top:25.04cm" class=date>				<?if  ($dia6_H2_2 != "")  {echo date ("h:i A", strtotime($dia6_H2_2));}?></div>
	<div style="position:absolute; left: 7.83cm; top:25.04cm" class=resultado>	<?echo $dia6_R2_2;?></div>
	<div style="position:absolute; left: 8.60cm; top:25.04cm" class=date>				<?if  ($dia6_H3_2 != "")  {echo date ("h:i A", strtotime($dia6_H3_2));}?></div>
	<div style="position:absolute; left: 9.33cm; top:25.04cm" class=resultado>	<?echo $dia6_R3_2;?></div>
	<div style="position:absolute; left:10.08cm; top:25.04cm" class=date>				<?if  ($dia6_H4_2 != "")  {echo date ("h:i A", strtotime($dia6_H4_2));}?></div>
	<div style="position:absolute; left:10.82cm; top:25.04cm" class=resultado>	<?echo $dia6_R4_2;?></div>
	<div style="position:absolute; left:11.56cm; top:25.04cm" class=date>				<?if  ($dia6_H5_2 != "")  {echo date ("h:i A", strtotime($dia6_H5_2));}?></div>
	<div style="position:absolute; left:12.33cm; top:25.04cm" class=resultado>	<?echo $dia6_R5_2;?></div>
	<div style="position:absolute; left:13.03cm; top:25.04cm" class=date>				<?if  ($dia6_H6_2 != "")  {echo date ("h:i A", strtotime($dia6_H6_2));}?></div>
	<div style="position:absolute; left:13.79cm; top:25.04cm" class=resultado>	<?echo $dia6_R6_2;?></div>
	<div style="position:absolute; left:14.56cm; top:25.04cm" class=date>				<?if  ($dia6_H7_2 != "")  {echo date ("h:i A", strtotime($dia6_H7_2));}?></div>
	<div style="position:absolute; left:15.29cm; top:25.04cm" class=resultado>	<?echo $dia6_R7_2;?></div>
	<div style="position:absolute; left:16.04cm; top:25.04cm" class=date>				<?if  ($dia6_H8_2 != "")  {echo date ("h:i A", strtotime($dia6_H8_2));}?></div>
	<div style="position:absolute; left:16.79cm; top:25.04cm" class=resultado>	<?echo $dia6_R8_2;?></div>
	<div style="position:absolute; left:17.53cm; top:25.04cm" class=date>				<?if  ($dia6_H9_2 != "")  {echo date ("h:i A", strtotime($dia6_H9_2));}?></div>
	<div style="position:absolute; left:18.27cm; top:25.04cm" class=resultado>	<?echo $dia6_R9_2?></div>
	<div style="position:absolute; left:19.01cm; top:25.04cm" class=date>				<?if  ($dia6_H10_2 != "") {echo date ("h:i A", strtotime($dia6_H10_2));};?></div>
	<div style="position:absolute; left:19.75cm; top:25.04cm" class=resultado>	<?echo $dia6_R10_2?></div>

	<div style="position:absolute; left: 5.62cm; top:25.27cm" class=date>				<?if  ($dia6_H1_3 != "")  {echo date ("h:i A", strtotime($dia6_H1_3));}?></div>
	<div style="position:absolute; left: 6.35cm; top:25.27cm" class=resultado>	<?echo $dia6_R1_3;?></div>
	<div style="position:absolute; left: 7.10cm; top:25.27cm" class=date>				<?if  ($dia6_H2_3 != "")  {echo date ("h:i A", strtotime($dia6_H2_3));}?></div>
	<div style="position:absolute; left: 7.83cm; top:25.27cm" class=resultado>	<?echo $dia6_R2_3;?></div>
	<div style="position:absolute; left: 8.60cm; top:25.27cm" class=date>				<?if  ($dia6_H3_3 != "")  {echo date ("h:i A", strtotime($dia6_H3_3));}?></div>
	<div style="position:absolute; left: 9.33cm; top:25.27cm" class=resultado>	<?echo $dia6_R3_3;?></div>
	<div style="position:absolute; left:10.08cm; top:25.27cm" class=date>				<?if  ($dia6_H4_3 != "")  {echo date ("h:i A", strtotime($dia6_H4_3));}?></div>
	<div style="position:absolute; left:10.82cm; top:25.27cm" class=resultado>	<?echo $dia6_R4_3;?></div>
	<div style="position:absolute; left:11.56cm; top:25.27cm" class=date>				<?if  ($dia6_H5_3 != "")  {echo date ("h:i A", strtotime($dia6_H5_3));}?></div>
	<div style="position:absolute; left:12.33cm; top:25.27cm" class=resultado>	<?echo $dia6_R5_3;?></div>
	<div style="position:absolute; left:13.03cm; top:25.27cm" class=date>				<?if  ($dia6_H6_3 != "")  {echo date ("h:i A", strtotime($dia6_H6_3));}?></div>
	<div style="position:absolute; left:13.79cm; top:25.27cm" class=resultado>	<?echo $dia6_R6_3;?></div>
	<div style="position:absolute; left:14.56cm; top:25.27cm" class=date>				<?if  ($dia6_H7_3 != "")  {echo date ("h:i A", strtotime($dia6_H7_3));}?></div>
	<div style="position:absolute; left:15.29cm; top:25.27cm" class=resultado>	<?echo $dia6_R7_3;?></div>
	<div style="position:absolute; left:16.04cm; top:25.27cm" class=date>				<?if  ($dia6_H8_3 != "")  {echo date ("h:i A", strtotime($dia6_H8_3));}?></div>
	<div style="position:absolute; left:16.79cm; top:25.27cm" class=resultado>	<?echo $dia6_R8_3;?></div>
	<div style="position:absolute; left:17.53cm; top:25.27cm" class=date>				<?if  ($dia6_H9_3 != "")  {echo date ("h:i A", strtotime($dia6_H9_3));}?></div>
	<div style="position:absolute; left:18.27cm; top:25.27cm" class=resultado>	<?echo $dia6_R9_3;?></div>
	<div style="position:absolute; left:19.01cm; top:25.27cm" class=date>				<?if  ($dia6_H10_3 != "") {echo date ("h:i A", strtotime($dia6_H10_3));}?></div>
	<div style="position:absolute; left:19.75cm; top:25.27cm" class=resultado>	<?echo $dia6_R10_3;?></div>

	<div style="position:absolute; left: 5.62cm; top:25.49cm" class=date>				<?if  ($dia6_H1_4 != "")  {echo date ("h:i A", strtotime($dia6_H1_4));}?></div>
	<div style="position:absolute; left: 6.35cm; top:25.49cm" class=resultado>	<?echo $dia6_R1_4;?></div>
	<div style="position:absolute; left: 7.10cm; top:25.49cm" class=date>				<?if  ($dia6_H2_4 != "")  {echo date ("h:i A", strtotime($dia6_H2_4));}?></div>
	<div style="position:absolute; left: 7.83cm; top:25.49cm" class=resultado>	<?echo $dia6_R2_4;?></div>
	<div style="position:absolute; left: 8.60cm; top:25.49cm" class=date>				<?if  ($dia6_H3_4 != "")  {echo date ("h:i A", strtotime($dia6_H3_4));}?></div>
	<div style="position:absolute; left: 9.33cm; top:25.49cm" class=resultado>	<?echo $dia6_R3_4;?></div>
	<div style="position:absolute; left:10.08cm; top:25.49cm" class=date>				<?if  ($dia6_H4_4 != "")  {echo date ("h:i A", strtotime($dia6_H4_4));}?></div>
	<div style="position:absolute; left:10.82cm; top:25.49cm" class=resultado>	<?echo $dia6_R4_4;?></div>
	<div style="position:absolute; left:11.56cm; top:25.49cm" class=date>				<?if  ($dia6_H5_4 != "")  {echo date ("h:i A", strtotime($dia6_H5_4));}?></div>
	<div style="position:absolute; left:12.33cm; top:25.49cm" class=resultado>	<?echo $dia6_R5_4;?></div>
	<div style="position:absolute; left:13.03cm; top:25.49cm" class=date>				<?if  ($dia6_H6_4 != "")  {echo date ("h:i A", strtotime($dia6_H6_4));}?></div>
	<div style="position:absolute; left:13.79cm; top:25.49cm" class=resultado>	<?echo $dia6_R6_4;?></div>
	<div style="position:absolute; left:14.56cm; top:25.49cm" class=date>				<?if  ($dia6_H7_4 != "")  {echo date ("h:i A", strtotime($dia6_H7_4));}?></div>
	<div style="position:absolute; left:15.29cm; top:25.49cm" class=resultado>	<?echo $dia6_R7_4;?></div>
	<div style="position:absolute; left:16.04cm; top:25.49cm" class=date>				<?if  ($dia6_H8_4 != "")  {echo date ("h:i A", strtotime($dia6_H8_4));}?></div>
	<div style="position:absolute; left:16.79cm; top:25.49cm" class=resultado>	<?echo $dia6_R8_4;?></div>
	<div style="position:absolute; left:17.53cm; top:25.49cm" class=date>				<?if  ($dia6_H9_4 != "")  {echo date ("h:i A", strtotime($dia6_H9_4));}?></div>
	<div style="position:absolute; left:18.27cm; top:25.49cm" class=resultado>	<?echo $dia6_R9_4;?></div>
	<div style="position:absolute; left:19.01cm; top:25.49cm" class=date>				<?if  ($dia6_H10_4 != "") {echo date ("h:i A", strtotime($dia6_H10_4));}?></div>
	<div style="position:absolute; left:19.75cm; top:25.49cm" class=resultado>	<?echo $dia6_R10_4;?></div>

	<div style="position:absolute; left: 1.75cm; top:26.30cm; font-size:8px"><?echo substr($dia6_nombre1,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:26.30cm" class=hora><?if ($dia6_HE1_1 != "") {echo date ("h:i A", strtotime($dia6_HE1_1));}?></div>
	<div style="position:absolute; left: 7.12cm; top:26.30cm" class=hora><?if ($dia6_HS1_1 != "") {echo date ("h:i A", strtotime($dia6_HS1_1));}?></div>
	<div style="position:absolute; left: 8.62cm; top:26.30cm" class=hora><?if ($dia6_HE2_1 != "") {echo date ("h:i A", strtotime($dia6_HE2_1));}?></div>
	<div style="position:absolute; left:10.12cm; top:26.30cm" class=hora><?if ($dia6_HS2_1 != "") {echo date ("h:i A", strtotime($dia6_HS2_1));}?></div>
	<div style="position:absolute; left:11.62cm; top:26.30cm" class=hora><?if ($dia6_HE3_1 != "") {echo date ("h:i A", strtotime($dia6_HE3_1));}?></div>
	<div style="position:absolute; left:13.12cm; top:26.30cm" class=hora><?if ($dia6_HS3_1 != "") {echo date ("h:i A", strtotime($dia6_HS3_1));}?></div>
	<div style="position:absolute; left:14.62cm; top:26.30cm" class=hora><?if ($dia6_HE4_1 != "") {echo date ("h:i A", strtotime($dia6_HE4_1));}?></div>
	<div style="position:absolute; left:16.12cm; top:26.30cm" class=hora><?if ($dia6_HS4_1 != "") {echo date ("h:i A", strtotime($dia6_HS4_1));}?></div>
	<div style="position:absolute; left:17.62cm; top:26.30cm" class=hora><?if ($dia6_HE5_1 != "") {echo date ("h:i A", strtotime($dia6_HE5_1));}?></div>
	<div style="position:absolute; left:19.12cm; top:26.30cm" class=hora><?if ($dia6_HS5_1 != "") {echo date ("h:i A", strtotime($dia6_HS5_1));}?></div>

	<div style="position:absolute; left: 1.75cm; top:26.53cm; font-size:8px"><?echo substr($dia6_nombre2,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:26.53cm" class=hora><?if ($dia6_HE1_2 != "") {echo date ("h:i A", strtotime($dia6_HE1_2));}?></div>
	<div style="position:absolute; left: 7.12cm; top:26.53cm" class=hora><?if ($dia6_HS1_2 != "") {echo date ("h:i A", strtotime($dia6_HS1_2));}?></div>
	<div style="position:absolute; left: 8.62cm; top:26.53cm" class=hora><?if ($dia6_HE2_2 != "") {echo date ("h:i A", strtotime($dia6_HE2_2));}?></div>
	<div style="position:absolute; left:10.12cm; top:26.53cm" class=hora><?if ($dia6_HS2_2 != "") {echo date ("h:i A", strtotime($dia6_HS2_2));}?></div>
	<div style="position:absolute; left:11.62cm; top:26.53cm" class=hora><?if ($dia6_HE3_2 != "") {echo date ("h:i A", strtotime($dia6_HE3_2));}?></div>
	<div style="position:absolute; left:13.12cm; top:26.53cm" class=hora><?if ($dia6_HS3_2 != "") {echo date ("h:i A", strtotime($dia6_HS3_2));}?></div>
	<div style="position:absolute; left:14.62cm; top:26.53cm" class=hora><?if ($dia6_HE4_2 != "") {echo date ("h:i A", strtotime($dia6_HE4_2));}?></div>
	<div style="position:absolute; left:16.12cm; top:26.53cm" class=hora><?if ($dia6_HS4_2 != "") {echo date ("h:i A", strtotime($dia6_HS4_2));}?></div>
	<div style="position:absolute; left:17.62cm; top:26.53cm" class=hora><?if ($dia6_HE5_2 != "") {echo date ("h:i A", strtotime($dia6_HE5_2));}?></div>
	<div style="position:absolute; left:19.12cm; top:26.53cm" class=hora><?if ($dia6_HS5_2 != "") {echo date ("h:i A", strtotime($dia6_HS5_2));}?></div>

	<div style="position:absolute; left: 1.75cm; top:26.76cm; font-size:8px"><?echo substr($dia6_nombre3,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:26.76cm" class=hora><?if ($dia6_HE1_3 != "") {echo date ("h:i A", strtotime($dia6_HE1_3));}?></div>
	<div style="position:absolute; left: 7.12cm; top:26.76cm" class=hora><?if ($dia6_HS1_3 != "") {echo date ("h:i A", strtotime($dia6_HS1_3));}?></div>
	<div style="position:absolute; left: 8.62cm; top:26.76cm" class=hora><?if ($dia6_HE2_3 != "") {echo date ("h:i A", strtotime($dia6_HE2_3));}?></div>
	<div style="position:absolute; left:10.12cm; top:26.76cm" class=hora><?if ($dia6_HS2_3 != "") {echo date ("h:i A", strtotime($dia6_HS2_3));}?></div>
	<div style="position:absolute; left:11.62cm; top:26.76cm" class=hora><?if ($dia6_HE3_3 != "") {echo date ("h:i A", strtotime($dia6_HE3_3));}?></div>
	<div style="position:absolute; left:13.12cm; top:26.76cm" class=hora><?if ($dia6_HS3_3 != "") {echo date ("h:i A", strtotime($dia6_HS3_3));}?></div>
	<div style="position:absolute; left:14.62cm; top:26.76cm" class=hora><?if ($dia6_HE4_3 != "") {echo date ("h:i A", strtotime($dia6_HE4_3));}?></div>
	<div style="position:absolute; left:16.12cm; top:26.76cm" class=hora><?if ($dia6_HS4_3 != "") {echo date ("h:i A", strtotime($dia6_HS4_3));}?></div>
	<div style="position:absolute; left:17.62cm; top:26.76cm" class=hora><?if ($dia6_HE5_3 != "") {echo date ("h:i A", strtotime($dia6_HE5_3));}?></div>
	<div style="position:absolute; left:19.12cm; top:26.76cm" class=hora><?if ($dia6_HS5_3 != "") {echo date ("h:i A", strtotime($dia6_HS5_3));}?></div>

	<div style="position:absolute; left: 1.75cm; top:26.99cm; font-size:8px"><?echo substr($dia6_nombre4,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:26.99cm" class=hora><?if ($dia6_HE1_4 != "") {echo date ("h:i A", strtotime($dia6_HE1_4));}?></div>
	<div style="position:absolute; left: 7.12cm; top:26.99cm" class=hora><?if ($dia6_HS1_4 != "") {echo date ("h:i A", strtotime($dia6_HS1_4));}?></div>
	<div style="position:absolute; left: 8.62cm; top:26.99cm" class=hora><?if ($dia6_HE2_4 != "") {echo date ("h:i A", strtotime($dia6_HE2_4));}?></div>
	<div style="position:absolute; left:10.12cm; top:26.99cm" class=hora><?if ($dia6_HS2_4 != "") {echo date ("h:i A", strtotime($dia6_HS2_4));}?></div>
	<div style="position:absolute; left:11.62cm; top:26.99cm" class=hora><?if ($dia6_HE3_4 != "") {echo date ("h:i A", strtotime($dia6_HE3_4));}?></div>
	<div style="position:absolute; left:13.12cm; top:26.99cm" class=hora><?if ($dia6_HS3_4 != "") {echo date ("h:i A", strtotime($dia6_HS3_4));}?></div>
	<div style="position:absolute; left:14.62cm; top:26.99cm" class=hora><?if ($dia6_HE4_4 != "") {echo date ("h:i A", strtotime($dia6_HE4_4));}?></div>
	<div style="position:absolute; left:16.12cm; top:26.99cm" class=hora><?if ($dia6_HS4_4 != "") {echo date ("h:i A", strtotime($dia6_HS4_4));}?></div>
	<div style="position:absolute; left:17.62cm; top:26.99cm" class=hora><?if ($dia6_HE5_4 != "") {echo date ("h:i A", strtotime($dia6_HE5_4));}?></div>
	<div style="position:absolute; left:19.12cm; top:26.99cm" class=hora><?if ($dia6_HS5_4 != "") {echo date ("h:i A", strtotime($dia6_HS5_4));}?></div>

	<div style="position:absolute; left: 1.75cm; top:27.22cm; font-size:8px"><?echo substr($dia6_nombre5,0,30);?></div>
	<div style="position:absolute; left: 5.62cm; top:27.22cm" class=hora><?if ($dia6_HE1_5 != "") {echo date ("h:i A", strtotime($dia6_HE1_5));}?></div>
	<div style="position:absolute; left: 7.12cm; top:27.22cm" class=hora><?if ($dia6_HS1_5 != "") {echo date ("h:i A", strtotime($dia6_HS1_5));}?></div>
	<div style="position:absolute; left: 8.62cm; top:27.22cm" class=hora><?if ($dia6_HE2_5 != "") {echo date ("h:i A", strtotime($dia6_HE2_5));}?></div>
	<div style="position:absolute; left:10.12cm; top:27.22cm" class=hora><?if ($dia6_HS2_5 != "") {echo date ("h:i A", strtotime($dia6_HS2_5));}?></div>
	<div style="position:absolute; left:11.62cm; top:27.22cm" class=hora><?if ($dia6_HE3_5 != "") {echo date ("h:i A", strtotime($dia6_HE3_5));}?></div>
	<div style="position:absolute; left:13.12cm; top:27.22cm" class=hora><?if ($dia6_HS3_5 != "") {echo date ("h:i A", strtotime($dia6_HS3_5));}?></div>
	<div style="position:absolute; left:14.62cm; top:27.22cm" class=hora><?if ($dia6_HE4_5 != "") {echo date ("h:i A", strtotime($dia6_HE4_5));}?></div>
	<div style="position:absolute; left:16.12cm; top:27.22cm" class=hora><?if ($dia6_HS4_5 != "") {echo date ("h:i A", strtotime($dia6_HS4_5));}?></div>
	<div style="position:absolute; left:17.62cm; top:27.22cm" class=hora><?if ($dia6_HE5_5 != "") {echo date ("h:i A", strtotime($dia6_HE5_5));}?></div>
	<div style="position:absolute; left:19.12cm; top:27.22cm" class=hora><?if ($dia6_HS5_5 != "") {echo date ("h:i A", strtotime($dia6_HS5_5));}?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:275mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:157.5mm; top:275mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:206mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-102.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
