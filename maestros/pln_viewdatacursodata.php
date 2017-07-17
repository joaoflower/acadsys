<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;

		$vQuery = "Select cu.cod_cur, cu.cod_cat, cu.nom_cur, cu.nom_ofi, cu.sem_anu, se.sem_des, cu.hrs_teo, cu.hrs_pra, cu.hrs_tot, ";
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
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
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
				<td width="75">Plan-C&oacute;digo :</td>
				<th width="150"><?=$_SESSION['sPlanPln_est']?> - <?=$aCurso['cod_cur']?></th>
				<td width="75">Cod. curso : </td>
				<th width="150"><?=$aCurso['cod_cat']?></th>
			  </tr>
			  <tr>
				<td>Nombre :</td>
				<th colspan="3"><?=$aCurso['nom_cur']?></th>
			  </tr>
			  <tr>
			    <td>Nombre Compl. : </td>
			    <th colspan="3"><?=$aCurso['nom_ofi']?></th>
		      </tr>
			  <tr>
			    <td>Semestre : </td>
			    <th><?=$aCurso['sem_des']?></th>
			    <td>Tipo Curso : </td>
			    <th><?=$aCurso['cur_des']?></th>
		      </tr>
			  <tr>
			    <td>Hrs. Teoricas: </td>
			    <th><?=$aCurso['hrs_teo']?></th>
			    <td>Hrs. Pr&aacute;cticas : </td>
			    <th><?=$aCurso['hrs_pra']?></th>
		      </tr>
			  <tr>
			    <td>Total Horas : </td>
			    <th><?=$aCurso['hrs_tot']?></th>
			    <td>Cr&eacute;ditos : </td>
			    <th><?=$aCurso['crd_cur']?></th>
		      </tr>
			  <tr>
			    <td>Tipo Pre-req. : </td>
			    <th><?=$aCurso['pre_des']?></th>
			    <td>Cred. Pre-req. : </td>
			    <th><?=$aCurso['crd_pre']?></th>
		      </tr>
			  <tr>
			    <td>Pre-requisitos : </td>
			    <th colspan="3" align="center"><center><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
				<?
					$vCont = 1;
					$vQuery = "select re.cur_pre, cu.cod_cat, cu.nom_cur ";
					$vQuery .= "from requ re left join curso cu on re.cod_car = cu.cod_car and ";
					$vQuery .= "re.pln_est = cu.pln_est and re.cur_pre = cu.cod_cur ";
					$vQuery .= "where re.cod_car = '{$_SESSION['sFrameCod_car']}' and re.pln_est = '{$_SESSION['sPlanPln_est']}' and ";
					$vQuery .= "re.cod_cur = '{$_SESSION['sPlanCod_cur']}' order by re.cur_pre ";
					
					$cRequ = fQuery($vQuery);
					$vNum_rows = fCountq($cRequ);
					while($aRequ = mysql_fetch_array($cRequ))
					{
				?>
					<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
					  <td width="40" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aRequ['cod_cat']?></td>
					  <td width="250" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aRequ['nom_cur']?></td>
					  <td width="16" <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="pln_delrequ('<?=$aRequ['cur_pre']?>'); return false;" class="enlaceb"><img src="../images/drop.png" alt="Eliminar" width="16" height="16" /></a></td>
					</tr>	
				<?
						$vCont++;
					}
				?>			
				</table><table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td>
						<div class="dboton"><a href="" onClick = "pln_newrequ('<?=$aCurso['sem_anu']?>'); return false;" class="inew" title="Nuevo requisito">Nuevo req. </a></div>
			
					</td>
				  </tr>
				</table></center></th>
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
			<div class="dboton"><a href="" onClick = "pln_newdatacurso(); return false;" class="inew" title="Nuevo curso">Nuevo cur.</a></div>
			<div class="dboton"><a href="" onClick = "pln_getdatacurso(); return false;" class="imodify" title="Modificar Datos">Modificar</a></div>		
			<div class="dboton"><a href="" onClick="pln_viewcursos('<?=$_SESSION['sPlanPln_est']?>'); return false;" class="icurso" title="Listar Cursos">Ver Cursos</a></div>	
		</td>
	  </tr>
	</table>
<?
	}
?>