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
		
		$vQuery = "update estudiante set tip_doc = '{$_POST['rTip_doc']}', num_doc = '{$_POST['rNum_doc']}',  ";
		$vQuery .= "fch_nac = '{$_POST['rFch_nac']}', sexo = '{$_POST['rSexo']}', est_civ = '{$_POST['rEst_civ']}', ";
		$vQuery .= "direc = '{$_POST['rDirec']}', fono = '{$_POST['rFono']}', celular = '{$_POST['rCelular']}', ";
		$vQuery .= "email = '{$_POST['rEmail']}' ";
		$vQuery .= "where num_mat = '{$_SESSION['sEstuNum_mat']}' and cod_car = '{$_SESSION['sEstuCod_car']}' ";
		
		$cEstudia = fInupde($vQuery);
		
		$vQuery = "Select es.num_mat, es.cod_car, es.paterno, es.materno, es.nombres, es.tip_doc, td.doc_des, es.num_doc, ";
		$vQuery .= "es.fch_nac, es.sexo, es.est_civ, ec.est_des, es.direc, es.fono, es.celular, es.email, es.con_est, ce.con_des ";
		$vQuery .= "from estudiante es left join tipodoc td on es.tip_doc = td.tip_doc ";
		$vQuery .= " left join estcivil ec on es.est_civ = ec.est_civ ";
		$vQuery .= " left join condestu ce on es.con_est = ce.con_est ";
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
		<th background="../images/ven_topcenter.jpg">Informaci&oacute;n de Estudiante </th>
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
			<div class="dboton"><a href="" onClick = "est_getdataestu(); return false;" class="imodify" title="Modificar Datos">Modificar</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>