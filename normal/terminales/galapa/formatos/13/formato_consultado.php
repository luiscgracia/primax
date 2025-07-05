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
	div.radio			{font-size:16px}
	div.checkbox	{font-size:18px}
	textarea 			{resize:none; font-family:Arlrdlt; font-size:10px; line-height:164%; ; padding: 5px 5px; text-align:justify; background-color:rgba(255,255,255,1)}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
	document.title = '<? echo strtoupper($terminal); ?> - <? echo $$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 999) {echo "000";} else {if ($consecutivo <= 9999) {echo "00";} else {if ($consecutivo <= 99999) {echo "0";}}}}} echo $consecutivo;?>';
</script>
</head>
<body>
<?php
$tiro = "../../../../../common/formatos_SVG/".$formato."/".$formato."_tiro.svg";
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
	<div style="position:absolute; left:18.00cm; top:0.87cm">
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
	<div style="position:absolute; left: 3.15cm; top: 2.55cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 8.70cm; top: 2.55cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:12.30cm; top: 2.55cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.60cm; top: 2.55cm"><?echo $certhabilit;?></div>
	<div style="position:absolute; left: 3.80cm; top: 2.95cm; font-size:10px"><?echo substr($ubicacion,0,60);?></div>
	<div style="position:absolute; left:18.00cm; top: 2.95cm"><?echo $altura;?></div>
	<div style="position:absolute; left: 4.70cm; top: 3.35cm"><?echo substr($tipo_trabajo,0,100);?></div>
	<div style="position:absolute; left: 6.10cm; top: 3.75cm"><?echo substr($descripcion,0,90);?></div>
	<div style="position:absolute; left:10.20cm; top: 4.15cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left: 2.20cm; top: 4.75cm"><?echo $nombre1;?></div>
	<div style="position:absolute; left:11.80cm; top: 4.75cm"><?echo $cedula1;?></div>
	<div style="position:absolute; left: 2.20cm; top: 5.05cm"><?echo $nombre2;?></div>
	<div style="position:absolute; left:11.80cm; top: 5.05cm"><?echo $cedula2;?></div>
	<div style="position:absolute; left: 2.20cm; top: 5.35cm"><?echo $nombre3;?></div>
	<div style="position:absolute; left:11.80cm; top: 5.35cm"><?echo $cedula3;?></div>
	<div style="position:absolute; left: 2.20cm; top: 5.65cm"><?echo $nombre4;?></div>
	<div style="position:absolute; left:11.80cm; top: 5.65cm"><?echo $cedula4;?></div>
	
<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top: 6.70cm" class="radio"><?if ($B1  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 6.70cm" class="radio"><?if ($B1  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 7.00cm" class="radio"><?if ($B2  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 7.00cm" class="radio"><?if ($B2  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 7.30cm" class="radio"><?if ($B3  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 7.30cm" class="radio"><?if ($B3  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 7.60cm" class="radio"><?if ($B4  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 7.60cm" class="radio"><?if ($B4  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 8.20cm" class="radio"><?if ($B5  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 8.20cm" class="radio"><?if ($B5  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 8.50cm" class="radio"><?if ($B6  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 8.50cm" class="radio"><?if ($B6  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 8.80cm" class="radio"><?if ($B7  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 8.80cm" class="radio"><?if ($B7  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 9.10cm" class="radio"><?if ($B8  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 9.10cm" class="radio"><?if ($B8  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top: 9.70cm" class="radio"><?if ($B9  == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top: 9.70cm" class="radio"><?if ($B9  == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:10.00cm" class="radio"><?if ($B10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:10.00cm" class="radio"><?if ($B10 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:10.30cm" class="radio"><?if ($B11 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:10.30cm" class="radio"><?if ($B11 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:10.60cm" class="radio"><?if ($B12 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:10.60cm" class="radio"><?if ($B12 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:10.90cm" class="radio"><?if ($B13 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:10.90cm" class="radio"><?if ($B13 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:11.20cm" class="radio"><?if ($B14 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:11.20cm" class="radio"><?if ($B14 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:11.80cm" class="radio"><?if ($B15 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:11.80cm" class="radio"><?if ($B15 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:12.10cm" class="radio"><?if ($B16 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:12.10cm" class="radio"><?if ($B16 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:12.40cm" class="radio"><?if ($B17 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:12.40cm" class="radio"><?if ($B17 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:12.70cm" class="radio"><?if ($B18 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:12.70cm" class="radio"><?if ($B18 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:13.00cm" class="radio"><?if ($B19 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:13.00cm" class="radio"><?if ($B19 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:13.30cm" class="radio"><?if ($B20a == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:13.30cm" class="radio"><?if ($B20a == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:14.20cm" class="radio"><?if ($B20b == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:14.20cm" class="radio"><?if ($B20b == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:14.50cm" class="radio"><?if ($B21 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:14.50cm" class="radio"><?if ($B21 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:14.80cm" class="radio"><?if ($B22 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:14.80cm" class="radio"><?if ($B22 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:15.70cm" class="radio"><?if ($B23 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:15.70cm" class="radio"><?if ($B23 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:16.00cm" class="radio"><?if ($B24 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:16.00cm" class="radio"><?if ($B24 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:16.30cm" class="radio"><?if ($B25 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:16.30cm" class="radio"><?if ($B25 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:16.60cm" class="radio"><?if ($B26 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:16.60cm" class="radio"><?if ($B26 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:16.90cm" class="radio"><?if ($B27 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:16.90cm" class="radio"><?if ($B27 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:17.50cm" class="radio"><?if ($B28 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:17.50cm" class="radio"><?if ($B28 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:17.80cm" class="radio"><?if ($B29 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:17.80cm" class="radio"><?if ($B29 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:18.10cm" class="radio"><?if ($B30 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:18.10cm" class="radio"><?if ($B30 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:18.40cm" class="radio"><?if ($B31 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:18.40cm" class="radio"><?if ($B31 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:18.70cm" class="radio"><?if ($B32 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:18.70cm" class="radio"><?if ($B32 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.00cm" class="radio"><?if ($B33 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:19.00cm" class="radio"><?if ($B33 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.30cm" class="radio"><?if ($B34 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:19.30cm" class="radio"><?if ($B34 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.60cm" class="radio"><?if ($B35 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:19.60cm" class="radio"><?if ($B35 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:19.90cm" class="radio"><?if ($B36 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:19.90cm" class="radio"><?if ($B36 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.70cm; top:20.20cm" class="radio"><?if ($B37 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.50cm; top:20.20cm" class="radio"><?if ($B37 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 7.70cm; top:20.70cm"><?echo substr($observaciones,0,80);?></div>
	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:22.10cm"><?echo substr($ejecutorC,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:22.10cm"><?echo $cedulaejecC;?></div>
	<!-- <div style="position:absolute; left:14.20cm; top:22.10cm"><?echo $fechaejecC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:22.10cm"><?echo date ("g:i A", strtotime($horaejecC));?></div>

	<div style="position:absolute; left: 3.70cm; top:22.60cm"><?echo substr($coordinadorC,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:22.60cm"><?echo $cedulacoordC;?></div>
	<!--	<div style="position:absolute; left:14.20cm; top:22.60cm"><?echo $fechacoordC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:22.60cm"><?echo date ("g:i A", strtotime($horacoordC));?></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:24.00cm"><?echo substr($emisorD,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:24.00cm"><?echo $cedulaemisorD;?></div>
	<!-- <div style="position:absolute; left:14.20cm; top:24.00cm"><?echo $fechaemisorD;?></div> -->
	<div style="position:absolute; left:18.70cm; top:24.00cm"><?echo date ("g:i A", strtotime($horaemisorD));?></div>

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 8.87cm; top:24.65cm" class="radio"><?if ($cancelacion == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:12.37cm; top:24.65cm" class="radio"><?if ($cancelacion == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:15.37cm; top:24.65cm" class="radio"><?if ($cancelacion == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 3.70cm; top:25.45cm"><?echo substr($ejecutorE,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:25.45cm"><?echo $cedulaejecE;?></div>
	<!--	<div style="position:absolute; left:14.20cm; top:25.45cm"><?echo $fechaejecE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:25.45cm"><?echo date ("g:i A", strtotime($horaejecE));?></div>

	<div style="position:absolute; left: 3.70cm; top:25.95cm"><?echo substr($coordinadorE,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:25.95cm"><?echo $cedulacoordE;?></div>
	<!--	<div style="position:absolute; left:14.20cm; top:25.95cm"><?echo $fechacoordE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:25.95cm"><?echo date ("g:i A", strtotime($horacoordE));?></div>

	<div style="position:absolute; left: 3.70cm; top:26.65cm"><?echo substr($emisorE,0,30);?></div>
	<div style="position:absolute; left:10.80cm; top:26.65cm"><?echo $cedulaemisorE;?></div>
	<!-- <div style="position:absolute; left:14.20cm; top:26.65cm"><?echo $fechaemisorE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:26.65cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div>

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
