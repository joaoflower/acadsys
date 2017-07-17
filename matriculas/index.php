<?php
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcstyle.php";
	include "../include/funcoption.php";
	
	if(fsafetysetcaranoper())
	{
		$id_menu = 3;
		$_SESSION['sMatriMax_crd'] = 22;
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
<script language="JavaScript" src="../js/matriculas.js"></script>
<script language="JavaScript">
	function enfocar()
	{
		maximizar();
	}
	function aumentar(cont, vCanti, vMax)
	{ 
		if(cont.checked)
		{
			if((parseFloat(document.fData.rCrd_cur.value) + parseFloat(vCanti)) > parseFloat(vMax))
			{
				var vMsg = "A exedido los" + vMax + "CRÉDITOS permitidos, se QUITARA el curso escogido";
				alert(vMsg);
				cont.checked = false;
			}
			else
			{
				document.fData.rCrd_cur.value = parseFloat(document.fData.rCrd_cur.value) + parseFloat(vCanti);
				sombrear(cont);
			}
		}
		else
		{
			document.fData.rCrd_cur.value = parseFloat(document.fData.rCrd_cur.value) - parseFloat(vCanti);
			desombrear(cont);
		}
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
							<div class="dcelmenu"><a href="" onClick="clickingresantes(); return false;" class="iingresante">Ingresantes</a></div>
							<div class="dcelmenu"><a href="" onClick="clickregulares(); return false;" class="iregular">Regulares</a></div>
							<div class="dcelmenu"><a href="" onClick="clickedicion(); return false;" class="iedicion">Edici&oacute;n</a></div>
							<div class="dcelmenu"><a href="" onClick="clickcarga(); return false;" class="icarga">Carga Acad.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickaplazado(); return false;" class="iaplazado">Aplazados</a></div>
							<div class="dcelmenu"><a href="" onClick="clickestumat(); return false;" class="ireport">Estu. Matric.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickcurmat(); return false;" class="ireport">Estu. X Cur.</a></div>
							<div class="dcelmenu"><a href="" onClick="clickcuadrome(); return false;" class="imespago">Cuadro Me.</a></div>
					  	</div>	
					</td>
					<td valign="top" id="tdsubcontent">
						<div id="dsubcontent">
							<center>AcadSys&reg; </center>
					  	</div>
					</td>
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