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
				$this->Image("../images/logo.jpg",10,4);
				
				$vCar_des = "CARRERA PROFESIONAL DE ".$_SESSION['sFrameCar_des'];
				$vHeader = "HISTORIAL ACADÉMICO";
				
				$this->SetFont('Arial','B',14);
				$this->Cell(0,5,"UNIVERSIDAD PRIVADA \"SAN CARLOS\"", 0, 0, 'C');
				$this->Ln();

				$this->SetFont('Arial','B',11);
				$this->Cell(0,5,'OFICINA DE REGISTRO ACADÉMICO', 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(2);
				
				$this->SetFont('Arial','B',12);
				$this->Cell(0,5,$vHeader, 0, 0, 'C');
				$this->Ln();
				
				$this->Ln(2);
				
				$this->SetFont('Arial','B',10);
//				$this->Cell(20);
				$this->Cell(0,5,$vCar_des, 0, 0, 'C');
				$this->Ln();
				
				
				$this->Subhnota();
				$this->Subhnota2();
				
			}
			function Subhnota()
			{
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'CÓDIGO DE MATRÍCULA', 1, 0, 'C');	
				$this->Cell(40,3,'APELLIDO PATERNO', 1, 0, 'C');
				$this->Cell(40,3,'APELLIDO MATERNO', 1, 0, 'C');
				$this->Cell(40,3,'NOMBRES', 1, 0, 'C');
				$this->Cell(35,3,'', 'RLT', 0, 'C');
				$this->Ln();

				$this->SetFont('arialn','B',10);
				$this->Cell(35,5,$_SESSION['sNotaNum_mat'], 1, 0, 'C');	
				$this->Cell(40,5, $_SESSION['sNotaPaterno'], 1, 0, 'C');
				$this->Cell(40,5, $_SESSION['sNotaMaterno'], 1, 0, 'C');
				$this->Cell(40,5, $_SESSION['sNotaNombres'], 1, 0, 'C');
				$this->Cell(35,5,'', 'RL', 0, 'C');
				$this->Ln();
				
				//---------------------------------
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'', 'LR', 0, 'C');	
				$this->Cell(30,3,'FECHA', 1, 0, 'C');
				$this->Cell(30,3,'DEPARTAMENTO', 1, 0, 'C');
				$this->Cell(30,3,'PROVINCIA', 1, 0, 'C');
				$this->Cell(30,3,'DISTRITO', 1, 0, 'C');
				$this->Cell(35,3,'', 'RL', 0, 'C');
				$this->Ln();
				
				$this->SetFont('arialn','b',10);
				$this->Cell(35,5,'NACIMIENTO', 'LRB', 0, 'C');	
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');				
				$this->Cell(35,5,'', 'RL', 0, 'C');
				$this->Ln();
				
				//-------------------------------------
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'', 'LR', 0, 'C');	
				$this->Cell(30,3,'FECHA DE INGRESO', 1, 0, 'C');
				$this->Cell(30,3,'NOMBRE COLEGIO', 1, 0, 'C');
				$this->Cell(30,3,'FECHA DE EGRESO', 1, 0, 'C');
				$this->Cell(30,3,'NOMBRE COLEGIO', 1, 0, 'C');
				$this->Cell(35,3,'', 'RL', 0, 'C');				
				$this->Ln();
				
				$this->SetFont('arialn','b',10);
				$this->Cell(35,5,'ESTUDIOS', 'LR', 0, 'C');	
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');	
				$this->Cell(35,5,'', 'RL', 0, 'C');			
				$this->Ln();
				
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'', 'LR', 0, 'C');	
				$this->Cell(30,3,'', 1, 0, 'C');
				$this->Cell(30,3,'DEPARTAMENTO', 1, 0, 'C');
				$this->Cell(30,3,'PROVINCIA', 1, 0, 'C');
				$this->Cell(30,3,'DISTRITO', 1, 0, 'C');
				$this->Cell(35,3,'', 'RL', 0, 'C');				
				$this->Ln();
				
				$this->SetFont('arialn','b',10);
				$this->Cell(35,5,'SECUNDARIOS', 'LRB', 0, 'C');	
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');	
				$this->Cell(35,5,'', 'RL', 0, 'C');			
				$this->Ln();
				
				//---------------------------------------
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'', 'LR', 0, 'C');	
				$this->Cell(30,3,'FECHA INGRESO', 1, 0, 'C');
				$this->Cell(30,3,'AÑO - SEMESTRE', 1, 0, 'C');
				$this->Cell(30,3,'PUNTAJE / SOBRE', 1, 0, 'C');
				$this->Cell(30,3,'ORDEN / TOTAL', 1, 0, 'C');
				$this->Cell(35,3,'', 'RL', 0, 'C');				
				$this->Ln();
				
				$this->SetFont('arialn','b',10);
				$this->Cell(35,5,'INGRESO A LA UPSC', 'LRB', 0, 'C');	
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(10,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');
				$this->Cell(30,5,'', 1, 0, 'C');	
				$this->Cell(35,5,'', 'RLB', 0, 'C');			
				$this->Ln();
				
				//------------------
				$this->SetFont('arialn','',5);
				$this->Cell(35,3,'', 'LR', 0, 'C');	
				$this->Cell(45,3,'FIRMA DEL COORDINADOR', 1, 0, 'C');
				$this->Cell(45,3,'FIRMA DEL ALUMNO', 1, 0, 'C');
				$this->Cell(65,3,'OBSERVACIONES', 1, 0, 'C');
				$this->Ln();
				
				$this->SetFont('arialn','b',10);
				$this->Cell(35,10,'REVISADO POR', 'LRB', 0, 'C');	
				$this->Cell(45,10,'', 1, 0, 'C');
				$this->Cell(45,10,'', 1, 0, 'C');
				$this->Cell(65,10,'', 1, 0, 'C');
	
				$this->Ln();
				
				//------------------
				$this->Ln(1);
			}
			function Subhnota2()
			{
				$this->SetFont('arialn','B',5);
							
				$this->Cell(2,4,'', 1, 0, 'C');
				$this->Cell(87,4,'NOMBRE DE LA ASIGNATURA', 1, 0, 'C');
				$this->Cell(7,4,'CRED', 1, 0, 'C');
				$this->Cell(6,4,'Nota', 1, 0, 'C');
				$this->Cell(12,4,'AÑO-PER', 1, 0, 'C');
				$this->Cell(6,4,'Nota', 1, 0, 'C');
				$this->Cell(12,4,'AÑO-PER', 1, 0, 'C');
				$this->Cell(6,4,'Nota', 1, 0, 'C');
				$this->Cell(12,4,'AÑO-PER', 1, 0, 'C');
				$this->Cell(6,4,'Nota', 1, 0, 'C');
				$this->Cell(12,4,'AÑO-PER', 1, 0, 'C');				
				$this->Cell(10,4,'ACTA', 1, 0, 'C');
				$this->Cell(12,4,'', 1, 0, 'C');
				$this->Ln();
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
				
				$aNotah = "";
				$vCod_cur = "";
				$tNota = "nota{$_SESSION['sNotaCod_car']}";
				
				$vQuery = "select no.cod_cur, no.not_cur, no.ano_aca, no.per_aca, no.cod_act, no.mod_not, pe.per_abr ";
				$vQuery .= "from $tNota no left join periodo pe on no.per_aca = pe.per_aca ";
				$vQuery .= "where no.num_mat = '{$_SESSION['sNotaNum_mat']}' and no.pln_est = '{$_SESSION['sNotaPln_est']}' ";
				$vQuery .= "order by no.cod_cur, no.mod_not, no.ano_aca, no.per_aca ";

				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{	
					if($vCod_cur != $aResult['cod_cur'])
					{
						$vCod_cur = $aResult['cod_cur'];
						$vContn = 1;						
					}
					$aNotah[$aResult['cod_cur'].$vContn]['ano_aca'] = $aResult['ano_aca'];
					$aNotah[$aResult['cod_cur'].$vContn]['per_abr'] = $aResult['per_abr'];
					$aNotah[$aResult['cod_cur'].$vContn]['not_cur'] = (string)(strlen($aResult['not_cur'])==1?('0'.$aResult['not_cur']):$aResult['not_cur']);
					$vContn++;
				}
				
				$vCont = 1;
				$vSem_anu = "XX";
			  	$vQuery = "select cu.pln_est, cu.cod_cur, cu.nom_ofi, cu.crd_cur, cu.sem_anu, se.sem_des ";
				$vQuery .= "from curso cu left join semestre se on cu.sem_anu = se.sem_anu ";
				$vQuery .= "where cu.cod_car = '{$_SESSION['sNotaCod_car']}' and cu.pln_est = '{$_SESSION['sNotaPln_est']}' ";
				$vQuery .= "order by sem_anu, cod_cur";
				
				$cResult = fQuery($vQuery);
				while($aResult = mysql_fetch_array($cResult))
				{
					if($vSem_anu != $aResult['sem_anu'])
					{
						$vSem_anu = $aResult['sem_anu'];
						
						$this->SetFont('arialn','B',10);						
						$this->Cell(190,4, "SEMESTRE: {$aResult['sem_des']}", 1, 0, 'L');
						$this->Ln();
					}
					$this->SetFont('arialn','',9);
					$this->Cell(2,5,'', 1, 0, 'C');
					$this->Cell(87,5,"{$aResult['nom_ofi']}", 1, 0, 'L');
					$this->Cell(7,5,"{$aResult['crd_cur']}", 1, 0, 'C');
					$this->Cell(6,5,$aNotah[$aResult['cod_cur'].'1']['not_cur'], 1, 0, 'C');
					$this->Cell(12,5,($aNotah[$aResult['cod_cur'].'1']['ano_aca']."-".$aNotah[$aResult['cod_cur'].'1']['per_abr']), 1, 0, 'C');
					$this->Cell(6,5,$aNotah[$aResult['cod_cur'].'2']['not_cur'], 1, 0, 'C');
					$this->Cell(12,5,($aNotah[$aResult['cod_cur'].'2']['ano_aca']."-".$aNotah[$aResult['cod_cur'].'2']['per_abr']), 1, 0, 'C');
					$this->Cell(6,5,$aNotah[$aResult['cod_cur'].'3']['not_cur'], 1, 0, 'C');
					$this->Cell(12,5,($aNotah[$aResult['cod_cur'].'3']['ano_aca']."-".$aNotah[$aResult['cod_cur'].'3']['per_abr']), 1, 0, 'C');
					$this->Cell(6,5,$aNotah[$aResult['cod_cur'].'4']['not_cur'], 1, 0, 'C');
					$this->Cell(12,5,($aNotah[$aResult['cod_cur'].'4']['ano_aca']."-".$aNotah[$aResult['cod_cur'].'4']['per_abr']), 1, 0, 'C');				
					$this->Cell(10,5,'', 1, 0, 'C');
					$this->Cell(12,5,'', 1, 0, 'C');
					$this->Ln();
					
				}		
			}
			function Resumen()
			{
				$this->SetFont('arialn','B',8);
				$this->Cell(46,4,'DATOS COMPLEMENTARIOS', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'DATOS PARCIALES', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->SetFont('arialn','',8);
				$this->Cell(46,4,'CRÉDITOS CURSADOS', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'CRÉDITOS APROBADOS', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'PUNTAJE SEMESTRAL', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();

				$this->Cell(46,4,'PROMEDIO PONDERADO SEMESTRAL', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->SetFont('arialn','B',8);
				$this->Cell(46,5,'DATOS ACUMULATIVOS', 1, 0, 'L');
				$this->Cell(144,5,'', 1, 0, 'L');
				$this->Ln();
				
				$this->SetFont('arialn','',8);
				$this->Cell(46,4,'CRÉDITOS CURSADOS', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'CRÉDITOS APROBADOS', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'PUNTAJE ACUMULATIVO', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();
				
				$this->Cell(46,4,'PROM. PONDERADO ACUMULATIVO', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Cell(8,4,'', 1, 0, 'L');
				$this->Ln();				
			}
		}
	
		$pdf=new PDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();
		$pdf->AddFont('arialn','','arialn.php');
		$pdf->AddFont('arialn','B','arialnb.php');
		$pdf->AddPage();
		$pdf->Header2();
		$pdf->Body();
		$pdf->Resumen();
		
		$pdf->Output();
	}
	else
	{
		header("Location:../index.php");
	}
?> 