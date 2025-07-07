<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
	td.C			{font-size:30px; text-align:left; font-weight:bold}
	td.Cn			{font-size:30px; text-align:right}
	td.Cp			{font-size:30px; text-align:left; padding:0 5}
	tr.C			{height: 85px; vertical-align:middle}
	tr.Cn			{height:180px; vertical-align:middle}
	tr.Cn0		{height:111px; vertical-align:top}
	tr.Cn1		{height: 54px; vertical-align:top}
	tr.Cn2		{height: 82px; vertical-align:top}
	tr.Cn3		{height:118px; vertical-align:top}
	tr.Cn4		{height:154px; vertical-align:top}
	tr.Cn5		{height:190px; vertical-align:top}
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
	function f1a() {document.getElementById("fechaB1a").value = document.getElementById("fechaB1").value;}
	function f2a() {document.getElementById("fechaB2a").value = document.getElementById("fechaB2").value;}
	function f3a() {document.getElementById("fechaB3a").value = document.getElementById("fechaB3").value;}
	function f4a() {document.getElementById("fechaB4a").value = document.getElementById("fechaB4").value;}
	function f5a() {document.getElementById("fechaB5a").value = document.getElementById("fechaB5").value;}
	function f6a() {document.getElementById("fechaB6a").value = document.getElementById("fechaB6").value;}
	function f1b() {document.getElementById("fechaB1b").value = document.getElementById("fechaB1").value;}
	function f2b() {document.getElementById("fechaB2b").value = document.getElementById("fechaB2").value;}
	function f3b() {document.getElementById("fechaB3b").value = document.getElementById("fechaB3").value;}
	function f4b() {document.getElementById("fechaB4b").value = document.getElementById("fechaB4").value;}
	function f5b() {document.getElementById("fechaB5b").value = document.getElementById("fechaB5").value;}
	function f6b() {document.getElementById("fechaB6b").value = document.getElementById("fechaB6").value;}
</script>
<body style="margin-top:0px; margin-left: 0vw; width:100vw; font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<!-- 1 --> <div class="noimprimir">
<!-- inicio del php para editar el formato -->
<? echo "
<!-- 2 --> <div class=fijar style='top:30px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:7670px; overflow:hidden'>
		<table style='color:black; background-color:rgba(255,255,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:100%; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
				</td>
				<td style='font-family:SCHLBKB; font-size:35px; color:red; background-color:white'>
					";	if ($row['consecutivo'] < 9) {echo '&#8470; 00000'; echo $row['consecutivo'];}
								else if ($row['consecutivo'] < 99) {echo '&#8470; 0000'; echo $row['consecutivo'];}
									else if ($row['consecutivo'] < 999) {echo '&#8470; 000'; echo $row['consecutivo'];}
										else if ($row['consecutivo'] < 9999) {echo '&#8470; 00'; echo $row['consecutivo'];}
											else if ($row['consecutivo'] < 99999) {echo '&#8470; 0'; echo $row['consecutivo'];}
												else {echo '&#8470; '; echo $row['consecutivo'];} echo "
					<input name='consecutivo' type='text' value='$row[consecutivo]' style='display:none' readonly><br>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style='font-size:20.00px'>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO PARA DESARROLLAR ESTE FORMATO</span><br>
					<span style='font-size:20.00px'>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA, SE SUSPENDEN ACTIVIDADES Y SE DIRIGEN AL PUNTO DE ENCUENTRO.&nbsp;&nbsp;HASTA QUE EL EMISOR DETERMINE EL REINICIO O CANCELACIÓN DE LAS ACTIVIDADES</span><br>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td class=B colspan=2><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr>
				<td class=B style=text-align:center>TRABAJO EN CALIENTE&nbsp;<input name=tipo_trabajo type=radio value=C "; if ($row['tipo_trabajo'] == 'C') {echo 'checked';} echo " required></td>
				<td class=B style=text-align:center><input name=tipo_trabajo type=radio value=F "; if ($row['tipo_trabajo'] == 'F') {echo 'checked';} echo ">&nbsp;TRABAJO EN FRÍO</td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr><td>&nbsp;&nbsp;DESCRIPCIÓN</td><td>&nbsp;&nbsp;UBICACIÓN</td></tr>
			<tr>
				<td><textarea name=descripcion maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion]</textarea></td>
				<td><textarea name=ubicacion	 maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required>$row[ubicacion]	</textarea></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30><td width=36%></td><td width=1%></td><td width=32%></td><td width=1%></td><td width=30%></td></tr>
			<tr><td>CERTIFICADO<br>GAS FREE</td><td></td><td>CERTIF. LIBRE PLOMO<br>(Interior tanque)</td><td></td><td>PROCEDIMIENTO/<br>APT</td></tr>
			<tr>
				<td><input name=certificado_gas_free		value='$row[certificado_gas_free]'		class=consecutivo inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=certificado_libre_plomo	value='$row[certificado_libre_plomo]' class=consecutivo inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=procedimiento						value='$row[procedimiento]'						class=consecutivo inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px>
				<td width=5%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=3%></td>
				<td width=3%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=5%></td>
			</tr>
			<tr>
				<td></td><td colspan=3>APERTURA PERMISO</td><td></td>
				<td></td><td colspan=3>CIERRE PERMISO</td><td></td>
			</tr>
			<tr>
				<td></td>
				<td><input name=fecha_apertura type=date value='$row[fecha_apertura]' min='$row[fecha_apertura]' max='$row[fecha_apertura]' required></td><td></td>
				<td><input name=hora_apertura	 type=time value='$row[hora_apertura]' required></td>
				<td></td>
				<td></td>
				<td><input name=fecha_cierre	 type=date value='$row[fecha_cierre]' min='$row[fecha_cierre]' max='$row[fecha_cierre]' required></td><td></td>
				<td><input name=hora_cierre		 type=time value='$row[hora_cierre]' required></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=79%></td><td width=1%></td><td width=20%></td></tr>
			<tr>
				<td style=text-align:right class=B>PERSONAS AUTORIZADAS PARA EL TRABAJO</td>
				<td></td>
				<td style=text-align:left class=A><input name=cantidad id=cantidad value='$row[cantidad]' style='width:40%; text-align:center' inputmode=numeric maxlength=1 pattern=[1-5]{1} required></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
<!-- 4 -->			<div id=nombre style='position:absolute; "; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo "; width:43.75%; left:0.50%; background-color:white'>
			<table border=0>
				<tr height=80px><td class=A3><b>NOMBRE Y APELLIDOS</b></td></tr>
				<tr><td><input name=nombre1 id=nombre1 value='$row[nombre1]' style='width:100%; "; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo "' placeholder=Persona&nbsp;autorizada&nbsp;1 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre2 id=nombre2 value='$row[nombre2]' style='width:100%; "; if ($row['cantidad'] >= 2) {echo 'display:block';} else {echo 'display:none';} echo "' placeholder=Persona&nbsp;autorizada&nbsp;2 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre3 id=nombre3 value='$row[nombre3]' style='width:100%; "; if ($row['cantidad'] >= 3) {echo 'display:block';} else {echo 'display:none';} echo "' placeholder=Persona&nbsp;autorizada&nbsp;3 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre4 id=nombre4 value='$row[nombre4]' style='width:100%; "; if ($row['cantidad'] >= 4) {echo 'display:block';} else {echo 'display:none';} echo "' placeholder=Persona&nbsp;autorizada&nbsp;4 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre5 id=nombre5 value='$row[nombre5]' style='width:100%; "; if ($row['cantidad'] >= 5) {echo 'display:block';} else {echo 'display:none';} echo "' placeholder=Persona&nbsp;autorizada&nbsp;5 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
<!-- /4 -->			</div>
<!-- 5 -->			<div id=dkf style='position:absolute; "; if ($row['cantidad'] >= 1) {echo 'display:block';} else {echo 'display:none';} echo "; width:55.00%; left:44.25%; background-color:white; overflow:scroll'>
			<table border=0>
				<tr height=80px>
					<td style=width:210px class=A2><b>CÉDULA</b></td>
					<td style=width:380px	class=A2><b>CARGO (ROL)</b></td>
					<td style=width:100px	class=A2><b>FIRMA</b></td>
				</tr>
				<tr>
					<td><input name=cedula1 id=cedula1 value='$row[cedula1]' style='width:100%; "; if ($row['cedula1'] != '') {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo1	id=cargo1  value='$row[cargo1]'  style='width:100%; "; if ($row['cargo1'] != '')  {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style='background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)'></td>
				</tr>
				<tr>
					<td><input name=cedula2 id=cedula2 value='$row[cedula2]' style='width:100%; "; if ($row['cedula2'] != '') {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo2	id=cargo2  value='$row[cargo2]'  style='width:100%; "; if ($row['cargo2'] != '')  {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style='background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)'></td>
				</tr>
				<tr>
					<td><input name=cedula3 id=cedula3 value='$row[cedula3]' style='width:100%; "; if ($row['cedula3'] != '') {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo3	id=cargo3  value='$row[cargo3]'  style='width:100%; "; if ($row['cargo3'] != '')  {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style='background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)'></td>
				</tr>
				<tr>
					<td><input name=cedula4 id=cedula4 value='$row[cedula4]' style='width:100%; "; if ($row['cedula4'] != '') {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo4	id=cargo4  value='$row[cargo4]'  style='width:100%; "; if ($row['cargo4'] != '')  {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style='background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)'></td>
				</tr>
				<tr>
					<td><input name=cedula5 id=cedula5 value='$row[cedula5]' style='width:100%; "; if ($row['cedula5'] != '') {echo 'display:block';} else {echo 'display:none';} echo "; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo5	id=cargo5  value='$row[cargo5]'  style='width:100%; "; if ($row['cargo5'] != '')  {echo 'display:block';} else {echo 'display:none';} echo "' maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style='background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)'></td>
				</tr>
			</table>
		<script>
			var
				 c = document.getElementById('cantidad');
				 n = document.getElementById('nombre');
			 dkf = document.getElementById('dkf');
				n1 = document.getElementById('nombre1');
				n2 = document.getElementById('nombre2');
				n3 = document.getElementById('nombre3');
				n4 = document.getElementById('nombre4');
				n5 = document.getElementById('nombre5');
				c1 = document.getElementById('cedula1');
				c2 = document.getElementById('cedula2');
				c3 = document.getElementById('cedula3');
				c4 = document.getElementById('cedula4');
				c5 = document.getElementById('cedula5');
				k1 = document.getElementById('cargo1');
				k2 = document.getElementById('cargo2');
				k3 = document.getElementById('cargo3');
				k4 = document.getElementById('cargo4');
				k5 = document.getElementById('cargo5');
			document.getElementById('cantidad').addEventListener('blur', function(e) {
				if (c.value <= 1) {c.value = 1;
					n.disabled = false;		n.style.display = 'block';
				dkf.disabled = false; dkf.style.display = 'block';
				 n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
				 n2.disabled = true;	 n2.style.display = 'none';
				 n3.disabled = true;	 n3.style.display = 'none';
				 n4.disabled = true;	 n4.style.display = 'none';
				 n5.disabled = true;	 n5.style.display = 'none';
				 c1.disabled = false;	 c1.style.display = 'block'; c1.required = true;
				 c2.disabled = true;	 c2.style.display = 'none';
				 c3.disabled = true;	 c3.style.display = 'none';
				 c4.disabled = true;	 c4.style.display = 'none';
				 c5.disabled = true;	 c5.style.display = 'none';
				 k1.disabled = false;	 k1.style.display = 'block'; k1.required = true;
				 k2.disabled = true;	 k2.style.display = 'none';
				 k3.disabled = true;	 k3.style.display = 'none';
				 k4.disabled = true;	 k4.style.display = 'none';
				 k5.disabled = true;	 k5.style.display = 'none';};
				if (c.value == 2) {
					n.disabled = false;		n.style.display = 'block';
				dkf.disabled = false; dkf.style.display = 'block';
				 n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
				 n3.disabled = true;	 n3.style.display = 'none';
				 n4.disabled = true;	 n4.style.display = 'none';
				 n5.disabled = true;	 n5.style.display = 'none';
				 c1.disabled = false;	 c1.style.display = 'block'; c1.required = true;
				 c2.disabled = false;	 c2.style.display = 'block'; c2.required = true;
				 c3.disabled = true;	 c3.style.display = 'none';
				 c4.disabled = true;	 c4.style.display = 'none';
				 c5.disabled = true;	 c5.style.display = 'none';
				 k1.disabled = false;	 k1.style.display = 'block'; k1.required = true;
				 k2.disabled = false;	 k2.style.display = 'block'; k2.required = true;
				 k3.disabled = true;	 k3.style.display = 'none';
				 k4.disabled = true;	 k4.style.display = 'none';
				 k5.disabled = true;	 k5.style.display = 'none';};
				if (c.value == 3) {
					n.disabled = false;		n.style.display = 'block';
				dkf.disabled = false; dkf.style.display = 'block';
				 n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
				 n4.disabled = true;	 n4.style.display = 'none';
				 n5.disabled = true;	 n5.style.display = 'none';
				 c1.disabled = false;	 c1.style.display = 'block'; c1.required = true;
				 c2.disabled = false;	 c2.style.display = 'block'; c2.required = true;
				 c3.disabled = false;	 c3.style.display = 'block'; c3.required = true;
				 c4.disabled = true;	 c4.style.display = 'none';
				 c5.disabled = true;	 c5.style.display = 'none';
				 k1.disabled = false;	 k1.style.display = 'block'; k1.required = true;
				 k2.disabled = false;	 k2.style.display = 'block'; k2.required = true;
				 k3.disabled = false;	 k3.style.display = 'block'; k3.required = true;
				 k4.disabled = true;	 k4.style.display = 'none';
				 k5.disabled = true;	 k5.style.display = 'none';};
				if (c.value == 4) {
					n.disabled = false;		n.style.display = 'block';
				dkf.disabled = false; dkf.style.display = 'block';
				 n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
				 n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
				 n5.disabled = true;	 n5.style.display = 'none';
				 c1.disabled = false;	 c1.style.display = 'block'; c1.required = true;
				 c2.disabled = false;	 c2.style.display = 'block'; c2.required = true;
				 c3.disabled = false;	 c3.style.display = 'block'; c3.required = true;
				 c4.disabled = false;	 c4.style.display = 'block'; c4.required = true;
				 c5.disabled = true;	 c5.style.display = 'none';
				 k1.disabled = false;	 k1.style.display = 'block'; k1.required = true;
				 k2.disabled = false;	 k2.style.display = 'block'; k2.required = true;
				 k3.disabled = false;	 k3.style.display = 'block'; k3.required = true;
				 k4.disabled = false;	 k4.style.display = 'block'; k4.required = true;
				 k5.disabled = true;	 k5.style.display = 'none';};
				if (c.value == 5) {
					n.disabled = false;		n.style.display = 'block';
				dkf.disabled = false; dkf.style.display = 'block';
				 n1.disabled = false;	 n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false;	 n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false;	 n3.style.display = 'block'; n3.required = true;
				 n4.disabled = false;	 n4.style.display = 'block'; n4.required = true;
				 n5.disabled = false;	 n5.style.display = 'block'; n5.required = true;
				 c1.disabled = false;	 c1.style.display = 'block'; c1.required = true;
				 c2.disabled = false;	 c2.style.display = 'block'; c2.required = true;
				 c3.disabled = false;	 c3.style.display = 'block'; c3.required = true;
				 c4.disabled = false;	 c4.style.display = 'block'; c4.required = true;
				 c5.disabled = false;	 c5.style.display = 'block'; c5.required = true;
				 k1.disabled = false;	 k1.style.display = 'block'; k1.required = true;
				 k2.disabled = false;	 k2.style.display = 'block'; k2.required = true;
				 k3.disabled = false;	 k3.style.display = 'block'; k3.required = true;
				 k4.disabled = false;	 k4.style.display = 'block'; k4.required = true;
				 k5.disabled = false;	 k5.style.display = 'block'; k5.required = true;};});
		</script>
<!-- /5 -->			</div>

<!-- *****************************************			 sección B			 ***************************************** -->
<!-- 6 -->			<div style='position:relative; width:100%; top:310px'>
			<hr>
			<table border=0>
				<tr><td class=B><b>&nbsp;&nbsp;B. DOCUMENTACIÓN ADICIONAL Y APROBACIONES DIARIAS</b></td></tr>
			</table>
<!-- /6 -->			</div>
<!-- 7 -->			<div style='position:relative; width:55.75%; left:0.50%; top:320px; background-color:white'>
			<table border=1>
				<tr class=C><td class=A3>DOCUMENTACIÓN</td></tr>
				<tr class=C><td class=C style='padding:0 10'># CERTIFICADO HABILITACIÓN</td></tr>
				<tr class=C><td class=C style='padding:0 10'># PERSONAS EJECUTAN LA TAREA</td></tr>
				<tr class=C><td class=C style='padding:0 10'># PERSONAS CON AUTOREPORTE DE CONDICIONES DE SALUD</td></tr>
				<tr class=C><td class=C style='padding:0 10'>HORA INICIO TAREA</td></tr>
				<tr class=C><td class=C style='padding:0 10'>HORA FINALIZACIÓN TAREA</td></tr>
				<tr class=C><td class=C style='padding:0 10'>FIRMA EJECUTOR</td></tr>
				<tr class=C><td class=C style='padding:0 10'>FIRMA VIGIA EC.</td></tr>
				<tr class=C><td class=C style='padding:0 10'>FIRMA SUPERVISOR EC.</td></tr>
				<tr class=C><td class=C style='padding:0 10'>AUTORIZACIÓN EMISOR<br>(Antes del inicio de labores)</td></tr>
			</table>
<!-- /7 -->			</div>
<!-- 8 -->			<div style='position:relative; width:43.00%; left:56.25%; top:-531.25px; background-color:white; overflow:scroll'>
			<table border=1>
				<tr class=C>
					<td style=width:215px class=A21>DÍA 1<input name=fechaB1 id=fechaB1 value='$row[fechaB1]' type=date onfocusout='f1a(); f1b()' required></td>
					<td style=width:215px class=A22>DÍA 2<input name=fechaB2 id=fechaB2 value='$row[fechaB2]' type=date onfocusout='f2a(); f2b()'></td>
					<td style=width:215px class=A21>DÍA 3<input name=fechaB3 id=fechaB3 value='$row[fechaB3]' type=date onfocusout='f3a(); f3b()'></td>
					<td style=width:215px class=A22>DÍA 4<input name=fechaB4 id=fechaB4 value='$row[fechaB4]' type=date onfocusout='f4a(); f4b()'></td>
					<td style=width:215px class=A21>DÍA 5<input name=fechaB5 id=fechaB5 value='$row[fechaB5]' type=date onfocusout='f5a(); f5b()'></td>
					<td style=width:215px class=A22>DÍA 6<input name=fechaB6 id=fechaB6 value='$row[fechaB6]' type=date onfocusout='f6a(); f6b()'></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_cert_habil1 value='$row[num_cert_habil1]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td>
					<td class=A22><input name=num_cert_habil2 value='$row[num_cert_habil2]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A21><input name=num_cert_habil3 value='$row[num_cert_habil3]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A22><input name=num_cert_habil4 value='$row[num_cert_habil4]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A21><input name=num_cert_habil5 value='$row[num_cert_habil5]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A22><input name=num_cert_habil6 value='$row[num_cert_habil6]' inputmode=numeric style='width:60%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_pers_ejecutan1 value='$row[num_pers_ejecutan1]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$ required></td>
					<td class=A22><input name=num_pers_ejecutan2 value='$row[num_pers_ejecutan2]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_ejecutan3 value='$row[num_pers_ejecutan3]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_ejecutan4 value='$row[num_pers_ejecutan4]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_ejecutan5 value='$row[num_pers_ejecutan5]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_ejecutan6 value='$row[num_pers_ejecutan6]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_pers_autoreporte1 value='$row[num_pers_autoreporte1]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$ required></td>
					<td class=A22><input name=num_pers_autoreporte2 value='$row[num_pers_autoreporte2]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_autoreporte3 value='$row[num_pers_autoreporte3]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_autoreporte4 value='$row[num_pers_autoreporte4]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_autoreporte5 value='$row[num_pers_autoreporte5]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_autoreporte6 value='$row[num_pers_autoreporte6]' inputmode=numeric style='width:40%; text-align:center' maxlength=1 pattern=^(?:[0-5]{1})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=hora_inicio1 type=time value='$row[hora_inicio1]' required></td>
					<td class=A22><input name=hora_inicio2 type=time value='$row[hora_inicio2]'></td>
					<td class=A21><input name=hora_inicio3 type=time value='$row[hora_inicio3]'></td>
					<td class=A22><input name=hora_inicio4 type=time value='$row[hora_inicio4]'></td>
					<td class=A21><input name=hora_inicio5 type=time value='$row[hora_inicio5]'></td>
					<td class=A22><input name=hora_inicio6 type=time value='$row[hora_inicio6]'></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=hora_final1 type=time value='$row[hora_final1]' required></td>
					<td class=A22><input name=hora_final2 type=time value='$row[hora_final2]'></td>
					<td class=A21><input name=hora_final3 type=time value='$row[hora_final3]'></td>
					<td class=A22><input name=hora_final4 type=time value='$row[hora_final4]'></td>
					<td class=A21><input name=hora_final5 type=time value='$row[hora_final5]'></td>
					<td class=A22><input name=hora_final6 type=time value='$row[hora_final6]'></td>
				</tr>
				<tr class=C>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
				</tr>
				<tr class=C>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
				</tr>
				<tr class=C>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
				</tr>
				<tr class=C>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
					<td class=A21></td>
					<td class=A22></td>
				</tr>
			</table>
<!-- /8 -->			</div>

<!-- *****************************************			 sección C		 ***************************************** -->
<!-- 9 -->	<div style='position:relative; left:0px; top:-530px'> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;C. LISTA DE VERIFICACIÓN DE REQUISITOS DE SEGURIDAD</b><br></td></tr>
		</table>
		<table border=0>
			<tr><td width=5%></td><td width=60%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td><td width=5%></td></tr>
			<tr>
				<td></td>
				<td class=B>Qué tipo de espacio confinado es?</td>
				<td style=text-align:right class=B>1</td>
				<td><input name=tipo_esp_conf id=tipo_esp_conf  type=radio value=1 "; if ($row['tipo_esp_conf'] == '1') {echo 'checked';} echo " required></td>
				<td style=text-align:right class=B>2</td>
				<td><input name=tipo_esp_conf	id=tipo_esp_conf1	type=radio value=2 "; if ($row['tipo_esp_conf'] == '2') {echo 'checked';} echo "></td>
				<td style=text-align:right class=B></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td class=B>Qué grado de peligrosidad tiene?</td>
				<td style=text-align:right class=B>A</td>
				<td><input name=grado_peligro	id=grado_peligro	type=radio value=A "; if ($row['grado_peligro'] == 'A') {echo 'checked';} echo " required></td>
				<td style=text-align:right class=B>B</td>
				<td><input name=grado_peligro	id=grado_peligro1	type=radio value=B "; if ($row['grado_peligro'] == 'B') {echo 'checked';} echo "></td>
				<td style=text-align:right class=B>C</td>
				<td><input name=grado_peligro	id=grado_peligro2	type=radio value=C "; if ($row['grado_peligro'] == 'C') {echo 'checked';} echo "></td>
				<td></td>
			</tr>
			<tr height=5px><td></td></tr>
		</table>

<!-- 10 -->			<div style='position:relative; width:22.60%; left:0.50%; top:8.75px; background-color:white; overflow:scroll'>
			<table border=1>
				<tr height=80px>
					<td colspan=3 style=width:210px class=A21>DÍA 1<input id=fechaB1a value='$row[fechaB1]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 2<input id=fechaB2a value='$row[fechaB2]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 style=width:210px class=A21>DÍA 3<input id=fechaB3a value='$row[fechaB3]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 4<input id=fechaB4a value='$row[fechaB4]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 style=width:210px class=A21>DÍA 5<input id=fechaB5a value='$row[fechaB5]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 6<input id=fechaB6a value='$row[fechaB6]' style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
				</tr>
				<tr height=40px>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C1_1 id=C1_1	type=radio value=SI "; if ($row['C1_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C1_1 id=C1a_1	type=radio value=NO "; if ($row['C1_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_1 id=C1b_1	type=radio value=NA "; if ($row['C1_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_2 id=C1_2	type=radio value=SI "; if ($row['C1_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_2 id=C1a_2	type=radio value=NO "; if ($row['C1_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_2 id=C1b_2	type=radio value=NA "; if ($row['C1_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_3 id=C1_3	type=radio value=SI "; if ($row['C1_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_3 id=C1a_3	type=radio value=NO "; if ($row['C1_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_3 id=C1b_3	type=radio value=NA "; if ($row['C1_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_4 id=C1_4	type=radio value=SI "; if ($row['C1_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_4 id=C1a_4	type=radio value=NO "; if ($row['C1_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_4 id=C1b_4	type=radio value=NA "; if ($row['C1_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_5 id=C1_5	type=radio value=SI "; if ($row['C1_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_5 id=C1a_5	type=radio value=NO "; if ($row['C1_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C1_5 id=C1b_5	type=radio value=NA "; if ($row['C1_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_6 id=C1_6	type=radio value=SI "; if ($row['C1_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_6 id=C1a_6	type=radio value=NO "; if ($row['C1_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C1_6 id=C1b_6	type=radio value=NA "; if ($row['C1_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C2_1 id=C2_1	type=radio value=SI "; if ($row['C2_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C2_1 id=C2a_1	type=radio value=NO "; if ($row['C2_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_1 id=C2b_1	type=radio value=NA "; if ($row['C2_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_2 id=C2_2	type=radio value=SI "; if ($row['C2_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_2 id=C2a_2	type=radio value=NO "; if ($row['C2_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_2 id=C2b_2	type=radio value=NA "; if ($row['C2_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_3 id=C2_3	type=radio value=SI "; if ($row['C2_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_3 id=C2a_3	type=radio value=NO "; if ($row['C2_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_3 id=C2b_3	type=radio value=NA "; if ($row['C2_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_4 id=C2_4	type=radio value=SI "; if ($row['C2_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_4 id=C2a_4	type=radio value=NO "; if ($row['C2_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_4 id=C2b_4	type=radio value=NA "; if ($row['C2_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_5 id=C2_5	type=radio value=SI "; if ($row['C2_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_5 id=C2a_5	type=radio value=NO "; if ($row['C2_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C2_5 id=C2b_5	type=radio value=NA "; if ($row['C2_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_6 id=C2_6	type=radio value=SI "; if ($row['C2_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_6 id=C2a_6	type=radio value=NO "; if ($row['C2_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C2_6 id=C2b_6	type=radio value=NA "; if ($row['C2_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C3_1 id=C3_1	type=radio value=SI "; if ($row['C3_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C3_1 id=C3a_1	type=radio value=NO "; if ($row['C3_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_1 id=C3b_1	type=radio value=NA "; if ($row['C3_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_2 id=C3_2	type=radio value=SI "; if ($row['C3_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_2 id=C3a_2	type=radio value=NO "; if ($row['C3_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_2 id=C3b_2	type=radio value=NA "; if ($row['C3_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_3 id=C3_3	type=radio value=SI "; if ($row['C3_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_3 id=C3a_3	type=radio value=NO "; if ($row['C3_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_3 id=C3b_3	type=radio value=NA "; if ($row['C3_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_4 id=C3_4	type=radio value=SI "; if ($row['C3_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_4 id=C3a_4	type=radio value=NO "; if ($row['C3_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_4 id=C3b_4	type=radio value=NA "; if ($row['C3_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_5 id=C3_5	type=radio value=SI "; if ($row['C3_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_5 id=C3a_5	type=radio value=NO "; if ($row['C3_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C3_5 id=C3b_5	type=radio value=NA "; if ($row['C3_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_6 id=C3_6	type=radio value=SI "; if ($row['C3_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_6 id=C3a_6	type=radio value=NO "; if ($row['C3_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C3_6 id=C3b_6	type=radio value=NA "; if ($row['C3_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn3>
					<td class=A21><input name=C4_1 id=C4_1	type=radio value=SI "; if ($row['C4_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C4_1 id=C4a_1	type=radio value=NO "; if ($row['C4_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_1 id=C4b_1	type=radio value=NA "; if ($row['C4_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_2 id=C4_2	type=radio value=SI "; if ($row['C4_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_2 id=C4a_2	type=radio value=NO "; if ($row['C4_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_2 id=C4b_2	type=radio value=NA "; if ($row['C4_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_3 id=C4_3	type=radio value=SI "; if ($row['C4_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_3 id=C4a_3	type=radio value=NO "; if ($row['C4_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_3 id=C4b_3	type=radio value=NA "; if ($row['C4_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_4 id=C4_4	type=radio value=SI "; if ($row['C4_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_4 id=C4a_4	type=radio value=NO "; if ($row['C4_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_4 id=C4b_4	type=radio value=NA "; if ($row['C4_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_5 id=C4_5	type=radio value=SI "; if ($row['C4_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_5 id=C4a_5	type=radio value=NO "; if ($row['C4_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C4_5 id=C4b_5	type=radio value=NA "; if ($row['C4_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_6 id=C4_6	type=radio value=SI "; if ($row['C4_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_6 id=C4a_6	type=radio value=NO "; if ($row['C4_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C4_6 id=C4b_6	type=radio value=NA "; if ($row['C4_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C5_1 id=C5_1	type=radio value=SI "; if ($row['C5_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C5_1 id=C5a_1	type=radio value=NO "; if ($row['C5_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_1 id=C5b_1	type=radio value=NA "; if ($row['C5_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_2 id=C5_2	type=radio value=SI "; if ($row['C5_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_2 id=C5a_2	type=radio value=NO "; if ($row['C5_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_2 id=C5b_2	type=radio value=NA "; if ($row['C5_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_3 id=C5_3	type=radio value=SI "; if ($row['C5_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_3 id=C5a_3	type=radio value=NO "; if ($row['C5_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_3 id=C5b_3	type=radio value=NA "; if ($row['C5_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_4 id=C5_4	type=radio value=SI "; if ($row['C5_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_4 id=C5a_4	type=radio value=NO "; if ($row['C5_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_4 id=C5b_4	type=radio value=NA "; if ($row['C5_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_5 id=C5_5	type=radio value=SI "; if ($row['C5_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_5 id=C5a_5	type=radio value=NO "; if ($row['C5_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C5_5 id=C5b_5	type=radio value=NA "; if ($row['C5_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_6 id=C5_6	type=radio value=SI "; if ($row['C5_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_6 id=C5a_6	type=radio value=NO "; if ($row['C5_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C5_6 id=C5b_6	type=radio value=NA "; if ($row['C5_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C6_1 id=C6_1	type=radio value=SI "; if ($row['C6_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C6_1 id=C6a_1	type=radio value=NO "; if ($row['C6_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_1 id=C6b_1	type=radio value=NA "; if ($row['C6_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_2 id=C6_2	type=radio value=SI "; if ($row['C6_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_2 id=C6a_2	type=radio value=NO "; if ($row['C6_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_2 id=C6b_2	type=radio value=NA "; if ($row['C6_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_3 id=C6_3	type=radio value=SI "; if ($row['C6_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_3 id=C6a_3	type=radio value=NO "; if ($row['C6_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_3 id=C6b_3	type=radio value=NA "; if ($row['C6_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_4 id=C6_4	type=radio value=SI "; if ($row['C6_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_4 id=C6a_4	type=radio value=NO "; if ($row['C6_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_4 id=C6b_4	type=radio value=NA "; if ($row['C6_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_5 id=C6_5	type=radio value=SI "; if ($row['C6_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_5 id=C6a_5	type=radio value=NO "; if ($row['C6_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C6_5 id=C6b_5	type=radio value=NA "; if ($row['C6_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_6 id=C6_6	type=radio value=SI "; if ($row['C6_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_6 id=C6a_6	type=radio value=NO "; if ($row['C6_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C6_6 id=C6b_6	type=radio value=NA "; if ($row['C6_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C7_1 id=C7_1	type=radio value=SI "; if ($row['C7_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C7_1 id=C7a_1	type=radio value=NO "; if ($row['C7_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_1 id=C7b_1	type=radio value=NA "; if ($row['C7_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_2 id=C7_2	type=radio value=SI "; if ($row['C7_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_2 id=C7a_2	type=radio value=NO "; if ($row['C7_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_2 id=C7b_2	type=radio value=NA "; if ($row['C7_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_3 id=C7_3	type=radio value=SI "; if ($row['C7_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_3 id=C7a_3	type=radio value=NO "; if ($row['C7_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_3 id=C7b_3	type=radio value=NA "; if ($row['C7_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_4 id=C7_4	type=radio value=SI "; if ($row['C7_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_4 id=C7a_4	type=radio value=NO "; if ($row['C7_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_4 id=C7b_4	type=radio value=NA "; if ($row['C7_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_5 id=C7_5	type=radio value=SI "; if ($row['C7_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_5 id=C7a_5	type=radio value=NO "; if ($row['C7_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C7_5 id=C7b_5	type=radio value=NA "; if ($row['C7_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_6 id=C7_6	type=radio value=SI "; if ($row['C7_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_6 id=C7a_6	type=radio value=NO "; if ($row['C7_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C7_6 id=C7b_6	type=radio value=NA "; if ($row['C7_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn4>
					<td class=A21><input name=C8_1 id=C8_1	type=radio value=SI "; if ($row['C8_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C8_1 id=C8a_1	type=radio value=NO "; if ($row['C8_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_1 id=C8b_1	type=radio value=NA "; if ($row['C8_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_2 id=C8_2	type=radio value=SI "; if ($row['C8_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_2 id=C8a_2	type=radio value=NO "; if ($row['C8_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_2 id=C8b_2	type=radio value=NA "; if ($row['C8_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_3 id=C8_3	type=radio value=SI "; if ($row['C8_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_3 id=C8a_3	type=radio value=NO "; if ($row['C8_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_3 id=C8b_3	type=radio value=NA "; if ($row['C8_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_4 id=C8_4	type=radio value=SI "; if ($row['C8_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_4 id=C8a_4	type=radio value=NO "; if ($row['C8_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_4 id=C8b_4	type=radio value=NA "; if ($row['C8_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_5 id=C8_5	type=radio value=SI "; if ($row['C8_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_5 id=C8a_5	type=radio value=NO "; if ($row['C8_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C8_5 id=C8b_5	type=radio value=NA "; if ($row['C8_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_6 id=C8_6	type=radio value=SI "; if ($row['C8_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_6 id=C8a_6	type=radio value=NO "; if ($row['C8_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C8_6 id=C8b_6	type=radio value=NA "; if ($row['C8_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C9_1 id=C9_1	type=radio value=SI "; if ($row['C9_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C9_1 id=C9a_1	type=radio value=NO "; if ($row['C9_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_1 id=C9b_1	type=radio value=NA "; if ($row['C9_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_2 id=C9_2	type=radio value=SI "; if ($row['C9_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_2 id=C9a_2	type=radio value=NO "; if ($row['C9_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_2 id=C9b_2	type=radio value=NA "; if ($row['C9_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_3 id=C9_3	type=radio value=SI "; if ($row['C9_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_3 id=C9a_3	type=radio value=NO "; if ($row['C9_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_3 id=C9b_3	type=radio value=NA "; if ($row['C9_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_4 id=C9_4	type=radio value=SI "; if ($row['C9_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_4 id=C9a_4	type=radio value=NO "; if ($row['C9_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_4 id=C9b_4	type=radio value=NA "; if ($row['C9_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_5 id=C9_5	type=radio value=SI "; if ($row['C9_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_5 id=C9a_5	type=radio value=NO "; if ($row['C9_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C9_5 id=C9b_5	type=radio value=NA "; if ($row['C9_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_6 id=C9_6	type=radio value=SI "; if ($row['C9_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_6 id=C9a_6	type=radio value=NO "; if ($row['C9_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C9_6 id=C9b_6	type=radio value=NA "; if ($row['C9_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C10_1 id=C10_1	type=radio value=SI "; if ($row['C10_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C10_1 id=C10a_1	type=radio value=NO "; if ($row['C10_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_1 id=C10b_1	type=radio value=NA "; if ($row['C10_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_2 id=C10_2	type=radio value=SI "; if ($row['C10_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_2 id=C10a_2	type=radio value=NO "; if ($row['C10_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_2 id=C10b_2	type=radio value=NA "; if ($row['C10_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_3 id=C10_3	type=radio value=SI "; if ($row['C10_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_3 id=C10a_3	type=radio value=NO "; if ($row['C10_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_3 id=C10b_3	type=radio value=NA "; if ($row['C10_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_4 id=C10_4	type=radio value=SI "; if ($row['C10_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_4 id=C10a_4	type=radio value=NO "; if ($row['C10_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_4 id=C10b_4	type=radio value=NA "; if ($row['C10_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_5 id=C10_5	type=radio value=SI "; if ($row['C10_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_5 id=C10a_5	type=radio value=NO "; if ($row['C10_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C10_5 id=C10b_5	type=radio value=NA "; if ($row['C10_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_6 id=C10_6	type=radio value=SI "; if ($row['C10_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_6 id=C10a_6	type=radio value=NO "; if ($row['C10_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C10_6 id=C10b_6	type=radio value=NA "; if ($row['C10_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C11_1 id=C11_1	type=radio value=SI "; if ($row['C11_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C11_1 id=C11a_1	type=radio value=NO "; if ($row['C11_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_1 id=C11b_1	type=radio value=NA "; if ($row['C11_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_2 id=C11_2	type=radio value=SI "; if ($row['C11_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_2 id=C11a_2	type=radio value=NO "; if ($row['C11_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_2 id=C11b_2	type=radio value=NA "; if ($row['C11_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_3 id=C11_3	type=radio value=SI "; if ($row['C11_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_3 id=C11a_3	type=radio value=NO "; if ($row['C11_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_3 id=C11b_3	type=radio value=NA "; if ($row['C11_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_4 id=C11_4	type=radio value=SI "; if ($row['C11_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_4 id=C11a_4	type=radio value=NO "; if ($row['C11_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_4 id=C11b_4	type=radio value=NA "; if ($row['C11_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_5 id=C11_5	type=radio value=SI "; if ($row['C11_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_5 id=C11a_5	type=radio value=NO "; if ($row['C11_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C11_5 id=C11b_5	type=radio value=NA "; if ($row['C11_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_6 id=C11_6	type=radio value=SI "; if ($row['C11_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_6 id=C11a_6	type=radio value=NO "; if ($row['C11_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C11_6 id=C11b_6	type=radio value=NA "; if ($row['C11_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C12_1 id=C12_1	type=radio value=SI "; if ($row['C12_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C12_1 id=C12a_1	type=radio value=NO "; if ($row['C12_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_1 id=C12b_1	type=radio value=NA "; if ($row['C12_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_2 id=C12_2	type=radio value=SI "; if ($row['C12_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_2 id=C12a_2	type=radio value=NO "; if ($row['C12_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_2 id=C12b_2	type=radio value=NA "; if ($row['C12_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_3 id=C12_3	type=radio value=SI "; if ($row['C12_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_3 id=C12a_3	type=radio value=NO "; if ($row['C12_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_3 id=C12b_3	type=radio value=NA "; if ($row['C12_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_4 id=C12_4	type=radio value=SI "; if ($row['C12_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_4 id=C12a_4	type=radio value=NO "; if ($row['C12_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_4 id=C12b_4	type=radio value=NA "; if ($row['C12_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_5 id=C12_5	type=radio value=SI "; if ($row['C12_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_5 id=C12a_5	type=radio value=NO "; if ($row['C12_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C12_5 id=C12b_5	type=radio value=NA "; if ($row['C12_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_6 id=C12_6	type=radio value=SI "; if ($row['C12_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_6 id=C12a_6	type=radio value=NO "; if ($row['C12_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C12_6 id=C12b_6	type=radio value=NA "; if ($row['C12_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
					<tr class=Cn4>
					<td class=A21><input name=C13_1 id=C13_1	type=radio value=SI "; if ($row['C13_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C13_1 id=C13a_1	type=radio value=NO "; if ($row['C13_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_1 id=C13b_1	type=radio value=NA "; if ($row['C13_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_2 id=C13_2	type=radio value=SI "; if ($row['C13_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_2 id=C13a_2	type=radio value=NO "; if ($row['C13_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_2 id=C13b_2	type=radio value=NA "; if ($row['C13_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_3 id=C13_3	type=radio value=SI "; if ($row['C13_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_3 id=C13a_3	type=radio value=NO "; if ($row['C13_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_3 id=C13b_3	type=radio value=NA "; if ($row['C13_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_4 id=C13_4	type=radio value=SI "; if ($row['C13_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_4 id=C13a_4	type=radio value=NO "; if ($row['C13_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_4 id=C13b_4	type=radio value=NA "; if ($row['C13_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_5 id=C13_5	type=radio value=SI "; if ($row['C13_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_5 id=C13a_5	type=radio value=NO "; if ($row['C13_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C13_5 id=C13b_5	type=radio value=NA "; if ($row['C13_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_6 id=C13_6	type=radio value=SI "; if ($row['C13_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_6 id=C13a_6	type=radio value=NO "; if ($row['C13_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C13_6 id=C13b_6	type=radio value=NA "; if ($row['C13_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C14_1 id=C14_1	type=radio value=SI "; if ($row['C14_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C14_1 id=C14a_1	type=radio value=NO "; if ($row['C14_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_1 id=C14b_1	type=radio value=NA "; if ($row['C14_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_2 id=C14_2	type=radio value=SI "; if ($row['C14_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_2 id=C14a_2	type=radio value=NO "; if ($row['C14_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_2 id=C14b_2	type=radio value=NA "; if ($row['C14_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_3 id=C14_3	type=radio value=SI "; if ($row['C14_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_3 id=C14a_3	type=radio value=NO "; if ($row['C14_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_3 id=C14b_3	type=radio value=NA "; if ($row['C14_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_4 id=C14_4	type=radio value=SI "; if ($row['C14_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_4 id=C14a_4	type=radio value=NO "; if ($row['C14_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_4 id=C14b_4	type=radio value=NA "; if ($row['C14_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_5 id=C14_5	type=radio value=SI "; if ($row['C14_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_5 id=C14a_5	type=radio value=NO "; if ($row['C14_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C14_5 id=C14b_5	type=radio value=NA "; if ($row['C14_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_6 id=C14_6	type=radio value=SI "; if ($row['C14_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_6 id=C14a_6	type=radio value=NO "; if ($row['C14_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C14_6 id=C14b_6	type=radio value=NA "; if ($row['C14_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C15_1 id=C15_1	type=radio value=SI "; if ($row['C15_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C15_1 id=C15a_1	type=radio value=NO "; if ($row['C15_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_1 id=C15b_1	type=radio value=NA "; if ($row['C15_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_2 id=C15_2	type=radio value=SI "; if ($row['C15_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_2 id=C15a_2	type=radio value=NO "; if ($row['C15_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_2 id=C15b_2	type=radio value=NA "; if ($row['C15_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_3 id=C15_3	type=radio value=SI "; if ($row['C15_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_3 id=C15a_3	type=radio value=NO "; if ($row['C15_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_3 id=C15b_3	type=radio value=NA "; if ($row['C15_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_4 id=C15_4	type=radio value=SI "; if ($row['C15_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_4 id=C15a_4	type=radio value=NO "; if ($row['C15_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_4 id=C15b_4	type=radio value=NA "; if ($row['C15_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_5 id=C15_5	type=radio value=SI "; if ($row['C15_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_5 id=C15a_5	type=radio value=NO "; if ($row['C15_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C15_5 id=C15b_5	type=radio value=NA "; if ($row['C15_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_6 id=C15_6	type=radio value=SI "; if ($row['C15_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_6 id=C15a_6	type=radio value=NO "; if ($row['C15_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C15_6 id=C15b_6	type=radio value=NA "; if ($row['C15_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C16_1 id=C16_1	type=radio value=SI "; if ($row['C16_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C16_1 id=C16a_1	type=radio value=NO "; if ($row['C16_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_1 id=C16b_1	type=radio value=NA "; if ($row['C16_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_2 id=C16_2	type=radio value=SI "; if ($row['C16_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_2 id=C16a_2	type=radio value=NO "; if ($row['C16_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_2 id=C16b_2	type=radio value=NA "; if ($row['C16_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_3 id=C16_3	type=radio value=SI "; if ($row['C16_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_3 id=C16a_3	type=radio value=NO "; if ($row['C16_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_3 id=C16b_3	type=radio value=NA "; if ($row['C16_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_4 id=C16_4	type=radio value=SI "; if ($row['C16_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_4 id=C16a_4	type=radio value=NO "; if ($row['C16_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_4 id=C16b_4	type=radio value=NA "; if ($row['C16_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_5 id=C16_5	type=radio value=SI "; if ($row['C16_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_5 id=C16a_5	type=radio value=NO "; if ($row['C16_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C16_5 id=C16b_5	type=radio value=NA "; if ($row['C16_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_6 id=C16_6	type=radio value=SI "; if ($row['C16_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_6 id=C16a_6	type=radio value=NO "; if ($row['C16_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C16_6 id=C16b_6	type=radio value=NA "; if ($row['C16_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C17_1 id=C17_1	type=radio value=SI "; if ($row['C17_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C17_1 id=C17a_1	type=radio value=NO "; if ($row['C17_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_1 id=C17b_1	type=radio value=NA "; if ($row['C17_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_2 id=C17_2	type=radio value=SI "; if ($row['C17_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_2 id=C17a_2	type=radio value=NO "; if ($row['C17_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_2 id=C17b_2	type=radio value=NA "; if ($row['C17_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_3 id=C17_3	type=radio value=SI "; if ($row['C17_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_3 id=C17a_3	type=radio value=NO "; if ($row['C17_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_3 id=C17b_3	type=radio value=NA "; if ($row['C17_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_4 id=C17_4	type=radio value=SI "; if ($row['C17_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_4 id=C17a_4	type=radio value=NO "; if ($row['C17_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_4 id=C17b_4	type=radio value=NA "; if ($row['C17_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_5 id=C17_5	type=radio value=SI "; if ($row['C17_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_5 id=C17a_5	type=radio value=NO "; if ($row['C17_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C17_5 id=C17b_5	type=radio value=NA "; if ($row['C17_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_6 id=C17_6	type=radio value=SI "; if ($row['C17_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_6 id=C17a_6	type=radio value=NO "; if ($row['C17_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C17_6 id=C17b_6	type=radio value=NA "; if ($row['C17_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C18_1 id=C18_1	type=radio value=SI "; if ($row['C18_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C18_1 id=C18a_1	type=radio value=NO "; if ($row['C18_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_1 id=C18b_1	type=radio value=NA "; if ($row['C18_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_2 id=C18_2	type=radio value=SI "; if ($row['C18_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_2 id=C18a_2	type=radio value=NO "; if ($row['C18_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_2 id=C18b_2	type=radio value=NA "; if ($row['C18_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_3 id=C18_3	type=radio value=SI "; if ($row['C18_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_3 id=C18a_3	type=radio value=NO "; if ($row['C18_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_3 id=C18b_3	type=radio value=NA "; if ($row['C18_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_4 id=C18_4	type=radio value=SI "; if ($row['C18_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_4 id=C18a_4	type=radio value=NO "; if ($row['C18_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_4 id=C18b_4	type=radio value=NA "; if ($row['C18_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_5 id=C18_5	type=radio value=SI "; if ($row['C18_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_5 id=C18a_5	type=radio value=NO "; if ($row['C18_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C18_5 id=C18b_5	type=radio value=NA "; if ($row['C18_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_6 id=C18_6	type=radio value=SI "; if ($row['C18_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_6 id=C18a_6	type=radio value=NO "; if ($row['C18_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C18_6 id=C18b_6	type=radio value=NA "; if ($row['C18_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C19_1 id=C19_1	type=radio value=SI "; if ($row['C19_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C19_1 id=C19a_1	type=radio value=NO "; if ($row['C19_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_1 id=C19b_1	type=radio value=NA "; if ($row['C19_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_2 id=C19_2	type=radio value=SI "; if ($row['C19_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_2 id=C19a_2	type=radio value=NO "; if ($row['C19_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_2 id=C19b_2	type=radio value=NA "; if ($row['C19_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_3 id=C19_3	type=radio value=SI "; if ($row['C19_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_3 id=C19a_3	type=radio value=NO "; if ($row['C19_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_3 id=C19b_3	type=radio value=NA "; if ($row['C19_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_4 id=C19_4	type=radio value=SI "; if ($row['C19_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_4 id=C19a_4	type=radio value=NO "; if ($row['C19_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_4 id=C19b_4	type=radio value=NA "; if ($row['C19_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_5 id=C19_5	type=radio value=SI "; if ($row['C19_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_5 id=C19a_5	type=radio value=NO "; if ($row['C19_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C19_5 id=C19b_5	type=radio value=NA "; if ($row['C19_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_6 id=C19_6	type=radio value=SI "; if ($row['C19_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_6 id=C19a_6	type=radio value=NO "; if ($row['C19_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C19_6 id=C19b_6	type=radio value=NA "; if ($row['C19_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C20_1 id=C20_1	type=radio value=SI "; if ($row['C20_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C20_1 id=C20a_1	type=radio value=NO "; if ($row['C20_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_1 id=C20b_1	type=radio value=NA "; if ($row['C20_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_2 id=C20_2	type=radio value=SI "; if ($row['C20_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_2 id=C20a_2	type=radio value=NO "; if ($row['C20_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_2 id=C20b_2	type=radio value=NA "; if ($row['C20_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_3 id=C20_3	type=radio value=SI "; if ($row['C20_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_3 id=C20a_3	type=radio value=NO "; if ($row['C20_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_3 id=C20b_3	type=radio value=NA "; if ($row['C20_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_4 id=C20_4	type=radio value=SI "; if ($row['C20_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_4 id=C20a_4	type=radio value=NO "; if ($row['C20_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_4 id=C20b_4	type=radio value=NA "; if ($row['C20_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_5 id=C20_5	type=radio value=SI "; if ($row['C20_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_5 id=C20a_5	type=radio value=NO "; if ($row['C20_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C20_5 id=C20b_5	type=radio value=NA "; if ($row['C20_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_6 id=C20_6	type=radio value=SI "; if ($row['C20_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_6 id=C20a_6	type=radio value=NO "; if ($row['C20_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C20_6 id=C20b_6	type=radio value=NA "; if ($row['C20_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn3>
					<td class=A21><input name=C21_1 id=C21_1	type=radio value=SI "; if ($row['C21_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C21_1 id=C21a_1	type=radio value=NO "; if ($row['C21_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_1 id=C21b_1	type=radio value=NA "; if ($row['C21_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_2 id=C21_2	type=radio value=SI "; if ($row['C21_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_2 id=C21a_2	type=radio value=NO "; if ($row['C21_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_2 id=C21b_2	type=radio value=NA "; if ($row['C21_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_3 id=C21_3	type=radio value=SI "; if ($row['C21_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_3 id=C21a_3	type=radio value=NO "; if ($row['C21_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_3 id=C21b_3	type=radio value=NA "; if ($row['C21_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_4 id=C21_4	type=radio value=SI "; if ($row['C21_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_4 id=C21a_4	type=radio value=NO "; if ($row['C21_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_4 id=C21b_4	type=radio value=NA "; if ($row['C21_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_5 id=C21_5	type=radio value=SI "; if ($row['C21_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_5 id=C21a_5	type=radio value=NO "; if ($row['C21_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C21_5 id=C21b_5	type=radio value=NA "; if ($row['C21_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_6 id=C21_6	type=radio value=SI "; if ($row['C21_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_6 id=C21a_6	type=radio value=NO "; if ($row['C21_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C21_6 id=C21b_6	type=radio value=NA "; if ($row['C21_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C22_1 id=C22_1	type=radio value=SI "; if ($row['C22_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C22_1 id=C22a_1	type=radio value=NO "; if ($row['C22_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_1 id=C22b_1	type=radio value=NA "; if ($row['C22_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_2 id=C22_2	type=radio value=SI "; if ($row['C22_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_2 id=C22a_2	type=radio value=NO "; if ($row['C22_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_2 id=C22b_2	type=radio value=NA "; if ($row['C22_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_3 id=C22_3	type=radio value=SI "; if ($row['C22_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_3 id=C22a_3	type=radio value=NO "; if ($row['C22_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_3 id=C22b_3	type=radio value=NA "; if ($row['C22_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_4 id=C22_4	type=radio value=SI "; if ($row['C22_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_4 id=C22a_4	type=radio value=NO "; if ($row['C22_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_4 id=C22b_4	type=radio value=NA "; if ($row['C22_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_5 id=C22_5	type=radio value=SI "; if ($row['C22_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_5 id=C22a_5	type=radio value=NO "; if ($row['C22_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C22_5 id=C22b_5	type=radio value=NA "; if ($row['C22_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_6 id=C22_6	type=radio value=SI "; if ($row['C22_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_6 id=C22a_6	type=radio value=NO "; if ($row['C22_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C22_6 id=C22b_6	type=radio value=NA "; if ($row['C22_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C23_1 id=C23_1	type=radio value=SI "; if ($row['C23_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C23_1 id=C23a_1	type=radio value=NO "; if ($row['C23_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_1 id=C23b_1	type=radio value=NA "; if ($row['C23_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_2 id=C23_2	type=radio value=SI "; if ($row['C23_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_2 id=C23a_2	type=radio value=NO "; if ($row['C23_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_2 id=C23b_2	type=radio value=NA "; if ($row['C23_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_3 id=C23_3	type=radio value=SI "; if ($row['C23_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_3 id=C23a_3	type=radio value=NO "; if ($row['C23_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_3 id=C23b_3	type=radio value=NA "; if ($row['C23_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_4 id=C23_4	type=radio value=SI "; if ($row['C23_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_4 id=C23a_4	type=radio value=NO "; if ($row['C23_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_4 id=C23b_4	type=radio value=NA "; if ($row['C23_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_5 id=C23_5	type=radio value=SI "; if ($row['C23_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_5 id=C23a_5	type=radio value=NO "; if ($row['C23_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C23_5 id=C23b_5	type=radio value=NA "; if ($row['C23_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_6 id=C23_6	type=radio value=SI "; if ($row['C23_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_6 id=C23a_6	type=radio value=NO "; if ($row['C23_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C23_6 id=C23b_6	type=radio value=NA "; if ($row['C23_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>

<!--
				<tr height=70px>
					<td colspan=3 class=A21>DÍA 1<input id=fechaB1b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 class=A22>DÍA 2<input id=fechaB2b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 class=A21>DÍA 3<input id=fechaB3b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 class=A22>DÍA 4<input id=fechaB4b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 class=A21>DÍA 5<input id=fechaB5b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
					<td colspan=3 class=A22>DÍA 6<input id=fechaB6b style='width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0' readonly></td>
				</tr>
				<tr height=40px>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
					<td class=A21>SI</td><td class=A21>NO</td><td class=A21>NA</td>
					<td class=A22>SI</td><td class=A22>NO</td><td class=A22>NA</td>
				</tr>
-->
				<tr height=70px><td colspan=18 style=background-color:rgba(0,0,0,0.20)></td></tr>

				<tr class=Cn2>
					<td class=A21><input name=C24_1 id=C24_1	type=radio value=SI "; if ($row['C24_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C24_1 id=C24a_1	type=radio value=NO "; if ($row['C24_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_1 id=C24b_1	type=radio value=NA "; if ($row['C24_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_2 id=C24_2	type=radio value=SI "; if ($row['C24_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_2 id=C24a_2	type=radio value=NO "; if ($row['C24_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_2 id=C24b_2	type=radio value=NA "; if ($row['C24_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_3 id=C24_3	type=radio value=SI "; if ($row['C24_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_3 id=C24a_3	type=radio value=NO "; if ($row['C24_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_3 id=C24b_3	type=radio value=NA "; if ($row['C24_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_4 id=C24_4	type=radio value=SI "; if ($row['C24_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_4 id=C24a_4	type=radio value=NO "; if ($row['C24_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_4 id=C24b_4	type=radio value=NA "; if ($row['C24_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_5 id=C24_5	type=radio value=SI "; if ($row['C24_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_5 id=C24a_5	type=radio value=NO "; if ($row['C24_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C24_5 id=C24b_5	type=radio value=NA "; if ($row['C24_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_6 id=C24_6	type=radio value=SI "; if ($row['C24_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_6 id=C24a_6	type=radio value=NO "; if ($row['C24_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C24_6 id=C24b_6	type=radio value=NA "; if ($row['C24_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C25_1 id=C25_1	type=radio value=SI "; if ($row['C25_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C25_1 id=C25a_1	type=radio value=NO "; if ($row['C25_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_1 id=C25b_1	type=radio value=NA "; if ($row['C25_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_2 id=C25_2	type=radio value=SI "; if ($row['C25_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_2 id=C25a_2	type=radio value=NO "; if ($row['C25_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_2 id=C25b_2	type=radio value=NA "; if ($row['C25_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_3 id=C25_3	type=radio value=SI "; if ($row['C25_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_3 id=C25a_3	type=radio value=NO "; if ($row['C25_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_3 id=C25b_3	type=radio value=NA "; if ($row['C25_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_4 id=C25_4	type=radio value=SI "; if ($row['C25_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_4 id=C25a_4	type=radio value=NO "; if ($row['C25_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_4 id=C25b_4	type=radio value=NA "; if ($row['C25_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_5 id=C25_5	type=radio value=SI "; if ($row['C25_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_5 id=C25a_5	type=radio value=NO "; if ($row['C25_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C25_5 id=C25b_5	type=radio value=NA "; if ($row['C25_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_6 id=C25_6	type=radio value=SI "; if ($row['C25_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_6 id=C25a_6	type=radio value=NO "; if ($row['C25_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C25_6 id=C25b_6	type=radio value=NA "; if ($row['C25_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C26_1 id=C26_1	type=radio value=SI "; if ($row['C26_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C26_1 id=C26a_1	type=radio value=NO "; if ($row['C26_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_1 id=C26b_1	type=radio value=NA "; if ($row['C26_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_2 id=C26_2	type=radio value=SI "; if ($row['C26_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_2 id=C26a_2	type=radio value=NO "; if ($row['C26_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_2 id=C26b_2	type=radio value=NA "; if ($row['C26_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_3 id=C26_3	type=radio value=SI "; if ($row['C26_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_3 id=C26a_3	type=radio value=NO "; if ($row['C26_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_3 id=C26b_3	type=radio value=NA "; if ($row['C26_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_4 id=C26_4	type=radio value=SI "; if ($row['C26_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_4 id=C26a_4	type=radio value=NO "; if ($row['C26_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_4 id=C26b_4	type=radio value=NA "; if ($row['C26_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_5 id=C26_5	type=radio value=SI "; if ($row['C26_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_5 id=C26a_5	type=radio value=NO "; if ($row['C26_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C26_5 id=C26b_5	type=radio value=NA "; if ($row['C26_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_6 id=C26_6	type=radio value=SI "; if ($row['C26_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_6 id=C26a_6	type=radio value=NO "; if ($row['C26_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C26_6 id=C26b_6	type=radio value=NA "; if ($row['C26_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C27_1 id=C27_1	type=radio value=SI "; if ($row['C27_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C27_1 id=C27a_1	type=radio value=NO "; if ($row['C27_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_1 id=C27b_1	type=radio value=NA "; if ($row['C27_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_2 id=C27_2	type=radio value=SI "; if ($row['C27_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_2 id=C27a_2	type=radio value=NO "; if ($row['C27_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_2 id=C27b_2	type=radio value=NA "; if ($row['C27_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_3 id=C27_3	type=radio value=SI "; if ($row['C27_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_3 id=C27a_3	type=radio value=NO "; if ($row['C27_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_3 id=C27b_3	type=radio value=NA "; if ($row['C27_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_4 id=C27_4	type=radio value=SI "; if ($row['C27_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_4 id=C27a_4	type=radio value=NO "; if ($row['C27_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_4 id=C27b_4	type=radio value=NA "; if ($row['C27_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_5 id=C27_5	type=radio value=SI "; if ($row['C27_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_5 id=C27a_5	type=radio value=NO "; if ($row['C27_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C27_5 id=C27b_5	type=radio value=NA "; if ($row['C27_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_6 id=C27_6	type=radio value=SI "; if ($row['C27_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_6 id=C27a_6	type=radio value=NO "; if ($row['C27_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C27_6 id=C27b_6	type=radio value=NA "; if ($row['C27_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C28_1 id=C28_1	type=radio value=SI "; if ($row['C28_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C28_1 id=C28a_1	type=radio value=NO "; if ($row['C28_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_1 id=C28b_1	type=radio value=NA "; if ($row['C28_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_2 id=C28_2	type=radio value=SI "; if ($row['C28_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_2 id=C28a_2	type=radio value=NO "; if ($row['C28_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_2 id=C28b_2	type=radio value=NA "; if ($row['C28_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_3 id=C28_3	type=radio value=SI "; if ($row['C28_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_3 id=C28a_3	type=radio value=NO "; if ($row['C28_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_3 id=C28b_3	type=radio value=NA "; if ($row['C28_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_4 id=C28_4	type=radio value=SI "; if ($row['C28_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_4 id=C28a_4	type=radio value=NO "; if ($row['C28_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_4 id=C28b_4	type=radio value=NA "; if ($row['C28_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_5 id=C28_5	type=radio value=SI "; if ($row['C28_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_5 id=C28a_5	type=radio value=NO "; if ($row['C28_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C28_5 id=C28b_5	type=radio value=NA "; if ($row['C28_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_6 id=C28_6	type=radio value=SI "; if ($row['C28_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_6 id=C28a_6	type=radio value=NO "; if ($row['C28_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C28_6 id=C28b_6	type=radio value=NA "; if ($row['C28_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C29_1 id=C29_1	type=radio value=SI "; if ($row['C29_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C29_1 id=C29a_1	type=radio value=NO "; if ($row['C29_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_1 id=C29b_1	type=radio value=NA "; if ($row['C29_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_2 id=C29_2	type=radio value=SI "; if ($row['C29_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_2 id=C29a_2	type=radio value=NO "; if ($row['C29_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_2 id=C29b_2	type=radio value=NA "; if ($row['C29_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_3 id=C29_3	type=radio value=SI "; if ($row['C29_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_3 id=C29a_3	type=radio value=NO "; if ($row['C29_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_3 id=C29b_3	type=radio value=NA "; if ($row['C29_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_4 id=C29_4	type=radio value=SI "; if ($row['C29_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_4 id=C29a_4	type=radio value=NO "; if ($row['C29_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_4 id=C29b_4	type=radio value=NA "; if ($row['C29_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_5 id=C29_5	type=radio value=SI "; if ($row['C29_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_5 id=C29a_5	type=radio value=NO "; if ($row['C29_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C29_5 id=C29b_5	type=radio value=NA "; if ($row['C29_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_6 id=C29_6	type=radio value=SI "; if ($row['C29_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_6 id=C29a_6	type=radio value=NO "; if ($row['C29_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C29_6 id=C29b_6	type=radio value=NA "; if ($row['C29_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C30_1 id=C30_1	type=radio value=SI "; if ($row['C30_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C30_1 id=C30a_1	type=radio value=NO "; if ($row['C30_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_1 id=C30b_1	type=radio value=NA "; if ($row['C30_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_2 id=C30_2	type=radio value=SI "; if ($row['C30_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_2 id=C30a_2	type=radio value=NO "; if ($row['C30_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_2 id=C30b_2	type=radio value=NA "; if ($row['C30_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_3 id=C30_3	type=radio value=SI "; if ($row['C30_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_3 id=C30a_3	type=radio value=NO "; if ($row['C30_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_3 id=C30b_3	type=radio value=NA "; if ($row['C30_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_4 id=C30_4	type=radio value=SI "; if ($row['C30_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_4 id=C30a_4	type=radio value=NO "; if ($row['C30_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_4 id=C30b_4	type=radio value=NA "; if ($row['C30_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_5 id=C30_5	type=radio value=SI "; if ($row['C30_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_5 id=C30a_5	type=radio value=NO "; if ($row['C30_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C30_5 id=C30b_5	type=radio value=NA "; if ($row['C30_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_6 id=C30_6	type=radio value=SI "; if ($row['C30_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_6 id=C30a_6	type=radio value=NO "; if ($row['C30_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C30_6 id=C30b_6	type=radio value=NA "; if ($row['C30_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C31_1 id=C31_1	type=radio value=SI "; if ($row['C31_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C31_1 id=C31a_1	type=radio value=NO "; if ($row['C31_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_1 id=C31b_1	type=radio value=NA "; if ($row['C31_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_2 id=C31_2	type=radio value=SI "; if ($row['C31_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_2 id=C31a_2	type=radio value=NO "; if ($row['C31_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_2 id=C31b_2	type=radio value=NA "; if ($row['C31_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_3 id=C31_3	type=radio value=SI "; if ($row['C31_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_3 id=C31a_3	type=radio value=NO "; if ($row['C31_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_3 id=C31b_3	type=radio value=NA "; if ($row['C31_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_4 id=C31_4	type=radio value=SI "; if ($row['C31_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_4 id=C31a_4	type=radio value=NO "; if ($row['C31_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_4 id=C31b_4	type=radio value=NA "; if ($row['C31_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_5 id=C31_5	type=radio value=SI "; if ($row['C31_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_5 id=C31a_5	type=radio value=NO "; if ($row['C31_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C31_5 id=C31b_5	type=radio value=NA "; if ($row['C31_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_6 id=C31_6	type=radio value=SI "; if ($row['C31_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_6 id=C31a_6	type=radio value=NO "; if ($row['C31_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C31_6 id=C31b_6	type=radio value=NA "; if ($row['C31_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C32_1 id=C32_1	type=radio value=SI "; if ($row['C32_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C32_1 id=C32a_1	type=radio value=NO "; if ($row['C32_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_1 id=C32b_1	type=radio value=NA "; if ($row['C32_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_2 id=C32_2	type=radio value=SI "; if ($row['C32_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_2 id=C32a_2	type=radio value=NO "; if ($row['C32_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_2 id=C32b_2	type=radio value=NA "; if ($row['C32_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_3 id=C32_3	type=radio value=SI "; if ($row['C32_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_3 id=C32a_3	type=radio value=NO "; if ($row['C32_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_3 id=C32b_3	type=radio value=NA "; if ($row['C32_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_4 id=C32_4	type=radio value=SI "; if ($row['C32_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_4 id=C32a_4	type=radio value=NO "; if ($row['C32_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_4 id=C32b_4	type=radio value=NA "; if ($row['C32_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_5 id=C32_5	type=radio value=SI "; if ($row['C32_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_5 id=C32a_5	type=radio value=NO "; if ($row['C32_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C32_5 id=C32b_5	type=radio value=NA "; if ($row['C32_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_6 id=C32_6	type=radio value=SI "; if ($row['C32_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_6 id=C32a_6	type=radio value=NO "; if ($row['C32_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C32_6 id=C32b_6	type=radio value=NA "; if ($row['C32_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C33_1 id=C33_1	type=radio value=SI "; if ($row['C33_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C33_1 id=C33a_1	type=radio value=NO "; if ($row['C33_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_1 id=C33b_1	type=radio value=NA "; if ($row['C33_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_2 id=C33_2	type=radio value=SI "; if ($row['C33_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_2 id=C33a_2	type=radio value=NO "; if ($row['C33_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_2 id=C33b_2	type=radio value=NA "; if ($row['C33_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_3 id=C33_3	type=radio value=SI "; if ($row['C33_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_3 id=C33a_3	type=radio value=NO "; if ($row['C33_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_3 id=C33b_3	type=radio value=NA "; if ($row['C33_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_4 id=C33_4	type=radio value=SI "; if ($row['C33_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_4 id=C33a_4	type=radio value=NO "; if ($row['C33_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_4 id=C33b_4	type=radio value=NA "; if ($row['C33_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_5 id=C33_5	type=radio value=SI "; if ($row['C33_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_5 id=C33a_5	type=radio value=NO "; if ($row['C33_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C33_5 id=C33b_5	type=radio value=NA "; if ($row['C33_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_6 id=C33_6	type=radio value=SI "; if ($row['C33_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_6 id=C33a_6	type=radio value=NO "; if ($row['C33_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C33_6 id=C33b_6	type=radio value=NA "; if ($row['C33_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C34_1 id=C34_1	type=radio value=SI "; if ($row['C34_1'] == 'SI') {echo 'checked';} echo " required></td>
					<td class=A21><input name=C34_1 id=C34a_1	type=radio value=NO "; if ($row['C34_1'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_1 id=C34b_1	type=radio value=NA "; if ($row['C34_1'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_2 id=C34_2	type=radio value=SI "; if ($row['C34_2'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_2 id=C34a_2	type=radio value=NO "; if ($row['C34_2'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_2 id=C34b_2	type=radio value=NA "; if ($row['C34_2'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_3 id=C34_3	type=radio value=SI "; if ($row['C34_3'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_3 id=C34a_3	type=radio value=NO "; if ($row['C34_3'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_3 id=C34b_3	type=radio value=NA "; if ($row['C34_3'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_4 id=C34_4	type=radio value=SI "; if ($row['C34_4'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_4 id=C34a_4	type=radio value=NO "; if ($row['C34_4'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_4 id=C34b_4	type=radio value=NA "; if ($row['C34_4'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_5 id=C34_5	type=radio value=SI "; if ($row['C34_5'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_5 id=C34a_5	type=radio value=NO "; if ($row['C34_5'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A21><input name=C34_5 id=C34b_5	type=radio value=NA "; if ($row['C34_5'] == 'NA') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_6 id=C34_6	type=radio value=SI "; if ($row['C34_6'] == 'SI') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_6 id=C34a_6	type=radio value=NO "; if ($row['C34_6'] == 'NO') {echo 'checked';} echo "></td>
					<td class=A22><input name=C34_6 id=C34b_6	type=radio value=NA "; if ($row['C34_6'] == 'NA') {echo 'checked';} echo "></td>
				</tr>
			</table>
<!-- /10 -->			</div>
<!-- 11 -->			<div style='position:relative; width:5.30%; left:23.10%; top:-2910.50px; background-color:white'>
			<table border=1>
				<tr rowspan=2 height=120px><td class=A2></td></tr>
				<tr class=Cn3><td class=Cn>1.</td></tr>
				<tr class=Cn2><td class=Cn>2.</td></tr>
				<tr class=Cn3><td class=Cn>3.</td></tr>
				<tr class=Cn3><td class=Cn>4.</td></tr>
				<tr class=Cn2><td class=Cn>5.</td></tr>
				<tr class=Cn1><td class=Cn>6.</td></tr>
				<tr class=Cn2><td class=Cn>7.</td></tr>
				<tr class=Cn4><td class=Cn>8.</td></tr>
				<tr class=Cn1><td class=Cn>9.</td></tr>
				<tr class=Cn2><td class=Cn>10.</td></tr>
				<tr class=Cn1><td class=Cn>11.</td></tr>
				<tr class=Cn2><td class=Cn>12.</td></tr>
				<tr class=Cn4><td class=Cn>13.</td></tr>
				<tr class=Cn1><td class=Cn>14.</td></tr>
				<tr class=Cn3><td class=Cn>15.</td></tr>
				<tr class=Cn1><td class=Cn>16.</td></tr>
				<tr class=Cn2><td class=Cn>17.</td></tr>
				<tr class=Cn1><td class=Cn>18.</td></tr>
				<tr class=Cn2><td class=Cn>19.</td></tr>
				<tr class=Cn2><td class=Cn>20.</td></tr>
				<tr class=Cn3><td class=Cn>21.</td></tr>
				<tr class=Cn2><td class=Cn>22.</td></tr>
				<tr class=Cn3><td class=Cn>23.</td></tr>

<!--				<tr rowspan=2 height=111.50px><td class=A2></td></tr> -->
<!--				<tr height=70><td class=A2></td></tr>		<tr height=40><td class=A2></td></tr> -->
				<tr height=70><td style=background-color:rgba(0,0,0,0.20)></td></tr>

				<tr class=Cn2><td class=Cn>24.</td></tr>
				<tr class=Cn2><td class=Cn>25.</td></tr>
				<tr class=Cn1><td class=Cn>26.</td></tr>
				<tr class=Cn1><td class=Cn>27.</td></tr>
				<tr class=Cn1><td class=Cn>28.</td></tr>
				<tr class=Cn1><td class=Cn>29.</td></tr>
				<tr class=Cn1><td class=Cn>30.</td></tr>
				<tr class=Cn1><td class=Cn>31.</td></tr>
				<tr class=Cn1><td class=Cn>32.</td></tr>
				<tr class=Cn1><td class=Cn>33.</td></tr>
				<tr class=Cn1><td class=Cn>34.</td></tr>
			</table>
<!-- /11 -->			</div>
<!-- 12 -->			<div style='position:relative; width:70.85%; left:28.40%; top:-5830px'>
			<table border=1>
				<tr height=120px rowspan=2><td class=A2 style='text-align:center; vertical-align:middle'>DESCRIPCIÓN</td></tr>
				<tr class=Cn3><td class=Cp>El personal tiene vigente la seguridad social, concepto médico de aptitud, entrenamiento y certificación en espacio confinado según el rol?</td></tr>
				<tr class=Cn2><td class=Cp>Hay un procedimiento específico de la actividad a realizar?</td></tr>
				<tr class=Cn3><td class=Cp>El personal destinado para la atención de emergencias está entrenado y participó en el simulacro previo a la actividad?</td></tr>
				<tr class=Cn3><td class=Cp>Líneas de entrada y salida del espacio confinado se encuentran con aislamiento, bloqueadas y etiquetadas?</td></tr>
				<tr class=Cn2><td class=Cp>Permiten los factores externos hacer el trabajo con seguridad? (viento, tormentas, lluvia, sol, etc.)</td></tr>
				<tr class=Cn1><td class=Cp>El sitio de trabajo está desgasificado y limpio?</td></tr>
				<tr class=Cn2><td class=Cp>Se realiza medición de la atmósfera del espacio confinado?</td></tr>
				<tr class=Cn4><td class=Cp>Este permiso incluye desacople de equipos operativos, que puedan generar drenaje, vapores de producto u otra energía peligrosa? Ver requerimientos respaldo de esta hoja</td?</tr>
				<tr class=Cn1><td class=Cp>Se tiene iluminación adecuada?</td></tr>
				<tr class=Cn2><td class=Cp>Se requiere ventilación y extracción forzada?, ¿Equipos disponibles?</td></tr>
				<tr class=Cn1><td class=Cp>Se tiene ingreso y salida libres?</td></tr>
				<tr class=Cn2><td class=Cp>Se han definido los tiempos de trabajo y relevos en el EC?</td></tr>
				<tr class=Cn4><td class=Cp>Se tiene en cuenta la posibilidad de cambios en la atmósfera del Espacio Confinado? Ver requerimientos para soldadura en el respaldo de esta hoja</td></tr>
				<tr class=Cn1><td class=Cp>Se tienen precauciones para el estrés térmico?</td></tr>
				<tr class=Cn3><td class=Cp>Están los desagües y áreas cercanas limpias y libres de sustancias combustibles, inflamables, tóxicos?</td></tr>
				<tr class=Cn1><td class=Cp>Se demarcó y señalizó el área bajo control?</td></tr>
				<tr class=Cn2><td class=Cp>Está disponible y listo el Equipo de Primeros Auxilios?</td></tr>
				<tr class=Cn1><td class=Cp>Está disponible y listo el Equipo Contra Incendio?</td></tr>
				<tr class=Cn2><td class=Cp>Se han suspendido tareas vecinas que puedan afectar el trabajo?</td></tr>
				<tr class=Cn2><td class=Cp>Se tienen precauciones para exposición al plomo?</td></tr>
				<tr class=Cn3><td class=Cp>El procedimiento de rescate y plan de emergencias específico para la tarea está disponible y ha sido probado?</td></tr>
				<tr class=Cn2><td class=Cp>Hay un medio de comunicación permanente con el exterior?</td></tr>
				<tr class=Cn3><td class=Cp>Todo el personal que va a ingresar al espacio confinado realizó el autoreporte de condiciones de salud?</td></tr>

<!--				<tr height=111.50px rowspan=2><td class=A2 style=text-align:center>DESCRIPCIÓN</td></tr> -->
				<tr height=70><td class=Cp style='background-color:rgba(0,0,0,0.20); color:rgba(0,0,0,1); font-size:28px; text-align:center'><b>Elementos de Protección</b><br>(Ver matriz de EPPs vigente)</td></tr>

				<tr class=Cn2><td class=Cp>Respirador autónomo (Suministro aire grado D, SCBA, 5 min, etc)</td></tr>
				<tr class=Cn2><td class=Cp>Protección respiratoria (con cartucho o filtro purificador de aire)</td></tr>
				<tr class=Cn1><td class=Cp>Protección auditiva</td></tr>
				<tr class=Cn1><td class=Cp>Protección facial</td></tr>
				<tr class=Cn1><td class=Cp>Gafas de seguridad</td></tr>
				<tr class=Cn1><td class=Cp>Zapatos de seguridad tipo:</td></tr>
				<tr class=Cn1><td class=Cp>Guantes tipo:</td></tr>
				<tr class=Cn1><td class=Cp>Arnés de seguridad, eslingas, línea de vida</td></tr>
				<tr class=Cn1><td class=Cp>Equipo de salvamento</td></tr>
				<tr class=Cn1><td class=Cp>Ropa tipo:</td></tr>
				<tr class=Cn1><td class=Cp>Otro:</td></tr>
			</table>
<!-- /12 -->			</div>
<!-- 13 -->	<div style='position:relative; width:100vw; left:0px; top:-5820px'>		<!-- este div sube el formato de aqui hacia abajo -->
			<table border=0>
				<tr><td width=1%></td><td width=98%></td><td width=1%></td></tr>
				<tr height=35>
					<td></td>
					<td class=C>Consulte la guía de medición de gases al reverso, la medición debe ser continua y se debe registrar mínimo cada hora en el anexo 1.</td>
					<td></td>
				</tr>
				<tr height=55>
					<td></td>
					<td style='text-align:left; vertical-align:bottom' class=B>OBSERVACIONES</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class=A><textarea name=observaciones maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[observaciones]</textarea></td>
					<td></td>
				</tr>
				<tr height=55>
					<td></td>
					<td style='text-align:left; vertical-align:bottom' class=B>HERRAMIENTAS Y/O EQUIPOS A UTILIZAR EN LA ACTIVIDAD</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class=A><textarea name=herramientas maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required>$row[herramientas]</textarea></td>
					<td></td>
				</tr>
			</table>
			<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;D. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo que los requisitos indicados en la sección C se cumplen y que hay seguridad para ingresar al espacio confinado y para realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=ejecutorD value='$row[ejecutorD]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccD value='$row[ejecutor_ccD]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaD type=date style='width:100%; display:none' min='$row[ejecutor_fechaD]' max='$row[ejecutor_fechaD]' value='$row[ejecutor_fechaD]'></td>
				<td><input name=ejecutor_horaD value='$row[ejecutor_horaD]' type=time style=width:96% required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=supervisorD value='$row[supervisorD]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccD value='$row[supervisor_ccD]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaD type=date style='width:100%; display:none' min='$row[supervisor_fechaD]' max='$row[supervisor_fechaD]' value='$row[supervisor_fechaD]'></td>
				<td><input name=supervisor_horaD value='$row[supervisor_horaD]' type=time style=width:96% required></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=vigiaD value='$row[vigiaD]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=vigia_ccD value='$row[vigia_ccD]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=vigia_fechaD type=date style='width:100%; display:none' min='$row[vigia_fechaD]' max='$row[vigia_fechaD]' value='$row[vigia_fechaD]'></td>
				<td><input name=vigia_horaD value='$row[vigia_horaD]' type=time style=width:96% required></td>
			</tr>
			<tr><td>VIGIA</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;E. AUTORIZACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Certifico que los aislamientos y desacoples se han efectuado apropiadamente y que el área es segura para el ingreso.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Por lo tanto, autorizo el ingreso al Espacio Confinado y la realización del trabajo indicado en la Sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>Este permiso perderá validez cuando: El trabajo pierde la continuidad (días) o cuando ingresa una persona diferente a las autorizadas.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=emisorE value='$row[emisorE]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccE value='$row[emisor_ccE]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaE type=date style='width:100%; display:none' min='$row[emisor_fechaE]' max='$row[emisor_fechaE]' value='$row[emisor_fechaE]'></td>
				<td><input name=emisor_horaE value='$row[emisor_horaE]' type=time style=width:96% required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;F. CANCELACIÓN</b></td></tr>
			<tr><td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td><td class=B>Cuando se diligencia esta sección el permiso NO puede ser revalidado.</td></tr>
			<tr><td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td><td class=B>Certifico que el trabajo que motivó el ingreso al espacio confinado:</td></tr>
		</table>
		<table border=0>
			<tr height=10px><td width=5%></td><td width=4%></td><td width=23%></td><td width=4%></td><td width=23%></td><td width=4%></td><td width=32%></td><td width=5%></td></tr>
			<tr>
				<td></td>
				<td><input name=certificadoF id=A type=radio value=A "; if ($row['certificadoF'] == 'A') {echo 'checked';} echo " required></td>
				<td class=B> &nbsp;Se ha<br> &nbsp;completado</td>
				<td><input name=certificadoF id=B type=radio value=B "; if ($row['certificadoF'] == 'B') {echo 'checked';} echo "></td>
				<td class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
				<td><input name=certificadoF id=C type=radio value=C "; if ($row['certificadoF'] == 'C') {echo 'checked';} echo "></td>
				<td class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
				<td></td>
			</tr>
			<tr height=10px><td></td></tr>
			<tr>
				<td></td>
				<td colspan=7 class=B>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.</td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=60.49%></td><td width=21.00%></td><td width= 0.01%></td><td width=18.50%></td></tr>
			<tr>
				<td><input name=ejecutorF value='$row[ejecutorF]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccF value='$row[ejecutor_ccF]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaF type=date style='width:100%; display:none' min='$row[ejecutor_fechaF]' max='$row[ejecutor_fechaF]' value='$row[ejecutor_fechaF]'></td>
				<td><input name=ejecutor_horaF value='$row[ejecutor_horaF]' type=time style=width:96% required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=supervisorF value='$row[supervisorF]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccF value='$row[supervisor_ccF]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaF type=date style='width:100%; display:none' min='$row[supervisor_fechaF]' max='$row[supervisor_fechaF]' value='$row[supervisor_fechaF]'></td>
				<td><input name=supervisor_horaF value='$row[supervisor_horaF]' type=time style=width:96% required></td>
				<td></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=emisorF value='$row[emisorF]' style=width:98% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccF value='$row[emisor_ccF]' inputmode=numeric style='width:96%; text-align:center' maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaF type=date style='width:100%; display:none' min='$row[emisor_fechaF]' max='$row[emisor_fechaF]' value='$row[emisor_fechaF]'></td>
				<td><input name=emisor_horaF value='$row[emisor_horaF]' type=time style=width:96% required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
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
		<table border=0>
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
		<table border=0>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style='font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)'>REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href='mailto:"; echo $correo_pedidos; echo "?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo'>
					<img src='../../../../../common/imagenes/piedepagina_horizontal.svg' style='pointer-events:auto; width:100%; height:auto'>
					</a>
				</td>
			</tr>
		</table>
		<hr>		<!-- la línea de tamaño final del formato -->
	</div>
<!-- /13 -->	</div>
<!-- /9 -->	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 -->		</div>
</form>

"; ?>		<!-- cierre del php que se usa para editar el formato -->
<!-- /1 -->	</div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
