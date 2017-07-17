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
		$bDatos = FALSE;
		
		$vCont = 1;
		$vCan_cur = 0;
		$vCod_cur = "";
		$vSec_gru = "";
		$vTur_est = "";
		
		$tEstumat = "estumat".$_SESSION['sFrameCod_car'].$_SESSION['sFrameAno_aca'];
		$tCurmat = "curmat".$_SESSION['sFrameCod_car'].$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rCod_cur']) and !empty($_POST['rSec_gru']) and !empty($_POST['rTur_est']) and !empty($_POST['rCrd_cur']))
		{
			$vCan_cur = strlen($_POST['rCod_cur']) / 3;
			if($vCan_cur > 0)
			{
				$vQuery = "insert into $tEstumat (num_mat, cod_car, ano_aca, per_aca, pln_est, sem_anu, sec_gru, mod_mat, tur_est, ";
				$vQuery .= "fch_mat, tot_crd, max_crd, num_rcb, cod_usu, obs_est) values ";
				$vQuery .= "('{$_SESSION['sMatriNum_mat']}', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', ";
				$vQuery .= "'{$_SESSION['sFramePer_aca']}', '{$_SESSION['sMatriPln_est']}', '{$_SESSION['sMatriSem_anu']}', ";
				$vQuery .= "'{$_SESSION['sMatriSec_gru']}', '{$_SESSION['sMatriMod_mat']}', '{$_SESSION['sMatriTur_est']}', ";
				$vQuery .= "now(), '{$_POST['rCrd_cur']}', '{$_SESSION['sMatriMax_crd']}', '', '{$_SESSION['sUsercod_usu']}', '') ";
				
				$cEstumat = fInupde($vQuery);
				if($cEstumat)
				{
					for($ii = 0; $ii < $vCan_cur; $ii++)
					{
						$vCod_cur = substr($_POST['rCod_cur'], 3 * $ii, 3);
						$vSec_gru = substr($_POST['rSec_gru'], 2 * $ii, 2);
						$vTur_est = substr($_POST['rTur_est'], 1 * $ii, 1);
						
						$vQuery = "insert into $tCurmat (num_mat, cod_car, ano_aca, per_aca, pln_est, cod_cur, sec_gru, mod_mat, ";
						$vQuery .= "tur_est, cod_usu) values ";
						$vQuery .= "('{$_SESSION['sMatriNum_mat']}', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', ";
						$vQuery .= "'{$_SESSION['sFramePer_aca']}', '{$_SESSION['sMatriPln_est']}', '$vCod_cur', '$vSec_gru', ";
						$vQuery .= "'{$_SESSION['sMatriMod_mat']}', '$vTur_est', '{$_SESSION['sUsercod_usu']}') ";
						
						$cCurmat = fInupde($vQuery);
					}
				}
			}			
		}		
		
		
		$bDatos = TRUE;
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Matricula realizada  </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">Estudiante : </td>
				<th colspan="3"><?=$_SESSION['sMatriNum_mat']?> - <?=$_SESSION['sMatriNombre']?></th>
		      </tr>
			  <tr>
			    <td width="75">Plan Est. :</td>
			    <th width="150"><?=$_SESSION['sMatriPln_des']?></th>
		        <td width="75">Semestre : </td>
		        <th width="150"><?=$_SESSION['sMatriSem_des']?></th>
			  </tr>
			  <tr>
			    <td>Grupo - Turno: </td>
			    <th><?=$_SESSION['sMatriSec_des']?> - <?=$_SESSION['sMatriTur_des']?></th>
		        <td>Modalidad :</td>
		        <th><?=$_SESSION['sMatriMod_des']?></th>
			  </tr>
			  <tr>
			    <td>Crd. Matric. : </td>
			    <th><?=$_POST['rCrd_cur']?> Cr&eacute;ditos </th>
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
				<th width="220">Nombre curso </th>
		        <th width="15">Sm</th>
		        <th width="60">Modalidad</th>
			    <th width="70">Grupo</th>
			    <th width="60">Turno</th>
			    <th width="25">Crd</th>
			  </tr>
			  <?
			  	$vQuery = "select cm.cod_cur, cu.nom_cur, cu.sem_anu, cm.mod_mat, mm.mod_des, cm.sec_gru, ";
				$vQuery .= "gr.sec_des, cm.tur_est, tu.tur_des, cu.crd_cur ";
				$vQuery .= "from $tCurmat cm left join curso cu on cm.cod_car = cu.cod_car and ";
				$vQuery .= "cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat left join grupo gr on cm.sec_gru = gr.sec_gru ";
				$vQuery .= "left join turno tu on cm.tur_est = tu.tur_est ";
				$vQuery .= "where cm.num_mat = '{$_SESSION['sMatriNum_mat']}' and cm.cod_car = '{$_SESSION['sFrameCod_car']}' and ";
				$vQuery .= "cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and cm.per_aca = '{$_SESSION['sFramePer_aca']}' ";
				$vQuery .= "order by sem_anu, cod_cur ";
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
			<div class="dboton"><a href="" onClick = "clickingresantes(); return false;" class="inew" title="Nueva Matr&iacute;cula">Nueva Mat.</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>
