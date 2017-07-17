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
		
		
		if(!empty($_POST['rPln_est']) and !empty($_POST['rSem_anu']) and !empty($_POST['rSec_gru']) and !empty($_POST['rTur_est']) and !empty($_POST['rMod_mat']))
		{
			$_SESSION['sMatriPln_est'] = $_POST['rPln_est'];
			$_SESSION['sMatriSem_anu'] = $_POST['rSem_anu'];
			$_SESSION['sMatriSec_gru'] = $_POST['rSec_gru'];
			$_SESSION['sMatriTur_est'] = $_POST['rTur_est'];
			$_SESSION['sMatriMod_mat'] = $_POST['rMod_mat'];
		}		
		
		$vQuery = "Select pln_est, ano_ini, ano_fin from plan where cod_car = '{$_SESSION['sFrameCod_car']}' and ";
		$vQuery .= "pln_est = '{$_SESSION['sMatriPln_est']}' ";
		$cPlan = fQuery($vQuery);
		if($aPlan = mysql_fetch_array($cPlan))
			$_SESSION['sMatriPln_des'] = $aPlan['pln_est']." - [ ".$aPlan['ano_ini']." - ".$aPlan['ano_fin']. " ]";

		$vQuery = "Select sem_des from semestre where sem_anu = '{$_SESSION['sMatriSem_anu']}' ";
		$cSemestre = fQuery($vQuery);
		if($aSemestre = mysql_fetch_array($cSemestre))
			$_SESSION['sMatriSem_des'] = $aSemestre['sem_des'];
			
		$vQuery = "Select sec_des from grupo where sec_gru = '{$_SESSION['sMatriSec_gru']}'";
		$cGrupo = fQuery($vQuery);
		if($aGrupo = mysql_fetch_array($cGrupo))
			$_SESSION['sMatriSec_des'] = $aGrupo['sec_des'];
			
		$vQuery = "Select tur_des from turno where tur_est = '{$_SESSION['sMatriTur_est']}'";
		$cTurno = fQuery($vQuery);
		if($aTurno = mysql_fetch_array($cTurno))
			$_SESSION['sMatriTur_des'] = $aTurno['tur_des'];
			
		$vQuery = "Select mod_des from modmat where mod_mat = '{$_SESSION['sMatriMod_mat']}'";
		$cModmat = fQuery($vQuery);
		if($aModmat = mysql_fetch_array($cModmat))
			$_SESSION['sMatriMod_des'] = $aModmat['mod_des'];		
		
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
		<th background="../images/ven_topcenter.jpg">Matr&iacute;cula de Estudiante Regular </th>
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
			    <td>Max. Cr&eacute;ditos :</td>
			    <th><?=$_SESSION['sMatriMax_crd']?> Cr&eacute;ditos </th>
		        <td>Crd. Matric. </td>
		        <th><input name="rCrd_cur" type="text" class="" id="rCrd_cur" value="<?=$_SESSION['sMatriTot_crd']?>" size="4" maxlength="4" disabled> 
		        cr&eacute;ditos </th>
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
		<th background="../images/ven_topcenter.jpg">Seleccione los cursos a Matricular </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" class="tlistdata">
			  <tr>
			    <th width="15">&nbsp;</th>
				<th width="40">C&oacute;d </th>
				<th width="200">Nombre curso </th>
		        <th width="15">Sm</th>
		        <th width="60">Modalidad</th>
			    <th width="80">Grupo</th>
			    <th width="70">Turno</th>
			    <th width="25">Crd</th>
			  </tr>
			  <?
/*			  	$vQuery = "Select cod_cur, nom_cur, sem_anu, crd_cur  ";
				$vQuery .= "from curso ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' ";
				$vQuery .= "order by sem_anu, tip_cur, cod_cur "; */
				
				$vQuery = "Select distinct cd.cod_cur, cu.cod_cat, cu.nom_cur, cu.sem_anu, cu.tip_cur, cu.crd_cur ";
				$vQuery .= "from ( ";
				$vQuery .= "(select sr.cod_cur from (select cod_cur from curso ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "cod_cur not in (select cod_cur from requ ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}')) sr ";
				$vQuery .= "where sr.cod_cur not in (Select cod_cur from $tNota ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "num_mat = '{$_SESSION['sMatriNum_mat']}' and not_cur > 10)) union ";
				$vQuery .= "(Select tr.cod_cur from (select re.cod_cur from $tNota no ";
				$vQuery .= "left join requ re on no.cod_car = re.cod_car and no.pln_est = re.pln_est and no.cod_cur = re.cur_pre ";
				$vQuery .= "where no.cod_car = '{$_SESSION['sFrameCod_car']}' and no.pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "no.num_mat = '{$_SESSION['sMatriNum_mat']}' and no.not_cur > 10 and not isnull(re.cod_cur)) tr ";
				$vQuery .= "where tr.cod_cur not in (select cod_cur from requ ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "cur_pre not in (select cod_cur from $tNota ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_POST['rPln_est']}' and ";
				$vQuery .= "num_mat = '{$_SESSION['sMatriNum_mat']}' and not_cur > 10 ))) ";
				$vQuery .= ") cd ";
				$vQuery .= "left join curso cu on cd.cod_cur = cu.cod_cur ";
				$vQuery .= "where cu.cod_car = '{$_SESSION['sFrameCod_car']}' and cu.pln_est = '{$_POST['rPln_est']}' ";
				$vQuery .= "order by cu.sem_anu, cu.tip_cur, cu.cod_cur";
				
				$cCurso = fQuery($vQuery);
				$vNum_rows = fCountq($cCurso);
				while($aCurso = mysql_fetch_array($cCurso))
				{
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aCurso['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><input name="rCod_cur[]" type="checkbox" id="rCod_cur[]" value="<?=$aCurso['cod_cur']?>" class="check" onClick="aumentar(this, <?=$aCurso['crd_cur']?>, <?=$_SESSION['sMatriMax_crd']?>)" /></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['cod_cat']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['nom_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sem_anu']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$_SESSION['sMatriMod_des']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><select name="rSec_gru<?=$aCurso['cod_cur']?>" id="rSec_gru<?=$aCurso['cod_cur']?>">
                  <? fviewgrupo($_SESSION['sMatriSec_gru']); ?>
                </select></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><select name="rTur_est<?=$aCurso['cod_cur']?>" id="rTur_est<?=$aCurso['cod_cur']?>">
                  <? fviewturno($_SESSION['sMatriTur_est']); ?>
                </select></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['crd_cur']?><input name="rCrd_cur<?=$aCurso['cod_cur']?>" type="hidden" id="rCrd_cur<?=$aCurso['cod_cur']?>" value="<?=$aCurso['crd_cur']?>" /></td>
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
			<div class="dboton"><a href="" onClick = "mtr_matricular(document.fData, 'regulares', 'addmatri'); return false;" class="icontinue" title="Continuar Matr&iacute;cula">Matricular</a></div>
			<div class="dboton"><a href="" onClick = "clickregulares(); return false;" class="icancel" title="Continuar Matr&iacute;cula">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>
</form>
<?
	}
?>
