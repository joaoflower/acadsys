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
		if(!empty($_POST['rAno_aca']))
		{
			if($_SESSION['sAnoOption'] == 'Upd')
			{
				$vQuery = "update anoaca set ano_Aca = '{$_POST['rAno_aca']}' ";
				$vQuery .= "where ano_aca = '{$_SESSION['sAnoAno_aca']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sAnoOption'] == 'Ins')
			{
				$vQuery = "insert into anoaca (ano_aca) values ( '{$_POST['rAno_aca']}' ) ";
				
				$cResult = fInupde($vQuery);
			}
			
		}
		
		include "ano_viewanodata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
