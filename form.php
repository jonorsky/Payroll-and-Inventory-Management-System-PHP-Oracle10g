<?php

require("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->Addpage();

$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"Inventory and Management System", 1, 1, C);
$pdf->Cell(0,20,"PAYSLIP", 0, 1,C);
$pdf->Cell(30,10,"Name:", 1, 0,L);
$pdf->Cell(60,10,"Jonorsky", 1, 1);
$pdf->Cell(30,10,"ID:", 1, 0);
$pdf->Cell(60,10,"1", 1, 1);
$pdf->Cell(0,10,"", 0, 1);
$pdf->Cell(0,10,"", 0, 1);

$pdf->Cell(45,10,"Earnings", 1, 0,C);
$pdf->Cell(45,10,"Amount", 1, 0,C);
$pdf->Cell(45,10,"Deduction", 1, 0,C);
$pdf->Cell(45,10,"Amount", 1, 1,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Basic Salary", 1, 0,L);

$pdf->SetFont("Arial","b",12);
$pdf->Cell(45,10,"1000", 1, 0,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Taxation", 1, 0,L);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"5%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Others", 1, 0,L);
$pdf->Cell(45,10,"10%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"Total Deduction:", 1, 0,C);
$pdf->Cell(45,10,"15%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 1,C);
$pdf->Cell(45,10,"Gross Earnings", 1, 0,L);
$pdf->Cell(45,10,"1000", 1, 0,C);
$pdf->Cell(45,10,"Total Deductions", 1, 0,L);
$pdf->Cell(45,10,"15%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(45,10,"Total Earnings:", 1, 0,C);
$pdf->Cell(45,10,"$ 850", 1, 0,C);




$pdf->output();


?>