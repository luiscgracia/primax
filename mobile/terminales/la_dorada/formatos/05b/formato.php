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
	
	#dia1			{background-color:rgba(255,112,  0,0.15)}
	#dia2			{background-color:rgba(255,255,255,1.00)}
	#dia3			{background-color:rgba(255,112,  0,0.15)}
	#dia4			{background-color:rgba(255,255,255,1.00)}
	#dia5			{background-color:rgba(255,112,  0,0.15)}
	#dia6			{background-color:rgba(255,255,255,1.00)}
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
	<div class=fijar style="top:60px; left:15px">
		<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
		le escribo de PRIMAX <?=strtoupper($terminal)?>, estoy diligenciando el formato <?=$$formulario?>.' target=_blank>
		<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
	</div>
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
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100%; height:9000px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado type=texto value=<?=$estado_formulario1?> readonly>
					<span style="font-size:36px; width:60%; display:inline-block; background-color:none"><b><?=$$formulario?></b></span>
				</td>
				<td>
					<input name=consecutivo class=consecutivo style="color:red; background-color:rgba(255,255,255,1); border:0" type=texto
						value='<? if ($consec <= 9) {echo '&#8470; 00000';}
												else {if ($consec <= 99) {echo '&#8470; 0000';}
													else {if ($consec <= 999) {echo '&#8470; 000';}
														else {if ($consec <= 9999) {echo '&#8470; 00';}
															else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec?>' readonly>
				</td>
			</tr>
			<tr>
				<td colspan=3>
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal)?></b></span>
				</td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección A			 ***************************************** -->
		<table border=0>
			<tr><td width=43%></td><td width=5%></td><td width=4%></td><td width=5%></td><td width=43%></td></tr>
			<tr class=C><td colspan=5># PERMISO DE TRABAJO EN ESPACIO CONFINADO&nbsp;<input name=pTEC style=width:13% type=text inputmode=numeric maxlength=6 pattern=^(?:[0-9]{4,6})$ required></td></tr>
			<tr class=C style="height:80px">
				<td class=B style=text-align:right>TRABAJO EN CALIENTE</td><td><input type=radio name=tipo_trabajo id=tipo_trabajoC value=C onclick=gestionarClickRadio(this) required></td><td></td>
				<td><input type=radio name=tipo_trabajo id=tipo_trabajoF value=F onclick=gestionarClickRadio(this)></td><td class=B>TRABAJO EN FRÍO</td>
			</tr>
			<tr style=height:30px><td colspan=5 class=BB><b>LA MEDICIÓN DEBE SER CONTINUA.</b></td></tr>
			<tr style=height:30px><td colspan=5 class=BB><b>PARA TRABAJO EN CALIENTE; SI EL %LEL SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE.</b></td></tr>
		</table>
		<div style="position:absolute; width:100vw; top:350px"><hr></div>

		<!-- *****************************************			 DÍA 1			 ***************************************** -->
		<? $num = '1'; $d = 'dia'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:360px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 1</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechaactual;?> min=<?=$fechamin;?> max=<?=$fechamax;?> required></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?> required></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##' required></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###' required></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###' required></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###' required></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this) required></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr height=15><td colspan=4></td></tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'required';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'required';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'required';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:1690px"><hr></div>

		<!-- *****************************************			 DÍA 2			 ***************************************** -->
		<? $num = '2'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:1700px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 2</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechacero;?> min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?>></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##'></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr height=15><td colspan=4></td></tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:3030px"><hr></div>
	
		<!-- *****************************************			 DÍA 3			 ***************************************** -->
		<? $num = '3'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:3040px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 3</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechacero;?> min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?>></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##'></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr height=15><td colspan=4></td></tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:4370px"><hr></div>

		<!-- *****************************************			 DÍA 4			 ***************************************** -->
		<? $num = '4'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:4380px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 4</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechacero;?> min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?>></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##'></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr height=15><td colspan=4></td></tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; left:0; top:5710px"><hr></div>

		<!-- *****************************************			 DÍA 5			 ***************************************** -->
		<? $num = '5'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:5720px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 5</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechacero;?> min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?>></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##'></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
				<tr height=15><td colspan=4></td></tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; left:0; top:7050px"><hr></div>

		<!-- *****************************************			 DÍA 6			 ***************************************** -->
		<? $num = '6'; $dia = $d.$num;?>
		<div style="position:absolute; width:100vw; left:0; top:7060px">
		<div id='<?=$dia?>'>
			<table border=0>
				<tr><td width=14%></td><td width=22%></td><td width=64%></td></tr>
				<tr>
					<td style="text-align:center; font-size:48px" class=A><b>DÍA 6</b></td>
					<td><input name=<?=$dia?>_fecha type=date value=<?=$fechacero;?> min=<?=$fechamin;?> max=<?=$fechamax;?>></td>
					<td style=font-size:36px>PRUEBA DE GASES</td>
				</tr>
			</table>
			<table border=0>
				<tr><td style=width:41%></td><td style=width:1%></td><td style=width:58%></td></tr>
				<tr>
					<td style=text-align:right>EQUIPO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_equipo value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>MARCA</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_marca value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>FECHA CALIBRACIÓN</td><td></td>
					<td style=text-align:left><input style=width:40% name=<?=$dia?>_fecha_calib type=date value=<?=$fechacero;?>></td>
				</tr>
				<tr>
					<td style=text-align:right>PROPIETARIO</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_propietario value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr>
					<td style=text-align:right>BUMP TEST REALIZADO POR</td><td></td>
					<td style=text-align:left><input style=width:100% name=<?=$dia?>_bumptest_por value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
			<table border=0>
				<tr height=5px><td width=24.00%></td><td width= 1.33%></td><td width=24.00%></td><td width=1.34%></td><td width=24.00%></td><td width=1.33%></td><td width=24.00%></td></tr>
				<tr>
					<td>% LEL</td><td></td>
					<td>O&#8322;</td><td></td>
					<td>H&#8322;S</td><td></td>
					<td>CO</td>
				</tr>
				<tr>
					<td><input name='<?=$dia?>_LEL'	value="" style=width:100% type=text inputmode=numeric maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ placeholder='##.##'></td><td></td>
					<td><input name='<?=$dia?>_O'		value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_H2S'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td><td></td>
					<td><input name='<?=$dia?>_CO'	value="" style=width:100% type=text inputmode=numeric maxlength=3 pattern=^(?:[0-9]{1,3})$ placeholder='###'></td>
				</tr>
				<tr height=10><td colspan=7></td></tr>
			</table>
			<table border=0>
				<tr><td width=12%></td><td width=58%></td><td width=12%></td><td width=18%></td></tr>
				<tr class=C style=height:60px>
					<td></td>
					<td class=B>EL EQUIPO PASA BUMP TEST?&nbsp;</td>
					<td class=B>SI&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestS value=SI onclick=gestionarClickRadio(this)></td>
					<td class=B>NO&nbsp;<input type=radio name=<?=$dia?>_pasa_bumptest id=<?=$dia?>_pasa_bumptestN value=NO onclick=gestionarClickRadio(this)></td>
				</tr>
			</table>
			<div style="position:absolute; width:39%; left:0%; top:430px; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:80px><td style=width:200px class=A1>PRUEBA</td><td style=width:160px class=A1>Perm</td></tr>
					<tr style=height:80px><td class=A1>% LEL</td>										<td class=A1>0%</td></tr>
					<tr style=height:80px><td class=A1>OXÍGENO</td>									<td class=A1>19.5-23.5%</td></tr>
					<tr style=height:80px><td class=A1>H&#8322;S</td>								<td class=A1>5 ppm</td></tr>
					<tr style=height:80px><td class=A1>MONÓXIDO DE CARBONO</td>			<td class=A1>25 ppm</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:61%; left:39%; top:430px; overflow:scroll">
				<table border=1px id='<?=$dia?>'>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td style=width:185 class=A1>Hora<br><?=$i?></td><td style=width:185 class=A1>Resultado<br><?=$i?></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_1 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_1 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_2 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_2 value='' id=numero	maxlength=4 placeholder='##.#' pattern=^([0-9]{1,2}(\.[0-9]{1,1})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_3 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_3 value='' id=numero	maxlength=4 placeholder='#.##' pattern=^([0-9]{1}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<tr style=height:80px>
						<? for ($i = 1; $i <= 10; $i++): ?>
						<td><input name=<?=$dia?>_H<?=$i?>_4 value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_R<?=$i?>_4 value='' id=numero	maxlength=5 placeholder='##.##' pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
				</table>
			</div>
			<div style="position:absolute; width:100vw; left:0px; top:835px">
				<table border=0 id='<?=$dia?>'>
					<tr><td style="font-size:30px; text-align:left"><br>&nbsp;CONTROL DE PERSONAL PARA INGRESO A ESPACIO CONFINADO</td></tr>
				</table>
			</div>
			<div style="position:absolute; width:59%; left:0%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px><td class=A1>PERSONAL QUE INGRESA</td></tr>
					<? for ($i = 1; $i <= 5; $i++): ?>
					<tr style=height:60px><td class=A1><input style=width:100% name=<?=$dia?>_nombre<?=$i?> value="" maxlength=30 type=text pattern=.{1,} onkeyup=mayuscula(this) <? if ($i == 1) {echo 'requiredo';} else {echo '';} ?>></td></tr>
					<? endfor?>
				</table>
			</div>
			<div style="position:absolute; width:41%; left:59%; top:900px; background-color:white; overflow:scroll">
				<table border=1 id='<?=$dia?>'>
					<tr style=height:110px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td style=width:185 class=A1>Hora<br>Entrada<br><?=$i?></td><td style=width:185 class=A1>Hora<br>Salida<br><?=$i?></td>
						<? endfor?>
					</tr>
					<? for ($j = 1; $j <= 5; $j++): ?>
					<tr style=height:60px>
						<? for ($i = 1; $i <= 5; $i++): ?>
						<td><input name=<?=$dia?>_HE<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<td><input name=<?=$dia?>_HS<?=$i?>_<?=$j?> value='<?=$hora;?>' type=time min=<?=date("H:i");?> <? if ($i == 1 && $j == 1) {echo 'requiredo';} else {echo '';} ?>></td>
						<? endfor?>
					</tr>
					<? endfor?>
				</table>
			</div>
		</div>
		</div>
		<div style="position:absolute; width:100vw; top:8390px"><hr></div>

		<!-- ***************************************************************************************************** -->
		<div style="position:absolute; width:100vw; top:8400px">
			<table>
				<tr height=40><td></td></tr>
				<tr style="background-color:rgba(0,240,0,0); height:15%">
					<td>
						<select name=usuario id=usuario required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?>@primax.com.co</option>
							<? endfor?>
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
		<table border=0>
			<tr height=190>
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
</form>
<!-- /1 --></div>
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
