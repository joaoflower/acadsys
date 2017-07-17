<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
?>

<center>
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "not_newnotaestu(); return false;" class="inew" title="Nueva cargao">Nueva Nota </a></div>
		</td>
	  </tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Notas de: <?=$_SESSION['sNotaNom_est']?></th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="5">&nbsp;</th>
			    <th width="40">C&oacute;digo</th>
				<th width="220">Nombre curso </th>
		        <th width="15">Sem</th>
		        <th width="25">Crd</th>
		        <th width="40">Acta</th>
		        <th width="60">Modalidad</th>
			    <th width="40">Nota</th>
			    <th width="16">&nbsp;</th>
			  </tr>
			  <?
			  	$vAno_per = "";
				$tNota = "nota".$_SESSION['sFrameCod_car'];
				$_SESSION['sNotaPln_est'] = "01";
			  
			  	$vQuery = "select no.pln_est, no.cod_cur, cu.cod_cat, cu.nom_cur, cu.sem_anu, cu.crd_cur, no.cod_act, no.mod_not, ";
				$vQuery .= "mn.not_des, no.not_cur, no.ano_aca, no.per_aca, pe.per_des ";
				$vQuery .= "from $tNota no ";
				$vQuery .= "left join curso cu on no.cod_car = cu.cod_car and no.pln_est = cu.pln_est and no.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modnot mn on no.mod_not = mn.mod_not ";
				$vQuery .= "left join periodo pe on no.per_aca = pe.per_aca ";
				$vQuery .= "where no.num_mat = '{$_SESSION['sNotaNum_mat']}' and no.cod_car = '{$_SESSION['sNotaCod_car']}' ";
				$vQuery .= "order by no.ano_aca, no.per_aca, cu.sem_anu, no.cod_cur ";
				
				$_SESSION['sPrnSql'] = $vQuery;

				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
					$_SESSION['sNotaPln_est'] = $aResult['pln_est'];
					if($vAno_per != ($aResult['ano_aca'].$aResult['per_aca']))
					{
						$vAno_per = ($aResult['ano_aca'].$aResult['per_aca']);
			  ?>
			  <tr>
			    <td>&nbsp;</td>
		        <th colspan="7">A&ntilde;o: <?=$aResult['ano_aca']?> - Periodo: <?=$aResult['per_des']?></th>
		        <th>&nbsp;</th>
			  </tr>
			  <?
			  		}
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aResult['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>>&nbsp;</td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['cod_cat']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['nom_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['sem_anu']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['crd_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['cod_act']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['not_des']))?></td>
		        <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['not_cur'])?>><?=$aResult['not_cur']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="not_viewdatanota('<?=$aResult['pln_est']?>', '<?=$aResult['cod_cur']?>', '<?=$aResult['mod_not']?>', '<?=$aResult['ano_aca']?>', '<?=$aResult['per_aca']?>'); return false;" class="enlaceb"><img src="../images/browse.png" alt="Modificar nota" width="16" height="16" /></a></td>
			  </tr>
			  <?
					$vCont++;
			  	}
				$_SESSION['sNotaPln_est'] = '01';
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
			<div class="dboton"><a href="prn_notaestu.php" class="ireport" title="Imprimir" target="fReport">Imprimir</a></div>
			<div class="dboton"><a href="prn_histoacadcon.php" class="ireport" title="Historial Academico" target="fReport">Histo. Acad.</a></div>
			<div class="dboton"><a href="" onClick = "not_newnotaestu(); return false;" class="inew" title="Nueva cargao">Nueva Nota </a></div>
		</td>
	  </tr>
	</table>
	<div id="ddatos2"><iframe width='75' name ='fReport'  height='30' id='fReport' src='' scrolling='no' frameborder='0' > </iframe></div>
</center>	
<?
	}
?>