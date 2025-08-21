<?php
$radio = '&#10687;';		// símbolo para las casillas tipo radio
$check = '&#10004;';		// símbolo para las casillas tipo checkbox

date_default_timezone_set("America/Bogota");
	$fecha_old = date("Y-m-d / g:i A");
$fechaactual = date("Y-m-d");
 $horaactual = date("g:i A");

		 $fechacero = date("0000-00-00");			//se asigna esta fecha para los campos que pueden tener cualquier fecha, p. ej. las calibraciones
	$fecha_oculta = date("2025-08-20");			//se asigna esta fecha para el momento de diligenciar los formatos
//	$fecha_oculta = date("Y-m-d");
					$hora = "";											//se asigna esta hora  para el momento de diligenciar los formatos
//					$hora = date("H:i");

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
$aviso = "</b><br>no está habilitado en esta Terminal,<br>ó se diligenciaron todos los formatos comprados.<br><br>Por favor realice un NUEVO PEDIDO de permisos de trabajo.";
$contacto = "<br><br><br>SOLUCIONES GRÁFICAS LTDA<br>".$correo_pedidos."<br># proveedor PRIMAX: 775594<br><br>Luis Carlos Gracia Puentes<br>".$celular_pedidos."<br><br><br><br><br><br><br><br><br>";

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
?>
