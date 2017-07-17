<STYLE type=text/css>
@import url( ../css/main.css );
@import url( ../css/frame.css );
@import url( ../css/framelogin.css );
@import url( ../css/style.css );
</STYLE>

<?
	session_start();
	include "../include/funcsql.php";
	include "../include/funcget.php";
	if(fsafetysetcaranoper())
	{
		$bDatos = FALSE;
		$bDelete = FALSE;
		
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		
		//-----------------------------------
		$vQuery = "delete from $tCurmat  ";
		$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
		$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}' and pln_est = '{$_SESSION['sMatriPln_est']}' and ";
		$vQuery .= "num_mat = '{$_SESSION['sMatriNum_mat']}' ";
		
		$cResult = fInupde($vQuery);
		
		if($cResult)
		{
			$vQuery = "delete from $tEstumat  ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
			$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}' and pln_est = '{$_SESSION['sMatriPln_est']}' and ";
			$vQuery .= "num_mat = '{$_SESSION['sMatriNum_mat']}' ";
			
			$cResult = fInupde($vQuery);
			if($cResult)
			{
				$_SESSION['sMatriNum_mat'] = "";
				$_SESSION['sMatriNombre'] = "";
				$_SESSION['sMatriPln_est'] = "";
				$_SESSION['sMatriPln_des'] = "";
				$_SESSION['sMatriSec_gru'] = "";
				$_SESSION['sMatriTur_est'] = "";
				$_SESSION['sMatriMod_mat'] = "";
				$_SESSION['sMatriTot_crd'] = 0;
				$_SESSION['sMatriMax_crd'] = 0;
				$_SESSION['sMatriCod_cur'] = "";
				$bDatos = TRUE;
				$bDelete = TRUE;
			}
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "edt_getestu.php";
	}
?>
