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
	div.radio			{font-size:18px}
	div.checkbox	{font-size:18px}
	textarea 			{resize:none; font-family:Arlrdlt; font-size:12px; line-height:164%; ; padding: 5px 5px; text-align:justify; background-color:rgba(255,255,255,1)}
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
<div style="position:absolute; left:50%; margin-left:-408px; top:	0px; width:816px; height:1056px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0px; top:0px"><img src="<? echo $tiro; ?>" style="width:816px; height:auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.60cm; top:0.87cm">
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
	<div style="position:absolute; left:18.00cm; top:0.78cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

<!-- ************************ 7.45 *****************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 3.05cm; top: 2.23cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 7.35cm; top: 2.23cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:11.45cm; top: 2.23cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.25cm; top: 2.23cm"><?echo $certhabilit;?></div>
	<div style="position:absolute; left: 5.95cm; top: 3.15cm"><?echo substr($descripcion,0,68-18);?></div>
	<div style="position:absolute; left:18.70cm; top: 3.15cm"><?echo $permisodetrabajo;?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:18.75cm; top: 4.12cm" class="radio"><?if ($B1 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.60cm; top: 4.12cm" class="radio"><?if ($B1 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:14.95cm; top: 4.80cm"><?echo substr($B2indique,0,20);?></div>
	<div style="position:absolute; left: 5.97cm; top: 5.02cm" class="checkbox"><?if ($B2a == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left: 5.97cm; top: 5.42cm" class="checkbox"><?if ($B2b == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left: 5.97cm; top: 5.82cm" class="checkbox"><?if ($B2c == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left: 5.97cm; top: 6.22cm" class="checkbox"><?if ($B2d == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:10.02cm; top: 5.02cm" class="checkbox"><?if ($B2e == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:10.02cm; top: 5.42cm" class="checkbox"><?if ($B2f == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:10.02cm; top: 5.82cm" class="checkbox"><?if ($B2g == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:10.02cm; top: 6.22cm" class="checkbox"><?if ($B2h == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:14.07cm; top: 5.02cm" class="checkbox"><?if ($B2i == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:14.07cm; top: 5.42cm" class="checkbox"><?if ($B2j == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:14.07cm; top: 5.82cm" class="checkbox"><?if ($B2k == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:14.07cm; top: 6.22cm" class="checkbox"><?if ($B2l == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:18.12cm; top: 5.02cm" class="checkbox"><?if ($B2m == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:18.12cm; top: 5.42cm" class="checkbox"><?if ($B2n == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:18.12cm; top: 5.82cm" class="checkbox"><?if ($B2o == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:18.12cm; top: 6.22cm" class="checkbox"><?if ($B2p == 'on') {echo '&#10004;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 6.62cm" class="radio"><?if ($B3 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.60cm; top: 6.62cm" class="radio"><?if ($B3 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.75cm; top: 7.12cm" class="radio"><?if ($B4 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.60cm; top: 7.12cm" class="radio"><?if ($B4 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left: 2.50cm; top: 8.30cm"><textarea style="width:17.30cm; height:5.20cm"><?echo $B5;?></textarea></div>
	<div style="position:absolute; left: 1.85cm; top:16.60cm"><?echo substr($Cresponsable1,0,30);?></div>
	<div style="position:absolute; left: 7.85cm; top:16.60cm"><?echo substr($Carea1,0,20);?></div>
	<div style="position:absolute; left:11.95cm; top:16.60cm"><?echo substr($Cdepartamento1,0,20);?></div>
	<div style="position:absolute; left: 1.85cm; top:17.60cm"><?echo substr($Cresponsable2,0,30);?></div>
	<div style="position:absolute; left: 7.85cm; top:17.60cm"><?echo substr($Carea2,0,20);?></div>
	<div style="position:absolute; left:11.95cm; top:17.60cm"><?echo substr($Cdepartamento2,0,20);?></div>
	<div style="position:absolute; left: 1.85cm; top:18.60cm"><?echo substr($Cresponsable3,0,30);?></div>
	<div style="position:absolute; left: 7.85cm; top:18.60cm"><?echo substr($Carea3,0,20);?></div>
	<div style="position:absolute; left:11.95cm; top:18.60cm"><?echo substr($Cdepartamento3,0,20);?></div>
	<div style="position:absolute; left: 1.85cm; top:19.60cm"><?echo substr($Cresponsable4,0,30);?></div>
	<div style="position:absolute; left: 7.85cm; top:19.60cm"><?echo substr($Carea4,0,20);?></div>
	<div style="position:absolute; left:11.95cm; top:19.60cm"><?echo substr($Cdepartamento4,0,20);?></div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.45cm; top:20.45cm"><?echo substr($ejecutorC,0,30-4);?></div>
	<div style="position:absolute; left:10.15cm; top:20.45cm"><?echo substr($nombreejecutorC,0,30-4);?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:20.45cm"><?echo $fechaejecC;?></div> -->
	<!-- <div style="position:absolute; left:18.70cm; top:20.45cm"><?echo date ("g:i A", strtotime($horaejecC));?></div> -->

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.83cm; top:21.32cm" class="radio"><?if ($cancelacion == 'A') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:11.93cm; top:21.32cm" class="radio"><?if ($cancelacion == 'B') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:14.63cm; top:21.32cm" class="radio"><?if ($cancelacion == 'C') {echo '&#10687;';}?></div>
	<div style="position:absolute; left: 3.60cm; top:22.60cm"><?echo substr($comentariosDa,0,90);?></div>
	<div style="position:absolute; left: 1.95cm; top:23.30cm"><?echo substr($comentariosDb,0,100);?></div>

	<div style="position:absolute; left:3.7cm; top:23.80cm"><?echo substr($ejecutorD,0,30);?></div>
	<!--	<div style="position:absolute; left:13.0cm; top:23.80cm"><?echo $fechaejecD;?></div> -->
	<div style="position:absolute; left:18.7cm; top:23.80cm"><?echo date ("g:i A", strtotime($horaejecD));?></div>

	<div style="position:absolute; left:3.7cm; top:24.30cm"><?echo substr($inspectorD,0,30);?></div>
	<!--	<div style="position:absolute; left:13.0cm; top:24.30cm"><?echo $fechainspD;?></div> -->
	<div style="position:absolute; left:18.7cm; top:24.30cm"><?echo date ("g:i A", strtotime($horainspD));?></div>

	<div style="position:absolute; left:3.7cm; top:25.10cm"><?echo substr($emisorD,0,30);?></div>
	<!-- <div style="position:absolute; left:17.7cm; top:25.10cm"><?echo $fechaemisorD;?></div> -->
	<div style="position:absolute; left:18.7cm; top:25.10cm"><?echo date ("g:i A", strtotime($horaemisorD));?></div>

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
	<div style="position:absolute; left:50%; margin-left:-99.0mm; top:150mm; width:5mm; text-align:right; background-color:rgba(250,0,0,0)">
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
