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
		$vDigit = 2;
		
		$tApla = "apla".$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rDat_num']))
		{			
			$vCan_num = strlen($_POST['rDat_num']);
			if($vCan_num > 0)
			{
				$vSize = 11;
				$vLenght = 0;
				
				//for($ii = 0; $ii < $vCan_num; $ii++)
				while($vCan_num > ($vLenght + 1))
				{
					$vSize = substr($_POST['rDat_num'], $vLenght, $vDigit);
					$vLenght += $vDigit;
					
					//$vNum_mat = substr($_POST['rDat_num'], (6 * $ii), 6);
					$vNum_mat = substr($_POST['rDat_num'], $vLenght, $vSize);
					$vLenght += $vSize;
					
					$vQuery = "insert into $tApla (cod_car, ano_aca, per_aca, pln_est, cod_cur, num_mat, sec_gru, mod_mat) values ";
					$vQuery .= "('{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', '{$_SESSION['sFramePer_aca']}', ";
					$vQuery .= "'{$_SESSION['sPrnPln_est']}', '{$_SESSION['sPrnCod_cur']}', '$vNum_mat', '{$_SESSION['sPrnSec_gru']}', ";
					$vQuery .= "'03') ";
					
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
		include "apl_viewapladata.php";
	}
?>
