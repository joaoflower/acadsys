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
	include "../include/funcoption.php";
	if(fsafetysetcaranoper())
	{
		$vCont = 1;
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
		<th background="../images/ven_topcenter.jpg">Opciones de Estudiantes Matriculados </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">Semestre : </td>
				<th width="100"><select name="rSem_anu" id="rSem_anu">
					<? fviewsemmatri($_SESSION['sFrameCod_car'], $_SESSION['sFrameAno_aca'], $_SESSION['sFramePer_aca'], ''); ?> 
				</select></th>
			    <td width="75">Grupo :</td>
			    <th width="100"><select name="rSec_gru" id="rSec_gru">
                  <? fviewgrumatri($_SESSION['sFrameCod_car'], $_SESSION['sFrameAno_aca'], $_SESSION['sFramePer_aca'], ''); ?>
                </select></th>
			    <td width="75">Turno :</td>
			    <th width="100"><select name="rTur_est" id="rTur_est">
                  <? fviewturmatri($_SESSION['sFrameCod_car'], $_SESSION['sFrameAno_aca'], $_SESSION['sFramePer_aca'], ''); ?>
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
			<div class="dboton"><a href="" onClick = "rpt_viewestumat(document.fData); return false;" class="icontinue" title="Consultar">Consultar</a></div>
		</td>
	  </tr>
	</table>
	<div id="ddatos"></div>
</center>
</form>
<?
	}
?>