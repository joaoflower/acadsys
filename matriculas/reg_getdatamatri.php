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
		$bMatri = FALSE;
		
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		
		$_SESSION['sMatriNum_mat'] = "";
		$_SESSION['sMatriCod_car'] = "";
		$_SESSION['sMatriNombre'] = "";
		$_SESSION['sMatriPln_est'] = "";
		$_SESSION['sMatriSem_anu'] = "";
		$_SESSION['sMatriSec_gru'] = "";
		$_SESSION['sMatriTur_est'] = "";
		$_SESSION['sMatriMod_mat'] = "";
		$_SESSION['sMatriTot_crd'] = 0;
		$_SESSION['sMatriMax_crd'] = 0;
		$_SESSION['sMatriPln_des'] = "";
		$_SESSION['sMatriSem_des'] = "";
		$_SESSION['sMatriSec_des'] = "";
		$_SESSION['sMatriTur_des'] = "";
		$_SESSION['sMatriMod_des'] = "";
		
		$vQuery = "Select num_mat, cod_car, paterno, materno, nombres ";
		$vQuery .= "from estudiante where num_mat = '{$_POST['rNum_mat']}' and cod_car = '{$_POST['rCod_car']}' ";
		
		$cEstudia = fQuery($vQuery);
		if($aEstudia = mysql_fetch_array($cEstudia))
		{
			$bDatos = TRUE;
		}
		
		$vQuery = "Select num_mat from $tEstumat ";
		$vQuery .= "where num_mat = '{$_POST['rNum_mat']}' and cod_car = '{$_POST['rCod_car']}' and ";
		$vQuery .= "ano_aca = '{$_SESSION['sFrameAno_aca']}' and per_aca = '{$_SESSION['sFramePer_aca']}' ";
		
		$cResult = fQuery($vQuery);
		if($aResult = mysql_fetch_array($cResult))
		{
			$bMatri = TRUE;
		}

	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE and $bMatri == TRUE)
	{
?>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Error de Matr&iacute;cula</th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">	
			El estudiante: <strong><?=$aEstudia['num_mat']?> - <?=$aEstudia['paterno']?> <?=$aEstudia['materno']?>, <?=$aEstudia['nombres']?> </strong> <br /> Ya realizo su matr&iacute;cula en este periodo.
		</td>
		<td background="../images/ven_mediumright.jpg"></td>
	  </tr>
	  <tr>
		<td><img src="../images/ven_bottomleft.jpg" width="16" height="16" border="0" alt="" /></td>
		<td background="../images/ven_bottomcenter.jpg"></td>
		<td><img src="../images/ven_bottomright.jpg" width="16" height="16" border="0" alt="" /></td>
	  </tr>
	</table>
	
<?

	}
	elseif($bDatos == TRUE and $bMatri == FALSE)
	{
		$_SESSION['sMatriNum_mat'] = $_POST['rNum_mat'];
		$_SESSION['sMatriCod_car'] = $_POST['rCod_car'];
		$_SESSION['sMatriNombre'] = $aEstudia['paterno']." ".$aEstudia['materno'].", ".$aEstudia['nombres'];
		$_SESSION['sMatriMax_crd'] = 30;
?>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Datos de Matricula de Estudiante </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="250"><?=$aEstudia['num_mat']?></th>
			  </tr>
			  <tr>
				<td>Nombres :</td>
				<th><?=$aEstudia['paterno']?> <?=$aEstudia['materno']?>, <?=$aEstudia['nombres']?></th>
			  </tr>
			  <tr>
			    <td>Plan Est. :</td>
			    <th><select name="rPln_est" id="rPln_est">
					<? fviewplancar($_SESSION['sFrameCod_car'], '01'); ?> 
				</select></th>
		      </tr>
			  <tr>
			    <td>Semestre : </td>
			    <th><select name="rSem_anu" id="rSem_anu">
                  <? fviewsemestre('01'); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Grupo : </td>
			    <th><select name="rSec_gru" id="rSec_gru">
                  <? fviewgrupo('01'); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Turno :</td>
			    <th><select name="rTur_est" id="rTur_est">
                  <? fviewturno('1'); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Modalidad :  </td>
			    <th><select name="rMod_mat" id="rMod_mat">
                  <? fviewmodmat('01'); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Cr&eacute;ditos : </td>
			    <th>30 cr&eacute;ditos </th>
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
			<div class="dboton"><a href="" onClick = "reg_selectcurso(document.fData); return false;" class="icontinue" title="Continuar Matr&iacute;cula">Continuar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>