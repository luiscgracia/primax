<html>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_mobile.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Diligenciar Consecutivo</title>
<style>
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
<!-- 2 --> <div class=fijar style="top:60px; left:15px">
	<a href='https://api.whatsapp.com/send?phone=<? echo $celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <? echo strtoupper($terminal); ?>, estoy diligenciando el formato <? echo $$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 -->	</div>
<div style="position:fixed; bottom:0vh; background-color:rgba(255,112,0,1); z-index:120">
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
<form name=formato id=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:8750px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=value=<? echo $estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:60%; display:inline-block; background-color:none"><b><? echo $$formulario; ?></b></span>
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
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?echo strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr class=C style=height:30px>
				<td class=B style=text-align:center># PERMISO DE TRABAJO EN ESPACIO CONFINADO&nbsp;<input name=pTEC value='' style="width:13%; text-align:center" type=text inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<table border=0>
			<tr><td width=45%></td><td width= 4%></td><td width=40%></td><td width=11%></td></tr>
			<tr class=C style="height:80px; vertical-align:middle">
				<td class=B style=text-align:right>TRABAJO EN CALIENTE&nbsp;</td>
				<td style=text-align:left><input type=radio name=tipo_trabajo id=tipo_trabajoC value=C onclick=gestionarClickRadio(this) required></td>
				<td class=B style=text-align:right>TRABAJO EN FRÍO&nbsp;</td>
				<td style=text-align:left><input type=radio name=tipo_trabajo id=tipo_trabajoF value=F onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<table border=0>
			<tr class=C style=height:30px><td class=BB><b>LA MEDICIÓN DEBE SER CONTINUA.</b></td></tr>
			<tr class=C style=height:30px><td class=BB><b>PARA TRABAJO EN CALIENTE; SI EL %LEL SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 DÍA 1			 ***************************************** -->
		<table id=dia1 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 1</b></td>
				<td class=A style=text-align:left><input name=dia1_fecha type=date value='<?echo $hoy;?>' min=<?echo $fechamin;?> max=<?echo $fechamax;?> required></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia1_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia1_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia1_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia1_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia1_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td><input name=dia1_LEL	value="" style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##' required></td><td></td>
				<td><input name=dia1_O		value="" style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ title='###' required></td><td></td>
				<td><input name=dia1_H2S	value="" style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ title='###' required></td><td></td>
				<td><input name=dia1_CO		value="" style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ title='###' required></td>
			</tr>
			<tr height=10><td colspan=7></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia1_pasa_bumptest id=dia1_pasa_bumptestS value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia1_pasa_bumptest id=dia1_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:765px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:765px; background-color:white; overflow:scroll">
			<table border=1px style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input name=dia1_R1_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R2_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R3_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R4_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R5_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R6_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R7_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R8_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R9_1  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R10_1 id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input name=dia1_R1_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R2_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R3_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R4_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R5_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R6_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R7_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R8_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R9_2  id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R10_2 id=numero	maxlength=4 title='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input name=dia1_R1_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R2_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R3_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R4_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R5_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R6_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R7_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R8_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R9_3  id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R10_3 id=numero	maxlength=4 title='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia1_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input name=dia1_R1_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
					<td class=A><input name=dia1_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R2_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R3_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R4_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R5_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R6_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R7_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R8_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R9_4  id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia1_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia1_R10_4 id=numero	maxlength=5 title='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:1183px">
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=30px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:1225px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia1_nombre1 value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia1_nombre2 value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia1_nombre3 value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia1_nombre4 value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia1_nombre5 value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:1225px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input id=timeB22 name=dia1_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?> required></td>
					<td class=A><input id=timeB22 name=dia1_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia1_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia1_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; top:1645px"><hr></div>

		<!-- *****************************************			 DÍA 2			 ***************************************** -->
		<div style="position:absolute; top:1655px">
		<table id=dia2 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 2</b></td>
				<td class=A style=text-align:left><input name=dia2_fecha type=date value='<?echo $fecha_oculta;?>'></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia2_equipo maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia2_marca maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia2_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia2_propietario maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia2_bumptest_por maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td class=A><input name=dia2_LEL	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##'></td><td></td>
				<td class=A><input name=dia2_O		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia2_H2S	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia2_CO		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia2_pasa_bumptest id=dia2_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia2_pasa_bumptest id=dia2_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1px style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R1_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R2_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R3_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R4_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R5_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R6_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R7_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R8_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R9_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R10_1 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R1_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R2_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R3_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R4_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R5_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R6_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R7_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R8_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R9_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R10_2 id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R1_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R2_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R3_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R4_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R5_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R6_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R7_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R8_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R9_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R10_3 id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia2_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R1_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R2_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R3_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R4_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R5_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R6_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R7_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R8_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R9_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia2_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia2_R10_4 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:815px">
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia2_nombre1 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia2_nombre2 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia2_nombre3 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia2_nombre4 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia2_nombre5 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia2_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia2_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:2948px"><hr></div>

		<!-- *****************************************			 DÍA 3			 ***************************************** -->
		<div style="position:absolute; width:100vw; left:0; top:2958px">
		<table id=dia3 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 3</b></td>
				<td class=A style=text-align:left><input name=dia3_fecha type=date value='<?echo $fecha_oculta;?>'></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia3_equipo maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia3_marca maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia3_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia3_propietario maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia3_bumptest_por maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td class=A><input name=dia3_LEL	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##'></td><td></td>
				<td class=A><input name=dia3_O		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia3_H2S	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia3_CO		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia3_pasa_bumptest id=dia3_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia3_pasa_bumptest id=dia3_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>											<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>										<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>									<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>				<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R1_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R2_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R3_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R4_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R5_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R6_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R7_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R8_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R9_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R10_1 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R1_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R2_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R3_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R4_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R5_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R6_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R7_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R8_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R9_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R10_2 id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R1_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R2_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R3_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R4_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R5_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R6_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R7_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R8_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R9_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R10_3 id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia3_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R1_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R2_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R3_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R4_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R5_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R6_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R7_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R8_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R9_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia3_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia3_R10_4 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:815px">
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=70px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia3_nombre1 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia3_nombre2 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia3_nombre3 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia3_nombre4 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia3_nombre5 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia3_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia3_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:4250px"><hr></div>

		<!-- *****************************************			 DÍA 4			 ***************************************** -->
		<div style="position:absolute; width:100vw; left:0; top:4260px">
		<table id=dia4 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 4</b></td>
				<td class=A style=text-align:left><input name=dia4_fecha type=date value='<?echo $fecha_oculta;?>'></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia4_equipo maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia4_marca maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia4_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia4_propietario maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia4_bumptest_por maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td class=A><input name=dia4_LEL	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##'></td><td></td>
				<td class=A><input name=dia4_O		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia4_H2S	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia4_CO		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia4_pasa_bumptest id=dia4_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia4_pasa_bumptest id=dia4_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R1_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R2_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R3_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R4_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R5_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R6_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R7_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R8_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R9_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R10_1 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R1_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R2_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R3_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R4_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R5_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R6_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R7_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R8_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R9_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R10_2 id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R1_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R2_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R3_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R4_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R5_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R6_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R7_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R8_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R9_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R10_3 id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia4_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R1_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R2_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R3_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R4_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R5_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R6_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R7_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R8_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R9_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia4_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia4_R10_4 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:815px">
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia4_nombre1 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia4_nombre2 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia4_nombre3 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia4_nombre4 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia4_nombre5 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia4_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia4_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		</div>
		<div style="position:absolute; width:100vw; left:0; top:5552px"><hr></div>

		<!-- *****************************************			 DÍA 5			 ***************************************** -->
		<div style="position:absolute; width:100vw; top:5562px">
		<table id=dia5 border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 5</b></td>
				<td class=A style=text-align:left><input name=dia5_fecha type=date value='<?echo $fecha_oculta;?>'></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia5_equipo maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia5_marca maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia5_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia5_propietario maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia5_bumptest_por maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td class=A><input name=dia5_LEL	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##'></td><td></td>
				<td class=A><input name=dia5_O		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia5_H2S	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia5_CO		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(128,128,128,0)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia5_pasa_bumptest id=dia5_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia5_pasa_bumptest id=dia5_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R1_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R2_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R3_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R4_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R5_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R6_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R7_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R8_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R9_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R10_1 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R1_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R2_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R3_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R4_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R5_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R6_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R7_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R8_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R9_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R10_2 id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R1_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R2_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R3_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R4_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R5_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R6_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R7_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R8_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R9_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R10_3 id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia5_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R1_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R2_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R3_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R4_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R5_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R6_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R7_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R8_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R9_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia5_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia5_R10_4 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:815px">
			<table style=background-color:rgba(128,128,128,0)>
				<tr height=70px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia5_nombre1 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia5_nombre2 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia5_nombre3 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia5_nombre4 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia5_nombre5 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(128,128,128,0)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia5_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia5_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		</div>
		<div style="position:absolute; width:100vw; left:0; top:6854px"><hr></div>

		<!-- *****************************************			 DÍA 6			 ***************************************** -->
		<div style="position:absolute; width:100vw; left:0; top:6864px">
		<table id=dia6 border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
			<tr>
				<td style="text-align:center; font-size:48px" class=A><b>DÍA 6</b></td>
				<td class=A style=text-align:left><input name=dia6_fecha type=date value='<?echo $fecha_oculta;?>'></td>
				<td style="text-align:center; font-size:36px"><b>PRUEBA DE GASES</b></td>
			</tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:39%></td><td style=width:1%></td><td style=width:60%></td></tr>
			<tr>
				<td style=text-align:right class=A>EQUIPO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia6_equipo maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>MARCA</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia6_marca maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>FECHA CALIBRACIÓN</td><td></td>
				<td style=text-align:left><input style=width:40% name=dia6_fecha_calib type=date value='<?echo $hoy;?>'></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>PROPIETARIO</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia6_propietario maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
			</tr>
			<tr>
				<td style=text-align:right class=A>BUMP TEST REALIZADO POR</td><td></td>
				<td style=text-align:left><input style=width:100% name=dia6_bumptest_por maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
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
				<td class=A><input name=dia6_LEL	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ title='##.##'></td><td></td>
				<td class=A><input name=dia6_O		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia6_H2S	style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td><td></td>
				<td class=A><input name=dia6_CO		style="width:100%; text-align:center" type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$></td>
			</tr>
			<tr height=10px><td></td></tr>
		</table>
		<table border=0 style=background-color:rgba(255,112,0,0.08)>
			<tr><td style=width:12%></td><td style=width:58%></td><td style=width:12%></td><td style=width:18%></td></tr>
			<tr class=C style=height:60px>
				<td class=B style=text-align:right></td>
				<td class=B style=text-align:left>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
				<td class=B style=text-align:left>SI&nbsp;<input type=radio name=dia6_pasa_bumptest id=dia6_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
				<td class=B style=text-align:left>NO&nbsp;<input type=radio name=dia6_pasa_bumptest id=dia6_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
			</tr>
		</table>
		<div style="position:absolute; width:39%; left:0.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
				<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
				<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19,5-23,5%</td></tr>
				<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
				<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59.75%; left:39.50%; top:413px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:80px>
					<td style=width:185 class=A1>Hora<br>1</td><td style=width:185 class=A1>Resultado<br>1</td>
					<td style=width:185 class=A1>Hora<br>2</td><td style=width:185 class=A1>Resultado<br>2</td>
					<td style=width:185 class=A1>Hora<br>3</td><td style=width:185 class=A1>Resultado<br>3</td>
					<td style=width:185 class=A1>Hora<br>4</td><td style=width:185 class=A1>Resultado<br>4</td>
					<td style=width:185 class=A1>Hora<br>5</td><td style=width:185 class=A1>Resultado<br>5</td>
					<td style=width:185 class=A1>Hora<br>6</td><td style=width:185 class=A1>Resultado<br>6</td>
					<td style=width:185 class=A1>Hora<br>7</td><td style=width:185 class=A1>Resultado<br>7</td>
					<td style=width:185 class=A1>Hora<br>8</td><td style=width:185 class=A1>Resultado<br>8</td>
					<td style=width:185 class=A1>Hora<br>9</td><td style=width:185 class=A1>Resultado<br>9</td>
					<td style=width:185 class=A1>Hora<br>10</td><td style=width:185 class=A1>Resultado<br>10</td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R1_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R2_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R3_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R4_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R5_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R6_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R7_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R8_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_1  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R9_1  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_1 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R10_1 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R1_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R2_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R3_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R4_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R5_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R6_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R7_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R8_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_2  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R9_2  id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_2 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R10_2 id=numero	maxlength=4 pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R1_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R2_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R3_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R4_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R5_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R6_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R7_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R8_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_3  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R9_3  id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_3 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R10_3 id=numero	maxlength=4 pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
				<tr style=height:80px>
					<td class=A><input name=dia6_H1_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R1_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H2_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R2_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H3_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R3_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H4_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R4_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H5_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R5_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H6_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R6_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H7_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R7_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H8_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R8_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H9_4  type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R9_4  id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
					<td class=A><input name=dia6_H10_4 type=time id=timeB22 value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input name=dia6_R10_4 id=numero	maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; left:10px; top:815px">
			<table style=background-color:rgba(255,112,0,0.08)>
				<tr height=70px><td style="font-size:32px; text-align:left">CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
			</table>
		</div>
		<div style="position:absolute; width:59%; left:0.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia6_nombre1 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia6_nombre2 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia6_nombre3 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia6_nombre4 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr style=height:60px><td class=A1><input style=width:100% name=dia6_nombre5 maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
		</div>
		<div style="position:absolute; width:39.75%; left:59.50%; top:873px; background-color:white; overflow:scroll">
			<table border=1 style=background-color:rgba(255,112,0,0.08)>
				<tr style=height:110px>
					<td style=width:185 class=A1>Hora<br>Entrada<br>1</td><td style=width:185 class=A1>Hora<br>Salida<br>1</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>2</td><td style=width:185 class=A1>Hora<br>Salida<br>2</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>3</td><td style=width:185 class=A1>Hora<br>Salida<br>3</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>4</td><td style=width:185 class=A1>Hora<br>Salida<br>4</td>
					<td style=width:185 class=A1>Hora<br>Entrada<br>5</td><td style=width:185 class=A1>Hora<br>Salida<br>5</td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS1_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS2_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS3_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS4_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS5_1 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS1_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS2_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS3_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS4_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS5_2 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS1_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS2_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS3_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS4_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS5_3 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS1_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS2_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS3_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS4_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS5_4 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
				<tr style=height:60px>
					<td class=A><input id=timeB22 name=dia6_HE1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS1_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS2_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS3_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS4_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HE5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
					<td class=A><input id=timeB22 name=dia6_HS5_5 type=time value='<?echo $hora;?>' min=<?echo date("H:i");?>></td>
				</tr>
			</table>
		</div>
		<div style="position:absolute; width:100vw; top:1292px"><hr></div>

		<!-- ***************************************************************************************************** -->
		<div style="position:absolute; width:100vw; top:1320px">
		<table>
			<tr style=background-color:rgba(0,240,0,0)>
				<td style=text-align:center>
					<form method=post>
						<select name=usuario id=usuario type=text required>
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
		</table>
		<br>
		<hr>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?echo $fechaactual;?> / <?echo $horaactual;?></span>
		<input style="display:none; width:3.10cm" id="fecha" name="fecha" value="<?echo $fechaactual;?> / <?echo $horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?echo number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=190>
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
</form>
<!-- /1 --></div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
