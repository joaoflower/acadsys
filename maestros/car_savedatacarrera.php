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
		if(!empty($_POST['rCar_des']) and !empty($_POST['rDoc_cre']) and $_POST['rAno_dur'] > 1 and $_POST['rSem_dur'] > 1 and !empty($_POST['rGrado']) and !empty($_POST['rTitulo']) and !empty($_POST['rAbr_car']))
		{
			if($_SESSION['sCarOption'] == 'Upd')
			{
				$vQuery = "update carrera set car_des = '{$_POST['rCar_des']}', doc_cre = '{$_POST['rDoc_cre']}',  ";
				$vQuery .= "ano_dur = '{$_POST['rAno_dur']}', sem_dur = '{$_POST['rSem_dur']}', grado = '{$_POST['rGrado']}', ";
				$vQuery .= "titulo = '{$_POST['rTitulo']}', abr_car = '{$_POST['rAbr_car']}' ";
				$vQuery .= "where cod_car = '{$_SESSION['sCarCod_car']}'  ";
	
				$cResult = fInupde($vQuery);
			
			}
			elseif($_SESSION['sCarOption'] == 'Ins')
			{
				$vQuery = "insert into carrera (cod_car, car_des, fch_cre, fch_fun, doc_cre, ano_dur, sem_dur, grado, ";
				$vQuery .= "titulo, abr_car) values ";
				$vQuery .= "('{$_SESSION['sCarCod_car']}', '{$_POST['rCar_des']}', date(now()), date(now()), '{$_POST['rDoc_cre']}', ";
				$vQuery .= "'{$_POST['rAno_dur']}', '{$_POST['rSem_dur']}', '{$_POST['rGrado']}', '{$_POST['rTitulo']}', ";
				$vQuery .= "'{$_POST['rAbr_car']}' ) ";
				
				$cResult = fInupde($vQuery);
			}
			
		}
		
		include "car_viewcarreradata.php";
	}
	else
	{
		header("Location:../index.php");
	}
?>
