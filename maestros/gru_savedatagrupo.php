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
		if(!empty($_POST['rSec_des']))
		{
			if($_SESSION['sGruOption'] == 'Upd')
			{
				$vQuery = "update grupo set sec_des = '{$_POST['rSec_des']}' ";
				$vQuery .= "where sec_gru = '{$_SESSION['sGruSec_gru']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sGruOption'] == 'Ins')
			{
				$vQuery = "insert into grupo (sec_gru, sec_des) values ";
				$vQuery .= "('{$_SESSION['sGruSec_gru']}', '{$_POST['rSec_des']}') ";
				
				$cResult = fInupde($vQuery);
			}
			$_SESSION['sGruSec_gru'] = "";
			
		}
		
		include "gru_viewgrupodata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
