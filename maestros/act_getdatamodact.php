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
		if($_POST['rOption'] == 'Upd' and !empty($_POST['rMod_act']))
		{
			$vQuery = "Select mod_act, act_des ";
			$vQuery .= "from modact where mod_act = '{$_POST['rMod_act']}' ";
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sModMod_act'] = $_POST['rMod_act'];
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(mod_act) as cod_ult ";
			$vQuery .= "from modact ";
			
			$cResult = fQuery($vQuery);
			if($aResult2 = mysql_fetch_array($cResult))
			{
				$vCodigo = $aResult2['cod_ult'] + 1;
				$vCodigo = (strlen($vCodigo) == 1?"0":"").$vCodigo;
				$aResult['mod_act'] = $_SESSION['sModMod_act'] = $vCodigo;
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
		$_SESSION['sModOption'] = $_POST['rOption'];
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Modalidad de Acta </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aResult['mod_act']?></th>
				<td width="75">Denominaci&oacute;n :</td>
				<th width="150"><input name="rAct_des" type="text" class="" id="rAct_des" value="<?=$aResult['act_des']?>" size="20" maxlength="20" onblur="fupper(this);"/></th>
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
			<div class="dboton"><a href="" onClick = "act_savedatamodact(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="clickmodact(); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>