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
		$vCan_cur = 0;
		$vCod_cur = "";
		$vSec_gru = "";
		$vTur_est = "";
		
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		
		if(!empty($_POST['rCod_cur']) and !empty($_POST['rSec_gru']) and !empty($_POST['rTur_est']) and !empty($_POST['rCrd_cur']))
		{
			$vCan_cur = strlen($_POST['rCod_cur']) / 3;
			if($vCan_cur > 0)
			{
				for($ii = 0; $ii < $vCan_cur; $ii++)
				{
					$vCod_cur = substr($_POST['rCod_cur'], 3 * $ii, 3);
					$vSec_gru = substr($_POST['rSec_gru'], 2 * $ii, 2);
					$vTur_est = substr($_POST['rTur_est'], 1 * $ii, 1);
					
					$vQuery = "insert into $tCurmat (num_mat, cod_car, ano_aca, per_aca, pln_est, cod_cur, sec_gru, mod_mat, ";
					$vQuery .= "tur_est, cod_usu) values ";
					$vQuery .= "('{$_SESSION['sMatriNum_mat']}', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', ";
					$vQuery .= "'{$_SESSION['sFramePer_aca']}', '{$_SESSION['sMatriPln_est']}', '$vCod_cur', '$vSec_gru', ";
					$vQuery .= "'{$_SESSION['sMatriMod_mat']}', '$vTur_est', '{$_SESSION['sUsercod_usu']}') ";
					
					$cCurmat = fInupde($vQuery);
				}
				if($cCurmat)
				{
					$_SESSION['sMatriTot_crd'] = $_SESSION['sMatriTot_crd'] + $_POST['rCrd_cur'];
					$vQuery = "update $tEstumat set tot_crd = '{$_SESSION['sMatriTot_crd']}' ";
					$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
					$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}' and pln_est = '{$_SESSION['sMatriPln_est']}' and ";
					$vQuery .= "num_mat = '{$_SESSION['sMatriNum_mat']}' ";
					
					$cEstumat = fInupde($vQuery);
				}

			}
		}
		
		//------------------------------------
		
		$vQuery = "Select em.num_mat, em.cod_car, es.paterno, es.materno, es.nombres, em.pln_est, pl.ano_ini, pl.ano_fin, em.sem_anu, ";
		$vQuery .= "sm.sem_des, em.sec_gru, sc.sec_des, em.tur_est, tu.tur_des, em.mod_mat, mm.mod_des, em.tot_crd, em.max_crd ";
		$vQuery .= "from $tEstumat em left join estudiante es on em.num_mat = es.num_mat and em.cod_car = es.cod_car ";
		$vQuery .= "left join plan pl on em.cod_car = pl.cod_car and em.pln_est = pl.pln_est ";
		$vQuery .= "left join semestre sm on em.sem_anu = sm.sem_anu left join grupo sc on em.sec_gru = sc.sec_gru ";
		$vQuery .= "left join turno tu on em.tur_est = tu.tur_est left join modmat mm on em.mod_mat = mm.mod_mat ";
		$vQuery .= "where em.cod_car = '{$_SESSION['sFrameCod_car']}' and em.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
		$vQuery .= "em.per_aca = '{$_SESSION['sFramePer_aca']}' and em.num_mat = '{$_SESSION['sMatriNum_mat']}' ";
		
		$cResult = fQuery($vQuery);
		if($aResult = mysql_fetch_array($cResult))
		{
			$bDatos = TRUE;
		}		
	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "edt_viewmatridata.php";
	}
?>
