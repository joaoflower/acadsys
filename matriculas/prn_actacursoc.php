<?php

	session_start();
	include "../include/funcget.php";
	require "../include/funcsql.php";
	require "../include/fpdf.php";

	if(fsafetysetcaranoper())
	{
		class PDF extends FPDF
		{
			function Header()
			{				
				//---------------------------------------
				$this->SetFont('arial','B',9);
				
				$tActa = "acta".$_SESSION['sFrameAno_aca'];
				$vCod_act = "";
			  
			  	$vQuery = "select cod_act from $tActa ";
				$vQuery .= "where cod_car = '{$_SESSION['sFrameCod_car']}' and ano_aca = '{$_SESSION['sFrameAno_aca']}' and ";
				$vQuery .= "per_aca = '{$_SESSION['sFramePer_aca']}' and pln_est = '{$_SESSION['sPrnPln_est']}' and ";
				$vQuery .= "cod_cur = '{$_SESSION['sPrnCod_cur']}' and sec_gru = '{$_SESSION['sPrnSec_gru']}' and ";
				$vQuery .= "mod_mat = '{$_SESSION['sPrnMod_act']}' ";
				$cResult = fQuery($vQuery);
				if($aResult = mysql_fetch_array($cResult))
				{
					$_SESSION['sPrnCod_act'] = $aResult['cod_act'];
				}
				else
				{
					
					$vQuery = "select max(cod_act) as cod_act from $tActa ";
					$cResult = fQuery($vQuery);
					if($aResult = mysql_fetch_array($cResult))
					{
						if($aResult['cod_act'] == "NULL")
							$vCod_act = "1";
						else
							$vCod_act = $aResult['cod_act'] + 1;	
							
						if(strlen($vCod_act) == 1)
							$vCod_act = "00000".$vCod_act;
						if(strlen($vCod_act) == 2)
							$vCod_act = "0000".$vCod_act;
						if(strlen($vCod_act) == 3)
							$vCod_act = "000".$vCod_act;
						if(strlen($vCod_act) == 4)
							$vCod_act = "00".$vCod_act;
						if(strlen($vCod_act) == 5)
							$vCod_act = "0".$vCod_act;
							
						$vQuery = "insert into $tActa (cod_act, cod_car, ano_aca, per_aca, pln_est, cod_cur, sec_gru, mod_mat, ";
						$vQuery .= "cod_prf, fch_act)  values ";
						$vQuery .= "('$vCod_act', '{$_SESSION['sFrameCod_car']}', '{$_SESSION['sFrameAno_aca']}', ";
						$vQuery .= "'{$_SESSION['sFramePer_aca']}', '{$_SESSION['sPrnPln_est']}', '{$_SESSION['sPrnCod_cur']}', ";
						$vQuery .= "'{$_SESSION['sPrnSec_gru']}', '{$_SESSION['sPrnMod_act']}', '{$_SESSION['sPrnCod_prf']}', ";
						$vQuery .= " now()) ";
						
						$cGrabo = fQuery($vQuery);
						$_SESSION['sPrnCod_act'] = $vCod_act;
						
					}
				}
				
				$this->Ln(12);

				$this->Cell(165,4, "{$_SESSION['sPrnCod_act']}", 0, 0, 'R');
				
				//---------------------------------------
				$this->Ln(8);
								
				$this->Subhnota();
			}
			function Subhnota()
			{
				$this->SetFont('arial','B',9);
				
				$this->Cell(5,5, "", 0);
				$this->Cell(120,5, "CARRERA PROFESIONAL: {$_SESSION['sFrameCar_des']}", 0);
				$this->Cell(70,5, "MODALIDAD: {$_SESSION['sPrnAct_des']}", 0);
				$this->Ln();

				$this->Cell(5,5, "", 0);
				$this->Cell(190,5, "ASIGNATURA: {$_SESSION['sPrnNom_cur']}", 0);
				$this->Ln();

				$this->Cell(5,5, "", 0);
				$this->Cell(120,5, "DOCENTE: {$_SESSION['sPrnNom_prf']}", 0);
				$this->Cell(70,5, "GRUPO: {$_SESSION['sPrnSec_des']}", 0);
				$this->Ln();
				
				$this->Cell(5,5, "", 0);
				$this->Cell(60,5, "AÑO ACADÉMICO: {$_SESSION['sFrameAno_aca']} - {$_SESSION['sFramePer_abr']}", 0);
				$this->Cell(60,5, "SEMESTRE: {$_SESSION['sPrnSem_des']}", 0);
				$this->Cell(70,5, "TURNO: {$_SESSION['sPrnTur_des']}", 0);				
				$this->Ln();
				
				
				$this->Ln(16);
			}
						
			function Footer()
			{				
				$this->SetFont('arialn','',10);
				$this->Line(15, 277, 195, 277);
				$this->SetY(-18);			
				$this->Cell(5);
				//$this->Cell(130, 4,"", 0);
				$this->Cell(190, 4,'Pag: '.$this->PageNo().' / {nb}',0,0,'R');
			}
			function Body()
			{			
				$this->SetFont('arialn','',10);
				
				$vCont = 1;
			  
			  	$vQuery = $_SESSION['sPrnSql'];

				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					
					//if($vCont > 10 && (($vCont-1) % 25 == 0))
					//	$this->AddPage();
					//$this->Cell(9);
					$this->Cell(5,7.3, $vCont, 0, 0, 'C');
					$this->Cell(20,7.3, $aResult['num_mat'], 0, 0, 'C');
					$this->Cell(80,7.3, $aResult['nom_est'], 0, 0, 'L');
					$this->Ln();
					
					$vCont++;
				}
				$this->Cell(5);
				$this->Cell(90,1, '________________________________________________________', 0, 0, 'L');
				$this->Cell(90,1, '________________________________________________________', 0, 0, 'L');
				$this->Ln();
		
			}
		}
	
		$pdf=new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddFont('arialn','','arialn.php');
		$pdf->AddFont('arialn','B','arialnb.php');
		$pdf->AddPage();
		$pdf->Body();
		
		$pdf->Output();
	}
	else
	{
		header("Location:../index.php");
	}
?> 