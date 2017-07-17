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
		
		$vQuery = "Select es.num_mat, es.cod_car, es.paterno, es.materno, es.nombres ";
		$vQuery .= "from estudiante es ";
		$vQuery .= "where es.num_mat = '{$_SESSION['sEstuNum_mat']}' and es.cod_car = '{$_SESSION['sEstuCod_car']}' ";
		
		$cEstudia = fQuery($vQuery);
		if($aEstudia = mysql_fetch_array($cEstudia))
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

	<table border="0" cellpadding="0" cellspacing="0" class="tventana">
	  <tr>
		<td><img src="../images/ven_topleft.jpg" width="16" height="25" border="0" alt="" /></td>
		<th background="../images/ven_topcenter.jpg">Cambiando Nombre  del Estudiante </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aEstudia['num_mat']?></th>
				<td width="75">Condici&oacute;n : </td>
				<th width="150"><?=$aEstudia['con_des']?></th>
			  </tr>
			  <tr>
				<td>Paterno :</td>
				<th><input name="rPaterno2" type="text" class="" id="rPaterno2" value="<?=$aEstudia['paterno']?>" size="25" maxlength="25" /></th>
			    <td>Materno : </td>
			    <th><input name="rMaterno2" type="text" class="" id="rMaterno2" value="<?=$aEstudia['materno']?>" size="25" maxlength="25" /></th>
			  </tr>
			  <tr>
			    <td>Nombres : </td>
			    <th colspan="3"><input name="rNombres2" type="text" class="" id="rNombres2" value="<?=$aEstudia['nombres']?>" size="35" maxlength="35" /></th>
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
			<div class="dboton"><a href="" onClick = "est_savedatanomestu(document.fData); return false;" class="isave" title="Guardar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="est_viewdataestu('<?=$_SESSION['sEstuNum_mat']?>', '<?=$_SESSION['sEstuCod_car']?>'); return false;" class="icancel" title="Modificar Datos">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>