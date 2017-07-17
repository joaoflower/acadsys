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
	if(fsafetysetcaranoper())
	{
		$vCont = 1;
?>
<form action="#" method="post" enctype="multipart/form-data" name="fData" id="fData">
<center>

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Cuadro de M&eacute;ritos </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
			<tr>
			  <th width="20">C</th>
			  <th width="100">Semestre </th>
			  <th width="16">&nbsp;</th>
		    </tr>
			<?
				$vQuery = "Select sem_anu, sem_des from semestre ";
				$vQuery .= "where sem_anu between '01' and '10' order by sem_anu ";
				$cResult = fQuery($vQuery);
				$vNum_rows = fCountq($cResult);
				while($aResult = mysql_fetch_array($cResult))
				{
			?>			
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['sem_anu']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['sem_des']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><a href=""  onClick = "crd_viewcuadrosem('<?=$aResult['sem_anu']?>'); return false;" class="linkicon" title="Ver Cuadro del <?=$aResult['sem_anu']?> Semestre"><img src="../images/browse.png" alt="Ver cuadro" width="16" height="16" /></a></td>
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
	
  </center>
</form>
<?

	}
	else
	{
		header("Location:../index.php");
	}
?>