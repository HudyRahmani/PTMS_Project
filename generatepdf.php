<?php 

	require_once("fpdf/fpdf.php");

	$pdf = new FPDF('p','mm','A4');
	
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','B',20);
	
	$pdf->cell(17,10,'',0,0);
	$pdf->cell(17,10,'وزارت تحصیلات عالی',0,0);
	
	$pdf->Output();
?>