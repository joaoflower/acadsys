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
		
		if(!empty($_POST['rDat_cur']))
		{
			$vCan_cur = strlen($_POST['rDat_cur']) / 9;
			if($vCan_cur > 0)
			{
				for($ii = 0; $ii < $vCan_cur; $ii++)
				{
					$vPln_est = substr($_POST['rDat_cur'], (9 * $ii), 2);
					$vCod_cur = substr($_POST['rDat_cur'], (9 * $ii) + 2, 3);
					$vMod_act = substr($_POST['rDat_cur'], (9 * $ii) + 5, 2);
					$vSec_gru = substr($_POST['rDat_cur'], (9 * $ii) + 7, 2);
					
					$vQuery = "insert into $tCarga (cod_car, ano_aca, per_aca, pln_est, cod_cur, sec_gru, mod_act, ";
					$vQuery .= "cod_prf) values ";
					$vQuery .= "('{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', '{$_SESSION['sFramePer_aca']}', ";
					$vQuery .= "'$vPln_est', '$vCod_cur', '$vSec_gru', '$vMod_act', '{$_SESSION['sCargaCod_prf']}') ";
					
					$cResult = fInupde($vQuery);

				}
				if($cResult)
				{
					$bDatos = TRUE;
				}

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
