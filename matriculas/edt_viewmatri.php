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
		
		$vCont = 1;
		
		$tEstumat = "estumat".$_SESSION['sFrameAno_aca'];
		$tCurmat = "curmat".$_SESSION['sFrameAno_aca'];
		
		$vQuery = "Select em.num_mat, em.cod_car, es.paterno, es.materno, es.nombres, em.pln_est, pl.ano_ini, pl.ano_fin, em.sem_anu, ";
		$vQuery .= "sm.sem_des, em.sec_gru, sc.sec_des, em.tur_est, tu.tur_des, em.mod_mat, mm.mod_des, em.tot_crd, em.max_crd ";
		$vQuery .= "from $tEstumat em left join estudiante es on em.num_mat = es.num_mat and em.cod_car = es.cod_car ";
		$vQuery .= "left join plan pl on em.cod_car = pl.cod_car and em.pln_est = pl.pln_est ";
		$vQuery .= "left join semestre sm on em.sem_anu = sm.sem_anu left join grupo sc on em.sec_gru = sc.sec_gru ";
		$vQuery .= "left join turno tu on em.tur_est = tu.tur_est left join modmat mm on em.mod_mat = mm.mod_mat ";
		$vQuery .= "where em.cod_car = '{$_SESSION['sFrameCod_car']}' and em.ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
		$vQuery .= "em.per_aca = '{$_SESSION['sFramePer_aca']}' and em.num_mat = '{$_POST['rNum_mat']}' ";
		
		$cResult = fQuery($vQuery);
		if($aResult = mysql_fetch_array($cResult))
		{
			$bDatos = TRUE;
			$_SESSION['sMatriNum_mat'] = $aResult['num_mat'];
			$_SESSION['sMatriNombre'] = $aResult['paterno']." ".$aResult['materno'].", ".$aResult['nombres'];
			$_SESSION['sMatriPln_est'] = $aResult['pln_est'];
			$_SESSION['sMatriPln_des'] = $aResult['pln_est']." - [ ".$aResult['ano_ini']." - ".$aResult['ano_fin']." ]";
			$_SESSION['sMatriSec_gru'] = $aResult['sec_gru'];
			$_SESSION['sMatriTur_est'] = $aResult['tur_est'];
			$_SESSION['sMatriMod_mat'] = $aResult['mod_mat'];
			$_SESSION['sMatriTot_crd'] = $aResult['tot_crd'];
			$_SESSION['sMatriMax_crd'] = $aResult['max_crd'];
			
			$_SESSION['sMatriSem_des'] = $aResult['sem_des'];
			$_SESSION['sMatriSec_des'] = $aResult['sec_des'];
			$_SESSION['sMatriTur_des'] = $aResult['tur_des'];
			$_SESSION['sMatriMod_des'] = $aResult['mod_des'];
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
