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
		
		$tNota = "nota".$_SESSION['sFrameCod_car'];
		
		if(!empty($_POST['rPln_est']) and !empty($_POST['rCod_cur']) and !empty($_POST['rMod_not']) and !empty($_POST['rAno_aca']) and !empty($_POST['rPer_aca']))
		{
		
			$vQuery = "select nota.*, se.sem_des ";
			$vQuery .= "from ( ";
			$vQuery .= "select no.pln_est, no.cod_cur, cu.nom_cur, cu.sem_anu, cu.crd_cur, no.cod_act, no.mod_not, ";
			$vQuery .= "mn.not_des, no.not_cur, no.ano_aca, no.per_aca, pe.per_des, pl.ano_ini, pl.ano_fin ";
			$vQuery .= "from $tNota no ";
			$vQuery .= "left join curso cu on no.cod_car = cu.cod_car and no.pln_est = cu.pln_est and no.cod_cur = cu.cod_cur ";
			$vQuery .= "left join modnot mn on no.mod_not = mn.mod_not ";
			$vQuery .= "left join periodo pe on no.per_aca = pe.per_aca ";
			$vQuery .= "left join plan pl on no.cod_car = pl.cod_car and no.pln_est = pl.pln_est ";
			$vQuery .= "where no.num_mat = '{$_SESSION['sNotaNum_mat']}' and no.cod_car = '{$_SESSION['sNotaCod_car']}' and ";
			$vQuery .= "no.pln_est = '{$_POST['rPln_est']}' and no.cod_cur = '{$_POST['rCod_cur']}' and ";
			$vQuery .= "no.mod_not = '{$_POST['rMod_not']}' and no.ano_aca = '{$_POST['rAno_aca']}' and ";
			$vQuery .= "no.per_aca = '{$_POST['rPer_aca']}' order by no.ano_aca, no.per_aca, cu.sem_anu, no.cod_cur ";
			$vQuery .= ") nota ";
			$vQuery .= "left join semestre se on nota.sem_anu = se.sem_anu ";

			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$_SESSION['sNotaPln_est'] = $_POST['rPln_est'];
				$_SESSION['sNotaCod_cur'] = $_POST['rCod_cur'];
				$_SESSION['sNotaMod_not'] = $_POST['rMod_not'];
				$_SESSION['sNotaAno_aca'] = $_POST['rAno_aca'];
				$_SESSION['sNotaPer_aca'] = $_POST['rPer_aca'];
				
				$bDatos = TRUE;
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
		<th background="../images/ven_topcenter.jpg">Modificar nota de: <?=$_SESSION['sNotaNom_est']?></th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
			    <td width="75">Plan Est. :</td>
			    <th width="150"><?=$aResult['pln_est']?> - [ <?=$aResult['ano_ini']?> - <?=$aResult['ano_fin']?> ]</th>
		        <td width="75">A&ntilde;o - Per.:</td>
		        <th width="150"><?=$aResult['ano_aca']?> - <?=$aResult['per_des']?></th>
			  </tr>
			  <tr>
			    <td>Curso :</td>
			    <th colspan="3"><?=$aResult['cod_cur']?> - <?=$aResult['nom_cur']?></th>
	          </tr>
			  <tr>
			    <td>Semestre :</td>
			    <th><?=$aResult['sem_des']?></th>
			    <td>Modalidad :</td>
			    <th><?=$aResult['not_des']?></th>
		      </tr>
			  <tr>
			    <td>Acta :</td>
			    <th><?=$aResult['cod_act']?></th>
		        <td>Nota :</td>
		        <th><input name="rNot_cur" type="text" class="<?=(fVerinotaapr($aResult['not_cur'])?"notaapr":"notades")?>" id="rNot_cur" value="<?=$aResult['not_cur']?>" size="2" maxlength="2" onkeyup="fverinota(this)"></th>
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
	
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "not_savedatanota(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="not_viewnotaestu('<?=$_SESSION['sNotaNum_mat']?>', '<?=$_SESSION['sNotaCod_car']?>'); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
	
  </center>

<?
	}
?>
