<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	session_start();
	include "../include/funcget.php";
	include "../include/funcstyle.php";
	include "../include/funcsql.php";
	if(fsafetysetcaranoper())
	{
		$_SESSION['sPlanPln_est'] = "";
		$_SESSION['sPlanCod_cur'] = "";
		$vCont = 1;
		$vSem_anu = "";
	}
	else
	{
		header("Location:../index.php");
	}
?>

<center>
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "pln_newdatacurso(); return false;" class="inew" title="Nuevo curso">Nuevo cur.</a></div>
		</td>
	  </tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Administraci&oacute;n de Cursos </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistdata">
			<tr>
			  <th width="40">C&oacute;d</th>
			  <th width="250">Nombre</th>
			  <th width="20">Sm</th>
			  <th width="15">HT</th>
			  <th width="15">HP</th>
			  <th width="15">TH</th>
			  <th width="30">Cred</th>
			  <th width="60">Pre-req.</th>
			  <th width="16">&nbsp;</th>
			</tr>
			<?
				$_SESSION['sPlanPln_est'] = $_POST['rPln_est'];
				
				$sRequ = "";
				
				$vQuery = "select re.cod_cur, re.cur_pre, cu.cod_cat ";
				$vQuery .= "from requ re left join curso cu on re.cod_car = cu.cod_car and re.pln_est = cu.pln_est and ";
				$vQuery .= "re.cur_pre = cu.cod_cur ";
				$vQuery .= "where re.cod_car = '{$_SESSION['sFrameCod_car']}' and re.pln_est = '{$_POST['rPln_est']}' ";
				$vQuery .= "order by re.cod_cur, re.cur_pre ";
				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					if(empty($sRequ[$aResult['cod_cur']]))
						$sRequ[$aResult['cod_cur']] = $aResult['cod_cat'];
					else
						$sRequ[$aResult['cod_cur']] .= ", ".$aResult['cod_cat'];
				}
				
				$vQuery = "Select cod_cur, cod_cat, nom_cur, sem_anu, hrs_teo, hrs_pra, hrs_tot, crd_cur, tip_cur, tip_pre, crd_pre ";
				$vQuery .= "from curso where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' ";
				$vQuery .= "order by sem_anu, tip_cur, cod_cur ";
				$cCurso = fQuery($vQuery);
				$vNum_rows = fCountq($cCurso);
				while($aCurso = mysql_fetch_array($cCurso))
				{
					if($vSem_anu != $aCurso['sem_anu'])
					{
						$vSem_anu = $aCurso['sem_anu'];
			?>		
			<tr>
			  <th>&nbsp;</th>
			  <th colspan="8">SEMESTRE: <?=$aCurso['sem_anu']?></th>
		    </tr>	
			<?
					}
			?>
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['cod_cat']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['nom_cur']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sem_anu']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['hrs_teo']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['hrs_pra']?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['hrs_tot']?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['crd_cur']?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$sRequ[$aCurso['cod_cur']]?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onClick="pln_viewdatacurso('<?=$aCurso['cod_cur']?>'); return false;" class="linkicon"><img src="../images/browse.png" alt="Mostrar Curso" width="16" height="16" /></a></td>
			</tr>	
			<?
					$vCont++;
				}
			?>
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
			<div class="dboton"><a href="" onClick = "pln_newdatacurso(); return false;" class="inew" title="Nuevo curso">Nuevo cur.</a></div>
		</td>
	  </tr>
	</table>
</center>
