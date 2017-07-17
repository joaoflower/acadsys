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
		
		if($_SESSION['sPlanOption'] == 'Upd')
		{
			$vQuery = "update curso set nom_cur = '{$_POST['rNom_cur']}', nom_ofi = '{$_POST['rNom_ofi']}',  ";
			$vQuery .= "sem_anu = '{$_POST['rSem_anu']}', tip_cur = '{$_POST['rTip_cur']}', hrs_teo = '{$_POST['rHrs_teo']}', ";
			$vQuery .= "hrs_pra = '{$_POST['rHrs_pra']}', hrs_tot = '{$_POST['rHrs_tot']}', crd_cur = '{$_POST['rCrd_cur']}', ";
			$vQuery .= "tip_pre = '{$_POST['rTip_pre']}', crd_pre = '{$_POST['rCrd_pre']}' ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_SESSION['sPlanPln_est']}' and ";
			$vQuery .= "cod_cur = '{$_SESSION['sPlanCod_cur']}' ";
			
			$cCurso = fInupde($vQuery);
		
		}
		elseif($_SESSION['sPlanOption'] == 'Ins')
		{
			$vQuery = "insert into curso (cod_cur, cod_car, pln_est, cod_cat, nom_cur, nom_ofi, sem_anu, hrs_teo, hrs_pra, ";
			$vQuery .= "hrs_tot, crd_cur, dep_aca, tip_cur, tip_pre, crd_pre) values ";
			$vQuery .= "('{$_SESSION['sPlanCod_cur']}', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sPlanPln_est']}', ";
			$vQuery .= "'{$_SESSION['sPlanCod_cur']}', '{$_POST['rNom_cur']}', '{$_POST['rNom_ofi']}', '{$_POST['rSem_anu']}', ";
			$vQuery .= "'{$_POST['rHrs_teo']}', '{$_POST['rHrs_pra']}', '{$_POST['rHrs_tot']}', '{$_POST['rCrd_cur']}', ";
			$vQuery .= "'', '{$_POST['rTip_cur']}', '{$_POST['rTip_pre']}', '{$_POST['rCrd_pre']}') ";
			
			$cCurso = fInupde($vQuery);
		}
		
		include "pln_viewdatacursodata.php";

	}
	else
	{
		header("Location:../index.php");
	}
	
?>

