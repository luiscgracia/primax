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
<!-- 1 --> <div class=noimprimir>
<!-- 2 --> <div class=fijar style="top:30px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 --> </div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 --> 	<div style="position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw">
		<table border=0 style="color:white; background-color:rgba(100,170,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<? echo $estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:570px; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:white; background-color:rgba(100,170,255,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3 style=color:white>
					<span style=font-size:20.00px>CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.</span><br>
					<span style=font-size:19.35px>ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ</span><br>
					<span style=font-size:24.00px><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr>
			<tr><td class=A>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=84% class=Br>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</td>
				<td style="width:16%; text-align:left">
				<input style="width:40%; text-align:center" name=cantidad id=cantidad maxlength=1 type=texto inputmode=numeric pattern=[1-4]{1} required>
				</td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=1%></td><td width=48.50%></td><td width=1%></td><td width=48.50%></td><td width=1%></td><tr>
			<tr><td></td>
				<td><input name=nombre1 id=nombre1 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;1er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre2 id=nombre2 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;2o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
			<tr height=10><td></td></tr>
			<tr><td></td>
				<td><input name=nombre3 id=nombre3 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;3er.&nbsp;autorizado pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
				<td><input name=nombre4 id=nombre4 style=display:none maxlength=30 type=texto placeholder=Nombre&nbsp;4o.&nbsp;autorizado  pattern=.{1,} onkeyup=mayuscula(this)></td><td></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<script>
			var
				c = document.getElementById('cantidad');
				n1 = document.getElementById('nombre1');
				n2 = document.getElementById('nombre2');
				n3 = document.getElementById('nombre3');
				n4 = document.getElementById('nombre4');
			document.getElementById('cantidad').addEventListener('blur', function(e) {
				if (c.value <= 1) {c.value = 1;
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = true; n2.style.display = 'none';
				 n3.disabled = true; n3.style.display = 'none';
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value == 2) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = true; n3.style.display = 'none';
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value == 3) {
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = true; n4.style.display = 'none';};
				if (c.value >= 4) {c.value = 4;
				 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
				 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
				 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
				 n4.disabled = false; n4.style.display = 'block'; n4.required = true;};});
		</script>
		<table border=0>
			<tr><td width=25%></td><td width=25%></td><td width=25%></td><td width=25%></td></tr>
			<tr>
				<td class=A><br>FECHA<br>									 <input name=fechaA				type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA		type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit	class=consecutivo maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=5%></td><td width=5%></td><td width=5%></td><td width=7%></td><td width=78%></td></tr>
			<tr><td colspan=5 class=B><b>&nbsp;&nbsp;B. DOCUMENTACIÓN ADICIONAL</b></td></tr>
			<tr><td colspan=5 class=B><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Verificación previa del área de trabajo)</span></td></tr>
			<tr class=C><td class=Bc>SI</td><td class=Bc>NO</td><td class=Bc>NA</td><td class=Br>#&nbsp;</td><td class=B>REQUISITO DE SEGURIDAD</td></tr>			<tr class=C>
				<td><input type=radio name=B1 id=B1 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B1 id=b1 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B1 id=v1 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>1.</td><td class=B>Está el área limpía y libre de sustancias combustibles o tóxicas?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B2 id=B2 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B2 id=b2 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B2 id=v2 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>2.</td><td class=B>Están los desagües cercanos Cubiertos y Sellados?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B3 id=B3 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B3 id=b3 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B3 id=v3 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>3.</td><td class=B>Permiten los factores externos efectuar el trabajo con Seguridad?<br><span>(Dirección Viento, Condiciones Atmosféricas, Trabajos vecinos)</span></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B4 id=B4 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B4 id=b4 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B4 id=v4 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>4.</td><td class=B>Se ha identificado y demarcado adecuadamente el Área Bajo Control?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B5 id=B5 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B5 id=b5 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B5 id=v5 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>5.</td><td class=B>Se necesita documentación adicional? Indique:</td>
			</tr>
			<tr class=C>
				<td></td><td></td><td></td><td></td>
				<td class=B><textarea name=indiqueB5b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B6 id=B6 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B6 id=b6 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B6 id=v6 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>6.</td><td class=B>Hay algún requisito legal especial? Indique:</td>
			</tr>
			<tr class=C>
				<td></td><td></td><td></td><td></td>
				<td class=B><textarea name=indiqueB6b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B7 id=B7 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B7 id=b7 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B7 id=v7 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>7.</td><td class=B>Se han suspendido todas las áreas u operaciones que impedirían la realización de este trabajo?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B8 id=B8 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B8 id=b8 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B8 id=v8 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>8.</td><td class=B>Se requiere inspector de Seguridad?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B9 id=B9 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B9 id=b9 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B9 id=v9 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>9.</td><td class=B>Está disponible y listo el equipo de Primeros Auxilios?</td>
			</tr>
			<tr class=C>
				<td><input type=radio name=B10 id=B10 value=SI onclick=gestionarClickRadio(this) required></td>
				<td><input type=radio name=B10 id=b10 value=NO onclick=gestionarClickRadio(this)></td>
				<td><input type=radio name=B10 id=v10 value=NA onclick=gestionarClickRadio(this)></td>
				<td class=numero>10.</td><td class=B>Está disponible y listo el Equipo Contra Incendios? Especifique:</td>
			</tr>
			<tr class=C>
				<td></td><td></td><td></td><td></td>
				<td class=B><textarea name=especifiqueB10b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td>
			</tr>
		</table>
		<br>
		<table border=0>
			<tr>
				<td width= 5%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 5%></td><td width=26%></td>
				<td width= 2%></td>
			</tr>
			<tr><td colspan=8 class=B>&nbsp;&nbsp;11. ELEMENTOS DE PROTECCIÓN</td></tr>
			<tr>
				<td></td>
				<td><input name=B11a type=checkbox></td><td class=B> &nbsp;CASCO</td>
				<td><input name=B11b type=checkbox></td><td	class=B> &nbsp;RESPIRADOR</td>
				<td><input name=B11d type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11e type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
				<td><input name=B11g type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
				<td><input name=B11h type=checkbox></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
				<td></td>
			</tr>
			<tr><td height=30></td></tr>
			<tr>
				<td></td>
				<td><input name=B11f type=checkbox></td><td	class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
				<td><input name=B11c type=checkbox></td><td	class=B> &nbsp;SALVAVIDAS</td>
				<td></td><td class=B></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width= 2%></td>
				<td width=25%></td><td width=22%></td>
				<td width= 2%></td>
				<td width=25%></td><td width=22%></td>
				<td width= 2%></td>
			</tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>GUANTES <input name=B11i type=checkbox onChange=comprobarB11i(this)></td>
				<td><input style=display:none name=guante id=guante maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>CALZADO <input name=B11j type=checkbox onChange=comprobarB11j(this)></td>
				<td><input style=display:none name=calzado id=calzado maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>DELANTAL <input name=B11k type=checkbox onChange=comprobarB11k(this)></td>
				<td><input style=display:none name=delantal id=delantal maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>ROPA <input name=B11l type=checkbox onChange=comprobarB11l(this)></td>
				<td><input style=display:none name=ropa id=ropa maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>Otro <input name=B11m type=checkbox onChange=comprobarB11m(this)></td>
				<td><input style=display:none name=otro1 id=otro1 maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td style=text-align:right class=B>Otro <input name=B11n type=checkbox onChange=comprobarB11n(this)></td>
				<td><input style=display:none name=otro2 id=otro2 maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td style=text-align:right class=B>Otro <input name=B11o type=checkbox onChange=comprobarB11o(this)></td>
				<td><input style=display:none name=otro3 id=otro3 maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=32.50%></td><td width=32.50%></td><td width=25%></td><td width=10%></td></tr>
			<tr><td colspan=3 class=B>&nbsp;&nbsp;12. PRUEBA DE GASES</td></tr>
			<tr>
				<td colspan=3>
					<table border=0>
						<tr><td style=width:64vw></td><td style=width: 9vw></td><td style=width: 9vw></td><td style=width: 9vw></td><td style=width: 9vw></td></tr>
						<tr class=C>
							<td class=B style=text-align:right>Se requiere hacer prueba de gases?</td>
							<td class=B style=text-align:right>SI&nbsp;</td>
							<td style=text-align:left><input type=radio name=req_pr_gas id=RPG value=SI onclick=gestionarClickRadio(this) required></td>
							<td class=B style=text-align:right>NO&nbsp;</td>
							<td style=text-align:left><input type=radio name=req_pr_gas id=rpg value=NO onclick=gestionarClickRadio(this)></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height=30><td></td></tr>
			<tr>
				<td class=A><br>EQUIPO<br>					<input name=B12equipo maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A><br>DUEÑO<br>						<input name=B12dueno  maxlength=15 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
				<td class=A>FECHA<br>CALIBRACIÓN<br><input name=B12fecha  type=date value='<?echo $hoy;?>'></td>
				<td class=A>BUMP TEST<br>						<input name=B12bumptest type=checkbox></td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
<!-- 4 --> 		<div style="position:absolute; width:18.50%; left:0.50%; background-color:white">
		<table border=1>
			<tr height=70px><td class=A3>PRUEBA</td></tr>
			<tr height=70px><td class=A1>%LEL</td></tr>
		</table>
<!-- /4 --> 		</div>
<!-- 5 --> 		<div style="position:absolute; width:80.25%; left:19%; background-color:white; overflow:scroll">
		<table border=1 bordercolor=#ff7000>
			<tr height=70px>
				<td style=width:188px class=A2>Hora<br>1</td><td style=width:132px class=A2>Resultado<br>1</td>
				<td style=width:188px class=A2>Hora<br>2</td><td style=width:132px class=A2>Resultado<br>2</td>
				<td style=width:188px class=A2>Hora<br>3</td><td style=width:132px class=A2>Resultado<br>3</td>
				<td style=width:188px class=A2>Hora<br>4</td><td style=width:132px class=A2>Resultado<br>4</td>
				<td style=width:188px class=A2>Hora<br>5</td><td style=width:132px class=A2>Resultado<br>5</td>
				<td style=width:188px class=A2>Hora<br>6</td><td style=width:132px class=A2>Resultado<br>6</td>
				<td style=width:188px class=A2>Hora<br>7</td><td style=width:132px class=A2>Resultado<br>7</td>
				<td style=width:188px class=A2>Hora<br>8</td><td style=width:132px class=A2>Resultado<br>8</td>
			</tr>
			<tr height=70px>
				<td class=A><input name=B12hora1	type=time  value=<?echo $hora;?> required></td>
				<td class=A><input name=B12resul1 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
				<td class=A><input name=B12hora2	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul2 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora3	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul3 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora4	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul4 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora5	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul5 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora6	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul6 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora7	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul7 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				<td class=A><input name=B12hora8	type=time  value=<?echo $hora;?> ></td>
				<td class=A><input name=B12resul8 type=texto value='' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
			</tr>
		</table>
<!-- /5 --> 		</div>

		<!-- *****************************************			 sección C			 ***************************************** -->
	<!-- la tabla anterior tiene 6 filas, 1 de 100px + 5 de 50px c/u. -->
<!-- 7 --> 		<div style="position:relative; left:0; width:100vw; top:170"> <!-- este div mueve hacia abajo desde la sección C -->
		<hr>
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo que los requisitos indicados en la sección B se cumplen y que hay seguridad para realizar el trabajo indicado en la sección A.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.<br><br></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorC		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required></td>
				<td><input name=horaejecC		type=time	 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=40><td></td></tr>
			<tr>
				<td><input name=inspectorC type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspC type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required></td>
				<td><input name=horainspC  type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=27.65vw></td><td width=33.85vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;D. AUTORIZACIÓN</b></td></tr>
			<tr><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td width=0.001vw></td><td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td>
			</tr>
			<tr>
				<td><input name=fechaemisorD	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required style=display:none></td>
				<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreemisorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=horaemisorD		type=time  class=mostrarhora  value='<?echo $hora;?>' min=<?echo date("H:i");?> readonly required style=display:none></td>
			</tr>
			<tr>
				<td></td><td>EMISOR</td><td>NOMBRE</td><td></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;E. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que el Trabajo mencionado en la Sección A:</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:5%></td>
				<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=gestionarClickRadio(this) required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=gestionarClickRadio(this)></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
			</tr>
			<tr>
				<td></td>
				<td colspan=6 class=B>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.<br><br></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorE		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecE	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required></td>
				<td><input name=horaejecE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspE	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required></td>
				<td><input name=horainspE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorE	type=date  class=mostrarfecha value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> readonly required></td>
				<td><input name=horaemisorE		type=time  value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
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
<!-- /7 --> 	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>

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
</form>
<!-- /1 --> </div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
