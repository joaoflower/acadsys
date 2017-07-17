<?php
	function fviewano($pAno)
	{
		$vQuery = "Select ano_aca from anoaca order by ano_aca";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['ano_aca']?>" <?=($aResult['ano_aca'] == $pAno?"Selected":"")?>><?=$aResult['ano_aca']?></option>
		<?
		}
		
	}
	function fviewperiodo($pPer_aca)
	{
		$vQuery = "Select per_aca, per_des from periodo order by per_aca";
		$cPeriodo = fQuery($vQuery);
		while($aPeriodo = mysql_fetch_array($cPeriodo))
		{
		?>
			<option value="<?=$aPeriodo['per_aca']?>" <?=($aPeriodo['per_aca'] == $pPer_aca?"Selected":"")?>><?=$aPeriodo['per_des']?></option>
		<?
		}		
	}
	function fviewcondestu($pCon_est)
	{
		$vQuery = "Select con_est, con_des from condestu order by con_est";
		$cCondestu = fQuery($vQuery);
		while($aCondestu = mysql_fetch_array($cCondestu))
		{
		?>
			<option value="<?=$aCondestu['con_est']?>" <?=($aCondestu['con_est'] == $pCon_est?"Selected":"")?>><?=$aCondestu['con_des']?></option>
		<?
		}		
	}
	function fviewtipodoc($pTip_doc)
	{
		$vQuery = "Select tip_doc, doc_des from tipodoc order by tip_doc";
		$cTipodoc = fQuery($vQuery);
		while($aTipodoc = mysql_fetch_array($cTipodoc))
		{
		?>
			<option value="<?=$aTipodoc['tip_doc']?>" <?=($aTipodoc['tip_doc'] == $pTip_doc?"Selected":"")?>><?=$aTipodoc['doc_des']?></option>
		<?
		}		
	}
	function fviewsexo($pSexo)
	{
		?>
		<option value="1" <?=('1' == $pSexo?"Selected":"")?>>MASCULINO</option>
		<option value="2" <?=('2' == $pSexo?"Selected":"")?>>FEMENINO</option>
		<?

	}
	function fviewestcivil($pEst_civ)
	{
		$vQuery = "Select est_civ, est_des from estcivil order by est_civ";
		$cEstcivil = fQuery($vQuery);
		while($aEstcivil = mysql_fetch_array($cEstcivil))
		{
		?>
			<option value="<?=$aEstcivil['est_civ']?>" <?=($aEstcivil['est_civ'] == $pEst_civ?"Selected":"")?>><?=$aEstcivil['est_des']?></option>
		<?
		}		
	}
	function fviewmes($pCod_mes)
	{
		$vQuery = "Select cod_mes, des_mes from meses order by cod_mes";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['cod_mes']?>" <?=($aResult['cod_mes'] == $pCod_mes?"Selected":"")?>><?=$aResult['des_mes']?></option>
		<?
		}	
	}
	function fviewdia_nac($pDia_nac)
	{
		$vDia = "";
		for($ii = 1; $ii <= 31; $ii++)
		{
			$vDia = (strlen($ii)==1?"0":"").$ii;
		?>
			<option value="<?=$vDia?>" <?=($vDia == $pDia_nac?"Selected":"")?>><?=$vDia?></option>
		<?
		}		
	}
	function fviewano_nac($pAno_nac)
	{
		for($ii = 1930; $ii <= 1995; $ii++)
		{
		?>
			<option value="<?=$ii?>" <?=($ii == $pAno_nac?"Selected":"")?>><?=$ii?></option>
		<?
		}		
	}
	function fviewsemestre($pSem_anu)
	{
		$vQuery = "Select sem_anu, sem_des from semestre order by sem_anu";
		$cSemestre = fQuery($vQuery);
		while($aSemestre = mysql_fetch_array($cSemestre))
		{
		?>
			<option value="<?=$aSemestre['sem_anu']?>" <?=($aSemestre['sem_anu'] == $pSem_anu?"Selected":"")?>><?=$aSemestre['sem_des']?></option>
		<?
		}		
	}
	function fviewtipocur($pTip_cur)
	{
		$vQuery = "Select tip_cur, cur_des from tipocur order by tip_cur";
		$cTipocur = fQuery($vQuery);
		while($aTipocur = mysql_fetch_array($cTipocur))
		{
		?>
			<option value="<?=$aTipocur['tip_cur']?>" <?=($aTipocur['tip_cur'] == $pTip_cur?"Selected":"")?>><?=$aTipocur['cur_des']?></option>
		<?
		}		
	}
	function fviewtipopre($pTip_pre)
	{
		$vQuery = "Select tip_pre, pre_des from tipopre order by tip_pre";
		$cTipopre = fQuery($vQuery);
		while($aTipopre = mysql_fetch_array($cTipopre))
		{
		?>
			<option value="<?=$aTipopre['tip_pre']?>" <?=($aTipopre['tip_pre'] == $pTip_pre?"Selected":"")?>><?=$aTipopre['pre_des']?></option>
		<?
		}		
	}
	function fviewplancar($pCod_car, $pPln_est)
	{
		$vQuery = "Select pln_est, ano_ini, ano_fin from plan where cod_car = '$pCod_car' order by pln_est";
		$cPlan = fQuery($vQuery);
		while($aPlan = mysql_fetch_array($cPlan))
		{
		?>
			<option value="<?=$aPlan['pln_est']?>" <?=($aPlan['pln_est'] == $pPln_est?"Selected":"")?>><?=$aPlan['pln_est']?> - [ <?=$aPlan['ano_ini']?> - <?=$aPlan['ano_fin']?> ]</option>
		<?
		}		
	}
	function fviewgrupo($pSec_gru)
	{
		$vQuery = "Select sec_gru, sec_des from grupo where sec_gru <= '05' order by sec_gru";
		$cGrupo = fQuery($vQuery);
		while($aGrupo = mysql_fetch_array($cGrupo))
		{
		?>
			<option value="<?=$aGrupo['sec_gru']?>" <?=($aGrupo['sec_gru'] == $pSec_gru?"Selected":"")?>><?=$aGrupo['sec_des']?></option>
		<?
		}		
	}
	function fviewturno($pTur_est)
	{
		$vQuery = "Select tur_est, tur_des from turno order by tur_est";
		$cTurno = fQuery($vQuery);
		while($aTurno = mysql_fetch_array($cTurno))
		{
		?>
			<option value="<?=$aTurno['tur_est']?>" <?=($aTurno['tur_est'] == $pTur_est?"Selected":"")?>><?=$aTurno['tur_des']?></option>
		<?
		}		
	}
	function fviewmodact($pMod_act)
	{
		$vQuery = "Select mod_act, act_des from modact order by mod_act";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['mod_act']?>" <?=($aResult['mod_act'] == $pMod_act?"Selected":"")?>><?=$aResult['act_des']?></option>
		<?
		}		
	}
	function fviewmodmat($pMod_mat)
	{
		$vQuery = "Select mod_mat, mod_des from modmat order by mod_mat";
		$cModmat = fQuery($vQuery);
		while($aModmat = mysql_fetch_array($cModmat))
		{
		?>
			<option value="<?=$aModmat['mod_mat']?>" <?=($aModmat['mod_mat'] == $pMod_mat?"Selected":"")?>><?=$aModmat['mod_des']?></option>
		<?
		}		
	}
	function fviewmodnot($pMod_not)
	{
		$vQuery = "Select mod_not, not_des from modnot order by mod_not";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['mod_not']?>" <?=($aResult['mod_not'] == $pMod_not?"Selected":"")?>><?=$aResult['not_des']?></option>
		<?
		}		
	}
	function fviewcurso($pCod_car, $pPln_est, $pSem_anu, $pCod_cur)
	{
		$vQuery = "Select cod_cur, nom_cur, sem_anu from curso ";
		$vQuery .= "where cod_car = '$pCod_car' and pln_est = '$pPln_est' and sem_anu = '$pSem_anu' order by sem_anu, cod_cur";
		$cCurso = fQuery($vQuery);
		while($aCurso = mysql_fetch_array($cCurso))
		{
		?>
			<option value="<?=$aCurso['cod_cur']?>" <?=($aCurso['cod_cur'] == $pCod_cur?"Selected":"")?>><?=$aCurso['cod_cur']." - ".$aCurso['nom_cur']?></option>
		<?
		}		
	}
	function fviewsemestrecurso($pCod_car, $pPln_est, $pSem_anu)
	{
		$vQuery = "select distinct cu.sem_anu, se.sem_des from curso cu ";
		$vQuery .= "left join semestre se on cu.sem_anu = se.sem_anu ";
		$vQuery .= "where cu.cod_car = '$pCod_car' and pln_est = '$pPln_est' order by cu.sem_anu";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['sem_anu']?>" <?=($aResult['sem_anu'] == $pSem_anu?"Selected":"")?>><?=$aResult['sem_des']?></option>
		<?
		}	
	}
	function fviewanomespago($pCod_car, $pAno_aca, $pPer_aca, $pAno, $pCod_mes)
	{
		$tPago = "pago".$pAno_aca;
		$vAno_mes = $pAno.$pCod_mes;
		$vQuery = "select concat(pa.ano, pa.cod_mes) as ano_mes, pa.ano, me.des_mes ";
		$vQuery .= "from $tPago pa left join meses me on pa.cod_mes = me.cod_mes ";
		$vQuery .= "where pa.cod_car = '$pCod_car' and pa.ano_aca = '$pAno_aca' and pa.per_aca = '$pPer_aca' ";
		$vQuery .= "order by ano_mes ";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['ano_mes']?>" <?=($aResult['ano_mes'] == $vAno_mes?"Selected":"")?>><?=$aResult['ano']?> - <?=$aResult['des_mes']?></option>
		<?
		}	
	}

	//-----------------------------------------------------
	function fviewsemmatri($pCod_car, $pAno_aca, $pPer_aca, $pSem_anu)
	{
		?>
			<option value="99">TODOS</option>
		<?
		$tEstumat = "estumat".$pAno_aca;
		$vQuery = "select distinct em.sem_anu, sm.sem_des ";
		$vQuery .= "from $tEstumat em left join semestre sm on em.sem_anu = sm.sem_anu ";
		$vQuery .= "where em.ano_aca = '$pAno_aca' and em.per_aca = '$pPer_aca' and em.cod_car = '$pCod_car'";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['sem_anu']?>" <?=($aResult['sem_anu'] == $pSem_anu?"Selected":"")?>><?=$aResult['sem_des']?></option>
		<?
		}		
	}
	function fviewgrumatri($pCod_car, $pAno_aca, $pPer_aca, $pSec_gru)
	{
		?>
			<option value="99">TODOS</option>
		<?
		$tEstumat = "estumat".$pAno_aca;
		$vQuery = "select distinct em.sec_gru, gr.sec_des ";
		$vQuery .= "from $tEstumat em left join grupo gr on em.sec_gru = gr.sec_gru ";
		$vQuery .= "where em.ano_aca = '$pAno_aca' and em.per_aca = '$pPer_aca' and em.cod_car = '$pCod_car'";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['sec_gru']?>" <?=($aResult['sec_gru'] == $pSec_gru?"Selected":"")?>><?=$aResult['sec_des']?></option>
		<?
		}		
	}
	function fviewturmatri($pCod_car, $pAno_aca, $pPer_aca, $pTur_est)
	{
		?>
			<option value="9">TODOS</option>
		<?
		$tEstumat = "estumat".$pAno_aca;
		$vQuery = "select distinct em.tur_est, tr.tur_des ";
		$vQuery .= "from $tEstumat em left join turno tr on em.tur_est = tr.tur_est ";
		$vQuery .= "where em.ano_aca = '$pAno_aca' and em.per_aca = '$pPer_aca' and em.cod_car = '$pCod_car'";
		$cResult = fQuery($vQuery);
		while($aResult = mysql_fetch_array($cResult))
		{
		?>
			<option value="<?=$aResult['tur_est']?>" <?=($aResult['tur_est'] == $pTur_est?"Selected":"")?>><?=$aResult['tur_des']?></option>
		<?
		}		
	}
	

?>