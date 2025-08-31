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
<script type="text/javascript">
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
<!-- 2 --> <div class=fijar style="top:15px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 -->	</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100vw">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado value=value=<? echo $estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:100%; display:inline-block; background-color:NONE"><b><? echo $$formulario; ?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:rgba(255,255,255,1); border:0" 
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec; ?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr height=100px>
				<td>BATCH ECOPETROL No.<br>	<input name=batch_ecopetrol  type=text style="width:50%; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ inputmode=numeric required autofocus></td>
				<td>CARTA LIBERACION No.<br><input name=carta_liberacion type=text style="width:50%; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
			<tr height=100px>
				<td>FECHA<br>								<input name=fechaA	 type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td>DESPACHO No.<br>				<input name=despacho type=text style="width:50%; text-align:center" maxlength=6 placeholder=###### pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>DATOS PLANTA DESPACHADORA</b></td></tr>
			<tr height=130px>
				<td class=Bc><br>COMPAÑIA												<input name=compania					type=text style=width:110% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=Bc><br>PLACAS CARRO TANQUE						<input name=placasCTK					type=text style="width:40%; text-align:center" maxlength=6 placeholder=ABC123 pattern=^([a-zA-Z]{3}[0-9]{3})$ onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=180px>
				<td class=Bc><br>GUÍA DE TRANSPORTE							<input name=guia_transporte		type=text style="width:50%; text-align:center" maxlength=12 pattern=^(?:[0-9]{8,12})$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO<br>CONTADOR (gls)<br><input name=volumen_bruto			type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>TEMP. (ºF) DESPACHO<br>(Danload)<br><input name=temp_despacho			type=text style="width:40%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD API Xtº OBS. (CTK)<br><input name=gravedad_API_X1		type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=180px>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)				<input name=gravedad_API1			type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD ESPECÍFICA<br>@ 60ºF (CTK)<br><input name=gravedad_espec1		type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>FACTOR DE CORECCIÓN						<input name=factor_correccion	type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN NETO<br>DESPACHADO (Gls)<br><input name=vol_neto_despacho	type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>INFORMACIÓN TANQUE DESPACHADOR</b></td></tr>
			<tr height=100px>
				<td colspan=2 class=Bc><br>TANQUE DESPACHADOR No.<input name=TK_despachador	type=text style="width:30%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)	 <input name=gravedad_API2		type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD ESPECÍFICA @ 60ºF<input name=gravedad_espec2	type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>INFORMACIÓN DE CALIDAD DE MUESTRA CTK</b></td></tr>
			<tr height=130px>
				<td colspan=2 class=Bc>APARIENCIA (C&B)<input name=aparienciaCTK type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>DIFERENCIA API CTK vs.API TK<br>(debe ser < 0.7º<br>API Despachador @ 60ºF)<input name=diferenciaAPI1 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD ESPECÍFICA CTK vs.<br>GRAVEDAD ESPECÍFICA TK DESPACHADOR<br>(debe ser < 0.003 Kgr/l)
					<input name=gravedad_espec_CTK_TK1 type=text style="width:40%; text-align:center" maxlength=5 pattern=^((0)(.\d)?(\d)?(\d)?)$ inputmode=numeric required>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>PRUEBAS ABREVIADAS CAMIÓN-TANQUE</b></td></tr>
			<tr height=130px>
				<td class=Bc>AEROPUERTO RECIBIDOR<input name=aerop_recibidor type=text style=width:96% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=Bc>APARIENCIA (C&B)<input name=aparienciaTK type=text style="width:96%; text-align:center" maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>GRAVEDAD API Xtº OBS. (CTK)<input name=gravedad_API_X2 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD API@60ºF (CTK)<input name=gravedad_API3 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>GRAVEDAD ESPECÍFICA<br>@ 60ºF (CTK)<br><input name=gravedad_espec3 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>DIFERENCIA API CTK vs. API TK<br>(debe ser < 0.7º<br>API Despachador @ 60ºF)<input name=diferenciaAPI2 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=220px>
				<td colspan=2 class=Bc>GRAV. ESPECÍF. CTK AEROP. vs.<br>GRAVEDAD ESPECÍFICA TK DESPACHADOR<br>(debe ser < 0.003 Kgr/l)<br>
					<input name=gravedad_espec_CTK_TK2 type=text style="width:40%; text-align:center" maxlength=5 pattern=^((0)(.\d)?(\d)?(\d)?)$ inputmode=numeric required>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=3 class=Bc><b>CONTADOR RECIBO AEROPUERTO</b></td></tr>
			<tr height=130px>
				<td class=Bc>TIQUETE No.<br><input name=tiquete type=text style="width:40%; text-align:center" maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
				<td class=Bc>LECTURA INICIAL<br><input name=lectura_inicial type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>LECTURA FINAL<br><input name=lectura_final type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO (Gls)<br><input name=vol_bruto type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>TEMPERATURA<br>EN LÍNEA DE RECIBO ºF<input name=temp_recibo type=text style="width:40%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)<br><input name=gravedad_API4 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=180px>
				<td class=Bc>FACTOR CORRECCIÓN DE VOLÚMEN<br><input name=factor_correccion_volumen1 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN NETO<br>RECIBIDO (Gls)<br><input name=vol_neto_recibido type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>VARIACIÓN DESPACHO vs. RECIBIDO CTK<br><input name=variacion_despacho_recibido type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección G			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>TANQUE RECIBIDOR AEROPUERTO</b></td></tr>
			<tr height=130px>
				<td class=Bc>TANQUE RECIBIDOR No.<br><input name=TK_recibo_aerop type=text style="width:40%; text-align:center" maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=Bc>MEDIDA INICIAL (mm)<br><input name=medida_inicial type=text style="width:40%; text-align:center" maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>MEDIDA FINAL (mm)<br><input name=medida_final type=text style="width:40%; text-align:center" maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO<br>TABLA AFORO (Gls)<br><input name=vol_bruto_tabla_aforo type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>Gravedad API Ctº observada (TK)<input name=gravedad_APIC type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>Gravedad API@60ºF<br><input name=gravedad_API5 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>TEMPERATURA TANQUE ºF<input name=temp_TK type=text style="width:40%; text-align:center" maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>FACTOR<br>CORRECCIÓN DE VOLÚMEN<input name=factor_correccion_volumen2 type=text style="width:40%; text-align:center" maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>VOLÚMEN NETO<br><input name=vol_neto type=text style="width:40%; text-align:center" maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección H			 ***************************************** -->
		<table border=0>
			<tr style=height:120px>
				<td class=Bc>NOMBRE REPRESENTANTE TERMINAL DESPACAHDORA<br>
				<input name=nombre_rep_term_desp type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr style=height:120px>
				<td class=Bc>NOMBRE CONDUCTOR<br>
				<input name=nombre_conductor type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr style=height:120px>
				<td class=Bc>NOMBRE REPRESENTANTE AEROPUERTO<br>
				<input name=nombre_rep_aeropuerto type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>
		<hr>
		<table>
			<tr height=30><td></td></tr>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td>
					<form method=post>
						<select name=usuario id=usuario type=texto required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?>@primax.com.co</option>
							<? endfor; ?>
						</select>
					</form>
				</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?echo $fechaactual;?> / <?echo $horaactual;?></span>
		<input style="display:none; width:3.10cm" type=texto name="fecha" value="<?echo $fechaactual;?> / <?echo $horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?echo number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=200>
				<td><input type="image" src="../../../../../common/imagenes/grabar.png" alt="Submit" style="width:100; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
				<td><a href="javascript:closed()"><img src="../../../../../common/imagenes/regresar.png" style="pointer-events:auto; width:100px; height:auto"></a></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
				<td>
					<a href="mailto:<?echo $correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
					<img src="../../../../../common/imagenes/piedepagina_horizontal.svg" style="pointer-events:auto; width:100%; height:auto">
					</a>
				</td>
			</tr>
		</table>
		<hr>
<!-- /7 --> 	</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>

</form>
<!-- /1 --> </div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
