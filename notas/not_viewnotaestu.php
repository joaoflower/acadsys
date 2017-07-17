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
		$bDatos = FALSE;
		$_SESSION['sNotaNum_mat'] = "";
		$_SESSION['sNotaCod_car'] = "";
		$_SESSION['sNotaNom_est'] = "";
		$_SESSION['sNotaPln_est'] = "";
		$_SESSION['sNotaCod_cur'] = "";
		$_SESSION['sNotaMod_not'] = "";
		$_SESSION['sNotaAno_aca'] = "";
		$_SESSION['sNotaPer_aca'] = "";
		$_SESSION['sNotaPaterno'] = "";
		$_SESSION['sNotaMaterno'] = "";
		$_SESSION['sNotaNombres'] = "";
		
		if(!empty($_POST['rNum_mat']) and !empty($_POST['rCod_car']))
		{
			$vQuery .= "select paterno, materno, nombres from estudiante ";
			$vQuery .= "where num_mat = '{$_POST['rNum_mat']}' and cod_car = '{$_POST['rCod_car']}' ";
			
			$cResult = fQuery($vQuery);
			if($aResult = mysql_fetch_array($cResult))
			{
				$bDatos = TRUE;
				$_SESSION['sNotaNum_mat'] = $_POST['rNum_mat'];
				$_SESSION['sNotaCod_car'] = $_POST['rCod_car'];
				$_SESSION['sNotaNom_est'] = $aResult['paterno']." ".$aResult['materno'].", ".$aResult['nombres'];
				$_SESSION['sNotaPaterno'] = $aResult['paterno'];
				$_SESSION['sNotaMaterno'] = $aResult['materno'];
				$_SESSION['sNotaNombres'] = $aResult['nombres'];
				
			}
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "not_viewnotaestudata.php";
	}
?>
