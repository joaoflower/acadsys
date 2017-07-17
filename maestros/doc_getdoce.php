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
	if(fsafetysetcaranoper())
	{
		$_SESSION['sDoceCod_prf'] = "";
		$_SESSION['sDoceCod_car'] = "";
	}
	else
	{
		header("Location:../index.php");
	}
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>
	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Administraci&oacute;n de Docentes </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			<tr>
			  <th width="10">&nbsp;</th>
			  <th width="55">C&oacute;digo</th>
			  <th width="110">Paterno</th>
			  <th width="110">Materno</th>
			  <th width="140">Nombres</th>
			  <th width="16">&nbsp;</th>
			</tr>
			<tr class="trpar">
			  <td>&nbsp;</td>
			  <td><input name="rCod_prf" type="text" class="" id="rNum_mat" value="" size="4" maxlength="6" onBlur="doc_verisearch(this);"></td>
			  <td><input name="rPaterno" type="text" class="" id="rPaterno" value="" size="15" maxlength="25" onBlur="doc_verisearch(this);"></td>
			  <td><input name="rMaterno" type="text" class="" id="rMaterno" value="" size="15" maxlength="25" onBlur="doc_verisearch(this);"></td>
			  <td><input name="rNombres" type="text" class="" id="rNombres" value="" size="20" maxlength="35" onBlur="doc_verisearch(this);"></td>
			  <td>&nbsp;</td>
			</tr>
			
		  </table>
		  <div id="dresult"></div>
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
			<div class="dboton"><a href="" onClick = "doc_newdatadoce(); return false;" class="inew" title="Nuevo Docente">Nuevo Doc.</a></div>
		</td>
	  </tr>
	</table>
	
	<div id="ddatos"></div>
</center>
</form>