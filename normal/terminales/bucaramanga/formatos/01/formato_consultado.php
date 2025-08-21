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
	div.radio			{font-size:11px}
	div.checkbox	{font-size:15px}
	div.checkbox1	{font-size:10px}
</style>
<script>
	function closed() {window.open('','_parent',''); window.close();}
	document.title = '<? echo strtoupper($terminal); ?> - <? echo $$formulario; ?> #<? if ($consecutivo <= 9) {echo "00000";} else {if ($consecutivo <= 99) {echo "0000";} else {if ($consecutivo <= 99) {echo "000";} else {if ($consecutivo <= 99) {echo "00";} else {if ($consecutivo <= 999) {echo "0";}}}}} echo $consecutivo;?>';
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
	<div style="position:absolute; left:18.00cm; top:0.87cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	echo "&#8470;&nbsp;";
				if ($consecutivo <= 9) {echo "00000";}
					else {if ($consecutivo <= 99) {echo "0000";}
						else {if ($consecutivo <= 999) {echo "000";}
							else {if ($consecutivo <= 9999) {echo "00";}
								else {if ($consecutivo <= 99999) {echo "0";}}}}}
				echo $consecutivo;	?>
		</span>
	</div>

	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>
	<div style="position:absolute; left:18.00cm; top:0.77cm; color:rgba(0,0,0,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo $estado;?></span></div>
<!--	<div style="position:absolute; left:18.00cm; top:1.50cm; color:rgba(0,0,0,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo strtoupper($terminal);?></span></div>-->
	<div style="position:absolute; left:18.00cm; top:1.35cm; color:rgba(0,0,0,1)"><span style="font-size:7px; font-family:Arlrdbd"><?echo $usuario;?>@primax.com.co</span></div>

	<div style="position:absolute; left: 3.40cm; top:2.30cm"><?echo substr($instalacion,0,68);?></div>
	<div style="position:absolute; left:19.05cm; top:2.30cm"><?echo $certificado;?></div>

	<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 3.10cm; top: 3.14cm"><?echo substr($ubicacion,0,63);?></div>
	<div style="position:absolute; left:19.05cm; top: 3.14cm"><?echo $apt;?></div>
	<div style="position:absolute; left: 3.80cm; top: 3.46cm"><?echo $equipo;?></div>
	<div style="position:absolute; left: 9.30cm; top: 3.46cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left:14.25cm; top: 3.46cm"><?echo date ("g:i A", strtotime($horainicioA));?></div>
	<div style="position:absolute; left:18.55cm; top: 3.46cm"><?echo date ("g:i A", strtotime($horafinalA));?></div>
	<div style="position:absolute; left: 5.45cm; top: 3.79cm"><?echo substr($descripcion,0,74);?></div>

	<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left:12.45cm; top: 4.64cm" class="radio"><?if ($cambio == 'CME') {echo $radio;}?></div>
	<div style="position:absolute; left:12.45cm; top: 4.96cm" class="radio"><?if ($cambio == 'CDE') {echo $radio;}?></div>
	<div style="position:absolute; left:17.05cm; top: 5.04cm"><?if ($cambio == 'CDE') {echo $pedidocambio;}?></div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 9.78cm; top: 6.12cm" class="radio"><?if ( $C1 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 6.12cm" class="radio"><?if ( $C1 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 6.42cm" class="radio"><?if ( $C2 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 6.42cm" class="radio"><?if ( $C2 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 6.72cm" class="radio"><?if ( $C3 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 6.72cm" class="radio"><?if ( $C3 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 7.02cm" class="radio"><?if ( $C4 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 7.02cm" class="radio"><?if ( $C4 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 7.32cm" class="radio"><?if ( $C5 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 7.32cm" class="radio"><?if ( $C5 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 7.62cm" class="radio"><?if ( $C6 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 7.62cm" class="radio"><?if ( $C6 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 7.92cm" class="radio"><?if ( $C7 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 7.92cm" class="radio"><?if ( $C7 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 8.22cm" class="radio"><?if ( $C8 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 8.22cm" class="radio"><?if ( $C8 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 8.52cm" class="radio"><?if ( $C9 == 'SI')	{echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 8.52cm" class="radio"><?if ( $C9 == 'NO')	{echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 8.82cm" class="radio"><?if ($C10 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 8.82cm" class="radio"><?if ($C10 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 9.12cm" class="radio"><?if ($C11 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 9.12cm" class="radio"><?if ($C11 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 9.42cm" class="radio"><?if ($C12 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 9.42cm" class="radio"><?if ($C12 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top: 9.72cm" class="radio"><?if ($C13 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top: 9.72cm" class="radio"><?if ($C13 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top:10.02cm" class="radio"><?if ($C14 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:10.02cm" class="radio"><?if ($C14 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top:10.32cm" class="radio"><?if ($C15 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:10.32cm" class="radio"><?if ($C15 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top:10.62cm" class="radio"><?if ($C16 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:10.62cm" class="radio"><?if ($C16 == 'NO') {echo $radio;}?></div>
				<!-- **************************************			 sección EXCAVACION			 ************************************** -->
	<div style="position:absolute; left: 9.78cm; top:11.22cm" class="radio"><?if ($C17 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:11.22cm" class="radio"><?if ($C17 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top:11.52cm" class="radio"><?if ($C18 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:11.52cm" class="radio"><?if ($C18 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 9.78cm; top:11.82cm" class="radio"><?if ($C19 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.38cm; top:11.82cm" class="radio"><?if ($C19 == 'NO') {echo $radio;}?></div>
				<!-- ********************************			 cambio de columna de preguntas			 ******************************** -->
				<!-- ********************************			 sección SUSTANCIAS PELIGROSAS			 ******************************** -->
	<div style="position:absolute; left:19.08cm; top: 6.42cm" class="radio"><?if ($C20 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 6.42cm" class="radio"><?if ($C20 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 6.72cm" class="radio"><?if ($C21 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 6.72cm" class="radio"><?if ($C21 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 7.02cm" class="radio"><?if ($C22 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 7.02cm" class="radio"><?if ($C22 == 'NO') {echo $radio;}?></div>
				<!-- ********************************			 sección FUENTES DE IGNICIÓN				 ******************************** -->
	<div style="position:absolute; left:19.08cm; top: 7.62cm" class="radio"><?if ($C23 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 7.62cm" class="radio"><?if ($C23 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 7.92cm" class="radio"><?if ($C24 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 7.92cm" class="radio"><?if ($C24 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 8.22cm" class="radio"><?if ($C25 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 8.22cm" class="radio"><?if ($C25 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 8.52cm" class="radio"><?if ($C26 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 8.52cm" class="radio"><?if ($C26 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 8.82cm" class="radio"><?if ($C27 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 8.82cm" class="radio"><?if ($C27 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top: 9.12cm" class="radio"><?if ($C28 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 9.12cm" class="radio"><?if ($C28 == 'NO') {echo $radio;}?></div>
				<!-- ********************************			  sección ENERGÍAS PELIGROSAS				 ******************************** -->
	<div style="position:absolute; left:19.08cm; top: 9.72cm" class="radio"><?if ($C29 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top: 9.72cm" class="radio"><?if ($C29 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:10.02cm" class="radio"><?if ($C30 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:10.02cm" class="radio"><?if ($C30 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:10.32cm" class="radio"><?if ($C31 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:10.32cm" class="radio"><?if ($C31 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:10.62cm" class="radio"><?if ($C32 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:10.62cm" class="radio"><?if ($C32 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:10.92cm" class="radio"><?if ($C33 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:10.92cm" class="radio"><?if ($C33 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:11.22cm" class="radio"><?if ($C34 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:11.22cm" class="radio"><?if ($C34 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:11.52cm" class="radio"><?if ($C35 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:11.52cm" class="radio"><?if ($C35 == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:19.08cm; top:12.12cm" class="radio"><?if ($C36 == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:19.68cm; top:12.12cm" class="radio"><?if ($C36 == 'NO') {echo $radio;}?></div>

	<div style="position:absolute; left: 7.65cm; top:12.60cm"><?echo substr($otrasactividades,0,63);?></div>
	
	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 8.70cm; top:13.85cm" class="checkbox"><?if ( $D1=='on') {echo $check;}?></div>
	<div style="position:absolute; left: 8.70cm; top:14.15cm" class="checkbox"><?if ( $D2=='on') {echo $check;}?></div>
	<div style="position:absolute; left: 8.70cm; top:14.45cm" class="checkbox"><?if ( $D3=='on') {echo $check;}?></div>
	<div style="position:absolute; left: 8.70cm; top:14.75cm" class="checkbox"><?if ( $D4=='on') {echo $check;}?></div>
	<div style="position:absolute; left: 8.70cm; top:15.05cm" class="checkbox"><?if ( $D5=='on') {echo $check;}?></div>
	<div style="position:absolute; left: 8.70cm; top:15.35cm" class="checkbox"><?if ( $D6=='on') {echo $check;}?></div>
				<!-- ********************************			 cambio de columna de preguntas			 ******************************** -->
	<div style="position:absolute; left:17.68cm; top:13.85cm" class="checkbox"><?if ( $D7=='on') {echo $check;}?></div>
	<div style="position:absolute; left:17.68cm; top:14.15cm" class="checkbox"><?if ( $D8=='on') {echo $check;}?></div>
	<div style="position:absolute; left:17.68cm; top:14.45cm" class="checkbox"><?if ( $D9=='on') {echo $check;}?></div>
	<div style="position:absolute; left:17.68cm; top:14.75cm" class="checkbox"><?if ($D10=='on') {echo $check;}?></div>
	<div style="position:absolute; left:17.68cm; top:15.05cm" class="checkbox"><?if ($D11=='on') {echo $check;}?></div>
	<div style="position:absolute; left:17.68cm; top:15.35cm" class="checkbox"><?if ($D12=='on') {echo $check;}?></div>

	<div style="position:absolute; left: 9.45cm; top:13.97cm" class="checkbox1"><?if ( $D1=='on')	{echo $numeroD1;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.27cm" class="checkbox1"><?if ( $D2=='on')	{echo $numeroD2;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.57cm" class="checkbox1"><?if ( $D3=='on')	{echo $numeroD3;}?></div>
	<div style="position:absolute; left: 9.45cm; top:14.87cm" class="checkbox1"><?if ( $D4=='on')	{echo $numeroD4;}?></div>
	<div style="position:absolute; left: 9.45cm; top:15.17cm" class="checkbox1"><?if ( $D5=='on')	{echo $numeroD5;}?></div>
	<div style="position:absolute; left: 9.45cm; top:15.47cm" class="checkbox1"><?if ( $D6=='on')	{echo $numeroD6;}?></div>
				<!-- ********************************			 cambio de columna de preguntas			 ******************************** -->
	<div style="position:absolute; left:18.45cm; top:13.97cm" class="checkbox1"><?if ( $D7=='on')	{echo $numeroD7;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.27cm" class="checkbox1"><?if ( $D8=='on')	{echo $numeroD8;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.57cm" class="checkbox1"><?if ( $D9=='on')	{echo $numeroD9;}?></div>
	<div style="position:absolute; left:18.45cm; top:14.87cm" class="checkbox1"><?if ($D10=='on') {echo $numeroD10;}?></div>
	<div style="position:absolute; left:18.45cm; top:15.17cm" class="checkbox1"><?if ($D11=='on') {echo $numeroD11;}?></div>
	<div style="position:absolute; left:18.45cm; top:15.47cm" class="checkbox1"><?if ($D12=='on') {echo $numeroD12;}?></div>

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left: 1.95cm; top:16.42cm"><?echo substr($precauciones,0,90);?></div>

	<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left: 3.73cm; top:17.85cm" class="radio"><?if ($empleado == 'E')  {echo $radio;}?></div>
	<div style="position:absolute; left: 9.98cm; top:17.85cm" class="radio"><?if ($empleado == 'CP') {echo $radio;}?></div>
	<div style="position:absolute; left:12.30cm; top:18.00cm"><?if ($empleado == 'CP') {echo $companiacp;}?></div>
	<div style="position:absolute; left: 3.45cm; top:18.50cm"><?echo substr($ejecutorF,0,30);?></div>
	<div style="position:absolute; left:15.70cm; top:18.50cm"><?echo $fechaejecF;?></div>
	<div style="position:absolute; left:18.70cm; top:18.50cm"><?echo date ("g:i A", strtotime($horaejecF));?></div>
	<div style="position:absolute; left: 3.45cm; top:18.90cm"><?echo substr($inspectorF,0,30);?></div>
	<div style="position:absolute; left:15.70cm; top:18.90cm"><?echo $fechainspF;?></div>
	<div style="position:absolute; left:18.70cm; top:18.90cm"><?echo date ("g:i A", strtotime($horainspF));?></div>

	<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left: 2.02cm; top:19.65cm" class="radio"><?if ($docum_adic == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left: 2.02cm; top:19.98cm" class="radio"><?if ($docum_adic == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left:10.40cm; top:20.25cm"><?echo $cantidad;?></div>
	<div style="position:absolute; left:14.25cm; top:20.25cm"><?echo substr($nombre1,0,30);?></div>
	<div style="position:absolute; left: 2.05cm; top:20.70cm"><?echo substr($nombre2,0,30);?></div>
	<div style="position:absolute; left: 8.15cm; top:20.70cm"><?echo substr($nombre3,0,30);?></div>
	<div style="position:absolute; left:14.25cm; top:20.70cm"><?echo substr($nombre4,0,30);?></div>
	<div style="position:absolute; left: 2.05cm; top:21.15cm"><?echo substr($nombre5,0,30);?></div>
	<div style="position:absolute; left: 8.15cm; top:21.15cm"><?echo substr($nombre6,0,30);?></div>
	<div style="position:absolute; left:14.25cm; top:21.15cm"><?echo substr($nombre7,0,30);?></div>
	<div style="position:absolute; left: 3.45cm; top:21.60cm"><?echo substr($aprobadorG,0,30);?></div>
	<div style="position:absolute; left:15.70cm; top:21.60cm"><?echo $fechaaprobG;?></div>
	<div style="position:absolute; left:18.70cm; top:21.60cm"><?echo date ("g:i A", strtotime($horaaprobG));?></div>
	<div style="position:absolute; left: 3.45cm; top:22.05cm"><?echo substr($emisorG,0,30);?></div>
	<div style="position:absolute; left:15.70cm; top:22.05cm"><?echo $fechaemisorG;?></div>
	<div style="position:absolute; left:18.70cm; top:22.05cm"><?echo date ("g:i A", strtotime($horaemisorG));?></div>

	<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left: 6.87cm; top:22.81cm" class="radio"><?if ($completado == 'SI') {echo $radio;}?></div>
	<div style="position:absolute; left:10.27cm; top:22.81cm" class="radio"><?if ($completado == 'NO') {echo $radio;}?></div>
	<div style="position:absolute; left: 3.45cm; top:23.33cm"><?echo substr($ejecutorH,0,30);?></div>
	<div style="position:absolute; left:18.70cm; top:23.33cm"><?echo date ("g:i A", strtotime($horaejecH));?></div>
	<div style="position:absolute; left: 3.45cm; top:23.78cm"><?echo substr($inspectorH,0,30);?></div>
	<div style="position:absolute; left:18.70cm; top:23.78cm"><?echo date ("g:i A", strtotime($horainspH));?></div>
	<div style="position:absolute; left: 3.45cm; top:24.68cm"><?echo substr($emisorH,0,30);?></div>
	<div style="position:absolute; left:18.70cm; top:24.68cm"><?echo date ("g:i A", strtotime($horaemisorH));?></div>

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
	<div style="position:absolute; left:50%; margin-left:-101.0mm; top:100mm; width:5mm; text-align:right; background-color:rgba(255,0,0,0)">
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
