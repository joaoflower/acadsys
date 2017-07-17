<?php
	session_start();
	include "include/funcget.php";
	include "include/funcsql.php";	

	$_SESSION['sUserlogin'] = $_POST['rLogin'];
	$vPasswd = $_POST['rPasswd'];
	
	if(!(empty($_SESSION['sUserlogin']) or empty($vPasswd)))
	{
		$bUser = FALSE;
		$bPasswd = FALSE;

		$vQuery = "Select login, passwd, cod_usu, niv_usu, paterno, materno, nombres ";		
		$vQuery .= "from usuario where login = '{$_SESSION['sUserlogin']}' ";
		$cUser = fQuery($vQuery);
		if($aUser = mysql_fetch_array($cUser))
		{
			$bUser = TRUE;
			if($aUser['passwd'] === fgetpassword($vPasswd))
			{
				if($aUser['niv_usu'] == '01' or $aUser['niv_usu'] == '02')
				{
					$bPasswd = TRUE;
					$vPasswd = "";
				}
			}
			
			if($bPasswd)
			{					
				$vPasswd = "";
				$_SESSION['sUsercod_usu'] = $aUser['cod_usu'];
				$_SESSION['sUserniv_usu'] = $aUser['niv_usu'];
				$_SESSION['sUserpaterno'] = $aUser['paterno'];
				$_SESSION['sUsermaterno'] = $aUser['materno'];
				$_SESSION['sUsernombres'] = $aUser['nombres'];
				$_SESSION['sUserip'] = $_SERVER['REMOTE_ADDR'];
			}
		}
		
		if($bUser)
		{
			if($bPasswd)
			{
				$_SESSION['sSafetylogin'] = '*CB143E366D7F5DB8E9B99C7E7946BFB0528D997A';
				header("Location:setcaranoper.php");
			}
			else
			{
				$_SESSION["sLoginError"] = TRUE;
				$_SESSION["sLoginMessage"] = 'ERROR, El Usuario o la Contraseña es Incorrecta !!!';
				header("Location:index2.php");				
			}		
		}
		else
		{
			$_SESSION["sLoginError"] = TRUE;
			$_SESSION["sLoginMessage"] = 'ERROR, El Usuario o la Contraseña es Incorrecta !!!';
			header("Location:index2.php");
		}
	}
	else
		header("Location:index.php");		
?>