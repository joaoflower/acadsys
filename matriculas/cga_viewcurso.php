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
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		$tCarga = "carga".$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rCod_prf']) and !empty($_POST['rCod_car']))
		{
			$_SESSION['sCargaCod_prf'] = $_POST['rCod_prf'];
			$_SESSION['sCargaCod_car'] = $_POST['rCod_car'];
			$bDatos = TRUE;
		}		
		
		$vQuery = "Select paterno, materno, nombres from docente where cod_prf = '{$_POST['rCod_prf']}' ";
		$cDocente = fQuery($vQuery);
		if($aDocente = mysql_fetch_array($cDocente))
			$_SESSION['sCargaNom_prf'] = $aDocente['paterno']." ".$aDocente['materno'].", ".$aDocente['nombres'];
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
		<th background="../images/ven_topcenter.jpg">Datos de Docente </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">Docente :</td>
				<th width="375"><?=$_SESSION['sCargaCod_prf']?> - <?=$_SESSION['sCargaNom_prf']?></th>
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
		<th background="../images/ven_topcenter.jpg">Seleccione los cursos a Asignar </th>
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
			    <th width="50">Grupo</th>
			    <th width="50">Turno</th>
			    <th width="25">Crd</th>
			  </tr>
			  <?
			  	$vSem_anu = "";
			  
			  	$vQuery = "select cga.pln_est, cga.cod_cur, cga.nom_cur, cga.sem_anu, sm.sem_des, cga.mod_act, ma.act_des, ";
				$vQuery .= "cga.sec_gru, cga.sec_des, cga.tur_des, cga.crd_cur ";
				$vQuery .= "from ( ";
				$vQuery .= "select distinct cm.pln_est, cm.cod_cur, cu.nom_cur, cu.sem_anu, mm.mod_act, gr.sec_des, tu.tur_des, ";
				$vQuery .= "cu.crd_cur, cm.sec_gru, cm.tur_est ";
				$vQuery .= "from $tCurmat cm ";
				$vQuery .= "left join curso cu on cm.cod_car = cu.cod_car and cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
				$vQuery .= "left join modmat mm on cm.mod_mat = mm.mod_mat ";
				$vQuery .= "left join grupo gr on cm.sec_gru = gr.sec_gru ";
				$vQuery .= "left join turno tu on cm.tur_est = tu.tur_est ";
				$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and concat(cm.pln_est,cm.cod_cur,mm.mod_act,cm.sec_gru) not in ";
				$vQuery .= "(select concat(pln_est, cod_cur, mod_act, sec_gru) from $tCarga ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}') order by sem_anu, cod_cur, sec_gru, tur_est ";
				$vQuery .= ") cga ";
				$vQuery .= "left join modact ma on cga.mod_act = ma.mod_act ";
				$vQuery .= "left join semestre sm on cga.sem_anu = sm.sem_anu";

				$cCurso = fQuery($vQuery);
				$vNum_rows = fCountq($cCurso);
				while($aCurso = mysql_fetch_array($cCurso))
				{
					if($vSem_anu != $aCurso['sem_anu'])
					{
						$vSem_anu = $aCurso['sem_anu'];
			  ?>
			  <tr>
			    <td>&nbsp;</td>
			    <th colspan="7">Semestre: <?=$aCurso['sem_des']?></th>
		      </tr>
			  <?
			  		}
			  ?>
			  <tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" id="rTr<?=$aCurso['cod_cur']?>">
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><input name="rDat_cur[]" type="checkbox" id="rDat_cur[]" value="<?=$aCurso['pln_est'].$aCurso['cod_cur'].$aCurso['mod_act'].$aCurso['sec_gru']?>" class="check" onClick="seleccionar(this)" /></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['cod_cur']?></td>
			    <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['nom_cur']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sem_anu']?></td>
		        <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['act_des']?></td>
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
			<div class="dboton"><a href="" onClick = "cga_savenewcarga(document.fData); return false;" class="isave" title="Guardar Carga">Guardar</a></div>
			<div class="dboton"><a href="" onClick = "clickcarga(); return false;" class="icancel" title="Continuar Matr&iacute;cula">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
</center>

<?
	}
?>
