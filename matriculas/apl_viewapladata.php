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
			<div class="dboton"><a href="" onClick = "apl_newapla(); return false;" class="inew" title="Nueva cargao">Nuevo Apla. </a></div>
		</td>
	  </tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Cursos Matriculados </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="5">&nbsp;</th>
			    <th width="20">C&oacute;d </th>
				<th width="300">Nombre curso </th>
		        <th width="60">Modalidad</th>
			    <th width="45">Grupo</th>
			    <th width="16">&nbsp;</th>
			  </tr>
			  <?
			  	$vSem_anu = "";
				$tApla = "apla".$_SESSION['sFrameAno_aca'];
			  
			  	$vQuery = "select cmt.*, se.sem_des, ma.act_des ";
				$vQuery .= "from ( ";
				$vQuery .= "select distinct cm.pln_est, cm.cod_cur, cu.nom_cur, cu.sem_anu, mm.mod_act, ";
				$vQuery .= "cm.sec_gru, gr.sec_des ";
				$vQuery .= "from $tApla cm ";
				$vQuery .= "left join curso cu on cm.cod_car = cu.cod_car and cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
				$vQuery .= "left join grupo gr on cm.sec_gru = gr.sec_gru ";
				$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' order by sem_anu, cod_cur, sec_gru ";
				$vQuery .= ") cmt ";
				$vQuery .= "left join semestre se on cmt.sem_anu = se.sem_anu ";
				$vQuery .= "left join modact ma on cmt.mod_act = ma.mod_act ";

				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
					if($vSem_anu != $aResult['sem_anu'])
					{
						$vSem_anu = $aResult['sem_anu'];
			  ?>
			  <tr>
			    <td>&nbsp;</td>
		        <th colspan="4">Semestre:
                <?=$aResult['sem_des']?></th>
		        <th>&nbsp;</th>
			  </tr>
			  <?
			  		}
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aResult['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>>&nbsp;</td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['cod_cur']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['nom_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['act_des']))?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['sec_des']))?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="apl_viewestuapla('<?=$aResult['pln_est']?>', '<?=$aResult['cod_cur']?>', '<?=$aResult['sec_gru']?>', '<?=$aResult['mod_act']?>'); return false;" class="enlaceb"><img src="../images/browse.png" alt="Listar estudiantes" width="16" height="16" /></a></td>
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
			<div class="dboton"><a href="" onClick = "apl_newapla(); return false;" class="inew" title="Nueva cargao">Nuevo Apla. </a></div>
		</td>
	  </tr>
	</table>

</center>
<? }	?>