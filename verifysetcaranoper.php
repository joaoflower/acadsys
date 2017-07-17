<?php
	session_start();
	include "include/funcget.php";
	include "include/funcsql.php";

	if(fsafetylogin())
	{
		$sUser['cod_car'] = $_POST['rCod_car'];
		$sUser['ano_aca'] = $_POST['rAno_aca'];
		$sUser['per_aca'] = $_POST['rPer_aca'];
		
		if(fverifysetcaranoper($_POST['rCod_car'], $_POST['rAno_aca'], $_POST['rPer_aca']))
		{
			$vQuery = "select car_des from carrera where cod_car = '{$_POST['rCod_car']}'";
			$cCarrera = fQuery($vQuery);
			if($aCarrera = mysql_fetch_array($cCarrera))
			{
				$vQuery = "select per_des, per_abr from periodo where per_aca = '{$_POST['rPer_aca']}'";
				$cPeriodo = fQuery($vQuery);
				if($aPeriodo = mysql_fetch_array($cPeriodo))
				{
					
					$_SESSION['sFrameCod_car'] = $_POST['rCod_car'];
					$_SESSION['sFrameAno_aca'] = $_POST['rAno_aca'];
					$_SESSION['sFramePer_aca'] = $_POST['rPer_aca'];
					$_SESSION['sFrameNew_cod'] = substr($_POST['rAno_aca'], 2, 2).substr($_POST['rPer_aca'], 1, 1);
					$_SESSION['sFrameCar_des'] = $aCarrera['car_des'];
					$_SESSION['sFramePer_des'] = $aPeriodo['per_des'];
					$_SESSION['sFramePer_abr'] = $aPeriodo['per_abr'];
					
					$_SESSION['sSafetysetcaranoper'] = '*BD90272AD8720E5E35406D22E0BC26F391C342C2';
					header("Location:admin/");
				}
				else
				{
					header("Location:index.php");
				}
			}
			else
			{
				header("Location:index.php");
			}
		}
		else
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:index.php");
	}		
?>