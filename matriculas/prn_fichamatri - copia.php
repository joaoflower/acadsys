<?php

	session_start();
	include "../include/funcget.php";
	require "../include/funcsql.php";
	require "../include/fpdf.php";

	if(fsafetysetcaranoper())
	{
		class PDF extends FPDF
		{

			function Header2()
			{
				$vCar_des = "CARRERA PROFESIONAL DE ".$_SESSION['sFrameCar_des'];
				$vHeader = "FICHA DE MATRÍCULA [".$_SESSION['sFrameAno_aca']."-".$_SESSION['sFramePer_abr']."]";
				
				$this->SetFont('Arial','B',14);
				$this->Cell(0,5, $_SESSION['sFrameUniversity'], 0, 0, 'C');	// Universidad
				$this->Ln();
				$this->SetFont('Arial','B',12);
				$this->Cell(0,5,$vCar_des, 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(4);
				
				$this->SetFont('Arial','B',12);
				$this->Cell(0,5,$vHeader, 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(4);
				
				//-------------------------------------
				
				$this->SetFont('arial','B',8);
				
				$this->Cell(5);
				$this->Cell(180,4, "ESTUDIANTE  :  {$_SESSION['sMatriNum_mat']} - {$_SESSION['sMatriNombre']}", 0);
				$this->Ln();
				
				$this->Cell(5);
				$this->Cell(60,4, "PLAN DE ESTUDIOS  :  {$_SESSION['sMatriPln_des']}", 0);
				$this->Cell(60,4, "SEMESTRE  :  {$_SESSION['sMatriSem_des']}", 0);
				$this->Ln();
				
				$this->Cell(5);
				$this->Cell(60,4, "GRUPO  :  {$_SESSION['sMatriSec_des']}", 0);
				$this->Cell(60,4, "TURNO  :  {$_SESSION['sMatriTur_des']}", 0);
				$this->Cell(60,4, "MODALIDAD  :  {$_SESSION['sMatriMod_des']}", 0);
				$this->Ln();
				
				$this->Ln(1);
				
				//-------------------------------------
				
				$this->SetFont('arialn','B',7);
							
				$this->Cell(5);
				$this->Cell(7,5,'N°', 1, 0, 'C');
				$this->Cell(15,5,'CÓDIGO', 1, 0, 'C');
				$this->Cell(75,5,'NOMBRE DE CURSO', 1, 0, 'C');
				$this->Cell(7,5,'SEM', 1, 0, 'C');
				$this->Cell(20,5,'MODALIDAD', 1, 0, 'C');
				$this->Cell(15,5,'GRUPO', 1, 0, 'C');
				$this->Cell(15,5,'TURNO', 1, 0, 'C');
				$this->Cell(10,5,'CRED', 1, 0, 'C');
				$this->Ln();
				$this->Ln(1);
				
			}
			function Dataficha()
			{
				$this->SetFont('arialn','',10);
				
				$vCont = 1;
			  	$vQuery = $_SESSION['sPrnSql'];

				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					$this->Cell(5);
					$this->Cell(7,5, $vCont, 0, 0, 'C');
					$this->Cell(15,5, $aResult['cod_cat'], 0, 0, 'C');
					$this->Cell(75,5, $aResult['nom_cur'], 0, 0, 'L');
					$this->Cell(7,5, $aResult['sem_anu'], 0, 0, 'C');
					$this->Cell(20,5, $aResult['mod_des'], 0, 0, 'L');
					$this->Cell(15,5, $aResult['sec_des'], 0, 0, 'L');
					$this->Cell(15,5, $aResult['tur_des'], 0, 0, 'L');
					$this->Cell(10,5, $aResult['crd_cur'], 0, 0, 'R');
					$this->Ln();
					$vCont++;
				}
				$this->Cell(5);
				$this->Cell(90,1, '________________________________________________________', 0, 0, 'L');
				$this->Cell(90,1, '_______________________________________________', 0, 0, 'L');
				$this->Ln();
				$this->Ln(2);
				
				$vFecha = fFechad(fFecha());				
				$this->Cell(5);
				$this->Cell(139,5, "FECHA: $vFecha", 0, 0, 'L');
				$this->Cell(25,5, "TOTAL CRD : {$_SESSION['sMatriTot_crd']}", 0, 0, 'L');
				$this->Ln();
				$this->Ln(2);
			}
			function Firmaficha()
			{
				$this->SetFont('arialn','',9);
				
				$this->Cell(5);
				$this->Cell(30,1, '', 0, 0, 'L');
				$this->Cell(45,1, '_______________________________', 0, 0, 'C');
				$this->Cell(30,1, '', 0, 0, 'L');
				$this->Cell(45,1, '_______________________________', 0, 0, 'C');
				$this->Cell(30,1, '', 0, 0, 'L');
				$this->Ln();
				$this->Ln(2);
				
				$this->Cell(5);
				$this->Cell(30,5, '', 0, 0, 'L');
				$this->Cell(45,5, 'COORDINADOR ACADÉMICA', 0, 0, 'C');
				$this->Cell(30,5, '', 0, 0, 'L');
				$this->Cell(45,5, 'ESTUDIANTE', 0, 0, 'C');
				$this->Cell(30,5, '', 0, 0, 'L');
				$this->Ln();
			}
			
			function Body()
			{			
				$this->Image("../images/logo.jpg",10,5);
				$this->Header2();
				$this->Dataficha();
				$this->SetY(120);
				$this->Firmaficha();

				$this->Image("../images/logo.jpg",10,153);
				$this->SetY(148);
				$this->Ln(10);
				$this->Header2();
				$this->Dataficha();
				$this->SetY(268);
				$this->Firmaficha();

			}
/*			function Footer()
			{				
				$this->SetFont('arialn','',10);
				$this->Line(15, 277, 195, 277);
				$this->SetY(-20);			
				$this->Cell(5);
				$this->Cell(130, 4,"", 0);
				$this->Cell(50, 4,'Pag: '.$this->PageNo().' / {nb}',0,0,'R');
			}*/
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