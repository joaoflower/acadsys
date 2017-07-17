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
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;
		
		$_SESSION['sDoceCod_prf'] = $_POST['rCod_prf'];
		$_SESSION['sDoceCod_car'] = $_SESSION['sFrameCod_car'];		
		
		$vQuery = "insert into docente (cod_prf, cod_car, paterno, materno, nombres, tip_doc, num_doc, fch_nac, sexo, est_civ, ";
		$vQuery .= "direc, fono, celular, email)  values ('{$_POST['rCod_prf']}', '{$_SESSION['sFrameCod_car']}', ";
		$vQuery .= "'{$_POST['rPaterno']}', '{$_POST['rMaterno']}', '{$_POST['rNombres']}', '{$_POST['rTip_doc']}', ";
		$vQuery .= "'{$_POST['rNum_doc']}', '{$_POST['rFch_nac']}', '{$_POST['rSexo']}', '{$_POST['rEst_civ']}', ";
		$vQuery .= "'{$_POST['rDirec']}', '{$_POST['rFono']}', '{$_POST['rCelular']}', '{$_POST['rEmail']}' )";
		
		$cEstudia = fInupde($vQuery);
		
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
			    <td>Documento : </td>
			    <th><?=$aEstudia['doc_des']?> - <?=$aEstudia['num_doc']?></th>
			    <td>Fecha Nac.: </td>
			    <th><?=fFechad($aEstudia['fch_nac'])?></th>
		      </tr>
			  <tr>
			    <td>Sexo: </td>
			    <th><?=($aEstudia['sexo']=='2'?"FEMENINO":"MASCULINO")?></th>
			    <td>Est. Civil : </td>
			    <th><?=$aEstudia['est_des']?></th>
		      </tr>
			  <tr>
			    <td>Tel&eacute;fono : </td>
			    <th><?=$aEstudia['fono']?></th>
			    <td>Celular : </td>
			    <th><?=$aEstudia['celular']?></th>
		      </tr>
			  <tr>
			    <td>Direcci&oacute;n : </td>
			    <th colspan="3"><?=$aEstudia['direc']?></th>
		      </tr>
			  <tr>
			    <td>E-mail : </td>
			    <th colspan="3"><?=$aEstudia['email']?></th>
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
			<div class="dboton"><a href="" onClick = "doc_getdatadoce(); return false;" class="imodify" title="Modificar Datos">Modificar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>