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
		if($_POST['rOption'] == 'Upd' and !empty($_POST['rMod_mat']))
		{
			$vQuery = "Select mod_mat, mod_des, mod_act, mod_not ";
			$vQuery .= "from modmat where mod_mat = '{$_POST['rMod_mat']}' ";
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sModMod_mat'] = $_POST['rMod_mat'];
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(mod_mat) as cod_ult ";
			$vQuery .= "from modmat ";
			
			$cResult = fQuery($vQuery);
			if($aResult2 = mysql_fetch_array($cResult))
			{
				$vCodigo = $aResult2['cod_ult'] + 1;
				$vCodigo = (strlen($vCodigo) == 1?"0":"").$vCodigo;
				$aResult['mod_mat'] = $_SESSION['sModMod_mat'] = $vCodigo;
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
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Modalidad de Matr&iacute;cula </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aResult['mod_mat']?></th>
				<td width="75">&nbsp;</td>
				<th width="150">&nbsp;</th>
			  </tr>
			  <tr>
			    <td>Denominaci&oacute;n :</td>
			    <th><input name="rMod_des" type="text" class="" id="rMod_des" value="<?=$aResult['mod_des']?>" size="20" maxlength="20" onblur="fupper(this);"/></th>
			    <td>Mod. Acta :</td>
			    <th><select name="rMod_act" id="rMod_act">
                  <? fviewmodact($aResult['mod_act']); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Mod. Nota </td>
			    <th><select name="rMod_not" id="rMod_not">
                  <? fviewmodnot($aResult['mod_not']); ?>
                </select></th>
			    <td>&nbsp;</td>
			    <th>&nbsp;</th>
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
			<div class="dboton"><a href="" onClick = "mat_savedatamodmat(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="clickmodmat(); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>