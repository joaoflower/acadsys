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
		
		$vQuery = "select cm.cod_cur, cu.nom_cur, cm.sec_gru, cm.tur_est ";
		$vQuery .= "from $tCurmat cm left join curso cu on cm.cod_car = cu.cod_car ";
		$vQuery .= "and cm.pln_est = cu.pln_est and cm.cod_cur = cu.cod_cur ";
		$vQuery .= "where cm.cod_car = '{$_SESSION['sFrameCod_car']}' and cm.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
		$vQuery .= "cm.per_aca = '{$_SESSION['sFramePer_aca']}' and cm.pln_est = '{$_SESSION['sMatriPln_est']}' and ";
		$vQuery .= "cm.cod_cur = '{$_POST['rCod_cur']}' and cm.num_mat = '{$_SESSION['sMatriNum_mat']}' ";
		
		$cResult = fQuery($vQuery);
		if($aResult = mysql_fetch_array($cResult))
		{
			$bDatos = TRUE;
		}		
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		$_SESSION['sMatriCod_cur'] = $_POST['rCod_cur'];

?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Edici&oacute;n de Curso </th>
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
		        <td width="75">C&oacute;digo :</td>
		        <th width="150"><?=$_POST['rCod_cur']?></th>
			  </tr>
			  <tr>
			    <td>Curso :</td>
			    <th colspan="3"><?=$aResult['nom_cur']?></th>
	          </tr>
			  <tr>
			    <td>Grupo :</td>
			    <th><select name="rSec_gru" id="rSec_gru">
                  <? fviewgrupo($aResult['sec_gru']); ?>
                </select></th>
		        <td>Turno :</td>
		        <th><select name="rTur_est" id="rTur_est">
                  <? fviewturno($aResult['tur_est']); ?>
                </select></th>
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
			<div class="dboton"><a href="" onClick = "edt_savecurso(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="edt_viewmatri('<?=$_SESSION['sMatriNum_mat']?>', '<?=$_SESSION['sFrameCod_car']?>'); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
	
  </center>
</form>
<?
	}
?>
