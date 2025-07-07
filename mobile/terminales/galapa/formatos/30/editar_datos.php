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
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<div class="noimprimir">
<!-- inicio del php para editar el formato -->
<? echo "
<!-- 2 --> <div class=fijar style='top:15px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0vw; width:100vw'>
		<table style='background-color:rgba(255,255,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:100%; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
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
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL "; echo strtoupper($terminal); echo "</b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr height=100px>
				<td>BATCH ECOPETROL No.<br>	<input name=batch_ecopetrol  value='$row[batch_ecopetrol]'  type=text style='width:50%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required autofocus></td>
				<td>CARTA LIBERACION No.<br><input name=carta_liberacion value='$row[carta_liberacion]' type=text style='width:50%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
			<tr height=100px>
				<td>FECHA<br>								<input name=fechaA	 value='$row[fechaA]' 	type=date required></td>
				<td>DESPACHO No.<br>				<input name=despacho value='$row[despacho]' type=text style='width:50%; text-align:center' maxlength=6 pattern=^(?:[0-9]{4,6})$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección B			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>DATOS PLANTA DESPACHADORA</b></td></tr>
			<tr height=130px>
				<td class=Bc><br>COMPAÑIA<input name=compania value='$row[compania]' type=text style=width:110% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=Bc><br>PLACAS CARRO TANQUE<input name=placasCTK value='$row[placasCTK]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^([a-zA-Z]{3}[0-9]{3})$ onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=180px>
				<td class=Bc><br>GUÍA DE TRANSPORTE<input name=guia_transporte value='$row[guia_transporte]' type=text style='width:50%; text-align:center' maxlength=12 pattern=^(?:[0-9]{8,12})$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO<br>CONTADOR (gls)<br><input name=volumen_bruto	value='$row[volumen_bruto]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>TEMP. (ºF) DESPACHO<br>(Danload)<br><input name=temp_despacho value='$row[temp_despacho]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD API Xtº OBS. (CTK)<br><input name=gravedad_API_X1 value='$row[gravedad_API_X1]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=180px>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)<input name=gravedad_API1 value='$row[gravedad_API1]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD ESPECÍFICA<br>@ 60ºF (CTK)<br><input name=gravedad_espec1	value='$row[gravedad_espec1]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>FACTOR DE CORECCIÓN<input name=factor_correccion	value='$row[factor_correccion]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN NETO<br>DESPACHADO (Gls)<br><input name=vol_neto_despacho value='$row[vol_neto_despacho]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>INFORMACIÓN TANQUE DESPACHADOR</b></td></tr>
			<tr height=100px>
				<td colspan=2 class=Bc><br>TANQUE DESPACHADOR No.<input name=TK_despachador	value='$row[TK_despachador]' type=text style='width:30%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)<input name=gravedad_API2 value='$row[gravedad_API2]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD ESPECÍFICA @ 60ºF<input name=gravedad_espec2 value='$row[gravedad_espec2]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>INFORMACIÓN DE CALIDAD DE MUESTRA CTK</b></td></tr>
			<tr height=130px>
				<td colspan=2 class=Bc>APARIENCIA (C&B)<input name=aparienciaCTK value='$row[aparienciaCTK]' type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>DIFERENCIA API CTK vs.API TK<br>(debe ser < 0.7º<br>API Despachador @ 60ºF)<input name=diferenciaAPI1 value='$row[diferenciaAPI1]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD ESPECÍFICA CTK vs.<br>GRAVEDAD ESPECÍFICA TK DESPACHADOR<br>(debe ser < 0.003 Kgr/l)
					<input name=gravedad_espec_CTK_TK1 value='$row[gravedad_espec_CTK_TK1]' type=text style='width:40%; text-align:center' maxlength=5 pattern=^(([0-9])(.\d)?(\d)?(\d)?)$ inputmode=numeric required>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección E			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>PRUEBAS ABREVIADAS CAMIÓN-TANQUE</b></td></tr>
			<tr height=130px>
				<td class=Bc>AEROPUERTO RECIBIDOR<input name=aerop_recibidor value='$row[aerop_recibidor]' type=text style=width:96% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td class=Bc>APARIENCIA (C&B)<input name=aparienciaTK value='$row[aparienciaTK]' type=text style='width:96%; text-align:center' maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>GRAVEDAD API Xtº OBS. (CTK)<input name=gravedad_API_X2 value='$row[gravedad_API_X2]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>GRAVEDAD API@60ºF (CTK)<input name=gravedad_API3 value='$row[gravedad_API3]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>GRAVEDAD ESPECÍFICA<br>@ 60ºF (CTK)<br><input name=gravedad_espec3 value='$row[gravedad_espec3]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>DIFERENCIA API CTK vs. API TK<br>(debe ser < 0.7º<br>API Despachador @ 60ºF)<input name=diferenciaAPI2 value='$row[diferenciaAPI2]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=220px>
				<td colspan=2 class=Bc>GRAV. ESPECÍF. CTK AEROP. vs.<br>GRAVEDAD ESPECÍFICA TK DESPACHADOR<br>(debe ser < 0.003 Kgr/l)<br>
					<input name=gravedad_espec_CTK_TK2 value='$row[gravedad_espec_CTK_TK2]' type=text style='width:40%; text-align:center' maxlength=5 pattern=^(([0-9])(.\d)?(\d)?(\d)?)$ inputmode=numeric required>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección F			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=3 class=Bc><b>CONTADOR RECIBO AEROPUERTO</b></td></tr>
			<tr height=130px>
				<td class=Bc>TIQUETE No.<br><input name=tiquete value='$row[tiquete]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
				<td class=Bc>LECTURA INICIAL<br><input name=lectura_inicial value='$row[lectura_inicial]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>LECTURA FINAL<br><input name=lectura_final value='$row[lectura_final]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO (Gls)<br><input name=vol_bruto value='$row[vol_bruto]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>TEMPERATURA<br>EN LÍNEA DE RECIBO ºF<input name=temp_recibo value='$row[temp_recibo]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc><br>GRAVEDAD API@60ºF (CTK)<br><input name=gravedad_API4 value='$row[gravedad_API4]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=180px>
				<td class=Bc>FACTOR CORRECCIÓN DE VOLÚMEN<br><input name=factor_correccion_volumen1 value='$row[factor_correccion_volumen1]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN NETO<br>RECIBIDO (Gls)<br><input name=vol_neto_recibido value='$row[vol_neto_recibido]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>VARIACIÓN DESPACHO vs. RECIBIDO CTK<br><input name=variacion_despacho_recibido value='$row[variacion_despacho_recibido]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección G			 ***************************************** -->
		<table border=0>
			<tr><td width=50%></td><td width=50%></td></tr>
			<tr><td colspan=2 class=Bc><b>TANQUE RECIBIDOR AEROPUERTO</b></td></tr>
			<tr height=130px>
				<td class=Bc>TANQUE RECIBIDOR No.<br><input name=TK_recibo_aerop value='$row[TK_recibo_aerop]' type=text style='width:40%; text-align:center' maxlength=3 pattern=^(?:[0-9]{1,3})$ inputmode=numeric required></td>
				<td class=Bc>MEDIDA INICIAL (mm)<br><input name=medida_inicial value='$row[medida_inicial]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>MEDIDA FINAL (mm)<br><input name=medida_final value='$row[medida_final]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(?:[0-9]{1,6})$ inputmode=numeric required></td>
				<td class=Bc>VOLÚMEN BRUTO<br>TABLA AFORO (Gls)<br><input name=vol_bruto_tabla_aforo value='$row[vol_bruto_tabla_aforo]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>Gravedad API Ctº observada (TK)<input name=gravedad_APIC value='$row[gravedad_APIC]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>Gravedad API@60ºF<br><input name=gravedad_API5 value='$row[gravedad_API5]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc><br>TEMPERATURA TANQUE ºF<input name=temp_TK value='$row[temp_TK]' type=text style='width:40%; text-align:center' maxlength=6 pattern=^(([0-9]){1,3}?(.\d)?(\d)?)$ inputmode=numeric required></td>
				<td class=Bc>FACTOR<br>CORRECCIÓN DE VOLÚMEN<input name=factor_correccion_volumen2 value='$row[factor_correccion_volumen2]' type=text style='width:40%; text-align:center' maxlength=4 pattern=^(([0-9])(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
			<tr height=130px>
				<td class=Bc>VOLÚMEN NETO<br><input name=vol_neto value='$row[vol_neto]' type=text style='width:40%; text-align:center' maxlength=8 pattern=^(([0-9]){1,5}?(.\d)?(\d)?)$ inputmode=numeric required></td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección H			 ***************************************** -->
		<table border=0>
			<tr style=height:120px>
				<td class=Bc>NOMBRE REPRESENTANTE TERMINAL DESPACAHDORA<br>
				<input name=nombre_rep_term_desp value='$row[nombre_rep_term_desp]' type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr style=height:120px>
				<td class=Bc>NOMBRE CONDUCTOR<br>
				<input name=nombre_conductor value='$row[nombre_conductor]' type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr style=height:120px>
				<td class=Bc>NOMBRE REPRESENTANTE AEROPUERTO<br>
				<input name=nombre_rep_aeropuerto value='$row[nombre_rep_aeropuerto]' type=text style=width:60% maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
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
		<hr>
<!-- /10 --> 		</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
<!-- /3 --> 	</div>
</form>

"; ?>		<!-- cierre del php que se usa para editar el formato -->
<!-- /1 --> </div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
