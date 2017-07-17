<?
	session_start();
	include "../include/funcget.php";
	include "../include/funcsql.php";
	include "../include/funcoption.php";

	if(fsafetysetcaranoper())
	{
		if(!empty($_POST['rPln_est']) and !empty($_POST['rSem_anu']))
		{
?>
				<select name="rCod_cur" id="rCod_cur">
					<? fviewcurso($_SESSION['sFrameCod_car'], $_POST['rPln_est'], $_POST['rSem_anu'], '001'); ?> 
				</select>
<?
		}
	}
	else
	{
		header("Location:../index.php");
	}
?>