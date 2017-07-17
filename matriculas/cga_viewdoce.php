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
		
		$vQuery = "Select cod_prf, cod_car, paterno, materno, nombres from docente ";
		$vQuery .= "where cod_car != '' ";
		
		if((!empty($_POST['rCod_prf']) or !empty($_POST['rPaterno']) or !empty($_POST['rMaterno']) or !empty($_POST['rNombres'])))
		{
			if(!empty($_POST['rCod_prf']))
				$vQuery .= "and cod_prf like '{$_POST['rCod_prf']}%'";			
			if(!empty($_POST['rPaterno']))
				$vQuery .= "and paterno like '{$_POST['rPaterno']}%'";		
			if(!empty($_POST['rMaterno']))
				$vQuery .= "and materno like '{$_POST['rMaterno']}%'";			
			if(!empty($_POST['rNombres']))
				$vQuery .= "and nombres like '{$_POST['rNombres']}%'";			
				
			$vQuery .= " order by paterno, materno, nombres limit 3 ";
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
		$cResult = fQuery($vQuery);
		$vNum_rows = fCountq($cResult);
		while($aResult = mysql_fetch_array($cResult))
		{
?>
			<tr <?=ftrstyle($vCont)?>  onMouseOver="mouseover(this)" onMouseOut="mouseout(this)">
			  <td width="10" <?=ftdstyle($vNum_rows, $vCont)?>><?=$vCont?></td>
			  <td width="55" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['cod_prf']?></td>
			  <td width="110" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['paterno']?></td>
			  <td width="110" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['materno']?></td>
			  <td width="140" <?=ftdstyle($vNum_rows, $vCont)?>><?=$aResult['nombres']?></td>
			  <td width="16" <?=ftdstyle($vNum_rows, $vCont)?>><a href="" onClick="cga_viewcurso('<?=$aResult['cod_prf']?>', '<?=$aResult['cod_car']?>'); return false;" class="linkicon"><img src="../images/browse.png" alt="Mostrar Cursos" width="16" height="16" /></a></td>
			</tr>
<? 
			$vCont++; 	
		} 
	}
?>
		</table>