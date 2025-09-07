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
	body		{font-family:Arlrdlt; font-size:10px; text-align:center; color:rgba(0,0,191,1)}
	button	{background-color:rgba(0,255,0,0.0); border:0px; border-radius:0px; cursor:pointer; height:25px}
	div.radio			{font-size:13px}
	div.checkbox	{font-size:18px}
	textarea 			{resize:none; font-family:Arlrdlt; font-size:10px; line-height:80%; ; padding: 5px 1px; text-align:justify; background-color:rgba(255,0,0,0)}
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
<div style="position:absolute; left:50%; margin-left:-408px; top:1056px; width:816px; height:1056px">
	<img src="<? echo $retiro; ?>" style="width:816px; height:auto">
</div>
<div style="position:absolute; left:50%; margin-left:-408px; top:	0px; width:816px; height:1056px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0px; top:   0px"><img src="<? echo $tiro; ?>"   width="816px" height="auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top:1.40cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.20cm; top:0.60cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.20cm; top:0.78cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?></span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left:15.00cm; top: 2.36cm" class="radio"><?if ($tipo_trabajo == 'C') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.65cm; top: 2.36cm" class="radio"><?if ($tipo_trabajo == 'F') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 5.05cm; top: 2.73cm"><?echo substr($descripcion,0,68-0);?></div>
	<div style="position:absolute; left: 6.45cm; top: 3.01cm"><?echo substr($ubicacion,0,68-0);?></div>
	<div style="position:absolute; left: 5.20cm; top: 3.31cm"><?echo $certificado_gas_free;?></div>
	<div style="position:absolute; left:13.65cm; top: 3.31cm"><?echo $certificado_libre_plomo;?></div>
	<div style="position:absolute; left:19.05cm; top: 3.31cm"><?echo $procedimiento;?></div>
	<div style="position:absolute; left: 7.30cm; top: 3.61cm"><?echo $fecha_apertura;?></div>
	<div style="position:absolute; left: 8.95cm; top: 3.61cm"><?echo date ("g:i A", strtotime($hora_apertura));?></div>
	<div style="position:absolute; left:16.90cm; top: 3.61cm"><?echo $fecha_cierre;?></div>
	<div style="position:absolute; left:18.55cm; top: 3.61cm"><?echo date ("g:i A", strtotime($hora_cierre));?></div>
	<div style="position:absolute; left: 7.50cm; top: 3.91cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left: 1.10cm; top: 4.59cm"><?echo substr($nombre1,0,30);?></div>
	<div style="position:absolute; left: 7.75cm; top: 4.59cm"><?echo $cedula1;?></div>
	<div style="position:absolute; left:10.05cm; top: 4.59cm"><?echo substr($cargo1,0,20);?></div>
	<div style="position:absolute; left: 1.10cm; top: 4.86cm"><?echo substr($nombre2,0,30);?></div>
	<div style="position:absolute; left: 7.75cm; top: 4.86cm"><?echo $cedula2;?></div>
	<div style="position:absolute; left:10.05cm; top: 4.86cm"><?echo substr($cargo2,0,20);?></div>
	<div style="position:absolute; left: 1.10cm; top: 5.13cm"><?echo substr($nombre3,0,30);?></div>
	<div style="position:absolute; left: 7.75cm; top: 5.13cm"><?echo $cedula3;?></div>
	<div style="position:absolute; left:10.05cm; top: 5.13cm"><?echo substr($cargo3,0,20);?></div>
	<div style="position:absolute; left: 1.10cm; top: 5.40cm"><?echo substr($nombre4,0,30);?></div>
	<div style="position:absolute; left: 7.75cm; top: 5.40cm"><?echo $cedula4;?></div>
	<div style="position:absolute; left:10.05cm; top: 5.40cm"><?echo substr($cargo4,0,20);?></div>
	<div style="position:absolute; left: 1.10cm; top: 5.67cm"><?echo substr($nombre5,0,30);?></div>
	<div style="position:absolute; left: 7.75cm; top: 5.67cm"><?echo $cedula5;?></div>
	<div style="position:absolute; left:10.05cm; top: 5.67cm"><?echo substr($cargo5,0,20);?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 7.90cm; top: 7.10cm"><?echo $fechaB1;?></div>
	<div style="position:absolute; left: 8.10cm; top: 7.50cm"><?echo $num_cert_habil1;?></div>
	<div style="position:absolute; left: 8.50cm; top: 7.80cm"><?echo $num_pers_ejecutan1;?></div>
	<div style="position:absolute; left: 8.50cm; top: 8.10cm"><?echo $num_pers_autoreporte1;?></div>
	<div style="position:absolute; left: 8.10cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio1));?></div>
	<div style="position:absolute; left: 8.10cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final1));?></div>
	<div style="position:absolute; left:10.10cm; top: 7.10cm"><?echo $fechaB2;?></div>
	<div style="position:absolute; left:10.30cm; top: 7.50cm"><?echo $num_cert_habil2;?></div>
	<div style="position:absolute; left:10.70cm; top: 7.80cm"><?echo $num_pers_ejecutan2;?></div>
	<div style="position:absolute; left:10.70cm; top: 8.10cm"><?echo $num_pers_autoreporte2;?></div>
	<div style="position:absolute; left:10.30cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio2));?></div>
	<div style="position:absolute; left:10.30cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final2));?></div>
	<div style="position:absolute; left:12.30cm; top: 7.10cm"><?echo $fechaB3;?></div>
	<div style="position:absolute; left:12.50cm; top: 7.50cm"><?echo $num_cert_habil3;?></div>
	<div style="position:absolute; left:12.90cm; top: 7.80cm"><?echo $num_pers_ejecutan3;?></div>
	<div style="position:absolute; left:12.90cm; top: 8.10cm"><?echo $num_pers_autoreporte3;?></div>
	<div style="position:absolute; left:12.50cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio3));?></div>
	<div style="position:absolute; left:12.50cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final3));?></div>
	<div style="position:absolute; left:14.50cm; top: 7.10cm"><?echo $fechaB4;?></div>
	<div style="position:absolute; left:14.70cm; top: 7.50cm"><?echo $num_cert_habil4;?></div>
	<div style="position:absolute; left:15.10cm; top: 7.80cm"><?echo $num_pers_ejecutan4;?></div>
	<div style="position:absolute; left:15.10cm; top: 8.10cm"><?echo $num_pers_autoreporte4;?></div>
	<div style="position:absolute; left:14.70cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio4));?></div>
	<div style="position:absolute; left:14.70cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final4));?></div>
	<div style="position:absolute; left:16.70cm; top: 7.10cm"><?echo $fechaB5;?></div>
	<div style="position:absolute; left:16.90cm; top: 7.50cm"><?echo $num_cert_habil5;?></div>
	<div style="position:absolute; left:17.30cm; top: 7.80cm"><?echo $num_pers_ejecutan5;?></div>
	<div style="position:absolute; left:17.30cm; top: 8.10cm"><?echo $num_pers_autoreporte5;?></div>
	<div style="position:absolute; left:16.90cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio5));?></div>
	<div style="position:absolute; left:16.90cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final5));?></div>
	<div style="position:absolute; left:18.90cm; top: 7.10cm"><?echo $fechaB6;?></div>
	<div style="position:absolute; left:19.10cm; top: 7.50cm"><?echo $num_cert_habil6;?></div>
	<div style="position:absolute; left:19.50cm; top: 7.80cm"><?echo $num_pers_ejecutan6;?></div>
	<div style="position:absolute; left:19.50cm; top: 8.10cm"><?echo $num_pers_autoreporte6;?></div>
	<div style="position:absolute; left:19.10cm; top: 8.45cm"><?echo date ("g:i A", strtotime($hora_inicio6));?></div>
	<div style="position:absolute; left:19.10cm; top: 8.75cm"><?echo date ("g:i A", strtotime($hora_final6));?></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left:13.50cm; top:10.30cm; color:white" class="radio"><?if ($tipo_esp_conf == '1') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.15cm; top:10.30cm; color:white" class="radio"><?if ($tipo_esp_conf == '2') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.74cm; top:10.30cm; color:white" class="radio"><?if ($grado_peligro == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.39cm; top:10.30cm; color:white" class="radio"><?if ($grado_peligro == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.04cm; top:10.30cm; color:white" class="radio"><?if ($grado_peligro == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:13.85cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB1;?></div>
	<div style="position:absolute; left:13.75cm; top:11.30cm" class="radio"><?if ($C1_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:11.30cm" class="radio"><?if ($C1_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:11.30cm" class="radio"><?if ($C1_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:11.60cm" class="radio"><?if ($C2_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:11.60cm" class="radio"><?if ($C2_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:11.60cm" class="radio"><?if ($C2_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:11.82cm" class="radio"><?if ($C3_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:11.82cm" class="radio"><?if ($C3_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:11.82cm" class="radio"><?if ($C3_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:12.04cm" class="radio"><?if ($C4_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:12.04cm" class="radio"><?if ($C4_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:12.04cm" class="radio"><?if ($C4_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:12.26cm" class="radio"><?if ($C5_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:12.26cm" class="radio"><?if ($C5_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:12.26cm" class="radio"><?if ($C5_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:12.48cm" class="radio"><?if ($C6_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:12.48cm" class="radio"><?if ($C6_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:12.48cm" class="radio"><?if ($C6_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:12.70cm" class="radio"><?if ($C7_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:12.70cm" class="radio"><?if ($C7_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:12.70cm" class="radio"><?if ($C7_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:13.10cm" class="radio"><?if ($C8_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:13.10cm" class="radio"><?if ($C8_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:13.10cm" class="radio"><?if ($C8_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:13.40cm" class="radio"><?if ($C9_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:13.40cm" class="radio"><?if ($C9_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:13.40cm" class="radio"><?if ($C9_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:13.62cm" class="radio"><?if ($C10_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:13.62cm" class="radio"><?if ($C10_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:13.62cm" class="radio"><?if ($C10_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:13.84cm" class="radio"><?if ($C11_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:13.84cm" class="radio"><?if ($C11_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:13.84cm" class="radio"><?if ($C11_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:14.06cm" class="radio"><?if ($C12_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:14.06cm" class="radio"><?if ($C12_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:14.06cm" class="radio"><?if ($C12_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:14.40cm" class="radio"><?if ($C13_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:14.40cm" class="radio"><?if ($C13_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:14.40cm" class="radio"><?if ($C13_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:14.72cm" class="radio"><?if ($C14_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:14.72cm" class="radio"><?if ($C14_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:14.72cm" class="radio"><?if ($C14_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:14.94cm" class="radio"><?if ($C15_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:14.94cm" class="radio"><?if ($C15_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:14.94cm" class="radio"><?if ($C15_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:15.16cm" class="radio"><?if ($C16_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:15.16cm" class="radio"><?if ($C16_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:15.16cm" class="radio"><?if ($C16_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:15.39cm" class="radio"><?if ($C17_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:15.39cm" class="radio"><?if ($C17_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:15.39cm" class="radio"><?if ($C17_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:15.61cm" class="radio"><?if ($C18_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:15.61cm" class="radio"><?if ($C18_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:15.61cm" class="radio"><?if ($C18_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:15.83cm" class="radio"><?if ($C19_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:15.83cm" class="radio"><?if ($C19_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:15.83cm" class="radio"><?if ($C19_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:16.05cm" class="radio"><?if ($C20_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:16.05cm" class="radio"><?if ($C20_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:16.05cm" class="radio"><?if ($C20_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:16.27cm" class="radio"><?if ($C21_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:16.27cm" class="radio"><?if ($C21_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:16.27cm" class="radio"><?if ($C21_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:16.49cm" class="radio"><?if ($C22_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:16.49cm" class="radio"><?if ($C22_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:16.49cm" class="radio"><?if ($C22_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:16.71cm" class="radio"><?if ($C23_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:16.71cm" class="radio"><?if ($C23_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:16.71cm" class="radio"><?if ($C23_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:17.16cm" class="radio"><?if ($C24_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:17.16cm" class="radio"><?if ($C24_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:17.16cm" class="radio"><?if ($C24_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:17.38cm" class="radio"><?if ($C25_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:17.38cm" class="radio"><?if ($C25_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:17.38cm" class="radio"><?if ($C25_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:17.59cm" class="radio"><?if ($C26_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:17.59cm" class="radio"><?if ($C26_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:17.59cm" class="radio"><?if ($C26_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:17.81cm" class="radio"><?if ($C27_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:17.81cm" class="radio"><?if ($C27_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:17.81cm" class="radio"><?if ($C27_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:18.03cm" class="radio"><?if ($C28_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:18.03cm" class="radio"><?if ($C28_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:18.03cm" class="radio"><?if ($C28_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:18.25cm" class="radio"><?if ($C29_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:18.25cm" class="radio"><?if ($C29_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:18.25cm" class="radio"><?if ($C29_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:18.47cm" class="radio"><?if ($C30_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:18.47cm" class="radio"><?if ($C30_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:18.47cm" class="radio"><?if ($C30_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:18.69cm" class="radio"><?if ($C31_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:18.69cm" class="radio"><?if ($C31_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:18.69cm" class="radio"><?if ($C31_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:18.91cm" class="radio"><?if ($C32_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:18.91cm" class="radio"><?if ($C32_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:18.91cm" class="radio"><?if ($C32_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:19.13cm" class="radio"><?if ($C33_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:19.13cm" class="radio"><?if ($C33_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:19.13cm" class="radio"><?if ($C33_1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:13.75cm; top:19.35cm" class="radio"><?if ($C34_1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.10cm; top:19.35cm" class="radio"><?if ($C34_1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:19.35cm" class="radio"><?if ($C34_1 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:15.03cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB2;?></div>
	<div style="position:absolute; left:14.93cm; top:11.30cm" class="radio"><?if ($C1_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:11.30cm" class="radio"><?if ($C1_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:11.30cm" class="radio"><?if ($C1_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:11.60cm" class="radio"><?if ($C2_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:11.60cm" class="radio"><?if ($C2_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:11.60cm" class="radio"><?if ($C2_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:11.82cm" class="radio"><?if ($C3_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:11.82cm" class="radio"><?if ($C3_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:11.82cm" class="radio"><?if ($C3_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:12.04cm" class="radio"><?if ($C4_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:12.04cm" class="radio"><?if ($C4_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:12.04cm" class="radio"><?if ($C4_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:12.26cm" class="radio"><?if ($C5_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:12.26cm" class="radio"><?if ($C5_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:12.26cm" class="radio"><?if ($C5_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:12.48cm" class="radio"><?if ($C6_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:12.48cm" class="radio"><?if ($C6_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:12.48cm" class="radio"><?if ($C6_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:12.70cm" class="radio"><?if ($C7_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:12.70cm" class="radio"><?if ($C7_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:12.70cm" class="radio"><?if ($C7_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:13.10cm" class="radio"><?if ($C8_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:13.10cm" class="radio"><?if ($C8_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:13.10cm" class="radio"><?if ($C8_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:13.40cm" class="radio"><?if ($C9_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:13.40cm" class="radio"><?if ($C9_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:13.40cm" class="radio"><?if ($C9_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:13.62cm" class="radio"><?if ($C10_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:13.62cm" class="radio"><?if ($C10_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:13.62cm" class="radio"><?if ($C10_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:13.84cm" class="radio"><?if ($C11_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:13.84cm" class="radio"><?if ($C11_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:13.84cm" class="radio"><?if ($C11_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:14.06cm" class="radio"><?if ($C12_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:14.06cm" class="radio"><?if ($C12_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:14.06cm" class="radio"><?if ($C12_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:14.40cm" class="radio"><?if ($C13_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:14.40cm" class="radio"><?if ($C13_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:14.40cm" class="radio"><?if ($C13_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:14.72cm" class="radio"><?if ($C14_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:14.72cm" class="radio"><?if ($C14_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:14.72cm" class="radio"><?if ($C14_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:14.94cm" class="radio"><?if ($C15_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:14.94cm" class="radio"><?if ($C15_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:14.94cm" class="radio"><?if ($C15_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:15.16cm" class="radio"><?if ($C16_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:15.16cm" class="radio"><?if ($C16_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:15.16cm" class="radio"><?if ($C16_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:15.39cm" class="radio"><?if ($C17_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:15.39cm" class="radio"><?if ($C17_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:15.39cm" class="radio"><?if ($C17_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:15.61cm" class="radio"><?if ($C18_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:15.61cm" class="radio"><?if ($C18_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:15.61cm" class="radio"><?if ($C18_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:15.83cm" class="radio"><?if ($C19_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:15.83cm" class="radio"><?if ($C19_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:15.83cm" class="radio"><?if ($C19_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:16.05cm" class="radio"><?if ($C20_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:16.05cm" class="radio"><?if ($C20_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:16.05cm" class="radio"><?if ($C20_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:16.27cm" class="radio"><?if ($C21_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:16.27cm" class="radio"><?if ($C21_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:16.27cm" class="radio"><?if ($C21_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:16.49cm" class="radio"><?if ($C22_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:16.49cm" class="radio"><?if ($C22_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:16.49cm" class="radio"><?if ($C22_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:16.71cm" class="radio"><?if ($C23_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:16.71cm" class="radio"><?if ($C23_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:16.71cm" class="radio"><?if ($C23_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:17.16cm" class="radio"><?if ($C24_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:17.16cm" class="radio"><?if ($C24_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:17.16cm" class="radio"><?if ($C24_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:17.38cm" class="radio"><?if ($C25_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:17.38cm" class="radio"><?if ($C25_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:17.38cm" class="radio"><?if ($C25_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:17.59cm" class="radio"><?if ($C26_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:17.59cm" class="radio"><?if ($C26_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:17.59cm" class="radio"><?if ($C26_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:17.81cm" class="radio"><?if ($C27_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:17.81cm" class="radio"><?if ($C27_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:17.81cm" class="radio"><?if ($C27_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:18.03cm" class="radio"><?if ($C28_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:18.03cm" class="radio"><?if ($C28_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:18.03cm" class="radio"><?if ($C28_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:18.25cm" class="radio"><?if ($C29_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:18.25cm" class="radio"><?if ($C29_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:18.25cm" class="radio"><?if ($C29_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:18.47cm" class="radio"><?if ($C30_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:18.47cm" class="radio"><?if ($C30_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:18.47cm" class="radio"><?if ($C30_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:18.69cm" class="radio"><?if ($C31_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:18.69cm" class="radio"><?if ($C31_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:18.69cm" class="radio"><?if ($C31_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:18.91cm" class="radio"><?if ($C32_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:18.91cm" class="radio"><?if ($C32_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:18.91cm" class="radio"><?if ($C32_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:19.13cm" class="radio"><?if ($C33_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:19.13cm" class="radio"><?if ($C33_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:19.13cm" class="radio"><?if ($C33_2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.93cm; top:19.35cm" class="radio"><?if ($C34_2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.28cm; top:19.35cm" class="radio"><?if ($C34_2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.68cm; top:19.35cm" class="radio"><?if ($C34_2 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:16.21cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB3;?></div>
	<div style="position:absolute; left:16.11cm; top:11.30cm" class="radio"><?if ($C1_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:11.30cm" class="radio"><?if ($C1_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:11.30cm" class="radio"><?if ($C1_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:11.60cm" class="radio"><?if ($C2_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:11.60cm" class="radio"><?if ($C2_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:11.60cm" class="radio"><?if ($C2_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:11.82cm" class="radio"><?if ($C3_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:11.82cm" class="radio"><?if ($C3_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:11.82cm" class="radio"><?if ($C3_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:12.04cm" class="radio"><?if ($C4_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:12.04cm" class="radio"><?if ($C4_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:12.04cm" class="radio"><?if ($C4_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:12.26cm" class="radio"><?if ($C5_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:12.26cm" class="radio"><?if ($C5_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:12.26cm" class="radio"><?if ($C5_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:12.48cm" class="radio"><?if ($C6_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:12.48cm" class="radio"><?if ($C6_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:12.48cm" class="radio"><?if ($C6_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:12.70cm" class="radio"><?if ($C7_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:12.70cm" class="radio"><?if ($C7_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:12.70cm" class="radio"><?if ($C7_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:13.10cm" class="radio"><?if ($C8_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:13.10cm" class="radio"><?if ($C8_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:13.10cm" class="radio"><?if ($C8_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:13.40cm" class="radio"><?if ($C9_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:13.40cm" class="radio"><?if ($C9_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:13.40cm" class="radio"><?if ($C9_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:13.62cm" class="radio"><?if ($C10_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:13.62cm" class="radio"><?if ($C10_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:13.62cm" class="radio"><?if ($C10_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:13.84cm" class="radio"><?if ($C11_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:13.84cm" class="radio"><?if ($C11_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:13.84cm" class="radio"><?if ($C11_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:14.06cm" class="radio"><?if ($C12_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:14.06cm" class="radio"><?if ($C12_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:14.06cm" class="radio"><?if ($C12_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:14.40cm" class="radio"><?if ($C13_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:14.40cm" class="radio"><?if ($C13_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:14.40cm" class="radio"><?if ($C13_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:14.72cm" class="radio"><?if ($C14_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:14.72cm" class="radio"><?if ($C14_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:14.72cm" class="radio"><?if ($C14_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:14.94cm" class="radio"><?if ($C15_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:14.94cm" class="radio"><?if ($C15_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:14.94cm" class="radio"><?if ($C15_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:15.16cm" class="radio"><?if ($C16_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:15.16cm" class="radio"><?if ($C16_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:15.16cm" class="radio"><?if ($C16_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:15.39cm" class="radio"><?if ($C17_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:15.39cm" class="radio"><?if ($C17_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:15.39cm" class="radio"><?if ($C17_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:15.61cm" class="radio"><?if ($C18_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:15.61cm" class="radio"><?if ($C18_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:15.61cm" class="radio"><?if ($C18_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:15.83cm" class="radio"><?if ($C19_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:15.83cm" class="radio"><?if ($C19_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:15.83cm" class="radio"><?if ($C19_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:16.05cm" class="radio"><?if ($C20_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:16.05cm" class="radio"><?if ($C20_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:16.05cm" class="radio"><?if ($C20_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:16.27cm" class="radio"><?if ($C21_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:16.27cm" class="radio"><?if ($C21_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:16.27cm" class="radio"><?if ($C21_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:16.49cm" class="radio"><?if ($C22_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:16.49cm" class="radio"><?if ($C22_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:16.49cm" class="radio"><?if ($C22_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:16.71cm" class="radio"><?if ($C23_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:16.71cm" class="radio"><?if ($C23_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:16.71cm" class="radio"><?if ($C23_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:17.16cm" class="radio"><?if ($C24_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:17.16cm" class="radio"><?if ($C24_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:17.16cm" class="radio"><?if ($C24_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:17.38cm" class="radio"><?if ($C25_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:17.38cm" class="radio"><?if ($C25_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:17.38cm" class="radio"><?if ($C25_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:17.59cm" class="radio"><?if ($C26_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:17.59cm" class="radio"><?if ($C26_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:17.59cm" class="radio"><?if ($C26_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:17.81cm" class="radio"><?if ($C27_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:17.81cm" class="radio"><?if ($C27_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:17.81cm" class="radio"><?if ($C27_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:18.03cm" class="radio"><?if ($C28_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:18.03cm" class="radio"><?if ($C28_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:18.03cm" class="radio"><?if ($C28_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:18.25cm" class="radio"><?if ($C29_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:18.25cm" class="radio"><?if ($C29_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:18.25cm" class="radio"><?if ($C29_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:18.47cm" class="radio"><?if ($C30_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:18.47cm" class="radio"><?if ($C30_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:18.47cm" class="radio"><?if ($C30_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:18.69cm" class="radio"><?if ($C31_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:18.69cm" class="radio"><?if ($C31_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:18.69cm" class="radio"><?if ($C31_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:18.91cm" class="radio"><?if ($C32_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:18.91cm" class="radio"><?if ($C32_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:18.91cm" class="radio"><?if ($C32_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:19.13cm" class="radio"><?if ($C33_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:19.13cm" class="radio"><?if ($C33_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:19.13cm" class="radio"><?if ($C33_3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.11cm; top:19.35cm" class="radio"><?if ($C34_3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.46cm; top:19.35cm" class="radio"><?if ($C34_3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.86cm; top:19.35cm" class="radio"><?if ($C34_3 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:17.39cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB4;?></div>
	<div style="position:absolute; left:17.29cm; top:11.30cm" class="radio"><?if ($C1_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:11.30cm" class="radio"><?if ($C1_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:11.30cm" class="radio"><?if ($C1_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:11.60cm" class="radio"><?if ($C2_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:11.60cm" class="radio"><?if ($C2_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:11.60cm" class="radio"><?if ($C2_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:11.82cm" class="radio"><?if ($C3_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:11.82cm" class="radio"><?if ($C3_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:11.82cm" class="radio"><?if ($C3_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:12.04cm" class="radio"><?if ($C4_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:12.04cm" class="radio"><?if ($C4_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:12.04cm" class="radio"><?if ($C4_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:12.26cm" class="radio"><?if ($C5_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:12.26cm" class="radio"><?if ($C5_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:12.26cm" class="radio"><?if ($C5_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:12.48cm" class="radio"><?if ($C6_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:12.48cm" class="radio"><?if ($C6_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:12.48cm" class="radio"><?if ($C6_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:12.70cm" class="radio"><?if ($C7_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:12.70cm" class="radio"><?if ($C7_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:12.70cm" class="radio"><?if ($C7_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:13.10cm" class="radio"><?if ($C8_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:13.10cm" class="radio"><?if ($C8_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:13.10cm" class="radio"><?if ($C8_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:13.40cm" class="radio"><?if ($C9_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:13.40cm" class="radio"><?if ($C9_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:13.40cm" class="radio"><?if ($C9_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:13.62cm" class="radio"><?if ($C10_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:13.62cm" class="radio"><?if ($C10_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:13.62cm" class="radio"><?if ($C10_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:13.84cm" class="radio"><?if ($C11_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:13.84cm" class="radio"><?if ($C11_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:13.84cm" class="radio"><?if ($C11_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:14.06cm" class="radio"><?if ($C12_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:14.06cm" class="radio"><?if ($C12_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:14.06cm" class="radio"><?if ($C12_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:14.40cm" class="radio"><?if ($C13_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:14.40cm" class="radio"><?if ($C13_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:14.40cm" class="radio"><?if ($C13_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:14.72cm" class="radio"><?if ($C14_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:14.72cm" class="radio"><?if ($C14_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:14.72cm" class="radio"><?if ($C14_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:14.94cm" class="radio"><?if ($C15_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:14.94cm" class="radio"><?if ($C15_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:14.94cm" class="radio"><?if ($C15_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:15.16cm" class="radio"><?if ($C16_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:15.16cm" class="radio"><?if ($C16_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:15.16cm" class="radio"><?if ($C16_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:15.39cm" class="radio"><?if ($C17_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:15.39cm" class="radio"><?if ($C17_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:15.39cm" class="radio"><?if ($C17_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:15.61cm" class="radio"><?if ($C18_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:15.61cm" class="radio"><?if ($C18_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:15.61cm" class="radio"><?if ($C18_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:15.83cm" class="radio"><?if ($C19_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:15.83cm" class="radio"><?if ($C19_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:15.83cm" class="radio"><?if ($C19_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:16.05cm" class="radio"><?if ($C20_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:16.05cm" class="radio"><?if ($C20_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:16.05cm" class="radio"><?if ($C20_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:16.27cm" class="radio"><?if ($C21_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:16.27cm" class="radio"><?if ($C21_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:16.27cm" class="radio"><?if ($C21_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:16.49cm" class="radio"><?if ($C22_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:16.49cm" class="radio"><?if ($C22_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:16.49cm" class="radio"><?if ($C22_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:16.71cm" class="radio"><?if ($C23_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:16.71cm" class="radio"><?if ($C23_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:16.71cm" class="radio"><?if ($C23_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:17.16cm" class="radio"><?if ($C24_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:17.16cm" class="radio"><?if ($C24_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:17.16cm" class="radio"><?if ($C24_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:17.38cm" class="radio"><?if ($C25_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:17.38cm" class="radio"><?if ($C25_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:17.38cm" class="radio"><?if ($C25_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:17.59cm" class="radio"><?if ($C26_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:17.59cm" class="radio"><?if ($C26_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:17.59cm" class="radio"><?if ($C26_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:17.81cm" class="radio"><?if ($C27_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:17.81cm" class="radio"><?if ($C27_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:17.81cm" class="radio"><?if ($C27_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:18.03cm" class="radio"><?if ($C28_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:18.03cm" class="radio"><?if ($C28_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:18.03cm" class="radio"><?if ($C28_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:18.25cm" class="radio"><?if ($C29_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:18.25cm" class="radio"><?if ($C29_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:18.25cm" class="radio"><?if ($C29_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:18.47cm" class="radio"><?if ($C30_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:18.47cm" class="radio"><?if ($C30_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:18.47cm" class="radio"><?if ($C30_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:18.69cm" class="radio"><?if ($C31_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:18.69cm" class="radio"><?if ($C31_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:18.69cm" class="radio"><?if ($C31_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:18.91cm" class="radio"><?if ($C32_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:18.91cm" class="radio"><?if ($C32_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:18.91cm" class="radio"><?if ($C32_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:19.13cm" class="radio"><?if ($C33_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:19.13cm" class="radio"><?if ($C33_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:19.13cm" class="radio"><?if ($C33_4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.29cm; top:19.35cm" class="radio"><?if ($C34_4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.64cm; top:19.35cm" class="radio"><?if ($C34_4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.04cm; top:19.35cm" class="radio"><?if ($C34_4 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:18.57cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB5;?></div>
	<div style="position:absolute; left:18.47cm; top:11.30cm" class="radio"><?if ($C1_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:11.30cm" class="radio"><?if ($C1_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:11.30cm" class="radio"><?if ($C1_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:11.60cm" class="radio"><?if ($C2_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:11.60cm" class="radio"><?if ($C2_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:11.60cm" class="radio"><?if ($C2_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:11.82cm" class="radio"><?if ($C3_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:11.82cm" class="radio"><?if ($C3_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:11.82cm" class="radio"><?if ($C3_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:12.04cm" class="radio"><?if ($C4_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:12.04cm" class="radio"><?if ($C4_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:12.04cm" class="radio"><?if ($C4_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:12.26cm" class="radio"><?if ($C5_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:12.26cm" class="radio"><?if ($C5_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:12.26cm" class="radio"><?if ($C5_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:12.48cm" class="radio"><?if ($C6_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:12.48cm" class="radio"><?if ($C6_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:12.48cm" class="radio"><?if ($C6_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:12.70cm" class="radio"><?if ($C7_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:12.70cm" class="radio"><?if ($C7_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:12.70cm" class="radio"><?if ($C7_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:13.10cm" class="radio"><?if ($C8_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:13.10cm" class="radio"><?if ($C8_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:13.10cm" class="radio"><?if ($C8_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:13.40cm" class="radio"><?if ($C9_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:13.40cm" class="radio"><?if ($C9_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:13.40cm" class="radio"><?if ($C9_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:13.62cm" class="radio"><?if ($C10_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:13.62cm" class="radio"><?if ($C10_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:13.62cm" class="radio"><?if ($C10_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:13.84cm" class="radio"><?if ($C11_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:13.84cm" class="radio"><?if ($C11_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:13.84cm" class="radio"><?if ($C11_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:14.06cm" class="radio"><?if ($C12_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:14.06cm" class="radio"><?if ($C12_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:14.06cm" class="radio"><?if ($C12_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:14.40cm" class="radio"><?if ($C13_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:14.40cm" class="radio"><?if ($C13_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:14.40cm" class="radio"><?if ($C13_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:14.72cm" class="radio"><?if ($C14_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:14.72cm" class="radio"><?if ($C14_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:14.72cm" class="radio"><?if ($C14_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:14.94cm" class="radio"><?if ($C15_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:14.94cm" class="radio"><?if ($C15_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:14.94cm" class="radio"><?if ($C15_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:15.16cm" class="radio"><?if ($C16_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:15.16cm" class="radio"><?if ($C16_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:15.16cm" class="radio"><?if ($C16_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:15.39cm" class="radio"><?if ($C17_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:15.39cm" class="radio"><?if ($C17_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:15.39cm" class="radio"><?if ($C17_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:15.61cm" class="radio"><?if ($C18_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:15.61cm" class="radio"><?if ($C18_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:15.61cm" class="radio"><?if ($C18_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:15.83cm" class="radio"><?if ($C19_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:15.83cm" class="radio"><?if ($C19_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:15.83cm" class="radio"><?if ($C19_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:16.05cm" class="radio"><?if ($C20_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:16.05cm" class="radio"><?if ($C20_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:16.05cm" class="radio"><?if ($C20_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:16.27cm" class="radio"><?if ($C21_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:16.27cm" class="radio"><?if ($C21_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:16.27cm" class="radio"><?if ($C21_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:16.49cm" class="radio"><?if ($C22_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:16.49cm" class="radio"><?if ($C22_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:16.49cm" class="radio"><?if ($C22_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:16.71cm" class="radio"><?if ($C23_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:16.71cm" class="radio"><?if ($C23_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:16.71cm" class="radio"><?if ($C23_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:17.16cm" class="radio"><?if ($C24_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:17.16cm" class="radio"><?if ($C24_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:17.16cm" class="radio"><?if ($C24_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:17.38cm" class="radio"><?if ($C25_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:17.38cm" class="radio"><?if ($C25_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:17.38cm" class="radio"><?if ($C25_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:17.59cm" class="radio"><?if ($C26_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:17.59cm" class="radio"><?if ($C26_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:17.59cm" class="radio"><?if ($C26_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:17.81cm" class="radio"><?if ($C27_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:17.81cm" class="radio"><?if ($C27_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:17.81cm" class="radio"><?if ($C27_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:18.03cm" class="radio"><?if ($C28_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:18.03cm" class="radio"><?if ($C28_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:18.03cm" class="radio"><?if ($C28_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:18.25cm" class="radio"><?if ($C29_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:18.25cm" class="radio"><?if ($C29_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:18.25cm" class="radio"><?if ($C29_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:18.47cm" class="radio"><?if ($C30_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:18.47cm" class="radio"><?if ($C30_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:18.47cm" class="radio"><?if ($C30_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:18.69cm" class="radio"><?if ($C31_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:18.69cm" class="radio"><?if ($C31_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:18.69cm" class="radio"><?if ($C31_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:18.91cm" class="radio"><?if ($C32_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:18.91cm" class="radio"><?if ($C32_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:18.91cm" class="radio"><?if ($C32_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:19.13cm" class="radio"><?if ($C33_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:19.13cm" class="radio"><?if ($C33_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:19.13cm" class="radio"><?if ($C33_5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.47cm; top:19.35cm" class="radio"><?if ($C34_5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.82cm; top:19.35cm" class="radio"><?if ($C34_5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.22cm; top:19.35cm" class="radio"><?if ($C34_5 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left:19.75cm; top:10.80cm; font-family:Arlrdbd; font-size:7px"><?echo $fechaB6;?></div>
	<div style="position:absolute; left:19.65cm; top:11.30cm" class="radio"><?if ($C1_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:11.30cm" class="radio"><?if ($C1_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:11.30cm" class="radio"><?if ($C1_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:11.60cm" class="radio"><?if ($C2_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:11.60cm" class="radio"><?if ($C2_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:11.60cm" class="radio"><?if ($C2_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:11.82cm" class="radio"><?if ($C3_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:11.82cm" class="radio"><?if ($C3_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:11.82cm" class="radio"><?if ($C3_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:12.04cm" class="radio"><?if ($C4_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:12.04cm" class="radio"><?if ($C4_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:12.04cm" class="radio"><?if ($C4_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:12.26cm" class="radio"><?if ($C5_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:12.26cm" class="radio"><?if ($C5_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:12.26cm" class="radio"><?if ($C5_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:12.48cm" class="radio"><?if ($C6_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:12.48cm" class="radio"><?if ($C6_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:12.48cm" class="radio"><?if ($C6_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:12.70cm" class="radio"><?if ($C7_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:12.70cm" class="radio"><?if ($C7_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:12.70cm" class="radio"><?if ($C7_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:13.10cm" class="radio"><?if ($C8_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:13.10cm" class="radio"><?if ($C8_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:13.10cm" class="radio"><?if ($C8_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:13.40cm" class="radio"><?if ($C9_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:13.40cm" class="radio"><?if ($C9_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:13.40cm" class="radio"><?if ($C9_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:13.62cm" class="radio"><?if ($C10_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:13.62cm" class="radio"><?if ($C10_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:13.62cm" class="radio"><?if ($C10_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:13.84cm" class="radio"><?if ($C11_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:13.84cm" class="radio"><?if ($C11_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:13.84cm" class="radio"><?if ($C11_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:14.06cm" class="radio"><?if ($C12_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:14.06cm" class="radio"><?if ($C12_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:14.06cm" class="radio"><?if ($C12_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:14.40cm" class="radio"><?if ($C13_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:14.40cm" class="radio"><?if ($C13_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:14.40cm" class="radio"><?if ($C13_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:14.72cm" class="radio"><?if ($C14_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:14.72cm" class="radio"><?if ($C14_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:14.72cm" class="radio"><?if ($C14_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:14.94cm" class="radio"><?if ($C15_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:14.94cm" class="radio"><?if ($C15_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:14.94cm" class="radio"><?if ($C15_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:15.16cm" class="radio"><?if ($C16_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:15.16cm" class="radio"><?if ($C16_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:15.16cm" class="radio"><?if ($C16_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:15.39cm" class="radio"><?if ($C17_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:15.39cm" class="radio"><?if ($C17_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:15.39cm" class="radio"><?if ($C17_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:15.61cm" class="radio"><?if ($C18_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:15.61cm" class="radio"><?if ($C18_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:15.61cm" class="radio"><?if ($C18_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:15.83cm" class="radio"><?if ($C19_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:15.83cm" class="radio"><?if ($C19_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:15.83cm" class="radio"><?if ($C19_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:16.05cm" class="radio"><?if ($C20_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:16.05cm" class="radio"><?if ($C20_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:16.05cm" class="radio"><?if ($C20_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:16.27cm" class="radio"><?if ($C21_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:16.27cm" class="radio"><?if ($C21_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:16.27cm" class="radio"><?if ($C21_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:16.49cm" class="radio"><?if ($C22_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:16.49cm" class="radio"><?if ($C22_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:16.49cm" class="radio"><?if ($C22_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:16.71cm" class="radio"><?if ($C23_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:16.71cm" class="radio"><?if ($C23_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:16.71cm" class="radio"><?if ($C23_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:17.16cm" class="radio"><?if ($C24_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:17.16cm" class="radio"><?if ($C24_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:17.16cm" class="radio"><?if ($C24_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:17.38cm" class="radio"><?if ($C25_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:17.38cm" class="radio"><?if ($C25_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:17.38cm" class="radio"><?if ($C25_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:17.59cm" class="radio"><?if ($C26_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:17.59cm" class="radio"><?if ($C26_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:17.59cm" class="radio"><?if ($C26_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:17.81cm" class="radio"><?if ($C27_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:17.81cm" class="radio"><?if ($C27_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:17.81cm" class="radio"><?if ($C27_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:18.03cm" class="radio"><?if ($C28_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:18.03cm" class="radio"><?if ($C28_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:18.03cm" class="radio"><?if ($C28_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:18.25cm" class="radio"><?if ($C29_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:18.25cm" class="radio"><?if ($C29_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:18.25cm" class="radio"><?if ($C29_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:18.47cm" class="radio"><?if ($C30_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:18.47cm" class="radio"><?if ($C30_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:18.47cm" class="radio"><?if ($C30_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:18.69cm" class="radio"><?if ($C31_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:18.69cm" class="radio"><?if ($C31_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:18.69cm" class="radio"><?if ($C31_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:18.91cm" class="radio"><?if ($C32_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:18.91cm" class="radio"><?if ($C32_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:18.91cm" class="radio"><?if ($C32_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:19.13cm" class="radio"><?if ($C33_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:19.13cm" class="radio"><?if ($C33_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:19.13cm" class="radio"><?if ($C33_6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.65cm; top:19.35cm" class="radio"><?if ($C34_6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.00cm; top:19.35cm" class="radio"><?if ($C34_6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:20.40cm; top:19.35cm" class="radio"><?if ($C34_6 == 'NA') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 0.85cm; top:20.32cm"><textarea style="width:9.65cm; height:0.60cm"><?echo substr($observaciones,0,68);?></textarea></div>
	<div style="position:absolute; left:10.83cm; top:20.32cm"><textarea style="width:9.65cm; height:0.60cm"><?echo substr($herramientas,0,68);?></textarea></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 2.93cm; top:21.95cm"><?echo $ejecutorD;?></div>
	<div style="position:absolute; left:10.00cm; top:21.95cm"><?echo $ejecutor_ccD;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:21.95cm"><?echo $ejecutor_fechaD;?></div> -->
	<div style="position:absolute; left:19.20cm; top:21.95cm"><?echo date ("g:i A", strtotime($ejecutor_horaD));?></div>

	<div style="position:absolute; left: 2.93cm; top:22.31cm"><?echo $supervisorD;?></div>
	<div style="position:absolute; left:10.00cm; top:22.31cm"><?echo $supervisor_ccD;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:22.31cm"><?echo $supervisor_fechaD;?></div> -->
	<div style="position:absolute; left:19.20cm; top:22.31cm"><?echo date ("g:i A", strtotime($supervisor_horaD));?></div>

	<div style="position:absolute; left: 2.93cm; top:22.66cm"><?echo $vigiaD;?></div>
	<div style="position:absolute; left:10.00cm; top:22.66cm"><?echo $vigia_ccD;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:22.66cm"><?echo $vigia_fechaD;?></div> -->
	<div style="position:absolute; left:19.20cm; top:22.66cm"><?echo date ("g:i A", strtotime($vigia_horaD));?></div>

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 2.93cm; top:24.27cm"><?echo $emisorE;?></div>
	<div style="position:absolute; left:10.00cm; top:24.27cm"><?echo $emisor_ccE;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:24.27cm"><?echo $emisor_fechaE;?></div> -->
	<div style="position:absolute; left:19.20cm; top:24.27cm"><?echo date ("g:i A", strtotime($emisor_horaE));?></div>

	<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 9.10cm; top:24.95cm" class="radio"><?if ($certificadoF == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:12.50cm; top:24.95cm" class="radio"><?if ($certificadoF == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.90cm; top:24.95cm" class="radio"><?if ($certificadoF == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 2.93cm; top:25.60cm"><?echo $ejecutorF;?></div>
	<div style="position:absolute; left:10.00cm; top:25.60cm"><?echo $ejecutor_ccF;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:25.60cm"><?echo $ejecutor_fechaF;?></div> -->
	<div style="position:absolute; left:19.20cm; top:25.60cm"><?echo date ("g:i A", strtotime($ejecutor_horaF));?></div>

	<div style="position:absolute; left: 2.93cm; top:25.95cm"><?echo $supervisorF;?></div>
	<div style="position:absolute; left:10.00cm; top:25.95cm"><?echo $supervisor_ccF;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:25.95cm"><?echo $supervisor_fechaF;?></div> -->
	<div style="position:absolute; left:19.20cm; top:25.95cm"><?echo date ("g:i A", strtotime($supervisor_horaF));?></div>

	<div style="position:absolute; left: 2.93cm; top:26.65cm"><?echo $emisorF;?></div>
	<div style="position:absolute; left:10.00cm; top:26.65cm"><?echo $emisor_ccF;?></div>
<!--	<div style="position:absolute; left:16.00cm; top:26.65cm"><?echo $emisor_fechaF;?></div> -->
	<div style="position:absolute; left:19.20cm; top:26.65cm"><?echo date ("g:i A", strtotime($emisor_horaF));?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:154.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:212mm; top:240mm">
		<span style="font-family:Arlrdlt; font-size:7px; color:rgba(0,0,0,1); writing-mode:vertical-lr; transform:rotate(0deg)">REVISIÓN FRONT-END: 2024-10</span>
	</div>
	<div style="position:absolute; left:50%; margin-left:-106.0mm; top:70mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
