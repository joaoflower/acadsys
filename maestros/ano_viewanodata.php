<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
		$_SESSION['sAnoAno_aca'] = "";
		$vCont = 1;
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">A&ntilde;o Acad&eacute;mico </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			<tr>
			  <th width="20">C</th>
			  <th width="40">A&ntilde;o</th>
			  <th width="16">&nbsp;</th>
		    </tr>
			<?
				$vQuery = "Select ano_aca from anoaca order by ano_aca ";
				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
			?>			
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['ano_aca']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><a href=""  onClick = "ano_editano('<?=$aResult['ano_aca']?>'); return false;" class="linkicon"><img src="../images/edit.png" alt="Editar A&ntilde;o acad&eacute;mico" width="16" height="16" /></a></td>
		    </tr>	
			<?
					$vCont++;
				}
			?>
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
			<div class="dboton"><a href="" onClick = "ano_newano(); return false;" class="inew" title="Nuevo A&ntilde;o acad&eacute;mico">Nuevo A&ntilde;o </a></div>
		</td>
	  </tr>
	</table>
	
</center>
</form>
<?

	}
	else
	{
		header("Location:../index.php");
	}
?>