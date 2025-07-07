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
	div.radio			{font-size:18px}
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
	<div style="position:absolute; left:18.00cm; top:1.35cm">
		<span style="font-family:SCHLBKB; font-size:16px; color:red; vertical-align:top">
		<?	if ($consecutivo <= 9) {echo "&#8470; 00000".$consecutivo;}
					else {if ($consecutivo <= 99) {echo "&#8470; 0000".$consecutivo;}
						else {if ($consecutivo <= 999) {echo "&#8470; 000".$consecutivo;}
							else {if ($consecutivo <= 9999) {echo "&#8470; 00".$consecutivo;}
								else {if ($consecutivo <= 99999) {echo "&#8470; 0".$consecutivo;}}}}}	?>
		</span>
	</div>

<!--	<div style="position:absolute; left: 0.00cm; top:0.70cm; color:rgba(0,0,190,1); width:100%"><span style="font-size:10px; font-family:Arial"><b>TERMINAL <?echo strtoupper($terminal);?></b></span></div>-->
	<div style="position:absolute; left:18.00cm; top:1.05cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $estado;?></span></div>
	<div style="position:absolute; left:18.00cm; top:1.25cm; color:rgba(0,0,0,1)"><span style="font-family:Arlrdbd; font-size:7px"><?echo $usuario;?>@primax.com.co</span></div>

<!-- *****************************************			 sección A			 ***************************************** -->
	<div style="position:absolute; left: 9.00cm; top: 2.95cm"><?echo $batch_ecopetrol;?></div>
	<div style="position:absolute; left: 9.00cm; top: 3.55cm"><?echo $carta_liberacion;?></div>
	<div style="position:absolute; left:17.85cm; top: 2.95cm"><?echo $fechaA;?></div>
	<div style="position:absolute; left:18.50cm; top: 3.55cm"><?echo $despacho;?></div>

<!-- *****************************************			 sección B			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top: 5.00cm"><?echo substr($compania,0,52-12);?></div>
	<div style="position:absolute; left: 6.00cm; top: 5.60cm"><?echo $placasCTK;?></div>
	<div style="position:absolute; left: 6.00cm; top: 6.20cm"><?echo $guia_transporte;?></div>
	<div style="position:absolute; left: 8.40cm; top: 6.80cm"><?echo $volumen_bruto;?></div>
	<div style="position:absolute; left: 8.40cm; top: 7.40cm"><?echo $temp_despacho;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.00cm"><?echo $gravedad_API_X1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 8.60cm"><?echo $gravedad_API1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.20cm"><?echo $gravedad_espec1;?></div>
	<div style="position:absolute; left: 8.40cm; top: 9.80cm"><?echo $factor_correccion;?></div>
	<div style="position:absolute; left: 8.40cm; top:10.40cm"><?echo $vol_neto_despacho;?></div>

<!-- *****************************************			 sección C			 ***************************************** -->
	<div style="position:absolute; left: 8.40cm; top:11.85cm"><?echo $TK_despachador;?></div>
	<div style="position:absolute; left: 8.40cm; top:12.45cm"><?echo $gravedad_API2;?></div>
	<div style="position:absolute; left: 8.40cm; top:13.05cm"><?echo $gravedad_espec2;?></div>

<!-- *****************************************			 sección D			 ***************************************** -->
	<div style="position:absolute; left: 5.40cm; top:14.50cm"><?echo $aparienciaCTK;?></div>
	<div style="position:absolute; left: 8.40cm; top:15.10cm"><?echo $diferenciaAPI1;?></div>
	<div style="position:absolute; left: 8.40cm; top:16.30cm"><?echo $gravedad_espec_CTK_TK1;?></div>

<!-- *****************************************			 sección E			 ***************************************** -->
	<div style="position:absolute; left:15.30cm; top: 5.00cm"><?echo substr($aerop_recibidor,0,52-17);?></div>
	<div style="position:absolute; left:15.30cm; top: 5.60cm"><?echo $aparienciaTK;?></div>
	<div style="position:absolute; left:18.70cm; top: 6.20cm"><?echo $gravedad_API_X2;?></div>
	<div style="position:absolute; left:18.70cm; top: 6.80cm"><?echo $gravedad_API3;?></div>
	<div style="position:absolute; left:18.70cm; top: 7.40cm"><?echo $gravedad_espec3;?></div>
	<div style="position:absolute; left:18.70cm; top: 8.00cm"><?echo $diferenciaAPI2;?></div>
	<div style="position:absolute; left:18.70cm; top: 9.20cm"><?echo $gravedad_espec_CTK_TK2;?></div>

<!-- *****************************************			 sección F			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top:11.85cm"><?echo $tiquete;?></div>
	<div style="position:absolute; left:18.70cm; top:12.45cm"><?echo $lectura_inicial;?></div>
	<div style="position:absolute; left:18.70cm; top:13.05cm"><?echo $lectura_final;?></div>
	<div style="position:absolute; left:18.70cm; top:13.65cm"><?echo $vol_bruto;?></div>
	<div style="position:absolute; left:18.70cm; top:14.25cm"><?echo $temp_recibo;?></div>
	<div style="position:absolute; left:18.70cm; top:14.85cm"><?echo $gravedad_API4;?></div>
	<div style="position:absolute; left:18.70cm; top:15.45cm"><?echo $factor_correccion_volumen1;?></div>
	<div style="position:absolute; left:18.70cm; top:16.05cm"><?echo $vol_neto_recibido;?></div>
	<div style="position:absolute; left:18.70cm; top:16.65cm"><?echo $variacion_despacho_recibido;?></div>

<!-- *****************************************			 sección G			 ***************************************** -->
	<div style="position:absolute; left:18.70cm; top:18.10cm"><?echo $TK_recibo_aerop;?></div>
	<div style="position:absolute; left:18.70cm; top:18.70cm"><?echo $medida_inicial;?></div>
	<div style="position:absolute; left:18.70cm; top:19.30cm"><?echo $medida_final;?></div>
	<div style="position:absolute; left:18.70cm; top:20.00cm"><?echo $vol_bruto_tabla_aforo;?></div>
	<div style="position:absolute; left:18.70cm; top:20.60cm"><?echo $gravedad_APIC;?></div>
	<div style="position:absolute; left:18.70cm; top:21.10cm"><?echo $gravedad_API5;?></div>
	<div style="position:absolute; left:18.70cm; top:21.70cm"><?echo $temp_TK;?></div>
	<div style="position:absolute; left:18.70cm; top:22.30cm"><?echo $factor_correccion_volumen2;?></div>
	<div style="position:absolute; left:18.70cm; top:22.90cm"><?echo $vol_neto;?></div>

<!-- *****************************************			 sección H			 ***************************************** -->
	<div style="position:absolute; left: 4.00cm; top:20.97cm"><?echo $nombre_rep_term_desp;?></div>
	<div style="position:absolute; left: 4.00cm; top:24.20cm"><?echo $nombre_conductor;?></div>
	<div style="position:absolute; left:13.60cm; top:24.20cm"><?echo $nombre_rep_aeropuerto;?></div>

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
