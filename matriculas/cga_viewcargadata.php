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
			<div class="dboton"><a href="" onClick = "cga_newcarga(); return false;" class="inew" title="Nueva cargao">Nueva Cga.</a></div>
		</td>
	  </tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Carga Acad&eacute;mica </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="5">&nbsp;</th>
			    <th width="20">C&oacute;d </th>
				<th width="200">Nombre curso </th>
		        <th width="60">Modalidad</th>
			    <th width="45">Grupo</th>
			    <th width="200">Docente</th>
			    <th width="16">&nbsp;</th>
			  </tr>
			  <?
			  	$vSem_anu = "";
				$tCarga = "carga".$_SESSION['sFrameAno_aca'];
			  
			  	$vQuery = "select cga.*, se.sem_des ";
				$vQuery .= "from ( ";
				$vQuery .= "select cg.pln_est, cg.cod_cur, cu.nom_cur, cu.sem_anu, cg.mod_act, ma.act_des, cg.sec_gru, ";
				$vQuery .= "gr.sec_des, cg.cod_prf, concat(do.paterno, ' ', do.materno, ', ', do.nombres) as nom_prf ";
				$vQuery .= "from $tCarga cg ";
				$vQuery .= "left join curso cu on cg.cod_car = cu.cod_car and cg.pln_est = cu.pln_est and cg.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modact ma on cg.mod_act = ma.mod_act ";
				$vQuery .= "left join grupo gr on cg.sec_gru = gr.sec_gru ";
				$vQuery .= "left join docente do on cg.cod_prf = do.cod_prf ";
				$vQuery .= "where cg.cod_car = '{$_SESSION['sFrameCod_car']}' and cg.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cg.per_aca = '{$_SESSION['sFramePer_aca']}' order by sem_anu, cod_cur, sec_gru ";
				$vQuery .= ") cga ";
				$vQuery .= "left join semestre se on cga.sem_anu = se.sem_anu ";

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
		        <th colspan="5">Semestre:
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
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['nom_prf']))?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="cga_delcarga('<?=$aResult['pln_est']?>', '<?=$aResult['cod_cur']?>', '<?=$aResult['sec_gru']?>', '<?=$aResult['mod_act']?>'); return false;" class="enlaceb"><img src="../images/drop.png" alt="Eliminar" width="16" height="16" /></a></td>
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
			<div class="dboton"><a href="" onClick = "cga_newcarga(); return false;" class="inew" title="Nueva cargao">Nueva Cga.</a></div>
		</td>
	  </tr>
	</table>

</center>
<? }	?>