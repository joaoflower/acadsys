<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
	{
		$vCont = 1;
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Modalidades de Nota </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			<tr>
			  <th width="20">C</th>
			  <th width="100">Denominaci&oacute;n </th>
			  <th width="100">Mod. Acta </th>
			  <th width="16">&nbsp;</th>
		    </tr>
			<?
				$vQuery = "select mn.mod_not, mn.not_des, ma.act_des ";
				$vQuery .= "from modnot mn left join modact ma on mn.mod_act = ma.mod_act ";
				$vQuery .= "order by mn.mod_not ";
				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
			?>			
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['mod_not']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['not_des']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['act_des']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><a href=""  onClick = "not_editmodnot('<?=$aResult['mod_not']?>'); return false;" class="linkicon"><img src="../images/edit.png" alt="Editar modalidad de nota" width="16" height="16" /></a></td>
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
			<div class="dboton"><a href="" onClick = "not_newmodnot(); return false;" class="inew" title="Nueva modalidad de nota">Nueva mod. </a></div>
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