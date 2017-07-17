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
		
		$_SESSION['sActaPln_est'] = "";
		$_SESSION['sActaCod_cur'] = "";
		$_SESSION['sActaSec_gru'] = "";
		$_SESSION['sActaMod_act'] = "";
		
		$vCont = 1;
		
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rPln_est']) and !empty($_POST['rCod_cur']) and !empty($_POST['rSec_gru']) and !empty($_POST['rMod_act']))
		{
		
			$vQuery = "select cmt.*, se.sem_des, ma.act_des ";
			$vQuery .= "from ( ";
			$vQuery .= "select distinct cm.pln_est, cm.cod_cur, cu.nom_cur, cu.sem_anu, cm.mod_mat, mm.mod_act, ";
			$vQuery .= "cm.sec_gru, gr.sec_des, cm.tur_est, tu.tur_des, pl.ano_ini, pl.ano_fin ";
			$vQuery .= "from $tCurmat cm ";
			$vQuery .= "left join curso cu on cm.cod_car = cu.cod_car and cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
			$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
			$vQuery .= "left join grupo gr on cm.sec_gru = gr.sec_gru ";
			$vQuery .= "left join turno tu on cm.tur_est = tu.tur_est ";
			$vQuery .= "left join plan pl on cm.cod_car = pl.cod_car and cm.pln_est = pl.pln_est ";
			$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
			$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and cm.pln_est = '{$_POST['rPln_est']}' and ";
			$vQuery .= "cm.cod_cur = '{$_POST['rCod_cur']}' and cm.sec_gru = '{$_POST['rSec_gru']}' and ";
			$vQuery .= "mm.mod_act = '{$_POST['rMod_act']}' order by sem_anu, cod_cur, sec_gru ";
			$vQuery .= ") cmt ";
			$vQuery .= "left join semestre se on cmt.sem_anu = se.sem_anu ";
			$vQuery .= "left join modact ma on cmt.mod_act = ma.mod_act ";
			
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$bDatos = TRUE;
				$_SESSION['sActaPln_est'] = $_POST['rPln_est'];
				$_SESSION['sActaCod_cur'] = $_POST['rCod_cur'];
				$_SESSION['sActaSec_gru'] = $_POST['rSec_gru'];
				$_SESSION['sActaMod_act'] = $_POST['rMod_act'];
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
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Notas de Estudiantes por Curso </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
			    <td width="75">Plan Est. :</td>
			    <th width="150"><?=$aResult['pln_est']?> - [ <?=$aResult['ano_ini']?> - <?=$aResult['ano_fin']?> ]</th>
		        <td width="75">C&oacute;digo :</td>
		        <th width="150"><?=$_POST['rCod_cur']?></th>
			  </tr>
			  <tr>
			    <td>Curso :</td>
			    <th colspan="3"><?=$_POST['rCod_cur']?> - <?=$aResult['nom_cur']?></th>
	          </tr>
			  <tr>
			    <td>Semestre :</td>
			    <th><?=$aResult['sem_des']?></th>
			    <td>Modalidad :</td>
			    <th><?=$aResult['act_des']?></th>
		      </tr>
			  <tr>
			    <td>Grupo :</td>
			    <th><?=$aResult['sec_des']?></th>
		        <td>Turno :</td>
		        <th><?=$aResult['tur_des']?></th>
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
	<div id="ddatos">
		<? include "nac_viewestucursodata.php"; ?>
	</div>
  </center>
</form>
<?
	}
?>
