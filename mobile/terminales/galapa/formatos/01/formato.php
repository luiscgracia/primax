<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
</style>
</head>
<script>
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
</script>
<body style="font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	include ("../../conectar_db.php");
	include ("../../../../../common/conectar_db_usuarios.php");
	include ("../../../../../normal/usuarios.php");
	include ("../../../../../normal/terminales/".$terminal."/formatos/".basename(dirname(__FILE__))."/consecutivos".basename(dirname(__FILE__)).".php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
	$cons = "SELECT MAX(consecutivo) as consecutivo FROM formulario".$formato." LIMIT 1";

	//se conecta a la base de datos y se verifica el consecutivo inicial (o el siguiente libre)
	$consult = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario'.basename(dirname(__FILE__)).' LIMIT 1');
	$consulta = $consult->fetch_array(MYSQLI_ASSOC);
	$consec = (empty($consulta['consecutivo']) ? $primerconsecutivo : $consulta['consecutivo']+=1);
	$conexion->close();

	// se valida que no se sobrepase el número de libretas compradas
	$ultimo_consec = $primerconsecutivo + $formatosporlibreta * $libretas - 1;
	$consec_por_usar = $ultimo_consec - $consec + 1;
	$aviso_pedido = "<div class=aviso><br><br><b>".$$formulario.$aviso.$contacto."</b><br><br><br><br><br><br><br><br><br><br></div>";
	if ($consec > $ultimo_consec) {echo "<script>setTimeout(cerrarVentana,20000); document.body.innerHTML = '$aviso_pedido';</script>";}
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<div class=noimprimir>
<div class=fijar style="top:15px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
</div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style="position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw">
		<table border=0 style=background-color:rgba(255,255,255,1)>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=<? echo $estado_formulario1; ?> VIGENTE readonly>
					<span style='font-size:36px'><b><? echo $$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:white; border:0px"
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style=font-size:20.00px>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.</span><br>
					<span style=font-size:20.00px>ESTE PERMISO ES VÁLIDO POR UN TURNO O MÁXIMO 12 HORAS.</span><br>
					<span style=font-size:19.35px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 - TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr><td width=80%></td><td width=20%></td></tr>
			<tr>
				<td style=vertical-align:bottom>INSTALACIÓN<textarea name=instalacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td>
				<td style=vertical-align:bottom>CERTIFICADO &#8470;<input name=certificado class=consecutivo maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
			<tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=17%></td><td width=25%></td><td width=16%></td><td width=25%></td><td width=17%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;A. TAREA A REALIZAR</b></td></tr>
			<tr><td colspan=5>UBICACIÓN<textarea name=ubicacion maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td>APT<br><input name=apt class=consecutivo maxlength=6 style=width:55% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				<td></td>
				<td>EQUIPO<br><input name=equipo class=consecutivo maxlength=10 style=width:89% inputmode=numeric pattern=^(?:[0-9]{4,10})$ required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table>
			<tr><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td><td width=27%></td><td width= 4.75%></td></tr>
			<tr>
				<td></td>
				<td>FECHA<input name=fechaA type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td></td>
				<td>HORA INICIAL<input name=horainicioA type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td></td>
				<td>HORA FINAL<input name=horafinalA type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=7>DESCRIPCIÓN<textarea name=descripcion type=texto maxlength=74 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=40%></td><td width= 4%></td><td width=10%><td width=46%></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;B. ADMINISTRACIÓN DE CAMBIOS</b></td></tr>
			<tr class=C>
				<td rowspan=2 class=B style='text-align:right; vertical-align:middle'>Este trabajo genera un &nbsp;</td>
				<td><input name=cambio id=cambioA type=radio value=CME onclick=gestionarClickRadio(this) required></td>
				<td colspan=2 class=B>&nbsp;Cambio de la misma especie<br>&nbsp;ó no hay cambio.</td>
			</tr>
			<tr class=C>
				<td><input name=cambio id=cambioB type=radio value=CDE onclick=gestionarClickRadio(this)></td>
				<td colspan=2 class=B>&nbsp;Cambio de diferente especie.</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=2><input style=display:none name=pedidocambio id=pedidocambio class=consecutivo maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric></td>
				<td class=B><span style='display:none; font-size:32px' id=pedido>&nbsp;&#8470;&nbsp;Pedido de Cambio</span></td>
			</tr>
		</table>
		<script>
		var pedidocambio = document.getElementById('pedidocambio');
			document.getElementById('cambioA').addEventListener('click', function(e) {pedidocambio.disabled=true; pedidocambio.style.display='none'; pedido.disabled=true; pedido.style.display='none';});
			document.getElementById('cambioB').addEventListener('click', function(e) {pedidocambio.disabled=false; pedidocambio.style.display='block'; pedidocambio.required=true; pedido.disabled=false; pedido.style.display='block'; pedido.required=true;});
		</script>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width= 5%></td><td width= 5%></td><td width= 8%></td><td width=82%></td></tr>
			<tr class=C>
				<td class=B colspan=4><b>&nbsp;&nbsp;C. IDENTIFICACIÓN DEL RIESGO</b><br><span>&nbsp;&nbsp;(Consultar el manual de Permisos de Trabajo para mayor claridad)</span></td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>IDENTIFICACIÓN DEL RIESGO</b></td>
			</tr>
			<tr class=C>
				<td>SI</td><td>NO</td><td colspan=2></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C1 name=C1 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c1 name=C1 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>1.</td><td class=B>Todas las personas tienen inducción SHE vigente?<span>(menor a 1 año)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C2 name=C2 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c2 name=C2 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>2.</td><td class=B>Trabajo en áreas clasificadas<br><span>(Clase 1 Div.I ó Div.II)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C3 name=C3 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c3 name=C3 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>3.</td><td class=B>Trabajos en o adyacentes a un Llenadero?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C4 name=C4 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c4 name=C4 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>4.</td><td class=B>Entrada o Salida bloqueados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C5 name=C5 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c5 name=C5 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>5.</td><td class=B>Ingreso a Espacios Confinados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C6 name=C6 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c6 name=C6 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>6.</td><td class=B>Trabajo en Alturas<br><span>(Posible caída >2mt / 6ft [Colombia: 1.5mt / 5ft)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C7 name=C7 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c7 name=C7 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>7.</td><td class=B>Trabajos en Procesos de líneas de producto de Control o Instrumentos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C8 name=C8 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c8 name=C8 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>8.</td><td class=B>Se desactivará algún Equipo Crítico?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C9 name=C9 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c9 name=C9 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>9.</td><td class=B>Se afectan otros Sistemas Operacionales no-Críticos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C10 name=C10 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c10 name=C10 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>10.</td><td class=B>Exposición al Movimiento de Vehículos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C11 name=C11 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c11 name=C11 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>11.</td><td class=B>Manejo de Cargas con Grúas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C12 name=C12 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c12 name=C12 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>12.</td><td class=B>Trabajo en Objetos Potencialmente Inestables?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C13 name=C13 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c13 name=C13 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>13.</td><td class=B>Trabajo sobre el Agua?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C14 name=C14 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c14 name=C14 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>14.</td><td class=B>Trabajo Subacuático?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C15 name=C15 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c15 name=C15 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>15.</td><td class=B>Limpieza con Chorro de Agua a Presión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C16 name=C16 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c16 name=C16 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>16.</td><td class=B>Radiografías o Fuentes de Radiación similares?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>EXCAVACIÓN</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C17 name=C17 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c17 name=C17 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>17.</td><td class=B>Excavación Manual a más de 23 cms?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C18 name=C18 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c18 name=C18 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>18.</td><td class=B>Excavación con Máquina, cualquier profundidad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C19 name=C19 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c19 name=C19 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>19.</td><td class=B>Inserción de Estacas en el terreno?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>SUSTANCIAS PELIGROSAS</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C20 name=C20 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c20 name=C20 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>20.</td><td class=B>Manejo/Exposición a Sustancias Peligrosas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C21 name=C21 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c21 name=C21 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>21.</td><td class=B>Exposición a Productos con Plomo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C22 name=C22 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c22 name=C22 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>22.</td><td class=B>Si respondió si a las anteriores, revisó las MSDS?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>FUENTES DE IGNICIÓN</b></td>
			</tr>
			<tr class=C>
				<td>SI</td><td>NO</td><td colspan=2></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C23 name=C23 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c23 name=C23 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>23.</td><td class=B>Fuentes de Ignición<br><span>(chispas, llamas, calor >200°C, etc.)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C24 name=C24 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c24 name=C24 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>24.</td><td class=B>Trabajo con Equipo de Oxiacetileno?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C25 name=C25 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c25 name=C25 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>25.</td><td class=B>Uso de Equipos con Motor de Combustión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C26 name=C26 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c26 name=C26 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>26.</td><td class=B>Uso de Equipos / Herramientas Eléctricos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C27 name=C27 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c27 name=C27 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>27.</td><td class=B>Uso de Maquinaria de Percusión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C28 name=C28 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c28 name=C28 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>28.</td><td class=B>SandBlasting / Granallado / WetBlasting?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style="background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center"><b><br>ENERGÍAS PELIGROSAS</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C29 name=C29 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c29 name=C29 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>29.</td><td class=B>Aislamiento Eléctrico de Equipos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C30 name=C30 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c30 name=C30 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>30.</td><td class=B>Trabajos en Sistemas Eléctricos Energizados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C31 name=C31 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c31 name=C31 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>31.</td><td class=B>Desacople Mecánico de Equipos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C32 name=C32 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c32 name=C32 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>32.</td><td class=B>Trabajos a Sistemas Presurizados o pruebas de Presión de Equipos?
			</tr>
			<tr class=C>
				<td><input type=radio id=C33 name=C33 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c33 name=C33 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>33.</td><td class=B>Temperaturas Peligrosas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C34 name=C34 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c34 name=C34 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>34.</td><td class=B>La labor requiere consultar al SME?<br><span>(ver respaldo)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C35 name=C35 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c35 name=C35 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>35.</td><td class=B>Se revisaron los procedimientos de seguridad que apliquen?<br><span>(Ver listado en Manual de Permisos de Trabajo)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C36 name=C36 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio id=c36 name=C36 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=numero>36.</td><td class=B>El trabajo requiere de un plan específico de emergencia?</td>
			</tr>
			<tr height=30><td></td></tr>
			<tr class=C>
				<td colspan=4>
					<span>OTRAS ACTIVIDADES NO MENCIONADAS ARRIBA:</span>
					<textarea name=otrasactividades type=texto maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea>
				</td>
			</tr>
		</table>
		<hr>

	<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=14%></td><td width= 5%></td><td width= 81%></td></tr>
			<tr><td class=B colspan=3><b>&nbsp;&nbsp;D. DOCUMENTACION ADICIONAL</b><span>&nbsp;(Según lo encontrado en sección C)</span></td></tr>
			<tr class=D><td class=B colspan=2>&nbsp;&nbsp;Permiso</td><td class=B>DOCUMENTO</td></tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD1 name=numeroD1 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D1 type=checkbox id=D1 onChange=comprobarD1(this)></td>
				<td class=B>Permiso Trabajo en Frío en Espacio NO Confinado</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD2 name=numeroD2 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D2 type=checkbox id=D2 onChange=comprobarD2(this)></td>
				<td class=B>Permiso Trabajo en Caliente en Espacio NO Confinado</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD3 name=numeroD3 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D3 type=checkbox id=D3 onChange=comprobarD3(this)></td>
				<td class=B>Permiso Trabajo en Frío en Espacio Confinado</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD4 name=numeroD4 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D4 type=checkbox id=D4 onChange=comprobarD4(this)></td>
				<td class=B>Permiso Trabajo en Caliente en Espacio Confinado</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD5 name=numeroD5 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D5 type=checkbox id=D5 onChange=comprobarD5(this)></td>
				<td class=B>Permiso de Aislamiento de Energía</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD6 name=numeroD6 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D6 type=checkbox id=D6 onChange=comprobarD6(this)></td>
				<td class=B>Autorización de Excavación</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD7 name=numeroD7 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D7 type=checkbox id=D7 onChange=comprobarD7(this)></td>
				<td class=B>Verificación de Equipos con Motor de Combustión</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD8 name=numeroD8 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D8 type=checkbox id=D8 onChange=comprobarD8(this)></td>
				<td class=B>Permiso para Trabajos Eléctricos</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD9 name=numeroD9 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D9 type=checkbox id=D9 onChange=comprobarD9(this)></td>
				<td class=B>Permiso de Trabajo con Radiaciones Ionizantes</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD10 name=numeroD10 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D10 type=checkbox id=D10 onChange=comprobarD10(this)></td>
				<td class=B>Permiso de Trabajo en Alturas</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD11 name=numeroD11 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D11 type=checkbox id=D11 onChange=comprobarD11(this)></td>
				<td class=B>Verificación de Equipo de Oxiacetileno</td>
			</tr>
			<tr class=D>
				<td><input style="display:none; width:100%" id=numeroD12 name=numeroD12 class=consecutivo maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$></td>
				<td><input name=D12 type=checkbox id=D12 onChange=comprobarD12(this)></td>
				<td class=B>Verificación previa al levantamiento con grúa</td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table>
			<tr><td class=B><b>&nbsp;&nbsp;E. PRECAUCIONES ADICIONALES</b></td></tr>
			<tr><td><textarea name=precauciones type=texto maxlength=90 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width= 2.00vw></td><td width=98vw></td></tr>
			<tr>
				<td class=B colspan=2><b>&nbsp;&nbsp;F. ACEPTACIÓN</b></td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo que la tarea definida en la sección A está especificada en la sección C de este certificado y que no se ejecutará ninguna otra tarea sin autorización previa.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&#9679;&nbsp;</td>
				<td class=B>He leído y comprendo a conciencia las restricciones impuestas por este certificado y documentos asociados, e instruiré adecuadamente a todo el personal bajo mi control.</td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=46%></td><td width=49%></td></tr>
			<tr class=C>
				<td><input name=empleado id=empleadop type=radio value=E onclick=gestionarClickRadio(this) required></td>
				<td colspan=2 class=B>EMPLEADO</td>
			</tr>
			<tr class=C>
				<td><input name=empleado id=empleadocp type=radio value=CP onclick=gestionarClickRadio(this)></td>
				<td class=B>CONTRATISTA PERMANENTE </td>
				<td><input name=companiacp id=companiacp style=display:none maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<script>
			var companiacp = document.getElementById('companiacp');
			document.getElementById('empleadop').addEventListener('click', function(e) {companiacp.disabled = true; companiacp.style.display ="none";});
			document.getElementById('empleadocp').addEventListener('click', function(e) {companiacp.disabled = false; companiacp.style.display ="block"; companiacp.required = true;});
		</script>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorF		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaejecF	type=date  value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td width=19%><input name=horaejecF		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorF	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	type=date  value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td><input name=horainspF		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección G			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;G. AUTORIZACIÓN</b><br><span class=seccion>&nbsp;&nbsp;Marque una de las casillas, según corresponda:</span></td></tr></table>
		<table border=0>
			<tr class=C><td width= 5%></td><td width=95%></td></tr>
			<tr class=C>
				<td><input type=radio id=docum_adic_SI name=docum_adic value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=B>Se requiere documentación adicional. Para cada tarea se deberá diligenciar y aprobar previamente la documentación indicada en la Sección D.</td>
			</tr>
			<tr height=30><td></td></tr>
			<tr class=C>
				<td><input type=radio id=docum_adic_NO name=docum_adic value=NO onclick=gestionarClickRadio(this)></td>
				<td class=B>No se requiere documentación adicional. Por lo tanto, se autoriza la realización de este trabajo con este único certificado, formato de control de interfases y el ATS.</td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=77%></td><td width=13%></td><td width= 5%></td></tr>
			<tr>
				<td></td>
				<td class=B><span style="display:none; font-size:32px" id=doc_ad_NO>Cantidad de personas autorizadas para el trabajo:</span></td>
				<td><input name=cantidad id=cantidad style="display:none; width:50%; text-align:center" maxlength=1 type=text inputmode=numeric pattern=^(?:[1-7]{1})$></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=44%></td><td width= 2%></td><td width=39%></td><td width= 5%></td><td width= 5%></td></tr>
			<tr>
				<td></td>
				<td>					<input name=nombre1 id=nombre1 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;1er.&nbsp;autorizado></td><td></td>
				<td colspan=2><input name=nombre2 id=nombre2 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;2o.&nbsp;autorizado></td><td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td>					<input name=nombre3 id=nombre3 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;3er.&nbsp;autorizado></td><td></td>
				<td colspan=2><input name=nombre4 id=nombre4 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;4o.&nbsp;autorizado></td><td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td>					<input name=nombre5 id=nombre5 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;5o.&nbsp;autorizado></td><td></td>
				<td colspan=2><input name=nombre6 id=nombre6 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;6o.&nbsp;autorizado></td><td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr>
				<td></td>
				<td>					<input name=nombre7 id=nombre7 maxlength=30 type=texto style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder=Nombre&nbsp;7o.&nbsp;autorizado></td><td></td>
				<td colspan=2></td><td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<script type="text/javascript">
			var
				 c = document.getElementById('cantidad');
				n1 = document.getElementById('nombre1');
				n2 = document.getElementById('nombre2');
				n3 = document.getElementById('nombre3');
				n4 = document.getElementById('nombre4');
				n5 = document.getElementById('nombre5');
				n6 = document.getElementById('nombre6');
				n7 = document.getElementById('nombre7');
			daNO = document.getElementById('doc_ad_NO');
			document.getElementById('docum_adic_SI').addEventListener('click', function(e) {
						 c.style.display = 'none';	  c.disabled = true;
					daNO.style.display = 'none'; daNO.disabled = true;
						n1.style.display = 'none';	 n1.disabled = true;
						n2.style.display = 'none';	 n2.disabled = true;
						n3.style.display = 'none';	 n3.disabled = true;
						n4.style.display = 'none';	 n4.disabled = true;
						n5.style.display = 'none';	 n5.disabled = true;
						n6.style.display = 'none';	 n6.disabled = true;
						n7.style.display = 'none';	 n7.disabled = true;});
			document.getElementById('docum_adic_NO').addEventListener('click', function(e) {
						 c.style.display = 'block';		 c.disabled = false; c.required = true;
					daNO.style.display = 'block'; daNO.disabled = false;});
			document.getElementById('cantidad').addEventListener('blur', function(e) {
				if (c.value <= 1) {c.value = 1;
					daNO.disabled = false; daNO.style.display = 'block';
		 				n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = true; 	 n2.style.display = 'none';
						n3.disabled = true; 	 n3.style.display = 'none';
						n4.disabled = true; 	 n4.style.display = 'none';
						n5.disabled = true; 	 n5.style.display = 'none';
						n6.disabled = true; 	 n6.style.display = 'none';
						n7.disabled = true; 	 n7.style.display = 'none';};
				if (c.value == 2) {
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = true;		 n3.style.display = 'none';
						n4.disabled = true;		 n4.style.display = 'none';
						n5.disabled = true;		 n5.style.display = 'none';
						n6.disabled = true;		 n6.style.display = 'none';
						n7.disabled = true;		 n7.style.display = 'none';};
				if (c.value == 3) {
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
						n4.disabled = true;		 n4.style.display = 'none';
						n5.disabled = true;		 n5.style.display = 'none';
						n6.disabled = true;		 n6.style.display = 'none';
						n7.disabled = true;		 n7.style.display = 'none';};
				if (c.value == 4) {
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
						n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
						n5.disabled = true;		 n5.style.display = 'none';
						n6.disabled = true;		 n6.style.display = 'none';
						n7.disabled = true;		 n7.style.display = 'none';};
				if (c.value == 5) {
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
						n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
						n5.disabled = false;	 n5.style.display = 'block'; n5.required = true;
						n6.disabled = true;		 n6.style.display = 'none';
						n7.disabled = true;		 n7.style.display = 'none';};
				if (c.value == 6) {
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
						n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
						n5.disabled = false;	 n5.style.display = 'block'; n5.required = true;
						n6.disabled = false;	 n6.style.display = 'block'; n6.required = true;
						n7.disabled = true;		 n7.style.display = 'none';};
				if (c.value >= 7) {c.value = 7;
					daNO.disabled = false; daNO.style.display = 'block';
						n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
						n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
						n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
						n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
						n5.disabled = false;	 n5.style.display = 'block'; n5.required = true;
				 		n6.disabled = false;	 n6.style.display = 'block'; n6.required = true;
						n7.disabled = false;	 n7.style.display = 'block'; n7.required = true;}});
		</script>
		<br>
		<table border=0>
			<tr>
				<td width=55%><input name=aprobadorG	type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaaprobG	type=date		value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td width=19%><input name=horaaprobG	type=time		value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>APROBADOR SME</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorG				type=texto	maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorG	type=date		value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td><input name=horaemisorG		type=time		value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección H			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;H. CANCELACIÓN</b><br><span class=seccion>&nbsp;&nbsp;Certifico que el Trabajo indicado en A:</span></td></tr></table>
		<table border=0>
			<tr><td width= 5%></td><td width=95%></td></tr>
			<tr class=C>
				<td><input type=radio id=completadoSI name=completado value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=B>Ha sido completado.</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=completadoNO name=completado value=NO onclick=gestionarClickRadio(this)></td>
				<td class=B>No se ha completado y el área ha quedado en condiciones seguras.</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%></td>
				<td width=19%><input type=time name=horaejecH value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horainspH value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr>
				<td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=emisorH maxlength=30 type=texto  pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horaemisorH value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>
		<table>
			<tr height=30><td></td></tr>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td>
					<form method=post>
						<select name=usuario id=usuario type=texto required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<option style="<? if ($numero_usuarios <= 0) {echo 'display:none';} ?>" value="<? echo $usuario[0]; ?>"><? echo $usuario[0]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 1) {echo 'display:none';} ?>" value="<? echo $usuario[1]; ?>"><? echo $usuario[1]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 2) {echo 'display:none';} ?>" value="<? echo $usuario[2]; ?>"><? echo $usuario[2]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 3) {echo 'display:none';} ?>" value="<? echo $usuario[3]; ?>"><? echo $usuario[3]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 4) {echo 'display:none';} ?>" value="<? echo $usuario[4]; ?>"><? echo $usuario[4]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 5) {echo 'display:none';} ?>" value="<? echo $usuario[5]; ?>"><? echo $usuario[5]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 6) {echo 'display:none';} ?>" value="<? echo $usuario[6]; ?>"><? echo $usuario[6]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 7) {echo 'display:none';} ?>" value="<? echo $usuario[7]; ?>"><? echo $usuario[7]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 8) {echo 'display:none';} ?>" value="<? echo $usuario[8]; ?>"><? echo $usuario[8]."@primax.com.co"; ?></option>
							<option style="<? if ($numero_usuarios <= 9) {echo 'display:none';} ?>" value="<? echo $usuario[9]; ?>"><? echo $usuario[9]."@primax.com.co"; ?></option>
						</select>
					</form>
				</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?echo $fechaactual;?> / <?echo $horaactual;?></span>
		<input style=display:none type=text name=fecha value="<?echo $fechaactual;?> / <?echo $horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?echo number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=200>
				<td><input type=image src=../../../../../common/imagenes/grabar.png alt=Submit style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
				<td><a href=javascript:closed()><img src=../../../../../common/imagenes/regresar.png style="pointer-events:auto; width:100px; height:auto"></a></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href="mailto:<?echo $correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
					<img src=../../../../../common/imagenes/piedepagina_horizontal.svg style="pointer-events:auto; width:100%; height:auto">
					</a>
				</td>
			</tr>
		</table>
		<hr>
	</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->

<? if ($consec > "$ultimo_consec") {echo "system('cls');<script>setTimeout(cerrarVentana,10*60*1000); document.body.innerHTML = '$aviso_pedido';</script>";} ?>

<script type="text/javascript">
	//Para distinguir la opción actualmente pulsada en cada grupo
	var pref_opcActual ="opcActual_";
	//Verifica si una variable definida dinámicamente existe o no
	function varExiste(sNombre) {return (eval("typeof(" + sNombre + ");") !="undefined");}
	//Asigna un valor a una variable creada dinámicamente a partir de su nombre
	function asignaVar(sNombre, valor) {eval(sNombre + " =" + valor + ";");}
	//generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos
	for (f= 0; f<document.forms.length; f++) {
		for (i = 0; i< document.forms[f].elements.length; i++) {
			var eltoAct = document.forms[f].elements[i];
			var exprCrearVariable ="";
			if (eltoAct.type =="radio") {
				//Si la variable no existe la definimos siempre,pero sólo la redefinimos en caso de que el elemento actual del grupo esté asignado
				if (!varExiste(pref_opcActual + eltoAct.name) ) exprCrearVariable ="var " + pref_opcActual + eltoAct.name + " =";
					else exprCrearVariable = pref_opcActual + eltoAct.name + " =";
				//El valor será nulo o una referencia al radio actual en función de su está seleccionado o no
				if(eltoAct.checked) exprCrearVariable +="document.getElementById('" + eltoAct.id + "')";
					else exprCrearVariable +="null";
				//Definimos la variable y asignamos el valor sólo si no existe o si el radio actual está marcado 
				if ( !varExiste(pref_opcActual + eltoAct.name) || eltoAct.checked) eval(exprCrearVariable);}}}

	function gestionarClickRadio(opcPulsada) {
		//El nombre de la variable que contiene el nombre del grupo actual
		var svarOpcAct = pref_opcActual + opcPulsada.name;
		var opcActual = null;
		opcActual = eval(svarOpcAct);	//recupero dinámicamente una referencia al último radio pulsado de este grupo
			if (opcActual == opcPulsada) {
		opcPulsada.checked = false; //deselecciono
		asignaVar(svarOpcAct, "null");}	//y quito referencia (es como si nunca se hubiera pulsado)
				else {asignaVar(svarOpcAct, "document.getElementById('" + opcPulsada.id + "')");}}	//Anoto la última opción pulsada de este grupo
</script>

<!-- script para css select option -->
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
	selElmnt = x[i].getElementsByTagName("select")[0];
	ll = selElmnt.length;
	/*for each element, create a new DIV that will act as the selected item:*/
	a = document.createElement("DIV");
	a.setAttribute("class", "select-selected");
	a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	x[i].appendChild(a);
	/*for each element, create a new DIV that will contain the option list:*/
	b = document.createElement("DIV");
	b.setAttribute("class", "select-items select-hide");
	for (j = 1; j < ll; j++) {
		/*for each option in the original select element,
		create a new DIV that will act as an option item:*/
		c = document.createElement("DIV");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.addEventListener("click", function(e) {
				/*when an item is clicked, update the original select box,
				and the selected item:*/
				var y, i, k, s, h, sl, yl;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				sl = s.length;
				h = this.parentNode.previousSibling;
				for (i = 0; i < sl; i++) {
					if (s.options[i].innerHTML == this.innerHTML) {
						s.selectedIndex = i;
						h.innerHTML = this.innerHTML;
						y = this.parentNode.getElementsByClassName("same-as-selected");
						yl = y.length;
						for (k = 0; k < yl; k++) {
							y[k].removeAttribute("class");
						}
						this.setAttribute("class", "same-as-selected");
						break;
					}
				}
				h.click();
		});
		b.appendChild(c);
	}
	x[i].appendChild(b);
	a.addEventListener("click", function(e) {
			/*when the select box is clicked, close any other select boxes,
			and open/close the current select box:*/
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
		});
}
function closeAllSelect(elmnt) {
	/*a function that will close all select boxes in the document,
	except the current select box:*/
	var x, y, i, xl, yl, arrNo = [];
	x = document.getElementsByClassName("select-items");
	y = document.getElementsByClassName("select-selected");
	xl = x.length;
	yl = y.length;
	for (i = 0; i < yl; i++) {
		if (elmnt == y[i]) {
			arrNo.push(i)
		} else {
			y[i].classList.remove("select-arrow-active");
		}
	}
	for (i = 0; i < xl; i++) {
		if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
		}
	}
}
/*if the user clicks anywhere outside the select box, then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<!-- *****************************************			 FIN DES-SELECCIONAR INPUT radio			 ***************************************** -->
</form>
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
