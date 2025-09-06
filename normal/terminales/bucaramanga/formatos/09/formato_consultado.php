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
	textarea 			{min-height:0.50cm; field-sizing:content; resize:none; font-family:Arlrdlt; font-size:12px; text-align:left; padding: 1px 0px; background-color:rgba(255,255,0,0)}
	@media only screen and (min-height:1000px) and (max-height:1500px) {textarea	{font-size:10.20px; background-color:rgba(0,0,255,0.0)}} /*para tablets*/
	@media only screen and (min-height:1501px) and (max-height:2000px) {textarea	{font-size: 5.20px; background-color:rgba(0,255,0,0.0)}} /*para celulares*/
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
	<div style="position:absolute; left: 6.35cm; top:2.95cm"><?echo $descripcion;?></div>
	<div style="position:absolute; left: 1.90cm; top:3.40cm"><textarea style="width:17.85cm; line-height:235%">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?echo $ubicacion1;?> <?echo $ubicacion2;?> <?echo $ubicacion3;?></textarea></div>
	<div style="position:absolute; left:18.05cm; top:4.88cm; width:1.20cm; text-align:center"><?echo $profundidad;?></div>

	<div style="position:absolute; left:11.35cm; top:5.55cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.30cm; top:5.55cm"><?echo $nombre1;?></div>
	<div style="position:absolute; left: 2.10cm; top:6.20cm"><?echo $nombre2;?></div>
	<div style="position:absolute; left: 8.20cm; top:6.20cm"><?echo $nombre3;?></div>
	<div style="position:absolute; left:14.35cm; top:6.20cm"><?echo $nombre4;?></div>

	<div style="position:absolute; left:11.50cm; top:6.85cm"><?echo $certhabilit;?></div>
	<div style="position:absolute; left:18.30cm; top:6.85cm"><?echo $fechaA;?></div>

	<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 8.89cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B2;?></div>
	<div style="position:absolute; left:10.46cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B3;?></div>
	<div style="position:absolute; left:12.03cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B4;?></div>
	<div style="position:absolute; left:13.60cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B5;?></div>
	<div style="position:absolute; left:15.17cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B6;?></div>
	<div style="position:absolute; left:16.74cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B7;?></div>
	<div style="position:absolute; left:18.31cm; top:7.77cm; width:1.50cm; text-align:center; background-color:none"><?echo $B8;?></div>

	<div style="position:absolute; left: 8.89cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B9;?></div>
	<div style="position:absolute; left:10.46cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B10;?></div>
	<div style="position:absolute; left:12.03cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B11;?></div>
	<div style="position:absolute; left:13.60cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B12;?></div>
	<div style="position:absolute; left:15.17cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B13;?></div>
	<div style="position:absolute; left:16.74cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B14;?></div>
	<div style="position:absolute; left:18.31cm; top:8.27cm; width:1.50cm; text-align:center; background-color:none"><?echo $B15;?></div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left:17.95cm; top: 9.85cm" class="radio"><?if ($C1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 9.85cm" class="radio"><?if ($C1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top: 9.85cm" class="radio"><?if ($C1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:10.25cm" class="radio"><?if ($C2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:10.25cm" class="radio"><?if ($C2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:10.25cm" class="radio"><?if ($C2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:10.65cm" class="radio"><?if ($C3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:10.65cm" class="radio"><?if ($C3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:10.65cm" class="radio"><?if ($C3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:11.05cm" class="radio"><?if ($C4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:11.05cm" class="radio"><?if ($C4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:11.05cm" class="radio"><?if ($C4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:11.45cm" class="radio"><?if ($C5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:11.45cm" class="radio"><?if ($C5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:11.45cm" class="radio"><?if ($C5 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:12.85cm" class="radio"><?if ($C6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:12.85cm" class="radio"><?if ($C6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:12.85cm" class="radio"><?if ($C6 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.90cm; top:13.35cm"><?echo $C7a;?></div>
	<div style="position:absolute; left:17.95cm; top:13.23cm" class="radio"><?if ($C7 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:13.23cm" class="radio"><?if ($C7 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:13.23cm" class="radio"><?if ($C7 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.90cm; top:13.73cm"><?echo $C8a;?></div>
	<div style="position:absolute; left:17.95cm; top:13.61cm" class="radio"><?if ($C8 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:13.61cm" class="radio"><?if ($C8 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:13.61cm" class="radio"><?if ($C8 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:13.99cm" class="radio"><?if ($C9 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:13.99cm" class="radio"><?if ($C9 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:13.99cm" class="radio"><?if ($C9 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:17.95cm; top:14.37cm" class="radio"><?if ($C10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:14.37cm" class="radio"><?if ($C10 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:14.37cm" class="radio"><?if ($C10 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 9.70cm; top:14.88cm"><?echo $C11a;?></div>
	<div style="position:absolute; left:17.95cm; top:14.75cm" class="radio"><?if ($C11 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.75cm; top:14.75cm" class="radio"><?if ($C11 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.55cm; top:14.75cm" class="radio"><?if ($C11 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 1.90cm; top:16.10cm"><textarea style="width:17.85cm; line-height:200%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?echo $requisitos1;?> <?echo $requisitos2;?> <?echo $requisitos3;?> <?echo $requisitos4;?></textarea></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:19.65cm; font-size:11px"><?echo $ejecutorD;?></div>
	<div style="position:absolute; left:10.50cm; top:19.65cm; font-size:11px"><?echo $nombreejecutorD;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:21.05cm"><?echo $fechaejecD;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:21.05cm"><?echo date ("g:i A", strtotime($horaejecD));?></div> -->

	<div style="position:absolute; left: 3.70cm; top:20.30cm; font-size:11px"><?echo $inspectorD;?></div>
	<div style="position:absolute; left:10.50cm; top:20.30cm; font-size:11px"><?echo $nombreinspD;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:21.55cm"><?echo $fechainspD;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:21.55cm"><?echo date ("g:i A", strtotime($horainspD));?></div> -->
	
	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:22.10cm; font-size:11px"><?echo $emisorE;?></div>
	<div style="position:absolute; left:10.50cm; top:22.10cm; font-size:11px"><?echo $nombreemisorE;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:22.95cm"><?echo $fechaemisorE;?></div> -->
	<!-- <div style="position:absolute; left:18.65cm; top:22.95cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div> -->

	<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 3.05cm; top:23.40cm"><?echo $notas_cancelacion;?></div>

	<div style="position:absolute; left: 3.70cm; top:24.00cm"><?echo $ejecutorF;?></div>
	<div style="position:absolute; left:15.75cm; top:24.00cm"><?echo $fechaejecF;?></div>
	<div style="position:absolute; left:18.80cm; top:24.00cm"><?echo date ("g:i A", strtotime($horaejecF));?></div>

	<div style="position:absolute; left: 3.70cm; top:24.60cm"><?echo $inspectorF;?></div>
	<div style="position:absolute; left:15.75cm; top:24.60cm"><?echo $fechainspF;?></div>
	<div style="position:absolute; left:18.80cm; top:24.60cm"><?echo date ("g:i A", strtotime($horainspF));?></div>

	<div style="position:absolute; left: 3.70cm; top:25.65cm"><?echo $emisorF;?></div>
	<div style="position:absolute; left:15.75cm; top:25.65cm"><?echo $fechaemisorF;?></div>
	<div style="position:absolute; left:18.80cm; top:25.65cm"><?echo date ("g:i A", strtotime($horaemisorF));?></div>

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
	<div style="position:absolute; left:50%; margin-left:-100.0mm; top:100mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
