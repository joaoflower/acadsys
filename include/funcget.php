<?php
	function fgetconnect()
	{
		session_start();		
		$_SESSION["sDbHost"] = 'localhost';
		$_SESSION["sDbUser"] = 'root';
		$_SESSION["sDbPasswd"] = 'mysqlmysql';
	}
	function fgetpassword($pPasswd)
	{
		$vQuery = "Select password('$pPasswd') as passwd";
		$cPasswd = fQuery($vQuery);
		if($aPasswd = mysql_fetch_array($cPasswd))
		{
			return $aPasswd['passwd'];
		}		
	}
	function fsafetylogin()
	{
		session_start();
		if($_SESSION['sSafetylogin'] == '*CB143E366D7F5DB8E9B99C7E7946BFB0528D997A')
			return TRUE;
		else
			return FALSE;
	}
	function fverifysetcaranoper($pCod_car, $pAno_aca, $pPer_aca)
	{
		if(!empty($pCod_car))
			if($pAno_aca >= '2015' and $pAno_aca <= '2019')
				if($pPer_aca >= '00' and $pPer_aca <= '04')
					return true;
		return false;		
	}
	function fsafetysetcaranoper()
	{
		if(fsafetylogin())
		{
			if($_SESSION['sSafetysetcaranoper'] == '*BD90272AD8720E5E35406D22E0BC26F391C342C2')
				return TRUE;
			else
				return FALSE;
		}
		return false;
	}
	
	//-------------------------------------------------------
	
	function fFecha()
	{
		$vQuery = "Select now() as fch_mat";
		$cFecha = fQuery($vQuery);
		if($aFecha = mysql_fetch_array($cFecha) )
			return $aFecha['fch_mat'];
	}
	function fFechadate()
	{
		$vQuery = "Select date(now()) as fch_mat";
		$cFecha = fQuery($vQuery);
		if($aFecha = mysql_fetch_array($cFecha) )
			return $aFecha['fch_mat'];
	}
	function fFechastd($pFecha)
	{
		$vFecha = $pFecha;
		$vAmpm = "";
		$vReturn = substr($vFecha, 8, 2)."/".substr($vFecha, 5, 2)."/".substr($vFecha, 0, 4)." ";
		if(substr($vFecha, 11, 2) == '00')
		{
			$vHora = '12';	$vAmpm = 'AM';
		}
		if(substr($vFecha, 11, 2) >= '01' and substr($vFecha, 11, 2) <= '11')
		{
			$vHora = substr($vFecha, 11, 2);	$vAmpm = 'AM';
		}
		if(substr($vFecha, 11, 2) == '12')
		{
			$vHora = substr($vFecha, 11, 2);	$vAmpm = 'PM';
		}
		if(substr($vFecha, 11, 2) >= '13' and substr($vFecha, 11, 2) <= '23')
		{
			$vHora = substr($vFecha, 11, 2) - 12;
			$vHora = ((strlen((string)$vHora) == 1)?'0':'').(string)$vHora;
			$vAmpm = 'PM';
		}
		
		$vReturn .= $vHora.":".substr($vFecha, 14, 2).":".substr($vFecha, 17, 2)." ".$vAmpm;
		return $vReturn;
	}
	
	function fFechad($pFecha)
	{
		$vFecha = $pFecha;
		$vReturn = substr($vFecha, 8, 2)."/".substr($vFecha, 5, 2)."/".substr($vFecha, 0, 4);
		return $vReturn;
	}
	function fFechamy($pFecha)
	{
		$vFecha = $pFecha;
		$vReturn = substr($vFecha, 6, 4)."-".substr($vFecha, 3, 2)."-".substr($vFecha, 0, 2);
		return $vReturn;
	}
	function fVerinotaapr($pNot_cur)
	{
		if($pNot_cur >= 0 and $pNot_cur <= 10)
			return FALSE;
		elseif($pNot_cur > 10 and $pNot_cur <= 20)
			return TRUE;
	}
	function fIsnota($pNot_cur)
	{
		if($pNot_cur >= 0 and $pNot_cur <= 20 and strlen($pNot_cur) > 0) 
			return TRUE;
		else
			return FALSE;
	}
?>