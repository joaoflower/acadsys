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
		
		if(!empty($_POST['rPln_est']) and !empty($_POST['rCod_cur']) and !empty($_POST['rAno_aca']) and !empty($_POST['rPer_aca']) and !empty($_POST['rMod_not']) and !empty($_POST['rCod_act']) and ($_POST['rNot_cur'] >= 0 and $_POST['rNot_cur'] <= 20))
		{
			$tNota = "nota".$_SESSION['sFrameCod_car'];
			
			$vQuery = "insert into $tNota (num_mat, cod_car, ano_aca, per_aca, pln_est, cod_cur, mod_not, mod_mat, ";
			$vQuery .= "not_cur, cod_act, fch_not, cod_usu, obs_not) values ";
			$vQuery .= "('{$_SESSION['sNotaNum_mat']}', '{$_SESSION['sNotaCod_car']}', '{$_POST['rAno_aca']}', ";
			$vQuery .= "'{$_POST['rPer_aca']}', '{$_POST['rPln_est']}', '{$_POST['rCod_cur']}', '{$_POST['rMod_not']}', ";
			$vQuery .= "'01', '{$_POST['rNot_cur']}', '{$_POST['rCod_act']}', now(), '{$_SESSION['sUsercod_usu']}', '' ) ";
			
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
		include "not_viewnotaestudata.php";
	}
?>
