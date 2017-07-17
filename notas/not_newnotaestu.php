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
		$bDatos = TRUE;
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
		<th background="../images/ven_topcenter.jpg">Nueva nota de: <?=$_SESSION['sNotaNom_est']?></th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
			    <td width="75">Plan Est. :</td>
			    <th width="150"><select name="rPln_est" id="rPln_est">
					<? fviewplancar($_SESSION['sFrameCod_car'], '01'); ?> 
				</select></th>
		        <td width="75">Semestre :</td>
		        <th width="150"><div id="dsemestre"><select name="rSem_anu" id="rSem_anu" onchange="not_refreshcurso(document.fData)">
					<? fviewsemestrecurso($_SESSION['sFrameCod_car'], '01', '01'); ?> 
				</select></div></th>
			  </tr>
			  <tr>
			    <td>Curso :</td>
			    <th colspan="3"><div id="dcurso"><select name="rCod_cur" id="rCod_cur">
					<? fviewcurso($_SESSION['sFrameCod_car'], '01', '01', '001'); ?> 
				</select></div></th>
	          </tr>
			  <tr>
			    <td>A&ntilde;o :</td>
			    <th><select name="rAno_aca" id="rAno_aca">
					<? fviewano($_SESSION['sFrameAno_aca']); ?> 
				</select></th>
			    <td>Periodo :</td>
			    <th><select name="rPer_aca" id="rPer_aca">
				  <? fviewperiodo($_SESSION['sFramePer_aca']); ?>
				</select></th>
		      </tr>
			  <tr>
			    <td>Modalidad : </td>
			    <th><select name="rMod_not" id="rMod_not">
				  <? fviewmodnot('01'); ?>
				</select></th>
			    <td>Acta :</td>
			    <th><input name="rCod_act" type="text" class="" id="rCod_act" size="3" maxlength="6"></th>
		      </tr>
			  <tr>
			    <td>Nota :</td>
			    <th><input name="rNot_cur" type="text" class="" id="rNot_cur" size="2" maxlength="2" onkeyup="fverinota(this)"></th>
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
	
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
			<div class="dboton"><a href="" onClick = "not_savenewnotaestu(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="not_viewnotaestu('<?=$_SESSION['sNotaNum_mat']?>', '<?=$_SESSION['sNotaCod_car']?>'); return false;" class="icancel" title="Cancelar">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
	
  </center>

<?
	}
?>
