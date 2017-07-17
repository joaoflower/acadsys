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
		if(!empty($_POST['rAct_des']))
		{
			if($_SESSION['sModOption'] == 'Upd')
			{
				$vQuery = "update modact set act_des = '{$_POST['rAct_des']}' ";
				$vQuery .= "where mod_act = '{$_SESSION['sModMod_act']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sModOption'] == 'Ins')
			{
				$vQuery = "insert into modact (mod_act, act_des) values ";
				$vQuery .= "('{$_SESSION['sModMod_act']}', '{$_POST['rAct_des']}') ";
				
				$cResult = fInupde($vQuery);
			}
			$_SESSION['sModMod_act'] = "";
			
		}
		
		include "act_viewmodactdata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
