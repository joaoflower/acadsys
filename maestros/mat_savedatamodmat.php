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
		if(!empty($_POST['rMod_des']) and !empty($_POST['rMod_act']) and !empty($_POST['rMod_not']))
		{
			if($_SESSION['sModOption'] == 'Upd')
			{
				$vQuery = "update modmat set mod_des = '{$_POST['rMod_des']}', mod_act = '{$_POST['rMod_act']}', ";
				$vQuery .= "mod_not = '{$_POST['rMod_not']}' ";
				$vQuery .= "where mod_mat = '{$_SESSION['sModMod_mat']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sModOption'] == 'Ins')
			{
				$vQuery = "insert into modmat (mod_mat, mod_des, mod_act, mod_not) values ";
				$vQuery .= "('{$_SESSION['sModMod_mat']}', '{$_POST['rMod_des']}', '{$_POST['rMod_act']}', '{$_POST['rMod_not']}') ";
				
				$cResult = fInupde($vQuery);
			}
			$_SESSION['sModMod_mat'] = "";
			
		}
		
		include "mat_viewmodmatdata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
