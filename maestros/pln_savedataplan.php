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
		
		if($_SESSION['sPlanOption'] == 'Upd')
		{
			$vQuery = "update plan set doc_cre = '{$_POST['rDoc_cre']}', ano_ini = '{$_POST['rAno_ini']}',  ";
			$vQuery .= "ano_fin = '{$_POST['rAno_fin']}', tot_crd = '{$_POST['rTot_crd']}', des_pln = '{$_POST['rDes_pln']}' ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_SESSION['sPlanPln_est']}' ";

			$cCurso = fInupde($vQuery);
		
		}
		elseif($_SESSION['sPlanOption'] == 'Ins')
		{
			$vQuery = "insert into plan (pln_est, cod_car, doc_cre, fch_cre, ano_ini, ano_fin, tot_crd, des_pln) values ";
			$vQuery .= "('{$_SESSION['sPlanPln_est']}', '{$_SESSION['sFrameCod_car']}', '{$_POST['rDoc_cre']}', date(now()), ";
			$vQuery .= "'{$_POST['rAno_ini']}', '{$_POST['rAno_fin']}', '{$_POST['rTot_crd']}', '{$_POST['rDes_pln']}' ) ";
			
			$cCurso = fInupde($vQuery);
		}
		
		include "pln_getplandata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
