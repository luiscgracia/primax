<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<link rel="SHORTCUT ICON" href="../../../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" type="text/css" href="../../../../../commom/css/noimprimir.css" media="print">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/fuentes.css">
<link rel="stylesheet" type="text/css" href="../../../../../common/css/estilo_formatos.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Completar / Modificar informacion</title>
<style>
</style>
<script type='text/javascript'>
	function mayuscula(e) {e.value = e.value.toUpperCase();}
	function closed() {window.open('','_parent',''); window.close();}
	function cerrarVentana() {window.close();}
</script>
</head>
<?php
	$formato = basename(dirname(__FILE__));
	$formulario = "formulario".$formato;
//	$fechaactual = date("Y-m-d");
//	$horaactual = date("g:i A");
//	date_default_timezone_set("America/Bogota");
//	$fechahoy = date("Y-m-d / g:i A");
//	$fechamin = date("Y-m-d", strtotime("-1 days", strtotime(date("Y-m-d"))));
//	$fechamax = date("Y-m-d", strtotime("-0 days", strtotime(date("Y-m-d"))));
	include ("../../../../../common/checkbox_num_text.php");
?>
<body>
<!-- ***************************************			 INICIO DEL FORMULARIO			 *************************************** -->
<div class="zoom">
<div class="noimprimir">
<? echo "
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** (816px = 215,9 mm)(1056px = 279,4 mm) -->
<div style='position:absolute; left:50%; margin-left:-408px; top:0px; width:816px; height:2112px; background-color: rgba(255,255,255,0.95); overflow:hidden; border:0px solid rgba(0,0,0,0.25)'>
	<div style='position:absolute; left:0px; top:	 0px'><img src='../../../../../common/formatos_SVG/01/01_tiro.svg'	 width=816px height=auto></div>
	<div style='position:absolute; left:0px; top:1056px'><img src='../../../../../common/formatos_SVG/01/01_retiro.svg' width=816px height=auto></div>

	<!-- *****************************************			 encabezado formato			 ***************************************** -->
	<div style='position:absolute; left:18.00cm; top:0.90cm'>
		<span style='font-family:SCHLBKB; font-size:16px; color:red'>";
		if ($row['consecutivo'] < 9) {echo '&#8470; 00000';}
			else if ($row['consecutivo'] < 99) {echo '&#8470; 0000';}
				else if ($row['consecutivo'] < 999) {echo '&#8470; 000';}
					else if ($row['consecutivo'] < 9999) {echo '&#8470; 00';}
						else if ($row['consecutivo'] < 99999) {echo '&#8470; 0';}
							else {echo '&#8470; ';} echo "
		</span>
	</div>
	<div style='position:absolute; left:17.80cm; top:0.975cm'>
		<input style='width:22mm; text-align:right; font-family:SCHLBKB; font-size:16px; color:red; background-color:rgba(0,0,0,0); border:0' id='consecutivo' name='consecutivo' type='text'
		value='$row[consecutivo]' readonly>
	</div>
	<div style='position:absolute; left:17.95cm; top: 0.74cm'><input style='width:20mm; background-color:rgba(0,0,0,0); color:rgba(0,0,0,1); font-size:7px; border:0' name='estado' type='text' value='EDITADO' readonly></div>
	<div style='position:absolute; left:18.00cm; top: 1.35cm; color:rgba(0,0,0,1); font-family:Arlrdlt; font-size:7px'>"; echo strtoupper($terminal); echo "</div>
	<div style='position:absolute; left:18.00cm; top: 1.50cm; color:rgba(0,0,0,1); font-family:Arlrdlt; font-size:7px'>$row[usuario]@primax.com.co</div>
	<div><input name=usuario value='$row[usuario]' style='display:none'></div>

	<div style='position:absolute; left: 3.45cm; top: 2.25cm'><input style='width:12.20cm' name='instalacion' maxlength='68' type='text' value='$row[instalacion]' pattern='.{1,}' onkeyup='mayuscula(this)' autofocus required></div>
	<div style='position:absolute; left:19.00cm; top: 2.25cm'><input style='width: 1.00cm; text-align:center' name='certificado' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.' value='$row[certificado]' required></div>

	<!-- *****************************************			 sección A			 ***************************************** -->
	<div style='position:absolute; left: 3.25cm; top: 3.05cm'>
		<input style='width:12.20cm' name='ubicacion' maxlength='63' type='text' value='$row[ubicacion]' pattern='.{1,}' onkeyup='mayuscula(this)' required>
	</div>
	<div style='position:absolute; left:19.00cm; top: 3.05cm'>
		<input style='width: 1.00cm; text-align:center' name='apt' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.' value='$row[apt]' required>
	</div>
	<div style='position:absolute; left: 3.60cm; top: 3.35cm'>
		<input style='width: 2.20cm; text-align:center' name='equipo' maxlength='10' type='text' pattern='^(?:[0-9]{4,10})$'title='Debe ingresar mínimo 10 números.' value='$row[equipo]' required>
	</div>
	<div style='position:absolute; left: 9.00cm; top: 3.35cm'>
		<input type='date' name='fechaA' min='"; echo $fechamin; echo "' max='"; echo $fechamax; echo "' value='$row[fechaA]'
		title='Solo se aceptan fechas del año "; echo date('Y'); echo " (dd-mm-aaaa)' required>
	</div>
	<div style='position:absolute; left:14.00cm; top: 3.35cm'><input name='horainicioA'	type='time' value='$row[horainicioA]' required></div>
	<div style='position:absolute; left:18.40cm; top: 3.35cm'><input name='horafinalA'	type='time' value='$row[horafinalA]'	required></div>
	<div style='position:absolute; left: 5.50cm; top: 3.70cm'><input name='descripcion' type='text' maxlength='74' style='width:12.20cm' value='$row[descripcion]' pattern='.{1,}' onkeyup='mayuscula(this)' required></div>

	<!-- *****************************************			 sección B			 ***************************************** -->
	<div style='position:absolute; left:12.33cm; top: 4.61cm'>
		<input type='radio' id='cambioA' name='cambio' value='CME' "; if ($row['cambio'] == 'CME') {echo 'checked';} echo " required>
	</div>
	<div style='position:absolute; left:12.33cm; top: 4.93cm'>
		<input type='radio' id='cambioB' name='cambio' value='CDE' "; if ($row['cambio'] == 'CDE') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:17.05cm; top: 4.95cm'>
		<input style='width: 1.00cm; text-align:center; "; if ($row['pedidocambio'] == '') {echo 'display:none';} echo "' id='pedidocambio' name='pedidocambio' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$'
		title='Debe ingresar mínimo 4 números.' value='$row[pedidocambio]'>
		<script>
			var pedidocambio = document.getElementById('pedidocambio');
			document.getElementById('cambioA').addEventListener('click', function(e) {pedidocambio.disabled = true; pedidocambio.style.display = 'none';});
			document.getElementById('cambioB').addEventListener('click', function(e) {pedidocambio.disabled = false; pedidocambio.style.display = 'block'; pedidocambio.required = true;});
		</script>
	</div>

	<!-- *****************************************			 sección C			 ***************************************** -->
	<div style='position:absolute; left: 9.62cm; top: 6.08cm'><input type='radio' id= 'C1' name= 'C1' value='SI' "; if ($row['C1'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 6.08cm'><input type='radio' id= 'c1' name= 'C1' value='NO' "; if ($row['C1'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 6.38cm'><input type='radio' id= 'C2' name= 'C2' value='SI' "; if ($row['C2'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 6.38cm'><input type='radio' id= 'c2' name= 'C2' value='NO' "; if ($row['C2'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 6.68cm'><input type='radio' id= 'C3' name= 'C3' value='SI' "; if ($row['C3'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 6.68cm'><input type='radio' id= 'c3' name= 'C3' value='NO' "; if ($row['C3'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 6.98cm'><input type='radio' id= 'C4' name= 'C4' value='SI' "; if ($row['C4'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 6.98cm'><input type='radio' id= 'c4' name= 'C4' value='NO' "; if ($row['C4'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 7.28cm'><input type='radio' id= 'C5' name= 'C5' value='SI' "; if ($row['C5'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 7.28cm'><input type='radio' id= 'c5' name= 'C5' value='NO' "; if ($row['C5'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 7.58cm'><input type='radio' id= 'C6' name= 'C6' value='SI' "; if ($row['C6'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 7.58cm'><input type='radio' id= 'c6' name= 'C6' value='NO' "; if ($row['C6'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 7.88cm'><input type='radio' id= 'C7' name= 'C7' value='SI' "; if ($row['C7'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 7.88cm'><input type='radio' id= 'c7' name= 'C7' value='NO' "; if ($row['C7'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 8.18cm'><input type='radio' id= 'C8' name= 'C8' value='SI' "; if ($row['C8'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 8.18cm'><input type='radio' id= 'c8' name= 'C8' value='NO' "; if ($row['C8'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 8.48cm'><input type='radio' id= 'C9' name= 'C9' value='SI' "; if ($row['C9'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 8.48cm'><input type='radio' id= 'c9' name= 'C9' value='NO' "; if ($row['C9'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 8.78cm'><input type='radio' id='C10' name='C10' value='SI' "; if ($row['C10'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 8.78cm'><input type='radio' id='c10' name='C10' value='NO' "; if ($row['C10'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 9.08cm'><input type='radio' id='C11' name='C11' value='SI' "; if ($row['C11'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 9.08cm'><input type='radio' id='c11' name='C11' value='NO' "; if ($row['C11'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 9.38cm'><input type='radio' id='C12' name='C12' value='SI' "; if ($row['C12'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 9.38cm'><input type='radio' id='c12' name='C12' value='NO' "; if ($row['C12'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 9.68cm'><input type='radio' id='C13' name='C13' value='SI' "; if ($row['C13'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 9.68cm'><input type='radio' id='c13' name='C13' value='NO' "; if ($row['C13'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top: 9.98cm'><input type='radio' id='C14' name='C14' value='SI' "; if ($row['C14'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top: 9.98cm'><input type='radio' id='c14' name='C14' value='NO' "; if ($row['C14'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top:10.28cm'><input type='radio' id='C15' name='C15' value='SI' "; if ($row['C15'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top:10.28cm'><input type='radio' id='c15' name='C15' value='NO' "; if ($row['C15'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top:10.58cm'><input type='radio' id='C16' name='C16' value='SI' "; if ($row['C16'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top:10.58cm'><input type='radio' id='c16' name='C16' value='NO' "; if ($row['C16'] == 'NO') {echo 'checked';} echo "></div>

	<div style='position:absolute; left: 9.62cm; top:11.18cm'><input type='radio' id='C17' name='C17' value='SI' "; if ($row['C17'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top:11.18cm'><input type='radio' id='c17' name='C17' value='NO' "; if ($row['C17'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top:11.48cm'><input type='radio' id='C18' name='C18' value='SI' "; if ($row['C18'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top:11.48cm'><input type='radio' id='c18' name='C18' value='NO' "; if ($row['C18'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left: 9.62cm; top:11.78cm'><input type='radio' id='C19' name='C19' value='SI' "; if ($row['C19'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:10.22cm; top:11.78cm'><input type='radio' id='c19' name='C19' value='NO' "; if ($row['C19'] == 'NO') {echo 'checked';} echo "></div>


	<div style='position:absolute; left:18.92cm; top: 6.38cm'><input type='radio' id='C20' name='C20' value='SI' "; if ($row['C20'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 6.38cm'><input type='radio' id='c20' name='C20' value='NO' "; if ($row['C20'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 6.68cm'><input type='radio' id='C21' name='C21' value='SI' "; if ($row['C21'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 6.68cm'><input type='radio' id='c21' name='C21' value='NO' "; if ($row['C21'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 6.98cm'><input type='radio' id='C22' name='C22' value='SI' "; if ($row['C22'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 6.98cm'><input type='radio' id='c22' name='C22' value='NO' "; if ($row['C22'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 7.58cm'><input type='radio' id='C23' name='C23' value='SI' "; if ($row['C23'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 7.58cm'><input type='radio' id='c23' name='C23' value='NO' "; if ($row['C23'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 7.88cm'><input type='radio' id='C24' name='C24' value='SI' "; if ($row['C24'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 7.88cm'><input type='radio' id='c24' name='C24' value='NO' "; if ($row['C24'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 8.18cm'><input type='radio' id='C25' name='C25' value='SI' "; if ($row['C25'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 8.18cm'><input type='radio' id='c25' name='C25' value='NO' "; if ($row['C25'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 8.48cm'><input type='radio' id='C26' name='C26' value='SI' "; if ($row['C26'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 8.48cm'><input type='radio' id='c26' name='C26' value='NO' "; if ($row['C26'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 8.78cm'><input type='radio' id='C27' name='C27' value='SI' "; if ($row['C27'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 8.78cm'><input type='radio' id='c27' name='C27' value='NO' "; if ($row['C27'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 9.08cm'><input type='radio' id='C28' name='C28' value='SI' "; if ($row['C28'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 9.08cm'><input type='radio' id='c28' name='C28' value='NO' "; if ($row['C28'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 9.68cm'><input type='radio' id='C29' name='C29' value='SI' "; if ($row['C29'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 9.68cm'><input type='radio' id='c29' name='C29' value='NO' "; if ($row['C29'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top: 9.98cm'><input type='radio' id='C30' name='C30' value='SI' "; if ($row['C30'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top: 9.98cm'><input type='radio' id='c30' name='C30' value='NO' "; if ($row['C30'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:10.28cm'><input type='radio' id='C31' name='C31' value='SI' "; if ($row['C31'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:10.28cm'><input type='radio' id='c31' name='C31' value='NO' "; if ($row['C31'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:10.58cm'><input type='radio' id='C32' name='C32' value='SI' "; if ($row['C32'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:10.58cm'><input type='radio' id='c32' name='C32' value='NO' "; if ($row['C32'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:10.88cm'><input type='radio' id='C33' name='C33' value='SI' "; if ($row['C33'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:10.88cm'><input type='radio' id='c33' name='C33' value='NO' "; if ($row['C33'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:11.18cm'><input type='radio' id='C34' name='C34' value='SI' "; if ($row['C34'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:11.18cm'><input type='radio' id='c34' name='C34' value='NO' "; if ($row['C34'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:11.48cm'><input type='radio' id='C35' name='C35' value='SI' "; if ($row['C35'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:11.48cm'><input type='radio' id='c35' name='C35' value='NO' "; if ($row['C35'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:18.92cm; top:12.08cm'><input type='radio' id='C36' name='C36' value='SI' "; if ($row['C36'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left:19.52cm; top:12.08cm'><input type='radio' id='c36' name='C36' value='NO' "; if ($row['C36'] == 'NO') {echo 'checked';} echo "></div>

	<div style='position:absolute; left: 7.70cm; top:12.50cm'><input style='width:12.20cm' id='otrasactividades' name='otrasactividades' maxlength='60' type='text' value='$row[otrasactividades]' onkeyup='mayuscula(this)' pattern='.{1,}'></div>

	<!-- *****************************************			 sección D			 ***************************************** -->
	<div style='position:absolute; left: 8.60cm; top:13.82cm'>
		<input name='D1' type='checkbox' id='D1' onChange='comprobarD1(this)' "; if ($row['D1'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:13.88cm'>
		<input style='width:0.9cm; "; if ($row['D1'] != 'on') {echo 'display:none';} echo "' id='numeroD1' name='numeroD1' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D1'] = 'on') {echo $row['numeroD1'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left: 8.60cm; top:14.12cm'>
		<input name='D2' type='checkbox' id='D2' onChange='comprobarD2(this)' "; if ($row['D2'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:14.18cm'>
		<input style='width:0.9cm; "; if ($row['D2'] != 'on') {echo 'display:none';} echo "' id='numeroD2' name='numeroD2' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D2'] = 'on') {echo $row['numeroD2'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left: 8.60cm; top:14.42cm'>
		<input name='D3' type='checkbox' id='D3' onChange='comprobarD3(this)' "; if ($row['D3'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:14.48cm'>
		<input style='width:0.9cm; "; if ($row['D3'] != 'on') {echo 'display:none';} echo "' id='numeroD3' name='numeroD3' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D3'] = 'on') {echo $row['numeroD3'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left: 8.60cm; top:14.72cm'>
		<input name='D4' type='checkbox' id='D4' onChange='comprobarD4(this)' "; if ($row['D4'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:14.78cm'>
		<input style='width:0.9cm; "; if ($row['D4'] != 'on') {echo 'display:none';} echo "' id='numeroD4' name='numeroD4' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D4'] = 'on') {echo $row['numeroD4'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left: 8.60cm; top:15.02cm'>
		<input name='D5' type='checkbox' id='D5' onChange='comprobarD5(this)' "; if ($row['D5'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:15.08cm'>
		<input style='width:0.9cm; "; if ($row['D5'] != 'on') {echo 'display:none';} echo "' id='numeroD5' name='numeroD5' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D5'] = 'on') {echo $row['numeroD5'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left: 8.60cm; top:15.32cm'>
		<input name='D6' type='checkbox' id='D6' onChange='comprobarD6(this)' "; if ($row['D6'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 9.35cm; top:15.38cm'>
		<input style='width:0.9cm; "; if ($row['D6'] != 'on') {echo 'display:none';} echo "' id='numeroD6' name='numeroD6' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D6'] = 'on') {echo $row['numeroD6'];} else {echo '';} echo "'>
	</div>

	<div style='position:absolute; left:17.60cm; top:13.82cm'>
		<input name='D7' type='checkbox' id='D7' onChange='comprobarD7(this)' "; if ($row['D7'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:13.88cm'>
		<input style='width:0.9cm; "; if ($row['D7'] != 'on') {echo 'display:none';} echo "' id='numeroD7' name='numeroD7' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D7'] = 'on') {echo $row['numeroD7'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left:17.60cm; top:14.12cm'>
		<input name='D8' type='checkbox' id='D8' onChange='comprobarD8(this)' "; if ($row['D8'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:14.18cm'>
		<input style='width:0.9cm; "; if ($row['D8'] != 'on') {echo 'display:none';} echo "' id='numeroD8' name='numeroD8' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D8'] = 'on') {echo $row['numeroD8'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left:17.60cm; top:14.42cm'>
		<input name='D9' type='checkbox' id='D9' onChange='comprobarD9(this)' "; if ($row['D9'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:14.48cm'>
		<input style='width:0.9cm; "; if ($row['D9'] != 'on') {echo 'display:none';} echo "' id='numeroD9' name='numeroD9' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D9'] = 'on') {echo $row['numeroD9'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left:17.60cm; top:14.72cm'>
		<input name='D10' type='checkbox' id='D10' onChange='comprobarD10(this)' "; if ($row['D10'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:14.78cm'>
		<input style='width:0.9cm; "; if ($row['D10'] != 'on') {echo 'display:none';} echo "' id='numeroD10' name='numeroD10' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D10'] = 'on') {echo $row['numeroD10'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left:17.600cm; top:15.02cm'>
		<input name='D11' type='checkbox' id='D11' onChange='comprobarD11(this)' "; if ($row['D11'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:15.08cm'>
		<input style='width:0.9cm; "; if ($row['D11'] != 'on') {echo 'display:none';} echo "' id='numeroD11' name='numeroD11' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D11'] = 'on') {echo $row['numeroD11'];} else {echo '';} echo "'>
	</div>
	<div style='position:absolute; left:17.60cm; top:15.32cm'>
		<input name='D12' type='checkbox' id='D12' onChange='comprobarD12(this)' "; if ($row['D12'] == 'on') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left:18.35cm; top:15.38cm'>
		<input style='width:0.9cm; "; if ($row['D12'] != 'on') {echo 'display:none';} echo "' id='numeroD12' name='numeroD12' maxlength='6' type='text' pattern='^(?:[0-9]{4,6})$' title='Debe ingresar mínimo 4 números.'
		 value='"; if ($row['D12'] = 'on') {echo $row['numeroD12'];} else {echo '';} echo "'>
	</div>

	<!-- *****************************************			 sección E			 ***************************************** -->
	<div style='position:absolute; left: 1.9cm; top:16.35cm'>
		<input style='width:15.40cm' id='precauciones' name='precauciones' maxlength='90' type='text' value='$row[precauciones]' pattern='.{1,}' onkeyup='mayuscula(this)' required>
	</div>

	<!-- *****************************************			 sección F			 ***************************************** -->
	<div style='position:absolute; left: 3.55cm; top:17.84cm'><input type='radio' id='empleadop' name='empleado' value='E' "; if ($row['empleado'] == 'E') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left: 9.82cm; top:17.84cm'><input type='radio' id='empleadocp' name='empleado' value='CP' "; if ($row['empleado'] == 'CP') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:12.30cm; top:17.90cm'><input style='width:5.5cm; "; if ($row['companiacp'] == '') {echo 'display:none';} echo "' id='companiacp' name='companiacp' maxlength='36' type='text' pattern='.{1,}' onkeyup='mayuscula(this)' value='$row[companiacp]'></div>
	<script>
		var companiacp = document.getElementById('companiacp'); companiact = document.getElementById('companiact');
		document.getElementById('empleadop').addEventListener('click', function(e) {companiacp.disabled = true ; companiacp.style.display = 'none';});
		document.getElementById('empleadop').addEventListener('click', function(e) {companiact.disabled = true ; companiact.style.display = 'none';});
		document.getElementById('empleadocp').addEventListener('click', function(e) {companiacp.disabled = false; companiacp.style.display = 'block'; companiacp.required = true;});
		document.getElementById('empleadocp').addEventListener('click', function(e) {companiact.disabled = true ; companiact.style.display = 'none';});
	</script>
	<div style='position:absolute; left: 3.45cm; top:18.40cm'><input name='ejecutorF'		type='text' maxlength='30' style='width: 5.40cm' value='$row[ejecutorF]' pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:15.50cm; top:18.40cm'><input name='fechaejecF'	type='date' min='"; echo $fechamin; echo "' max='"; echo $fechamax; echo "' value='$row[fechaejecF]' title='Solo se aceptan fechas del año "; echo date('Y'); echo " (dd-mm-aaaa)' required></div>
	<div style='position:absolute; left:18.70cm; top:18.40cm'><input name='horaejecF'		type='time' value='$row[horaejecF]' required></div>
	<div style='position:absolute; left: 3.45cm; top:18.80cm'><input name='inspectorF'	type='text' maxlength='30' style='width: 5.40cm' value='$row[inspectorF]' pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:15.50cm; top:18.80cm'><input name='fechainspF'	type='date' min='"; echo $fechamin; echo "' max='"; echo $fechamax; echo "' value='$row[fechainspF]' title='Solo se aceptan fechas del año "; echo date('Y'); echo " (dd-mm-aaaa)' required></div>
	<div style='position:absolute; left:18.70cm; top:18.80cm'><input name='horainspF'		type='time' value='$row[horainspF]' required></div>

	<!-- *****************************************			 sección G			 ***************************************** -->
	<div style='position:absolute; left: 1.86cm; top:19.63cm'><input type='radio' id='docum_adic_SI' name='docum_adic' value='SI' "; if ($row['docum_adic'] == 'SI') {echo 'checked';} echo " required></div>
	<div style='position:absolute; left: 1.86cm; top:19.97cm'><input type='radio' id='docum_adic_NO' name='docum_adic' value='NO' "; if ($row['docum_adic'] == 'NO') {echo 'checked';} echo "></div>
	<div style='position:absolute; left:10.30cm; top:20.15cm'>
		<input style='width:0.30cm; text-align:center; "; if ($row['cantidad'] = '') {echo 'display:none';} echo "' id='cantidad' name='cantidad' maxlength='1' type='text'
		value='$row[94]' pattern='^(?:[0-9]{1})$'>
	</div>
	<div style='position:absolute; left:14.20cm; top:20.15cm'>
		<input style='width: 5.20cm; "; if ($row['nombre1'] < '1') {echo 'display:none';} echo "' id='nombre1' name='nombre1' maxlength='30' type='text' value='$row[nombre1]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left: 2.50cm; top:20.6cm'>
		<input style='width: 5.20cm; "; if ($row['nombre2'] < '2') {echo 'display:none';} echo "' id='nombre2' name='nombre2' maxlength='30' type='text' value='$row[nombre2]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left: 8.30cm; top:20.6cm'>
		<input style='width: 5.20cm; "; if ($row['nombre3'] < '3') {echo 'display:none';} echo "' id='nombre3' name='nombre3' maxlength='30' type='text' value='$row[nombre3]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left:14.20cm; top:20.6cm'>
		<input style='width: 5.20cm; "; if ($row['nombre4'] < '4') {echo 'display:none';} echo "' id='nombre4' name='nombre4' maxlength='30' type='text' value='$row[nombre4]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left: 2.50cm; top:21.05cm'>
		<input style='width: 5.20cm; "; if ($row['nombre5'] < '5') {echo 'display:none';} echo "' id='nombre5' name='nombre5' maxlength='30' type='text' value='$row[nombre5]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left: 8.30cm; top:21.05cm'>
		<input style='width: 5.20cm; "; if ($row['nombre6'] < '6') {echo 'display:none';} echo "' id='nombre6' name='nombre6' maxlength='30' type='text' value='$row[nombre6]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
	<div style='position:absolute; left:14.20cm; top:21.05cm'>
		<input style='width: 5.20cm; "; if ($row['nombre7'] < '7') {echo 'display:none';} echo "' id='nombre7' name='nombre7' maxlength='30' type='text' value='$row[nombre7]' pattern='.{1,}' onkeyup='mayuscula(this)'>
	</div>
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
		document.getElementById('docum_adic_SI').addEventListener('click', function(e) {
			c.style.display = 'none'; c.disabled = true;
			n1.style.display = 'none'; n1.disabled = true;
			n2.style.display = 'none'; n2.disabled = true;
			n3.style.display = 'none'; n3.disabled = true;
			n4.style.display = 'none'; n4.disabled = true;
			n5.style.display = 'none'; n5.disabled = true;
			n6.style.display = 'none'; n6.disabled = true;
			n7.style.display = 'none'; n7.disabled = true;});
		document.getElementById('docum_adic_NO').addEventListener('focus', function(e) {c.disabled = false; c.style.display = 'block'; c.required = true;});
		document.getElementById('cantidad').addEventListener('focus', function(e) {
			if (c.value == 0) {c.value = 1;
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = true; n2.style.display = 'none';
			 n3.disabled = true; n3.style.display = 'none';
			 n4.disabled = true; n4.style.display = 'none';
			 n5.disabled = true; n5.style.display = 'none';
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 1) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = true; n2.style.display = 'none';
			 n3.disabled = true; n3.style.display = 'none';
			 n4.disabled = true; n4.style.display = 'none';
			 n5.disabled = true; n5.style.display = 'none';
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 2) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = true; n3.style.display = 'none';
			 n4.disabled = true; n4.style.display = 'none';
			 n5.disabled = true; n5.style.display = 'none';
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 3) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = true; n4.style.display = 'none';
			 n5.disabled = true; n5.style.display = 'none';
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 4) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = false; n4.style.display = 'block'; n4.required = true;
			 n5.disabled = true; n5.style.display = 'none';
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 5) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = false; n4.style.display = 'block'; n4.required = true;
			 n5.disabled = false; n5.style.display = 'block'; n5.required = true;
			 n6.disabled = true; n6.style.display = 'none';
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value == 6) {
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = false; n4.style.display = 'block'; n4.required = true;
			 n5.disabled = false; n5.style.display = 'block'; n5.required = true;
			 n6.disabled = false; n6.style.display = 'block'; n6.required = true;
			 n7.disabled = true; n7.style.display = 'none';};
			if (c.value >= 7) {c.value = 7;
			 n1.disabled = false; n1.style.display = 'block'; n1.required = true;
			 n2.disabled = false; n2.style.display = 'block'; n2.required = true;
			 n3.disabled = false; n3.style.display = 'block'; n3.required = true;
			 n4.disabled = false; n4.style.display = 'block'; n4.required = true;
			 n5.disabled = false; n5.style.display = 'block'; n5.required = true;
			 n6.disabled = false; n6.style.display = 'block'; n6.required = true;
			 n7.disabled = false; n7.style.display = 'block'; n7.required = true;}});
	</script>
	<div style='position:absolute; left: 3.45cm; top:21.50cm'><input name='aprobadorG'		type='text' maxlength='30' style='width: 5.40cm' value='$row[aprobadorG]'	pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:15.50cm; top:21.50cm'><input name='fechaaprobG'		type='date' min='"; echo $fechamin; echo "' max='"; echo $fechamax; echo "' value='$row[fechaaprobG]'		title='Solo se aceptan fechas del año "; echo date('Y'); echo " (dd-mm-aaaa)' required></div>
	<div style='position:absolute; left:18.70cm; top:21.50cm'><input name='horaaprobG'		type='time' value='$row[horaaprobG]' required></div>
	<div style='position:absolute; left: 3.45cm; top:21.95cm'><input name='emisorG'				type='text' maxlength='30' style='width: 5.40cm' value='$row[emisorG]'		pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:15.50cm; top:21.95cm'><input name='fechaemisorG'	type='date' min='"; echo $fechamin; echo "' max='"; echo $fechamax; echo "' value='$row[fechaemisorG]'	title='Solo se aceptan fechas del año "; echo date('Y'); echo " (dd-mm-aaaa)' required></div>
	<div style='position:absolute; left:18.70cm; top:21.95cm'><input name='horaemisorG' 	type='time' value='$row[horaemisorG]' required></div>

	<!-- *****************************************			 sección H			 ***************************************** -->
	<div style='position:absolute; left: 6.72cm; top:22.80cm'>
		<input type='radio' id='completadoSI' name='completado' value='SI' "; if ($row['completado'] == 'SI') {echo 'checked';} echo " required>
	</div>
	<div style='position:absolute; left:10.12cm; top:22.80cm'>
		<input type='radio' id='completadoNO' name='completado' value='NO' "; if ($row['completado'] == 'NO') {echo 'checked';} echo ">
	</div>
	<div style='position:absolute; left: 3.45cm; top:23.27cm'><input name='ejecutorH'		type='text' maxlength='30' style='width: 5.40cm' value='$row[ejecutorH]'	pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:18.70cm; top:23.27cm'><input name='horaejecH'		type='time' value='$row[horaejecH]' required></div>
	<div style='position:absolute; left: 3.45cm; top:23.72cm'><input name='inspectorH'	type='text' maxlength='30' style='width: 5.40cm' value='$row[inspectorH]'	pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:18.70cm; top:23.72cm'><input name='horainspH'		type='time' value='$row[horainspH]' required></div>
	<div style='position:absolute; left: 3.45cm; top:24.62cm'><input name='emisorH'			type='text' maxlength='30' style='width: 5.40cm' value='$row[emisorH]'		pattern='.{1,}' onkeyup='mayuscula(this)' required></div>
	<div style='position:absolute; left:18.70cm; top:24.62cm'><input name='horaemisorH'	type='time' value='$row[horaemisorH]' required></div>

	<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
	<div style='position:absolute; left:50%; margin-left:-408px; top:266mm; width:816px'>
		<div style='position:absolute; left:20mm'>
			<span style='font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)'>Fecha primer diligenciamiento: "; echo $row['fecha']; echo "</span>
			<input style='display:none; border:0' type='text' id='fecha' name='fecha' value='$row[fecha]' readonly>
		</div>
	</div>
	<div style='position:absolute; left:50%; margin-left:-408px; top:270.6mm; width:816px'>
		<div style='position:absolute; left:169.0mm'>
			<span style='font-family:Arlrdlt; font-size:8px; color:rgba(0,0,0,1)'>Fecha edición: "; echo $fechahoy; echo "</span>
		</div>
	</div>
	<div style='position:absolute; left:50%; margin-left:-25px; top:271mm; width:25; background-color:rgba(0,0,255,0)'>
		<img style='width:auto; height:25px' src='../../../../../common/imagenes/editar.png'>
	</div>
	<div style='position:absolute; left:50%; margin-left:-25px; top:271mm; width:25; background-color:rgba(0,255,0,0)'>
		<input style='font-weight:bold; font-size:14px; height:25px; width:25px; background-color:rgba(255,0,255,0); color:rgba(0,255,255,0);
		border:0px solid rgba(0,255,255,0); border-radius:0px; text-align:center; cursor:pointer' type='submit' name='modificar' value='.'
		title='Modificar la información en la base de datos'>
	</div>
	<div style='position:absolute; left:50%; margin-left: 25px; top:271mm; width:25; background-color:rgba(255,0,0,0)'>
		<a href='javascript:closed();'>
		<img src='../../../../../common/imagenes/regresar.png' style='pointer-events:auto' width='25' height='auto' title='Cerrar esta pestaña sin modificar nada.'>
		</a>
	</div>
	<div style='position:absolute; left:50%; margin-left:-101mm; top:80mm; width:8mm; text-align:right; background-color:rgba(250,0,0,0)'>
		<a href='mailto:"; echo $correo_pedidos; echo "?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo'>
		<img src='../../../../../common/imagenes/piedepagina.svg' style='pointer-events:auto' title='Enviar pedido por correo electrónico a&#x00A;"; echo $correo_pedidos; echo "'></a>
	</div>
</div>
"; ?>
</div> <!-- cierre <div class="noimprimir"> -->
</div> <!-- cierre <div class="zoom"> -->
<script type='text/javascript'>document.oncontextmenu = function(){return false}</script>
</body>
</html>
