<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Estudiantes matriculados </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="20">N&deg;</th>
			    <th width="70">C&oacute;digo </th>
				<th width="210">Apellidos y Nombres </th>
		        <th width="60">Modalidad</th>
		        <th width="25">N-1</th>
		        <th width="25">N-2</th>
		        <th width="25">N-3</th>
		        <th width="25">NF</th>
			  </tr>
			  <?php
				$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
				$tNota = "nota".$_SESSION['sFrameCod_car'];
			  
			  	$vQuery = "select cmt.*, no.can_not, no.nota1, no.nota2, no.nota3, no.not_cur "; #cambiado
				$vQuery .= "from ( ";
				$vQuery .= "select cm.num_mat, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, mm.mod_des, ";
				$vQuery .= "mm.mod_not, cm.cod_car, cm.ano_aca, cm.per_aca, cm.pln_est, cm.cod_cur  ";
				$vQuery .= "from $tCurmat cm ";
				$vQuery .= "left join estudiante es on cm.num_mat = es.num_mat and cm.cod_car = es.cod_car ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
				$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and cm.pln_est = '{$_SESSION['sActaPln_est']}' and ";
				$vQuery .= "cm.cod_cur = '{$_SESSION['sActaCod_cur']}' and cm.sec_gru = '{$_SESSION['sActaSec_gru']}' and ";
				$vQuery .= "mm.mod_act = '{$_SESSION['sActaMod_act']}'";
				$vQuery .= "order by nom_est ";
				$vQuery .= ") cmt ";
				$vQuery .= "left join $tNota no on cmt.cod_car = no.cod_car and cmt.ano_aca = no.ano_aca and ";
				$vQuery .= "cmt.per_aca = no.per_aca and cmt.pln_est = no.pln_est and cmt.cod_cur = no.cod_cur and ";
				$vQuery .= "cmt.mod_not = no.mod_not and cmt.num_mat = no.num_mat ";

				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
					
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aResult['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['num_mat']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['nom_est']))?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['mod_des']))?></td>
	            <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['nota1'])?>><?=$aResult['nota1']?></td>
	            <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['nota2'])?>><?=$aResult['nota2']?></td>
	            <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['nota3'])?>><?=$aResult['nota3']?></td>
	            <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['not_cur'])?>><?=$aResult['not_cur']?></td>
			  </tr>
			  <?php
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
			<div class="dboton"><a href="" onClick = "nac_getnotaestucurso('1'); return false;" class="imodify" title="Insertar y/o Modificar notas de Examen">Examen</a></div>
			<div class="dboton"><a href="" onClick = "nac_getnotaestucurso('2'); return false;" class="imodify" title="Insertar y/o Modificar notas de Práctica">Práctica</a></div>
			<div class="dboton"><a href="" onClick = "nac_getnotaestucurso('3'); return false;" class="imodify" title="Insertar y/o Modificar notas de Trabajo">Trabajo</a></div>
			<div class="dboton"><a href="" onClick="clicknotaacta(); return false;" class="icurso" title="Listar Cursos">Ver Cursos</a></div>	
				
		</td>
	  </tr>
	</table>