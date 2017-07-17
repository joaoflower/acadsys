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
		
		if(!empty($_POST['rCur_pre']))
		{
			$vQuery = "delete from requ ";
			$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and pln_est = '{$_SESSION['sPlanPln_est']}' and ";
			$vQuery .= "cod_cur =  '{$_SESSION['sPlanCod_cur']}' and cur_pre = '{$_POST['rCur_pre']}' ";
			
			$cResult = fInupde($vQuery);

			if($cResult)
			{
				include "pln_viewdatacursodata.php";
			}
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
?>