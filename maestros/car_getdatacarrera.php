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
		if($_POST['rOption'] == 'Upd' and !empty($_POST['rCod_car']))
		{
			$vQuery = "Select cod_car, car_des, doc_cre, ano_dur, sem_dur, grado, titulo, abr_car ";
			$vQuery .= "from carrera where cod_car = '{$_POST['rCod_car']}' ";
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sCarCod_car'] = $_POST['rCod_car'];
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(cod_car) as cod_ult ";
			$vQuery .= "from carrera ";
			
			$cResult = fQuery($vQuery);
			if($aResult2 = mysql_fetch_array($cResult))
			{
				$vCod_car = $aResult2['cod_ult'] + 1;
				$vCod_car = (strlen($vCod_car) == 1?"0":"").$vCod_car;
				$aResult['cod_car'] = $_SESSION['sCarCod_car'] = $vCod_car;
				$aResult['ano_dur'] = 5;
				$aResult['sem_dur'] = 10;
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
		$_SESSION['sCarOption'] = $_POST['rOption'];
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Carrera profesional </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aResult['cod_car']?></th>
				<td width="75">Abreviatura :</td>
				<th width="150"><input name="rAbr_car" type="text" class="" id="rAbr_car" value="<?=$aResult['abr_car']?>" size="10" maxlength="10" onblur="fupper(this);"/></th>
			  </tr>
			  
			  <tr>
			    <td>Denominaci&oacute;n : </td>
			    <th colspan="3"><input name="rCar_des" type="text" class="" id="rCar_des" value="<?=$aResult['car_des']?>" size="70" maxlength="70" onblur="fupper(this);"/></th>
		      </tr>
			  <tr>
			    <td>Doc. creaci&oacute;n :</td>
			    <th colspan="3"><input name="rDoc_cre" type="text" class="" id="rDoc_cre" value="<?=$aResult['doc_cre']?>" size="70" maxlength="70" onblur="fupper(this);"/></th>
		      </tr>
			  <tr>
			    <td>A&ntilde;os duraci&oacute;n :</td>
			    <th><input name="rAno_dur" type="text" class="" id="rAno_dur" value="<?=$aResult['ano_dur']?>" size="1" maxlength="1" /></th>
			    <td>Sem. duraci&oacute;n :</td>
			    <th><input name="rSem_dur" type="text" class="" id="rSem_dur" value="<?=$aResult['sem_dur']?>" size="2" maxlength="2" /></th>
			  </tr>
			  <tr>
			    <td>Grado :</td>
			    <th colspan="3"><input name="rGrado" type="text" class="" id="rGrado" value="<?=$aResult['grado']?>" size="70" maxlength="70" onblur="fupper(this);"/></th>
			  </tr>
			  <tr>
			    <td>T&iacute;tulo :</td>
			    <th colspan="3"><input name="rTitulo" type="text" class="" id="rTitulo" value="<?=$aResult['titulo']?>" size="70" maxlength="70" onblur="fupper(this);"/></th>
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
			<div class="dboton"><a href="" onClick = "car_savedatacarrera(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="clickcarreras(); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>