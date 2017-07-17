<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcstyle.php";
	include "../include/funcoption.php";
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;
		if($_POST['rOption'] == 'Upd' and !empty($_POST['rPln_est']))
		{
			$vQuery = "Select pln_est, doc_cre, ano_ini, ano_fin, tot_crd, des_pln ";
			$vQuery .= "from plan where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' ";
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sPlanPln_est'] = $_POST['rPln_est'];
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(pln_est) as cod_ult ";
			$vQuery .= "from plan where cod_car = '{$_SESSION['sFrameCod_car']}' ";
			
			$cResult = fQuery($vQuery);
			if($aResult2 = mysql_fetch_array($cResult))
			{
				$vPln_est = $aResult2['cod_ult'] + 1;
				$vPln_est = (strlen($vPln_est) == 1?"0":"").$vPln_est;
				$aResult['pln_est'] = $_SESSION['sPlanPln_est'] = $vPln_est;
				$aResult['tot_crd'] = 0.00;
				$aResult['des_pln'] = "PLAN";
				$bDatos = TRUE;
			}
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		$_SESSION['sPlanOption'] = $_POST['rOption'];
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Plan de Estudios </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">Plan Est. : </td>
				<th width="150"><?=$aResult['pln_est']?></th>
				<td width="75">&nbsp;</td>
				<th width="150">&nbsp;</th>
			  </tr>
			  
			  <tr>
			    <td>Doc. creaci&oacute;n :</td>
			    <th colspan="3"><input name="rDoc_cre" type="text" class="" id="rDoc_cre" value="<?=$aResult['doc_cre']?>" size="50" maxlength="50" onblur="fupper(this);"/></th>
		      </tr>
			  <tr>
			    <td>A&ntilde;o inicio :</td>
			    <th><input name="rAno_ini" type="text" class="" id="rAno_ini" value="<?=$aResult['ano_ini']?>" size="4" maxlength="4" /></th>
			    <td>A&ntilde;o final : </td>
			    <th><input name="rAno_fin" type="text" class="" id="rAno_fin" value="<?=$aResult['ano_fin']?>" size="4" maxlength="4" /></th>
			  </tr>
			  <tr>
			    <td>Creditos :</td>
			    <th><input name="rTot_crd" type="text" class="" id="rTot_crd" value="<?=$aResult['tot_crd']?>" size="5" maxlength="5" /></th>
			    <td>Descripci&oacute;n :</td>
			    <th><input name="rDes_pln" type="text" class="" id="rDes_pln" value="<?=$aResult['des_pln']?>" size="25" maxlength="50" onblur="fupper(this);"/></th>
			  </tr>
			</table>
		
		</td>
		<td background="../images/ven_mediumright.jpg"></td>
	  </tr>
	  <tr>
		<td><img src="../images/ven_bottomleft.jpg" width="16" height="16" border="0" alt="" /></td>
		<td background="../images/ven_bottomcenter.jpg"></td>
		<td><img src="../images/ven_bottomright.jpg" width="16" height="16" border="0" alt="" /></td>
	  </tr>
	</table>
			
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "pln_savedataplan(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="clickplanes(); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>