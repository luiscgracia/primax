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
		<table><tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr></table>
		<table border=0>
			<tr>
				<td class=A><br>FECHA<br>									 <input name=fechaA 			type=date value='$row[fechaA]' min='$row[fechaA]' max='$row[fechaA]' required></td>
				<td class=A>HORA<br>INICIAL<br>						 <input name=horainicialA type=time value='$row[horainicialA]' required></td>
				<td class=A>HORA<br>FINAL<br>							 <input name=horafinalA 	type=time value='$row[horafinalA]' required></td>
				<td class=A>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit 	class=consecutivo value='$row[certhabilit]' maxlength=6 style=width:67% inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=30px><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td style='vertical-align:bottom; width:80%' class=A>DESCRIPCIÓN<textarea name=descripcion maxlength=68 style=width:96% onkeyup=mayuscula(this) pattern=.{1,} required>$row[descripcion]</textarea></td>
				<td style='vertical-align:bottom; width:20%' class=A>PERMISO<br>DE TRABAJO<input name=permisodetrabajo value=$row[permisodetrabajo] class=consecutivo style='width:100%; text-align:center' maxlength=5 inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección B			 ***************************************** -->
		<table>
			<tr><td width=5%></td><td width=95%></td></tr>
			<tr><td class=Bct><b>&nbsp;B. </b></td><td class=B></td></tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=85%></td></tr>
			<tr class=C>
				<td class=A></td><td class=A>SI</td><td class=A>NO</td><td class=A></td>
			</tr>
			<tr class=C>
				<td class=numero>1.</td>
				<td><input type=radio name=B1 id=B1 value=SI "; if ($row['B1'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B1 id=b1 value=NO "; if ($row['B1'] == 'NO') {echo 'checked';} echo "></td>
				<td class=B>El contratista y su personal entienden el significado de 'INTERFASE' y su importancia?</td>
			</tr>
			<tr class=C>
				<td class=numero>2.</td>
				<td colspan=3 class=B>Con cuál(es) actividad(es) / área(s) / función(es) involucra Interfases el trabajo? Indique: <input style=width:45% name=B2indique value='$row[B2indique]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></td>
			</tr>
		</table>
		<table border=0>
			<tr>
			<td width=5%></td>
			<td width=17.5%></td><td width=5%></td>
			<td width=17.5%></td><td width=5%></td>
			<td width=17.5%></td><td width=5%></td>
			<td width=17.5%></td><td width=5%></td>
			<td width=5%></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Tanques&nbsp;</td>	<td><input name=B2a type=checkbox "; if ($row['B2a'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Químicos&nbsp;</td><td><input name=B2e type=checkbox "; if ($row['B2e'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Ventas&nbsp;</td>	<td><input name=B2i type=checkbox "; if ($row['B2i'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>&nbsp;</td>				<td><input style=display:none name=B2m type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Llenadero&nbsp;</td>									<td><input name=B2b type=checkbox "; if ($row['B2b'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Laboratorio&nbsp;</td>								<td><input name=B2f type=checkbox "; if ($row['B2f'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Customer&nbsp;<br>Service&nbsp;</td>	<td><input name=B2j type=checkbox "; if ($row['B2j'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>&nbsp;</td>													<td><input style=display:none name=B2n type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Oficinas&nbsp;</td>	<td><input name=B2c type=checkbox "; if ($row['B2c'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Ingeniería&nbsp;</td><td><input name=B2g type=checkbox "; if ($row['B2g'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>&nbsp;</td>					<td><input style=display:none name=B2k type=checkbox></td>
				<td class=texto2>&nbsp;</td>					<td><input style=display:none name=B2o type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Flota&nbsp;</td>		<td><input name=B2d type=checkbox "; if ($row['B2d'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>Security&nbsp;</td><td><input name=B2h type=checkbox "; if ($row['B2h'] == 'on') {echo 'checked';} echo "></td>
				<td class=texto2>&nbsp;</td>				<td><input style=display:none name=B2l type=checkbox></td>
				<td class=texto2>&nbsp;</td>				<td><input style=display:none name=B2p type=checkbox></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=85%></td></tr>
			<tr class=C>
				<td class=numero>3.</td>
				<td><input type=radio name=B3 id=B3 value=SI "; if ($row['B3'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B3 id=b3 value=NO "; if ($row['B3'] == 'NO') {echo 'checked';} echo "></td>
				<td class=B>Se informó a los responsables de esa(s) actividad(es) / área(s) / función(es)?</td>
			</tr>
			<tr class=C>
				<td class=numero>4.</td>
				<td><input type=radio name=B4 id=B4 value=SI "; if ($row['B4'] == 'SI') {echo 'checked';} echo " required></td>
				<td><input type=radio name=B4 id=b4 value=NO "; if ($row['B4'] == 'NO') {echo 'checked';} echo "></td>
				<td class=B>El trabajo y las Interfases se registraron en las Bitácoras de los involucrados?</td>
			</tr>
			<tr class=C>
				<td class=numero>5.</td>
				<td colspan=3 class=B>Medidas de seguridad que se tomarán para hacer el trabajo controlando los riesgos generados por la interfase?</td>
			</tr>
			<tr class=C>
				<td></td>
				<td colspan=10><textarea style=width:98% id=B5 name=B5 maxlength=800 type=text onkeyup=mayuscula(this) pattern=.{1,} required>$row[B5]</textarea></td>
			</tr>
		</table>
		<hr>

		<!-- *****************************************			 sección C			 ***************************************** -->
		<table border=0>
			<tr><td width= 5vw></td><td width=95vw></td></tr>
			<tr><td colspan=2 class=B><b>&nbsp;&nbsp;C. ACEPTACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B>
					Estamos enterados del trabajo a desarrollar, de las posibles implicaciones sobre la seguridad de nuestras áreas / operaciones y hemos establecido los controles
					necesarios según lo indicado en la sección B. &nbsp;Igualmente entendemos que ante CUALQUIER CAMBIO que afecte las interfases cubiertas por este certificado
					se suspenderá el trabajo, se informará de inmediato a todos los involucrados y se tomarán los correctivos necesarios.
				</td>
			</tr>
	 		<tr height=10px><td></td></tr>
		</table>
	 	<div style='position:absolute; width:57.50%; left:0.50%; background-color:white'>
			<table border=1>
				<tr height=70px><td class=A3 style=width:42.10%>RESPONSABLE - ENTERADO</td></tr>
				<tr height=50px><td><input name=Cresponsable1 value='$row[Cresponsable1]' maxlength=30 type=text style=width:98% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr height=50px><td><input name=Cresponsable2 value='$row[Cresponsable2]' maxlength=30 type=text style=width:98% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr height=50px><td><input name=Cresponsable3 value='$row[Cresponsable3]' maxlength=30 type=text style=width:98% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr height=50px><td><input name=Cresponsable4 value='$row[Cresponsable4]' maxlength=30 type=text style=width:98% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
			</table>
	 	</div>
	 	<div style='position:absolute; width:41.50%; left:58%; background-color:white; overflow:scroll'>
			<table border=1 bordercolor=#ff7000>
				<tr height=70px><td style=width:400px class=A2>ÁREA</td><td style=width:400px class=A2>DEPARTAMENTO</td><td style=width:120px class=A2>FIRMA</td></tr>
				<tr height=50px>
					<td><input style=width:97% name=Carea1					value='$row[Carea1]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:97% name=Cdepartamento1 value='$row[Cdepartamento1]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style='display:none; width:100%' name=Cfirma1 value='$row[firma1]' maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:97% name=Carea2					value='$row[Carea2]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:97% name=Cdepartamento2 value='$row[Cdepartamento2]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style='display:none; width:100%' name=Cfirma2 value='$row[firma2]' maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:97% name=Carea3					value='$row[Carea3]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:97% name=Cdepartamento3 value='$row[Cdepartamento3]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style='display:none; width:100%' name=Cfirma3 value='$row[firma3]' maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:97% name=Carea4					value='$row[Carea4]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:97% name=Cdepartamento4 value='$row[Cdepartamento4]' maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style='display:none; width:100%' name=Cfirma4 value='$row[firma4]' maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
		</div>
	 	<div style='position:absolute; top:2229px; background-color:white'>
		<table border=0>
			<tr><td width=49.999vw></td><td width=49.999vw></td><td width=0.001vw></td><td width=0.001vw></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=ejecutorC				value='$row[ejecutorC]'				style=width:98%			type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreejecutorC	value='$row[nombreejecutorC]'	style=width:98%			type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC			value='$row[fechaejecC]'			style=display:none	type=date  class=mostrarfecha readonly></td>
				<td><input name=horaejecC				value='$row[horaejecC]'				style=display:none	type=time  class=mostrarhora  readonly></td>
			</tr>
			<tr><td>EJECUTOR</td><td>NOMBRE</td><td></td><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 sección D			 ***************************************** -->
		<table border=0>
			<tr><td width= 5.00vw></td><td width=61.50vw></td><td width=18.00vw></td><td width=15.50vw></td></tr>
			<tr><td colspan=4 class=B><b>&nbsp;&nbsp;D. CANCELACIÓN</b></td></tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td class=B colspan=3>Certifico que el trabajo cubierto por estas interfases:</td>
			</tr>
		</table>
		<table border=0>
			<tr>
				<td style=width:5%></td>
				<td style=width:4%><input type=radio name=cancelacion id=A value=A "; if ($row['cancelacion'] == 'A') {echo 'checked';} echo " required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B "; if ($row['cancelacion'] == 'B') {echo 'checked';} echo " ></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C "; if ($row['cancelacion'] == 'C') {echo 'checked';} echo " ></td>
				<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
			</tr>
			<tr>
				<td class=Bct>&nbsp;&nbsp;&#9679;&nbsp;</td>
				<td colspan=6 class=B>Que informé a todos los involucrados, que se cerraron las Interfases y que el sistema y la operación están en condiciones seguras.</td>
			</tr>
			<tr height=30><td></td></tr>
		</table>
		<table width=100% border=0px>
			<tr class=C>
				<td colspan=10 class=texto>
					<textarea style=width:100% name=comentariosDa maxlength=90 type=text placeholder=Comentarios onkeyup=mayuscula(this) pattern=.{1,} required>$row[comentariosDa]</textarea>
					<input style='display:none; width:100%' name=comentariosDb value='$row[comentariosDb]' maxlength=100 type=text pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
			</tr>
			<tr height=50><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorD		value='$row[ejecutorD]'	style=width:98% type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecD	value=$row[fechaejecD]	type=date  class=mostrarfecha readonly></td>
				<td><input name=horaejecD		value=$row[horaejecD]		type=time  required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorD	value='$row[inspectorD]'	style=width:98% type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspD	value=$row[fechainspD]		type=date  class=mostrarfecha readonly></td>
				<td><input name=horainspD		value=$row[horainspD]			type=time  required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorD				value='$row[emisorD]'			style=width:98% type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorD	value=$row[fechaemisorD]	type=date  class=mostrarfecha readonly></td>
				<td><input name=horaemisorD		value=$row[horaemisorD]		type=time  required></td>
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
