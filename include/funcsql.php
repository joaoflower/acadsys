<?php
	function fInupde($pQuery)
	{
		session_start();
		$xSerdata = mysql_connect($_SESSION["sDbHost"], $_SESSION["sDbUser"], $_SESSION["sDbPasswd"]);
		mysql_select_db('apcu', $xSerdata);
		mysql_query('BEGIN', $xSerdata);
		$cResult = mysql_query($pQuery, $xSerdata);
		if ($cResult) mysql_query('COMMIT', $xSerdata);
		else mysql_query('ROLLBACK', $xSerdata);
		mysql_close($xSerdata);
		return $cResult;
	}
	
	function fQuery($pQuery)
	{
		session_start();
		$xSerdata = mysql_connect($_SESSION["sDbHost"], $_SESSION["sDbUser"], $_SESSION["sDbPasswd"]);
		mysql_select_db('apcu', $xSerdata);
		return mysql_query($pQuery, $xSerdata);
	}
	function fCountq($pResult) //($pQuery)
	{
		session_start();
/*		$xSerdata = mysql_connect($_SESSION["sDbHost"], $_SESSION["sDbUser"], $_SESSION["sDbPasswd"]);
		$cQuery = mysql_query($pQuery, $xSerdata);
		return mysql_num_rows($cQuery);*/
		return mysql_num_rows($pResult);
	}
?>