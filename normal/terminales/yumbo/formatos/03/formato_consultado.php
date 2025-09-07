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
	div.checkbox1	{font-size:13px}
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
<div style="position:absolute; left:50%; margin-left:-408px; top:	 0px; width:816px; height:1056px">
	<div style="position:absolute; left:40%; top:1mm; z-index:9" class="noimprimir">
		<a href="https://web.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
		&text=<? if ($hoy <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy consultando el formato <? echo $formato; ?>." target="_blank">
		<img src="../../../../../common/imagenes/whatsapp.png" style="pointer-events:auto" width="25px" height="auto" title="Comunicarse por Whatsapp"></a>
	</div>
	<div style="position:absolute; left:0mm; top:0px"><img src="<? echo $tiro; ?>" style="width:816px; height:auto"></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style="position:absolute; left:18.35cm; top:1.53cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;} else {echo "&#8470; ".$consecutivo;}}}}}	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.15cm; top:1.35cm; color:rgba(255,255,255,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
<!--	<div style="position:absolute; left:18.15cm; top:1.36cm; color:rgba(255,255,255,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo strtoupper($terminal);?></span></div>-->
	<div style="position:absolute; left:17.70cm; top:2.10cm; color:rgba(255,255,255,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?></span></div>

<!-- ************************ 7.45 *****************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 6.00cm; top: 3.20cm"><?echo substr($descripcion,0,68);?></div>
	<div style="position:absolute; left:11.35cm; top: 4.00cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.35cm; top: 4.00cm"><?echo substr($nombre1,0,30);?></div>
	<div style="position:absolute; left: 1.90cm; top: 4.80cm"><?echo substr($nombre2,0,30);?></div>
	<div style="position:absolute; left: 8.10cm; top: 4.80cm"><?echo substr($nombre3,0,30);?></div>
	<div style="position:absolute; left:14.35cm; top: 4.80cm"><?echo substr($nombre4,0,30);?></div>
	<div style="position:absolute; left: 3.20cm; top: 5.60cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left: 7.60cm; top: 5.60cm"><?echo date ("g:i A", strtotime($horainicialA));?></div>
	<div style="position:absolute; left:11.80cm; top: 5.60cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left:18.80cm; top: 5.60cm"><?echo $certhabilit;?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:18.55cm; top: 6.60cm" class="radio"><?if ($B1 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 6.60cm" class="radio"><?if ($B1 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 6.60cm" class="radio"><?if ($B1 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top: 7.05cm" class="radio"><?if ($B2 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 7.05cm" class="radio"><?if ($B2 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 7.05cm" class="radio"><?if ($B2 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top: 7.55cm" class="radio"><?if ($B3 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 7.55cm" class="radio"><?if ($B3 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 7.55cm" class="radio"><?if ($B3 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top: 8.00cm" class="radio"><?if ($B4 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 8.00cm" class="radio"><?if ($B4 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 8.00cm" class="radio"><?if ($B4 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top: 9.00cm" class="radio"><?if ($B5 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 9.00cm" class="radio"><?if ($B5 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 9.00cm" class="radio"><?if ($B5 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top: 9.97cm" class="radio"><?if ($B6 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top: 9.97cm" class="radio"><?if ($B6 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top: 9.97cm" class="radio"><?if ($B6 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top:10.45cm" class="radio"><?if ($B7 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top:10.45cm" class="radio"><?if ($B7 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top:10.45cm" class="radio"><?if ($B7 == 'NA') {echo '&#10687;';}?></div>
<!--	<div style="position:absolute; left: 8.60cm; top:10.60cm"><?echo substr($indiqueB7a,0,49);?></div> -->
	<div style="position:absolute; left: 2.50cm; top:11.10cm"><?echo substr($indiqueB7b,0,85);?></div>
	<div style="position:absolute; left:18.55cm; top:11.43cm" class="radio"><?if ($B8 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top:11.43cm" class="radio"><?if ($B8 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top:11.43cm" class="radio"><?if ($B8 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top:11.92cm" class="radio"><?if ($B9 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top:11.92cm" class="radio"><?if ($B9 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top:11.92cm" class="radio"><?if ($B9 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top:12.41cm" class="radio"><?if ($B10 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top:12.41cm" class="radio"><?if ($B10 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top:12.41cm" class="radio"><?if ($B10 == 'NA') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:18.55cm; top:12.85cm" class="radio"><?if ($B11 == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.20cm; top:12.85cm" class="radio"><?if ($B11 == 'NO') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:19.90cm; top:12.85cm" class="radio"><?if ($B11 == 'NA') {echo '&#10687;';}?></div>
<!--	<div style="position:absolute; left:11.35cm; top:13.05cm"><?echo substr($especifiqueB11a,0,35);?></div> -->
	<div style="position:absolute; left: 2.50cm; top:13.55cm"><?echo substr($especifiqueB11b,0,85);?></div>

	<div style="position:absolute; left: 1.87cm; top:14.25cm" class="checkbox"><?if ($B12a=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 1.87cm; top:14.64cm" class="checkbox"><?if ($B12b=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 1.87cm; top:15.02cm" class="checkbox"><?if ($B12c=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 5.38cm; top:14.25cm" class="checkbox"><?if ($B12d=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 5.38cm; top:14.64cm" class="checkbox"><?if ($B12e=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 5.38cm; top:15.02cm" class="checkbox"><?if ($B12f=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 9.09cm; top:14.25cm" class="checkbox"><?if ($B12g=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 9.09cm; top:14.64cm" class="checkbox"><?if ($B12h=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left: 9.09cm; top:15.02cm" class="checkbox"><?if ($B12i=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:11.10cm; top:15.21cm"><?echo substr($guante,0,10);?></div>
	<div style="position:absolute; left:13.20cm; top:14.25cm" class="checkbox"><?if ($B12j=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:15.20cm; top:14.45cm"><?echo substr($calzado,0,10);?></div>
	<div style="position:absolute; left:13.20cm; top:14.64cm" class="checkbox"><?if ($B12k=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:15.20cm; top:14.82cm"><?echo substr($delantal,0,10);?></div>
	<div style="position:absolute; left:13.20cm; top:15.02cm" class="checkbox"><?if ($B12l=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:15.20cm; top:15.21cm"><?echo substr($ropa,0,10);?></div>
	<div style="position:absolute; left:17.31cm; top:14.25cm" class="checkbox"><?if ($B12m=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:18.30cm; top:14.45cm"><?echo substr($otro1,0,10);?></div>
	<div style="position:absolute; left:17.31cm; top:14.64cm" class="checkbox"><?if ($B12n=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:18.30cm; top:14.82cm"><?echo substr($otro2,0,10);?></div>
	<div style="position:absolute; left:17.31cm; top:15.02cm" class="checkbox"><?if ($B12o=="on") {echo "&#10004;";}?></div>
	<div style="position:absolute; left:18.30cm; top:15.21cm"><?echo substr($otro3,0,10);?></div>

	<div style="position:absolute; left: 8.90cm; top:15.47cm" class="radio"><?if ($req_pr_gas == 'SI') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:11.05cm; top:15.47cm" class="radio"><?if ($req_pr_gas == 'NO') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 6.72cm; top:16.10cm"><?echo substr($B13equipo,0,15);?></div>
	<div style="position:absolute; left:10.95cm; top:16.10cm"><?echo substr($B13dueno,0,15);?></div>
	<div style="position:absolute; left:16.70cm; top:16.10cm"><?echo $B13fecha;?></div>
	<div style="position:absolute; left:19.95cm; top:15.95cm" class="checkbox"><?if ($B13bumptest=="on") {echo "&#10004;";}?></div>

	<div style="font-size:7.50px">
	<div style="position:absolute; left: 4.65cm; top:16.90cm"><?if ($B13hora1 !="") {echo date ("h:i A", strtotime($B13hora1)); }?></div>
	<div style="position:absolute; left: 6.32cm; top:16.81cm" class="checkbox1"><?if ($B13resul1!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 6.62cm; top:16.90cm"><?if ($B13hora2 !="") {echo date ("h:i A", strtotime($B13hora2)); }?></div>
	<div style="position:absolute; left: 8.29cm; top:16.81cm" class="checkbox1"><?if ($B13resul2!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left: 8.59cm; top:16.90cm"><?if ($B13hora3 !="") {echo date ("h:i A", strtotime($B13hora3)); }?></div>
	<div style="position:absolute; left:10.26cm; top:16.81cm" class="checkbox1"><?if ($B13resul3!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left:10.56cm; top:16.90cm"><?if ($B13hora4 !="") {echo date ("h:i A", strtotime($B13hora4)); }?></div>
	<div style="position:absolute; left:12.23cm; top:16.81cm" class="checkbox1"><?if ($B13resul4!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left:12.53cm; top:16.90cm"><?if ($B13hora5 !="") {echo date ("h:i A", strtotime($B13hora5)); }?></div>
	<div style="position:absolute; left:14.20cm; top:16.81cm" class="checkbox1"><?if ($B13resul5!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left:14.50cm; top:16.90cm"><?if ($B13hora6 !="") {echo date ("h:i A", strtotime($B13hora6)); }?></div>
	<div style="position:absolute; left:16.17cm; top:16.81cm" class="checkbox1"><?if ($B13resul6!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left:16.47cm; top:16.90cm"><?if ($B13hora7 !="") {echo date ("h:i A", strtotime($B13hora7)); }?></div>
	<div style="position:absolute; left:18.14cm; top:16.81cm" class="checkbox1"><?if ($B13resul7!="") {echo '&#10006;';}?></div>
	<div style="position:absolute; left:18.44cm; top:16.90cm"><?if ($B13hora8 !="") {echo date ("h:i A", strtotime($B13hora8)); }?></div>
	<div style="position:absolute; left:20.11cm; top:16.81cm" class="checkbox1"><?if ($B13resul8!="") {echo '&#10006;';}?></div>
	</div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:19.02cm"><?echo $ejecutorC;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:19.02cm"><?echo $fechaejecC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:19.02cm"><?echo date ("g:i A", strtotime($horaejecC));?></div>

	<div style="position:absolute; left: 3.70cm; top:19.60cm"><?echo $inspectorC;?></div>
	<!-- <div style="position:absolute; left:13.00cm; top:19.60cm"><?echo $fechainspC;?></div> -->
	<div style="position:absolute; left:18.70cm; top:19.60cm"><?echo date ("g:i A", strtotime($horainspC));?></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 3.70cm; top:20.90cm"><?echo substr($emisorD,0,30-4);?></div>
	<div style="position:absolute; left:10.35cm; top:20.90cm"><?echo substr($nombreemisorD,0,30-4);;?></div>
	<!-- <div style="position:absolute; left:17.70cm; top:20.90cm"><?echo $fechaemisorD;?></div> -->
	<!-- <div style="position:absolute; left:18.70cm; top:20.90cm"><?echo date ("g:i A", strtotime($horaemisorD));?></div> -->

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 9.06cm; top:21.97cm" class="radio"><?if ($cancelacion == 'A') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:12.45cm; top:21.97cm" class="radio"><?if ($cancelacion == 'B') {echo '&#10687;';}?></div>
	<div style="position:absolute; left:15.47cm; top:21.97cm" class="radio"><?if ($cancelacion == 'C') {echo '&#10687;';}?></div>

	<div style="position:absolute; left: 3.70cm; top:23.02cm"><?echo $ejecutorE;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:23.02cm"><?echo $fechaejecE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:23.02cm"><?echo date ("g:i A", strtotime($horaejecE));?></div>

	<div style="position:absolute; left: 3.70cm; top:23.62cm"><?echo $inspectorE;?></div>
	<!--	<div style="position:absolute; left:13.00cm; top:23.62cm"><?echo $fechainspE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:23.62cm"><?echo date ("g:i A", strtotime($horainspE));?></div>

	<div style="position:absolute; left: 3.70cm; top:24.50cm"><?echo $emisorE;?></div>
	<!-- <div style="position:absolute; left:17.70cm; top:24.50cm"><?echo $fechaemisorE;?></div> -->
	<div style="position:absolute; left:18.70cm; top:24.50cm"><?echo date ("g:i A", strtotime($horaemisorE));?></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style="position:absolute; left:20mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1); background-color:rgba(255,255,255,0)">Fecha diligenciamiento: <?echo $fecha;?></span>
	</div>
	<div style="position:absolute; left:154.5mm; top:271mm">
		<span style="font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)">Fecha consulta / impresión: <?echo date("Y-m-d / g:i A");?></span>
	</div>
	<div style="position:absolute; left:208mm; top:240mm">
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
