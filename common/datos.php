<?php
$radio = '&#10687;';		// símbolo para las casillas tipo radio
$check = '&#10004;';		// símbolo para las casillas tipo checkbox

date_default_timezone_set("America/Bogota");
	$fecha_old = date("Y-m-d / g:i A");
$fechaactual = date("Y-m-d");
 $horaactual = date("g:i A");

		 $fechacero = "";				// para iniciar los formatos se asigna $fechacero="";
					$hora = "";				// para iniciar los formatos se asigna $hora="";
//		 $fechacero = date("Y-m-d");
//					$hora = date("H:i");

	$fecha_oculta = date("Y-m-d");			//se asigna esta fecha para el momento de diligenciar los formatos
			 $horamin = date("H:i");

$dias = 2;			// número de días para permitir la edición en los formatos
$fechahoy = date("Y-m-d / g:i A");
$fechamin = date("Y-m-d", strtotime("- $dias days", strtotime(date("Y-m-d"))));
$fechamax = date("Y-m-d", strtotime("+ $dias days", strtotime(date("Y-m-d"))));
//$fechaminA = date("Y-m-d", strtotime($row['fechaA']."- $dias days"));
//$fechamaxA = date("Y-m-d", strtotime($row['fechaA']."+ $dias days"));

$estado_formulario1 = "ORIGINAL";
$estado_formulario2 = "EDITADO";
$estado_formulario3 = "NO SE CUAL";

$dbhost = 'localhost';
$dbuser = 'soluci15_luiscgraciap';
$dbpass = 'aFFe.,0698';

$celular_soporte = "573241693296";
$celular_pedidos = "324 169 3296";
$correo_pedidos = "comercial@digiformas.com";
$aviso = "<br>no está habilitado en esta Terminal,<br>ó ya se diligenciaron todos los formatos comprados.<br><br>Por favor realice un NUEVO PEDIDO de permisos de trabajo.";
$contacto = "<br><br><br>SOLUCIONES GRÁFICAS LTDA<br>".$correo_pedidos."<br># proveedor PRIMAX: 775594<br><br>Pedidos por WhatsApp<br>".$celular_pedidos;

$formulario01  = "CERTIFICADO DE HABILITACIÓN";
$formulario01_title = "HABILITACION";
$formulario02  = "PERMISO DE TRABAJO EN CALIENTE EN ESPACIO CONFINADO";
$formulario02_title = "CALIENTE CONFINADO";
$formulario03  = "PERMISO DE TRABAJO EN CALIENTE EN ESPACIO NO CONFINADO";
$formulario03_title = "CALIENTE NO CONFINADO";
$formulario04  = "PERMISO DE TRABAJO EN FRIO EN ESPACIO CONFINADO";
$formulario04_title = "FRÍO CONFINADO";
$formulario05  = "PERMISO DE TRABAJO EN FRIO EN ESPACIO NO CONFINADO";
$formulario05_title = "FRÍO NO CONFINADO";
$formulario05a  = "PERMISO DE TRABAJO EN ESPACIO CONFINADO MPCT 06 y MPCT 07";
$formulario05a_title = "TRABAJO EN ESPACIO CONFINADO";
$formulario05b  = "Anexo 1 - TRABAJO EN ESPACIO CONFINADO";
$formulario05b_title = "Anexo 1 - TRABAJO ESPACIO CONFINADO";
$formulario08 = "PERMISO DE DESACOPLE DE EQUIPOS";
$formulario08_title = "DESACOPLE EQUIPOS";
$formulario09 = "AUTORIZACIÓN PARA EXCAVACIÓN";
$formulario09_title = "AUTORIZACIÓN PARA EXCAVACIÓN";
$formulario13  = "PERMISO DE TRABAJO EN ALTURAS";
$formulario13_title = "ALTURAS";
$formulario15A = "CONTROL OPERACIÓN RECIBO EN TANQUES POR POLIDUCTO (Medición AUTOMÁTICA)";
$formulario15A_title = "RECIBO TANQUES (Autom)";
$formulario15M = "CONTROL OPERACIÓN RECIBO EN TANQUES POR POLIDUCTO (Medición MANUAL)";
$formulario15M_title = "RECIBO TANQUES (Manual)";
$formulario16  = "CERTIFICADO DE INTERFASES";
$formulario16_title = "INTERFASES";
$formulario30  = "ENTREGA JET A1 A CAMIÓN TANQUE";
$formulario30_title = "ENTREGA JET A1 A CAMIÓN TANQUE";
$formulario31  = "AISLAMIENTO DE ENERGÍA Y APERTURA DE EQUIPO";
$formulario31_title = "AISLAMIENTO DE ENERGÍA Y APERTURA DE EQUIPO";

// desde este punto se controlan los consecutivos por termimal y por referencia
 $pc = 1;
$lib = 20000;
$fxl = 50;

$pc_bucaramanga01  = 1;				$lib_bucaramanga01  = $lib;				$fxl_bucaramanga01  = $fxl;
$pc_bucaramanga02  = 1;				$lib_bucaramanga02  = $lib;				$fxl_bucaramanga02  = $fxl;
$pc_bucaramanga03  = 1;				$lib_bucaramanga03  = $lib;				$fxl_bucaramanga03  = $fxl;
$pc_bucaramanga04  = 1;				$lib_bucaramanga04  = $lib;				$fxl_bucaramanga04  = $fxl;
$pc_bucaramanga05  = 1;				$lib_bucaramanga05  = $lib;				$fxl_bucaramanga05  = $fxl;
$pc_bucaramanga05a = 1;				$lib_bucaramanga05a = $lib;				$fxl_bucaramanga05a = $fxl;
$pc_bucaramanga05b = 1;				$lib_bucaramanga05b = $lib;				$fxl_bucaramanga05b = $fxl;
$pc_bucaramanga08  = 1;				$lib_bucaramanga08  = $lib;				$fxl_bucaramanga08  = $fxl;
$pc_bucaramanga09  = 1;				$lib_bucaramanga09  = $lib;				$fxl_bucaramanga09  = $fxl;
$pc_bucaramanga13  = 1;				$lib_bucaramanga13  = $lib;				$fxl_bucaramanga13  = $fxl;
$pc_bucaramanga15A = 1;				$lib_bucaramanga15A = $lib;				$fxl_bucaramanga15A = $fxl;
$pc_bucaramanga15M = 1;				$lib_bucaramanga15M = $lib;				$fxl_bucaramanga15M = $fxl;
$pc_bucaramanga16  = 1;				$lib_bucaramanga16  = $lib;				$fxl_bucaramanga16  = $fxl;
$pc_bucaramanga30  = 1;				$lib_bucaramanga30  = $lib;				$fxl_bucaramanga30  = $fxl;
$pc_bucaramanga31  = 1;				$lib_bucaramanga31  = $lib;				$fxl_bucaramanga31  = $fxl;

$pc_buenaventura01  = 1;			$lib_buenaventura01  = $lib;			$fxl_buenaventura01  = $fxl;
$pc_buenaventura02  = 1;			$lib_buenaventura02  = $lib;			$fxl_buenaventura02  = $fxl;
$pc_buenaventura03  = 1;			$lib_buenaventura03  = $lib;			$fxl_buenaventura03  = $fxl;
$pc_buenaventura04  = 1;			$lib_buenaventura04  = $lib;			$fxl_buenaventura04  = $fxl;
$pc_buenaventura05  = 1;			$lib_buenaventura05  = $lib;			$fxl_buenaventura05  = $fxl;
$pc_buenaventura05a = 1;			$lib_buenaventura05a = $lib;			$fxl_buenaventura05a = $fxl;
$pc_buenaventura05b = 1;			$lib_buenaventura05b = $lib;			$fxl_buenaventura05b = $fxl;
$pc_buenaventura08  = 1;			$lib_buenaventura08  = $lib;			$fxl_buenaventura08  = $fxl;
$pc_buenaventura09  = 1;			$lib_buenaventura09  = $lib;			$fxl_buenaventura09  = $fxl;
$pc_buenaventura13  = 1;			$lib_buenaventura13  = $lib;			$fxl_buenaventura13  = $fxl;
$pc_buenaventura15A = 1;			$lib_buenaventura15A = $lib;			$fxl_buenaventura15A = $fxl;
$pc_buenaventura15M = 1;			$lib_buenaventura15M = $lib;			$fxl_buenaventura15M = $fxl;
$pc_buenaventura16  = 1;			$lib_buenaventura16  = $lib;			$fxl_buenaventura16  = $fxl;
$pc_buenaventura30  = 1;			$lib_buenaventura30  = $lib;			$fxl_buenaventura30  = $fxl;
$pc_buenaventura31  = 1;			$lib_buenaventura31  = $lib;			$fxl_buenaventura31  = $fxl;

$pc_cartagena01  = 1;					$lib_cartagena01  = $lib;					$fxl_cartagena01  = $fxl;
$pc_cartagena02  = 1;					$lib_cartagena02  = $lib;					$fxl_cartagena02  = $fxl;
$pc_cartagena03  = 1;					$lib_cartagena03  = $lib;					$fxl_cartagena03  = $fxl;
$pc_cartagena04  = 1;					$lib_cartagena04  = $lib;					$fxl_cartagena04  = $fxl;
$pc_cartagena05  = 1;					$lib_cartagena05  = $lib;					$fxl_cartagena05  = $fxl;
$pc_cartagena05a = 1;					$lib_cartagena05a = $lib;					$fxl_cartagena05a = $fxl;
$pc_cartagena05b = 1;					$lib_cartagena05b = $lib;					$fxl_cartagena05b = $fxl;
$pc_cartagena08  = 1;					$lib_cartagena08  = $lib;					$fxl_cartagena08  = $fxl;
$pc_cartagena09  = 1;					$lib_cartagena09  = $lib;					$fxl_cartagena09  = $fxl;
$pc_cartagena13  = 1;					$lib_cartagena13  = $lib;					$fxl_cartagena13  = $fxl;
$pc_cartagena15A = 1;					$lib_cartagena15A = $lib;					$fxl_cartagena15A = $fxl;
$pc_cartagena15M = 1;					$lib_cartagena15M = $lib;					$fxl_cartagena15M = $fxl;
$pc_cartagena16  = 1;					$lib_cartagena16  = $lib;					$fxl_cartagena16  = $fxl;
$pc_cartagena30  = 1;					$lib_cartagena30  = $lib;					$fxl_cartagena30  = $fxl;
$pc_cartagena31  = 1;					$lib_cartagena31  = $lib;					$fxl_cartagena31  = $fxl;

$pc_cartago01  = 1;						$lib_cartago01  = $lib;						$fxl_cartago01  = $fxl;
$pc_cartago02  = 1;						$lib_cartago02  = $lib;						$fxl_cartago02  = $fxl;
$pc_cartago03  = 1;						$lib_cartago03  = $lib;						$fxl_cartago03  = $fxl;
$pc_cartago04  = 1;						$lib_cartago04  = $lib;						$fxl_cartago04  = $fxl;
$pc_cartago05  = 1;						$lib_cartago05  = $lib;						$fxl_cartago05  = $fxl;
$pc_cartago05a = 1;						$lib_cartago05a = $lib;						$fxl_cartago05a = $fxl;
$pc_cartago05b = 1;						$lib_cartago05b = $lib;						$fxl_cartago05b = $fxl;
$pc_cartago08  = 1;						$lib_cartago08  = $lib;						$fxl_cartago08  = $fxl;
$pc_cartago09  = 1;						$lib_cartago09  = $lib;						$fxl_cartago09  = $fxl;
$pc_cartago13  = 1;						$lib_cartago13  = $lib;						$fxl_cartago13  = $fxl;
$pc_cartago15A = 1;						$lib_cartago15A = $lib;						$fxl_cartago15A = $fxl;
$pc_cartago15M = 1;						$lib_cartago15M = $lib;						$fxl_cartago15M = $fxl;
$pc_cartago16  = 1;						$lib_cartago16  = $lib;						$fxl_cartago16  = $fxl;
$pc_cartago30  = 1;						$lib_cartago30  = $lib;						$fxl_cartago30  = $fxl;
$pc_cartago31  = 1;						$lib_cartago31  = $lib;						$fxl_cartago31  = $fxl;

$pc_galapa01  = 1;						$lib_galapa01  = $lib;						$fxl_galapa01  = $fxl;
$pc_galapa02  = 1;						$lib_galapa02  = $lib;						$fxl_galapa02  = $fxl;
$pc_galapa03  = 1;						$lib_galapa03  = $lib;						$fxl_galapa03  = $fxl;
$pc_galapa04  = 1;						$lib_galapa04  = $lib;						$fxl_galapa04  = $fxl;
$pc_galapa05  = 1;						$lib_galapa05  = $lib;						$fxl_galapa05  = $fxl;
$pc_galapa05a = 1;						$lib_galapa05a = $lib;						$fxl_galapa05a = $fxl;
$pc_galapa05b = 1;						$lib_galapa05b = $lib;						$fxl_galapa05b = $fxl;
$pc_galapa08  = 1;						$lib_galapa08  = $lib;						$fxl_galapa08  = $fxl;
$pc_galapa09  = 1;						$lib_galapa09  = $lib;						$fxl_galapa09  = $fxl;
$pc_galapa13  = 1;						$lib_galapa13  = $lib;						$fxl_galapa13  = $fxl;
$pc_galapa15A = 1;						$lib_galapa15A = $lib;						$fxl_galapa15A = $fxl;
$pc_galapa15M = 1;						$lib_galapa15M = $lib;						$fxl_galapa15M = $fxl;
$pc_galapa16  = 1;						$lib_galapa16  = $lib;						$fxl_galapa16  = $fxl;
$pc_galapa30  = 1;						$lib_galapa30  = $lib;						$fxl_galapa30  = $fxl;
$pc_galapa31  = 1;						$lib_galapa31  = $lib;						$fxl_galapa31  = $fxl;

$pc_gualanday01  = 1;					$lib_gualanday01  = $lib;					$fxl_gualanday01  = $fxl;
$pc_gualanday02  = 1;					$lib_gualanday02  = $lib;					$fxl_gualanday02  = $fxl;
$pc_gualanday03  = 1;					$lib_gualanday03  = $lib;					$fxl_gualanday03  = $fxl;
$pc_gualanday04  = 1;					$lib_gualanday04  = $lib;					$fxl_gualanday04  = $fxl;
$pc_gualanday05  = 1;					$lib_gualanday05  = $lib;					$fxl_gualanday05  = $fxl;
$pc_gualanday05a = 1;					$lib_gualanday05a = $lib;					$fxl_gualanday05a = $fxl;
$pc_gualanday05b = 1;					$lib_gualanday05b = $lib;					$fxl_gualanday05b = $fxl;
$pc_gualanday08  = 1;					$lib_gualanday08  = $lib;					$fxl_gualanday08  = $fxl;
$pc_gualanday09  = 1;					$lib_gualanday09  = $lib;					$fxl_gualanday09  = $fxl;
$pc_gualanday13  = 1;					$lib_gualanday13  = $lib;					$fxl_gualanday13  = $fxl;
$pc_gualanday15A = 1;					$lib_gualanday15A = $lib;					$fxl_gualanday15A = $fxl;
$pc_gualanday15M = 1;					$lib_gualanday15M = $lib;					$fxl_gualanday15M = $fxl;
$pc_gualanday16  = 1;					$lib_gualanday16  = $lib;					$fxl_gualanday16  = $fxl;
$pc_gualanday30  = 1;					$lib_gualanday30  = $lib;					$fxl_gualanday30  = $fxl;
$pc_gualanday31  = 1;					$lib_gualanday31  = $lib;					$fxl_gualanday31  = $fxl;

$pc_la_dorada01  = 1;					$lib_la_dorada01  = $lib;					$fxl_la_dorada01  = $fxl;
$pc_la_dorada02  = 1;					$lib_la_dorada02  = $lib;					$fxl_la_dorada02  = $fxl;
$pc_la_dorada03  = 1;					$lib_la_dorada03  = $lib;					$fxl_la_dorada03  = $fxl;
$pc_la_dorada04  = 1;					$lib_la_dorada04  = $lib;					$fxl_la_dorada04  = $fxl;
$pc_la_dorada05  = 1;					$lib_la_dorada05  = $lib;					$fxl_la_dorada05  = $fxl;
$pc_la_dorada05a = 1;					$lib_la_dorada05a = $lib;					$fxl_la_dorada05a = $fxl;
$pc_la_dorada05b = 1;					$lib_la_dorada05b = $lib;					$fxl_la_dorada05b = $fxl;
$pc_la_dorada08  = 1;					$lib_la_dorada08  = $lib;					$fxl_la_dorada08  = $fxl;
$pc_la_dorada09  = 1;					$lib_la_dorada09  = $lib;					$fxl_la_dorada09  = $fxl;
$pc_la_dorada13  = 1;					$lib_la_dorada13  = $lib;					$fxl_la_dorada13  = $fxl;
$pc_la_dorada15A = 1;					$lib_la_dorada15A = $lib;					$fxl_la_dorada15A = $fxl;
$pc_la_dorada15M = 1;					$lib_la_dorada15M = $lib;					$fxl_la_dorada15M = $fxl;
$pc_la_dorada16  = 1;					$lib_la_dorada16  = $lib;					$fxl_la_dorada16  = $fxl;
$pc_la_dorada30  = 1;					$lib_la_dorada30  = $lib;					$fxl_la_dorada30  = $fxl;
$pc_la_dorada31  = 1;					$lib_la_dorada31  = $lib;					$fxl_la_dorada31  = $fxl;

$pc_mancilla01  = 1;					$lib_mancilla01  = $lib;					$fxl_mancilla01  = $fxl;
$pc_mancilla02  = 1;					$lib_mancilla02  = $lib;					$fxl_mancilla02  = $fxl;
$pc_mancilla03  = 1;					$lib_mancilla03  = $lib;					$fxl_mancilla03  = $fxl;
$pc_mancilla04  = 1;					$lib_mancilla04  = $lib;					$fxl_mancilla04  = $fxl;
$pc_mancilla05  = 1;					$lib_mancilla05  = $lib;					$fxl_mancilla05  = $fxl;
$pc_mancilla05a = 1;					$lib_mancilla05a = $lib;					$fxl_mancilla05a = $fxl;
$pc_mancilla05b = 1;					$lib_mancilla05b = $lib;					$fxl_mancilla05b = $fxl;
$pc_mancilla08  = 1;					$lib_mancilla08  = $lib;					$fxl_mancilla08  = $fxl;
$pc_mancilla09  = 1;					$lib_mancilla09  = $lib;					$fxl_mancilla09  = $fxl;
$pc_mancilla13  = 1;					$lib_mancilla13  = $lib;					$fxl_mancilla13  = $fxl;
$pc_mancilla15A = 1;					$lib_mancilla15A = $lib;					$fxl_mancilla15A = $fxl;
$pc_mancilla15M = 1;					$lib_mancilla15M = $lib;					$fxl_mancilla15M = $fxl;
$pc_mancilla16  = 1;					$lib_mancilla16  = $lib;					$fxl_mancilla16  = $fxl;
$pc_mancilla30  = 1;					$lib_mancilla30  = $lib;					$fxl_mancilla30  = $fxl;
$pc_mancilla31  = 1;					$lib_mancilla31  = $lib;					$fxl_mancilla31  = $fxl;

$pc_medellin01  = 1;					$lib_medellin01  = $lib;					$fxl_medellin01  = $fxl;
$pc_medellin02  = 1;					$lib_medellin02  = $lib;					$fxl_medellin02  = $fxl;
$pc_medellin03  = 1;					$lib_medellin03  = $lib;					$fxl_medellin03  = $fxl;
$pc_medellin04  = 1;					$lib_medellin04  = $lib;					$fxl_medellin04  = $fxl;
$pc_medellin05  = 1;					$lib_medellin05  = $lib;					$fxl_medellin05  = $fxl;
$pc_medellin05a = 1;					$lib_medellin05a = $lib;					$fxl_medellin05a = $fxl;
$pc_medellin05b = 1;					$lib_medellin05b = $lib;					$fxl_medellin05b = $fxl;
$pc_medellin08  = 1;					$lib_medellin08  = $lib;					$fxl_medellin08  = $fxl;
$pc_medellin09  = 1;					$lib_medellin09  = $lib;					$fxl_medellin09  = $fxl;
$pc_medellin13  = 1;					$lib_medellin13  = $lib;					$fxl_medellin13  = $fxl;
$pc_medellin15A = 1;					$lib_medellin15A = $lib;					$fxl_medellin15A = $fxl;
$pc_medellin15M = 1;					$lib_medellin15M = $lib;					$fxl_medellin15M = $fxl;
$pc_medellin16  = 1;					$lib_medellin16  = $lib;					$fxl_medellin16  = $fxl;
$pc_medellin30  = 1;					$lib_medellin30  = $lib;					$fxl_medellin30  = $fxl;
$pc_medellin31  = 1;					$lib_medellin31  = $lib;					$fxl_medellin31  = $fxl;

$pc_puente_aranda01  = 1;			$lib_puente_aranda01  = $lib;			$fxl_puente_aranda01  = $fxl;
$pc_puente_aranda02  = 1;			$lib_puente_aranda02  = $lib;			$fxl_puente_aranda02  = $fxl;
$pc_puente_aranda03  = 1;			$lib_puente_aranda03  = $lib;			$fxl_puente_aranda03  = $fxl;
$pc_puente_aranda04  = 1;			$lib_puente_aranda04  = $lib;			$fxl_puente_aranda04  = $fxl;
$pc_puente_aranda05  = 1;			$lib_puente_aranda05  = $lib;			$fxl_puente_aranda05  = $fxl;
$pc_puente_aranda05a = 1;			$lib_puente_aranda05a = $lib;			$fxl_puente_aranda05a = $fxl;
$pc_puente_aranda05b = 1;			$lib_puente_aranda05b = $lib;			$fxl_puente_aranda05b = $fxl;
$pc_puente_aranda08  = 1;			$lib_puente_aranda08  = $lib;			$fxl_puente_aranda08  = $fxl;
$pc_puente_aranda09  = 1;			$lib_puente_aranda09  = $lib;			$fxl_puente_aranda09  = $fxl;
$pc_puente_aranda13  = 1;			$lib_puente_aranda13  = $lib;			$fxl_puente_aranda13  = $fxl;
$pc_puente_aranda15A = 1;			$lib_puente_aranda15A = $lib;			$fxl_puente_aranda15A = $fxl;
$pc_puente_aranda15M = 1;			$lib_puente_aranda15M = $lib;			$fxl_puente_aranda15M = $fxl;
$pc_puente_aranda16  = 1;			$lib_puente_aranda16  = $lib;			$fxl_puente_aranda16  = $fxl;
$pc_puente_aranda30  = 1;			$lib_puente_aranda30  = $lib;			$fxl_puente_aranda30  = $fxl;
$pc_puente_aranda31  = 1;			$lib_puente_aranda31  = $lib;			$fxl_puente_aranda31  = $fxl;

$pc_yumbo01  = 1;							$lib_yumbo01  = $lib;							$fxl_yumbo01  = $fxl;
$pc_yumbo02  = 1;							$lib_yumbo02  = $lib;							$fxl_yumbo02  = $fxl;
$pc_yumbo03  = 1;							$lib_yumbo03  = $lib;							$fxl_yumbo03  = $fxl;
$pc_yumbo04  = 1;							$lib_yumbo04  = $lib;							$fxl_yumbo04  = $fxl;
$pc_yumbo05  = 1;							$lib_yumbo05  = $lib;							$fxl_yumbo05  = $fxl;
$pc_yumbo05a = 1;							$lib_yumbo05a = $lib;							$fxl_yumbo05a = $fxl;
$pc_yumbo05b = 1;							$lib_yumbo05b = $lib;							$fxl_yumbo05b = $fxl;
$pc_yumbo08  = 1;							$lib_yumbo08  = $lib;							$fxl_yumbo08  = $fxl;
$pc_yumbo09  = 1;							$lib_yumbo09  = $lib;							$fxl_yumbo09  = $fxl;
$pc_yumbo13  = 1;							$lib_yumbo13  = $lib;							$fxl_yumbo13  = $fxl;
$pc_yumbo15A = 1;							$lib_yumbo15A = $lib;							$fxl_yumbo15A = $fxl;
$pc_yumbo15M = 1;							$lib_yumbo15M = $lib;							$fxl_yumbo15M = $fxl;
$pc_yumbo16  = 1;							$lib_yumbo16  = $lib;							$fxl_yumbo16  = $fxl;
$pc_yumbo30  = 1;							$lib_yumbo30  = $lib;							$fxl_yumbo30  = $fxl;
$pc_yumbo31  = 1;							$lib_yumbo31  = $lib;							$fxl_yumbo31  = $fxl;

?>
<!--
	$terminales = ['bucaramanga','buenaventura','cartagena','cartago','galapa','gualanday','la_dorada','mancilla','medellin','puente_aranda','yumbo'];
		$formatos = ['01','02','03','04','05','05a','05b','08','09','13','15A','15M','16','30','31'];

$terminales = [
	 1 => "bucaramanga",
	 2 => "buenaventura",
	 3 => "cartagena",
	 4 => "cartago",
	 5 => "galapa",
	 6 => "gualanday",
	 7 => "la_dorada",
	 8 => "mancilla",
	 9 => "medellin",
	10 => "puente_aranda",
	11 => "yumbo"
];

$formatos = [
	 1 = '01',
	 2 = '02',
	 3 = '03',
	 4 = '04',
	 5 = '05',
	 6 = '05a',
	 7 = '05b',
	 8 = '08',
	 9 = '09',
	10 = '13',
	11 = '15A',
	12 = '15M',
	13 = '16',
	14 = '30',
	15 = '31'
];
-->

