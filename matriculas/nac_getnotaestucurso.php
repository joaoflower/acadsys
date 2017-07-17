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

	if(fsafetysetcaranoper())
	{
		$vCont = 1;
		$bDatos = TRUE;
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
		<th background="../images/ven_topcenter.jpg">Estudiantes matriculados </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="20">N&deg;</th>
			    <th width="30">C&oacute;digo </th>
				<th width="250">Apellidos y Nombres </th>
		        <th width="60">Modalidad</th>
		        <th width="30">Nota</th>
			  </tr>
			  <?
				$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
				$tNota = "nota".$_SESSION['sFrameCod_car'];
			  
			  	$vQuery = "select cmt.*, no.not_cur ";
				$vQuery .= "from ( ";
				$vQuery .= "select cm.num_mat, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, mm.mod_des, ";
				$vQuery .= "mm.mod_not, cm.mod_mat, cm.cod_car, cm.ano_aca, cm.per_aca, cm.pln_est, cm.cod_cur  ";
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
	            <td <?=ftdstyle($vNum_rows, $vCont)?>><input name="<?=strlen($aResult['num_mat']).$aResult['num_mat']?>" type="text" class="<?=(fVerinotaapr($aResult['not_cur'])?"notaapr":"notades")?>" id="<?=strlen($aResult['num_mat']).$aResult['num_mat']?>" value="<?=$aResult['not_cur']?>" size="2" maxlength="2" onkeyup="fverinota(this)"><input name="rMod_not<?=strlen($aResult['num_mat']).$aResult['num_mat']?>" type="hidden" id="rMod_not<?=strlen($aResult['num_mat']).$aResult['num_mat']?>" value="<?=$aResult['mod_not'].$aResult['mod_mat'].(fIsnota($aResult['not_cur'])?"u":"i")?>" /></td>
			  </tr>
			  <?
					$vCont++;
			  	}
				$_SESSION['sActaCan_est'] = $vCont - 1;
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
			<div class="dboton"><a href="" onClick = "not_savenotaestucurso(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onclick="nac_viewestucurso('<?=$_SESSION['sActaPln_est']?>', '<?=$_SESSION['sActaCod_cur']?>', '<?=$_SESSION['sActaSec_gru']?>', '<?=$_SESSION['sActaMod_act']?>'); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>