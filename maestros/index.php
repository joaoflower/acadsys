<?php
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcstyle.php";
	include "../include/funcoption.php";
	
	if(fsafetysetcaranoper())
	{
		$id_menu = 2;
	}
	else
	{
		header("Location:../index.php");
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/frame.css">
<link rel="stylesheet" href="../css/framelogin.css">
<link rel="stylesheet" href="../css/style.css">
<title>AcadSys&reg; - <?=$_SESSION['sFrameUniversity']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="../js/ggw3.js"></script>
<script language="JavaScript" src="../js/function.js"></script>
<script language="JavaScript" src="../js/maestros.js"></script>
<script language="JavaScript">
	function enfocar()
	{
		maximizar();
	}
	function calcular()
	{
		document.fData.rHrs_tot.value = parseInt(document.fData.rHrs_teo.value) + parseInt(document.fData.rHrs_pra.value);
		document.fData.rCrd_cur.value = parseInt(document.fData.rHrs_teo.value) + (parseInt(document.fData.rHrs_pra.value) * 0.5);
	}
	function copynom_cur()
	{
		document.fData.rNom_ofi.value = document.fData.rNom_cur.value;
	}
</script>

</head>

<body onLoad="enfocar();">
	<center>
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<? include "../include/header1.php"; ?>
			<? include "../include/menu1.php"; ?>
			
			<div id="dcontent">
				<table width="770" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="tcontent">
				  <tr id="trcontent">
					<td width="90" valign="top" id="tdsubmenu">
					  <div id="dsubmenu">
							<div class="dcelmenu"><a href="" onClick="clickestudiantes(); return false;" class="iestudiante" title="Administraci&oacute;n de Estudiantes">Estudiantes</a></div>
							<div class="dcelmenu"><a href="" onClick="clickdocentes(); return false;" class="idocente" title="Administraci&oacute;n de Docentes">Docentes</a></div>
							<div class="dcelmenu"><a href="" onClick="clickplanes(); return false;" class="iplan"title="Administraci&oacute;n de Planes de estudio">Plan Estudio</a></div>
					        <div class="dcelmenu"><a href="" onClick="clickcarreras(); return false;" class="icarrera"title="Administraci&oacute;n de Carreras">Carreras</a></div>
							<div class="dcelmenu"><a href="" onClick="clickano(); return false;" class="iano" title="Año Académico">Año Acad.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickperiodo(); return false;" class="iperiodo" title="Periodo Acad&eacute;mico">Periodo Ac.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickmodact(); return false;" class="imodact" title="Modalidad de Acta">Mod. Acta</a></div>
							<div class="dcelmenu"><a href="" onClick="clickmodnot(); return false;" class="imodnot" title="Modalidad de Nota">Mod. Nota</a></div>
							<div class="dcelmenu"><a href="" onClick="clickmodmat(); return false;" class="imodmat" title="Modalidad de Matr&iacute;cula">Mod. Matric.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickgrupo(); return false;" class="igrupo" title="Grupos">Grupos</a></div>
					  </div></td>
					<td valign="top" id="tdsubcontent">
						<div id="dsubcontent">
							<center>
							  AcadSys&reg; 
							</center>
					  	</div>					</td>
				  </tr>
				</table>    
			</div>
			<? include "../include/foot1.php"; ?>	
		</td>
	  </tr>
	</table>
	</center>
</body>
</html>