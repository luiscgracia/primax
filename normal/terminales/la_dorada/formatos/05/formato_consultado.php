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
	<div style="position:absolute; left:18.25cm; top:1.54cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.15cm; top:1.35cm; color:rgba(255,255,255,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:17.70cm; top:2.10cm; color:rgba(255,255,255,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

<!-- ************************ 7.45 *****************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 6.00cm; top: 3.10cm"><?echo substr($descripcion,0,68);?></div>
	<div style="position:absolute; left:11.05cm; top: 3.75cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.35cm; top: 3.75cm"><?echo $nombre1;?></div>
	<div style="position:absolute; left: 1.90cm; top: 4.40cm"><?echo $nombre2;?></div>
	<div style="position:absolute; left: 8.10cm; top: 4.40cm"><?echo $nombre3;?></div>
	<div style="position:absolute; left:14.35cm; top: 4.40cm"><?echo $nombre4;?></div>
	<div style="position:absolute; left: 3.20cm; top: 5.05cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 7.60cm; top: 5.05cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:11.70cm; top: 5.05cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.50cm; top: 5.05cm"><?echo $certhabilit;?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:18.80cm; top: 6.35cm" class="radio"><?if ($B1 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 6.35cm" class="radio"><?if ($B1 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 6.35cm" class="radio"><?if ($B1 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 6.80cm" class="radio"><?if ($B2 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 6.80cm" class="radio"><?if ($B2 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 6.80cm" class="radio"><?if ($B2 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 7.25cm" class="radio"><?if ($B3 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 7.25cm" class="radio"><?if ($B3 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 7.25cm" class="radio"><?if ($B3 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 8.00cm" class="radio"><?if ($B4 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 8.00cm" class="radio"><?if ($B4 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 8.00cm" class="radio"><?if ($B4 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top: 8.45cm" class="radio"><?if ($B5 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 8.45cm" class="radio"><?if ($B5 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 8.45cm" class="radio"><?if ($B5 == 'NA') {echo '&#10006;';}?></div>
<!--	<div style="position:absolute; left: 8.45cm; top: 8.50cm"><?echo substr($indiqueB5a,0,80);?></div> -->
	<div style="position:absolute; left: 2.50cm; top: 8.76cm"><?echo substr($indiqueB5b,0,85);?></div>
	<div style="position:absolute; left:18.80cm; top: 9.20cm" class="radio"><?if ($B6 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 9.20cm" class="radio"><?if ($B6 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 9.20cm" class="radio"><?if ($B6 == 'NA') {echo '&#10006;';}?></div>
<!--	<div style="position:absolute; left: 8.00cm; top: 9.25cm"><?echo substr($indiqueB6a,0,53);?></div> -->
	<div style="position:absolute; left: 2.50cm; top: 9.52cm"><?echo substr($indiqueB6b,0,85);?></div>
	<div style="position:absolute; left:18.80cm; top: 9.95cm" class="radio"><?if ($B7 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top: 9.95cm" class="radio"><?if ($B7 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top: 9.95cm" class="radio"><?if ($B7 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top:10.40cm" class="radio"><?if ($B8 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top:10.40cm" class="radio"><?if ($B8 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top:10.40cm" class="radio"><?if ($B8 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top:10.85cm" class="radio"><?if ($B9 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top:10.85cm" class="radio"><?if ($B9 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top:10.85cm" class="radio"><?if ($B9 == 'NA') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.80cm; top:11.30cm" class="radio"><?if ($B10 == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.30cm; top:11.30cm" class="radio"><?if ($B10 == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:19.80cm; top:11.30cm" class="radio"><?if ($B10 == 'NA') {echo '&#10006;';}?></div>
<!--	<div style="position:absolute; left:10.45cm; top:11.35cm"><?echo substr($especifiqueB10a,0,41);?></div> -->
	<div style="position:absolute; left: 2.50cm; top:11.65cm"><?echo substr($especifiqueB10b,0,85);?></div>

	<div style="position:absolute; left: 1.87cm; top:12.40cm" class="checkbox"><?if ($B11a=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 1.87cm; top:12.85cm" class="checkbox"><?if ($B11b=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 1.87cm; top:13.30cm" class="checkbox"><?if ($B11c=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 4.34cm; top:12.40cm" class="checkbox"><?if ($B11d=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 4.34cm; top:12.85cm" class="checkbox"><?if ($B11e=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 4.34cm; top:13.30cm" class="checkbox"><?if ($B11f=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 8.28cm; top:12.40cm" class="checkbox"><?if ($B11g=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 8.28cm; top:12.85cm" class="checkbox"><?if ($B11h=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 8.28cm; top:13.30cm" class="checkbox"><?if ($B11i=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:10.40cm; top:13.50cm"><?echo substr($guante,0,10);?></div>
	<div style="position:absolute; left:12.52cm; top:12.40cm" class="checkbox"><?if ($B11j=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:14.62cm; top:12.60cm"><?echo substr($calzado,0,10);?></div>
	<div style="position:absolute; left:12.52cm; top:12.85cm" class="checkbox"><?if ($B11k=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:14.62cm; top:13.05cm"><?echo substr($delantal,0,10);?></div>
	<div style="position:absolute; left:12.52cm; top:13.30cm" class="checkbox"><?if ($B11l=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:14.62cm; top:13.50cm"><?echo substr($ropa,0,10);?></div>
	<div style="position:absolute; left:16.77cm; top:12.40cm" class="checkbox"><?if ($B11m=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:17.80cm; top:12.60cm"><?echo substr($otro1,0,10);?></div>
	<div style="position:absolute; left:16.77cm; top:12.85cm" class="checkbox"><?if ($B11n=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:17.80cm; top:13.05cm"><?echo substr($otro2,0,10);?></div>
	<div style="position:absolute; left:16.77cm; top:13.30cm" class="checkbox"><?if ($B11o=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:17.80cm; top:13.50cm"><?echo substr($otro3,0,10);?></div>

	<div style="position:absolute; left: 9.52cm; top:13.82cm" class="radio"><?if ($req_pr_gas == 'SI') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.52cm; top:13.82cm" class="radio"><?if ($req_pr_gas == 'NO') {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.70cm; top:14.30cm"><?echo substr($B12equipo,0,15);?></div>
	<div style="position:absolute; left:10.95cm; top:14.30cm"><?echo substr($B12dueno,0,15);?></div>
	<div style="position:absolute; left:16.60cm; top:14.30cm"><?echo $B12fecha;?></div>
	<div style="position:absolute; left:19.80cm; top:14.12cm" class="checkbox"><?if ($B12bumptest=="on") {echo "&#10004;";}?></div>
	<div style="font-size:8px">
	<div style="position:absolute; left: 4.25cm; top:14.97cm"><?if ($B12hora1	!="")		{echo date ("g:i A", strtotime($B12hora1)); }?></div>
	<div style="position:absolute; left: 5.47cm; top:14.97cm"><?if ($B12resul1 !="")	{echo $B12resul1;}?></div>
	<div style="position:absolute; left: 6.25cm; top:14.97cm"><?if ($B12hora2	!="")		{echo date ("g:i A", strtotime($B12hora2)); }?></div>
	<div style="position:absolute; left: 7.47cm; top:14.97cm"><?if ($B12resul2 !="")	{echo $B12resul2;}?></div>
	<div style="position:absolute; left: 8.25cm; top:14.97cm"><?if ($B12hora3	!="")		{echo date ("g:i A", strtotime($B12hora3)); }?></div>
	<div style="position:absolute; left: 9.47cm; top:14.97cm"><?if ($B12resul3 !="")	{echo $B12resul3;}?></div>
	<div style="position:absolute; left:10.25cm; top:14.97cm"><?if ($B12hora4	!="")		{echo date ("g:i A", strtotime($B12hora4)); }?></div>
	<div style="position:absolute; left:11.47cm; top:14.97cm"><?if ($B12resul4 !="")	{echo $B12resul4;}?></div>
	<div style="position:absolute; left:12.25cm; top:14.97cm"><?if ($B12hora5	!="")		{echo date ("g:i A", strtotime($B12hora5)); }?></div>
	<div style="position:absolute; left:13.47cm; top:14.97cm"><?if ($B12resul5 !="")	{echo $B12resul5;}?></div>
	<div style="position:absolute; left:14.25cm; top:14.97cm"><?if ($B12hora6	!="")		{echo date ("g:i A", strtotime($B12hora6)); }?></div>
	<div style="position:absolute; left:15.47cm; top:14.97cm"><?if ($B12resul6 !="")	{echo $B12resul6;}?></div>
	<div style="position:absolute; left:16.25cm; top:14.97cm"><?if ($B12hora7	!="")		{echo date ("g:i A", strtotime($B12hora7)); }?></div>
	<div style="position:absolute; left:17.47cm; top:14.97cm"><?if ($B12resul7 !="")	{echo $B12resul7;}?></div>
	<div style="position:absolute; left:18.25cm; top:14.97cm"><?if ($B12hora8	!="")		{echo date ("g:i A", strtotime($B12hora8)); }?></div>
	<div style="position:absolute; left:19.47cm; top:14.97cm"><?if ($B12resul8 !="")	{echo $B12resul8;}?></div>
	</div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:17.25cm"><?echo $ejecutorC;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:17.25cm"><?echo $fechaejecC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:17.25cm"><?echo date ("g:i A", strtotime($horaejecC));?></div>

	<div style="position:absolute; left: 3.70cm; top:17.75cm"><?echo $inspectorC;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:17.75cm"><?echo $fechainspC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:17.75cm"><?echo date ("g:i A", strtotime($horainspC));?></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:18.95cm; font-size:10.50px"><?echo substr($emisorD,0,30);?></div>
	<div style="position:absolute; left:10.35cm; top:18.95cm; font-size:10.50px"><?echo substr($nombreemisorD,0,30);?></div>
	<!-- <div style="position:absolute; left:17.70cm; top:18.95cm"><?echo $fechaemisorD;?></div> -->
	<!-- <div style="position:absolute; left:18.70cm; top:18.95cm"><?echo date ("g:i A", strtotime($horaemisorD));?></div> -->

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 8.92cm; top:19.87cm" class="radio"><?if ($cancelacion == 'A') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:12.02cm; top:19.87cm" class="radio"><?if ($cancelacion == 'B') {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.72cm; top:19.87cm" class="radio"><?if ($cancelacion == 'C') {echo '&#10006;';}?></div>

	<div style="position:absolute; left: 3.70cm; top:20.90cm"><?echo $ejecutorE;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:20.90cm"><?echo $fechaejecE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:20.90cm"><?echo date ("g:i A", strtotime($horaejecE));?></div>

	<div style="position:absolute; left: 3.70cm; top:21.40cm"><?echo $inspectorE;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:21.40cm"><?echo $fechainspE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:21.40cm"><?echo date ("g:i A", strtotime($horainspE));?></div>

	<div style="position:absolute; left:3.70cm; top:22.20cm"><?echo $emisorE;?></div>
	<!-- <div style="position:absolute; left:17.70cm; top:22.20cm"><?echo $fechaemisorE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:22.20cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div>

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
