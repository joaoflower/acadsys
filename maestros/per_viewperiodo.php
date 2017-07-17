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
		$_SESSION['sPerPer_aca'] = "";
		$vCont = 1;
		include "per_viewperiododata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
