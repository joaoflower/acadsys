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
	include "../include/funcoption.php";
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;
		
		$vCont = 1;
		$_SESSION['sPrnSql'] = "";
		$vCuadro = "";
		$vCuadroKey = "";
		$vCuadroNot = "";
		
		
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		$tNota = "nota".$_SESSION['sFrameCod_car'];
		
		if(!empty($_POST['rSem_anu']))
		{
		
			$vQuery = "select em.num_mat, em.cod_car, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, em.pln_est, ";
			$vQuery .= "em.mod_mat, mm.mod_des, no.pps, em.tot_crd, no.cra, no.crd, cm.cur_mat, no.ca, no.cd ";
			$vQuery .= "from $tEstumat em left join estudiante es on em.num_mat = es.num_mat and em.cod_car = es.cod_car ";
			$vQuery .= "left join modmat mm on em.mod_mat = mm.mod_mat ";
			$vQuery .= "left join ( ";
			$vQuery .= "  select num_mat, cod_car, count(*) as cur_mat ";
			$vQuery .= "  from $tCurmat cm ";
			$vQuery .= "  where cod_car = '{$_SESSION['sFrameCod_car']}' and per_aca = '{$_SESSION['sFramePer_aca']}' and ";
			$vQuery .= "    num_mat in (select num_mat from $tEstumat where cod_car = '{$_SESSION['sFrameCod_car']}' and ";
			$vQuery .= "      per_aca = '{$_SESSION['sFramePer_aca']}' and sem_anu = '{$_POST['rSem_anu']}') ";
			$vQuery .= "  group by num_mat ";
			$vQuery .= "  ) cm on em.num_mat = cm.num_mat and em.cod_car = cm.cod_car ";
			$vQuery .= "left join ( ";
			$vQuery .= "  select no.num_mat, no.cod_car, (sum(no.not_cur*cu.crd_cur)/sum(crd_cur)) as pps, ";
			$vQuery .= "    sum(if(no.not_cur>10, cu.crd_cur, 0)) as cra, sum(if(no.not_cur<=10, cu.crd_cur, 0)) as crd, ";
			$vQuery .= "    sum(if(no.not_cur>10, 1, 0)) as ca, sum(if(no.not_cur<=10, 1, 0)) as cd ";
			$vQuery .= "  from $tNota no left join curso cu on no.cod_car = cu.cod_car and no.pln_est = cu.pln_est and ";
			$vQuery .= "    no.cod_cur = cu.cod_cur ";
			$vQuery .= "  where no.ano_aca = '{$_SESSION['sFrameAno_aca']}' and no.cod_car = '{$_SESSION['sFrameCod_car']}' and ";
			$vQuery .= "    no.per_aca = '{$_SESSION['sFramePer_aca']}' and no.mod_not = '01' and ";
			$vQuery .= "    num_mat in (select num_mat from $tEstumat where cod_car = '{$_SESSION['sFrameCod_car']}' and ";
			$vQuery .= "      per_aca = '{$_SESSION['sFramePer_aca']}' and sem_anu = '{$_POST['rSem_anu']}') ";
			$vQuery .= "  group by num_mat ";
			$vQuery .= "  ) no on em.num_mat = no.num_mat and em.cod_car = no.cod_car ";
			$vQuery .= "where em.cod_car = '{$_SESSION['sFrameCod_car']}' and em.per_aca = '{$_SESSION['sFramePer_aca']}' and ";
			$vQuery .= "em.sem_anu = '{$_POST['rSem_anu']}'";

			$_SESSION['sPrnSql'] = $vQuery;
			
			$cResult = fQuery($vQuery);
			$vNum_rows = fCountq($cResult);
			while($aResult = mysql_fetch_array($cResult))
			{
				$bDatos = TRUE;
				$vCuadro[$aResult['num_mat']]['nom_est'] = $aResult['nom_est'];
				$vCuadro[$aResult['num_mat']]['mod_des'] = $aResult['mod_des'];
				$vCuadro[$aResult['num_mat']]['pps'] = (float)round($aResult['pps'], 2);
				$vCuadro[$aResult['num_mat']]['tot_crd'] = $aResult['tot_crd'];
				$vCuadro[$aResult['num_mat']]['cra'] = $aResult['cra'];
				$vCuadro[$aResult['num_mat']]['crd'] = $aResult['crd'];
				$vCuadro[$aResult['num_mat']]['cur_mat'] = $aResult['cur_mat'];
				$vCuadro[$aResult['num_mat']]['ca'] = $aResult['ca'];
				$vCuadro[$aResult['num_mat']]['cd'] = $aResult['cd'];
				
				if($vCuadro[$aResult['num_mat']]['pps'] > 0)
				{
					$vCuadroKey[$aResult['num_mat']] = "0";
				}
				else
				{
					$vCuadroKey[$aResult['num_mat']] = "1";
				}
				
				$vCuadroKey[$aResult['num_mat']] .= $aResult['cd'];
				$vCuadroNot[$aResult['num_mat']] = (float)round($aResult['pps'], 2);
				
/*				$_SESSION['sPrnPln_est'] = $_POST['rPln_est'];
				$_SESSION['sPrnCod_cur'] = $_POST['rCod_cur'];
				$_SESSION['sPrnSec_gru'] = $_POST['rSec_gru'];
				$_SESSION['sPrnMod_act'] = $_POST['rMod_act'];				
				
				$_SESSION['sPrnNom_cur'] = $aResult['nom_cur'];
				$_SESSION['sPrnSem_des'] = $aResult['sem_des'];
				$_SESSION['sPrnAct_des'] = $aResult['act_des'];
				$_SESSION['sPrnSec_des'] = $aResult['sec_des'];
				$_SESSION['sPrnTur_des'] = $aResult['tur_des'];
				
				$vQuery = "select ca.cod_prf, do.paterno, do.materno, do.nombres ";
				$vQuery .= "from $tCarga ca left join docente do on ca.cod_prf = do.cod_prf ";
				$vQuery .= "where ca.cod_car = '{$_SESSION['sFrameCod_car']}' and ca.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "ca.per_aca = '{$_SESSION['sFramePer_aca']}' and ca.pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "ca.cod_cur = '{$_POST['rCod_cur']}' and ca.sec_gru = '{$_POST['rSec_gru']}' and ";
				$vQuery .= "ca.mod_act = '{$_POST['rMod_act']}'  ";
				
				$cResult2 = fQuery($vQuery);
				if($aResult2 = mysql_fetch_array($cResult2))
				{
					$_SESSION['sPrnCod_prf'] = $aResult2['cod_prf'];
					$_SESSION['sPrnNom_prf'] = $aResult2['nombres']." ".$aResult2['paterno']." ".$aResult2['materno'];
				}*/
			}	
			
			if($bDatos == TRUE)
			{
				arsort($vCuadroNot);
				reset($vCuadroNot);
				
				$vOrd_not = 1;
				if(!empty($vCuadroNot))
				foreach($vCuadroNot as $vNum_mat => $aPPS)
				{
					if(strlen((string)$vOrd_not) == 1)
						$vCuadroKey[$vNum_mat] .= '00';
					if(strlen((string)$vOrd_not) == 2)
						$vCuadroKey[$vNum_mat] .= '0';
					$vCuadroKey[$vNum_mat] .= (string)$vOrd_not;
					$vOrd_not++;
				}	
				
				asort($vCuadroKey);
				reset($vCuadroKey);
			}
		}
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
				<th width="220">Apellidos y Nombres </th>
		        <th width="45">Mod.</th>
		        <th width="30">PPS</th>
			    <th width="30">CrM</th>
			    <th width="30">CrA</th>
			    <th width="30">CrD</th>
			    <th width="20">CM</th>
			    <th width="20">CA</th>
			    <th width="20">CD</th>
			  </tr>
			  <?
				/*$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
			  
			  	$vQuery = "select cm.num_mat, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, mm.mod_des ";
				$vQuery .= "from $tCurmat cm ";
				$vQuery .= "left join estudiante es on cm.num_mat = es.num_mat and cm.cod_car = es.cod_car ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
				$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and cm.pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "cm.cod_cur = '{$_POST['rCod_cur']}' and cm.sec_gru = '{$_POST['rSec_gru']}' and ";
				$vQuery .= "mm.mod_act = '{$_POST['rMod_act']}'";
				$vQuery .= "order by nom_est ";
				
				$_SESSION['sPrnSql'] = $vQuery;

				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))*/
				if(!empty($vCuadroKey))
				foreach($vCuadroKey as $vNum_mat => $vKey)
				{
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aResult['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vNum_mat?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($vCuadro[$vNum_mat]['nom_est']))?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($vCuadro[$vNum_mat]['mod_des']))?></td>
	            <td <?=ftdstyle($vNum_rows, $vCont)?> align="right" class="wordderb"  ><?=$vCuadro[$vNum_mat]['pps']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['tot_crd']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['cra']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['crd']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['cur_mat']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['ca']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCuadro[$vNum_mat]['cd']?></td>
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
	
	<!--<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="prn_estumatcurso.php" class="ireport" title="Imprimir" target="fReport">Imprimir</a></div>
			<div class="dboton"><a href="prn_actacurso<?=($_SESSION['sFrameCod_car']>'03'?'c':'')?>.php" class="ireport" title="Imprimir Acta" target="fReport">Acta Eval.</a></div>
		</td>
	  </tr>
	</table>
	 -->
	<div id="ddatos2"><iframe width='75' name ='fReport'  height='30' id='fReport' src='' scrolling='no' frameborder='0' > </iframe></div>
	
  </center>

<?
	}
?>
