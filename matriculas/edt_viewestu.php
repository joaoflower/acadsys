<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>
<?php
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcstyle.php";
	
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		
		$vQuery = "Select es.num_mat, es.cod_car, es.paterno, es.materno, es.nombres ";
		$vQuery .= "from $tEstumat em left join estudiante es on em.num_mat = es.num_mat and em.cod_car = es.cod_car ";
		$vQuery .= "where em.cod_car = '{$_SESSION['sFrameCod_car']}' and em.per_aca = '{$_SESSION['sFramePer_aca']}' ";
		
		if((!empty($_POST['rNum_mat']) or !empty($_POST['rPaterno']) or !empty($_POST['rMaterno']) or !empty($_POST['rNombres'])))
		{
			if(!empty($_POST['rNum_mat']))
				$vQuery .= "and em.num_mat like '{$_POST['rNum_mat']}%'";			
			if(!empty($_POST['rPaterno']))
				$vQuery .= "and es.paterno like '{$_POST['rPaterno']}%'";		
			if(!empty($_POST['rMaterno']))
				$vQuery .= "and es.materno like '{$_POST['rMaterno']}%'";			
			if(!empty($_POST['rNombres']))
				$vQuery .= "and es.nombres like '{$_POST['rNombres']}%'";			
				
			$vQuery .= " order by paterno, materno, nombres limit 5 ";
			$bDatos = TRUE;
		}
	}
	else
	{
		header("Location:../index.php");
	}	
	
  	$vCont = 1;
	
?>
		<table border="0" cellspacing="0" cellpadding="0" class="tlistsearch">
<?
	if($bDatos == TRUE)
	{
		$cEstudia = fQuery($vQuery);
		$vNum_rows = fCountq($cEstudia);
		while($aEstudia = mysql_fetch_array($cEstudia))
		{
?>
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td width="10" <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			  <td width="85" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aEstudia['num_mat']?></td>
			  <td width="120" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aEstudia['paterno']?></td>
			  <td width="120" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aEstudia['materno']?></td>
			  <td width="150" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aEstudia['nombres']?></td>
			  <td width="16" <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onClick="edt_viewmatri('<?=$aEstudia['num_mat']?>', '<?=$aEstudia['cod_car']?>'); return false;" class="linkicon"><img src="../images/browse.png" alt="Mostrar informaci&oacute;n" width="16" height="16" /></a></td>
			</tr>
<? 
			$vCont++; 	
		} 
	}
?>
		</table>