<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
</script>
<body style="margin-top:0px; margin-left: 0vw; width:100vw; font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** -->
<div class="noimprimir">
<!-- inicio del php para editar el formato -->
<? echo "
<div class=fijar style='top:15px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
</div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw'>
		<table style='background-color:rgba(255,255,255,1); width:100%' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:100%; display:inline-block; font-size:36px'><b>"; echo $$formulario; echo "</b></span>
				</td>
				<td style='font-family:SCHLBKB; font-size:35px; color:red'>
					";	if ($row['consecutivo'] < 9) {echo '&#8470; 00000'; echo $row['consecutivo'];}
								else if ($row['consecutivo'] < 99) {echo '&#8470; 0000'; echo $row['consecutivo'];}
									else if ($row['consecutivo'] < 999) {echo '&#8470; 000'; echo $row['consecutivo'];}
										else if ($row['consecutivo'] < 9999) {echo '&#8470; 00'; echo $row['consecutivo'];}
											else if ($row['consecutivo'] < 99999) {echo '&#8470; 0'; echo $row['consecutivo'];}
												else {echo '&#8470; '; echo $row['consecutivo'];} echo "
					<input name='consecutivo' type='text' value='$row[consecutivo]' style='display:none' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style='font-size:20.00px'>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.</span><br>
					<span style='font-size:20.00px'>ESTE PERMISO ES VÁLIDO POR UN TURNO O MÁXIMO 12 HORAS.</span><br>
					<span style='font-size:19.35px'>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 - TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>
		<table width=80% border=0>
			<tr><td width=80%></td><td width=20%></td></tr>
			<tr>
				<td style='vertical-align:bottom'>INSTALACIÓN
					<textarea name=instalacion type=texto maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus>$row[instalacion]</textarea>
				</td>
				<td style='vertical-align:bottom'>
					CERTIFICADO &#8470;<br><input name=certificado value='$row[certificado]' class=consecutivo maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required>
				</td>
			</tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border:0>
			<tr><td width=17%></td><td width=25%></td><td width=16%></td><td width=25%></td><td width=17%></td></tr>
			<tr><td class=B colspan=5><b>A. TAREA A REALIZAR</b></td></tr>
			<tr>
				<td colspan=5 width=100%>UBICACIÓN
					<textarea name=ubicacion type=texto maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[ubicacion]</textarea>
				</td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td>APT<br><input name=apt class=consecutivo value='$row[apt]' maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$' required></td>
				<td></td>
				<td>EQUIPO<br><input name=equipo class=consecutivo value='$row[equipo]' maxlength=10 type=text inputmode=numeric pattern='^(?:[0-9]{4,10})$' required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border:0>
			<tr><td width=4.75%></td><td width=27%></td><td width=4.75%></td><td width=27%></td><td width=4.75%></td><td width=27%></td><td width=4.75%></td></tr>
			<tr>
				<td></td>
				<td>FECHA<input name=fechaA type=date value='$row[fechaA]' min='$row[fechaA]' max='$row[fechaA]' required></td>
				<td></td>
				<td>HORA INICIAL<input name=horainicioA type=time value='$row[horainicioA]' required></td>
				<td></td>
				<td>HORA FINAL<input name=horafinalA type=time value='$row[horafinalA]' required></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td colspan=11>DESCRIPCIÓN<textarea name=descripcion type=texto maxlength=74 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion]</textarea></td>
			</tr>
		</table>
		<hr>
		
		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=40%></td><td width= 4%></td><td width= 9%><td width=47%></td></tr>
			<tr><td colspan=4 class=B><b>B. ADMINISTRACIÓN DE CAMBIOS</b></td></tr>
			<tr class=C>
				<td rowspan=2 class=Br>Este trabajo genera un &nbsp;</td>
				<td><input type=radio name=cambio id=cambioA value='CME' "; if ($row['cambio'] == 'CME') {echo 'checked';} echo " required></td>
				<td colspan=2 class=B>&nbsp;Cambio de la misma especie<br>&nbsp;ó no hay cambio.</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=cambio id=cambioB value='CDE' "; if ($row['cambio'] == 'CDE') {echo 'checked';} echo "></td>
				<td colspan=2 class=B>&nbsp;Cambio de diferente especie.</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=2><input name=pedidocambio id=pedidocambio value='$row[pedidocambio]' style='"; if ($row['cambio'] == 'CDE') {echo 'display:block;';} else {echo 'display:none;';} echo "; text-align:center' class=consecutivo maxlength=6 pattern='^(?:[0-9]{4,6})$' inputmode=numeric></td>
				<td><span id=pedido style='"; if ($row['cambio'] == 'CDE') {echo 'display:block;';} else {echo 'display:none;';} echo " font-size:32px; text-align:left'>&nbsp;&nbsp;&#8470; Pedido de Cambio</span></td>
			</tr>
		</table>
		<script>
		var pedidocambio = document.getElementById('pedidocambio'); pedido = document.getElementById('pedido');
			document.getElementById('cambioA').addEventListener('click', function(e) {pedidocambio.disabled=true;  pedidocambio.style.display='none';  pedidocambio.required=false; pedido.disabled=true;  pedido.style.display='none';  pedido.required=false});
			document.getElementById('cambioB').addEventListener('click', function(e) {pedidocambio.disabled=false; pedidocambio.style.display='block'; pedidocambio.required=true;  pedido.disabled=false; pedido.style.display='block'; pedido.required=true });
		</script>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width= 5%></td><td width= 5%></td><td width= 8%></td><td width=82%></td></tr>
			<tr class=C>
				<td class=B colspan=4><b>C. IDENTIFICACIÓN DEL RIESGO</b><br><span>(Consultar el manual de Permisos de Trabajo para mayor claridad)</span></td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style='background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center'><b><br>IDENTIFICACIÓN DEL RIESGO</b></td>
			</tr>
			<tr class=C>
				<td>SI</td><td>NO</td><td colspan=2></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C1 name=C1 value=SI "; if ($row['C1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c1 name=C1 value=NO "; if ($row['C1'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>1.</td><td class=B>Todas las personas tienen inducción SHE vigente?<span>(menor a 1 año)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C2 name=C2 value=SI "; if ($row['C2'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c2 name=C2 value=NO "; if ($row['C2'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>2.</td><td class=B>Trabajo en áreas clasificadas<br><span>(Clase 1 Div.I ó Div.II)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C3 name=C3 value=SI "; if ($row['C3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c3 name=C3 value=NO "; if ($row['C3'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>3.</td><td class=B>Trabajos en o adyacentes a un Llenadero?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C4 name=C4 value=SI "; if ($row['C4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c4 name=C4 value=NO "; if ($row['C4'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>4.</td><td class=B>Entrada o Salida bloqueados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C5 name=C5 value=SI "; if ($row['C5'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c5 name=C5 value=NO "; if ($row['C5'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>5.</td><td class=B>Ingreso a Espacios Confinados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C6 name=C6 value=SI "; if ($row['C6'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c6 name=C6 value=NO "; if ($row['C6'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>6.</td><td class=B>Trabajo en Alturas<br><span>(Posible caída >2mt / 6ft [Colombia: 1.5mt / 5ft)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C7 name=C7 value=SI "; if ($row['C7'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c7 name=C7 value=NO "; if ($row['C7'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>7.</td><td class=B>Trabajos en Procesos de líneas de producto de Control o Instrumentos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C8 name=C8 value=SI "; if ($row['C8'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c8 name=C8 value=NO "; if ($row['C8'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>8.</td><td class=B>Se desactivará algún Equipo Crítico?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C9 name=C9 value=SI "; if ($row['C9'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c9 name=C9 value=NO "; if ($row['C9'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>9.</td><td class=B>Se afectan otros Sistemas Operacionales no-Críticos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C10 name=C10 value=SI "; if ($row['C10'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c10 name=C10 value=NO "; if ($row['C10'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>10.</td><td class=B>Exposición al Movimiento de Vehículos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C11 name=C11 value=SI "; if ($row['C11'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c11 name=C11 value=NO "; if ($row['C11'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>11.</td><td class=B>Manejo de Cargas con Grúas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C12 name=C12 value=SI "; if ($row['C12'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c12 name=C12 value=NO "; if ($row['C12'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>12.</td><td class=B>Trabajo en Objetos Potencialmente Inestables?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C13 name=C13 value=SI "; if ($row['C13'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c13 name=C13 value=NO "; if ($row['C13'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>13.</td><td class=B>Trabajo sobre el Agua?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C14 name=C14 value=SI "; if ($row['C14'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c14 name=C14 value=NO "; if ($row['C14'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>14.</td><td class=B>Trabajo Subacuático?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C15 name=C15 value=SI "; if ($row['C15'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c15 name=C15 value=NO "; if ($row['C15'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>15.</td><td class=B>Limpieza con Chorro de Agua a Presión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C16 name=C16 value=SI "; if ($row['C16'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c16 name=C16 value=NO "; if ($row['C16'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>16.</td><td class=B>Radiografías o Fuentes de Radiación similares?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style='background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center'><b><br>EXCAVACIÓN</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C17 name=C17 value=SI "; if ($row['C17'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c17 name=C17 value=NO "; if ($row['C17'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>17.</td><td class=B>Excavación Manual a más de 23 cms?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C18 name=C18 value=SI "; if ($row['C18'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c18 name=C18 value=NO "; if ($row['C18'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>18.</td><td class=B>Excavación con Máquina, cualquier profundidad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C19 name=C19 value=SI "; if ($row['C19'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c19 name=C19 value=NO "; if ($row['C19'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>19.</td><td class=B>Inserción de Estacas en el terreno?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style='background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center'><b><br>SUSTANCIAS PELIGROSAS</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C20 name=C20 value=SI "; if ($row['C20'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c20 name=C20 value=NO "; if ($row['C20'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>20.</td><td class=B>Manejo/Exposición a Sustancias Peligrosas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C21 name=C21 value=SI "; if ($row['C21'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c21 name=C21 value=NO "; if ($row['C21'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>21.</td><td class=B>Exposición a Productos con Plomo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C22 name=C22 value=SI "; if ($row['C22'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c22 name=C22 value=NO "; if ($row['C22'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>22.</td><td class=B>Si respondió si a las anteriores, revisó las MSDS?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style='background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center'><b><br>FUENTES DE IGNICIÓN</b></td>
			</tr>
			<tr class=C>
				<td>SI</td><td>NO</td><td colspan=2></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C23 name=C23 value=SI "; if ($row['C23'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c23 name=C23 value=NO "; if ($row['C23'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>23.</td><td class=B>Fuentes de Ignición<br><span>(chispas, llamas, calor >200°C, etc.)?</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C24 name=C24 value=SI "; if ($row['C24'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c24 name=C24 value=NO "; if ($row['C24'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>24.</td><td class=B>Trabajo con Equipo de Oxiacetileno?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C25 name=C25 value=SI "; if ($row['C25'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c25 name=C25 value=NO "; if ($row['C25'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>25.</td><td class=B>Uso de Equipos con Motor de Combustión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C26 name=C26 value=SI "; if ($row['C26'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c26 name=C26 value=NO "; if ($row['C26'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>26.</td><td class=B>Uso de Equipos / Herramientas Eléctricos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C27 name=C27 value=SI "; if ($row['C27'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c27 name=C27 value=NO "; if ($row['C27'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>27.</td><td class=B>Uso de Maquinaria de Percusión?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C28 name=C28 value=SI "; if ($row['C28'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c28 name=C28 value=NO "; if ($row['C28'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>28.</td><td class=B>SandBlasting / Granallado / WetBlasting?</td>
			</tr>
			<tr class=C>
				<td class=B colspan=4 style='background-color:rgba(255,112,0,1); color:rgba(255,255,255,1); text-align:center'><b><br>ENERGÍAS PELIGROSAS</b></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C29 name=C29 value=SI "; if ($row['C29'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c29 name=C29 value=NO "; if ($row['C29'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>29.</td><td class=B>Aislamiento Eléctrico de Equipos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C30 name=C30 value=SI "; if ($row['C30'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c30 name=C30 value=NO "; if ($row['C30'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>30.</td><td class=B>Trabajos en Sistemas Eléctricos Energizados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C31 name=C31 value=SI "; if ($row['C31'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c31 name=C31 value=NO "; if ($row['C31'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>31.</td><td class=B>Desacople Mecánico de Equipos?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C32 name=C32 value=SI "; if ($row['C32'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c32 name=C32 value=NO "; if ($row['C32'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>32.</td><td class=B>Trabajos a Sistemas Presurizados o pruebas de Presión de Equipos?
			</tr>
			<tr class=C>
				<td><input type=radio id=C33 name=C33 value=SI "; if ($row['C33'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c33 name=C33 value=NO "; if ($row['C33'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>33.</td><td class=B>Temperaturas Peligrosas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C34 name=C34 value=SI "; if ($row['C34'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c34 name=C34 value=NO "; if ($row['C34'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>34.</td><td class=B>La labor requiere consultar al SME?<br><span>(ver respaldo)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C35 name=C35 value=SI "; if ($row['C35'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c35 name=C35 value=NO "; if ($row['C35'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>35.</td><td class=B>Se revisaron los procedimientos de seguridad que apliquen?<br><span>(Ver listado en Manual de Permisos de Trabajo)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio id=C36 name=C36 value=SI "; if ($row['C36'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio id=c36 name=C36 value=NO "; if ($row['C36'] == 'NO') {echo 'checked';} echo "></td>
				<td class=numero>36.</td><td class=B>El trabajo requiere de un plan específico de emergencia?</td>
			</tr>
			<tr class=C><td></td></tr>
			<tr class=C><td colspan=4>OTRAS ACTIVIDADES NO MENCIONADAS ARRIBA:</td></tr>
			<tr class=C>
				<td colspan=4>
					<textarea name=otrasactividades type=texto maxlength=63 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[otrasactividades]</textarea>
				</td>
			</tr>
		</table>
		<hr>

	<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=13%></td><td width=5%></td><td width=82%></td></tr>
			<tr><td class=B colspan=3><b>D. DOCUMENTACION ADICIONAL</b><br><span>(Según lo encontrado en la Sección C.)</span></td></tr>
			<tr class=D><td class=B colspan=2>Permiso</td><td class=B>DOCUMENTO</td></tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D1'] != 'on') {echo 'display:none';} echo "' id='numeroD1' name='numeroD1'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D1'] = 'on') {echo $row['numeroD1'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D1 type=checkbox id=D1 onChange=comprobarD1(this) "; if ($row[52] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso Trabajo en Frío en Espacio NO Confinado</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D2'] != 'on') {echo 'display:none';} echo "' id='numeroD2' name='numeroD2'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D2'] = 'on') {echo $row['numeroD2'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D2 type=checkbox id=D2 onChange=comprobarD2(this) "; if ($row[54] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso Trabajo en Caliente en Espacio NO Confinado</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D3'] != 'on') {echo 'display:none';} echo "' id='numeroD3' name='numeroD3'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D3'] = 'on') {echo $row['numeroD3'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D3 type=checkbox id=D3 onChange=comprobarD3(this) "; if ($row[56] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso Trabajo en Frío en Espacio Confinado</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D4'] != 'on') {echo 'display:none';} echo "' id='numeroD4' name='numeroD4'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D4'] = 'on') {echo $row['numeroD4'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D4 type=checkbox id=D4 onChange=comprobarD4(this) "; if ($row[58] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso Trabajo en Caliente en Espacio Confinado</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D5'] != 'on') {echo 'display:none';} echo "' id='numeroD5' name='numeroD5'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D5'] = 'on') {echo $row['numeroD5'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D5 type=checkbox id=D5 onChange=comprobarD5(this) "; if ($row[60] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso de Aislamiento de Energía</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D6'] != 'on') {echo 'display:none';} echo "' id='numeroD6' name='numeroD6'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D6'] = 'on') {echo $row['numeroD6'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D6 type=checkbox id=D6 onChange=comprobarD6(this) "; if ($row[62] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Autorización de Excavación</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D7'] != 'on') {echo 'display:none';} echo "' id='numeroD7' name='numeroD7'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D7'] = 'on') {echo $row['numeroD7'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D7 type=checkbox id=D7 onChange=comprobarD7(this) "; if ($row[64] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Verificación de Equipos con Motor de Combustión</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D8'] != 'on') {echo 'display:none';} echo "' id='numeroD8' name='numeroD8'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D8'] = 'on') {echo $row['numeroD8'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D8 type=checkbox id=D8 onChange=comprobarD8(this) "; if ($row[66] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso para Trabajos Eléctricos</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D9'] != 'on') {echo 'display:none';} echo "' id='numeroD9' name='numeroD9'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D9'] = 'on') {echo $row['numeroD9'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D9 type=checkbox id=D9 onChange=comprobarD9(this) "; if ($row[68] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso de Trabajo con Radiaciones Ionizantes</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D10'] != 'on') {echo 'display:none';} echo "' id='numeroD10' name='numeroD10'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D10'] = 'on') {echo $row['numeroD10'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D10 type=checkbox id=D10 onChange=comprobarD10(this) "; if ($row[70] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Permiso de Trabajo en Alturas</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D11'] != 'on') {echo 'display:none';} echo "' id='numeroD11' name='numeroD11'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D11'] = 'on') {echo $row['numeroD11'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D11 type=checkbox id=D11 onChange=comprobarD11(this) "; if ($row[72] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Verificación de Equipo de Oxiacetileno</td>
			</tr>
			<tr class=D>
				<td class=check>
					<input style='width:100%; "; if ($row['D12'] != 'on') {echo 'display:none';} echo "' id='numeroD12' name='numeroD12'
					class=consecutivo maxlength=6 type=text inputmode=numeric pattern='^(?:[0-9]{4,6})$'
					value='"; if ($row['D12'] = 'on') {echo $row['numeroD12'];} else {echo '';} echo "'>
				</td>
				<td class=check>
					<input name=D12 type=checkbox id=D12 onChange=comprobarD12(this) "; if ($row[74] == 'on') {echo 'checked';} echo ">
				</td>
				<td class=B>Verificación previa al levantamiento con grúa</td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table>
			<tr><td class=B><b>E. PRECAUCIONES ADICIONALES</b></td></tr>
			<tr>
				<td><textarea name=precauciones type=texto maxlength=90 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}>$row[precauciones]</textarea></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table>
			<tr>
				<td class=B><b>F. ACEPTACIÓN</b><br><span class=seccion>&#9679;&nbsp;Confirmo que la tarea definida en la sección A está especificada en la sección C de este certificado y que no se ejecutará ninguna otra tarea sin autorización previa.&nbsp;&nbsp;He leído y comprendo a conciencia las restricciones impuestas por este certificado y documentos asociados, e instruiré adecuadamente a todo el personal bajo mi control.</span></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=46%></td><td width=49%></td></tr>
			<tr class=C>
				<td><input name=empleado id=empleadop type=radio value='E' "; if ($row['empleado'] == 'E') {echo 'checked';} echo " required></td>
				<td colspan=2 class=B>EMPLEADO</td>
			</tr>
			<tr class=C>
				<td><input name=empleado id=empleadocp type=radio value='CP' "; if ($row['empleado'] == 'CP') {echo 'checked';} echo "></td>
				<td class=B>CONTRATISTA PERMANENTE </td>
				<td><input name=companiacp id=companiacp type=texto value='$row[companiacp]' style='"; if ($row['empleado'] == 'CP') {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<script>
			var companiacp = document.getElementById('companiacp');
			document.getElementById('empleadop').addEventListener('click', function(e) {companiacp.disabled = true; companiacp.style.display = 'none'; companiacp.required = false;});
			document.getElementById('empleadocp').addEventListener('click', function(e) {companiacp.disabled = false; companiacp.style.display = 'block'; companiacp.required = true;});
		</script>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorF		value='$row[ejecutorF]'		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaejecF	value='$row[fechaejecF]'	type=date min='"; echo $fechamin; echo"' max='"; echo $fechamax; echo "' required></td>
				<td width=19%><input name=horaejecF		value='$row[horaejecF]'		type=time required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=40px><td></td><td></td><td></td></tr>
			<tr>
				<td><input name=inspectorF	value='$row[inspectorF]'	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspF	value='$row[fechainspF]'	type=date min='"; echo $fechamin; echo"' max='"; echo $fechamax; echo "' value='' required></td>
				<td><input name=horainspF		value='$row[horainspF]'		type=time required></td>
			</tr>
			<tr><td>INSPECTOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección G			 ***************************************** -->
		<table><tr><td class=B><b>G. AUTORIZACIÓN</b><br><span class=seccion>Marque una de las casillas, según corresponda:</span></td></tr></table>
		<table border=0>
			<tr class=C>
				<td width= 5%><input type=radio id=docum_adic_SI name=docum_adic value=SI "; if ($row['docum_adic'] == 'SI') {echo 'checked';} echo " required></td>
				<td colspan=2 width=95% class=B>Se requiere documentación adicional. Para cada tarea se deberá diligenciar y aprobar previamente la documentación indicada en la Sección D.</td>
			</tr>
			<tr height=30px><td></td></tr>
			<tr class=C>
				<td><input type=radio id=docum_adic_NO name=docum_adic value=NO "; if ($row['docum_adic'] == 'NO') {echo 'checked';} echo "></td>
				<td colspan=2 class=B>No se requiere documentación adicional. Por lo tanto, se autoriza la realización de este trabajo con este único certificado, formato de control de interfases y el ATS.</td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=77%></td><td width=13%></td><td width= 5%></td></tr>
			<tr>
				<td></td>
				<td class=B><span style='"; if ($row['docum_adic'] == 'NO') {echo 'display:inline-block;';} else {echo 'display:none;';} echo " width:100%; font-size:32px' id=doc_ad_NO>Cantidad de personas autorizadas para el trabajo:</span></td>
				<td><input name=cantidad id=cantidad style='width:50%; "; if ($row['docum_adic'] == 'NO') {echo 'display:block;';} else {echo 'display:none;';} echo " text-align:center' value='$row[cantidad]' maxlength=1 type=text inputmode=numeric pattern='^(?:[1-7]{1})$'></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width= 5%></td><td width=44%></td><td width= 2%></td><td width=39%></td><td width= 5%></td><td width= 5%></td></tr>
			<tr>
				<td></td>
				<td>					<input name=nombre1 id=nombre1 value='$row[nombre1]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 1) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td colspan=2><input name=nombre2 id=nombre2 value='$row[nombre2]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 2) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
			<tr>
				<td></td>
				<td>					<input name=nombre3 id=nombre3 value='$row[nombre3]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 3) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td colspan=2><input name=nombre4 id=nombre4 value='$row[nombre4]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 4) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
			<tr>
				<td></td>
				<td>					<input name=nombre5 id=nombre5 value='$row[nombre5]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 5) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td colspan=2><input name=nombre6 id=nombre6 value='$row[nombre6]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 6) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
			<tr>
				<td></td>
				<td>					<input name=nombre7 id=nombre7 value='$row[nombre7]' maxlength=30 type=texto style='background-color:rgba(0,255,0,0.1); "; if ($row['cantidad'] < 7) {echo 'display:none';} else {echo 'display:block';} echo "' pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td colspan=2></td><td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<script>
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
			n = document.getElementById('nombres');
			document.getElementById('docum_adic_SI').addEventListener('click', function(e) {
				 c.style.display = 'none';  c.disabled = true;
				n1.style.display = 'none'; n1.disabled = true;
				n2.style.display = 'none'; n2.disabled = true;
				n3.style.display = 'none'; n3.disabled = true;
				n4.style.display = 'none'; n4.disabled = true;
				n5.style.display = 'none'; n5.disabled = true;
				n6.style.display = 'none'; n6.disabled = true;
				n7.style.display = 'none'; n7.disabled = true;
				daNO.style.display = 'none'; daNO.disabled = true;});
				document.getElementById('docum_adic_NO').addEventListener('click', function(e) {c.disabled = false; c.style.display = 'block'; c.required = true; daNO.disabled = false; daNO.style.display = 'block'});
				document.getElementById('cantidad').addEventListener('blur', function(e) {
					if (c.value <= 1) {c.value = 1;
	 					n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = true; n2.style.display = 'none';
						n3.disabled = true; n3.style.display = 'none';
						n4.disabled = true; n4.style.display = 'none';
						n5.disabled = true; n5.style.display = 'none';
						n6.disabled = true; n6.style.display = 'none';
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block';};
					if (c.value == 2) {
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = true; n3.style.display = 'none';
						n4.disabled = true; n4.style.display = 'none';
						n5.disabled = true; n5.style.display = 'none';
						n6.disabled = true; n6.style.display = 'none';
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block'};
					if (c.value == 3) {
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = false; n3.style.display = 'block'; n3.required = true;
						n4.disabled = true; n4.style.display = 'none';
						n5.disabled = true; n5.style.display = 'none';
						n6.disabled = true; n6.style.display = 'none';
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block'};
					if (c.value == 4) {
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = false; n3.style.display = 'block'; n3.required = true;
						n4.disabled = false; n4.style.display = 'block'; n4.required = true;
						n5.disabled = true; n5.style.display = 'none';
						n6.disabled = true; n6.style.display = 'none';
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block'};
					if (c.value == 5) {
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = false; n3.style.display = 'block'; n3.required = true;
						n4.disabled = false; n4.style.display = 'block'; n4.required = true;
						n5.disabled = false; n5.style.display = 'block'; n5.required = true;
						n6.disabled = true; n6.style.display = 'none';
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block'};
					if (c.value == 6) {
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = false; n3.style.display = 'block'; n3.required = true;
						n4.disabled = false; n4.style.display = 'block'; n4.required = true;
						n5.disabled = false; n5.style.display = 'block'; n5.required = true;
						n6.disabled = false; n6.style.display = 'block'; n6.required = true;
						n7.disabled = true; n7.style.display = 'none';
						daNO.disabled = false; daNO.style.display = 'block'};
					if (c.value >= 7) {c.value = 7;
						n1.disabled = false; n1.style.display = 'block'; n1.required = true;
						n2.disabled = false; n2.style.display = 'block'; n2.required = true;
						n3.disabled = false; n3.style.display = 'block'; n3.required = true;
						n4.disabled = false; n4.style.display = 'block'; n4.required = true;
						n5.disabled = false; n5.style.display = 'block'; n5.required = true;
				 		n6.disabled = false; n6.style.display = 'block'; n6.required = true;
						n7.disabled = false; n7.style.display = 'block'; n7.required = true;
						daNO.disabled = false; daNO.style.display = 'block'}});
		</script>
		<table border=0>
			<tr>
				<td width=55%><input name=aprobadorG	value='$row[aprobadorG]'	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%><input name=fechaaprobG	value='$row[fechaaprobG]'	type=date min='"; echo $fechamin; echo"' max='"; echo $fechamax; echo"' value= required></td>
				<td width=19%><input name=horaaprobG	value='$row[horaaprobG]'	type=time required></td>
			</tr>
			<tr><td>APROBADOR SME</td><td>FECHA</td><td>HORA</td></tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td><input name=emisorG				value='$row[emisorG]'				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorG	value='$row[fechaemisorG]'	type=date min='"; echo $fechamin; echo"' max='"; echo $fechamax; echo"' value= required></td>
				<td><input name=horaemisorG		value='$row[horaemisorG]'		type=time required></td>
			</tr>
			<tr><td>EMISOR</td><td>FECHA</td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección H			 ***************************************** -->
		<table><tr><td class=B><b>H. CANCELACIÓN</b><br><span class=seccion>Certifico que el Trabajo indicado en A:</span></td></tr></table>
		<table border=0>
			<tr class=C>
				<td style='width: 5%'><input type=radio id=completadoSI name=completado value=SI "; if ($row['completado'] == 'SI') {echo 'checked';} echo " required></td>
				<td style='width:95%' class=B>Ha sido completado.</td>
			</tr>
			<tr class=C>
				<td><input type=radio id=completadoNO name=completado value=NO "; if ($row['completado'] == 'NO') {echo 'checked';} echo "></td>
				<td class=B>No se ha completado y el área ha quedado en condiciones seguras.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=55%><input name=ejecutorH value='$row[ejecutorH]' maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td width=26%></td>
				<td width=19%><input type=time name=horaejecH value='$row[horaejecH]' required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td><input name=inspectorH value='$row[inspectorH]' maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horainspH value='$row[horainspH]' required></td>
			</tr>
			<tr>
				<td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30px><td></td></tr>
			<tr>
				<td><input name=emisorH value='$row[emisorH]' maxlength=30 type=texto pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td></td>
				<td><input type=time name=horaemisorH value='$row[horaemisorH]' required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
		</table>
		<table>
			<tr><td><hr></td></tr>
			<tr><td style='font-size:36px; font-family:Arlrdbd; color:rgba(0,0,191,1)'>RESPONSABLE DEL FORMATO<br>$row[usuario]@primax.com.co</td></tr>
			<tr><td><input name=usuario value='$row[usuario]' style='display:none'></td></tr>
			<tr><td><hr></td></tr>
		</table>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style='font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)'>Fecha edición: "; echo $fechahoy; echo "</span>
		<input style='display:none; width:3.10cm' type=text id=fecha name=fecha value='$row[fecha]' readonly><br>
<!--		<span style='font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)'>Quedan "; echo number_format($consec_por_usar,0,',','.'); echo " consecutivos, incluido este.</span><br> -->
		<table width=100% border=0>
			<tr height=200>
				<td>
					<div style='position:relative; left:0%; margin-left:0; top:50px; background-color:rgba(0,0,255,0)'>
						<img style='width:auto; height:100px' src='../../../../../common/imagenes/editar.png'>
					</div>
					<div style='position:relative; left:0%; margin-left:25; top:-50px; background-color:rgba(0,255,0,0)'>
						<input style='font-weight:bold; font-size:14px; height:100px; width:auto; background-color:rgba(255,0,255,0);
						color:rgba(0,255,255,0); border:0px solid rgba(0,255,255,0); border-radius:0px; text-align:center; cursor:pointer'
						type='submit' name='modificar' value='&nbsp;&nbsp;MODIFICAR&nbsp;&nbsp;' title='Modificar un consecutivo'>
					</div>
				</td>
				<td>
					<a href='javascript:closed()'>
					<img src='../../../../../common/imagenes/regresar.png' style='pointer-events:auto; width:100px; height:auto'>
					</a>
				</td>
			</tr>
		</table>
		<table width=100% border=0>
			<tr><td colspan=2><hr size=1px style='width:100%; border-top:3px solid rgba(255,112,0,1)'></td></tr>
			<tr>
				<td><span style='font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)'>REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href='mailto:"; echo $correo_pedidos; echo "?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo'>
					<img src='../../../../../common/imagenes/piedepagina_horizontal.svg' style='pointer-events:auto; width:100%; height:auto'>
					</a>
				</td>
			</tr>
		</table>
		<hr>
	</div>
</form>

"; ?>		<!-- cierre del php que se usa para editar el formato -->
</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
