<?
	function ftdstyle($pNum_rows, $pCont)
	{
		$vReturn = "";
		if($pNum_rows == $pCont) 
			$vReturn = "class=\"tdultimo\" ";
		return $vReturn;
	}
	function ftdstylenota($pNum_rows, $pCont, $pNota)
	{
		$vReturn = "";
		if($pNota >= 11)
		{
			if($pNum_rows == $pCont) 
				$vReturn = "class=\"tdnotaaprultimo\" ";
			else
				$vReturn = "class=\"tdnotaapr\" ";
		}
		else
		{
			if($pNum_rows == $pCont) 
				$vReturn = "class=\"tdnotadesultimo\" ";
			else
				$vReturn = "class=\"tdnotades\" ";
		}
		
		return $vReturn;
	}
	function ftrstyle($pCont)
	{
		$vReturn = "";
		if($pCont % 2 == 0) 
			$vReturn = "class=\"trpar\" id=\"p\" ";
		else
			$vReturn = "class=\"trinpar\" id=\"i\" ";
		return $vReturn;
	}
?>
