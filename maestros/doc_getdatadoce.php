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
		
		$vQuery = "Select es.cod_prf, es.cod_car, es.paterno, es.materno, es.nombres, es.tip_doc, td.doc_des, es.num_doc, ";
		$vQuery .= "es.fch_nac, es.sexo, es.est_civ, ec.est_des, es.direc, es.fono, es.celular, es.email ";
		$vQuery .= "from docente es left join tipodoc td on es.tip_doc = td.tip_doc ";
		$vQuery .= " left join estcivil ec on es.est_civ = ec.est_civ ";
		$vQuery .= "where es.cod_prf = '{$_SESSION['sDoceCod_prf']}' and es.cod_car = '{$_SESSION['sDoceCod_car']}' ";
		
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
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Docente </th>
		<td><img src="../images/ven_topright.jpg" width="16" height="25" border="0" alt="" /></td>
	  </tr>
	  <tr>
		<td background="../images/ven_mediumleft.jpg"></td>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="1" bordercolor="#FF0000" class="tviewdata">
			  <tr>
				<td width="75">C&oacute;digo :</td>
				<th width="150"><?=$aEstudia['cod_prf']?></th>
				<td width="75">&nbsp;</td>
				<th width="150">&nbsp;</th>
			  </tr>
			  <tr>
				<td>Nombres :</td>
				<th colspan="3"><?=$aEstudia['paterno']?> <?=$aEstudia['materno']?>, <?=$aEstudia['nombres']?></th>
			  </tr>
			  <tr>
			    <td>Tipo Doc.  : </td>
			    <th><select name="rTip_doc" id="rTip_doc">
					<? fviewtipodoc($aEstudia['tip_doc']); ?> 
				</select></th>
			    <td>Num. Doc. : </td>
			    <th><input name="rNum_doc" type="text" class="" id="rNum_doc" value="<?=$aEstudia['num_doc']?>" size="10" maxlength="10"/></th>
		      </tr>
			  <tr>
			    <td>Fecha Nac.: </td>
			    <th colspan="3"><select name="rDia_nac" id="rDia_nac">
					<? fviewdia_nac(substr($aEstudia['fch_nac'], 8, 2)); ?> 
				</select> de <select name="rMes_nac" id="rMes_nac">
					<? fviewmes(substr($aEstudia['fch_nac'], 5, 2)); ?> 
				</select> de <select name="rAno_nac" id="rAno_nac">
					<? fviewano_nac(substr($aEstudia['fch_nac'], 0, 4)); ?> 
				</select></th>
		      </tr>
			  <tr>
			    <td>Sexo: </td>
			    <th><select name="rSexo" id="rSexo">
					<? fviewsexo($aEstudia['sexo']); ?> 
				</select></th>
			    <td>Est. Civil : </td>
			    <th><select name="rEst_civ" id="rEst_civ">
                  <? fviewestcivil($aEstudia['est_civ']); ?>
                </select></th>
		      </tr>
			  <tr>
			    <td>Tel&eacute;fono : </td>
			    <th><input name="rFono" type="text" class="" id="rFono" value="<?=$aEstudia['fono']?>" size="10" maxlength="10" /></th>
			    <td>Celular : </td>
			    <th><input name="rCelular" type="text" class="" id="rCelular" value="<?=$aEstudia['celular']?>" size="10" maxlength="10" /></th>
		      </tr>
			  <tr>
			    <td>Direcci&oacute;n : </td>
			    <th colspan="3"><input name="rDirec" type="text" class="" id="rDirec" value="<?=$aEstudia['direc']?>" size="50" maxlength="50" onblur="fupper(this);"/></th>
		      </tr>
			  <tr>
			    <td>E-mail : </td>
			    <th colspan="3"><input name="rEmail" type="text" class="" id="rEmail" value="<?=$aEstudia['email']?>" size="40" maxlength="40" /></th>
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
			<div class="dboton"><a href="" onClick = "doc_savedatadoce(document.fData); return false;" class="isave" title="Modificar Datos">Guardar</a></div>
			<div class="dboton"><a href="" onClick="doc_viewdatadoce('<?=$_SESSION['sDoceCod_prf']?>', '<?=$_SESSION['sDoceCod_car']?>'); return false;" class="icancel" title="Modificar Datos">Cancelar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>