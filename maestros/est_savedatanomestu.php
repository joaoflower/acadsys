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
		
		$vQuery = "update estudiante set paterno = '{$_POST['rPaterno']}', materno = '{$_POST['rMaterno']}',  ";
		$vQuery .= "nombres = '{$_POST['rNombres']}' ";
		$vQuery .= "where num_mat = '{$_SESSION['sEstuNum_mat']}' and cod_car = '{$_SESSION['sEstuCod_car']}' ";
		
		$cEstudia = fInupde($vQuery);
		
		$vQuery = "Select es.num_mat, es.cod_car, es.paterno, es.materno, es.nombres, es.tip_doc, td.doc_des, es.num_doc, ";
		$vQuery .= "es.fch_nac, es.sexo, es.est_civ, ec.est_des, es.direc, es.fono, es.celular, es.email, es.con_est, ce.con_des ";
		$vQuery .= "from estudiante es left join tipodoc td on es.tip_doc = td.tip_doc ";
		$vQuery .= " left join estcivil ec on es.est_civ = ec.est_civ ";
		$vQuery .= " left join condestu ce on es.con_est = ce.con_est ";
		$vQuery .= "where es.num_mat = '{$_SESSION['sEstuNum_mat']}' and es.cod_car = '{$_SESSION['sEstuCod_car']}' ";
		
		$cEstudia = fQuery($vQuery);
		if($aEstudia = mysql_fetch_array($cEstudia))
		{
			$bDatos = TRUE;
		}

	}
	else
	{
		header("Location:../index.php");
	}
	
	if($bDatos == TRUE)
	{
		include "est_viewdataestudata.php";
	}
?>