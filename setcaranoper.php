<?php
	session_start();
	include "include/funcget.php";
	include "include/funcsql.php";
	include "include/funcstyle.php";
	include "include/funcoption.php";
	
	if(fsafetylogin())
	{
		$_SESSION['sSafetysetcaranoper'] = "";
		$vCont = 1;
	}
	else
	{
		header("Location:index.php");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/framelogin.css">
<link rel="stylesheet" href="css/frame.css">
<link rel="stylesheet" href="css/style.css">
<title>AcadSys&reg; - <?=$_SESSION['sFrameUniversity']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="js/function.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
	function enfocar()
	{
		maximizar();
	}
	
//-->
</script>
</head>
<body onLoad="enfocar();">
	<center>
	<form action="verifysetcaranoper.php" method="post" enctype="multipart/form-data" name="fSetcaranoper" id="fSetcaranoper"> 
	<div id="bodysetcaranoper">
		<div class="headercol"><img name="logo1" src="images/cabe_anoper.jpg" width="350" height="70" border="0" alt=""></div>	
		<div class="headercol">
			<table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
				<tr>
				  <th width="15">&nbsp; </th>
				  <th width="15">C</th>
				  <th width="160">Carrera Profesional </th>
				</tr>
				<?
					$vQuery = "select ca.cod_car, ca.car_des from carrera ca left join acceso ac on ac.cod_car = ca.cod_car ";
					$vQuery .= "where ac.cod_usu = '{$_SESSION['sUsercod_usu']}' ";

					$cCarrera = fQuery($vQuery);
					$vNum_rows = fCountq($cCarrera);
					while($aCarrera = mysql_fetch_array($cCarrera))
					{
				?>
				<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
				  <td <?=ftdstyle($vNum_rows, $vCont)?>><input name="rCod_car" type="radio" class="radio" value="<?=$aCarrera['cod_car']?>" <?=($_SESSION['sFrameCod_car'] == $aCarrera['cod_car'] ? "checked":"")?>></td>
				  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCarrera['cod_car']?></td>
				  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCarrera['car_des']?></td>
				</tr>
				<?
						$vCont++;
					}
				?>
		  	</table>
		</div>
		<div class="headercol">
			<table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			  <tr>
				<th width="115">A&ntilde;o Acad&eacute;mico </th>
			  </tr>
			  <tr>
				<td align="center"><select name="rAno_aca" id="rAno_aca">
					<? fviewano($_SESSION['sFrameAno_aca']); ?> 
				</select></td>
			  </tr>
			  <tr>
				<th>Periodo</th>
			  </tr>
			  <tr>
				<td align="center" class="tdultimo"><select name="rPer_aca" id="rPer_aca">
				  <? fviewperiodo($_SESSION['sFramePer_aca']); ?>
				</select></td>
			  </tr>
			  <tr>
				<td align="center"><div class="dboton"><a href="" onClick="document.fSetcaranoper.submit(); return false;" class="iok">Aceptar</a></div></td>
			  </tr>
			  <tr>
				<td align="center" class="tdultimo"><div class="dboton"><a href="" onClick="cerrar();" class="icancel">Cancelar</a></div></td>
			  </tr>
			</table>
		</div>
	  </div>
	  </form>	  
	</center>

</body>
</html>
