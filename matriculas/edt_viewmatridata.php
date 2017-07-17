<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
		$_SESSION['sPrnSql'] = "";
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Edici&oacute;n de Matr&iacute;cula </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">Estudiante : </td>
				<th colspan="3"><?=$aResult['num_mat']?> - <?=$aResult['paterno']?> <?=$aResult['materno']?>, <?=$aResult['nombres']?></th>
		      </tr>
			  <tr>
			    <td width="75">Plan Est. :</td>
			    <th width="150"><?=$aResult['pln_est']?> - [ <?=$aResult['ano_ini']?> - <?=$aResult['ano_fin']?> ]</th>
		        <td width="75">Semestre : </td>
		        <th width="150"><?=$aResult['sem_des']?></th>
			  </tr>
			  <tr>
			    <td>Grupo - Turno: </td>
			    <th><?=$aResult['sec_des']?> - <?=$aResult['tur_des']?></th>
		        <td>Modalidad :</td>
		        <th><?=$aResult['mod_des']?></th>
			  </tr>
			  <tr>
			    <td>Crd. Matric. : </td>
			    <th><?=$aResult['tot_crd']?> Cr&eacute;ditos </th>
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
	
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Cursos matriculados </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="15">&nbsp;</th>
				<th width="20">C&oacute;d </th>
				<th width="220">Nombre de curso </th>
		        <th width="15">Sm</th>
		        <th width="60">Modalidad</th>
			    <th width="50">Grupo</th>
			    <th width="50">Turno</th>
			    <th width="25">Crd</th>
			    <th width="16">&nbsp;</th>
			    <th width="16">&nbsp;</th>
			  </tr>
			  <?
			  	$vQuery = "select cm.cod_cur, cu.cod_cat, cu.nom_cur, cu.sem_anu, cm.mod_mat, mm.mod_des, cm.sec_gru, ";
				$vQuery .= "gr.sec_des, cm.tur_est, tu.tur_des, cu.crd_cur ";
				$vQuery .= "from $tCurmat cm left join curso cu on cm.cod_car = cu.cod_car and ";
				$vQuery .= "cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat left join grupo gr on cm.sec_gru = gr.sec_gru ";
				$vQuery .= "left join turno tu on cm.tur_est = tu.tur_est ";
				$vQuery .= "where cm.num_mat = '{$_SESSION['sMatriNum_mat']}' and cm.cod_car = '{$_SESSION['sFrameCod_car']}' and ";
				$vQuery .= "cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and cm.per_aca = '{$_SESSION['sFramePer_aca']}' ";
				$vQuery .= "order by sem_anu, cod_cur ";
				
				$_SESSION['sPrnSql'] = $vQuery;
				
				$cCurso = fQuery($vQuery);
				$vNum_rows = fCountq($cCurso);
				while($aCurso = mysql_fetch_array($cCurso))
				{
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aCurso['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['cod_cur']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['nom_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sem_anu']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['mod_des']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sec_des']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['tur_des']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['crd_cur']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="edt_edtcurso('<?=$aCurso['cod_cur']?>'); return false;" class="enlaceb"><img src="../images/browse.png" alt="Modificar" width="16" height="16" /></a></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onclick="edt_delcurso('<?=$aCurso['cod_cur']?>', <?=$aCurso['crd_cur']?>); return false;" class="enlaceb"><img src="../images/drop.png" alt="Eliminar" width="16" height="16" /></a></td>
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
			<div class="dboton"><a href="prn_fichamatri.php" class="iprint" title="Imprimir" target="fReport">Imprimir</a></div>
			<? 	if($_SESSION['sMatriTot_crd'] < $_SESSION['sMatriMax_crd'])
				{
			?>
			<div class="dboton"><a href="" onClick = "edt_addcurso(); return false;" class="inew" title="Agregar cursos">Agr. cursos</a></div>		
			<?	}	?>
			<div class="dboton"><a href="" onClick = "edt_delmatri(); return false;" class="icancel" title="Eliminar Matrícula">Elim. Mat.</a></div>
			<div class="dboton"><a href="" onClick = "clickedicion(); return false;" class="isearch" title="Nueva busqueda">Nueva Ed.</a></div>	
			
			
		</td>
	  </tr>
	</table>
	<div id="ddatos2"><iframe width='100' name ='fReport'  height='50' id='fReport' src='' scrolling='no' frameborder='0' > </iframe></div>
</center>
</form>
<?
	}
?>
