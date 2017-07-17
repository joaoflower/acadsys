<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	if(fsafetysetcaranoper())
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
			<div class="dboton"><a href="" onClick = "est_getdatanomestu(); return false;" class="imodify" title="Modificar Apellidos y Nombres">Modi. Nom.</a></div>			
		</td>
	  </tr>
	</table>
<?
	}
?>