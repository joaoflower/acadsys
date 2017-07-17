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
		if($_POST['rOption'] == 'Upd' and !empty($_POST['rPer_aca']))
		{
			$vQuery = "Select per_aca, per_des, per_abr ";
			$vQuery .= "from periodo where per_aca = '{$_POST['rPer_aca']}' ";
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sPerPer_aca'] = $_POST['rPer_aca'];
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(per_aca) as cod_ult ";
			$vQuery .= "from periodo ";
			
			$cResult = fQuery($vQuery);
			if($aResult2 = mysql_fetch_array($cResult))
			{
				$vPer_aca = $aResult2['cod_ult'] + 1;
				$vPer_aca = (strlen($vPer_aca) == 1?"0":"").$vPer_aca;
				$aResult['per_aca'] = $_SESSION['sPerPer_aca'] = $vPer_aca;
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
		$_SESSION['sPerOption'] = $_POST['rOption'];
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Periodo acad&eacute;mico </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aResult['per_aca']?></th>
				<td width="75">&nbsp;</td>
				<th width="150">&nbsp;</th>
			  </tr>
			  
			  <tr>
			    <td>Denominaci&oacute;n : </td>
			    <th><input name="rPer_des" type="text" class="" id="rPer_des" value="<?=$aResult['per_des']?>" size="11" maxlength="11" onblur="fupper(this);"/></th>
		        <td>Abreviatura :</td>
		        <th><input name="rPer_abr" type="text" class="" id="rPer_abr" value="<?=$aResult['per_abr']?>" size="5" maxlength="5" onblur="fupper(this);"/></th>
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
			<div class="dboton"><a href="" onClick = "per_savedataperiodo(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="clickperiodo(); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>