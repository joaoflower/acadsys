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
		$_SESSION['sMepAno'] = "";
		$_SESSION['sMepCod_mes'] = "";
		$vCont = 1;
		include "mat_viewmodmatdata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
