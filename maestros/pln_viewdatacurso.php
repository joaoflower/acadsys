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
		$_SESSION['sPlanCod_cur'] = "";
		
		if(!empty($_POST['rCod_cur']))
		{
			$_SESSION['sPlanCod_cur'] = $_POST['rCod_cur'];
			include "pln_viewdatacursodata.php";
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
?>