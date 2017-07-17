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
		
		if($_POST['rNot_cur'] >= 0 && $_POST['rNot_cur'] <= 20)
		{
			$tNota = "nota".$_SESSION['sFrameCod_car'];
			$vQuery = "update $tNota set not_cur = '{$_POST['rNot_cur']}' ";
			$vQuery .= "where num_mat = '{$_SESSION['sNotaNum_mat']}' and cod_car = '{$_SESSION['sNotaCod_car']}' and  ";
			$vQuery .= "ano_aca = '{$_SESSION['sNotaAno_aca']}' and per_aca = '{$_SESSION['sNotaPer_aca']}' and ";
			$vQuery .= "pln_est = '{$_SESSION['sNotaPln_est']}' and cod_cur = '{$_SESSION['sNotaCod_cur']}' and ";
			$vQuery .= "mod_not = '{$_SESSION['sNotaMod_not']}' ";
			
			$cResult = fInupde($vQuery);
			if($cResult)
			{
				$bDatos = TRUE;
				$_SESSION['sNotaPln_est'] = "";
				$_SESSION['sNotaCod_cur'] = "";
				$_SESSION['sNotaMod_not'] = "";
				$_SESSION['sNotaAno_aca'] = "";
				$_SESSION['sNotaPer_aca'] = "";
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
