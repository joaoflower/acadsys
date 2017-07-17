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
		if($_POST['rOption'] == 'Upd')
		{
			$vQuery = "Select cu.cod_cur, cu.nom_cur, cu.nom_ofi, cu.sem_anu, se.sem_des, cu.hrs_teo, cu.hrs_pra, cu.hrs_tot, ";
			$vQuery .= "cu.crd_cur, cu.tip_cur, tc.cur_des, cu.tip_pre, tp.pre_des, cu.crd_pre ";
			$vQuery .= "from curso cu left join semestre se on cu.sem_anu = se.sem_anu ";
			$vQuery .= "left join tipocur tc on cu.tip_cur = tc.tip_cur left join tipopre tp on cu.tip_pre = tp.tip_pre ";
			$vQuery .= "where cu.cod_car = '{$_SESSION['sFrameCod_car']}' and cu.pln_est = '{$_SESSION['sPlanPln_est']}' and ";
			$vQuery .= "cu.cod_cur = '{$_SESSION['sPlanCod_cur']}' ";
			$cCurso = fQuery($vQuery);
			if($aCurso = mysql_fetch_array($cCurso))
			{
				$bDatos = TRUE;
			}
		}
		elseif($_POST['rOption'] == 'Ins')
		{
			$vQuery = "select max(cod_cur) as cod_ult from curso ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_SESSION['sPlanPln_est']}' ";
			
			$cCurso = fQuery($vQuery);
			if($aCurso2 = mysql_fetch_array($cCurso))
			{
				$vCod_cur = $aCurso2['cod_ult'] + 1;
				$vCod_cur = (strlen($vCod_cur) == 1?"00":"").(strlen($vCod_cur) == 2?"0":"").$vCod_cur;
				$aCurso['cod_cur'] = $_SESSION['sPlanCod_cur'] = $vCod_cur;
				$aCurso['hrs_teo'] = 0.00;
				$aCurso['hrs_pra'] = 0.00;
				$aCurso['hrs_tot'] = 0.00;
				$aCurso['crd_cur'] = 0.00;
				$aCurso['crd_pre'] = 0.00;
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

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Curso </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aCurso['cod_cur']?></th>
				<td width="75">Plan Est. : </td>
				<th width="150"><?=$_SESSION['sPlanPln_est']?></th>
			  </tr>
			  <tr>
				<td>Nombre :</td>
				<th colspan="3"><input name="rNom_cur" type="text" class="" id="rNom_cur" value="<?=$aCurso['nom_cur']?>" size="50" maxlength="50" onblur="fupper(this); copynom_cur();"/></th>
			  </tr>
			  <tr>
			    <td>Nombre Compl. : </td>
			    <th colspan="3"><textarea name="rNom_ofi" cols="55" rows="2" id="rNom_ofi" onblur="fupper(this);"><?=$aCurso['nom_ofi']?></textarea>		       </th>
		      </tr>
			  <tr>
			    <td>Semestre : </td>
			    <th><select name="rSem_anu" id="rSem_anu">
					<? fviewsemestre($aCurso['sem_anu']); ?> 
				</select></th>
			    <td>Tipo Curso : </td>
			    <th><select name="rTip_cur" id="rTip_cur">
					<? fviewtipocur($aCurso['tip_cur']); ?> 
				</select></th>
		      </tr>
			  <tr>
			    <td>Hrs. Teoricas: </td>
			    <th><input name="rHrs_teo" type="text" class="" id="rHrs_teo" value="<?=$aCurso['hrs_teo']?>" size="2" maxlength="2" onblur="calcular();"/></th>
			    <td>Hrs. Pr&aacute;cticas : </td>
			    <th><input name="rHrs_pra" type="text" class="" id="rHrs_pra" value="<?=$aCurso['hrs_pra']?>" size="2" maxlength="2" onblur="calcular();"/></th>
		      </tr>
			  <tr>
			    <td>Total Horas : </td>
			    <th><input name="rHrs_tot" type="text" class="" id="rHrs_tot" value="<?=$aCurso['hrs_tot']?>" size="2" maxlength="2" disabled/></th>
			    <td>Cr&eacute;ditos : </td>
			    <th><input name="rCrd_cur" type="text" class="" id="rCrd_cur" value="<?=$aCurso['crd_cur']?>" size="5" maxlength="5"/></th>
		      </tr>
			  <tr>
			    <td>Tipo Pre-req. : </td>
			    <th><select name="rTip_pre" id="rTip_pre">
					<? fviewtipopre($aCurso['tip_pre']); ?> 
				</select></th>
			    <td>Cred. Pre-req. : </td>
			    <th><input name="rCrd_pre" type="text" class="" id="rCrd_pre" value="<?=$aCurso['crd_pre']?>" size="5" maxlength="5"/></th>
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
			<div class="dboton"><a href="" onClick = "pln_savedatacurso(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="pln_view<?=($_POST['rOption']=='Upd'?"datacurso":"cursos")?>('<?=($_POST['rOption']=='Upd'?$_SESSION['sPlanCod_cur']:$_SESSION['sPlanPln_est'])?>'); return false;" class="icancel" title="Modificar Datos">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>