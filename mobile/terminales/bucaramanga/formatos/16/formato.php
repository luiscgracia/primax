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
include ("../../firmas.php");
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
	<a href='https://api.whatsapp.com/send?phone=<?=$celular_soporte; ?>
	&text=<? if ($fecha <= date('Y-m-d / 12:00')) {echo 'Buenos días, ';} else {echo 'Buenas tardes, ';} ?>
	le escribo de PRIMAX <?=strtoupper($terminal); ?>, estoy diligenciando el formato <?=$$formulario; ?>.' target=_blank>
	<img src=../../../../../common/imagenes/whatsapp.png style=pointer-events:auto width=70 height=auto></a>
<!-- /2 -->	</div>
<form id=formato name=formato method=post action=grabardatos.php enctype=application_x-www-form-urlencoded autocomplete=off>
<!-- 3 -->		<div style="position:absolute; left:50vw; margin-left:-50vw; top:0px; width:100vw; height:3650px; overflow:hidden">
		<table border=0 style="color:black; background-color:rgba(255,255,255,1)">
			<tr><td width=20%></td><td width=60%></td><td width=20%></td></tr>
			<tr height=100>
				<td colspan=2>
					<input style=display:none name=estado value=value=<?=$estado_formulario1; ?> readonly>
					<span style="font-size:36px; width:100%; display:inline-block; background-color:NONE"><b><?=$$formulario; ?></b></span>
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
					<span style="font-size:24.00px; color:rgba(255,112,0,1)"><b>FORMATO WEB - Rev. Mayo 2014 / TERMINAL <?=strtoupper($terminal);?></b></span>
				</td>
			</tr>
		</table>
		<hr>
		<!-- *****************************************			 sección A			 ***************************************** -->
		<table><tr><td class=B><b>&nbsp;&nbsp;A. SOLICITUD</b></td></tr></table>
		<table border=0>
			<tr>
				<td style=width:25% class=A>					 <br>FECHA			 <input name=fechaA				type=date value='<?=$fechacero;?>'	min=<?=$fechamin;?> max=<?=$fechamax;?> required autofocus></td>
				<td style=width:25% class=A>			 HORA<br>INICIAL		 <input	name=horainicialA	type=time value='<?=$hora;?>'				min=<?=$horamin;?> required></td>
				<td style=width:25% class=A>			 HORA<br>FINAL			 <input	name=horafinalA		type=time value='<?=$hora;?>'				min=<?=$horamin;?> required></td>
				<td style=width:25% class=A>CERTIFICADO<br>HABILITACIÓN<input name=certhabilit	class=consecutivo style=width:80% maxlength=6 inputmode=numeric pattern=^(?:[0-9]{4,6})$ required></td>
			</tr>
	 		<tr height=30px><td></td></tr>
		</table>
		<table border=0>
			<tr>
				<td style="vertical-align:bottom; width:80%" class=A>DESCRIPCIÓN<textarea name=descripcion maxlength=68 style=width:99% onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
				<td style="vertical-align:bottom; width:20%" class=A>PERMISO<br>DE TRABAJO<input name=permisodetrabajo class=consecutivo style="width:100%; text-align:center" maxlength=5 inputmode=numeric pattern="^(?:[0-9]{4,6})$" required></td>
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
			<tr class=C><td class=A></td><td class=A>SI</td><td class=A>NO</td><td class=A></td></tr>
			<tr class=C>
				<td class=numero>1.&nbsp;</td>
				<td class=radio><input type=radio name= B1 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio name= B1 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=B>El contratista y su personal entienden el significado de "INTERFASE" y su importancia?</td>
			</tr>
			<tr class=C>
				<td class=numero>2.&nbsp;</td>
				<td colspan=3 class=B>Con cuál(es) actividad(es) / área(s) / función(es) involucra Interfases el trabajo? Indique: <input style=width:45% name=B2indique maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td></td>
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
				<td class=texto2>Tanques&nbsp;		</td><td><input name=B2a type=checkbox></td>
				<td class=texto2>Químicos&nbsp;		</td><td><input name=B2e type=checkbox></td>
				<td class=texto2>Ventas&nbsp;			</td><td><input name=B2i type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2m type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Llenadero&nbsp;	</td><td><input name=B2b type=checkbox></td>
				<td class=texto2>Laboratorio&nbsp;</td><td><input name=B2f type=checkbox></td>
				<td class=texto2>Customer&nbsp;<br>Service&nbsp;</td><td><input name=B2j type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2n type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Oficinas&nbsp;		</td><td><input name=B2c type=checkbox></td>
				<td class=texto2>Ingeniería&nbsp;	</td><td><input name=B2g type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2k type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2o type=checkbox></td>
				<td></td>
			</tr>
			<tr height=65px>
				<td></td>
				<td class=texto2>Flota&nbsp;			</td><td><input name=B2d type=checkbox></td>
				<td class=texto2>Security&nbsp;		</td><td><input name=B2h type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2l type=checkbox></td>
				<td class=texto2>									</td><td><input style=display:none name=B2p type=checkbox></td>
				<td></td>
			</tr>
		</table>
		<table border=0>
			<tr class=C style=height:10px><td width=5%></td><td width=5%></td><td width=5%></td><td width=85%></td></tr>
			<tr class=C>
				<td class=numero>3.&nbsp;</td>
				<td class=radio><input type=radio name= B3 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio name= B3 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=B>Se informó a los responsables de esa(s) actividad(es) / área(s) / función(es)?</td>
			</tr>
			<tr class=C>
				<td class=numero>4.&nbsp;</td>
				<td class=radio><input type=radio name= B4 value=SI onclick=gestionarClickRadio(this) required></td>
				<td class=radio><input type=radio name= B4 value=NO onclick=gestionarClickRadio(this)></td>
				<td class=B>El trabajo y las Interfases se registraron en las Bitácoras de los involucrados?</td>
			</tr>
			<tr class=C>
				<td class=numero>5.&nbsp;</td>
				<td colspan=3 class=B>Medidas de seguridad que se tomarán para hacer el trabajo controlando los riesgos generados por la interfase?</td>
			</tr>
			<tr class=C>
				<td></td>
				<td colspan=10><textarea style=width:98% id=B5 name=B5 maxlength=800 type=text placeholder="Medidas de seguridad" onkeyup=mayuscula(this) pattern=.{1,} required></textarea></td>
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
	 	<div style="position:absolute; width:59.50%; left:0.50%; background-color:white">
			<table border=1>
				<tr height=70px><td class=A3 style=width:42.10%>RESPONSABLE - ENTERADO</td></tr>
				<tr height=50px><td><input name=Cresponsable1 maxlength=30 type=text style=width:100% pattern=.{1,} onkeyup=mayuscula(this) required></td></tr>
				<tr height=50px><td><input name=Cresponsable2 maxlength=30 type=text style=width:100% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr height=50px><td><input name=Cresponsable3 maxlength=30 type=text style=width:100% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
				<tr height=50px><td><input name=Cresponsable4 maxlength=30 type=text style=width:100% pattern=.{1,} onkeyup=mayuscula(this)></td></tr>
			</table>
	 	</div>
	 	<div style="position:absolute; width:39.50%; left:60%; background-color:white; overflow:scroll">
			<table border=1 bordercolor=#ff7000>
				<tr height=70px><td style=width:350px class=A2>ÁREA</td><td style=width:350px class=A2>DEPARTAMENTO</td><td style=width:100px class=A2>FIRMA</td></tr>
				<tr height=50px>
					<td><input style=width:100% name=Carea1					maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:100% name=Cdepartamento1 maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style="display:none; width:100%" name=Cfirma1 maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:100% name=Carea2					maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td><input style=width:100% name=Cdepartamento2 maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td><input style="display:none; width:100%" name=Cfirma2 maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:100% name=Carea3					maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td><input style=width:100% name=Cdepartamento3 maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
					<td><input style="display:none; width:100%" name=Cfirma3 maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
				<tr height=50px>
					<td><input style=width:100% name=Carea4					maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style=width:100% name=Cdepartamento4 maxlength=20 type=text pattern=.{1,} onkeyup=mayuscula(this) required></td>
					<td><input style="display:none; width:100%" name=Cfirma4 maxlength=5 type=text pattern=.{1,} onkeyup=mayuscula(this)></td>
				</tr>
			</table>
		</div>
	 	<div style="position:absolute; top:2324px; background-color:white">
		<table border=0>
			<tr><td width=50%></td><td width=50%></td><td width=0%></td><td width=0%></td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=ejecutorC				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=nombreejecutorC	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecC			value='<?=$fechacero;?>' type=date class=mostrarfecha readonly></td>
				<td><input name=horaejecC				value='<?=$hora;?>' min=<?=$horamin;?> type=time class=mostrarhora  readonly></td>
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
				<td style=width:4%><input type=radio name=cancelacion id=A value=A onclick=gestionarClickRadio(this) required></td>
				<td style=width:23% class=B> &nbsp;Ha sido<br> &nbsp;completado</td>
				<td style=width:4%><input type=radio name=cancelacion id=B value=B onclick=gestionarClickRadio(this)></td>
				<td style=width:19% class=B> &nbsp;No se ha<br> &nbsp;iniciado</td>
				<td style=width:4%><input type=radio name=cancelacion id=C value=C onclick=gestionarClickRadio(this)></td>
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
					<textarea style=width:100% name=comentariosDa maxlength=90 type=text placeholder=Comentarios onkeyup=mayuscula(this) pattern=.{1,} required></textarea>
					<input style="display:none; width:100%" name=comentariosDb maxlength=100 type=text pattern=.{1,} onkeyup=mayuscula(this)>
				</td>
			</tr>
			<tr height=50><td></td></tr>
		</table>
		<table border=0>
			<tr><td width=60vw></td><td width=21vw></td><td width=19vw></td></tr>
			<tr>
				<td><input name=ejecutorD		type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaejecD	type=date  class=mostrarfecha value='<?=$fechacero;?>' readonly></td>
				<td><input name=horaejecD		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>EJECUTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr>
				<td><input name=inspectorD	type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechainspD	type=date  class=mostrarfecha value='<?=$fechacero;?>' readonly></td>
				<td><input name=horainspD		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>INSPECTOR</td><td></td><td>HORA</td></tr>
			<tr height=30><td></td></tr>
			<tr><td colspan=3><span>ESTE CERTIFICADO ES AHORA RETIRADO Y CANCELADO</td></tr>
			<tr>
				<td><input name=emisorD				type=texto maxlength=30 pattern=.{1,} onkeyup=mayuscula(this) required></td>
				<td><input name=fechaemisorD	type=date  class=mostrarfecha value='<?=$fechacero;?>' readonly></td>
				<td><input name=horaemisorD		type=time  value='<?=$hora;?>' min=<?=$horamin;?> required></td>
			</tr>
			<tr><td>EMISOR</td><td></td><td>HORA</td></tr>
		</table>
		<hr>
		<table>
			<tr height=10><td></td></tr>
			<tr style="background-color:rgba(0,240,0,0); height:15%">
				<td>
					<form method=post>
						<select name=usuario id=usuario style=width:67% type=texto required>
							<option value='' disabled selected>RESPONSABLE DEL FORMATO</option>
							<? for ($i = 0; $i < $numero_usuarios && $i < 10; $i++): ?>
								<option value="<?=$usuario[$i] ?>"><?=$usuario[$i] ?></option>
							<? endfor; ?>
						</select>
					</form>
				</td>
			</tr>
			<tr height=10><td></td></tr>
		</table>
		<hr>

		<!-- *****************************************			 FIN DEL FORMULARIO			 ***************************************** -->
		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Fecha diligenciamiento: <?=$fechaactual;?> / <?=$horaactual;?></span>
		<input style="display:none; width:3.10cm" type=texto name="fecha" value="<?=$fechaactual;?> / <?=$horaactual;?>" readonly><br>
<!--		<span style="font-family:Arlrdlt; font-size:32px; color:rgba(0,0,0,1)">Quedan <?=number_format($consec_por_usar,0,',','.');?> consecutivos, incluido este.</span><br> -->
		<table border=0>
			<tr height=100>
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
