<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
	td.C			{font-size:30px; text-align:left; font-weight:bold}
	td.Cn			{font-size:30px; text-align:right}
	td.Cp			{font-size:30px; text-align:left; padding:0 5}
	tr.C			{height: 85px; vertical-align:middle}
	tr.Cn			{height:180px; vertical-align:middle}
	tr.Cn0		{height:111px; vertical-align:top}
	tr.Cn1		{height: 44px; vertical-align:top}
	tr.Cn2		{height: 72px; vertical-align:top}
	tr.Cn3		{height:108px; vertical-align:top}
	tr.Cn4		{height:144px; vertical-align:top}
	tr.Cn5		{height:180px; vertical-align:top}
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
<!-- 1 --> <div class=noimprimir>
<div class=fijar style="top:15px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:7375px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<?=$estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:100%; display:inline-block; background-color:none"><b><?=$$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:rgba(255,255,255,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style="font-size:20.00px">CONSULTE EL MANUAL DE PERMISOS DE TRABAJO PARA DESARROLLAR ESTE FORMATO</span><br>
					<span style="font-size:20.00px">ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA, SE SUSPENDEN ACTIVIDADES Y SE DIRIGEN AL PUNTO DE ENCUENTRO.&nbsp;&nbsp;HASTA QUE EL EMISOR DETERMINE EL REINICIO O CANCELACIÓN DE LAS ACTIVIDADES</span><br>
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=3%></td><td width=45%></td><td width=4%></td><td width=45%></td><td width=3%></td></tr>
			<tr><td class=B colspan=4><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td></td>
				<td class=B style="text-align:right; border:0px solid black">TRABAJO EN CALIENTE&nbsp;<input name=tipo_trabajo type=radio value=C onclick=gestionarClickRadio(this) required></td>
				<td></td>
				<td class=B style="text-align:left;  border:0px solid black"><input name=tipo_trabajo type=radio value=F onclick=gestionarClickRadio(this)>&nbsp;TRABAJO EN FRÍO</td>
				<td></td>
			</tr>
		</table>
		<hr>
		<table border=0>
			<tr height=30><td></td></tr>
			<tr><td>&nbsp;&nbsp;DESCRIPCIÓN</td></tr>
			<tr><td><textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
			<tr height=30><td></td></tr>
			<tr><td>&nbsp;&nbsp;UBICACIÓN</td></tr>
			<tr><td><textarea name=ubicacion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td></tr>
		</table>
		<table border=0>
			<tr height=30><td width=36%></td><td width=1%></td><td width=32%></td><td width=1%></td><td width=30%></td></tr>
			<tr><td>CERTIFICADO<br>GAS FREE</td><td></td><td>CERTIF. LIBRE PLOMO<br>(Interior tanque)</td><td></td><td>PROCEDIMIENTO/<br>APT</td></tr>
			<tr>
				<td><input name=certificado_gas_free		class=consecutivo inputmode=numeric maxlength=6 value='' pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=certificado_libre_plomo	class=consecutivo inputmode=numeric maxlength=6 value='' pattern=^(?:[0-9]{4,6})$ required></td><td></td>
				<td><input name=procedimiento						class=consecutivo inputmode=numeric maxlength=6 value='' pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=5%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=3%></td><td width=3%></td><td width=21.50%></td><td width=1.50%></td><td width=19.00%></td><td width=5%></td></tr>
			<tr><td></td><td colspan=3>APERTURA PERMISO</td><td></td><td></td><td colspan=3>CIERRE PERMISO</td><td></td></tr>
			<tr>
				<td></td>
				<td><input name=fecha_apertura type=date value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td><td></td>
				<td><input name=hora_apertura	 type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
				<td></td>
				<td></td>
				<td><input name=fecha_cierre	 type=date value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td><td></td>
				<td><input name=hora_cierre		 type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr height=30px><td width=79%></td><td width=1%></td><td width=20%></td></tr>
			<tr><td colspan=3 style=text-align:center class=B>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;<input name=cantidad id=cantidad value='' style="width:8%; text-align:center" inputmode=numeric maxlength=1 pattern=^(?:[1-5]{1})$ title="Mínimo 1 máximo 5 personas." required></td></tr>
			<tr height=10px><td></td></tr>
		</table>
		<div id=nombre style="position:absolute; display:none; width:43.75%; left:0.50%; background-color:white">
			<table border=0>
				<tr height=80px><td class=A3><b>NOMBRE Y APELLIDOS</b></td></tr>
				<tr><td><input name=nombre1 id=nombre1 value='' style="width:100%; display:none" placeholder=Persona&nbsp;autorizada&nbsp;1 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre2 id=nombre2 value='' style="width:100%; display:none" placeholder=Persona&nbsp;autorizada&nbsp;2 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre3 id=nombre3 value='' style="width:100%; display:none" placeholder=Persona&nbsp;autorizada&nbsp;3 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre4 id=nombre4 value='' style="width:100%; display:none" placeholder=Persona&nbsp;autorizada&nbsp;4 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr><td><input name=nombre5 id=nombre5 value='' style="width:100%; display:none" placeholder=Persona&nbsp;autorizada&nbsp;5 maxlength=30 pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div id=dkf style="position:absolute; display:none; width:55.00%; left:44.25%; background-color:white; overflow:scroll">
			<table border=0>
				<tr height=80px>
					<td style=width:190px class=A2><b>CÉDULA</b></td>
					<td style=width:350px	class=A2><b>CARGO (ROL)</b></td>
					<td style=width:100px	class=A2><b>FIRMA</b></td>
				</tr>
				<tr>
					<td><input name=cedula1 id=cedula1 value='' style="width:100%; display:none; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo1	id=cargo1  value='' style="width:100%; display:none" maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style="background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)"></td>
				</tr>
				<tr>
					<td><input name=cedula2 id=cedula2 value='' style="width:100%; display:none; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo2	id=cargo2  value='' style="width:100%; display:none" maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style="background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)"></td>
				</tr>
				<tr>
					<td><input name=cedula3 id=cedula3 value='' style="width:100%; display:none; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo3	id=cargo3  value='' style="width:100%; display:none" maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style="background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)"></td>
				</tr>
				<tr>
					<td><input name=cedula4 id=cedula4 value='' style="width:100%; display:none; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo4	id=cargo4  value='' style="width:100%; display:none" maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style="background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)"></td>
				</tr>
				<tr>
					<td><input name=cedula5 id=cedula5 value='' style="width:100%; display:none; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ inputmode=numeric></td>
					<td><input name=cargo5	id=cargo5  value='' style="width:100%; display:none" maxlength=20 pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td style="background-color:rgba(0,0,0,0.2); border:0px solid rgba(255,112,0,1)"></td>
				</tr>
			</table>
		</div>

<!-- *****************************************			 sección B			 ***************************************** -->
		<div style="position:relative; width:100%; top:280px">
			<hr>
			<table border=0>
				<tr><td class=B><b>&nbsp;&nbsp;B. DOCUMENTACIÓN ADICIONAL Y APROBACIONES DIARIAS</b></td></tr>
			</table>
		</div>
		<div style="position:relative; width:55.75%; left:0.50%; top:300px; background-color:white">
			<table border=1>
				<tr class=C><td class=A3>DOCUMENTACIÓN</td></tr>
				<tr class=C><td class=C style="padding:0 10"># CERTIFICADO HABILITACIÓN</td></tr>
				<tr class=C><td class=C style="padding:0 10"># PERSONAS EJECUTAN LA TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10"># PERSONAS CON AUTOREPORTE DE CONDICIONES DE SALUD</td></tr>
				<tr class=C><td class=C style="padding:0 10">HORA INICIO TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10">HORA FINALIZACIÓN TAREA</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA EJECUTOR</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA VIGIA EC.</td></tr>
				<tr class=C><td class=C style="padding:0 10">FIRMA SUPERVISOR EC.</td></tr>
				<tr class=C><td class=C style="padding:0 10">AUTORIZACIÓN EMISOR<br>(Antes del inicio de labores)</td></tr>
			</table>
		</div>
<!-- 8 -->			<div style="position:relative; width:43.00%; left:56.25%; top:-551.25px; background-color:white; overflow:scroll">
			<table border=1>
				<tr class=C>
					<td style=width:205px class=A21>DÍA 1<input name=fechaB1 id=fechaB1 type=date onfocusout="f1a(); f1b()" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
					<td style=width:205px class=A22>DÍA 2<input name=fechaB2 id=fechaB2 type=date onfocusout="f2a(); f2b()" value='<?=$fecha_oculta;?>'></td>
					<td style=width:205px class=A21>DÍA 3<input name=fechaB3 id=fechaB3 type=date onfocusout="f3a(); f3b()" value='<?=$fecha_oculta;?>'></td>
					<td style=width:205px class=A22>DÍA 4<input name=fechaB4 id=fechaB4 type=date onfocusout="f4a(); f4b()" value='<?=$fecha_oculta;?>'></td>
					<td style=width:205px class=A21>DÍA 5<input name=fechaB5 id=fechaB5 type=date onfocusout="f5a(); f5b()" value='<?=$fecha_oculta;?>'></td>
					<td style=width:205px class=A22>DÍA 6<input name=fechaB6 id=fechaB6 type=date onfocusout="f6a(); f6b()" value='<?=$fecha_oculta;?>'></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_cert_habil1 value='' inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td>
					<td class=A22><input name=num_cert_habil2 inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A21><input name=num_cert_habil3 inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A22><input name=num_cert_habil4 inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A21><input name=num_cert_habil5 inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
					<td class=A22><input name=num_cert_habil6 inputmode=numeric style="width:60%; text-align:center" maxlength=6 pattern=^(?:[0-9]{4,6})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_pers_ejecutan1 value='' inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$ required></td>
					<td class=A22><input name=num_pers_ejecutan2 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_ejecutan3 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_ejecutan4 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_ejecutan5 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_ejecutan6 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=num_pers_autoreporte1 value='' inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$ required></td>
					<td class=A22><input name=num_pers_autoreporte2 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_autoreporte3 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_autoreporte4 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A21><input name=num_pers_autoreporte5 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
					<td class=A22><input name=num_pers_autoreporte6 inputmode=numeric style="width:40%; text-align:center" maxlength=1 pattern=^(?:[0-5]{1})$></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=hora_inicio1 type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
					<td class=A22><input name=hora_inicio2 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A21><input name=hora_inicio3 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A22><input name=hora_inicio4 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A21><input name=hora_inicio5 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A22><input name=hora_inicio6 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=hora_final1 type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
					<td class=A22><input name=hora_final2 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A21><input name=hora_final3 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A22><input name=hora_final4 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A21><input name=hora_final5 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
					<td class=A22><input name=hora_final6 type=time value='<?=$hora;?>' min=<?=date("H:i");?>></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=firma_ejecutor1	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_ejecutor2	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_ejecutor3	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_ejecutor4	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_ejecutor5	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_ejecutor6	style="font-size:18px; text-align:center; display:none" value=''></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=firma_vigia1	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_vigia2	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_vigia3	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_vigia4	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_vigia5	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_vigia6	style="font-size:18px; text-align:center; display:none" value=''></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=firma_supervisor1	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_supervisor2	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_supervisor3	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_supervisor4	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=firma_supervisor5	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=firma_supervisor6	style="font-size:18px; text-align:center; display:none" value=''></td>
				</tr>
				<tr class=C>
					<td class=A21><input name=autorizacion_emisor1	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=autorizacion_emisor2	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=autorizacion_emisor3	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=autorizacion_emisor4	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A21><input name=autorizacion_emisor5	style="font-size:18px; text-align:center; display:none" value=''></td>
					<td class=A22><input name=autorizacion_emisor6	style="font-size:18px; text-align:center; display:none" value=''></td>
				</tr>
			</table>
<!-- /8 -->			</div>

<!-- *****************************************			 sección C		 ***************************************** -->
<!-- 9 -->	<div style="position:relative; left:0px; top:-550px"> <!-- este div mueve hacia abajo desde la sección C -->
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
				<td><input name=tipo_esp_conf id=tipo_esp_conf	type=radio value=1 onclick=gestionarClickRadio(this) required></td>
				<td style=text-align:right class=B>2</td>
				<td><input name=tipo_esp_conf	id=tipo_esp_conf1	type=radio value=2 onclick=gestionarClickRadio(this)></td>
				<td style=text-align:right class=B></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td class=B>Qué grado de peligrosidad tiene?</td>
				<td style=text-align:right class=B>A</td>
				<td><input name=grado_peligro	id=grado_peligro	type=radio value=A onclick=gestionarClickRadio(this) required></td>
				<td style=text-align:right class=B>B</td>
				<td><input name=grado_peligro	id=grado_peligro1	type=radio value=B onclick=gestionarClickRadio(this)></td>
				<td style=text-align:right class=B>C</td>
				<td><input name=grado_peligro	id=grado_peligro2	type=radio value=C onclick=gestionarClickRadio(this)></td>
				<td></td>
			</tr>
			<tr height=5px><td></td></tr>
		</table>

<!-- 10 -->			<div style="position:relative; width:22.60%; left:0.50%; top:8.75px; background-color:white; overflow:scroll">
			<table border=1>
				<tr height=70px>
					<td colspan=3 style=width:210px class=A21>DÍA 1<input id=fechaB1a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 2<input id=fechaB2a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 style=width:210px class=A21>DÍA 3<input id=fechaB3a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 4<input id=fechaB4a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 style=width:210px class=A21>DÍA 5<input id=fechaB5a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 style=width:210px class=A22>DÍA 6<input id=fechaB6a style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
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
					<td class=A21><input name=C1_1 id=C1_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C1_1 id=C1a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_1 id=C1b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_2 id=C1_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_2 id=C1a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_2 id=C1b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_3 id=C1_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_3 id=C1a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_3 id=C1b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_4 id=C1_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_4 id=C1a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_4 id=C1b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_5 id=C1_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_5 id=C1a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C1_5 id=C1b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_6 id=C1_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_6 id=C1a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C1_6 id=C1b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C2_1 id=C2_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C2_1 id=C2a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_1 id=C2b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_2 id=C2_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_2 id=C2a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_2 id=C2b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_3 id=C2_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_3 id=C2a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_3 id=C2b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_4 id=C2_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_4 id=C2a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_4 id=C2b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_5 id=C2_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_5 id=C2a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C2_5 id=C2b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_6 id=C2_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_6 id=C2a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C2_6 id=C2b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C3_1 id=C3_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C3_1 id=C3a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_1 id=C3b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_2 id=C3_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_2 id=C3a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_2 id=C3b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_3 id=C3_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_3 id=C3a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_3 id=C3b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_4 id=C3_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_4 id=C3a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_4 id=C3b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_5 id=C3_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_5 id=C3a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C3_5 id=C3b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_6 id=C3_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_6 id=C3a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C3_6 id=C3b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn3>
					<td class=A21><input name=C4_1 id=C4_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C4_1 id=C4a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_1 id=C4b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_2 id=C4_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_2 id=C4a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_2 id=C4b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_3 id=C4_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_3 id=C4a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_3 id=C4b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_4 id=C4_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_4 id=C4a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_4 id=C4b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_5 id=C4_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_5 id=C4a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C4_5 id=C4b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_6 id=C4_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_6 id=C4a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C4_6 id=C4b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C5_1 id=C5_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C5_1 id=C5a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_1 id=C5b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_2 id=C5_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_2 id=C5a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_2 id=C5b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_3 id=C5_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_3 id=C5a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_3 id=C5b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_4 id=C5_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_4 id=C5a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_4 id=C5b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_5 id=C5_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_5 id=C5a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C5_5 id=C5b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_6 id=C5_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_6 id=C5a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C5_6 id=C5b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C6_1 id=C6_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C6_1 id=C6a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_1 id=C6b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_2 id=C6_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_2 id=C6a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_2 id=C6b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_3 id=C6_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_3 id=C6a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_3 id=C6b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_4 id=C6_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_4 id=C6a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_4 id=C6b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_5 id=C6_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_5 id=C6a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C6_5 id=C6b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_6 id=C6_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_6 id=C6a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C6_6 id=C6b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C7_1 id=C7_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C7_1 id=C7a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_1 id=C7b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_2 id=C7_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_2 id=C7a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_2 id=C7b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_3 id=C7_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_3 id=C7a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_3 id=C7b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_4 id=C7_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_4 id=C7a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_4 id=C7b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_5 id=C7_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_5 id=C7a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C7_5 id=C7b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_6 id=C7_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_6 id=C7a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C7_6 id=C7b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn4>
					<td class=A21><input name=C8_1 id=C8_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C8_1 id=C8a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_1 id=C8b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_2 id=C8_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_2 id=C8a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_2 id=C8b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_3 id=C8_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_3 id=C8a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_3 id=C8b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_4 id=C8_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_4 id=C8a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_4 id=C8b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_5 id=C8_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_5 id=C8a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C8_5 id=C8b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_6 id=C8_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_6 id=C8a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C8_6 id=C8b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C9_1 id=C9_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C9_1 id=C9a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_1 id=C9b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_2 id=C9_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_2 id=C9a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_2 id=C9b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_3 id=C9_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_3 id=C9a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_3 id=C9b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_4 id=C9_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_4 id=C9a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_4 id=C9b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_5 id=C9_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_5 id=C9a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C9_5 id=C9b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_6 id=C9_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_6 id=C9a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C9_6 id=C9b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C10_1 id=C10_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C10_1 id=C10a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_1 id=C10b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_2 id=C10_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_2 id=C10a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_2 id=C10b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_3 id=C10_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_3 id=C10a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_3 id=C10b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_4 id=C10_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_4 id=C10a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_4 id=C10b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_5 id=C10_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_5 id=C10a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C10_5 id=C10b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_6 id=C10_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_6 id=C10a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C10_6 id=C10b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C11_1 id=C11_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C11_1 id=C11a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_1 id=C11b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_2 id=C11_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_2 id=C11a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_2 id=C11b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_3 id=C11_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_3 id=C11a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_3 id=C11b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_4 id=C11_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_4 id=C11a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_4 id=C11b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_5 id=C11_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_5 id=C11a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C11_5 id=C11b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_6 id=C11_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_6 id=C11a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C11_6 id=C11b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C12_1 id=C12_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C12_1 id=C12a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_1 id=C12b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_2 id=C12_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_2 id=C12a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_2 id=C12b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_3 id=C12_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_3 id=C12a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_3 id=C12b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_4 id=C12_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_4 id=C12a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_4 id=C12b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_5 id=C12_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_5 id=C12a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C12_5 id=C12b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_6 id=C12_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_6 id=C12a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C12_6 id=C12b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
					<tr class=Cn4>
					<td class=A21><input name=C13_1 id=C13_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C13_1 id=C13a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_1 id=C13b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_2 id=C13_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_2 id=C13a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_2 id=C13b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_3 id=C13_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_3 id=C13a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_3 id=C13b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_4 id=C13_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_4 id=C13a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_4 id=C13b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_5 id=C13_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_5 id=C13a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C13_5 id=C13b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_6 id=C13_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_6 id=C13a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C13_6 id=C13b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C14_1 id=C14_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C14_1 id=C14a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_1 id=C14b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_2 id=C14_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_2 id=C14a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_2 id=C14b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_3 id=C14_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_3 id=C14a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_3 id=C14b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_4 id=C14_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_4 id=C14a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_4 id=C14b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_5 id=C14_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_5 id=C14a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C14_5 id=C14b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_6 id=C14_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_6 id=C14a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C14_6 id=C14b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C15_1 id=C15_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C15_1 id=C15a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_1 id=C15b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_2 id=C15_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_2 id=C15a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_2 id=C15b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_3 id=C15_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_3 id=C15a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_3 id=C15b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_4 id=C15_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_4 id=C15a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_4 id=C15b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_5 id=C15_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_5 id=C15a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C15_5 id=C15b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_6 id=C15_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_6 id=C15a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C15_6 id=C15b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C16_1 id=C16_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C16_1 id=C16a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_1 id=C16b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_2 id=C16_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_2 id=C16a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_2 id=C16b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_3 id=C16_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_3 id=C16a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_3 id=C16b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_4 id=C16_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_4 id=C16a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_4 id=C16b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_5 id=C16_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_5 id=C16a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C16_5 id=C16b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_6 id=C16_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_6 id=C16a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C16_6 id=C16b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C17_1 id=C17_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C17_1 id=C17a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_1 id=C17b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_2 id=C17_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_2 id=C17a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_2 id=C17b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_3 id=C17_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_3 id=C17a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_3 id=C17b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_4 id=C17_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_4 id=C17a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_4 id=C17b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_5 id=C17_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_5 id=C17a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C17_5 id=C17b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_6 id=C17_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_6 id=C17a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C17_6 id=C17b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C18_1 id=C18_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C18_1 id=C18a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_1 id=C18b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_2 id=C18_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_2 id=C18a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_2 id=C18b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_3 id=C18_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_3 id=C18a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_3 id=C18b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_4 id=C18_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_4 id=C18a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_4 id=C18b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_5 id=C18_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_5 id=C18a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C18_5 id=C18b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_6 id=C18_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_6 id=C18a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C18_6 id=C18b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn2>
					<td class=A21><input name=C19_1 id=C19_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C19_1 id=C19a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_1 id=C19b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_2 id=C19_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_2 id=C19a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_2 id=C19b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_3 id=C19_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_3 id=C19a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_3 id=C19b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_4 id=C19_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_4 id=C19a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_4 id=C19b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_5 id=C19_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_5 id=C19a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C19_5 id=C19b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_6 id=C19_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_6 id=C19a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C19_6 id=C19b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C20_1 id=C20_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C20_1 id=C20a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_1 id=C20b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_2 id=C20_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_2 id=C20a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_2 id=C20b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_3 id=C20_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_3 id=C20a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_3 id=C20b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_4 id=C20_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_4 id=C20a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_4 id=C20b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_5 id=C20_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_5 id=C20a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C20_5 id=C20b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_6 id=C20_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_6 id=C20a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C20_6 id=C20b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn3>
					<td class=A21><input name=C21_1 id=C21_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C21_1 id=C21a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_1 id=C21b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_2 id=C21_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_2 id=C21a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_2 id=C21b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_3 id=C21_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_3 id=C21a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_3 id=C21b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_4 id=C21_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_4 id=C21a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_4 id=C21b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_5 id=C21_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_5 id=C21a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C21_5 id=C21b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_6 id=C21_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_6 id=C21a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C21_6 id=C21b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C22_1 id=C22_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C22_1 id=C22a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_1 id=C22b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_2 id=C22_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_2 id=C22a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_2 id=C22b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_3 id=C22_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_3 id=C22a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_3 id=C22b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_4 id=C22_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_4 id=C22a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_4 id=C22b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_5 id=C22_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_5 id=C22a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C22_5 id=C22b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_6 id=C22_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_6 id=C22a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C22_6 id=C22b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn3>
					<td class=A21><input name=C23_1 id=C23_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C23_1 id=C23a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_1 id=C23b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_2 id=C23_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_2 id=C23a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_2 id=C23b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_3 id=C23_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_3 id=C23a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_3 id=C23b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_4 id=C23_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_4 id=C23a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_4 id=C23b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_5 id=C23_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_5 id=C23a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C23_5 id=C23b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_6 id=C23_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_6 id=C23a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C23_6 id=C23b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>

<!--
				<tr height=70px>
					<td colspan=3 class=A21>DÍA 1<input id=fechaB1b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 class=A22>DÍA 2<input id=fechaB2b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 class=A21>DÍA 3<input id=fechaB3b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 class=A22>DÍA 4<input id=fechaB4b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 class=A21>DÍA 5<input id=fechaB5b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
					<td colspan=3 class=A22>DÍA 6<input id=fechaB6b style="width:100%; text-align:center; font-size:30px; background-color:rgba(0,0,0,0); border:0" readonly></td>
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
					<td class=A21><input name=C24_1 id=C24_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C24_1 id=C24a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_1 id=C24b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_2 id=C24_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_2 id=C24a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_2 id=C24b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_3 id=C24_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_3 id=C24a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_3 id=C24b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_4 id=C24_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_4 id=C24a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_4 id=C24b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_5 id=C24_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_5 id=C24a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C24_5 id=C24b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_6 id=C24_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_6 id=C24a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C24_6 id=C24b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn2>
					<td class=A21><input name=C25_1 id=C25_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C25_1 id=C25a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_1 id=C25b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_2 id=C25_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_2 id=C25a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_2 id=C25b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_3 id=C25_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_3 id=C25a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_3 id=C25b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_4 id=C25_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_4 id=C25a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_4 id=C25b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_5 id=C25_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_5 id=C25a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C25_5 id=C25b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_6 id=C25_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_6 id=C25a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C25_6 id=C25b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C26_1 id=C26_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C26_1 id=C26a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_1 id=C26b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_2 id=C26_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_2 id=C26a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_2 id=C26b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_3 id=C26_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_3 id=C26a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_3 id=C26b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_4 id=C26_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_4 id=C26a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_4 id=C26b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_5 id=C26_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_5 id=C26a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C26_5 id=C26b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_6 id=C26_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_6 id=C26a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C26_6 id=C26b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C27_1 id=C27_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C27_1 id=C27a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_1 id=C27b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_2 id=C27_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_2 id=C27a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_2 id=C27b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_3 id=C27_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_3 id=C27a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_3 id=C27b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_4 id=C27_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_4 id=C27a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_4 id=C27b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_5 id=C27_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_5 id=C27a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C27_5 id=C27b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_6 id=C27_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_6 id=C27a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C27_6 id=C27b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C28_1 id=C28_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C28_1 id=C28a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_1 id=C28b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_2 id=C28_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_2 id=C28a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_2 id=C28b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_3 id=C28_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_3 id=C28a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_3 id=C28b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_4 id=C28_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_4 id=C28a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_4 id=C28b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_5 id=C28_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_5 id=C28a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C28_5 id=C28b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_6 id=C28_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_6 id=C28a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C28_6 id=C28b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C29_1 id=C29_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C29_1 id=C29a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_1 id=C29b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_2 id=C29_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_2 id=C29a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_2 id=C29b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_3 id=C29_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_3 id=C29a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_3 id=C29b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_4 id=C29_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_4 id=C29a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_4 id=C29b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_5 id=C29_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_5 id=C29a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C29_5 id=C29b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_6 id=C29_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_6 id=C29a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C29_6 id=C29b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C30_1 id=C30_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C30_1 id=C30a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_1 id=C30b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_2 id=C30_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_2 id=C30a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_2 id=C30b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_3 id=C30_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_3 id=C30a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_3 id=C30b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_4 id=C30_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_4 id=C30a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_4 id=C30b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_5 id=C30_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_5 id=C30a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C30_5 id=C30b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_6 id=C30_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_6 id=C30a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C30_6 id=C30b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C31_1 id=C31_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C31_1 id=C31a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_1 id=C31b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_2 id=C31_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_2 id=C31a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_2 id=C31b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_3 id=C31_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_3 id=C31a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_3 id=C31b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_4 id=C31_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_4 id=C31a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_4 id=C31b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_5 id=C31_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_5 id=C31a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C31_5 id=C31b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_6 id=C31_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_6 id=C31a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C31_6 id=C31b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C32_1 id=C32_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C32_1 id=C32a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_1 id=C32b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_2 id=C32_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_2 id=C32a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_2 id=C32b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_3 id=C32_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_3 id=C32a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_3 id=C32b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_4 id=C32_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_4 id=C32a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_4 id=C32b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_5 id=C32_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_5 id=C32a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C32_5 id=C32b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_6 id=C32_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_6 id=C32a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C32_6 id=C32b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr class=Cn1>
					<td class=A21><input name=C33_1 id=C33_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C33_1 id=C33a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_1 id=C33b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_2 id=C33_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_2 id=C33a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_2 id=C33b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_3 id=C33_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_3 id=C33a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_3 id=C33b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_4 id=C33_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_4 id=C33a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_4 id=C33b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_5 id=C33_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_5 id=C33a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C33_5 id=C33b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_6 id=C33_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_6 id=C33a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C33_6 id=C33b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>	
				<tr class=Cn1>
					<td class=A21><input name=C34_1 id=C34_1	type=radio value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=A21><input name=C34_1 id=C34a_1	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_1 id=C34b_1	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_2 id=C34_2	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_2 id=C34a_2	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_2 id=C34b_2	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_3 id=C34_3	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_3 id=C34a_3	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_3 id=C34b_3	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_4 id=C34_4	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_4 id=C34a_4	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_4 id=C34b_4	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_5 id=C34_5	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_5 id=C34a_5	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A21><input name=C34_5 id=C34b_5	type=radio value=NA onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_6 id=C34_6	type=radio value=SI onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_6 id=C34a_6	type=radio value=NO onclick=gestionarClickRadio(this)></td>
					<td class=A22><input name=C34_6 id=C34b_6	type=radio value=NA onclick=gestionarClickRadio(this)></td>
				</tr>
			</table>
<!-- /10 -->			</div>
<!-- 11 -->			<div style="position:relative; width:5.30%; left:23.10%; top:-2562.25px; background-color:white">
			<table border=1>
				<tr rowspan=2 height=111.75px><td class=A2></td></tr>
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
<!-- 12 -->			<div style="position:relative; width:70.85%; left:28.40%; top:-5133.25px">
			<table border=1>
<!-- style="border-top:2px solid rgba(255,112,0,1); border-right:2px solid rgba(255,112,0,1); border-bottom:2px solid rgba(255,112,0,1)" -->
				<tr height=112px rowspan=2><td class=A2 style="text-align:center; vertical-align:middle">DESCRIPCIÓN</td></tr>
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
				<tr height=70><td class=Cp style="background-color:rgba(0,0,0,0.20); color:rgba(0,0,0,1); font-size:28px; text-align:center"><b>Elementos de Protección</b><br>(Ver matriz de EPPs vigente)</td></tr>

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
<!-- 13 -->	<div style="position:relative; width:100vw; left:0px; top:-5130px">		<!-- este div sube el formato de aqui hacia abajo -->
			<table border=0>
				<tr><td width=1%></td><td width=98%></td><td width=1%></td></tr>
				<tr height=35>
					<td></td>
					<td class=C>Consulte la guía de medición de gases al reverso, la medición debe ser continua y se debe registrar mínimo cada hora en el anexo 1.</td>
					<td></td>
				</tr>
				<tr height=55>
					<td></td>
					<td style="text-align:left; vertical-align:bottom" class=B>OBSERVACIONES</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class=A><textarea name=observaciones maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
					<td></td>
				</tr>
				<tr height=55>
					<td></td>
					<td style="text-align:left; vertical-align:bottom" class=B>HERRAMIENTAS Y/O EQUIPOS A UTILIZAR EN LA ACTIVIDAD</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td class=A><textarea name=herramientas maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
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
				<td><input name=ejecutorD style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccD inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaD type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=ejecutor_horaD type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=supervisorD style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccD inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaD type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=supervisor_horaD type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td colspan=7></td></tr>
			<tr>
				<td><input name=vigiaD style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=vigia_ccD inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=vigia_fechaD type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=vigia_horaD type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
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
				<td><input name=emisorE style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccE inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaE type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=emisor_horaE type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
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
			<tr height=10px>
				<td style=width:5%></td>
				<td style=width:4%></td>
				<td style=width:23%></td>
				<td style=width:4%></td>
				<td style=width:23%></td>
				<td style=width:4%></td>
				<td style=width:32%></td>
				<td style=width:5%></td>
			</tr>
			<tr>
				<td></td>
				<td><input name=certificadoF id=A type=radio value=A onclick=gestionarClickRadio(this) required></td>
				<td class=B> &nbsp;Se ha<br> &nbsp;completado</td>
				<td><input name=certificadoF id=B type=radio value=B onclick=gestionarClickRadio(this)></td>
				<td class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
				<td><input name=certificadoF id=C type=radio value=C onclick=gestionarClickRadio(this)></td>
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
				<td><input name=ejecutorF style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=ejecutor_ccF inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=ejecutor_fechaF type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=ejecutor_horaF type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=supervisorF style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=supervisor_ccF inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=supervisor_fechaF type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=supervisor_horaF type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
				<td></td>
			</tr>
			<tr><td>SUPERVISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
			<tr style=height:20px><td></td></tr>
			<tr>
				<td><input name=emisorF style=width:100% maxlength=30 value='' pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=emisor_ccF inputmode=numeric value='' style="width:100%; text-align:center" maxlength=10 pattern=^(?:[0-9]{8,10})$ required></td>
				<td><input name=emisor_fechaF type=date style="width:100%; display:none" value='<?=$fecha_oculta;?>' min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
				<td><input name=emisor_horaF type=time value='<?=$hora;?>' min=<?=date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td>CÉDULA</td><td></td><td>HORA</td></tr>
		</table>
		<hr>
		<table>
			<tr height=30><td></td></tr>
				<tr style="background-color:rgba(0,240,0,0); height:15%">
					<td>
						<select name=usuario id=usuario required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?>@primax.com.co</option>
							<? endfor; ?>
						</select>
					</td>
				</tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->

		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style="display:none; width:3.10cm" id="fecha" name="fecha" value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0px>
			<tr height=200>
				<td><input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
				<td><a href="javascript:closed()"><img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto; width:100px; height:auto"></a></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
					<img src="../../../../../common/imagenes/piedepagina_horizontal.svg" style="pointer-events:auto; width:100%; height:auto">
					</a>
				</td>
			</tr>
		</table>
		<hr>
<!-- /9 -->		</div>
<!-- /13 -->	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 -->		</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->

<? if ($consec > "$ultimo_consec") {echo "system('cls');<script>setTimeout(cerrarVentana,10*60*1000); document.body.innerHTML = '$aviso_pedido';</script>";} ?>

<script type="text/javascript">
	//Para distinguir la opción actualmente pulsada en cada grupo
	var pref_opcActual = "opcActual_";
	//Verifica si una variable definida dinámicamente existe o no
	function varExiste(sNombre) {return (eval("typeof(" + sNombre + ");") != "undefined");}
	//Asigna un valor a una variable creada dinámicamente a partir de su nombre
	function asignaVar(sNombre, valor) {eval(sNombre + " = " + valor + ";");}
	//generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos
	for (f= 0; f<document.forms.length; f++) {
		for (i = 0; i< document.forms[f].elements.length; i++) {
			var eltoAct = document.forms[f].elements[i];
			var exprCrearVariable = "";
			if (eltoAct.type == "radio") {
				//Si la variable no existe la definimos siempre,pero sólo la redefinimos en caso de que el elemento actual del grupo esté asignado
				if (!varExiste(pref_opcActual + eltoAct.name) ) exprCrearVariable = "var " + pref_opcActual + eltoAct.name + " = ";
					else exprCrearVariable = pref_opcActual + eltoAct.name + " = ";
				//El valor será nulo o una referencia al radio actual en función de su está seleccionado o no
				if(eltoAct.checked) exprCrearVariable += "document.getElementById('" + eltoAct.id + "')";
					else exprCrearVariable += "null";
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

<!-- *****************************************			Control Tabla Personas Autorizadas		 ***************************************** -->
		<script>
			var
				 c = document.getElementById("cantidad");
				 n = document.getElementById("nombre");
			 dkf = document.getElementById("dkf");
				n1 = document.getElementById("nombre1");
				n2 = document.getElementById("nombre2");
				n3 = document.getElementById("nombre3");
				n4 = document.getElementById("nombre4");
				n5 = document.getElementById("nombre5");
				c1 = document.getElementById("cedula1");
				c2 = document.getElementById("cedula2");
				c3 = document.getElementById("cedula3");
				c4 = document.getElementById("cedula4");
				c5 = document.getElementById("cedula5");
				k1 = document.getElementById("cargo1");
				k2 = document.getElementById("cargo2");
				k3 = document.getElementById("cargo3");
				k4 = document.getElementById("cargo4");
				k5 = document.getElementById("cargo5");
			document.getElementById("cantidad").addEventListener("blur", function(e) {
				if (c.value <= 1) {c.value = 1;
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false; n1.style.display = "block"; n1.required = true;
				 n2.disabled = true; n2.style.display = "none";
				 n3.disabled = true; n3.style.display = "none";
				 n4.disabled = true; n4.style.display = "none";
				 n5.disabled = true; n5.style.display = "none";
				 c1.disabled = false; c1.style.display = "block"; c1.required = true;
				 c2.disabled = true; c2.style.display = "none";
				 c3.disabled = true; c3.style.display = "none";
				 c4.disabled = true; c4.style.display = "none";
				 c5.disabled = true; c5.style.display = "none";
				 k1.disabled = false; k1.style.display = "block"; k1.required = true;
				 k2.disabled = true; k2.style.display = "none";
				 k3.disabled = true; k3.style.display = "none";
				 k4.disabled = true; k4.style.display = "none";
				 k5.disabled = true; k5.style.display = "none";};
				if (c.value == 2) {
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false; n1.style.display = "block"; n1.required = true;
				 n2.disabled = false; n2.style.display = "block"; n2.required = true;
				 n3.disabled = true; n3.style.display = "none";
				 n4.disabled = true; n4.style.display = "none";
				 n5.disabled = true; n5.style.display = "none";
				 c1.disabled = false; c1.style.display = "block"; c1.required = true;
				 c2.disabled = false; c2.style.display = "block"; c2.required = true;
				 c3.disabled = true; c3.style.display = "none";
				 c4.disabled = true; c4.style.display = "none";
				 c5.disabled = true; c5.style.display = "none";
				 k1.disabled = false; k1.style.display = "block"; k1.required = true;
				 k2.disabled = false; k2.style.display = "block"; k2.required = true;
				 k3.disabled = true; k3.style.display = "none";
				 k4.disabled = true; k4.style.display = "none";
				 k5.disabled = true; k5.style.display = "none";};
				if (c.value == 3) {
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false; n1.style.display = "block"; n1.required = true;
				 n2.disabled = false; n2.style.display = "block"; n2.required = true;
				 n3.disabled = false; n3.style.display = "block"; n3.required = true;
				 n4.disabled = true; n4.style.display = "none";
				 n5.disabled = true; n5.style.display = "none";
				 c1.disabled = false; c1.style.display = "block"; c1.required = true;
				 c2.disabled = false; c2.style.display = "block"; c2.required = true;
				 c3.disabled = false; c3.style.display = "block"; c3.required = true;
				 c4.disabled = true; c4.style.display = "none";
				 c5.disabled = true; c5.style.display = "none";
				 k1.disabled = false; k1.style.display = "block"; k1.required = true;
				 k2.disabled = false; k2.style.display = "block"; k2.required = true;
				 k3.disabled = false; k3.style.display = "block"; k3.required = true;
				 k4.disabled = true; k4.style.display = "none";
				 k5.disabled = true; k5.style.display = "none";};
				if (c.value == 4) {
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false; n1.style.display = "block"; n1.required = true;
				 n2.disabled = false; n2.style.display = "block"; n2.required = true;
				 n3.disabled = false; n3.style.display = "block"; n3.required = true;
				 n4.disabled = false; n4.style.display = "block"; n4.required = true;
				 n5.disabled = true; n5.style.display = "none";
				 c1.disabled = false; c1.style.display = "block"; c1.required = true;
				 c2.disabled = false; c2.style.display = "block"; c2.required = true;
				 c3.disabled = false; c3.style.display = "block"; c3.required = true;
				 c4.disabled = false; c4.style.display = "block"; c4.required = true;
				 c5.disabled = true; c5.style.display = "none";
				 k1.disabled = false; k1.style.display = "block"; k1.required = true;
				 k2.disabled = false; k2.style.display = "block"; k2.required = true;
				 k3.disabled = false; k3.style.display = "block"; k3.required = true;
				 k4.disabled = false; k4.style.display = "block"; k4.required = true;
				 k5.disabled = true; k5.style.display = "none";};
				if (c.value >= 5) {c.value = 5;
					n.disabled = false;		n.style.display = "block";
				dkf.disabled = false; dkf.style.display = "block";
				 n1.disabled = false; n1.style.display = "block"; n1.required = true;
				 n2.disabled = false; n2.style.display = "block"; n2.required = true;
				 n3.disabled = false; n3.style.display = "block"; n3.required = true;
				 n4.disabled = false; n4.style.display = "block"; n4.required = true;
				 n5.disabled = false; n5.style.display = "block"; n5.required = true;
				 c1.disabled = false; c1.style.display = "block"; c1.required = true;
				 c2.disabled = false; c2.style.display = "block"; c2.required = true;
				 c3.disabled = false; c3.style.display = "block"; c3.required = true;
				 c4.disabled = false; c4.style.display = "block"; c4.required = true;
				 c5.disabled = false; c5.style.display = "block"; c5.required = true;
				 k1.disabled = false; k1.style.display = "block"; k1.required = true;
				 k2.disabled = false; k2.style.display = "block"; k2.required = true;
				 k3.disabled = false; k3.style.display = "block"; k3.required = true;
				 k4.disabled = false; k4.style.display = "block"; k4.required = true;
				 k5.disabled = false; k5.style.display = "block"; k5.required = true;};});
		</script>
<!-- *****************************************			FIN Control Tabla Personas Autorizadas		 ***************************************** -->

</form>
<!-- /1 --></div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
