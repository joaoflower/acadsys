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
		$bDatos = FALSE;
		$vCont = 1;
		if(!empty($_POST['rSem_anu']))
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
?>

<center>
  <table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Cursos pre-requisitos  </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center"><table border="0" cellspacing="0" cellpadding="0" class="tlistdata">
			<tr>
			  <th width="15">&nbsp;</th>
			  <th width="25">C&oacute;d</th>
			  <th width="250">Nombre</th>
			  <th width="20">Sm</th>
			  <th width="30">Cred</th>
			  <th width="16">&nbsp;</th>
			</tr>
			<?
				
				$vQuery = "Select cod_cur, nom_cur, sem_anu, crd_cur, tip_cur ";
				$vQuery .= "from curso where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_SESSION['sPlanPln_est']}' ";
				$vQuery .= "and sem_anu < '{$_POST['rSem_anu']}' and cod_cur not in ";
				$vQuery .= "(select cur_pre from requ where cod_car = '{$_SESSION['sFrameCod_car']}' and ";
				$vQuery .= "pln_est = '{$_SESSION['sPlanPln_est']}' and cod_cur = '{$_SESSION['sPlanCod_cur']}') ";
				$vQuery .= "order by sem_anu, tip_cur, cod_cur ";
				$cCurso = fQuery($vQuery);
				$vNum_rows = fCountq($cCurso);
				while($aCurso = mysql_fetch_array($cCurso))
				{
					if($vSem_anu != $aCurso['sem_anu'])
					{
						$vSem_anu = $aCurso['sem_anu'];
			?>		
			<tr>
			  <th>&nbsp;</th>
			  <th>&nbsp;</th>
			  <th colspan="4">SEMESTRE: <?=$aCurso['sem_anu']?></th>
		    </tr>	
			<?
					}
			?>
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><input name="rCod_cur[]" type="checkbox" id="rCod_cur[]" value="<?=$aCurso['cod_cur']?>" class="check" onClick="seleccionar(this)" /></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['cod_cur']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['nom_cur']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['sem_anu']?></td>
			  <td <?=ftdstyle($vNum_rows, $vCont)?>><?=$aCurso['crd_cur']?></td>
		      <td <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onClick="pln_viewdatacurso('<?=$aCurso['cod_cur']?>'); return false;" class="linkicon"></a></td>
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
			<div class="dboton"><a href="" onClick = "pln_saverequ(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="pln_viewdatacurso('<?=$_SESSION['sPlanCod_cur']?>'); return false;" class="icancel" title="Modificar Datos">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
	
</center>
<?
	}
?>