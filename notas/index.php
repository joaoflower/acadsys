<?php
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcstyle.php";
	include "../include/funcoption.php";
	
	if(fsafetysetcaranoper())
	{
		$id_menu = 4;
		
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
<script language="JavaScript" src="../js/notas.js"></script>
<script language="JavaScript">
	function enfocar()
	{
		maximizar();
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
							<div class="dcelmenu"><a href="" onClick="clicknotaestu(); return false;" class="inestudiante">Nota Estud. </a></div>
							<div class="dcelmenu"><a href="" onClick="clicknotaacta(); return false;" class="inacta">Nota Actas</a></div>
					  	</div>	
					</td>
					<td valign="top" id="tdsubcontent">
						<div id="dsubcontent">
							<center>AcadSys&reg;</center>
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