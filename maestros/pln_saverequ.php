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
		
		if(!empty($_POST['rDat_cur']))
		{
			$vCan_cur = strlen($_POST['rDat_cur']) / 3;
			if($vCan_cur > 0)
			{
				for($ii = 0; $ii < $vCan_cur; $ii++)
				{
					$vCod_cur = substr($_POST['rDat_cur'], 3 * $ii, 3);
				
					$vQuery = "insert into requ (cod_car, pln_est, cod_cur, cur_pre) values ";
					$vQuery .= "('{$_SESSION['sFrameCod_car']}', '{$_SESSION['sPlanPln_est']}', '{$_SESSION['sPlanCod_cur']}', ";
					$vQuery .= "'$vCod_cur') ";
					
					$cResult = fInupde($vQuery);

				}
				if($cResult)
				{
					include "pln_viewdatacursodata.php";
				}

			}
			
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
?>