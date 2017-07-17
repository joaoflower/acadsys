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
		$bDatos = FALSE;
		$vCont = 1;
		
		$tCarga = "carga".$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rPln_est']) and !empty($_POST['rCod_cur']) and !empty($_POST['rSec_gru']) and !empty($_POST['rMod_act']))
		{
			$vQuery = "delete from $tCarga ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
			$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}' and pln_est = '{$_POST['rPln_est']}' and ";
			$vQuery .= "cod_cur = '{$_POST['rCod_cur']}' and sec_gru = '{$_POST['rSec_gru']}' and ";
			$vQuery .= "mod_act = '{$_POST['rMod_act']}' ";
			
			$cResult = fInupde($vQuery);

			if($cResult)
			{
				$bDatos = TRUE;
			}
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "cga_viewcargadata.php";
	}
?>
