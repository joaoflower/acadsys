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
				$this->Ln(8);
				
				$this->Image("../images/logo.jpg",10,10);
				
				$vCar_des = "CARRERA PROFESIONAL DE ".$_SESSION['sFrameCar_des'];
				$vHeader = "HISTORIAL DE NOTAS";
				
				$this->SetFont('Arial','B',14);
				$this->Cell(0,5,$_SESSION['sFrameUniversity'], 0, 0, 'C');
				$this->Ln();
				$this->SetFont('Arial','B',12);
				$this->Cell(0,5,$vCar_des, 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(4);
				
				$this->SetFont('Arial','B',12);
				$this->Cell(0,5,$vHeader, 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(4);
				$this->Subhnota();
				$this->Subhnota2();
				
			}
			function Subhnota()
			{
				$this->SetFont('arial','B',9);
				
				$this->Cell(5);
				$this->Cell(180,4, "ESTUDIANTE  :  {$_SESSION['sNotaNum_mat']} - {$_SESSION['sNotaNom_est']}", 0);
				$this->Ln();
				
				$this->Ln(1);
			}
			function Subhnota2()
			{
				$this->SetFont('arialn','B',7);
							
				$this->Cell(5);
				$this->Cell(7,5,'', 1, 0, 'C');
				$this->Cell(15,5,'CÓDIGO', 1, 0, 'C');
				$this->Cell(75,5,'NOMBRE DE CURSO', 1, 0, 'C');
				$this->Cell(7,5,'SEM', 1, 0, 'C');
				$this->Cell(10,5,'CRED', 1, 0, 'C');
				$this->Cell(15,5,'ACTA', 1, 0, 'C');
				$this->Cell(20,5,'MODALIDAD', 1, 0, 'C');
				$this->Cell(10,5,'NOTA', 1, 0, 'C');
				$this->Ln();
				$this->Ln(1);
			}
			
			function Footer()
			{				
				$this->SetFont('arialn','',10);
				$this->Line(15, 277, 195, 277);
				$this->SetY(-20);			
				$this->Cell(5);
				$this->Cell(130, 4,"", 0);
				$this->Cell(50, 4,'Pag: '.$this->PageNo().' / {nb}',0,0,'R');
			}
			function Body()
			{			
				$this->SetFont('arialn','',10);
				
				$vCont = 1;
				$vAno_per = "";
			  	$vQuery = $_SESSION['sPrnSql'];

				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					if($vAno_per != ($aResult['ano_aca'].$aResult['per_aca']))
					{
						$vAno_per = ($aResult['ano_aca'].$aResult['per_aca']);
						
						$this->SetFont('arialn','B',10);
						$this->Cell(5);
						$this->Cell(180,5, "AÑO : {$aResult['ano_aca']} - PERIODO : {$aResult['per_des']}", 0, 0, 'L');
						$this->Ln();
					}					
					$this->SetFont('arialn','',10);	
					$this->Cell(5);
					$this->Cell(7,5, '', 0, 0, 'C');
					$this->Cell(15,5, $aResult['cod_cat'], 0, 0, 'C');
					$this->Cell(75,5, $aResult['nom_cur'], 0, 0, 'L');
					$this->Cell(7,5, $aResult['sem_anu'], 0, 0, 'C');
					$this->Cell(10,5, $aResult['crd_cur'], 0, 0, 'R');
					$this->Cell(15,5, $aResult['cod_act'], 0, 0, 'C');
					$this->Cell(20,5, $aResult['not_des'], 0, 0, 'L');
					$this->Cell(10,5, $aResult['not_cur'], 0, 0, 'R');
					
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