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
		if(!empty($_POST['rNot_des']) and !empty($_POST['rMod_act']))
		{
			if($_SESSION['sModOption'] == 'Upd')
			{
				$vQuery = "update modnot set not_des = '{$_POST['rNot_des']}', mod_act = '{$_POST['rMod_act']}' ";
				$vQuery .= "where mod_not = '{$_SESSION['sModMod_not']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sModOption'] == 'Ins')
			{
				$vQuery = "insert into modnot (mod_not, not_des, mod_act) values ";
				$vQuery .= "('{$_SESSION['sModMod_not']}', '{$_POST['rNot_des']}', '{$_POST['rMod_act']}') ";
				
				$cResult = fInupde($vQuery);
			}
			$_SESSION['sModMod_not'] = "";
			
		}
		
		include "not_viewmodnotdata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
