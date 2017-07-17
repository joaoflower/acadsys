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
		
		$vCont = 1;
		$vCan_not = 0;
		
		$vNum_mat = "";
		$vMod_not = "";
		$vMod_mat = "";
		$vIns_Upd = "";
		$vNot_cur = "";
		
		$tNota = "nota".$_SESSION['sFrameCod_car'];
		
		if(!empty($_POST['rNum_mat']) and !empty($_POST['rMod_not']) and strlen($_POST['rNot_cur']) > 0)
		{
			//$vCan_not = strlen($_POST['rNum_mat']) / 6;
			$vCan_not = $_SESSION['sActaCan_est'];
			 
			if($vCan_not > 0)
			{
				$vSize = 1;
				$vLenght = 0;
				
				for($ii = 0; $ii < $vCan_not; $ii++)
				{
					$vSize = substr($_POST['rNum_mat'], $vLenght, 1);
					$vLenght += 1;
										
					$vNum_mat = substr($_POST['rNum_mat'], $vLenght, $vSize);
					$vMod_not = substr($_POST['rMod_not'], 5 * $ii, 2);
					$vMod_mat = substr($_POST['rMod_not'], (5 * $ii) + 2, 2);
					$vIns_Upd = substr($_POST['rMod_not'], (5 * $ii) + 4, 1);
					$vNot_cur = substr($_POST['rNot_cur'], 2 * $ii, 2);
					$vLenght += $vSize;
					
					if($vIns_Upd == "i")
					{
						$vQuery = "insert into $tNota (num_mat, cod_car, ano_aca, per_aca, pln_est, cod_cur, mod_not, mod_mat, ";
						$vQuery .= "not_cur, cod_act, fch_not, cod_usu, obs_not) values ";
						$vQuery .= "('$vNum_mat', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', ";
						$vQuery .= "'{$_SESSION['sFramePer_aca']}', '{$_SESSION['sActaPln_est']}', '{$_SESSION['sActaCod_cur']}', ";
						$vQuery .= "'$vMod_not', '$vMod_mat', '$vNot_cur', '{$_SESSION['sActaCod_act']}', now(), ";
						$vQuery .= "'{$_SESSION['sUsercod_usu']}', '' ) ";
			
						$cResult = fInupde($vQuery);
					}
					elseif($vIns_Upd == "u")
					{
						$vQuery = "update $tNota set not_cur = '$vNot_cur' ";
						$vQuery .= "where num_mat = '$vNum_mat' and cod_car = '{$_SESSION['sFrameCod_car']}' and  ";
						$vQuery .= "ano_aca = '{$_SESSION['sFrameAno_aca']}' and per_aca = '{$_SESSION['sFramePer_aca']}' and ";
						$vQuery .= "pln_est = '{$_SESSION['sActaPln_est']}' and cod_cur = '{$_SESSION['sActaCod_cur']}' and ";
						$vQuery .= "mod_not = '$vMod_not' ";
						
						$cResult = fInupde($vQuery);
					}
				}
			}
			$bDatos = TRUE;
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "nac_viewestucursodata.php";
	}
?>