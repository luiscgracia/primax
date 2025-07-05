<html>
<title>LISTADO POR TERMINAL</title>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<link rel="SHORTCUT ICON" href="../../../common/imagenes/iconoPRIMAX1.ico">
<link rel="stylesheet" href="../../../common/css/fuentes.css">
<style type="text/css">
  body{font-family:Arlrdbd; font-size:10px; margin-top: 0px}
  .encabezado	{position:fixed;		width:100%; z-index:10; color:rgba(0,0,0,1)}
  .contenido	{position:relative; width:100%; z-index: 9; color:rgba(0,0,0,1)}
  table				{table-layout:fixed; width:95%; margin-left:auto; margin-right:auto}
  td,th				{overflow:hidden; text-transform:uppercase; text-overflow:ellipsis; white-space:pre-wrap}
  td:hover		{overflow:visible; white-space:pre-wrap}
  tr:hover		{overflow:auto; font-weight:bold}
  .titulo			{border-top:solid white 0px; border-right:solid white 1px; border-bottom:solid white 0px; border-left:solid white 1px;
							 background-color:rgba(255,115,0,1); color:rgba(255,255,255,1); font-size:44px; font-family:Arlrdbd; text-align:center}
  .tabla			{width:100%; margin-left:auto; margin-right:auto}
  .cantidad 	{height: 50px; width:24%; font-family:SCHLBKB; font-size:42px; color:red;		text-align:center}
  .formato		{height: 50px; width:76%; font-family:Arlrdbd; font-size:36px; color:black; text-align:left; padding-left:10px; padding-right:10px;}
</style>
<script>
function closed() {window.open('','_parent',''); window.close();}
</script>
</head>
<body>
<?php
$query01="SELECT * FROM formulario01 ORDER BY consecutivo";
$numpermisos01=$conexion->query($query01);
$total01=$numpermisos01->num_rows;
$consult01 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario01 LIMIT 1');
$consulta01 = $consult01->fetch_array(MYSQLI_ASSOC);
$cons01 = (empty($consulta01['consecutivo']) ? $primerconsecutivo : $consulta01['consecutivo']);

$query02="SELECT * FROM formulario02 ORDER BY consecutivo";
$numpermisos02=$conexion->query($query02);
$total02=$numpermisos02->num_rows;
$consult02 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario02 LIMIT 1');
$consulta02 = $consult02->fetch_array(MYSQLI_ASSOC);
$cons02 = (empty($consulta02['consecutivo']) ? $primerconsecutivo : $consulta02['consecutivo']);

$query03="SELECT * FROM formulario03 ORDER BY consecutivo";
$numpermisos03=$conexion->query($query03);
$total03=$numpermisos03->num_rows;
$consult03 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario03 LIMIT 1');
$consulta03 = $consult03->fetch_array(MYSQLI_ASSOC);
$cons03 = (empty($consulta03['consecutivo']) ? $primerconsecutivo : $consulta03['consecutivo']);

$query04="SELECT * FROM formulario04 ORDER BY consecutivo";
$numpermisos04=$conexion->query($query04);
$total04=$numpermisos04->num_rows;
$consult04 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario04 LIMIT 1');
$consulta04 = $consult04->fetch_array(MYSQLI_ASSOC);
$cons04 = (empty($consulta04['consecutivo']) ? $primerconsecutivo : $consulta04['consecutivo']);

$query05="SELECT * FROM formulario05 ORDER BY consecutivo";
$numpermisos05=$conexion->query($query05);
$total05=$numpermisos05->num_rows;
$consult05 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario05 LIMIT 1');
$consulta05 = $consult05->fetch_array(MYSQLI_ASSOC);
$cons05 = (empty($consulta05['consecutivo']) ? $primerconsecutivo : $consulta05['consecutivo']);

$query05a="SELECT * FROM formulario05a ORDER BY consecutivo";
$numpermisos05a=$conexion->query($query05a);
$total05a=$numpermisos05a->num_rows;
$consult05a = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario05a LIMIT 1');
$consulta05a = $consult05a->fetch_array(MYSQLI_ASSOC);
$cons05a = (empty($consulta05a['consecutivo']) ? $primerconsecutivo : $consulta05a['consecutivo']);

$query05b="SELECT * FROM formulario05b ORDER BY consecutivo";
$numpermisos05b=$conexion->query($query05b);
$total05b=$numpermisos05b->num_rows;
$consult05b = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario05b LIMIT 1');
$consulta05b = $consult05b->fetch_array(MYSQLI_ASSOC);
$cons05b = (empty($consulta05b['consecutivo']) ? $primerconsecutivo : $consulta05b['consecutivo']);

$query08="SELECT * FROM formulario08 ORDER BY consecutivo";
$numpermisos08=$conexion->query($query08);
$total08=$numpermisos08->num_rows;
$consult08 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario08 LIMIT 1');
$consulta08 = $consult08->fetch_array(MYSQLI_ASSOC);
$cons08 = (empty($consulta08['consecutivo']) ? $primerconsecutivo : $consulta08['consecutivo']);

$query09="SELECT * FROM formulario09 ORDER BY consecutivo";
$numpermisos09=$conexion->query($query09);
$total09=$numpermisos09->num_rows;
$consult09 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario09 LIMIT 1');
$consulta09 = $consult09->fetch_array(MYSQLI_ASSOC);
$cons09 = (empty($consulta09['consecutivo']) ? $primerconsecutivo : $consulta09['consecutivo']);

$query13="SELECT * FROM formulario13 ORDER BY consecutivo";
$numpermisos13=$conexion->query($query13);
$total13=$numpermisos13->num_rows;
$consult13 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario13 LIMIT 1');
$consulta13 = $consult13->fetch_array(MYSQLI_ASSOC);
$cons13 = (empty($consulta13['consecutivo']) ? $primerconsecutivo : $consulta13['consecutivo']);

$query15A="SELECT * FROM formulario15A ORDER BY consecutivo";
$numpermisos15A=$conexion->query($query15A);
$total15A=$numpermisos15A->num_rows;
$consult15A = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario15A LIMIT 1');
$consulta15A = $consult15A->fetch_array(MYSQLI_ASSOC);
$cons15A = (empty($consulta15A['consecutivo']) ? $primerconsecutivo : $consulta15A['consecutivo']);

$query15M="SELECT * FROM formulario15M ORDER BY consecutivo";
$numpermisos15M=$conexion->query($query15M);
$total15M=$numpermisos15M->num_rows;
$consult15M= $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario15M LIMIT 1');
$consulta15M = $consult15M->fetch_array(MYSQLI_ASSOC);
$cons15M = (empty($consulta15M['consecutivo']) ? $primerconsecutivo : $consulta15M['consecutivo']);

$query16="SELECT * FROM formulario16 ORDER BY consecutivo";
$numpermisos16=$conexion->query($query16);
$total16=$numpermisos16->num_rows;
$consult16 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario16 LIMIT 1');
$consulta16 = $consult16->fetch_array(MYSQLI_ASSOC);
$cons16 = (empty($consulta16['consecutivo']) ? $primerconsecutivo : $consulta16['consecutivo']);

$query30="SELECT * FROM formulario30 ORDER BY consecutivo";
$numpermisos30=$conexion->query($query30);
$total30=$numpermisos30->num_rows;
$consult30 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario30 LIMIT 1');
$consulta30 = $consult30->fetch_array(MYSQLI_ASSOC);
$cons30 = (empty($consulta30['consecutivo']) ? $primerconsecutivo : $consulta30['consecutivo']);
if ($terminal<>"cartagena") {$total30 = $total30 - 1;}

$query31="SELECT * FROM formulario31 ORDER BY consecutivo";
$numpermisos31=$conexion->query($query31);
$total31=$numpermisos31->num_rows;
$consult31 = $conexion->query('SELECT MAX(consecutivo) as consecutivo FROM formulario31 LIMIT 1');
$consulta31 = $consult31->fetch_array(MYSQLI_ASSOC);
$cons31 = (empty($consulta31['consecutivo']) ? $primerconsecutivo : $consulta31['consecutivo']);

$total = $total01 + $total02 + $total03 + $total04 + $total05 + $total05a + $total05b + $total08 + $total09 + $total13 + $total15A + $total15M + $total16 + $total30 + $total31;

echo "<div style='position:fixed; left:50%; margin-left:-475px; top:0px; width:950px' class='encabezado'>
				<table border='0' cellpadding='0' cellspacing='0'>
				  <tr height='170px'>
				    <td class='titulo' style='width:23.5%'>#</td>
				    <td class='titulo' style='width:76.5%'>PERMISOS DE TRABAJO<br>TERMINAL "; echo $terminal; echo "</td>
				  </tr>
				</table>
      </div>";
echo "<div style='position:relative; left:50%; margin-left:-475px; top:170px; width:950px' class='contenido'>
				<table border='1' cellpadding='0' cellspacing='0'>";
		  	  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons01 == 0) {echo "----";}
								else {if ($cons01 <= 9) {echo "00000"; echo $cons01;}
									else {if ($cons01 <= 99) {echo "0000"; echo $cons01;}
										else {if ($cons01 <= 999) {echo "000"; echo $cons01;}
											else {if ($cons01 <= 9999) {echo "00"; echo $cons01;}
												else {if ($cons01 <= 99999) {echo "0"; echo $cons01;}
													else {if ($cons01 <= 999999) {echo $cons01;}
														else {if ($cons01 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario01; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons02 == 0) {echo "----";}
								else {if ($cons02 <= 9) {echo "00000"; echo $cons02;}
									else {if ($cons02 <= 99) {echo "0000"; echo $cons02;}
										else {if ($cons02 <= 999) {echo "000"; echo $cons02;}
											else {if ($cons02 <= 9999) {echo "00"; echo $cons02;}
												else {if ($cons02 <= 99999) {echo "0"; echo $cons02;}
													else {if ($cons02 <= 999999) {echo $cons02;}
														else {if ($cons02 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario02; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons03 == 0) {echo "----";}
								else {if ($cons03 <= 9) {echo "00000"; echo $cons03;}
									else {if ($cons03 <= 99) {echo "0000"; echo $cons03;}
										else {if ($cons03 <= 999) {echo "000"; echo $cons03;}
											else {if ($cons03 <= 9999) {echo "00"; echo $cons03;}
												else {if ($cons03 <= 99999) {echo "0"; echo $cons03;}
													else {if ($cons03 <= 999999) {echo $cons03;}
														else {if ($cons03 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario03; echo "</td>
					</tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons04 == 0) {echo "----";}
								else {if ($cons04 <= 9) {echo "00000"; echo $cons04;}
									else {if ($cons04 <= 99) {echo "0000"; echo $cons04;}
										else {if ($cons04 <= 999) {echo "000"; echo $cons04;}
											else {if ($cons04 <= 9999) {echo "00"; echo $cons04;}
												else {if ($cons04 <= 99999) {echo "0"; echo $cons04;}
													else {if ($cons04 <= 999999) {echo $cons04;}
														else {if ($cons04 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario04; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons05 == 0) {echo "----";}
								else {if ($cons05 <= 9) {echo "00000"; echo $cons05;}
									else {if ($cons05 <= 99) {echo "0000"; echo $cons05;}
										else {if ($cons05 <= 999) {echo "000"; echo $cons05;}
											else {if ($cons05 <= 9999) {echo "00"; echo $cons05;}
												else {if ($cons05 <= 99999) {echo "0"; echo $cons05;}
													else {if ($cons05 <= 999999) {echo $cons05;}
														else {if ($cons05 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario05; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons05a == 0) {echo "----";}
								else {if ($cons05a <= 9) {echo "00000"; echo $cons05a;}
									else {if ($cons05a <= 99) {echo "0000"; echo $cons05a;}
										else {if ($cons05a <= 999) {echo "000"; echo $cons05a;}
											else {if ($cons05a <= 9999) {echo "00"; echo $cons05a;}
												else {if ($cons05a <= 99999) {echo "0"; echo $cons05a;}
													else {if ($cons05a <= 999999) {echo $cons05a;}
														else {if ($cons05a >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario05a; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons05b == 0) {echo "----";}
								else {if ($cons05b <= 9) {echo "00000"; echo $cons05b;}
									else {if ($cons05b <= 99) {echo "0000"; echo $cons05b;}
										else {if ($cons05b <= 999) {echo "000"; echo $cons05b;}
											else {if ($cons05b <= 9999) {echo "00"; echo $cons05b;}
												else {if ($cons05b <= 99999) {echo "0"; echo $cons05b;}
													else {if ($cons05b <= 999999) {echo $cons05b;}
														else {if ($cons05b >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario05b; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons08 == 0) {echo "----";}
								else {if ($cons08 <= 9) {echo "00000"; echo $cons08;}
									else {if ($cons08 <= 99) {echo "0000"; echo $cons08;}
										else {if ($cons08 <= 999) {echo "000"; echo $cons08;}
											else {if ($cons08 <= 9999) {echo "00"; echo $cons08;}
												else {if ($cons08 <= 99999) {echo "0"; echo $cons08;}
													else {if ($cons08 <= 999999) {echo $cons08;}
														else {if ($cons08 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario08; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons09 == 0) {echo "----";}
								else {if ($cons09 <= 9) {echo "00000"; echo $cons09;}
									else {if ($cons09 <= 99) {echo "0000"; echo $cons09;}
										else {if ($cons09 <= 999) {echo "000"; echo $cons09;}
											else {if ($cons09 <= 9999) {echo "00"; echo $cons09;}
												else {if ($cons09 <= 99999) {echo "0"; echo $cons09;}
													else {if ($cons09 <= 999999) {echo $cons09;}
														else {if ($cons09 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario09; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons13 == 0) {echo "----";}
								else {if ($cons13 <= 9) {echo "00000"; echo $cons13;}
									else {if ($cons13 <= 99) {echo "0000"; echo $cons13;}
										else {if ($cons13 <= 999) {echo "000"; echo $cons13;}
											else {if ($cons13 <= 9999) {echo "00"; echo $cons13;}
												else {if ($cons13 <= 99999) {echo "0"; echo $cons13;}
													else {if ($cons13 <= 999999) {echo $cons13;}
														else {if ($cons13 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario13; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons15A == 0) {echo "----";}
								else {if ($cons15A <= 9) {echo "00000"; echo $cons15A;}
									else {if ($cons15A <= 99) {echo "0000"; echo $cons15A;}
										else {if ($cons15A <= 999) {echo "000"; echo $cons15A;}
											else {if ($cons15A <= 9999) {echo "00"; echo $cons15A;}
												else {if ($cons15A <= 99999) {echo "0"; echo $cons15A;}
													else {if ($cons15A <= 999999) {echo $cons15A;}
														else {if ($cons15A >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario15A; echo "</td>
		  		</tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons15M == 0) {echo "----";}
								else {if ($cons15M <= 9) {echo "00000"; echo $cons15M;}
									else {if ($cons15M <= 99) {echo "0000"; echo $cons15M;}
										else {if ($cons15M <= 999) {echo "000"; echo $cons15M;}
											else {if ($cons15M <= 9999) {echo "00"; echo $cons15M;}
												else {if ($cons15M <= 99999) {echo "0"; echo $cons15M;}
													else {if ($cons15M <= 999999) {echo $cons15M;}
														else {if ($cons15M >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario15M; echo "</td>
				  </tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons16 == 0) {echo "----";}
								else {if ($cons16 <= 9) {echo "00000"; echo $cons16;}
									else {if ($cons16 <= 99) {echo "0000"; echo $cons16;}
										else {if ($cons16 <= 999) {echo "000"; echo $cons16;}
											else {if ($cons16 <= 9999) {echo "00"; echo $cons16;}
												else {if ($cons16 <= 99999) {echo "0"; echo $cons16;}
													else {if ($cons16 <= 999999) {echo $cons16;}
														else {if ($cons16 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario16; echo "</td>
		  		</tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
				  echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons30 == 0) {echo "----";}
								else {if ($cons30 <= 9) {echo "00000"; echo $cons30;}
									else {if ($cons30 <= 99) {echo "0000"; echo $cons30;}
										else {if ($cons30 <= 999) {echo "000"; echo $cons30;}
											else {if ($cons30 <= 9999) {echo "00"; echo $cons30;}
												else {if ($cons30 <= 99999) {echo "0"; echo $cons30;}
													else {if ($cons30 <= 999999) {echo $cons30;}
														else {if ($cons30 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario30; echo "</td>
		  		</tr>";
echo "  </table>
				<table border='1' cellpadding='0' cellspacing='0'>";
					echo "<tr height='150px'>
						<td class='cantidad'>";
							if ($cons31 == 0) {echo "----";}
								else {if ($cons31 <= 9) {echo "00000"; echo $cons31;}
									else {if ($cons31 <= 99) {echo "0000"; echo $cons31;}
										else {if ($cons31 <= 999) {echo "000"; echo $cons31;}
											else {if ($cons31 <= 9999) {echo "00"; echo $cons31;}
												else {if ($cons31 <= 99999) {echo "0"; echo $cons31;}
													else {if ($cons31 <= 999999) {echo $cons31;}
														else {if ($cons31 >= 1000000) {echo "N/A";}}}}}}}} 
						echo "</td>
						<td class='formato'>"; echo $formulario31; echo "</td>
					</tr>";
echo "	</table>
				<br>
				<div style='text-align:center; vertical-align:top; font-size:36px'>
					Total de formatos diligenciados: <b>"; echo number_format($total,0,',','.'); echo "</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<br>
				  <a href='javascript:closed();'><img src='../../../common/imagenes/regresar.png' width='75' height='auto' title='Cerrar esta pestaña'></a>
				  <br><br><br><br>
				</div>
		  </div>"; //cierre <div class='contenido'>
?>
</body>
</html>
