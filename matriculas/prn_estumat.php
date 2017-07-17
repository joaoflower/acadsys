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
				$vHeader = "ESTUDIANTES MATRICULADOS [".$_SESSION['sFrameAno_aca']."-".$_SESSION['sFramePer_abr']."]";
				
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
				
			}
			function Subhnota()
			{
				$this->SetFont('arialn','B',7);
							
				$this->Cell(5);
				$this->Cell(7,5,'N°', 1, 0, 'C');
				$this->Cell(20,5,'CÓDIGO', 1, 0, 'C');
				$this->Cell(75,5,'APELLIDOS Y NOMBRES', 1, 0, 'C');
				$this->Cell(20,5,'SEMESTRE', 1, 0, 'C');
				$this->Cell(20,5,'MODALIDAD', 1, 0, 'C');
				$this->Cell(18,5,'GRUPO', 1, 0, 'C');
				$this->Cell(15,5,'TURNO', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
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
				
				$vQuery = $_SESSION['sPrnSql'];

				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					$this->Cell(5);
					$this->Cell(7,5, $vCont, 0, 0, 'C');
					$this->Cell(20,5, $aResult['num_mat'], 0, 0, 'C');
					$this->Cell(75,5, $aResult['nom_est'], 0, 0, 'L');
					$this->Cell(20,5, $aResult['sem_des'], 0, 0, 'L');
					$this->Cell(20,5, $aResult['mod_des'], 0, 0, 'L');
					$this->Cell(18,5, $aResult['sec_des'], 0, 0, 'L');
					$this->Cell(15,5, $aResult['tur_des'], 0, 0, 'L');
					$this->Cell(10,5,'', 1, 0, 'C');
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