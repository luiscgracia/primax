<!DOCTYPE html>
<html lang=es>
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
<!-- *****************************************			 INICIO DEL FORMULARIO			 ***************************************** -->
<div class=noimprimir>
	<div class=fijar style="top:15px; left:15px">
		<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte;?>
		&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';}?>
		le escribo de PRIMAX <?=strtoupper($terminal);?>, estoy diligenciando el formato <?=$$formulario;?>.' target=_blank>
		<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
	</div>
	<? $color_formato = 'rgba(255,0,0,1)' ?>
	<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
		<div style="position:absolute; left:50%; margin-left:-50%; top:0%; width:100%; overflow:hidden; height:4770px; border:1vw solid <?=$color_formato;?>">
			<table border=0 style="color:white; background-color:<?=$color_formato;?>">
				<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
				<tr height=100>
					<td colspan=2>
						<input style=display:none name=estado type=texto value=<?=$estado_formulario1;?> readonly>
						<span style="font-size:36px; width:660px; display:inline-block"><b><?=$$formulario;?></b></span>
					</td>
					<td>
						<input name=consecutivo class=consecutivo style="color:white; background-color:<?=$color_formato;?>; border:0" type=texto
							value='<? if ($consec <= 9) {echo '&#8470; 00000';}
													else {if ($consec <= 99) {echo '&#8470; 0000';}
														else {if ($consec <= 999) {echo '&#8470; 000';}
															else {if ($consec <= 9999) {echo '&#8470; 00';}
																else {if ($consec <= 99999) {echo '&#8470; 0';} else {echo '&#8470; ';}}}}} echo $consec;?>' readonly>
					</td>
				</tr>
				<tr>
					<td colspan=3 class=alertacabecera>
						CONSULTE EL MANUAL DE PERMISOS DE TRABAJO.<br>
						ADVERTENCIA: EN CASO DE QUE SUENE UNA ALARMA DE EMERGENCIA ESTE CERTIFICADO PIERDE VALIDEZ<br>

						<b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b>
					</td>
				</tr>
			</table>

<!-- *****************************************			 sección A			 ***************************************** -->
			<table border=0>
				<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
				<tr><td class=letraseccion>A.&nbsp;</td><td class=tituloseccion>SOLICITUD</td></tr>
				<tr><td colspan=2>DESCRIPCIÓN DEL TRABAJO<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required autofocus></textarea></td></tr>
				<tr height=10><td></td></tr>
			</table>
			<table border=0>
				<tr><td width=5%></td><td width=70%></td><td width=20%></td><td width=5%></td></tr>
				<tr>
					<td></td>
					<td class=B style=text-align:right><span id=doc_ad_NO>PERSONAS AUTORIZADAS PARA EL TRABAJO&nbsp;</span></td>
					<td style=text-align:left><input name=cantidad id=cantidad style=width:60% maxlength=1 placeholder="Máx. 4" inputmode=numeric pattern=^(?:[1-4]{1})$></td>
					<td></td>
				</tr>
			</table>
			<table border=0>
				<tr><td width=1%></td><td width=48.5%></td><td width=1%></td><td width=48.5%></td><td width=1%></td></tr>
				<? for ($i = 1; $i <= 4; $i += 2): ?>
				<tr>
					<td></td>
					<td><input name="nombre<?= $i?>"		id="nombre<?= $i?>"		maxlength=30 style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder="Nombre <?= $i == 1 ? '1er' : ($i == 3 ? '3er' : $i.'o')?>. autorizado" <?= $i <= $cantidad ? 'required' : '' ?>></td>
					<td></td>
					<? if ($i < 4): ?>
					<td><input name="nombre<?= $i+1?>"	id="nombre<?= $i+1?>"	maxlength=30 style=display:none pattern=.{1,} onkeyup=mayuscula(this) placeholder="Nombre <?= $i+1?>o. autorizado" <?= ($i+1) <= $cantidad ? 'required' : '' ?>></td>
					<? else: ?>
					<td></td>
					<? endif; ?>
					<td></td>
				</tr>
				<? endfor; ?>
				<tr height=30><td colspan=6></td></tr>
			</table>
			<table border=0>
				<tr><td width=25%></td><td width=25%></td><td width=25%></td><td width=25%></td></tr>
				<tr>
					<td>					 <br>FECHA<br>			 <input name=fechaA				type=date value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' required></td>
					<td>			 HORA<br>INICIAL<br>		 <input name=horainicialA	type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>			 HORA<br>FINAL<br>			 <input name=horafinalA		type=time value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
					<td>CERTIFICADO<br>HABILITACIÓN<br><input name=certhabilit  type=texto class=consecutivo placeholder="######" maxlength=6 style=width:67%	inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
				</tr>
 				<tr class=sinbordes height=10><td class=sinbordes></td></tr>
			</table>
			<hr>

<!-- *****************************************			 sección B			 ***************************************** -->
			<table border=1>
				<tr><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=5%></td><td class=sinbordes width=7%></td><td class=sinbordes width=78%></td></tr>
				<tr><td class=letraseccion>B.&nbsp;</td><td colspan=4 class=tituloseccion>DOCUMENTACIÓN ADICIONAL <span>(Verificación previa área de trabajo)</span></td></tr>
				<tr><td class=Bc><b>SI</b></td><td class=Bc><b>NO</b></td><td class=Bc><b>NA</b></td><td class=Br></td><td class=B style="border:0px; text-align:center"><b>REQUISITO DE SEGURIDAD</b></td></tr>
				<?
				$ap = '50px';
				$preguntas1 = [
					 1 => "Están los desagües de áreas vecinas limpios y libres de sustancias combustibles?",
					 2 => "Están los desagües cercanos Cubiertos y Sellados?",
					 3 => "Está el área limpía y libre de sustancias combustibles o tóxicas?",
					 4 => "Si se requieren Mantas Anti-fuego, Neblina de agua, Tienda para soldar, están disponibles?<br><span>Ver requerimientos para soldadura en el respaldo de esta hoja</span>",
					 5 => "Permiten los factores externos efectuar el trabajo con Seguridad?<br><span>(Dirección Viento, Condiciones Atmosféricas, Trabajos vecinos)</span>",
					 6 => "Se ha identificado y demarcado adecuadamente el Área Bajo Control?</span>",
					 7 => "Hay algún requisito legal especial? Indique:"
				];
				foreach ($preguntas1 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
						<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td class=Bnumero colspan=3></td><td class=Bpregunta colspan=2><textarea name=indiqueB7b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
				<?
				$preguntas2 = [
					 8 => "Se han suspendido todas las áreas u operaciones que impedirían la realización de este trabajo?",
					 9 => "Se requiere inspector de Seguridad?",
					10 => "Está disponible y listo el equipo de Primeros Auxilios?",
					11 => "Está disponible y listo el Equipo Contra Incendios? Especifique:"
				];
				foreach ($preguntas2 as $num => $pregunta) {
					echo "<tr height=$ap>
						<td><input type='radio' id='B{$num}' name='B{$num}' value='SI' onclick='handleRadioClick(this)' required></td>
						<td><input type='radio' id='b{$num}' name='B{$num}' value='NO' onclick='handleRadioClick(this)'></td>
						<td><input type='radio' id='v{$num}' name='B{$num}' value='NA' onclick='handleRadioClick(this)'></td>
						<td class=Bnumero>{$num}.&nbsp;</td><td class=Bpregunta>{$pregunta}</td>
					</tr>";
				}
				?>
				<tr><td class=Bnumero colspan=3></td><td class=Bpregunta colspan=2><textarea name=especifiqueB11b maxlength=85 style=width:99% onkeyup=mayuscula(this) pattern=.{1,}></textarea></td></tr>
 				<tr height=20><td colspan=5 style=border:0px></td></tr>
			</table>
			<table border=0>
				<tr>
					<td width= 5% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=26% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=26% style=border:0px></td>
					<td width= 5% style=border:0px></td><td width=26% style=border:0px></td>
					<td width= 2% style=border:0px></td>
				</tr>
				<tr><td colspan=8 class=B style=border:0px>&nbsp;&nbsp;12. ELEMENTOS DE PROTECCIÓN</td></tr>
				<tr>
					<td></td>
					<td><input name=B12a type=checkbox></td><td class=B> &nbsp;CASCO</td>
					<td><input name=B12b type=checkbox></td><td class=B> &nbsp;RESPIRADOR</td>
					<td><input name=B12d type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;RESPIRATORIA</td>
					<td></td>
				</tr>
				<tr><td height=30></td></tr>
				<tr>
					<td></td>
					<td><input name=B12e type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;AUDITIVA</td>
					<td><input name=B12g type=checkbox></td><td class=B> &nbsp;PROTECCIÓN<br> &nbsp;FACIAL</td>
					<td><input name=B12h type=checkbox></td><td class=B> &nbsp;ANTEOJOS DE<br> &nbsp;SEGURIDAD</td>
					<td></td>
				</tr>
				<tr><td height=30></td></tr>
				<tr>
					<td></td>
					<td><input name=B12f type=checkbox></td><td class=B> &nbsp;ARNÉS DE<br> &nbsp;SEGURIDAD</td>
					<td><input name=B12c type=checkbox></td><td class=B> &nbsp;SALVAVIDAS</td>
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
					<td style=text-align:right class=B>GUANTES <input name=B12i type=checkbox onChange=comprobarB11i(this)></td>
					<td><input style=display:none name=guante id=guante maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
					<td style=text-align:right class=B>CALZADO <input name=B12j type=checkbox onChange=comprobarB11j(this)></td>
					<td><input style=display:none name=calzado id=calzado maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
				</tr>
		 		<tr height=10><td></td></tr>
				<tr>
					<td></td>
					<td style=text-align:right class=B>DELANTAL <input name=B12k type=checkbox onChange=comprobarB11k(this)></td>
					<td><input style=display:none name=delantal id=delantal maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
					<td style=text-align:right class=B>ROPA <input name=B12l type=checkbox onChange=comprobarB11l(this)></td>
					<td><input style=display:none name=ropa id=ropa maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
				</tr>
		 		<tr height=10><td></td></tr>
				<tr>
					<td></td>
					<td style=text-align:right class=B>Otro 1 <input name=B12m type=checkbox onChange=comprobarB11m(this)></td>
					<td><input style=display:none name=otro1 id=otro1 maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
					<td style=text-align:right class=B>Otro 2 <input name=B12n type=checkbox onChange=comprobarB11n(this)></td>
					<td><input style=display:none name=otro2 id=otro2 maxlength=10 type=texto pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td></td>
				</tr>
		 		<tr height=10><td></td></tr>
				<tr>
					<td></td>
					<td style=text-align:right class=B>Otro 3 <input name=B12o type=checkbox onChange=comprobarB11o(this)></td>
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
				<tr><td colspan=4 class=B>&nbsp;&nbsp;13. PRUEBA DE GASES</td></tr>
				<tr>
					<td colspan=3>
						<table border=0>
							<tr><td width=64%></td><td width=9%></td><td width=9%></td><td width=9%></td><td width=9%></td></tr>
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
					<td>		 <br>EQUIPO<br>			<input name=B13equipo		type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td>		 <br>DUEÑO<br>			<input name=B13dueno		type=texto maxlength=15 pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td>FECHA<br>CALIBRACIÓN<br><input name=B13fecha 		type=date  value='<?=$fechacero;?>' max='<?=$fechaactual;?>' required></td>
					<td> BUMP<br>TEST<br>				<input name=B13bumptest type=checkbox></td>
				</tr>
				<tr height=30><td></td></tr>
			</table>
	 		<div style="position:absolute; width:18.50%; left:0.50%; background-color:white">
				<table border=1>
					<tr height=75px><td class=A3>PRUEBA</td></tr>
					<tr height=75px><td class=A1>%LEL</td></tr>
				</table>
	 		</div>
	 		<div style="position:absolute; width:80.25%; left:19%; background-color:white; overflow:scroll">
				<table border=1 bordercolor=#ff7000>
					<tr height=75px>
						<? for ($i = 1; $i <= 8; $i++): ?>
						<td style=width:190px class=A2>Hora<br><?=$i?></td><td style=width:150px class=A2>Resultado<br><?=$i?></td>
						<? endfor; ?>
					</tr>
					<tr height=75px>
						<? for ($i = 1; $i <= 8; $i++): ?>
						<td><input name=B13hora<?=$i?>	id=hora		type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required></td>
						<td><input name=B13resul<?=$i?> id=numero	type=texto maxlength=5 pattern=^([0-9]{1,2}(\.[0-9]{1,2})?)$ inputmode=numeric required></td>
						<? endfor; ?>
					</tr>
				</table>
			</div>
			<div style="width:100%; position:relative; top:160px; left:0px">
				<table border=0><tr><td class=A style=text-align:left><span><b>&nbsp;SI EL %LEL SE SUBE DE 0%, SUSPENDA EL TRABAJO INMEDIATAMENTE</b></span></td></tr></table>
			</div>

<!-- *****************************************			 sección C			 ***************************************** -->
			<div style="position:relative; left:0px; width:100%; top:170px"> <!-- este div mueve hacia abajo desde la sección C -->
				<hr>
				<table border=0>
					<tr><td width=5%></td><td width=61.50%></td><td width=18%></td><td width=15.50%></td></tr>
					<tr><td class=letraseccion>C.&nbsp;</td><td colspan=3 class=tituloseccion>ACEPTACIÓN</td></tr>
					<tr>
						<td class=Bct>&#9679;</td>
						<td class=B colspan=3>Confirmo que los requisitos indicados en la sección B se cumplen y que hay seguridad para realizar el trabajo indicado en la sección A.</td>
					</tr>
					<tr>
						<td class=Bct>&#9679;</td>
						<td class=B colspan=3>Confirmo además que se tomarán todas las precauciones necesarias para efectuar el trabajo con seguridad.</td>
					</tr>
					<tr height=30><td></td></tr>
				</table>
				<table border=0>
					<tr><td width=57.50%></td><td width=23%></td><td width=19.50%></td></tr>
					<tr>
						<td><input name=ejecutorC		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EJECUTOR</td>
						<td><input name=fechaejecC	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaejecC		type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr>
						<td><input name=inspectorC  type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>INSPECTOR</td>
						<td><input name=fechainspC  type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horainspC   type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
				</table>
				<hr>

<!-- *****************************************			 sección D			 ***************************************** -->
				<table border=0>
					<tr><td width=5%></td><td width=95%></td></tr>
					<tr><td class=letraseccion>D.&nbsp;</td><td class=tituloseccion>AUTORIZACIÓN</td></tr>
					<tr><td height=30></td></tr>
				</table>
				<table border=0>
					<tr><td width=50%></td><td width=50%></td><td width=0%></td><td width=0%></td></tr>
					<tr>
						<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EMISOR</td>
						<td><input name=nombreemisorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>NOMBRE</td>
						<td><input name=fechaemisorD	type=date	 class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaemisorD		type=time	 class=mostrarhora	value='<?=$hora;?>' min='<?=$horamin;?>'	readonly required></td>
					</tr>
				</table>
				<hr>

<!-- *****************************************			 sección E			 ***************************************** -->
				<table border=0>
					<tr class=sinbordes><td class=sinbordes width=5%></td><td class=sinbordes width=95%></td></tr>
					<tr><td class=letraseccion>E.&nbsp;</td><td class=tituloseccion>CANCELACIÓN</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Cuando se diligencia esta sección, el permiso NO puede ser revalidado.</td></tr>
					<tr><td class=Bct>&#9679;</td><td class=B>Certifico que el Trabajo mencionado en la Sección A:</td></tr>
				</table>
				<table border=0>
					<tr>
						<td style=width:5%></td>
						<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=gestionarClickRadio(this) required></td>
						<td style=width:23% class=B> &nbsp;Se ha<br> &nbsp;completado</td>
						<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=gestionarClickRadio(this)></td>
						<td style=width:19% class=B> &nbsp;No ha<br> &nbsp;iniciado</td>
						<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=gestionarClickRadio(this)></td>
						<td style=width:41% class=B> &nbsp;Ha iniciado pero no<br> &nbsp;ha terminado</td>
					</tr>
					<tr><td></td><td class=B colspan=6>Se ha retirado a todo el personal del área y esta ha quedado en condiciones de seguridad.	El ingreso al área está ahora prohibido.</td></tr>
					<tr height=30><td></td></tr>
				</table>
				<table border=0>
					<tr><td width=57.50%></td><td width=23%></td><td width=19.50%></td></tr>
					<tr>
						<td><input name=ejecutorE		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EJECUTOR</td>
						<td><input name=fechaejecE	type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaejecE		type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr>
						<td><input name=inspectorE	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>INSPECTOR</td>
						<td><input name=fechainspE	type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horainspE		type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
					<tr height=30><td></td></tr>
					<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
					<tr>
						<td><input name=emisorE				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required>EMISOR</td>
						<td><input name=fechaemisorE	type=date  class=mostrarfecha value='<?=$fechacero;?>' min='<?=$fechamin;?>' max='<?=$fechamax;?>' readonly></td>
						<td><input name=horaemisorE		type=time  value='<?=$hora;?>' min='<?=$horamin;?>' required>HORA</td>
					</tr>
				</table>
				<hr>
				<table>
					<tr height=10><td></td></tr>
					<tr style="background-color:rgba(0,240,0,0); height:15%">
						<td>
							<select name=usuario id=usuario style=width:67% required>
								<option value="" disabled selected>RESPONSABLE DEL FORMATO</option>
								<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i]?>"><?=$usuario[$i]?></option>
								<? endfor; ?>
							</select>
						</td>
					</tr>
					<tr height=10><td></td></tr>
				</table>
				<hr>
		
<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
				<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
				<input style=display:none type=text name=fecha value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
				<!--<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br>-->
				<table border=0>
					<tr height=100>
						<td><input type=image src=../../../../../common/imagenes/grabar.png alt=Submit style="width:100px; height:auto; border:0; background-color:rgba(0,0,0,0)"></td>
						<td><a href=javascript:closed()><img src=../../../../../common/imagenes/regresar.png style="pointer-events:auto; width:100px; height:auto"></a></td>
					</tr>
					<tr><td colspan=2><hr></td></tr>
					<tr>
						<td><span style="font-family:Arlrdlt; font-size:30px; color:rgba(0,0,0,1)">REVISIÓN FRONT-END: 2024-10</span></td>
						<td>
							<a href="mailto:<?=$correo_pedidos;?>?Subject=Solicitud%20pedido%20libretas%20permisos%20de%20trabajo">
							<img src=../../../../../common/imagenes/piedepagina_horizontal.svg style="pointer-events:auto; width:100%; height:auto">
							</a>
						</td>
					</tr>
				</table>
				<hr>
			</div>		<!-- cierre del div que mueve desde la sección C hacia abajo -->
		</div>

<!-- *****************************************			 INICIO DES-SELECCIONAR INPUT radio			 ***************************************** -->
<!-- *****************************************						debe ir al final del html					 ***************************************** -->

<script>
// Optimized JavaScript functions
const FormHandler = {
		// Radio button management with deselection capability
		currentOptions: {},
		
		handleRadioClick(option) {
			  const groupName = option.name;
			  const currentOption = this.currentOptions[groupName];
			  
			  if (currentOption === option) {
						option.checked = false;
						this.currentOptions[groupName] = null;
			  } else {
						this.currentOptions[groupName] = option;
			  }
			  
			  // Handle specific radio button logic
			  this.handleSpecificRadioLogic(option);
		},
		
		handleSpecificRadioLogic(option) {
			  const handlers = {
						'cambio': this.handleCambioRadio,
						'empleado': this.handleEmpleadoRadio,
						'docum_adic': this.handleDocumAdicRadio
			  };
			  
			  const handler = handlers[option.name];
			  if (handler) {
						handler.call(this, option);
			  }
		},
		
		handleCambioRadio(option) {
			  const pedidocambio = document.getElementById('pedidocambio');
			  const pedido = document.getElementById('pedido');
			  
			  if (option.value === 'CME') {
						this.hideElement(pedidocambio);
						this.hideElement(pedido);
			  } else if (option.value === 'CDE') {
						this.showElement(pedidocambio, true);
						this.showElement(pedido);
			  }
		},
		
		handleEmpleadoRadio(option) {
			  const companiacp = document.getElementById('companiacp');
			  
			  if (option.value === 'E') {
						this.hideElement(companiacp);
			  } else if (option.value === 'CP') {
						this.showElement(companiacp, true);
			  }
		},
		
		handleDocumAdicRadio(option) {
			  const elements = {
						cantidad: document.getElementById('cantidad'),
						docAdNO: document.getElementById('doc_ad_NO'),
						nombres: Array.from({length: 4}, (_, i) => document.getElementById(`nombre${i+1}`))
			  };
			  
			  if (option.value === 'SI') {
						Object.values(elements).flat().forEach(el => el && this.hideElement(el));
			  } else if (option.value === 'NO') {
						this.showElement(elements.cantidad, true);
						this.showElement(elements.docAdNO);
			  }
		},
		
		handleQuantityChange() {
			  const cantidad = document.getElementById('cantidad');
			  const value = parseInt(cantidad.value) || 1;
			  cantidad.value = Math.min(Math.max(value, 1), 4);
			  
			  const docAdNO = document.getElementById('doc_ad_NO');
			  this.showElement(docAdNO);
			  
			  for (let i = 1; i <= 4; i++) {
						const nombre = document.getElementById(`nombre${i}`);
						if (i <= cantidad.value) {
								this.showElement(nombre, true);
						} else {
								this.hideElement(nombre);
						}
			  }
		},
		
		toggleDocumentNumber(num) {
			  const checkbox = document.getElementById(`D${num}`);
			  const numberInput = document.getElementById(`numeroD${num}`);
			  
			  if (checkbox.checked) {
						this.showElement(numberInput, true);
			  } else {
						this.hideElement(numberInput);
			  }
		},
		
		showElement(element, required = false) {
			  if (element) {
						element.style.display = 'block';
						element.disabled = false;
						if (required) element.required = true;
			  }
		},
		
		hideElement(element) {
			  if (element) {
						element.style.display = 'none';
						element.disabled = true;
						element.required = false;
			  }
		}
};

// Global functions for backward compatibility
function handleRadioClick(option) {
		FormHandler.handleRadioClick(option);
}

function toggleDocumentNumber(num) {
		FormHandler.toggleDocumentNumber(num);
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
		// Initialize radio button states
		document.querySelectorAll('input[type="radio"]').forEach(radio => {
			  if (radio.checked) {
						FormHandler.currentOptions[radio.name] = radio;
			  }
		});
		
		// Quantity change handler
		const cantidad = document.getElementById('cantidad');
		if (cantidad) {
			  cantidad.addEventListener('blur', () => FormHandler.handleQuantityChange());
		}
		
		// Disable right-click context menu
		document.addEventListener('contextmenu', e => e.preventDefault());
});

// Check if consecutive limit exceeded
<? if ($consec > $ultimo_consec): ?>
setTimeout(() => window.close(), 10 * 60 * 1000);
document.body.innerHTML = '<?= $aviso_pedido ?>';
<? endif; ?>
</script>
<!-- *****************************************			 FIN DES-SELECCIONAR INPUT radio			 ***************************************** -->
	</form>
</div>
<script type=text/javascript>document.oncontextmenu = function(){return false}</script>
</body>
</html>
