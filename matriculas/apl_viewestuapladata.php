<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{

?>

<center>
	
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Estudiantes Aplazados </th>
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
		        <th width="30"><p>Nota</p>
	            </th>
			  </tr>
			  <?
				$tApla = "apla".$_SESSION['sFrameAno_aca'];
				$tNota = "nota".$_SESSION['sFrameCod_car'];
			  
			  	$vQuery = "select cmt.*, no.not_cur ";
				$vQuery .= "from ( ";
				
				$vQuery .= "select cm.num_mat, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, mm.mod_des,  ";
				$vQuery .= "mm.mod_not, cm.cod_car, cm.ano_aca, cm.per_aca, cm.pln_est, cm.cod_cur ";
				$vQuery .= "from $tApla cm ";
				$vQuery .= "left join estudiante es on cm.num_mat = es.num_mat and cm.cod_car = es.cod_car ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
				$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca='{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and cm.pln_est = '{$_SESSION['sPrnPln_est']}' and ";
				$vQuery .= "cm.cod_cur = '{$_SESSION['sPrnCod_cur']}' and cm.sec_gru = '{$_SESSION['sPrnSec_gru']}' and ";
				$vQuery .= "mm.mod_act = '{$_SESSION['sPrnMod_act']}'";
				$vQuery .= "order by nom_est ";
				
				$vQuery .= ") cmt ";
				$vQuery .= "left join $tNota no on cmt.cod_car = no.cod_car and cmt.ano_aca = no.ano_aca and ";
				$vQuery .= "cmt.per_aca = no.per_aca and cmt.pln_est = no.pln_est and cmt.cod_cur = no.cod_cur and ";
				$vQuery .= "cmt.mod_not = no.mod_not and cmt.num_mat = no.num_mat ";
				
				$_SESSION['sPrnSql'] = $vQuery;

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
	            <td <?=ftdstylenota($vNum_rows, $vCont, $aResult['not_cur'])?>><?=$aResult['not_cur']?></td>
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
			<div class="dboton"><a href="prn_estumatcurso.php" class="ireport" title="Imprimir" target="fReport">Imprimir</a></div>
			<div class="dboton"><a href="prn_actacurso<?=($_SESSION['sFrameCod_car']>'03'?'c':'')?>.php" class="ireport" title="Imprimir Acta" target="fReport">Acta Eval.</a></div>
			<div class="dboton"><a href="" onClick = "apl_getnotaestuapla(); return false;" class="imodify" title="Insertar y/o Modificar notas">Inser.-Mod.</a></div>
			<div class="dboton"><a href="" onClick="clickaplazado(); return false;" class="icurso" title="Listar Cursos">Ver Cursos</a></div>	
		</td>
	  </tr>
	</table>
	
	<div id="ddatos2"><iframe width='75' name ='fReport'  height='30' id='fReport' src='' scrolling='no' frameborder='0' > </iframe></div>
	
  </center>

<?
	}
?>
