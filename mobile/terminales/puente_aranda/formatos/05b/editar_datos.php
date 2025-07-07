<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
	a 				{text-decoration:none}
	td.Z			{font-size:24px; background-color:rgba(200,200,200,0.6)}
	td.A1			{font-size:30px}
	td.C			{font-size:23px; text-align:left}
	td.Cn			{font-size:28px; text-align:center}
	td.Cp			{font-size:30px; text-align:left; padding:0 10}
	td.Cd			{font-size:23px; text-align:center; font-weight:bold}
	td.Zd			{font-size:23px; text-align:center; font-weight:bold; background-color:rgba(200,200,200,0.6)}
	tr.C			{height: 60px}
	tr.Cn			{height:180px}
	tr.Cn0		{height:111px}
	tr.Cn1		{height: 44px}
	tr.Cn2		{height: 72px}
	tr.Cn3		{height:108px}
	tr.Cn4		{height:144px}
	tr.Cn5		{height:180px}
</style>
</head>
<script type="text/javascript">
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
</script>
<body style="margin-top:0px; margin-left:0vw; width:100vw; font-family:Arial; color:rgba(0,0,0,1); text-align:center">
<?
	include ("../../../../../common/datos.php");
	include ("../../../../../common/checkbox_num_text.php");
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
?>
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm) -->
<!-- 1 --> <div class=noimprimir>
<!-- inicio del php para editar el formato -->
<? echo "
<!-- 2 --> <div class=fijar style='top:60px; left:15px'>
	<a href='https://api.whatsapp.com/send?phone="; echo $celular_soporte; echo "
	&text="; if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} echo "
	le escribo de PRIMAX "; echo strtoupper($terminal); echo ", estoy diligenciando el formato "; echo $$formulario; echo ".' target=_blank>
	<img src='../../../../../common/imagenes/whatsapp.png' style='pointer-events:auto' width=auto height=70px></a>
<!-- /2 --> </div>
<!--
<div style='position:fixed; bottom:-91.85vh; background-color:rgba(255,112,0,1); z-index:220'>
	<table border=0>
		<tr>
			<td><a href=#dia1><span style=font-size:60px>1️⃣</span></a></td>
			<td><a href=#dia2><span style=font-size:60px>2️⃣</span></a></td>
			<td><a href=#dia3><span style=font-size:60px>3️⃣</span></a></td>
			<td><a href=#dia4><span style=font-size:60px>4️⃣</span></a></td>
			<td><a href=#dia5><span style=font-size:60px>5️⃣</span></a></td>
			<td><a href=#dia6><span style=font-size:60px>6️⃣</span></a></td>
		</tr>
	</table>
</div>
-->
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->	<div style='position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:8970px; overflow:hidden'>
		<table style='color:black; background-color:rgba(255,255,255,1)' border=0>
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2 style='background-color:none'>
					<input style='display:none; border:0' name=estado type=text value="; echo $estado_formulario2; echo " readonly>
					<span style='width:60%; display:inline-block; font-size:36px; background-color:none'><b>"; echo $$formulario; echo "</b></span>
				</td>
				<td style='font-family:SCHLBKB; font-size:35px; color:red; background-color:white'>
					";	if ($row['consecutivo'] < 9) {echo '&#8470; 00000'; echo $row['consecutivo'];}
								else if ($row['consecutivo'] < 99) {echo '&#8470; 0000'; echo $row['consecutivo'];}
									else if ($row['consecutivo'] < 999) {echo '&#8470; 000'; echo $row['consecutivo'];}
										else if ($row['consecutivo'] < 9999) {echo '&#8470; 00'; echo $row['consecutivo'];}
											else if ($row['consecutivo'] < 99999) {echo '&#8470; 0'; echo $row['consecutivo'];}
												else {echo '&#8470; '; echo $row['consecutivo'];} echo "
					<input name='consecutivo' type='text' value=$row[consecutivo] style='display:none' readonly>
				</td>
		</tr>
			<tr>
				<td colspan=3>
					<span style='font-size:24.00px; color:rgba(255,112,0,1)'><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>

<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr class=C style=height:30px>
				<td class=B style=text-align:center># PERMISO DE TRABAJO EN ESPACIO CONFINADO&nbsp;<input name=pTEC value='$row[pTEC]' style='width:13%; text-align:center' type=text inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=45%></td><td width= 4%></td><td width=40%></td><td width=11%></td></tr>
			<tr class=C style='height:80px; vertical-align:middle'>
				<td class=B style=text-align:right>TRABAJO EN CALIENTE&nbsp;</td>
				<td style=text-align:left><input type=radio name=tipo_trabajo value='C' "; if ($row['tipo_trabajo'] == 'C') {echo 'checked';} echo " onclick=gestionarClickRadio(this) required></td>
				<td class=B style=text-align:right>TRABAJO EN FRÍO&nbsp;</td>
				<td style=text-align:left><input type=radio name=tipo_trabajo value='F' "; if ($row['tipo_trabajo'] == 'F') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<table border=0>
			<tr class=C style=height:30px><td class=BB ><b>LA MEDICIÓN DEBE SER CONTINUA.</b></td></tr>
			<tr class=C style=height:30px><td class=BB ><b>PARA TRABAJO EN CALIENTE; SI EL %LEL SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 DÍA 1			 ***************************************** -->
		<table id=dia1 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 1</b></td>
				<td class=A style=text-align:left><input name=dia1_fecha type=date value='$row[dia1_fecha]' min='$row[dia1_fecha]' max='$row[dia1_fecha]' required></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia1_equipo value='$row[dia1_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia1_marca value='$row[dia1_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia1_fecha_calib value='$row[dia1_fecha_calib]' type=date required></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia1_propietario value='$row[dia1_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia1_bumptest_por value='$row[dia1_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td><input name=dia1_LEL	value='$row[dia1_LEL]'	style='width:90%; text-align:center' type=text inputmode=numeric title='##.##' maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$ required></td><td></td>
				<td><input name=dia1_O		value='$row[dia1_O]'		style='width:90%; text-align:center' type=text inputmode=numeric title='###'	 maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td><td></td>
				<td><input name=dia1_H2S	value='$row[dia1_H2S]'	style='width:90%; text-align:center' type=text inputmode=numeric title='###'	 maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td><td></td>
				<td><input name=dia1_CO		value='$row[dia1_CO]'		style='width:86%; text-align:center' type=text inputmode=numeric title='###'	 maxlength=3 pattern=^(?:[0-9]{1,3})$ required></td>
			</tr>
			<tr height=10><td colspan=7></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia1_pasa_bumptest value=SI "; if ($row['dia1_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this) required></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia1_pasa_bumptest value=NO "; if ($row['dia1_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:860px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:860px; background-color:white; overflow:scroll'>
			<table border=1px style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_1  value='$row[dia1_H1_1]' type=time id=timeB22 required></td>
					<td class=A><input name=dia1_R1_1  value='$row[dia1_R1_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_1  value='$row[dia1_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R2_1  value='$row[dia1_R2_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_1  value='$row[dia1_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R3_1  value='$row[dia1_R3_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_1  value='$row[dia1_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R4_1  value='$row[dia1_R4_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_1  value='$row[dia1_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R5_1  value='$row[dia1_R5_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_1  value='$row[dia1_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R6_1  value='$row[dia1_R6_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_1  value='$row[dia1_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R7_1  value='$row[dia1_R7_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_1  value='$row[dia1_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R8_1  value='$row[dia1_R8_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_1  value='$row[dia1_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R9_1  value='$row[dia1_R9_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_1 value='$row[dia1_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R10_1 value='$row[dia1_R10_1]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_2  value='$row[dia1_H1_2]' type=time id=timeB22 required></td>
					<td class=A><input name=dia1_R1_2  value='$row[dia1_R1_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_2  value='$row[dia1_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R2_2  value='$row[dia1_R2_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_2  value='$row[dia1_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R3_2  value='$row[dia1_R3_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_2  value='$row[dia1_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R4_2  value='$row[dia1_R4_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_2  value='$row[dia1_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R5_2  value='$row[dia1_R5_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_2  value='$row[dia1_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R6_2  value='$row[dia1_R6_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_2  value='$row[dia1_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R7_2  value='$row[dia1_R7_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_2  value='$row[dia1_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R8_2  value='$row[dia1_R8_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_2  value='$row[dia1_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R9_2  value='$row[dia1_R9_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_2 value='$row[dia1_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R10_2 value='$row[dia1_R10_2]' id=numero title='##.#' maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_3  value='$row[dia1_H1_3]' type=time id=timeB22 required></td>
					<td class=A><input name=dia1_R1_3  value='$row[dia1_R1_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_3  value='$row[dia1_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R2_3  value='$row[dia1_R2_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_3  value='$row[dia1_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R3_3  value='$row[dia1_R3_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_3  value='$row[dia1_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R4_3  value='$row[dia1_R4_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_3  value='$row[dia1_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R5_3  value='$row[dia1_R5_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_3  value='$row[dia1_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R6_3  value='$row[dia1_R6_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_3  value='$row[dia1_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R7_3  value='$row[dia1_R7_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_3  value='$row[dia1_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R8_3  value='$row[dia1_R8_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_3  value='$row[dia1_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R9_3  value='$row[dia1_R9_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_3 value='$row[dia1_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R10_3 value='$row[dia1_R10_3]' id=numero title='#.##' maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_4  value='$row[dia1_H1_4]' type=time id=timeB22 required></td>
					<td class=A><input name=dia1_R1_4  value='$row[dia1_R1_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_4  value='$row[dia1_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R2_4  value='$row[dia1_R2_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_4  value='$row[dia1_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R3_4  value='$row[dia1_R3_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_4  value='$row[dia1_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R4_4  value='$row[dia1_R4_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_4  value='$row[dia1_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R5_4  value='$row[dia1_R5_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_4  value='$row[dia1_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R6_4  value='$row[dia1_R6_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_4  value='$row[dia1_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R7_4  value='$row[dia1_R7_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_4  value='$row[dia1_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R8_4  value='$row[dia1_R8_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_4  value='$row[dia1_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R9_4  value='$row[dia1_R9_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_4 value='$row[dia1_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia1_R10_4 value='$row[dia1_R10_4]' id=numero title='##.##' maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:1278px'>
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=30px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:1320px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia1_nombre1 value='$row[dia1_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia1_nombre2 value='$row[dia1_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia1_nombre3 value='$row[dia1_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia1_nombre4 value='$row[dia1_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia1_nombre5 value='$row[dia1_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:1320px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_1 value='$row[dia1_HE1_1]' type=time required></td>
					<td class=A><input id=timeB22 name=dia1_HS1_1 value='$row[dia1_HS1_1]' type=time required></td>
					<td class=A><input id=timeB22 name=dia1_HE2_1 value='$row[dia1_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS2_1 value='$row[dia1_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE3_1 value='$row[dia1_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS3_1 value='$row[dia1_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE4_1 value='$row[dia1_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS4_1 value='$row[dia1_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE5_1 value='$row[dia1_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS5_1 value='$row[dia1_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_2 value='$row[dia1_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS1_2 value='$row[dia1_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE2_2 value='$row[dia1_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS2_2 value='$row[dia1_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE3_2 value='$row[dia1_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS3_2 value='$row[dia1_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE4_2 value='$row[dia1_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS4_2 value='$row[dia1_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE5_2 value='$row[dia1_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS5_2 value='$row[dia1_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_3 value='$row[dia1_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS1_3 value='$row[dia1_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE2_3 value='$row[dia1_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS2_3 value='$row[dia1_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE3_3 value='$row[dia1_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS3_3 value='$row[dia1_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE4_3 value='$row[dia1_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS4_3 value='$row[dia1_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE5_3 value='$row[dia1_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS5_3 value='$row[dia1_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_4 value='$row[dia1_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS1_4 value='$row[dia1_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE2_4 value='$row[dia1_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS2_4 value='$row[dia1_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE3_4 value='$row[dia1_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS3_4 value='$row[dia1_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE4_4 value='$row[dia1_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS4_4 value='$row[dia1_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE5_4 value='$row[dia1_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS5_4 value='$row[dia1_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_5 value='$row[dia1_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS1_5 value='$row[dia1_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE2_5 value='$row[dia1_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS2_5 value='$row[dia1_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE3_5 value='$row[dia1_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS3_5 value='$row[dia1_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE4_5 value='$row[dia1_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS4_5 value='$row[dia1_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HE5_5 value='$row[dia1_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia1_HS5_5 value='$row[dia1_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; top:1740px'><hr></div>

		<!-- *****************************************			 DÍA 2			 ***************************************** -->
		<div style='position:absolute; top:1750px'>
		<table id=dia2 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 2</b></td>
				<td class=A style=text-align:left><input name=dia2_fecha value='$row[dia2_fecha]' type=date min='$row[dia2_fecha]' max='$row[dia2_fecha]'></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia2_equipo value='$row[dia2_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia2_marca value='$row[dia2_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia2_fecha_calib value='$row[dia2_fecha_calib]' type=date></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia2_propietario value='$row[dia2_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia2_bumptest_por value='$row[dia2_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr height=5px><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td><td style=width:1.34%></td><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td class=A><input name=dia2_LEL	value='$row[dia2_LEL]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$></td><td></td>
				<td class=A><input name=dia2_O		value='$row[dia2_O]'		style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia2_H2S	value='$row[dia2_H2S]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia2_CO		value='$row[dia2_CO]'		style='width:86%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia2_pasa_bumptest value=SI "; if ($row['dia2_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia2_pasa_bumptest value=NO "; if ($row['dia2_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:447px; background-color:white; overflow:scroll'>
			<table border=1px style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:447px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_1  value='$row[dia2_H1_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R1_1  value='$row[dia2_R1_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_1  value='$row[dia2_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R2_1  value='$row[dia2_R2_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_1  value='$row[dia2_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R3_1  value='$row[dia2_R3_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_1  value='$row[dia2_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R4_1  value='$row[dia2_R4_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_1  value='$row[dia2_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R5_1  value='$row[dia2_R5_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_1  value='$row[dia2_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R6_1  value='$row[dia2_R6_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_1  value='$row[dia2_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R7_1  value='$row[dia2_R7_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_1  value='$row[dia2_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R8_1  value='$row[dia2_R8_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_1  value='$row[dia2_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R9_1  value='$row[dia2_R9_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_1 value='$row[dia2_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R10_1 value='$row[dia2_R10_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_2  value='$row[dia2_H1_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R1_2  value='$row[dia2_R1_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_2  value='$row[dia2_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R2_2  value='$row[dia2_R2_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_2  value='$row[dia2_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R3_2  value='$row[dia2_R3_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_2  value='$row[dia2_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R4_2  value='$row[dia2_R4_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_2  value='$row[dia2_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R5_2  value='$row[dia2_R5_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_2  value='$row[dia2_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R6_2  value='$row[dia2_R6_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_2  value='$row[dia2_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R7_2  value='$row[dia2_R7_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_2  value='$row[dia2_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R8_2  value='$row[dia2_R8_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_2  value='$row[dia2_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R9_2  value='$row[dia2_R9_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_2 value='$row[dia2_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R10_2 value='$row[dia2_R10_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_3  value='$row[dia2_H1_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R1_3  value='$row[dia2_R1_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_3  value='$row[dia2_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R2_3  value='$row[dia2_R2_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_3  value='$row[dia2_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R3_3  value='$row[dia2_R3_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_3  value='$row[dia2_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R4_3  value='$row[dia2_R4_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_3  value='$row[dia2_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R5_3  value='$row[dia2_R5_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_3  value='$row[dia2_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R6_3  value='$row[dia2_R6_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_3  value='$row[dia2_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R7_3  value='$row[dia2_R7_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_3  value='$row[dia2_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R8_3  value='$row[dia2_R8_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_3  value='$row[dia2_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R9_3  value='$row[dia2_R9_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_3 value='$row[dia2_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R10_3 value='$row[dia2_R10_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_4  value='$row[dia2_H1_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R1_4  value='$row[dia2_R1_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_4  value='$row[dia2_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R2_4  value='$row[dia2_R2_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_4  value='$row[dia2_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R3_4  value='$row[dia2_R3_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_4  value='$row[dia2_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R4_4  value='$row[dia2_R4_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_4  value='$row[dia2_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R5_4  value='$row[dia2_R5_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_4  value='$row[dia2_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R6_4  value='$row[dia2_R6_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_4  value='$row[dia2_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R7_4  value='$row[dia2_R7_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_4  value='$row[dia2_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R8_4  value='$row[dia2_R8_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_4  value='$row[dia2_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R9_4  value='$row[dia2_R9_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_4 value='$row[dia2_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia2_R10_4 value='$row[dia2_R10_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:855px'>
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia2_nombre1 value='$row[dia2_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia2_nombre2 value='$row[dia2_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia2_nombre3 value='$row[dia2_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia2_nombre4 value='$row[dia2_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia2_nombre5 value='$row[dia2_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_1 value='$row[dia2_HE1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS1_1 value='$row[dia2_HS1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE2_1 value='$row[dia2_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS2_1 value='$row[dia2_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE3_1 value='$row[dia2_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS3_1 value='$row[dia2_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE4_1 value='$row[dia2_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS4_1 value='$row[dia2_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE5_1 value='$row[dia2_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS5_1 value='$row[dia2_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_2 value='$row[dia2_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS1_2 value='$row[dia2_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE2_2 value='$row[dia2_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS2_2 value='$row[dia2_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE3_2 value='$row[dia2_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS3_2 value='$row[dia2_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE4_2 value='$row[dia2_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS4_2 value='$row[dia2_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE5_2 value='$row[dia2_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS5_2 value='$row[dia2_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_3 value='$row[dia2_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS1_3 value='$row[dia2_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE2_3 value='$row[dia2_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS2_3 value='$row[dia2_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE3_3 value='$row[dia2_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS3_3 value='$row[dia2_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE4_3 value='$row[dia2_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS4_3 value='$row[dia2_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE5_3 value='$row[dia2_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS5_3 value='$row[dia2_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_4 value='$row[dia2_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS1_4 value='$row[dia2_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE2_4 value='$row[dia2_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS2_4 value='$row[dia2_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE3_4 value='$row[dia2_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS3_4 value='$row[dia2_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE4_4 value='$row[dia2_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS4_4 value='$row[dia2_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE5_4 value='$row[dia2_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS5_4 value='$row[dia2_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_5 value='$row[dia2_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS1_5 value='$row[dia2_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE2_5 value='$row[dia2_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS2_5 value='$row[dia2_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE3_5 value='$row[dia2_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS3_5 value='$row[dia2_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE4_5 value='$row[dia2_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS4_5 value='$row[dia2_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HE5_5 value='$row[dia2_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia2_HS5_5 value='$row[dia2_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		</div>
		<div style='position:absolute; width:100vw; top:3083px'><hr></div>

		<!-- *****************************************			 DÍA 3			 ***************************************** -->
		<div style='position:absolute; width:100vw; left:0; top:3093px'>
		<table id=dia3 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 3</b></td>
				<td class=A style=text-align:left><input name=dia3_fecha value='$row[dia3_fecha]' type=date min='$row[dia3_fecha]' max='$row[dia3_fecha]'></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia3_equipo value='$row[dia3_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia3_marca value='$row[dia3_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia3_fecha_calib value='$row[dia3_fecha_calib]' type=date></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia3_propietario value='$row[dia3_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia3_bumptest_por value='$row[dia3_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr height=5px><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td><td style=width:1.34%></td><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td class=A><input name=dia3_LEL	value='$row[dia3_LEL]' style='width:90%; text-align:center' type=text inputmode=numeric maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$></td><td></td>
				<td class=A><input name=dia3_O		value='$row[dia3_O]'	 style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia3_H2S	value='$row[dia3_H2S]' style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia3_CO		value='$row[dia3_CO]'  style='width:86%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia3_pasa_bumptest value=SI "; if ($row['dia3_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia3_pasa_bumptest value=NO "; if ($row['dia3_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>											<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>										<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>									<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>				<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_1  value='$row[dia3_H1_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R1_1  value='$row[dia3_R1_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_1  value='$row[dia3_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R2_1  value='$row[dia3_R2_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_1  value='$row[dia3_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R3_1  value='$row[dia3_R3_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_1  value='$row[dia3_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R4_1  value='$row[dia3_R4_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_1  value='$row[dia3_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R5_1  value='$row[dia3_R5_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_1  value='$row[dia3_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R6_1  value='$row[dia3_R6_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_1  value='$row[dia3_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R7_1  value='$row[dia3_R7_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_1  value='$row[dia3_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R8_1  value='$row[dia3_R8_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_1  value='$row[dia3_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R9_1  value='$row[dia3_R9_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_1 value='$row[dia3_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R10_1 value='$row[dia3_R10_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_2  value='$row[dia3_H1_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R1_2  value='$row[dia3_R1_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_2  value='$row[dia3_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R2_2  value='$row[dia3_R2_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_2  value='$row[dia3_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R3_2  value='$row[dia3_R3_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_2  value='$row[dia3_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R4_2  value='$row[dia3_R4_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_2  value='$row[dia3_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R5_2  value='$row[dia3_R5_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_2  value='$row[dia3_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R6_2  value='$row[dia3_R6_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_2  value='$row[dia3_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R7_2  value='$row[dia3_R7_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_2  value='$row[dia3_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R8_2  value='$row[dia3_R8_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_2  value='$row[dia3_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R9_2  value='$row[dia3_R9_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_2 value='$row[dia3_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R10_2 value='$row[dia3_R10_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_3  value='$row[dia3_H1_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R1_3  value='$row[dia3_R1_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_3  value='$row[dia3_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R2_3  value='$row[dia3_R2_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_3  value='$row[dia3_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R3_3  value='$row[dia3_R3_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_3  value='$row[dia3_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R4_3  value='$row[dia3_R4_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_3  value='$row[dia3_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R5_3  value='$row[dia3_R5_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_3  value='$row[dia3_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R6_3  value='$row[dia3_R6_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_3  value='$row[dia3_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R7_3  value='$row[dia3_R7_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_3  value='$row[dia3_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R8_3  value='$row[dia3_R8_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_3  value='$row[dia3_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R9_3  value='$row[dia3_R9_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_3 value='$row[dia3_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R10_3 value='$row[dia3_R10_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_4  value='$row[dia3_H1_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R1_4  value='$row[dia3_R1_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_4  value='$row[dia3_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R2_4  value='$row[dia3_R2_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_4  value='$row[dia3_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R3_4  value='$row[dia3_R3_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_4  value='$row[dia3_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R4_4  value='$row[dia3_R4_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_4  value='$row[dia3_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R5_4  value='$row[dia3_R5_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_4  value='$row[dia3_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R6_4  value='$row[dia3_R6_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_4  value='$row[dia3_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R7_4  value='$row[dia3_R7_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_4  value='$row[dia3_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R8_4  value='$row[dia3_R8_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_4  value='$row[dia3_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R9_4  value='$row[dia3_R9_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_4 value='$row[dia3_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia3_R10_4 value='$row[dia3_R10_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:855px'>
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=70px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia3_nombre1 value='$row[dia3_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia3_nombre2 value='$row[dia3_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia3_nombre3 value='$row[dia3_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia3_nombre4 value='$row[dia3_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia3_nombre5 value='$row[dia3_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_1 value='$row[dia3_HE1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS1_1 value='$row[dia3_HS1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE2_1 value='$row[dia3_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS2_1 value='$row[dia3_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE3_1 value='$row[dia3_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS3_1 value='$row[dia3_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE4_1 value='$row[dia3_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS4_1 value='$row[dia3_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE5_1 value='$row[dia3_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS5_1 value='$row[dia3_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_2 value='$row[dia3_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS1_2 value='$row[dia3_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE2_2 value='$row[dia3_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS2_2 value='$row[dia3_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE3_2 value='$row[dia3_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS3_2 value='$row[dia3_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE4_2 value='$row[dia3_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS4_2 value='$row[dia3_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE5_2 value='$row[dia3_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS5_2 value='$row[dia3_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_3 value='$row[dia3_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS1_3 value='$row[dia3_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE2_3 value='$row[dia3_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS2_3 value='$row[dia3_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE3_3 value='$row[dia3_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS3_3 value='$row[dia3_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE4_3 value='$row[dia3_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS4_3 value='$row[dia3_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE5_3 value='$row[dia3_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS5_3 value='$row[dia3_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_4 value='$row[dia3_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS1_4 value='$row[dia3_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE2_4 value='$row[dia3_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS2_4 value='$row[dia3_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE3_4 value='$row[dia3_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS3_4 value='$row[dia3_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE4_4 value='$row[dia3_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS4_4 value='$row[dia3_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE5_4 value='$row[dia3_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS5_4 value='$row[dia3_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_5 value='$row[dia3_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS1_5 value='$row[dia3_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE2_5 value='$row[dia3_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS2_5 value='$row[dia3_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE3_5 value='$row[dia3_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS3_5 value='$row[dia3_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE4_5 value='$row[dia3_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS4_5 value='$row[dia3_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HE5_5 value='$row[dia3_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia3_HS5_5 value='$row[dia3_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		</div>
		<div style='position:absolute; width:100vw; top:4425px'><hr></div>

		<!-- *****************************************			 DÍA 4			 ***************************************** -->
		<div style='position:absolute; width:100vw; left:0; top:4435px'>
		<table id=dia4 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 4</b></td>
				<td class=A style=text-align:left><input name=dia4_fecha type=date value='$row[dia4_fecha]' min='$row[dia4_fecha]' max='$row[dia4_fecha]'></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia4_equipo value='$row[dia4_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia4_marca value='$row[dia4_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia4_fecha_calib value='$row[dia4_fecha_calib]' type=date></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia4_propietario value='$row[dia4_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia4_bumptest_por value='$row[dia4_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr height=5px><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td><td style=width:1.34%></td><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td class=A><input name=dia4_LEL	value='$row[dia4_LEL]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$></td><td></td>
				<td class=A><input name=dia4_O		value='$row[dia4_O]'		style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia4_H2S	value='$row[dia4_H2S]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia4_CO		value='$row[dia4_CO]'		style='width:86%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia4_pasa_bumptest value=SI "; if ($row['dia4_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia4_pasa_bumptest value=NO "; if ($row['dia4_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_1  value='$row[dia4_H1_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R1_1  value='$row[dia4_R1_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_1  value='$row[dia4_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R2_1  value='$row[dia4_R2_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_1  value='$row[dia4_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R3_1  value='$row[dia4_R3_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_1  value='$row[dia4_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R4_1  value='$row[dia4_R4_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_1  value='$row[dia4_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R5_1  value='$row[dia4_R5_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_1  value='$row[dia4_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R6_1  value='$row[dia4_R6_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_1  value='$row[dia4_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R7_1  value='$row[dia4_R7_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_1  value='$row[dia4_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R8_1  value='$row[dia4_R8_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_1  value='$row[dia4_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R9_1  value='$row[dia4_R9_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_1 value='$row[dia4_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R10_1 value='$row[dia4_R10_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_2  value='$row[dia4_H1_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R1_2  value='$row[dia4_R1_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_2  value='$row[dia4_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R2_2  value='$row[dia4_R2_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_2  value='$row[dia4_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R3_2  value='$row[dia4_R3_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_2  value='$row[dia4_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R4_2  value='$row[dia4_R4_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_2  value='$row[dia4_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R5_2  value='$row[dia4_R5_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_2  value='$row[dia4_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R6_2  value='$row[dia4_R6_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_2  value='$row[dia4_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R7_2  value='$row[dia4_R7_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_2  value='$row[dia4_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R8_2  value='$row[dia4_R8_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_2  value='$row[dia4_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R9_2  value='$row[dia4_R9_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_2 value='$row[dia4_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R10_2 value='$row[dia4_R10_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_3  value='$row[dia4_H1_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R1_3  value='$row[dia4_R1_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_3  value='$row[dia4_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R2_3  value='$row[dia4_R2_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_3  value='$row[dia4_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R3_3  value='$row[dia4_R3_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_3  value='$row[dia4_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R4_3  value='$row[dia4_R4_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_3  value='$row[dia4_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R5_3  value='$row[dia4_R5_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_3  value='$row[dia4_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R6_3  value='$row[dia4_R6_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_3  value='$row[dia4_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R7_3  value='$row[dia4_R7_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_3  value='$row[dia4_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R8_3  value='$row[dia4_R8_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_3  value='$row[dia4_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R9_3  value='$row[dia4_R9_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_3 value='$row[dia4_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R10_3 value='$row[dia4_R10_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_4  value='$row[dia4_H1_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R1_4  value='$row[dia4_R1_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_4  value='$row[dia4_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R2_4  value='$row[dia4_R2_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_4  value='$row[dia4_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R3_4  value='$row[dia4_R3_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_4  value='$row[dia4_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R4_4  value='$row[dia4_R4_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_4  value='$row[dia4_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R5_4  value='$row[dia4_R5_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_4  value='$row[dia4_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R6_4  value='$row[dia4_R6_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_4  value='$row[dia4_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R7_4  value='$row[dia4_R7_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_4  value='$row[dia4_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R8_4  value='$row[dia4_R8_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_4  value='$row[dia4_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R9_4  value='$row[dia4_R9_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_4 value='$row[dia4_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia4_R10_4 value='$row[dia4_R10_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:855px'>
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia4_nombre1 value='$row[dia4_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia4_nombre2 value='$row[dia4_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia4_nombre3 value='$row[dia4_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia4_nombre4 value='$row[dia4_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia4_nombre5 value='$row[dia4_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_1 value='$row[dia4_HE1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS1_1 value='$row[dia4_HS1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE2_1 value='$row[dia4_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS2_1 value='$row[dia4_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE3_1 value='$row[dia4_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS3_1 value='$row[dia4_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE4_1 value='$row[dia4_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS4_1 value='$row[dia4_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE5_1 value='$row[dia4_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS5_1 value='$row[dia4_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_2 value='$row[dia4_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS1_2 value='$row[dia4_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE2_2 value='$row[dia4_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS2_2 value='$row[dia4_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE3_2 value='$row[dia4_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS3_2 value='$row[dia4_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE4_2 value='$row[dia4_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS4_2 value='$row[dia4_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE5_2 value='$row[dia4_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS5_2 value='$row[dia4_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_3 value='$row[dia4_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS1_3 value='$row[dia4_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE2_3 value='$row[dia4_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS2_3 value='$row[dia4_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE3_3 value='$row[dia4_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS3_3 value='$row[dia4_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE4_3 value='$row[dia4_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS4_3 value='$row[dia4_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE5_3 value='$row[dia4_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS5_3 value='$row[dia4_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_4 value='$row[dia4_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS1_4 value='$row[dia4_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE2_4 value='$row[dia4_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS2_4 value='$row[dia4_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE3_4 value='$row[dia4_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS3_4 value='$row[dia4_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE4_4 value='$row[dia4_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS4_4 value='$row[dia4_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE5_4 value='$row[dia4_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS5_4 value='$row[dia4_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_5 value='$row[dia4_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS1_5 value='$row[dia4_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE2_5 value='$row[dia4_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS2_5 value='$row[dia4_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE3_5 value='$row[dia4_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS3_5 value='$row[dia4_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE4_5 value='$row[dia4_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS4_5 value='$row[dia4_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HE5_5 value='$row[dia4_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia4_HS5_5 value='$row[dia4_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		</div>
		<div style='position:absolute; width:100vw; left:0; top:5767px'><hr></div>

		<!-- *****************************************			 DÍA 5			 ***************************************** -->
		<div style='position:absolute; width:100vw; top:5777px'>
		<table id=dia5 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 5</b></td>
				<td class=A style=text-align:left><input name=dia5_fecha value='$row[dia5_fecha]' type=date min='$row[dia5_fecha]' max='$row[dia5_fecha]'></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia5_equipo value='$row[dia5_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia5_marca value='$row[dia5_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia5_fecha_calib value='$row[dia5_fecha_calib]' type=date></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia5_propietario value='$row[dia5_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia5_bumptest_por value='$row[dia5_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr height=5px><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td><td style=width:1.34%></td><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td class=A><input name=dia5_LEL	value='$row[dia5_LEL]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$></td><td></td>
				<td class=A><input name=dia5_O		value='$row[dia5_O]'		style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia5_H2S	value='$row[dia5_H2S]'	style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia5_CO		value='$row[dia5_CO]'		style='width:86%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia5_pasa_bumptest value=SI "; if ($row['dia5_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia5_pasa_bumptest value=NO "; if ($row['dia5_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_1  value='$row[dia5_H1_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R1_1  value='$row[dia5_R1_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_1  value='$row[dia5_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R2_1  value='$row[dia5_R2_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_1  value='$row[dia5_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R3_1  value='$row[dia5_R3_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_1  value='$row[dia5_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R4_1  value='$row[dia5_R4_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_1  value='$row[dia5_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R5_1  value='$row[dia5_R5_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_1  value='$row[dia5_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R6_1  value='$row[dia5_R6_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_1  value='$row[dia5_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R7_1  value='$row[dia5_R7_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_1  value='$row[dia5_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R8_1  value='$row[dia5_R8_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_1  value='$row[dia5_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R9_1  value='$row[dia5_R9_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_1 value='$row[dia5_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R10_1 value='$row[dia5_R10_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_2  value='$row[dia5_H1_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R1_2  value='$row[dia5_R1_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_2  value='$row[dia5_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R2_2  value='$row[dia5_R2_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_2  value='$row[dia5_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R3_2  value='$row[dia5_R3_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_2  value='$row[dia5_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R4_2  value='$row[dia5_R4_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_2  value='$row[dia5_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R5_2  value='$row[dia5_R5_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_2  value='$row[dia5_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R6_2  value='$row[dia5_R6_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_2  value='$row[dia5_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R7_2  value='$row[dia5_R7_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_2  value='$row[dia5_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R8_2  value='$row[dia5_R8_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_2  value='$row[dia5_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R9_2  value='$row[dia5_R9_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_2 value='$row[dia5_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R10_2 value='$row[dia5_R10_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_3  value='$row[dia5_H1_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R1_3  value='$row[dia5_R1_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_3  value='$row[dia5_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R2_3  value='$row[dia5_R2_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_3  value='$row[dia5_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R3_3  value='$row[dia5_R3_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_3  value='$row[dia5_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R4_3  value='$row[dia5_R4_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_3  value='$row[dia5_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R5_3  value='$row[dia5_R5_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_3  value='$row[dia5_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R6_3  value='$row[dia5_R6_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_3  value='$row[dia5_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R7_3  value='$row[dia5_R7_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_3  value='$row[dia5_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R8_3  value='$row[dia5_R8_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_3  value='$row[dia5_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R9_3  value='$row[dia5_R9_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_3 value='$row[dia5_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R10_3 value='$row[dia5_R10_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_4  value='$row[dia5_H1_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R1_4  value='$row[dia5_R1_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_4  value='$row[dia5_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R2_4  value='$row[dia5_R2_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_4  value='$row[dia5_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R3_4  value='$row[dia5_R3_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_4  value='$row[dia5_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R4_4  value='$row[dia5_R4_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_4  value='$row[dia5_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R5_4  value='$row[dia5_R5_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_4  value='$row[dia5_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R6_4  value='$row[dia5_R6_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_4  value='$row[dia5_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R7_4  value='$row[dia5_R7_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_4  value='$row[dia5_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R8_4  value='$row[dia5_R8_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_4  value='$row[dia5_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R9_4  value='$row[dia5_R9_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_4 value='$row[dia5_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia5_R10_4 value='$row[dia5_R10_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:855px'>
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=70px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia5_nombre1 value='$row[dia5_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia5_nombre2 value='$row[dia5_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia5_nombre3 value='$row[dia5_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia5_nombre4 value='$row[dia5_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia5_nombre5 value='$row[dia5_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_1 value='$row[dia5_HE1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS1_1 value='$row[dia5_HS1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE2_1 value='$row[dia5_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS2_1 value='$row[dia5_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE3_1 value='$row[dia5_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS3_1 value='$row[dia5_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE4_1 value='$row[dia5_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS4_1 value='$row[dia5_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE5_1 value='$row[dia5_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS5_1 value='$row[dia5_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_2 value='$row[dia5_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS1_2 value='$row[dia5_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE2_2 value='$row[dia5_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS2_2 value='$row[dia5_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE3_2 value='$row[dia5_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS3_2 value='$row[dia5_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE4_2 value='$row[dia5_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS4_2 value='$row[dia5_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE5_2 value='$row[dia5_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS5_2 value='$row[dia5_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_3 value='$row[dia5_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS1_3 value='$row[dia5_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE2_3 value='$row[dia5_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS2_3 value='$row[dia5_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE3_3 value='$row[dia5_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS3_3 value='$row[dia5_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE4_3 value='$row[dia5_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS4_3 value='$row[dia5_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE5_3 value='$row[dia5_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS5_3 value='$row[dia5_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_4 value='$row[dia5_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS1_4 value='$row[dia5_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE2_4 value='$row[dia5_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS2_4 value='$row[dia5_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE3_4 value='$row[dia5_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS3_4 value='$row[dia5_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE4_4 value='$row[dia5_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS4_4 value='$row[dia5_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE5_4 value='$row[dia5_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS5_4 value='$row[dia5_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_5 value='$row[dia5_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS1_5 value='$row[dia5_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE2_5 value='$row[dia5_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS2_5 value='$row[dia5_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE3_5 value='$row[dia5_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS3_5 value='$row[dia5_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE4_5 value='$row[dia5_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS4_5 value='$row[dia5_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HE5_5 value='$row[dia5_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia5_HS5_5 value='$row[dia5_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		</div>
		<div style='position:absolute; width:100vw; left:0; top:7109px'><hr></div>

		<!-- *****************************************			 DÍA 6			 ***************************************** -->
		<div style='position:absolute; width:100vw; left:0; top:7119px'>
		<table id=dia6 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style='text-align:center; font-size:48px' class=A><b>DÍA 6</b></td>
				<td class=A style=text-align:left><input name=dia6_fecha value='$row[dia6_fecha]' type=date min='$row[dia6_fecha]' max='$row[dia6_fecha]'></td>
				<td style='text-align:center; font-size:36px'><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia6_equipo value='$row[dia6_equipo]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia6_marca value='$row[dia6_marca]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia6_fecha_calib value='$row[dia6_fecha_calib]' type=date></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia6_propietario value='$row[dia6_propietario]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:97% name=dia6_bumptest_por value='$row[dia6_bumptest_por]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr height=5px><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td><td style=width:1.34%></td><td style=width:24.00%></td><td style=width:1.33%></td><td style=width:24.00%></td></tr>
			<tr>
				<td style=text-align:center class=A>% LEL</td><td></td>
				<td style=text-align:center class=A>O&#8322;</td><td></td>
				<td style=text-align:center class=A>H&#8322;S</td><td></td>
				<td style=text-align:center class=A>CO</td>
			</tr>
			<tr>
				<td class=A><input name=dia6_LEL	value='$row[dia6_LEL]' style='width:90%; text-align:center' type=text inputmode=numeric maxlength=5 pattern=^(([0-9])?([0-9])?(.\d)?(\d)?)$></td><td></td>
				<td class=A><input name=dia6_O		value='$row[dia6_O]'	 style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia6_H2S	value='$row[dia6_H2S]' style='width:90%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia6_CO		value='$row[dia6_CO]'  style='width:86%; text-align:center' type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia6_pasa_bumptest value=SI "; if ($row['dia6_pasa_bumptest'] == 'SI') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia6_pasa_bumptest value=NO "; if ($row['dia6_pasa_bumptest'] == 'NO') {echo 'checked';} echo " onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style='position:absolute; width:39%; left:0.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59.50%; left:39.50%; top:453px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:190px class=A1>Hora<br>1</td><td style=width:190px class=A1>Resultado<br>1</td>
					<td style=width:190px class=A1>Hora<br>2</td><td style=width:190px class=A1>Resultado<br>2</td>
					<td style=width:190px class=A1>Hora<br>3</td><td style=width:190px class=A1>Resultado<br>3</td>
					<td style=width:190px class=A1>Hora<br>4</td><td style=width:190px class=A1>Resultado<br>4</td>
					<td style=width:190px class=A1>Hora<br>5</td><td style=width:190px class=A1>Resultado<br>5</td>
					<td style=width:190px class=A1>Hora<br>6</td><td style=width:190px class=A1>Resultado<br>6</td>
					<td style=width:190px class=A1>Hora<br>7</td><td style=width:190px class=A1>Resultado<br>7</td>
					<td style=width:190px class=A1>Hora<br>8</td><td style=width:190px class=A1>Resultado<br>8</td>
					<td style=width:190px class=A1>Hora<br>9</td><td style=width:190px class=A1>Resultado<br>9</td>
					<td style=width:190px class=A1>Hora<br>10</td><td style=width:190px class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_1  value='$row[dia6_H1_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R1_1  value='$row[dia6_R1_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_1  value='$row[dia6_H2_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R2_1  value='$row[dia6_R2_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_1  value='$row[dia6_H3_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R3_1  value='$row[dia6_R3_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_1  value='$row[dia6_H4_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R4_1  value='$row[dia6_R4_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_1  value='$row[dia6_H5_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R5_1  value='$row[dia6_R5_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_1  value='$row[dia6_H6_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R6_1  value='$row[dia6_R6_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_1  value='$row[dia6_H7_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R7_1  value='$row[dia6_R7_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_1  value='$row[dia6_H8_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R8_1  value='$row[dia6_R8_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_1  value='$row[dia6_H9_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R9_1  value='$row[dia6_R9_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_1 value='$row[dia6_H10_1]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R10_1 value='$row[dia6_R10_1]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_2  value='$row[dia6_H1_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R1_2  value='$row[dia6_R1_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_2  value='$row[dia6_H2_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R2_2  value='$row[dia6_R2_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_2  value='$row[dia6_H3_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R3_2  value='$row[dia6_R3_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_2  value='$row[dia6_H4_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R4_2  value='$row[dia6_R4_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_2  value='$row[dia6_H5_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R5_2  value='$row[dia6_R5_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_2  value='$row[dia6_H6_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R6_2  value='$row[dia6_R6_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_2  value='$row[dia6_H7_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R7_2  value='$row[dia6_R7_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_2  value='$row[dia6_H8_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R8_2  value='$row[dia6_R8_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_2  value='$row[dia6_H9_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R9_2  value='$row[dia6_R9_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_2 value='$row[dia6_H10_2]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R10_2 value='$row[dia6_R10_2]' id=numero maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_3  value='$row[dia6_H1_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R1_3  value='$row[dia6_R1_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_3  value='$row[dia6_H2_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R2_3  value='$row[dia6_R2_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_3  value='$row[dia6_H3_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R3_3  value='$row[dia6_R3_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_3  value='$row[dia6_H4_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R4_3  value='$row[dia6_R4_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_3  value='$row[dia6_H5_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R5_3  value='$row[dia6_R5_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_3  value='$row[dia6_H6_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R6_3  value='$row[dia6_R6_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_3  value='$row[dia6_H7_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R7_3  value='$row[dia6_R7_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_3  value='$row[dia6_H8_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R8_3  value='$row[dia6_R8_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_3  value='$row[dia6_H9_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R9_3  value='$row[dia6_R9_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_3 value='$row[dia6_H10_3]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R10_3 value='$row[dia6_R10_3]' id=numero maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_4  value='$row[dia6_H1_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R1_4  value='$row[dia6_R1_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_4  value='$row[dia6_H2_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R2_4  value='$row[dia6_R2_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_4  value='$row[dia6_H3_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R3_4  value='$row[dia6_R3_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_4  value='$row[dia6_H4_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R4_4  value='$row[dia6_R4_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_4  value='$row[dia6_H5_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R5_4  value='$row[dia6_R5_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_4  value='$row[dia6_H6_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R6_4  value='$row[dia6_R6_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_4  value='$row[dia6_H7_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R7_4  value='$row[dia6_R7_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_4  value='$row[dia6_H8_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R8_4  value='$row[dia6_R8_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_4  value='$row[dia6_H9_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R9_4  value='$row[dia6_R9_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_4 value='$row[dia6_H10_4]' type=time id=timeB22></td>
					<td class=A><input name=dia6_R10_4 value='$row[dia6_R10_4]' id=numero maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; left:10px; top:855px'>
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style='font-size:32px; text-align:left'>CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style='position:absolute; width:59%; left:0.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia6_nombre1 value='$row[dia6_nombre1]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia6_nombre2 value='$row[dia6_nombre2]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia6_nombre3 value='$row[dia6_nombre3]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia6_nombre4 value='$row[dia6_nombre4]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:98% name=dia6_nombre5 value='$row[dia6_nombre5]' maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style='position:absolute; width:39.50%; left:59.50%; top:913px; background-color:white; overflow:scroll'>
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:190px class=A1>Hora<br>Entrada<br>1</td><td style=width:190px class=A1>Hora<br>Salida<br>1</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>2</td><td style=width:190px class=A1>Hora<br>Salida<br>2</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>3</td><td style=width:190px class=A1>Hora<br>Salida<br>3</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>4</td><td style=width:190px class=A1>Hora<br>Salida<br>4</td>
					<td style=width:190px class=A1>Hora<br>Entrada<br>5</td><td style=width:190px class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_1 value='$row[dia6_HE1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS1_1 value='$row[dia6_HS1_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE2_1 value='$row[dia6_HE2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS2_1 value='$row[dia6_HS2_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE3_1 value='$row[dia6_HE3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS3_1 value='$row[dia6_HS3_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE4_1 value='$row[dia6_HE4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS4_1 value='$row[dia6_HS4_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE5_1 value='$row[dia6_HE5_1]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS5_1 value='$row[dia6_HS5_1]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_2 value='$row[dia6_HE1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS1_2 value='$row[dia6_HS1_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE2_2 value='$row[dia6_HE2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS2_2 value='$row[dia6_HS2_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE3_2 value='$row[dia6_HE3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS3_2 value='$row[dia6_HS3_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE4_2 value='$row[dia6_HE4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS4_2 value='$row[dia6_HS4_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE5_2 value='$row[dia6_HE5_2]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS5_2 value='$row[dia6_HS5_2]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_3 value='$row[dia6_HE1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS1_3 value='$row[dia6_HS1_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE2_3 value='$row[dia6_HE2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS2_3 value='$row[dia6_HS2_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE3_3 value='$row[dia6_HE3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS3_3 value='$row[dia6_HS3_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE4_3 value='$row[dia6_HE4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS4_3 value='$row[dia6_HS4_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE5_3 value='$row[dia6_HE5_3]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS5_3 value='$row[dia6_HS5_3]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_4 value='$row[dia6_HE1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS1_4 value='$row[dia6_HS1_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE2_4 value='$row[dia6_HE2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS2_4 value='$row[dia6_HS2_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE3_4 value='$row[dia6_HE3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS3_4 value='$row[dia6_HS3_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE4_4 value='$row[dia6_HE4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS4_4 value='$row[dia6_HS4_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE5_4 value='$row[dia6_HE5_4]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS5_4 value='$row[dia6_HS5_4]' type=time></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_5 value='$row[dia6_HE1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS1_5 value='$row[dia6_HS1_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE2_5 value='$row[dia6_HE2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS2_5 value='$row[dia6_HS2_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE3_5 value='$row[dia6_HE3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS3_5 value='$row[dia6_HS3_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE4_5 value='$row[dia6_HE4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS4_5 value='$row[dia6_HS4_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HE5_5 value='$row[dia6_HE5_5]' type=time></td>
					<td class=A><input id=timeB22 name=dia6_HS5_5 value='$row[dia6_HS5_5]' type=time></td>
				</tr>
			</table>
		</div>
		<div style='position:absolute; width:100vw; top:1332px'><hr></div>

		<div style='position:absolute; width:100vw; top:1332px; background-color:white'>
		<table>
			<tr><td><hr></td></tr>
			<tr><td style='font-size:36px; font-family:Arlrdbd; color:rgba(0,0,191,1)'>RESPONSABLE DEL FORMATO<br>$row[usuario]@primax.com.co</td></tr>
			<tr><td><input name=usuario value=$row[usuario] style='display:none'></td></tr>
			<tr><td><hr></td></tr>
		</table>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style='font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)'>Fecha edición: "; echo $fechahoy; echo "</span>
		<input style='display:none; width:3.10cm' type=text id=fecha name=fecha value=$row[fecha] readonly><br>
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
