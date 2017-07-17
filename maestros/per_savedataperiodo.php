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
		if(!empty($_POST['rPer_des']) and !empty($_POST['rPer_abr']))
		{
			if($_SESSION['sPerOption'] == 'Upd')
			{
				$vQuery = "update periodo set per_des = '{$_POST['rPer_des']}', per_abr = '{$_POST['rPer_abr']}'  ";
				$vQuery .= "where per_aca = '{$_SESSION['sPerPer_aca']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sPerOption'] == 'Ins')
			{
				$vQuery = "insert into periodo (per_aca, per_des, per_abr ) values ";
				$vQuery .= "('{$_SESSION['sPerPer_aca']}', '{$_POST['rPer_des']}', '{$_POST['rPer_abr']}' ) ";
				
				$cResult = fInupde($vQuery);
			}
			$_SESSION['sPerPer_aca'] = "";
			
		}
		
		include "per_viewperiododata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
