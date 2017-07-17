<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	session_start();
	include "../include/funcget.php";
	include "../include/funcstyle.php";
	include "../include/funcsql.php";
	if(fsafetysetcaranoper())
	{
		if(!empty($_POST['rSem_anu']) and !empty($_POST['rSec_gru']) and !empty($_POST['rTur_est']))
		{
			$vCont = 1;
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
		        <th width="60">Semestre</th>
			    <th width="60">Modalidad</th>
			    <th width="45">Grupo</th>
			    <th width="45">Turno</th>
		      </tr>
			  <?
				$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
			  
			  	$vQuery = "select em.num_mat, concat(es.paterno, ' ', es.materno, ', ',es.nombres) as nom_est, ";
				$vQuery .= "se.sem_des, mm.mod_des, gr.sec_des, tu.tur_des ";
				$vQuery .= "from $tEstumat em ";
				$vQuery .= "left join estudiante es on em.num_mat = es.num_mat and em.cod_car = es.cod_car ";
				$vQuery .= "left join semestre se on em.sem_anu = se.sem_anu ";
				$vQuery .= "left join modmat mm on em.mod_mat = mm.mod_mat ";
				$vQuery .= "left join grupo gr on em.sec_gru = gr.sec_gru ";
				$vQuery .= "left join turno tu on em.tur_est = tu.tur_est ";
				$vQuery .= "where em.cod_car = '{$_SESSION['sFrameCod_car']}' and em.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "em.per_aca = '{$_SESSION['sFramePer_aca']}' ";
				
				if($_POST['rSem_anu'] != '99')
					$vQuery .= "and em.sem_anu = '{$_POST['rSem_anu']}' ";
				if($_POST['rSec_gru'] != '99')
					$vQuery .= "and em.sec_gru = '{$_POST['rSec_gru']}' ";
				if($_POST['rTur_est'] != '9')
					$vQuery .= "and em.tur_est = '{$_POST['rTur_est']}' ";
				
				$vQuery .= "order by nom_est ";
				
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
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['sem_des']))?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['mod_des']))?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['sec_des']))?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=ucwords(strtolower($aResult['tur_des']))?></td>
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
			<div class="dboton"><a href="prn_estumat.php" class="ireport" title="Imprimir" target="fReport">Imprimir</a></div>			
		</td>
	  </tr>
	</table>
	
	<div id="ddatos2"><iframe width='75' name ='fReport'  height='30' id='fReport' src='' scrolling='no' frameborder='0' > </iframe></div>
</center>
<?
	}
?>
