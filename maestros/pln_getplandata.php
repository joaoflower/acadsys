<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
		$vCont = 1;
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "pln_newplan(); return false;" class="inew" title="Nuevo plan">Nuevo plan </a></div>
		</td>
	  </tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Administraci&oacute;n de Planes de estudio </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			<tr>
			  <th width="30">Plan</th>
			  <th width="200">Doc. Creaci&oacute;n </th>
			  <th width="50">A&ntilde;o Ini.</th>
			  <th width="50">A&ntilde;o Fin</th>
			  <th width="40">Cr&eacute;ditos</th>
			  <th width="16">&nbsp;</th>
			  <th width="16">&nbsp;</th>
			</tr>
			<?
				$vQuery = "Select pln_est, doc_cre, ano_ini, ano_fin, tot_crd ";
				$vQuery .= "from plan where cod_car = '{$_SESSION['sFrameCod_car']}' ";
				$cPlan = fQuery($vQuery);
				$vNum_rows = fCountq($cPlan);
				while($aPlan = mysql_fetch_array($cPlan))
				{
			?>			
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aPlan['pln_est']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aPlan['doc_cre']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aPlan['ano_ini']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aPlan['ano_fin']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aPlan['tot_crd']?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><a href=""  onClick = "pln_editplan('<?=$aPlan['pln_est']?>'); return false;" class="linkicon"><img src="../images/edit.png" alt="Editar plan" width="16" height="16" /></a></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onClick="pln_viewcursos('<?=$aPlan['pln_est']?>'); return false;" class="linkicon"><img src="../images/browse.png" alt="Mostrar Cursos" width="16" height="16" /></a></td>
			</tr>	
			<?
					$vCont++;
				}
			?>
		  </table>
		  <div id="dresult"></div>
		</td>
		<td background="../images/ven_mediumright.jpg"></td>
	  </tr>
	  <tr>
		<td><img src="../images/ven_bottomleft.jpg" width="16" height="16" border="0" alt="" /></td>
		<td background="../images/ven_bottomcenter.jpg"></td>
		<td><img src="../images/ven_bottomright.jpg" width="16" height="16" border="0" alt="" /></td>
	  </tr>
	</table>
	<div id="ddatos"></div>
</center>
</form>
<?

	}
	else
	{
		header("Location:../index.php");
	}
?>